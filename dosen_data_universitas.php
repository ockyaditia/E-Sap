<!DOCTYPE html>
<?php
	session_start();
	include("_session_dosen.php");
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
				<li>Data Universitas</li>
			</div>
		</div>	
	</div>
	
	<?php
		include("head.php");
	?>
	
	<div class="services">
		<div class="container">
			<h3>Data Universitas</h3>
			<hr>
			<div class="col-md-6">
				<img src="images/yarsi.jpg" class="img-responsive">
				<p>
					Universitas YARSI ialah perguruan tinggi Islam swasta yang berada di Cempaka Putih, Jakarta Pusat. Kampus Universitas YARSI berada di pusat kota Jakarta dengan luas lahan kampus 25.000 m² dan luas bangunan 19.300 m² yang terdiri dari berbagai bangunan. Selain itu YARSI telah mempunyai kampus baru Universitas YARSI bertingkat 12 lantai. Saat ini sedang dibangun Rumah Sakit Gigi dan Mulut Pendidikan Universitas YARSI dan Rumah Sakit Pendidikan Universitas YARSI dengan penambahan luas bangunan menjadi 185.000 m2.
				</p>
			</div>
			
			<div class="col-md-6">
				<div class="media">
					<ul>
						<?php
							if ($_SESSION['kd_prodi'] == "") {
						?>
						<li>
							<div class="media-left">
								<i class="fa fa-book"></i>						
							</div>
							<div class="media-body">
								<h4 class="media-heading">Data Fakultas</h4>
								<p>
									<a href="dosen_data_fakultas_lihat.php"><button class="btn btn-primary btn-lg">Lihat Daftar Fakultas</button></a>
								</p>
							</div>
						</li>
						<?php
							}
						?>
						<li>
							<div class="media-left">
								<i class="fa fa-book"></i>						
							</div>
							<div class="media-body">
								<h4 class="media-heading">Data Program Studi</h4>
								<p>
									<a href="dosen_data_program_studi_lihat.php"><button class="btn btn-primary btn-lg">Lihat Daftar Program Studi</button></a>
								</p>
							</div>
						</li>
					</ul>
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
    
</body>
</html>