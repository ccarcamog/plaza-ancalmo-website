<?php require "../../php/verify-session.php" ?>
<?php require "../../php/db.php" ?>
<?php require "../../php/credentials.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Doctores</title>

	<link rel="icon" href="/img/Logo Plaza Ancalmo.png">
	<!-- MDB icon -->
	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="/css/bootstrap.min.css">
	<link rel="stylesheet" href="/css/style.css">
	<link rel="stylesheet" href="/especialidades/doctor/doctor-style.css">
	<link rel="stylesheet" href="/css/simplegallery.demo1.css">
</head>

<body>

	<main class="d-flex align-items-stretch">
		<div class="container-fluid d-flex align-items-stretch">
			<div class="row" style="width: 100vw;">
				<div class="col-md-3 p-0">
					<?php include "../../components/side-bar.php" ?>
				</div>
				<div class="col-md-9 p-5">

					<?php

					if ($_GET['success'] == 'create') {

					?>

						<div class="alert alert-success w-100 alert-dismissible fade show" role="alert">
						<?= ($_GET['genero'] == 'M')?"Dr.":"Dra."?> <?= $_GET['nombre']?> ha sido añadido con éxito. <a href="/backpanel/galeria/?id=<?=$_GET['galeria']?>">Ir a la galeria</a>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>

					<?php

					}else if ($_GET['success'] == 'update'){

					?>
						<div class="alert alert-success w-100 alert-dismissible fade show" role="alert">
							Informacion de <?= ($_GET['genero'] == 'M')?"Dr.":"Dra."?> <?= $_GET['nombre']?> ha sido actualizada con éxito.</a>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>

					<?php

					}

					?>

					<h2>DOCTORES</h2>
					<?php

					$db = new db($dbHost, $dbUID, $dbPWD, $dbName);

					$sql = "SELECT * FROM doc_doctores";

					$doctores = $db->query($sql)->fetchAll();

					?>
					<div class="table-responsive mt-4">
						<table class="table table-hover">
							<thead class="thead-dark">
								<tr>
									<th scope="col">id</th>
									<th scope="col">nombre</th>
									<th scope="col">galería</th>
									<th></th>
									<th></th>

								</tr>
							</thead>
							<tbody>

								<?php
								$count = 1;
								foreach ($doctores as $doctor) {
								?>
									<tr id="row-<?= $doctor['doc_doctores_key'] ?>" data-id="<?= $doctor['doc_doctores_key'] ?>">
										<th scope="row"><?= $count++ ?></th>
										<td><?= ($doctor['doc_doctores_genero'] == 'M')?"Dr.":"Dra."?> <?= $doctor['doc_doctor_nombre'] ?></td>
										<td>
											<a class="btn btn-info galeria-btn" href="/backpanel/galeria/?id=<?= $doctor['doc_doctor_galeria'] ?>">Ir a galería</a>

										</td>
										<td><a class="btn btn-warning actualizar-btn" href="/backpanel/doctores/update.php?id=<?= $doctor['doc_doctores_key'] ?>">Actualizar</a></td>
										<td><button class="btn btn-danger borrar-btn" data-id="<?= $doctor['doc_doctores_key'] ?>">Borrar</button></td>
									</tr>

								<?php
								}
								?>
							</tbody>
						</table>
					</div>
					<a href="/backpanel/doctores/create.php" class="btn btn-success">Agregar doctor</a>
					<div class="modal fade" id="previewModal" tabindex="-1" aria-labelledby="previewModalLabel" aria-hidden="true">
						<div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable w-75">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="previewModalLabel">Página del doctor</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<div class="container" id="doctorInfo">
										<div class="row p-3">
											<div class="col-sm-4 pb-3">
												<img src="" alt="doctor seguro pic" class="doctor_img">
											</div>
											<div class="col-sm-8 doctor-title">
												<div class="">
													<h3 class="m-0 doctor_nombre">John doe</h3>
													<h4 class="text-muted doctor_especialidad">Odontologo</h4>
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
												<a class="nav-link" id="galeria-tab" data-toggle="tab" href="#galeria" role="tab" aria-controls="galeria" aria-selected="false">Galería</a>
											</li>

										</ul>
										<div class="tab-content mt-5" id="myTabContent">
											<div role="tabpanel" class="tab-pane fade show active" id="resumen" role="tabpanel" aria-labelledby="resumen-tab">
												<div class="container-fluid">
													<h4 class="doctor_nombre">John Doe</h4>
													<hr>
													<div class="row">
														<div class="col-md-8">

															<p class="doctor_descripcion">
																Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...
															</p>
															<h5 class="text-muted">Especializaciones</h5>
															<p class="doctor_especialidades">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam lacus nisl, dignissim eget augue faucibus, convallis pretium mauris. Vivamus hendrerit eros vitae tempus tempor. Nulla facilisi. </p>
															<h5 class="text-muted">Horarios de atención</h5>
															<p class="doctor_horarios">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam lacus nisl, dignissim eget augue faucibus, convallis pretium mauris. Vivamus hendrerit eros vitae tempus tempor. Nulla facilisi. </p>
															<h5 class="text-muted">Redes de Seguros</h5>
															<ul class="doctor_seguros">

															</ul>
															<h5 class="text-muted">Formas de pago</h5>
															<p class="doctor_pagos">
																Duis nec elit non leo molestie varius. Pellentesque eu purus vitae felis mollis bibendum at sed sem. Aenean rhoncus nibh vel vehicula dapibus. Fusce aliquet felis in viverra interdum. Etiam pulvinar justo at turpis lacinia, id aliquam sem facilisis.
															</p>
														</div>
														<div class="col-md-4">
															<h5 class="text-muted">Local</h5>
															<p class="doctor_local">5</p>
															<h5 class="text-muted">Años de experiencia</h5>
															<p class="doctor_exp_num">10</p>
														</div>
													</div>
												</div>

											</div>
											<div role="tabpanel" class="tab-pane fade" id="seguro" role="tabpanel" aria-labelledby="seguro-tab">
												<div class="container-fluid" id="lista-seguros">
													<h4>Lista de redes de seguros</h4>
													<hr>
													<div class="row doctor-seguros-card">

													</div>

												</div>
											</div>
											<div role="tabpanel" class="tab-pane fade" id="contacto" role="tabpanel" aria-labelledby="contacto-tab">
												<div class="container-fluid">
													<h4>Información de contacto</h4>
													<hr>
													<div class="row">
														<div class="col-md-6">
															<h5 class="text-muted">Números telefónicos</h5>
															<p class="doctor_telefono_1">(+503) 0000 0000</p>
															<p class="doctor_telefono_2">(+503) 0000 0000</p>
															<h5 class="text-muted">Correo electrónico</h5>
															<p class="doctor_correo">email@example.com</p>
														</div>
														<div class="col-md-6">
															<h5 class="text-muted">Facebook</h5>
															<p class="doctor_facebook">/john-doe</p>
															<h5 class="text-muted ">Instagram</h5>
															<p class="doctor_instagram">@johndoe.sv</p>
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
															<p class="doctor_estudios">Proin ullamcorper egestas tellus vel.</p>
															<h5 class="text-muted">Posgrados</h5>
															<p class="doctor_postgrados">
																Fusce elementum quam et tempus pellentesque. Proin eu ex iaculis, ultricies leo sit amet, rhoncus ligula. Praesent nec est tempor, accumsan tortor vitae, commodo risus. Fusce vitae dolor id justo auctor feugiat.
															</p>
														</div>
														<div class="col-md-6">
															<h5 class="text-muted">Especializaciónes</h5>
															<p class="doctor_especializaciones">
																Fusce interdum urna non finibus commodo. Aenean ut enim vel nisl efficitur fermentum. Maecenas vitae erat aliquet, rhoncus ante id, euismod odio.
															</p>
															<h5 class="text-muted">Experiencia</h5>
															<p class="doctor_experiencia">
																Mauris nec leo vitae nisl blandit dapibus. Nunc ac tellus sodales, blandit elit non, varius purus. Cras efficitur arcu vitae neque rutrum accumsan. Quisque suscipit velit ut libero maximus suscipit. Morbi auctor tortor non sem posuere elementum. Morbi in orci ultrices nibh tristique facilisis at ut erat.
															</p>
														</div>
													</div>
												</div>
											</div>
											<div role="tabpanel" class="tab-pane fade" id="galeria" role="tabpanel" aria-labelledby="galeria-tab">
												<div class="container-fluid">
												<center>
													<h4 id="galeria_nombre"></h4>
												</center>
													<div id="gallery" class="simplegallery">
														<div class="content text-center">

															<div id="galeriaCarousel" class="carousel slide d-flex flex-column justify-content-center" data-ride="carousel">
																<div class="carousel-inner">

																</div>
																<a class="carousel-control-prev d-none d-md-flex" href="#galeriaCarousel" role="button" data-slide="prev">

																	<img class="direction-arrow" src="/img/svg/left-arrow-angle.svg">
																	<span class="sr-only">Previous</span>
																</a>
																<a class="carousel-control-next d-none d-md-flex" href="#galeriaCarousel" role="button" data-slide="next">

																	<img class="direction-arrow" src="/img/svg/right-arrow-angle.svg">
																	<span class="sr-only">Next</span>
																</a>
															</div>

														</div>
														<div class="clear"></div>
														<div class="thumbnail container">


														</div>

													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</main>
	<?php include "../../components/footer.php" ?>
	<script type="text/javascript" src="/js/jquery.min.js"></script>
	<script type="text/javascript" src="/js/simplegallery.min.js"></script>
	<!-- Bootstrap core JavaScript -->
	<script type="text/javascript" src="/js/bootstrap.min.js"></script>
	<script>
		$('#previewModal').on('shown.bs.modal', function() {
			$(".thumb").click(function() {
				var id = $(this).data("id");
				$('#galeriaCarousel').carousel(id);
			});
		})
	</script>
	<script type="text/javascript">
		$('.table > tbody > tr').click(function() {
			var doctor_id = $(this).data('id');

			$.ajax({
				url: '/backpanel/doctores/get_doctor.php',
				type: 'POST',
				data: {
					id: doctor_id
				},
				dataType: 'json',
				success: function(response) {
					console.log(response);

					$('.doctor_nombre').html(((response['doc_doctores_genero']=='M')?'Dr. ':'Dra. ') + response['doc_doctor_nombre']);
					$('.doctor_especialidad').html(response['especialidades'].join(", "));
					$('.doctor_img').attr("src", "/backpanel/doctores/" + response['doc_doctor_img']);
					$('.doctor_descripcion').html(response['doc_doctor_desc']?response['doc_doctor_desc']:"Completa esta información para que aparezca en el perfil.");
					$('.doctor_especialidades').html(response['doc_doctor_especializaciones']?response['doc_doctor_especializaciones']:"Completa esta información para que aparezca en el perfil.");
					$('.doctor_horarios').html(response['doc_doctor_horarios']?response['doc_doctor_horarios']:"Completa esta información para que aparezca en el perfil.");
					$('.doctor_pagos').html(response['doc_doctor_pagos']?response['doc_doctor_pagos']:"Completa esta información para que aparezca en el perfil.");
					$('.doctor_local').html(response['doc_doctor_local']?response['doc_doctor_local']:"Completa esta información para que aparezca en el perfil.");
					$('.doctor_exp_num').html(response['doc_doctor_exp_num']?response['doc_doctor_tel_1']:"Completa esta información para que aparezca en el perfil.");
					$('.doctor_seguros').html('');

					$('.doctor-seguros-card').html('');
					if(response['seguros'].length == 0){
						$('.doctor_seguros').append('<li>Completa esta información para que aparezca en el perfil.</li>');
						$('.doctor-seguros-card').html('Completa esta información para que aparezca en el perfil.');
					}
					for (var i = 0; i < response['seguros'].length; i++) {
						$('.doctor_seguros').append('<li>' + response['seguros'][i]['doc_redes_seguros_nombre'] + '</li>');

						var html = '';
						html += '<div class="col-md-6 p-3">';
						html += '	<div class="card text-left">';
						html += '		<div class="card-body d-flex align-items-center flex-nowrap ">';
						html += '			<img src="/backpanel/seguros/' + response['seguros'][i]['doc_redes_seguros_img'] + '">';
						html += '			<div class=" ml-3 d-flex flex-column justify-content-center">';
						html += '				<a href="' + response['seguros'][i]['doc_redes_seguros_link'] + '" target="_blank">';
						html += '					<h4 class="card-title m-0">' + response['seguros'][i]['doc_redes_seguros_nombre'] + '</h4>';
						html += '				</a>';
						html += '				<p class="card-text text-muted">' + response['seguros'][i]['doc_redes_seguros_desc'] + '</p>';
						html += '			</div>';
						html += '		</div>';
						html += '	</div>';
						html += '</div>';
						$('.doctor-seguros-card').append($(html));

					}
					$('.doctor_telefono_1').html(response['doc_doctor_tel_1']?response['doc_doctor_tel_1']:"Completa esta información para que aparezca en el perfil.");
					$('.doctor_telefono_2').html(response['doc_doctor_tel_2']?response['doc_doctor_tel_2']:"Completa esta información para que aparezca en el perfil.");
					$('.doctor_correo').html(response['doc_doctor_email']?response['doc_doctor_email']:"Completa esta información para que aparezca en el perfil.");
					$('.doctor_facebook').html(response['doc_doctor_fb']?response['doc_doctor_fb']:"Completa esta información para que aparezca en el perfil.");
					$('.doctor_instagram').html(response['doc_doctor_ig']?response['doc_doctor_ig']:"Completa esta información para que aparezca en el perfil.");
					$('.doctor_estudios').html(response['doc_doctor_estudios']?response['doc_doctor_estudios']:"Completa esta información para que aparezca en el perfil.");
					$('.doctor_postgrados').html(response['doc_doctor_postgrados']?response['doc_doctor_postgrados']:"Completa esta información para que aparezca en el perfil.");
					$('.doctor_especializaciones').html(response['doc_doctor_especializaciones']?response['doc_doctor_especializaciones']:"Completa esta información para que aparezca en el perfil.");
					$('.doctor_experiencia').html(response['doc_doctor_exp']?response['doc_doctor_exp']:"Completa esta información para que aparezca en el perfil.");

					console.log(response['galeria']);

					var galeria_nombre = response['galeria']['galeria_nombre'];
					var galeria_id = response['galeria']['galeria_key'];
					var galeria = response['galeria_img'];

					$('#galeria_nombre').html(galeria_nombre);

					$('.carousel-inner').html('');
					if(galeria.length == 0){
						var html = '<div class="carousel-item active">';
						html += '<p class="mt-5">Agrega imagenes a la galeria <a href="/backpanel/galeria/?id=' + galeria_id + '" target="_blank">aquí</a></p>'
						html += '</div>'
						$('.carousel-inner').append(html);
					}
					// $('.carousel-inner').append(html);
					for (var i = 0; i < galeria.length; i++) {

						if (!i) var html = '<div class="carousel-item active">';
						else var html = '<div class="carousel-item">';
						html += '	<img src="/backpanel/galeria/' + galeria[i]['galeria_img_url'] + '" class="w-75 image_' + (i + 1) + '" />'
						html += '	<p class="caption caption_' + (i + 1) + '"><strong>' + galeria[i]['galeria_img_nombre'] + '</strong><br>' + (galeria[i]['galeria_img_caption']?galeria[i]['galeria_img_caption']:("Agrega una descripcion <a href='/backpanel/galeria/?id=" + galeria_id + "' target='_blank'> aquí </a>"))+ '</p>'
						html += '</div>'

						$('.carousel-inner').append(html);
					}

					$('.galeria_content').html('');
					for (var i = 0; i < galeria.length; i++) {
						if (i == 0) var html = '<p class="caption caption_' + (i + 1) + '"><strong>' + galeria[i]['galeria_img_nombre'] + '</strong> ' + galeria[i]['galeria_img_caption'] + '</p>';
						else var html = '<p class="caption caption_' + (i + 1) + '" style="display:none"><strong>' + galeria[i]['galeria_img_nombre'] + '</strong> ' + galeria[i]['galeria_img_caption'] + '</p>';
						$('.galeria_content').append(html);

					}

					$('.thumbnail').html('');
					for (var i = 0; i < galeria.length; i++) {
						var html = '';
						html += '<div class="thumb" id="thumbid_' + (i + 1) + '" data-id="' + i + '">';
						html += '<a rel="' + (i + 1) + '">';
						html += '<img src="/backpanel/galeria/' + galeria[i]['galeria_img_url'] + '" id="thumb_' + (i + 1) + '" class="thumbs" alt="" />';
						html += '</a>';
						html += '</div>';

						$('.thumbnail').append(html);

					}

					$('#galeriaCarousel').carousel({
						interval: 5000
					});

					$('#previewModal').modal('show');

				}
			});

		});
		$('.actualizar-btn').click(function(e) {
			e.stopPropagation();
		});
		$('.galeria-btn').on('click', function(e) {
			e.stopPropagation();
		});

		$('.borrar-btn').click(function(e) {
			e.stopPropagation();

			var confirm_alert = confirm("Esta seguro que desea borrar la información.");
			if (!confirm_alert) return;

			var row = $(this).closest('tr');

			var doctor_id = $(this).data('id');

			$.ajax({
				url: '/backpanel/doctores/delete.php',
				type: 'POST',
				data: {
					id: doctor_id
				},
				success: function(response) {

					console.log(response);

					$(row).fadeOut(500, function() {
						$(this).remove();
					})

				}
			});

		});
	</script>
</body>

</html>