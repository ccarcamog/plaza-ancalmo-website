<?php require "../php/verify-session.php" ?>

<?php 
	session_unset();
	session_destroy();
	header("Location: login.php");
	exit();
?>