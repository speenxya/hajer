<?php include "../includes/ini.php";
$id=m_fill("id",$_REQUEST);
if(!isset($_SESSION['hj_language'])){
$_SESSION['hj_language']='SAR';
}
//$id='6-hj';
checkofferdate();
$data=$con->fetch_array($con->query("select * from projects left join supplier on supplierid=pidsupplier left join category on categoryid=idcategory left join brands on brandsid=idbrands where projects.deleted='0' and projectsid='".m_prepare($id)."'"));
if($data['projectsid']==''){
	echo changelocation("products");
	exit();
}
$data['pquantity']=getstock($data['projectsid'],'','',session_id());?>
<?php checkofferdate();?>
<?php $pagetitle1="mproducts";
$pagetitle=$data['ptitlear']?>
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
		<title><?php echo $titlar?></title>
		<meta name="keywords" content="" />
		<meta name="description" content="<?php echo $titlar?>">
        <meta name="robots" content="noindex">
		
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
		<link rel="stylesheet" href="../css/style-layout11ar.css?v=1">
		<!-- Icon Fonts  -->
		<link rel="stylesheet" href="../font/style.css">
<link rel="stylesheet" href="../styles/fancybox.css">
<link type="text/css" href="../styles/notificationar.css" rel="stylesheet"  />
<script src="../external/jquery/jquery-2.1.4.min.js"></script>
<script src="../external/imagesloaded/imagesloaded.pkgd.min.js"></script>
<script src="../external/elevatezoom/jquery.elevatezoom.js"></script>
<script src="../external/slick/slick.min.js"></script>
<script src="../js/custom.js"></script>
<script>
function changecolor(x){
       if(x!=''){
        	if($j('.product-images-carousel ul').hasClass("slick-initialized")){
        	   $j('.product-images-carousel ul').slick('slickUnfilter')
                    $j('.product-images-carousel ul').slick('unslick');
                      }
                      if($j('#mobileGallery').hasClass("slick-initialized")){
        	   $j('#mobileGallery').slick('slickUnfilter')
                    $j('#mobileGallery').slick('unslick');
                      }
                      
                thumbnailsCarousel($j('.product-images-carousel ul'));  
                thumbnailsCarousel($j('#mobileGallery'));  	
        
        $j('.product-images-carousel ul').slick('slickFilter', jQuery(".colorimageholder[thecolor="+x.replace(" ","")+"]").parent());
        $j('#mobileGallery').slick('slickFilter', jQuery(".colorimageholder[thecolor="+x.replace(" ","")+"]").parent());
                
                 jQuery(".themainimage").hide()
        jQuery(".themainimage"+x.replace(" ","")).eq(0).show()
        
        $j.removeData($j('img'), 'elevateZoom');
      $j('.zoomContainer').remove();
        	elevateZoom();
            
                  
                    
        
        //	if($j('.product-images-carousel ul').hasClass("slick-initialized")){
                   // $j('.product-images-carousel ul').slick('unslick');
                  //  }
                    
        //$j('#smallGallery').slick('refresh');
        
        
        jQuery(".colorimageholder[thecolor="+x.replace(" ","")+"]").click()
        jQuery.post( "ajaxsize.php?id=<?php echo $data['projectsid']?>&name="+x, function( data ) {
					jQuery('.sizeholder').html(data)
                    
                    
        //jQuery(".zoomLens").css("width","100px")
        
                                        
                    

});
}else{
    	jQuery('.sizeholder').html(' <input type="hidden" name="thesize" id="thesize" value="">')
    }
        }
        
        function setmax(){
            tempm=jQuery('#thesize').attr("themaxx");
            if (typeof tempm !== typeof undefined && tempm !== false) {
                   var themax=tempm
                }else{
            var themax=(jQuery('option:selected', jQuery('#thesize')).attr('themax'))
            }
            thelabel=themax;
            if(typeof(themax)=='undefined'){
                
                themax="1"
                thelabel='يرجى الاختيار'
                }
                jQuery(".number").attr("maxx", themax);
            jQuery(".availabi").html(thelabel);
            
            jQuery("#quantity0").val("1");
            if(themax>0){
                jQuery(".quantityholder").show()
                }else{
                    jQuery(".quantityholder").hide()
                    }
            
            }
