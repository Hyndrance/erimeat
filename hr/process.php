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
	$resume = resume();
	$resume->obj['isApproved'] = "-1";
	$resume->update("Id='$Id'");

	$resume = resume()->get("Id='$Id'");

	// Send email to ask more information
	$content = __moreInfoEmailMessage();
	sendEmail($resume->email, $content);

	header('Location: index.php?view=resumeList&isApproved=0&jobId=' . $resume->jobId);
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

	$res = resume();
	$res->obj['username'] = $user->obj['username'];
	$res->update("Id='$Id'");

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
