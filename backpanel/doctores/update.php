<?php require "../../php/verify-session.php" ?>
<?php require "../../php/db.php" ?>
<?php require "../../php/credentials.php" ?>

<?php


$db = new db($dbHost, $dbUID, $dbPWD, $dbName);

if (isset($_POST['update-submit'])) {

	$id = $_POST['id'];
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
	$galeria_id = $_POST['galeria'];

	$sql = "UPDATE doc_doctores SET ";
	$sql = $sql . "doc_doctores_genero=?, ";
	$sql = $sql . "doc_doctor_nombre=?, ";
	$sql = $sql . "doc_doctor_desc=?, ";
	$sql = $sql . "doc_doctor_horarios=?, ";
	$sql = $sql . "doc_doctor_pagos=?, ";
	$sql = $sql . "doc_doctor_exp_num=?, ";
	$sql = $sql . "doc_doctor_tel_1=?, ";
	$sql = $sql . "doc_doctor_tel_2=?, ";
	$sql = $sql . "doc_doctor_email=?, ";
	$sql = $sql . "doc_doctor_fb=?, ";
	$sql = $sql . "doc_doctor_ig=?, ";
	$sql = $sql . "doc_doctor_estudios=?, ";
	$sql = $sql . "doc_doctor_postgrados=?, ";
	$sql = $sql . "doc_doctor_especializaciones=?, ";
	$sql = $sql . "doc_doctor_exp=?, ";
	$sql = $sql . "doc_doctor_prioridad=?, ";
	$sql = $sql . "doc_doctor_local=? ";
	$sql = $sql . "WHERE doc_doctores_key=?";

	$vals = array(
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
		$local,
		$id
	);

	$db->query($sql, $vals);

	if ($_FILES['image']['tmp_name'] != "") {
		$imageFileType = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
		if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {

			header("Location: ?id=" . $id . "&error=true&message=El tipo de imagen es incorrecto");
			exit();
		}
		if ($_FILES['image']['size'] > 500000) {
			header("Location: ?id=" . $id . "&error=true&message=Peso de la imagen excedido");
			exit();
		}

		$target_dir = "img/";
		$target_file = $target_dir . "profile_pic" . $id . "." . $imageFileType;
		move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

		$sql = "UPDATE doc_doctores SET doc_doctor_img=? WHERE doc_doctores_key=?";
		$db->query($sql, $target_file, $id);
	}

	$sql = "DELETE FROM doc_doctores_redes_seguros WHERE doc_doctores_key=?";
	$db->query($sql, $id);

	$sql = "DELETE FROM doc_doctores_especialidades WHERE doc_doctores_key=?";
	$db->query($sql, $id);

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

	$galeria_nombre = "Galeria de " .(($genero == 'M')?"Dr. ":"Dra. ").$nombre;
	$sql = "UPDATE galeria SET galeria_nombre=? WHERE galeria_key=?";

	$db->query($sql, $galeria_nombre, $galeria_id);

	header("Location: index.php?success=update&nombre=" . $nombre . "&galeria=" . $galeria_id."&genero=".$genero);
	exit();
}

$id = $_GET['id'];
$sql = "SELECT * FROM doc_doctores WHERE doc_doctores_key=?";

$doctor = $db->query($sql, $id)->fetchArray();

$sql = "SELECT * FROM doc_redes_seguros WHERE doc_redes_seguros_key NOT IN (SELECT doc_redes_seguros_key FROM doc_doctores_redes_seguros WHERE doc_doctores_key=?)";
$seguros_excluded = $db->query($sql, $id)->fetchAll();
$sql = "SELECT r.*, dr.doc_doctores_key FROM doc_redes_seguros r INNER JOIN doc_doctores_redes_seguros dr ON dr.doc_redes_seguros_key=r.doc_redes_seguros_key WHERE dr.doc_doctores_key=?";
$seguros_included = $db->query($sql, $id)->fetchAll();
$seguros = array_merge($seguros_included, $seguros_excluded);
$seguros_json = json_encode($seguros);


