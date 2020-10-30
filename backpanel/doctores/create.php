<?php require "../../php/verify-session.php" ?>
<?php require "../../php/db.php" ?>
<?php require "../../php/credentials.php" ?>

<?php


$db = new db($dbHost, $dbUID, $dbPWD, $dbName);

if (isset($_POST['create-submit'])) {

	$imageFileType = "";

	if ($_FILES['image']['tmp_name'] != "") {
		$imageFileType = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
		if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {

			header("Location: ?error=true&message=El tipo de imagen es incorrecto");
			exit();
		}
		if ($_FILES['image']['size'] > 500000) {
			header("Location: ?error=true&message=Peso de la imagen debe ser menor a 500kb");
			exit();
		}
	} else {
		header("Location: ?error=true&message=Seleccionar una imagen de perfil");
		exit();
	}

	$nombre = $_POST['nombre'];
	$genero = $_POST['genero'];
	$descripcion = $_POST['descripcion'];
	$prioridad = $_POST['prioridad'];
	$facebook = $_POST['facebook'];
	$instagram = $_POST['instagram'];
	$correo = $_POST['correo'];
	$telefono1 = $_POST['telefono1'];
	$telefono2 = $_POST['telefono2'];
	$estudios = $_POST['estudios'];
	$postgrados = $_POST['postgrados'];
	$especializaciones = $_POST['especializaciones'];
	$experiencia = $_POST['experiencia'];
	$exp_num = $_POST['exp_num'];
	$horarios = $_POST['horarios'];
	$pagos = $_POST['pagos'];
	$local = $_POST['local'];


	$sql = "INSERT INTO doc_doctores (doc_doctores_genero, doc_doctor_nombre, doc_doctor_desc, doc_doctor_horarios, doc_doctor_pagos, doc_doctor_exp_num, doc_doctor_tel_1, doc_doctor_tel_2,";
	$sql = $sql . "doc_doctor_email, doc_doctor_fb, doc_doctor_ig, doc_doctor_estudios, doc_doctor_postgrados, doc_doctor_especializaciones, doc_doctor_exp, doc_doctor_prioridad, doc_doctor_local)";
	$sql = $sql . "VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

	$values = array(
		$genero,
		$nombre,
		$descripcion,
		$horarios,
		$pagos,
		$exp_num,
		$telefono1,
		$telefono2,
		$correo,
		$facebook,
		$instagram,
		$estudios,
		$postgrados,
		$especializaciones,
		$experiencia,
		$prioridad,
		$local
	);

	$insertion = $db->query($sql, $values);
	$id = $insertion->lastInsertID();

	$target_dir = "img/";
	$target_file = $target_dir . "profile_pic" . $id . "." . $imageFileType;
	move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

	$sql = "UPDATE doc_doctores SET doc_doctor_img=? WHERE doc_doctores_key=?";
	$db->query($sql, $target_file, $id);

	$galeria_nombre = "Galeria de " . $nombre;
	$sql = "INSERT INTO galeria (galeria_nombre) VALUES (?)";

	$db->query($sql, $galeria_nombre);
	$galeria_id = $db->lastInsertID();

	$sql = "UPDATE doc_doctores SET doc_doctor_galeria=? WHERE doc_doctores_key=?";
	$db->query($sql, $galeria_id, $id);

	$seguros = $_POST['seguros'];

	foreach ($seguros as $seguro) {

		$sql = "INSERT INTO doc_doctores_redes_seguros (doc_doctores_key, doc_redes_seguros_key) VALUES (?,?)";

		$db->query($sql, $id, $seguro);
	}

	$especialidades = $_POST['especialidades'];

	foreach ($especialidades as $especialidad) {

		$sql = "INSERT INTO doc_doctores_especialidades (doc_doctores_key, doc_especialidades_key) VALUES (?,?)";
		$db->query($sql, $id, $especialidad);
	}



	header("Location: index.php");
	exit();
}

$sql = "SELECT * FROM doc_redes_seguros";

$seguros = $db->query($sql)->fetchAll();

$seguros_json = json_encode($seguros);

// echo $seguros_json;
$sql = "SELECT * FROM doc_especialidades";

$especialidades = $db->query($sql)->fetchAll();

$especialidades_json = json_encode($especialidades);


?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Crear red de seguros</title>

	<link rel="icon" href="/img/Logo Plaza Ancalmo.png">
	<!-- MDB icon -->
	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="/css/bootstrap.min.css">
	<link rel="stylesheet" href="/css/style.css">
	<link rel="stylesheet" href="/css/select2.min.css">
</head>

