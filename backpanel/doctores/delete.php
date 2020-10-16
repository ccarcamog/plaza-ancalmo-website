<?php require "../../php/verify-session.php" ?>
<?php require "../../php/credentials.php" ?>
<?php require "../../php/db.php" ?>

<?php 

	$id = $_POST['id'];

	$db = new db($dbHost, $dbUID, $dbPWD, $dbName);

	$sql = "SELECT * FROM doc_redes_seguros WHERE doc_redes_seguros_key=?";

	$row = $db->query($sql, $id)->fetchArray();

	$img = fopen($row['doc_redes_seguros_img'], "w+");

	unlink($img);
	
	$sql = "DELETE FROM doc_redes_seguros WHERE doc_redes_seguros_key=?";

	$deleted = $db->query($sql, $id);

	if($db->affectedRows() > 0){
		echo 1;
		exit();
	}else{
		echo 0;
		exit();
	}

?>