<?php require "../../php/verify-session.php" ?>
<?php require "../../php/db.php" ?>
<?php require "../../php/credentials.php" ?>

<?php

$id = $_POST['id'];

$sql = "SELECT * FROM galeria_img WHERE galeria_img_key=?";
$db = new db($dbHost, $dbUID, $dbPWD, $dbName);

$selected = $db->query($sql, $id)->fetchArray();

$img = fopen($selected['galeria_img_url'], "w+");
unlink($img);

$sql = "DELETE FROM galeria_img WHERE galeria_img_key=?";
$db->query($sql, $id);

if ($db->affectedRows() > 0) {
	echo 1;
	exit();
} else {
	echo 0;
	exit();
}

?>