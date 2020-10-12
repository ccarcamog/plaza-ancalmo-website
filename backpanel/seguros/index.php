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
								<th scope="col">Modificar</th>
							</tr>
						</thead>
						<tbody>

							<?php 
								foreach($seguros as $seguro){
							?>

							<tr>
								<th scope="row"><?php echo $seguro['doc_redes_seguros_key'] ?></th>
								<td><?php echo $seguro['doc_redes_seguros_desc'] ?></td>
								<td><?php echo $seguro['doc_redes_seguros_link'] ?></td>
								<td><?php echo $seguro['doc_redes_seguros_img'] ?></td>
								<td><?php echo $seguro['doc_redes_seguros_nombre'] ?></td>
								<td><a class="btn btn-primary" href="#">Modificar</a></td>
							</tr>

							<?php 
								}
							?>
						</tbody>
					</table>
				</div>

			</div>
		</div>
	</div>
</body>

</html>