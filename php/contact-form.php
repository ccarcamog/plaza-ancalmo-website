<?php 

	echo $_POST['nombre'];

	if(isset($_POST['submit'])){
		$nombre = $_POST['nombre'];
		$apellido = $_POST['apellido'];
		$email = $_POST['email'];
		$comentario = $_POST['comentario'];

		$subject = "Mensaje de tu pagina web.";
		$mailTo = "rp18011@ues.edu.sv";
		$headers = "From: $email";
		$txt = "You have received an e-mail from $name.\n\n $message";

		mail($mailTo, $subject, $txt, $headers);
	}

?>