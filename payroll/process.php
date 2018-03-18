<?php
session_start();
require_once '../config/database.php';
require_once '../config/Models.php';

$action = $_GET['action'];

switch ($action) {

	case 'approveTimesheet' :
		approveTimesheet();
		break;

	case 'disputeTimesheet' :
		disputeTimesheet();
		break;

	case 'login' :
		login();
		break;

	case 'logout' :
		logout();
		break;

	default :
}

function approveTimesheet()
{
	$Id = $_GET['Id'];
	$ts = timesheet();
	$ts->obj['status'] = 3;
	$ts->update("Id='$Id'");

	$ts = timesheet()->get("Id='$Id'");

	$invoice = invoice();
	$invoice->obj['refNum'] = round(microtime(true));
	$invoice->obj['owner'] = $ts->employee;
	$invoice->create();

	header('Location: index.php');
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

	header('Location: index.php');
}

function login()
{
	// if we found an error save the error message in this variable
	$username = $_POST['username'];
	$password = $_POST['password'];

	$result = admin()->get("username='$username' and password = '$password' and level='payroll'");

	if ($result){
		$_SESSION['payroll_session'] = $username;
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
?>
