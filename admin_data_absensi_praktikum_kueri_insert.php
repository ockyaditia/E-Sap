<?php
	include("config/config.php");
	
	include("_session_tata_usaha_program_studi.php");
		
	$id_absensi = $_POST['id_absensi'];
	$kd_mata_kuliah = $_POST['kd_mata_kuliah'];
	$npm_ = $_POST['npm_'];
	$w1_ = $_POST['w1_'];
	$w2_ = $_POST['w2_'];
	$w3_ = $_POST['w3_'];
	$w4_ = $_POST['w4_'];
	$w5_ = $_POST['w5_'];
	$w6_ = $_POST['w6_'];
	$w7_ = $_POST['w7_'];
	$w8_ = $_POST['w8_'];
	$w9_ = $_POST['w9_'];
	$w10_ = $_POST['w10_'];
	$w11_ = $_POST['w11_'];
	$w12_ = $_POST['w12_'];
	$w13_ = $_POST['w13_'];
	$w14_ = $_POST['w14_'];
	$w15_ = $_POST['w15_'];
	$w16_ = $_POST['w16_'];
	
	$total_npm = 0;
	if (isset($_POST['npm_'])) {
		$total_npm = count($_POST['npm_']);
	}
	
	$npm = "";
	for( $i = 0; $i < $total_npm; $i++ ) {
		if ($npm == "") {
			$npm = $npm_[$i] . ", ";
		} else {
			$npm = $npm . $npm_[$i] . ", ";
		}
	}
	
	$total_w1 = 0;
	if (isset($_POST['w1_'])) {
		$total_w1 = count($_POST['w1_']);
	}
	
	$w1 = "";
	for( $i = 0; $i < $total_w1; $i++ ) {
		if ($w1 == "") {
			$w1 = $w1_[$i] . ", ";
		} else {
			$w1 = $w1 . $w1_[$i] . ", ";
		}
	}
	
	$total_w2 = 0;
	if (isset($_POST['w2_'])) {
		$total_w2 = count($_POST['w2_']);
	}
	
	$w2 = "";
	for( $i = 0; $i < $total_w2; $i++ ) {
		if ($w2 == "") {
			$w2 = $w2_[$i] . ", ";
		} else {
			$w2 = $w2 . $w2_[$i] . ", ";
		}
	}
	
	$total_w3 = 0;
	if (isset($_POST['w3_'])) {
		$total_w3 = count($_POST['w3_']);
	}
	
	$w3 = "";
	for( $i = 0; $i < $total_w3; $i++ ) {
		if ($w3 == "") {
			$w3 = $w3_[$i] . ", ";
		} else {
			$w3 = $w3 . $w3_[$i] . ", ";
		}
	}
	
	$total_w4 = 0;
	if (isset($_POST['w4_'])) {
		$total_w4 = count($_POST['w4_']);
	}
	
	$w4 = "";
	for( $i = 0; $i < $total_w4; $i++ ) {
		if ($w4 == "") {
			$w4 = $w4_[$i] . ", ";
		} else {
			$w4 = $w4 . $w4_[$i] . ", ";
		}
	}
	
	$total_w5 = 0;
	if (isset($_POST['w5_'])) {
		$total_w5 = count($_POST['w5_']);
	}
	
	$w5 = "";
	for( $i = 0; $i < $total_w5; $i++ ) {
		if ($w5 == "") {
			$w5 = $w5_[$i] . ", ";
		} else {
			$w5 = $w5 . $w5_[$i] . ", ";
		}
	}
	
	$total_w6 = 0;
	if (isset($_POST['w6_'])) {
		$total_w6 = count($_POST['w6_']);
	}
	
	$w6 = "";
	for( $i = 0; $i < $total_w6; $i++ ) {
		if ($w6 == "") {
			$w6 = $w6_[$i] . ", ";
		} else {
			$w6 = $w6 . $w6_[$i] . ", ";
		}
	}
	
	$total_w7 = 0;
	if (isset($_POST['w7_'])) {
		$total_w7 = count($_POST['w7_']);
	}
	
	$w7 = "";
	for( $i = 0; $i < $total_w7; $i++ ) {
		if ($w7 == "") {
			$w7 = $w7_[$i] . ", ";
		} else {
			$w7 = $w7 . $w7_[$i] . ", ";
		}
	}
	
	$total_w8 = 0;
	if (isset($_POST['w8_'])) {
		$total_w8 = count($_POST['w8_']);
	}
	
	$w8 = "";
	for( $i = 0; $i < $total_w8; $i++ ) {
		if ($w8 == "") {
			$w8 = $w8_[$i] . ", ";
		} else {
			$w8 = $w8 . $w8_[$i] . ", ";
		}
	}
	
	$total_w9 = 0;
	if (isset($_POST['w9_'])) {
		$total_w9 = count($_POST['w9_']);
	}
	
	$w9 = "";
	for( $i = 0; $i < $total_w9; $i++ ) {
		if ($w9 == "") {
			$w9 = $w9_[$i] . ", ";
		} else {
			$w9 = $w9 . $w9_[$i] . ", ";
		}
	}
	
	$total_w10 = 0;
	if (isset($_POST['w10_'])) {
		$total_w10 = count($_POST['w10_']);
	}
	
	$w10 = "";
	for( $i = 0; $i < $total_w10; $i++ ) {
		if ($w10 == "") {
			$w10 = $w10_[$i] . ", ";
		} else {
			$w10 = $w10 . $w10_[$i] . ", ";
		}
	}
	
	$total_w11 = 0;
	if (isset($_POST['w11_'])) {
		$total_w11 = count($_POST['w11_']);
	}
	
	$w11 = "";
	for( $i = 0; $i < $total_w11; $i++ ) {
		if ($w11 == "") {
			$w11 = $w11_[$i] . ", ";
		} else {
			$w11 = $w11 . $w11_[$i] . ", ";
		}
	}
	
	$total_w12 = 0;
	if (isset($_POST['w12_'])) {
		$total_w12 = count($_POST['w12_']);
	}
	
	$w12 = "";
	for( $i = 0; $i < $total_w12; $i++ ) {
		if ($w12 == "") {
			$w12 = $w12_[$i] . ", ";
		} else {
			$w12 = $w12 . $w12_[$i] . ", ";
		}
	}
	
	$total_w13 = 0;
	if (isset($_POST['w13_'])) {
		$total_w13 = count($_POST['w13_']);
	}
	
	$w13 = "";
	for( $i = 0; $i < $total_w13; $i++ ) {
		if ($w13 == "") {
			$w13 = $w13_[$i] . ", ";
		} else {
			$w13 = $w13 . $w13_[$i] . ", ";
		}
	}
	
	$total_w14 = 0;
	if (isset($_POST['w14_'])) {
		$total_w14 = count($_POST['w14_']);
	}
	
	$w14 = "";
	for( $i = 0; $i < $total_w14; $i++ ) {
		if ($w14 == "") {
			$w14 = $w14_[$i] . ", ";
		} else {
			$w14 = $w14 . $w14_[$i] . ", ";
		}
	}
	
	$total_w15 = 0;
	if (isset($_POST['w15_'])) {
		$total_w15 = count($_POST['w15_']);
	}
	
	$w15 = "";
	for( $i = 0; $i < $total_w15; $i++ ) {
		if ($w15 == "") {
			$w15 = $w15_[$i] . ", ";
		} else {
			$w15 = $w15 . $w15_[$i] . ", ";
		}
	}
	
	$total_w16 = 0;
	if (isset($_POST['w16_'])) {
		$total_w16 = count($_POST['w16_']);
	}
	
	$w16 = "";
	for( $i = 0; $i < $total_w16; $i++ ) {
		if ($w16 == "") {
			$w16 = $w16_[$i] . ", ";
		} else {
			$w16 = $w16 . $w16_[$i] . ", ";
		}
	}
	
	// Perform an SQL query
	$sql = "INSERT INTO absensi(id_absensi, kd_mata_kuliah, npm, w1, w2, w3, w4, w5, w6, w7, w8, w9, w10, w11, w12, w13, w14, w15, w16)
			values('$id_absensi', '$kd_mata_kuliah', '$npm', '$w1', '$w2', '$w3', '$w4', '$w5', '$w6', '$w7', '$w8', '$w9', '$w10', '$w11', '$w12', '$w13', '$w14', '$w15', '$w16')
			ON DUPLICATE KEY UPDATE 
			kd_mata_kuliah = '$kd_mata_kuliah',
			npm = '$npm',
			w1 = '$w1',
			w2 = '$w2',
			w3 = '$w3',
			w4 = '$w4',
			w5 = '$w5',
			w6 = '$w6',
			w7 = '$w7',
			w8 = '$w8',
			w9 = '$w9',
			w10 = '$w10',
			w11 = '$w11',
			w12 = '$w12',
			w13 = '$w13',
			w14 = '$w14',
			w15 = '$w15',
			w16 = '$w16'";

	if (!$result = $mysqli->query($sql)) {
		// Oh no! The query failed. 
		echo "Sorry, the website is experiencing problems.";

		// Again, do not do this on a public site, but we'll show you how
		// to get the error information
		echo "Error: Our query failed to execute and here is why: \n";
		echo "Query: " . $sql . "\n";
		echo "Errno: " . $mysqli->errno . "\n";
		echo "Error: " . $mysqli->error . "\n";
		header('location:admin_data_absensi_praktikum_lihat.php?lihat='.$kd_mata_kuliah.'&fail='.$mysqli->errno);
	} else {
		header('location:admin_data_absensi_praktikum_lihat.php?lihat='.$kd_mata_kuliah.'&success=1');
	}
?>