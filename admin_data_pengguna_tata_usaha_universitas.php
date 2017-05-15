<!DOCTYPE html>
<?php
	session_start();
	include("_session_tata_usaha_universitas.php");
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
				<li><a href="admin_data_pengguna.php">Data Pengguna</a></li>
				<li>Data Pengguna Tata Usaha</li>			
			</div>		
		</div>	
	</div>
	
	<?php
		include("head.php");
	?>
	
	<div class="services">
		<div class="container">
			<h3>Data Pengguna Tata Usaha</h3>
			<hr>
			
			<div class="col-md-6">
				<div class="media">
					<ul>
						<li>
							<div class="media-left">
								<i class="fa fa-book"></i>						
							</div>
							<div class="media-body">
								<h4 class="media-heading">Data Pengguna Tata Usaha Universitas</h4>
								<p>
									<a href="admin_data_tata_usaha_universitas_lihat.php"><button class="btn btn-primary btn-lg">Lihat Daftar Tata Usaha Universitas</button></a>
									<a href="admin_data_tata_usaha_universitas_tambah.php"><button class="btn btn-primary btn-lg">Tambah Daftar Tata Usaha Universitas</button></a>
								</p>
							</div>
						</li>
						<li>
							<div class="media-left">
								<i class="fa fa-book"></i>						
							</div>
							<div class="media-body">
								<h4 class="media-heading">Data Pengguna Tata Usaha Program Studi</h4>
								<p>
									<a href="admin_data_tata_usaha_program_studi_lihat.php"><button class="btn btn-primary btn-lg">Lihat Daftar Tata Usaha Program Studi</button></a>
									<a href="admin_data_tata_usaha_program_studi_tambah.php"><button class="btn btn-primary btn-lg">Tambah Daftar Tata Usaha Program Studi</button></a>
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