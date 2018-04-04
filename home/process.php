<?php
require_once '../config/database.php';
require_once '../config/Models.php';

$action = $_GET['action'];

switch ($action) {

	case 'create' :
		create();
		break;

	case 'clientRequest' :
		clientRequest();
		break;

	case 'submitResume' :
		submitResume();
		break;

	case 'submitApplication' :
		submitApplication();
		break;

	case 'sendInquiry' :
		sendInquiry();
		break;

	default :
}

function create()
{
	$jobFunctionId = $_POST['jobFunctionId'];

	$refNum = bin2hex(openssl_random_pseudo_bytes(4));

	$job = job();
	$job->obj = $_POST;
	$job->obj['refNum'] = strtoupper($refNum);
	$job->obj['createDate'] = "NOW()";
	$job->create();

	$hrList = admin()->list("jobFunctionId='$jobFunctionId'");
	$adminList = admin()->list("level='admin'");

	// Send email
	$content = __talentRequestEmailMessage();
	$hrmessage = __hrTalentMessage();
	$adminmessage = __adminTalentMessage();

	sendEmail($job->obj['workEmail'], $content);
	//for HR
	foreach($hrList as $row){
		sendEmail($row->email,$hrmessage);
	}
	//for admin
	foreach($adminList as $row){
		sendEmail($row->email,$adminmessage);
	}

	header('Location: ../company/');
}

function clientRequest()
{
	$email = $_POST['email'];
	$jobFunctionId = $_POST['jobFunctionId'];
	$refNum = bin2hex(openssl_random_pseudo_bytes(4));
	$checkEmail = company()->get("email='$email'");

	if($checkEmail){
		header('Location: ../home?view=clientForm&error=Email already exist!');
	}else{
		$comp = company();
		$comp->obj = $_POST;
		$comp->obj['refNum'] = strtoupper($refNum);
		$comp->obj['isApproved '] = "1";
		$comp->create();

		$company = company()->get("email='$email'");

		__createClientLogin($company->Id);

		$hrList = admin()->list("jobFunctionId='$jobFunctionId'");
		$adminList = admin()->list("level='admin'");

		// Send email
		$hrmessage = __hrClientMessage();
		$adminmessage = __adminClientMessage();

		//for HR
		foreach($hrList as $row){
			sendEmail($row->email,$hrmessage);
		}
		//for admin
		foreach($adminList as $row){
			sendEmail($row->email,$adminmessage);
		}

		header('Location: ../home/?view=success&Id='.$company->Id);
	}
}

function __createClientLogin($Id){


	// This is if you want to get the last 6 digits
	/*
	substr(round(microtime(true)), -6)
	*/
	// Get Detail
	$company = company()->get("Id='$Id'");

	// Create account
	$user = user();
	$user->obj['username'] = "C" . round(microtime(true));
	$user->obj['password'] = sha1("temppassword");
	$user->obj['firstName'] = $company->contactPerson;
	$user->obj['lastName'] = $company->name;
	$user->obj['level'] = "company";
	$user->create();

	// Update Company
	$comp = company();
	$comp->obj['username'] = $user->obj['username'];
	$comp->update("Id='$Id'");

	// Send email
	$content = "We have approved your request. Please use the credentials we have created for you.<br>
							Username: " . $user->obj['username'] . " <br>
							Password: temppassword <br><br>
							To login to our website. Please click the link below:<br>
							<a href='http://bandbajabaraath.com/company/index.php?view=login'>www.bandbajabaraath.com/company/</a><br><br>
							or go to the Timesheet page<br><br>
							Teamire";

	sendEmail($company->email, $content);
}

