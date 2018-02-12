<?php
class Profile {
	 /* Member variables */
	 var $username;
	 var $firstName;
	 var $lastName;
	 var $items = array();

	 /* Retrieve one record */
	 function getByUsername($val){
	 		$query = mysql_query("select * from user where username='$val'");
	 	 	$get = mysql_fetch_array($query);
			$this->username = $get['username'];
			$this->firstName = $get['firstName'];
			$this->lastName = $get['lastName'];
	 }
	 /* Retrieve one record */
	 function getList(){
	 		$query = mysql_query("select * from user");
			while($o=mysql_fetch_object($query))
			{
			    array_push($this->items, $o);
			}
	 }
 }

 $obj = new Profile;
?>
