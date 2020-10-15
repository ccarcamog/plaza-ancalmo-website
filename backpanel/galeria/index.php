<?php require "../../php/verify-session.php" ?>
<?php require "../../php/db.php" ?>
<?php require "../../php/credentials.php" ?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Create user</title>

	<link rel="icon" href="/img/Logo Plaza Ancalmo.png">
	<!-- MDB icon -->
	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="/css/bootstrap.min.css">
	<link rel="stylesheet" href="/css/style.css">
	<link rel="stylesheet" href="/css/jquery-ui.min.css">
</head>

<body>

	<?php include "../../components/navbar.php" ?>

	<?php

	if (!isset($_GET['id'])) {
		$id = 1;
	} else {
		$id = $_GET['id'];
	}


	$db = new db($dbHost, $dbUID, $dbPWD, $dbName);

	$sql = "SELECT * FROM galeria WHERE galeria_key = ?";

	$galeria = 	$db->query($sql, $id)->fetchArray();

	if (!isset($galeria['galeria_key'])) {

		echo $id . " not set";

		$id = 1;
		$sql = "SELECT * FROM galeria WHERE galeria_key = ?";
		$galeria = 	$db->query($sql, $id)->fetchArray();
	}

	$sql = "SELECT * FROM galeria_img WHERE galeria_img_galeria_key = ?";

	$imagenes = $db->query($sql, $id)->fetchAll();

	?>

	<div class="container-fluid p-5">
		<div class="row">
			<div class="col-md-2">
				<?php include "../../components/side-bar.php" ?>
			</div>
			<div class="col-md-10">
				<h3><?= $galeria['galeria_nombre'] ?></h3>
				<div class="table-responsive  mt-4">
					<table class="table table-hover">
						<thead class="thead-dark">
							<tr>
								<th></th>
								<th scope="col">id</th>
								<th scope="col">img</th>
								<th scope="col">nombre</th>
								<th scope="col">descripcion</th>

								<th></th>
								<th></th>
							</tr>
						</thead>
						<tbody>

							<?php
							foreach ($imagenes as $imagen) {
							?>

								<tr>
									<td><img src="/img/svg/sort-result.svg" style="height:1em"></td>
									<th scope="row"><?= $imagen['galeria_img_key'] ?></th>
									<td><img src="/backpanel/galeria/<?= $imagen['galeria_img_url'] ?>" height="100"></td>
									<td><?= $imagen['galeria_img_nombre'] ?></td>
									<td><?= $imagen['galeria_img_caption'] ?></td>

									<td>
										<button class="btn btn-warning update-button" data-id="<?= $imagen['galeria_img_key'] ?>">
											Modificar
										</button>
									</td>
									<td>
										<button class="btn btn-danger delete-button" data-id="<?= $imagen['galeria_img_key'] ?>">
											Borrar
										</button>
									</td>
								</tr>

							<?php
							}
							?>
						</tbody>
					</table>
					<button class="btn btn-success agregar-btn" data-toggle="modal" data-target="#agregarModal">Agregar</button>
					<div class="modal fade" id="agregarModal" tabindex="-1" aria-labelledby="#agregarModalLabel" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="agregarModalLabel">Agregar Imagenes</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<form id="agregarForm">
									<div class="modal-body">
										<div class="custom-file">
											<input type="file" class="custom-file-input" name="imagenes[]" multiple id="imagenesInput" lang="es" required>
											<label class="custom-file-label" for="imagenes[]" data-browse="Elegir">Seleccionar Archivos</label>
										</div>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
										<button type="submit" id="agregar-submit" class="btn btn-primary">Agregar</button>
									</div>
								</form>
								<div class="modal-body d-none" id="progressContainer">
									<div class="progress">
										<div class="progress-bar" id="progressbar" role="progressbar" style="width: 0%"></div>
									</div>
								</div>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript" src="/js/jquery.min.js"></script>
	<!-- Bootstrap core JavaScript -->
	<script type="text/javascript" src="/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="/js/jquery-ui.js"></script>
	<script>
		
		$(document).ready(function(){
			$("table tbody").sortable().disableSe();
		});

		var progress = {
			total: 0,
			current: 0,
			tally: function(key, path) {
				// alert("tally success " + key + " " + path);
				this.current++;

				var progress = this.current / this.total;

				var str_progress = progress * 100 + "%";

				$('#progressbar').css("width", str_progress);

				if (this.current == this.total) {
					this.finish();
				}
			},
			failure: function(error) {
				// alert("tally failure " + error);
				this.current++;
				var progress = this.current / this.total;
				var str_progress = progress * 100 + "%";
				$('#progressbar').css("width", str_progress);

				$()

				if (this.current == this.total) {
					this.finish();
				}
			},
			finish: function() {

				this.total = 0;
				this.current = 0;

				$('#agregar-submit').prop('disabled', false);
				$('#agregar-submit').removeClass('btn-disabled');
				$('#agregar-submit').addClass('btn-primary');

				$('#progressContainer').fadeOut(500);
				$('#progressContainer').addClass('d-none');
				$('#agregarForm')[0].reset();
				$('#agregarModal').modal('hide');
			}
		}

		$('#imagenesInput').on('change', function() {

			var fileList = $('#imagenesInput').prop('files');

			if (fileList.length > 1) {
				labeltext = fileList.length + " elementos seleccionados";
			} else {
				labeltext = $(this).val();
			}

			$(this).next('.custom-file-label').html(labeltext);
		});

		function uploadImage(image) {

			var form_data = new FormData();
			form_data.append("imagen", image);
			form_data.append("galeria", "<?= $galeria['galeria_key'] ?>");

			$.ajax({
				url: '/backpanel/galeria/create.php',
				type: 'POST',
				cache: false,
				dataType: "json",
				processData: false,
				contentType: false,
				data: form_data,
				success: function(response) {
					if (response.check) {
						progress.tally(response.key, response.path);
					} else {
						progress.failure(response.error);
					}
				}

			});

		}

		$('#agregarForm').on('submit', function(event) {
			event.preventDefault();

			$('#progressContainer').fadeIn(500);
			$('#progressContainer').removeClass('d-none');


			var images = $('#imagenesInput').prop('files');
			$('#agregar-submit').prop('disabled', true);
			$('#agregar-submit').removeClass('btn-warning');
			$('#agregar-submit').addClass('btn-disabled');

			var numImages = images.length;
			progress.total = images.length;
			progress.current = 0;

			for (var i = 0; i < numImages; i++) {

				uploadImage(images[i]);

			}

		});
	</script>
</body>

</html>