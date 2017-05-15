<?php
	include "config/config.php";

	$nama_prodi = $_POST['nama_prodi'];
	$kd_prodi = "";
	
	// Perform an SQL query
	$sql = "SELECT * FROM mst_program_studi WHERE nama_prodi = '$nama_prodi'";
	
	if (!$result = $mysqli->query($sql)) {
		$message = "Sorry, the website is experiencing problems.";
		echo "<script type='text/javascript'>alert('$message');</script>";
	}
								
	while ($data = $result->fetch_assoc()) {
		$kd_prodi = $data['kd_prodi'];
	}

	echo $kd_prodi;
?>