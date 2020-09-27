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

				<div class="col-md-4">
					<img src="img/logo-text.png" alt="Logo plaza Ancalmo con texto" width="300px">
				</div>
				<div class="col-md-8">
					<h2 class="mt-5" >Plaza Ancalmo</h2>
					<hr>
					<p class="text-justify">
						Es un moderno complejo de consultorios que nace con el objetivo de atraer diversidad de profesionales de la salud al municipio de Antiguo Cuscatlán, convirtiéndose así en una opción accesible y segura para los visitantes.
					</p>
				</div>

			</div>

		</div>

		<div class="w-100" id="conozcanos">
			<div class="p-5">
				<div class="content">
					<h2>
						Conózcanos
					</h2>
					<p>
						Blv. Walter Deninger,
						Antiguo Cuscatlán
					</p>
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