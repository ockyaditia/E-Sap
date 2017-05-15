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
				<li>Masuk</li>			
			</div>		
		</div>	
	</div>
	
	</br>
	
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
                <h2>Masuk e-SAP</h2>
                <p>Silahkan input data untuk masuk sistem e-SAP. Jika Anda belum terdaftar, hubungi Tata Usaha di Fakultas Anda.</p>
            </div> 
            <div class="row contact-wrap"> 
                <?php
					if (isset($_GET['fail']) && $_GET['fail'] == 1) {
				?>
					<div class="alert alert-danger" role="alert">
						<center><strong>Gagal Masuk!</strong>. Password Salah.</center>
					</div>
				<?php
					} else if (isset($_GET['fail']) && $_GET['fail'] == 2) {
				?>
					<div class="alert alert-danger" role="alert">
						<center><strong>Gagal Masuk!</strong>. Username Tidak Terdaftar.</center>
					</div>
				<?php
					} else if (isset($_GET['fail'])) {
				?>
					<div class="alert alert-danger" role="alert">
						<center><strong>Gagal Masuk!</strong>.</center>
					</div>
				<?php
					}
				?>
                <div class="col-md-6 col-md-offset-3">
                    <div id="sendmessage">Your message has been sent. Thank you!</div>
                    <div id="errormessage"></div>
                    <form action="config/authentication.php" method="post" role="form" class="contactForm">
						<div class="form-group">
								<input type="text" class="form-control" name="username" id="username" placeholder="Nama Pengguna" data-rule="minlen:4" data-msg="Please enter at least 4 chars" required />
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
                        <div class="text-center"><button type="submit" name="submit" class="btn btn-primary btn-lg" required="required">Masuk</button></div>
                    </form>
                </div>
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