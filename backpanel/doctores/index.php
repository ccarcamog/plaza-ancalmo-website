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
</head>

<body>


	<?php include "../../components/navbar.php" ?>
	<div class="container-fluid p-5">

		<div class="row">
			<div class="col-md-2">
				<?php include "../../components/side-bar.php" ?>
			</div>
			<div class="col-md-10">
				<h2>DOCTORES</h2>
				<?php

				$db = new db($dbHost, $dbUID, $dbPWD, $dbName);

				$sql = "SELECT * FROM doc_doctores";

				$doctores = $db->query($sql)->fetchAll();

				?>
				<div class="table-responsive  mt-4">
					<table class="table table-hover">
						<thead class="thead-dark">
							<tr>
								<th scope="col">id</th>
								<th scope="col">nombre</th>
								<th scope="col">img</th>
								<th scope="col">prioridad</th>
								<th scope="col">galeria</th>

							</tr>
						</thead>
						<tbody>

							<?php
							foreach ($doctores as $doctor) {
							?>
								<tr id="row-<?= $doctor['doc_doctores_key'] ?>" data-id="<?= $doctor['doc_doctores_key'] ?>">
									<th scope="row"><?= $doctor['doc_doctores_key'] ?></th>
									<td><?= $doctor['doc_doctor_nombre'] ?></td>
									<td><?= $doctor['doc_doctor_img'] ?></td>
									<td><?= $doctor['doc_doctor_prioridad'] ?></td>
									<td><?= $doctor['doc_doctor_galeria'] ?></td>
								</tr>

							<?php
							}
							?>
						</tbody>
					</table>
					<a href="/backpanel/doctores/create.php" class="btn btn-success">Nueva red de seguros</a>
				</div>
				<div class="modal fade" id="previewModal" tabindex="-1" aria-labelledby="previewModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable w-75">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="previewModalLabel">Pagina del doctor</h5>
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
										<div class="col-sm-4 doctor-title">
											<div class="">
												<h3 class="m-0 doctor_name">John doe</h3>
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
											<a class="nav-link" id="galeria-tab" data-toggle="tab" href="#galeria" role="tab" aria-controls="galeria" aria-selected="false">Galeria</a>
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
														<h5 class="text-muted">Especialidades</h5>
														<p class="doctor_especialidades">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam lacus nisl, dignissim eget augue faucibus, convallis pretium mauris. Vivamus hendrerit eros vitae tempus tempor. Nulla facilisi. </p>
														<h5 class="text-muted">Horarios de atención</h5>
														<p class="doctor_horarios">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam lacus nisl, dignissim eget augue faucibus, convallis pretium mauris. Vivamus hendrerit eros vitae tempus tempor. Nulla facilisi. </p>
														<h5 class="text-muted">Redes de Seguros</h5>
														<ul class="doctor_seguros">
															<li>Duis nec elit non leo molestie varius.</li>
															<li>Pellentesque eu purus vitae felis mollis bibendum at sed sem.</li>
															<li>Aenean rhoncus nibh vel vehicula dapibus.</li>
															<li>Fusce aliquet felis in viverra interdum.</li>
															<li>Etiam pulvinar justo at turpis lacinia, id aliquam sem facilisis.</li>
														</ul>
														<h5 class="text-muted">Formas de pago</h5>
														<p class="pagos">
															Duis nec elit non leo molestie varius. Pellentesque eu purus vitae felis mollis bibendum at sed sem. Aenean rhoncus nibh vel vehicula dapibus. Fusce aliquet felis in viverra interdum. Etiam pulvinar justo at turpis lacinia, id aliquam sem facilisis.
														</p>
													</div>
													<div class="col-md-4">
														<h5 class="text-muted">Local</h5>
														<p class="">5</p>
														<h5 class="text-muted">Años de experiencia</h5>
														<p class="doctor_experiencia">10</p>
													</div>
												</div>
											</div>

										</div>
										<div role="tabpanel" class="tab-pane fade" id="seguro" role="tabpanel" aria-labelledby="seguro-tab">
											<div class="container-fluid" id="lista-seguros">
												<h4>Lista de redes de seguros</h4>
												<hr>
												<div class="row">
													<div class="col-md-6">
														<ul>
															<li>Suspendisse sit amet</li>
															<li>Proin finibus est</li>
															<li>Integer consequat</li>
															<li>Suspendisse a lorem</li>
															<li>Aenean et mauris</li>
														</ul>
													</div>
													<div class="col-md-6">
														<ul>
															<li>Suspendisse sit amet</li>
															<li>Proin finibus est</li>
															<li>Integer consequat</li>
															<li>Suspendisse a lorem</li>
															<li>Aenean et mauris</li>
														</ul>
													</div>
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
														<p class="doctor_telefono_1">(+503) 0000 0000</p>
														<p class="doctor_telefono_2">(+503) 0000 0000</p>
														<h5 class="text-muted">Correo electronico</h5>
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
														<p class="doctor_posgrados">
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
												<div id="gallery" class="simplegallery">
													<div class="content text-center">
														<img src="" class="w-75 image_1" alt="" />
														<p class="caption caption_1"></p>

													</div>

													<div class="clear"></div>

													<div class="thumbnail container">

														<div class="thumb" id="thumbid_0">
															<a href="#" rel="<?php echo ($i + 1) ?>">
																<img src="" id="thumb_0" class="thumbs" alt="" />
															</a>
														</div>
														
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
	<?php include "../../components/footer.php" ?>
	<script type="text/javascript" src="/js/jquery.min.js"></script>
	<!-- Bootstrap core JavaScript -->
	<script type="text/javascript" src="/js/bootstrap.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {

			$('#previewModal').modal('show');

		});
	</script>
</body>

</html>