<?php
	include("config/config.php");
	
	include("_session_tata_usaha_program_studi.php");

	$kd_mata_kuliah = $_GET['hapus'];
	
	// Perform an SQL query
	$sql = "DELETE FROM mata_kuliah WHERE kd_mata_kuliah = '$kd_mata_kuliah'";

	if (!$result = $mysqli->query($sql)) {
		// Oh no! The query failed. 
		echo "Sorry, the website is experiencing problems.";

		// Again, do not do this on a public site, but we'll show you how
		// to get the error information
		echo "Error: Our query failed to execute and here is why: \n";
		echo "Query: " . $sql . "\n";
		echo "Errno: " . $mysqli->errno . "\n";
		echo "Error: " . $mysqli->error . "\n";
		header('location:admin_data_mata_kuliah_lihat.php?fail='.$mysqli->errno);
	} else {
		header('location:admin_data_mata_kuliah_lihat.php?success=3');
	}
?>