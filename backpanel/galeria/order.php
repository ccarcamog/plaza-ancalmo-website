<?php require "../../php/verify-session.php" ?>
<?php require "../../php/db.php" ?>
<?php require "../../php/credentials.php" ?>

<?php 

	$id = $_POST['id'];
	$order = $_POST['order'];

	$db = new db($dbHost, $dbUID, $dbPWD, $dbName);

	$sql = "UPDATE galeria_img SET galeria_img_orden=? WHERE galeria_img_key=?";
	$db->query($sql, $order, $id);
	echo 1;
?>