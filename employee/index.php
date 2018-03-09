<?php
session_start();
include_once("../config/database.php");
include_once("../config/Models.php");

$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';

if(!isset($_SESSION["employee_session"]))
{
	 $view = "login";
 }

switch ($view) {

	case 'login' :
		$content 	= 'login.php';
		$template	= '../include/template_login.php';
		break;

	case 'dtr' :
		$content 	= 'dtr.php';
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

	case 'changepassword' :
		$content 	= 'changepassword.php';
		$template	= '../include/template_login.php';
		break;

	default :
		$content 	= 'main.php';
		$template	= '../include/dashboard.php';
}
$headScript = 'headScript.php';
$footScript = 'footScript.php';
$navigation = '../include/navEmployee.php';
require_once $template;
?>
