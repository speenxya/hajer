<?php include "../includes/ini.php"?>
<?php $pagetitle1="mcontact";
$pagetitle=$alls[$pagetitle1]['titleear']?>
<?php require "../classes/passwordgenerator.php";?>
        <?php  $args = array(
				'length'				=>	5,
				'alpha_upper_include'	=>	false,
				'alpha_lower_include'	=>	false,
				'number_include'		=>	true,
				'symbol_include'		=>	false,
			);
$object = new chip_password_generator($args);
	
$generatedid=$password = "Ref-".$object->get_password();?>
<!DOCTYPE html>
<html>
	

<head>
		<!-- Basic -->
		<meta charset="utf-8">
		<title><?php echo $titlar?> | <?php echo $pagetitle?></title>
        
        <?php
	$mobilehide=isset($_REQUEST['mobilehide'])?$_REQUEST['mobilehide']:"";
	$fname=isset($_REQUEST['fname1'])?$_REQUEST['fname1']:"";
	$email=isset($_REQUEST['email1'])?$_REQUEST['email1']:"";
	$message=isset($_REQUEST['message'])?$_REQUEST['message']:"";
	
	
 if(isset($_POST['send'])){
	 $generatedid=isset($_REQUEST['generatedid'])?$_REQUEST['generatedid']:$generatedid;
//$img = new Securimage();
//$valid = $img->check($_POST['code']);	
$valid=true;
					 
	
	
			
if($valid == true) {
	$success=1;
	 if($success==1){
	$body='<table style="padding:5px">
									  <tr>
										<td style="vertical-align:top">الاسم</td>
										<td>'.$fname.'</td>
									  </tr>
									  <tr>
									 
									 
									  
									  <tr>
										<td style="vertical-align:top">بريد الالكتروني</td>
										<td>'.$email.'</td>
									  </tr>
									  <tr>
										<td style="vertical-align:top">الرسالة</td>
										<td>'.nl2br($message).'</td>
									  </tr>
								    </table>';
									
									
									
								
									
									
		 		
if(@!sendmail($company_email,$contact_email, $titl." comments from  ".$email."",$body)) {
  $msg="<font class='itsnotok'>خطأ أثناء إرسال البريد الإلكتروني، يرجى المحاولة مرة أخرى في وقت لاحق</font>";
	
} else {
  $msg="<font class='itsok'>نشكرك على إرسال النموذج ، سنكون على اتصال بك قريبًا</font>";
 // logs("","","","a comment has been submitted from contact us","","","website");
  //sendemailtoclient($email);
  $titlee="";
	$fname="";
	$lname="";
	$tel="";
	$mobile="";
	$email="";
	$country="";
	$message="";
}
	 }else{//if success
		 // $msg="<font class='itsnotok'>Please select resume</font>";
	 }
}else{
	$msg="<font class='itsnotok'>الرجاء إدخال قيمة اختبار كود صالحة</font>";
}

}?>
		<meta name="keywords" content="" />
		<meta name="description" content="<?php echo $titlar?>">
		
		<?php include "metastuff.php"?>
<link rel="shortcut icon" href="favicon.ico">
		<!-- الجوالSpecific Metas -->
		
		<!-- External Plugins CSS -->
		<link rel="stylesheet" href="../external/slick/slickar.css">
		<link rel="stylesheet" href="../external/slick/slick-themear.css">
		<link rel="stylesheet" href="../external/magnific-popup/magnific-popup.css">
		<link rel="stylesheet" href="../external/nouislider/nouislider.css">
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
	<body>
		<?php include "loader.php"?>
		<!-- الرجوع to top -->
	    <div class="back-to-top"><span class="icon-keyboard_arrow_up"></span></div>
	    <!-- /الرجوع to top -->
	    <!-- mobile menu -->
		<?php include "header.php"?>
