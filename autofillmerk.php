<?php
	$mysqli = new mysqli("localhost","root","","lovely");
	
	if($mysqli->connect_error) {
	  exit('Could not connect');
	}

$sql = "SELECT nama, merk FROM keluar WHERE nama = ?";

$stmt = $mysqli->prepare($sql);
$stmt->bind_param("s", $_GET['q']);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($nama,$merk);
$stmt->fetch();
$stmt->close();

echo $merk;

?>
