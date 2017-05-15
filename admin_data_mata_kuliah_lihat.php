<!DOCTYPE html>
<?php
	session_start();
	include("_session_tata_usaha_program_studi.php");
?>
<html lang="en">
  <?php
	include("header.php");
  ?>
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
				<li><a href="admin_data_perkuliahan.php">Data Perkuliahan</a></li>
				<li>Data Mata Kuliah</li>			
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
					if (isset($_GET['fail']) && $_GET['fail'] == 1062) {
				?>
					<div class="alert alert-danger" role="alert">
						<center><strong>Gagal Tambah Data!</strong>. Kode Mata Kuliah Telah Terdaftar.</center>
					</div>
				<?php
					} else if (isset($_GET['fail'])) {
				?>
					<div class="alert alert-danger" role="alert">
						<center><strong>Gagal Tambah Data!</strong>.</center>
					</div>
				<?php
					}
				?>
			
				<?php
					if (isset($_GET['success']) && $_GET['success'] == 1) {
				?>
					<div class="alerts">
						<div class="alert alert-success" role="alert">
							<center><strong>Sukses Tambah Data!</strong>.</center>
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
					} else if (isset($_GET['success']) && $_GET['success'] == 3) {
				?>
					<div class="alerts">
						<div class="alert alert-success" role="alert">
							<center><strong>Sukses Hapus Data!</strong>.</center>
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
			
			<div align="right">
				<a href ="admin_data_mata_kuliah_tambah.php">
					<img src = "images/add_green.png" width="80px" height="90px" style="margin-right:120px; margin-top:10px;">
				</a>
			</div>
			
			<!-- /.panel-heading -->
			<div class="panel-body">
				<div class="dataTable_wrapper">
					<?php 
						require ("config/config.php");
						$sql = "SELECT * from mata_kuliah WHERE kd_prodi = '".$_SESSION['kd_prodi']."'";
						
						if (!$result = $mysqli->query($sql)) {
							$message = "Sorry, the website is experiencing problems.";
							echo "<script type='text/javascript'>alert('$message');</script>";
						}
					?>
					<table class="table table-striped table-bordered table-hover" id="dataTables-example">
						<thead>
							<tr>
								<th style="cursor:pointer;"><center>No <img src="data-grid/datatables/media/images/sort_both.png"></center></th>
								<th style="cursor:pointer;"><center>Kode <img src="data-grid/datatables/media/images/sort_both.png"></center></th>
								<th style="cursor:pointer;"><center>Nama<img src="data-grid/datatables/media/images/sort_both.png"></center></th>
								<th style="cursor:pointer;"><center>Semester <img src="data-grid/datatables/media/images/sort_both.png"></center></th>
								<th style="cursor:pointer;"><center>Tahun Ajaran <img src="data-grid/datatables/media/images/sort_both.png"></center></th>
								<th style="cursor:pointer;"><center>SKS <img src="data-grid/datatables/media/images/sort_both.png"></center></th>
								<th style="cursor:pointer;"><center>Sifat <img src="data-grid/datatables/media/images/sort_both.png"></center></th>
								<th><center>SAP</center></th>
								<th><center>Perkuliahan</center></th>
								<th><center>Absensi</center></th>
								<th><center>Opsi</center></th>
							</tr>
						</thead>
						<tbody>
							<?php
								$no = 1;																
								while ($data = $result->fetch_assoc()) {
							?>
								<tr>
									<td><center><?php echo $no ?></center></td>
									<td><center><?php echo $data['kd_mata_kuliah']; ?></center></td>
									<td><center><?php echo $data['nama_mata_kuliah']; ?></center></td>
									<td><center><?php echo $data['semester']; ?></center></td>
									<td><center><?php echo $data['tahun_ajaran']; ?></center></td>
									<td><center><?php echo $data['total_sks']; ?></center></td>
									<td><center><?php echo $data['sifat']; ?></center></td>
									<td>
										<center>
											<a href="admin_data_sap_lihat.php?lihat=<?php echo $data['kd_mata_kuliah']; ?>">
												<img src="images/view_green.png" style="margin-left:10px;" width="30" height="30"/>
											</a>
										</center>
									</td>
									<td>
										<center>
											<a href="admin_data_pelaksanaan_perkuliahan_lihat.php?lihat=<?php echo $data['kd_mata_kuliah']; ?>">
												<img src="images/view_green.png" style="margin-left:10px;" width="30" height="30"/>
											</a>
										</center>
									</td>
									<td>
										<center>
											<a href="admin_data_absensi_lihat.php?lihat=<?php echo $data['kd_mata_kuliah']; ?>">
												<img src="images/view_green.png" style="margin-left:10px;" width="30" height="30"/>
											</a>
										</center>
									</td>
									<td>
										<center>
											<a href="admin_data_mata_kuliah_ubah.php?ubah=<?php echo $data['kd_mata_kuliah']; ?>">
												<img src="images/edit_green.png" style="margin-left:10px;" width="30" height="30"/>
											</a>
										
											<a href="admin_data_mata_kuliah_kueri_delete.php?hapus=<?php echo $data['kd_mata_kuliah']; ?>" onclick="return doconfirm()">
												<img src="images/delete_green.png" style="margin-left:10px;" width="30" height="30"/>
											</a>
										</center>
									</td>
									
									<script>
										function doconfirm()
										{
											job = confirm("Anda yakin akan menghapus data?");
											if (job !== true){
												return false;
											}
										}
									</script>
									
								</tr>
							<?php
									$no++;
								}
							?>  
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	
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