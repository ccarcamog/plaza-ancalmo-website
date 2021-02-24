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
} else if ($doctor['doc_doctores_genero'] == 'F') {
	foreach ($especialidades as $especialidad) {
		$especialidades_array[] = $especialidad['doc_especialidades_nombre_fem'];
	}
} else {
	foreach ($especialidades as $especialidad) {
		$especialidades_array[] = $especialidad['doc_especialidades_nombre'];
	}
}

$especialidades_txt = implode(", ", $especialidades_array);

$sql = "SELECT s.* FROM doc_redes_seguros s INNER JOIN doc_doctores_redes_seguros ds ON s.doc_redes_seguros_key=ds.doc_redes_seguros_key WHERE ds.doc_doctores_key=?";
$redes = $db->query($sql, $id)->fetchAll();

$galeria_id = $doctor['doc_doctor_galeria'];

$sql = "SELECT * FROM galeria WHERE galeria_key=?";
$galeria = $db->query($sql, $galeria_id)->fetchArray();

$sql = "SELECT * FROM galeria_img WHERE galeria_img_galeria_key=? ORDER BY galeria_img_orden ASC";
$galeria_imgs = $db->query($sql, $galeria_id)->fetchAll();

if (!file_exists('../../backpanel/doctores/' . $doctor['doc_doctor_img'])) {
	$doctor['doc_doctor_img'] = 'img/no-user-image.jpg';
}

?>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= $doctor['doc_doctor_nombre'] ?></title>
	<link rel="icon" href="/img/Logo Plaza Ancalmo.png">
	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="/css/style.css">
	<link rel="stylesheet" href="/especialidades/doctor/doctor-style.css">
	<link rel="stylesheet" href="/css/slippry.css">
	<link rel="stylesheet" href="/css/bootstrap.min.css">
</head>

