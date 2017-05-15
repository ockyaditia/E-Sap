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
	
	<div id="breadcrumb">
		<div class="container">	
			<div class="breadcrumb">							
				<li><a href="admin_data_mata_kuliah_lihat.php">Data Mata Kuliah</a></li>
				<li>Data Pelaksanaan Perkuliahan</li>			
			</div>		
		</div>	
	</div>
	
	<?php
		include("head.php");
	?>
	
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
	
	<?php
		if (isset($_GET['lihat'])) {
			$kd_mata_kuliah = $_GET['lihat'];
	?>
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
	?>
	<div class="services">
		<div class="container">
			<h3>Data Perkuliahan</h3>
			<hr>
			<?php
				if ($sks_teori != 0) {
			?>
			<div class="col-md-6">
				<center>
					<h4>Teori</h4>
					<a href="admin_data_pelaksanaan_perkuliahan_teori_lihat.php?lihat=<?php echo $kd_mata_kuliah; ?>"><img src="images/student.png" class="img-responsive" width="100"></a>
				</center>
			</div>
			<?php
				}
			?>
				
			<?php
				if ($sks_praktikum != 0) {
			?>
			<div class="col-md-6">
				<center>
					<h4>Praktikum</h4>
					<a href="admin_data_pelaksanaan_perkuliahan_praktikum_lihat.php?lihat=<?php echo $kd_mata_kuliah; ?>"><img src="images/student.png" class="img-responsive" width="100"></a>
				</center>
			</div>
			<?php
				}
			?>
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
    
</body>
</html>