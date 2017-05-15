<?php
	include "config/config.php";

	$nama_fakultas = $_POST['nama_fakultas'];
	$kd_fakultas = "";
	
	// Perform an SQL query
	$sql = "SELECT * FROM mst_fakultas WHERE nama_fakultas = '$nama_fakultas'";
	
	if (!$result = $mysqli->query($sql)) {
		$message = "Sorry, the website is experiencing problems.";
		echo "<script type='text/javascript'>alert('$message');</script>";
	}
								
	while ($data = $result->fetch_assoc()) {
		$kd_fakultas = $data['kd_fakultas'];
	}

	echo $kd_fakultas;
?>