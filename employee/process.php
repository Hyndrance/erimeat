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

	case 'submitTimesheet' :
		submitTimesheet();
		break;

	case 'newCheckIn' :
		newCheckIn();
		break;

	case 'logout' :
		logout();
		break;

	case 'changepassword' :
		changepassword();
		break;

	case 'stampBreak' :
		stampBreak();
		break;

	case 'stampBreak2' :
		stampBreak2();
		break;

	case 'stampLunch' :
		stampLunch();
		break;

	case 'stampCheckIn' :
		stampCheckIn();
		break;

	case 'stampCheckOut' :
		stampCheckOut();
		break;

	default :
}

function login()
{
	$username = $_POST['username'];
	$password = $_POST['password'];

	$result = user()->get("username='$username' and password = '".sha1($password)."' and level='employee'");

	if ($result){
		$_SESSION['employee_session'] = $username;
		if (sha1($password) == sha1('temppassword')){
			$_SESSION['temp_session'] = $username;
			header('Location: index.php?view=changepassword');
		}
		else{

		$dateNow = date("Y-m-d");
		$checkDtr = dtr()->get("owner='$username' and createDate='$dateNow'");
		if (!$checkDtr){
				newCheckIn();
			}
			else{
				header('Location: index.php');
			}
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

	$resume = resume()->get("username='$username'");

	if ($resume){
		$_SESSION['temp_session'] = $username;
		$_SESSION['code_session'] = $code;
		// Send email
		$content = "We have received your request. Please use this code to reset your password.<br>
								Code: " . $_SESSION['code_session'] . " <br><br>
								Teamire";
		sendEmail($resume->email, $content);

		header('Location: ../employee/?view=enterCode');
	}else{
		header('Location: index.php?error=User not found in the Database');
	}
}

function checkCode()
{
	$code = $_POST['code'];

	if ($code == $_SESSION['code_session']){
		header('Location: ../employee/?view=changepassword');
	}else{
		header('Location: ../employee/?view=enterCode&error=Invalid Code');
	}
}

function newCheckIn()
{

	$dtr = dtr();
	$dtr->obj['owner'] = $_SESSION['employee_session'];
	$dtr->obj['createDate'] = date("Y-m-d");
	$dtr->obj['checkIn'] = "NOW()";
	$dtr->create();

	header('Location: index.php?');
}

function changepassword()
{
	$password = $_POST['password'];
	$password2 = $_POST['password2'];
	$username = $_POST['username'];

	if(sha1($password) == sha1($password2)){
		if(sha1($password) != sha1("temppassword")){

			$user = user();
			$user->obj['password'] = $password;
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

function stampCheckIn(){

	$username = $_SESSION['employee_session'];
	$dateNow = date("Y-m-d");
	$dtr = dtr()->get("owner='$username' and createDate='$dateNow'");

	if ($dtr->status == 1)
	{
		__breakIn();
	}

	if ($dtr->status == 2)
	{
		__breakIn2();
	}

	if ($dtr->status == 3)
	{
		__lunchIn();
	}

}

function __breakIn(){

	$currentUser = $_SESSION['employee_session'];
	$currentDate = date("Y-m-d");

	$dtr = dtr();
	$dtr->obj['breakIn'] = "NOW()";
	$dtr->obj['status'] = "0";
	$dtr->update("owner='$currentUser' and createDate='$currentDate'");

	header('Location: index.php');
}

function __breakIn2(){

	$currentUser = $_SESSION['employee_session'];
	$currentDate = date("Y-m-d");

	$dtr = dtr();
	$dtr->obj['breakIn2'] = "NOW()";
	$dtr->obj['status'] = "0";
	$dtr->update("owner='$currentUser' and createDate='$currentDate'");

	header('Location: index.php');
}

function __lunchIn(){

	$currentUser = $_SESSION['employee_session'];
	$currentDate = date("Y-m-d");

	$dtr = dtr();
	$dtr->obj['lunchIn'] = "NOW()";
	$dtr->obj['status'] = "0";
	$dtr->update("owner='$currentUser' and createDate='$currentDate'");

	header('Location: index.php');
}

function stampBreak(){

	$currentUser = $_SESSION['employee_session'];
	$currentDate = date("Y-m-d");

	$dtr = dtr();
	$dtr->obj['breakOut'] = "NOW()";
	$dtr->obj['status'] = "1";
	$dtr->update("owner='$currentUser' and createDate='$currentDate'");

	header('Location: index.php');
}

function stampBreak2(){

	$currentUser = $_SESSION['employee_session'];
	$currentDate = date("Y-m-d");

	$dtr = dtr();
	$dtr->obj['breakOut2'] = "NOW()";
	$dtr->obj['status'] = "2";
	$dtr->update("owner='$currentUser' and createDate='$currentDate'");

	header('Location: index.php');
}


function stampLunch(){

	$currentUser = $_SESSION['employee_session'];
	$currentDate = date("Y-m-d");

	$dtr = dtr();
	$dtr->obj['lunchOut'] = "NOW()";
	$dtr->obj['status'] = "3";
	$dtr->update("owner='$currentUser' and createDate='$currentDate'");

	header('Location: index.php');
}


function stampCheckOut(){

	$currentUser = $_SESSION['employee_session'];
	$currentDate = date("Y-m-d");

	$dtr = dtr();
	$dtr->obj['checkOut'] = "NOW()";
	$dtr->obj['status'] = "4";
	$dtr->update("owner='$currentUser' and createDate='$currentDate'");

	header('Location: index.php');
}


function submitTimesheet()
{
	$currentUser = $_SESSION['employee_session'];
	// Get jobId
	$emp = employee()->get("username='$currentUser'");

	// Create Timesheet
	$ts = timesheet();
	$ts->obj['jobId'] = $emp->jobId;
	$ts->obj['employee'] = $currentUser;
	$ts->obj['name'] = 'Timesheet as of ' . date("Y-m-d H:i:s");
	$ts->obj['createDate'] = 'NOW()';
	$ts->create();

	// Get the latest timesheet
	$tsData = timesheet()->get("employee='$currentUser' ORDER BY ID DESC LIMIT 1");

	// Update all DTR with the new timesheet
	$dtr = dtr();
	$dtr->obj['timesheetId'] = $tsData->Id;
	$dtr->update("timesheetId='0' and owner='$currentUser' and status='4' ");

	// Get job functionId
	$job = job()->get("Id=$emp->jobId");
	// Get Hr email by jobFunctionId
	$hrList = admin()->list("jobFunctionId='$job->jobFunctionId'");
	$payrollList = admin()->list("level='payroll'");

	// Send email to HR
	$emailContent = "A new timesheet has been sent. Please check your teamire account";

	foreach($hrList as $row){
		sendEmail($row->email, $emailContent);
	}
	foreach($payrollList as $row){
		sendEmail($row->email, $emailContent);
	}

	// Update all dtr
	header('Location: index.php');

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
