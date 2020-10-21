<?php require "../../php/db.php" ?>
<?php require "../../php/credentials.php" ?>
<!DOCTYPE html>
<html lang="en">

<?php

if (!isset($_GET['id'])) {
	header('Location: /especialidades/');
	exit();
}
$id = $_GET['id'];
$db = new db($dbHost, $dbUID, $dbPWD, $dbName);

$sql = "SELECT * FROM doc_doctores WHERE doc_doctores_key=?";
$doctor = $db->query($sql, $id)->fetchArray();

$sql = "SELECT e.* FROM doc_especialidades e INNER JOIN doc_doctores_especialidades de ON e.doc_especialidades_key=de.doc_especialidades_key WHERE de.doc_doctores_key=?";
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

$especialidades_txt = implode(", ", $especialidades_array);

$sql = "SELECT s.* FROM doc_redes_seguros s INNER JOIN doc_doctores_redes_seguros ds ON s.doc_redes_seguros_key=ds.doc_redes_seguros_key WHERE ds.doc_doctores_key=?";
$redes = $db->query($sql, $id)->fetchAll();

?>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= $doctor['doc_doctor_nombre'] ?></title>
	<link rel="icon" href="/img/Logo Plaza Ancalmo.png">
	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="/css/bootstrap.min.css">
	<!-- favicon  -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
	<!-- Material Design Bootstrap -->
	<!-- <link rel="stylesheet" href="css/mdb.min.css"> -->
	<!-- Your custom styles (optional) -->
	<link rel="stylesheet" href="/css/style.css">
	<link rel="stylesheet" href="/especialidades/doctor/doctor-style.css">
	<link rel="stylesheet" href="/css/simplegallery.demo1.css">

</head>

