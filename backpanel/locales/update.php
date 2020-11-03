<?php require "../../php/verify-session.php" ?>
<?php require "../../php/db.php" ?>
<?php require "../../php/credentials.php" ?>
<?php 
	

	$id = $_POST['id'];	
	$nombre = $_POST['nombre'];
	$descripcion= $_POST['descripcion'];
	
	
	$db = new db($dbHost, $dbUID, $dbPWD, $dbName);
	
	$sql = "UPDATE locales SET locales_nombre=?, locales_desc=? WHERE locales_key=?";
	
	$response = array(
		'error'=>false,
		'id'=>$id,
		'nombre' => $nombre,
		'descripcion'=>$descripcion
	);
	
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