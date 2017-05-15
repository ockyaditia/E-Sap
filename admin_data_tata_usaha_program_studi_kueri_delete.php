<?php
	include("config/config.php");
	
	include("_session_tata_usaha.php");

	$nik = $_GET['hapus'];
	
	// Perform an SQL query
	$sql = "DELETE FROM mst_tata_usaha WHERE nik = '$nik'";

	if (!$result = $mysqli->query($sql)) {
		// Oh no! The query failed. 
		echo "Sorry, the website is experiencing problems.";

		// Again, do not do this on a public site, but we'll show you how
		// to get the error information
		echo "Error: Our query failed to execute and here is why: \n";
		echo "Query: " . $sql . "\n";
		echo "Errno: " . $mysqli->errno . "\n";
		echo "Error: " . $mysqli->error . "\n";
		header('location:admin_data_tata_usaha_program_studi_lihat.php?fail='.$mysqli->errno);
	} else {
		// Perform an SQL query
		$sql = "DELETE FROM user_akses WHERE kd_user = '$nik'";

		if (!$result = $mysqli->query($sql)) {
			// Oh no! The query failed. 
			echo "Sorry, the website is experiencing problems.";

			// Again, do not do this on a public site, but we'll show you how
			// to get the error information
			echo "Error: Our query failed to execute and here is why: \n";
			echo "Query: " . $sql . "\n";
			echo "Errno: " . $mysqli->errno . "\n";
			echo "Error: " . $mysqli->error . "\n";
			header('location:admin_data_tata_usaha_program_studi_lihat.php?fail='.$mysqli->errno);
		} else {
			header('location:admin_data_tata_usaha_program_studi_lihat.php?success=3');
		}
	}
?>