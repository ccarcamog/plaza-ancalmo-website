<?php 
	$server = "92.249.44.207";
	$dbUser = "u526609065_app";
	$dbPass = "0UL]Xe;d";
	$dbName = "u526609065_plazaancalmo";
	
	$conn = mysqli_connect($server, $dbUser, $dbPass, $dbName);
	
	if(!$conn){
		die("Coneccion fallida: ".mysqli_connect_error());
	}
?>