<body>

	<?php include "../../components/navbar.php" ?>
	<main>
		<div class="container" id="doctorInfo">
			<div class="row p-3">
				<div class="col-sm-4 pb-3">
					<img src="/backpanel/doctores/<?= $doctor['doc_doctor_img'] ?>" alt="doctor seguro pic">
				</div>
				<div class="col-sm-8 doctor-title">
					<div class="">
						<h3 class="m-0"><?= ($doctor['doc_doctores_genero'] == 'M') ? "Dr." : ($doctor['doc_doctores_genero'] == 'F' ? "Dra." : "") ?> <?= $doctor['doc_doctor_nombre'] ?></h3>
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
				<?php if ($doctor['doc_doctor_desc'] || $doctor['doc_doctor_especializaciones'] || $doctor['doc_doctor_horarios'] || count($redes) > 0 || $doctor['doc_doctor_pagos'] || $doctor['doc_doctor_local'] || $doctor['doc_doctor_exp_num']) { ?>

					<li role="presentation" class="nav-item active">
						<a class="nav-link active" id="resumen-tab" data-toggle="tab" href="#resumen" role="tab" aria-controls="resumen" aria-selected="true">Resumen</a>
					</li>

				<?php } ?>
				<?php if (count($redes)) { ?>
					<li role="presentation" class="nav-item">
						<a class="nav-link" id="seguro-tab" data-toggle="tab" href="#seguro" role="tab" aria-controls="seguro" aria-selected="false">Redes de seguros</a>
					</li>
				<?php } ?>
				<?php if ($doctor['doc_doctor_tel_1'] || $doctor['doc_doctor_tel_2'] || $doctor['doc_doctor_email'] || $doctor['doc_doctor_fb'] || $doctor['doc_doctor_ig']) { ?>
					<li role="presentation" class="nav-item">
						<a class="nav-link" id="contacto-tab" data-toggle="tab" href="#contacto" role="tab" aria-controls="contacto" aria-selected="false">Contacto</a>
					</li>
				<?php } ?>
				<?php if ($doctor['doc_doctor_estudios'] || $doctor['doc_doctor_postgrados'] || $doctor['doc_doctor_especializaciones'] || $doctor['doc_doctor_exp']) { ?>
					<li role="presentation" class="nav-item">
						<a class="nav-link" id="experiencia-tab" data-toggle="tab" href="#experiencia" role="tab" aria-controls="experiencia" aria-selected="false">Experiencia</a>
					</li>
				<?php } ?>
				<?php if (count($galeria_imgs) > 0) { ?>
					<li role="presentation" class="nav-item">
						<a class="nav-link" id="galeria-tab" data-toggle="tab" href="#galeria" role="tab" aria-controls="galeria" aria-selected="false">Galería</a>
					</li>
				<?php } ?>

			</ul>
			<div class="tab-content mt-5" id="myTabContent">
				<div role="tabpanel" class="tab-pane fade show active" id="resumen" role="tabpanel" aria-labelledby="resumen-tab">
					<div class="container-fluid">
						<h4><?= ($doctor['doc_doctores_genero'] == 'M') ? "Dr." : ($doctor['doc_doctores_genero'] == 'F' ? "Dra." : "") ?> <?= $doctor['doc_doctor_nombre'] ?></h4>
						<hr>
						<div class="row">
							<?php if ($doctor['doc_doctor_desc'] || $doctor['doc_doctor_especializaciones'] || $doctor['doc_doctor_horarios'] || count($redes) > 0 || $doctor['doc_doctor_pagos']) { ?>
								<div class="col-md-8">

									<p><?= $doctor['doc_doctor_desc'] ?></p>

									<?php if ($doctor['doc_doctor_especializaciones']) { ?>
										<h5 class="text-muted">Especializaciones</h5>
										<p><?= $doctor['doc_doctor_especializaciones'] ?></p>
									<?php } ?>
									<?php if ($doctor['doc_doctor_horarios']) { ?>
										<h5 class="text-muted">Horarios de atención</h5>
										<p><?= $doctor['doc_doctor_horarios'] ?></p>
									<?php } ?>

									<?php if (count($redes) > 0) { ?>


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

									<?php } ?>
									<?php if ($doctor['doc_doctor_pagos']) { ?>
										<h5 class="text-muted">Formas de pago</h5>
										<p><?= $doctor['doc_doctor_pagos'] ?></p>
									<?php } ?>
								</div>
							<?php } ?>
							<div class="col-md-4">
								<?php if ($doctor['doc_doctor_local']) { ?>
									<h5 class="text-muted">Local</h5>
									<p><?= $doctor['doc_doctor_local'] ?></p>
								<?php } ?>
								<?php if ($doctor['doc_doctor_exp_num']) { ?>
									<h5 class="text-muted">Años de experiencia</h5>
									<p><?= $doctor['doc_doctor_exp_num'] ?></p>
								<?php } ?>
							</div>
						</div>
					</div>

				</div>
				<div role="tabpanel" class="tab-pane fade" id="seguro" role="tabpanel" aria-labelledby="seguro-tab">
					<div class="container-fluid" id="lista-seguros">
						<?php if (count($redes) > 0) { ?>
							<h4>Lista de redes de seguros</h4>
							<hr>
							<div class="row">
								<?php foreach ($redes as $seguro) { ?>
									<div class="col-md-6 p-3">
										<div class="card text-left">
											<div class="card-body d-flex align-items-center">
												<img src="/backpanel/seguros/<?= $seguro['doc_redes_seguros_img'] ?>">
												<div class=" ml-3 d-flex flex-column justify-content-center">
													<a href="<?= $seguro['doc_redes_seguros_link'] ?>" target="_blank">
														<h4 class="card-title m-0"><?= $seguro['doc_redes_seguros_nombre'] ?></h4>
													</a>
													<p class="card-text text-muted"><?= $seguro['doc_redes_seguros_desc'] ?></p>
												</div>
											</div>
										</div>
									</div>
								<?php } ?>
							</div>
						<?php } ?>
					</div>
				</div>
				<div role="tabpanel" class="tab-pane fade" id="contacto" role="tabpanel" aria-labelledby="contacto-tab">
					<div class="container-fluid">
						<h4>Información de contacto</h4>
						<hr>
						<div class="row">
							<?php if ($doctor['doc_doctor_tel_1'] || $doctor['doc_doctor_tel_2'] || $doctor['doc_doctor_email']) { ?>
								<div class="col-md-6">
									<?php if ($doctor['doc_doctor_tel_1'] || $doctor['doc_doctor_tel_2']) { ?>
										<h5 class="text-muted">Números telefónico</h5>
										<p><?= $doctor['doc_doctor_tel_1'] ?></p>
										<p><?= $doctor['doc_doctor_tel_2'] ?></p>
									<?php } ?>
									<?php if ($doctor['doc_doctor_email']) { ?>
										<h5 class="text-muted">Correo electrónico</h5>
										<p><?= $doctor['doc_doctor_email'] ?></p>
									<?php } ?>
								</div>
							<?php } ?>
							<div class="col-md-6">
								<?php if ($doctor['doc_doctor_fb']) { ?>
									<h5 class="text-muted">Facebook</h5>
									<p><?= $doctor['doc_doctor_fb'] ?></p>
								<?php } ?>
								<?php if ($doctor['doc_doctor_ig']) { ?>
									<h5 class="text-muted">Instagram</h5>
									<p><?= $doctor['doc_doctor_ig'] ?></p>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
				<div role="tabpanel" class="tab-pane fade" id="experiencia" role="tabpanel" aria-labelledby="experiencia-tab">
					<div class="container-fluid">
						<h4>Experiencia y Educación</h4>
						<hr>
						<div class="row">
							<?php if ($doctor['doc_doctor_estudios'] || $doctor['doc_doctor_postgrados']) { ?>

								<div class="col-md-6">
									<?php if ($doctor['doc_doctor_estudios']) { ?>
										<h5 class="text-muted">Estudios Universitarios</h5>
										<p><?= $doctor['doc_doctor_estudios'] ?></p>
									<?php } ?>
									<?php if ($doctor['doc_doctor_postgrados']) { ?>
										<h5 class="text-muted">Posgrados</h5>
										<p><?= $doctor['doc_doctor_postgrados'] ?></p>
									<?php } ?>
								</div>
							<?php } ?>
							<div class="col-md-6">
								<?php if ($doctor['doc_doctor_especializaciones']) { ?>
									<h5 class="text-muted">Especializaciónes</h5>
									<p><?= $doctor['doc_doctor_especializaciones'] ?></p>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
				<div role="tabpanel" class="tab-pane fade" id="galeria" role="tabpanel" aria-labelledby="galeria-tab" >

					<center>
						<h4><?= $galeria['galeria_nombre'] ?></h4>
					</center>

					<ul id="thumbnails">
						<?php for ($i = 0; $i < count($galeria_imgs); $i++) { ?>
							<li>
								<a href="#slide<?= $i + 1 ?>">
									<img src="/backpanel/galeria/<?= $galeria_imgs[$i]['galeria_img_url'] ?>" alt="<strong><?= $galeria_imgs[$i]['galeria_img_nombre'] ?></strong><br><?= $galeria_imgs[$i]['galeria_img_caption'] ?>">
								</a>
							</li>

						<?php } ?>
					</ul>
					<div class="thumb-box">
			<ul class="thumbs">
				<div id="thumbnailCarousel" class="carousel slide" data-ride="carousel" data-interval="3000">
					<div class="carousel-inner">
						<?php
						$cont = 0;
						while ($cont < count($galeria_imgs)) {
						?>

							<div class="carousel-item <?= ($cont == 0) ? "active" : "" ?>">

								<?php
								for ($i = 0; $i < 5 && $cont < count($galeria_imgs); $i++) {
								?>
									<li><a class="thumblink" href="#<?= $cont + 1 ?>" data-goto="<?= $cont + 1 ?>"><img src="/backpanel/galeria/<?= $galeria_imgs[$cont]['galeria_img_url'] ?>" alt="<strong><?= $galeria_imgs[$cont]['galeria_img_nombre'] ?></strong><br><?= $galeria_imgs[$cont]['galeria_img_caption'] ?>"></a></li>
								<?php
									$cont++;
								}
								?>

							</div>
						<?php
						}
						?>
					</div>
					<a class="carousel-control-prev thumbnail-carousel-arrow-prev d-none d-md-flex svg-inverted" href="#thumbnailCarousel" role="button" data-slide="prev">
						<span class="carousel-control-prev-icon " aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="carousel-control-next thumbnail-carousel-arrow-next d-none d-md-flex svg-inverted" href="#thumbnailCarousel" role="button" data-slide="next">
						<span class="carousel-control-next-icon " aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>

			</ul>
		</div>

				</div>
			</div>
		</div>

	</main>


	<?php include "../../components/footer.php" ?>

	<body>


		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
		<!-- MDB core JavaScript -->
		<!-- <script type="text/javascript" src="/js/mdb.min.js"></script> -->
		<script type="text/javascript" src="/js/bootstrap-tabcollapse.js"></script>
		<script type="text/javascript" src="/js/slippry.min.js"></script>
		<style>
			
		</style>
		<script>

			var thumbs = jQuery('#thumbnails').slippry({
				// general elements & wrapper
				slippryWrapper: '<div class="slippry_box thumbnails" />',
				// options
				transition: 'horizontal',
				pager: false,
				auto: false,
				onSlideBefore: function(el, index_old, index_new) {
					jQuery('.thumbs a img').removeClass('active');
					jQuery('img', jQuery('.thumbs a')[index_new]).addClass('active');
				}
			});

			$('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
				
				if(e.target.innerHTML == "Galería"){
					$('#galeria').css("display","block");
					thumbs.reloadSlider();					
				}else{
					$('#galeria').css('display', "none");
				}
			});

			$('.nav-link').on('click', function(e){
				if(e.target.innerHTML == "Galería"){
					$('#galeria').css("display","block");
					thumbs.reloadSlider();					
				}else{
					$('#galeria').css('display', "none");
				}
			});	

			jQuery('.thumblink').click(function() {
				thumbs.goToSlide($(this).data('goto'));
				return false;
			});
		</script>
		<script>
			$(document).ready(function() {
				if ($(window).width() <= 768) {
					$("#myTab").tabCollapse();
				}
			});
		</script>
	</body>

</html>