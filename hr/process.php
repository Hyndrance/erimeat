<?php
session_start();
require_once '../config/database.php';
require_once '../config/Models.php';

$action = $_GET['action'];

switch ($action) {

	case 'terminateEmployee' :
		terminateEmployee();
		break;

	case 'login' :
		login();
		break;

	case 'logout' :
		logout();
		break;

	case 'assignCandidate' :
		assignCandidate();
		break;

	case 'updateRequest' :
		updateRequest();
		break;

	case 'addExperience' :
		addExperience();
		break;

	case 'jobRequest' :
		jobRequest();
		break;

	case 'changepassword' :
		changepassword();
		break;

	case 'denyResume' :
		denyResume();
		break;

	case 'denyCandidateResume' :
		denyCandidateResume();
		break;

	case 'hireApplicant' :
		hireApplicant();
		break;

	case 'setInterViewDate' :
		setInterViewDate();
		break;

	case 'setCandidateInterview' :
		setCandidateInterview();
		break;

	case 'approveTimesheet' :
		approveTimesheet();
		break;

	case 'deleteCandidateResume' :
		deleteCandidateResume();
		break;

	case 'updateInformation' :
		updateInformation();
		break;

	case 'updateClientInfo' :
		updateClientInfo();
		break;

	case 'updateCandidateInfo' :
		updateCandidateInfo();
		break;

	case 'updateEmployeeInfo' :
		updateEmployeeInfo();
		break;

	default :
}

function login()
{
	// if we found an error save the error message in this variable

	$username = $_POST['username'];
	$password = $_POST['password'];

	$result = admin()->get("username='$username' and password = '".sha1($password)."' and level='hr'");

	if ($result){
		$_SESSION['hr_session'] = $username;
		if (sha1($password) == sha1('temppassword')){
			$_SESSION['temp_session'] = $username;
			header('Location: index.php?view=changepassword');
		}else{
		header('Location: index.php');
		}
	}
	else {
			header('Location: index.php?error=User not found in the Database');
	}
}

function changepassword()
{
	$password = $_POST['password'];
	$password2 = $_POST['password2'];
	$username = $_POST['username'];

	if(sha1($password) == sha1($password2)){
		if(sha1($password) != sha1("temppassword")){

			$admin = admin();
			$admin->obj['password'] = sha1($password);
			$admin->update("username='$username'");

			header('Location: index.php');
		}
		else{
			header('Location: index.php?view=changepassword&error=Invalid Password');
		}
	}
	else{
		header('Location: index.php?view=changepassword&error=Password not matched');
	}
}

function logout()

{
	//logout.php
session_start();
session_destroy();
header('Location: index.php');
	exit;
}

function deleteCandidateResume()
{
	$Id=$_GET['Id'];
	$candidate = candidate();
	$candidate->obj['isDeleted'] = "1";
	$candidate->update("Id='$Id'");
	header('Location: index.php?view=candidates&message=Resume has been deleted');
}

function updateRequest()
{
	$Id = $_POST['Id'];
	$job = job();
	$job->obj['comment'] = $_POST['comment'];
	$job->update("Id='$Id'");

	header('Location: ../hr/?view=jobDetail&Id='. $Id . '&message=You have successfully updated a Request');
}

function denyResume()
{
	$Id=$_GET['Id'];
	$candidate = candidate();
	$candidate->obj['isApproved'] = "-1";
	$candidate->update("Id='$Id'");

	$candidate = candidate()->get("Id='$Id'");

	// Send email to ask more information
	$content = __moreInfoResumeMessage();
	sendEmail($candidate->email, $content);

	header('Location: index.php?view=resumeList&isApproved=0&jobId=' . $candidate->jobId);
}

function denyCandidateResume()
{
	$Id=$_GET['Id'];
	$candidate = candidate();
	$candidate->obj['isApproved'] = "-1";
	$candidate->update("Id='$Id'");

	$candidate = resume()->get("Id='$Id'");

	// Send email
	$content = __moreInfoResumeMessage();
	sendEmail($candidate->email, $content);

	header('Location: index.php?view=candidates');
}