<body>

	<?php include "../../components/navbar.php" ?>

	<div class="container" id="doctorInfo">
		<div class="row p-3">
			<div class="col-sm-4 pb-3">
				<img src="/backpanel/doctores/<?= $doctor['doc_doctor_img'] ?>" alt="doctor seguro pic">
			</div>
			<div class="col-sm-4 doctor-title">
				<div class="">
					<h3 class="m-0"><?= $doctor['doc_doctor_nombre'] ?></h3>
					<h4 class="text-muted"><?= $especialidades_txt ?></h4>
				</div>

			</div>
		</div>
	</div>

	<div class="container" id="doctorTabs">
		<ul class="nav nav-tabs" id="myTab" role="tablist">
			<li>
				<a href="#" class="btn btn-danger mr-3">
					<img src="/img/svg/calendar-line.svg" class="svg-inverted mr-2" alt="calendar icon" height="20px">
					Agendar consulta
				</a>
			</li>
			<li role="presentation" class="nav-item active">
				<a class="nav-link active" id="resumen-tab" data-toggle="tab" href="#resumen" role="tab" aria-controls="resumen" aria-selected="true">Resumen</a>
			</li>
			<li role="presentation" class="nav-item">
				<a class="nav-link" id="seguro-tab" data-toggle="tab" href="#seguro" role="tab" aria-controls="seguro" aria-selected="false">Redes de seguros</a>
			</li>
			<li role="presentation" class="nav-item">
				<a class="nav-link" id="contacto-tab" data-toggle="tab" href="#contacto" role="tab" aria-controls="contacto" aria-selected="false">Contacto</a>
			</li>
			<li role="presentation" class="nav-item">
				<a class="nav-link" id="experiencia-tab" data-toggle="tab" href="#experiencia" role="tab" aria-controls="experiencia" aria-selected="false">Experiencia</a>
			</li>
			<li role="presentation" class="nav-item">
				<a class="nav-link" id="galeria-tab" data-toggle="tab" href="#galeria" role="tab" aria-controls="galeria" aria-selected="false">Galeria</a>
			</li>

		</ul>
		<div class="tab-content mt-5" id="myTabContent">
			<div role="tabpanel" class="tab-pane fade show active" id="resumen" role="tabpanel" aria-labelledby="resumen-tab">
				<div class="container-fluid">
					<h4><?= $doctor['doc_doctor_nombre'] ?></h4>
					<hr>
					<div class="row">
						<div class="col-md-8">

							<p><?= $doctor['doc_doctor_desc'] ?></p>
							<h5 class="text-muted">Especializaciones</h5>
							<p><?= $doctor['doc_doctor_especializaciones'] ?></p>
							<h5 class="text-muted">Horarios de atención</h5>
							<p><?= $doctor['doc_doctor_horarios'] ?></p>
							<h5 class="text-muted">Redes de Seguros</h5>
							<ul>
								<?php
								foreach ($redes as $seguro) {
								?>
									<li><?= $seguro['doc_redes_seguros_nombre'] ?></li>
								<?php
								}
								?>
							</ul>
							<h5 class="text-muted">Formas de pago</h5>
							<p><?= $doctor['doc_doctor_pagos'] ?></p>
						</div>
						<div class="col-md-4">
							<h5 class="text-muted">Local</h5>
							<p><?= $doctor['doc_doctor_local'] ?></p>
							<h5 class="text-muted">Años de experiencia</h5>
							<p><?= $doctor['doc_doctor_exp_num'] ?></p>
						</div>
					</div>
				</div>

			</div>
			<div role="tabpanel" class="tab-pane fade" id="seguro" role="tabpanel" aria-labelledby="seguro-tab">
				<div class="container-fluid" id="lista-seguros">
					<h4>Lista de redes de seguros</h4>
					<hr>
					<div class="row">
						<?php
						foreach ($redes as $seguro) {
						?>
							<div class="col-md-6 p-3">
								<div class="card text-left">
								  <div class="card-body d-flex align-items-center">
									  <img src="/backpanel/seguros/<?=$seguro['doc_redes_seguros_img']?>">
									  <div class=" ml-3 d-flex flex-column justify-content-center">
										<a href="<?=$seguro['doc_redes_seguros_link']?>" target="_blank">
											<h4 class="card-title m-0"><?=$seguro['doc_redes_seguros_nombre']?></h4>
										</a>
										<p class="card-text text-muted"><?=$seguro['doc_redes_seguros_desc']?></p>
									  </div>
								  </div>
								</div>
							</div>
						<?php
						}
						?>
					</div>
				</div>
			</div>
			<div role="tabpanel" class="tab-pane fade" id="contacto" role="tabpanel" aria-labelledby="contacto-tab">
				<div class="container-fluid">
					<h4>Información de contacto</h4>
					<hr>
					<div class="row">
						<div class="col-md-6">
							<h5 class="text-muted">Numeros telefónico</h5>
							<p><?= $doctor['doc_doctor_tel_1'] ?></p>
							<p><?= $doctor['doc_doctor_tel_2'] ?></p>
							<h5 class="text-muted">Correo electronico</h5>
							<p><?= $doctor['doc_doctor_email'] ?></p>
						</div>
						<div class="col-md-6">
							<h5 class="text-muted">Facebook</h5>
							<p><?= $doctor['doc_doctor_fb'] ?></p>
							<h5 class="text-muted">Instagram</h5>
							<p><?= $doctor['doc_doctor_ig'] ?></p>
						</div>
					</div>
				</div>
			</div>
			<div role="tabpanel" class="tab-pane fade" id="experiencia" role="tabpanel" aria-labelledby="experiencia-tab">
				<div class="container-fluid">
					<h4>Experiencia y Educación</h4>
					<hr>
					<div class="row">
						<div class="col-md-6">
							<h5 class="text-muted">Estudios Universitarios</h5>
							<p><?= $doctor['doc_doctor_estudios'] ?></p>
							<h5 class="text-muted">Posgrados</h5>
							<p><?= $doctor['doc_doctor_postgrados'] ?></p>
						</div>
						<div class="col-md-6">
							<h5 class="text-muted">Especializaciónes</h5>
							<p><?= $doctor['doc_doctor_especializaciones'] ?></p>
							<h5 class="text-muted">Experiencia</h5>
							<p><?= $doctor['doc_doctor_exp'] ?></p>
						</div>
					</div>
				</div>
			</div>
			<?php
			$galeria_id = $doctor['doc_doctor_galeria'];

			$sql = "SELECT * FROM galeria WHERE galeria_key=?";
			$galeria = $db->query($sql, $galeria_id)->fetchArray();

			$sql = "SELECT * FROM galeria_img WHERE galeria_img_galeria_key=?";
			$galeria_img = $db->query($sql, $galeria_id)->fetchAll();

			?>
			<div role="tabpanel" class="tab-pane fade" id="galeria" role="tabpanel" aria-labelledby="galeria-tab">
				<div class="container-fluid">
					<center>
						<h4><?= $galeria['galeria_nombre'] ?></h4>
					</center>
					<div id="gallery" class="simplegallery">
						<div class="content text-center">
							<img src="/backpanel/galeria/<?= $galeria_img[0]['galeria_img_url'] ?>" class="w-75 image_1" alt="" />
							<p class="caption caption_1"><strong><?= $galeria_img[0]['galeria_img_nombre'] ?></strong> <?= $galeria_img[0]['galeria_img_caption'] ?></p>
							<?php
							for ($i = 1; $i < count($galeria_img); $i++) {
							?>
								<img src="/backpanel/galeria/<?= $galeria_img[$i]['galeria_img_url'] ?>" class="w-75 image_<?php echo ($i + 1) ?>" style="display:none" alt="" />
							<?php
							}
							for ($i = 1; $i < count($galeria_img); $i++) {
							?>
								<p class="caption caption_<?php echo ($i + 1) ?> " style="display:none"><strong><?= $galeria_img[$i]['galeria_img_nombre'] ?></strong> <?= $galeria_img[$i]['galeria_img_caption'] ?></p>
							<?php
							}
							?>
						</div>

						<div class="clear"></div>

						<div class="thumbnail container">
							<?php
							for ($i = 0; $i < count($galeria_img); $i++) {
							?>
								<div class="thumb" id="thumbid_<?php echo ($i + 1) ?>">
									<a href="#" rel="<?php echo ($i + 1) ?>">
										<img src="/backpanel/galeria/<?= $galeria_img[$i]['galeria_img_url'] ?>" id="thumb_<?php echo ($i + 1) ?>" class="thumbs" alt="" />
									</a>
								</div>
							<?php
							}
							?>

						</div>

					</div>
				</div>
			</div>
		</div>
	</div>

	<?php include "../../components/footer.php" ?>

	<body>


		<script type="text/javascript" src="/js/jquery.min.js"></script>
		<!-- Bootstrap core JavaScript -->
		<script type="text/javascript" src="/js/bootstrap.min.js"></script>
		<!-- MDB core JavaScript -->
		<!-- <script type="text/javascript" src="/js/mdb.min.js"></script> -->
		<script type="text/javascript" src="/js/bootstrap-tabcollapse.js"></script>
		<script type="text/javascript" src="/js/simplegallery.min.js"></script>
		<script>
			$(document).ready(function() {

				$('#gallery').simplegallery({
					galltime: 500,
					gallcontent: '.content',
					gallthumbnail: '.thumbnail',
					gallthumb: '.thumb'
				});

			});
		</script>
		<script>
			$(document).ready(function() {
				if ($(window).width() <= 768) {
					$("#myTab").tabCollapse();
				}
			});
			$(".thumb").click(function() {
				var id = $(this).attr("id");
				var cap_id = ".caption_" + id.substr(id.length - 1);
				$(".caption").css("display", "none");
				$(cap_id).css("display", "block");
			});
		</script>
	</body>

</html>