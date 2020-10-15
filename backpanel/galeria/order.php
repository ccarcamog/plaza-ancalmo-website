<?php require "../../php/verify-session.php" ?>
<?php require "../../php/db.php" ?>
<?php require "../../php/credentials.php" ?>

<?php 

	$keys = json_decode(stripslashes($_POST['keys']));

	$db = new db($dbHost, $dbUID, $dbPWD, $dbName);


	$order = 0;
	foreach($keys as $key){

		$id = $key;

		$sql = "UPDATE galeria_img SET galeria_img_orden=? WHERE galeria_img_key=?";
		$db->query($sql, $order, $id);

		$order ++;

	}

	echo 1;
?>