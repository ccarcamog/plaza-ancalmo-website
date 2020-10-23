<?php
session_start();
if (isset($_SESSION['username'])) {
	header("Location: /backpanel/index.php");
	exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ingresar al backpanel</title>

	<link rel="icon" href="/img/Logo Plaza Ancalmo.png">
	<!-- MDB icon -->
	<!-- Bootstrap core CSS -->

	<link rel="stylesheet" href="/css/bootstrap.min.css">
	<link rel="stylesheet" href="/css/style.css">
</head>

<body>
	<nav class="d-flex flex-wrap justify-content-center" id="top-navbar">
		<div class="d-flex align-items-center my-4 px-4 border-right" style="width:300px">
			<a class="navbar-brand ml-lg-5" href="/">
				<img src="/img/svg/Logo Plaza Ancalmo copy.svg" width="75" alt="Logo de Plaza Ancalmo">
			</a>
			<a href="/" class="navbar-brand">PLAZA <br>ANCALMO</a>
		</div>
		<div class="d-flex align-items-center my-4 px-4" style="width:300px">
			<a class="navbar-brand text-black" id="admin-text">Modulo de <br>Administrador</a>
		</div>
	</nav>
	<main>

		<div class="container p-md-5">

			<div class="row justify-content-center align-items-center">
				<div class="col-md-4 p-0" style="border-radius:15px; overflow:hidden">
					<img src="/img/mision-bg.jpg" style="width:100%; height:50vh; object-fit:cover">
				</div>
				<div class="col-md-4 p-5">
					<h4>Log In</h4>
					<hr>
					<form action="/php/include/login.inc.php" method="POST">
						<div class="form-group input-group">
							<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon1">
									<img src="/img/svg/user.svg" style="height:1.5em; width:1.5em; object-fit:scale-down">
								</span>
							</div>
							<input id="email" type="text" class="form-control" name="username" placeholder="Usuario">
						</div>
						<div class="form-group input-group">
							<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon1">
									<img src="/img/svg/password.svg" style="height:1.5em; width:1.5em; object-fit:scale-down">
								</span>
							</div>
							<input id="password" type="password" class="form-control" name="password" placeholder="Contraseña">
						</div>
						<div class="form-group">
							<input class="btn btn-primary" type="submit" name="login-submit" value="Ingresar">
						</div>

					</form>
				</div>
			</div>
		</div>
	</main>
	<?php include "../components/footer.php" ?>

	<script type="text/javascript" src="/js/jquery.min.js"></script>
	<script type="text/javascript" src="/js/bootstrap.min.js"></script>
</body>

</html>