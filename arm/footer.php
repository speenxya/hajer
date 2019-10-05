<div style="background-color: #1a3282;position:fixed;bottom:0px;width:100%;z-index:99;padding:5px" class="footerholder">
<div style="max-width:500px;margin:0 auto">
  
 
 
  
  
        
  <div style="float:left;width:20%;text-align: center">
  <?php 
  $footerpage="editprofile.php";
if(!isset($_SESSION['hj_id'])){
    $footerpage="signlog.php?redirector=editprofile";
    }?>
   <a href="<?php echo $footerpage?>" class="footeritem footerhover">
    <div><?php if($pagetitle1=='meditprofile'){?><i class="fa fa-user " style="color:#39b54a;font-size:30px;padding-top:1px"></i>><?php }else{?><i class="fa fa-user footerhover" style="color:#ffffff;font-size:30px;padding-top:1px"></i><?php }?></div>
    <div style="color:#ffffff;font-size:9px" class=" footerhover<?php if($pagetitle1=='meditprofile'){?>mactive<?php }?>">ملفي الشخصي</div>
   </a> 
  </div>
   <div style="float:left;width:20%;text-align: center">
   <?php 
  $footerpage="orderhistory.php";
if(!isset($_SESSION['hj_id'])){
    $footerpage="signlog.php?redirector=orderhistory";
    }?>
   <a href="<?php echo $footerpage?>" class="footeritem footerhover">
    <div><?php if($pagetitle1=='morderhistory'){?><i class="fa fa-pencil-square-o " style="color:#39b54a;font-size:30px;padding-top:1px"></i><?php }else{?><i class="fa fa-pencil-square-o footerhover" style="color:#ffffff;font-size:30px;padding-top:1px"></i><?php }?></div>
    <div style="color:#ffffff;font-size:9px" class=" footerhover<?php if($pagetitle1=='morderhistory'){?>mactive<?php }?>">طلباتي</div>
   </a> 
  </div>
   <div style="float:left;width:20%;text-align: center;position:relative">
   <a href="cart" class="footeritem footerhover">
    <div><?php if($pagetitle1=='mcart'){?><i class="fa fa-shopping-cart " style="color:#39b54a;font-size:30px;padding-top:1px"></i><?php }else{?><i class="fa fa-shopping-cart footerhover" style="color:#ffffff;font-size:30px;padding-top:1px"></i><?php }?></div>
    <div style="color:#ffffff;font-size:9px" class=" footerhover<?php if($pagetitle1=='mcart'){?>mactive<?php }?>">سلة التسوق
    <span class="count cart-count" style="position:absolute;top:10px;right:15px;top:5px;background-color:#000000;border-radius:50%;padding:1px 5px"><?php echo getcartcount()?></span></div>
   </a> 
  </div>
   <div style="float:left;width:20%;text-align: center">
   <?php 
  $footerpage="wishlist.php";
if(!isset($_SESSION['hj_id'])){
    $footerpage="signlog.php?redirector=wishlist";
    }?>
   <a href="<?php echo $footerpage?>" class="footeritem footerhover">
    <div><?php if($pagetitle1=='mwishlist'){?><i class="fa fa-heart-o " style="color:#39b54a;font-size:30px;padding-top:1px"></i><?php }else{?><i class="fa fa-heart-o footerhover" style="color:#ffffff;font-size:30px;padding-top:1px"></i><?php }?></div>
    <div style="color:#ffffff;font-size:9px" class="footerhover <?php if($pagetitle1=='mwishlist'){?>mactive<?php }?>">قائمة المفضلة</div>
   </a> 
  </div>
  <div style="float:left;width:20%;text-align: center">
   <a href="index" class="footeritem footerhover">
    <div><?php if($pagetitle1=='mindex'){?><i class="fa fa-home " style="color:#39b54a;font-size:30px;padding-top:1px"></i><?php }else{?><i class="fa fa-home footerhover" style="color:#ffffff;font-size:30px;padding-top:1px"></i><?php }?></div>
    <div style="color:#ffffff;font-size:9px" class="footerhover <?php if($pagetitle1=='mindex'){?>mactive<?php }?>">الرئيسية</div>
   </a> 
  </div>      
        
  </div>
 
  
  
  
  
</div>


<script>

		function m_submitfooter(){
		
		 var variabl="fname1"
		if(jQuery('#'+variabl).val().trim()==''){
			  jQuery('#'+variabl).addClass("errorclass")
				  if(!jQuery('#'+variabl+'-error').length){
				   jQuery('#'+variabl).after("<div id='"+variabl+"-error' class='errorclass1'>Required Field</div>")
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
				   jQuery('#'+variabl).after("<div id='"+variabl+"-error' class='errorclass1'>Required Field / Enter Correct Email</div>")
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
				   jQuery('#'+variabl).after("<div id='"+variabl+"-error' class='errorclass1'>Required Field</div>")
				  }
				 jQuery('#'+variabl).focus()
				 return false
		}else{
			jQuery('#'+variabl).removeClass("errorclass")
			jQuery('#'+variabl+'-error').remove()
		} 
		
		

	return true

}
        </script>

<!-- Piwik -->
<script type="text/javascript">
  var _paq = _paq || [];
  _paq.push(["setDomains", ["*.example.org"]]);
  _paq.push(['trackPageView']);
  _paq.push(['enableLinkTracking']);
  (function() {
    var u="//jawhara.online/stats/";
    _paq.push(['setTrackerUrl', u+'piwik.php']);
    _paq.push(['setSiteId', '1']);
    var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
    g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
  })();
</script>
<noscript><p><img src="//148.72.238.42/stats/piwik.php?idsite=1" style="border:0;" alt="" /></p></noscript>
<!-- End Piwik Code -->

<script type="text/javascript" src="../js/autocomplete.js"></script>
