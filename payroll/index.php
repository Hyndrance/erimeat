<?php
session_start();
include_once("../config/database.php");
include_once("../config/Models.php");

$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';

if(!isset($_SESSION["payroll_session"]))
{
	 $view = "login";
 }


 $headScript = 'headScript.php';
 $footScript = 'footScript.php';

switch ($view) {

	case 'login' :
		$content 	= 'login.php';
		$template	= '../include/template_login.php';
		break;

	case 'timekeepingCompanyList' :
		$content 	= 'timekeepingCompanyList.php';
		$template	= '../include/dashboard.php';
		break;

	case 'timekeepingCompanyDetail' :
		$content 	= 'timekeepingCompanyDetail.php';
		$template	= '../include/dashboard.php';
		break;

	case 'timesheets' :
		$content 	= 'timesheets.php';
		$template	= '../include/dashboard.php';
		break;

	case 'timesheetDetail' :
		$content 	= 'timesheetDetail.php';
		$template	= '../include/dashboard.php';
		break;

	case 'archive' :
		$content 	= 'archive.php';
		$template	= '../include/dashboard.php';
		break;

	default :
		$content 	= 'main.php';
		$template	= '../include/dashboard.php';
}
$navigation = '../include/navPayroll.php';
require_once $template;
?>
