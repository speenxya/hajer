<footer class="offset-top-0" >
			<!-- footer-data -->
            <div style="background-color:#1b3383;padding-top:40px">
			<div class="container inset-bottom-60" style="">
				<div class="row" >
					<div class="col-sm-12 col-md-5 col-lg-6">
						<div class="footer-logo hidden-xs">
							<!--  Logo  --> 
							<a class="logo" href="index.php"> <img class="" src="../images/logo.png" alt="<?php echo $titl?>"> </a> 
							<!-- /Logo --> 
						</div>
						<div class="box-about">
							<div class="mobile-collapse">
								
								<div class="mobile-collapse__content">
									<p><?php echo $m_config['footertext']?></p>
								</div>
							</div>
                            
						</div>
                        <div style="clear:both;margin-top:40px">&nbsp;</div>
                        <div class="social-links social-links--large">
							<ul>
								<?php if($m_config['instagram']!=''){?><li><a target=_blank class="icon fa fa-instagram" href="<?php echo $m_config['instagram']?>"></a></li><?php }?>
                                <?php if($m_config['facebook']!=''){?><li><a target=_blank class="icon fa fa-facebook" href="<?php echo $m_config['facebook']?>"></a></li><?php }?>
                                <?php if($m_config['whatsapp']!=''){?><li><a target=_blank class="icon fa fa-whatsapp" href="https://web.whatsapp.com/send?phone=<?php echo $m_config['whatsapp']?>"></a></li><?php }?>
								<?php if($m_config['twitter']!=''){?><li><a target=_blank class="icon fa fa-twitter" href="<?php echo $m_config['twitter']?>"></a></li><?php }?>
								<?php if($m_config['google']!=''){?><li><a target=_blank class="icon fa fa-google-plus" href="<?php echo $m_config['google']?>"></a></li><?php }?>
								
								<?php if($m_config['youtube']!=''){?><li><a target=_blank class="icon fa fa-youtube-square" href="<?php echo $m_config['youtube']?>"></a></li><?php }?>
                                
							</ul>
						</div>
                        
					</div>
					<div class="col-sm-12 col-md-7 col-lg-6 border-sep-left whiteplaceholder">
						 <div>
                         <h4 class="mobile-collapse__title" style="color:#ffffff">GET IN TOUCH</h4>
                           <form enctype="multipart/form-data" name="form" method="post" action="contact" onSubmit="return m_submitfooter()">
                        <input type="hidden" name="send" value="1" />
                        <input type="hidden" name="generatedid" value="<?php echo rand(9000,1000000)?>" />
                                    <div style="float:left;width:48%;margin-right:40px" class="sm100 ">
                    <div>
                      <div class="inputEntity">
                        
                        <input tabindex="1" type="text" name="fname1" id="fname1" value="" style="color:#ffffff;border-radius:20px;background-color:#374c92;border:none;padding:20px" placeholder="Your Name">
                      </div>
                      <div class="inputEntity">
                        
                        
                      </div>
                      
                    </div>
                  </div>
                  <div style="float:left;width:48%;" class="sm100">
                    <div class="inputEntity">
                      <input tabindex="3" type="text" name="email1" id="email1" value="" style="color:#ffffff;border-radius:20px;background-color:#374c92;border:none;padding:20px"  placeholder="Your Email">
                    </div>
                   
                    
                  </div>

                  <div style="clear:both;line-height:1px">&nbsp;</div>
                  <div>
                    <div class="inputEntity">
                       
                        <textarea tabindex="5" name="message" id="message" style="color:#ffffff;border-radius:20px;background-color:#374c92;border:none;padding:20px"  placeholder="Your Message"></textarea>
                      </div>
                  </div>
                  <div class="inputEntity"><em class="blue">All fields are mandatory.</em></div>
                  <div class="btnsHolder">
                    <input type="submit" value="Submit" class="btn btn--ys btn--l btn--bg-yellow" style="border-radius:20px;background-color:#39b54a;color:#ffffff;padding:5px 20px;font-size:15px;">
                  </div>
                </form>
                         </div>
					</div>
				</div>
			</div>
            </div>
			<!-- /footer-data --> 
            
            <div style="background-color:#0e74bc;padding-top:20px">
			
            <div class="container inset-bottom-60">
				<div class="row" >
					
					<div class="col-sm-12 col-md-7 col-lg-12 border-sep-left">
						<div class="row">
                        <div class="col-sm-3">
								<div class="mobile-collapse">
									<h4 class="text-left  title-under  mobile-collapse__title" style="color:#ffffff">CONTACT</h4>
									<div class="v-links-list mobile-collapse__content">
										 <?php if($m_config['address']!=''){?><div style="margin-bottom:20px"><?php echo $m_config['address']?></div><?php }?>
                                         <?php if($m_config['tel1']!=''){?><div style="margin-bottom:0px">Telephone : <a href='tel:<?php echo $m_config['tel1']?>'><p style='display:inline' dir='ltr'><?php echo $m_config['tel1']?></p></a></div><?php }?>
                                         <?php if($m_config['tel2']!=''){?><div style="margin-bottom:0px">Telephone : <a href='tel:<?php echo $m_config['tel2']?>'><p style='display:inline' dir='ltr'><?php echo $m_config['tel2']?></p></a></div><?php }?>
                                         <?php if($m_config['fax']!=''){?><div style="margin-bottom:0px">Fax : <?php echo $m_config['fax']?></div><?php }?>
                                         <?php if($m_config['ccontactemail']!=''){?><div style="margin-bottom:0px">Email : <a href="mailto:<?php echo $m_config['ccontactemail']?>"><?php echo $m_config['ccontactemail']?></a></div><?php }?>
                                   </div>      
								</div>
							</div>
							<div class="col-sm-3">
								<div class="mobile-collapse">
									<h4 class="text-left  title-under  mobile-collapse__title" style="color:#ffffff">COMPANY</h4>
									<div class="v-links-list mobile-collapse__content">
										<ul>
											<li><a href="index"><?php echo $alls['mindex']['titlee']?></a></li>
                                            <li><a href="about"><?php echo $alls['mabout']['titlee']?></a></li>
											<li><a href="contact"><?php echo $alls['mcontact']['titlee']?></a></li>
											<li><a href="privacy"><?php echo $alls['mprivacy']['titlee']?></a></li>
                                            
										</ul>
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="mobile-collapse">
									<h4 class="text-left  title-under  mobile-collapse__title" style="color:#ffffff">SUPPORT</h4>
									<div class="v-links-list mobile-collapse__content">
										<ul>
											<li><a href="delivery"><?php echo $alls['mdelivery']['titlee']?></a></li>
											<li><a href="returnproduct"><?php echo $alls['mreturnproduct']['titlee']?></a></li>
                                            <li><a href="terms"><?php echo $alls['mterms']['titlee']?></a></li>
                                            <li><a href="paymentoption"><?php echo $alls['mpaymentoption']['titlee']?></a></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="mobile-collapse">
									<h4 class="text-left  title-under  mobile-collapse__title" style="color:#ffffff">INFORMATION</h4>
									<div class="v-links-list mobile-collapse__content">
										<ul>
											
                                            <li><a href="purchasemethods"><?php echo $alls['mpurchasemethods']['titlee']?></a></li>
                                            <li><a href="vat"><?php echo $alls['VAT']['titlee']?></a></li>
                                            <li><a href="warranty"><?php echo $alls['mwarranty']['titlee']?></a></li>
                                            <li><a href="faq"><?php echo $alls['mfaq']['titlee']?></a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
            </div>
			<!-- /footer-data --> 
			
			<!-- social-icon -->
			
			<!-- /social-icon --> 
			<!-- footer-copyright -->
            <div style="background-color:#1e3386">
			<div class="container footer-copyright">
				<div class="row" style="border:none">
					<div class="col-sm-4">
						<a href="index.php"><?php echo $titl?></a> © <?php echo date("Y")?> . All Rights Reserved. 
					</div>
					<div class="pull-right hidden-xs hidden-sm hidden-md">
						<ul class="list-icon-small">
							<!--<li><img src="../images/custom/icon-payment-01.png" alt=""></li>-->
						<?php if($m_config['visa']=='1'){?>	<li><img src="../images/custom/icon-payment-02.png" alt=""></li><?php }?>
                           <?php if($m_config['cash']=='1'){?> <li><img src="../images/cash.png" alt=""></li><?php }?>
                            <?php if($m_config['mastercard']=='1'){?> <li><img src="../images/mastercard.png" alt="" style="width:50px"></li><?php }?>
                             <?php if($m_config['sadad']=='1'){?> <li><img src="../images/sadad.png" alt="" style="width:50px"></li><?php }?>
                             <?php if($m_config['mada']=='1'){?> <li><img src="../images/mada.png" alt="" style="width:50px"></li><?php }?>
						</ul>
					</div>
				</div>
			</div>
            </div>
			<!-- /footer-copyright --> 
			<a href="#" class="btn btn--ys btn--full visible-xs" id="backToTop">Back to top <span class="icon icon-expand_less"></span></a> 
		</footer>
        
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
  _paq.push(['trackPageView']);
  _paq.push(['enableLinkTracking']);
  (function() {
    var u="//jawharathajer.com/stats/";
    _paq.push(['setTrackerUrl', u+'piwik.php']);
    _paq.push(['setSiteId', '1']);
    var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
    g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
  })();
</script>
<noscript><p><img src="//jawharathajer.com/stats/piwik.php?idsite=1" style="border:0;" alt="" /></p></noscript>
<!-- End Piwik Code -->