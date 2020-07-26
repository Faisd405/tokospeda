<?php
	$mysqli = new mysqli("localhost","root","","lovely");
	
	if($mysqli->connect_error) {
	  exit('Could not connect');
	}

$sql = "SELECT nama, model FROM keluar WHERE nama = ?";

$stmt = $mysqli->prepare($sql);
$stmt->bind_param("s", $_GET['q']);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($nama,$model);
$stmt->fetch();
$stmt->close();

echo $model;

?>
