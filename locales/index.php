<?php require "../php/db.php" ?>
<?php require "../php/credentials.php" ?>
<?php

$db = new db($dbHost, $dbUID, $dbPWD, $dbName);

$sql = "SELECT * FROM locales";
$locales = $db->query($sql)->fetchAll();

?>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="/img/Logo Plaza Ancalmo.png">
	<title>Locales disponibles</title>
	<link rel="stylesheet" href="/css/bootstrap.min.css">
	<link rel="stylesheet" href="/css/style.css">
	<link rel="stylesheet" href="/locales/locales-style.css">
</head>

<body>

	<?php include "../components/navbar.php" ?>
	<main>
		<div class="container-fluid" id="localesTitle">
			<div class="filter p-md-5">
				<h1>Locales disponibles:</h1>
			</div>
		</div>
		<div class="container" id="ListaLocales">

			<?php foreach ($locales as $local) { ?>

				<div class="row local">
					<div class="col-sm-4 local-image mb-3">
						<img src="/backpanel/locales/<?= $local['locales_img'] ?>" alt="local image">
					</div>
					<div class=" col-sm-8 local-text">
						<a href="/locales/local/?id=<?= $local['locales_key'] ?>" class="local-title d-inline">
							<h3 class="m-0"><?= $local['locales_nombre'] ?></h3>
							<br>
						</a>
						<hr class="w-100">
						<h4 class="text-muted"> <?= $local['locales_preview'] ?> </h4>

					</div>
				</div>

			<?php } ?>
		</div>
	</main>
	<?php include "../components/footer.php" ?>
	<script type="text/javascript" src="/js/jquery.min.js"></script>
	<!-- Bootstrap core JavaScript -->
	<script type="text/javascript" src="/js/bootstrap.min.js"></script>
	<!-- MDB core JavaScript -->
	<!-- <script type="text/javascript" src="/js/mdb.min.js"></script> -->


</body>

</html>