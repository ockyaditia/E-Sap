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
				<li>Daftar</li>			
			</div>		
		</div>	
	</div>
	
	<?php
		include("head.php");
	?>
	
	</br>
	
	<section id="contact-page">
        <div class="container">
            <div class="center">
                <h2>Daftar Akun e-SAP</h2>
                <p>Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div> 
            <div class="row contact-wrap"> 
                <div class="status alert alert-success" style="display: none"></div>
                <div class="col-md-6 col-md-offset-3">
                    <div id="sendmessage">Your message has been sent. Thank you!</div>
                    <div id="errormessage"></div>
                    <form action="" method="post" role="form" class="contactForm">
						<div class="form-group">
								<input type="text" class="form-control"name="name"  id="name" placeholder="Nama" data-rule="minlen:4" data-msg="Please enter at least 4 chars" required />
								<div class="validation"></div>
						</div>
						<div class="form-group">
								<input type="email" class="form-control" name="email" id="email" placeholder="Email" data-rule="email" data-msg="Please enter a valid email" required />
								<div class="validation"></div>
						</div>
						<div class="form-group">
								<input type="text" class="form-control" name="username" id="username" placeholder="Nama Pengguna" data-rule="minlen:4" data-msg="Please enter at least 4 chars" required />
								<div class="validation"></div>
						</div>
						<div class="form-group">
								<input type="password" class="form-control" name="password" id="password" placeholder="Kata Sandi" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" required />
								<div class="validation"></div>
						</div>
						<div class="form-group">
								<input type="password" class="form-control" name="re_password" id="re_password" placeholder="Ulangi Kata Sandi" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" required />
								<div class="validation"></div>
						</div>
						<div class="form-group">
								<select class="form-control" name="re_password" id="re_password" placeholder="Ulangi Kata Sandi" data-rule="minlen:4" data-msg="Please choose your option" required >
									<option value="" disabled selected>Pilih opsi Anda</option>
									<option value="Dosen">Dosen</option>
									<option value="Tata Usaha">Tata Usaha</option>
								</select>
								<div class="validation"></div>
						</div>
                        <div class="text-center"><button type="submit" name="submit" class="btn btn-primary btn-lg" required="required">Daftar</button></div>
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