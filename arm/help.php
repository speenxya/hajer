<?php include "../includes/ini.php"?>
<?php $pagetitle1="mhelp";
$pagetitle="تصفح مواضيع المساعدة"?>
<!DOCTYPE html>
<html>
	

<head>
		<!-- Basic -->
		<meta charset="utf-8">
		<title><?php echo $titlar?></title>
		<meta name="keywords" content="" />
		<meta name="description" content="<?php echo $titlar?>">
		
		<?php include "metastuff.php"?>
<link rel="shortcut icon" href="favicon.ico">
		<!-- الجوالSpecific Metas -->
		
		<!-- External Plugins CSS -->
		<link rel="stylesheet" href="../external/slick/slickar.css">
		<link rel="stylesheet" href="../external/slick/slick-themear.css">
		<link rel="stylesheet" href="../external/magnific-popup/magnific-popup.css">
		<link rel="stylesheet" href="../external/bootstrap-select/bootstrap-select.css">
		<!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
		<link rel="stylesheet" type="text/css" href="../external/rs-plugin/css/settings.css" media="screen" />
		<!-- Custom CSS -->
		<link rel="stylesheet" href="../css/style-layout11ar.css">
		<!-- Icon Fonts  -->
		<link rel="stylesheet" href="../font/style.css">
<link rel="stylesheet" href="../styles/fancybox.css">
<link type="text/css" href="../styles/notificationar.css" rel="stylesheet"  />
		<!-- Head Libs -->
		<!-- Modernizr -->
		<script src="../external/modernizr/modernizr.js"></script>
	</head>
	<body class="index">
		<?php include "loader.php"?>
		<!-- الرجوع to top -->
	    <div class="back-to-top"><span class="icon-keyboard_arrow_up"></span></div>
	    <!-- /الرجوع to top -->
	    <!-- mobile menu -->
				
	    <!-- /mobile menu -->
		<!-- HEADER section -->
		<?php include "header.php"?>
<div class="pageholder">
		<!-- End HEADER section -->
		<!-- breadcrumbs -->
		<?php include "backer.php"?>
<div class="breadcrumbs">
			<div class="container">
				<ol class="breadcrumb breadcrumb--ys pull-right">
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
                  <div>
                      <h2>الشركة</h2>
                      <ul>
											<li><a href="index" style="text-decoration:underline"><?php echo $alls['mindex']['titleear']?></a></li>
                                            <li><a href="about" style="text-decoration:underline"><?php echo $alls['mabout']['titleear']?></a></li>
											<li><a href="contact" style="text-decoration:underline"><?php echo $alls['mcontact']['titleear']?></a></li>
											<li><a href="privacy" style="text-decoration:underline"><?php echo $alls['mprivacy']['titleear']?></a></li>
                                            
										</ul>
                   </div>  
                    <div>
                      <h2>الدعم</h2>
                      <ul>
											<li><a href="delivery" style="text-decoration:underline"><?php echo $alls['mdelivery']['titleear']?></a></li>
											<li><a href="returnproduct" style="text-decoration:underline"><?php echo $alls['mreturnproduct']['titleear']?></a></li>
                                            <li><a href="terms" style="text-decoration:underline"><?php echo $alls['mterms']['titleear']?></a></li>
                                            <li><a href="paymentoption" style="text-decoration:underline"><?php echo $alls['mpaymentoption']['titleear']?></a></li>
										</ul>
                   </div> 
                    <div>
                      <h2>معلومات</h2>
                     	<ul>
											
                                            <li><a href="purchasemethods" style="text-decoration:underline"><?php echo $alls['mpurchasemethods']['titleear']?></a></li>
                                            <li><a href="vat" style="text-decoration:underline"><?php echo $alls['VAT']['titleear']?></a></li>
                                            <li><a href="warranty" style="text-decoration:underline"><?php echo $alls['mwarranty']['titleear']?></a></li>
                                            <li><a href="faq" style="text-decoration:underline"><?php echo $alls['mfaq']['titleear']?></a></li>
										</ul>
                   </div>    

                  </div>
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