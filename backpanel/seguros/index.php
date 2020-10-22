<?php require "../../php/verify-session.php" ?>
<?php require "../../php/db.php" ?>
<?php require "../../php/credentials.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Redes de seguros</title>

	<link rel="icon" href="/img/Logo Plaza Ancalmo.png">
	<!-- MDB icon -->
	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="/css/bootstrap.min.css">
	<link rel="stylesheet" href="/css/style.css">
</head>

<body>


	<main  class="d-flex align-items-stretch">
		<div class="container-fluid d-flex align-items-stretch">

			<div class="row" style="width: 100vw;">
				<div class="col-md-3 p-0">
					<?php include "../../components/side-bar.php" ?>
				</div>
				<div class="col-md-9 p-5">
					<h2>Redes de seguros</h2>
					<?php

					$db = new db($dbHost, $dbUID, $dbPWD, $dbName);

					$sql = "SELECT * FROM doc_redes_seguros";

					$seguros = $db->query($sql)->fetchAll();

					?>
					<div class="table-responsive  mt-4">
						<table class="table table-hover">
							<thead class="thead-dark">
								<tr>
									<th scope="col">id</th>
									<th scope="col">nombre</th>
									<th scope="col">descripcion</th>
									<th scope="col">link</th>
									<th class="text-center" scope="col">img</th>
									<th></th>
									<th></th>
								</tr>
							</thead>
							<tbody>

								<?php
								foreach ($seguros as $seguro) {
								?>

									<tr>
										<th scope="row"><?= $seguro['doc_redes_seguros_key'] ?></th>
										<td><?= $seguro['doc_redes_seguros_nombre'] ?></td>
										<td><?= $seguro['doc_redes_seguros_desc'] ?></td>
										<td><a href="<?= $seguro['doc_redes_seguros_link'] ?>" target="_blank"><?= $seguro['doc_redes_seguros_link'] ?></a></td>
										<td class="text-center">
											<?php if ($seguro['doc_redes_seguros_img'] != "") { ?>
												<img src="/backpanel/seguros/<?= $seguro['doc_redes_seguros_img'] ?>" height="50px">
											<?php
											} else {
												echo "null";
											}
											?>
										</td>
										<td><a class="btn btn-warning" href="/backpanel/seguros/update.php/?id=<?= $seguro['doc_redes_seguros_key'] ?>">Modificar</a></td>
										<td>
											<button class="btn btn-danger delete" data-id="<?= $seguro['doc_redes_seguros_key'] ?>">
												Borrar
											</button>
										</td>
									</tr>

								<?php
								}
								?>
							</tbody>
						</table>
					</div>
					<a href="/backpanel/seguros/create.php" class="btn btn-success">Nueva red de seguros</a>

				</div>
			</div>
		</div>
	</main>
	<?php include "../../components/footer.php" ?>
	<script type="text/javascript" src="/js/jquery.min.js"></script>
	<!-- Bootstrap core JavaScript -->
	<script type="text/javascript" src="/js/bootstrap.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {

			$('.delete').click(function() {
				var el = this;

				var deleteid = $(this).data('id');

				var confirmAlert = confirm("Estas seguro?");
				if (!confirmAlert) {
					return;
				}

				$.ajax({
					url: '/backpanel/seguros/delete.php',
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