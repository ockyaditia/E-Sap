<?php
	include "config/config.php";

	$nama_lab = $_POST['nama_lab'];
	$kd_ruang = "";
	
	// Perform an SQL query
	$sql = "SELECT * FROM laboratorium WHERE nama_lab = '$nama_lab'";
	
	if (!$result = $mysqli->query($sql)) {
		$message = "Sorry, the website is experiencing problems.";
		echo "<script type='text/javascript'>alert('$message');</script>";
	}
								
	while ($data = $result->fetch_assoc()) {
		$kd_ruang = $data['kd_ruang'];
	}

	echo $kd_ruang;
?>