function approveTimesheet()
{
	$Id=$_GET['Id'];
	$timesheet = timesheet();
	$timesheet->obj['status'] = "1";
	$timesheet->update("Id='$Id'");

	header('Location: index.php?view=timekeepingCompanyList');
}

function setInterviewDate()
{
	$email = $_POST['email'];
	$Id = $_POST['resumeId'];
	$date = $_POST['date'];
	$time = $_POST['time'];

	$intDate = interview_date();
	$intDate->obj['resumeEmail'] = $Id;
	$intDate->obj['date'] = $date;
	$intDate->obj['time'] = $time;
	$intDate->create();

	$application = application();
	$application->obj['isApproved'] = "1";
	$application->update("Id='$Id'");

	$app = application()->get("Id='$Id'");
	$job = job()->get("Id='$app->jobId'");

	$content = "Dear applicant,<br><br>
							Thank you for showing interest in the position of '$job->position'<br><br>
							Congratulations! We’re now considering your application for '$job->position' as per job reference<br>
							number '$job->refNum' thus, would like to promptly proceed to stage 1 of our interview process.<br><br>
							This interview will be a short session to assess and rate your communication skills that is mandatory for<br>
							the above position, hence we would like to hold a 15-20 minute of discussion over Skype as a video<br>
							conference.<br><br>
							Whilst our key objective is to take this opportunity to familiarize you for what to expect in this role in<br>
							assignments and responsibilities, during the interview we will take note and follow up on any queries you<br>
							may raise directly related to this position.<br><br>
							Please advise if the suggested date and time is suitable for stage 1 of the interview process and<br>
							Teamire’s selection criteria.<br><br>
							Date = $date<br>
							Time = $time<br><br>
							Alternatively send our HR team an email on “hrmanager@teamire.com” quoting the above job reference<br>
							and your availability for an interview within 2 business days of this message.<br><br><br>".
							"<img src='http://ictadmin.com.au/images/page_art/fa-phone_256_20_0077bb_none.png' style='width:15px;height:15px;'>"." +61 452 364 793<br>".
							"<img src='http://www.myiconfinder.com/uploads/iconsets/256-256-791373a6801d994466b6c7e8bd45289d-email.png' style='width:15px;height:15px;'>"." hrmanager@teamire.com";

	sendEmail($email, $content);

	header('Location: index.php?view=applicants');
}

