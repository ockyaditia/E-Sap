<!DOCTYPE html>
<?php
	session_start();
	include("_session_tata_usaha_program_studi.php");
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
				<li><a href="admin_data_pelaksanaan_perkuliahan_lihat.php?lihat=<?php echo $kd_mata_kuliah; ?>">Data Pelaksanaan Perkuliahan</a></li>
				<li>Data Pelaksanaan Perkuliahan Praktikum</li>			
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
				
				$id_pelaksanaan_perkuliahan = $kd_mata_kuliah . "-" . $semester . "-PRAKTIKUM-1";
				
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
				
				$sql5 = "SELECT * FROM laboratorium WHERE kd_ruang='$kd_ruang'";
				if (!$result5 = $mysqli->query($sql5)) {
					$message5 = "Sorry, the website is experiencing problems.";
					echo "<script type='text/javascript'>alert('$message5');</script>";
					exit;
				}
				
				$nama_lab = "";
				$nik_tata_usaha = "";
				
				$data5 = $result5->fetch_assoc();
				$nama_lab = $data5['nama_lab'];
				$nik_tata_usaha = $data5['nik_dosen_pj'];
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
			?>
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
				
				<form action="admin_data_pelaksanaan_perkuliahan_praktikum_kueri_insert.php" method="post" role="form" class="contactForm">
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
							<th><h4><b><?php echo $nama_prodi . " / " . $sks_praktikum; ?></b></h4></th>
						</tr>
						<tr>
							<th><h4><b>Hari / Jam</b></h4></th>
							<th><h4><b>&nbsp;:&nbsp;</b></h4></th>
							<th><h5><b>
								<select name="hari_perkuliahan" id="hari_perkuliahan">
									<option value="" disabled selected>Pilih Hari</option>
									<option value="Senin" <?php if ($hari_perkuliahan == 'Senin') echo ' selected'; ?>>Senin</option>
									<option value="Selasa" <?php if ($hari_perkuliahan == 'Selasa') echo ' selected'; ?>>Selasa</option>
									<option value="Rabu" <?php if ($hari_perkuliahan == 'Rabu') echo ' selected'; ?>>Rabu</option>
									<option value="Kamis" <?php if ($hari_perkuliahan == 'Kamis') echo ' selected'; ?>>Kamis</option>
									<option value="Jum'at" <?php if ($hari_perkuliahan == "Jum'at") echo ' selected'; ?>>Jum'at</option>
									<option value="Sabtu" <?php if ($hari_perkuliahan == 'Sabtu') echo ' selected'; ?>>Sabtu</option>
								</select>
								<input type="text" name="jam_mulai" id="jam_mulai" style="width:150px;" placeholder="Jam Mulai" value="<?php echo $jam[0]; ?>">
								<input type="text" name="jam_selesai" id="jam_selesai" style="width:150px;" placeholder="Jam Selesai" value="<?php if (isset($jam[1])) echo $jam[1]; ?>">
							</b></h5></th>
						</tr>
						<tr>
							<th><h4><b>Nama Dosen</b></h4></th>
							<th><h4><b>&nbsp;:&nbsp;</b></h4></th>
							<th><h4><b><?php echo $nama_dosen; ?></b></h4></th>
						</tr>
						<tr>
							<th><h4><b>Lab</b></h4></th>
							<th><h4><b>&nbsp;:&nbsp;</b></h4></th>
							<th><h5><b>
								<select name="lab" id="lab">
									<option value="" disabled selected>Pilih Lab</option>
									<?php
										require ("config/config.php");
										$sql3 = "SELECT * from laboratorium WHERE kd_prodi='".$_SESSION['kd_prodi']."'";
										
										if (!$result3 = $mysqli->query($sql3)) {
											$message3 = "Sorry, the website is experiencing problems.";
											echo "<script type='text/javascript'>alert('$message3');</script>";
										}
									?>
									<?php
										while ($data3 = $result3->fetch_assoc()) {
									?>
									<option value="<?php echo $data3['nama_lab'];?>"
									<?php
										if ($nama_lab == $data3['nama_lab']) {
											echo ' selected="selected"';
										} 
									?>
										>
									<?php
											echo $data3['nama_lab'];
									?>
									</option>
									<?php
										}
									?>
								</select>
								
								<script>
									$('#lab').on('change', function() {
										var lab = this.value;
										
										if (lab != "") {
											$.post('ajax_get_kode_ruang.php', {nama_lab:lab},
											function(data) {
												$('#kd_ruang').val(data);
											});
										}
										else {
											$('#kd_ruang').val("");
										}
									});
								</script>
								<input type="hidden" name="kd_ruang" id="kd_ruang" value="<?php echo $kd_ruang; ?>"/>
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
								<input type="text" id="datepicker1" style="width:100px;" placeholder="Pilih Tanggal" name="hari_dan_tgl_rencana1" value="<?php echo $hari_dan_tgl_rencana1; ?>">
							</center></td>
							<td rowspan="2"><center><?php echo $hari_dan_tgl_realisasi1; ?></center></td>
							<td rowspan="2"><center><?php echo $jam_mulai1; ?></center></td>
							<td rowspan="2"><center><?php echo $jam_selesai1; ?></center></td>
							<td rowspan="2"><center>
								<?php 
									for ($i = 0; $i <= 9; $i++) {
										if ($materi_kuliah1_[$i] != "") {
								?>
									<input class="form-control" type="text" style="width:250px;" placeholder="Materi Kuliah 1.<?php echo $i+1; ?>" value="<?php echo $materi_kuliah1_[$i]; ?>" readonly disabled ></br>
								<?php
										}
									}
								?>
							</center></td>
							<td rowspan="2"><center>
								<input type="checkbox" id="sign_dosen1" name="sign_dosen1" <?php if ($sign_dosen1 == 1) echo " checked"; ?> onclick="return false" disabled />
							</center></td>
							<td rowspan="2"><center>
								<input type="checkbox" id="sign_mahasiswa1" name="sign_mahasiswa1" <?php if ($sign_mahasiswa1 == 1) echo " checked"; ?> onclick="return false" disabled />
							</center></td>
							<td rowspan="2"><center>
								<input type="checkbox" id="sign_tu1" name="sign_tu1" <?php if ($sign_tu1 == 1) echo " checked"; ?> value="1"/>
							</center></td>
							<td rowspan="2"><center><?php echo $keterangan1; ?></center></td>
						</tr>
						<tr>
							<td><center> </center></td>
						</tr>
						<tr>
							<td rowspan="2"><center>2. </center></td>
							<td><center>
								<input type="text" id="datepicker2" style="width:100px;" placeholder="Pilih Tanggal" name="hari_dan_tgl_rencana2" value="<?php echo $hari_dan_tgl_rencana2; ?>">
							</center></td>
							<td rowspan="2"><center><?php echo $hari_dan_tgl_realisasi2; ?></center></td>
							<td rowspan="2"><center><?php echo $jam_mulai2; ?></center></td>
							<td rowspan="2"><center><?php echo $jam_selesai2; ?></center></td>
							<td rowspan="2"><center>
								<?php 
									for ($i = 0; $i <= 9; $i++) {
										if ($materi_kuliah2_[$i] != "") {
								?>
									<input class="form-control" type="text" style="width:250px;" placeholder="Materi Kuliah 2.<?php echo $i+1; ?>" value="<?php echo $materi_kuliah2_[$i]; ?>" readonly disabled ></br>
								<?php
										}
									}
								?>
							</center></td>
							<td rowspan="2"><center>
								<input type="checkbox" id="sign_dosen2" name="sign_dosen2" <?php if ($sign_dosen2 == 1) echo " checked"; ?> onclick="return false" disabled />
							</center></td>
							<td rowspan="2"><center>
								<input type="checkbox" id="sign_mahasiswa2" name="sign_mahasiswa2" <?php if ($sign_mahasiswa2 == 1) echo " checked"; ?> onclick="return false" disabled />
							</center></td>
							<td rowspan="2"><center>
								<input type="checkbox" id="sign_tu2" name="sign_tu2" <?php if ($sign_tu2 == 1) echo " checked"; ?> value="1"/>
							</center></td>
							<td rowspan="2"><center><?php echo $keterangan2; ?></center></td>
						</tr>
						<tr>
							<td><center> </center></td>
						</tr>
						<tr>
							<td rowspan="2"><center>3. </center></td>
							<td><center>
								<input type="text" id="datepicker3" style="width:100px;" placeholder="Pilih Tanggal" name="hari_dan_tgl_rencana3" value="<?php echo $hari_dan_tgl_rencana3; ?>">
							</center></td>
							<td rowspan="2"><center><?php echo $hari_dan_tgl_realisasi3; ?></center></td>
							<td rowspan="2"><center><?php echo $jam_mulai3; ?></center></td>
							<td rowspan="2"><center><?php echo $jam_selesai3; ?></center></td>
							<td rowspan="2"><center>
								<?php 
									for ($i = 0; $i <= 9; $i++) {
										if ($materi_kuliah3_[$i] != "") {
								?>
									<input class="form-control" type="text" style="width:250px;" placeholder="Materi Kuliah 3.<?php echo $i+1; ?>" value="<?php echo $materi_kuliah3_[$i]; ?>" readonly disabled ></br>
								<?php
										}
									}
								?>
							</center></td>
							<td rowspan="2"><center>
								<input type="checkbox" id="sign_dosen3" name="sign_dosen3" <?php if ($sign_dosen3 == 1) echo " checked"; ?> onclick="return false" disabled />
							</center></td>
							<td rowspan="2"><center>
								<input type="checkbox" id="sign_mahasiswa3" name="sign_mahasiswa3" <?php if ($sign_mahasiswa3 == 1) echo " checked"; ?> onclick="return false" disabled />
							</center></td>
							<td rowspan="2"><center>
								<input type="checkbox" id="sign_tu3" name="sign_tu3" <?php if ($sign_tu3 == 1) echo " checked"; ?> value="1"/>
							</center></td>
							<td rowspan="2"><center><?php echo $keterangan3; ?></center></td>
						</tr>
						<tr>
							<td><center> </center></td>
						</tr>
						<tr>
							<td rowspan="2"><center>4. </center></td>
							<td><center>
								<input type="text" id="datepicker4" style="width:100px;" placeholder="Pilih Tanggal" name="hari_dan_tgl_rencana4" value="<?php echo $hari_dan_tgl_rencana4; ?>">
							</center></td>
							<td rowspan="2"><center><?php echo $hari_dan_tgl_realisasi4; ?></center></td>
							<td rowspan="2"><center><?php echo $jam_mulai4; ?></center></td>
							<td rowspan="2"><center><?php echo $jam_selesai4; ?></center></td>
							<td rowspan="2"><center>
								<?php 
									for ($i = 0; $i <= 9; $i++) {
										if ($materi_kuliah4_[$i] != "") {
								?>
									<input class="form-control" type="text" style="width:250px;" placeholder="Materi Kuliah 4.<?php echo $i+1; ?>" value="<?php echo $materi_kuliah4_[$i]; ?>" readonly disabled ></br>
								<?php
										}
									}
								?>
							</center></td>
							<td rowspan="2"><center>
								<input type="checkbox" id="sign_dosen4" name="sign_dosen4" <?php if ($sign_dosen4 == 1) echo " checked"; ?> onclick="return false" disabled />
							</center></td>
							<td rowspan="2"><center>
								<input type="checkbox" id="sign_mahasiswa4" name="sign_mahasiswa4" <?php if ($sign_mahasiswa4 == 1) echo " checked"; ?> onclick="return false" disabled />
							</center></td>
							<td rowspan="2"><center>
								<input type="checkbox" id="sign_tu4" name="sign_tu4" <?php if ($sign_tu4 == 1) echo " checked"; ?> value="1"/>
							</center></td>
							<td rowspan="2"><center><?php echo $keterangan4; ?></center></td>
						</tr>
						<tr>
							<td><center> </center></td>
						</tr>
						<tr>
							<td rowspan="2"><center>5. </center></td>
							<td><center>
								<input type="text" id="datepicker5" style="width:100px;" placeholder="Pilih Tanggal" name="hari_dan_tgl_rencana5" value="<?php echo $hari_dan_tgl_rencana5; ?>">
							</center></td>
							<td rowspan="2"><center><?php echo $hari_dan_tgl_realisasi5; ?></center></td>
							<td rowspan="2"><center><?php echo $jam_mulai5; ?></center></td>
							<td rowspan="2"><center><?php echo $jam_selesai5; ?></center></td>
							<td rowspan="2"><center>
								<?php 
									for ($i = 0; $i <= 9; $i++) {
										if ($materi_kuliah5_[$i] != "") {
								?>
									<input class="form-control" type="text" style="width:250px;" placeholder="Materi Kuliah 5.<?php echo $i+1; ?>" value="<?php echo $materi_kuliah5_[$i]; ?>" readonly disabled ></br>
								<?php
										}
									}
								?>
							</center></td>
							<td rowspan="2"><center>
								<input type="checkbox" id="sign_dosen5" name="sign_dosen5" <?php if ($sign_dosen5 == 1) echo " checked"; ?> onclick="return false" disabled />
							</center></td>
							<td rowspan="2"><center>
								<input type="checkbox" id="sign_mahasiswa5" name="sign_mahasiswa5" <?php if ($sign_mahasiswa5 == 1) echo " checked"; ?> onclick="return false" disabled />
							</center></td>
							<td rowspan="2"><center>
								<input type="checkbox" id="sign_tu5" name="sign_tu5" <?php if ($sign_tu5 == 1) echo " checked"; ?> value="1"/>
							</center></td>
							<td rowspan="2"><center><?php echo $keterangan5; ?></center></td>
						</tr>
						<tr>
							<td><center> </center></td>
						</tr>
						<tr>
							<td rowspan="2"><center>6. </center></td>
							<td><center>
								<input type="text" id="datepicker6" style="width:100px;" placeholder="Pilih Tanggal" name="hari_dan_tgl_rencana6" value="<?php echo $hari_dan_tgl_rencana6; ?>">
							</center></td>
							<td rowspan="2"><center><?php echo $hari_dan_tgl_realisasi6; ?></center></td>
							<td rowspan="2"><center><?php echo $jam_mulai6; ?></center></td>
							<td rowspan="2"><center><?php echo $jam_selesai6; ?></center></td>
							<td rowspan="2"><center>
								<?php 
									for ($i = 0; $i <= 9; $i++) {
										if ($materi_kuliah6_[$i] != "") {
								?>
									<input class="form-control" type="text" style="width:250px;" placeholder="Materi Kuliah 6.<?php echo $i+1; ?>" value="<?php echo $materi_kuliah6_[$i]; ?>" readonly disabled ></br>
								<?php
										}
									}
								?>
							</center></td>
							<td rowspan="2"><center>
								<input type="checkbox" id="sign_dosen6" name="sign_dosen6" <?php if ($sign_dosen6 == 1) echo " checked"; ?> onclick="return false" disabled />
							</center></td>
							<td rowspan="2"><center>
								<input type="checkbox" id="sign_mahasiswa6" name="sign_mahasiswa6" <?php if ($sign_mahasiswa6 == 1) echo " checked"; ?> onclick="return false" disabled />
							</center></td>
							<td rowspan="2"><center>
								<input type="checkbox" id="sign_tu6" name="sign_tu6" <?php if ($sign_tu6 == 1) echo " checked"; ?> value="1"/>
							</center></td>
							<td rowspan="2"><center><?php echo $keterangan6; ?></center></td>
						</tr>
						<tr>
							<td><center> </center></td>
						</tr>
						<tr>
							<td rowspan="2"><center>7. </center></td>
							<td><center>
								<input type="text" id="datepicker7" style="width:100px;" placeholder="Pilih Tanggal" name="hari_dan_tgl_rencana7" value="<?php echo $hari_dan_tgl_rencana7; ?>">
							</center></td>
							<td rowspan="2"><center><?php echo $hari_dan_tgl_realisasi7; ?></center></td>
							<td rowspan="2"><center><?php echo $jam_mulai7; ?></center></td>
							<td rowspan="2"><center><?php echo $jam_selesai7; ?></center></td>
							<td rowspan="2"><center>
								<?php 
									for ($i = 0; $i <= 9; $i++) {
										if ($materi_kuliah7_[$i] != "") {
								?>
									<input class="form-control" type="text" style="width:250px;" placeholder="Materi Kuliah 7.<?php echo $i+1; ?>" value="<?php echo $materi_kuliah7_[$i]; ?>" readonly disabled ></br>
								<?php
										}
									}
								?>
							</center></td>
							<td rowspan="2"><center>
								<input type="checkbox" id="sign_dosen7" name="sign_dosen7" <?php if ($sign_dosen7 == 1) echo " checked"; ?> onclick="return false" disabled />
							</center></td>
							<td rowspan="2"><center>
								<input type="checkbox" id="sign_mahasiswa7" name="sign_mahasiswa7" <?php if ($sign_mahasiswa7 == 1) echo " checked"; ?> onclick="return false" disabled />
							</center></td>
							<td rowspan="2"><center>
								<input type="checkbox" id="sign_tu7" name="sign_tu7" <?php if ($sign_tu7 == 1) echo " checked"; ?> value="1"/>
							</center></td>
							<td rowspan="2"><center><?php echo $keterangan7; ?></center></td>
						</tr>
						<tr>
							<td><center> </center></td>
						</tr>
						<tr>
							<td rowspan="2"><center>8. </center></td>
							<td><center>
								<input type="text" id="datepicker8" style="width:100px;" placeholder="Pilih Tanggal" name="hari_dan_tgl_rencana8" value="<?php echo $hari_dan_tgl_rencana8; ?>">
							</center></td>
							<td rowspan="2"><center><?php echo $hari_dan_tgl_realisasi8; ?></center></td>
							<td rowspan="2"><center><?php echo $jam_mulai8; ?></center></td>
							<td rowspan="2"><center><?php echo $jam_selesai8; ?></center></td>
							<td rowspan="2"><center>
								<?php 
									for ($i = 0; $i <= 9; $i++) {
										if ($materi_kuliah8_[$i] != "") {
								?>
									<input class="form-control" type="text" style="width:250px;" placeholder="Materi Kuliah 8.<?php echo $i+1; ?>" value="<?php echo $materi_kuliah8_[$i]; ?>" readonly disabled ></br>
								<?php
										}
									}
								?>
							</center></td>
							<td rowspan="2"><center>
								<input type="checkbox" id="sign_dosen8" name="sign_dosen8" <?php if ($sign_dosen8 == 1) echo " checked"; ?> onclick="return false" disabled />
							</center></td>
							<td rowspan="2"><center>
								<input type="checkbox" id="sign_mahasiswa8" name="sign_mahasiswa8" <?php if ($sign_mahasiswa8 == 1) echo " checked"; ?> onclick="return false" disabled />
							</center></td>
							<td rowspan="2"><center>
								<input type="checkbox" id="sign_tu8" name="sign_tu8" <?php if ($sign_tu8 == 1) echo " checked"; ?> value="1"/>
							</center></td>
							<td rowspan="2"><center><?php echo $keterangan8; ?></center></td>
						</tr>
						<tr>
							<td><center> </center></td>
						</tr>
					</table>
					<div class="text-center"><button type="submit" name="submit" class="btn btn-primary btn-lg" required="required">Simpan</button></div>
					</br>
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
				
				$id_pelaksanaan_perkuliahan = $kd_mata_kuliah . "-" . $semester . "-PRAKTIKUM-2";
				
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
				
				$sql5 = "SELECT * FROM laboratorium WHERE kd_ruang='$kd_ruang'";
				if (!$result5 = $mysqli->query($sql5)) {
					$message5 = "Sorry, the website is experiencing problems.";
					echo "<script type='text/javascript'>alert('$message5');</script>";
					exit;
				}
				
				$nama_lab = "";
				$nik_tata_usaha = "";
				
				$data5 = $result5->fetch_assoc();
				$nama_lab = $data5['nama_lab'];
				$nik_tata_usaha = $data5['nik_dosen_pj'];
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
			?>
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
				
				<form action="admin_data_pelaksanaan_perkuliahan_praktikum_kueri_insert.php" method="post" role="form" class="contactForm">
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
							<th><h4><b><?php echo $nama_prodi . " / " . $sks_praktikum; ?></b></h4></th>
						</tr>
						<tr>
							<th><h4><b>Hari / Jam</b></h4></th>
							<th><h4><b>&nbsp;:&nbsp;</b></h4></th>
							<th><h5><b>
								<select name="hari_perkuliahan" id="hari_perkuliahan">
									<option value="" disabled selected>Pilih Hari</option>
									<option value="Senin" <?php if ($hari_perkuliahan == 'Senin') echo ' selected'; ?>>Senin</option>
									<option value="Selasa" <?php if ($hari_perkuliahan == 'Selasa') echo ' selected'; ?>>Selasa</option>
									<option value="Rabu" <?php if ($hari_perkuliahan == 'Rabu') echo ' selected'; ?>>Rabu</option>
									<option value="Kamis" <?php if ($hari_perkuliahan == 'Kamis') echo ' selected'; ?>>Kamis</option>
									<option value="Jum'at" <?php if ($hari_perkuliahan == "Jum'at") echo ' selected'; ?>>Jum'at</option>
									<option value="Sabtu" <?php if ($hari_perkuliahan == 'Sabtu') echo ' selected'; ?>>Sabtu</option>
								</select>
								<input type="text" name="jam_mulai" id="jam_mulai" style="width:150px;" placeholder="Jam Mulai" value="<?php echo $jam[0]; ?>">
								<input type="text" name="jam_selesai" id="jam_selesai" style="width:150px;" placeholder="Jam Selesai" value="<?php if (isset($jam[1])) echo $jam[1]; ?>">
							</b></h5></th>
						</tr>
						<tr>
							<th><h4><b>Nama Dosen</b></h4></th>
							<th><h4><b>&nbsp;:&nbsp;</b></h4></th>
							<th><h4><b><?php echo $nama_dosen; ?></b></h4></th>
						</tr>
						<tr>
							<th><h4><b>Lab</b></h4></th>
							<th><h4><b>&nbsp;:&nbsp;</b></h4></th>
							<th><h5><b>
								<select name="lab" id="lab">
									<option value="" disabled selected>Pilih Lab</option>
									<?php
										require ("config/config.php");
										$sql3 = "SELECT * from laboratorium WHERE kd_prodi='".$_SESSION['kd_prodi']."'";
										
										if (!$result3 = $mysqli->query($sql3)) {
											$message3 = "Sorry, the website is experiencing problems.";
											echo "<script type='text/javascript'>alert('$message3');</script>";
										}
									?>
									<?php
										while ($data3 = $result3->fetch_assoc()) {
									?>
									<option value="<?php echo $data3['nama_lab'];?>"
									<?php
										if ($nama_lab == $data3['nama_lab']) {
											echo ' selected="selected"';
										} 
									?>
										>
									<?php
											echo $data3['nama_lab'];
									?>
									</option>
									<?php
										}
									?>
								</select>
								
								<script>
									$('#lab').on('change', function() {
										var lab = this.value;
										
										if (lab != "") {
											$.post('ajax_get_kode_ruang.php', {nama_lab:lab},
											function(data) {
												$('#kd_ruang').val(data);
											});
										}
										else {
											$('#kd_ruang').val("");
										}
									});
								</script>
								<input type="hidden" name="kd_ruang" id="kd_ruang" value="<?php echo $kd_ruang; ?>"/>
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
								<input type="text" id="datepicker1" style="width:100px;" placeholder="Pilih Tanggal" name="hari_dan_tgl_rencana1" value="<?php echo $hari_dan_tgl_rencana1; ?>">
							</center></td>
							<td rowspan="2"><center><?php echo $hari_dan_tgl_realisasi1; ?></center></td>
							<td rowspan="2"><center><?php echo $jam_mulai1; ?></center></td>
							<td rowspan="2"><center><?php echo $jam_selesai1; ?></center></td>
							<td rowspan="2"><center>
								<?php 
									for ($i = 0; $i <= 9; $i++) {
										if ($materi_kuliah1_[$i] != "") {
								?>
									<input class="form-control" type="text" style="width:250px;" placeholder="Materi Kuliah 1.<?php echo $i+1; ?>" value="<?php echo $materi_kuliah1_[$i]; ?>" readonly disabled ></br>
								<?php
										}
									}
								?>
							</center></td>
							<td rowspan="2"><center>
								<input type="checkbox" id="sign_dosen1" name="sign_dosen1" <?php if ($sign_dosen1 == 1) echo " checked"; ?> onclick="return false" disabled />
							</center></td>
							<td rowspan="2"><center>
								<input type="checkbox" id="sign_mahasiswa1" name="sign_mahasiswa1" <?php if ($sign_mahasiswa1 == 1) echo " checked"; ?> onclick="return false" disabled />
							</center></td>
							<td rowspan="2"><center>
								<input type="checkbox" id="sign_tu1" name="sign_tu1" <?php if ($sign_tu1 == 1) echo " checked"; ?> value="1"/>
							</center></td>
							<td rowspan="2"><center><?php echo $keterangan1; ?></center></td>
						</tr>
						<tr>
							<td><center> </center></td>
						</tr>
						<tr>
							<td rowspan="2"><center>2. </center></td>
							<td><center>
								<input type="text" id="datepicker2" style="width:100px;" placeholder="Pilih Tanggal" name="hari_dan_tgl_rencana2" value="<?php echo $hari_dan_tgl_rencana2; ?>">
							</center></td>
							<td rowspan="2"><center><?php echo $hari_dan_tgl_realisasi2; ?></center></td>
							<td rowspan="2"><center><?php echo $jam_mulai2; ?></center></td>
							<td rowspan="2"><center><?php echo $jam_selesai2; ?></center></td>
							<td rowspan="2"><center>
								<?php 
									for ($i = 0; $i <= 9; $i++) {
										if ($materi_kuliah2_[$i] != "") {
								?>
									<input class="form-control" type="text" style="width:250px;" placeholder="Materi Kuliah 2.<?php echo $i+1; ?>" value="<?php echo $materi_kuliah2_[$i]; ?>" readonly disabled ></br>
								<?php
										}
									}
								?>
							</center></td>
							<td rowspan="2"><center>
								<input type="checkbox" id="sign_dosen2" name="sign_dosen2" <?php if ($sign_dosen2 == 1) echo " checked"; ?> onclick="return false" disabled />
							</center></td>
							<td rowspan="2"><center>
								<input type="checkbox" id="sign_mahasiswa2" name="sign_mahasiswa2" <?php if ($sign_mahasiswa2 == 1) echo " checked"; ?> onclick="return false" disabled />
							</center></td>
							<td rowspan="2"><center>
								<input type="checkbox" id="sign_tu2" name="sign_tu2" <?php if ($sign_tu2 == 1) echo " checked"; ?> value="1"/>
							</center></td>
							<td rowspan="2"><center><?php echo $keterangan2; ?></center></td>
						</tr>
						<tr>
							<td><center> </center></td>
						</tr>
						<tr>
							<td rowspan="2"><center>3. </center></td>
							<td><center>
								<input type="text" id="datepicker3" style="width:100px;" placeholder="Pilih Tanggal" name="hari_dan_tgl_rencana3" value="<?php echo $hari_dan_tgl_rencana3; ?>">
							</center></td>
							<td rowspan="2"><center><?php echo $hari_dan_tgl_realisasi3; ?></center></td>
							<td rowspan="2"><center><?php echo $jam_mulai3; ?></center></td>
							<td rowspan="2"><center><?php echo $jam_selesai3; ?></center></td>
							<td rowspan="2"><center>
								<?php 
									for ($i = 0; $i <= 9; $i++) {
										if ($materi_kuliah3_[$i] != "") {
								?>
									<input class="form-control" type="text" style="width:250px;" placeholder="Materi Kuliah 3.<?php echo $i+1; ?>" value="<?php echo $materi_kuliah3_[$i]; ?>" readonly disabled ></br>
								<?php
										}
									}
								?>
							</center></td>
							<td rowspan="2"><center>
								<input type="checkbox" id="sign_dosen3" name="sign_dosen3" <?php if ($sign_dosen3 == 1) echo " checked"; ?> onclick="return false" disabled />
							</center></td>
							<td rowspan="2"><center>
								<input type="checkbox" id="sign_mahasiswa3" name="sign_mahasiswa3" <?php if ($sign_mahasiswa3 == 1) echo " checked"; ?> onclick="return false" disabled />
							</center></td>
							<td rowspan="2"><center>
								<input type="checkbox" id="sign_tu3" name="sign_tu3" <?php if ($sign_tu3 == 1) echo " checked"; ?> value="1"/>
							</center></td>
							<td rowspan="2"><center><?php echo $keterangan3; ?></center></td>
						</tr>
						<tr>
							<td><center> </center></td>
						</tr>
						<tr>
							<td rowspan="2"><center>4. </center></td>
							<td><center>
								<input type="text" id="datepicker4" style="width:100px;" placeholder="Pilih Tanggal" name="hari_dan_tgl_rencana4" value="<?php echo $hari_dan_tgl_rencana4; ?>">
							</center></td>
							<td rowspan="2"><center><?php echo $hari_dan_tgl_realisasi4; ?></center></td>
							<td rowspan="2"><center><?php echo $jam_mulai4; ?></center></td>
							<td rowspan="2"><center><?php echo $jam_selesai4; ?></center></td>
							<td rowspan="2"><center>
								<?php 
									for ($i = 0; $i <= 9; $i++) {
										if ($materi_kuliah4_[$i] != "") {
								?>
									<input class="form-control" type="text" style="width:250px;" placeholder="Materi Kuliah 4.<?php echo $i+1; ?>" value="<?php echo $materi_kuliah4_[$i]; ?>" readonly disabled ></br>
								<?php
										}
									}
								?>
							</center></td>
							<td rowspan="2"><center>
								<input type="checkbox" id="sign_dosen4" name="sign_dosen4" <?php if ($sign_dosen4 == 1) echo " checked"; ?> onclick="return false" disabled />
							</center></td>
							<td rowspan="2"><center>
								<input type="checkbox" id="sign_mahasiswa4" name="sign_mahasiswa4" <?php if ($sign_mahasiswa4 == 1) echo " checked"; ?> onclick="return false" disabled />
							</center></td>
							<td rowspan="2"><center>
								<input type="checkbox" id="sign_tu4" name="sign_tu4" <?php if ($sign_tu4 == 1) echo " checked"; ?> value="1"/>
							</center></td>
							<td rowspan="2"><center><?php echo $keterangan4; ?></center></td>
						</tr>
						<tr>
							<td><center> </center></td>
						</tr>
						<tr>
							<td rowspan="2"><center>5. </center></td>
							<td><center>
								<input type="text" id="datepicker5" style="width:100px;" placeholder="Pilih Tanggal" name="hari_dan_tgl_rencana5" value="<?php echo $hari_dan_tgl_rencana5; ?>">
							</center></td>
							<td rowspan="2"><center><?php echo $hari_dan_tgl_realisasi5; ?></center></td>
							<td rowspan="2"><center><?php echo $jam_mulai5; ?></center></td>
							<td rowspan="2"><center><?php echo $jam_selesai5; ?></center></td>
							<td rowspan="2"><center>
								<?php 
									for ($i = 0; $i <= 9; $i++) {
										if ($materi_kuliah5_[$i] != "") {
								?>
									<input class="form-control" type="text" style="width:250px;" placeholder="Materi Kuliah 5.<?php echo $i+1; ?>" value="<?php echo $materi_kuliah5_[$i]; ?>" readonly disabled ></br>
								<?php
										}
									}
								?>
							</center></td>
							<td rowspan="2"><center>
								<input type="checkbox" id="sign_dosen5" name="sign_dosen5" <?php if ($sign_dosen5 == 1) echo " checked"; ?> onclick="return false" disabled />
							</center></td>
							<td rowspan="2"><center>
								<input type="checkbox" id="sign_mahasiswa5" name="sign_mahasiswa5" <?php if ($sign_mahasiswa5 == 1) echo " checked"; ?> onclick="return false" disabled />
							</center></td>
							<td rowspan="2"><center>
								<input type="checkbox" id="sign_tu5" name="sign_tu5" <?php if ($sign_tu5 == 1) echo " checked"; ?> value="1"/>
							</center></td>
							<td rowspan="2"><center><?php echo $keterangan5; ?></center></td>
						</tr>
						<tr>
							<td><center> </center></td>
						</tr>
						<tr>
							<td rowspan="2"><center>6. </center></td>
							<td><center>
								<input type="text" id="datepicker6" style="width:100px;" placeholder="Pilih Tanggal" name="hari_dan_tgl_rencana6" value="<?php echo $hari_dan_tgl_rencana6; ?>">
							</center></td>
							<td rowspan="2"><center><?php echo $hari_dan_tgl_realisasi6; ?></center></td>
							<td rowspan="2"><center><?php echo $jam_mulai6; ?></center></td>
							<td rowspan="2"><center><?php echo $jam_selesai6; ?></center></td>
							<td rowspan="2"><center>
								<?php 
									for ($i = 0; $i <= 9; $i++) {
										if ($materi_kuliah6_[$i] != "") {
								?>
									<input class="form-control" type="text" style="width:250px;" placeholder="Materi Kuliah 6.<?php echo $i+1; ?>" value="<?php echo $materi_kuliah6_[$i]; ?>" readonly disabled ></br>
								<?php
										}
									}
								?>
							</center></td>
							<td rowspan="2"><center>
								<input type="checkbox" id="sign_dosen6" name="sign_dosen6" <?php if ($sign_dosen6 == 1) echo " checked"; ?> onclick="return false" disabled />
							</center></td>
							<td rowspan="2"><center>
								<input type="checkbox" id="sign_mahasiswa6" name="sign_mahasiswa6" <?php if ($sign_mahasiswa6 == 1) echo " checked"; ?> onclick="return false" disabled />
							</center></td>
							<td rowspan="2"><center>
								<input type="checkbox" id="sign_tu6" name="sign_tu6" <?php if ($sign_tu6 == 1) echo " checked"; ?> value="1"/>
							</center></td>
							<td rowspan="2"><center><?php echo $keterangan6; ?></center></td>
						</tr>
						<tr>
							<td><center> </center></td>
						</tr>
						<tr>
							<td rowspan="2"><center>7. </center></td>
							<td><center>
								<input type="text" id="datepicker7" style="width:100px;" placeholder="Pilih Tanggal" name="hari_dan_tgl_rencana7" value="<?php echo $hari_dan_tgl_rencana7; ?>">
							</center></td>
							<td rowspan="2"><center><?php echo $hari_dan_tgl_realisasi7; ?></center></td>
							<td rowspan="2"><center><?php echo $jam_mulai7; ?></center></td>
							<td rowspan="2"><center><?php echo $jam_selesai7; ?></center></td>
							<td rowspan="2"><center>
								<?php 
									for ($i = 0; $i <= 9; $i++) {
										if ($materi_kuliah7_[$i] != "") {
								?>
									<input class="form-control" type="text" style="width:250px;" placeholder="Materi Kuliah 7.<?php echo $i+1; ?>" value="<?php echo $materi_kuliah7_[$i]; ?>" readonly disabled ></br>
								<?php
										}
									}
								?>
							</center></td>
							<td rowspan="2"><center>
								<input type="checkbox" id="sign_dosen7" name="sign_dosen7" <?php if ($sign_dosen7 == 1) echo " checked"; ?> onclick="return false" disabled />
							</center></td>
							<td rowspan="2"><center>
								<input type="checkbox" id="sign_mahasiswa7" name="sign_mahasiswa7" <?php if ($sign_mahasiswa7 == 1) echo " checked"; ?> onclick="return false" disabled />
							</center></td>
							<td rowspan="2"><center>
								<input type="checkbox" id="sign_tu7" name="sign_tu7" <?php if ($sign_tu7 == 1) echo " checked"; ?> value="1"/>
							</center></td>
							<td rowspan="2"><center><?php echo $keterangan7; ?></center></td>
						</tr>
						<tr>
							<td><center> </center></td>
						</tr>
						<tr>
							<td rowspan="2"><center>8. </center></td>
							<td><center>
								<input type="text" id="datepicker8" style="width:100px;" placeholder="Pilih Tanggal" name="hari_dan_tgl_rencana8" value="<?php echo $hari_dan_tgl_rencana8; ?>">
							</center></td>
							<td rowspan="2"><center><?php echo $hari_dan_tgl_realisasi8; ?></center></td>
							<td rowspan="2"><center><?php echo $jam_mulai8; ?></center></td>
							<td rowspan="2"><center><?php echo $jam_selesai8; ?></center></td>
							<td rowspan="2"><center>
								<?php 
									for ($i = 0; $i <= 9; $i++) {
										if ($materi_kuliah8_[$i] != "") {
								?>
									<input class="form-control" type="text" style="width:250px;" placeholder="Materi Kuliah 8.<?php echo $i+1; ?>" value="<?php echo $materi_kuliah8_[$i]; ?>" readonly disabled ></br>
								<?php
										}
									}
								?>
							</center></td>
							<td rowspan="2"><center>
								<input type="checkbox" id="sign_dosen8" name="sign_dosen8" <?php if ($sign_dosen8 == 1) echo " checked"; ?> onclick="return false" disabled />
							</center></td>
							<td rowspan="2"><center>
								<input type="checkbox" id="sign_mahasiswa8" name="sign_mahasiswa8" <?php if ($sign_mahasiswa8 == 1) echo " checked"; ?> onclick="return false" disabled />
							</center></td>
							<td rowspan="2"><center>
								<input type="checkbox" id="sign_tu8" name="sign_tu8" <?php if ($sign_tu8 == 1) echo " checked"; ?> value="1"/>
							</center></td>
							<td rowspan="2"><center><?php echo $keterangan8; ?></center></td>
						</tr>
						<tr>
							<td><center> </center></td>
						</tr>
					</table>
					<div class="text-center"><button type="submit" name="submit" class="btn btn-primary btn-lg" required="required">Simpan</button></div>
					</br>
				</form>
			</div>
		</div>
	</div>
	
	<?php
		} else {
			header('location:admin_data_mata_kuliah_lihat.php');
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