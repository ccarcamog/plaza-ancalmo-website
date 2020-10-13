<?php require "../../php/verify-session.php" ?>
<?php require "../../php/db.php" ?>
<?php require "../../php/credentials.php" ?>
<?php 
	

	$nombre = $_POST['nombre'];
	$masculino = $_POST['masculino'];
	$femenino = $_POST['femenino'];
	$id = 1;	
	
	$db = new db($dbHost, $dbUID, $dbPWD, $dbName);
	
	$sql = "INSERT INTO doc_especialidades (doc_especialidades_nombre, doc_especialidades_nombre_mas, doc_especialidades_nombre_fem) VALUES (?,?,?)";
	
	$affected = $db->query($sql, $nombre, $masculino, $femenino);
	$id = $affected->lastInsertID();
	
	
	$output = array(
		'id'=>$id,
		'nombre' => $nombre,
		'masculino'=>$masculino,
		'femenino'=>$femenino
	);
	
	echo json_encode($output);
	exit();	

?>