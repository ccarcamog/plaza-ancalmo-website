<?php require "../../php/verify-session.php" ?>
<?php require "../../php/db.php" ?>
<?php require "../../php/credentials.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Actualizar red de seguros</title>

	<link rel="icon" href="/img/Logo Plaza Ancalmo.png">
	<!-- MDB icon -->
	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="/css/bootstrap.min.css">
	<link rel="stylesheet" href="/css/style.css">
</head>

<body>

	<?php

	if (isset($_POST['update-submit'])) {



		$id = $_POST['id'];
		$nombre = $_POST['nombre'];
		$desc = $_POST['descripcion'];
		$link = $_POST['link'];

		$db = new db($dbHost, $dbUID, $dbPWD, $dbName);

		$sql = "UPDATE doc_redes_seguros SET doc_redes_seguros_nombre=?, doc_redes_seguros_desc=?, doc_redes_seguros_link=? WHERE doc_redes_seguros_key=?";
		$db->query($sql, $nombre, $desc, $link, $id);

		if ($_FILES['image']['tmp_name'] != "") {

			$sql = "SELECT * FROM doc_redes_seguros WHERE doc_redes_seguros_key=?";
			$row = $db->query($sql, $id)->fetchArray();
			$img = fopen($row['doc_redes_seguros_img'], "w+");
			unlink($img);

			$imageFileType = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
			$target_dir = "img/";
			$target_file = $target_dir . "red-seguros" . $id . "." . $imageFileType;
			move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

			$sql = "UPDATE doc_redes_seguros SET doc_redes_seguros_img=? WHERE doc_redes_seguros_key=?";
			$db->query($sql, $target_file, $id);
			$db->close();
		}

		$db->close();
		header("Location: /backpanel/seguros/index.php");
		exit();
	} else if (isset($_GET['id'])) {

		$db = new db($dbHost, $dbUID, $dbPWD, $dbName);
		$id = $_GET['id'];
		$sql = "SELECT * FROM doc_redes_seguros WHERE doc_redes_seguros_key=?";
		$row = $db->query($sql, $id)->fetchArray();

		$nombre = $row['doc_redes_seguros_nombre'];
		$desc = $row['doc_redes_seguros_desc'];
		$link = $row['doc_redes_seguros_link'];
		$img = $row['doc_redes_seguros_img'];
	} else {
		header("Location: /backpanel/seguros/index.php");
		exit();
	}

	?>

	<main class="d-flex align-items-stretch">
		<div class="container-fluid d-flex align-items-stretch">

			<div class="row" style="width: 100vw;">
				<div class="col-md-3 p-0">
					<?php include "../../components/side-bar.php" ?>
				</div>
				<div class="col-md-9 d-flex flex-column justify-content-center align-items-center">
					<h2> Actualizar red de seguros</h2>

					<div class="container mt-4">
						<form action="create.php" method="POST" enctype="multipart/form-data">
							<div class="form-group row">
								<div class="col-md-3">
									<label for="id">ID</label>
									<input class="form-control" type="number" name="id" value="<?= $_GET['id'] ?>" readonly>
								</div>
								<div class="col-md-9">
									<label for="nombre">Nombre</label>
									<input class="form-control" type="text" name="nombre" placeholder="Nombre" value="<?= $nombre ?>" required>
								</div>
							</div>
							<!-- <div class="form-group">
						</div> -->
							<div class="form-group">
								<label for="descripcion">Descripcion</label>
								<textarea class="form-control" name="descripcion" placeholder="Descripcion" required><?= $desc ?></textarea>
							</div>
							<div class="form-group">
								<label for="link">Url del sitio</label>
								<input type="text" name="link" class="form-control" placeholder="Link al sitio" value="<?= $link ?>" required>
							</div>
							<div class="form-group">
								<label for="image">Imagen</label>
								<div class="input-group mb-3">
									<div class="custom-file">
										<input type="file" name="image" class="custom-file-input" id="imageInput">
										<label class="custom-file-label" for="imageInput"><?= $img ?></label>
									</div>
								</div>
							</div>
							<div class="form-group text-center">
								<input type="submit" name="update-submit" value="Actualizar" class="btn btn-success">
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