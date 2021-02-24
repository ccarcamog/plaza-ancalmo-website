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
	<link rel="stylesheet" href="/css/style.css">
	<link rel="stylesheet" href="/farmacia/farmacia-style.css">
	<link rel="stylesheet" href="/css/slippry.css">
	<link rel="stylesheet" href="/css/gotham-bold/stylesheet.css">

</head>

<body>

	<?php include "../components/navbar.php" ?>

	<header class="container-fluid" id="farmaciaHeader">
		<div>
			<img src="/img/svg/Logo Farmacia Ancalmo copy.svg" alt="Logo Farmacia Ancalmo">
		</div>
	</header>

	<div class="container text-center mt-5" id="introFarmacia">

		<div class="row">

			<div class="col-md-6 p-4" id="introTexto">

				<h2>Tu lugar de confianza</h2>
				<hr>
				<p>¡Somos un nuevo concepto en farmacias, porque tenemos de todo para todos!</p>
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
					<p>Contamos con servicio a domicilio, pago de servicios y mucho más.</p>
				</div>
				<div class="col-md-4 p-4 text-white text-center">
					<img src="/img/svg/noun_security lock_2734036.svg" alt="seguridad icon" height=100 class="svg-inverted">
					<hr class="border-white">
					<h3><b>Seguridad</b></h3>
					<p>Seguimos protocolos estrictos de bioseguridad y contamos con seguridad para consolidar tu confianza.</p>

				</div>
				<div class="col-md-4 p-4 text-white text-center">
					<img src="/img/svg/noun_shopping_3406366.svg" alt="seguridad icon" height=100 class="svg-inverted">
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
				<img src="/img/svg/noun_hand with money_1380858.svg" height=100 alt="retiro de efectivo">
				<h4 class="mt-4">Retiro de remesas</h4>
			</div>
			<div class="col-md-3 text-center">
				<img src="/img/svg/noun_Piggy Bank_435075.svg" height=100 alt="retiro de efectivo">
				<h4 class="mt-4">Abono a cuentas de ahorro</h4>
			</div>
			<div class="col-md-3 text-center">
				<img src="/img/svg/noun_Purse_3021154.svg" height=100 alt="retiro de efectivo">
				<h4 class="mt-4">Retiro de efectivo</h4>
			</div>
			<div class="col-md-3 text-center">
				<img src="/img/svg/noun_hand_payment_2199577.svg" height=100 alt="retiro de efectivo">
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
		<div class="row">
			<div class="col-md-4 p-3" id="domicilioContacto">
				<h3>Teléfonos:</h3>
				<p><img src="/img/svg/telephone.svg" width=40 alt="whatsapp logo"> 2243-1000 <br> <a href="https://wa.me/50378602663" target="_blank"> <img src="/img/svg/whatsapp.svg" width=40 alt="whatsapp logo"></a> 7860-2663 </p>

			</div>
			<div class="col-md-8 p-0 m-0" id="domicilioCard">
				<div class="row m-0 p-0">
					<div class="col-md-6 m-0 p-0" id="domicilioLugares">
						<center>
							<h3>Envios a:</h3>
						</center>
						<div id="locations">
							<p><img src="/img/svg/noun_Location_1773796.svg" class="svg-inverted" height="30px">Antiguo Cuscatlán</p>
							<p><img src="/img/svg/noun_Location_1773796.svg" class="svg-inverted" height="30px">Colonia Escalón</p>
							<p><img src="/img/svg/noun_Location_1773796.svg" class="svg-inverted" height="30px">Ciudad Merliot</p>
							<p><img src="/img/svg/noun_Location_1773796.svg" class="svg-inverted" height="30px">Santa Tecla</p>
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
			<div class="col-md-6 py-4 px-0" id="hugoImage">
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
							<div class="col-3"><img src="/img/svg/marcas/LOGO ANCALMO NEGRO Y BLANCO copy-01.svg" alt="Logo Ancalmo"></div>
							<div class="col-3"><img src="/img/svg/marcas/LOGO-SUERO-ORAL ANCALMO copy-01.svg" alt="bayer logo"></div>
							<div class="col-3"><img src="/img/svg/marcas/FreeVector-Coca-Cola copy.svg" alt="Coca Cola logo"></div>
							<div class="col-3"><img src="/img/svg/marcas/la-roche-posay-laboratoire-dermatologique-vector-logo.svg" alt="La Roche Posay logo"></div>
						</div>
					</div>
					<div class="carousel-item">
						<div class="row">
							<div class="col-3"><img src="/img/svg/marcas/Logo Bimbo.svg" alt="Bimbo logo"></div>
							<div class="col-3"><img src="/img/svg/marcas/LOGO HESSEL  copy.svg" alt="Hessel logo"></div>
							<div class="col-3"><img src="/img/svg/marcas/logo zorritone SIN TEXTO copy.svg" alt="Zorritone logo"></div>
							<div class="col-3"><img src="/img/svg/marcas/vichy_labolatories_logo copy.svg" alt="Vichy Laboratories logo"></div>
						</div>
					</div>
					<div class="carousel-item">
						<div class="row">
							<div class="col-3"><img src="/img/svg/marcas/Nestle.svg" alt="Nestle logo"></div>
							<div class="col-3"><img src="/img/svg/marcas/Oral-B.svg" alt="Oral B logo"></div>
							<div class="col-3"><img src="/img/svg/marcas/unnamed-14.svg" alt="Diana logo"></div>
							<div class="col-3"><img src="/img/svg/marcas/5d835c91c9c262d0605a776c7def140e.svg" alt="Saba Laboratories logo"></div>
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


	<div class="container" id="farmaciaGaleria">
		<center class="mt-5 mb-5">
			<h3>Galería</h3>
		</center>

		<ul id="thumbnails">
			<?php for ($i = 0; $i < count($galeria_imgs); $i++) { ?>
				<li>
					<a href="#slide<?= $i + 1 ?>">
						<img src="/backpanel/galeria/<?= $galeria_imgs[$i]['galeria_img_url'] ?>" alt="<strong><?= $galeria_imgs[$i]['galeria_img_nombre'] ?></strong><br><?= $galeria_imgs[$i]['galeria_img_caption'] ?>" style="max-height:90vh; object-fit:scale-down">
					</a>
				</li>

			<?php } ?>
		</ul>
		<div class="thumb-box">
			<ul class="thumbs">
				<div id="thumbnailCarousel" class="carousel slide" data-ride="carousel" data-interval="3000">
					<div class="carousel-inner">
						<?php
						$cont = 0;
						while ($cont < count($galeria_imgs)) {
						?>

							<div class="carousel-item <?= ($cont == 0) ? "active" : "" ?>">

								<?php
								for ($i = 0; $i < 5 && $cont < count($galeria_imgs); $i++) {
								?>
									<li><a class="thumblink" href="#<?= $cont + 1 ?>" data-goto="<?= $cont + 1 ?>"><img src="/backpanel/galeria/<?= $galeria_imgs[$cont]['galeria_img_url'] ?>" alt="<strong><?= $galeria_imgs[$cont]['galeria_img_nombre'] ?></strong><br><?= $galeria_imgs[$cont]['galeria_img_caption'] ?>"></a></li>
								<?php
									$cont++;
								}
								?>

							</div>
						<?php
						}
						?>
					</div>
					<a class="carousel-control-prev thumbnail-carousel-arrow-prev d-none d-md-flex svg-inverted" href="#thumbnailCarousel" role="button" data-slide="prev">
						<span class="carousel-control-prev-icon " aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="carousel-control-next thumbnail-carousel-arrow-next d-none d-md-flex svg-inverted" href="#thumbnailCarousel" role="button" data-slide="next">
						<span class="carousel-control-next-icon " aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>

			</ul>
		</div>

	</div>

	<?php include "../components/footer.php" ?>


	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
	<!-- MDB core JavaScript -->
	<!-- <script type="text/javascript" src="/js/mdb.min.js"></script> -->
	<!-- Your custom scripts (optional) -->
	<!-- <script type="text/javascript" src="/js/simplegallery.min.js"></script> -->
	<script src="/js/slippry.min.js"></script>
	<script>
		var thumbs = jQuery('#thumbnails').slippry({
			// general elements & wrapper
			slippryWrapper: '<div class="slippry_box thumbnails" />',
			// options
			transition: 'horizontal',
			pager: false,
			auto: false,
			onSlideBefore: function(el, index_old, index_new) {
				jQuery('.thumbs a img').removeClass('active');
				jQuery('img', jQuery('.thumbs a')[index_new]).addClass('active');
			}
		});

		jQuery('.thumblink').click(function() {
			thumbs.goToSlide($(this).data('goto'));
			return false;
		});
	</script>

</body>

</html>