<!DOCTYPE html>
<?php
	session_start();
	include("_session_login.php");
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
				<li>Data Laporan Mahasiswa</li>			
			</div>		
		</div>	
	</div>
	
	<?php
		include("head.php");
	?>
	
	</br>
	</br>
	
	<div class="container" style="color:black;">
		<div class="center">
			<h2>Laporan Mahasiswa</h2>
		</div>
		
		<?php
			require ("config/config.php");
			$sql = "SELECT count(*) as total FROM mst_mahasiswa WHERE kd_prodi LIKE '%FK%'";
			if (!$result = $mysqli->query($sql)) {
				$message = "Sorry, the website is experiencing problems.";
				echo "<script type='text/javascript'>alert('$message');</script>";
				exit;
			}
			$data = $result->fetch_assoc();
			$total_fk = $data['total'];
			
			$sql = "SELECT count(*) as total FROM mst_mahasiswa WHERE kd_prodi LIKE '%FH%'";
			if (!$result = $mysqli->query($sql)) {
				$message = "Sorry, the website is experiencing problems.";
				echo "<script type='text/javascript'>alert('$message');</script>";
				exit;
			}
			$data = $result->fetch_assoc();
			$total_fh = $data['total'];
			
			$sql = "SELECT count(*) as total FROM mst_mahasiswa WHERE kd_prodi LIKE '%FE%'";
			if (!$result = $mysqli->query($sql)) {
				$message = "Sorry, the website is experiencing problems.";
				echo "<script type='text/javascript'>alert('$message');</script>";
				exit;
			}
			$data = $result->fetch_assoc();
			$total_fe = $data['total'];
			
			$sql = "SELECT count(*) as total FROM mst_mahasiswa WHERE kd_prodi LIKE '%FTI%'";
			if (!$result = $mysqli->query($sql)) {
				$message = "Sorry, the website is experiencing problems.";
				echo "<script type='text/javascript'>alert('$message');</script>";
				exit;
			}
			$data = $result->fetch_assoc();
			$total_fti = $data['total'];
			
			$sql = "SELECT count(*) as total FROM mst_mahasiswa WHERE kd_prodi LIKE '%FPsi%'";
			if (!$result = $mysqli->query($sql)) {
				$message = "Sorry, the website is experiencing problems.";
				echo "<script type='text/javascript'>alert('$message');</script>";
				exit;
			}
			$data = $result->fetch_assoc();
			$total_fpsi = $data['total'];
			
			$sql = "SELECT count(*) as total FROM mst_mahasiswa WHERE kd_prodi LIKE '%FKG%'";
			if (!$result = $mysqli->query($sql)) {
				$message = "Sorry, the website is experiencing problems.";
				echo "<script type='text/javascript'>alert('$message');</script>";
				exit;
			}
			$data = $result->fetch_assoc();
			$total_fkg = $data['total'];
		?>

		<script src="http://code.jquery.com/jquery-1.9.1.js" type="text/javascript"></script>
		<script src="https://code.highcharts.com/highcharts.js"></script>
		<script src="https://code.highcharts.com/modules/exporting.js"></script>
		<script type="text/javascript">
			$(function() {
				$('#container').highcharts({
					chart: {
						type: 'areaspline'
					},
					title: {
						text: 'Jumlah Mahasiswa Universitas YARSI'
					},
					legend: {
						layout: 'vertical',
						align: 'left',
						verticalAlign: 'top',
						x: 150,
						y: 100,
						floating: true,
						borderWidth: 1,
						backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
					},
					xAxis: {
						categories: [
							'Kedokteran Umum',
							'Hukum',
							'Ekonomi',
							'Teknologi Informasi',
							'Psikologi',
							'Kedoketaran Gigi'
						],
						plotBands: [{ // visualize the weekend
							from: 4.5,
							to: 6.5,
							color: 'rgba(68, 170, 213, .2)'
						}]
					},
					yAxis: {
						title: {
							text: 'Total Mahasiswa/i'
						}
					},
					tooltip: {
						shared: true,
						valueSuffix: ' orang'
					},
					credits: {
						enabled: false
					},
					plotOptions: {
						areaspline: {
							fillOpacity: 0.5
						}
					},
					series: [{
						name: 'Universitas YARSI',
						data: [<?php echo $total_fk ?>, <?php echo $total_fh ?>, <?php echo $total_fe ?>, <?php echo $total_fti ?>, <?php echo $total_fpsi ?>, <?php echo $total_fkg ?>]
					}]
				});
			});
		</script>

		<div id="container" style="min-width: 400px; height: 400px; margin: 0 auto"></div>
	</div>
	
	<?php
		include("footer.php");
	?>
	
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<!--<script src="js/jquery-2.1.1.min.js"></script>-->
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