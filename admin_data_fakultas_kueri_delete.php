<?php
	include("config/config.php");
	
	include("_session_tata_usaha.php");

	$kd_fakultas = $_GET['hapus'];
	
	// Perform an SQL query
	$sql = "DELETE FROM mst_fakultas WHERE kd_fakultas = '$kd_fakultas'";

	if (!$result = $mysqli->query($sql)) {
		// Oh no! The query failed. 
		echo "Sorry, the website is experiencing problems.";

		// Again, do not do this on a public site, but we'll show you how
		// to get the error information
		echo "Error: Our query failed to execute and here is why: \n";
		echo "Query: " . $sql . "\n";
		echo "Errno: " . $mysqli->errno . "\n";
		echo "Error: " . $mysqli->error . "\n";
		header('location:admin_data_fakultas_lihat.php?fail='.$mysqli->errno);
	} else {
		header('location:admin_data_fakultas_lihat.php?success=3');
	}
?>