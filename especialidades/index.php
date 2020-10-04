<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Odontología</title>

	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="/css/bootstrap.min.css">
	<!-- favicon  -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
	<!-- Material Design Bootstrap -->
	<!-- <link rel="stylesheet" href="css/mdb.min.css"> -->
	<!-- Your custom styles (optional) -->
	<link rel="stylesheet" href="/css/style.css">
	<link rel="stylesheet" href="/especialidades/especialidades-style.css">

</head>

<body>

	<?php include "../components/navbar.php" ?>

	<div class="container-fluid" id="especialidadTitle">
		<div class="filter p-md-5">
			<h1>Especialidades:</h1>
		</div>
	</div>

	<div class="container p-md-4 mt-3" id="especialidad info">
		<div>
			<h2>Odontología</h2>
			<p class="text-muted">Contamos con las siguientes opciones para ti. </p>
		</div>
	</div>

	<hr>

	<div class="container" id="listaDoctores">
		<?php
		for ($i = 0; $i < 5; $i++) {

		?>

			<div class="row doctor">
				<div class=" col-sm-4 doctor-image mb-3">
					<img src="/img/doctor-1149149_1920.jpg" alt="doctor profile pic">
				</div>
				<div class=" col-sm-8 doctor-text">
					<a href="/especialidades/doctor/" class="doctor-title d-inline">
						<h3 class="m-0">Dr. John Doe</h3>
						<h4 class="text-muted ml-md-3">Odontologo</h4>
					</a>
					<hr>
					<p>Contacto: <br>
						email@example.com <br>
						+50300000000 <br>
						<a href="#">Leer más</a>
					</p>
				</div>
			</div>

		<?php
		}
		?>

	</div>

	<?php include "../components/footer.php" ?>

	<body>


		<script type="text/javascript" src="/js/jquery.min.js"></script>
		<!-- Bootstrap core JavaScript -->
		<script type="text/javascript" src="/js/bootstrap.min.js"></script>
		<!-- MDB core JavaScript -->
		<script type="text/javascript" src="/js/mdb.min.js"></script>

	</body>

</html>