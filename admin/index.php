<?php
session_start();
include_once("../config/database.php");
include_once("../config/Models.php");

$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';

// Initial inclusion
$headScript = 'headScript.php';
$footScript = 'footScript.php';
$navigation = '../include/navAdmin.php';

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
		$currentSession = isset($_SESSION["admin_session"]);
		$content 	= 'talentRequest.php';
		$template	= '../include/dashboard.php';
		break;

	case 'talentDetail' :
		$currentSession = isset($_SESSION["admin_session"]);
		$content 	= 'talentDetail.php';
		$template	= '../include/dashboard.php';
		break;

	case 'clientRequest' :
		$currentSession = isset($_SESSION["admin_session"]);
		$content 	= 'clientRequest.php';
		$template	= '../include/dashboard.php';
		break;

	case 'clientDetail' :
		$currentSession = isset($_SESSION["admin_session"]);
		$content 	= 'clientDetail.php';
		$template	= '../include/dashboard.php';
		break;

	case 'scheduleInterview' :
		$currentSession = isset($_SESSION["admin_session"]);
		$content 	= 'scheduleInterview.php';
		$template	= '../include/dashboard.php';
		break;

	case 'timekeeping' :
		$currentSession = isset($_SESSION["admin_session"]);
		$content 	= 'timekeeping.php';
		$template	= '../include/dashboard.php';
		break;

	case 'timesheetList' :
		$currentSession = isset($_SESSION["admin_session"]);
		$content 	= 'timesheetList.php';
		$template	= '../include/dashboard.php';
		break;

	case 'timesheetDetail' :
		$currentSession = isset($_SESSION["admin_session"]);
		$content 	= 'timesheetDetail.php';
		$template	= '../include/dashboard.php';
		break;

	case 'hiringApplicant' :
		$currentSession = isset($_SESSION["admin_session"]);
		$content 	= 'hiringApplicant.php';
		$template	= '../include/dashboard.php';
		break;

	case 'jobList' :
		$currentSession = isset($_SESSION["admin_session"]);
		$content 	= 'jobList.php';
		$template	= '../include/dashboard.php';
		break;

	case 'jobDetail' :
		$currentSession = isset($_SESSION["admin_session"]);
		$content 	= 'jobDetail.php';
		$template	= '../include/dashboard.php';
		break;

	case 'employeeList' :
		$currentSession = isset($_SESSION["admin_session"]);
		$content 	= 'employeeList.php';
		$template	= '../include/dashboard.php';
		break;

	case 'employeeDetail' :
		$currentSession = isset($_SESSION["admin_session"]);
		$content 	= 'employeeDetail.php';
		$template	= '../include/dashboard.php';
		break;

	case 'resumeList' :
		$currentSession = isset($_SESSION["admin_session"]);
		$content 	= 'resumeList.php';
		$template	= '../include/dashboard.php';
		break;

	case 'resumeDetail' :
		$currentSession = isset($_SESSION["admin_session"]);
		$content 	= 'resumeDetail.php';
		$template	= '../include/dashboard.php';
		break;

	case 'clientDetail' :
		$currentSession = isset($_SESSION["admin_session"]);
		$content 	= 'clientDetail.php';
		$template	= '../include/dashboard.php';
		break;

	case 'invoiceList' :
		$currentSession = isset($_SESSION["admin_session"]);
		$content 	= 'invoiceList.php';
		$template	= '../include/dashboard.php';
		break;

	case 'invoiceDetail' :
		$currentSession = isset($_SESSION["admin_session"]);
		$content 	= 'invoiceDetail.php';
		$template	= '../include/dashboard.php';
		break;

	case 'accounts' :
		$currentSession = isset($_SESSION["admin_session"]);
		$content 	= 'accounts.php';
		$template	= '../include/dashboard.php';
		break;

	case 'countries' :
		$currentSession = isset($_SESSION["admin_session"]);
		$content 	= 'countries.php';
		$template	= '../include/dashboard.php';
		break;

	case 'cities' :
		$currentSession = isset($_SESSION["admin_session"]);
		$content 	= 'cities.php';
		$template	= '../include/dashboard.php';
		break;

	case 'clientList' :
		$currentSession = isset($_SESSION["admin_session"]);
		$content 	= 'clientList.php';
		$template	= '../include/dashboard.php';
		break;

	case 'candidates' :
		$currentSession = isset($_SESSION["admin_session"]);
		$content 	= 'candidates.php';
		$template	= '../include/dashboard.php';
		break;

	case 'candidatesDetail' :
		$currentSession = isset($_SESSION["admin_session"]);
		$content 	= 'candidatesDetail.php';
		$template	= '../include/dashboard.php';
		break;

	case 'jobCategory' :
		$currentSession = isset($_SESSION["admin_session"]);
		$content 	= 'jobCategory.php';
		$template	= '../include/dashboard.php';
		break;

	case 'services' :
		$currentSession = isset($_SESSION["admin_session"]);
		$content 	= 'services.php';
		$template	= '../include/dashboard.php';
		break;

	case 'faq' :
		$currentSession = isset($_SESSION["admin_session"]);
		$content 	= 'faq.php';
		$template	= '../include/dashboard.php';
		break;

	case 'projects' :
		$currentSession = isset($_SESSION["admin_session"]);
		$content 	= 'projects.php';
		$template	= '../include/dashboard.php';
		break;

	case 'downloads' :
		$currentSession = isset($_SESSION["admin_session"]);
		$content 	= 'downloads.php';
		$template	= '../include/dashboard.php';
		break;

	case 'reports' :
		$currentSession = isset($_SESSION["admin_session"]);
		$content 	= 'reports.php';
		$template	= '../include/dashboard.php';
		break;
	case 'fetch_service' :
		$currentSession = isset($_SESSION["admin_session"]);
		$content 	= 'fetch_service.php';
		$template	= '../include/dashboard.php';
		break;

	default :
		$currentSession = isset($_SESSION["admin_session"]);
		$content 	= 'main.php';
		$template	= '../include/dashboard.php';
}
require_once $template;
?>