function setCandidateInterview()
{
	$email = $_POST['email'];
	$Id = $_POST['resumeId'];
	$date = $_POST['date'];
	$time = $_POST['time'];

	$intDate = interview_date();
	$intDate->obj['resumeEmail'] = $email;
	$intDate->obj['date'] = $date;
	$intDate->obj['time'] = $time;
	$intDate->create();

	$candidate = candidate()->get("Id=$Id");
	$refNum = bin2hex(openssl_random_pseudo_bytes(4));

	$application = application();
	$application->obj['jobId'] = "0";
	$application->obj['jobFunctionId'] = $candidate->jobFunctionId;
	$application->obj['refNum'] = strtoupper($refNum);
	$application->obj['firstName'] = $candidate->firstName;
	$application->obj['lastName'] = $candidate->lastName;
	$application->obj['birthdate'] = $candidate->birthdate;
	$application->obj['abn'] = $candidate->abn;
	$application->obj['taxNumber'] = $candidate->taxNumber;
	$application->obj['email'] = $candidate->email;
	$application->obj['phoneNumber'] = $candidate->phoneNumber;
	$application->obj['address1'] = $candidate->address1;
	$application->obj['address2'] = $candidate->address2;
	$application->obj['city'] = $candidate->city;
	$application->obj['state'] = $candidate->state;
	$application->obj['zipCode'] = $candidate->zipCode;
	$application->obj['coverLetter'] = $candidate->coverLetter;
	$application->obj['uploadedResume'] = $candidate->uploadedResume;
	$application->obj['speedtest'] = $candidate->speedtest;
	$application->obj['uploadedSpecs'] = $candidate->uploadedSpecs;
	$application->obj['isApproved'] = "1";
	$application->create();

	$content = "Dear applicant,<br><br>
							Congratulations! We’re now considering your application thus,<br>
							we would like to promptly proceed to stage 1 of our interview process.<br><br>
							This interview will be a short session to assess and rate your communication skills that is mandatory for<br>
							the above position, hence we would like to hold a 15-20 minute of discussion over Skype as a video<br>
							conference.<br><br>
							Whilst our key objective is to take this opportunity to familiarize you for what to expect in this role in<br>
							assignments and responsibilities, during the interview we will take note and follow up on any queries you<br>
							may raise directly related to this position.<br><br>
							Please advise if the suggested date and time is suitable for stage 1 of the interview process and<br>
							Teamire’s selection criteria.<br><br>
							Date = $date<br>
							Time = $time<br><br>
							Alternatively send our HR team an email on “hrmanager@teamire.com” quoting your availability for an interview<br>
							within 2 business days of this message.<br><br><br>".
							"<img src='http://ictadmin.com.au/images/page_art/fa-phone_256_20_0077bb_none.png' style='width:15px;height:15px;'>"." +61 452 364 793<br>".
							"<img src='http://www.myiconfinder.com/uploads/iconsets/256-256-791373a6801d994466b6c7e8bd45289d-email.png' style='width:15px;height:15px;'>"." hrmanager@teamire.com";

	sendEmail($email, $content);

	header('Location: index.php?view=candidatesDetail&Id=' . $Id);
}

function assignCandidate()
{
	$Id = $_GET['Id'];
	$jobId = $_GET['jobId'];

	$application = application();
	$application->obj['jobId'] = $jobId;
	$application->update("Id='$Id'");

	__createEmployeeLogin($Id, $jobId);

	$application = application();
	$application->obj['isHired'] = "1";
	$application->update("Id='$Id'");

	header('Location: index.php');
}

function hireApplicant()
{
	if ($_GET['result']=="approve"){
		$result = '1';
		__createEmployeeLogin($_GET['Id'], $_GET['jobId']);
	}
	else{
		$result = '-1';
	}

	$Id = $_GET['Id'];
	$application = application();
	$application->obj['isHired'] = $result;
	$application->update("Id='$Id'");

	header('Location: index.php?view=scheduleInterview');
}

function __createEmployeeLogin($Id, $jobId){

	$application = application()->get("Id='$Id'");

	// Create account
	$user = user();
	$user->obj['username'] =  "E" . round(microtime(true));
	$user->obj['password'] = sha1("temppassword");
	$user->obj['firstName'] = $application->firstName;
	$user->obj['lastName'] = $application->lastName;
	$user->obj['level'] = "employee";
	$user->create();

	$emp = employee();
	$emp->obj['jobId'] = $jobId;
	$emp->obj['username'] = $user->obj['username'];
	$emp->obj['createDate'] = 'NOW()';
	$emp->create();

	$app = application();
	$app->obj['username'] = $user->obj['username'];
	$app->update("Id='$Id'");

	$job = job()->get("Id='$jobId'");

	// Send email
	$content = "Re: $job->position<br><br>
							Congratulations!<br><br>
							Welcome to Teamire! Our HR staff will soon be in contact with you to discuss your new contract in detail<br>
							and provide instructions on how to access our database for completion of weekly timesheets including<br>
							employee dashboard. Please use the credentials we have created for you.<br>
							Username: " . $user->obj['username'] . "<br>
							Password: temppassword <br><br>
							To login to our website. Please click the link below:<br>
							<a href='http://www.teamire.com/employee/?view=login'>www.teamire.com/employee/</a><br><br>
							or go to the <a href='http://www.teamire.com/home/?view=logins'>Timesheet</a> page.<br><br><br>".
							"<img src='http://ictadmin.com.au/images/page_art/fa-phone_256_20_0077bb_none.png' style='width:15px;height:15px;'>"." +61 452 364 793<br>".
							"<img src='http://www.myiconfinder.com/uploads/iconsets/256-256-791373a6801d994466b6c7e8bd45289d-email.png' style='width:15px;height:15px;'>"." hrmanager@teamire.com";

	sendEmail($application->email, $content);
}


