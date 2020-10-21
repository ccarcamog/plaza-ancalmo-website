<?php require "../../php/verify-session.php" ?>
<?php require "../../php/db.php" ?>
<?php require "../../php/credentials.php" ?>
<?php 

	$id = $_POST['id'];

	$db = new db($dbHost, $dbUID, $dbPWD, $dbName);

	$sql = "SELECT * FROM doc_doctores WHERE doc_doctores_key=?";

	$doctor = $db->query($sql, $id)->fetchArray();

	$sql = "SELECT e.* FROM doc_especialidades e INNER JOIN doc_doctores_especialidades de ON de.doc_especialidades_key=e.doc_especialidades_key WHERE de.doc_doctores_key=?";
	$especialidades = $db->query($sql, $id)->fetchAll();	
	$especialidades_array = array();

	if ($doctor['doc_doctores_genero'] == 'M') {
		foreach ($especialidades as $especialidad) {
			$especialidades_array[] = $especialidad['doc_especialidades_nombre_mas'];
		}
	} else {
		foreach ($especialidades as $especialidad) {
			$especialidades_array[] = $especialidad['doc_especialidades_nombre_fem'];
		}
	}

	$doctor['especialidades'] = $especialidades_array;

	$sql = "SELECT r.* FROM doc_redes_seguros r INNER JOIN doc_doctores_redes_seguros dr ON dr.doc_redes_seguros_key=r.doc_redes_seguros_key WHERE dr.doc_doctores_key=?";
	$seguros = $db->query($sql, $id)->fetchAll();	
	$doctor['seguros'] = $seguros;

	$galeria_id = $doctor['doc_doctor_galeria'];

	$sql = "SELECT * FROM galeria WHERE galeria_key=?";
	$galeria = $db->query($sql, $galeria_id)->fetchArray();
	$doctor['galeria'] = $galeria;
	

	$sql = "SELECT * FROM galeria_img WHERE galeria_img_galeria_key=?";
	$galeria_img = $db->query($sql, $galeria_id)->fetchAll();
	$doctor['galeria_img'] = $galeria_img;



	echo json_encode($doctor);
	exit();

?>