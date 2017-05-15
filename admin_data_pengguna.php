<!DOCTYPE html>
<?php
	session_start();
	include("_session_tata_usaha.php");
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
				<li><a href="index.php">Beranda</a></li>
				<li>Data Pengguna</li>			
			</div>		
		</div>	
	</div>
	
	<?php
		include("head.php");
	?>
	
	<div class="services">
		<div class="container">
			<h3>Data Pengguna</h3>
			<hr>
			<div class="col-md-6">
				<center><h2>Tata Usaha</h2></center>
				<?php
					if (isset($_SESSION['kd_prodi']) && empty($_SESSION['kd_prodi'])) {
				?>
					<a href="admin_data_pengguna_tata_usaha_universitas.php"><img src="images/admin.png" class="img-responsive" width="330"></a>
				<?php
					} else {
				?>
					<a href="admin_data_tata_usaha_program_studi_lihat.php"><img src="images/admin.png" class="img-responsive" width="330"></a>
				<?php
					}
				?>
			</div>
			<?php
				if (isset($_SESSION['kd_prodi']) && !empty($_SESSION['kd_prodi'])) {
			?>
			<div class="col-md-6">
				<center><h2>Dosen</h2></center>
				<a href="admin_data_dosen_lihat.php"><img src="images/dosen.png" class="img-responsive" width="447"></a>
			</div>
			<?php
				}
			?>
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
    
</body>
</html>