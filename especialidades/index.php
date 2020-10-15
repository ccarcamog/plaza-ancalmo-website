<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Odontología</title>
	<link rel="icon" href="/img/Logo Plaza Ancalmo.png">
	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="/css/bootstrap.min.css">
	<!-- favicon  -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
	<!-- Material Design Bootstrap -->
	<!-- <link rel="stylesheet" href="/css/mdb.min.css"> -->
	<!-- Your custom styles (optional) -->
	<link rel="stylesheet" href="/css/style.css">
	<link rel="stylesheet" href="/especialidades/especialidades-style.css">

</head>

<body>

	<?php include "../components/navbar.php" ?>

	<?php 

	class doctor{ 
		
		public $nombre;
		public $titulo;
		public $especialidad;
		public $imgPerfil;
	}

	$doctores = [new doctor, new doctor];
	

	$doctores[0]->nombre = "Dra. Diana Flores Urrutia";
	$doctores[0]->titulo = "Ginecóloga";
	$doctores[0]->especialidad = "ginecología";
	$doctores[0]->imgPerfil = "doctor-diana-flores.jpg";

	$doctores[1]->nombre = "Dr. Guillermo Mata";
	$doctores[1]->titulo = "Pediatra";
	$doctores[1]->especialidad = "pediatría";
	$doctores[1]->imgPerfil = "doctor-guillermo-mata.jpg";
	
	?>

	<div class="container-fluid" id="especialidadTitle">
		<div class="filter p-md-5">
			<h1>Especialidades:</h1>
		</div>
	</div>

	<div class="container p-md-4 mt-3" id="especialidad info">
		<div>
			<h2><?php echo $titulo ?></h2>
			<p class="text-muted">Contamos con los mejores especialistas para cuidar de ti y de tu familia</p>
		</div>
	</div>

	<hr>


	<div class="container" id="listaDoctores">
		<?php
		for ($i = 0; $i < 2; $i++) {

			if(isset($_GET["especialidad"]) && $_GET["especialidad"] != $doctores[$i]->especialidad ){
				
				continue;
			}

		?>

			<div class="row doctor">
				<div class=" col-sm-4 doctor-image mb-3">
					<img src="/img/<?php echo $doctores[$i]->imgPerfil?>" alt="doctor profile pic">
				</div>
				<div class=" col-sm-8 doctor-text">
					<a href="/especialidades/doctor/?especialidad=<?php echo $_GET["especialidad"] ?>" class="doctor-title d-inline">
						<h3 class="m-0"><?php echo $doctores[$i]->nombre ?></h3>
						<h4 class="text-muted ml-md-3"><?php echo $doctores[$i]->titulo ?></h4>
					</a>
					<hr>
					<p>Contacto: <br>
						doctor@ancalmo.com <br>
						7398-3470 <br>
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
		<!-- <script type="text/javascript" src="/js/mdb.min.js"></script> -->

	</body>

</html>