<?php
	include("config/config.php");
	
	include("_session_dosen.php");
		
	$id_pelaksanaan_perkuliahan = $_POST['id_pelaksanaan_perkuliahan'];
	$kd_mata_kuliah = $_POST['kd_mata_kuliah'];
	$hari_dan_tgl_realisasi1 = $_POST['hari_dan_tgl_realisasi1'];
	$hari_dan_tgl_realisasi2 = $_POST['hari_dan_tgl_realisasi2'];
	$hari_dan_tgl_realisasi3 = $_POST['hari_dan_tgl_realisasi3'];
	$hari_dan_tgl_realisasi4 = $_POST['hari_dan_tgl_realisasi4'];
	$hari_dan_tgl_realisasi5 = $_POST['hari_dan_tgl_realisasi5'];
	$hari_dan_tgl_realisasi6 = $_POST['hari_dan_tgl_realisasi6'];
	$hari_dan_tgl_realisasi7 = $_POST['hari_dan_tgl_realisasi7'];
	$hari_dan_tgl_realisasi8 = $_POST['hari_dan_tgl_realisasi8'];
	$jam_mulai1 = $_POST['jam_mulai1'];
	$jam_mulai2 = $_POST['jam_mulai2'];
	$jam_mulai3 = $_POST['jam_mulai3'];
	$jam_mulai4 = $_POST['jam_mulai4'];
	$jam_mulai5 = $_POST['jam_mulai5'];
	$jam_mulai6 = $_POST['jam_mulai6'];
	$jam_mulai7 = $_POST['jam_mulai7'];
	$jam_mulai8 = $_POST['jam_mulai8'];
	$jam_selesai1 = $_POST['jam_selesai1'];
	$jam_selesai2 = $_POST['jam_selesai2'];
	$jam_selesai3 = $_POST['jam_selesai3'];
	$jam_selesai4 = $_POST['jam_selesai4'];
	$jam_selesai5 = $_POST['jam_selesai5'];
	$jam_selesai6 = $_POST['jam_selesai6'];
	$jam_selesai7 = $_POST['jam_selesai7'];
	$jam_selesai8 = $_POST['jam_selesai8'];
	
	if (isset($_POST['materi_kuliah1_1'])) {
		$materi_kuliah1_1 = $_POST['materi_kuliah1_1'];
	} else {
		$materi_kuliah1_1 = "";
	}
	
	if (isset($_POST['materi_kuliah1_2'])) {
		$materi_kuliah1_2 = $_POST['materi_kuliah1_2'];
	} else {
		$materi_kuliah1_2 = "";
	}
	
	if (isset($_POST['materi_kuliah1_3'])) {
		$materi_kuliah1_3 = $_POST['materi_kuliah1_3'];
	} else {
		$materi_kuliah1_3 = "";
	}
	
	if (isset($_POST['materi_kuliah1_4'])) {
		$materi_kuliah1_4 = $_POST['materi_kuliah1_4'];
	} else {
		$materi_kuliah1_4 = "";
	}
	
	if (isset($_POST['materi_kuliah1_5'])) {
		$materi_kuliah1_5 = $_POST['materi_kuliah1_5'];
	} else {
		$materi_kuliah1_5 = "";
	}
	
	if (isset($_POST['materi_kuliah1_6'])) {
		$materi_kuliah1_6 = $_POST['materi_kuliah1_6'];
	} else {
		$materi_kuliah1_6 = "";
	}
	
	if (isset($_POST['materi_kuliah1_7'])) {
		$materi_kuliah1_7 = $_POST['materi_kuliah1_7'];
	} else {
		$materi_kuliah1_7 = "";
	}
	
	if (isset($_POST['materi_kuliah1_8'])) {
		$materi_kuliah1_8 = $_POST['materi_kuliah1_8'];
	} else {
		$materi_kuliah1_8 = "";
	}
	
	if (isset($_POST['materi_kuliah1_9'])) {
		$materi_kuliah1_9 = $_POST['materi_kuliah1_9'];
	} else {
		$materi_kuliah1_9 = "";
	}
	
	if (isset($_POST['materi_kuliah1_10'])) {
		$materi_kuliah1_10 = $_POST['materi_kuliah1_10'];
	} else {
		$materi_kuliah1_10 = "";
	}
	
	
	if (isset($_POST['materi_kuliah2_1'])) {
		$materi_kuliah2_1 = $_POST['materi_kuliah2_1'];
	} else {
		$materi_kuliah2_1 = "";
	}
	
	if (isset($_POST['materi_kuliah2_2'])) {
		$materi_kuliah2_2 = $_POST['materi_kuliah2_2'];
	} else {
		$materi_kuliah2_2 = "";
	}
	
	if (isset($_POST['materi_kuliah2_3'])) {
		$materi_kuliah2_3 = $_POST['materi_kuliah2_3'];
	} else {
		$materi_kuliah2_3 = "";
	}
	
	if (isset($_POST['materi_kuliah2_4'])) {
		$materi_kuliah2_4 = $_POST['materi_kuliah2_4'];
	} else {
		$materi_kuliah2_4 = "";
	}
	
	if (isset($_POST['materi_kuliah2_5'])) {
		$materi_kuliah2_5 = $_POST['materi_kuliah2_5'];
	} else {
		$materi_kuliah2_5 = "";
	}
	
	if (isset($_POST['materi_kuliah2_6'])) {
		$materi_kuliah2_6 = $_POST['materi_kuliah2_6'];
	} else {
		$materi_kuliah2_6 = "";
	}
	
	if (isset($_POST['materi_kuliah2_7'])) {
		$materi_kuliah2_7 = $_POST['materi_kuliah2_7'];
	} else {
		$materi_kuliah2_7 = "";
	}
	
	if (isset($_POST['materi_kuliah2_8'])) {
		$materi_kuliah2_8 = $_POST['materi_kuliah2_8'];
	} else {
		$materi_kuliah2_8 = "";
	}
	
	if (isset($_POST['materi_kuliah2_9'])) {
		$materi_kuliah2_9 = $_POST['materi_kuliah2_9'];
	} else {
		$materi_kuliah2_9 = "";
	}
	
	if (isset($_POST['materi_kuliah2_10'])) {
		$materi_kuliah2_10 = $_POST['materi_kuliah2_10'];
	} else {
		$materi_kuliah2_10 = "";
	}
	
	
	if (isset($_POST['materi_kuliah3_1'])) {
		$materi_kuliah3_1 = $_POST['materi_kuliah3_1'];
	} else {
		$materi_kuliah3_1 = "";
	}
	
	if (isset($_POST['materi_kuliah3_2'])) {
		$materi_kuliah3_2 = $_POST['materi_kuliah3_2'];
	} else {
		$materi_kuliah3_2 = "";
	}
	
	if (isset($_POST['materi_kuliah3_3'])) {
		$materi_kuliah3_3 = $_POST['materi_kuliah3_3'];
	} else {
		$materi_kuliah3_3 = "";
	}
	
	if (isset($_POST['materi_kuliah3_4'])) {
		$materi_kuliah3_4 = $_POST['materi_kuliah3_4'];
	} else {
		$materi_kuliah3_4 = "";
	}
	
	if (isset($_POST['materi_kuliah3_5'])) {
		$materi_kuliah3_5 = $_POST['materi_kuliah3_5'];
	} else {
		$materi_kuliah3_5 = "";
	}
	
	if (isset($_POST['materi_kuliah3_6'])) {
		$materi_kuliah3_6 = $_POST['materi_kuliah3_6'];
	} else {
		$materi_kuliah3_6 = "";
	}
	
	if (isset($_POST['materi_kuliah3_7'])) {
		$materi_kuliah3_7 = $_POST['materi_kuliah3_7'];
	} else {
		$materi_kuliah3_7 = "";
	}
	
	if (isset($_POST['materi_kuliah3_8'])) {
		$materi_kuliah3_8 = $_POST['materi_kuliah3_8'];
	} else {
		$materi_kuliah3_8 = "";
	}
	
	if (isset($_POST['materi_kuliah3_9'])) {
		$materi_kuliah3_9 = $_POST['materi_kuliah3_9'];
	} else {
		$materi_kuliah3_9 = "";
	}
	
	if (isset($_POST['materi_kuliah3_10'])) {
		$materi_kuliah3_10 = $_POST['materi_kuliah3_10'];
	} else {
		$materi_kuliah3_10 = "";
	}
	
	
	if (isset($_POST['materi_kuliah4_1'])) {
		$materi_kuliah4_1 = $_POST['materi_kuliah4_1'];
	} else {
		$materi_kuliah4_1 = "";
	}
	
	if (isset($_POST['materi_kuliah4_2'])) {
		$materi_kuliah4_2 = $_POST['materi_kuliah4_2'];
	} else {
		$materi_kuliah4_2 = "";
	}
	
	if (isset($_POST['materi_kuliah4_3'])) {
		$materi_kuliah4_3 = $_POST['materi_kuliah4_3'];
	} else {
		$materi_kuliah4_3 = "";
	}
	
	if (isset($_POST['materi_kuliah4_4'])) {
		$materi_kuliah4_4 = $_POST['materi_kuliah4_4'];
	} else {
		$materi_kuliah4_4 = "";
	}
	
	if (isset($_POST['materi_kuliah4_5'])) {
		$materi_kuliah4_5 = $_POST['materi_kuliah4_5'];
	} else {
		$materi_kuliah4_5 = "";
	}
	
	if (isset($_POST['materi_kuliah4_6'])) {
		$materi_kuliah4_6 = $_POST['materi_kuliah4_6'];
	} else {
		$materi_kuliah4_6 = "";
	}
	
	if (isset($_POST['materi_kuliah4_7'])) {
		$materi_kuliah4_7 = $_POST['materi_kuliah4_7'];
	} else {
		$materi_kuliah4_7 = "";
	}
	
	if (isset($_POST['materi_kuliah4_8'])) {
		$materi_kuliah4_8 = $_POST['materi_kuliah4_8'];
	} else {
		$materi_kuliah4_8 = "";
	}
	
	if (isset($_POST['materi_kuliah4_9'])) {
		$materi_kuliah4_9 = $_POST['materi_kuliah4_9'];
	} else {
		$materi_kuliah4_9 = "";
	}
	
	if (isset($_POST['materi_kuliah4_10'])) {
		$materi_kuliah4_10 = $_POST['materi_kuliah4_10'];
	} else {
		$materi_kuliah4_10 = "";
	}
	
	
	if (isset($_POST['materi_kuliah5_1'])) {
		$materi_kuliah5_1 = $_POST['materi_kuliah5_1'];
	} else {
		$materi_kuliah5_1 = "";
	}
	
	if (isset($_POST['materi_kuliah5_2'])) {
		$materi_kuliah5_2 = $_POST['materi_kuliah5_2'];
	} else {
		$materi_kuliah5_2 = "";
	}
	
	if (isset($_POST['materi_kuliah5_3'])) {
		$materi_kuliah5_3 = $_POST['materi_kuliah5_3'];
	} else {
		$materi_kuliah5_3 = "";
	}
	
	if (isset($_POST['materi_kuliah5_4'])) {
		$materi_kuliah5_4 = $_POST['materi_kuliah5_4'];
	} else {
		$materi_kuliah5_4 = "";
	}
	
	if (isset($_POST['materi_kuliah5_5'])) {
		$materi_kuliah5_5 = $_POST['materi_kuliah5_5'];
	} else {
		$materi_kuliah5_5 = "";
	}
	
	if (isset($_POST['materi_kuliah5_6'])) {
		$materi_kuliah5_6 = $_POST['materi_kuliah5_6'];
	} else {
		$materi_kuliah5_6 = "";
	}
	
	if (isset($_POST['materi_kuliah5_7'])) {
		$materi_kuliah5_7 = $_POST['materi_kuliah5_7'];
	} else {
		$materi_kuliah5_7 = "";
	}
	
	if (isset($_POST['materi_kuliah5_8'])) {
		$materi_kuliah5_8 = $_POST['materi_kuliah5_8'];
	} else {
		$materi_kuliah5_8 = "";
	}
	
	if (isset($_POST['materi_kuliah5_9'])) {
		$materi_kuliah5_9 = $_POST['materi_kuliah5_9'];
	} else {
		$materi_kuliah5_9 = "";
	}
	
	if (isset($_POST['materi_kuliah5_10'])) {
		$materi_kuliah5_10 = $_POST['materi_kuliah5_10'];
	} else {
		$materi_kuliah5_10 = "";
	}
	
	
	if (isset($_POST['materi_kuliah6_1'])) {
		$materi_kuliah6_1 = $_POST['materi_kuliah6_1'];
	} else {
		$materi_kuliah6_1 = "";
	}
	
	if (isset($_POST['materi_kuliah6_2'])) {
		$materi_kuliah6_2 = $_POST['materi_kuliah6_2'];
	} else {
		$materi_kuliah6_2 = "";
	}
	
	if (isset($_POST['materi_kuliah6_3'])) {
		$materi_kuliah6_3 = $_POST['materi_kuliah6_3'];
	} else {
		$materi_kuliah6_3 = "";
	}
	
	if (isset($_POST['materi_kuliah6_4'])) {
		$materi_kuliah6_4 = $_POST['materi_kuliah6_4'];
	} else {
		$materi_kuliah6_4 = "";
	}
	
	if (isset($_POST['materi_kuliah6_5'])) {
		$materi_kuliah6_5 = $_POST['materi_kuliah6_5'];
	} else {
		$materi_kuliah6_5 = "";
	}
	
	if (isset($_POST['materi_kuliah6_6'])) {
		$materi_kuliah6_6 = $_POST['materi_kuliah6_6'];
	} else {
		$materi_kuliah6_6 = "";
	}
	
	if (isset($_POST['materi_kuliah6_7'])) {
		$materi_kuliah6_7 = $_POST['materi_kuliah6_7'];
	} else {
		$materi_kuliah6_7 = "";
	}
	
	if (isset($_POST['materi_kuliah6_8'])) {
		$materi_kuliah6_8 = $_POST['materi_kuliah6_8'];
	} else {
		$materi_kuliah6_8 = "";
	}
	
	if (isset($_POST['materi_kuliah6_9'])) {
		$materi_kuliah6_9 = $_POST['materi_kuliah6_9'];
	} else {
		$materi_kuliah6_9 = "";
	}
	
	if (isset($_POST['materi_kuliah6_10'])) {
		$materi_kuliah6_10 = $_POST['materi_kuliah6_10'];
	} else {
		$materi_kuliah6_10 = "";
	}
	
	
	if (isset($_POST['materi_kuliah7_1'])) {
		$materi_kuliah7_1 = $_POST['materi_kuliah7_1'];
	} else {
		$materi_kuliah7_1 = "";
	}
	
	if (isset($_POST['materi_kuliah7_2'])) {
		$materi_kuliah7_2 = $_POST['materi_kuliah7_2'];
	} else {
		$materi_kuliah7_2 = "";
	}
	
	if (isset($_POST['materi_kuliah7_3'])) {
		$materi_kuliah7_3 = $_POST['materi_kuliah7_3'];
	} else {
		$materi_kuliah7_3 = "";
	}
	
	if (isset($_POST['materi_kuliah7_4'])) {
		$materi_kuliah7_4 = $_POST['materi_kuliah7_4'];
	} else {
		$materi_kuliah7_4 = "";
	}
	
	if (isset($_POST['materi_kuliah7_5'])) {
		$materi_kuliah7_5 = $_POST['materi_kuliah7_5'];
	} else {
		$materi_kuliah7_5 = "";
	}
	
	if (isset($_POST['materi_kuliah7_6'])) {
		$materi_kuliah7_6 = $_POST['materi_kuliah7_6'];
	} else {
		$materi_kuliah7_6 = "";
	}
	
	if (isset($_POST['materi_kuliah7_7'])) {
		$materi_kuliah7_7 = $_POST['materi_kuliah7_7'];
	} else {
		$materi_kuliah7_7 = "";
	}
	
	if (isset($_POST['materi_kuliah7_8'])) {
		$materi_kuliah7_8 = $_POST['materi_kuliah7_8'];
	} else {
		$materi_kuliah7_8 = "";
	}
	
	if (isset($_POST['materi_kuliah7_9'])) {
		$materi_kuliah7_9 = $_POST['materi_kuliah7_9'];
	} else {
		$materi_kuliah7_9 = "";
	}
	
	if (isset($_POST['materi_kuliah7_10'])) {
		$materi_kuliah7_10 = $_POST['materi_kuliah7_10'];
	} else {
		$materi_kuliah7_10 = "";
	}
	
	
	if (isset($_POST['materi_kuliah8_1'])) {
		$materi_kuliah8_1 = $_POST['materi_kuliah8_1'];
	} else {
		$materi_kuliah8_1 = "";
	}
	
	if (isset($_POST['materi_kuliah8_2'])) {
		$materi_kuliah8_2 = $_POST['materi_kuliah8_2'];
	} else {
		$materi_kuliah8_2 = "";
	}
	
	if (isset($_POST['materi_kuliah8_3'])) {
		$materi_kuliah8_3 = $_POST['materi_kuliah8_3'];
	} else {
		$materi_kuliah8_3 = "";
	}
	
	if (isset($_POST['materi_kuliah8_4'])) {
		$materi_kuliah8_4 = $_POST['materi_kuliah8_4'];
	} else {
		$materi_kuliah8_4 = "";
	}
	
	if (isset($_POST['materi_kuliah8_5'])) {
		$materi_kuliah8_5 = $_POST['materi_kuliah8_5'];
	} else {
		$materi_kuliah8_5 = "";
	}
	
	if (isset($_POST['materi_kuliah8_6'])) {
		$materi_kuliah8_6 = $_POST['materi_kuliah8_6'];
	} else {
		$materi_kuliah8_6 = "";
	}
	
	if (isset($_POST['materi_kuliah8_7'])) {
		$materi_kuliah8_7 = $_POST['materi_kuliah8_7'];
	} else {
		$materi_kuliah8_7 = "";
	}
	
	if (isset($_POST['materi_kuliah8_8'])) {
		$materi_kuliah8_8 = $_POST['materi_kuliah8_8'];
	} else {
		$materi_kuliah8_8 = "";
	}
	
	if (isset($_POST['materi_kuliah8_9'])) {
		$materi_kuliah8_9 = $_POST['materi_kuliah8_9'];
	} else {
		$materi_kuliah8_9 = "";
	}
	
	if (isset($_POST['materi_kuliah8_10'])) {
		$materi_kuliah8_10 = $_POST['materi_kuliah8_10'];
	} else {
		$materi_kuliah8_10 = "";
	}
	
	$materi_kuliah1 = $materi_kuliah1_1 . ", " . $materi_kuliah1_2 . ", " . $materi_kuliah1_3 . ", " . $materi_kuliah1_4 . ", " . $materi_kuliah1_5 . ", " . $materi_kuliah1_6 . ", " . $materi_kuliah1_7 . ", " . $materi_kuliah1_8 . ", " . $materi_kuliah1_9 . ", " . $materi_kuliah1_10;
	$materi_kuliah2 = $materi_kuliah2_1 . ", " . $materi_kuliah2_2 . ", " . $materi_kuliah2_3 . ", " . $materi_kuliah2_4 . ", " . $materi_kuliah2_5 . ", " . $materi_kuliah2_6 . ", " . $materi_kuliah2_7 . ", " . $materi_kuliah2_8 . ", " . $materi_kuliah2_9 . ", " . $materi_kuliah2_10;
	$materi_kuliah3 = $materi_kuliah3_1 . ", " . $materi_kuliah3_2 . ", " . $materi_kuliah3_3 . ", " . $materi_kuliah3_4 . ", " . $materi_kuliah3_5 . ", " . $materi_kuliah3_6 . ", " . $materi_kuliah3_7 . ", " . $materi_kuliah3_8 . ", " . $materi_kuliah3_9 . ", " . $materi_kuliah3_10;
	$materi_kuliah4 = $materi_kuliah4_1 . ", " . $materi_kuliah4_2 . ", " . $materi_kuliah4_3 . ", " . $materi_kuliah4_4 . ", " . $materi_kuliah4_5 . ", " . $materi_kuliah4_6 . ", " . $materi_kuliah4_7 . ", " . $materi_kuliah4_8 . ", " . $materi_kuliah4_9 . ", " . $materi_kuliah4_10;
	$materi_kuliah5 = $materi_kuliah5_1 . ", " . $materi_kuliah5_2 . ", " . $materi_kuliah5_3 . ", " . $materi_kuliah5_4 . ", " . $materi_kuliah5_5 . ", " . $materi_kuliah5_6 . ", " . $materi_kuliah5_7 . ", " . $materi_kuliah5_8 . ", " . $materi_kuliah5_9 . ", " . $materi_kuliah5_10;
	$materi_kuliah6 = $materi_kuliah6_1 . ", " . $materi_kuliah6_2 . ", " . $materi_kuliah6_3 . ", " . $materi_kuliah6_4 . ", " . $materi_kuliah6_5 . ", " . $materi_kuliah6_6 . ", " . $materi_kuliah6_7 . ", " . $materi_kuliah6_8 . ", " . $materi_kuliah6_9 . ", " . $materi_kuliah6_10;
	$materi_kuliah7 = $materi_kuliah7_1 . ", " . $materi_kuliah7_2 . ", " . $materi_kuliah7_3 . ", " . $materi_kuliah7_4 . ", " . $materi_kuliah7_5 . ", " . $materi_kuliah7_6 . ", " . $materi_kuliah7_7 . ", " . $materi_kuliah7_8 . ", " . $materi_kuliah7_9 . ", " . $materi_kuliah7_10;
	$materi_kuliah8 = $materi_kuliah8_1 . ", " . $materi_kuliah8_2 . ", " . $materi_kuliah8_3 . ", " . $materi_kuliah8_4 . ", " . $materi_kuliah8_5 . ", " . $materi_kuliah8_6 . ", " . $materi_kuliah8_7 . ", " . $materi_kuliah8_8 . ", " . $materi_kuliah8_9 . ", " . $materi_kuliah8_10;
	
	$sign_dosen1 = $_POST['sign_dosen1'];
	$sign_dosen2 = $_POST['sign_dosen2'];
	$sign_dosen3 = $_POST['sign_dosen3'];
	$sign_dosen4 = $_POST['sign_dosen4'];
	$sign_dosen5 = $_POST['sign_dosen5'];
	$sign_dosen6 = $_POST['sign_dosen6'];
	$sign_dosen7 = $_POST['sign_dosen7'];
	$sign_dosen8 = $_POST['sign_dosen8'];
	$sign_mahasiswa1 = $_POST['sign_mahasiswa1'];
	$sign_mahasiswa2 = $_POST['sign_mahasiswa2'];
	$sign_mahasiswa3 = $_POST['sign_mahasiswa3'];
	$sign_mahasiswa4 = $_POST['sign_mahasiswa4'];
	$sign_mahasiswa5 = $_POST['sign_mahasiswa5'];
	$sign_mahasiswa6 = $_POST['sign_mahasiswa6'];
	$sign_mahasiswa7 = $_POST['sign_mahasiswa7'];
	$sign_mahasiswa8 = $_POST['sign_mahasiswa8'];
	$keterangan1 = $_POST['keterangan1'];
	$keterangan2 = $_POST['keterangan2'];
	$keterangan3 = $_POST['keterangan3'];
	$keterangan4 = $_POST['keterangan4'];
	$keterangan5 = $_POST['keterangan5'];
	$keterangan6 = $_POST['keterangan6'];
	$keterangan7 = $_POST['keterangan7'];
	$keterangan8 = $_POST['keterangan8'];
	
	// Perform an SQL query
	$sql = "INSERT INTO pelaksanaan_perkuliahan(id_pelaksanaan_perkuliahan, hari_dan_tgl_realisasi1, hari_dan_tgl_realisasi2, hari_dan_tgl_realisasi3, hari_dan_tgl_realisasi4, hari_dan_tgl_realisasi5, hari_dan_tgl_realisasi6, hari_dan_tgl_realisasi7, hari_dan_tgl_realisasi8, jam_mulai1, jam_mulai2, jam_mulai3, jam_mulai4, jam_mulai5, jam_mulai6, jam_mulai7, jam_mulai8, jam_selesai1, jam_selesai2, jam_selesai3, jam_selesai4, jam_selesai5, jam_selesai6, jam_selesai7, jam_selesai8, materi_kuliah1, materi_kuliah2, materi_kuliah3, materi_kuliah4, materi_kuliah5, materi_kuliah6, materi_kuliah7, materi_kuliah8, sign_dosen1, sign_dosen2, sign_dosen3, sign_dosen4, sign_dosen5, sign_dosen6, sign_dosen7, sign_dosen8, sign_mahasiswa1, sign_mahasiswa2, sign_mahasiswa3, sign_mahasiswa4, sign_mahasiswa5, sign_mahasiswa6, sign_mahasiswa7, sign_mahasiswa8, keterangan1, keterangan2, keterangan3, keterangan4, keterangan5, keterangan6, keterangan7, keterangan8)
			values('$id_pelaksanaan_perkuliahan', '$hari_dan_tgl_realisasi1', '$hari_dan_tgl_realisasi2', '$hari_dan_tgl_realisasi3', '$hari_dan_tgl_realisasi4', '$hari_dan_tgl_realisasi5', '$hari_dan_tgl_realisasi6', '$hari_dan_tgl_realisasi7', '$hari_dan_tgl_realisasi8', '$jam_mulai1', '$jam_mulai2', '$jam_mulai3', '$jam_mulai4', '$jam_mulai5', '$jam_mulai6', '$jam_mulai7', '$jam_mulai8', '$jam_selesai1', '$jam_selesai2', '$jam_selesai3', '$jam_selesai4', '$jam_selesai5', '$jam_selesai6', '$jam_selesai7', '$jam_selesai8', '$materi_kuliah1', '$materi_kuliah2', '$materi_kuliah3', '$materi_kuliah4', '$materi_kuliah5', '$materi_kuliah6', '$materi_kuliah7', '$materi_kuliah8', '$sign_dosen1', '$sign_dosen2', '$sign_dosen3', '$sign_dosen4', '$sign_dosen5', '$sign_dosen6', '$sign_dosen7', '$sign_dosen8', '$sign_mahasiswa1', '$sign_mahasiswa2', '$sign_mahasiswa3', '$sign_mahasiswa4', '$sign_mahasiswa5', '$sign_mahasiswa6', '$sign_mahasiswa7', '$sign_mahasiswa8', '$keterangan1', '$keterangan2', '$keterangan3', '$keterangan4', '$keterangan5', '$keterangan6', '$keterangan7', '$keterangan8')
			ON DUPLICATE KEY UPDATE 
			hari_dan_tgl_realisasi1 = '$hari_dan_tgl_realisasi1',
			hari_dan_tgl_realisasi2 = '$hari_dan_tgl_realisasi2',
			hari_dan_tgl_realisasi3 = '$hari_dan_tgl_realisasi3',
			hari_dan_tgl_realisasi4 = '$hari_dan_tgl_realisasi4',
			hari_dan_tgl_realisasi5 = '$hari_dan_tgl_realisasi5',
			hari_dan_tgl_realisasi6 = '$hari_dan_tgl_realisasi6',
			hari_dan_tgl_realisasi7 = '$hari_dan_tgl_realisasi7',
			hari_dan_tgl_realisasi8 = '$hari_dan_tgl_realisasi8',
			jam_mulai1 = '$jam_mulai1',
			jam_mulai2 = '$jam_mulai2',
			jam_mulai3 = '$jam_mulai3',
			jam_mulai4 = '$jam_mulai4',
			jam_mulai5 = '$jam_mulai5',
			jam_mulai6 = '$jam_mulai6',
			jam_mulai7 = '$jam_mulai7',
			jam_mulai8 = '$jam_mulai8',
			jam_selesai1 = '$jam_selesai1',
			jam_selesai2 = '$jam_selesai2',
			jam_selesai3 = '$jam_selesai3',
			jam_selesai4 = '$jam_selesai4',
			jam_selesai5 = '$jam_selesai5',
			jam_selesai6 = '$jam_selesai6',
			jam_selesai7 = '$jam_selesai7',
			jam_selesai8 = '$jam_selesai8',
			materi_kuliah1 = '$materi_kuliah1',
			materi_kuliah2 = '$materi_kuliah2',
			materi_kuliah3 = '$materi_kuliah3',
			materi_kuliah4 = '$materi_kuliah4',
			materi_kuliah5 = '$materi_kuliah5',
			materi_kuliah6 = '$materi_kuliah6',
			materi_kuliah7 = '$materi_kuliah7',
			materi_kuliah8 = '$materi_kuliah8',
			sign_dosen1 = '$sign_dosen1',
			sign_dosen2 = '$sign_dosen2',
			sign_dosen3 = '$sign_dosen3',
			sign_dosen4 = '$sign_dosen4',
			sign_dosen5 = '$sign_dosen5',
			sign_dosen6 = '$sign_dosen6',
			sign_dosen7 = '$sign_dosen7',
			sign_dosen8 = '$sign_dosen8',
			sign_mahasiswa1 = '$sign_mahasiswa1',
			sign_mahasiswa2 = '$sign_mahasiswa2',
			sign_mahasiswa3 = '$sign_mahasiswa3',
			sign_mahasiswa4 = '$sign_mahasiswa4',
			sign_mahasiswa5 = '$sign_mahasiswa5',
			sign_mahasiswa6 = '$sign_mahasiswa6',
			sign_mahasiswa7 = '$sign_mahasiswa7',
			sign_mahasiswa8 = '$sign_mahasiswa8',
			keterangan1 = '$keterangan1',
			keterangan2 = '$keterangan2',
			keterangan3 = '$keterangan3',
			keterangan4 = '$keterangan4',
			keterangan5 = '$keterangan5',
			keterangan6 = '$keterangan6',
			keterangan7 = '$keterangan7',
			keterangan8 = '$keterangan8'";

	if (!$result = $mysqli->query($sql)) {
		// Oh no! The query failed. 
		echo "Sorry, the website is experiencing problems.";

		// Again, do not do this on a public site, but we'll show you how
		// to get the error information
		echo "Error: Our query failed to execute and here is why: \n";
		echo "Query: " . $sql . "\n";
		echo "Errno: " . $mysqli->errno . "\n";
		echo "Error: " . $mysqli->error . "\n";
		header('location:dosen_data_pelaksanaan_perkuliahan_praktikum_lihat.php?lihat='.$kd_mata_kuliah.'&fail='.$mysqli->errno);
	} else {
		header('location:dosen_data_pelaksanaan_perkuliahan_praktikum_lihat.php?lihat='.$kd_mata_kuliah.'&success=1');
	}
?>