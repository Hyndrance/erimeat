<?php
include_once("../config/database.php");
include_once("../config/Models.php");
$action = $_POST['action'];
switch($action){
	case 'getFaq':
	$id = $_POST['id'];
	$projects = projects()->filter("Id=".$id);
foreach($projects as $row) {
?>
<?php $data = array('Id'=>$row->Id,'title'=>$row->title,'content'=>$row->content,'uploadedImage'=>$row->uploadedImage);?>
<?php
 }
    echo json_encode($data);
  }
?>
