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
				<li>Data Mahasiswa/i</li>			
			</div>		
		</div>	
	</div>
	
	<?php
		include("head.php");
	?>
	
	</br>
	</br>
	
	<div class="container" style="color:black;">
		<div class="panel panel-default">
			
			<!-- /.panel-heading -->
			<div class="panel-body">
				<div class="dataTable_wrapper">
					<?php 
						require ("config/config.php");
						$sql = "SELECT * from mst_mahasiswa WHERE kd_prodi = '".$_SESSION['kd_prodi']."'";
							
						if (!$result = $mysqli->query($sql)) {
							$message = "Sorry, the website is experiencing problems.";
							echo "<script type='text/javascript'>alert('$message');</script>";
						}
					?>
					<table class="table table-striped table-bordered table-hover" id="dataTables-example">
						<thead>
							<tr>
								<th style="cursor:pointer;"><center>No <img src="data-grid/datatables/media/images/sort_both.png"></center></th>
								<th style="cursor:pointer;"><center>NPM <img src="data-grid/datatables/media/images/sort_both.png"></center></th>
								<th style="cursor:pointer;"><center>Program Studi <img src="data-grid/datatables/media/images/sort_both.png"></center></th>
								<th style="cursor:pointer;"><center>Fakultas <img src="data-grid/datatables/media/images/sort_both.png"></center></th>
								<th style="cursor:pointer;"><center>Nama <img src="data-grid/datatables/media/images/sort_both.png"></center></th>
							</tr>
						</thead>
						<tbody>
							<?php
								$no = 1;																
								while ($data = $result->fetch_assoc()) {
							?>
								<tr>
									<td><center><?php echo $no ?></center></td>
									<td><center><?php echo $data['npm']; ?></center></td>
									<td><center>
										<?php
											$sql2 = "SELECT * from mst_program_studi WHERE kd_prodi = '".$data['kd_prodi']."'";
											if (!$result2 = $mysqli->query($sql2)) {
												$message2 = "Sorry, the website is experiencing problems.";
												echo "<script type='text/javascript'>alert('$message2');</script>";
											}
											$data2 = $result2->fetch_assoc();
											echo $data2['nama_prodi'];
										?>
									</center></td>
									<td><center>
										<?php
											$sql3 = "SELECT * from mst_fakultas WHERE kd_fakultas = '".$data2['kd_fakultas']."'";
											if (!$result3 = $mysqli->query($sql3)) {
												$message3 = "Sorry, the website is experiencing problems.";
												echo "<script type='text/javascript'>alert('$message3');</script>";
											}
											$data3 = $result3->fetch_assoc();
											echo $data3['nama_fakultas'];
										?>
									</center></td>
									<td><center><?php echo $data['nama_mahasiswa']; ?></center></td>
									
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