<div id="preload" style="display:none">

</div>
<div style="background-color: #1a3282;position:fixed;bottom:0px;width:100%;z-index:99;padding:5px" class="footerholder">
<div style="max-width:500px;margin:0 auto">
  <div style="float:left;width:20%;text-align: center">
   <a href="index">
    <div><?php if($pagetitle1=='mindex'){?><img src="../images/b5m.png?v=1" style="width:80%;padding:0 10px"><?php }else{?><img class="footerhover" hover="../images/b5m.png" normal="../images/b5.png" src="../images/b5.png" style="width:80%;padding:0 10px"><?php }?></div>
    <div style="color:#ffffff;font-size:11px" <?php if($pagetitle1=='mindex'){?>class="mactive"<?php }?>>Home</div>
   </a> 
  </div>
 
  <div style="float:left;width:20%;text-align: center">
   <a href="wishlist">
    <div><?php if($pagetitle1=='mwishlist'){?><img src="../images/b3m?v=1.png" style="width:80%;padding:0 10px"><?php }else{?><img class="footerhover" hover="../images/b3m.png" normal="../images/b3.png" src="../images/b3.png" style="width:80%;padding:0 10px""><?php }?></div>
    <div style="color:#ffffff;font-size:11px" <?php if($pagetitle1=='mwishlist'){?>class="mactive"<?php }?>>Wishlist</div>
   </a> 
  </div>
   <div style="float:left;width:20%;text-align: center">
   <a href="cart">
    <div><?php if($pagetitle1=='mcart'){?><img src="../images/b2m.png?v=1" style="width:80%;padding:0 10px"><?php }else{?><img class="footerhover" hover="../images/b2m.png" normal="../images/b2.png" src="../images/b2.png" style="width:80%;padding:0 10px""><?php }?></div>
    <div style="color:#ffffff;font-size:11px" <?php if($pagetitle1=='mcart'){?>class="mactive"<?php }?>>Cart
    <span class="count cart-count" style="position:absolute;top:10px;background-color:#000000;border-radius:50%;padding:1px 5px"><?php echo getcartcount()?></span></div>
   </a> 
  </div>
   <div style="float:left;width:20%;text-align: center">
   <a href="orderhistory">
    <div><?php if($pagetitle1=='morderhistory'){?><img src="../images/b4m.png?v=1" style="width:80%;padding:0 10px"><?php }else{?><img class="footerhover" hover="../images/b4m.png" normal="../images/b4.png" src="../images/b4.png" style="width:80%;padding:0 10px""><?php }?></div>
    <div style="color:#ffffff;font-size:11px" <?php if($pagetitle1=='morderhistory'){?>class="mactive"<?php }?>>My Orders</div>
   </a> 
  </div>
  <div style="float:left;width:20%;text-align: center">
   <a href="editprofile.php">
    <div><?php if($pagetitle1=='meditprofile'){?><img src="../images/b1m.png?v=1" style="width:80%;padding:0 10px"><?php }else{?><img class="footerhover" hover="../images/b1m.png" normal="../images/b1.png" src="../images/b1.png" style="width:80%;padding:0 10px"><?php }?></div>
    <div style="color:#ffffff;font-size:11px" <?php if($pagetitle1=='meditprofile'){?>class="mactive"<?php }?>>My Profile</div>
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
