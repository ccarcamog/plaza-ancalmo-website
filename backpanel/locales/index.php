<?php require "../../php/verify-session.php" ?>
<?php require "../../php/db.php" ?>
<?php require "../../php/credentials.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Locales disponibles</title>

	<link rel="icon" href="/img/Logo Plaza Ancalmo.png">
	<!-- MDB icon -->
	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="/css/bootstrap.min.css">
	<link rel="stylesheet" href="/css/style.css">

</head>


<body>

	<main class="d-flex align-items-stretch">
		<div class="container-fluid d-flex align-items-stretch">

			<div class="row" style="width: 100vw;">
				<div class="col-md-3 p-0">
					<?php include "../../components/side-bar.php" ?>
				</div>
				<div class="col-md-9 p-5">
					<h2>Locales</h2>
					<?php

					$db = new db($dbHost, $dbUID, $dbPWD, $dbName);
					$sql = "SELECT * FROM locales";
					$locales = $db->query($sql)->fetchAll();

					?>

					<div class="table-responsive mt-4">
						<table class="table table-hover" id="locales-table">
							<thead class="thead-dark">
								<th scope="col">Id</th>
								<th scope="col">Nombre</th>
								<th scope="col">Descripción</th>
								<th></th>
								<th></th>
								<th></th>
							</thead>

							<tbody id="local-table-body">
								<?php
								$count = 1;
								foreach ($locales as $local) {
								?>

									<tr id="row-<?= $local['locales_key'] ?>">
										<th scope="row"><?= $count++ ?></th>
										<td><?= $local['locales_nombre'] ?></td>
										<td><?= $local['locales_desc'] ?></td>
										<td><a class="btn btn-info" href="/backpanel/galeria/?id=<?= $local['locales_galeria_key'] ?>">Ir a la galeria</a></td>
										<td>
											<button class="btn btn-warning update-btn" data-id="<?= $local['locales_key'] ?>" data-url="<?= $local['locales_img'] ?>">
												Modificar
											</button>
										</td>
										<td>
											<button class="btn btn-danger delete-btn" data-id="<?= $local['locales_key'] ?>">
												Borrar
											</button>
										</td>
									</tr>

								<?php
								}
								?>
							</tbody>

						</table>


						<!-- Modal -->
						<div class="modal fade" id="creationModal" tabindex="-1" aria-labelledby="creationModalLabel" aria-hidden="true">
							<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="creationModalLabel">Forma de creación</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<form method="POST" id="creation-form">
											<div class="container-fluid">
												<div class="form-group row">
													<div class="col">
														<label for="nombre">Nombre</label>
														<input class="form-control" type="text" name="nombre" required>
													</div>
												</div>
												<div class="form-group row">
													<div class="col">
														<label for="nombre">Preview</label>
														<input class="form-control" type="text" name="preview" required>
													</div>
												</div>
												<div class="form-group row">
													<div class="col">
														<label for="nombre">Contacto</label>
														<input class="form-control" type="text" name="contacto" required>
													</div>
												</div>
												<div class="form-group row">
													<div class="col">
														<Label>Imagen de muestra</Label>
														<div class="custom-file">
															<input type="file" name="image" class="custom-file-input" id="imageInput" required>
															<label class="custom-file-label" for="imageInput">Escoger imagen</label>
														</div>
													</div>
												</div>

												<div class="form-group row">
													<div class="col">
														<Label>Descripción</Label>
														<textarea name="descripcion" class="form-control"></textarea>
													</div>
												</div>

											</div>
										</form>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
										<button type="submit" name="creation-submit" class="btn btn-create btn-primary">Guardar</button>
									</div>
								</div>
							</div>
						</div>
						<!-- Modal -->
						<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
							<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="updateModalLabel">Forma de actualización</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<form method="POST" id="update-form">
											<div class="container-fluid">
												<div class="row">
													<img src="" id="local-img" class="w-100">
												</div>
											</div>
											<div class="container-fluid mt-4">
												<div class="form-group row">
													<div class="col">
														<label for="id">Id</label>
														<input class="form-control" type="number" name="id" id="update-id" readonly>
													</div>
													<div class="col">
														<label for="nombre">Nombre</label>
														<input class="form-control" type="text" name="nombre" id="update-nombre" required>
													</div>
												</div>
												<div class="form-group row">
													<div class="col">
														<label for="nombre">Preview</label>
														<input class="form-control" id="update-preview" type="text" name="preview" required>
													</div>
												</div>
												<div class="form-group row">
													<div class="col">
														<label for="nombre">Contacto</label>
														<input class="form-control" id="update-contacto" type="text" name="contacto" required>
													</div>
												</div>
												<div class="form-group row">
													<div class="col">
														<Label>Imagen de muestra</Label>
														<div class="custom-file">
															<input type="file" name="image" class="custom-file-input" id="imageInput" required>
															<label id="update-img" class="custom-file-label" for="imageInput">Escoger imagen</label>
														</div>
													</div>
												</div>

												<div class="form-group row">
													<div class="col">
														<Label>Descripción</Label>
														<textarea id="update-desc" name="descripcion" class="form-control"></textarea>
													</div>
												</div>

										</form>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
										<button id="update-submit" class="btn btn-primary">Guardar</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<button type="button" class="btn btn-success" data-toggle="modal" data-target="#creationModal">
					Crear
				</button>
			</div>
		</div>
		</div>
	</main>
	<?php include "../../components/footer.php" ?>
	<script type="text/javascript" src="/js/jquery.min.js"></script>
	<!-- Bootstrap core JavaScript -->
	<script type="text/javascript" src="/js/bootstrap.min.js"></script>
	<script>
		var locales = <?= json_encode($locales) ?>;
		console.log(locales);
		var count = <?= $count ?>;
		$('#imageInput').on('change', function() {
			var filename = $(this).val();
			// alert(filename);
			$(this).next('.custom-file-label').html(filename);
		});

		$('.btn-create').on('click', function(evt) {

			evt.preventDefault();

			$('.btn-create').prop('disabled', true);

			var form = document.getElementById('creation-form');

			var fd = new FormData(form);

			$.ajax({
				url: '/backpanel/locales/create.php',
				type: 'POST',
				data: fd,
				contentType: false,
				dataType: 'JSON',
				processData: false,
				success: function(response) {

					console.log(response);

					if (response['error']) {
						$('.btn-create').prop('disabled', false);
						alert("ERROR: " + response['mensaje']);
						return;
					}


					locales.push({
						locales_key: response['id'],
						locales_desc: response['descripcion'],
						locales_galeria_key: response['galeria'],
						locales_contacto: response['contacto'],
						locales_img: response['image'],
						locales_nombre: response['nombre'],
						locales_preview: response['preview']
					});

					var html = '<tr id="row-' + response['id'] + '">';
					html += '	<th scope="row">' + (count++) + '</th>';
					html += '	<td>' + response['nombre'] + '</td>';
					html += '	<td>' + response['descripcion'] + '</td>';
					// html += '	<td>' + response['preview'] + '</td>';
					html += '	<td><a class="btn btn-info" href="/backpanel/galeria/?id=' + response['galeria'] + '">Ir a la galeria</a></td>';
					html += '	<td>';
					html += '		<button class="btn btn-warning update-btn" data-id="' + response['id'] + '" data-url="' + response['image'] + '">';
					html += '			Modificar';
					html += '		</button>';
					html += '	</td>';
					html += '	<td>';
					html += '		<button class="btn btn-danger delete-btn" data-id="' + response['id'] + '">';
					html += '			Borrar';
					html += '		</button>';
					html += '	</td>';
					html += '</tr>';



					$('#local-table-body').append(html);
					$('tr:last-child').hide();
					$('tr:last-child').fadeIn(800);

					$('.btn-create').prop('disabled', false);
					$('#creation-form')[0].reset();
					$('#creationModal').modal('hide');
				}
			});

		});
		$(document).on('click', '.update-btn', function() {


			var rowNum = $(this).data('id');
			var url = $(this).data('url');
			var rowID = '#row-' + rowNum;

			var row = $(rowID).children().toArray();

			var local = locales.find(obj => {
				return obj.locales_key == rowNum;
			});


			var id = rowNum;
			var nombre = local['locales_nombre'];
			var descripcion = local['locales_desc'];
			var preview = local['locales_preview'];
			var contacto = local['locales_contacto'];


			$('#update-id').val(id);
			$('#update-nombre').val(nombre);
			$('#update-preview').val(preview);
			$('#update-contacto').val(contacto);
			$('#update-img').html(url);
			$('#update-desc').html(descripcion);
			var d = new Date();
			$('#local-img').attr('src', '/backpanel/locales/' + url + '?' + d.getTime());

			$('#updateModal').modal('show');


		});
		$('#update-submit').click(function() {
			var form = document.getElementById('update-form');
			var fd = new FormData(form);

			$.ajax({
				url: '/backpanel/locales/update.php',
				type: 'POST',
				data: fd,
				contentType: false,
				dataType: 'JSON',
				processData: false,
				success: function(response) {

					if (response['error']) {
						alert("ERROR: " + response['mensaje']);
						return;
					}

					var id = response['id'];

					var local_index = locales.map(obj => {
						return "" + obj.locales_key;
					}).indexOf(id);

					locales[local_index].locales_nombre = response['nombre'];
					locales[local_index].locales_desc = response['descripcion'];
					locales[local_index].locales_contacto = response['contacto'];
					locales[local_index].locales_preview = response['preview'];


					var url = $('#update-img').html();

					var rowID = '#row-' + response['id'];

					var id_count = $(rowID).children().toArray()[0].innerHTML;

					var html = '<th scope="row">' + id_count + '</th>';
					html += '	<td>' + response['nombre'] + '</td>';
					html += '	<td>' + response['descripcion'] + '</td>';
					// html += '	<td>' + url + '</td>';
					html += '	<td><a class="btn btn-info" href="/backpanel/galeria/?id=' + response['galeria'] + '">Ir a la galeria</a></td>';
					html += '	<td>';
					html += '		<button class="btn btn-warning update-btn" data-id="' + response['id'] + '" data-url="' + url + '">';
					html += '			Modificar';
					html += '		</button>';
					html += '	</td>';
					html += '	<td>';
					html += '		<button class="btn btn-danger delete-btn" data-id="' + response['id'] + '">';
					html += '			Borrar';
					html += '		</button>';
					html += '	</td>';

					$(rowID).hide();
					$(rowID).html(html);
					$(rowID).fadeIn(800);
					$('#local-preview').attr('src', '');
					$('#update-form')[0].reset();
					$('#updateModal').modal('hide');

				}
			});
		});
		$(document).on('click', '.delete-btn', function() {

			var delete_id = $(this).data('id');

			var row = $(this).closest('tr');

			$.ajax({
				url: '/backpanel/locales/delete.php',
				type: 'POST',
				data: {
					id: delete_id
				},
				success: function(response) {

					console.log(response);

					$(row).fadeOut(800, function() {
						$(this).remove();
					})
				}
			});

		});
	</script>
</body>

</html>