<body>

	<main class="d-flex align-items-stretch">

		<div class="container-fluid d-flex align-items-stretch">

			<div class="row" style="width: 100vw;">
				<div class="col-md-3 p-0">
					<?php include "../../components/side-bar.php" ?>
				</div>
				<div class="col-md-9 p-5 d-flex flex-column justify-content-center align-items-center">

					<?php

					if ($_GET['error']) {

					?>

						<div class="alert alert-warning w-100 alert-dismissible fade show" role="alert">
							<strong>Error:</strong> <?= $_GET['message'] ?>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>

					<?php

					}

					?>

					<h2>Crear doctor</h2>

					<div class="container">
						<form action="create.php" method="POST" enctype="multipart/form-data">

							<h3>Información personal</h3>
							<div class="form-group row">
								<div class="col">
									<label for="nombre">Nombre</label>
									<input class="form-control" type="text" name="nombre" placeholder="Nombre" required>
								</div>
								<div class="col">
									<Label for="genero">Genero</Label>
									<select class="custom-select" name="genero" required>
										<option value="" selected>Seleccionar</option>
										<option value="M">Masculino</option>
										<option value="F">Femenino</option>
										<!-- <option value="3">Three</option> -->
									</select>
								</div>
							</div>
							<div class="form-group row">
								<div class="col">
									<label for="descripcion">Descripcion</label>
									<textarea class="form-control" name="descripcion" placeholder="Descripcion"></textarea>
								</div>
							</div>
							<div class="form-group row">
								<div class="col">
									<Label>Imagen de perfil</Label>
									<div class="custom-file">
										<input type="file" name="image" class="custom-file-input" id="imageInput" required>
										<label class="custom-file-label" for="imageInput">Escoger imagen (Menor a 500kb)</label>
									</div>
								</div>
								<div class="col">
									<label for="prioridad">Prioridad</label>
									<input class="form-control" type="number" name="prioridad" value=1 min=1>
								</div>
							</div>
							<hr>
							<h3>Informacion de contacto</h3>
							<div class="form-group row">
								<div class="col">
									<label for="facebook">Facebook</label>
									<input class="form-control" type="text" name="facebook">
								</div>
								<div class="col">
									<label for="instagram">Instagram</label>
									<input class="form-control" type="text" name="instagram">
								</div>
							</div>
							<div class="form-group row">
								<div class="col">
									<label for="correo">Correo electrónico</label>
									<input class="form-control" type="email" name="correo">
								</div>
								<div class="col">
									<label for="local">Local</label>
									<input class="form-control" type="text" name="local" required>
								</div>
							</div>
							<div class="form-group row">
								<div class="col">
									<label for="telefono1">Telefono 1</label>
									<input class="form-control" type="text" name="telefono1" required>
								</div>
								<div class="col">
									<label for="telefono2">Telefono 2</label>
									<input class="form-control" type="text" name="telefono2">
								</div>
							</div>
							<hr>
							<h3>Estudios</h3>

							<div class="form-group row">

								<div class="col">
									<label for="especialidades[]">Especialidades</label>
									<select class="form-control especialidades-select" name="especialidades[]" multiple="multiple">
									</select>
								</div>
							</div>
							<div class="form-group row">
								<div class="col">
									<label for="estudios">Estudios Universitarios</label>
									<textarea class="form-control" name="estudios"></textarea>
								</div>
								<div class="col">
									<label for="postgrados">Postgrados</label>
									<textarea class="form-control" name="postgrados"></textarea>
								</div>
							</div>
							<div class="form-group row">
								<div class="col">
									<label for="especializaciones">Especializaciones</label>
									<textarea class="form-control" name="especializaciones"></textarea>
								</div>
								<div class="col">
									<label for="experiencia">Experiencia</label>
									<textarea class="form-control" name="experiencia"></textarea>
								</div>
							</div>
							<div class="form-group row">
								<div class="col">
									<label for="exp_num">Años de experiencia</label>
									<input class="form-control" type="number" name="exp_num" min=1>
								</div>
							</div>
							<hr>
							<h3>Atención</h3>
							<div class="form-group row">
								<div class="col">
									<label for="horarios">Horarios</label>
									<textarea class="form-control" name="horarios"></textarea>
								</div>
								<div class="col">
									<label for="pagos">Pagos</label>
									<textarea class="form-control" name="pagos"></textarea>
								</div>
							</div>
							<div class="form-group row">
								<div class="col">
									<label for="seguros[]">Seguros</label>
									<select class="form-control seguros-select" name="seguros[]" multiple="multiple">
									</select>
								</div>
							</div>
							<div class="form-group text-center">
								<input type="submit" name="create-submit" value="Crear" class="btn btn-success">
							</div>
						</form>
					</div>

				</div>
			</div>
		</div>
	</main>
	<?php include "../../components/footer.php" ?>
	<script type="text/javascript" src="/js/jquery.min.js"></script>
	<!-- Bootstrap core JavaScript -->
	<script type="text/javascript" src="/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="/js/select2.min.js"></script>
	<script type="text/javascript">
		$('#imageInput').on('change', function() {
			var filename = $(this).val();
			// alert(filename);
			$(this).next('.custom-file-label').html(filename);
		});

		$(document).ready(function() {
			var seguros_json = <?= $seguros_json ?>;
			var especialidades_json = <?= $especialidades_json ?>;
			$.map(seguros_json, function(obj) {
				obj.id = obj['doc_redes_seguros_key'];
				obj.text = obj['doc_redes_seguros_nombre'];
			});
			$.map(especialidades_json, function(obj) {
				obj.id = obj['doc_especialidades_key'];
				obj.text = obj['doc_especialidades_nombre'];
			});
			console.log(especialidades_json);
			console.log(seguros_json);
			$('.especialidades-select').select2({
				placeholder: "Seleccione las especialidades",
				data: especialidades_json
			});
			$('.seguros-select').select2({
				placeholder: "Seleccione los seguros",
				data: seguros_json
			});
		});
	</script>
</body>

</html>