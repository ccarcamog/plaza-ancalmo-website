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
	<link rel="stylesheet" href="/css/simplegallery.demo1.css">
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

		<div id="gallery" class="simplegallery">
			<div class="content text-center">

				<div id="galeriaCarousel" class="carousel slide d-flex flex-column justify-content-center" data-ride="carousel">
					<div class="carousel-inner">
						<?php
						for ($i = 0; $i < count($galeria_imgs); $i++) {
						?>
							<div class="carousel-item <?php if (!$i) echo "active" ?>">
								<img src="/backpanel/galeria/<?= $galeria_imgs[$i]['galeria_img_url'] ?>" class="w-75 image_<?= $i + 1 ?>" />
								<p class="caption caption_<?= $i + 1 ?>"><strong><?= $galeria_imgs[$i]['galeria_img_nombre'] ?></strong><br><?= $galeria_imgs[$i]['galeria_img_caption'] ?></p>
							</div>
						<?php
						}
						?>
					</div>
					<a class="carousel-control-prev d-none d-md-flex" href="#galeriaCarousel" role="button" data-slide="prev">

						<img class="direction-arrow" src="/img/svg/left-arrow-angle.svg">
						<span class="sr-only">Previous</span>
					</a>
					<a class="carousel-control-next d-none d-md-flex" href="#galeriaCarousel" role="button" data-slide="next">

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

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
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