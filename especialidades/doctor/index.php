<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Dr. John Doe</title>
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
				<img src="/img/doctor-1149149_1920.jpg" alt="doctor seguro pic">
			</div>
			<div class="col-sm-8">
				<div class="doctor-title">
					<h3 class="m-0">Dr. John Doe</h3>
					<h4 class="text-muted ml-md-3">Odontologo</h4>
				</div>
				<hr>
				<p>Contacto: <br>
					email@example.com <br>
					+50300000000 <br>
					<a href="#">Leer más</a>
				</p>
			</div>
		</div>
	</div>

	<div class="container" id="doctorTabs">
		<ul class="nav nav-tabs" id="myTab" role="tablist">
			<li>
				<a href="#" class="btn btn-danger mr-3">
					<img src="/img/svg/calendar-line.svg" class="svg-inverted mr-2" alt="calendar icon" height="20px">
					Pedir consulta
				</a>
			</li>
			<li role="presentation" class="nav-item active">
				<a class="nav-link active" id="resumen-tab" data-toggle="tab" href="#resumen" role="tab" aria-controls="resumen" aria-selected="true">Resumen</a>
			</li>
			<li role="presentation" class="nav-item">
				<a class="nav-link" id="seguro-tab" data-toggle="tab" href="#seguro" role="tab" aria-controls="seguro" aria-selected="false">Seguros Médicos</a>
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
					<h4>Acerca de Dr. John Doe</h4>
					<hr>
					<div class="row">
						<div class="col-md-8">

							<p>
								Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...
							</p>
							<h5 class="text-muted">Especialidades</h5>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam lacus nisl, dignissim eget augue faucibus, convallis pretium mauris. Vivamus hendrerit eros vitae tempus tempor. Nulla facilisi. </p>
							<h5 class="text-muted">Sub-especialidades</h5>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam lacus nisl, dignissim eget augue faucibus, convallis pretium mauris. Vivamus hendrerit eros vitae tempus tempor. Nulla facilisi. </p>
							<h5 class="text-muted">Seguros médicos</h5>
							<ul>
								<li>Duis nec elit non leo molestie varius.</li>
								<li>Pellentesque eu purus vitae felis mollis bibendum at sed sem.</li>
								<li>Aenean rhoncus nibh vel vehicula dapibus.</li>
								<li>Fusce aliquet felis in viverra interdum.</li>
								<li>Etiam pulvinar justo at turpis lacinia, id aliquam sem facilisis.</li>
							</ul>
						</div>
						<div class="col-md-4">
							<h5 class="text-muted">Años de experiencia</h5>
							<p>10</p>
							<h5 class="text-muted"> No de Local</h5>
							<p>5</p>
						</div>
					</div>
				</div>

			</div>
			<div role="tabpanel" class="tab-pane fade" id="seguro" role="tabpanel" aria-labelledby="seguro-tab">
				<div class="container-fluid" id="lista-seguros">
					<h4>Lista de seguros médicos</h4>
					<hr>
					<h5 class="text-muted">Seguros privados</h5>
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
							<p>(+503) 0000 0000</p>
							<p>(+503) 0000 0000</p>
							<h5 class="text-muted">Correo electronico</h5>
							<p>email@example.com</p>
						</div>
						<div class="col-md-6">
							<h5 class="text-muted">Facebook</h5>
							<p>/john-doe</p>
							<h5 class="text-muted">Instagram</h5>
							<p>@johndoe.sv</p>
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
							<p>Proin ullamcorper egestas tellus vel.</p>
							<h5 class="text-muted">Posgrados</h5>
							<ul>
								<li>Fusce elementum quam et tempus pellentesque.</li>
								<li>Proin eu ex iaculis, ultricies leo sit amet, rhoncus ligula.</li>
								<li>Praesent nec est tempor, accumsan tortor vitae, commodo risus.</li>
								<li>Fusce vitae dolor id justo auctor feugiat.</li>
							</ul>
						</div>
						<div class="col-md-6">
							<h5 class="text-muted">Especializaciónes</h5>
							<ul>
								<li>Fusce interdum urna non finibus commodo.</li>
								<li>Aenean ut enim vel nisl efficitur fermentum.</li>
								<li>Maecenas vitae erat aliquet, rhoncus ante id, euismod odio.</li>
							</ul>
							<h5 class="text-muted">Experiencia</h5>
							<ul>
								<li>Mauris nec leo vitae nisl blandit dapibus.</li>
								<li>Nunc ac tellus sodales, blandit elit non, varius purus.</li>
								<li>Cras efficitur arcu vitae neque rutrum accumsan.</li>
								<li>Quisque suscipit velit ut libero maximus suscipit.</li>
								<li>Morbi auctor tortor non sem posuere elementum.</li>
								<li>Morbi in orci ultrices nibh tristique facilisis at ut erat.</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div role="tabpanel" class="tab-pane fade" id="galeria" role="tabpanel" aria-labelledby="galeria-tab">
				<div class="container-fluid">
					<div id="gallery" class="simplegallery">
						<div class="content text-center">
							<img src="/especialidades/doctor/galeria/foto0.jpg" class="w-75 image_1" alt="" />
							<img src="/especialidades/doctor/galeria/foto1.jpg" class="w-75 image_2" style="display:none" alt="" />
							<img src="/especialidades/doctor/galeria/foto2.jpg" class="w-75 image_3" style="display:none" alt="" />
							<img src="/especialidades/doctor/galeria/foto3.jpg" class="w-75 image_4" style="display:none" alt="" />
							<img src="/especialidades/doctor/galeria/foto4.jpg" class="w-75 image_5" style="display:none" alt="" />
							<img src="/especialidades/doctor/galeria/foto5.jpg" class="w-75 image_6" style="display:none" alt="" />
						</div>

						<div class="clear"></div>

						<div class="thumbnail">
							<div class="thumb">
								<a href="#" rel="1">
									<img src="/especialidades/doctor/galeria/foto0.jpg" id="thumb_1" alt="" />
								</a>
							</div>
							<div class="thumb">
								<a href="#" rel="2">
									<img src="/especialidades/doctor/galeria/foto1.jpg" id="thumb_2" alt="" />
								</a>
							</div>
							<div class="thumb">
								<a href="#" rel="3">
									<img src="/especialidades/doctor/galeria/foto2.jpg" id="thumb_3" alt="" />
								</a>
							</div>
							<div class="thumb ">
								<a href="#" rel="4">
									<img src="/especialidades/doctor/galeria/foto3.jpg" id="thumb_4" alt="" />
								</a>
							</div>
							<div class="thumb">
								<a href="#" rel="5">
									<img src="/especialidades/doctor/galeria/foto4.jpg" id="thumb_5" alt="" />
								</a>
							</div>

							<div class="thumb">
								<a href="#" rel="6">
									<img src="/especialidades/doctor/galeria/foto5.jpg" id="thumb_6" alt="" />
								</a>
							</div>
							

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
		<script type="text/javascript" src="/js/mdb.min.js"></script>
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
			})
		</script>
	</body>

</html>