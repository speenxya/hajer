<?php include "../includes/ini.php"?>
<?php $pagetitle1="meditprofile";
$pagetitle="Edit Profile"?>
<!DOCTYPE html>
<html>
	

<head>
		<!-- Basic -->
		<meta charset="utf-8">
		<title><?php echo $titl?> | <?php echo $pagetitle?></title>
		<meta name="keywords" content="" />
		<meta name="description" content="<?php echo $titl?>">
        
         <?php 

$change=base64_decode(m_fill("change",$_REQUEST));
$data=$con->fetch_array($con->query("select * from access where accessid='".$change."'"));
if($data['accessid']==''){
    echo changelocation("index");
    }

	//$a_raw['ausername']=m_fill("ausername",$_REQUEST);
	$a_raw['apassword']=m_fill("apassword",$_REQUEST);
    

	if(isset($_REQUEST['register'])){
	$a=m_prepareall($a_raw);

$duplicate=0;
	  
	  
	  if($duplicate=='0'){
				$a["access_modified"]=date("Y-m-d H:i:s"); // we insert date modified here . note the table name prefix
				
				  if(update("access",$a,"where accessid='".m_prepare($change)."'",$con)){
					  $msg="<font class='itsok'>Your password has been successfully changed</font>";
                      echo changelocation("signlog");
					  }
	  }else{
		  $msg=$duplicate;
	  }
}


	 ?>
		
		<?php include "metastuff.php"?>
<link rel="shortcut icon" href="favicon.ico">
		<!-- Mobile Specific Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
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
 <link rel="stylesheet" type="text/css" media="all" href="../styles/jquery_ui_datepicker.css" />
<link rel="stylesheet" type="text/css" media="all" href="../styles/jquery_ui_theme.css" />

<link type="text/css" href="../styles/notification.css" rel="stylesheet"  />
		<!-- Head Libs -->
		<!-- Modernizr -->
		<script src="../external/modernizr/modernizr.js"></script>
        <script type="text/javascript" src="https://maps.google.com/maps/api/js?key=AIzaSyDpEXfSZ8Y3ltYLG6-HaiUx32S0FrQqi9w"></script>
<script type="text/javascript" src="../js/functions.js"></script>
	</head>
	<body class="index">
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
            <div class="row" style="margin:0;border:1px solid #cccccc;padding-top:20px;padding-bottom:20px">
                <h3 style="padding-left:10px">Reset Password</h3>
                <div>
                
                 <form enctype="multipart/form-data" name="form1" method="post" action="" onSubmit="return m_submit1()">
                        <input type="hidden" name="register" value="1" />
                        <input type="hidden" name="change" id="alat" value="<?php echo base64_encode($change)?>" />
               
               <?php if(isset($msg)){?>
                  <div style="padding-left:10px;text-align:left"><?php echo $msg?></div>
               <?php }?>
             
              
              <div class="col-sm-6">
                 <div class="inputEntity"><label>New Password</label><input type="password" name="apassword" id="apassword" value="<?php echo $a_raw['apassword']?>" ></div>
                 <div id="pswd_info">
		<ul>
			<li id="letter" class="invalid">At least <strong>one letter</strong></li>
			<li id="capital" class="invalid">At least <strong>one capital letter</strong></li>
			<li id="number" class="invalid">At least <strong>one number</strong></li>
			<li id="length" class="invalid">Be at least <strong>8 characters</strong></li>
		</ul>
	</div>
              </div>
              <div class="col-sm-6">
                <div class="inputEntity"><label>Repeat Password</label><input type="password" name="apassword1" id="apassword1"></div>
              </div>
              
              
              
              <div style="clear:both;line-height:1px"></div>
           
              
              <div class="col-sm-12">
               <div class="btnsHolder"><input class="btn btn-primary" type="submit" value="Update"></div>
              </div>
              
            </form>
            </div>
            
            
                </div>
            </div>
                <div class="bottommargin">&nbsp;</div>
			</section>
			
			
				
		</div>
		<!-- End CONTENT section -->
		<!-- FOOTER section -->
		</div>
