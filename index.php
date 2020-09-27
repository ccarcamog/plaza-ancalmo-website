<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Plaza ANCALMO</title>

	<!-- MDB icon -->
	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Material Design Bootstrap -->
	<!-- <link rel="stylesheet" href="css/mdb.min.css"> -->
	<!-- Your custom styles (optional) -->
	<link rel="stylesheet" href="css/style.css">

</head>

<body>

	<!-- jQuery -->
	<script type="text/javascript" src="js/jquery.min.js"></script>


	<?php include 'components/navbar.php' ?>

	<main>

		<div id="carouselJumbotron" class="carousel slide" data-ride="carousel">
			<div class="carousel-inner">
				<div id="item1" class="carousel-item active">
					<div class="filter">
						<h1>Lorem Ipsum</h1>
					</div>
				</div>
				<div id="item2" class="carousel-item">
					<div class="filter">
						<h1>Dolor sit amet</h1>
					</div>
				</div>
				<div id="item3" class="carousel-item">
					<div class="filter">
						<h1 class="text-align-center">Proin viverra pharetra.</h1>
					</div>
				</div>
			</div>
			<a class="d-none d-md-flex carousel-control-prev" href="#carouselJumbotron" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="d-none d-md-flex carousel-control-next" href="#carouselJumbotron" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>

		<div class="container">

			<div class="row">


				<div class="col-md-12 text-center m-4">
					<h2 class="mt-5">Plaza Ancalmo</h2>
					<hr>
					<p class="text-center">
						Es un moderno complejo de consultorios que nace con el objetivo de atraer diversidad de profesionales de la salud al municipio de Antiguo Cuscatlán, convirtiéndose así en una opción accesible y segura para los visitantes.
					</p>
				</div>

			</div>

		</div>

		<div class="container" id="conozcanos">
			<div class="filter">

				<div class="row">

					<div class="col-md-6 p-5 text-center" id="conozcanosInfo">

						<div>
							<h2>Conózcanos</h2>
							<hr class="border-white">
							<p> Telefono: 2243 0300</p>
							<p> Email: <a class="text-white" href="mailto:servicioalcliente@ancalmo.com" target="_blank"> servicioalcliente@ancalmo.com</a></p>
							<p>Blv. Walter Deininger, Antiguo Cuscatlán</p>
							<p></p>
						</div>

					</div>
					<div class="col-md-6 p-5" id="inicioMapa">
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3876.70656254132!2d-89.24696348563988!3d13.675598602740347!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8f6331d67f249713%3A0x10e5b9244802c39b!2sPlaza%20Ancalmo!5e0!3m2!1ses!2ssv!4v1601178596250!5m2!1ses!2ssv" height="400" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
					</div>

				</div>
			</div>
		</div>



	</main>


	<!-- Bootstrap core JavaScript -->
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<!-- MDB core JavaScript -->
	<!-- <script type="text/javascript" src="js/mdb.min.js"></script> -->
	<!-- Your custom scripts (optional) -->

</body>

</html>