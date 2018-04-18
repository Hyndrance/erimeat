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
/* Retrieve one record */
function uploadMultipleFile($uploadedFile){

	$filenameList = array();

	$countfiles = count($uploadedFile['name']);

	if (false){
		for($i=0;$i<$countfiles;$i++){
			// File name
		   	$filename = $uploadedFile['name'][$i];
		   	// Get extension
	  		 $ext = explode(".", $filename);
			   if(move_uploaded_file($uploadedFile['tmp_name'][$i],'../media/'.$filename)){
			   		$filenameList[] = $filename;
				}
				else{
			   		$filenameList['error'] = true;
				}
		}
			return $filenameList;
	}
	else{
			return false;
	}

}

/* =====================================Functions===================================== */

/* Send email */
function sendEmail($email, $content){

	require_once "../email/swift/lib/swift_required.php";

	$transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, 'ssl')
										->setUsername('samplehr2k18@gmail.com')
										->setPassword('smpl2k18');

	$mailer = Swift_Mailer::newInstance($transport);



	try{
	 $message = Swift_Message::newInstance("No Reply")
										->setFrom(array('samplehr2k18@gmail.com' => 'Teamire'))
										->setTo(array($email));

	$message->setBody($content, 'text/html');
	}
	catch (Swift_RfcComplianceException $e){
	    print('Sorry for the inconvenience. Could not connect to email server. Try again.:' . $e->getMessage());
	}

	if(!empty($targetpath)) {
		 $message->attach(Swift_Attachment::fromPath($targetpath));
	}

	if (!$mailer->send($message, $errors)) {
		echo "Error:";
		print_r($errors);
	}


}

?>
