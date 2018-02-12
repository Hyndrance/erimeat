<?php
$obj->getByUsername($_SESSION['user_session']);
$obj->getList();
?>

<br>

Username: <?=$obj->username;?> <br>

FirstName: <?=$obj->firstName;?> <br>

LastName: <?=$obj->lastName;?>

list:
<?php
foreach ($obj->items as $value) {
    echo "$value->username";
		echo "$value->lastName<br />";
}
?>
