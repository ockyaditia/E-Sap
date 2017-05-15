<?php
	include("config/config.php");
	
	include("_session_tata_usaha_program_studi.php");
	
	$kd_ruang_old = $_POST['kd_ruang_old'];
	$kd_ruang = $_POST['kd_ruang'];
	$kd_prodi = $_POST['kd_prodi'];
	$nama_lab = $_POST['nama_lab'];
	$nik_dosen_pj = $_POST['nik_dosen_pj'];
	
	// Perform an SQL query
	$sql = "UPDATE laboratorium SET
				kd_ruang = '$kd_ruang',
				nama_lab = '$nama_lab',
				kd_prodi = '$kd_prodi',
				nik_dosen_pj = '$nik_dosen_pj'
			WHERE kd_ruang = '$kd_ruang_old'";
	
	if (!$result = $mysqli->query($sql)) {
		// Oh no! The query failed. 
		echo "Sorry, the website is experiencing problems.";

		// Again, do not do this on a public site, but we'll show you how
		// to get the error information
		echo "Error: Our query failed to execute and here is why: \n";
		echo "Query: " . $sql . "\n";
		echo "Errno: " . $mysqli->errno . "\n";
		echo "Error: " . $mysqli->error . "\n";
		header('location:admin_data_laboratorium_ubah.php?fail='.$mysqli->errno);
	} else {
		header('location:admin_data_laboratorium_lihat.php?success=2');
	}
?>