function jobRequest()
{
	if ($_GET['result']=="approve"){
		$result = 1;
	}
	else{
		$result = 0;
	}

	$Id = $_GET['Id'];
	$job = job();
	$job->obj['isApproved'] = $result;
	$job->update("Id='$Id'");

	$job = job()->get("$Id='$Id'");

	if ($result==1){
		// Send email
		$content = __approvedJobRequestEmailMessage();
		sendEmail($job->workEmail, $content);
	}else{
		// Send email
		$content = __moreInfoTalentMessage();
		sendEmail($job->workEmail, $content);
	}

	header('Location: index.php?view=talentRequest');
}

function updateInformation()
{
	$Id = $_GET['Id'];

	$job = job();
	$job->obj['position'] = $_POST['position'];
	$job->obj['company'] = $_POST['company'];
	$job->obj['positionTypeId'] = $_POST['positionTypeId'];
	$job->obj['jobFunctionId'] = $_POST['jobFunctionId'];
	$job->obj['contactName'] = $_POST['contactName'];
	$job->obj['jobTitle'] = $_POST['jobTitle'];
	$job->obj['workEmail'] = $_POST['workEmail'];
	$job->obj['businessPhone'] = $_POST['businessPhone'];
	$job->obj['empLocation'] = $_POST['empLocation'];
	$job->obj['abn'] = $_POST['abn'];
	$job->obj['zipCode'] = $_POST['zipCode'];
	$job->obj['rate'] = $_POST['rate'];
	$job->obj['comment'] = $_POST['comment'];
	$job->obj['keySkills'] = $_POST['keySkills'];
	$job->update("Id=$Id");

	header('Location: index.php?view=jobDetail&success=You have updated the information&Id=' . $Id);
}

function updateClientInfo()
{
	$Id = $_GET['Id'];

	$company = company();
	$company->obj['name'] = $_POST['name'];
	$company->obj['abn'] = $_POST['abn'];
	$company->obj['department'] = $_POST['department'];
	$company->obj['jobFunctionId'] = $_POST['jobFunctionId'];
	$company->obj['contactPerson'] = $_POST['contactPerson'];
	$company->obj['email'] = $_POST['email'];
	$company->obj['phoneNumber'] = $_POST['phoneNumber'];
	$company->obj['mobileNumber'] = $_POST['mobileNumber'];
	$company->obj['description'] = $_POST['description'];
	$company->update("Id=$Id");

	header('Location: index.php?view=clientDetail&Id='.$Id.'&success=You have updated the information.');
}

function updateCandidateInfo()
{
	$Id = $_GET['Id'];

	$candidate = candidate();
	$candidate->obj['firstName'] = $_POST['firstName'];
	$candidate->obj['lastName'] = $_POST['lastName'];
	$candidate->obj['jobFunctionId'] = $_POST['jobFunctionId'];
	$candidate->obj['abn'] = $_POST['abn'];
	$candidate->obj['taxNumber'] = $_POST['taxNumber'];
	$candidate->obj['email'] = $_POST['email'];
	$candidate->obj['phoneNumber'] = $_POST['phoneNumber'];
	$candidate->obj['address1'] = $_POST['address1'];
	$candidate->obj['city'] = $_POST['city'];
	$candidate->obj['state'] = $_POST['state'];
	$candidate->obj['zipCode'] = $_POST['zipCode'];
	$candidate->obj['keySkills'] = $_POST['keySkills'];
	$candidate->obj['coverLetter'] = $_POST['coverLetter'];
	$candidate->update("Id=$Id");

	header('Location: index.php?view=candidateDetail&Id='.$Id.'&success=You have updated the information.');
}

