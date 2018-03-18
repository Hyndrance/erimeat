<?php
include_once("../config/database.php");
include_once("../config/Models.php");
$action = $_POST['action'];
switch($action){
	case 'getdata':
	$id = $_POST['id'];
	$jobFunc = job_function()->list("Id=".$id);
foreach($jobFunc as $row) {
?>
<?php $data = array('Id'=>$row->Id,'option'=>$row->option,'title'=>$row->title,'header'=>$row->header,'description'=>$row->description);?>
<?php
 }
    echo json_encode($data);
  }
?>
