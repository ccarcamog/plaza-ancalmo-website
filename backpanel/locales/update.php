<?php require "../../php/verify-session.php" ?>
<?php require "../../php/db.php" ?>
<?php require "../../php/credentials.php" ?>
<?php 
	

	$id = $_POST['id'];	
	$nombre = $_POST['nombre'];
	$descripcion= $_POST['descripcion'];
	$contacto = $_POST['contacto'];
	$preview  = $_POST['preview'];

	
	$db = new db($dbHost, $dbUID, $dbPWD, $dbName);
	
	$sql = "UPDATE locales SET locales_nombre=?, locales_desc=?, locales_contacto=?, locales_preview=? WHERE locales_key=?";
	$db->query($sql, $nombre, $descripcion, $contacto, $preview, $id);
	
	$response = array(
		'error'=>false,
		'id'=>$id,
		'nombre' => $nombre,
		'descripcion'=>$descripcion,
		'contacto' => $contacto,
		'preview' => $preview
	);
	
	$sql = "SELECT * FROM locales WHERE locales_key=?";
	$local_updated = $db->query($sql, $id)->fetchArray();

	$galeria_id = $local_updated['locales_galeria_key'];
	$galeria_nombre = "Galería de ".$nombre;

	$sql = "UPDATE galeria SET galeria_nombre=? WHERE galeria_key=?";
	$db->query($sql, $galeria_nombre, $galeria_id);


	$response['galeria'] = $galeria_id;

	$image = $_FILES['image'];

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

		$target_file = 'img/local_'.$id.'.'.$imageFileType;
		move_uploaded_file($image["tmp_name"], $target_file);
				
	}
	
	echo json_encode($response);
	exit();	

?>