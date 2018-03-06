<?php
session_start();
include_once("../config/database.php");
include_once("../config/Models.php");

$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';

switch ($view) {

	case 'test' :
		$content 	= 'test.php';
		$template	= '../include/template.php';
		break;

	case 'home' :
		$content 	= 'home.php';
		$template	= '../include/template.php';
		break;

	case 'logins' :
		$content 	= 'logins.php';
		$template	= '../include/template.php';
		break;

	case 'aboutUs' :
		$content 	= 'aboutUs.php';
		$template	= '../include/template.php';
		break;

	case 'contactUs' :
		$content 	= 'contactUs.php';
		$template	= '../include/template.php';
		break;

	case 'downloads' :
		$content 	= 'downloads.php';
		$template	= '../include/template.php';
		break;

	case 'projects' :
		$content 	= 'projects.php';
		$template	= '../include/template.php';
		break;

	case 'services' :
		$content 	= 'services.php';
		$template	= '../include/template.php';
		break;

	case 'hiringForm' :
		$content 	= 'hiringForm.php';
		$template	= '../include/template.php';
		break;

	case 'success' :
		$content 	= 'success.php';
		$template	= '../include/template.php';
		break;

	case 'request_success' :
		$content 	= 'request_success.php';
		$template	= '../include/template.php';
		break;

	case 'searchJob' :
		$content 	= 'searchJob.php';
		$template	= '../include/template.php';
		break;

	case 'jobList' :
		$content 	= 'jobList.php';
		$template	= '../include/template.php';
		break;

	case 'jobDetail' :
		$content 	= 'jobDetail.php';
		$template	= '../include/template.php';
		break;

	case 'application' :
		$content 	= 'application.php';
		$template	= '../include/template.php';
		break;

	case 'submitResume' :
		$content 	= 'submitResume.php';
		$template	= '../include/template.php';
		break;

	case 'searchResume' :
		$content 	= 'searchResume.php';
		$template	= '../include/template.php';
		break;

	case 'candidateList' :
		$content 	= 'candidateList.php';
		$template	= '../include/template.php';
		break;

	case 'candidateDetail' :
		$content 	= 'candidateDetail.php';
		$template	= '../include/template.php';
		break;

	case 'clientForm' :
		$content 	= 'clientForm.php';
		$template	= '../include/template.php';
		break;

	case 'inquiryForm' :
		$content 	= 'inquiryForm.php';
		$template	= '../include/template.php';
		break;

	default :
		$content 	= 'home.php';
		$template	= '../include/template.php';
}

$headScript = 'headScript.php';
$footScript = 'footScript.php';
require_once $template;

?>
