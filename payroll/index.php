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

	case 'invoiceList' :
		$currentSession = isset($_SESSION["payroll_session"]);
		$content 	= 'invoiceList.php';
		$template	= '../include/dashboard.php';
		break;

	case 'invoiceDetail' :
		$currentSession = isset($_SESSION["payroll_session"]);
		$content 	= 'invoiceDetail.php';
		$template	= '../include/dashboard.php';
		break;

	case 'archive' :
		$currentSession = isset($_SESSION["payroll_session"]);
		$content 	= 'archive.php';
		$template	= '../include/dashboard.php';
		break;

	case 'clientList' :
		$currentSession = isset($_SESSION["payroll_session"]);
		$content 	= 'clientList.php';
		$template	= '../include/dashboard.php';
		break;

	case 'clientDetail' :
		$currentSession = isset($_SESSION["payroll_session"]);
		$content 	= 'clientDetail.php';
		$template	= '../include/dashboard.php';
		break;

	case 'jobList' :
		$currentSession = isset($_SESSION["payroll_session"]);
		$content 	= 'jobList.php';
		$template	= '../include/dashboard.php';
		break;

	case 'jobDetail' :
		$currentSession = isset($_SESSION["payroll_session"]);
		$content 	= 'jobDetail.php';
		$template	= '../include/dashboard.php';
		break;

	case 'employeeList' :
		$currentSession = isset($_SESSION["payroll_session"]);
		$content 	= 'employeeList.php';
		$template	= '../include/dashboard.php';
		break;

	case 'employeeDetail' :
		$currentSession = isset($_SESSION["payroll_session"]);
		$content 	= 'employeeDetail.php';
		$template	= '../include/dashboard.php';
		break;

	case 'resumeList' :
		$currentSession = isset($_SESSION["payroll_session"]);
		$content 	= 'resumeList.php';
		$template	= '../include/dashboard.php';
		break;

	case 'resumeDetail' :
		$currentSession = isset($_SESSION["payroll_session"]);
		$content 	= 'resumeDetail.php';
		$template	= '../include/dashboard.php';
		break;

	case 'timesheetList' :
		$currentSession = isset($_SESSION["payroll_session"]);
		$content 	= 'timesheetList.php';
		$template	= '../include/dashboard.php';
		break;

	case 'timesheetDetail' :
		$currentSession = isset($_SESSION["payroll_session"]);
		$content 	= 'timesheetDetail.php';
		$template	= '../include/dashboard.php';
		break;

	default :
		$currentSession = isset($_SESSION["payroll_session"]);
		$content 	= 'main.php';
		$template	= '../include/dashboard.php';
}
$navigation = '../include/navPayroll.php';
require_once $template;
?>
