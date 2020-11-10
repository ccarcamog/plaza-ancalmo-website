<?php require "credentials.php" ?>
<?php

// mail("luismarioram99@gmail.com", "Test", "Hello world");

if (isset($_POST["contact-submit"])) {

	$nombre = $_POST['nombre'];
	$apellido = $_POST['apellido'];
	$email = $_POST['email'];
	$comentario = $_POST['comentario'];

	$subject = "Mensaje de tu pagina web.";
	$mailTo = $contactMailReceiver;
	$headers = "From: $email \r\n";
	$headers .= "Reply-To: $email \r\n";
	$headers .= "Content-type: text/html";

	 $txt = 	'<!DOCTYPE html
	 PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
 
 <html xmlns="http://www.w3.org/1999/xhtml">
 
 <head>
	 
	 <title>Mensaje de tu pagina</title>
	 <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600;700">
	 <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans&display=swap">
	 <link rel="stylesheet" href="https://uat.indasagroup.com/css/gotham-bold/stylesheet.css">;
	 <style>
 
 
		 p {
			 font-family: "IBM Plex Sans", sans-serif;
		 }
 
		 .content {
 
			 border: solid 1px rgba(0, 0, 0, 0.5);
			 border-radius: 15px;
			 overflow: hidden;
		 }
 
		 .header {
			 padding: 20px;
			 color: white;
			 background-color: rgb(63, 106, 170);
 
		 }
 
		 hr{
			 margin: 0;
		 }
 
		 .header img {
			 height: 70px;
		 }
 
		 .header h1{
			 font-family: "Gill Sans", "Gill Sans MT", Calibri, "Trebuchet MS", sans-serif;
		 }
 
		 .text {
			 margin: 20px;
		 }
	 </style>
 </head>
 
 <body>
 
	 <div class="content">
		 <div class="header">
			 <!-- <img src="'.$domainName.'/img/svg/Logo Plaza Ancalmo copy.svg"> -->
			 <h1 style=\'color:white; font-family: "Gill Sans", "Gill Sans MT", Calibri, "Trebuchet MS", sans-serif;\'>Nuevo mensaje de Plaza Ancalmo</h1>
		 </div>
		 <hr>
		 <div class="text">
			 <p>Mensaje de: <strong>'.$nombre.' '.$apellido.'</strong> <i>"'.$email.'"</i>
				 <br>
				 <br>
				 "'.$comentario.'"
			 </p>
			 <p>
				 <b>Responder a este correo para enviar un correo a '.$nombre.'.</b>
			 </p>
		 </div>
	 </div>
 </body>
 
 </html>';
	


	if (mail($mailTo, $subject, $txt, $headers)) {
?>

	<div class=" alert alert-success alert-dismissible fade show" role="alert">
		<strong>Exito!</strong> Tu correo ha sido enviado exitosamente
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>

<?php
	}else{
		?>

	<div class=" alert alert-danger alert-dismissible fade show" role="alert">
		<strong>ERROR!</strong> ha fallado el envio de correo, intenta nuevamente en unos minutos. 
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>

<?php
	}
}

?>