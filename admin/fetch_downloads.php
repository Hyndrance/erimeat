<?php
include_once("../config/database.php");
include_once("../config/Models.php");
$action = $_POST['action'];
switch($action){
	case 'getDownload':
	$id = $_POST['id'];
	$downloads = downloads()->list("Id=".$id);
foreach($downloads as $row) {
?>
<?php $data = array('Id'=>$row->Id,'fileName'=>$row->fileName,'uploadedFile'=>$row->uploadedFile);?>
<?php
 }
    echo json_encode($data);
  }
?>
