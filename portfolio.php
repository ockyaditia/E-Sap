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
				<li>Portfolio</li>			
			</div>		
		</div>	
	</div>
	
	<?php
		include("head.php");
	?>
	
	<section id="portfolio">	
        <div class="container">
            <div class="center">
               <p> </p>
            </div>

            <ul class="portfolio-filter text-center">
                <li><a class="btn btn-default active" href="#" data-filter="*">Semua</a></li>
                <li><a class="btn btn-default" href="#" data-filter=".bootstrap">Universitas</a></li>
                <li><a class="btn btn-default" href="#" data-filter=".html">Fakultas</a></li>
                <li><a class="btn btn-default" href="#" data-filter=".wordpress">Program Studi</a></li>
            </ul><!--/#portfolio-filter-->
		</div>
		<div class="container">
            <div class="">
                <div class="portfolio-items">
                    <div class="portfolio-item apps col-xs-12 col-sm-4 col-md-3">
                        <div class="recent-work-wrap">
                            <img class="img-responsive" src="images/1.jpg" alt="">
                            <div class="overlay">
                                <div class="recent-work-inner">
                                    <h3><a href="#">Universitas YARSI</a></h3>
                                    <p> </p>
                                    <a class="preview" href="images/1.jpg" rel="prettyPhoto"><i class="fa fa-eye"></i> Lihat</a>
                                </div> 
                            </div>
                        </div>
                    </div><!--/.portfolio-item-->

                    <div class="portfolio-item joomla bootstrap col-xs-12 col-sm-4 col-md-3">
                        <div class="recent-work-wrap">
                            <img class="img-responsive" src="images/1.jpg" alt="">
                            <div class="overlay">
                                <div class="recent-work-inner">
                                    <h3><a href="#">Universitas YARSI</a></h3>
                                    <p> </p>
                                    <a class="preview" href="images/1.jpg" rel="prettyPhoto"><i class="fa fa-eye"></i> Lihat</a>
                                </div> 
                            </div>
                        </div>          
                    </div><!--/.portfolio-item-->

                    <div class="portfolio-item bootstrap wordpress col-xs-12 col-sm-4 col-md-3">
                        <div class="recent-work-wrap">
                            <img class="img-responsive" src="images/1.jpg" alt="">
                            <div class="overlay">
                                <div class="recent-work-inner">
                                    <h3><a href="#">Universitas YARSI</a></h3>
                                    <p> </p>
                                    <a class="preview" href="images/1.jpg" rel="prettyPhoto"><i class="fa fa-eye"></i> Lihat</a>
                                </div> 
                            </div>
                        </div>        
                    </div><!--/.portfolio-item-->

                    <div class="portfolio-item joomla wordpress apps col-xs-12 col-sm-4 col-md-3">
                        <div class="recent-work-wrap">
                            <img class="img-responsive" src="images/1.jpg" alt="">
                            <div class="overlay">
                                <div class="recent-work-inner">
                                    <h3><a href="#">Universitas YARSI</a></h3>
                                    <p> </p>
                                    <a class="preview" href="images/1.jpg" rel="prettyPhoto"><i class="fa fa-eye"></i> Lihat</a>
                                </div> 
                            </div>
                        </div>           
                    </div><!--/.portfolio-item-->
          
                    <div class="portfolio-item joomla html bootstrap col-xs-12 col-sm-4 col-md-3">
                        <div class="recent-work-wrap">
                            <img class="img-responsive" src="images/1.jpg" alt="">
                            <div class="overlay">
                                <div class="recent-work-inner">
                                    <h3><a href="#">Universitas YARSI</a></h3>
                                    <p> </p>
                                    <a class="preview" href="images/1.jpg" rel="prettyPhoto"><i class="fa fa-eye"></i> Lihat</a>
                                </div> 
                            </div>
                        </div>      
                    </div><!--/.portfolio-item-->

                    <div class="portfolio-item wordpress html apps col-xs-12 col-sm-4 col-md-3">
                        <div class="recent-work-wrap">
                            <img class="img-responsive" src="images/1.jpg" alt="">
                            <div class="overlay">
                                <div class="recent-work-inner">
                                    <h3><a href="#">Universitas YARSI</a></h3>
                                    <p> </p>
                                    <a class="preview" href="images/1.jpg" rel="prettyPhoto"><i class="fa fa-eye"></i> Lihat</a>
                                </div> 
                            </div>
                        </div>         
                    </div><!--/.portfolio-item-->

                    <div class="portfolio-item wordpress html col-xs-12 col-sm-4 col-md-3">
                        <div class="recent-work-wrap">
                            <img class="img-responsive" src="images/1.jpg" alt="">
                            <div class="overlay">
                                <div class="recent-work-inner">
                                    <h3><a href="#">Universitas YARSI</a></h3>
                                    <p> </p>
                                    <a class="preview" href="images/1.jpg" rel="prettyPhoto"><i class="fa fa-eye"></i> Lihat</a>
                                </div> 
                            </div>
                        </div>          
                    </div><!--/.portfolio-item-->

                    <div class="portfolio-item wordpress html bootstrap col-xs-12 col-sm-4 col-md-3">
                        <div class="recent-work-wrap">
                            <img class="img-responsive" src="images/1.jpg" alt="">
                            <div class="overlay">
                                <div class="recent-work-inner">
                                    <h3><a href="#">Universitas YARSI</a></h3>
                                    <p> </p>
                                    <a class="preview" href="images/1.jpg" rel="prettyPhoto"><i class="fa fa-eye"></i> Lihat</a>
                                </div> 
                            </div>
                        </div>          
                    </div><!--/.portfolio-item-->
                </div>
            </div>
        </div>
    </section><!--/#portfolio-item-->
	
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