function updateEmployeeInfo()
{
	$username = $_GET['username'];
	$Id = $_GET['Id'];

	$application = application();
	$application->obj['firstName'] = $_POST['firstName'];
	$application->obj['lastName'] = $_POST['lastName'];
	$application->obj['jobFunctionId'] = $_POST['jobFunctionId'];
	$application->obj['abn'] = $_POST['abn'];
	$application->obj['taxNumber'] = $_POST['taxNumber'];
	$application->obj['email'] = $_POST['email'];
	$application->obj['phoneNumber'] = $_POST['phoneNumber'];
	$application->obj['address1'] = $_POST['address1'];
	$application->obj['city'] = $_POST['city'];
	$application->obj['state'] = $_POST['state'];
	$application->obj['zipCode'] = $_POST['zipCode'];
	$application->obj['keySkills'] = $_POST['keySkills'];
	$application->obj['coverLetter'] = $_POST['coverLetter'];
	$application->update("Id=$Id");

	header('Location: index.php?view=employeeDetail&username='.$username.'&success=You have updated the information.');
}

function terminateEmployee()
{
	$username = $_GET['username'];
	$jobId = $_GET['jobId'];
	$status = $_GET['status'];

	$emp = employee();
	$emp->obj['status'] = "0";
	$emp->update("username='$username'");

	$application = application();
	$application->obj['jobId'] = "0";
	$application->obj['isApproved'] = "0";
	$application->obj['isHired'] = "0";
	$application->obj['isDeleted'] = "1";
	$application->update("username='$username'");

	$user = user();
	$user->delete("username='$username'");

	header('Location: index.php?view=employeeList&jobId='.$jobId.'&status='.$status.'&success=You have terminated an employee&username=' . $username);
}

/* ======================== Email Messages ==============================*/

function __approvedJobRequestEmailMessage(){
	return "We have approved your talent request.<br><br><br>".
					"<img src='http://ictadmin.com.au/images/page_art/fa-phone_256_20_0077bb_none.png' style='width:15px;height:15px;'>"." +61 452 364 793<br>".
					"<img src='http://www.myiconfinder.com/uploads/iconsets/256-256-791373a6801d994466b6c7e8bd45289d-email.png' style='width:15px;height:15px;'>"." hrmanager@teamire.com";
}

function __moreInfoResumeMessage(){
  return "Dear Job Seeker,<br><br>
					Thank you for showing interest in our job posting. Your inquiry for employment is<br>
					important to us. We value your time and effort in sharing your resume and contact details. To better<br>
					serve both you and our client, a Teamire recruiting staff will go through your application in detail<br>
					to verify if your profile is the best match for what our client is looking for. A member of Teamire will<br>
					contact you within 5 working days if we need to interview you for this position.<br><br><br>".
					"<img src='http://ictadmin.com.au/images/page_art/fa-phone_256_20_0077bb_none.png' style='width:15px;height:15px;'>"." +61 452 364 793<br>".
					"<img src='http://www.myiconfinder.com/uploads/iconsets/256-256-791373a6801d994466b6c7e8bd45289d-email.png' style='width:15px;height:15px;'>"." hrmanager@teamire.com";
}

function __moreInfoTalentMessage(){
	return "Dear Client,<br><br>
					Your request for talent is important to us and therefore to better serve you, we would like to have a short<br>
					10 minute meeting with you to further understand your requirements in detail of the talent you're searching for.<br>
					We realize this new talent could be someone you need find to urgently, thus expect to receive a call from a member<br>
					of our HR team within the next 2 business days. Alternatively you can call us through the number provided on the<br>
					contact form on our website.<br><br><br>".
					"<img src='http://ictadmin.com.au/images/page_art/fa-phone_256_20_0077bb_none.png' style='width:15px;height:15px;'>"." +61 452 364 793<br>".
					"<img src='http://www.myiconfinder.com/uploads/iconsets/256-256-791373a6801d994466b6c7e8bd45289d-email.png' style='width:15px;height:15px;'>"." hrmanager@teamire.com";
}
?>
