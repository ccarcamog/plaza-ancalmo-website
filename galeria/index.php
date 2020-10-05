<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Galeria</title>
	<link rel="icon" href="/img/Logo Plaza Ancalmo.png">
	<!-- MDB icon -->
	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="/css/bootstrap.min.css">
	<!-- favicon  -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
	<!-- Material Design Bootstrap -->
	<!-- <link rel="stylesheet" href="/css/mdb.min.css"> -->
	<!-- Your custom styles (optional) -->
	<link rel="stylesheet" href="/css/style.css">
	<link rel="stylesheet" href="/galeria/galeria-style.css">
	<link rel="stylesheet" href="/css/simplegallery.demo1.css">

</head>

<body>

	<?php include "../components/navbar.php" ?>

	<div class="container-fluid p-0" id="galeriaHeader">
		<div class="filter text-white text-center p-5">
			<h2>Galeria de imagenes</h2>
		</div>
	</div>

	<div class="container mt-5">

		<div id="gallery" class="simplegallery">
			<div class="content text-center">

				<img src="/galeria/galeria/foto0.jpg" class="w-75 image_1" alt="" />
				<p class="caption caption_1 image_1">Image Caption 1</p>
				<?php
				for ($i = 1; $i < 9; $i++) {
				?>
					<img src="/galeria/galeria/foto<?php echo $i ?>.jpg" class="w-75 image_<?php echo ($i + 1) ?>" style="display:none" alt="" />
				<?php
				}
				for ($i = 1; $i < 9; $i++) {
				?>
					<p class="caption caption_<?php echo ($i + 1) ?> image_<?php echo ($i + 1) ?>" style="display:none" >Image Caption <?php echo ($i + 1) ?></p>
				<?php
				}
				?>


			</div>

			<div class="clear"></div>

			<div class="thumbnail container">
				<?php
				for ($i = 0; $i < 9; $i++) {
				?>
					<div class="thumb">
						<a href="#" rel="<?php echo ($i + 1) ?>">
							<img src="/galeria/galeria/foto<?php echo $i ?>.jpg" id="thumb_<?php echo ($i + 1) ?>" class="thumbs" alt="" />
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
			$(".thumbs").click(function(){
				var id = $(this).attr("id");
				var cap_id = ".caption_" + id.substr(id.length - 1);
				$(".caption").css("display","none");
				$(cap_id).css("display", "block");
			});

		});
	</script>

</body>

</html>