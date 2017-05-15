<div class="container">					
	<div class="navbar-header">
		<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse.collapse">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<div class="navbar-brand">
			<a href="index.php"><h1><span>e-SAP</span> Universitas YARSI</h1></a>
		</div>
	</div>
	
	<?php
		if (isset($_SESSION['username']) && isset($_SESSION['status']) && $_SESSION['status'] == "Tata Usaha") {
	?>
	<div class="navbar-collapse collapse">							
		<div class="menu">
			<ul class="nav nav-tabs" role="tablist">
				<li role="presentation"><a href="admin_data_universitas.php">Data Universitas</a></li>
				<li role="presentation"><a href="admin_data_pengguna.php">Data Pengguna</a></li>
				<li role="presentation"><a href="admin_data_perkuliahan.php">Data Perkuliahan</a></li>
				<li role="presentation"><a href="data_laporan.php">Laporan</a></li>
				<li role="presentation"><a href="signout.php">Keluar</a></li>
			</ul>
		</div>
	</div>
	<?php
		} else if (isset($_SESSION['username']) && isset($_SESSION['status']) && $_SESSION['status'] == "Dosen") {
	?>
	<div class="navbar-collapse collapse">							
		<div class="menu">
			<ul class="nav nav-tabs" role="tablist">
				<li role="presentation"><a href="dosen_data_universitas.php">Data Universitas</a></li>
				<li role="presentation"><a href="dosen_data_pengguna.php">Data Pengguna</a></li>
				<li role="presentation"><a href="dosen_data_perkuliahan.php">Data Perkuliahan</a></li>
				<li role="presentation"><a href="data_laporan.php">Laporan</a></li>
				<li role="presentation"><a href="signout.php">Keluar</a></li>
			</ul>
		</div>
	</div>
	<?php
		} else {	
	?>
	<div class="navbar-collapse collapse">							
		<div class="menu">
			<ul class="nav nav-tabs" role="tablist">
				<li role="presentation"><a href="about.php">Tentang Kami</a></li>
				<li role="presentation"><a href="services.php">Pelayanan</a></li>								
				<li role="presentation"><a href="portfolio.php">Galeri</a></li>
				<!--<li role="presentation"><a href="blog.php">Informasi</a></li>-->
				<li role="presentation"><a href="contact.php">Kontak Kami</a></li>
				<li role="presentation"><a href="signin.php">Masuk</a></li>
			</ul>
		</div>
	</div>
	<?php
		}
	?>
</div>