<?php require "../../php/verify-session.php" ?>
<?php require "../../php/db.php" ?>
<?php require "../../php/credentials.php" ?>

<?php

$galeria = $_POST['galeria'];

$result = array(
	"key" => "",
	"check" => 0,
	"path" => "",
	"error" => ""
);



if ($_FILES['imagen']['tmp_name'] != "") {
	$imagenFileType = strtolower(pathinfo($_FILES['imagen']['name'], PATHINFO_EXTENSION));
	if ($imagenFileType != "jpg" && $imagenFileType != "png" && $imagenFileType != "jpeg") {

		$result['error'] = $_FILES['imagen']['name'].": El archivo debe ser una imagen";
		$result['check'] = 0;

		echo json_encode($result);
		exit();
	}
	if ($_FILES['imagen']['size'] > 600000) {
		$result['error'] = $_FILES['imagen']['name'].": El archivo debe ser inferior a 400kb";
		$result['check'] = 0;

		echo json_encode($result);
		exit();
	}

	$sql = "INSERT INTO galeria_img (galeria_img_nombre, galeria_img_url, galeria_img_galeria_key) VALUES (?,?,?)";
	
	$db = new db($dbHost, $dbUID, $dbPWD, $dbName);
	
	$insertion = $db->query($sql, "newImage", "/galeria/galeria/no_photo.jpg", $galeria);
	$id = $insertion->lastInsertID();

	
	$target_dir = "galeria/";
	$target_file = $target_dir . "galeria" . $galeria . "_" . $id . "." . $imagenFileType;
	
	move_uploaded_file($_FILES["imagen"]["tmp_name"], $target_file);

	$sql = "UPDATE galeria_img SET galeria_img_url=? WHERE galeria_img_key=?";
	$db->query($sql, $target_file, $id);

	$result['key'] = $id;
	$result['check'] = 1;
	$result['path'] = $target_file;

	echo json_encode($result);
	exit();
}

$result['check'] = 0;
$result['error'] = $_FILES['imagen']['name'].": No se detecto una imagen";
echo json_encode($result);
exit();
?>