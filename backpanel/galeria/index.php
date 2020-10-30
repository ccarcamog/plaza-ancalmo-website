<?php require "../../php/verify-session.php" ?>
<?php require "../../php/db.php" ?>
<?php require "../../php/credentials.php" ?>

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
	<link rel="stylesheet" href="/css/style.css">
	<link rel="stylesheet" href="/css/jquery-ui.min.css">
</head>

<body>

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

	$sql = "SELECT * FROM galeria_img WHERE galeria_img_galeria_key = ? ORDER BY galeria_img_orden ASC";

	$imagenes = $db->query($sql, $id)->fetchAll();

	?>
	<main class="d-flex align-items-stretch">

		<div class="container-fluid d-flex align-items-stretch">
			<div class="row" style="width: 100vw;">
				<div class="col-md-3 p-0">
					<?php include "../../components/side-bar.php" ?>
				</div>
				<div class="col-md-9 p-5">
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
								$count = 1;
								foreach ($imagenes as $imagen) {
								?>

									<tr id="row-<?= $imagen['galeria_img_key'] ?>" data-id="<?= $imagen['galeria_img_key'] ?>">
										<td><img src="/img/svg/sort-result.svg" style="height:1em"></td>
										<th scope="row"><?= $count++ ?></th>
										<td><img src="/backpanel/galeria/<?= $imagen['galeria_img_url'] ?>" height="100"></td>
										<td><?= $imagen['galeria_img_nombre'] ?></td>
										<td><?= $imagen['galeria_img_caption'] ?></td>

										<td>
											<button class="btn btn-warning update-btn" data-id="<?= $imagen['galeria_img_key'] ?>" data-path="<?= $imagen['galeria_img_url'] ?>">
												Modificar
											</button>
										</td>
										<td>
											<button class="btn btn-danger delete-btn" data-id="<?= $imagen['galeria_img_key'] ?>">
												Borrar
											</button>
										</td>
									</tr>

								<?php
								}
								?>
							</tbody>
						</table>
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
						<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
							<div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="updateModalLabel">Actualizar imagen</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<form method="POST" id="update-form">
											<div class="container-fluid">
												<div class="row mb-5">
													<div class="col">
														<img src="/img/contact-header-background.jpg" id="update-img" style="width:100%">
													</div>
												</div>
												<div class="form-group row">
													<div class="col">
														<label for="id">Id</label>
														<input class="form-control" type="number" name="id" id="update-id" readonly>
													</div>
													<div class="col">
														<label for="nombre">nombre</label>
														<input class="form-control" type="text" name="nombre" id="update-nombre" required>
													</div>
												</div>

												<div class="row">
													<div class="col">
														<label for="descripcion">Descripción</label>
														<textarea class="form-control" name="descripcion" id="update-descripcion"></textarea>
													</div>
												</div>

											</div>
										</form>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
										<button id="update-submit" name="update-submit" class="btn btn-primary">Guardar</button>
									</div>
								</div>
							</div>
						</div>

					</div>
					<center class="mt-3">
						<button class="btn btn-success agregar-btn" data-toggle="modal" data-target="#agregarModal">Agregar</button>
					</center>
				</div>
			</div>
		</div>
	</main>
	<?php include "../../components/footer.php" ?>
	<script type="text/javascript" src="/js/jquery.min.js"></script>
	<!-- Bootstrap core JavaScript -->
	<script type="text/javascript" src="/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="/js/jquery-ui.js"></script>
	<script>
		var count = <?= $count ?>;

		function updateOrder(keys) {
			var dataString = JSON.stringify(keys);
			$.ajax({
				url: '/backpanel/galeria/order.php',
				type: 'POST',
				data: {
					keys: dataString,
				},
				success: function(response) {

				}
			});
		}

		var updateIndex = function(event, ui) {
			// console.clear();

			// orderProgress.current = 0;
			// orderProgress.total = $('table tbody').children().length;
			// $('#order-progressbar').css('width', 0);
			// $('#esperarModal').modal('show');

			var keys = [];

			$('table tbody').children().each(function(i) {

				if ($(this).hasClass('error-row')) {
					return true;
				}

				var rowID = $(this).data('id');
				// console.log(rowID + "," + (i + 1));
				keys.push(rowID);
			});
			
			updateOrder(keys);
		};

		$(document).ready(function() {
			$("table tbody").sortable({
				stop: updateIndex
			}).disableSelection();
		});

		var img_path = "";

		var progress = {
			total: 0,
			current: 0,
			tally: function(key, path) {
				// alert("tally success " + key + " " + path);
				this.current++;

				var progress = this.current / this.total;

				var str_progress = progress * 100 + "%";

				$('#progressbar').css("width", str_progress);

				html = '<tr id="row-' + key + '" data-id="'+ key +'">';
				html += '<td><img src="/img/svg/sort-result.svg" style="height:1em"></td>';
				html += '<th scope="row">' + (count++) + '</th>';
				html += '<td><img src="/backpanel/galeria/' + path + '" height="100"></td>';
				html += '<td>newImage</td>';
				html += '<td></td>'
				html += '<td><button class="btn btn-warning update-btn" data-id="' + key + '" data-path="' + path + '">Modificar</button></td>';
				html += '<td><button class="btn btn-danger delete-btn" data-id="' + key + '">Borrar</button></td>';
				html += '</tr>';

				$('table tbody').append(html)
				$('table tbody tr:last-child').hide();
				$('table tbody tr:last-child').fadeIn(800);

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

				html = '<tr class="error-row"><td><img src="/img/svg/sort-result.svg" style="height:1em"></td>'
				html += '<td class="text-muted" colspan="4">' + error + '</td>';
				html += '<td colspan="2"><button class="btn btn-info ignorar-btn">Ignorar</button></td>';
				html += '</tr>';

				$('table tbody').append(html)
				$('table tbody tr:last-child').hide();
				$('table tbody tr:last-child').fadeIn(800);

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
				$('#agregarForm .custom-file-label').html("Seleccionar Archivos");
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

		$(document).on('click', '.ignorar-btn', function() {

			$(this).closest('tr').fadeOut(500, function() {
				$(this).remove();
			});

		});

		$(document).on('click', '.update-btn', function() {
			img_path = $(this).data('path');
			$('#update-img').prop('src', '/backpanel/galeria/' + $(this).data('path'));
			$('#update-id').val($(this).data('id'));

			var row = $(this).parents('tr').children().toArray();

			var nombre = row[3].innerHTML;
			var descripcion = row[4].innerHTML;


			$('#update-nombre').val(nombre);
			$('#update-descripcion').val(descripcion);

			$('#updateModal').modal('show');

		});

		$('#update-submit').click(function() {

			$.ajax({
				url: "/backpanel/galeria/update.php",
				method: "POST",
				data: $('#update-form').serialize(),
				dataType: "json",
				success: function(response) {
					// alert(response.nombre);

					var path = $('#update-img').prop('src');

					var rowID = '#row-' + response.id;
					var row = $(rowID).children().toArray();

					var id = row[1].innerHTML;

					var html = '';

					html += '<td><img src="/img/svg/sort-result.svg" style="height:1em"></td>';
					html += '<th scope="row">' + id + '</th>';
					html += '<td><img src="' + path + '" height="100"></td>';
					html += '<td>' + response.nombre + '</td>';
					html += '<td>' + response.descripcion + '</td>';
					html += '<td><button class="btn btn-warning update-btn" data-id="' + response.id + '" data-path="' + img_path + '">Modificar</button></td>';
					html += '<td><button class="btn btn-danger delete-btn" data-id="' + response.id + '">Borrar</button></td>';


					$('#updateModal').modal('hide');

					$(rowID).hide();
					$(rowID).html(html);
					$(rowID).fadeIn(500);
				}
			});

			$('#update-form')[0].reset();

		});

		$(document).on('click', '.delete-btn', function() {

			var el = this;

			var deleteid = $(this).data('id');

			var confirmAlert = confirm("Estas seguro?");
			if (!confirmAlert) {
				return;
			}

			$.ajax({
				url: '/backpanel/galeria/delete.php',
				type: 'POST',
				data: {
					id: deleteid
				},
				success: function(response) {

					if (response == 1) {
						$(el).closest('tr').fadeOut(500, function() {
							$(this).remove();
						});
					} else {
						alert("Id invalido");
					}
				}
			});

		});
	</script>
</body>

</html>