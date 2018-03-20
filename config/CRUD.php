<?php

class CRUD {

	var $table;

	var $obj = array();

	function arrayToQuery($query){
	    $query_array = array();
	    foreach( $query as $key => $key_value ){
				// This is for datetime
				if ($key_value=="NOW()"){
	        $query_array[] = "$key=$key_value";
				}
				else{
		        $query_array[] = "$key='$key_value'";
				}
	    }
	    return implode( ', ', $query_array );
	}

	function list($query=""){
		$query = $query ? "where " . $query: "";

		$db = Database::connect();
		$pdo = $db->prepare("select * from $this->table $query");
		$pdo->execute();
		$result = $pdo->fetchAll(PDO::FETCH_OBJ);
		Database::disconnect();
		return $result;
	}

	function count($query=""){
		$query = $query ? "where " . $query: "";

		$db = Database::connect();
		$pdo = $db->prepare("select * from $this->table $query");
		$pdo->execute();
		Database::disconnect();
		return $pdo->rowCount();
	}

	function get($args){
		$db = Database::connect();
		$pdo = $db->prepare("select * from $this->table where $args");
		$pdo->execute();
		$result = $pdo->fetch(PDO::FETCH_OBJ);
		Database::disconnect();
		return $result;
	}

	function create(){
		$object = $this->arrayToQuery($this->obj);
		$db = Database::connect();
		$pdo = $db->prepare("insert into $this->table set $object");
		$pdo->execute();
		Database::disconnect();
	}

	function update($args){
		$object = $this->arrayToQuery($this->obj);
		$db = Database::connect();
		$pdo = $db->prepare("update $this->table set $object where $args");
		$pdo->execute();
		Database::disconnect();
	}

	function delete($args){
		$db = Database::connect();
		$pdo = $db->prepare("delete from $this->table where $args");
		$pdo->execute();
		Database::disconnect();
	}
}

/* =====================================Functions===================================== */

/* Retrieve one record */
function uploadFile($uploadedFile){
	// Where the file is going to be placed
	$target_path = "../media/";
	/* Add the original filename to our target path.
	Result is "uploads/filename.extension" */
	$target_path = $target_path . basename( $uploadedFile['name']);
	$temp = explode(".", $uploadedFile["name"]);
	$newfilename = round(microtime(true)) . '.' . end($temp);

	if(move_uploaded_file($uploadedFile['tmp_name'], '../media/' . $newfilename)) {
			return $newfilename;
		}
		else{
			return 0;
		}
}

/* =====================================Functions===================================== */

/* Send email */
function sendEmail($email, $content){

	require_once "../email/swift/lib/swift_required.php";

	$transport = Swift_SmtpTransport::newInstance('gator4234.hostgator.com', 465, 'ssl')
										->setUsername('noreply@teamire.com')
										->setPassword('noreplytest1');

	$mailer = Swift_Mailer::newInstance($transport);

	$message = Swift_Message::newInstance("Teamire")
										->setFrom(array('norepyly@teamire.com' => 'Teamire'))
										->setTo(array($email));

	$message->setBody($content, 'text/html');

	if(!empty($targetpath)) {
		 $message->attach(Swift_Attachment::fromPath($targetpath));
	}

	if (!$mailer->send($message, $errors)) {
		echo "Error:";
		print_r($errors);
	}
}

?>
