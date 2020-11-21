<?php require "../../php/db.php" ?>
<?php require "../../php/credentials.php" ?>
<?php
$db = new db($dbHost, $dbUID, $dbPWD, $dbName);

$id = $_GET['id'];

$sql = "SELECT * FROM locales WHERE locales_key=?";
$local = $db->query($sql, $id)->fetchArray();


$galeria_id = $local['locales_galeria_key'];
$sql = "SELECT * FROM galeria WHERE galeria_key=?";
$galeria = $db->query($sql, $galeria_id)->fetchArray();

$sql = "SELECT * FROM galeria_img WHERE galeria_img_galeria_key=?";
$galeria_imgs = $db->query($sql, $galeria_id)->fetchAll();

?>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="/img/Logo Plaza Ancalmo.png">
	<title><?= $local['local_nombre'] ?></title>

	<link rel="stylesheet" href="/css/bootstrap.min.css">
	<!-- Material Design Bootstrap -->
	<!-- <link rel="stylesheet" href="/css/mdb.min.css"> -->
	<!-- Your custom styles (optional) -->
	<link rel="stylesheet" href="/css/style.css">
	<link rel="stylesheet" href="/locales/local/local-style.css">
	<link rel="stylesheet" href="/css/simplegallery.demo1.css">
</head>

<body>

	<?php include "../../components/navbar.php" ?>
	<main>
		<div class="container" id="localInfo">
			<div class="row p-3">
				<div class="col-sm-4 pb-3">
					<img src="/backpanel/locales/<?= $local['locales_img'] ?>" alt="local pic">
				</div>
				<div class="col-sm-4 local-title">
					<div class="">
						<h3 class="m-0"><?= $local['locales_nombre'] ?></h3>
						<h4 class="text-muted"><?= $local['locales_preview'] ?></h4>
					</div>

				</div>
			</div>
		</div>
		<div class="container" id="localTabs">
			<ul class="nav nav-tabs" id="myTab" role="tablist">
				<?php if ($local['locales_desc'] || $local['local_contacto']) { ?>
					<li role="presentation" class="nav-item active">
						<a class="nav-link active" id="resumen-tab" data-toggle="tab" href="#resumen" role="tab" aria-controls="resumen" aria-selected="true">Resumen</a>
					</li>
				<?php } ?>
				<?php if(count($galeria_imgs) > 0){ ?>
				
					<li role="presentation" class="nav-item">
						<a class="nav-link" id="galeria-tab" data-toggle="tab" href="#galeria" role="tab" aria-controls="galeria" aria-selected="false">Galeria</a>
					</li>
				<?php } ?>
			</ul>
			<div class="tab-content mt-5" id="myTabContent">
				<div role="tabpanel" class="tab-pane fade show active" id="resumen" role="tabpanel" aria-labelledby="resumen-tab">
					<div class="container mb-5">
						<div class="row">
							<?php if ($local['locales_desc']) { ?>
								<div class="col-md-12">
									
									<p>
										<?= $local['locales_desc'] ?>
									</p>
								</div>
							<?php } ?>
							<div class="col-md-12">
								<?php if ($local['locales_contacto']) { ?>
									<h4 class="text-muted">Información de contacto</h4>
									<p><?= $local['locales_contacto'] ?></p>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
				<div role="tabpanel" class="tab-pane fade show" id="galeria" role="tabpanel" aria-labelledby="galeria-tab">
					<div class="container">

						<center>
							<h4><?= $galeria['galeria_nombre'] ?></h4>
						</center>
						<div id="gallery" class="simplegallery">
							<div class="content text-center">
								<div id="galeriaCarousel" class="carousel slide" data-ride="carousel">
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
				</div>
			</div>
		</div>

	</main>
	<?php include "../../components/footer.php" ?>
	<script type="text/javascript" src="/js/jquery.min.js"></script>
	<!-- Bootstrap core JavaScript -->
	<script type="text/javascript" src="/js/bootstrap.min.js"></script>
	<!-- MDB core JavaScript -->
	<!-- <script type="text/javascript" src="/js/mdb.min.js"></script> -->
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
	<script>
		$(document).ready(function() {
			if ($(window).width() <= 768) {
				$("#myTab").tabCollapse();
			}
		});
	</script>

</body>

</html>