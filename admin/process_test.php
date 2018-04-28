<?php
session_start();
require_once '../config/database.php';

$action = $_GET['action'];

switch ($action) {

	case 'addJobFunction' :
		addJobFunction();
		break;

	case 'updateServices' :
		updateServices();
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

function updateServices()
{
	$Id = $_POST['Id'];
	$option = htmlspecialchars($_POST['option'], ENT_QUOTES);
	$title = htmlspecialchars($_POST['title'], ENT_QUOTES);
	$header = htmlspecialchars($_POST['header'], ENT_QUOTES);
	$description = htmlspecialchars($_POST['description'], ENT_QUOTES);

	$db = Database::connect();
	$pdo = $db->prepare("UPDATE job_function SET `option` = '$option', `title` = '$title', `header` = '$header', `description` = '$description' WHERE `Id` = '$Id'");
	$pdo->execute(array($option, $tile, $header, $desc));
	Database::disconnect();

	header('Location: ../admin/?view=services&message=You have succesfully updated a Service.');
}
?>
