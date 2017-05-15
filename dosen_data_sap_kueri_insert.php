<?php
	include("config/config.php");
	
	include("_session_dosen.php");
		
	$kd_mata_kuliah = $_POST['kd_mata_kuliah'];
	$nik_koordinator_mata_kuliah = $_POST['nik_koordinator_mata_kuliah'];
	$silabus_ringkas = $_POST['silabus_ringkas'];
	$tiu = $_POST['tiu'];
	$mk_prasyarat = $_POST['mk_prasyarat'];
	$media1 = $_POST['media1'];
	$media2 = $_POST['media2'];
	$media3 = $_POST['media3'];
	$media = $media1 . ", " . $media2 . ", " . $media3;
	$waktu_kuliah = $_POST['waktu_kuliah'];
	$waktu_pr = $_POST['waktu_pr'];
	$waktu_diskusi_kelompok = $_POST['waktu_diskusi_kelompok'];
	$bobot_UTS = $_POST['bobot_UTS'];
	$bobot_UAS = $_POST['bobot_UAS'];
	$bobot_quiz = $_POST['bobot_quiz'];
	$bobot_tugas = $_POST['bobot_tugas'];
	$bobot_praktikum_dan_keaktifan = $_POST['bobot_praktikum_dan_keaktifan'];
	$rujukan = $_POST['rujukan'];
	
	// Perform an SQL query
	$sql = "INSERT INTO sap(kd_mata_kuliah, nik_koordinator_mata_kuliah, silabus_ringkas, tiu, mk_prasyarat, media, waktu_kuliah, waktu_pr, 	waktu_diskusi_kelompok, bobot_UTS, bobot_UAS, bobot_quiz, bobot_tugas, bobot_praktikum_dan_keaktifan, rujukan)
			values('$kd_mata_kuliah', '$nik_koordinator_mata_kuliah', '$silabus_ringkas', '$tiu', '$mk_prasyarat', '$media', '$waktu_kuliah', '$waktu_pr', '$waktu_diskusi_kelompok', '$bobot_UTS', '$bobot_UAS', '$bobot_quiz', '$bobot_tugas', '$bobot_praktikum_dan_keaktifan', '$rujukan')
			ON DUPLICATE KEY UPDATE 
			nik_koordinator_mata_kuliah = '$nik_koordinator_mata_kuliah',
			silabus_ringkas = '$silabus_ringkas',
			tiu = '$tiu',
			mk_prasyarat = '$mk_prasyarat',
			media = '$media',
			waktu_kuliah = '$waktu_kuliah',
			waktu_pr = '$waktu_pr',
			waktu_diskusi_kelompok = '$waktu_diskusi_kelompok',
			bobot_UTS = '$bobot_UTS',
			bobot_UAS = '$bobot_UAS',
			bobot_quiz = '$bobot_quiz',
			bobot_tugas = '$bobot_tugas',
			bobot_praktikum_dan_keaktifan = '$bobot_praktikum_dan_keaktifan',
			rujukan = '$rujukan'";

	if (!$result = $mysqli->query($sql)) {
		// Oh no! The query failed. 
		echo "Sorry, the website is experiencing problems.";

		// Again, do not do this on a public site, but we'll show you how
		// to get the error information
		echo "Error: Our query failed to execute and here is why: \n";
		echo "Query: " . $sql . "\n";
		echo "Errno: " . $mysqli->errno . "\n";
		echo "Error: " . $mysqli->error . "\n";
		header('location:dosen_data_sap_lihat.php?lihat='.$kd_mata_kuliah.'&fail='.$mysqli->errno);
	} else {
		header('location:dosen_data_sap_lihat.php?lihat='.$kd_mata_kuliah.'&success=1');
	}
?>