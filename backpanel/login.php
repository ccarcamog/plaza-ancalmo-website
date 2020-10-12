<?php 
	session_start();
	if(isset($_SESSION['username'])){
		header("Location: /backpanel/index.php");
		exit();
	}
?>

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
		
		<div class="row justify-content-center">
			<div class="col-md-8">
				<h4>Log In</h4>
				<hr>
				<form action="/php/include/login.inc.php" method="POST">
					<div class="form-group row">
						<div class="col-md-12">
							<label for="username">Nombre de usuario </label>
							<input class="form-control" type="text" name="username" id="username-field" required>
						</div>
						<div class="col-md-12">
							<label for="password">Contraseña</label>
							<input class="form-control" type="password" name="password" id="password-field" required> 
						</div>
					</div>
					<input class="btn btn-primary" type="submit" name="login-submit" value="Crear Usuario">
					
				</form>
			</div>
		</div>
	</div>
</body>

</html>