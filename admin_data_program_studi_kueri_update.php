<?php
	include("config/config.php");
	
	include("_session_tata_usaha.php");
		
	$kd_prodi_old = $_POST['kd_prodi_old'];
	$kd_prodi = $_POST['kd_prodi'];
	$kd_fakultas = $_POST['kd_fakultas'];
	$nama_prodi = $_POST['nama_prodi'];
	
	// Perform an SQL query
	$sql = "UPDATE mst_program_studi SET
				kd_prodi = '$kd_prodi',
				kd_fakultas = '$kd_fakultas',
				nama_prodi = '$nama_prodi'
			WHERE kd_prodi = '$kd_prodi_old'";
	
	if (!$result = $mysqli->query($sql)) {
		// Oh no! The query failed. 
		echo "Sorry, the website is experiencing problems.";

		// Again, do not do this on a public site, but we'll show you how
		// to get the error information
		echo "Error: Our query failed to execute and here is why: \n";
		echo "Query: " . $sql . "\n";
		echo "Errno: " . $mysqli->errno . "\n";
		echo "Error: " . $mysqli->error . "\n";
		header('location:admin_data_program_studi_ubah.php?fail='.$mysqli->errno);
	} else {
		header('location:admin_data_program_studi_lihat.php?success=2');
	}
?>