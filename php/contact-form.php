<?php

// mail("luismarioram99@gmail.com", "Test", "Hello world");

if (!empty($_POST)) {


	$nombre = $_POST['nombre'];
	$apellido = $_POST['apellido'];
	$email = $_POST['email'];
	$comentario = $_POST['comentario'];

	$subject = "Mensaje de tu pagina web.";
	$mailTo = "wasd@plazaancalmo.com";
	$headers = "From: $email";
	$txt = "Has recibido un correo de $nombre $apellido.\n\n $comentario";

	if (mail($mailTo, $subject, $txt, $headers)) {
?>

	<div class=" alert alert-success alert-dismissible fade show" role="alert">
		<strong>Exito!</strong> Tu correo ha sido enviado exitosamente
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>

<?php
	}
}

?>