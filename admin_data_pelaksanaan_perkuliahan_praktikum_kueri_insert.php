<?php
	include("config/config.php");
	
	include("_session_tata_usaha_program_studi.php");
		
	$id_pelaksanaan_perkuliahan = $_POST['id_pelaksanaan_perkuliahan'];
	$kd_mata_kuliah = $_POST['kd_mata_kuliah'];
	$kd_ruang = $_POST['kd_ruang'];
	$nik_tata_usaha = $_POST['nik_tata_usaha'];
	$hari_perkuliahan = $_POST['hari_perkuliahan'];
	$jam_mulai = $_POST['jam_mulai'];
	$jam_selesai = $_POST['jam_selesai'];
	$jam_perkuliahan = $jam_mulai . "-" . $jam_selesai;
	$hari_dan_tgl_rencana1 = $_POST['hari_dan_tgl_rencana1'];
	$hari_dan_tgl_rencana2 = $_POST['hari_dan_tgl_rencana2'];
	$hari_dan_tgl_rencana3 = $_POST['hari_dan_tgl_rencana3'];
	$hari_dan_tgl_rencana4 = $_POST['hari_dan_tgl_rencana4'];
	$hari_dan_tgl_rencana5 = $_POST['hari_dan_tgl_rencana5'];
	$hari_dan_tgl_rencana6 = $_POST['hari_dan_tgl_rencana6'];
	$hari_dan_tgl_rencana7 = $_POST['hari_dan_tgl_rencana7'];
	$hari_dan_tgl_rencana8 = $_POST['hari_dan_tgl_rencana8'];
	$sign_tu1 = $_POST['sign_tu1'];
	$sign_tu2 = $_POST['sign_tu2'];
	$sign_tu3 = $_POST['sign_tu3'];
	$sign_tu4 = $_POST['sign_tu4'];
	$sign_tu5 = $_POST['sign_tu5'];
	$sign_tu6 = $_POST['sign_tu6'];
	$sign_tu7 = $_POST['sign_tu7'];
	$sign_tu8 = $_POST['sign_tu8'];
	
	// Perform an SQL query
	$sql = "INSERT INTO pelaksanaan_perkuliahan(id_pelaksanaan_perkuliahan, kd_mata_kuliah, kd_ruang, nik_tata_usaha, hari_perkuliahan, jam_perkuliahan, hari_dan_tgl_rencana1, hari_dan_tgl_rencana2, 	hari_dan_tgl_rencana3, hari_dan_tgl_rencana4, hari_dan_tgl_rencana5, hari_dan_tgl_rencana6, hari_dan_tgl_rencana7, hari_dan_tgl_rencana8, sign_tu1, sign_tu2, sign_tu3, sign_tu4, sign_tu5, sign_tu6, sign_tu7, sign_tu8)
			values('$id_pelaksanaan_perkuliahan', '$kd_mata_kuliah', '$kd_ruang', '$nik_tata_usaha', '$hari_perkuliahan', '$jam_perkuliahan', '$hari_dan_tgl_rencana1', '$hari_dan_tgl_rencana2', '$hari_dan_tgl_rencana3', '$hari_dan_tgl_rencana4', '$hari_dan_tgl_rencana5', '$hari_dan_tgl_rencana6', '$hari_dan_tgl_rencana7', '$hari_dan_tgl_rencana8', '$sign_tu1', '$sign_tu2', '$sign_tu3', '$sign_tu4', '$sign_tu5', '$sign_tu6', '$sign_tu7', '$sign_tu8')
			ON DUPLICATE KEY UPDATE 
			kd_mata_kuliah = '$kd_mata_kuliah',
			kd_ruang = '$kd_ruang',
			nik_tata_usaha = '$nik_tata_usaha',
			hari_perkuliahan = '$hari_perkuliahan',
			jam_perkuliahan = '$jam_perkuliahan',
			hari_dan_tgl_rencana1 = '$hari_dan_tgl_rencana1',
			hari_dan_tgl_rencana2 = '$hari_dan_tgl_rencana2',
			hari_dan_tgl_rencana3 = '$hari_dan_tgl_rencana3',
			hari_dan_tgl_rencana4 = '$hari_dan_tgl_rencana4',
			hari_dan_tgl_rencana5 = '$hari_dan_tgl_rencana5',
			hari_dan_tgl_rencana6 = '$hari_dan_tgl_rencana6',
			hari_dan_tgl_rencana7 = '$hari_dan_tgl_rencana7',
			hari_dan_tgl_rencana8 = '$hari_dan_tgl_rencana8',
			sign_tu1 = '$sign_tu1',
			sign_tu2 = '$sign_tu2',
			sign_tu3 = '$sign_tu3',
			sign_tu4 = '$sign_tu4',
			sign_tu5 = '$sign_tu5',
			sign_tu6 = '$sign_tu6',
			sign_tu7 = '$sign_tu7',
			sign_tu8 = '$sign_tu8'";

	if (!$result = $mysqli->query($sql)) {
		// Oh no! The query failed. 
		echo "Sorry, the website is experiencing problems.";

		// Again, do not do this on a public site, but we'll show you how
		// to get the error information
		echo "Error: Our query failed to execute and here is why: \n";
		echo "Query: " . $sql . "\n";
		echo "Errno: " . $mysqli->errno . "\n";
		echo "Error: " . $mysqli->error . "\n";
		header('location:admin_data_pelaksanaan_perkuliahan_teori_lihat.php?lihat='.$kd_mata_kuliah.'&fail='.$mysqli->errno);
	} else {
		header('location:admin_data_pelaksanaan_perkuliahan_teori_lihat.php?lihat='.$kd_mata_kuliah.'&success=1');
	}
?>