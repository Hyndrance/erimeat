<?php
session_start();
require_once '../config/database.php';
require_once '../config/Models.php';

$action = $_GET['action'];

switch ($action) {

	case 'jobRequest' :
		jobRequest();
		break;

	case 'clientRequest' :
		clientRequest();
		break;

	case 'addAccount' :
		addAccount();
		break;

	case 'addProject' :
		addProject();
		break;

	case 'addJobFunction' :
		addJobFunction();
		break;

	case 'addFileFunction' :
		addFileFunction();
		break;

	case 'removeJobFunction' :
		removeJobFunction();
		break;

	case 'login' :
		login();
		break;

	case 'logout' :
		logout();
		break;

	case 'removeCompany' :
		removeCompany();
		break;

	case 'removeJob' :
		removeJob();
		break;

	case 'removeCandidate' :
		removeCandidate();
		break;

	default :
}





function addAccount()
{


	$username = $_POST['username'];
	$checkUser = admin()->get("username='$username'");

	if($checkUser){
		header('Location: ../admin/?view=accounts&error=User already exist!');
	}
	else{
		$admin = admin();
		$admin->obj['firstName'] = $_POST['firstName'];
		$admin->obj['lastName'] = $_POST['lastName'];
		$admin->obj['email'] = $_POST['email'];
		$admin->obj['username'] = $_POST['username'];
		$admin->obj['password'] = $_POST['password'];
		$admin->obj['level'] = $_POST['level'];
		$admin->obj['jobFunctionId'] = $_POST['jobFunctionId'];
		$admin->create();


		header('Location: ../admin/?view=success');
	}
}

function addProject()
{
	$upload = uploadFile($_FILES['upload_file']);
	if ($upload)
	{
		$projects = projects();
		$projects->obj['title'] = $_POST['title'];
		$projects->obj['content'] = $_POST['content'];
		$projects->obj['uploadedImage'] = $upload;
		$projects->obj['createDate'] = "NOW()";
		$projects->create();

		header('Location: ../admin/?view=success');
	}else{
		header('Location: ../admin/?error=Not uploaded');
	}
}

function addJobFunction()
{
	$jf = job_function();
	$jf->obj['option'] = $_POST['option'];
	$jf->create();

	header('Location: ../admin/?view=jobCategory&message=You have succesfully added a new Job Category!');
}

function addFileFunction(){

		$upload = uploadFile($_FILES['upload_file']);
		if ($upload)
		{
			$res = downloads();
			$res->obj['fileName'] = $_POST["fileName"];
			$res->obj['uploadedFile'] = $upload;
			$res->create();
			header('Location: ../admin/?view=success');
		}
		else{
			header('Location: ../admin/?error=Not uploaded');
		}
}
function login()
{
	// if we found an error save the error message in this variable
	$username = $_POST['username'];
	$password = $_POST['password'];
	$result = admin()->get("username='$username' and password = '$password' and level='admin'");
	if ($result){
		$_SESSION['admin_session'] = $username;
		header('Location: index.php');
	}
	else {
			header('Location: index.php?error=User not found in the Database');
	}
}


function jobRequest()
{
	if ($_GET['result']=="approve"){
		$result = 1;
	}
	else{
		$result = -1;
	}

	$Id = $_GET['Id'];
	$job = job();
	$job->obj['isApproved'] = $result;
	$job->update("Id='$Id'");

	$job = job()->get("$Id='$Id'");

	if ($result==1){
		// Send email
		$content = __approvedJobRequestEmailMessage();
		sendEmail($job->workEmail, $content);
	}else{
		// Send email
		$content = __moreInfoEmailMessage();
		sendEmail($job->workEmail, $content);
	}

	header('Location: index.php?view=talentRequest');
}

function clientRequest()
{
	if ($_GET['result']=="approve"){
		$result = 1;
		__createClientLogin($_GET['Id']);
	}else{
		$result = -1;
	}

	$Id = $_GET['Id'];
	$company = company();
	$company->obj['isApproved'] = $result;
	$company->update("Id='$Id'");

	$comp = company()->get("Id='$Id'");

	if ($result!=1){
		// Send email
		$content = __moreInfoEmailMessage();
		sendEmail($comp->email, $content);
}

	header('Location: index.php?view=clientRequest');
}

function __createClientLogin($Id){
	// Get Detail
	$comp = company()->get("Id='$Id'");

	// Create account
	$obj = new Profile;
	$user = user();
	$user->obj['username'] = "C" . $comp->abn;
	$user->obj['password'] = "temppassword";
	$user->obj['firstName'] = $comp->contactPerson;
	$user->obj['lastName'] = $comp->name;
	$user->obj['level'] = "company";
	$obj->create();

	// Update Company
	$comp = company();
	$comp->obj['username'] = $obj->username;
	$comp->update("Id='$Id'");

	// Send email
	$content = "We have approved your request. Please use the credentials we have created for you.<br>
							Username: $user->obj['username'] <br>
							Password: $user->obj['password'] <br><br>
							To login to our website. Please click the link below:<br>
							<a href='www.bandbajabaraath.kovasaf.com/company/index.php?view=changepassword'>www.bandbajabaraath.kovasaf.com</a><br><br>
							Teamire";
	sendEmail($comp->obj['email'], $content);
}

function removeCompany()
{
	$Id = $_GET['Id'];
	company()->delete("Id='$Id'");

	header('Location: ../admin/?view=companies&message=Succesfully Deleted');
}

function removeJob()
{
	$Id = $_GET['Id'];
	job()->delete("Id='$Id'");

	header('Location: ../admin/?view=jobList&message=Succesfully Deleted');
}

function removeCandidate()
{

	$Id = $_GET['Id'];
	resume()->delete("Id='$Id'");

	header('Location: ../admin/?view=candidates&message=Succesfully Deleted');
}
function logout()

{
	//logout.php
session_start();
session_destroy();
header('Location: index.php');
	exit;
}


function removeJobFunction()
{
	$Id = $_GET['Id'];
	$jobFunc = job_function();
	$jobFunc->obj['isDeleted'] = "1";
	$jobFunc->update("Id='$Id'");

	header('Location: ../admin/?view=jobCategory&message=Succesfully Deleted');
}

/* ======================== Email Messages ==============================*/

function __approvedJobRequestEmailMessage(){
	return "We have approved your request.<br><br>
					Teamire";
}

function __infoJobRequestEmailMessage(){
	return "Hi, we need more information regarding your request. Someone from our team<br>
					will contact you.<br><br>
					Teamire";
}

function __moreInfoEmailMessage(){
	return "Hi, we have received and reviewed your request but we still haven't approved it yet as it did not<br><br>
					meet our requirements. Someone from our team will contact you through your contact number you provided.<br><br>
					Teamire";
}
?>
