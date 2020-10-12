<?php require "../../php/verify-session.php" ?>
<?php require "../../php/db.php" ?>
<?php require "../../php/credentials.php" ?>

<?php 

	$id = $_GET['id'];

	$db = new db($dbHost, $dbUID, $dbPWD, $dbName);

	$sql = "SELECT * FROM doc_redes_seguros WHERE doc_redes_seguros_key=?";

	$row = $db->query($sql, $id)->fetchArray();

	$img = fopen($row['doc_redes_seguros_img'], "w+");

	unlink($img);	

?>