function submitResume(){

		$abn = $_POST["abn"];
		$jobFunctionId = $_POST['jobFunctionId'];
		$refNum = bin2hex(openssl_random_pseudo_bytes(4));

		$uploadFile = uploadFile($_FILES['upload_file']);
		$uploadList = uploadMultipleFile($_FILES["upload_certs"]);

		if ($uploadFile && !isset($uploadList['error']))
		{
			$res = resume();
			$res->obj = $_POST;
			$res->obj['jobId'] = "0";
			$res->obj['refNum'] = strtoupper($refNum);
			$res->obj['uploadedResume'] = $uploadFile;
			$res->obj['uploadedSpecs'] = uploadFile($_FILES["upload_specs"]);
			$res->create();

			$resume = resume()->get("abn='$abn'");

			foreach($uploadList as $file){
				$certs = certificates();
				$certs->obj['resumeId']  = $resume->Id;
				$certs->obj['uploadedCerts'] = $file;
				$certs->create();
			}

			$hrList = admin()->list("jobFunctionId='$jobFunctionId'");
			$adminList = admin()->list("level='admin'");

			// Send email
			$content = __submitResumeEmailMessage();
			$hrmessage = __hrResumeMessage();
			$adminmessage = __adminResumeMessage();

			//for candidate
			sendEmail($res->obj['email'] , $content);
			//for HR
			foreach($hrList as $row){
				sendEmail($row->email,$hrmessage);
			}
			//for admin
			foreach($adminList as $row){
				sendEmail($row->email,$adminmessage);
			}

			header('Location: ../home/?view=success&Id='.$resume->Id);
		}
		else{
			header('Location: ../home/?error=Not uploaded');
		}
}

function submitApplication()
{
		$abn = $_POST["abn"];
		$jobFunctionId = $_POST['jobFunctionId'];
		$refNum = bin2hex(openssl_random_pseudo_bytes(4));

		$uploadFile = uploadFile($_FILES['upload_file']);
		$uploadList = uploadMultipleFile($_FILES["upload_certs"]);

		if ($uploadFile && !isset($uploadList['error']))
		{
			$res = resume();
			$res->obj['jobId'] = $_POST["jobId"];
			$res->obj['jobFunctionId'] = $_POST["jobFunctionId"];
			$res->obj['refNum'] = strtoupper($refNum);
			$res->obj['firstName'] = $_POST["firstName"];
			$res->obj['lastName']= $_POST["lastName"];
			$res->obj['birthdate'] = $_POST["birthdate"];
			$res->obj['abn'] = $_POST["abn"];
			$res->obj['taxNumber'] = $_POST["taxNumber"];
			$res->obj['email'] = $_POST["email"];
			$res->obj['phoneNumber'] = $_POST["phoneNumber"];
			$res->obj['address1'] = $_POST["address1"];
			$res->obj['address2'] = $_POST["address2"];
			$res->obj['city'] = $_POST["city"];
			$res->obj['state'] = $_POST["state"];
			$res->obj['zipCode'] = $_POST["zipCode"];
			$res->obj['speedtest'] = $_POST["speedtest"];
			$res->obj['coverLetter'] = $_POST["coverLetter"];
			$res->obj['uploadedResume'] = $uploadFile;
			$res->obj['uploadedSpecs'] = uploadFile($_FILES["upload_specs"]);
			$res->create();

			$resume = resume()->get("abn='$abn'");

			foreach($uploadList as $file){
				$certs = certificates();
				$certs->obj['resumeId']  = $resume->Id;
				$certs->obj['uploadedCerts'] = $file;
				$certs->create();
			}

			$hrList = admin()->list("jobFunctionId='$jobFunctionId'");
			$adminList = admin()->list("level='admin'");

			// Send Email
			$content = __submitApplicationEmailMessage();
			$hrmessage = __hrApplicationMessage();
			$adminmessage = __adminApplicationMessage();

			//for candidate
			sendEmail($resume->email,$hrmessage);
			//for HR
			foreach($hrList as $row){
				sendEmail($row->email,$hrmessage);
			}
			//for admin
			foreach($adminList as $row){
				sendEmail($row->email,$adminmessage);
			}
			header('Location: ../home/?view=success&Id='.$resume->Id);
		}
		else{
			header('Location: ../home/?error=Not uploaded');
		}
}

