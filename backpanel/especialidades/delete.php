<?php require "../../php/verify-session.php" ?>
<?php require "../../php/db.php" ?>
<?php require "../../php/credentials.php" ?>
<?php 

	$id = $_POST['id'];

	$db = new db($dbHost, $dbUID, $dbPWD, $dbName);

	$sql = "DELETE FROM doc_especialidades WHERE doc_especialidades_key=?";

	$deleted = $db->query($sql, $id);

	if($db->affectedRows() > 0){
		echo 1;
		exit();
	}else{
		echo 0;
		exit();
	}


?>