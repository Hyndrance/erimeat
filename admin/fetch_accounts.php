<?php
include_once("../config/database.php");
include_once("../config/Models.php");
$action = $_POST['action'];
switch($action){
	case 'getAccount':
	$id = $_POST['id'];
	$admin = admin()->list("Id=".$id);
foreach($admin as $row) {
?>
<?php $data = array('Id'=>$row->Id,'username'=>$row->username,'firstName'=>$row->firstName,'lastName'=>$row->lastName,'level'=>$row->level);?>
<?php
 }
    echo json_encode($data);
  }
?>
