<?php
session_start();
require_once '../config/database.php';
require_once '../config/Models.php';

$action = $_GET['action'];

switch ($action) {

	case 'login' :
		login();
		break;

	case 'forgotPassword' :
		forgotPassword();
		break;

	case 'checkCode' :
		checkCode();
		break;

	case 'logout' :
		logout();
		break;

	case 'changepassword' :
		changepassword();
		break;

	case 'verifyTimesheet' :
		verifyTimesheet();
		break;

	case 'disputeTimesheet' :
		disputeTimesheet();
		break;

	default :
}

function login()
{
	// if we found an error save the error message in this variable

	$username = $_POST['username'];
	$password = $_POST['password'];

		$result = user()->get("username='$username' and password = '".sha1($password)."' and level='company'");

	if ($result){
		$_SESSION['company_session'] = $username;
		if (sha1($password) == sha1('temppassword')){
			$_SESSION['temp_session'] = $username;
			header('Location: index.php?view=changepassword');
		}
		else{
			header('Location: index.php');
		}
	}
	else {
			header('Location: index.php?error=User not found in the Database');
	}
}

function forgotPassword()
{
	$username = $_POST['username'];
	$code = round(microtime(true));

	$company = company()->get("username='$username'");

	if ($company){
		$_SESSION['temp_session'] = $username;
		$_SESSION['code_session'] = $code;
		// Send email
		$content = "We have received your request. Please use this code to reset your password.<br>
								Code: " . $_SESSION['code_session'] . " <br><br>
								Teamire";
		sendEmail($company->email, $content);

		header('Location: ../company/?view=enterCode');
	}else{
		header('Location: index.php?error=User not found in the Database');
	}
}

function checkCode()
{
	$code = $_POST['code'];

	if ($code == $_SESSION['code_session']){
		header('Location: ../company/?view=changepassword');
	}else{
		header('Location: ../company/?view=enterCode&error=Invalid Code');
	}
}

function changepassword()
{
	$password = $_POST['password'];
	$password2 = $_POST['password2'];
	$username = $_POST['username'];

	if(sha1($password) == sha1($password2)){
		if(sha1($password) != sha1("temppassword")){

			$user = user();
			$user->obj['password'] = sha1($password);
			$user->update("username='$username'");

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

function verifyTimesheet()
{
	$Id = $_GET["Id"];
	$ts = timesheet();
	$ts->obj['status'] = "1";
	$ts->update("Id=$Id");

	header('Location: index.php?view=timesheetDetail&success=You have verified this timesheet&tsId=' . $Id);
}

function disputeTimesheet()
{
	$Id = $_GET['Id'];
	$ts = timesheet();
	$ts->obj['status'] = 2;
	$ts->update("Id='$Id'");

	$td = timesheet_dispute();
	$td->obj['timesheetId'] = $Id;
	$td->obj['reason'] = $_POST['reason'];
	$td->create();

		header('Location: index.php?view=timesheetDetail&success=You have disputed this timesheet&tsId=' . $Id);
}

function logout()

{
	//logout.php
session_start();
session_destroy();
header('Location: ../home/?view=logins');
	exit;
}

?>
