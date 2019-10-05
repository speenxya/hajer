<?php include "../includes/ini.php"?>
<?php $pagetitle1="mwishlist";
$pagetitle="My Wishlist"?>
<?php if(!isset($_SESSION['hj_id'])){
	echo changelocation("signlog");
}?>
<?php if(isset($_REQUEST['remove'])){
	$con->query("delete from wishlist where projectsid='".m_prepare($_REQUEST['remove'])."'");
}?>
<!DOCTYPE html>
<html>
	

<head>
		<!-- Basic -->
		<meta charset="utf-8">
		<title><?php echo $titl?> | <?php echo $pagetitle?></title>
		<meta name="keywords" content="" />
		<meta name="description" content="<?php echo $titl?>">
		
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
                   <div class="row">
                     <div class="col-sm-12">
                         <div class="product-listing row">
                        
                        <?php
				
							  
							 
							 $query="select * from projects left join supplier on supplierid=pidsupplier left join category on categoryid=idcategory left join brands on brandsid=idbrands where projects.deleted='0' and projectsid in (select projectsid from wishlist where userid='".$_SESSION['hj_id']."' )";
							 
							 
							
							 
							 
							 
												   if($con->num_rowsfast($query)!=0){
													   //pager
													   $thispage=isset($_REQUEST['thispage'])?$_REQUEST['thispage']:1;
													   $thispage1=isset($_REQUEST['thispage1'])?$_REQUEST['thispage1']:1;
													   $passingparams="thispage1=".$thispage1."";
													   $passingparamssort="";
														$pager=new pagination($con->con,$query,$thispage,50,$passingparams."&".$passingparamssort);
														  $pager->type="normal"; //dropdown,normal
														  $pager->pagingdistance="2"; //it is the distance of upper and lower part of the page number,can be 0 to show all the records
														  $pager->prev="<";
														  $pager->next=">";
														  $pager->first="<<";
														  $pager->last=">>";
														  $pager->showifonepage=false;
														  
														  //pager
													   $res = $pager->paginate();
													   $countp=0;
													   $n=0;?>
                                                      
                                                       <?php while($ress=$con->fetch_array($res)){
														   
														   if($ress['image']!=''){
															   $img="../uploads/project_thumb/".$ress['image']."";
														   }else{
															   $img="../uploads/static/default_thumb.jpg";
														   }
														   ?>
							
							<div class="col-xs-6 col-sm-3 col-md-6 col-lg-3 col-xl-one-fifth">
                            <input type="hidden" id="productsid<?php echo $countp?>" value="<?php echo $ress['projectsid']?>" />
                                                           <input type="hidden" id="quantity<?php echo $countp?>" value="1" />
								<!-- product -->
								<div class="product product--zoom">
									<div class="product__inside">
										<!-- product image -->
										<div class="product__inside__image">
											<a href="product?id=<?php echo $ress['projectsid']?>"> <img src="<?php echo $img?>" alt=""> </a>
											<!-- quick-view -->
											<a href="quickview?id=<?php echo $ress['projectsid']?>" class="inline_i quick-view"><b><span class="icon icon-visibility"></span> Quick view</b> </a> 
											<!-- /quick-view -->
										</div>
										<!-- /product image -->
										<!-- product name -->
										<div class="product__inside__name">
											<h2><a href="product?id=<?php echo $ress['projectsid']?>"><?php echo wordslice($ress['ptitle'])?></a></h2>
										</div>
										<!-- /product name -->                 <!-- product description -->
										<!-- visible only in row-view mode -->
										
										<!-- /product description -->                 <!-- product price -->
										<div class="product__inside__price price-box"><?php echo convert($ress['pspecialprice'], $_SESSION['hj_language'],'en')?> <?php if($ress['pspecialprice']!=$ress['pprice']){?><span class="price-box__old"><?php echo convert($ress['pprice'], $_SESSION['hj_language'],'en')?></span><?php }?></div>
										<!-- /product price -->
										<!-- product review -->
										<!-- visible only in row-view mode -->
										<div class="product__inside__review row-mode-visible">
											<?php echo getreviews($ress['projectsid'])?>
										</div>
                                        <div style="margin-bottom:10px"><a style="color:red" href="wishlist?remove=<?php echo $ress['projectsid']?>" onClick="return confirm('Are you sure you want to remove?')">Remove from Wishlist</a></div>
										<!-- /product review -->
										<div class="product__inside__hover">
											<!-- product info -->
											<div class="product__inside__info">
												<div class="product__inside__info__btns">
                                                <?php if(colorexists($ress['projectsid'])){?>
                                                <a href="quickview?id=<?php echo $ress['projectsid']?>"  id="addtocartholder" class="inline_i  btn btn--ys btn--xl"><span class="icon icon-shopping_basket"></span> Add to cart</a>
                                                <?php }else{?>
                                                <a href="javascript:void()" id="addtocartholder"  onClick="ajaxbasket('quantity<?php echo $countp?>','productsid<?php echo $countp?>');return false" class="btn btn--ys btn--xl"><span class="icon icon-shopping_basket"></span> Add to cart</a>
                                                <?php }?>
													
												</div>
											</div>
											<!-- /product info -->
											<!-- product rating -->
											<div class="rating row-mode-hide"> <?php echo getreviews($ress['projectsid'])?> </div>
											<!-- /product rating -->
										</div>
									</div>
								</div>
								<!-- /product -->
							</div>
                            <?php $n++;
								$countp++;}?>
           							 <br />
                                     <div class="clearfix"></div>
                                                       <table style="padding:5px">
                                                            <tr>
                                                              <td valign="top"><?php $pager->first()?></td>
                                                              <td valign="top"><?php $pager->previous()?></td>
                                                              <td valign="top"><?php $pager->render()?></td>
                                                              <td valign="top"><?php $pager->next()?></td>
                                                              <td valign="top"><?php $pager->last()?></td>
                                                            </tr>
                </table>
            <?php }else{?>
            No Products Found
            <?php }?>
							
							
							

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
			
				// popup ini			
				
			
				// Init All Carousel			
			
				productCarousel($j('#megaMenuCarousel1'),1,1,1,1,1);
				blogCarousel($j('.slider-blog'),1,1,1,1,1);
				
				
		
			 })
             
             function ajaxbasket(quan,id){
	quant=$j('#'+quan).val()
	idd=$j('#'+id).val()

	  $j.ajax({
		  url: 'ajaxbasket.php?add=1&quantity='+quant+'&productsid='+idd,
		  beforeSend: function ( xhr ) {}
		}).done(function ( data ) {
		   if(data=="added"){
			     $j.post( "gettotalcart.php", function( data ) {
							  $j('.cart-count').html( data );
							});
				$j.post( "gettotalamount.php", function( data ) {
							  $j('.cart-amount').html( data );
							});			
			    showNotification({
                                    message: "Item successfully added",
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
                                    message: "Wishlist successfully added",
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
		</script>
	</body>


</html>