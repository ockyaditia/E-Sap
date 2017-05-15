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
				<li><a href="index.php">Beranda</a></li>
				<li>Data Perkuliahan</li>			
			</div>		
		</div>	
	</div>
	
	<?php
		include("head.php");
	?>
	
	<div class="services">
		<div class="container">
			<h3>Data Perkuliahan</h3>
			<hr>
			<div>
				<center>
					<h4>Mahasiswa/i</h4>
					<a href="admin_data_mahasiswa.php"><img src="images/student.png" class="img-responsive" width="100"></a>
				</center>
			</div>
			<div class="col-md-4">
				<center>
					<h4>Ruang Kelas</h4>
					<a href="admin_data_ruang_lihat.php"><img src="images/student.png" class="img-responsive" width="100"></a>
				</center>
			</div>
			<div class="col-md-4">
				<center>
					<h4>Laboratorium</h4>
					<a href="admin_data_laboratorium_lihat.php"><img src="images/student.png" class="img-responsive" width="100"></a>
				</center>
			</div>
			<div class="col-md-4">
				<center>
					<h4>Mata Kuliah</h4>
					<a href="admin_data_mata_kuliah_lihat.php"><img src="images/student.png" class="img-responsive" width="100"></a>
				</center>
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
    
</body>
</html>