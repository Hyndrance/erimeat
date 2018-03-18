<?php
include_once("../config/database.php");
include_once("../config/Models.php");
$action = $_POST['action'];
switch($action){
	case 'getFaq':
	$id = $_POST['id'];
	$faq = faq()->list("Id=".$id);
foreach($faq as $row) {
?>
<?php $data = array('Id'=>$row->Id,'question'=>$row->question,'answer'=>$row->answer,'level'=>$row->level);?>
<?php
 }
    echo json_encode($data);
  }
?>
