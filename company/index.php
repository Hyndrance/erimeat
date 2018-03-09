<?php
session_start();
include_once("../config/database.php");
include_once("../config/Models.php");

$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';

if(!isset($_SESSION["company_session"]))
{
	 $view = "login";
 }

switch ($view) {

	case 'login' :
		$content 	= 'login.php';
		$template	= '../include/template_login.php';
		break;

	case 'changepassword' :
		$content 	= 'changepassword.php';
		$template	= '../include/template_login.php';
		break;

	case 'postedJobs' :
		$content 	= 'postedJobs.php';
		$template	= '../include/dashboard.php';
		break;

	case 'jobDetail' :
		$content 	= 'jobDetail.php';
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

	case 'ongoingProjects' :
		$content 	= 'ongoingProjects.php';
		$template	= '../include/dashboard.php';
		break;

	case 'timekeeping' :
		$content 	= 'timekeeping.php';
		$template	= '../include/dashboard.php';
		break;

	case 'reports' :
		$content 	= 'reports.php';
		$template	= '../include/dashboard.php';
		break;

	default :
		$content 	= 'main.php';
		$template	= '../include/dashboard.php';
}
$headScript = 'headScript.php';
$footScript = 'footScript.php';
$navigation = '../include/navCompany.php';
require_once $template;

?>
