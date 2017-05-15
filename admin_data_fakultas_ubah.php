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
				<li><a href="admin_data_universitas.php">Data Universitas</a></li>
				<li>Ubah Data Fakultas</li>			
			</div>		
		</div>	
	</div>
	
	<?php
		include("head.php");
	?>
	
	</br>
	
	<script>
		function checkAvailability() {
			$("#loaderIcon").show();
			jQuery.ajax({
				url		: "check_availability_kd_fakultas_ubah.php",
				data	: 'kd_fakultas='+$("#kd_fakultas").val()+'&kd_fakultas_old='+$("#kd_fakultas_old").val(),
				type	: "POST",
				success	: function(data){
					$("#user-availability-status").html(data);
					$("#loaderIcon").hide();
				},
				error	: function (){
				
				}
			});
		}
	</script>
	
	<section id="contact-page">
        <div class="container">
            <div class="center">
                <h2>Data Fakultas</h2>
            </div> 
            <div class="row contact-wrap">
				<?php
					if (isset($_GET['fail']) && $_GET['fail'] == 1062) {
				?>
					<div class="alert alert-danger" role="alert">
						<center><strong>Gagal Ubah Data!</strong>. Kode Fakultas Telah Terdaftar.</center>
					</div>
				<?php
					} else if (isset($_GET['fail'])) {
				?>
					<div class="alert alert-danger" role="alert">
						<center><strong>Gagal Ubah Data!</strong>.</center>
					</div>
				<?php
					}
				?>
					
				<?php
					if (isset($_GET['ubah'])) {
						$kd_fakultas = $_GET['ubah'];
				?>
                <div class="col-md-6 col-md-offset-3">
                    <div id="sendmessage">Your message has been sent. Thank you!</div>
                    <div id="errormessage"></div>
					
					<?php
						require ("config/config.php");
						$sql = "SELECT * from mst_fakultas WHERE kd_fakultas = '$kd_fakultas'";
						if (!$result = $mysqli->query($sql)) {
							$message = "Sorry, the website is experiencing problems.";
							echo "<script type='text/javascript'>alert('$message');</script>";
							exit;
						}
						
						while ($data = $result->fetch_assoc()) {
							$nama_fakultas = $data['nama_fakultas'];
						}
					?>
						
                    <form action="admin_data_fakultas_kueri_update.php" method="post" role="form" class="contactForm">
                            <div class="form-group">
									<input type="hidden" class="form-control" name="kd_fakultas_old" id="kd_fakultas_old" required value="<?php echo $kd_fakultas; ?>"/>
                                    <input type="text" class="form-control" name="kd_fakultas" id="kd_fakultas" placeholder="Kode Fakultas" data-rule="minlen:4" data-msg="Please enter at least 4 chars" onBlur="checkAvailability()" required value="<?php echo $kd_fakultas; ?>"/>
									<span id="user-availability-status"></span>
									<p><img src="images/LoaderIcon.gif" id="loaderIcon" style="display:none" width="100" height="70"/></p>
                                    <div class="validation"></div>
                            </div>
                            <div class="form-group">
                                    <input type="text" class="form-control" name="nama_fakultas" id="nama_fakultas" placeholder="Nama Fakultas" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" required value="<?php echo $nama_fakultas; ?>"/>
                                    <div class="validation"></div>
                            </div>
                        <div class="text-center"><button type="submit" name="submit" class="btn btn-primary btn-lg" required="required">Ubah</button></div>
                    </form>
                </div>
				<?php
					} else {
						header('location:admin_data_fakultas_lihat.php');
					}
				?>
            </div><!--/.row-->
        </div><!--/.container-->
    </section><!--/#contact-page-->
	
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