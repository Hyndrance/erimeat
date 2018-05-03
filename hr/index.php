<?php
session_start();
include_once("../config/database.php");
include_once("../config/Models.php");

$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';

 $headScript = 'headScript.php';
 $footScript = 'footScript.php';

switch ($view) {

	case 'login' :
		$content 	= 'login.php';
		$template	= '../include/template_login.php';
		break;

	case 'changepassword' :
		$content 	= 'changepassword.php';
		$template	= '../include/template_login.php';
		break;

	case 'talentRequest' :
		$currentSession = isset($_SESSION["hr_session"]);
		$content 	= 'talentRequest.php';
		$template	= '../include/dashboard.php';
		break;

	case 'clientRequest' :
		$currentSession = isset($_SESSION["hr_session"]);
		$content 	= 'clientRequest.php';
		$template	= '../include/dashboard.php';
		break;

	case 'applicants' :
		$currentSession = isset($_SESSION["hr_session"]);
		$content 	= 'applicants.php';
		$template	= '../include/dashboard.php';
		break;

	case 'candidates' :
		$currentSession = isset($_SESSION["hr_session"]);
		$content 	= 'candidates.php';
		$template	= '../include/dashboard.php';
		break;

	case 'employees' :
		$currentSession = isset($_SESSION["hr_session"]);
		$content 	= 'employees.php';
		$template	= '../include/dashboard.php';
		break;

	case 'candidatesDetail' :
		$currentSession = isset($_SESSION["hr_session"]);
		$content 	= 'candidatesDetail.php';
		$template	= '../include/dashboard.php';
		break;

	case 'setInterViewDate' :
		$currentSession = isset($_SESSION["hr_session"]);
		$content 	= 'setInterViewDate.php';
		$template	= '../include/dashboard.php';
	  $footScript = 'calendarFootScript.php';
		break;

	case 'scheduleInterview' :
		$currentSession = isset($_SESSION["hr_session"]);
		$content 	= 'scheduleInterview.php';
		$template	= '../include/dashboard.php';
		break;

	case 'openJobs' :
		$currentSession = isset($_SESSION["hr_session"]);
		$content 	= 'openJobs.php';
		$template	= '../include/dashboard.php';
		break;
// clients detail

  case 'clientList' :
    $currentSession = isset($_SESSION["hr_session"]);
    $content 	= 'clientList.php';
    $template	= '../include/dashboard.php';
    break;

  case 'clientDetail' :
    $currentSession = isset($_SESSION["hr_session"]);
    $content 	= 'clientDetail.php';
    $template	= '../include/dashboard.php';
    break;

  case 'jobList' :
    $currentSession = isset($_SESSION["hr_session"]);
    $content 	= 'jobList.php';
    $template	= '../include/dashboard.php';
    break;

  case 'jobDetail' :
    $currentSession = isset($_SESSION["hr_session"]);
    $content 	= 'jobDetail.php';
    $template	= '../include/dashboard.php';
    break;

  case 'employeeList' :
    $currentSession = isset($_SESSION["hr_session"]);
    $content 	= 'employeeList.php';
    $template	= '../include/dashboard.php';
    break;

  case 'employeeDetail' :
    $currentSession = isset($_SESSION["hr_session"]);
    $content 	= 'employeeDetail.php';
    $template	= '../include/dashboard.php';
    break;

  case 'timesheetList' :
    $currentSession = isset($_SESSION["hr_session"]);
    $content 	= 'timesheetList.php';
    $template	= '../include/dashboard.php';
    break;

  case 'timesheetDetail' :
    $currentSession = isset($_SESSION["hr_session"]);
    $content 	= 'timesheetDetail.php';
    $template	= '../include/dashboard.php';
    break;

  case 'resumeList' :
    $currentSession = isset($_SESSION["hr_session"]);
    $content 	= 'resumeList.php';
    $template	= '../include/dashboard.php';
    break;

  case 'resumeDetail' :
    $currentSession = isset($_SESSION["hr_session"]);
    $content 	= 'resumeDetail.php';
    $template	= '../include/dashboard.php';
    break;

	case 'invoiceList' :
		$currentSession = isset($_SESSION["hr_session"]);
		$content 	= 'invoiceList.php';
		$template	= '../include/dashboard.php';
		break;

	case 'invoiceDetail' :
		$currentSession = isset($_SESSION["hr_session"]);
		$content 	= 'invoiceDetail.php';
		$template	= '../include/dashboard.php';
		break;

	default :
		$currentSession = isset($_SESSION["hr_session"]);
		$content 	= 'main.php';
		$template	= '../include/dashboard.php';
}
$navigation = '../include/navHr.php';
require_once $template;
?>
