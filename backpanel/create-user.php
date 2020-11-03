<?php require "../php/verify-session.php" ?>
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
	<main class="d-flex align-items-stretch">

		<div class="container-fluid d-flex align-items-stretch">

			<div class="row" style="width: 100vw;">
				<div class="col-md-3 p-0">
					<?php include "../components/side-bar.php" ?>
				</div>
				<div class="col-md-9 p-5">
					<h4>Crear usuario</h4>
					<hr>
					<form action="/php/include/createuser.inc.php" method="POST">
						<div class="form-group row">
							<div class="col-md-6">
								<label for="username">Nombre de usuario</label>
								<input class="form-control" type="text" name="username" id="username-field" required>
							</div>
							<div class="col-md-6">
								<label for="mail">Correo electrónico</label>
								<input class="form-control" type="email" name="mail" id="email-field" required>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-12">
								<label for="password">Contraseña</label>
								<input class="form-control" type="password" name="password" id="password-field" required>
							</div>
							<div class="col-md-12">
								<label for="password-repeat">Repetir Contraseña</label>
								<input class="form-control" type="password" name="password-repeat" id="password-repeat-field" required>
							</div>
						</div>
						<input class="btn btn-primary" type="submit" name="createuser-submit" value="Crear Usuario">

					</form>
				</div>
			</div>
		</div>
	</main>
	<?php include "../components/footer.php" ?>
</body>

</html>