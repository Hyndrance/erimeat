<?php
session_start();
require_once '../config/database.php';
require_once '../config/Models.php';

$action = $_GET['action'];

switch ($action) {

	case 'login' :
		login();
		break;

	case 'logout' :
		logout();
		break;

	case 'changepassword' :
		changepassword();
		break;

	default :
}

function login()
{
	// if we found an error save the error message in this variable

	$username = $_POST['username'];
	$password = $_POST['password'];

		$result = user()->get("username='$username' and password = '$password' and level='company'");

	if ($result){
		$_SESSION['company_session'] = $username;
		$_SESSION['user_session'] = $username;
		if ($password == 'temppassword'){
			header('Location: index.php?view=changepassword');
		}
		else{
			header('Location: index.php');
		}
	}
	else {
			header('Location: index.php?error=User not found in the Database');
	}
}

function changepassword()
{
	$password = $_POST['password'];
	$password2 = $_POST['password2'];
	$username = $_POST['username'];

	if($password == $password2){
		if($password != "temppassword"){

			$user = user();
			$user->obj['password'] = $password;
			$user->update("username='$username'");

			header('Location: index.php');
		}
		else{
			header('Location: index.php?view=changepassword&error=Invalid Password');
		}
	}
	else{
		header('Location: index.php?view=changepassword&error=Password not matched');
	}
}

function logout()

{
	//logout.php
session_start();
session_destroy();
header('Location: ../home/?view=logins');
	exit;
}

?>