function sendInquiry()
{
		$message = $_POST['message'];
		$email = $_POST['workEmail'];

		$inq = inquiries();
		$inq->obj['firstName'] = $_POST["firstName"];
		$inq->obj['lastName'] = $_POST["lastName"];
		$inq->obj['phoneNumber'] = $_POST["phoneNumber"];
		$inq->obj['jobFunctionId'] = $_POST["jobFunctionId"];
		$inq->obj['workEmail'] = $_POST["workEmail"];
		$inq->obj['zipCode'] =  $_POST["zipCode"];
		$inq->obj['message'] 	 = $message;
		$inq->create();

		$content = "From: $email<br><br>
								Message: $message";

		$adminList = admin()->list("level='admin'");

		//send email to admin
		foreach($adminList as $row){
			sendEmail($row->email, $content);
		}

		header('Location: ../home/?view=success');
}


/* ======================== Email Messages ==============================*/

function __talentRequestEmailMessage(){
	return "We have received your request. Thank you for showing interest in our company in looking for your candidate.<br>
					Please be informed that we are in the midst of processing your request and shall get<br>
					in touch with you again if your request has met our condition.<br><br>
					Teamire";
}

function __submitResumeEmailMessage(){
	return "Thank you for submiting your resume to Teamire. As of now, we are still reviewing your documents.<br>
					If we find any of our current opportunities that match your qualifications, we will contact you with the<br>
					next steps of your application.<br><br>
					We look forward to assisting you with your job search!<br><br>
					Teamire";
}

function __submitApplicationEmailMessage(){
	return "We have recieved your application. Thank you for the interest shown in our company.<br><br>
					Please be informed that we are in the midst of processing the applications and shall get<br>
					in touch with you again if you are shortlisted for an interview.<br><br>
					Teamire";
}

function __hrTalentMessage(){
	return "A new talent request has been created. Please login to <a href='http://bandbajabaraath.com/hr/index.php?view=login'>www.bandbajabaraath.com/hr/</a><br>
					and check the new talent request.<br><br>
					Teamire";
}

function __adminTalentMessage(){
	return "A new talent request has been created. Please login to <a href='http://bandbajabaraath.com/admin/index.php?view=login'>www.bandbajabaraath.com/admin/</a><br>
					and check the new talent request.<br><br>
					Teamire";
}

function __hrClientMessage(){
	return "A new client has registered. Please login to <a href='http://bandbajabaraath.com/hr/index.php?view=login'>www.bandbajabaraath.com/hr/</a><br>
					and check the new client.<br><br>
					Teamire";
}

function __adminClientMessage(){
	return "A new client has registered. Please login to <a href='http://bandbajabaraath.com/admin/index.php?view=login'>www.bandbajabaraath.com/admin/</a><br>
					and check the new client.<br><br>
					Teamire";
}

function __hrResumeMessage(){
	return "A new resume has been submitted. Please login to <a href='http://bandbajabaraath.com/hr/index.php?view=login'>www.bandbajabaraath.com/hr/</a><br>
					and check the new resume.<br><br>
					Teamire";
}

function __adminResumeMessage(){
	return "A new resume has been submitted. Please login to <a href='http://bandbajabaraath.com/admin/index.php?view=login'>www.bandbajabaraath.com/admin/</a><br>
					and check the new resume.<br><br>
					Teamire";
}

function __hrApplicationMessage(){
	return "A new application has been submitted. Please login to <a href='http://bandbajabaraath.com/hr/index.php?view=login'>www.bandbajabaraath.com/hr/</a><br>
					and check the new application.<br><br>
					Teamire";
}

function __adminApplicationMessage(){
	return "A new application has been submitted. Please login to <a href='http://bandbajabaraath.com/admin/index.php?view=login'>www.bandbajabaraath.com/admin/</a><br>
					and check the new application.<br><br>
					Teamire";
}
?>
