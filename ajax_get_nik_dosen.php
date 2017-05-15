<?php
	include "config/config.php";

	$nama_dosen = $_POST['nama_dosen'];
	$nik = "";
	
	// Perform an SQL query
	$sql = "SELECT * FROM mst_dosen WHERE nama_dosen = '$nama_dosen'";
	
	if (!$result = $mysqli->query($sql)) {
		$message = "Sorry, the website is experiencing problems.";
		echo "<script type='text/javascript'>alert('$message');</script>";
	}
								
	while ($data = $result->fetch_assoc()) {
		$nik = $data['nik'];
	}

	echo $nik;
?>