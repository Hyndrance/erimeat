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

	$job = job();
	$job->obj['refNum'] = round(microtime(true));
	$job->obj['jobFunctionId'] = $_POST['jobFunctionId'];
	$job->obj['positionTypeId'] = $_POST['positionTypeId'];
	$job->obj['contactName'] = $_POST['contactName'];
	$job->obj['position'] = $_POST['position'];
	$job->obj['company'] = $_POST['company'];
	$job->obj['abn'] = $_POST['abn'];
	$job->obj['comment'] = $_POST['comment'];
	$job->obj['address'] = $_POST['address'];
	$job->obj['workEmail'] = $_POST['workEmail'];
	$job->obj['jobTitle'] = $_POST['jobTitle'];
	$job->obj['businessPhone'] = $_POST['businessPhone'];
	$job->obj['zipCode'] = $_POST['zipCode'];
	$job->obj['requiredExperience'] = $_POST['requiredExperience'];
	$job->obj['createDate'] = "NOW()";
	$job->create();

	$hrList = admin()->list("jobFunctionId='$jobFunctionId'");
	$adminList = admin()->list("level='admin'");

	// Send email
	$content = __talentRequestEmailMessage();
	$hrmessage = __hrEmailMessage();
	$adminmessage = __adminEmailMessage();

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
	$abn = $_POST['abn'];
	$jobFunctionId = $_POST['jobFunctionId'];
	$checkAbn = company()->get("abn='$abn'");

	if($checkAbn){
		header('Location: ../home?view=clientForm&error=ABN already exist!');
	}else{
		$comp = company();
		$comp->obj['jobFunctionId'] = $_POST['jobFunctionId'];
		$comp->obj['department'] = $_POST['department'];
		$comp->obj['name'] = $_POST['name'];
		$comp->obj['abn'] = $_POST['abn'];
		$comp->obj['contactPerson'] = $_POST['contactPerson'];
		$comp->obj['email'] = $_POST['email'];
		$comp->obj['address'] = $_POST['address'];
		$comp->obj['phoneNumber'] = $_POST['phoneNumber'];
		$comp->obj['mobileNumber'] = $_POST['mobileNumber'];
		$comp->obj['description '] = $_POST['description'];
		$comp->obj['isApproved '] = "1";
		$comp->create();

		$company = company()->get("abn='$abn'");

		__createClientLogin($company->Id);

		$hrList = admin()->list("jobFunctionId='$jobFunctionId'");
		$adminList = admin()->list("level='admin'");

		// Send email
		$hrmessage = __hrEmailMessage();
		$adminmessage = __adminEmailMessage();

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
							<a href='www.bandbajabaraath.kovasaf.com/company/index.php?view=changepassword'>www.bandbajabaraath.kovasaf.com</a><br><br>
							Teamire";

	sendEmail($company->email, $content);
}

function submitResume(){

		$abn = $_POST["abn"];
		$jobFunctionId = $_POST['jobFunctionId'];

		$upload = uploadFile($_FILES['upload_file']);
		if ($upload)
		{
			$res = resume();
			$res->obj['jobId'] = "0";
			$res->obj['jobFunctionId'] = $_POST["jobFunctionId"];
			$res->obj['refNum'] = round(microtime(true));
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
			$res->obj['uploadedResume'] = $upload;
			$res->obj['uploadedSpecs'] = uploadFile($_FILES["upload_specs"]);
			$res->obj['uploadedCerts'] = uploadFile($_FILES["upload_certs"]);
			$res->create();

			$resume = resume()->get("abn='$abn'");

			$hrList = admin()->list("jobFunctionId='$jobFunctionId'");
			$adminList = admin()->list("level='admin'");

			// Send email
			$content = __submitResumeEmailMessage();
			$hrmessage = __hrEmailMessage();
			$adminmessage = __adminEmailMessage();

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

		$upload = uploadFile($_FILES['upload_file']);
		if ($upload)
		{
			$res = resume();
			$res->obj['jobId'] = $_POST["jobId"];
			$res->obj['jobFunctionId'] = $_POST["jobFunctionId"];
			$res->obj['refNum'] = round(microtime(true));
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
			$res->obj['uploadedResume'] = $upload;
			$res->obj['uploadedSpecs'] = uploadFile($_FILES["upload_specs"]);
			$res->obj['uploadedCerts'] = uploadFile($_FILES["upload_certs"]);
			$res->create();

			$resume = resume()->get("abn='$abn'");

			$hrList = admin()->list("jobFunctionId='$jobFunctionId'");
			$adminList = admin()->list("level='admin'");

			// Send Email
			$content = __submitApplicationEmailMessage();
			$hrmessage = __hrEmailMessage();
			$adminmessage = __adminEmailMessage();

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

function __hrEmailMessage(){
	return "A new request has been created. Please login to <a href='www.bandbajabaraath.kovasaf.com/hr'>www.teamire.com</a><br>
					and check the new request.<br><br>
					Teamire";
}

function __adminEmailMessage(){
	return "A new request has been created. Please login to <a href='www.bandbajabaraath.kovasaf.com/admin'>www.teamire.com</a><br>
					and check the new request.<br><br>
					Teamire";
}
?>
