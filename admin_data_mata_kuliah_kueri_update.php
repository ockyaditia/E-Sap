<?php
	include("config/config.php");
	
	include("_session_tata_usaha_program_studi.php");
	
	$kd_mata_kuliah_old = $_POST['kd_mata_kuliah_old'];
	$kd_mata_kuliah = $_POST['kd_mata_kuliah'];
	$kd_prodi = $_POST['kd_prodi'];
	$nama_mata_kuliah = $_POST['nama_mata_kuliah'];
	$semester = $_POST['semester'];
	$tahun_ajaran = $_POST['tahun_ajaran'];
	$sks_teori = $_POST['sks_teori'];
	$sks_praktikum = $_POST['sks_praktikum'];
	$total_sks = $sks_teori + $sks_praktikum;
	$sifat = $_POST['sifat'];
	
	// Perform an SQL query
	$sql = "UPDATE mata_kuliah SET
				kd_mata_kuliah = '$kd_mata_kuliah',
				nama_mata_kuliah = '$nama_mata_kuliah',
				kd_prodi = '$kd_prodi',
				semester = '$semester',
				tahun_ajaran = '$tahun_ajaran',
				sks_teori = '$sks_teori',
				sks_praktikum = '$sks_praktikum',
				total_sks = '$total_sks',
				sifat = '$sifat'
			WHERE kd_mata_kuliah = '$kd_mata_kuliah_old'";
	
	if (!$result = $mysqli->query($sql)) {
		// Oh no! The query failed. 
		echo "Sorry, the website is experiencing problems.";

		// Again, do not do this on a public site, but we'll show you how
		// to get the error information
		echo "Error: Our query failed to execute and here is why: \n";
		echo "Query: " . $sql . "\n";
		echo "Errno: " . $mysqli->errno . "\n";
		echo "Error: " . $mysqli->error . "\n";
		header('location:admin_data_mata_kuliah_ubah.php?fail='.$mysqli->errno);
	} else {
		header('location:admin_data_mata_kuliah_lihat.php?success=2');
	}
?>