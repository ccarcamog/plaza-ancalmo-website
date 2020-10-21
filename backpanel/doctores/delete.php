<?php require "../../php/verify-session.php" ?>
<?php require "../../php/credentials.php" ?>
<?php require "../../php/db.php" ?>

<?php 

	$id = $_POST['id'];

	$db = new db($dbHost, $dbUID, $dbPWD, $dbName);

	$sql = "SELECT * FROM doc_doctores WHERE doc_doctores_key=?";
	$row = $db->query($sql, $id)->fetchArray();

	$img = fopen($row['doc_doctor_img'], "w+");
	unlink($img);

	$galeria_id = $row['doc_doctor_galeria'];
	
	$sql = "DELETE FROM doc_doctores WHERE doc_doctores_key=?";
	$db->query($sql, $id);

	$sql = "DELETE FROM galeria WHERE galeria_key=?";
	$db->query($sql, $galeria_id);

	$sql = "DELETE FROM galeria_img WHERE galeria_img_galeria_key=?";
	$db->query($sql, $galeria_id);

	$sql = "DELETE FROM doc_doctor_redes_seguros WHERE doc_doctor=?";
	$db->query($sql, $id);

	$sql = "DELETE FROM doc_doctor_especialidades WHERE doc_doctor=?";
	$db->query($sql, $id);

	echo 1; 

?>