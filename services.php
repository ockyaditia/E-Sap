<!DOCTYPE html>
<?php
	session_start();
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
				<li>Services</li>			
			</div>		
		</div>	
	</div>
	
	<?php
		include("head.php");
	?>
	
	<div class="services">
		<div class="container">
			<h3>Company Services</h3>
			<hr>
			<div class="col-md-6">
				<img src="images/1.jpg" class="img-responsive">
				<p> </p>
			</div>
			
			<div class="col-md-6">
				<div class="media">
					<ul>
						<li>
							<div class="media-left">
								<i class="fa fa-pencil"></i>						
							</div>
							<div class="media-body">
								<h4 class="media-heading">SAP</h4>
								<p> </p>
							</div>
						</li>
						<li>
							<div class="media-left">
								<i class="fa fa-book"></i>						
							</div>
							<div class="media-body">
								<h4 class="media-heading">Rincian Materi Kuliah</h4>
								<p> </p>
							</div>
						</li>
						<li>
							<div class="media-left">
								<i class="fa fa-rocket"></i>						
							</div>
							<div class="media-body">
								<h4 class="media-heading">Pelaksanaan Perkuliahan</h4>
								<p> </p>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>	
	
	<div class="sub-services">
		<div class="container">
			<div class="col-md-6">
				<div class="media">
					<ul>
						<li>
							<div class="media-left">
								<i class="fa fa-pencil"></i>						
							</div>
							<div class="media-body">
								<h4 class="media-heading">Ruang Kelas</h4>
								<p> </p>
							</div>
						</li>
						<li>
							<div class="media-left">
								<i class="fa fa-book"></i>						
							</div>
							<div class="media-body">
								<h4 class="media-heading">Laboratorium</h4>
								<p> </p>
							</div>
						</li>
						<li>
							<div class="media-left">
								<i class="fa fa-rocket"></i>						
							</div>
							<div class="media-body">
								<h4 class="media-heading">Absensi</h4>
								<p> </p>
							</div>
						</li>
					</ul>
				</div>
			</div>
						
			<div class="col-md-6">
				<img src="images/1.jpg" class="img-responsive">
				<p> </p>
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
	<script src="js/functions.js"></script>
    
</body>
</html>