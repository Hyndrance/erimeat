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
	$content = __moreInfoEmailMessage();
	sendEmail($candidate->email, $content);

	header('Location: index.php?view=resumeList&isApproved=0&jobId=' . $candidate->jobId);
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
	$intDate->obj['resumeId'] = $Id;
	$intDate->obj['date'] = $date;
	$intDate->obj['time'] = $time;
	$intDate->create();

	$application = application();
	$application->obj['isApproved'] = "1";
	$application->update("Id='$Id'");

	$content = "We have considered your application. Please be available on the schedule below<br>
							for your interview.<br><br>
							Date = $date<br>
							Time = $time<br><br>
							Teamire";
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

	$content = "We have considered your application. Please be available on the schedule below<br>
							for your interview.<br><br>
							Date = $date<br>
							Time = $time<br><br>
							Teamire";
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
	$content = "Congratulations!<br><br>
							You are hired. We have approved your application for <b> " . $job->position . "</b>. Please use the credentials we have created for you.<br>
							Username: " . $user->obj['username'] . "<br>
							Password: temppassword<br><br>
							To login to our website. Please click the link below:<br>
							<a href='http://bandbajabaraath.com/employee/?view=login'>www.bandbajabaraath.com/employee/</a><br><br>
							or go to the <a href='http://bandbajabaraath.com/home/?view=logins'>Timesheet</a> page<br><br>
							Teamire";
	sendEmail($application->email, $content);
}


function jobRequest()
{
	if ($_GET['result']=="approve"){
		$result = 1;
	}
	else{
		$result = -1;
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
		$content = __moreInfoEmailMessage();
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
	$job->update("Id=$Id");

	header('Location: index.php?view=jobDetail&success=You have updated the information&Id=' . $Id);
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
	return "We have approved your talent request.<br><br>
					Teamire";
}

function __moreInfoEmailMessage(){
	return "Hi, we have received and reviewed your request but we still haven't approved it yet as it did not<br><br>
					meet our requirements. Someone from our team will contact you through your contact number you provided.<br><br>
					Teamire";
}
?>
