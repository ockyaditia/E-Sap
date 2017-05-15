<?php
	include("config/config.php");
	
	include("_session_tata_usaha_program_studi.php");
		
	$kd_ruang = $_POST['kd_ruang'];
	$kd_prodi = $_POST['kd_prodi'];
	$nama_ruang = $_POST['nama_ruang'];
	
	// Perform an SQL query
	$sql = "INSERT INTO ruang(kd_ruang, kd_prodi, nama_ruang)
			values('$kd_ruang', '$kd_prodi', '$nama_ruang')";

	if (!$result = $mysqli->query($sql)) {
		// Oh no! The query failed. 
		echo "Sorry, the website is experiencing problems.";

		// Again, do not do this on a public site, but we'll show you how
		// to get the error information
		echo "Error: Our query failed to execute and here is why: \n";
		echo "Query: " . $sql . "\n";
		echo "Errno: " . $mysqli->errno . "\n";
		echo "Error: " . $mysqli->error . "\n";
		header('location:admin_data_ruang_tambah.php?fail='.$mysqli->errno);
	} else {
		header('location:admin_data_ruang_lihat.php?success=1');
	}
?>