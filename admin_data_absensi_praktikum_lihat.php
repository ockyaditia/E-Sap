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
				<li><a href="admin_data_absensi_lihat.php?lihat=<?php echo $kd_mata_kuliah; ?>">Data Absensi</a></li>
				<li>Data Absensi Praktikum</li>			
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
				
				while ($data4 = $result4->fetch_assoc()) {
					$kd_ruang = $data4['kd_ruang'];
					$nik_tata_usaha = $data4['nik_tata_usaha'];
					$hari_perkuliahan = $data4['hari_perkuliahan'];
					$jam_perkuliahan = $data4['jam_perkuliahan'];
				}
				
				$total = 0;
				$sql4 = "SELECT count(*) as total FROM krs WHERE kd_mata_kuliah='$kd_mata_kuliah'";
				if (!$result4 = $mysqli->query($sql4)) {
					$message4 = "Sorry, the website is experiencing problems.";
					echo "<script type='text/javascript'>alert('$message4');</script>";
					exit;
				}
				$data4 = $result4->fetch_assoc();
				$total = $data4['total'];
				
				$id_absensi = $kd_mata_kuliah . "-" . $semester . "-PRAKTIKUM-1";
				
				$sql4 = "SELECT * FROM absensi WHERE id_absensi='$id_absensi'";
				if (!$result4 = $mysqli->query($sql4)) {
					$message4 = "Sorry, the website is experiencing problems.";
					echo "<script type='text/javascript'>alert('$message4');</script>";
					exit;
				}
				
				$npm = "";
				$w1 = "";
				$w2 = "";
				$w3 = "";
				$w4 = "";
				$w5 = "";
				$w6 = "";
				$w7 = "";
				$w8 = "";
				$w9 = "";
				$w10 = "";
				$w11 = "";
				$w12 = "";
				$w13 = "";
				$w14 = "";
				$w15 = "";
				$w16 = "";
				
				while ($data4 = $result4->fetch_assoc()) {
					$npm = $data4['npm'];
					$w1 = $data4['w1'];
					$w2 = $data4['w2'];
					$w3 = $data4['w3'];
					$w4 = $data4['w4'];
					$w5 = $data4['w5'];
					$w6 = $data4['w6'];
					$w7 = $data4['w7'];
					$w8 = $data4['w8'];
					$w9 = $data4['w9'];
					$w10 = $data4['w10'];
					$w11 = $data4['w11'];
					$w12 = $data4['w12'];
					$w13 = $data4['w13'];
					$w14 = $data4['w14'];
					$w15 = $data4['w15'];
					$w16 = $data4['w16'];
				}
				
				$w1__ = explode(", ", $w1);
				$w2__ = explode(", ", $w2);
				$w3__ = explode(", ", $w3);
				$w4__ = explode(", ", $w4);
				$w5__ = explode(", ", $w5);
				$w6__ = explode(", ", $w6);
				$w7__ = explode(", ", $w7);
				$w8__ = explode(", ", $w8);
				$w9__ = explode(", ", $w9);
				$w10__ = explode(", ", $w10);
				$w11__ = explode(", ", $w11);
				$w12__ = explode(", ", $w12);
				$w13__ = explode(", ", $w13);
				$w14__ = explode(", ", $w14);
				$w15__ = explode(", ", $w15);
				$w16__ = explode(", ", $w16);
						
				for ($i = 0; $i < $total; $i++) {
					if (isset($w1__[$i])) {
						$w1_[$i] = $w1__[$i];
					} else {
						$w1_[$i] = "0";
					}
				}
				
				for ($i = 0; $i < $total; $i++) {
					if (isset($w2__[$i])) {
						$w2_[$i] = $w2__[$i];
					} else {
						$w2_[$i] = "0";
					}
				}
				
				for ($i = 0; $i < $total; $i++) {
					if (isset($w3__[$i])) {
						$w3_[$i] = $w3__[$i];
					} else {
						$w3_[$i] = "0";
					}
				}
				
				for ($i = 0; $i < $total; $i++) {
					if (isset($w4__[$i])) {
						$w4_[$i] = $w4__[$i];
					} else {
						$w4_[$i] = "0";
					}
				}
				
				for ($i = 0; $i < $total; $i++) {
					if (isset($w5__[$i])) {
						$w5_[$i] = $w5__[$i];
					} else {
						$w5_[$i] = "0";
					}
				}
				
				for ($i = 0; $i < $total; $i++) {
					if (isset($w6__[$i])) {
						$w6_[$i] = $w6__[$i];
					} else {
						$w6_[$i] = "0";
					}
				}
				
				for ($i = 0; $i < $total; $i++) {
					if (isset($w7__[$i])) {
						$w7_[$i] = $w7__[$i];
					} else {
						$w7_[$i] = "0";
					}
				}
				
				for ($i = 0; $i < $total; $i++) {
					if (isset($w8__[$i])) {
						$w8_[$i] = $w8__[$i];
					} else {
						$w8_[$i] = "0";
					}
				}
				
				for ($i = 0; $i < $total; $i++) {
					if (isset($w9__[$i])) {
						$w9_[$i] = $w9__[$i];
					} else {
						$w9_[$i] = "0";
					}
				}
				
				for ($i = 0; $i < $total; $i++) {
					if (isset($w10__[$i])) {
						$w10_[$i] = $w10__[$i];
					} else {
						$w10_[$i] = "0";
					}
				}
				
				for ($i = 0; $i < $total; $i++) {
					if (isset($w11__[$i])) {
						$w11_[$i] = $w11__[$i];
					} else {
						$w11_[$i] = "0";
					}
				}
				
				for ($i = 0; $i < $total; $i++) {
					if (isset($w12__[$i])) {
						$w12_[$i] = $w12__[$i];
					} else {
						$w12_[$i] = "0";
					}
				}
				
				for ($i = 0; $i < $total; $i++) {
					if (isset($w13__[$i])) {
						$w13_[$i] = $w13__[$i];
					} else {
						$w13_[$i] = "0";
					}
				}
				
				for ($i = 0; $i < $total; $i++) {
					if (isset($w14__[$i])) {
						$w14_[$i] = $w14__[$i];
					} else {
						$w14_[$i] = "0";
					}
				}
				
				for ($i = 0; $i < $total; $i++) {
					if (isset($w15__[$i])) {
						$w15_[$i] = $w15__[$i];
					} else {
						$w15_[$i] = "0";
					}
				}
				
				for ($i = 0; $i < $total; $i++) {
					if (isset($w16__[$i])) {
						$w16_[$i] = $w16__[$i];
					} else {
						$w16_[$i] = "0";
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
			?>
			<div>
				<h3 style="margin-left:15px; margin-top:15px;"><b>UNIVERSITAS YARSI<br>FAKULTAS TEKNOLOGI INFORMASI</b></h3>
			</div>
			<br>
			<div align="center">
				<h3 style="text-transform: uppercase;"><b>DAFTAR ABSENSI<br>
					<?php
						if ($semester % 2 != 0)
							echo "Semester Ganjil ";
						else
							echo "Semester Genap ";
					?>
				Tahun Akademik <?php echo $tahun_ajaran; ?></b></h3>
				
				<form action="admin_data_absensi_praktikum_kueri_insert.php" method="post" role="form" class="contactForm">
					<input type="hidden" value="<?php echo $id_absensi; ?>" name="id_absensi" />
					<input type="hidden" value="<?php echo $kd_mata_kuliah; ?>" name="kd_mata_kuliah" />
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
							<th rowspan="2"><center>NPM </center></th>
							<th rowspan="2"><center>Nama </center></th>
							<th width="50"><center>W1 </center></th>
							<th width="50"><center>W2 </center></th>
							<th width="50"><center>W3 </center></th>
							<th width="50"><center>W4 </center></th>
							<th width="50"><center>W5 </center></th>
							<th width="50"><center>W6 </center></th>
							<th width="50"><center>W7 </center></th>
							<th width="50"><center>W8 </center></th>
							<th width="50"><center>W9 </center></th>
							<th width="50"><center>W10 </center></th>
							<th width="50"><center>W11 </center></th>
							<th width="50"><center>W12 </center></th>
							<th width="50"><center>W13 </center></th>
							<th width="50"><center>W14 </center></th>
							<th width="50"><center>W15 </center></th>
							<th width="50"><center>W16 </center></th>
						</tr>
						<tr>
							<th><center><input class="form-control" type="checkbox" id="w1_all" style="outline: 1px solid black;" onClick="toggle1(this)"/></center></th>
							<th><center><input class="form-control" type="checkbox" id="w2_all" style="outline: 1px solid black;" onClick="toggle2(this)"/></center></th>
							<th><center><input class="form-control" type="checkbox" id="w3_all" style="outline: 1px solid black;" onClick="toggle3(this)"/></center></th>
							<th><center><input class="form-control" type="checkbox" id="w4_all" style="outline: 1px solid black;" onClick="toggle4(this)"/></center></th>
							<th><center><input class="form-control" type="checkbox" id="w5_all" style="outline: 1px solid black;" onClick="toggle5(this)"/></center></th>
							<th><center><input class="form-control" type="checkbox" id="w6_all" style="outline: 1px solid black;" onClick="toggle6(this)"/></center></th>
							<th><center><input class="form-control" type="checkbox" id="w7_all" style="outline: 1px solid black;" onClick="toggle7(this)"/></center></th>
							<th><center><input class="form-control" type="checkbox" id="w8_all" style="outline: 1px solid black;" onClick="toggle8(this)"/></center></th>
							<th><center><input class="form-control" type="checkbox" id="w9_all" style="outline: 1px solid black;" onClick="toggle9(this)"/></center></th>
							<th><center><input class="form-control" type="checkbox" id="w10_all" style="outline: 1px solid black;" onClick="toggle10(this)"/></center></th>
							<th><center><input class="form-control" type="checkbox" id="w11_all" style="outline: 1px solid black;" onClick="toggle11(this)"/></center></th>
							<th><center><input class="form-control" type="checkbox" id="w12_all" style="outline: 1px solid black;" onClick="toggle12(this)"/></center></th>
							<th><center><input class="form-control" type="checkbox" id="w13_all" style="outline: 1px solid black;" onClick="toggle13(this)"/></center></th>
							<th><center><input class="form-control" type="checkbox" id="w14_all" style="outline: 1px solid black;" onClick="toggle14(this)"/></center></th>
							<th><center><input class="form-control" type="checkbox" id="w15_all" style="outline: 1px solid black;" onClick="toggle15(this)"/></center></th>
							<th><center><input class="form-control" type="checkbox" id="w16_all" style="outline: 1px solid black;" onClick="toggle16(this)"/></center></th>
						</tr>
						
						<script language="JavaScript">
							function toggle1(source) {
								checkboxes = document.getElementsByName('w1_[]');
								
								for(var i = 0, n = checkboxes.length; i < n; i++) {
									checkboxes[i].checked = source.checked;
								}
							}
						</script>
						<script language="JavaScript">
							function toggle2(source) {
								checkboxes = document.getElementsByName('w2_[]');
								
								for(var i = 0, n = checkboxes.length; i < n; i++) {
									checkboxes[i].checked = source.checked;
								}
							}
						</script>
						<script language="JavaScript">
							function toggle3(source) {
								checkboxes = document.getElementsByName('w3_[]');
								
								for(var i = 0, n = checkboxes.length; i < n; i++) {
									checkboxes[i].checked = source.checked;
								}
							}
						</script>
						<script language="JavaScript">
							function toggle4(source) {
								checkboxes = document.getElementsByName('w4_[]');
								
								for(var i = 0, n = checkboxes.length; i < n; i++) {
									checkboxes[i].checked = source.checked;
								}
							}
						</script>
						<script language="JavaScript">
							function toggle5(source) {
								checkboxes = document.getElementsByName('w5_[]');
								
								for(var i = 0, n = checkboxes.length; i < n; i++) {
									checkboxes[i].checked = source.checked;
								}
							}
						</script>
						<script language="JavaScript">
							function toggle6(source) {
								checkboxes = document.getElementsByName('w6_[]');
								
								for(var i = 0, n = checkboxes.length; i < n; i++) {
									checkboxes[i].checked = source.checked;
								}
							}
						</script>
						<script language="JavaScript">
							function toggle7(source) {
								checkboxes = document.getElementsByName('w7_[]');
								
								for(var i = 0, n = checkboxes.length; i < n; i++) {
									checkboxes[i].checked = source.checked;
								}
							}
						</script>
						<script language="JavaScript">
							function toggle8(source) {
								checkboxes = document.getElementsByName('w8_[]');
								
								for(var i = 0, n = checkboxes.length; i < n; i++) {
									checkboxes[i].checked = source.checked;
								}
							}
						</script>
						<script language="JavaScript">
							function toggle9(source) {
								checkboxes = document.getElementsByName('w9_[]');
								
								for(var i = 0, n = checkboxes.length; i < n; i++) {
									checkboxes[i].checked = source.checked;
								}
							}
						</script>
						<script language="JavaScript">
							function toggle10(source) {
								checkboxes = document.getElementsByName('w10_[]');
								
								for(var i = 0, n = checkboxes.length; i < n; i++) {
									checkboxes[i].checked = source.checked;
								}
							}
						</script>
						<script language="JavaScript">
							function toggle11(source) {
								checkboxes = document.getElementsByName('w11_[]');
								
								for(var i = 0, n = checkboxes.length; i < n; i++) {
									checkboxes[i].checked = source.checked;
								}
							}
						</script>
						<script language="JavaScript">
							function toggle12(source) {
								checkboxes = document.getElementsByName('w12_[]');
								
								for(var i = 0, n = checkboxes.length; i < n; i++) {
									checkboxes[i].checked = source.checked;
								}
							}
						</script>
						<script language="JavaScript">
							function toggle13(source) {
								checkboxes = document.getElementsByName('w13_[]');
								
								for(var i = 0, n = checkboxes.length; i < n; i++) {
									checkboxes[i].checked = source.checked;
								}
							}
						</script>
						<script language="JavaScript">
							function toggle14(source) {
								checkboxes = document.getElementsByName('w14_[]');
								
								for(var i = 0, n = checkboxes.length; i < n; i++) {
									checkboxes[i].checked = source.checked;
								}
							}
						</script>
						<script language="JavaScript">
							function toggle15(source) {
								checkboxes = document.getElementsByName('w15_[]');
								
								for(var i = 0, n = checkboxes.length; i < n; i++) {
									checkboxes[i].checked = source.checked;
								}
							}
						</script>
						<script language="JavaScript">
							function toggle16(source) {
								checkboxes = document.getElementsByName('w16_[]');
								
								for(var i = 0, n = checkboxes.length; i < n; i++) {
									checkboxes[i].checked = source.checked;
								}
							}
						</script>
						
						<?php
							$sql4 = "SELECT * FROM krs WHERE kd_mata_kuliah='$kd_mata_kuliah' ORDER BY npm ASC";
							if (!$result4 = $mysqli->query($sql4)) {
								$message4 = "Sorry, the website is experiencing problems.";
								echo "<script type='text/javascript'>alert('$message4');</script>";
								exit;
							}
							$no = 1;
							while ($data4 = $result4->fetch_assoc()) {
								$npm = $data4['npm'];
						?>
						<tr>
							<td><center><?php echo $no++; ?></center></td>
							<td><center><input class="form-control" type="text" id="npm" name="npm_[]" value="<?php echo $npm; ?>" style="width:110px;" readonly /></center></td>
							<td><center>
								<?php
									$sql5 = "SELECT * FROM mst_mahasiswa WHERE npm='$npm'";
									if (!$result5 = $mysqli->query($sql5)) {
										$message5 = "Sorry, the website is experiencing problems.";
										echo "<script type='text/javascript'>alert('$message5');</script>";
										exit;
									}
									$data5 = $result5->fetch_assoc();
									echo $data5['nama_mahasiswa'];
								?>
							</center></td>
							<td><center><input type="checkbox" id="w1_" name="w1_[]" 
								<?php 
									for ($i = 0; $i < count($w1_); $i++) {
										if ($w1_[$i] == $npm."-1") echo " checked";
									}
								?>
							value="<?php echo $npm; ?>-1" /></center></td>
							<td><center><input type="checkbox" id="w2_" name="w2_[]" 
								<?php 
									for ($i = 0; $i < count($w2_); $i++) {
										if ($w2_[$i] == $npm."-1") echo " checked";
									}
								?>
							value="<?php echo $npm; ?>-1" /></center></td>
							<td><center><input type="checkbox" id="w3_" name="w3_[]" 
								<?php 
									for ($i = 0; $i < count($w3_); $i++) {
										if ($w3_[$i] == $npm."-1") echo " checked";
									}
								?>
							value="<?php echo $npm; ?>-1" /></center></td>
							<td><center><input type="checkbox" id="w4_" name="w4_[]" 
								<?php 
									for ($i = 0; $i < count($w4_); $i++) {
										if ($w4_[$i] == $npm."-1") echo " checked";
									}
								?>
							value="<?php echo $npm; ?>-1" /></center></td>
							<td><center><input type="checkbox" id="w5_" name="w5_[]" 
								<?php 
									for ($i = 0; $i < count($w5_); $i++) {
										if ($w5_[$i] == $npm."-1") echo " checked";
									}
								?>
							value="<?php echo $npm; ?>-1" /></center></td>
							<td><center><input type="checkbox" id="w6_" name="w6_[]" 
								<?php 
									for ($i = 0; $i < count($w6_); $i++) {
										if ($w6_[$i] == $npm."-1") echo " checked";
									}
								?>
							value="<?php echo $npm; ?>-1" /></center></td>
							<td><center><input type="checkbox" id="w7_" name="w7_[]" 
								<?php 
									for ($i = 0; $i < count($w7_); $i++) {
										if ($w7_[$i] == $npm."-1") echo " checked";
									}
								?>
							value="<?php echo $npm; ?>-1" /></center></td>
							<td><center><input type="checkbox" id="w8_" name="w8_[]" 
								<?php 
									for ($i = 0; $i < count($w8_); $i++) {
										if ($w8_[$i] == $npm."-1") echo " checked";
									}
								?>
							value="<?php echo $npm; ?>-1" /></center></td>
							<td><center><input type="checkbox" id="w9_" name="w9_[]" 
								<?php 
									for ($i = 0; $i < count($w9_); $i++) {
										if ($w9_[$i] == $npm."-1") echo " checked";
									}
								?>
							value="<?php echo $npm; ?>-1" /></center></td>
							<td><center><input type="checkbox" id="w10_" name="w10_[]" 
								<?php 
									for ($i = 0; $i < count($w10_); $i++) {
										if ($w10_[$i] == $npm."-1") echo " checked";
									}
								?>
							value="<?php echo $npm; ?>-1" /></center></td>
							<td><center><input type="checkbox" id="w11_" name="w11_[]" 
								<?php 
									for ($i = 0; $i < count($w11_); $i++) {
										if ($w11_[$i] == $npm."-1") echo " checked";
									}
								?>
							value="<?php echo $npm; ?>-1" /></center></td>
							<td><center><input type="checkbox" id="w12_" name="w12_[]" 
								<?php 
									for ($i = 0; $i < count($w12_); $i++) {
										if ($w12_[$i] == $npm."-1") echo " checked";
									}
								?>
							value="<?php echo $npm; ?>-1" /></center></td>
							<td><center><input type="checkbox" id="w13_" name="w13_[]" 
								<?php 
									for ($i = 0; $i < count($w13_); $i++) {
										if ($w13_[$i] == $npm."-1") echo " checked";
									}
								?>
							value="<?php echo $npm; ?>-1" /></center></td>
							<td><center><input type="checkbox" id="w14_" name="w14_[]" 
								<?php 
									for ($i = 0; $i < count($w14_); $i++) {
										if ($w14_[$i] == $npm."-1") echo " checked";
									}
								?>
							value="<?php echo $npm; ?>-1" /></center></td>
							<td><center><input type="checkbox" id="w15_" name="w15_[]" 
								<?php 
									for ($i = 0; $i < count($w15_); $i++) {
										if ($w15_[$i] == $npm."-1") echo " checked";
									}
								?>
							value="<?php echo $npm; ?>-1" /></center></td>
							<td><center><input type="checkbox" id="w16_" name="w16_[]" <
								<?php 
									for ($i = 0; $i < count($w16_); $i++) {
										if ($w16_[$i] == $npm."-1") echo " checked";
									}
								?>
							value="<?php echo $npm; ?>-1" /></center></td>
						</tr>
						<?php
							}
						?>
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