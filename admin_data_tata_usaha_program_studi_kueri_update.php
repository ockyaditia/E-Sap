<?php
	include("config/config.php");
	
	include("_session_tata_usaha.php");
		
	include("key/RSA.php");
	
	$nik_old = $_POST['nik_old'];
	$nik = $_POST['nik'];
	$kd_prodi = $_POST['kd_prodi'];
	$nama_tata_usaha = $_POST['nama_tata_usaha'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	$RSA = new RSA();
	$password = $RSA->encrypt($password);
	
	// Perform an SQL query
	$sql = "UPDATE mst_tata_usaha SET
				nik = '$nik',
				nama_tata_usaha = '$nama_tata_usaha',
				kd_prodi = '$kd_prodi'
			WHERE nik = '$nik_old'";
	
	if (!$result = $mysqli->query($sql)) {
		// Oh no! The query failed. 
		echo "Sorry, the website is experiencing problems.";

		// Again, do not do this on a public site, but we'll show you how
		// to get the error information
		echo "Error: Our query failed to execute and here is why: \n";
		echo "Query: " . $sql . "\n";
		echo "Errno: " . $mysqli->errno . "\n";
		echo "Error: " . $mysqli->error . "\n";
		header('location:admin_data_tata_usaha_program_studi_ubah.php?fail='.$mysqli->errno);
	} else {
		// Perform an SQL query
		$sql = "UPDATE user_akses SET
					kd_user = '$nik',
					username = '$username',
					password = '$password'
				WHERE kd_user = '$nik_old'";
		
		if (!$result = $mysqli->query($sql)) {
			// Oh no! The query failed. 
			echo "Sorry, the website is experiencing problems.";

			// Again, do not do this on a public site, but we'll show you how
			// to get the error information
			echo "Error: Our query failed to execute and here is why: \n";
			echo "Query: " . $sql . "\n";
			echo "Errno: " . $mysqli->errno . "\n";
			echo "Error: " . $mysqli->error . "\n";
			header('location:admin_data_tata_usaha_program_studi_ubah.php?fail='.$mysqli->errno);
		} else {
		header('location:admin_data_tata_usaha_program_studi_lihat.php?success=2');
		}
	}
?>