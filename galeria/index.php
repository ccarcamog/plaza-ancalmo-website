<!DOCTYPE html>
<html lang="en">
<?php require "../php/db.php" ?>
<?php require "../php/credentials.php" ?>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Galeria</title>
	<link rel="icon" href="/img/Logo Plaza Ancalmo.png">
	<link rel="stylesheet" href="/css/bootstrap.min.css">
	<!-- favicon  -->
	<link rel="stylesheet" href="/css/style.css">
	<link rel="stylesheet" href="/galeria/galeria-style.css">
	<!-- <link rel="stylesheet" href="/css/simplegallery.demo1.css"> -->
	<link rel="stylesheet" href="/css/slippry.css">
</head>

<body>

	<?php include "../components/navbar.php" ?>

	<div class="container-fluid p-0" id="galeriaHeader">
		<div class="filter text-white text-center p-5">
			<h2>Galería de imágenes</h2>
		</div>
	</div>

	<?php

	$db = new db($dbHost, $dbUID, $dbPWD, $dbName);

	$galeria_id = 1;

	$sql = "SELECT * FROM galeria_img WHERE galeria_img_galeria_key=? ORDER BY galeria_img_orden ASC";
	$galeria_imgs = $db->query($sql, $galeria_id)->fetchAll();

	?>

	<div class="container mt-5">

		<ul id="thumbnails">
			<?php for ($i = 0; $i < count($galeria_imgs); $i++) { ?>
				<li>
					<a href="#slide<?= $i + 1 ?>">
						<img src="/backpanel/galeria/<?= $galeria_imgs[$i]['galeria_img_url'] ?>" alt="<strong><?= $galeria_imgs[$i]['galeria_img_nombre'] ?></strong><br><?= $galeria_imgs[$i]['galeria_img_caption'] ?>">
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
	<script src="/js/slippry.min.js"></script>
	<!-- MDB core JavaScript -->
	<!-- <script type="text/javascript" src="/js/mdb.min.js"></script> -->
	<!-- Your custom scripts (optional) -->
	<script type="text/javascript" src="/js/simplegallery.min.js"></script>
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

		jQuery('.thumbs .thumblink').click(function() {
			
			thumbs.goToSlide($(this).data('goto'));
			return false;
		});
	</script>

</body>

</html>