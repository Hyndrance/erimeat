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

	// This is if you want to get the last 6 digits
	/*
substr(round(microtime(true)), -6)

	*/

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
	$job->create();

	// Send email
	$content = __talentRequestEmailMessage();
	$hrmessage = __hrEmailMessage();
	$adminmessage = __adminEmailMessage();

	sendEmail($job->obj['workEmail'], $content);
	//for HR
	sendEmail('rgmak12@gmail.com',$hrmessage);
	//for admin
	sendEmail('torredale1014@gmail.com',$adminmessage);


	header('Location: ../company/');
}

function clientRequest()
{
	// This is if you want to get the last 6 digits
	/*
	substr(round(microtime(true)), -6)
	*/
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
	$comp->create();

	// Send email
	$content = __clientRequestEmailMessage();
	$hrmessage = __hrEmailMessage();
	$adminmessage = __adminEmailMessage();

	//for client
	sendEmail($comp->obj['email'], $content);
	//for HR
	sendEmail('rgmak12@gmail.com',$hrmessage);
	//for admin
	sendEmail('torredale1014@gmail.com',$adminmessage);

	header('Location: ../home/?view=success');
}

function submitResume(){

		$upload = uploadFile($_FILES['upload_file']);
		if ($upload)
		{
			$res = resume();
			$res->obj['jobId'] = "0";
			$res->obj['jobFunctionId'] = $_POST["jobFunctionId"];
			$res->obj['refNum'] = round(microtime(true));
			$res->obj['firstName'] = $_POST["firstName"];
			$res->obj['lastName']= $_POST["lastName"];
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
			$res->obj['uploadedSpecs'] = $_POST["upload_specs"];
			$res->obj['uploadedCerts'] = $_POST["upload_certs"];
			$res->create();

			// Send email
			$content = __submitResumeEmailMessage();
			$hrmessage = __hrEmailMessage();
			$adminmessage = __adminEmailMessage();

			//for candidate
			sendEmail($res->obj['email'] , $content);
			//for HR
			sendEmail('rgmak12@gmail.com',$hrmessage);
			//for admin
			sendEmail('torredale1014@gmail.com',$adminmessage);

			header('Location: ../home/?view=success');
		}
		else{
			header('Location: ../home/?error=Not uploaded');
		}
}

function submitApplication()
{
		$upload = uploadFile($_FILES['upload_file']);
		if ($upload)
		{
			$res = resume();
			$res->obj['jobId'] = $_POST["jobId"];
			$res->obj['jobFunctionId'] = $_POST["jobFunctionId"];
			$res->obj['refNum'] = round(microtime(true));
			$res->obj['firstName'] = $_POST["firstName"];
			$res->obj['lastName']= $_POST["lastName"];
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
			$res->create();
			// Send Email
			$content = __submitApplicationEmailMessage();
			$hrmessage = __hrEmailMessage();
			$adminmessage = __adminEmailMessage();

			//for candidate
			sendEmail($res->obj['email'], $content);
			//for HR
			sendEmail('rgmak12@gmail.com',$hrmessage);
			//for admin
			sendEmail('torredale1014@gmail.com',$adminmessage);

			header('Location: ../home/?view=success');
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

		//send email to HR
		sendEmail('rgmak12@gmail.com', $content);
		//send email to admin
		sendEmail('torredale1014@gmail.com', $content);

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

function __clientRequestEmailMessage(){
	return "We have received your request. Thank you for the interest shown in our company.<br><br>
					Please be informed that we are in the midst of processing your request and shall get<br>
					in touch with you again once you've meet our requirements.<br><br>
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
