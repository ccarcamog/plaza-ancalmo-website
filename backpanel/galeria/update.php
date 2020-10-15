<?php require "../../php/verify-session.php" ?>
<?php require "../../php/db.php" ?>
<?php require "../../php/credentials.php" ?>
<?php 

	$id = $_POST['id'];
	$nombre = $_POST['nombre'];
	$descripcion = $_POST['descripcion'];

	$db = new db($dbHost, $dbUID, $dbPWD, $dbName);

	$sql = "UPDATE galeria_img SET galeria_img_nombre=?, galeria_img_caption=? WHERE galeria_img_key=?";
	
	$db->query($sql, $nombre, $descripcion, $id);

	$result = array();

	$result['id'] = $id;
	$result['nombre'] = $nombre;
	$result['descripcion'] = $descripcion;

	echo json_encode($result);
	exit();

?>