</script>
		<!-- Head Libs -->	
		<!-- Modernizr -->
		<script src="../external/modernizr/modernizr.js"></script>
	</head>
	<body class="index">
		<?php include "loader.php"?>
        </body>
		<!-- الرجوع to top -->
	    <div class="back-to-top"><span class="icon-keyboard_arrow_up"></span></div>
	    <!-- /الرجوع to top -->
	    <!-- mobile menu -->
				
	    <!-- /mobile menu -->
		<!-- HEADER section -->
		
		<!-- End HEADER section -->		
		<!-- CONTENT section -->
		<div id="pageContent">
        <div>
		  <div class="">
		    <div class="container">
		    	
		    	<!--  -->
		    	<div class="product-popup">
					<div class="product-popup-content">
					<div class="container-fluid">
						<div class="row product-info-outer">
						<div class="col-sm-12 col-md-12 col-lg-12 col-xl-8">
							<div class="row">
								<div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
									<div class="product-main-image">
										<?php if($data['imageb']!=''){?>
										<div class="product-main-image__item"><img class="product-zoom" src='../uploads/projects/<?php echo $data['imageb']?>'  data-zoom-image="../uploads/projects/<?php echo $data['imageb']?>" alt="" /></div>
                                        <?php }else{?>
                                        
                                          <?php $tempcount=0; $pp=$con->query("select * from projectspics left join colors on colorsid=iidcolor where idproject='".$data['projectsid']."' and projectspics.deleted='0'  group by colorname");
					while($p=$con->fetch_array($pp)){?>
                    <div class="product-main-image__item themainimage themainimage<?php echo str_replace(" ","",$p['colorname'])?>" style="<?php if($tempcount==0){?>display:bloock<?php }else{?>display:none<?php }?>"><img  class="product-zoom" src='../uploads/projects/<?php echo $p['image']?>'  data-zoom-image="../uploads/projects/<?php echo $p['image']?>" alt="" /></div>
                    <?php $tempcount++;}?>
                    
                                        <?php }?>
										<div class="product-main-image__zoom"></div>
									</div>
									
									<!--<a href="http://www.youtube.com/watch?v=0O2aH4XLbto" class="video-link"><span class="icon icon-videocam"></span>Video</a>-->
								</div>
								<div class="product-info col-sm-6 col-md-6 col-lg-6 col-xl-6" style="padding:20px">
									<div class="wrapper hidden-xs">
										<!--<div class="product-info__sku pull-right">SKU: <strong></strong></div>-->
										<!--<div class="product-info__availability pull-left">التوفر:   <?php if($data['pquantity']!=0){?><strong class="color">متوفر</strong><?php }else{?>غير متوفر<?php }?></div>-->
                                                                                <div class="product-info__availability pull-left">التوفر:  <span class="availabi"> <?php echo $data['pquantity']?></span></div>
									</div>
									<div class="product-info__title">
										<h1><?php echo $data['ptitlear']?></h1>
									</div>
                                    <ul class="product-link">
										<li class="text-right"><a href="javascript:void()"  onClick="ajaxwishlist('<?php echo $data['projectsid']?>');return false;"><span class="icon icon-favorite_border  tooltip-link"></span><span class="text">أضف إلى قائمة الامنيات</span></a></li>
										
									</ul>
                                    
									<div class="wrapper visible-xs">
										<!--<div class="product-info__sku pull-right">SKU: <strong></strong></div>-->
										<!--<div class="product-info__availability pull-left">التوفر:   <?php if($data['pquantity']!=0){?><strong class="color">متوفر</strong><?php }else{?>غير متوفر<?php }?></div>-->
                                        <div class="product-info__availability pull-left">التوفر:  <span class="availabi"> <?php echo $data['pquantity']?></span></div>
									</div>
									
									<div class="price-box product-info__price"><?php echo convert($data['pspecialprice'], $_SESSION['hj_language'],'ar')?> <?php if($data['pspecialprice']!=$data['pprice']){?><span class="price-box__old"><?php echo convert($data['pprice'], $_SESSION['hj_language'],'ar')?></span><?php }?></div>
                                    <div><i>* السعر شامل ضريبة القيمة المضافة </i></div>
									<div class="product-info__review">
										<?php echo getreviews($data['projectsid'])?>
									</div>
                                    <div class="wrapper">
                                    <div style="margin:10px 0">
                                    <a href="product?id=<?php echo $data['projectsid']?>" style="color:#1b3383" target=_parent>عرض التفاصيل</a>
                                    </div>
                                    </div>
									<div class="divider divider--xs product-info__divider"></div>
									<div class="divider divider--sm"></div>
                                    
                                    <?php $query="select * from city where deleted='0' and ccountry='Saudi Arabia' and khasiya!=''  order by citypriority asc,cnameear asc";
                                     $khh=$con->query($query);
                                        if($con->num_rows($khh)!=0){?>
                                        <div style="clear:both">
                                        <div>للحصول على تفاصيل الوصول يرجى اختيار المدينة
                                        <select name="khasiyacity" id="khasiyacity" onChange="changekhasiya(this.value)">
                                        <option value=''></option>
                                        <?php while($kh=$con->fetch_array($khh)){?>
                                           <option value="<?php echo $kh['cityid']?>"><?php echo $kh['cnameear']?></option>
                                        <?php }?>
                                           
                                        </select></div>
                                        <?php 
                                         $khh=$con->query($query);
                                            while($kh=$con->fetch_array($khh)){?>
                                                
                                              <div style="display:none" class='khasiya khasiya<?php echo $kh['cityid']?>'>
                                               <?php echo nl2br($kh['khasiyaar'])?>
                                              </div>
                                            <?php }?>
                                       <br />
                                        <?php }?>
                                    
                                    
									<div class="wrapper">
                                   <div style="display:inline-block;vertical-align:top;padding-right:20px">
                                     <?php $hh=$con->query("select distinct colorname,colornamear from projectspics left join colors on colorsid=iidcolor where projectspics.deleted='0' and iquantity>0 and idproject='".$data['projectsid']."'");
                                     $colorcount=0;
									 if($con->num_rows($hh)!=0){?>
                                      اللون   <select onChange="changecolor(this.value)" name="thecolor" id="thecolor" style="padding:5px 10px;border:1px solid #cccccc">
                                               
                                               <?php while($h=$con->fetch_array($hh)){
                                                if($colorcount==0){
                                                    //get the first quantity as set it as pquantity
                                                     $data['pquantity']=$con->getcertainvalue("select * from projectspics where deleted='0' and idproject='".$data['projectsid']."' limit 1","iquantity");
                                                    ?>
                                                 <script>
                                                   changecolor('<?php echo $h['colorname']?>')
                                                 </script>
                                                <?php }?>
                                                 <option value="<?php echo $h['colorname']?>"><?php echo $h['colornamear']?></option>
                                               <?php $colorcount++;}?>
                                              </select>
                                     <br>  <br>                                              
                                     <?php }else{?>
                                     <input type="hidden" name="thecolor" id="thecolor" value="">
                                     <?php }?>
                                    </div>
                                    <div class="sizeholder" style="display:inline-block;vertical-align:top;padding-right:20px">
                                
                                     <input type="hidden" name="thesize" id="thesize" value="">
                                    
                                    </div>
                                    <div style="clear:both"></div>
                                    
                                    <div class="quantityholder" <?php if($data['pquantity']<=0){?>style="display:none"<?php }?>>
										<div class="pull-right"><span class="qty-label">الكمية:</span></div>
										<div class="pull-right">
											<!--  -->
											<div class="number input-counter" maxx="<?php echo $data['pquantity']?>">
                                            <?php $countp=0;?>
											    <span class="minus-btn"></span>
											    <input type="text" name="quantity<?php echo $countp?>" id="quantity<?php echo $countp?>" value="1" size="5"/>
											    <span class="plus-btn"></span>
											</div>
                                            <input type="hidden" id="productsid<?php echo $countp?>" value="<?php echo $data['projectsid']?>" />
											<!-- / -->
										</div>
										<div class="pull-right"><button type="button" onClick="ajaxbasket('quantity<?php echo $countp?>','productsid<?php echo $countp?>');return false" class="btn btn--ys btn--xxl"><span class="icon icon-shopping_basket"></span> أضف الى السلة</button></div>
                                        
                                        </div>
									</div>
									
									<!-- Go to www.addthis.com/dashboard to customize your tools
									<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-552765a6695754de" async="async"></script>
									<div class="addthis_sharing_toolbox"></div> -->
								</div>
							</div>
							
						</div>
						
					</div>
					</div>
					</div>
				</div>
		    	<!-- / -->
		    </div>
		  </div>
		</div>
        </div>
		<!-- End CONTENT section -->
		<!-- FOOTER section -->
		
		<!-- END FOOTER section -->
		
		<!-- /modalالدخولForm-->

      <!-- Modal (quickViewModal) -->		
		
		<!-- / Modal (quickViewModal) -->
		<!-- Modal (newsletter) -->		
		
		<!-- / Modal (newsletter) -->
		<!--================== /modal ==================-->

		<!-- jQuery 1.10.1--> 
		 
		<!-- Bootstrap 3--> 
		<script src="../external/bootstrap/bootstrap.min.js"></script> 
		<!-- Specific Page External Plugins --> 
		
		<script src="../external/bootstrap-select/bootstrap-select.min.js"></script>  
		<script src="../external/countdown/jquery.plugin.min.js"></script> 
		<script src="../external/countdown/jquery.countdown.min.js"></script>  		
				
		<script src="../external/magnific-popup/jquery.magnific-popup.min.js"></script>  		
		<script src="../external/isotope/isotope.pkgd.min.js"></script> 
		
        
		<script src="../external/parallax/jquery.parallax-1.1.3.js"></script>
		<script src="../external/colorbox/jquery.colorbox-min.js"></script> 
        <script src="../js/fancybox.js"></script> 
