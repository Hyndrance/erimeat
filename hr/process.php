<?php
session_start();
require_once '../config/database.php';
require_once '../config/Models.php';

$action = $_GET['action'];

switch ($action) {

	case 'login' :
		login();
		break;

	case 'logout' :
		logout();
		break;

	case 'addExperience' :
		addExperience();
		break;

	case 'jobRequest' :
		jobRequest();
		break;

	case 'clientRequest' :
		clientRequest();
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

	case 'approveTimesheet' :
		approveTimesheet();
		break;

	default :
}

function login()
{
	// if we found an error save the error message in this variable

	$username = $_POST['username'];
	$password = $_POST['password'];

	$result = admin()->get("username='$username' and password = '$password' and level='hr'");

	if ($result){
		$_SESSION['hr_session'] = $username;
		header('Location: index.php');
	}
	else {
			header('Location: index.php?error=User not found in the Database');
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

function denyResume()
{
	$Id=$_GET['Id'];
	$resume = resume();
	$resume->obj['isApproved'] = "-1";
	$resume->update("Id='$Id'");

	$resume = resume()->get("Id='$Id'");

	// Send email
	$content = __moreInfoEmailMessage();
	sendEmail($resume->email, $content);

	header('Location: index.php?view=applicants');
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

	$resume = resume();
	$resume->obj['isApproved'] = "1";
	$resume->update("Id='$Id'");

	$content = "We have considered your application. Please be available on the schedule below<br>
							for your interview.<br><br>
							Date = $date<br>
							Time = $time<br><br>
							Teamire";
	sendEmail($email, $content);

	header('Location: index.php?view=applicants');
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
	$resume = resume();
	$resume->obj['isHired'] = $result;
	$resume->update("Id='$Id'");

	header('Location: index.php?view=scheduleInterview');
}

function __createEmployeeLogin($Id, $jobId){

	$resume = resume()->get("Id='$Id'");

	// Create account
	$user = user();
	$user->obj['username'] =  "E" . round(microtime(true));
	$user->obj['password'] = "temppassword";
	$user->obj['firstName'] = $resume->firstName;
	$user->obj['lastName'] = $resume->lastName;
	$user->obj['level'] = "employee";
	$user->create();

	$emp = employee();
	$emp->obj['jobId'] = $jobId;
	$emp->obj['username'] = $user->obj['username'];
	$emp->obj['createDate'] = 'NOW()';
	$emp->create();

	// Send email
	$content = "Congratulations!<br><br>
							You are hired. We have approved your application. Please use the credentials we have created for you.<br>
							Username: " . $user->obj['username'] . "<br>
							Password: " . $user->obj['password'] . "<br><br>
							To login to our website. Please click the link below:<br>
							<a href='www.bandbajabaraath.kovasaf.com/employee/index.php?view=changepassword'>www.bandbajabaraath.kovasaf.com</a><br><br>
							Teamire";
	sendEmail($resume->email, $content);
}

function clientRequest()
{
	if ($_GET['result']=="approve"){
		$result = 1;
		__createClientLogin($_GET['Id']);
	}else{
		$result = -1;
	}

	$Id = $_GET['Id'];
	$company = company();
	$company->obj['isApproved'] = $result;
	$company->update("Id='$Id'");

	$comp = company()->get("Id='$Id'");

	if ($result!=1){
		// Send email
		$content = __moreInfoEmailMessage();
		sendEmail($comp->email, $content);
}

	header('Location: index.php?view=clientRequest');
}

function __createClientLogin($Id){
	// Get Detail
	$comp = company()->get("Id='$Id'");

	// Create account
	$obj = new Profile;
	$user = user();
	$user->obj['username'] = "C" . $comp->abn;
	$user->obj['password'] = "temppassword";
	$user->obj['firstName'] = $comp->contactPerson;
	$user->obj['lastName'] = $comp->name;
	$user->obj['level'] = "company";
	$obj->create();

	// Update Company
	$comp = company();
	$comp->obj['username'] = $obj->username;
	$comp->update("Id='$Id'");

	// Send email
	$content = "We have approved your request. Please use the credentials we have created for you.<br>
							Username: $user->obj['username'] <br>
							Password: $user->obj['password'] <br><br>
							To login to our website. Please click the link below:<br>
							<a href='www.bandbajabaraath.kovasaf.com/company/index.php?view=changepassword'>www.bandbajabaraath.kovasaf.com</a><br><br>
							Teamire";
	sendEmail($comp->obj['email'], $content);
}

function changepassword()
{
	$username = $_POST['username'];
	$password = $_POST['password'];
	$password2 = $_POST['password2'];

	if($password == $password2){
		if($password != 'temppassword'){
			$obj = new Profile;
			$user = user();
			$user->obj['password'] = $password;
			$user->update("username=$username");

			header('Location: ../account/');
		}
		else{
			header('Location: index.php?view=changepassword&error=Invalid Password');
		}
	}
	else{
		header('Location: index.php?view=changepassword&error=Password not matched');
	}
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

/* ======================== Email Messages ==============================*/

function __approvedJobRequestEmailMessage(){
	return "We have approved your request.<br><br>
					Teamire";
}

function __moreInfoEmailMessage(){
	return "Hi, we have received and reviewed your request but we still haven't approved it yet as it did not<br><br>
					meet our requirements. Someone from our team will contact you through your contact number you provided.<br><br>
					Teamire";
}
?>
