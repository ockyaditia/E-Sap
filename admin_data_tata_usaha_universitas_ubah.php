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
				<li>Ubah Tata Usaha Universitas</li>			
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
				url		: "check_availability_kd_tata_usaha_ubah.php",
				data	: 'nik='+$("#nik").val()+'&nik_old='+$("#nik_old").val(),
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
	<script>
		function checkRePassword() {
			$("#loaderIcon2").show();
			jQuery.ajax({
				url		: "check_re_password.php",
				data	: 'password='+$("#password").val()+'&re_password='+$("#re_password").val(),
				type	: "POST",
				success	: function(data){
					$("#user-re-password").html(data);
					$("#loaderIcon2").hide();
				},
				error	: function (){
				
				}
			});
		}
	</script>
	
	<section id="contact-page">
        <div class="container">
            <div class="center">
                <h2>Data Tata Usaha Universitas</h2>
            </div> 
            <div class="row contact-wrap">
				<?php
					if (isset($_GET['fail']) && $_GET['fail'] == 1062) {
				?>
					<div class="alert alert-danger" role="alert">
						<center><strong>Gagal Ubah Data!</strong>. NIK Telah Terdaftar.</center>
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
						$nik = $_GET['ubah'];
				?>
                <div class="col-md-6 col-md-offset-3">
                    <div id="sendmessage">Your message has been sent. Thank you!</div>
                    <div id="errormessage"></div>
					
					<?php
						require ("config/config.php");
						$sql = "SELECT mst_tata_usaha.nik, mst_tata_usaha.nama_tata_usaha, user_akses.username FROM mst_tata_usaha INNER JOIN user_akses ON mst_tata_usaha.nik = user_akses.kd_user WHERE mst_tata_usaha.nik='$nik'";
						if (!$result = $mysqli->query($sql)) {
							$message = "Sorry, the website is experiencing problems.";
							echo "<script type='text/javascript'>alert('$message');</script>";
							exit;
						}
						
						while ($data = $result->fetch_assoc()) {
							$nama_tata_usaha = $data['nama_tata_usaha'];
							$username = $data['username'];
						}
					?>
						
                    <form action="admin_data_tata_usaha_universitas_kueri_update.php" method="post" role="form" class="contactForm">
						<div class="form-group">
								<input type="hidden" class="form-control" name="nik_old" id="nik_old" required value="<?php echo $nik; ?>"/>
								<input type="number" class="form-control" name="nik" id="nik" placeholder="NIK" data-rule="minlen:4" data-msg="Please enter at least 4 chars" onBlur="checkAvailability()" required value="<?php echo $nik; ?>"/>
								<span id="user-availability-status"></span>
								<p><img src="images/LoaderIcon.gif" id="loaderIcon" style="display:none" width="100" height="70"/></p>
								<div class="validation"></div>
						</div>
						<div class="form-group">
								<input type="text" class="form-control" name="nama_tata_usaha" id="nama_tata_usaha" placeholder="Nama" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" required value="<?php echo $nama_tata_usaha; ?>"/>
								<div class="validation"></div>
						</div>
						<div class="form-group">
								<input type="text" class="form-control" name="username" id="username" placeholder="Nama Pengguna" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" required value="<?php echo $username; ?>"/>
								<div class="validation"></div>
						</div>
						<div class="form-group">
								<input type="password" class="form-control" name="password" id="password" placeholder="Kata Sandi" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" required />
								<div class="validation"></div>
						</div>
						<div class="form-group">
								<input type="password" class="form-control" name="re_password" id="re_password" placeholder="Ulangi Kata Sandi" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" onBlur="checkRePassword()" required />
								<span id="user-re-password"></span>
								<p><img src="images/LoaderIcon.gif" id="loaderIcon2" style="display:none" width="100" height="70"/></p>
								<div class="validation"></div>
						</div>
                        <div class="text-center"><button type="submit" name="submit" class="btn btn-primary btn-lg" required="required">Ubah</button></div>
                    </form>
                </div>
				<?php
					} else {
						header('location:admin_data_tata_usaha_universitas_lihat.php');
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