<?php include "footer.php"?>
		<!-- END FOOTER section -->		




		<!-- jQuery 1.10.1--> 
		<script src="../external/jquery/jquery-2.1.4.min.js"></script> 
        <script type='text/javascript' src='../js/jquerymigrate.js'></script>
        <script type='text/javascript' src='../js/jqueryui.js'></script>
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
				
				$j('#dob').datepicker({
												dateFormat:'yy-mm-dd',
											//minDate:'0',
											 showAnim:'fadeIn',
											autoSize: true,
											changeMonth: true,
										  changeYear: true,
										  yearRange: "-69:-18"
											});
			
				// Init All Carousel			
			
				productCarousel($j('#megaMenuCarousel1'),1,1,1,1,1);
				blogCarousel($j('.slider-blog'),1,1,1,1,1);
				
				
		
			 })
			

	 pwdright=0;
     
     	$j('#apassword').keyup(function() { 
		
		// set password variable
		var pswd = $j(this).val();
        
          pwdright=0;
		//validate the length
		if ( pswd.length < 8 ) {
			$j('#length').removeClass('valid').addClass('invalid');
		} else {
			$j('#length').removeClass('invalid').addClass('valid');
			pwdright=pwdright+1
			
		}
		
		//validate letter
		if ( pswd.match(/[A-z]/) ) {
			$j('#letter').removeClass('invalid').addClass('valid');
			pwdright=pwdright+1
		
		} else {
			$j('#letter').removeClass('valid').addClass('invalid');
			
		}
		
		//validate uppercase letter
		if ( pswd.match(/[A-Z]/) ) {
			$j('#capital').removeClass('invalid').addClass('valid');
			pwdright=pwdright+1

		} else {
			$j('#capital').removeClass('valid').addClass('invalid');
			
		}
		
		//validate number
		if ( pswd.match(/\d/) ) {
			$j('#number').removeClass('invalid').addClass('valid');
			pwdright=pwdright+1
	
		} else {
			$j('#number').removeClass('valid').addClass('invalid');
			
		}
		
	}).focus(function() {
		$j('#pswd_info').show();
        
	}).blur(function() {
		$j('#pswd_info').hide();
	});	

function m_submit1(){
	

	
	 var variabl="apassword"
	if(pwdright!=4){
		  $j('#'+variabl).addClass("errorclass")
			  if(!$j('#'+variabl+'-error').length){
			   $j('#'+variabl).after("<div id='"+variabl+"-error' class='errorclass1'>1Mandatory Field</div>")
			  }
			 $j('#'+variabl).focus()
			 return false
	}else{
		$j('#'+variabl).removeClass("errorclass")
		$j('#'+variabl+'-error').remove()
	}
    
	
	var variabl="apassword"
	if($j('#'+variabl).val()==''){
		  $j('#'+variabl).addClass("errorclass")
			  if(!$j('#'+variabl+'-error').length){
			   $j('#'+variabl).after("<div id='"+variabl+"-error' class='errorclass1'>2Mandatory Field</div>")
			  }
			 $j('#'+variabl).focus()
			 return false
	}else{
		$j('#'+variabl).removeClass("errorclass")
		$j('#'+variabl+'-error').remove()
	}
	
	var variabl="apassword1"
	if($j('#'+variabl).val()!=$j('#apassword').val()){
		  $j('#'+variabl).addClass("errorclass")
			  if(!$j('#'+variabl+'-error').length){
			   $j('#'+variabl).before("<div id='"+variabl+"-error' class='errorclass1'>Passwords Must Match</div>")
			  }
			 $j('#'+variabl).focus()
			 return false
	}else{
		$j('#'+variabl).removeClass("errorclass")
		$j('#'+variabl+'-error').remove()
	}
    
  
	
	


	
		
		
	return true
}		
		</script>
	</body>


</html>