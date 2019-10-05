<?php include "../includes/ini.php"?>
<?php $pagetitle1="msign";
$pagetitle="الدخول / سجل"?>
<!DOCTYPE html>
<html>
	

<head>
		<!-- Basic -->
		<meta charset="utf-8">
		<title><?php echo $titlar?> | <?php echo $pagetitle?></title>
		<meta name="keywords" content="" />
		<meta name="description" content="<?php echo $titlar?>">
        
         <?php 
$standalone=m_fill("standalone",$_REQUEST);


if(isset($_SESSION['hj_id'])){
	echo changelocation("address");
}
if(isset($_REQUEST['register'])){
	$a_raw['fname']=m_fill("fname",$_REQUEST);
	$a_raw['lname']=m_fill("lname",$_REQUEST);
	$a_raw['email']=m_fill("email",$_REQUEST);
	$a=m_prepareall($a_raw);

$duplicate=0;
	  
	  
	  if(trim($a_raw['email'])==''){
		    $duplicate="<font class='itsnotok'>Please enter a valid email address</font>";
	  }
	  
	  
	  if(isset($_REQUEST['registerme'])){
		  if(recordexists("access","accessid",array("email"=>$a['email']),'',"and deleted='0'")){
		  $duplicate="<font class='itsnotok'>بريد الالكتروني موجود</font>";
	      }
		  
		  if($duplicate=='0'){
			  echo changelocation("signlog2?standalone=".$standalone."&fname=".rawurlencode($a_raw['fname'])."&lname=".rawurlencode($a_raw['lname'])."&email=".rawurlencode($a_raw['email'])."");
		  }else{
			  $msg1=$duplicate;
		  }
	  }
	  
}


if(isset($_REQUEST['login'])){
	$a_raw['ausername']=m_fill("ausername",$_REQUEST);
	$a_raw['apassword']=m_fill("apassword",$_REQUEST);
	$a=m_prepareall($a_raw);

$duplicate=0;
	 $suppliersa=$con->getcertainvalue("select * from access where (ausername='".$a['ausername']."' or email='".$a['ausername']."') and apassword='".$a['apassword']."' and aactive='Yes' and deleted='0'",array("accessid"=>"accessid","fname"=>"fname","lname"=>"lname","ausername"=>"ausername"));
	if(!isset($suppliersa['accessid'])){
		$msg2="<font class='itsnotok'>خطأ في اسم المستخدم أو كلمة مرور</font>";
	}else{
							   $_SESSION['hj_id']=$suppliersa['accessid'];
							  $_SESSION['hj_username']=$suppliersa['ausername'];
							  $_SESSION['hj_fname']=$suppliersa['fname'];
							  $_SESSION['hj_lname']=$suppliersa['lname'];
                              
                               populatebasket(session_id(),$suppliersa['accessid']);
                              // exit();
                              
							  
							   $bas=new basket();
							$bas->init('hj_cart');
						   if(!$bas->get_cart()){  
						      echo changelocation("index");
									exit();
						   }else{
							echo changelocation("address");
									exit();
						   }
	}
							  
}

?>
		
		<?php include "metastuff.php"?>
<link rel="shortcut icon" href="favicon.ico">
		<!-- الجوالSpecific Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            <div class="row" style="margin-bottom:20px">
                 <div class="col-sm-12" style="">
                 <a href="../en/facebook2/index?"><img src="../images/fbs.png" alt="facebook"></a>
                  <a href="../en/google2/index?"><img src="../images/googles.png" alt="Google"></a>
                  <!--<a href="../en/twitter2/index?connect=twitter"><img src="../images/twitters.png" alt="twitter"></a>-->
                 </div>
                </div>
                
            <div class="row">
                <div class="col-sm-6" style="">
                <div  style="border:1px solid #cccccc;padding:10px">
                <h3>مستخدم جديد</h3>
                
                 <form enctype="multipart/form-data" name="form1" method="post" action="" onSubmit="return m_submit1()">
                        <input type="hidden" name="register" value="1" />
                        <input type="hidden" name="standalone" value="<?php echo $standalone?>" />
                        
               <?php if(isset($msg1)){?>
                  <?php echo $msg1?>
               <?php }?>
              <div>
                <div class="inputEntity"><label for="email">بريد الالكتروني</label><input type="text" name="email" id="email" ></div>
                
                <div class="btnsHolder"><input class="btn btn-primary" style="width:100%" type="submit" name="registerme" value="سجل"></div>
              </div>
         
            
            </form>
            
            </div>
            
            
                </div>
                <div class="col-sm-6">
                 <div  style="border:1px solid #cccccc;padding:10px">
                <h3>مستخدم مسجل</h3>
                
                <form enctype="multipart/form-data" name="form2" method="post" action="">
                        <input type="hidden" name="login" value="1" />
                         <input type="hidden" name="standalone" value="<?php echo $standalone?>" />
                        
           <?php if(isset($msg2)){?>
                  <?php echo $msg2?>
               <?php }?>
              <div>
                <div class="inputEntity"><label for="ausername">بريد الالكتروني</label><input type="text" name="ausername" id="ausername" ></div>
                <div class="inputEntity"><label for="apassword">كلمة السر</label><input type="password" name="apassword" id="apassword" style="width:95%;display:inline-block">  <a class="eye fa fa-eye" href="#"></a></div>
                
                <div class="btnsHolder" style=""><input class="btn btn-primary" style="width:100%" type="submit" value="الدخول"></div>
                <div><a href="forgot.php" class="btn btn-primary iframe_supplierlogin" style="width:100%;margin-top:5px" >نسيت كلمة المرور</a></div>
              </div>
         
            
            </form>
            </div>
            
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
			 
             $j(".eye").click(function(e){
               e.preventDefault()
                if($j("#apassword").attr("type")=='password'){
                    $j("#apassword").attr("type","text");
                    }else if($j("#apassword").attr("type")=='text'){
                    $j("#apassword").attr("type","password");
                    }
             })
										
										$j("a.iframe_supplierlogin").fancybox({ //for the send to a friend
															'hideOnContentClick': true,
															'type': 'iframe',
															'maxWidth'				: 650,
															'maxHeight'			: 740,
															'autoScale'     	: false
														});
			
				// popup ini			
				$j('.quick-view').magnificPopup({
					type: 'ajax'
				});
			
				// Init All Carousel			
			
				productCarousel($j('#megaMenuCarousel1'),1,1,1,1,1);
				blogCarousel($j('.slider-blog'),1,1,1,1,1);
				
				
		
			 })
			
			function m_submit1(){
	
	
    var variabl="fname"
	if($j('#'+variabl).val()==''){
		  $j('#'+variabl).addClass("errorclass")
			  if(!$j('#'+variabl+'-error').length){
			   $j('#'+variabl).after("<div id='"+variabl+"-error' class='errorclass1'>حقل الزامي</div>")
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
			   $j('#'+variabl).after("<div id='"+variabl+"-error' class='errorclass1'>حقل الزامي</div>")
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
				   $j('#'+variabl).after("<div id='"+variabl+"-error' class='errorclass1'>حقل الزامي</div>")
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