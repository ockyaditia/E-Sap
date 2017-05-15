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
	
	<section id="main-slider" class="no-margin">
        <div class="carousel slide">      
            <div class="carousel-inner">
                <div class="item active" style="background-image: url(images/slider/bg1.jpg)">
                    <div class="container">
                        <div class="row slide-margin">
                            <div class="col-sm-6">
                                <div class="carousel-content">
                                    <h2 class="animation animated-item-1">Welcome to<span> E-SAP UNIVERSITAS YARSI</span></h2>
                                    <p class="animation animated-item-2">Sistem elektronik untuk memantau kegiatan belajar mengajar...</p>
                                    <a class="btn-slide animation animated-item-3" href="#">Baca Lebih Lanjut</a>
                                </div>
                            </div>

                            <div class="col-sm-6 hidden-xs animation animated-item-4">
                                <div class="slider-img">
                                    <img src="images/slider/img3.png" class="img-responsive">
                                </div>
                            </div>

                        </div>
                    </div>
                </div><!--/.item-->             
            </div><!--/.carousel-inner-->
        </div><!--/.carousel-->
    </section><!--/#main-slider-->
	
	<div class="feature">
		<div class="container">
			<div class="text-center">
				<div class="col-md-3">
					<div class="hi-icon-wrap hi-icon-effect wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms" >
						<i class="fa fa-book"></i>	
						<h2>Elektronik SAP</h2>
						<p></p>
					</div>
				</div>
				<div class="col-md-3">
					<div class="hi-icon-wrap hi-icon-effect wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms" >
						<i class="fa fa-laptop"></i>	
						<h2>Elektronik Pelaksanaan Perkuliahan</h2>
						<p></p>
					</div>
				</div>
				<div class="col-md-3">
					<div class="hi-icon-wrap hi-icon-effect wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="900ms" >
						<i class="fa fa-heart-o"></i>	
						<h2>Elektronik Absensi</h2>
						<p></p>
					</div>
				</div>
				<div class="col-md-3">
					<div class="hi-icon-wrap hi-icon-effect wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="1200ms" >
						<i class="fa fa-cloud"></i>	
						<h2>Elektronik Laporan</h2>
						<p></p>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="about">
		<div class="container">
			<div class="col-md-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms" >
				<h2>Tentang Kami</h2>
				<img src="images/yarsi.jpg" class="img-responsive"/>
				<p>Universitas YARSI ialah perguruan tinggi Islam swasta yang berada di Cempaka Putih, Jakarta Pusat. Kampus Universitas YARSI berada di pusat kota Jakarta dengan luas lahan kampus 25.000 m² dan luas bangunan 19.300 m² yang terdiri dari berbagai bangunan. Selain itu YARSI telah mempunyai kampus baru Universitas YARSI bertingkat 12 lantai. Saat ini sedang dibangun Rumah Sakit Gigi dan Mulut Pendidikan Universitas YARSI dan Rumah Sakit Pendidikan Universitas YARSI dengan penambahan luas bangunan menjadi 185.000 m2.
				</p>
			</div>
			
			<div class="col-md-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms" >
				<h2>Sejarah Universitas YARSI</h2>
				<p>Kedokteran Universitas Indonesia Jakarta untuk bekerja sama dalam bidang pendidikan dan pengajaran Sekolah Tinggi Kedokteran YARSI Jakarta. YARSI pada waktu itu menggunakan seluruh sarana dan prasarana FK UI seperti ruang belajar/ kuliah, laboratorium, alat-alat yang mendukung perkuliahan kedokteran, dan perpustakaan. Tahun 1968 merupakan tahun mula didirikannya bangunan YARSI yang beralamat di Jalan Letjen Suprapto, Cempaka Putih, Jakarta Pusat. Peletakan batu pertama pembangunan gedung YARSI dilakukan oleh almarhumah ibu Hj. Tien Soeharto.
				<p>Pada mulanya ia lahir YARSI belum memiliki tanah dan bangunan sendiri. YARSI masih mengandalkan Fakultas dengan prestasi YARSI sebagai sekolah kedokteran, para pendiri memutuskan untuk membuat fakultas baru. Sesuai dengan rencana pengembangan Universitas YARSI Jakarta (sekarang bernama Universitas YARSI) tahun 1988-1989 s.d. 1998-1999, tiga fakultas dibentuk, yaitu Fakultas Ekonomi, Fakultas Hukum, dan Fakultas Teknologi Industri (sekarang bernama Fakultas Teknologi Informasi). Dengan berdirinya tiga fakultas tersebut, Sekolah Tinggi Kedokteran YARSI Jakarta telah berubah menjadi Fakultas Kedokteran yang berada di dalam bagian Universitas YARSI bersama dengan tiga fakultas lain tersebut. Semua program studi di Universitas YARSI telah terakreditasi BAN-PT.
				</p>
				<p>Pada tahun 2007 Universitas YARSI kembali membuka satu fakultas baru yaitu Fakultas Psikologi dan dioperasikan sejak tahun akademik 2007-2008. Sampai saat ini Universitas YARSI memiliki lima fakultas. Tahun 2012 Universitas YARSI telah dipercaya oleh Kementerian Pendidikan dan Kebudayaan Republik Indonesia untuk membuka Program Studi Ilmu Kedokteran Gigi (Prodi IKG). Kepanjangan akronim YARSI - sejak ia sudah tidak memiliki rumah sakit sendiri - adalah tidak berlaku lagi. YARSI hanyalah sebuah nama YARSI di Jakarta. Untuk menamakan YARSI sebagai yayasan, ia disebut dengan Yayasan YARSI.</p>
			</div>
		</div>
	</div>
	
	<div class="lates">
		<div class="container">
			<div class="text-center">
				<h2>Berita Terakhir</h2>
			</div>
			<div class="col-md-4 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
				<img src="images/1.jpg" class="img-responsive"/>
				<h3> </h3>
				<p>
				</p>
			</div>
			
			<div class="col-md-4 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
				<img src="images/1.jpg" class="img-responsive"/>
				<h3> </h3>
				<p>
				</p>
			</div>
			
			<div class="col-md-4 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="900ms">				
				<img src="images/1.jpg" class="img-responsive"/>
				<h3> </h3>
				<p>
				</p>
			</div>
		</div>
	</div>
	
	<section id="partner">
        <div class="container">
            <div class="center wow fadeInDown">
                <h2>Partner Kami</h2>
                <p></p>
            </div>    

            <div class="partners">
                <ul>
                    <li> <a href="#"><img class="img-responsive wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms" src="images/partners/partner1.png"></a></li>
                    <li> <a href="#"><img class="img-responsive wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms" src="images/partners/partner2.png"></a></li>
                    <li> <a href="#"><img class="img-responsive wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="900ms" src="images/partners/partner3.png"></a></li>
                    <li> <a href="#"><img class="img-responsive wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="1200ms" src="images/partners/partner4.png"></a></li>
                    <li> <a href="#"><img class="img-responsive wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="1500ms" src="images/partners/partner5.png"></a></li>
                </ul>
            </div>        
        </div><!--/.container-->
    </section><!--/#partner-->
	
	<section id="conatcat-info">
        <div class="container">
            <div class="row">
                <div class="col-sm-8">
                    <div class="media contact-info wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                        <div class="pull-left">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="media-body">
                            <h2>Anda memiliki pertanyaan?</h2>
                            <p></p>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/.container-->    
    </section><!--/#conatcat-info-->
	
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