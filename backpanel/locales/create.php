<?php require "../../php/verify-session.php" ?>
<?php require "../../php/db.php" ?>
<?php require "../../php/credentials.php" ?>
<?php 
	
	$nombre = $_POST['nombre'];
	$descripcion = $_POST['descripcion'];
	$image = $_FILES['image'];
	$contacto = $_POST['contacto'];
	$preview = $_POST['preview'];
	$response = array('error'=>false);

	$imageFileType = "";
	if($image['tmp_name'] != ""){
		$imageFileType = strtolower(pathinfo($image['name'], PATHINFO_EXTENSION));		
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"){
			$response['error'] = true;
			$response['mensaje'] = "El archivo debe ser un formato de imagen";
			echo json_encode($response);
			exit();
		}
		if($image['size'] > 400000){
			$response['error'] = true;
			$response['mensaje'] = "El archivo de imagen debe pesar menos de 400Kb";
			echo json_encode($response);
			exit();
		}

	}else{
		$response['error'] = true;
		$response['mensaje'] = "No hay una imagen seleccionada";
		echo json_encode($response);
		exit();
	}


	$db = new db($dbHost, $dbUID, $dbPWD, $dbName);

	$galeria_nombre = "Galería de ".$nombre;
	$sql = "INSERT INTO galeria (galeria_nombre) VALUES (?)";
	$db->query($sql, $galeria_nombre);
	$galeria_id = $db->lastInsertID();

	$db = new db($dbHost, $dbUID, $dbPWD, $dbName);
	$sql = "INSERT INTO locales (locales_nombre, locales_desc, locales_galeria_key, locales_contacto, locales_preview) VALUES (?,?,?,?,?)";
	$db->query($sql, $nombre, $descripcion, $galeria_id, $contacto, $preview);
	$local_id = $db->lastInsertID();

	$target_dir = 'img/';
	$target_file = $target_dir."local_".$local_id.".".$imageFileType;

	move_uploaded_file($image["tmp_name"], $target_file);

	$sql = "UPDATE locales SET locales_img=? WHERE locales_key=?";
	$db->query($sql, $target_file, $local_id);

	
	$response['id'] = $local_id;
	$response['nombre'] = $nombre;
	$response['descripcion'] = $descripcion;
	$response['preview'] = $preview;
	$response['contacto'] = $contacto;
	$response['galeria'] = $galeria_id;
	$response['imagen'] = $target_file;
 
	$db->close();

	echo json_encode($response);
	exit();	

?>