<div class="pageholder">		
	    <!-- /mobile menu -->
		<!-- HEADER section -->
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
        
        <?php if(isset($msg)){?>
                              <div style="text-align:center;margin-bottom:20px"><?php echo $msg?></div>
                            <?php }?>
			<!-- map -->
			<div class="content-bottom">
				<div id="map"></div>
			</div>				
			<!-- /map -->
			<section class="container">				
				<div class="row">
					<div class="col-md-3 col-sm-12">
						<h2 class="text-uppercase title-bottom">اتصل بنا</h2>
						<ul class="list-icon">
                        <?php if($m_config['addressar']!=''){?>
							<li>
								<span class="icon icon-home"></span>
								<strong>العنوان :</strong> <?php echo $m_config['addressar']?>
							</li>
                          <?php }?>
                          <?php if($m_config['tel1']!=''){?>
							<li>
								<span class="icon icon-call"></span>
								<strong>تلفون:</strong> <a style="color:#1b3383" href='tel:<?php echo $m_config['tel1']?>'><p style='display:inline' dir='ltr'><?php echo $m_config['tel1']?></p></a>
							</li>
                            <?php }?>
                          <?php if($m_config['tel2']!=''){?>
                            <li>
								<span class="icon icon-call"></span>
								<strong>تلفون:</strong > <a style="color:#1b3383" href='tel:<?php echo $m_config['tel2']?>'><p style='display:inline' dir='ltr'><?php echo $m_config['tel2']?></p></a>
							</li>
                            <?php }?>
                          <?php if($m_config['fax']!=''){?>
							<li>
								<span class="fa fa-fax"></span>
								<strong>فاكس:</strong> <p style='display:inline' dir='ltr'><?php echo $m_config['fax']?></p>
							</li>
                            <?php }?>
                          <?php if($m_config['ccontactemail']!=''){?>
							<li>
								<span class="icon icon-mail"></span>
								<strong>بريد الالكتروني:</strong> <a class="color" href="mailto:<?php echo $m_config['ccontactemail']?>"><?php echo $m_config['ccontactemail']?></a>
							</li>
                            <?php }?>
						</ul>
						<div class="divider divider--sm"></div>
						
					</div>
					<div class="col-md-9  col-sm-12">
						<div class="divider divider--lg visible-xs"></div>
						<h2 class="text-uppercase title-bottom">تواصل معنا </h2>
						<form enctype="multipart/form-data" name="form" method="post" action="" onSubmit="return m_submit()">
                        <input type="hidden" name="send" value="1" />
                        <input type="hidden" name="generatedid" value="<?php echo $generatedid?>" />
                        <input type="hidden" name="ismobile" value="<?php echo $ismobile?>" />
							<!-- input -->
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
									    <label for="inputName">الاسم <sup>*</sup></label>
									    <input type="text" class="form-control" id="fname1" name="fname1">
									  </div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
									    <label for="inputEmail">بريد الالكتروني <sup>*</sup></label>
									    <input type="email" class="form-control" id="email1" name="email1" >
									  </div>
								</div>
							</div>
							<!-- /input -->
							<!-- textarea -->
							<div class="form-group">
							    <label for="textareaMessage">الرسالة <sup>*</sup></label>
							    <textarea  class="form-control" rows="12"  id="message" name="message"></textarea>
						   </div>
						   <!-- /textarea -->
						   <!-- button -->
						   <div class="pull-left note">* حقل الزامي</div>
                           <input class="btn btn--ys btn--xl btn-top" type="submit" value="إرسال">
						   <!-- /button -->						   
						</form>						
					</div>
				</div>					
			</section>
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
		
		(function () {
    if (!String.prototype.trim) {
        /**
         * Trim whitespace from each end of a String
         * @returns {String} the original String with whitespace removed from each end
         * @example
         * ' foo bar    '.trim(); //'foo bar'
         */
        String.prototype.trim = function trim() {
            return this.toString().replace(/^([\s]*)|([\s]*)$/g, '');
        };
    }     
})();
		
		function m_submit(){
		
		 var variabl="fname1"
		if(jQuery('#'+variabl).val().trim()==''){
			  jQuery('#'+variabl).addClass("errorclass")
				  if(!jQuery('#'+variabl+'-error').length){
				   jQuery('#'+variabl).after("<div id='"+variabl+"-error' class='errorclass1'>حقل الزامي</div>")
				  }
				 jQuery('#'+variabl).focus()
				 return false
		}else{
			jQuery('#'+variabl).removeClass("errorclass")
			jQuery('#'+variabl+'-error').remove()
		} 
		
		
		
		
		
		var variabl="email1"
		if(jQuery('#'+variabl).val().trim()=='' || !validemail(jQuery('#'+variabl).val().trim())){
			  jQuery('#'+variabl).addClass("errorclass")
				  if(!jQuery('#'+variabl+'-error').length){
				   jQuery('#'+variabl).after("<div id='"+variabl+"-error' class='errorclass1'>حقل الزامي</div>")
				  }
				 jQuery('#'+variabl).focus()
				 return false
		}else{
			jQuery('#'+variabl).removeClass("errorclass")
			jQuery('#'+variabl+'-error').remove()
		} 
		
		
		
		
	   var variabl="message"
		if(jQuery('#'+variabl).val().trim()==''){
			  jQuery('#'+variabl).addClass("errorclass")
				  if(!jQuery('#'+variabl+'-error').length){
				   jQuery('#'+variabl).after("<div id='"+variabl+"-error' class='errorclass1'>حقل الزامي</div>")
				  }
				 jQuery('#'+variabl).focus()
				 return false
		}else{
			jQuery('#'+variabl).removeClass("errorclass")
			jQuery('#'+variabl+'-error').remove()
		} 
		
		

	return true

}


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

		<!-- Google map -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false&key=AIzaSyDpEXfSZ8Y3ltYLG6-HaiUx32S0FrQqi9w"></script>
