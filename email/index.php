<?php
include_once("../config/database.php");
include_once("../config/CRUD.php");

$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';

switch ($view) {

    case 'email' :
        $content    = 'email.php';
            $template   = '../include/template_login.php';
        break;

    default :
        $content    = 'email.php';
            $template   = '../include/template_login.php';
}

$headScript = 'headScript.php';
$footScript = 'footScript.php';
require_once $template;

?>
