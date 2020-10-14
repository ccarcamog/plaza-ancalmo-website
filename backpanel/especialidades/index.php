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
</head>

<body>

	<?php include "../../components/navbar.php" ?>
	<div class="container-fluid p-5">

		<div class="row">
			<div class="col-md-2">
				<?php include "../../components/side-bar.php" ?>
			</div>
			<div class="col-md-10">
				<h2>Especialidades</h2>
				<?php

				$db = new db($dbHost, $dbUID, $dbPWD, $dbName);
				$sql = "SELECT * FROM doc_especialidades";
				$especialidades = $db->query($sql)->fetchAll();

				?>

				<div class="table-responsive mt-4">
					<table class="table table-hover" id="especialidades-table">
						<thead class="thead-dark">
							<th scope="col">Id</th>
							<th scope="col">Especialidad</th>
							<th scope="col">Masculino</th>
							<th scope="col">Femenino</th>
							<th></th>
							<th></th>
						</thead>

						<tbody id="especialidades-table-body">
							<?php
							foreach ($especialidades as $especialidad) {
							?>

								<tr id="row-<?= $especialidad['doc_especialidades_key'] ?>">
									<th scope="row"><?= $especialidad['doc_especialidades_key'] ?></th>
									<td><?= $especialidad['doc_especialidades_nombre'] ?></td>
									<td><?= $especialidad['doc_especialidades_nombre_mas'] ?></td>
									<td><?= $especialidad['doc_especialidades_nombre_fem'] ?></td>
									<td>
										<button class="btn btn-warning update-btn" data-id="<?= $especialidad['doc_especialidades_key'] ?>">
											Modificar
										</button>
									</td>
									<td>
										<button class="btn btn-danger delete-btn" data-id="<?= $especialidad['doc_especialidades_key'] ?>">
											Borrar
										</button>
									</td>
								</tr>

							<?php
							}
							?>
						</tbody>

					</table>
					<!-- Button trigger modal -->
					<button type="button" class="btn btn-success" data-toggle="modal" data-target="#creationModal">
						Crear
					</button>

					<!-- Modal -->
					<div class="modal fade" id="creationModal" tabindex="-1" aria-labelledby="creationModalLabel" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="creationModalLabel">Forma de creación</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<form method="POST" id="creation-form">
									<div class="modal-body">
										<div class="container-fluid">
											<div class="form-group row">
												<div class="col">
													<label for="nombre">Especialidad</label>
													<input class="form-control" type="text" name="nombre" required>
												</div>
											</div>

											<div class="row">
												<div class="col">
													<label for="masculino">Nombre Masculino</label>
													<input class="form-control" type="text" name="masculino" required>
												</div>
												<div class="col">

													<label for="femenino">Nombre Femenino</label>
													<input class="form-control" type="text" name="femenino" required>

												</div>
											</div>

										</div>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
										<button type="submit" name="creation-submit" class="btn btn-primary">Guardar</button>
									</div>
								</form>
							</div>
						</div>
					</div>
					<!-- Modal -->
					<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="updateModalLabel">Forma de actualizacion</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<form method="POST" id="update-form">
									<div class="modal-body">
										<div class="container-fluid">
											<div class="form-group row">
												<div class="col">
													<label for="id">Id</label>
													<input class="form-control" type="number" name="id" id="update-id" readonly>
												</div>
												<div class="col">
													<label for="nombre">Especialidad</label>
													<input class="form-control" type="text" name="nombre" id="update-nombre" required>
												</div>
											</div>

											<div class="row">
												<div class="col">
													<label for="masculino">Nombre Masculino</label>
													<input class="form-control" type="text" name="masculino" id="update-masculino" required>
												</div>
												<div class="col">

													<label for="femenino">Nombre Femenino</label>
													<input class="form-control" type="text" name="femenino" id="update-femenino" required>

												</div>
											</div>

										</div>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
										<button type="submit" name="creation-submit" class="btn btn-primary">Guardar</button>
									</div>
								</form>
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
	<script>
		$(document).ready(function() {
			$("#creation-form").on('submit', function(event) {
				event.preventDefault();
				$.ajax({
					url: "/backpanel/especialidades/create.php",
					method: "POST",
					data: $(this).serialize(),
					dataType: "json",
					success: function(response) {
						// alert(response.nombre);
						var html = '<tr id="row-' + response.id + '">';
						html += '<th scope="rows">' + response.id + '</th>';
						html += '<td>' + response.nombre + '</td>';
						html += '<td>' + response.masculino + '</td>';
						html += '<td>' + response.femenino + '</td>';
						html += '<td>';
						html += '<button class="btn btn-warning update-btn" data-id="' + response.id + '"> Modificar </button>';
						html += '</td>'
						html += '<td>';
						html += '<button class="btn btn-danger delete-btn" data-id="' + response.id + '"> Borrar </button>';
						html += '</td>'
						html += '</tr>';
						$('#especialidades-table-body').append(html);
						$('#creation-form')[0].reset();
						$('#creationModal').modal('hide');
						$('#especialidades-table-body:last-child').hide();
						$('#especialidades-table-body:last-child').fadeIn(500);
					}
				})
			});
			$(document).on('click', '.update-btn', function() {

				var rowNum = $(this).data('id');
				var rowID = '#row-' + rowNum;

				var row = $(rowID).children().toArray();				

				var id = row[0].innerHTML;
				var nombre = row[1].innerHTML;
				var masculino = row[2].innerHTML;
				var femenino = row[3].innerHTML;

				$('#updateModal').modal('show');
				$('#update-id').val(id);
				$('#update-nombre').val(nombre);
				$('#update-masculino').val(masculino);
				$('#update-femenino').val(femenino);

			});
			$('#update-form').on('submit', function(event){

				event.preventDefault();

				$.ajax({
					url: "/backpanel/especialidades/update.php",
					method: "POST",
					data: $(this).serialize(),
					dataType: "json",
					success: function(response) {
						// alert(response.nombre);
						var html = '';
						html += '<th scope="rows" id="row-' + response.id + '">' + response.id + '</th>';
						html += '<td>' + response.nombre + '</td>';
						html += '<td>' + response.masculino + '</td>';
						html += '<td>' + response.femenino + '</td>';
						html += '<td>';
						html += '<button class="btn btn-warning update-btn" data-id="' + response.id + '"> Modificar </button>';
						html += '</td>'
						html += '<td>';
						html += '<button class="btn btn-danger delete-btn" data-id="' + response.id + '"> Borrar </button>';
						html += '</td>'

						$('#updateModal').modal('hide');
						
						var rowID = '#row-'+response.id;
						$(rowID).hide();
						$(rowID).html(html);
						$(rowID).fadeIn(500);
					}
				});

			});

			$(document).on('click', '.delete-btn', function(){

				var el = this;
				
				var deleteid = $(this).data('id');

				var confirmAlert = confirm("Estas seguro?");
				if (!confirmAlert) {
					return;
				}

				$.ajax({
					url: '/backpanel/especialidades/delete.php',
					type: 'POST',
					data: {
						id: deleteid
					},
					success: function(response) {

						if (response == 1) {
							$(el).closest('tr').fadeOut(800, function() {
								$(this).remove();
							});
						} else {
							alert("Id invalido");
						}
					}
				});
			});

		});
	</script>
</body>

</html>