$sql = "SELECT * FROM doc_especialidades WHERE doc_especialidades_key NOT IN (SELECT doc_especialidades_key FROM doc_doctores_especialidades WHERE doc_doctores_key=?)";
$especialidades_excluded = $db->query($sql, $id)->fetchAll();
$sql = "SELECT e.*, de.doc_doctores_key FROM doc_especialidades e INNER JOIN doc_doctores_especialidades de ON de.doc_especialidades_key=e.doc_especialidades_key WHERE de.doc_doctores_key=?";
$especialidades_included = $db->query($sql, $id)->fetchAll();
$especialidades = array_merge($especialidades_excluded, $especialidades_included);
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

					<h2>Actualizar doctor</h2>

					<div class="container">
						<form action="update.php" method="POST" enctype="multipart/form-data">

							<h3>Información personal</h3>
							<div class="form-group row">
								<div class="col d-none">
									<label for="id">Id</label>
									<input class="form-control" type="number" name="id" value="<?= $doctor['doc_doctores_key'] ?>" readonly>
								</div>
								<div class="col">
									<label for="nombre">Nombre</label>
									<input class="form-control" type="text" name="nombre" value="<?= $doctor['doc_doctor_nombre'] ?>" required>
								</div>
								<div class="col">
									<Label for="genero">Genero</Label>
									<select class="custom-select" name="genero" required>
										<!-- <option value="" selected>Seleccionar</option> -->
										<?php
										if ($doctor['doc_doctores_genero'] == 'M') {
											echo '<option value="M">Masculino</option>
											<option value="F">Femenino</option>';
										} else {
											echo '<option value="F">Femenino</option>
											<option value="M">Masculino</option>';
										}
										?>

									</select>
								</div>
							</div>
							<div class="form-group row">
								<div class="col">
									<label for="descripcion">Descripcion</label>
									<textarea class="form-control" name="descripcion"><?= $doctor['doc_doctor_desc'] ?></textarea>
								</div>
							</div>
							<div class="form-group row">
								<div class="col">
									<Label>Imagen de perfil</Label>
									<div class="custom-file">
										<input type="file" name="image" class="custom-file-input" id="imageInput">
										<label class="custom-file-label" for="imageInput"><?= $doctor['doc_doctor_img'] ?></label>
									</div>
								</div>
								<div class="col">
									<label for="prioridad">Prioridad</label>
									<input class="form-control" type="number" name="prioridad" value=<?= $doctor['doc_doctor_prioridad'] ?> min=1>
								</div>
							</div>
							<hr>
							<h3>Informacion de contacto</h3>
							<div class="form-group row">
								<div class="col">
									<label for="facebook">Facebook</label>
									<input class="form-control" type="text" name="facebook" value="<?= $doctor['doc_doctor_fb'] ?>">
								</div>
								<div class="col">
									<label for="instagram">Instagram</label>
									<input class="form-control" type="text" name="instagram" value="<?= $doctor['doc_doctor_ig'] ?>">
								</div>
							</div>
							<div class="form-group row">
								<div class="col">
									<label for="correo">Correo electrónico</label>
									<input class="form-control" type="email" name="correo" value="<?= $doctor['doc_doctor_email'] ?>">
								</div>
								<div class="col">
									<label for="local">Local</label>
									<input class="form-control" type="text" name="local" value="<?= $doctor['doc_doctor_local'] ?>" required>
								</div>
							</div>
							<div class="form-group row">
								<div class="col">
									<label for="telefono1">Telefono 1</label>
									<input class="form-control" type="text" name="telefono1" value="<?= $doctor['doc_doctor_tel_1'] ?>" required>
								</div>
								<div class="col">
									<label for="telefono2">Telefono 2</label>
									<input class="form-control" type="text" name="telefono2" value="<?= $doctor['doc_doctor_tel_2'] ?>">
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
									<textarea class="form-control" name="estudios"><?= $doctor['doc_doctor_estudios'] ?></textarea>
								</div>
								<div class="col">
									<label for="postgrados">Postgrados</label>
									<textarea class="form-control" name="postgrados"><?= $doctor['doc_doctor_postgrados'] ?></textarea>
								</div>
							</div>
							<div class="form-group row">
								<div class="col">
									<label for="especializaciones">Especializaciones</label>
									<textarea class="form-control" name="especializaciones"><?= $doctor['doc_doctor_especializaciones'] ?></textarea>
								</div>
								<div class="col">
									<label for="experiencia">Experiencia</label>
									<textarea class="form-control" name="experiencia"><?= $doctor['doc_doctor_exp'] ?></textarea>
								</div>
							</div>
							<div class="form-group row">
								<div class="col">
									<label for="exp_num">Años de experiencia</label>
									<input class="form-control" type="number" name="exp_num" min=1 value="<?= $doctor['doc_doctor_exp_num'] ?>">
								</div>
							</div>
							<hr>
							<h3>Atención</h3>
							<div class="form-group row">
								<div class="col">
									<label for="horarios">Horarios</label>
									<textarea class="form-control" name="horarios"><?= $doctor['doc_doctor_horarios'] ?></textarea>
								</div>
								<div class="col">
									<label for="pagos">Pagos</label>
									<textarea class="form-control" name="pagos"><?= $doctor['doc_doctor_pagos'] ?></textarea>
								</div>
							</div>
							<div class="form-group row">
								<div class="col">
									<label for="seguros[]">Seguros</label>
									<select class="form-control seguros-select" name="seguros[]" multiple="multiple">
									</select>
								</div>
								<div class="col d-none">
									<label for="galeria">Galeria id</label>
									<input class="form-control" type="number" name="galeria" value="<?= $doctor['doc_doctor_galeria'] ?>" readonly>
								</div>
							</div>
							<div class="form-group text-center">
								<input type="submit" name="update-submit" value="Actualizar" class="btn btn-success">
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
			var filepath = $(this).val();
			var fileNameIndex = Math.max(filepath.lastIndexOf("\\") + 1, filepath.lastIndexOf("/") + 1);
			var filename = filepath.substr(fileNameIndex);

			var fileTypeIndex = filepath.lastIndexOf('.') + 1;
			var fileType = filepath.substr(fileTypeIndex).toLowerCase();

			if (fileType != 'png' && fileType != 'jpg' && fileType != 'jpeg') {
				alert("Solo formatos de imagenes son permitidos.");
				$(this).val('');
				return;
			}

			if (this.files[0].size / 1024 > 500) {
				alert("La imagen debe ser menor a 500kb.");
				$(this).val('');
				return;
			}

			$(this).next('.custom-file-label').html(filename);
		});

		$(document).ready(function() {
			var seguros_json = <?= $seguros_json ?>;
			var especialidades_json = <?= $especialidades_json ?>;
			$.map(seguros_json, function(obj) {
				obj.id = obj['doc_redes_seguros_key'];
				obj.text = obj['doc_redes_seguros_nombre'];

				if (obj['doc_doctores_key']) {
					obj.selected = true;
				}

			});
			$.map(especialidades_json, function(obj) {
				obj.id = obj['doc_especialidades_key'];
				obj.text = obj['doc_especialidades_nombre'];

				if (obj['doc_doctores_key']) {
					obj.selected = true;
				}
			});

			console.log(especialidades_json);
			console.log(seguros_json);
			$('.especialidades-select').select2({
				placeholder: "Seleccione las especialidades",
				data: especialidades_json,
				language: {
					noResults: function() {
						return "¿Especialidad no encontrada? <a href='/backpanel/especialidades'>Pruebe crearla aqui</a>";
					}
				},
				escapeMarkup: function(markup) {
					return markup;
				}
			});
			$('.seguros-select').select2({
				placeholder: "Seleccione los seguros",
				data: seguros_json,
				language: {
					noResults: function() {
						return "¿Red de seguros no encontrada? <a href='/backpanel/seguros'>Pruebe crearla aqui</a>";
					}
				},
				escapeMarkup: function(markup) {
					return markup;
				}
			});
		});
	</script>
</body>

</html>