<script type="text/javascript">
// When the window has finished loading create our google map below
google.maps.event.addDomListener(window, 'load', init);

function init() {
	// Basic options for a simple Google Map
	// For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
	var mapOptions = {
		// How zoomed in you want the map to start at (always required)
		zoom: 11,

		// The latitude and longitude to center the map (always required)
		center: new google.maps.LatLng(25.390777,49.6022227), // Hajer

		// How you would like to style the map. 
		// This is where you would paste any style found on Snazzy Maps.
		styles: [{"featureType":"water","elementType":"geometry.fill","stylers":[{"color":"#d1d1d1"}]},{"featureType":"transit","stylers":[{"color":"#808080"},{"visibility":"off"}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"visibility":"on"},{"color":"#d1d1d1"}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#d1d1d1"}]},{"featureType":"road.local","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#ffffff"},{"weight":1.8}]},{"featureType":"road.local","elementType":"geometry.stroke","stylers":[{"color":"#d7d7d7"}]},{"featureType":"poi","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#ebebeb"}]},{"featureType":"administrative","elementType":"geometry","stylers":[{"color":"#d1d1d1"}]},{"featureType":"road.arterial","elementType":"geometry.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"road.arterial","elementType":"geometry.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"landscape","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#fafafa"}]},{"featureType":"road","elementType":"labels.text.fill","stylers":[{"color":"#d6d6d6"}]},{"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"visibility":"on"},{"color":"#bfbfbf"}]},{"featureType":"poi","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"poi","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"road.arterial","elementType":"geometry.stroke","stylers":[{"color":"#d6d6d6"}]},{"featureType":"road","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{},{"featureType":"poi","elementType":"geometry.fill","stylers":[{"color":"#f1f1f1"}]}]
	};

	// Get the HTML DOM element that will contain your map 
	// We are using a div with id="map" seen below in the <body>
	var mapElement = document.getElementById('map');

	// Create the Google Map using our element and options defined above
	var map = new google.maps.Map(mapElement, mapOptions);

	var image = '../images/icon2.png';
	
	 var marker = new google.maps.Marker({
            position: new google.maps.LatLng(25.390777,49.6022227),
            map: map,           
            icon : image,
            title: 'Snazzy!'
        });
}
</script>

	</body>


</html>