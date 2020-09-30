<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Farmacia ANCALMO</title>

	<!-- MDB icon -->
	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- favicon  -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
	<!-- Material Design Bootstrap -->
	<!-- <link rel="stylesheet" href="css/mdb.min.css"> -->
	<!-- Your custom styles (optional) -->
	<link rel="stylesheet" href="css/style.css">

</head>

<body>

	<?php include "../components/navbar.php" ?>

	<header class="container-fluid" id="farmaciaHeader">
		<div>
			<img src="/img/svg/Logo Farmacia Ancalmo copy.svg" alt="Logo Farmacia Ancalmo">
		</div>
	</header>

	<div class="container text-center mt-5 p-3" id="introFarmacia">

		<div class="row">

			<div class="col-md-6 p-4" id="introTexto">



				<h2>Tenemos lo que necesitas</h2>
				<hr>
				<p>Nuestra visión de servicio nos inspira a trabajar con excelencia, ofreciéndote medicamentos y productos de calidad. Somos tu lugar de confianza.</p>
				<p>
					<a href="https://www.facebook.com/FarmaciasAncalmo/" target="_blank">
						<img src="/img/svg/facebook.svg" alt="facebook logo" />
					</a>
					<a href="https://www.instagram.com/FarmaciaAncalmo/" target="_blank">
						<img src="/img/svg/instagram.svg" alt="facebook logo">
					</a>
				</p>


			</div>
			<div class="col-md-6 p-4" id="introImg">
				<img src="/img/medications.jpg" alt="Imagen medicamentos">
			</div>

		</div>


	</div>

	<div class="container" id="farmaciaPuntos">
		<div class="row p-3">
			<div class="col-md-4 text-white p-4 text-center">
				<img class="svg-inverted" src="/img/svg/check.svg" height=100 alt="conveniencia icon">
				<hr class="border-white">
				<h3><b>Conveniencia</b></h3>
				<p>Contamos con servicio a domicilio, pago de servicios y muchas cosas mas.</p>
			</div>
			<div class="col-md-4 p-4 text-white text-center">
				<img src="/img/svg/security.svg" alt="seguridad icon" height=100 class="svg-inverted">
				<hr class="border-white">
				<h3>Seguridad</h3>
				<p>Seguimos protocolos de bioseguridad y contamos con seguridad para tu confianza.</p>

			</div>
			<div class="col-md-4 p-4 text-white text-center">
				<img src="/img/svg/variety.svg" alt="seguridad icon" height=100 class="svg-inverted">
				<hr class="border-white">
				<h3>Variedad</h3>
				<p>Contamos con una amplia variedad de productos de la mas alta calidad.</p>
			</div>
		</div>
	</div>

	<div class="container-fluid" id="bancoServices">

		<div class="container">
			<div class="row">
				<div class="col-md-3">

				</div>
				<div class="col-md-3">

				</div>
				<div class="col-md-3">

				</div>
				<div class="col-md-3">

				</div>
			</div>
		</div>

	</div>

	<div class="container mt-5" id="domicilioInfo">
		<center>
			<h2>Servicio a domicilio</h2>
		</center>
		<div class="row p-3">
			<div class="col-md-6 text-center p-3">
				<h3> <i> TELEFONOS: </i> </h3>
				<p>2243-1000 <br> 7860-2663 </p>
				<a href="https://wa.me/50378602663" target="_blank"> <img src="/img/svg/whatsapp.svg" width=40 alt="whatsapp logo"></a>
			</div>
			<div class="col-md-6 p-3" id="domicilioLugares">
				<div>
					<h3><i>ENVIOS A:</i></h3>

					<Ul>
						<li>ANTIGUO CUSCATLAN</li>
						<li>COLONIA ESCALON</li>
						<li>CIUDAD MERLIOT</li>
						<li>SANTA TECLA</li>
					</Ul>

				</div>
			</div>
		</div>
	</div>

	<hr>

	<div class="container" id="hugoDeliveries">
		<div class="row">
			<div class="col-md-6 text-center p-4" id="hugoImage">
				<img src="/img/hugoImage.jpg" alt="Hugo delivery">
			</div>
			<div class="col-md-6 p-4 text-center" id="hugoTexto">

				<h3>Hacemos envios por <img id="hugoLogo" src="/img/hugo-logo.png" alt="Hugo Logo Texto"></h3>
				<hr>
				<p>Encuentranos en la aplicación</p>
				<p><img src="/img/hugoIcon.png" alt="Hugo Icon" id="hugoIcon" width="30"></p>

			</div>
		</div>
	</div>
	<div class="container">
		
		<div id="carousel-example-1z" class="carousel slide carousel-fade" data-ride="carousel">
		
			<ol class="carousel-indicators">
				<li data-target="#carousel-example-1z" data-slide-to="0" class="active"></li>
				<li data-target="#carousel-example-1z" data-slide-to="1"></li>
				<li data-target="#carousel-example-1z" data-slide-to="2"></li>
			</ol>
		
			<div class="carousel-inner" role="listbox">
				
				<div class="carousel-item active">
					<img class="d-block w-100" src="https://mdbootstrap.com/img/Photos/Slides/img%20(130).jpg" alt="First slide">
				</div>
				
				<div class="carousel-item">
					<img class="d-block w-100" src="https://mdbootstrap.com/img/Photos/Slides/img%20(129).jpg" alt="Second slide">
				</div>
				
				<div class="carousel-item">
					<img class="d-block w-100" src="https://mdbootstrap.com/img/Photos/Slides/img%20(70).jpg" alt="Third slide">
				</div>
				
			</div>
			
			<a class="carousel-control-prev" href="#carousel-example-1z" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="carousel-control-next" href="#carousel-example-1z" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
			
		</div>
		
	</div> 

	<?php include "../components/footer.php" ?>


	<script type="text/javascript" src="js/jquery.min.js"></script>
	<!-- Bootstrap core JavaScript -->
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<!-- MDB core JavaScript -->
	<script type="text/javascript" src="js/mdb.min.js"></script>
	<!-- Your custom scripts (optional) -->
</body>

</html>