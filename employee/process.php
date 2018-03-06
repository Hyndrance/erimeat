<?php
session_start();
require_once '../config/database.php';
require_once '../config/Models.php';

$action = $_GET['action'];

switch ($action) {

	case 'login' :
		login();
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
	// if we found an error save the error message in this variable

	$username = $_POST['username'];
	$password = $_POST['password'];

	$result = user()->get("username='$username' and password = '$password' and level='employee'");

	if ($result){
		$_SESSION['employee_session'] = $username;
		if ($password == 'temppassword'){
			header('Location: index.php?view=changepassword');
		}
		else{

			//TODO: Ano ni?!?!
		//$conn = new PDO('mysql:host=localhost; dbname=db_erimeat','root', '');

		$dateNow = date("Y-m-d");
		$checkDtr = dtr()->get("owner='$username' and createDate='$dateNow'");
		if (!$checkDtr){
				newCheckIn();
			}

				header('Location: index.php');
		}
	}
	else {
			header('Location: index.php?error=User not found in the Database');
	}
}

function newCheckIn()
{

	$dtr = dtr();
	$dtr->obj['owner'] = $_SESSION['employee_session'];
	$dtr->obj['createDate'] = "NOW()";
	$dtr->obj['checkIn'] = "NOW()";
	$dtr->create();
}

function changepassword()
{
	$password = $_POST['password'];
	$password2 = $_POST['password2'];
	$username = $_POST['username'];

	if($password == $password2){
		if($password != 'temppassword'){

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

	$ts = timesheet();
	$ts->obj['jobId'] = $emp->jobId;
	$ts->obj['employee'] = $currentUser;
	$ts->obj['name'] = 'Timesheet as of ' . date("Y-m-d H:i:s");
	$ts->create();

	$tsData = timesheet()->get("employee='$currentUser' ORDER BY ID DESC LIMIT 1");

	$dtr = dtr();
	$dtr->obj['timesheetId'] = $tsData->Id;
	$dtr->update("timesheetId = '0' and owner = '$currentUser'");

	// Update all dtr
	header('Location: index.php?a='.$ts->Id);

// $obj = new DTR;
// foreach($obj->readList($user) as $row) {
// 	if ($row->status==4 && !$row->timesheetId){
//
// 	}

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
