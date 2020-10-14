<?php require "../../php/verify-session.php" ?>
<?php require "../../php/db.php" ?>
<?php require "../../php/credentials.php" ?>
<?php 
	

	$nombre = $_POST['nombre'];
	$masculino = $_POST['masculino'];
	$femenino = $_POST['femenino'];
	$id = $_POST['id'];	
	
	$db = new db($dbHost, $dbUID, $dbPWD, $dbName);
	
	$sql = "UPDATE doc_especialidades SET doc_especialidades_nombre=?, doc_especialidades_nombre_mas=?, doc_especialidades_nombre_fem=? WHERE doc_especialidades_key=?";
	
	$affected = $db->query($sql, $nombre, $masculino, $femenino, $id);
	
	$output = array(
		'id'=>$id,
		'nombre' => $nombre,
		'masculino'=>$masculino,
		'femenino'=>$femenino
	);
	
	echo json_encode($output);
	exit();	

?>