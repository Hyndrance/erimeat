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

		header('Location: ../home/?view=success&email='.$email);
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
	$content = "Thank you for considering Teamire as your prospect to search for your contingent workforce.<br>
							Your new account has been activated which means you can now login with the below credentials and<br>
							view your personalized dashboard.<br><br>
							Client Username: " . $user->obj['username'] . "<br>
							Password: temppassword<br><br>
							To login to our website visit <a href='http://www.teamire.com/company/?view=login'>www.teamire.com/company/</a>";

	sendEmail($company->email, $content);
}

function submitResume(){

		$email = $_POST["email"];
		$jobFunctionId = $_POST['jobFunctionId'];
		$refNum = bin2hex(openssl_random_pseudo_bytes(4));
		$checkEmail = candidate()->get("email='$email'");

		$uploadFile = uploadFile($_FILES['upload_file']);
		$uploadList = uploadMultipleFile($_FILES["upload_certs"]);

		if ($uploadFile && !isset($uploadList['error']))
		{
			$can = candidate();
			$can->obj = $_POST;
			$can->obj['refNum'] = strtoupper($refNum);
			$can->obj['uploadedResume'] = $uploadFile;
			$can->obj['uploadedSpecs'] = uploadFile($_FILES["upload_specs"]);
			$can->create();

			$candidate = candidate()->get("email='$email'");

			foreach($uploadList as $file){
				$certs = certificates();
				$certs->obj['resumeId']  = $candidate->Id;
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
			sendEmail($can->obj['email'] , $content);
			//for HR
			foreach($hrList as $row){
				sendEmail($row->email,$hrmessage);
			}
			//for admin
			foreach($adminList as $row){
				sendEmail($row->email,$adminmessage);
			}

			header('Location: ../home/?view=success&email='.$email);
		}else if($checkEmail){
			header('Location: ../?view=submitResume&error=Email already exist!');
		}
		else{
			header('Location: ../?view=submitResume&error=Not uploaded');
		}
}

function submitApplication()
{
		$email = $_POST["email"];
		$jobFunctionId = $_POST['jobFunctionId'];
		$jobId = $_POST['jobId'];
		$refNum = bin2hex(openssl_random_pseudo_bytes(4));

		$job = job()->get("Id='$jobId'");

		$uploadFile = uploadFile($_FILES['upload_file']);
		$uploadList = uploadMultipleFile($_FILES["upload_certs"]);

		if ($uploadFile && !isset($uploadList['error']))
		{
			$app = application();
			$app->obj['jobId'] = $_POST["jobId"];
			$app->obj['jobFunctionId'] = $_POST["jobFunctionId"];
			$app->obj['refNum'] = strtoupper($refNum);
			$app->obj['firstName'] = $_POST["firstName"];
			$app->obj['lastName']= $_POST["lastName"];
			$app->obj['birthdate'] = $_POST["birthdate"];
			$app->obj['abn'] = $_POST["abn"];
			$app->obj['taxNumber'] = $_POST["taxNumber"];
			$app->obj['email'] = $_POST["email"];
			$app->obj['phoneNumber'] = $_POST["phoneNumber"];
			$app->obj['address1'] = $_POST["address1"];
			$app->obj['address2'] = $_POST["address2"];
			$app->obj['city'] = $_POST["city"];
			$app->obj['state'] = $_POST["state"];
			$app->obj['zipCode'] = $_POST["zipCode"];
			$app->obj['speedtest'] = $_POST["speedtest"];
			$app->obj['coverLetter'] = $_POST["coverLetter"];
			$app->obj['keySkills'] = $_POST["keySkills"];
			$app->obj['uploadedResume'] = $uploadFile;
			$app->obj['uploadedSpecs'] = uploadFile($_FILES["upload_specs"]);
			$app->create();

			$application = application()->get("email='$email'");

			foreach($uploadList as $file){
				$certs = certificates();
				$certs->obj['resumeId']  = $application->Id;
				$certs->obj['uploadedCerts'] = $file;
				$certs->create();
			}

			$hrList = admin()->list("jobFunctionId='$jobFunctionId'");
			$adminList = admin()->list("level='admin'");

			// Send Email
			$hrmessage = __hrApplicationMessage();
			$adminmessage = __adminApplicationMessage();

			//for candidate
			$content = "Thank you for applying and showing interest in our company and responding to our advertisement for<br>
									" . $job->position . " with reference number " . $job->refNum . "<br><br>
									At this stage in employment prospect we usually make this one very significant statement to everyone<br>
									who is looking for an opportunity with our organisation, and that is “if your career profile truly reflects<br>
									who you are, then you definitely stand a fighting chance in landing a suitable position with our business.<br><br>
									For your application to proceed to the next stage of the interview process, with a well-structured<br>
									resume we also need you to provide us with copies of your academic achievements for factual<br>
									verification. This may include other work-related training certificates, awards, and transcripts of exams<br>
									and marks scored in university and college that you wish to share with us in support of your application.";

			sendEmail($application->email,$content);
			//for HR
			foreach($hrList as $row){
				sendEmail($row->email,$hrmessage);
			}
			//for admin
			foreach($adminList as $row){
				sendEmail($row->email,$adminmessage);
			}
			header('Location: ../home/?view=success&email='.$email);
		}
		else{
			header('Location: ../home/?view=application&id='. $_POST['jobId'] .'&error=Not uploaded');
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
	return "We acknowledge your request for talent acquisition. Our hiring process usually begin with our Certified<br>
					HR Personnel (our zone level team building manager) who will contact your company representative and<br>
					go through in detail systems we have in place a vigilant and very efficiently system to engage remote<br>
					staff/contractor's to your important assignment. Our Rep will explain our extent of involvement and how<br>
					we will engage and coordinate the complete process from hiring to managing your expectations through<br>
					to our own individual milestones and KPIs which we maintain for benchmarking through various metrics in<br>
					collaboration with your team. In addition this above, we will also discuss and assist you with writing up<br>
					you ideal remote contractor job profile, preferred candidate type, any professional experience, document<br>
					contractors access to ERP and other means of communication tools via a compatible remote user<br>
					interface. We will define hours of any mandatory work activity based on your expectations and our<br>
					business T/Cs related to new assignment.<br><br>
					At Teamire we value our contribution thus take pride in what we do, when, why and how we find and<br>
					deploy a talent that is regarded far superior to our closest competitor our industry. In seeking for the best<br>
					talents and using our non compromising guidelines, we consistently deploy and maintain a very high<br>
					standard of talent screening process.";
}

function __submitResumeEmailMessage(){
	return "We have received your inquiry regarding employment opportunities at <b>Teamire</b> Employment Services,<br>
					and we are in the process of reviewing your qualifications against our current requirements. Should your<br>
					background and experience meet the requirements of one of our job openings, we will contact you to<br>
					request addition information. If we do not have an appropriate opening at this time, we will retain your<br>
					inquiry for six months for future consideration.<br><br>
					Thank you for contacting Teamire Employement Services.<br>";
}

function __hrTalentMessage(){
	return "A new talent request has been created. Please login to <a href='http://www.teamire.com/hr/index.php?view=login'>www.teamire.com/hr/</a><br>
					and check the new talent request.<br><br>
					Teamire";
}

function __adminTalentMessage(){
	return "A new talent request has been created. Please login to <a href='http://www.teamire.com/admin/index.php?view=login'>www.teamire.com/admin/</a><br>
					and check the new talent request.<br><br>
					Teamire";
}

function __hrClientMessage(){
	return "A new client has registered. Please login to <a href='http://www.teamire.com/hr/index.php?view=login'>www.teamire.com/hr/</a><br>
					and check the new client.<br><br>
					Teamire";
}

function __adminClientMessage(){
	return "A new client has registered. Please login to <a href='http://www.teamire.com/admin/index.php?view=login'>www.teamire.com/admin/</a><br>
					and check the new client.<br><br>
					Teamire";
}

function __hrResumeMessage(){
	return "A new resume has been submitted. Please login to <a href='http://www.teamire.com/hr/index.php?view=login'>www.teamire.com/hr/</a><br>
					and check the new resume.<br><br>
					Teamire";
}

function __adminResumeMessage(){
	return "A new resume has been submitted. Please login to <a href='http://www.teamire.com/admin/index.php?view=login'>www.teamire.com/admin/</a><br>
					and check the new resume.<br><br>
					Teamire";
}

function __hrApplicationMessage(){
	return "A new application has been submitted. Please login to <a href='http://www.teamire.com/hr/index.php?view=login'>www.teamire.com/hr/</a><br>
					and check the new application.<br><br>
					Teamire";
}

function __adminApplicationMessage(){
	return "A new application has been submitted. Please login to <a href='http://www.teamire.com/admin/index.php?view=login'>www.teamire.com/admin/</a><br>
					and check the new application.<br><br>
					Teamire";
}
?>
