<?php include "../includes/ini.php"?>
<?php $pagetitle1="mabout";
$pagetitle=$alls[$pagetitle1]['titlee'];
$url=m_fill("url",$_REQUEST)?>
<!DOCTYPE html>
<html>
	

<head>
		<!-- Basic -->
		<meta charset="utf-8">
		<title><?php echo $titl?></title>
		<meta name="keywords" content="" />
        
		<meta name="description" content="<?php echo $titl?>">
		
		<?php include "metastuff.php"?>
<link rel="shortcut icon" href="favicon.ico">
		<!-- Mobile Specific Metas -->
		
		<!-- External Plugins CSS -->
		<link rel="stylesheet" href="../external/slick/slick.css">
		<link rel="stylesheet" href="../external/slick/slick-theme.css">
		<link rel="stylesheet" href="../external/magnific-popup/magnific-popup.css">
		<link rel="stylesheet" href="../external/bootstrap-select/bootstrap-select.css">
		<!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
		<link rel="stylesheet" type="text/css" href="../external/rs-plugin/css/settings.css" media="screen" />
		<!-- Custom CSS -->
		<link rel="stylesheet" href="../css/style-layout11.css">
		<!-- Icon Fonts  -->
		<link rel="stylesheet" href="../font/style.css">
<link rel="stylesheet" href="../styles/fancybox.css">
<link type="text/css" href="../styles/notification.css" rel="stylesheet"  />
		<!-- Head Libs -->
		<!-- Modernizr -->
		<script src="../external/modernizr/modernizr.js"></script>
	</head>
	<body class="index">
		<?php include "loader.php"?>
		<!-- Back to top -->
	    <div class="back-to-top"><span class="icon-keyboard_arrow_up"></span></div>
	    <!-- /Back to top -->
	    <!-- mobile menu -->
				
	    <!-- /mobile menu -->
		<!-- HEADER section -->
		
<div class="pageholder">
		<!-- End HEADER section -->
		<!-- breadcrumbs -->
		<?php include "backer.php"?>
<div class="breadcrumbs">
			<div class="container">
				<ol class="breadcrumb breadcrumb--ys pull-left">
					<li class="home-link"><a href="index.php" class="icon icon-home"></a></li>				
					<li class="active"><?php echo $pagetitle?></li>
				</ol>
			</div>
		</div>
		<!-- /breadcrumbs --> 
		<!-- CONTENT section -->
		<div id="pageContent">			
			<!-- parallax-img -->
			
			<!-- /parallax-img -->
			<!--  -->
			<section class="content">
              <div class="container">
              <h1><?php echo $pagetitle?></h1>
                <div class="row">
                  <div class="col-sm-12">
                  
                      <iframe  name="heyiframe" style="width:100%;height:100%" src="<?php echo $url?>"></iframe>

                  </div>
                  <!--<a href="<?php echo $url?>" target="heyiframe">sdsd</a>-->
                </div>
              </div>
				
			</section>
		
		</div>
		<!-- End CONTENT section -->
		<!-- FOOTER section -->
		</div>
<?php include "footer.php"?>
		<!-- END FOOTER section -->		




		<!-- jQuery 1.10.1--> 
		<script src="../external/jquery/jquery-2.1.4.min.js"></script> 
		<!-- Bootstrap 3--> 
		<script src="../external/bootstrap/bootstrap.min.js"></script> 
		<!-- Specific Page External Plugins --> 
		<script src="../external/slick/slick.min.js"></script>
		<script src="../external/bootstrap-select/bootstrap-select.min.js"></script>  
		<script src="../external/countdown/jquery.plugin.min.js"></script> 
		<script src="../external/countdown/jquery.countdown.min.js"></script>  		
				
		<script src="../external/magnific-popup/jquery.magnific-popup.min.js"></script>  		
		<script src="../external/isotope/isotope.pkgd.min.js"></script> 
		<script src="../external/imagesloaded/imagesloaded.pkgd.min.js"></script>
		<script src="../external/colorbox/jquery.colorbox-min.js"></script> 
        <script src="../js/fancybox.js"></script> 
<script type="text/javascript" src="../js/notification.js"></script><script src="../js/functions.js"></script> <?php include "extrascripts.php"?>
		<script src="../external/parallax/jquery.parallax-1.1.3.js"></script>		
		<!-- Custom --> 
		<script src="../js/custom.js"></script>			
		<script>
			$j(document).ready(function() {
			
				// popup ini			
				$j('.quick-view').magnificPopup({
					type: 'ajax'
				});
			
				// Init All Carousel			
			
				productCarousel($j('#megaMenuCarousel1'),1,1,1,1,1);
				blogCarousel($j('.slider-blog'),1,1,1,1,1);
				
				
		
			 })
		</script>
	</body>


</html>