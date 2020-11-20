<?php require "../php/db.php" ?>
<?php require "../php/credentials.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<?php
	$db = new db($dbHost, $dbUID, $dbPWD, $dbName);

	$especialidad = array(
		'doc_especialidades_nombre' => 'Todos'
	);

	$db = new db($dbHost, $dbUID, $dbPWD, $dbName);

	if (isset($_GET['especialidad'])) {
		$especialidad = $db->query("SELECT * FROM doc_especialidades WHERE doc_especialidades_key=?", $_GET['especialidad'])->fetchArray();
	}

	?>

	<title><?= $especialidad['doc_especialidades_nombre'] ?></title>
	<link rel="icon" href="/img/Logo Plaza Ancalmo.png">
	<!-- Bootstrap core CSS -->

</head>

<body>

	<?php include "../components/navbar.php" ?>

	<?php

	$sql = "SELECT * FROM doc_doctores ORDER BY doc_doctor_prioridad DESC";


	if (isset($_GET['especialidad'])) {

		$id = $_GET['especialidad'];

		$sql = "SELECT * FROM doc_especialidades WHERE doc_especialidades_key=?";

		$especialidad = $db->query($sql, $id)->fetchArray();

		$sql = "SELECT d.* FROM doc_doctores d INNER JOIN doc_doctores_especialidades de ON d.doc_doctores_key=de.doc_doctores_key WHERE de.doc_especialidades_key=? ORDER BY d.doc_doctor_prioridad DESC";
	}

	$doctores = $db->query($sql, $id)->fetchAll();


	if (!isset($_GET['especialidad'])) {

		$sql = "SELECT e.* FROM doc_especialidades e INNER JOIN doc_doctores_especialidades de ON de.doc_especialidades_key=e.doc_especialidades_key WHERE de.doc_doctores_key=?";
		foreach ($doctores as &$doctor_i) {

			$doctor_especialidades = $db->query($sql, $doctor_i['doc_doctores_key'])->fetchAll();

			$especialidades_array = array();

			$count = 0;
			if ($doctor_i['doc_doctores_genero'] == 'M') {
				foreach ($doctor_especialidades as $especialidad_doc) {
					$especialidades_array[$count++] = $especialidad_doc['doc_especialidades_nombre_mas'];
				}
			} else if ($doctor_i['doc_doctores_genero'] == 'F') {
				foreach ($doctor_especialidades as $especialidad_doc) {
					$especialidades_array[$count++] = $especialidad_doc['doc_especialidades_nombre_fem'];
				}
			} else {
				foreach ($doctor_especialidades as $especialidad_doc) {
					$especialidades_array[$count++] = $especialidad_doc['doc_especialidades_nombre'];
				}
			}

			$especialidades_txt = implode(", ", $especialidades_array);

			$doctor_i['doc_especialidades'] = $especialidades_txt;
		}
	}

	// echo json_encode($doctores);
	?>

	<div class="container-fluid" id="especialidadTitle">
		<div class="filter p-md-5">
			<h1>Especialidades:</h1>
		</div>
	</div>

	<div class="container p-md-4 mt-3" id="especialidad info">
		<div>
			<h2><?= $especialidad['doc_especialidades_nombre'] ?></h2>
			<p class="text-muted">Contamos con los mejores especialistas para cuidar de ti y de tu familia</p>
		</div>
	</div>

	<hr>


	<div class="container" id="listaDoctores">
		<?php
		for ($i = 0; $i < count($doctores); $i++) {

			// echo json_encode($doctores);

			// echo json_encode($doctores[$i]);
			$doctor = $doctores[$i];

			if (!file_exists('../backpanel/doctores/' . $doctor['doc_doctor_img'])) {
				$doctor['doc_doctor_img'] = 'img/no-user-image.jpg';
			}

		?>

			<div class="row doctor">
				<div class="col-sm-4 doctor-image mb-3">
					<img src="/backpanel/doctores/<?= $doctor['doc_doctor_img'] ?>" alt="doctor profile pic">
				</div>
				<div class=" col-sm-8 doctor-text">
					<a href="/especialidades/doctor/?id=<?= $doctor['doc_doctores_key'] ?>" class="doctor-title d-inline">
						<h3 class="m-0"><?= ($doctor['doc_doctores_genero'] == 'M') ? "Dr." : ($doctor['doc_doctores_genero'] == 'F' ? "Dra." : "") ?> <?= $doctor['doc_doctor_nombre'] ?></h3> <br>
						<h4 class="text-muted">
							<?php if (isset($_GET['especialidad'])) {
								if ($doctor['doc_doctores_genero'] == 'M') {
									echo $especialidad['doc_especialidades_nombre_mas'];
								} else if ($doctor['doc_doctores_genero'] == 'F') {
									echo $especialidad['doc_especialidades_nombre_fem'];
								} else {
									echo $especialidad['doc_especialidades_nombre'];
								}
							} else {
								echo ($doctor['doc_especialidades']);
							}
							?>
						</h4>
					</a>
					<hr>
					<p class="mb-0">Contacto: <br>
						<?= $doctor['doc_doctor_email'] . ($doctor['doc_doctor_email'] ? "<br>" : "") ?>
						<?= $doctor['doc_doctor_tel_1'] . ($doctor['doc_doctor_tel_1'] ? "<br>" : "") ?>
						<?= $doctor['doc_doctor_tel_2'] ?>
					</p>
				</div>
			</div>

		<?php
		}
		?>

	</div>

	<?php include "../components/footer.php" ?>

	<script type="text/javascript" src="/js/jquery.min.js"></script>
	<!-- Bootstrap core JavaScript -->
	<script type="text/javascript" src="/js/bootstrap.min.js"></script>
	<!-- MDB core JavaScript -->
	<!-- <script type="text/javascript" src="/js/mdb.min.js"></script> -->

</body>

</html>
<link rel="stylesheet" href="/css/bootstrap.min.css">
<link rel="stylesheet" href="/css/style.css">
<link rel="stylesheet" href="/especialidades/especialidades-style.css">