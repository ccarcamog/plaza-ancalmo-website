<?php require "../../php/verify-session.php" ?>
<?php require "../../php/db.php" ?>
<?php require "../../php/credentials.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Crear red de seguros</title>

	<link rel="icon" href="/img/Logo Plaza Ancalmo.png">
	<!-- MDB icon -->
	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="/css/bootstrap.min.css">
	<link rel="stylesheet" href="/css/style.css">
</head>

<body>



	<?php

	// echo $_GET['message'];

	if (isset($_POST['create-submit'])) {

		$nombre = $_POST['nombre'];
		$descripcion = $_POST['descripcion'];
		$link = $_POST['link'];

		if ($_FILES['image']['tmp_name'] != "") {
			$imageFileType = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
			if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {

				header("Location: ?error=true&message=El tipo de imagen es incorrecto");
				exit();
			}
			if ($_FILES['image']['size'] > 400000) {
				header("Location: ?error=true&message=Peso de la imagen excedido");
				exit();
			}
		}

		$db = new db($dbHost, $dbUID, $dbPWD, $dbName);

		$sql = "INSERT INTO doc_redes_seguros (doc_redes_seguros_nombre, doc_redes_seguros_desc, doc_redes_seguros_link) VALUES (?,?,?)";
		$db->query($sql, $nombre, $descripcion, $link);

		if ($_FILES['image']['tmp_name'] != "") {
			$index = $db->lastInsertID();

			$target_dir = "img/";
			$target_file = $target_dir . "red-seguros" . $index . "." . $imageFileType;
			move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

			$sql = "UPDATE doc_redes_seguros SET doc_redes_seguros_img=? WHERE doc_redes_seguros_key=?";

			$db->query($sql, $target_file, $index);
		}

		$db->close();

		header("Location: index.php");
		exit();
	}

	?>

	<main class="d-flex align-items-stretch">

		<div class="container-fluid d-flex align-items-stretch">

			<div class="row" style="width:100%" >
				<div class="col-md-3 p-0">
					<?php include "../../components/side-bar.php" ?>
				</div>
				<div class="col-md-9 p-5 d-flex flex-column justify-content-center align-items-center">
					<h2> Crear red de seguros</h2>

					<div class="container">
						<form action="create.php" method="POST" enctype="multipart/form-data">
							<div class="form-group">
								<label for="nombre">Nombre</label>
								<input class="form-control" type="text" name="nombre" placeholder="Nombre" required>
							</div>
							<div class="form-group">
								<label for="descripcion">Descripcion</label>
								<textarea class="form-control" name="descripcion" placeholder="Descripcion" required></textarea>
							</div>
							<div class="form-group">
								<label for="link">Url del sitio</label>
								<input type="text" name="link" class="form-control" placeholder="Link al sitio" required>
							</div>
							<div class="form-group">
								<label for="image">Imagen</label>
								<div class="input-group mb-3">
									<div class="custom-file">
										<input type="file" name="image" class="custom-file-input" id="imageInput">
										<label class="custom-file-label" for="imageInput">Escoger imagen</label>
									</div>
								</div>
							</div>
							<div class="form-group text-center">
								<input type="submit" name="create-submit" value="Crear" class="btn btn-success">
							</div>
						</form>
					</div>

				</div>
			</div>
		</div>
	</main>

	<?php include "../../components/footer.php" ?>
	<script type="text/javascript" src="/js/jquery.min.js"></script>
	<!-- Bootstrap core JavaScript -->
	<script type="text/javascript" src="/js/bootstrap.min.js"></script>
	<script type="text/javascript">
		$('#imageInput').on('change', function() {
			var filename = $(this).val();
			// alert(filename);
			$(this).next('.custom-file-label').html(filename);
		});
	</script>
</body>

</html>