<script type="text/javascript" src="../js/notification.js"></script><script src="../js/functions.js"></script> <?php include "extrascripts.php"?> 
 <script src="../js/fancybox.js"></script> 
<script type="text/javascript" src="../js/notification.js"></script><script src="../js/functions.js"></script> <?php include "extrascripts.php"?>		
		<!-- Custom --> 
					
		<script>
			$j(document).ready(function() {
			
			
				// Init All Carousel
				productCarousel($j('#megaMenuCarousel1'),1,1,1,1,1); 
				productCarousel($j('.banner-carousel-1'),4,4,3,2,1);
				brandsCarousel($j('.brands-carousel'));
				productCarousel($j('#carouselFeatured'),6,4,3,2,1);	
				productCarousel($j('.bannerCarousel'),4,3,3,2,1);
				productCarousel($j('.banner-slider'),1,1,1,1,1); 
				
				productCarousel($j('#carousel1'),6,4,3,2,1);	
				productCarousel($j('#carousel2'),6,4,3,2,1);	
				productCarousel($j('#carousel3'),6,4,3,2,1);	
				
				
				mobileOnlyCarousel();
                
                	elevateZoom();


			
				
				productCarousel($j('#postsCarousel'),2,2,2,2,1); // 3 - xl, 3 - lg, 3 - md, 2 - sm, 1 - xs
				
				
			
				
				
			 })
			 
			 function ajaxbasket(quan,id){
	quant=$j('#'+quan).val()
	idd=$j('#'+id).val()
color=$j('#thecolor').val()
	size=$j('#thesize').val()
    
    if(size=='pleaseselect'){
        alert("يرجى اختيار الحجم")
        return false
        }
	
	  $j.ajax({
		   url: 'ajaxbasket.php?add=1&quantity='+quant+'&productsid='+idd+'&color='+color+'&size='+size,
		  beforeSend: function ( xhr ) {}
		}).done(function ( data ) {
		   if(data=="added"){
			     $j.post( "gettotalcart.php", function( data ) {
							  window.parent. $j('.cart-count').html( data );
							});
				$j.post( "gettotalamount.php", function( data ) {
							  window.parent. $j('.cart-amount').html( data );
							});			
			    showNotification({
                                    message: "تمت إضافة  المنتج بنجاح",
                                    type: "success",
									autoClose: true,
                            duration: 2
                                });
		   }else{
			    showNotification({
                                    message: data,
                                    type: "error",
									autoClose: true,
                            duration: 2
                                });
		   }
		   
		});
	  
	  //$j('.page').parent().css('background','url(../images/menuon.png) no-repeat')
	   //$j(this).parent().css('background','url(../images/menuoff.png) no-repeat')
}

function ajaxwishlist(id){
	//idd=$j('#'+id).val()
	  $j.ajax({
		  url: 'ajaxwishlist.php?add=1&productsid='+id,
		  beforeSend: function ( xhr ) {
			         
		          }
		}).done(function ( data ) {
		   if(data=="added"){
                      showNotification({
                                    message: "تمت الإضافة لقائمة الأمنيات بنجاح",
                                    type: "success",
									autoClose: true,
                            duration: 2
                                });
		   }else if(data=="notlogged"){
			    window.location='signlog.php?standalone=1'
		   }else{
			   showNotification({
                                    message: data,
                                    type: "error",
									autoClose: true,
                            duration: 2
                                });
		   }
		   
		});
	  
	  //$j('.page').parent().css('background','url(../images/menuon.png) no-repeat')
	   //$j(this).parent().css('background','url(../images/menuoff.png) no-repeat')
}

function changekhasiya(x){
    
    $j('.khasiya').hide();
    if(x!=''){
    $j('.khasiya'+x).show();
    }
    }
    

		</script>
	</body>


</html>