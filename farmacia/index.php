<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Farmacia ANCALMO</title>
	<link rel="icon" href="/img/svg/Logo Plaza Ancalmo.svg">
	<!-- MDB icon -->
	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="/css/bootstrap.min.css">
	<!-- favicon  -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
	<!-- Material Design Bootstrap -->
	<!-- <link rel="stylesheet" href="css/mdb.min.css"> -->
	<!-- Your custom styles (optional) -->
	<link rel="stylesheet" href="/css/style.css">
	<link rel="stylesheet" href="/farmacia/farmacia-style.css">
	<link rel="stylesheet" href="/css/simplegallery.demo1.css">


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


	<center class="mt-5" id="bancoAmigoTitle">
		<h3>Tambien ofrecemos</h3>
	</center>

	<div class="container mt-5" id="bancoAmigo">

		<div class="row mt-5">
			<div class="col-md-3 text-center">
				<img src="/img/svg/retiro-remesas.svg" height=100 alt="retiro de efectivo">
				<h4 class="mt-4">Retiro de remesas</h4>
			</div>
			<div class="col-md-3 text-center">
				<img src="/img/svg/ahorro-efectivo.svg" height=100 alt="retiro de efectivo">
				<h4 class="mt-4">Abono a cuentas de ahorro</h4>
			</div>
			<div class="col-md-3 text-center">
				<img src="/img/svg/retiro-efectivo.svg" height=100 alt="retiro de efectivo">
				<h4 class="mt-4">Retiro de efectivo</h4>
			</div>
			<div class="col-md-3 text-center">
				<img src="/img/svg/pago-servicios.svg" height=100 alt="retiro de efectivo">
				<h4 class="mt-4">Pago de servicios</h4>
			</div>
		</div>
		<center class="mt-4" id="bancoAmigoImg">
			<p class="text-muted">En alianza con:</p>
			<img src="/img/bancoamigo.png" width="200" alt="bancoamigo logo">
		</center>
	</div>


	<hr>

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
	<hr>
	<div class="container-fluid p-4" id="marcasCarousel">

		<h3 class="text-center">Contamos con marcas de la mas alta calidad</h3>


		<div id="carouselMarcas" class=" row carousel slide carousel-slide" data-ride="carousel">

			<div class="container">

				<div class="carousel-inner" role="listbox">

					<div class="carousel-item active">
						<div class="row">
							<div class="col-3"><img src="https://cdn.freebiesupply.com/logos/large/2x/oral-b-1-logo-png-transparent.png" alt="oralb logo"></div>
							<div class="col-3"><img src="https://logosvector.net/wp-content/uploads/2013/01/bayer-.eps-logo-vector.png" alt="bayer logo"></div>
							<div class="col-3"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/0b/Colgate_logo.svg/1024px-Colgate_logo.svg.png" alt="colgate logo"></div>
							<div class="col-3"><img src="https://logos-marcas.com/wp-content/uploads/2020/09/Nestle-Logo.png" alt="nestle logo"></div>
						</div>
					</div>
					<div class="carousel-item">
						<div class="row">
							<div class="col-3"><img src="https://cdn.freebiesupply.com/logos/large/2x/oral-b-1-logo-png-transparent.png" alt="oralb logo"></div>
							<div class="col-3"><img src="https://logosvector.net/wp-content/uploads/2013/01/bayer-.eps-logo-vector.png" alt="bayer logo"></div>
							<div class="col-3"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/0b/Colgate_logo.svg/1024px-Colgate_logo.svg.png" alt="colgate logo"></div>
							<div class="col-3"><img src="https://logos-marcas.com/wp-content/uploads/2020/09/Nestle-Logo.png" alt="nestle logo"></div>
						</div>
					</div>
					<div class="carousel-item">
						<div class="row">
							<div class="col-3"><img src="https://cdn.freebiesupply.com/logos/large/2x/oral-b-1-logo-png-transparent.png" alt="oralb logo"></div>
							<div class="col-3"><img src="https://logosvector.net/wp-content/uploads/2013/01/bayer-.eps-logo-vector.png" alt="bayer logo"></div>
							<div class="col-3"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/0b/Colgate_logo.svg/1024px-Colgate_logo.svg.png" alt="colgate logo"></div>
							<div class="col-3"><img src="https://logos-marcas.com/wp-content/uploads/2020/09/Nestle-Logo.png" alt="nestle logo"></div>
						</div>
					</div>
					<div class="carousel-item">
						<div class="row">
							<div class="col-3"><img src="https://cdn.freebiesupply.com/logos/large/2x/oral-b-1-logo-png-transparent.png" alt="oralb logo"></div>
							<div class="col-3"><img src="https://logosvector.net/wp-content/uploads/2013/01/bayer-.eps-logo-vector.png" alt="bayer logo"></div>
							<div class="col-3"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/0b/Colgate_logo.svg/1024px-Colgate_logo.svg.png" alt="colgate logo"></div>
							<div class="col-3"><img src="https://logos-marcas.com/wp-content/uploads/2020/09/Nestle-Logo.png" alt="nestle logo"></div>
						</div>
					</div>
				</div>
			</div>

			<a class="carousel-control-prev svg-inverted d-none d-md-flex" href="#carouselMarcas" role="button" data-slide="prev">
				<img src="/img/svg/arrow_left.svg" alt="arrow left prev">
			</a>
			<a class="carousel-control-next svg-inverted d-none d-md-flex" href="#carouselMarcas" role="button" data-slide="next">
				<img src="/img/svg/arrow_right.svg" alt="arrow right next">
			</a>

		</div>

	</div>

	<hr>


	<div class="container-fluid" id="farmaciaGaleria">
		<center class="mt-5 mb-5">
			<h3>Galeria</h3>
		</center>

		<div id="gallery" class="simplegallery">
			<div class="content text-center">
				<img src="/farmacia/galeria/foto0.jpg" class="w-75 image_1" alt="" />
				<p class="caption caption_1">Descripción de la imagen 1</p>
				<?php
				for ($i = 1; $i < 6; $i++) {
				?>
					<img src="/farmacia/galeria/foto<?php echo $i ?>.jpg" class="w-75 image_<?php echo ($i + 1) ?>" style="display:none" alt="" />
				<?php
				}
				for ($i = 1; $i < 6; $i++) {
				?>
					<p class="caption caption_<?php echo ($i + 1) ?> " style="display:none">Descripción de la imagen <?php echo ($i + 1) ?></p>
				<?php
				}
				?>
			</div>

			<div class="clear"></div>

			<div class="thumbnail container">
				<?php
				for ($i = 0; $i < 6; $i++) {
				?>
					<div class="thumb" id="thumbid_<?php echo ($i + 1) ?>">
						<a href="#" rel="<?php echo ($i + 1) ?>">
							<img src="/farmacia/galeria/foto<?php echo $i ?>.jpg" id="thumb_<?php echo ($i + 1) ?>" class="thumbs" alt="" />
						</a>
					</div>
				<?php
				}
				?>

			</div>

		</div>
	</div>

	<?php include "../components/footer.php" ?>


	<script type="text/javascript" src="/js/jquery.min.js"></script>
	<!-- Bootstrap core JavaScript -->
	<script type="text/javascript" src="/js/bootstrap.min.js"></script>
	<!-- MDB core JavaScript -->
	<!-- <script type="text/javascript" src="/js/mdb.min.js"></script> -->
	<!-- Your custom scripts (optional) -->
	<script type="text/javascript" src="/js/simplegallery.min.js"></script>
	<script>
		$(document).ready(function() {

			$('#gallery').simplegallery({
				galltime: 400,
				gallcontent: '.content',
				gallthumbnail: '.thumbnail',
				gallthumb: '.thumb'
			});
			$(".thumb").click(function() {
				var id = $(this).attr("id");
				var cap_id = ".caption_" + id.substr(id.length - 1);
				$(".caption").css("display", "none");
				$(cap_id).css("display", "block");
			});

		});
	</script>

</body>

</html>