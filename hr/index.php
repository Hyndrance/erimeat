<?php
session_start();
include_once("../config/database.php");
include_once("../config/Models.php");

$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';

if(!isset($_SESSION["hr_session"]))
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

	case 'talentRequest' :
		$content 	= 'talentRequest.php';
		$template	= '../include/dashboard.php';
		break;

	case 'jobDetail' :
		$content 	= 'jobDetail.php';
		$template	= '../include/dashboard.php';
		break;

	case 'clientRequest' :
		$content 	= 'clientRequest.php';
		$template	= '../include/dashboard.php';
		break;

	case 'clientDetail' :
		$content 	= 'clientDetail.php';
		$template	= '../include/dashboard.php';
		break;

	case 'timekeepingCompanyList' :
		$content 	= 'timekeepingCompanyList.php';
		$template	= '../include/dashboard.php';
		break;

	case 'timekeepingCompanyDetail' :
		$content 	= 'timekeepingCompanyDetail.php';
		$template	= '../include/dashboard.php';
		break;

	case 'applicants' :
		$content 	= 'applicants.php';
		$template	= '../include/dashboard.php';
		break;

	case 'applicantDetail' :
		$content 	= 'applicantDetail.php';
		$template	= '../include/dashboard.php';
		break;

	case 'candidates' :
		$content 	= 'candidates.php';
		$template	= '../include/dashboard.php';
		break;;

	case 'candidateDetail' :
		$content 	= 'candidateDetail.php';
		$template	= '../include/dashboard.php';
		break;

	case 'setInterViewDate' :
		$content 	= 'setInterViewDate.php';
		$template	= '../include/dashboard.php';
	  $footScript = 'calendarFootScript.php';
		break;

	case 'scheduleInterview' :
		$content 	= 'scheduleInterview.php';
		$template	= '../include/dashboard.php';
		break;

	case 'hiringApplicant' :
		$content 	= 'hiringApplicant.php';
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

	default :
		$content 	= 'main.php';
		$template	= '../include/dashboard.php';
}
$navigation = '../include/navHr.php';
require_once $template;
?>
