<?php include "../includes/ini.php"?>
<?php $pagetitle1="mblog";
$id=urlfriendlyo(m_fill('id',$_REQUEST));
$data=$con->getcertainvalue("select * from news where (ntitle='".m_prepare($id)."' or ntitlear='".m_prepare($id)."')",array("datee"=>"datee","newsid"=>"newsid","ntags"=>"ntags","image"=>"image","imageb"=>"imageb","ntitle"=>"ntitle","datee"=>"datee","descc"=>"descc","sdescc"=>"sdescc"));
if(!isset($data['newsid'])){
	echo changelocation("index");
}?>
<?php $pagetitle=$data['ntitle']?>
<!DOCTYPE html>
<html>
	

<head>
		<!-- Basic -->
		<meta charset="utf-8">
		<title><?php echo $titl?> - <?php echo $pagetitle?></title>
		<meta name="keywords" content="<?php echo $data['ntags']?>" />
	<meta name="description" content="<?php echo $data['sdescc']?>">
    
     <meta property="og:title" content="<?php echo $data['ntitle']?>" />
    <meta property="og:image" content="<?php echo $m_rooturl?>uploads/news_thumb/<?php echo $data['image']?>" />
    <meta property="og:description" content="<?php echo $data['sdescc']?>" />
    
	<meta name="twitter:site" content="@gourmetme_kw">
    <meta name="twitter:card" content="summary">
    <meta property="twitter:title" content="<?php echo $data['ntitle']?>" />
    <meta property="twitter:description" content="<?php echo $data['sdescc']?>" />
    <meta property="twitter:image" content="<?php echo $m_rooturl?>uploads/news_thumb/<?php echo $data['image']?>" />
    
    <meta itemprop="name" content="<?php echo $data['ntitle']?>">
    <meta itemprop="description" content="<?php echo $data['sdescc']?>">
    <meta itemprop="image" content="<?php echo $m_rooturl?>uploads/news_thumb/<?php echo $data['image']?>">
		
		<?php include "metastuff.php"?>
<link rel="shortcut icon" href="favicon.ico">
		<!-- Mobile Specific Metas -->
		
		<!-- External Plugins CSS -->
		<link rel="stylesheet" href="../external/slick/slick.css">
		<link rel="stylesheet" href="../external/slick/slick-theme.css">
		<link rel="stylesheet" href="../external/magnific-popup/magnific-popup.css">
		<link rel="stylesheet" href="../external/nouislider/nouislider.css">
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
	<body>
		<?php include "loader.php"?>
		<!-- Back to top -->
	    <div class="back-to-top"><span class="icon-keyboard_arrow_up"></span></div>
	    <!-- /Back to top -->
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
				<ol class="breadcrumb breadcrumb--ys pull-left">
					<li class="home-link"><a href="index.php" class="icon icon-home"></a></li>					
					<li class="active"><?php echo $pagetitle?></li>
				</ol>
			</div>
		</div>
		<!-- /breadcrumbs --> 
		<!-- CONTENT section -->
		<div id="pageContent">
			<div class="container">				
				<div class="row">
					<div class="blog-layout">
						<!-- title -->
						<div class="title-box">
							<h1 class="text-center text-uppercase title-under"><?php echo $pagetitle?></h1>
						</div>
						
                        
                        <div>
                         <?php if($data['imageb']!=''){?>
                       <div style="margin-bottom:10px;text-align:center">
                        <img alt='<?php echo str_replace("'",'`',$data['ntitle'])?>' src="../uploads/news/<?php echo $data['imageb']?>" style="max-width:100%">
                       </div>
                       <br>
                       <?php }?>
                       
                       <div>
                       <?php echo $data['descc']?>
                       </div>
                        </div>

					</div>
				</div>
				
			</div>
		</div>
		<!-- End CONTENT section --> 
		<!-- FOOTER section -->
		</div>
<?php include "footer.php"?>
		<!-- END FOOTER section -->
		<!-- External JS --> 
		<!-- jQuery 1.10.1--> 
		<script src="../external/jquery/jquery-2.1.4.min.js"></script> 
		<!-- Bootstrap 3--> 
		<script src="../external/bootstrap/bootstrap.min.js"></script> 
		<!-- Specific Page External Plugins --> 
		<script src="../external/slick/slick.min.js"></script>
		<script src="../external/bootstrap-select/bootstrap-select.min.js"></script>  
		<script src="../external/countdown/jquery.plugin.min.js"></script> 
		<script src="../external/countdown/jquery.countdown.min.js"></script> 		
		<script src="../external/instafeed/instafeed.min.js"></script> 
		<script src="../external/magnific-popup/jquery.magnific-popup.min.js"></script> 
		<script src="../external/nouislider/nouislider.min.js"></script>
		<script src="../external/isotope/isotope.pkgd.min.js"></script> 
		<script src="../external/imagesloaded/imagesloaded.pkgd.min.js"></script>
        <script src="../external/colorbox/jquery.colorbox-min.js"></script> 
        <script src="../js/fancybox.js"></script> 
<script type="text/javascript" src="../js/notification.js"></script><script src="../js/functions.js"></script> <?php include "extrascripts.php"?>
		<!-- Custom --> 
		<script src="../js/custom.js"></script> 
		<script>
			$j(document).ready(function() {
			
				// popup ini			
				$j('.quick-view').magnificPopup({
					type: 'ajax'
				});
				
				listingModeToggle();
			
				// Init All Carousel			
				productCarousel($j('#megaMenuCarousel1'),1,1,1,1,1);
				verticalCarousel($j('.vertical-carousel-1'),2);
				verticalCarousel($j('.vertical-carousel-2'),2);
			
			})
		</script>
	</body>


</html>