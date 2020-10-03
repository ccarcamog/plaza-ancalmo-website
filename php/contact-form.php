<?php 

	// mail("luismarioram99@gmail.com", "Test", "Hello world");

	if(!empty($_POST)){
		
		
		$nombre = $_POST['nombre'];
		$apellido = $_POST['apellido'];
		$email = $_POST['email'];
		$comentario = $_POST['comentario'];

		$subject = "Mensaje de tu pagina web.";
		$mailTo = "luismarioram99@gmail.com";
		$headers = "From: $email";
		$txt = "Has recibido un correo de $nombre $apellido.\n\n $comentario";

		if(mail($mailTo, $subject, $txt, $headers)){
			
		}
	}

	?>