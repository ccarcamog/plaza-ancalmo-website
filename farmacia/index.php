<?php require "../php/db.php" ?>
<?php require "../php/credentials.php" ?>
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

				<h2>Tu lugar de confianza</h2>
				<hr>
				<p>¡Somos un nuevo concepto en farmacias porque tenemos de todo para todos!</p>
				<p>Nuestra visión de servicio nos inspira a trabajar con excelencia, ofreciendo medicamentos y productos de calidad. Somos tu lugar de confianza.</p>
				<p>Síguenos en nuestras redes:</p>
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
				<img src="/img/farmacia-estantes.jpg" alt="Imagen medicamentos">
			</div>


		</div>

	</div>

	<div class="container" id="farmaciaPuntos">
		<div class="filter">
			<div class="row p-3">
				<div class="col-md-4 text-white p-4 text-center">
					<img class="svg-inverted" src="/img/svg/check.svg" height=100 alt="conveniencia icon">
					<hr class="border-white">
					<h3><b>Conveniencia</b></h3>
					<p>Contamos con servicio a domicilio, pago de servicios y muchas cosas más.</p>
				</div>
				<div class="col-md-4 p-4 text-white text-center">
					<img src="/img/svg/security.svg" alt="seguridad icon" height=100 class="svg-inverted">
					<hr class="border-white">
					<h3><b>Seguridad</b></h3>
					<p>Seguimos protocolos de bioseguridad y contamos con seguridad para tu confianza.</p>

				</div>
				<div class="col-md-4 p-4 text-white text-center">
					<img src="/img/svg/variety.svg" alt="seguridad icon" height=100 class="svg-inverted">
					<hr class="border-white">
					<h3><b>Variedad</b></h3>
					<p>Contamos con una amplia variedad de productos de la más alta calidad.</p>
				</div>
			</div>
		</div>
	</div>


	<center class="mt-5" id="bancoAmigoTitle">
		<h3>También ofrecemos</h3>
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

	<hr class="division">

	<div class="container mt-5" id="domicilioInfo">
		<center>
			<h2>Servicio a domicilio</h2>
		</center>
		<div class="row p-3">
			<div class="col-md-4 p-3" id="domicilioContacto">
				<h3>TELÉFONOS:</h3>
				<p><img src="/img/svg/telephone.svg" width=40 alt="whatsapp logo"> 2243-1000 <br> <a href="https://wa.me/50378602663" target="_blank"> <img src="/img/svg/whatsapp.svg" width=40 alt="whatsapp logo"></a> 7860-2663 </p>

			</div>
			<div class="col-md-8 p-0 m-0" id="domicilioCard">
				<div class="row m-0 p-0">
					<div class="col-md-6 m-0 p-3" id="domicilioLugares">
						<center>
							<h3>ENVIOS A:</h3>
						</center>
						<div id="locations">
							<p><img src="/img/svg/pointer.svg" height="20px">ANTIGUO CUSCATLAN</p>
							<p><img src="/img/svg/pointer.svg" height="20px">COLONIA ESCALÓN</p>
							<p><img src="/img/svg/pointer.svg" height="20px">CIUDAD MERLIOT</p>
							<p><img src="/img/svg/pointer.svg" height="20px">SANTA TECLA</p>
						</div>
					</div>
					<div class="col-md-6 m-0 p-0" id="domicilioImg">
						<img src="/img/farmacia-entrega.jpeg" alt="repartidor ancalmo" id="repartidor-img">
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container" id="hugoDeliveries">
		<div class="row">
			<div class="col-md-6 p-4" id="hugoImage">
				<img src="/img/hugoImage.jpg" alt="Hugo delivery">
			</div>
			<div class="col-md-6 p-4" id="hugoTexto">

				<h3>Encuéntranos en <img id="hugoLogo" src="/img/hugo-logo.png" alt="Hugo Logo Texto"></h3>
				<hr class="w-100">
				<p>Haz tu pedido por medio de Hugo App. <br><br> Encuéntranos como Farmacia Ancalmo, y descubre todos los productos y ofertas que tenemos para tí.</p>
				<!-- <p><img src="/img/hugoIcon.png" alt="Hugo Icon" id="hugoIcon" width="30"></p> -->

			</div>
		</div>
	</div>
	<hr class="division">

	<div class="container-fluid p-4" id="marcasCarousel">

		<h3 class="text-center">Contamos con marcas de la más alta calidad</h3>


		<div id="carouselMarcas" class=" row carousel slide carousel-slide" data-ride="carousel">

			<div class="container">

				<div class="carousel-inner" role="listbox">

					<div class="carousel-item active">
						<div class="row">
							<div class="col-3"><img src="/img/oral-b-1-logo-png-transparent.png" alt="oralb logo"></div>
							<div class="col-3"><img src="/img/bayer-.eps-logo-vector.png" alt="bayer logo"></div>
							<div class="col-3"><img src="/img/Colgate_logo.svg.png" alt="colgate logo"></div>
							<div class="col-3"><img src="/img/Nestle-logo.png" alt="nestle logo"></div>
						</div>
					</div>
					<div class="carousel-item">
						<div class="row">
							<div class="col-3"><img src="/img/oral-b-1-logo-png-transparent.png" alt="oralb logo"></div>
							<div class="col-3"><img src="/img/bayer-.eps-logo-vector.png" alt="bayer logo"></div>
							<div class="col-3"><img src="/img/Colgate_logo.svg.png" alt="colgate logo"></div>
							<div class="col-3"><img src="/img/Nestle-logo.png" alt="nestle logo"></div>
						</div>
					</div>
					<div class="carousel-item">
						<div class="row">
							<div class="col-3"><img src="/img/oral-b-1-logo-png-transparent.png" alt="oralb logo"></div>
							<div class="col-3"><img src="/img/bayer-.eps-logo-vector.png" alt="bayer logo"></div>
							<div class="col-3"><img src="/img/Colgate_logo.svg.png" alt="colgate logo"></div>
							<div class="col-3"><img src="/img/Nestle-logo.png" alt="nestle logo"></div>
						</div>
					</div>
					<div class="carousel-item">
						<div class="row">
							<div class="col-3"><img src="/img/oral-b-1-logo-png-transparent.png" alt="oralb logo"></div>
							<div class="col-3"><img src="/img/bayer-.eps-logo-vector.png" alt="bayer logo"></div>
							<div class="col-3"><img src="/img/Colgate_logo.svg.png" alt="colgate logo"></div>
							<div class="col-3"><img src="/img/Nestle-logo.png" alt="nestle logo"></div>
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

	<hr class="division">

	<?php

	$db = new db($dbHost, $dbUID, $dbPWD, $dbName);

	$galeria_id = 2;

	$sql = "SELECT * FROM galeria_img WHERE galeria_img_galeria_key=? ORDER BY galeria_img_orden ASC";
	$galeria_imgs = $db->query($sql, $galeria_id)->fetchAll();

	?>


	<div class="container-fluid" id="farmaciaGaleria">
		<center class="mt-5 mb-5">
			<h3>Galería</h3>
		</center>

		<div id="gallery" class="simplegallery">

			<div class="content text-center">

				<div id="galeriaCarousel" class="carousel slide" data-ride="carousel">
					<div class="carousel-inner">
						<?php
						for ($i = 0; $i < count($galeria_imgs); $i++) {
						?>
							<div class="carousel-item <?php if (!$i) echo "active" ?>">
								<img src="/backpanel/galeria/<?= $galeria_imgs[$i]['galeria_img_url'] ?>" class="image_<?= $i + 1 ?>" />
								<p class="caption caption_<?= $i + 1 ?>"><strong><?= $galeria_imgs[$i]['galeria_img_nombre'] ?></strong><br><?= $galeria_imgs[$i]['galeria_img_caption'] ?></p>
							</div>
						<?php
						}
						?>
					</div>
					<a class="carousel-control-prev" href="#galeriaCarousel" role="button" data-slide="prev">

						<img class="direction-arrow" src="/img/svg/left-arrow-angle.svg">
						<span class="sr-only">Previous</span>
					</a>
					<a class="carousel-control-next" href="#galeriaCarousel" role="button" data-slide="next">

						<img class="direction-arrow" src="/img/svg/right-arrow-angle.svg">
						<span class="sr-only">Next</span>
					</a>
				</div>


			</div>

			<div class="clear"></div>

			<div class="thumbnail container">
				<?php
				for ($i = 0; $i < count($galeria_imgs); $i++) {
				?>
					<div class="thumb" id="thumbid_<?= ($i + 1) ?>" data-id="<?= $i ?>">
						<a rel="<?= ($i + 1) ?>">
							<img src="/backpanel/galeria/<?= $galeria_imgs[$i]['galeria_img_url'] ?>" id="thumb_<?= ($i + 1) ?>" class="thumbs" alt="" />
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

			$('#galeriaCarousel').carousel({
				interval: 5000
			});
			$(".thumb").click(function() {
				var id = $(this).data("id");
				$('#galeriaCarousel').carousel(id);

			});

		});
	</script>

</body>

</html>