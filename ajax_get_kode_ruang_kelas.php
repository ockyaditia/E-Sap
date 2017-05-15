<?php
	include "config/config.php";

	$nama_ruang = $_POST['nama_ruang'];
	$kd_ruang = "";
	
	// Perform an SQL query
	$sql = "SELECT * FROM ruang WHERE nama_ruang = '$nama_ruang'";
	
	if (!$result = $mysqli->query($sql)) {
		$message = "Sorry, the website is experiencing problems.";
		echo "<script type='text/javascript'>alert('$message');</script>";
	}
								
	while ($data = $result->fetch_assoc()) {
		$kd_ruang = $data['kd_ruang'];
	}

	echo $kd_ruang;
?>