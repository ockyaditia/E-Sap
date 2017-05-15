<!DOCTYPE html>
<?php
	session_start();
	include("_session_dosen.php");
?>
<html lang="en">
  <?php
	include("header.php");
  ?>
  <style>
	.sap td, .sap th {    
		border: 1px solid black;
		text-align: left;
		padding: 10px;
	}

	.sap {
		border-collapse: collapse;
		width: 97%;
		margin:10px;
	}
	
	
	.pel_per td, .pel_per th {    
		text-align: left;
	}

	.pel_per {
		border-collapse: collapse;
		width: 97%;
		margin:5px;
	}
  </style>
  <body>
	<header>		
		<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
			<div class="navigation">
				<?php
					include("menu.php");
				?>
			</div>
		</nav>		
	</header>
	
	<?php
		if (isset($_GET['lihat'])) {
			$kd_mata_kuliah = $_GET['lihat'];
	?>
	
	<div id="breadcrumb">
		<div class="container">	
			<div class="breadcrumb">							
				<li><a href="dosen_data_pelaksanaan_perkuliahan_lihat.php?lihat=<?php echo $kd_mata_kuliah; ?>">Data Pelaksanaan Perkuliahan</a></li>
				<li>Data Pelaksanaan Perkuliahan Teori</li>			
			</div>		
		</div>	
	</div>
	
	<?php
		include("head.php");
	?>
	
	</br>
	</br>
	
	<div class="contact">
		<div class="container">
			<div class="contact-form">
				<?php
					if (isset($_GET['fail'])) {
				?>
					<div class="alert alert-danger" role="alert">
						<center><strong>Gagal Simpan Data!</strong>.</center>
					</div>
				<?php
					}
				?>
			
				<?php
					if (isset($_GET['success']) && $_GET['success'] == 1) {
				?>
					<div class="alerts">
						<div class="alert alert-success" role="alert">
							<center><strong>Sukses Simpan Data!</strong>.</center>
						</div>
					</div>
				<?php
					} else if (isset($_GET['success']) && $_GET['success'] == 2) {
				?>
					<div class="alerts">
						<div class="alert alert-success" role="alert">
							<center><strong>Sukses Ubah Data!</strong>.</center>
						</div>
					</div>
				<?php
					}
				?>
			</div>
		</div>
	</div>
	
	<h4 style="color:#1BBD36;"><center><b>PELAKSANAAN PERKULIAHAN MENJELANG UTS</b></center></h4>
	
	<div class="container" style="color:black;">
		<div class="panel panel-default">
			<?php
				require ("config/config.php");
				$sql = "SELECT * FROM mata_kuliah WHERE kd_mata_kuliah='$kd_mata_kuliah'";
				if (!$result = $mysqli->query($sql)) {
					$message = "Sorry, the website is experiencing problems.";
					echo "<script type='text/javascript'>alert('$message');</script>";
					exit;
				}
				
				while ($data = $result->fetch_assoc()) {
					$nama_mata_kuliah = $data['nama_mata_kuliah'];
					$kd_prodi = $data['kd_prodi'];
					$semester = $data['semester'];
					$tahun_ajaran = $data['tahun_ajaran'];
					$sks_teori = $data['sks_teori'];
					$sks_praktikum = $data['sks_praktikum'];
					$sifat = $data['sifat'];
				}
				
				$sql2 = "SELECT * FROM sap WHERE kd_mata_kuliah='$kd_mata_kuliah'";
				if (!$result2 = $mysqli->query($sql2)) {
					$message2 = "Sorry, the website is experiencing problems.";
					echo "<script type='text/javascript'>alert('$message2');</script>";
					exit;
				}
				
				$nik_koordinator_mata_kuliah = "";
				$silabus_ringkas = "";
				$tiu = "";
				$mk_prasyarat = "";
				$media = "";
				$waktu_kuliah = "";
				$waktu_pr = "";
				$waktu_diskusi_kelompok = "";
				$bobot_UTS = "";
				$bobot_UAS = "";
				$bobot_quiz = "";
				$bobot_tugas = "";
				$bobot_praktikum_dan_keaktifan = "";
				$rujukan = "";
				
				while ($data2 = $result2->fetch_assoc()) {
					$nik_koordinator_mata_kuliah = $data2['nik_koordinator_mata_kuliah'];
					$silabus_ringkas = $data2['silabus_ringkas'];
					$tiu = $data2['tiu'];
					$mk_prasyarat = $data2['mk_prasyarat'];
					$media = $data2['media'];
					$waktu_kuliah = $data2['waktu_kuliah'];
					$waktu_pr = $data2['waktu_pr'];
					$waktu_diskusi_kelompok = $data2['waktu_diskusi_kelompok'];
					$bobot_UTS = $data2['bobot_UTS'];
					$bobot_UAS = $data2['bobot_UAS'];
					$bobot_quiz = $data2['bobot_quiz'];
					$bobot_tugas = $data2['bobot_tugas'];
					$bobot_praktikum_dan_keaktifan = $data2['bobot_praktikum_dan_keaktifan'];
					$rujukan = $data2['rujukan'];
				}
				
				$sql3 = "SELECT * FROM mst_program_studi WHERE kd_prodi='$kd_prodi'";
				if (!$result3 = $mysqli->query($sql3)) {
					$message3 = "Sorry, the website is experiencing problems.";
					echo "<script type='text/javascript'>alert('$message3');</script>";
					exit;
				}
				
				$data3 = $result3->fetch_assoc();
				$nama_prodi = $data3['nama_prodi'];
				
				$id_pelaksanaan_perkuliahan = $kd_mata_kuliah . "-" . $semester . "-TEORI-1";
				
				$sql4 = "SELECT * FROM pelaksanaan_perkuliahan WHERE id_pelaksanaan_perkuliahan='$id_pelaksanaan_perkuliahan'";
				if (!$result4 = $mysqli->query($sql4)) {
					$message4 = "Sorry, the website is experiencing problems.";
					echo "<script type='text/javascript'>alert('$message4');</script>";
					exit;
				}
				
				$kd_ruang = "";
				$nik_tata_usaha = "";
				$hari_perkuliahan = "";
				$jam_perkuliahan = "";
				$hari_dan_tgl_rencana1 = "";
				$hari_dan_tgl_rencana2 = "";
				$hari_dan_tgl_rencana3 = "";
				$hari_dan_tgl_rencana4 = "";
				$hari_dan_tgl_rencana5 = "";
				$hari_dan_tgl_rencana6 = "";
				$hari_dan_tgl_rencana7 = "";
				$hari_dan_tgl_rencana8 = "";
				$hari_dan_tgl_realisasi1 = "";
				$hari_dan_tgl_realisasi2 = "";
				$hari_dan_tgl_realisasi3 = "";
				$hari_dan_tgl_realisasi4 = "";
				$hari_dan_tgl_realisasi5 = "";
				$hari_dan_tgl_realisasi6 = "";
				$hari_dan_tgl_realisasi7 = "";
				$hari_dan_tgl_realisasi8 = "";
				$jam_mulai1 = "";
				$jam_mulai2 = "";
				$jam_mulai3 = "";
				$jam_mulai4 = "";
				$jam_mulai5 = "";
				$jam_mulai6 = "";
				$jam_mulai7 = "";
				$jam_mulai8 = "";
				$jam_selesai1 = "";
				$jam_selesai2 = "";
				$jam_selesai3 = "";
				$jam_selesai4 = "";
				$jam_selesai5 = "";
				$jam_selesai6 = "";
				$jam_selesai7 = "";
				$jam_selesai8 = "";
				$materi_kuliah1 = "";
				$materi_kuliah2 = "";
				$materi_kuliah3 = "";
				$materi_kuliah4 = "";
				$materi_kuliah5 = "";
				$materi_kuliah6 = "";
				$materi_kuliah7 = "";
				$materi_kuliah8 = "";
				$sign_dosen1 = "";
				$sign_dosen2 = "";
				$sign_dosen3 = "";
				$sign_dosen4 = "";
				$sign_dosen5 = "";
				$sign_dosen6 = "";
				$sign_dosen7 = "";
				$sign_dosen8 = "";
				$sign_mahasiswa1 = "";
				$sign_mahasiswa2 = "";
				$sign_mahasiswa3 = "";
				$sign_mahasiswa4 = "";
				$sign_mahasiswa5 = "";
				$sign_mahasiswa6 = "";
				$sign_mahasiswa7 = "";
				$sign_mahasiswa8 = "";
				$sign_tu1 = "";
				$sign_tu2 = "";
				$sign_tu3 = "";
				$sign_tu4 = "";
				$sign_tu5 = "";
				$sign_tu6 = "";
				$sign_tu7 = "";
				$sign_tu8 = "";
				$keterangan1 = "";
				$keterangan2 = "";
				$keterangan3 = "";
				$keterangan4 = "";
				$keterangan5 = "";
				$keterangan6 = "";
				$keterangan7 = "";
				$keterangan8 = "";
				
				while ($data4 = $result4->fetch_assoc()) {
					$kd_ruang = $data4['kd_ruang'];
					$nik_tata_usaha = $data4['nik_tata_usaha'];
					$hari_perkuliahan = $data4['hari_perkuliahan'];
					$jam_perkuliahan = $data4['jam_perkuliahan'];
					$hari_dan_tgl_rencana1 = $data4['hari_dan_tgl_rencana1'];
					$hari_dan_tgl_rencana2 = $data4['hari_dan_tgl_rencana2'];
					$hari_dan_tgl_rencana3 = $data4['hari_dan_tgl_rencana3'];
					$hari_dan_tgl_rencana4 = $data4['hari_dan_tgl_rencana4'];
					$hari_dan_tgl_rencana5 = $data4['hari_dan_tgl_rencana5'];
					$hari_dan_tgl_rencana6 = $data4['hari_dan_tgl_rencana6'];
					$hari_dan_tgl_rencana7 = $data4['hari_dan_tgl_rencana7'];
					$hari_dan_tgl_rencana8 = $data4['hari_dan_tgl_rencana8'];
					$hari_dan_tgl_realisasi1 = $data4['hari_dan_tgl_realisasi1'];
					$hari_dan_tgl_realisasi2 = $data4['hari_dan_tgl_realisasi2'];
					$hari_dan_tgl_realisasi3 = $data4['hari_dan_tgl_realisasi3'];
					$hari_dan_tgl_realisasi4 = $data4['hari_dan_tgl_realisasi4'];
					$hari_dan_tgl_realisasi5 = $data4['hari_dan_tgl_realisasi5'];
					$hari_dan_tgl_realisasi6 = $data4['hari_dan_tgl_realisasi6'];
					$hari_dan_tgl_realisasi7 = $data4['hari_dan_tgl_realisasi7'];
					$hari_dan_tgl_realisasi8 = $data4['hari_dan_tgl_realisasi8'];
					$jam_mulai1 = $data4['jam_mulai1'];
					$jam_mulai2 = $data4['jam_mulai2'];
					$jam_mulai3 = $data4['jam_mulai3'];
					$jam_mulai4 = $data4['jam_mulai4'];
					$jam_mulai5 = $data4['jam_mulai5'];
					$jam_mulai6 = $data4['jam_mulai6'];
					$jam_mulai7 = $data4['jam_mulai7'];
					$jam_mulai8 = $data4['jam_mulai8'];
					$jam_selesai1 = $data4['jam_selesai1'];
					$jam_selesai2 = $data4['jam_selesai2'];
					$jam_selesai3 = $data4['jam_selesai3'];
					$jam_selesai4 = $data4['jam_selesai4'];
					$jam_selesai5 = $data4['jam_selesai5'];
					$jam_selesai6 = $data4['jam_selesai6'];
					$jam_selesai7 = $data4['jam_selesai7'];
					$jam_selesai8 = $data4['jam_selesai8'];
					$materi_kuliah1 = $data4['materi_kuliah1'];
					$materi_kuliah2 = $data4['materi_kuliah2'];
					$materi_kuliah3 = $data4['materi_kuliah3'];
					$materi_kuliah4 = $data4['materi_kuliah4'];
					$materi_kuliah5 = $data4['materi_kuliah5'];
					$materi_kuliah6 = $data4['materi_kuliah6'];
					$materi_kuliah7 = $data4['materi_kuliah7'];
					$materi_kuliah8 = $data4['materi_kuliah8'];
					$sign_dosen1 = $data4['sign_dosen1'];
					$sign_dosen2 = $data4['sign_dosen2'];
					$sign_dosen3 = $data4['sign_dosen3'];
					$sign_dosen4 = $data4['sign_dosen4'];
					$sign_dosen5 = $data4['sign_dosen5'];
					$sign_dosen6 = $data4['sign_dosen6'];
					$sign_dosen7 = $data4['sign_dosen7'];
					$sign_dosen8 = $data4['sign_dosen8'];
					$sign_mahasiswa1 = $data4['sign_mahasiswa1'];
					$sign_mahasiswa2 = $data4['sign_mahasiswa2'];
					$sign_mahasiswa3 = $data4['sign_mahasiswa3'];
					$sign_mahasiswa4 = $data4['sign_mahasiswa4'];
					$sign_mahasiswa5 = $data4['sign_mahasiswa5'];
					$sign_mahasiswa6 = $data4['sign_mahasiswa6'];
					$sign_mahasiswa7 = $data4['sign_mahasiswa7'];
					$sign_mahasiswa8 = $data4['sign_mahasiswa8'];
					$sign_tu1 = $data4['sign_tu1'];
					$sign_tu2 = $data4['sign_tu2'];
					$sign_tu3 = $data4['sign_tu3'];
					$sign_tu4 = $data4['sign_tu4'];
					$sign_tu5 = $data4['sign_tu5'];
					$sign_tu6 = $data4['sign_tu6'];
					$sign_tu7 = $data4['sign_tu7'];
					$sign_tu8 = $data4['sign_tu8'];
					$keterangan1 = $data4['keterangan1'];
					$keterangan2 = $data4['keterangan2'];
					$keterangan3 = $data4['keterangan3'];
					$keterangan4 = $data4['keterangan4'];
					$keterangan5 = $data4['keterangan5'];
					$keterangan6 = $data4['keterangan6'];
					$keterangan7 = $data4['keterangan7'];
					$keterangan8 = $data4['keterangan8'];
				}
				
				$materi_kuliah1__ = explode(", ", $materi_kuliah1);
				$materi_kuliah2__ = explode(", ", $materi_kuliah2);
				$materi_kuliah3__ = explode(", ", $materi_kuliah3);
				$materi_kuliah4__ = explode(", ", $materi_kuliah4);
				$materi_kuliah5__ = explode(", ", $materi_kuliah5);
				$materi_kuliah6__ = explode(", ", $materi_kuliah6);
				$materi_kuliah7__ = explode(", ", $materi_kuliah7);
				$materi_kuliah8__ = explode(", ", $materi_kuliah8);
				
				$materi_kuliah1_ = array("","","","","","","","","","");
						
				for ($i = 0; $i <= 9; $i++) {
					if (isset($materi_kuliah1__[$i])) {
						$materi_kuliah1_[$i] = $materi_kuliah1__[$i];
					} else {
						$materi_kuliah1_[$i] = "";
					}
				}
				
				$materi_kuliah2_ = array("","","","","","","","","","");
				
				for ($i = 0; $i <= 9; $i++) {
					if (isset($materi_kuliah2__[$i])) {
						$materi_kuliah2_[$i] = $materi_kuliah2__[$i];
					} else {
						$materi_kuliah2_[$i] = "";
					}
				}
				
				$materi_kuliah3_ = array("","","","","","","","","","");
				
				for ($i = 0; $i <= 9; $i++) {
					if (isset($materi_kuliah3__[$i])) {
						$materi_kuliah3_[$i] = $materi_kuliah3__[$i];
					} else {
						$materi_kuliah3_[$i] = "";
					}
				}
					
				$materi_kuliah4_ = array("","","","","","","","","","");
				
				for ($i = 0; $i <= 9; $i++) {
					if (isset($materi_kuliah4__[$i])) {
						$materi_kuliah4_[$i] = $materi_kuliah4__[$i];
					} else {
						$materi_kuliah4_[$i] = "";
					}
				}
				
				$materi_kuliah5_ = array("","","","","","","","","","");
				
				for ($i = 0; $i <= 9; $i++) {
					if (isset($materi_kuliah5__[$i])) {
						$materi_kuliah5_[$i] = $materi_kuliah5__[$i];
					} else {
						$materi_kuliah5_[$i] = "";
					}
				}
				
				$materi_kuliah6_ = array("","","","","","","","","","");
				
				for ($i = 0; $i <= 9; $i++) {
					if (isset($materi_kuliah6__[$i])) {
						$materi_kuliah6_[$i] = $materi_kuliah6__[$i];
					} else {
						$materi_kuliah6_[$i] = "";
					}
				}
				
				$materi_kuliah7_ = array("","","","","","","","","","");
				
				for ($i = 0; $i <= 9; $i++) {
					if (isset($materi_kuliah7__[$i])) {
						$materi_kuliah7_[$i] = $materi_kuliah7__[$i];
					} else {
						$materi_kuliah7_[$i] = "";
					}
				}
				
				$materi_kuliah8_ = array("","","","","","","","","","");
				
				for ($i = 0; $i <= 9; $i++) {
					if (isset($materi_kuliah8__[$i])) {
						$materi_kuliah8_[$i] = $materi_kuliah8__[$i];
					} else {
						$materi_kuliah8_[$i] = "";
					}
				}
				
				$sql5 = "SELECT * FROM ruang WHERE kd_ruang='$kd_ruang'";
				if (!$result5 = $mysqli->query($sql5)) {
					$message5 = "Sorry, the website is experiencing problems.";
					echo "<script type='text/javascript'>alert('$message5');</script>";
					exit;
				}
				
				$nama_ruang = "";
				$nik_tata_usaha = "";
				
				$data5 = $result5->fetch_assoc();
				$nama_ruang = $data5['nama_ruang'];
				$nik_tata_usaha = $_SESSION['nik'];
				
				$sql6 = "SELECT * FROM sap WHERE kd_mata_kuliah='$kd_mata_kuliah'";
				if (!$result6 = $mysqli->query($sql6)) {
					$message6 = "Sorry, the website is experiencing problems.";
					echo "<script type='text/javascript'>alert('$message6');</script>";
					exit;
				}
				
				$nik_koordinator_mata_kuliah = "";
				
				$data6 = $result6->fetch_assoc();
				$nik_koordinator_mata_kuliah = $data6['nik_koordinator_mata_kuliah'];
				
				$sql7 = "SELECT * FROM mst_dosen WHERE nik='$nik_koordinator_mata_kuliah'";
				if (!$result7 = $mysqli->query($sql7)) {
					$message7 = "Sorry, the website is experiencing problems.";
					echo "<script type='text/javascript'>alert('$message7');</script>";
					exit;
				}
				
				$nama_dosen = "";
				
				$data7 = $result7->fetch_assoc();
				$nama_dosen = $data7['nama_dosen'];
				
				$jam = explode("-",$jam_perkuliahan);
				
				$sql4 = "SELECT * FROM rincian_materi_kuliah WHERE kd_mata_kuliah='$kd_mata_kuliah'";
				if (!$result4 = $mysqli->query($sql4)) {
					$message4 = "Sorry, the website is experiencing problems.";
					echo "<script type='text/javascript'>alert('$message4');</script>";
					exit;
				}
				
				$sub_topik1 = "";
				$sub_topik2 = "";
				$sub_topik3 = "";
				$sub_topik4 = "";
				$sub_topik5 = "";
				$sub_topik6 = "";
				$sub_topik7 = "";
				$sub_topik8 = "";
				$sub_topik9 = "";
				$sub_topik10 = "";
				$sub_topik11 = "";
				$sub_topik12 = "";
				$sub_topik13 = "";
				$sub_topik14 = "";
				$sub_topik15 = "";
				$sub_topik16 = "";
				
				while ($data4 = $result4->fetch_assoc()) {
					$sub_topik1 = $data4['sub_topik1'];
					$sub_topik2 = $data4['sub_topik2'];
					$sub_topik3 = $data4['sub_topik3'];
					$sub_topik4 = $data4['sub_topik4'];
					$sub_topik5 = $data4['sub_topik5'];
					$sub_topik6 = $data4['sub_topik6'];
					$sub_topik7 = $data4['sub_topik7'];
					$sub_topik8 = $data4['sub_topik8'];
					$sub_topik9 = $data4['sub_topik9'];
					$sub_topik10 = $data4['sub_topik10'];
					$sub_topik11 = $data4['sub_topik11'];
					$sub_topik12 = $data4['sub_topik12'];
					$sub_topik13 = $data4['sub_topik13'];
					$sub_topik14 = $data4['sub_topik14'];
					$sub_topik15 = $data4['sub_topik15'];
					$sub_topik16 = $data4['sub_topik16'];
					
					$sub_topik1__ = explode(", ", $sub_topik1);
					$sub_topik2__ = explode(", ", $sub_topik2);
					$sub_topik3__ = explode(", ", $sub_topik3);
					$sub_topik4__ = explode(", ", $sub_topik4);
					$sub_topik5__ = explode(", ", $sub_topik5);
					$sub_topik6__ = explode(", ", $sub_topik6);
					$sub_topik7__ = explode(", ", $sub_topik7);
					$sub_topik8__ = explode(", ", $sub_topik8);
					$sub_topik9__ = explode(", ", $sub_topik9);
					$sub_topik10__ = explode(", ", $sub_topik10);
					$sub_topik11__ = explode(", ", $sub_topik11);
					$sub_topik12__ = explode(", ", $sub_topik12);
					$sub_topik13__ = explode(", ", $sub_topik13);
					$sub_topik14__ = explode(", ", $sub_topik14);
					$sub_topik15__ = explode(", ", $sub_topik15);
					$sub_topik16__ = explode(", ", $sub_topik16);
					
					$sub_topik1_ = array("","","","","","","","","","");
					
					for ($i = 0; $i <= 9; $i++) {
						if (isset($sub_topik1__[$i])) {
							$sub_topik1_[$i] = $sub_topik1__[$i];
						} else {
							$sub_topik1_[$i] = "";
						}
					}
					
					$sub_topik2_ = array("","","","","","","","","","");
					
					for ($i = 0; $i <= 9; $i++) {
						if (isset($sub_topik2__[$i])) {
							$sub_topik2_[$i] = $sub_topik2__[$i];
						} else {
							$sub_topik2_[$i] = "";
						}
					}
					
					$sub_topik3_ = array("","","","","","","","","","");
					
					for ($i = 0; $i <= 9; $i++) {
						if (isset($sub_topik3__[$i])) {
							$sub_topik3_[$i] = $sub_topik3__[$i];
						} else {
							$sub_topik3_[$i] = "";
						}
					}
						
					$sub_topik4_ = array("","","","","","","","","","");
					
					for ($i = 0; $i <= 9; $i++) {
						if (isset($sub_topik4__[$i])) {
							$sub_topik4_[$i] = $sub_topik4__[$i];
						} else {
							$sub_topik4_[$i] = "";
						}
					}
					
					$sub_topik5_ = array("","","","","","","","","","");
					
					for ($i = 0; $i <= 9; $i++) {
						if (isset($sub_topik5__[$i])) {
							$sub_topik5_[$i] = $sub_topik5__[$i];
						} else {
							$sub_topik5_[$i] = "";
						}
					}
					
					$sub_topik6_ = array("","","","","","","","","","");
					
					for ($i = 0; $i <= 9; $i++) {
						if (isset($sub_topik6__[$i])) {
							$sub_topik6_[$i] = $sub_topik6__[$i];
						} else {
							$sub_topik6_[$i] = "";
						}
					}
					
					$sub_topik7_ = array("","","","","","","","","","");
					
					for ($i = 0; $i <= 9; $i++) {
						if (isset($sub_topik7__[$i])) {
							$sub_topik7_[$i] = $sub_topik7__[$i];
						} else {
							$sub_topik7_[$i] = "";
						}
					}
					
					$sub_topik8_ = array("","","","","","","","","","");
					
					for ($i = 0; $i <= 9; $i++) {
						if (isset($sub_topik8__[$i])) {
							$sub_topik8_[$i] = $sub_topik8__[$i];
						} else {
							$sub_topik8_[$i] = "";
						}
					}
				}
			?>
			<script>
				var materi_kuliah1_ = new Array(10);
				materi_kuliah1_[1] = "<?php echo $materi_kuliah1_[0]; ?>";
				materi_kuliah1_[2] = "<?php echo $materi_kuliah1_[1]; ?>";
				materi_kuliah1_[3] = "<?php echo $materi_kuliah1_[2]; ?>";
				materi_kuliah1_[4] = "<?php echo $materi_kuliah1_[3]; ?>";
				materi_kuliah1_[5] = "<?php echo $materi_kuliah1_[4]; ?>";
				materi_kuliah1_[6] = "<?php echo $materi_kuliah1_[5]; ?>";
				materi_kuliah1_[7] = "<?php echo $materi_kuliah1_[6]; ?>";
				materi_kuliah1_[8] = "<?php echo $materi_kuliah1_[7]; ?>";
				materi_kuliah1_[9] = "<?php echo $materi_kuliah1_[8]; ?>";
				materi_kuliah1_[10] = "<?php echo $materi_kuliah1_[9]; ?>";
				
				var materi_kuliah2_ = new Array(10);
				materi_kuliah2_[1] = "<?php echo $materi_kuliah2_[0]; ?>";
				materi_kuliah2_[2] = "<?php echo $materi_kuliah2_[1]; ?>";
				materi_kuliah2_[3] = "<?php echo $materi_kuliah2_[2]; ?>";
				materi_kuliah2_[4] = "<?php echo $materi_kuliah2_[3]; ?>";
				materi_kuliah2_[5] = "<?php echo $materi_kuliah2_[4]; ?>";
				materi_kuliah2_[6] = "<?php echo $materi_kuliah2_[5]; ?>";
				materi_kuliah2_[7] = "<?php echo $materi_kuliah2_[6]; ?>";
				materi_kuliah2_[8] = "<?php echo $materi_kuliah2_[7]; ?>";
				materi_kuliah2_[9] = "<?php echo $materi_kuliah2_[8]; ?>";
				materi_kuliah2_[10] = "<?php echo $materi_kuliah2_[9]; ?>";
				
				var materi_kuliah3_ = new Array(10);
				materi_kuliah3_[1] = "<?php echo $materi_kuliah3_[0]; ?>";
				materi_kuliah3_[2] = "<?php echo $materi_kuliah3_[1]; ?>";
				materi_kuliah3_[3] = "<?php echo $materi_kuliah3_[2]; ?>";
				materi_kuliah3_[4] = "<?php echo $materi_kuliah3_[3]; ?>";
				materi_kuliah3_[5] = "<?php echo $materi_kuliah3_[4]; ?>";
				materi_kuliah3_[6] = "<?php echo $materi_kuliah3_[5]; ?>";
				materi_kuliah3_[7] = "<?php echo $materi_kuliah3_[6]; ?>";
				materi_kuliah3_[8] = "<?php echo $materi_kuliah3_[7]; ?>";
				materi_kuliah3_[9] = "<?php echo $materi_kuliah3_[8]; ?>";
				materi_kuliah3_[10] = "<?php echo $materi_kuliah3_[9]; ?>";
				
				var materi_kuliah4_ = new Array(10);
				materi_kuliah4_[1] = "<?php echo $materi_kuliah4_[0]; ?>";
				materi_kuliah4_[2] = "<?php echo $materi_kuliah4_[1]; ?>";
				materi_kuliah4_[3] = "<?php echo $materi_kuliah4_[2]; ?>";
				materi_kuliah4_[4] = "<?php echo $materi_kuliah4_[3]; ?>";
				materi_kuliah4_[5] = "<?php echo $materi_kuliah4_[4]; ?>";
				materi_kuliah4_[6] = "<?php echo $materi_kuliah4_[5]; ?>";
				materi_kuliah4_[7] = "<?php echo $materi_kuliah4_[6]; ?>";
				materi_kuliah4_[8] = "<?php echo $materi_kuliah4_[7]; ?>";
				materi_kuliah4_[9] = "<?php echo $materi_kuliah4_[8]; ?>";
				materi_kuliah4_[10] = "<?php echo $materi_kuliah4_[9]; ?>";
				
				var materi_kuliah5_ = new Array(10);
				materi_kuliah5_[1] = "<?php echo $materi_kuliah5_[0]; ?>";
				materi_kuliah5_[2] = "<?php echo $materi_kuliah5_[1]; ?>";
				materi_kuliah5_[3] = "<?php echo $materi_kuliah5_[2]; ?>";
				materi_kuliah5_[4] = "<?php echo $materi_kuliah5_[3]; ?>";
				materi_kuliah5_[5] = "<?php echo $materi_kuliah5_[4]; ?>";
				materi_kuliah5_[6] = "<?php echo $materi_kuliah5_[5]; ?>";
				materi_kuliah5_[7] = "<?php echo $materi_kuliah5_[6]; ?>";
				materi_kuliah5_[8] = "<?php echo $materi_kuliah5_[7]; ?>";
				materi_kuliah5_[9] = "<?php echo $materi_kuliah5_[8]; ?>";
				materi_kuliah5_[10] = "<?php echo $materi_kuliah5_[9]; ?>";
				
				var materi_kuliah6_ = new Array(10);
				materi_kuliah6_[1] = "<?php echo $materi_kuliah6_[0]; ?>";
				materi_kuliah6_[2] = "<?php echo $materi_kuliah6_[1]; ?>";
				materi_kuliah6_[3] = "<?php echo $materi_kuliah6_[2]; ?>";
				materi_kuliah6_[4] = "<?php echo $materi_kuliah6_[3]; ?>";
				materi_kuliah6_[5] = "<?php echo $materi_kuliah6_[4]; ?>";
				materi_kuliah6_[6] = "<?php echo $materi_kuliah6_[5]; ?>";
				materi_kuliah6_[7] = "<?php echo $materi_kuliah6_[6]; ?>";
				materi_kuliah6_[8] = "<?php echo $materi_kuliah6_[7]; ?>";
				materi_kuliah6_[9] = "<?php echo $materi_kuliah6_[8]; ?>";
				materi_kuliah6_[10] = "<?php echo $materi_kuliah6_[9]; ?>";
				
				var materi_kuliah7_ = new Array(10);
				materi_kuliah7_[1] = "<?php echo $materi_kuliah7_[0]; ?>";
				materi_kuliah7_[2] = "<?php echo $materi_kuliah7_[1]; ?>";
				materi_kuliah7_[3] = "<?php echo $materi_kuliah7_[2]; ?>";
				materi_kuliah7_[4] = "<?php echo $materi_kuliah7_[3]; ?>";
				materi_kuliah7_[5] = "<?php echo $materi_kuliah7_[4]; ?>";
				materi_kuliah7_[6] = "<?php echo $materi_kuliah7_[5]; ?>";
				materi_kuliah7_[7] = "<?php echo $materi_kuliah7_[6]; ?>";
				materi_kuliah7_[8] = "<?php echo $materi_kuliah7_[7]; ?>";
				materi_kuliah7_[9] = "<?php echo $materi_kuliah7_[8]; ?>";
				materi_kuliah7_[10] = "<?php echo $materi_kuliah7_[9]; ?>";
				
				var materi_kuliah8_ = new Array(10);
				materi_kuliah8_[1] = "<?php echo $materi_kuliah8_[0]; ?>";
				materi_kuliah8_[2] = "<?php echo $materi_kuliah8_[1]; ?>";
				materi_kuliah8_[3] = "<?php echo $materi_kuliah8_[2]; ?>";
				materi_kuliah8_[4] = "<?php echo $materi_kuliah8_[3]; ?>";
				materi_kuliah8_[5] = "<?php echo $materi_kuliah8_[4]; ?>";
				materi_kuliah8_[6] = "<?php echo $materi_kuliah8_[5]; ?>";
				materi_kuliah8_[7] = "<?php echo $materi_kuliah8_[6]; ?>";
				materi_kuliah8_[8] = "<?php echo $materi_kuliah8_[7]; ?>";
				materi_kuliah8_[9] = "<?php echo $materi_kuliah8_[8]; ?>";
				materi_kuliah8_[10] = "<?php echo $materi_kuliah8_[9]; ?>";
			</script>
			<div>
				<h3 style="margin-left:15px; margin-top:15px;"><b>UNIVERSITAS YARSI<br>FAKULTAS TEKNOLOGI INFORMASI</b></h3>
			</div>
			<br>
			<div align="center">
				<h3 style="text-transform: uppercase;"><b>PEMANTAUAN PELAKSANAAN PERKULIAHAAN<br>
					<?php
						if ($semester % 2 != 0)
							echo "Semester Ganjil ";
						else
							echo "Semester Genap ";
					?>
				Tahun Akademik <?php echo $tahun_ajaran; ?></b></h3>
				
				<form action="dosen_data_pelaksanaan_perkuliahan_teori_kueri_insert.php" method="post" role="form" class="contactForm">
					<input type="hidden" value="<?php echo $id_pelaksanaan_perkuliahan; ?>" name="id_pelaksanaan_perkuliahan" />
					<input type="hidden" value="<?php echo $kd_mata_kuliah; ?>" name="kd_mata_kuliah" />
					<input type="hidden" value="<?php echo $nik_tata_usaha; ?>" name="nik_tata_usaha" />
					<table class="pel_per">
						<tr>
							<th><h4><b>Nama Mata Kuliah</b></h4></th>
							<th><h4><b>&nbsp;:&nbsp;</b></h4></th>
							<th><h4><b><?php echo $nama_mata_kuliah; ?></b></h4></th>
						</tr>
						<tr>
							<th><h4><b>Program Studi / SKS</b></h4></th>
							<th><h4><b>&nbsp;:&nbsp;</b></h4></th>
							<th><h4><b><?php echo $nama_prodi . " / " . $sks_teori; ?></b></h4></th>
						</tr>
						<tr>
							<th><h4><b>Hari / Jam</b></h4></th>
							<th><h4><b>&nbsp;:&nbsp;</b></h4></th>
							<th><h5><b><input type="text" value="<?php echo $hari_perkuliahan; ?>" placeholder="Hari" readonly disabled />
								<input type="text" name="jam_mulai" id="jam_mulai" style="width:150px;" placeholder="Jam Mulai" value="<?php echo $jam[0]; ?>" readonly disabled >
								<input type="text" name="jam_selesai" id="jam_selesai" style="width:150px;" placeholder="Jam Selesai" value="<?php if (isset($jam[1])) echo $jam[1]; ?>" readonly disabled >
							</b></h5></th>
						</tr>
						<tr>
							<th><h4><b>Nama Dosen</b></h4></th>
							<th><h4><b>&nbsp;:&nbsp;</b></h4></th>
							<th><h4><b><?php echo $nama_dosen; ?></b></h4></th>
						</tr>
						<tr>
							<th><h4><b>Ruang</b></h4></th>
							<th><h4><b>&nbsp;:&nbsp;</b></h4></th>
							<th><h5><b>
								<?php
									require ("config/config.php");
									$sql3 = "SELECT * from ruang WHERE kd_prodi='".$_SESSION['kd_prodi']."' AND kd_ruang = '$kd_ruang'";
									
									if (!$result3 = $mysqli->query($sql3)) {
										$message3 = "Sorry, the website is experiencing problems.";
										echo "<script type='text/javascript'>alert('$message3');</script>";
									}
									$data3 = $result3->fetch_assoc();
								?>
								<input type="text" value="<?php echo $data3['nama_ruang']; ?>" placeholder="Ruang" readonly disabled />
							</b></h5></th>
						</tr>
					</table>
					<br>
					
					<table class="sap">
						<tr>
							<th rowspan="2"><center>No. </center></th>
							<th colspan="2"><center>Hari / Tgl </center></th>
							<th rowspan="2"><center>Jam Mulai </center></th>
							<th rowspan="2"><center>Jam Selesai </center></th>
							<th rowspan="2"><center>Materi Kuliah </center></th>
							<th rowspan="2"><center>Paraf Dosen </center></th>
							<th rowspan="2"><center>Paraf MHS </center></th>
							<th rowspan="2"><center>Paraf TU </center></th>
							<th rowspan="2"><center>Ket </center></th>
						</tr>
						<tr>
							<th><center>Rencana </center></th>
							<th><center>Realisasi </center></th>
						</tr>
						<tr>
							<td rowspan="2"><center>1. </center></td>
							<td><center>
								<input type="text" style="width:100px;" placeholder="Pilih Tanggal" name="hari_dan_tgl_rencana1" value="<?php echo $hari_dan_tgl_rencana1; ?>" readonly disabled >
							</center></td>
							<td rowspan="2"><center>
								<input type="text" id="datepicker1" style="width:100px;" placeholder="Pilih Tanggal" name="hari_dan_tgl_realisasi1" value="<?php echo $hari_dan_tgl_realisasi1; ?>">
							</center></td>
							<td rowspan="2"><center>
								<input type="text" name="jam_mulai1" id="jam_mulai1" style="width:80px;" placeholder="Jam Mulai" value="<?php echo $jam_mulai1; ?>">
							</center></td>
							<td rowspan="2"><center>
								<input type="text" name="jam_selesai1" id="jam_selesai1" style="width:80px;" placeholder="Jam Selesai" value="<?php echo $jam_selesai1; ?>">
							</center></td>
							<td rowspan="2" id="materi_kuliah1">
								<div>
									<img src="images/icon_plus.gif" style="cursor:pointer; margin-bottom:2px;" onclick="addMoreRows1(this.form);"/>
									<select class="form-control" name="materi_kuliah1_1" id="materi_kuliah1_1" style="width:250px;">
										<option value="" disabled selected>Pilih Materi Kuliah 1.1</option>
										<?php
											for ($i = 0; $i <= 9; $i++) {
										?>
										<option value="<?php echo $sub_topik1_[$i];?>"
										<?php
											if ($materi_kuliah1_[0] == $sub_topik1_[$i] && $materi_kuliah1_[0] != "") {
												echo ' selected="selected"';
											} 
										?>
										>
										<?php
												echo $sub_topik1_[$i];
										?>
										</option>
										<?php
											}
										?>
									</select>
								</div>
							</center></td>
							<td rowspan="2"><center>
								<input type="checkbox" id="sign_dosen1" name="sign_dosen1" <?php if ($sign_dosen1 == 1) echo " checked"; ?> value="1" />
							</center></td>
							<td rowspan="2"><center>
								<input type="checkbox" id="sign_mahasiswa1" name="sign_mahasiswa1" <?php if ($sign_mahasiswa1 == 1) echo " checked"; ?> value="1" />
							</center></td>
							<td rowspan="2"><center>
								<input type="checkbox" id="sign_tu1" name="sign_tu1" <?php if ($sign_tu1 == 1) echo " checked"; ?> onclick="return false" disabled />
							</center></td>
							<td rowspan="2"><center>
								<textarea class="form-control" name="keterangan1" id="keterangan1"><?php echo $keterangan1; ?></textarea>
							</center></td>
						</tr>
						<tr>
							<td><center> </center></td>
						</tr>
						<tr>
							<td rowspan="2"><center>2. </center></td>
							<td><center>
								<input type="text" style="width:100px;" placeholder="Pilih Tanggal" name="hari_dan_tgl_rencana2" value="<?php echo $hari_dan_tgl_rencana2; ?>" readonly disabled >
							</center></td>
							<td rowspan="2"><center>
								<input type="text" id="datepicker2" style="width:100px;" placeholder="Pilih Tanggal" name="hari_dan_tgl_realisasi2" value="<?php echo $hari_dan_tgl_realisasi2; ?>">
							</center></td>
							<td rowspan="2"><center>
								<input type="text" name="jam_mulai2" id="jam_mulai2" style="width:80px;" placeholder="Jam Mulai" value="<?php echo $jam_mulai2; ?>">
							</center></td>
							<td rowspan="2"><center>
								<input type="text" name="jam_selesai2" id="jam_selesai2" style="width:80px;" placeholder="Jam Selesai" value="<?php echo $jam_selesai2; ?>">
							</center></td>
							<td rowspan="2" id="materi_kuliah2">
								<div>
									<img src="images/icon_plus.gif" style="cursor:pointer; margin-bottom:2px;" onclick="addMoreRows2(this.form);"/>
									<select class="form-control" name="materi_kuliah2_1" id="materi_kuliah2_1" style="width:250px;">
										<option value="" disabled selected>Pilih Materi Kuliah 2.1</option>
										<?php
											for ($i = 0; $i <= 9; $i++) {
										?>
										<option value="<?php echo $sub_topik2_[$i];?>"
										<?php
											if ($materi_kuliah2_[0] == $sub_topik2_[$i] && $materi_kuliah2_[0] != "") {
												echo ' selected="selected"';
											} 
										?>
										>
										<?php
												echo $sub_topik2_[$i];
										?>
										</option>
										<?php
											}
										?>
									</select>
								</div>
							</center></td>
							<td rowspan="2"><center>
								<input type="checkbox" id="sign_dosen2" name="sign_dosen2" <?php if ($sign_dosen2 == 1) echo " checked"; ?> value="1" />
							</center></td>
							<td rowspan="2"><center>
								<input type="checkbox" id="sign_mahasiswa2" name="sign_mahasiswa2" <?php if ($sign_mahasiswa2 == 1) echo " checked"; ?> value="1" />
							</center></td>
							<td rowspan="2"><center>
								<input type="checkbox" id="sign_tu2" name="sign_tu2" <?php if ($sign_tu2 == 1) echo " checked"; ?> onclick="return false" disabled />
							</center></td>
							<td rowspan="2"><center>
								<textarea class="form-control" name="keterangan2" id="keterangan2"><?php echo $keterangan2; ?></textarea>
							</center></td>
						</tr>
						<tr>
							<td><center> </center></td>
						</tr>
						<tr>
							<td rowspan="2"><center>3. </center></td>
							<td><center>
								<input type="text" style="width:100px;" placeholder="Pilih Tanggal" name="hari_dan_tgl_rencana3" value="<?php echo $hari_dan_tgl_rencana3; ?>" readonly disabled >
							</center></td>
							<td rowspan="2"><center>
								<input type="text" id="datepicker3" style="width:100px;" placeholder="Pilih Tanggal" name="hari_dan_tgl_realisasi3" value="<?php echo $hari_dan_tgl_realisasi3; ?>">
							</center></td>
							<td rowspan="2"><center>
								<input type="text" name="jam_mulai3" id="jam_mulai3" style="width:80px;" placeholder="Jam Mulai" value="<?php echo $jam_mulai3; ?>">
							</center></td>
							<td rowspan="2"><center>
								<input type="text" name="jam_selesai3" id="jam_selesai3" style="width:80px;" placeholder="Jam Selesai" value="<?php echo $jam_selesai3; ?>">
							</center></td>
							<td rowspan="2" id="materi_kuliah3">
								<div>
									<img src="images/icon_plus.gif" style="cursor:pointer; margin-bottom:2px;" onclick="addMoreRows3(this.form);"/>
									<select class="form-control" name="materi_kuliah3_1" id="materi_kuliah3_1" style="width:250px;">
										<option value="" disabled selected>Pilih Materi Kuliah 3.1</option>
										<?php
											for ($i = 0; $i <= 9; $i++) {
										?>
										<option value="<?php echo $sub_topik3_[$i];?>"
										<?php
											if ($materi_kuliah3_[0] == $sub_topik3_[$i] && $materi_kuliah3_[0] != "") {
												echo ' selected="selected"';
											} 
										?>
										>
										<?php
												echo $sub_topik3_[$i];
										?>
										</option>
										<?php
											}
										?>
									</select>
								</div>
							</center></td>
							<td rowspan="2"><center>
								<input type="checkbox" id="sign_dosen3" name="sign_dosen3" <?php if ($sign_dosen3 == 1) echo " checked"; ?> value="1" />
							</center></td>
							<td rowspan="2"><center>
								<input type="checkbox" id="sign_mahasiswa3" name="sign_mahasiswa3" <?php if ($sign_mahasiswa3 == 1) echo " checked"; ?> value="1" />
							</center></td>
							<td rowspan="2"><center>
								<input type="checkbox" id="sign_tu3" name="sign_tu3" <?php if ($sign_tu3 == 1) echo " checked"; ?> onclick="return false" disabled />
							</center></td>
							<td rowspan="2"><center>
								<textarea class="form-control" name="keterangan3" id="keterangan3"><?php echo $keterangan3; ?></textarea>
							</center></td>
						</tr>
						<tr>
							<td><center> </center></td>
						</tr>
						<tr>
							<td rowspan="2"><center>4. </center></td>
							<td><center>
								<input type="text" style="width:100px;" placeholder="Pilih Tanggal" name="hari_dan_tgl_rencana4" value="<?php echo $hari_dan_tgl_rencana4; ?>" readonly disabled >
							</center></td>
							<td rowspan="2"><center>
								<input type="text" id="datepicker4" style="width:100px;" placeholder="Pilih Tanggal" name="hari_dan_tgl_realisasi4" value="<?php echo $hari_dan_tgl_realisasi4; ?>">
							</center></td>
							<td rowspan="2"><center>
								<input type="text" name="jam_mulai4" id="jam_mulai4" style="width:80px;" placeholder="Jam Mulai" value="<?php echo $jam_mulai4; ?>">
							</center></td>
							<td rowspan="2"><center>
								<input type="text" name="jam_selesai4" id="jam_selesai4" style="width:80px;" placeholder="Jam Selesai" value="<?php echo $jam_selesai4; ?>">
							</center></td>
							
							<td rowspan="2" id="materi_kuliah4">
								<div>
									<img src="images/icon_plus.gif" style="cursor:pointer; margin-bottom:2px;" onclick="addMoreRows4(this.form);"/>
									<select class="form-control" name="materi_kuliah4_1" id="materi_kuliah4_1" style="width:250px;">
										<option value="" disabled selected>Pilih Materi Kuliah 4.1</option>
										<?php
											for ($i = 0; $i <= 9; $i++) {
										?>
										<option value="<?php echo $sub_topik4_[$i];?>"
										<?php
											if ($materi_kuliah4_[0] == $sub_topik4_[$i] && $materi_kuliah4_[0] != "") {
												echo ' selected="selected"';
											} 
										?>
										>
										<?php
												echo $sub_topik4_[$i];
										?>
										</option>
										<?php
											}
										?>
									</select>
								</div>
							</center></td>
							<td rowspan="2"><center>
								<input type="checkbox" id="sign_dosen4" name="sign_dosen4" <?php if ($sign_dosen4 == 1) echo " checked"; ?> value="1" />
							</center></td>
							<td rowspan="2"><center>
								<input type="checkbox" id="sign_mahasiswa4" name="sign_mahasiswa4" <?php if ($sign_mahasiswa4 == 1) echo " checked"; ?> value="1" />
							</center></td>
							<td rowspan="2"><center>
								<input type="checkbox" id="sign_tu4" name="sign_tu4" <?php if ($sign_tu4 == 1) echo " checked"; ?> onclick="return false" disabled />
							</center></td>
							<td rowspan="2"><center>
								<textarea class="form-control" name="keterangan4" id="keterangan4"><?php echo $keterangan4; ?></textarea>
							</center></td>
						</tr>
						<tr>
							<td><center> </center></td>
						</tr>
						<tr>
							<td rowspan="2"><center>5. </center></td>
							<td><center>
								<input type="text" style="width:100px;" placeholder="Pilih Tanggal" name="hari_dan_tgl_rencana5" value="<?php echo $hari_dan_tgl_rencana5; ?>" readonly disabled >
							</center></td>
							<td rowspan="2"><center>
								<input type="text" id="datepicker5" style="width:100px;" placeholder="Pilih Tanggal" name="hari_dan_tgl_realisasi5" value="<?php echo $hari_dan_tgl_realisasi5; ?>">
							</center></td>
							<td rowspan="2"><center>
								<input type="text" name="jam_mulai5" id="jam_mulai5" style="width:80px;" placeholder="Jam Mulai" value="<?php echo $jam_mulai5; ?>">
							</center></td>
							<td rowspan="2"><center>
								<input type="text" name="jam_selesai5" id="jam_selesai5" style="width:80px;" placeholder="Jam Selesai" value="<?php echo $jam_selesai5; ?>">
							</center></td>
							<td rowspan="2" id="materi_kuliah5">
								<div>
									<img src="images/icon_plus.gif" style="cursor:pointer; margin-bottom:2px;" onclick="addMoreRows5(this.form);"/>
									<select class="form-control" name="materi_kuliah5_1" id="materi_kuliah5_1" style="width:250px;">
										<option value="" disabled selected>Pilih Materi Kuliah 5.1</option>
										<?php
											for ($i = 0; $i <= 9; $i++) {
										?>
										<option value="<?php echo $sub_topik5_[$i];?>"
										<?php
											if ($materi_kuliah5_[0] == $sub_topik5_[$i] && $materi_kuliah5_[0] != "") {
												echo ' selected="selected"';
											} 
										?>
										>
										<?php
												echo $sub_topik5_[$i];
										?>
										</option>
										<?php
											}
										?>
									</select>
								</div>
							</center></td>
							<td rowspan="2"><center>
								<input type="checkbox" id="sign_dosen5" name="sign_dosen5" <?php if ($sign_dosen5 == 1) echo " checked"; ?> value="1" />
							</center></td>
							<td rowspan="2"><center>
								<input type="checkbox" id="sign_mahasiswa5" name="sign_mahasiswa5" <?php if ($sign_mahasiswa5 == 1) echo " checked"; ?> value="1" />
							</center></td>
							<td rowspan="2"><center>
								<input type="checkbox" id="sign_tu5" name="sign_tu5" <?php if ($sign_tu5 == 1) echo " checked"; ?> onclick="return false" disabled />
							</center></td>
							<td rowspan="2"><center>
								<textarea class="form-control" name="keterangan5" id="keterangan5"><?php echo $keterangan5; ?></textarea>
							</center></td>
						</tr>
						<tr>
							<td><center> </center></td>
						</tr>
						<tr>
							<td rowspan="2"><center>6. </center></td>
							<td><center>
								<input type="text" style="width:100px;" placeholder="Pilih Tanggal" name="hari_dan_tgl_rencana6" value="<?php echo $hari_dan_tgl_rencana6; ?>" readonly disabled >
							</center></td>
							<td rowspan="2"><center>
								<input type="text" id="datepicker6" style="width:100px;" placeholder="Pilih Tanggal" name="hari_dan_tgl_realisasi6" value="<?php echo $hari_dan_tgl_realisasi6; ?>">
							</center></td>
							<td rowspan="2"><center>
								<input type="text" name="jam_mulai6" id="jam_mulai6" style="width:80px;" placeholder="Jam Mulai" value="<?php echo $jam_mulai6; ?>">
							</center></td>
							<td rowspan="2"><center>
								<input type="text" name="jam_selesai6" id="jam_selesai6" style="width:80px;" placeholder="Jam Selesai" value="<?php echo $jam_selesai6; ?>">
							</center></td>
							<td rowspan="2" id="materi_kuliah6">
								<div>
									<img src="images/icon_plus.gif" style="cursor:pointer; margin-bottom:2px;" onclick="addMoreRows6(this.form);"/>
									<select class="form-control" name="materi_kuliah6_1" id="materi_kuliah6_1" style="width:250px;">
										<option value="" disabled selected>Pilih Materi Kuliah 6.1</option>
										<?php
											for ($i = 0; $i <= 9; $i++) {
										?>
										<option value="<?php echo $sub_topik6_[$i];?>"
										<?php
											if ($materi_kuliah6_[0] == $sub_topik6_[$i] && $materi_kuliah6_[0] != "") {
												echo ' selected="selected"';
											} 
										?>
										>
										<?php
												echo $sub_topik6_[$i];
										?>
										</option>
										<?php
											}
										?>
									</select>
								</div>
							</center></td>
							<td rowspan="2"><center>
								<input type="checkbox" id="sign_dosen6" name="sign_dosen6" <?php if ($sign_dosen6 == 1) echo " checked"; ?> value="1" />
							</center></td>
							<td rowspan="2"><center>
								<input type="checkbox" id="sign_mahasiswa6" name="sign_mahasiswa6" <?php if ($sign_mahasiswa6 == 1) echo " checked"; ?> value="1" />
							</center></td>
							<td rowspan="2"><center>
								<input type="checkbox" id="sign_tu6" name="sign_tu6" <?php if ($sign_tu6 == 1) echo " checked"; ?> onclick="return false" disabled />
							</center></td>
							<td rowspan="2"><center>
								<textarea class="form-control" name="keterangan6" id="keterangan6"><?php echo $keterangan6; ?></textarea>
							</center></td>
						</tr>
						<tr>
							<td><center> </center></td>
						</tr>
						<tr>
							<td rowspan="2"><center>7. </center></td>
							<td><center>
								<input type="text" style="width:100px;" placeholder="Pilih Tanggal" name="hari_dan_tgl_rencana7" value="<?php echo $hari_dan_tgl_rencana7; ?>" readonly disabled >
							</center></td>
							<td rowspan="2"><center>
								<input type="text" id="datepicker7" style="width:100px;" placeholder="Pilih Tanggal" name="hari_dan_tgl_realisasi7" value="<?php echo $hari_dan_tgl_realisasi7; ?>">
							</center></td>
							<td rowspan="2"><center>
								<input type="text" name="jam_mulai7" id="jam_mulai7" style="width:80px;" placeholder="Jam Mulai" value="<?php echo $jam_mulai7; ?>">
							</center></td>
							<td rowspan="2"><center>
								<input type="text" name="jam_selesai7" id="jam_selesai7" style="width:80px;" placeholder="Jam Selesai" value="<?php echo $jam_selesai7; ?>">
							</center></td>
							<td rowspan="2" id="materi_kuliah7">
								<div>
									<img src="images/icon_plus.gif" style="cursor:pointer; margin-bottom:2px;" onclick="addMoreRows7(this.form);"/>
									<select class="form-control" name="materi_kuliah7_1" id="materi_kuliah7_1" style="width:250px;">
										<option value="" disabled selected>Pilih Materi Kuliah 7.1</option>
										<?php
											for ($i = 0; $i <= 9; $i++) {
										?>
										<option value="<?php echo $sub_topik7_[$i];?>"
										<?php
											if ($materi_kuliah7_[0] == $sub_topik7_[$i] && $materi_kuliah7_[0] != "") {
												echo ' selected="selected"';
											} 
										?>
										>
										<?php
												echo $sub_topik7_[$i];
										?>
										</option>
										<?php
											}
										?>
									</select>
								</div>
							</center></td>
							<td rowspan="2"><center>
								<input type="checkbox" id="sign_dosen7" name="sign_dosen7" <?php if ($sign_dosen7 == 1) echo " checked"; ?> value="1" />
							</center></td>
							<td rowspan="2"><center>
								<input type="checkbox" id="sign_mahasiswa7" name="sign_mahasiswa7" <?php if ($sign_mahasiswa7 == 1) echo " checked"; ?> value="1" />
							</center></td>
							<td rowspan="2"><center>
								<input type="checkbox" id="sign_tu7" name="sign_tu7" <?php if ($sign_tu7 == 1) echo " checked"; ?> onclick="return false" disabled />
							</center></td>
							<td rowspan="2"><center>
								<textarea class="form-control" name="keterangan7" id="keterangan7"><?php echo $keterangan7; ?></textarea>
							</center></td>
						</tr>
						<tr>
							<td><center> </center></td>
						</tr>
						<tr>
							<td rowspan="2"><center>8. </center></td>
							<td><center>
								<input type="text" style="width:100px;" placeholder="Pilih Tanggal" name="hari_dan_tgl_rencana8" value="<?php echo $hari_dan_tgl_rencana8; ?>" readonly disabled >
							</center></td>
							<td rowspan="2"><center>
								<input type="text" id="datepicker8" style="width:100px;" placeholder="Pilih Tanggal" name="hari_dan_tgl_realisasi8" value="<?php echo $hari_dan_tgl_realisasi8; ?>">
							</center></td>
							<td rowspan="2"><center>
								<input type="text" name="jam_mulai8" id="jam_mulai8" style="width:80px;" placeholder="Jam Mulai" value="<?php echo $jam_mulai8; ?>">
							</center></td>
							<td rowspan="2"><center>
								<input type="text" name="jam_selesai8" id="jam_selesai8" style="width:80px;" placeholder="Jam Selesai" value="<?php echo $jam_selesai8; ?>">
							</center></td>
							<td rowspan="2" id="materi_kuliah8">
								<div>
									<img src="images/icon_plus.gif" style="cursor:pointer; margin-bottom:2px;" onclick="addMoreRows8(this.form);"/>
									<select class="form-control" name="materi_kuliah8_1" id="materi_kuliah8_1" style="width:250px;">
										<option value="" disabled selected>Pilih Materi Kuliah 8.1</option>
										<?php
											for ($i = 0; $i <= 9; $i++) {
										?>
										<option value="<?php echo $sub_topik8_[$i];?>"
										<?php
											if ($materi_kuliah8_[0] == $sub_topik8_[$i] && $materi_kuliah8_[0] != "") {
												echo ' selected="selected"';
											} 
										?>
										>
										<?php
												echo $sub_topik8_[$i];
										?>
										</option>
										<?php
											}
										?>
									</select>
								</div>
							</center></td>
							<td rowspan="2"><center>
								<input type="checkbox" id="sign_dosen8" name="sign_dosen8" <?php if ($sign_dosen8== 1) echo " checked"; ?> value="1" />
							</center></td>
							<td rowspan="2"><center>
								<input type="checkbox" id="sign_mahasiswa8" name="sign_mahasiswa8" <?php if ($sign_mahasiswa8 == 1) echo " checked"; ?> value="1" />
							</center></td>
							<td rowspan="2"><center>
								<input type="checkbox" id="sign_tu8" name="sign_tu8" <?php if ($sign_tu8 == 1) echo " checked"; ?> onclick="return false" disabled />
							</center></td>
							<td rowspan="2"><center>
								<textarea class="form-control" name="keterangan8" id="keterangan8"><?php echo $keterangan8; ?></textarea>
							</center></td>
						</tr>
						<tr>
							<td><center> </center></td>
						</tr>
					</table>
					<div class="text-center"><button type="submit" name="submit" class="btn btn-primary btn-lg" required="required">Simpan</button></div>
					</br>
					
					<script type="text/javascript">
						var rowCount1 = 1;
						function addMoreRows1(frm) {
							if (rowCount1 <= 9) {
								rowCount1 ++;
								if (materi_kuliah1_[rowCount1] == "") {
									$data = "Pilih Materi Kuliah 1."+rowCount1;
								} else {
									$data = materi_kuliah1_[rowCount1];
								}
								var recRow = 
								'<div id="rowCount1'+rowCount1+'">'+
									'<img width="21" src="images/delete-icon-md.png" align="right" style="cursor:pointer; margin-bottom:2px; margin-top:2px;" onclick="removeRow1('+rowCount1+');"/>'+
									'<select class="form-control" name="materi_kuliah1_'+rowCount1+'" id="materi_kuliah1_'+rowCount1+'">'+
										'<option value="value="'+materi_kuliah1_[rowCount1]+'"" disabled selected>'+$data+'</option>'+
										'<?php for ($i = 0; $i <= 9; $i++) { ?>'+
										'<option value="<?php echo $sub_topik1_[$i];?>"'+
										'>'+
										'<?php echo $sub_topik1_[$i]; ?>'+
										'</option>'+
										'<?php } ?>'+
									'</select>'+
								'</div>';
								jQuery('#materi_kuliah1').append(recRow);
							}
						}

						function removeRow1(removeNum) {
							jQuery('#rowCount1'+rowCount1).remove();
							rowCount1 --;
						}
					</script>
					
					<script type="text/javascript">
						var rowCount2 = 1;
						function addMoreRows2(frm) {
							if (rowCount2 <= 9) {
								rowCount2 ++;
								if (materi_kuliah2_[rowCount2] == "") {
									$data = "Pilih Materi Kuliah 2."+rowCount2;
								} else {
									$data = materi_kuliah2_[rowCount2];
								}
								var recRow = 
								'<div id="rowCount2'+rowCount2+'">'+
									'<img width="21" src="images/delete-icon-md.png" align="right" style="cursor:pointer; margin-bottom:2px; margin-top:2px;" onclick="removeRow2('+rowCount2+');"/>'+
									'<select class="form-control" name="materi_kuliah2_'+rowCount2+'" id="materi_kuliah2_'+rowCount2+'">'+
										'<option value="value="'+materi_kuliah2_[rowCount2]+'"" disabled selected>'+$data+'</option>'+
										'<?php for ($i = 0; $i <= 9; $i++) { ?>'+
										'<option value="<?php echo $sub_topik2_[$i];?>"'+
										'>'+
										'<?php echo $sub_topik2_[$i]; ?>'+
										'</option>'+
										'<?php } ?>'+
									'</select>'+
								'</div>';
								jQuery('#materi_kuliah2').append(recRow);
							}
						}

						function removeRow2(removeNum) {
							jQuery('#rowCount2'+rowCount2).remove();
							rowCount2 --;
						}
					</script>
					
					<script type="text/javascript">
						var rowCount3 = 1;
						function addMoreRows3(frm) {
							if (rowCount3 <= 9) {
								rowCount3 ++;
								if (materi_kuliah3_[rowCount3] == "") {
									$data = "Pilih Materi Kuliah 3."+rowCount3;
								} else {
									$data = materi_kuliah3_[rowCount3];
								}
								var recRow = 
								'<div id="rowCount3'+rowCount3+'">'+
									'<img width="21" src="images/delete-icon-md.png" align="right" style="cursor:pointer; margin-bottom:2px; margin-top:2px;" onclick="removeRow3('+rowCount3+');"/>'+
									'<select class="form-control" name="materi_kuliah3_'+rowCount3+'" id="materi_kuliah3_'+rowCount3+'">'+
										'<option value="value="'+materi_kuliah3_[rowCount3]+'"" disabled selected>'+$data+'</option>'+
										'<?php for ($i = 0; $i <= 9; $i++) { ?>'+
										'<option value="<?php echo $sub_topik3_[$i];?>"'+
										'>'+
										'<?php echo $sub_topik3_[$i]; ?>'+
										'</option>'+
										'<?php } ?>'+
									'</select>'+
								'</div>';
								jQuery('#materi_kuliah3').append(recRow);
							}
						}

						function removeRow3(removeNum) {
							jQuery('#rowCount3'+rowCount3).remove();
							rowCount3 --;
						}
					</script>
					
					<script type="text/javascript">
						var rowCount4 = 1;
						function addMoreRows4(frm) {
							if (rowCount4 <= 9) {
								rowCount4 ++;
								if (materi_kuliah4_[rowCount4] == "") {
									$data = "Pilih Materi Kuliah 4."+rowCount4;
								} else {
									$data = materi_kuliah4_[rowCount4];
								}
								var recRow = 
								'<div id="rowCount4'+rowCount4+'">'+
									'<img width="21" src="images/delete-icon-md.png" align="right" style="cursor:pointer; margin-bottom:2px; margin-top:2px;" onclick="removeRow4('+rowCount4+');"/>'+
									'<select class="form-control" name="materi_kuliah4_'+rowCount4+'" id="materi_kuliah4_'+rowCount4+'">'+
										'<option value="value="'+materi_kuliah4_[rowCount4]+'"" disabled selected>'+$data+'</option>'+
										'<?php for ($i = 0; $i <= 9; $i++) { ?>'+
										'<option value="<?php echo $sub_topik4_[$i];?>"'+
										'>'+
										'<?php echo $sub_topik4_[$i]; ?>'+
										'</option>'+
										'<?php } ?>'+
									'</select>'+
								'</div>';
								jQuery('#materi_kuliah4').append(recRow);
							}
						}

						function removeRow4(removeNum) {
							jQuery('#rowCount4'+rowCount4).remove();
							rowCount4 --;
						}
					</script>
					
					<script type="text/javascript">
						var rowCount5 = 1;
						function addMoreRows5(frm) {
							if (rowCount5 <= 9) {
								rowCount5 ++;
								if (materi_kuliah5_[rowCount5] == "") {
									$data = "Pilih Materi Kuliah 5."+rowCount5;
								} else {
									$data = materi_kuliah5_[rowCount5];
								}
								var recRow = 
								'<div id="rowCount5'+rowCount5+'">'+
									'<img width="21" src="images/delete-icon-md.png" align="right" style="cursor:pointer; margin-bottom:2px; margin-top:2px;" onclick="removeRow5('+rowCount5+');"/>'+
									'<select class="form-control" name="materi_kuliah5_'+rowCount5+'" id="materi_kuliah5_'+rowCount5+'">'+
										'<option value="value="'+materi_kuliah5_[rowCount5]+'"" disabled selected>'+$data+'</option>'+
										'<?php for ($i = 0; $i <= 9; $i++) { ?>'+
										'<option value="<?php echo $sub_topik5_[$i];?>"'+
										'>'+
										'<?php echo $sub_topik5_[$i]; ?>'+
										'</option>'+
										'<?php } ?>'+
									'</select>'+
								'</div>';
								jQuery('#materi_kuliah5').append(recRow);
							}
						}

						function removeRow5(removeNum) {
							jQuery('#rowCount5'+rowCount5).remove();
							rowCount5 --;
						}
					</script>
					
					<script type="text/javascript">
						var rowCount6 = 1;
						function addMoreRows6(frm) {
							if (rowCount6 <= 9) {
								rowCount6 ++;
								if (materi_kuliah6_[rowCount6] == "") {
									$data = "Pilih Materi Kuliah 6."+rowCount6;
								} else {
									$data = materi_kuliah6_[rowCount6];
								}
								var recRow = 
								'<div id="rowCount6'+rowCount6+'">'+
									'<img width="21" src="images/delete-icon-md.png" align="right" style="cursor:pointer; margin-bottom:2px; margin-top:2px;" onclick="removeRow6('+rowCount6+');"/>'+
									'<select class="form-control" name="materi_kuliah6_'+rowCount6+'" id="materi_kuliah6_'+rowCount6+'">'+
										'<option value="value="'+materi_kuliah6_[rowCount6]+'"" disabled selected>'+$data+'</option>'+
										'<?php for ($i = 0; $i <= 9; $i++) { ?>'+
										'<option value="<?php echo $sub_topik6_[$i];?>"'+
										'>'+
										'<?php echo $sub_topik6_[$i]; ?>'+
										'</option>'+
										'<?php } ?>'+
									'</select>'+
								'</div>';
								jQuery('#materi_kuliah6').append(recRow);
							}
						}

						function removeRow6(removeNum) {
							jQuery('#rowCount6'+rowCount6).remove();
							rowCount6 --;
						}
					</script>
					
					<script type="text/javascript">
						var rowCount7 = 1;
						function addMoreRows7(frm) {
							if (rowCount7 <= 9) {
								rowCount7 ++;
								if (materi_kuliah7_[rowCount7] == "") {
									$data = "Pilih Materi Kuliah 7."+rowCount7;
								} else {
									$data = materi_kuliah7_[rowCount7];
								}
								var recRow = 
								'<div id="rowCount7'+rowCount7+'">'+
									'<img width="21" src="images/delete-icon-md.png" align="right" style="cursor:pointer; margin-bottom:2px; margin-top:2px;" onclick="removeRow7('+rowCount7+');"/>'+
									'<select class="form-control" name="materi_kuliah7_'+rowCount7+'" id="materi_kuliah7_'+rowCount7+'">'+
										'<option value="value="'+materi_kuliah7_[rowCount7]+'"" disabled selected>'+$data+'</option>'+
										'<?php for ($i = 0; $i <= 9; $i++) { ?>'+
										'<option value="<?php echo $sub_topik7_[$i];?>"'+
										'>'+
										'<?php echo $sub_topik7_[$i]; ?>'+
										'</option>'+
										'<?php } ?>'+
									'</select>'+
								'</div>';
								jQuery('#materi_kuliah7').append(recRow);
							}
						}

						function removeRow7(removeNum) {
							jQuery('#rowCount7'+rowCount7).remove();
							rowCount7 --;
						}
					</script>
					
					<script type="text/javascript">
						var rowCount8 = 1;
						function addMoreRows8(frm) {
							if (rowCount8 <= 9) {
								rowCount8 ++;
								if (materi_kuliah8_[rowCount8] == "") {
									$data = "Pilih Materi Kuliah 8."+rowCount8;
								} else {
									$data = materi_kuliah8_[rowCount8];
								}
								var recRow = 
								'<div id="rowCount8'+rowCount8+'">'+
									'<img width="21" src="images/delete-icon-md.png" align="right" style="cursor:pointer; margin-bottom:2px; margin-top:2px;" onclick="removeRow8('+rowCount8+');"/>'+
									'<select class="form-control" name="materi_kuliah8_'+rowCount8+'" id="materi_kuliah8_'+rowCount8+'">'+
										'<option value="value="'+materi_kuliah8_[rowCount8]+'"" disabled selected>'+$data+'</option>'+
										'<?php for ($i = 0; $i <= 9; $i++) { ?>'+
										'<option value="<?php echo $sub_topik8_[$i];?>"'+
										'>'+
										'<?php echo $sub_topik8_[$i]; ?>'+
										'</option>'+
										'<?php } ?>'+
									'</select>'+
								'</div>';
								jQuery('#materi_kuliah8').append(recRow);
							}
						}

						function removeRow8(removeNum) {
							jQuery('#rowCount8'+rowCount8).remove();
							rowCount8 --;
						}
					</script>
				</form>
			</div>
		</div>
	</div>
	
	<br>
	<br>
	<br>
	<br>
	<br>
	
	<h4 style="color:#1BBD36;"><center><b>PELAKSANAAN PERKULIAHAN MENJELANG UAS</b></center></h4>
	
	<div class="container" style="color:black;">
		<div class="panel panel-default">
			<?php
				require ("config/config.php");
				$sql = "SELECT * FROM mata_kuliah WHERE kd_mata_kuliah='$kd_mata_kuliah'";
				if (!$result = $mysqli->query($sql)) {
					$message = "Sorry, the website is experiencing problems.";
					echo "<script type='text/javascript'>alert('$message');</script>";
					exit;
				}
				
				while ($data = $result->fetch_assoc()) {
					$nama_mata_kuliah = $data['nama_mata_kuliah'];
					$kd_prodi = $data['kd_prodi'];
					$semester = $data['semester'];
					$tahun_ajaran = $data['tahun_ajaran'];
					$sks_teori = $data['sks_teori'];
					$sks_praktikum = $data['sks_praktikum'];
					$sifat = $data['sifat'];
				}
				
				$sql2 = "SELECT * FROM sap WHERE kd_mata_kuliah='$kd_mata_kuliah'";
				if (!$result2 = $mysqli->query($sql2)) {
					$message2 = "Sorry, the website is experiencing problems.";
					echo "<script type='text/javascript'>alert('$message2');</script>";
					exit;
				}
				
				$nik_koordinator_mata_kuliah = "";
				$silabus_ringkas = "";
				$tiu = "";
				$mk_prasyarat = "";
				$media = "";
				$waktu_kuliah = "";
				$waktu_pr = "";
				$waktu_diskusi_kelompok = "";
				$bobot_UTS = "";
				$bobot_UAS = "";
				$bobot_quiz = "";
				$bobot_tugas = "";
				$bobot_praktikum_dan_keaktifan = "";
				$rujukan = "";
				
				while ($data2 = $result2->fetch_assoc()) {
					$nik_koordinator_mata_kuliah = $data2['nik_koordinator_mata_kuliah'];
					$silabus_ringkas = $data2['silabus_ringkas'];
					$tiu = $data2['tiu'];
					$mk_prasyarat = $data2['mk_prasyarat'];
					$media = $data2['media'];
					$waktu_kuliah = $data2['waktu_kuliah'];
					$waktu_pr = $data2['waktu_pr'];
					$waktu_diskusi_kelompok = $data2['waktu_diskusi_kelompok'];
					$bobot_UTS = $data2['bobot_UTS'];
					$bobot_UAS = $data2['bobot_UAS'];
					$bobot_quiz = $data2['bobot_quiz'];
					$bobot_tugas = $data2['bobot_tugas'];
					$bobot_praktikum_dan_keaktifan = $data2['bobot_praktikum_dan_keaktifan'];
					$rujukan = $data2['rujukan'];
				}
				
				$sql3 = "SELECT * FROM mst_program_studi WHERE kd_prodi='$kd_prodi'";
				if (!$result3 = $mysqli->query($sql3)) {
					$message3 = "Sorry, the website is experiencing problems.";
					echo "<script type='text/javascript'>alert('$message3');</script>";
					exit;
				}
				
				$data3 = $result3->fetch_assoc();
				$nama_prodi = $data3['nama_prodi'];
				
				$id_pelaksanaan_perkuliahan = $kd_mata_kuliah . "-" . $semester . "-TEORI-2";
				
				$sql4 = "SELECT * FROM pelaksanaan_perkuliahan WHERE id_pelaksanaan_perkuliahan='$id_pelaksanaan_perkuliahan'";
				if (!$result4 = $mysqli->query($sql4)) {
					$message4 = "Sorry, the website is experiencing problems.";
					echo "<script type='text/javascript'>alert('$message4');</script>";
					exit;
				}
				
				$kd_ruang = "";
				$nik_tata_usaha = "";
				$hari_perkuliahan = "";
				$jam_perkuliahan = "";
				$hari_dan_tgl_rencana1 = "";
				$hari_dan_tgl_rencana2 = "";
				$hari_dan_tgl_rencana3 = "";
				$hari_dan_tgl_rencana4 = "";
				$hari_dan_tgl_rencana5 = "";
				$hari_dan_tgl_rencana6 = "";
				$hari_dan_tgl_rencana7 = "";
				$hari_dan_tgl_rencana8 = "";
				$hari_dan_tgl_realisasi1 = "";
				$hari_dan_tgl_realisasi2 = "";
				$hari_dan_tgl_realisasi3 = "";
				$hari_dan_tgl_realisasi4 = "";
				$hari_dan_tgl_realisasi5 = "";
				$hari_dan_tgl_realisasi6 = "";
				$hari_dan_tgl_realisasi7 = "";
				$hari_dan_tgl_realisasi8 = "";
				$jam_mulai1 = "";
				$jam_mulai2 = "";
				$jam_mulai3 = "";
				$jam_mulai4 = "";
				$jam_mulai5 = "";
				$jam_mulai6 = "";
				$jam_mulai7 = "";
				$jam_mulai8 = "";
				$jam_selesai1 = "";
				$jam_selesai2 = "";
				$jam_selesai3 = "";
				$jam_selesai4 = "";
				$jam_selesai5 = "";
				$jam_selesai6 = "";
				$jam_selesai7 = "";
				$jam_selesai8 = "";
				$materi_kuliah1 = "";
				$materi_kuliah2 = "";
				$materi_kuliah3 = "";
				$materi_kuliah4 = "";
				$materi_kuliah5 = "";
				$materi_kuliah6 = "";
				$materi_kuliah7 = "";
				$materi_kuliah8 = "";
				$sign_dosen1 = "";
				$sign_dosen2 = "";
				$sign_dosen3 = "";
				$sign_dosen4 = "";
				$sign_dosen5 = "";
				$sign_dosen6 = "";
				$sign_dosen7 = "";
				$sign_dosen8 = "";
				$sign_mahasiswa1 = "";
				$sign_mahasiswa2 = "";
				$sign_mahasiswa3 = "";
				$sign_mahasiswa4 = "";
				$sign_mahasiswa5 = "";
				$sign_mahasiswa6 = "";
				$sign_mahasiswa7 = "";
				$sign_mahasiswa8 = "";
				$sign_tu1 = "";
				$sign_tu2 = "";
				$sign_tu3 = "";
				$sign_tu4 = "";
				$sign_tu5 = "";
				$sign_tu6 = "";
				$sign_tu7 = "";
				$sign_tu8 = "";
				$keterangan1 = "";
				$keterangan2 = "";
				$keterangan3 = "";
				$keterangan4 = "";
				$keterangan5 = "";
				$keterangan6 = "";
				$keterangan7 = "";
				$keterangan8 = "";
				
				while ($data4 = $result4->fetch_assoc()) {
					$kd_ruang = $data4['kd_ruang'];
					$nik_tata_usaha = $data4['nik_tata_usaha'];
					$hari_perkuliahan = $data4['hari_perkuliahan'];
					$jam_perkuliahan = $data4['jam_perkuliahan'];
					$hari_dan_tgl_rencana1 = $data4['hari_dan_tgl_rencana1'];
					$hari_dan_tgl_rencana2 = $data4['hari_dan_tgl_rencana2'];
					$hari_dan_tgl_rencana3 = $data4['hari_dan_tgl_rencana3'];
					$hari_dan_tgl_rencana4 = $data4['hari_dan_tgl_rencana4'];
					$hari_dan_tgl_rencana5 = $data4['hari_dan_tgl_rencana5'];
					$hari_dan_tgl_rencana6 = $data4['hari_dan_tgl_rencana6'];
					$hari_dan_tgl_rencana7 = $data4['hari_dan_tgl_rencana7'];
					$hari_dan_tgl_rencana8 = $data4['hari_dan_tgl_rencana8'];
					$hari_dan_tgl_realisasi1 = $data4['hari_dan_tgl_realisasi1'];
					$hari_dan_tgl_realisasi2 = $data4['hari_dan_tgl_realisasi2'];
					$hari_dan_tgl_realisasi3 = $data4['hari_dan_tgl_realisasi3'];
					$hari_dan_tgl_realisasi4 = $data4['hari_dan_tgl_realisasi4'];
					$hari_dan_tgl_realisasi5 = $data4['hari_dan_tgl_realisasi5'];
					$hari_dan_tgl_realisasi6 = $data4['hari_dan_tgl_realisasi6'];
					$hari_dan_tgl_realisasi7 = $data4['hari_dan_tgl_realisasi7'];
					$hari_dan_tgl_realisasi8 = $data4['hari_dan_tgl_realisasi8'];
					$jam_mulai1 = $data4['jam_mulai1'];
					$jam_mulai2 = $data4['jam_mulai2'];
					$jam_mulai3 = $data4['jam_mulai3'];
					$jam_mulai4 = $data4['jam_mulai4'];
					$jam_mulai5 = $data4['jam_mulai5'];
					$jam_mulai6 = $data4['jam_mulai6'];
					$jam_mulai7 = $data4['jam_mulai7'];
					$jam_mulai8 = $data4['jam_mulai8'];
					$jam_selesai1 = $data4['jam_selesai1'];
					$jam_selesai2 = $data4['jam_selesai2'];
					$jam_selesai3 = $data4['jam_selesai3'];
					$jam_selesai4 = $data4['jam_selesai4'];
					$jam_selesai5 = $data4['jam_selesai5'];
					$jam_selesai6 = $data4['jam_selesai6'];
					$jam_selesai7 = $data4['jam_selesai7'];
					$jam_selesai8 = $data4['jam_selesai8'];
					$materi_kuliah1 = $data4['materi_kuliah1'];
					$materi_kuliah2 = $data4['materi_kuliah2'];
					$materi_kuliah3 = $data4['materi_kuliah3'];
					$materi_kuliah4 = $data4['materi_kuliah4'];
					$materi_kuliah5 = $data4['materi_kuliah5'];
					$materi_kuliah6 = $data4['materi_kuliah6'];
					$materi_kuliah7 = $data4['materi_kuliah7'];
					$materi_kuliah8 = $data4['materi_kuliah8'];
					$sign_dosen1 = $data4['sign_dosen1'];
					$sign_dosen2 = $data4['sign_dosen2'];
					$sign_dosen3 = $data4['sign_dosen3'];
					$sign_dosen4 = $data4['sign_dosen4'];
					$sign_dosen5 = $data4['sign_dosen5'];
					$sign_dosen6 = $data4['sign_dosen6'];
					$sign_dosen7 = $data4['sign_dosen7'];
					$sign_dosen8 = $data4['sign_dosen8'];
					$sign_mahasiswa1 = $data4['sign_mahasiswa1'];
					$sign_mahasiswa2 = $data4['sign_mahasiswa2'];
					$sign_mahasiswa3 = $data4['sign_mahasiswa3'];
					$sign_mahasiswa4 = $data4['sign_mahasiswa4'];
					$sign_mahasiswa5 = $data4['sign_mahasiswa5'];
					$sign_mahasiswa6 = $data4['sign_mahasiswa6'];
					$sign_mahasiswa7 = $data4['sign_mahasiswa7'];
					$sign_mahasiswa8 = $data4['sign_mahasiswa8'];
					$sign_tu1 = $data4['sign_tu1'];
					$sign_tu2 = $data4['sign_tu2'];
					$sign_tu3 = $data4['sign_tu3'];
					$sign_tu4 = $data4['sign_tu4'];
					$sign_tu5 = $data4['sign_tu5'];
					$sign_tu6 = $data4['sign_tu6'];
					$sign_tu7 = $data4['sign_tu7'];
					$sign_tu8 = $data4['sign_tu8'];
					$keterangan1 = $data4['keterangan1'];
					$keterangan2 = $data4['keterangan2'];
					$keterangan3 = $data4['keterangan3'];
					$keterangan4 = $data4['keterangan4'];
					$keterangan5 = $data4['keterangan5'];
					$keterangan6 = $data4['keterangan6'];
					$keterangan7 = $data4['keterangan7'];
					$keterangan8 = $data4['keterangan8'];
				}
				
				$materi_kuliah1__ = explode(", ", $materi_kuliah1);
				$materi_kuliah2__ = explode(", ", $materi_kuliah2);
				$materi_kuliah3__ = explode(", ", $materi_kuliah3);
				$materi_kuliah4__ = explode(", ", $materi_kuliah4);
				$materi_kuliah5__ = explode(", ", $materi_kuliah5);
				$materi_kuliah6__ = explode(", ", $materi_kuliah6);
				$materi_kuliah7__ = explode(", ", $materi_kuliah7);
				$materi_kuliah8__ = explode(", ", $materi_kuliah8);
				
				$materi_kuliah1_ = array("","","","","","","","","","");
						
				for ($i = 0; $i <= 9; $i++) {
					if (isset($materi_kuliah1__[$i])) {
						$materi_kuliah1_[$i] = $materi_kuliah1__[$i];
					} else {
						$materi_kuliah1_[$i] = "";
					}
				}
				
				$materi_kuliah2_ = array("","","","","","","","","","");
				
				for ($i = 0; $i <= 9; $i++) {
					if (isset($materi_kuliah2__[$i])) {
						$materi_kuliah2_[$i] = $materi_kuliah2__[$i];
					} else {
						$materi_kuliah2_[$i] = "";
					}
				}
				
				$materi_kuliah3_ = array("","","","","","","","","","");
				
				for ($i = 0; $i <= 9; $i++) {
					if (isset($materi_kuliah3__[$i])) {
						$materi_kuliah3_[$i] = $materi_kuliah3__[$i];
					} else {
						$materi_kuliah3_[$i] = "";
					}
				}
					
				$materi_kuliah4_ = array("","","","","","","","","","");
				
				for ($i = 0; $i <= 9; $i++) {
					if (isset($materi_kuliah4__[$i])) {
						$materi_kuliah4_[$i] = $materi_kuliah4__[$i];
					} else {
						$materi_kuliah4_[$i] = "";
					}
				}
				
				$materi_kuliah5_ = array("","","","","","","","","","");
				
				for ($i = 0; $i <= 9; $i++) {
					if (isset($materi_kuliah5__[$i])) {
						$materi_kuliah5_[$i] = $materi_kuliah5__[$i];
					} else {
						$materi_kuliah5_[$i] = "";
					}
				}
				
				$materi_kuliah6_ = array("","","","","","","","","","");
				
				for ($i = 0; $i <= 9; $i++) {
					if (isset($materi_kuliah6__[$i])) {
						$materi_kuliah6_[$i] = $materi_kuliah6__[$i];
					} else {
						$materi_kuliah6_[$i] = "";
					}
				}
				
				$materi_kuliah7_ = array("","","","","","","","","","");
				
				for ($i = 0; $i <= 9; $i++) {
					if (isset($materi_kuliah7__[$i])) {
						$materi_kuliah7_[$i] = $materi_kuliah7__[$i];
					} else {
						$materi_kuliah7_[$i] = "";
					}
				}
				
				$materi_kuliah8_ = array("","","","","","","","","","");
				
				for ($i = 0; $i <= 9; $i++) {
					if (isset($materi_kuliah8__[$i])) {
						$materi_kuliah8_[$i] = $materi_kuliah8__[$i];
					} else {
						$materi_kuliah8_[$i] = "";
					}
				}
				
				$sql5 = "SELECT * FROM ruang WHERE kd_ruang='$kd_ruang'";
				if (!$result5 = $mysqli->query($sql5)) {
					$message5 = "Sorry, the website is experiencing problems.";
					echo "<script type='text/javascript'>alert('$message5');</script>";
					exit;
				}
				
				$nama_ruang = "";
				$nik_tata_usaha = "";
				
				$data5 = $result5->fetch_assoc();
				$nama_ruang = $data5['nama_ruang'];
				$nik_tata_usaha = $_SESSION['nik'];
				
				$sql6 = "SELECT * FROM sap WHERE kd_mata_kuliah='$kd_mata_kuliah'";
				if (!$result6 = $mysqli->query($sql6)) {
					$message6 = "Sorry, the website is experiencing problems.";
					echo "<script type='text/javascript'>alert('$message6');</script>";
					exit;
				}
				
				$nik_koordinator_mata_kuliah = "";
				
				$data6 = $result6->fetch_assoc();
				$nik_koordinator_mata_kuliah = $data6['nik_koordinator_mata_kuliah'];
				
				$sql7 = "SELECT * FROM mst_dosen WHERE nik='$nik_koordinator_mata_kuliah'";
				if (!$result7 = $mysqli->query($sql7)) {
					$message7 = "Sorry, the website is experiencing problems.";
					echo "<script type='text/javascript'>alert('$message7');</script>";
					exit;
				}
				
				$nama_dosen = "";
				
				$data7 = $result7->fetch_assoc();
				$nama_dosen = $data7['nama_dosen'];
				
				$jam = explode("-",$jam_perkuliahan);
				
				$sql4 = "SELECT * FROM rincian_materi_kuliah WHERE kd_mata_kuliah='$kd_mata_kuliah'";
				if (!$result4 = $mysqli->query($sql4)) {
					$message4 = "Sorry, the website is experiencing problems.";
					echo "<script type='text/javascript'>alert('$message4');</script>";
					exit;
				}
				
				$sub_topik1 = "";
				$sub_topik2 = "";
				$sub_topik3 = "";
				$sub_topik4 = "";
				$sub_topik5 = "";
				$sub_topik6 = "";
				$sub_topik7 = "";
				$sub_topik8 = "";
				$sub_topik9 = "";
				$sub_topik10 = "";
				$sub_topik11 = "";
				$sub_topik12 = "";
				$sub_topik13 = "";
				$sub_topik14 = "";
				$sub_topik15 = "";
				$sub_topik16 = "";
				
				while ($data4 = $result4->fetch_assoc()) {
					$sub_topik1 = $data4['sub_topik1'];
					$sub_topik2 = $data4['sub_topik2'];
					$sub_topik3 = $data4['sub_topik3'];
					$sub_topik4 = $data4['sub_topik4'];
					$sub_topik5 = $data4['sub_topik5'];
					$sub_topik6 = $data4['sub_topik6'];
					$sub_topik7 = $data4['sub_topik7'];
					$sub_topik8 = $data4['sub_topik8'];
					$sub_topik9 = $data4['sub_topik9'];
					$sub_topik10 = $data4['sub_topik10'];
					$sub_topik11 = $data4['sub_topik11'];
					$sub_topik12 = $data4['sub_topik12'];
					$sub_topik13 = $data4['sub_topik13'];
					$sub_topik14 = $data4['sub_topik14'];
					$sub_topik15 = $data4['sub_topik15'];
					$sub_topik16 = $data4['sub_topik16'];
					
					$sub_topik1__ = explode(", ", $sub_topik1);
					$sub_topik2__ = explode(", ", $sub_topik2);
					$sub_topik3__ = explode(", ", $sub_topik3);
					$sub_topik4__ = explode(", ", $sub_topik4);
					$sub_topik5__ = explode(", ", $sub_topik5);
					$sub_topik6__ = explode(", ", $sub_topik6);
					$sub_topik7__ = explode(", ", $sub_topik7);
					$sub_topik8__ = explode(", ", $sub_topik8);
					$sub_topik9__ = explode(", ", $sub_topik9);
					$sub_topik10__ = explode(", ", $sub_topik10);
					$sub_topik11__ = explode(", ", $sub_topik11);
					$sub_topik12__ = explode(", ", $sub_topik12);
					$sub_topik13__ = explode(", ", $sub_topik13);
					$sub_topik14__ = explode(", ", $sub_topik14);
					$sub_topik15__ = explode(", ", $sub_topik15);
					$sub_topik16__ = explode(", ", $sub_topik16);
					
					$sub_topik9_ = array("","","","","","","","","","");
					
					for ($i = 0; $i <= 9; $i++) {
						if (isset($sub_topik9__[$i])) {
							$sub_topik9_[$i] = $sub_topik9__[$i];
						} else {
							$sub_topik9_[$i] = "";
						}
					}
					
					$sub_topik10_ = array("","","","","","","","","","");
					
					for ($i = 0; $i <= 9; $i++) {
						if (isset($sub_topik10__[$i])) {
							$sub_topik10_[$i] = $sub_topik10__[$i];
						} else {
							$sub_topik10_[$i] = "";
						}
					}
					
					$sub_topik11_ = array("","","","","","","","","","");
					
					for ($i = 0; $i <= 9; $i++) {
						if (isset($sub_topik11__[$i])) {
							$sub_topik11_[$i] = $sub_topik11__[$i];
						} else {
							$sub_topik11_[$i] = "";
						}
					}
					
					$sub_topik12_ = array("","","","","","","","","","");
					
					for ($i = 0; $i <= 9; $i++) {
						if (isset($sub_topik12__[$i])) {
							$sub_topik12_[$i] = $sub_topik12__[$i];
						} else {
							$sub_topik12_[$i] = "";
						}
					}
					
					$sub_topik13_ = array("","","","","","","","","","");
					
					for ($i = 0; $i <= 9; $i++) {
						if (isset($sub_topik13__[$i])) {
							$sub_topik13_[$i] = $sub_topik13__[$i];
						} else {
							$sub_topik13_[$i] = "";
						}
					}
					
					$sub_topik14_ = array("","","","","","","","","","");
					
					for ($i = 0; $i <= 9; $i++) {
						if (isset($sub_topik14__[$i])) {
							$sub_topik14_[$i] = $sub_topik14__[$i];
						} else {
							$sub_topik14_[$i] = "";
						}
					}
					
					$sub_topik15_ = array("","","","","","","","","","");
					
					for ($i = 0; $i <= 9; $i++) {
						if (isset($sub_topik15__[$i])) {
							$sub_topik15_[$i] = $sub_topik15__[$i];
						} else {
							$sub_topik15_[$i] = "";
						}
					}
					
					$sub_topik16_ = array("","","","","","","","","","");
					
					for ($i = 0; $i <= 9; $i++) {
						if (isset($sub_topik16__[$i])) {
							$sub_topik16_[$i] = $sub_topik16__[$i];
						} else {
							$sub_topik16_[$i] = "";
						}
					}
				}
			?>
			<script>
				var materi_kuliah1_ = new Array(10);
				materi_kuliah1_[1] = "<?php echo $materi_kuliah1_[0]; ?>";
				materi_kuliah1_[2] = "<?php echo $materi_kuliah1_[1]; ?>";
				materi_kuliah1_[3] = "<?php echo $materi_kuliah1_[2]; ?>";
				materi_kuliah1_[4] = "<?php echo $materi_kuliah1_[3]; ?>";
				materi_kuliah1_[5] = "<?php echo $materi_kuliah1_[4]; ?>";
				materi_kuliah1_[6] = "<?php echo $materi_kuliah1_[5]; ?>";
				materi_kuliah1_[7] = "<?php echo $materi_kuliah1_[6]; ?>";
				materi_kuliah1_[8] = "<?php echo $materi_kuliah1_[7]; ?>";
				materi_kuliah1_[9] = "<?php echo $materi_kuliah1_[8]; ?>";
				materi_kuliah1_[10] = "<?php echo $materi_kuliah1_[9]; ?>";
				
				var materi_kuliah2_ = new Array(10);
				materi_kuliah2_[1] = "<?php echo $materi_kuliah2_[0]; ?>";
				materi_kuliah2_[2] = "<?php echo $materi_kuliah2_[1]; ?>";
				materi_kuliah2_[3] = "<?php echo $materi_kuliah2_[2]; ?>";
				materi_kuliah2_[4] = "<?php echo $materi_kuliah2_[3]; ?>";
				materi_kuliah2_[5] = "<?php echo $materi_kuliah2_[4]; ?>";
				materi_kuliah2_[6] = "<?php echo $materi_kuliah2_[5]; ?>";
				materi_kuliah2_[7] = "<?php echo $materi_kuliah2_[6]; ?>";
				materi_kuliah2_[8] = "<?php echo $materi_kuliah2_[7]; ?>";
				materi_kuliah2_[9] = "<?php echo $materi_kuliah2_[8]; ?>";
				materi_kuliah2_[10] = "<?php echo $materi_kuliah2_[9]; ?>";
				
				var materi_kuliah3_ = new Array(10);
				materi_kuliah3_[1] = "<?php echo $materi_kuliah3_[0]; ?>";
				materi_kuliah3_[2] = "<?php echo $materi_kuliah3_[1]; ?>";
				materi_kuliah3_[3] = "<?php echo $materi_kuliah3_[2]; ?>";
				materi_kuliah3_[4] = "<?php echo $materi_kuliah3_[3]; ?>";
				materi_kuliah3_[5] = "<?php echo $materi_kuliah3_[4]; ?>";
				materi_kuliah3_[6] = "<?php echo $materi_kuliah3_[5]; ?>";
				materi_kuliah3_[7] = "<?php echo $materi_kuliah3_[6]; ?>";
				materi_kuliah3_[8] = "<?php echo $materi_kuliah3_[7]; ?>";
				materi_kuliah3_[9] = "<?php echo $materi_kuliah3_[8]; ?>";
				materi_kuliah3_[10] = "<?php echo $materi_kuliah3_[9]; ?>";
				
				var materi_kuliah4_ = new Array(10);
				materi_kuliah4_[1] = "<?php echo $materi_kuliah4_[0]; ?>";
				materi_kuliah4_[2] = "<?php echo $materi_kuliah4_[1]; ?>";
				materi_kuliah4_[3] = "<?php echo $materi_kuliah4_[2]; ?>";
				materi_kuliah4_[4] = "<?php echo $materi_kuliah4_[3]; ?>";
				materi_kuliah4_[5] = "<?php echo $materi_kuliah4_[4]; ?>";
				materi_kuliah4_[6] = "<?php echo $materi_kuliah4_[5]; ?>";
				materi_kuliah4_[7] = "<?php echo $materi_kuliah4_[6]; ?>";
				materi_kuliah4_[8] = "<?php echo $materi_kuliah4_[7]; ?>";
				materi_kuliah4_[9] = "<?php echo $materi_kuliah4_[8]; ?>";
				materi_kuliah4_[10] = "<?php echo $materi_kuliah4_[9]; ?>";
				
				var materi_kuliah5_ = new Array(10);
				materi_kuliah5_[1] = "<?php echo $materi_kuliah5_[0]; ?>";
				materi_kuliah5_[2] = "<?php echo $materi_kuliah5_[1]; ?>";
				materi_kuliah5_[3] = "<?php echo $materi_kuliah5_[2]; ?>";
				materi_kuliah5_[4] = "<?php echo $materi_kuliah5_[3]; ?>";
				materi_kuliah5_[5] = "<?php echo $materi_kuliah5_[4]; ?>";
				materi_kuliah5_[6] = "<?php echo $materi_kuliah5_[5]; ?>";
				materi_kuliah5_[7] = "<?php echo $materi_kuliah5_[6]; ?>";
				materi_kuliah5_[8] = "<?php echo $materi_kuliah5_[7]; ?>";
				materi_kuliah5_[9] = "<?php echo $materi_kuliah5_[8]; ?>";
				materi_kuliah5_[10] = "<?php echo $materi_kuliah5_[9]; ?>";
				
				var materi_kuliah6_ = new Array(10);
				materi_kuliah6_[1] = "<?php echo $materi_kuliah6_[0]; ?>";
				materi_kuliah6_[2] = "<?php echo $materi_kuliah6_[1]; ?>";
				materi_kuliah6_[3] = "<?php echo $materi_kuliah6_[2]; ?>";
				materi_kuliah6_[4] = "<?php echo $materi_kuliah6_[3]; ?>";
				materi_kuliah6_[5] = "<?php echo $materi_kuliah6_[4]; ?>";
				materi_kuliah6_[6] = "<?php echo $materi_kuliah6_[5]; ?>";
				materi_kuliah6_[7] = "<?php echo $materi_kuliah6_[6]; ?>";
				materi_kuliah6_[8] = "<?php echo $materi_kuliah6_[7]; ?>";
				materi_kuliah6_[9] = "<?php echo $materi_kuliah6_[8]; ?>";
				materi_kuliah6_[10] = "<?php echo $materi_kuliah6_[9]; ?>";
				
				var materi_kuliah7_ = new Array(10);
				materi_kuliah7_[1] = "<?php echo $materi_kuliah7_[0]; ?>";
				materi_kuliah7_[2] = "<?php echo $materi_kuliah7_[1]; ?>";
				materi_kuliah7_[3] = "<?php echo $materi_kuliah7_[2]; ?>";
				materi_kuliah7_[4] = "<?php echo $materi_kuliah7_[3]; ?>";
				materi_kuliah7_[5] = "<?php echo $materi_kuliah7_[4]; ?>";
				materi_kuliah7_[6] = "<?php echo $materi_kuliah7_[5]; ?>";
				materi_kuliah7_[7] = "<?php echo $materi_kuliah7_[6]; ?>";
				materi_kuliah7_[8] = "<?php echo $materi_kuliah7_[7]; ?>";
				materi_kuliah7_[9] = "<?php echo $materi_kuliah7_[8]; ?>";
				materi_kuliah7_[10] = "<?php echo $materi_kuliah7_[9]; ?>";
				
				var materi_kuliah8_ = new Array(10);
				materi_kuliah8_[1] = "<?php echo $materi_kuliah8_[0]; ?>";
				materi_kuliah8_[2] = "<?php echo $materi_kuliah8_[1]; ?>";
				materi_kuliah8_[3] = "<?php echo $materi_kuliah8_[2]; ?>";
				materi_kuliah8_[4] = "<?php echo $materi_kuliah8_[3]; ?>";
				materi_kuliah8_[5] = "<?php echo $materi_kuliah8_[4]; ?>";
				materi_kuliah8_[6] = "<?php echo $materi_kuliah8_[5]; ?>";
				materi_kuliah8_[7] = "<?php echo $materi_kuliah8_[6]; ?>";
				materi_kuliah8_[8] = "<?php echo $materi_kuliah8_[7]; ?>";
				materi_kuliah8_[9] = "<?php echo $materi_kuliah8_[8]; ?>";
				materi_kuliah8_[10] = "<?php echo $materi_kuliah8_[9]; ?>";
			</script>
			<div>
				<h3 style="margin-left:15px; margin-top:15px;"><b>UNIVERSITAS YARSI<br>FAKULTAS TEKNOLOGI INFORMASI</b></h3>
			</div>
			<br>
			<div align="center">
				<h3 style="text-transform: uppercase;"><b>PEMANTAUAN PELAKSANAAN PERKULIAHAAN<br>
					<?php
						if ($semester % 2 != 0)
							echo "Semester Ganjil ";
						else
							echo "Semester Genap ";
					?>
				Tahun Akademik <?php echo $tahun_ajaran; ?></b></h3>
				
				<form action="dosen_data_pelaksanaan_perkuliahan_teori_kueri_insert.php" method="post" role="form" class="contactForm">
					<input type="hidden" value="<?php echo $id_pelaksanaan_perkuliahan; ?>" name="id_pelaksanaan_perkuliahan" />
					<input type="hidden" value="<?php echo $kd_mata_kuliah; ?>" name="kd_mata_kuliah" />
					<input type="hidden" value="<?php echo $nik_tata_usaha; ?>" name="nik_tata_usaha" />
					<table class="pel_per">
						<tr>
							<th><h4><b>Nama Mata Kuliah</b></h4></th>
							<th><h4><b>&nbsp;:&nbsp;</b></h4></th>
							<th><h4><b><?php echo $nama_mata_kuliah; ?></b></h4></th>
						</tr>
						<tr>
							<th><h4><b>Program Studi / SKS</b></h4></th>
							<th><h4><b>&nbsp;:&nbsp;</b></h4></th>
							<th><h4><b><?php echo $nama_prodi . " / " . $sks_teori; ?></b></h4></th>
						</tr>
						<tr>
							<th><h4><b>Hari / Jam</b></h4></th>
							<th><h4><b>&nbsp;:&nbsp;</b></h4></th>
							<th><h5><b><input type="text" value="<?php echo $hari_perkuliahan; ?>" placeholder="Hari" readonly disabled />
								<input type="text" name="jam_mulai" id="jam_mulai" style="width:150px;" placeholder="Jam Mulai" value="<?php echo $jam[0]; ?>" readonly disabled >
								<input type="text" name="jam_selesai" id="jam_selesai" style="width:150px;" placeholder="Jam Selesai" value="<?php if (isset($jam[1])) echo $jam[1]; ?>" readonly disabled >
							</b></h5></th>
						</tr>
						<tr>
							<th><h4><b>Nama Dosen</b></h4></th>
							<th><h4><b>&nbsp;:&nbsp;</b></h4></th>
							<th><h4><b><?php echo $nama_dosen; ?></b></h4></th>
						</tr>
						<tr>
							<th><h4><b>Ruang</b></h4></th>
							<th><h4><b>&nbsp;:&nbsp;</b></h4></th>
							<th><h5><b>
								<?php
									require ("config/config.php");
									$sql3 = "SELECT * from ruang WHERE kd_prodi='".$_SESSION['kd_prodi']."' AND kd_ruang = '$kd_ruang'";
									
									if (!$result3 = $mysqli->query($sql3)) {
										$message3 = "Sorry, the website is experiencing problems.";
										echo "<script type='text/javascript'>alert('$message3');</script>";
									}
									$data3 = $result3->fetch_assoc();
								?>
								<input type="text" value="<?php echo $data3['nama_ruang']; ?>" placeholder="Ruang" readonly disabled />
							</b></h5></th>
						</tr>
					</table>
					<br>
					
					<table class="sap">
						<tr>
							<th rowspan="2"><center>No. </center></th>
							<th colspan="2"><center>Hari / Tgl </center></th>
							<th rowspan="2"><center>Jam Mulai </center></th>
							<th rowspan="2"><center>Jam Selesai </center></th>
							<th rowspan="2"><center>Materi Kuliah </center></th>
							<th rowspan="2"><center>Paraf Dosen </center></th>
							<th rowspan="2"><center>Paraf MHS </center></th>
							<th rowspan="2"><center>Paraf TU </center></th>
							<th rowspan="2"><center>Ket </center></th>
						</tr>
						<tr>
							<th><center>Rencana </center></th>
							<th><center>Realisasi </center></th>
						</tr>
						<tr>
							<td rowspan="2"><center>1. </center></td>
							<td><center>
								<input type="text" style="width:100px;" placeholder="Pilih Tanggal" name="hari_dan_tgl_rencana1" value="<?php echo $hari_dan_tgl_rencana1; ?>" readonly disabled >
							</center></td>
							<td rowspan="2"><center>
								<input type="text" id="datepicker1" style="width:100px;" placeholder="Pilih Tanggal" name="hari_dan_tgl_realisasi1" value="<?php echo $hari_dan_tgl_realisasi1; ?>">
							</center></td>
							<td rowspan="2"><center>
								<input type="text" name="jam_mulai1" id="jam_mulai1" style="width:80px;" placeholder="Jam Mulai" value="<?php echo $jam_mulai1; ?>">
							</center></td>
							<td rowspan="2"><center>
								<input type="text" name="jam_selesai1" id="jam_selesai1" style="width:80px;" placeholder="Jam Selesai" value="<?php echo $jam_selesai1; ?>">
							</center></td>
							<td rowspan="2" id="materi_kuliah9">
								<div>
									<img src="images/icon_plus.gif" style="cursor:pointer; margin-bottom:2px;" onclick="addMoreRows9(this.form);"/>
									<select class="form-control" name="materi_kuliah1_1" id="materi_kuliah9_1" style="width:250px;">
										<option value="" disabled selected>Pilih Materi Kuliah 1.1</option>
										<?php
											for ($i = 0; $i <= 9; $i++) {
										?>
										<option value="<?php echo $sub_topik9_[$i];?>"
										<?php
											if ($materi_kuliah1_[0] == $sub_topik9_[$i] && $materi_kuliah1_[0] != "") {
												echo ' selected="selected"';
											} 
										?>
										>
										<?php
												echo $sub_topik9_[$i];
										?>
										</option>
										<?php
											}
										?>
									</select>
								</div>
							</center></td>
							<td rowspan="2"><center>
								<input type="checkbox" id="sign_dosen1" name="sign_dosen1" <?php if ($sign_dosen1 == 1) echo " checked"; ?> value="1" />
							</center></td>
							<td rowspan="2"><center>
								<input type="checkbox" id="sign_mahasiswa1" name="sign_mahasiswa1" <?php if ($sign_mahasiswa1 == 1) echo " checked"; ?> value="1" />
							</center></td>
							<td rowspan="2"><center>
								<input type="checkbox" id="sign_tu1" name="sign_tu1" <?php if ($sign_tu1 == 1) echo " checked"; ?> onclick="return false" disabled />
							</center></td>
							<td rowspan="2"><center>
								<textarea class="form-control" name="keterangan1" id="keterangan1"><?php echo $keterangan1; ?></textarea>
							</center></td>
						</tr>
						<tr>
							<td><center> </center></td>
						</tr>
						<tr>
							<td rowspan="2"><center>2. </center></td>
							<td><center>
								<input type="text" style="width:100px;" placeholder="Pilih Tanggal" name="hari_dan_tgl_rencana2" value="<?php echo $hari_dan_tgl_rencana2; ?>" readonly disabled >
							</center></td>
							<td rowspan="2"><center>
								<input type="text" id="datepicker2" style="width:100px;" placeholder="Pilih Tanggal" name="hari_dan_tgl_realisasi2" value="<?php echo $hari_dan_tgl_realisasi2; ?>">
							</center></td>
							<td rowspan="2"><center>
								<input type="text" name="jam_mulai2" id="jam_mulai2" style="width:80px;" placeholder="Jam Mulai" value="<?php echo $jam_mulai2; ?>">
							</center></td>
							<td rowspan="2"><center>
								<input type="text" name="jam_selesai2" id="jam_selesai2" style="width:80px;" placeholder="Jam Selesai" value="<?php echo $jam_selesai2; ?>">
							</center></td>
							<td rowspan="2" id="materi_kuliah10">
								<div>
									<img src="images/icon_plus.gif" style="cursor:pointer; margin-bottom:2px;" onclick="addMoreRows10(this.form);"/>
									<select class="form-control" name="materi_kuliah2_1" id="materi_kuliah10_1" style="width:250px;">
										<option value="" disabled selected>Pilih Materi Kuliah 2.1</option>
										<?php
											for ($i = 0; $i <= 9; $i++) {
										?>
										<option value="<?php echo $sub_topik10_[$i];?>"
										<?php
											if ($materi_kuliah2_[0] == $sub_topik10_[$i] && $materi_kuliah2_[0] != "") {
												echo ' selected="selected"';
											} 
										?>
										>
										<?php
												echo $sub_topik10_[$i];
										?>
										</option>
										<?php
											}
										?>
									</select>
								</div>
							</center></td>
							<td rowspan="2"><center>
								<input type="checkbox" id="sign_dosen2" name="sign_dosen2" <?php if ($sign_dosen2 == 1) echo " checked"; ?> value="1" />
							</center></td>
							<td rowspan="2"><center>
								<input type="checkbox" id="sign_mahasiswa2" name="sign_mahasiswa2" <?php if ($sign_mahasiswa2 == 1) echo " checked"; ?> value="1" />
							</center></td>
							<td rowspan="2"><center>
								<input type="checkbox" id="sign_tu2" name="sign_tu2" <?php if ($sign_tu2 == 1) echo " checked"; ?> onclick="return false" disabled />
							</center></td>
							<td rowspan="2"><center>
								<textarea class="form-control" name="keterangan2" id="keterangan2"><?php echo $keterangan2; ?></textarea>
							</center></td>
						</tr>
						<tr>
							<td><center> </center></td>
						</tr>
						<tr>
							<td rowspan="2"><center>3. </center></td>
							<td><center>
								<input type="text" style="width:100px;" placeholder="Pilih Tanggal" name="hari_dan_tgl_rencana3" value="<?php echo $hari_dan_tgl_rencana3; ?>" readonly disabled >
							</center></td>
							<td rowspan="2"><center>
								<input type="text" id="datepicker3" style="width:100px;" placeholder="Pilih Tanggal" name="hari_dan_tgl_realisasi3" value="<?php echo $hari_dan_tgl_realisasi3; ?>">
							</center></td>
							<td rowspan="2"><center>
								<input type="text" name="jam_mulai3" id="jam_mulai3" style="width:80px;" placeholder="Jam Mulai" value="<?php echo $jam_mulai3; ?>">
							</center></td>
							<td rowspan="2"><center>
								<input type="text" name="jam_selesai3" id="jam_selesai3" style="width:80px;" placeholder="Jam Selesai" value="<?php echo $jam_selesai3; ?>">
							</center></td>
							<td rowspan="2" id="materi_kuliah11">
								<div>
									<img src="images/icon_plus.gif" style="cursor:pointer; margin-bottom:2px;" onclick="addMoreRows11(this.form);"/>
									<select class="form-control" name="materi_kuliah3_1" id="materi_kuliah11_1" style="width:250px;">
										<option value="" disabled selected>Pilih Materi Kuliah 3.1</option>
										<?php
											for ($i = 0; $i <= 9; $i++) {
										?>
										<option value="<?php echo $sub_topik11_[$i];?>"
										<?php
											if ($materi_kuliah3_[0] == $sub_topik11_[$i] && $materi_kuliah3_[0] != "") {
												echo ' selected="selected"';
											} 
										?>
										>
										<?php
												echo $sub_topik11_[$i];
										?>
										</option>
										<?php
											}
										?>
									</select>
								</div>
							</center></td>
							<td rowspan="2"><center>
								<input type="checkbox" id="sign_dosen3" name="sign_dosen3" <?php if ($sign_dosen3 == 1) echo " checked"; ?> value="1" />
							</center></td>
							<td rowspan="2"><center>
								<input type="checkbox" id="sign_mahasiswa3" name="sign_mahasiswa3" <?php if ($sign_mahasiswa3 == 1) echo " checked"; ?> value="1" />
							</center></td>
							<td rowspan="2"><center>
								<input type="checkbox" id="sign_tu3" name="sign_tu3" <?php if ($sign_tu3 == 1) echo " checked"; ?> onclick="return false" disabled />
							</center></td>
							<td rowspan="2"><center>
								<textarea class="form-control" name="keterangan3" id="keterangan3"><?php echo $keterangan3; ?></textarea>
							</center></td>
						</tr>
						<tr>
							<td><center> </center></td>
						</tr>
						<tr>
							<td rowspan="2"><center>4. </center></td>
							<td><center>
								<input type="text" style="width:100px;" placeholder="Pilih Tanggal" name="hari_dan_tgl_rencana4" value="<?php echo $hari_dan_tgl_rencana4; ?>" readonly disabled >
							</center></td>
							<td rowspan="2"><center>
								<input type="text" id="datepicker4" style="width:100px;" placeholder="Pilih Tanggal" name="hari_dan_tgl_realisasi4" value="<?php echo $hari_dan_tgl_realisasi4; ?>">
							</center></td>
							<td rowspan="2"><center>
								<input type="text" name="jam_mulai4" id="jam_mulai4" style="width:80px;" placeholder="Jam Mulai" value="<?php echo $jam_mulai4; ?>">
							</center></td>
							<td rowspan="2"><center>
								<input type="text" name="jam_selesai4" id="jam_selesai4" style="width:80px;" placeholder="Jam Selesai" value="<?php echo $jam_selesai4; ?>">
							</center></td>
							
							<td rowspan="2" id="materi_kuliah12">
								<div>
									<img src="images/icon_plus.gif" style="cursor:pointer; margin-bottom:2px;" onclick="addMoreRows12(this.form);"/>
									<select class="form-control" name="materi_kuliah4_1" id="materi_kuliah12_1" style="width:250px;">
										<option value="" disabled selected>Pilih Materi Kuliah 4.1</option>
										<?php
											for ($i = 0; $i <= 9; $i++) {
										?>
										<option value="<?php echo $sub_topik12_[$i];?>"
										<?php
											if ($materi_kuliah4_[0] == $sub_topik12_[$i] && $materi_kuliah4_[0] != "") {
												echo ' selected="selected"';
											} 
										?>
										>
										<?php
												echo $sub_topik12_[$i];
										?>
										</option>
										<?php
											}
										?>
									</select>
								</div>
							</center></td>
							<td rowspan="2"><center>
								<input type="checkbox" id="sign_dosen4" name="sign_dosen4" <?php if ($sign_dosen4 == 1) echo " checked"; ?> value="1" />
							</center></td>
							<td rowspan="2"><center>
								<input type="checkbox" id="sign_mahasiswa4" name="sign_mahasiswa4" <?php if ($sign_mahasiswa4 == 1) echo " checked"; ?> value="1" />
							</center></td>
							<td rowspan="2"><center>
								<input type="checkbox" id="sign_tu4" name="sign_tu4" <?php if ($sign_tu4 == 1) echo " checked"; ?> onclick="return false" disabled />
							</center></td>
							<td rowspan="2"><center>
								<textarea class="form-control" name="keterangan4" id="keterangan4"><?php echo $keterangan4; ?></textarea>
							</center></td>
						</tr>
						<tr>
							<td><center> </center></td>
						</tr>
						<tr>
							<td rowspan="2"><center>5. </center></td>
							<td><center>
								<input type="text" style="width:100px;" placeholder="Pilih Tanggal" name="hari_dan_tgl_rencana5" value="<?php echo $hari_dan_tgl_rencana5; ?>" readonly disabled >
							</center></td>
							<td rowspan="2"><center>
								<input type="text" id="datepicker5" style="width:100px;" placeholder="Pilih Tanggal" name="hari_dan_tgl_realisasi5" value="<?php echo $hari_dan_tgl_realisasi5; ?>">
							</center></td>
							<td rowspan="2"><center>
								<input type="text" name="jam_mulai5" id="jam_mulai5" style="width:80px;" placeholder="Jam Mulai" value="<?php echo $jam_mulai5; ?>">
							</center></td>
							<td rowspan="2"><center>
								<input type="text" name="jam_selesai5" id="jam_selesai5" style="width:80px;" placeholder="Jam Selesai" value="<?php echo $jam_selesai5; ?>">
							</center></td>
							<td rowspan="2" id="materi_kuliah13">
								<div>
									<img src="images/icon_plus.gif" style="cursor:pointer; margin-bottom:2px;" onclick="addMoreRows13(this.form);"/>
									<select class="form-control" name="materi_kuliah5_1" id="materi_kuliah13_1" style="width:250px;">
										<option value="" disabled selected>Pilih Materi Kuliah 5.1</option>
										<?php
											for ($i = 0; $i <= 9; $i++) {
										?>
										<option value="<?php echo $sub_topik13_[$i];?>"
										<?php
											if ($materi_kuliah5_[0] == $sub_topik13_[$i] && $materi_kuliah5_[0] != "") {
												echo ' selected="selected"';
											} 
										?>
										>
										<?php
												echo $sub_topik13_[$i];
										?>
										</option>
										<?php
											}
										?>
									</select>
								</div>
							</center></td>
							<td rowspan="2"><center>
								<input type="checkbox" id="sign_dosen5" name="sign_dosen5" <?php if ($sign_dosen5 == 1) echo " checked"; ?> value="1" />
							</center></td>
							<td rowspan="2"><center>
								<input type="checkbox" id="sign_mahasiswa5" name="sign_mahasiswa5" <?php if ($sign_mahasiswa5 == 1) echo " checked"; ?> value="1" />
							</center></td>
							<td rowspan="2"><center>
								<input type="checkbox" id="sign_tu5" name="sign_tu5" <?php if ($sign_tu5 == 1) echo " checked"; ?> onclick="return false" disabled />
							</center></td>
							<td rowspan="2"><center>
								<textarea class="form-control" name="keterangan5" id="keterangan5"><?php echo $keterangan5; ?></textarea>
							</center></td>
						</tr>
						<tr>
							<td><center> </center></td>
						</tr>
						<tr>
							<td rowspan="2"><center>6. </center></td>
							<td><center>
								<input type="text" style="width:100px;" placeholder="Pilih Tanggal" name="hari_dan_tgl_rencana6" value="<?php echo $hari_dan_tgl_rencana6; ?>" readonly disabled >
							</center></td>
							<td rowspan="2"><center>
								<input type="text" id="datepicker6" style="width:100px;" placeholder="Pilih Tanggal" name="hari_dan_tgl_realisasi6" value="<?php echo $hari_dan_tgl_realisasi6; ?>">
							</center></td>
							<td rowspan="2"><center>
								<input type="text" name="jam_mulai6" id="jam_mulai6" style="width:80px;" placeholder="Jam Mulai" value="<?php echo $jam_mulai6; ?>">
							</center></td>
							<td rowspan="2"><center>
								<input type="text" name="jam_selesai6" id="jam_selesai6" style="width:80px;" placeholder="Jam Selesai" value="<?php echo $jam_selesai6; ?>">
							</center></td>
							<td rowspan="2" id="materi_kuliah14">
								<div>
									<img src="images/icon_plus.gif" style="cursor:pointer; margin-bottom:2px;" onclick="addMoreRows14(this.form);"/>
									<select class="form-control" name="materi_kuliah6_1" id="materi_kuliah14_1" style="width:250px;">
										<option value="" disabled selected>Pilih Materi Kuliah 6.1</option>
										<?php
											for ($i = 0; $i <= 9; $i++) {
										?>
										<option value="<?php echo $sub_topik14_[$i];?>"
										<?php
											if ($materi_kuliah6_[0] == $sub_topik14_[$i] && $materi_kuliah6_[0] != "") {
												echo ' selected="selected"';
											} 
										?>
										>
										<?php
												echo $sub_topik14_[$i];
										?>
										</option>
										<?php
											}
										?>
									</select>
								</div>
							</center></td>
							<td rowspan="2"><center>
								<input type="checkbox" id="sign_dosen6" name="sign_dosen6" <?php if ($sign_dosen6 == 1) echo " checked"; ?> value="1" />
							</center></td>
							<td rowspan="2"><center>
								<input type="checkbox" id="sign_mahasiswa6" name="sign_mahasiswa6" <?php if ($sign_mahasiswa6 == 1) echo " checked"; ?> value="1" />
							</center></td>
							<td rowspan="2"><center>
								<input type="checkbox" id="sign_tu6" name="sign_tu6" <?php if ($sign_tu6 == 1) echo " checked"; ?> onclick="return false" disabled />
							</center></td>
							<td rowspan="2"><center>
								<textarea class="form-control" name="keterangan6" id="keterangan6"><?php echo $keterangan6; ?></textarea>
							</center></td>
						</tr>
						<tr>
							<td><center> </center></td>
						</tr>
						<tr>
							<td rowspan="2"><center>7. </center></td>
							<td><center>
								<input type="text" style="width:100px;" placeholder="Pilih Tanggal" name="hari_dan_tgl_rencana7" value="<?php echo $hari_dan_tgl_rencana7; ?>" readonly disabled >
							</center></td>
							<td rowspan="2"><center>
								<input type="text" id="datepicker7" style="width:100px;" placeholder="Pilih Tanggal" name="hari_dan_tgl_realisasi7" value="<?php echo $hari_dan_tgl_realisasi7; ?>">
							</center></td>
							<td rowspan="2"><center>
								<input type="text" name="jam_mulai7" id="jam_mulai7" style="width:80px;" placeholder="Jam Mulai" value="<?php echo $jam_mulai7; ?>">
							</center></td>
							<td rowspan="2"><center>
								<input type="text" name="jam_selesai7" id="jam_selesai7" style="width:80px;" placeholder="Jam Selesai" value="<?php echo $jam_selesai7; ?>">
							</center></td>
							<td rowspan="2" id="materi_kuliah15">
								<div>
									<img src="images/icon_plus.gif" style="cursor:pointer; margin-bottom:2px;" onclick="addMoreRows15(this.form);"/>
									<select class="form-control" name="materi_kuliah7_1" id="materi_kuliah15_1" style="width:250px;">
										<option value="" disabled selected>Pilih Materi Kuliah 7.1</option>
										<?php
											for ($i = 0; $i <= 9; $i++) {
										?>
										<option value="<?php echo $sub_topik15_[$i];?>"
										<?php
											if ($materi_kuliah7_[0] == $sub_topik15_[$i] && $materi_kuliah7_[0] != "") {
												echo ' selected="selected"';
											} 
										?>
										>
										<?php
												echo $sub_topik15_[$i];
										?>
										</option>
										<?php
											}
										?>
									</select>
								</div>
							</center></td>
							<td rowspan="2"><center>
								<input type="checkbox" id="sign_dosen7" name="sign_dosen7" <?php if ($sign_dosen7 == 1) echo " checked"; ?> value="1" />
							</center></td>
							<td rowspan="2"><center>
								<input type="checkbox" id="sign_mahasiswa7" name="sign_mahasiswa7" <?php if ($sign_mahasiswa7 == 1) echo " checked"; ?> value="1" />
							</center></td>
							<td rowspan="2"><center>
								<input type="checkbox" id="sign_tu7" name="sign_tu7" <?php if ($sign_tu7 == 1) echo " checked"; ?> onclick="return false" disabled />
							</center></td>
							<td rowspan="2"><center>
								<textarea class="form-control" name="keterangan7" id="keterangan7"><?php echo $keterangan7; ?></textarea>
							</center></td>
						</tr>
						<tr>
							<td><center> </center></td>
						</tr>
						<tr>
							<td rowspan="2"><center>8. </center></td>
							<td><center>
								<input type="text" style="width:100px;" placeholder="Pilih Tanggal" name="hari_dan_tgl_rencana8" value="<?php echo $hari_dan_tgl_rencana8; ?>" readonly disabled >
							</center></td>
							<td rowspan="2"><center>
								<input type="text" id="datepicker8" style="width:100px;" placeholder="Pilih Tanggal" name="hari_dan_tgl_realisasi8" value="<?php echo $hari_dan_tgl_realisasi8; ?>">
							</center></td>
							<td rowspan="2"><center>
								<input type="text" name="jam_mulai8" id="jam_mulai8" style="width:80px;" placeholder="Jam Mulai" value="<?php echo $jam_mulai8; ?>">
							</center></td>
							<td rowspan="2"><center>
								<input type="text" name="jam_selesai8" id="jam_selesai8" style="width:80px;" placeholder="Jam Selesai" value="<?php echo $jam_selesai8; ?>">
							</center></td>
							<td rowspan="2" id="materi_kuliah16">
								<div>
									<img src="images/icon_plus.gif" style="cursor:pointer; margin-bottom:2px;" onclick="addMoreRows16(this.form);"/>
									<select class="form-control" name="materi_kuliah8_1" id="materi_kuliah16_1" style="width:250px;">
										<option value="" disabled selected>Pilih Materi Kuliah 8.1</option>
										<?php
											for ($i = 0; $i <= 9; $i++) {
										?>
										<option value="<?php echo $sub_topik16_[$i];?>"
										<?php
											if ($materi_kuliah8_[0] == $sub_topik16_[$i] && $materi_kuliah8_[0] != "") {
												echo ' selected="selected"';
											} 
										?>
										>
										<?php
												echo $sub_topik16_[$i];
										?>
										</option>
										<?php
											}
										?>
									</select>
								</div>
							</center></td>
							<td rowspan="2"><center>
								<input type="checkbox" id="sign_dosen8" name="sign_dosen8" <?php if ($sign_dosen8== 1) echo " checked"; ?> value="1" />
							</center></td>
							<td rowspan="2"><center>
								<input type="checkbox" id="sign_mahasiswa8" name="sign_mahasiswa8" <?php if ($sign_mahasiswa8 == 1) echo " checked"; ?> value="1" />
							</center></td>
							<td rowspan="2"><center>
								<input type="checkbox" id="sign_tu8" name="sign_tu8" <?php if ($sign_tu8 == 1) echo " checked"; ?> onclick="return false" disabled />
							</center></td>
							<td rowspan="2"><center>
								<textarea class="form-control" name="keterangan8" id="keterangan8"><?php echo $keterangan8; ?></textarea>
							</center></td>
						</tr>
						<tr>
							<td><center> </center></td>
						</tr>
					</table>
					<div class="text-center"><button type="submit" name="submit" class="btn btn-primary btn-lg" required="required">Simpan</button></div>
					</br>
						
					<script type="text/javascript">
						var rowCount9 = 1;
						function addMoreRows9(frm) {
							if (rowCount9 <= 9) {
								rowCount9 ++;
								if (materi_kuliah1_[rowCount9] == "") {
									$data = "Pilih Materi Kuliah 1."+rowCount9;
								} else {
									$data = materi_kuliah1_[rowCount9];
								}
								var recRow = 
								'<div id="rowCount9'+rowCount9+'">'+
									'<img width="21" src="images/delete-icon-md.png" align="right" style="cursor:pointer; margin-bottom:2px; margin-top:2px;" onclick="removeRow9('+rowCount9+');"/>'+
									'<select class="form-control" name="materi_kuliah1_'+rowCount9+'" id="materi_kuliah9_'+rowCount9+'">'+
										'<option value="value="'+materi_kuliah1_[rowCount9]+'"" disabled selected>'+$data+'</option>'+
										'<?php for ($i = 0; $i <= 9; $i++) { ?>'+
										'<option value="<?php echo $sub_topik9_[$i];?>"'+
										'>'+
										'<?php echo $sub_topik9_[$i]; ?>'+
										'</option>'+
										'<?php } ?>'+
									'</select>'+
								'</div>';
								jQuery('#materi_kuliah9').append(recRow);
							}
						}

						function removeRow9(removeNum) {
							jQuery('#rowCount9'+rowCount9).remove();
							rowCount9 --;
						}
					</script>
					
					<script type="text/javascript">
						var rowCount10 = 1;
						function addMoreRows10(frm) {
							if (rowCount10 <= 9) {
								rowCount10 ++;
								if (materi_kuliah2_[rowCount10] == "") {
									$data = "Pilih Materi Kuliah 2."+rowCount10;
								} else {
									$data = materi_kuliah2_[rowCount10];
								}
								var recRow = 
								'<div id="rowCount10'+rowCount10+'">'+
									'<img width="21" src="images/delete-icon-md.png" align="right" style="cursor:pointer; margin-bottom:2px; margin-top:2px;" onclick="removeRow10('+rowCount10+');"/>'+
									'<select class="form-control" name="materi_kuliah2_'+rowCount10+'" id="materi_kuliah10_'+rowCount10+'">'+
										'<option value="value="'+materi_kuliah2_[rowCount10]+'"" disabled selected>'+$data+'</option>'+
										'<?php for ($i = 0; $i <= 9; $i++) { ?>'+
										'<option value="<?php echo $sub_topik10_[$i];?>"'+
										'>'+
										'<?php echo $sub_topik10_[$i]; ?>'+
										'</option>'+
										'<?php } ?>'+
									'</select>'+
								'</div>';
								jQuery('#materi_kuliah10').append(recRow);
							}
						}

						function removeRow10(removeNum) {
							jQuery('#rowCount10'+rowCount10).remove();
							rowCount10 --;
						}
					</script>
					
					<script type="text/javascript">
						var rowCount11 = 1;
						function addMoreRows11(frm) {
							if (rowCount11 <= 9) {
								rowCount11 ++;
								if (materi_kuliah3_[rowCount11] == "") {
									$data = "Pilih Materi Kuliah 3."+rowCount11;
								} else {
									$data = materi_kuliah3_[rowCount11];
								}
								var recRow = 
								'<div id="rowCount11'+rowCount11+'">'+
									'<img width="21" src="images/delete-icon-md.png" align="right" style="cursor:pointer; margin-bottom:2px; margin-top:2px;" onclick="removeRow11('+rowCount11+');"/>'+
									'<select class="form-control" name="materi_kuliah3_'+rowCount11+'" id="materi_kuliah11_'+rowCount11+'">'+
										'<option value="value="'+materi_kuliah3_[rowCount11]+'"" disabled selected>'+$data+'</option>'+
										'<?php for ($i = 0; $i <= 9; $i++) { ?>'+
										'<option value="<?php echo $sub_topik11_[$i];?>"'+
										'>'+
										'<?php echo $sub_topik11_[$i]; ?>'+
										'</option>'+
										'<?php } ?>'+
									'</select>'+
								'</div>';
								jQuery('#materi_kuliah11').append(recRow);
							}
						}

						function removeRow11(removeNum) {
							jQuery('#rowCount11'+rowCount11).remove();
							rowCount11 --;
						}
					</script>
					
					<script type="text/javascript">
						var rowCount12 = 1;
						function addMoreRows12(frm) {
							if (rowCount12 <= 9) {
								rowCount12 ++;
								if (materi_kuliah4_[rowCount12] == "") {
									$data = "Pilih Materi Kuliah 4."+rowCount12;
								} else {
									$data = materi_kuliah4_[rowCount12];
								}
								var recRow = 
								'<div id="rowCount12'+rowCount12+'">'+
									'<img width="21" src="images/delete-icon-md.png" align="right" style="cursor:pointer; margin-bottom:2px; margin-top:2px;" onclick="removeRow12('+rowCount12+');"/>'+
									'<select class="form-control" name="materi_kuliah4_'+rowCount12+'" id="materi_kuliah12_'+rowCount12+'">'+
										'<option value="value="'+materi_kuliah4_[rowCount12]+'"" disabled selected>'+$data+'</option>'+
										'<?php for ($i = 0; $i <= 9; $i++) { ?>'+
										'<option value="<?php echo $sub_topik12_[$i];?>"'+
										'>'+
										'<?php echo $sub_topik12_[$i]; ?>'+
										'</option>'+
										'<?php } ?>'+
									'</select>'+
								'</div>';
								jQuery('#materi_kuliah12').append(recRow);
							}
						}

						function removeRow12(removeNum) {
							jQuery('#rowCount12'+rowCount12).remove();
							rowCount12 --;
						}
					</script>
					
					<script type="text/javascript">
						var rowCount13 = 1;
						function addMoreRows13(frm) {
							if (rowCount13 <= 9) {
								rowCount13 ++;
								if (materi_kuliah5_[rowCount13] == "") {
									$data = "Pilih Materi Kuliah 5."+rowCount13;
								} else {
									$data = materi_kuliah5_[rowCount13];
								}
								var recRow = 
								'<div id="rowCount13'+rowCount13+'">'+
									'<img width="21" src="images/delete-icon-md.png" align="right" style="cursor:pointer; margin-bottom:2px; margin-top:2px;" onclick="removeRow13('+rowCount13+');"/>'+
									'<select class="form-control" name="materi_kuliah5_'+rowCount13+'" id="materi_kuliah13_'+rowCount13+'">'+
										'<option value="value="'+materi_kuliah5_[rowCount13]+'"" disabled selected>'+$data+'</option>'+
										'<?php for ($i = 0; $i <= 9; $i++) { ?>'+
										'<option value="<?php echo $sub_topik13_[$i];?>"'+
										'>'+
										'<?php echo $sub_topik13_[$i]; ?>'+
										'</option>'+
										'<?php } ?>'+
									'</select>'+
								'</div>';
								jQuery('#materi_kuliah13').append(recRow);
							}
						}

						function removeRow13(removeNum) {
							jQuery('#rowCount13'+rowCount13).remove();
							rowCount13 --;
						}
					</script>
					
					<script type="text/javascript">
						var rowCount14 = 1;
						function addMoreRows14(frm) {
							if (rowCount14 <= 9) {
								rowCount14 ++;
								if (materi_kuliah6_[rowCount14] == "") {
									$data = "Pilih Materi Kuliah 6."+rowCount14;
								} else {
									$data = materi_kuliah6_[rowCount14];
								}
								var recRow = 
								'<div id="rowCount14'+rowCount14+'">'+
									'<img width="21" src="images/delete-icon-md.png" align="right" style="cursor:pointer; margin-bottom:2px; margin-top:2px;" onclick="removeRow14('+rowCount14+');"/>'+
									'<select class="form-control" name="materi_kuliah6_'+rowCount14+'" id="materi_kuliah14_'+rowCount14+'">'+
										'<option value="value="'+materi_kuliah6_[rowCount14]+'"" disabled selected>'+$data+'</option>'+
										'<?php for ($i = 0; $i <= 9; $i++) { ?>'+
										'<option value="<?php echo $sub_topik14_[$i];?>"'+
										'>'+
										'<?php echo $sub_topik14_[$i]; ?>'+
										'</option>'+
										'<?php } ?>'+
									'</select>'+
								'</div>';
								jQuery('#materi_kuliah14').append(recRow);
							}
						}

						function removeRow14(removeNum) {
							jQuery('#rowCount14'+rowCount14).remove();
							rowCount14 --;
						}
					</script>
					
					<script type="text/javascript">
						var rowCount15 = 1;
						function addMoreRows15(frm) {
							if (rowCount15 <= 9) {
								rowCount15 ++;
								if (materi_kuliah7_[rowCount15] == "") {
									$data = "Pilih Materi Kuliah 7."+rowCount15;
								} else {
									$data = materi_kuliah7_[rowCount15];
								}
								var recRow = 
								'<div id="rowCount15'+rowCount15+'">'+
									'<img width="21" src="images/delete-icon-md.png" align="right" style="cursor:pointer; margin-bottom:2px; margin-top:2px;" onclick="removeRow15('+rowCount15+');"/>'+
									'<select class="form-control" name="materi_kuliah7_'+rowCount15+'" id="materi_kuliah15_'+rowCount15+'">'+
										'<option value="value="'+materi_kuliah7_[rowCount15]+'"" disabled selected>'+$data+'</option>'+
										'<?php for ($i = 0; $i <= 9; $i++) { ?>'+
										'<option value="<?php echo $sub_topik15_[$i];?>"'+
										'>'+
										'<?php echo $sub_topik15_[$i]; ?>'+
										'</option>'+
										'<?php } ?>'+
									'</select>'+
								'</div>';
								jQuery('#materi_kuliah15').append(recRow);
							}
						}

						function removeRow15(removeNum) {
							jQuery('#rowCount15'+rowCount15).remove();
							rowCount15 --;
						}
					</script>
					
					<script type="text/javascript">
						var rowCount16 = 1;
						function addMoreRows16(frm) {
							if (rowCount16 <= 9) {
								rowCount16 ++;
								if (materi_kuliah8_[rowCount16] == "") {
									$data = "Pilih Materi Kuliah 8."+rowCount16;
								} else {
									$data = materi_kuliah8_[rowCount16];
								}
								var recRow = 
								'<div id="rowCount16'+rowCount16+'">'+
									'<img width="21" src="images/delete-icon-md.png" align="right" style="cursor:pointer; margin-bottom:2px; margin-top:2px;" onclick="removeRow16('+rowCount16+');"/>'+
									'<select class="form-control" name="materi_kuliah8_'+rowCount16+'" id="materi_kuliah16_'+rowCount16+'">'+
										'<option value="value="'+materi_kuliah8_[rowCount16]+'"" disabled selected>'+$data+'</option>'+
										'<?php for ($i = 0; $i <= 9; $i++) { ?>'+
										'<option value="<?php echo $sub_topik16_[$i];?>"'+
										'>'+
										'<?php echo $sub_topik16_[$i]; ?>'+
										'</option>'+
										'<?php } ?>'+
									'</select>'+
								'</div>';
								jQuery('#materi_kuliah16').append(recRow);
							}
						}

						function removeRow16(removeNum) {
							jQuery('#rowCount16'+rowCount16).remove();
							rowCount16 --;
						}
					</script>
				</form>
			</div>
		</div>
	</div>
	
	<?php
		} else {
			header('location:dosen_data_mata_kuliah_lihat.php');
		}
	?>
	
	<?php
		include("footer.php");
	?>
	
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="js/jquery-2.1.1.min.js"></script>	
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/jquery.isotope.min.js"></script>  
	<script src="js/wow.min.js"></script>
    <script src="https://maps.google.com/maps/api/js?sensor=true"></script>
	<script src="js/functions.js"></script>
    <script src="contactform/contactform.js"></script>
	
	<!-- Bootstrap Core JavaScript -->
	<script src="data-grid/bootstrap/dist/js/bootstrap.min.js"></script>
	
	<!-- Metis Menu Plugin JavaScript -->
	<script src="data-grid/metisMenu/dist/metisMenu.min.js"></script>
	
	<!-- DataTables Responsive CSS -->
    <link href="data-grid/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">
	
	<!-- DataTables JavaScript -->
	<script src="data-grid/datatables/media/js/jquery.dataTables.min.js"></script>
	<script src="data-grid/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
	
	<!-- Page-Level Demo Scripts - Tables - Use for reference -->
	<script>
		$(document).ready(function () {
			$('#dataTables-example').DataTable({
				responsive: true
			});
		});
	</script>
	
	<link rel="stylesheet" href="date/jquery-ui.css">
	<script src="date/jquery-1.12.4.js"></script>
    <script src="date/jquery-ui.js"></script>
	<script>
		$( function() {
			$( "#datepicker1" ).datepicker();
		} );
	</script>
	<script>
		$( function() {
			$( "#datepicker2" ).datepicker();
		} );
	</script>
	<script>
		$( function() {
			$( "#datepicker3" ).datepicker();
		} );
	</script>
	<script>
		$( function() {
			$( "#datepicker4" ).datepicker();
		} );
	</script>
	<script>
		$( function() {
			$( "#datepicker5" ).datepicker();
		} );
	</script>
	<script>
		$( function() {
			$( "#datepicker6" ).datepicker();
		} );
	</script>
	<script>
		$( function() {
			$( "#datepicker7" ).datepicker();
		} );
	</script>
	<script>
		$( function() {
			$( "#datepicker8" ).datepicker();
		} );
	</script>
    
</body>
</html>