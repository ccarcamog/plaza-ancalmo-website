<?php require "../../php/verify-session.php" ?>
<?php require "../../php/db.php" ?>
<?php require "../../php/credentials.php" ?>
<?php

$id = $_POST['id'];


$db = new db($dbHost, $dbUID, $dbPWD, $dbName);

$sql = "SELECT * FROM locales WHERE locales_key = ?";
$deleted = $db->query($sql, $id)->fetchArray();
$galeria_id = $deleted['locales_galeria_key'];

$sql = "DELETE FROM locales WHERE locales_key=?";
$affected = $db->query($sql, $id)->affectedRows();

$sql = "DELETE FROM galeria_img WHERE galeria_img_galeria_key=?";
$db->query($sql, $galeria_id);
$sql = "DELETE FROM galeria WHERE galeria_key=?";
$db->query($sql, $galeria_id);

$img = fopen($deleted['locales_preview'], "w+");
unlink($img);

?>