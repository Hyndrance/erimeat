<?php
session_start();
include_once("../config/database.php");
include_once("../config/Models.php");

$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';

switch ($view) {

	case 'login' :
		$content 	= 'login.php';
		$template	= '../include/template_login.php';
		break;

	case 'forgotPassword' :
		$content 	= 'forgotPassword.php';
		$template	= '../include/template_login.php';
		break;

	case 'enterCode' :
		$content 	= 'enterCode.php';
		$template	= '../include/template_login.php';
		break;

	case 'changepassword' :
		$content 	= 'changepassword.php';
		$template	= '../include/template_login.php';
		break;

	case 'reports' :
		$currentSession = isset($_SESSION["company_session"]);
		$content 	= 'reports.php';
		$template	= '../include/dashboard.php';
		break;

	case 'jobList' :
		$currentSession = isset($_SESSION["company_session"]);
		$content 	= 'jobList.php';
		$template	= '../include/dashboard.php';
		break;

	case 'jobDetail' :
		$currentSession = isset($_SESSION["company_session"]);
		$content 	= 'jobDetail.php';
		$template	= '../include/dashboard.php';
		break;

	case 'employeeList' :
		$currentSession = isset($_SESSION["company_session"]);
		$content 	= 'employeeList.php';
		$template	= '../include/dashboard.php';
		break;

	case 'employeeDetail' :
		$currentSession = isset($_SESSION["company_session"]);
		$content 	= 'employeeDetail.php';
		$template	= '../include/dashboard.php';
		break;

	case 'resumeList' :
		$currentSession = isset($_SESSION["company_session"]);
		$content 	= 'jobList.php';
		$template	= '../include/dashboard.php';
		break;

	case 'resumeDetail' :
		$currentSession = isset($_SESSION["company_session"]);
		$content 	= 'resumeDetail.php';
		$template	= '../include/dashboard.php';
		break;

	case 'timesheetList' :
		$currentSession = isset($_SESSION["company_session"]);
		$content 	= 'timesheetList.php';
		$template	= '../include/dashboard.php';
		break;

	case 'timesheetDetail' :
		$currentSession = isset($_SESSION["company_session"]);
		$content 	= 'timesheetDetail.php';
		$template	= '../include/dashboard.php';
		break;

	default :
		$currentSession = isset($_SESSION["company_session"]);
		$content 	= 'main.php';
		$template	= '../include/dashboard.php';
}
$headScript = 'headScript.php';
$footScript = 'footScript.php';
$navigation = '../include/navCompany.php';
require_once $template;

?>
