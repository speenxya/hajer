<?php include "../includes/ini.php"?>
<?php $pagetitle1="mforgot";?>
<?php $pagetitle="نسيت كلمة المرور"?>
<?php syncbasket(session_id());?>
<?php 
$clientsupplier=m_fill("clientsupplier",$_POST);
//supplierlogin
if($clientsupplier=="supplier"){
	$email=m_fill("email",$_POST);
	
	
	
	
	$suppliersa=$con->getcertainvalue("select * from access where email='".m_prepare($email)."' and aactive='Yes'  and atype='normal' and deleted='0'",array("accessid"=>"accessid","ausername"=>"ausername","apassword"=>"apassword","email"=>"email","fname"=>"fname","lname"=>"lname","accessid"=>"accessid"));
	if(!isset($suppliersa['accessid'])){
		$msgclient="<font class='itsnotok'> بريد الالكتروني غير صالحة</font>";
	}else{
		
		$body="<table>
		<tr>
		<td><div style='text-align:center'><img src='".$m_rooturl."images/logoprint.png' style='max-width:100%'></div><br><br>
		لإعادة تعيين كلمة المرور الخاصة بك ، يرجى النقر على الرابط التالي:<br><br>
		<a href='".$m_rooturl."arm/resetpassword?change=".base64_encode($suppliersa['accessid'])."'>".$m_rooturl."arm/resetpassword?change=".base64_encode($suppliersa['accessid'])."</a>
        
       
		</td>
		</tr>
		</table>";
		
	
		
		
				   

		 if(sendmail($m_config['coperationsemail'],$suppliersa['email'], $titl." Password request",$body)){
					   $msgclient="<font class='itsok'>تم إرسال الرابط لتعيين  كلمة المرور الجديدة الخاصة بك</font>";
				   }else{
					   $msgclient="<font class='itsok'>خطأ أثناء إرسال البريد الإلكتروني، يرجى المحاولة مرة أخرى في وقت لاحق</font>";
				   }
		 
	
		 
		 
		 
      
      
	}
}
?>
<!DOCTYPE html>
<html>
	

<head>
		<!-- Basic -->
		<meta charset="utf-8">
		<title><?php echo $titlar?> | <?php echo $pagetitle?></title>
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
                   <div>
                 <table style="width:100%">
          <tr>
            <td style="vertical-align:top"><table align="center" class="formMain">
                <tr>
                <td style="vertical-align:top;width:100%"><div class="content shadow">
                    
                      <form name="formclient" method="post" action="">
                                   <input type="hidden" name="clientaction" value="1">
                                   <?php if(isset($msgclient)){?>
									<div style="margin-bottom:5px"><?php echo $msgclient?></div><br />
                                 <?php }?>
                                يرجى إدخال عنوان بريدك الإلكتروني لإعادة تعيين  كلمة المرور الخاصة بك .<br /><br />
                                 <table width="97%">
                                 
                                  
                                  <tr>
                                    <td class="login" width="100px"><label for="email">بريد الالكتروني:</label> <font class="itsnotok">*</font><br>
                                    <input type="text" name="email" id="email" class="inputtext" style="width:100%;padding:3px" autocomplete="off"></td>
                                  </tr>
                                  <tr><td>&nbsp;</td></tr>
                                  <tr>
                                  <td class="right" colspan="3"><div style="float:right"><button type="submit"  class="butt">&nbsp;&nbsp;استعادة</button></div></td>
                                  </tr>
                                </table>
                                <input type="hidden" name="clientsupplier" value="supplier">
                                </form>
                  </div></td>
              </tr>
              </table></td>
          </tr>
        </table>
                  



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
				
				
		
			 })
			
			function changequan(typ,coun){
	valu=$j('#quan'+coun+'').val()
	if(typ=="-"){
		 valu--;
		 if(valu<=1){
			 valu=1;
		 }
		 $j('#quan'+coun+'_1').html(valu)
		 $j('#quan'+coun+'').val(valu)
	}else{
		 valu++;
		 if(valu>20){
			 valu=20;
		 }
		 $j('#quan'+coun+'_1').html(valu)
		 $j('#quan'+coun+'').val(valu)
	}
}
		</script>
	</body>


</html>