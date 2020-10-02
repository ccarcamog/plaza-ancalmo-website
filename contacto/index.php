<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Contáctanos</title>

	<!-- MDB icon -->
	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="/css/bootstrap.min.css">
	<!-- favicon  -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
	<!-- Material Design Bootstrap -->
	<!-- <link rel="stylesheet" href="css/mdb.min.css"> -->
	<!-- Your custom styles (optional) -->
	<link rel="stylesheet" href="/css/style.css">
	<link rel="stylesheet" href="/contacto/contacto-style.css">
	<link rel="stylesheet" href="css/simplegallery.demo1.css">


</head>

<body>

	<?php 
		include "../php/contact-form.php";
	?>

	<?php include "../components/navbar.php" ?>

	<header class="container-fluid" id="contactoHeader">
		<div class="filter p-3 p-md-5">
			<h1>Contacto</h1>
		</div>
	</header>

	<div class="container text-center mt-5 p-3" id="introFarmacia">

		<h2>Contáctanos</h2>
		<hr>
		<p>Estamos listos para atender tus necesidades.</p>

	</div>

	<div class="container-fluid" id="contactoMapa">
		<div class="text-center p-3 p-md-5">

			<h3>Encuentranos</h3>
			<p class="">
				Bulevard Walter Deininger Antiguo Cuscatlán, El Salvador <br>
				O navega con:
			</p>
			<p>
				<a href="https://goo.gl/maps/r68MJvPQSkSZuzhP6" target="_blank">
					<img src="img/svg/Google_Maps_icon_(2020).svg" height="70" alt="google maps icon">
				</a>
				<a href="https://www.waze.com/es/livemap/directions/el-salvador/la-libertad/plaza-ancalmo?navigate=yes&place=ChIJE5ckf9YxY48Rm8MCSCS55RA" target="_blank">
					<img src="img/svg/icons8-waze.svg" height="75" alt="waze icon">
				</a>
			</p>
			<div class="container">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3876.706562542108!2d-89.24696884975768!3d13.675598602692528!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8f6331d67f249713%3A0x10e5b9244802c39b!2sPlaza%20Ancalmo!5e0!3m2!1ses!2ssv!4v1601660375019!5m2!1ses!2ssv" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
			</div>
		</div>
	</div>

	<div class="container mt-5" id="contactoInfo">
		<div class="row text-center">
			<div class="col-md-5">
				<h3>Contáctanos en <br>facebook</h3>
				<a href="https://www.facebook.com/PlazaAncalmo/" target="_blank">
					<p class="text-muted">facebook.com/PlazaAncalmo</p>
				</a>
				<a href="https://www.facebook.com/PlazaAncalmo/" target="_blank">
					<img src="img/svg/facebook.svg" alt="facebook icon" height="60">
				</a>
			</div>
			<div class="vertical-line d-none d-md-flex"></div>
			<hr class="border-black d-md-none">
			<div class="col-md-5">
				<h3 id="llamanos-title">O llamanos</h3>
				<p class="text-muted">2243 0300</p>
				<img src="img/svg/phone-square.svg" alt="phone icon" height="60">
			</div>
		</div>
	</div>

	<div class="container mt-5" id="contactoForma">
		
			<div class="filter p-5">
				<h4>Forma de contacto</h4>
				<hr>
				<form action="/contacto" method="POST">
					<div class="row form-group">
						<div class="col">
							<input type="text" name="nombre" class="form-control" placeholder="Nombre">
						</div>
						<div class="col">
							<input type="text" name="apellido" class="form-control" placeholder="Apellido">
						</div>
					</div>
					<div class="row form-group">
						<div class="col">
							<input type="email" name="email" placeholder="Correo electrónico" class="form-control">
						</div>
					</div>
					<div class="row form-group p-3">
						<textarea name="comentario" id="comentario" rows="5" class="form-control" placeholder="Comentario"></textarea>
					</div>
					<div class="row form-group p-3 pb-0">
						<div class="col">
							<input type="submit" name="submit" value="Enviar" class="btn btn-lg btn-warning">
						</div>
					</div>
				</form>
			</div>
	
	</div>


	<?php include "../components/footer.php" ?>


	<script type="text/javascript" src="js/jquery.min.js"></script>
	<!-- Bootstrap core JavaScript -->
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<!-- MDB core JavaScript -->
	<script type="text/javascript" src="js/mdb.min.js"></script>
	<!-- Your custom scripts (optional) -->
	<script>

	</script>

</body>

</html>