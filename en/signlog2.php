<?php include "../includes/ini.php"?>
<?php $pagetitle1="msign";
$pagetitle="Register"?>
<!DOCTYPE html>
<html>
	

<head>
		<!-- Basic -->
		<meta charset="utf-8">
		<title><?php echo $titl?> | <?php echo $pagetitle?></title>
		<meta name="keywords" content="" />
		<meta name="description" content="<?php echo $titl?>">
        
         <?php 

$standalone=m_fill("standalone",$_REQUEST);
	$a_raw['fname']=m_fill("fname",$_REQUEST);
	$a_raw['socialid']=m_fill("socialid",$_REQUEST);
	$a_raw['lname']=m_fill("lname",$_REQUEST);
	$a_raw['email']=m_fill("email",$_REQUEST);
	$a_raw['apassword']=m_fill("apassword",$_REQUEST);
	
	$a_raw['ausername']=$a_raw['email'];


	if(isset($_REQUEST['register'])){
	$a=m_prepareall($a_raw);

$duplicate=0;
	  if(recordexists("access","accessid",array("email"=>$a['email']),'',"and deleted='0'")){
		  $duplicate="<font class='itsnotok'>Email Address Already Exists</font>";
	  }
	  
	 
	  
	  if(trim($a_raw['email'])==''){
		    $duplicate="<font class='itsnotok'>Please enter a valid email address</font>";
	  }
	  
	  
	  if($duplicate=='0'){
		        $a["access_created"]=date("Y-m-d H:i:s"); // we insert date created here . note the table name prefix
				$a["access_modified"]=date("Y-m-d H:i:s"); // we insert date modified here . note the table name prefix
				$a['aactive']="Yes";
				$a['atype']="normal";
				
				  if(insert("access",$a,$con)){
							  $insertidd=$con->insert_id();
							  update("access",array("accessid"=>$insertidd."-".$m_branch),"where dummy_accessid='$insertidd'",$con);
							  $code=$insertidd."-".$m_branch;
							  
						   $msg1="";
						   //log him in
						   logs("","","access.php?view=1&code=".$code."","a normal user has been registered","","","website");
						   
						     $_SESSION['hj_id']=$code;
							  $_SESSION['hj_username']=$a_raw['ausername'];
							  $_SESSION['hj_fname']=$a_raw['fname'];
							  $_SESSION['hj_lname']=$a_raw['lname'];
                              
                              populatebasket(session_id(),$code);
							  
							  $bas=new basket();
							$bas->init('hj_cart');
						   if(!$bas->get_cart()){  
						      echo changelocation("products");
									exit();
						   }else{
							echo changelocation("address");
									exit();
						   }
							  
				  }
	  }else{
		  $msg1=$duplicate;
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
            <div class="row"  style="margin:0;border:1px solid #cccccc;padding-top:20px;padding-bottom:20px">
                <h3 style="padding-left:10px">New User</h3>
                
                
                 <form enctype="multipart/form-data" name="form1" method="post" action="" onSubmit="return m_submit1()">
                        <input type="hidden" name="register" value="1" />
                        <input type="hidden" name="standalone" value="<?php echo $standalone?>" />
                        <input type="hidden" name="socialid" value="<?php echo $a_raw['socialid']?>" />
                        
               
               <?php if(isset($msg1)){?>
                  <div style="padding-left:10px;text-align:left"><?php echo $msg1?></div>
               <?php }?>
              <div class="col-sm-6">
              
                <div class="inputEntity"><label for="fname">First name</label><input type="text" name="fname" id="fname" value="<?php echo m_display($a_raw['fname'])?>"></div>
                
                                <div class="inputEntity"><label for="email">Email Address</label><input type="text" name="email" id="email" value="<?php echo m_display($a_raw['email'])?>" ></div>
                
                
              </div>
              <div class="col-sm-6">
                <div class="inputEntity"><label for="lname">Last name</label><input type="text" name="lname" id="lname" value="<?php echo m_display($a_raw['lname'])?>"></div>
                
                <div class="inputEntity"><label for="apassword">Password</label><input type="password" name="apassword" id="apassword" value="<?php echo $a_raw['apassword']?>" ></div>
                
                <div class="inputEntity"><label for="apassword">Retype Password <span class="itsnotok">*</span></label><input maxlength="50" style="width:100%;display:inline" type="password" name="apassword1" id="apassword1" value="" >
                </div>
                <div id="pswd_info">
		<ul>
			<li id="letter" class="invalid">At least <strong>one letter</strong></li>
			<li id="capital" class="invalid">At least <strong>one capital letter</strong></li>
			<li id="number" class="invalid">At least <strong>one number</strong></li>
			<li id="length" class="invalid">Be at least <strong>8 characters</strong></li>
		</ul>
	</div>
                
                <div class="btnsHolder"><input class="btn btn-primary" type="submit" value="Register"></div>
              </div>
         
            
            </form>
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
		
			 })
			
			function m_submit1(){
	
	
    var variabl="fname"
	if($j('#'+variabl).val()==''){
		  $j('#'+variabl).addClass("errorclass")
			  if(!$j('#'+variabl+'-error').length){
			   $j('#'+variabl).after("<div id='"+variabl+"-error' class='errorclass1'>Mandatory Field</div>")
			  }
			 $j('#'+variabl).focus()
			 return false
	}else{
		$j('#'+variabl).removeClass("errorclass")
		$j('#'+variabl+'-error').remove()
	}
	
	var variabl="lname"
	if($j('#'+variabl).val()==''){
		  $j('#'+variabl).addClass("errorclass")
			  if(!$j('#'+variabl+'-error').length){
			   $j('#'+variabl).after("<div id='"+variabl+"-error' class='errorclass1'>Mandatory Field</div>")
			  }
			 $j('#'+variabl).focus()
			 return false
	}else{
		$j('#'+variabl).removeClass("errorclass")
		$j('#'+variabl+'-error').remove()
	}
	
		
		var variabl="email"
		if($j('#'+variabl).val()=='' || !validemail($j('#'+variabl).val())){
			  $j('#'+variabl).addClass("errorclass")
				  if(!$j('#'+variabl+'-error').length){
				   $j('#'+variabl).after("<div id='"+variabl+"-error' class='errorclass1'>Mandatory Field</div>")
				  }
				 $j('#'+variabl).focus()
				 return false
		}else{
			$j('#'+variabl).removeClass("errorclass")
			$j('#'+variabl+'-error').remove()
		} 
		
	
	 var variabl="apassword"
	if(pwdright!=4){
		  $j('#'+variabl).addClass("errorclass")
			  if(!$j('#'+variabl+'-error').length){
			   $j('#'+variabl).after("<div id='"+variabl+"-error' class='errorclass1'>Mandatory Field</div>")
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
			   $j('#'+variabl).after("<div id='"+variabl+"-error' class='errorclass1'>Mandatory Field</div>")
			  }
			 $j('#'+variabl).focus()
			 return false
	}else{
		$j('#'+variabl).removeClass("errorclass")
		$j('#'+variabl+'-error').remove()
	}
	
	var variabl="apassword1"
	if($j('#'+variabl).val()!=$('#apassword').val()){
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