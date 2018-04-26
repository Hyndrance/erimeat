<?php
session_start();
require_once '../config/database.php';

$action = $_GET['action'];

switch ($action) {

	case 'addJobFunction' :
		addJobFunction();
		break;

	default :
}

function addJobFunction()
{
	$option = htmlspecialchars($_POST["option"], ENT_QUOTES);
	$desc = htmlspecialchars($_POST["description"], ENT_QUOTES);

	$db = Database::connect();
	$pdo = $db->prepare("INSERT INTO job_function (`option`, `description`) VALUES (?, ?)");
	$pdo->execute(array($option, $desc));
	Database::disconnect();

	header('Location: ../admin/?view=jobCategory&message=You have succesfully added a new Job Category.');
}
?>
