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
	<?php include "../components/navbar.php" ?>
	<div class="container-fluid p-5">
		
		
		<div class="row">
			<div class="col-md-4">
				<?php include "../components/side-bar.php" ?>
			</div>
			<div class="col-md-8">
				<h4>Crear usuario</h4>
				<hr>
				<form action="/php/include/createuser.inc.php" method="POST">
					<div class="form-group row">
						<div class="col-md-6">
							<label for="username">Nombre de usuario</label>
							<input class="form-control" type="text" name="username" id="username-field" required>
						</div>
						<div class="col-md-6">
							<label for="mail">Correo electronico</label>
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
</body>

</html>