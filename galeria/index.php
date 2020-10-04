<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Galeria</title>

	<!-- MDB icon -->
	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="/css/bootstrap.min.css">
	<!-- favicon  -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
	<!-- Material Design Bootstrap -->
	<!-- <link rel="stylesheet" href="css/mdb.min.css"> -->
	<!-- Your custom styles (optional) -->
	<link rel="stylesheet" href="/css/style.css">
	<link rel="stylesheet" href="/galeria/galeria-style.css">
	<link rel="stylesheet" href="css/simplegallery.demo1.css">

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
				<img src="galeria/galeria/foto0.jpg" class="w-75 image_1" alt="" />
				<img src="galeria/galeria/foto1.jpg" class="w-75 image_2" style="display:none" alt="" />
				<img src="galeria/galeria/foto2.jpg" class="w-75 image_3" style="display:none" alt="" />
				<img src="galeria/galeria/foto3.jpg" class="w-75 image_4" style="display:none" alt="" />
				<img src="galeria/galeria/foto4.jpg" class="w-75 image_5" style="display:none" alt="" />
				<img src="galeria/galeria/foto5.jpg" class="w-75 image_6" style="display:none" alt="" />
				<img src="galeria/galeria/foto6.jpg" class="w-75 image_7" style="display:none" alt="" />
				<img src="galeria/galeria/foto7.jpg" class="w-75 image_8" style="display:none" alt="" />
			</div>

			<div class="clear"></div>

			<div class="thumbnail container">
				<div class="thumb">
					<a href="#" rel="1">
						<img src="galeria/galeria/foto0.jpg" id="thumb_1" alt="" />
					</a>
				</div>
				<div class="thumb">
					<a href="#" rel="2">
						<img src="galeria/galeria/foto1.jpg" id="thumb_2" alt="" />
					</a>
				</div>
				<div class="thumb">
					<a href="#" rel="3">
						<img src="galeria/galeria/foto2.jpg" id="thumb_3" alt="" />
					</a>
				</div>
				<div class="thumb ">
					<a href="#" rel="4">
						<img src="galeria/galeria/foto3.jpg" id="thumb_4" alt="" />
					</a>
				</div>
				<div class="thumb">
					<a href="#" rel="5">
						<img src="galeria/galeria/foto4.jpg" id="thumb_5" alt="" />
					</a>
				</div>

				<div class="thumb">
					<a href="#" rel="6">
						<img src="galeria/galeria/foto5.jpg" id="thumb_6" alt="" />
					</a>
				</div>

				<div class="thumb">
					<a href="#" rel="7">
						<img src="galeria/galeria/foto6.jpg" id="thumb_7" alt="" />
					</a>
				</div>

				<div class="thumb">
					<a href="#" rel="8">
						<img src="galeria/galeria/foto7.jpg" id="thumb_8" alt="" />
					</a>
				</div>

			</div>

		</div>
	</div>

	<?php include "../components/footer.php" ?>

	<script type="text/javascript" src="js/jquery.min.js"></script>
	<!-- Bootstrap core JavaScript -->
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<!-- MDB core JavaScript -->
	<!-- <script type="text/javascript" src="js/mdb.min.js"></script> -->
	<!-- Your custom scripts (optional) -->
	<script type="text/javascript" src="js/simplegallery.min.js"></script>
	<script>
		$(document).ready(function() {

			$('#gallery').simplegallery({
				galltime: 400,
				gallcontent: '.content',
				gallthumbnail: '.thumbnail',
				gallthumb: '.thumb'
			});

		});
	</script>

</body>

</html>