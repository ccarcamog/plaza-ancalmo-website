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
								<th scope="col">img</th>
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
									<td><a href="<?= $seguro['doc_redes_seguros_img']?>" target="_blank"><?= $seguro['doc_redes_seguros_img'] ?></a></td>
									<td><a class="btn btn-warning" href="/backpanel/seguros/update.php/?id=<?= $seguro['doc_redes_seguros_key'] ?>">Modificar</a></td>
									<td>
										<button class="btn btn-danger" onclick="borrar_seguro(<?= $seguro['doc_redes_seguros_key']?>,'<?= $seguro['doc_redes_seguros_nombre']?>');">
											Borrar
										</button>
									</td>
								</tr>

							<?php
							}
							?>
						</tbody>
					</table>
					<a href="/backpanel/seguros/create.php" class="btn btn-success">Nueva red de seguros</a>
				</div>

			</div>
		</div>
	</div>
	<script type="text/javascript" src="/js/jquery.min.js"></script>
	<!-- Bootstrap core JavaScript -->
	<script type="text/javascript" src="/js/bootstrap.min.js"></script>
	<script type="text/javascript">
		function borrar_seguro(id, nombre){
			confirm("Seguro que desea borrar el elemento: " + nombre);
			window.location.href = "/backpanel/seguros/delete.php?id=" + id;
		}
	</script>
</body>

</html>