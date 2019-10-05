<?php include "../includes/ini.php"?>
<?php $pagetitle1="mindex";

if(isset($_REQUEST['loginuser'])){
     $suppliersa=$con->getcertainvalue("select * from access where accessid='".m_prepare($_REQUEST['loginuser'])."'",array("accessid"=>"accessid","fname"=>"fname","lname"=>"lname","ausername"=>"ausername"));
	if(!isset($suppliersa['accessid'])){
		$msg2="<font class='itsnotok'>Invalid username or password</font>";
	}else{
							   $_SESSION['hj_id']=$suppliersa['accessid'];
							  $_SESSION['hj_username']=$suppliersa['ausername'];
							  $_SESSION['hj_fname']=$suppliersa['fname'];
							  $_SESSION['hj_lname']=$suppliersa['lname'];
                              
                               populatebasket(session_id(),$suppliersa['accessid']);
							  
							   $bas=new basket();
							$bas->init('hj_cart');
						   if(!$bas->get_cart()){  
						      //echo changelocation("index.php?userid=".$suppliersa['accessid']);
								//	exit();
						   }else{
						//	echo changelocation("address.php?userid=".$suppliersa['accessid']);
								//	exit();
						   }
	}
    }

    
    ?>
<!DOCTYPE html>
<html>
	

<head>
		<!-- Basic -->
		<meta charset="utf-8">
		<title><?php echo $titl?></title>
		<meta name="keywords" content="" />
		<meta name="description" content="<?php echo $titl?>">
		
		<?php include "metastuff.php"?>
<link rel="shortcut icon" href="favicon.ico">
		<!-- Mobile Specific Metas -->
		
		<!-- External Plugins CSS -->
		<link rel="stylesheet" href="../external/slick/slick.css">
		<link rel="stylesheet" href="../external/slick/slick-theme.css">
		<link rel="stylesheet" href="../external/magnific-popup/magnific-popup.css">
		<link rel="stylesheet" href="../external/bootstrap-select/bootstrap-select.css">
		<!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
		<link rel="stylesheet" type="text/css" href="../external/rs-plugin/css/settings.css" media="screen" />
		<!-- Custom CSS -->
		<link rel="stylesheet" href="../css/style-layout11.css?v=<?php echo rand(0,100)?>">
		<!-- Icon Fonts  -->
		<link rel="stylesheet" href="../font/style.css">
<link rel="stylesheet" href="../styles/fancybox.css">
<link type="text/css" href="../styles/notification.css" rel="stylesheet"  />
<style>
body {background-color:#f4f4f4}
.product {background-color:#ffffff;padding:0px}
.product__inside__image {padding:10px}
.hrr {float:none;border-top:1px solid #cccccc;max-width:60%;margin:0 auto;margin-top:4%;line-height:1px;height:1px}
</style>
		<!-- Head Libs -->	
		<!-- Modernizr -->
		<script src="../external/modernizr/modernizr.js"></script>
	</head>
	<body class="index">
		<?php //include "loader.php"?>
       
		<!-- Back to top -->
	    <div class="back-to-top"><span class="icon-keyboard_arrow_up"></span></div>
	    <!-- /Back to top -->
	    <!-- mobile menu -->
				
	    <!-- /mobile menu -->
		<!-- HEADER section -->
		<?php include "header.php"?>
<div class="pageholder">
		<!-- End HEADER section -->		
		<!-- CONTENT section -->
		<div id="pageContent">
			
			<div class="container-fluid box-baners">
				<div class="row">
					<!-- col-left -->
					
					<!-- /col-left -->
					<!-- col-right -->
					
					<!-- /col-right -->
				</div>
			</div>
			
		     <div class="bannerloading" style="display:none;text-align:center;padding-top:50px;padding-bottom:30px"><img src="../images/loading.gif"></div>
			<div class="bannerholder" style="display:block">
			<div class="container-fluid box-baners">
				<div class="row">
					<!-- col-left -->
					<div class="col-xs-12 col-sm-12 col-md-6" style="border-bottom:1px solid #ffffff">
						<!-- banner-slider -->
						<div class="banner-slider banner-slider-button">
                        <?php $maina=$con->query("select * from mainad where deleted='0' and mposition='top left' order by priority asc");?>
                                <?php
							while($mainad=$con->fetch_array($maina)){?>
							<div>
								<a href="<?php echo $mainad['url']?>" class="banner zoom-in font-size-responsive">
									<span class="figure">
										<img src="../uploads/background/<?php echo $mainad['background']?>?v=1" alt=""/>
										<span class="figcaption">
											<span class="btn-right-bottom">
												<?php if($mainad['url']!=''){?><span  class="btn btn--ys btn--l btn--bg-yellow" style="display:none">Shop now!</span><?php }?>
											</span>
											<span class="block-left-bottom">
												<span class="block font-size70 color-blue-light custom-font font-bold"><?php echo $mainad['matitlee']?></span>
												<span class="block font-size30 text-dark text-uppercase font-light"><?php echo $mainad['descc']?></span>
											</span>
										</span>
									</span>
								</a>
							</div>
                            <?php }?>
                           
							
						</div>
						<!-- /banner-slider -->
					</div>
					<!-- /col-left -->
					<!-- col-right -->
					<div class="col-xs-12 col-sm-12 col-md-6">
						<div class="row">
							<div class="col-sm-6 col-md-6">
                            <?php $maina=$con->query("select * from mainad where deleted='0' and mposition='top right 1' order by priority asc limit 1");?>
                                <?php
							while($mainad=$con->fetch_array($maina)){?>
								<a href="<?php echo $mainad['url']?>" class="banner zoom-in">
									<span class="figure">
										<img src="../uploads/background/<?php echo $mainad['background']?>?v=1" alt=""/>
										<span class="figcaption text-left">
											<span class="block-table">
												<span class="block-table-cell">
													<span class="block font-size82 text-uppercase font-light"><?php echo $mainad['matitlee']?></span>
													<span class="block text-uppercase font-size26"><?php echo $mainad['descc']?></span>
													<?php if($mainad['url']!=''){?>	<em class="link-btn-20 main-font color-yellow" style="display:none">Shop now! <span class="icon icon-navigate_next"></span></em><?php }?>
												</span>
											</span>
										</span>
									</span>
								</a>
                                <?php }?>
							</div>
							<div class="col-sm-6  col-md-6">
                            <div class="banner-slider banner-slider-button">
                            <?php $maina=$con->query("select * from mainad where deleted='0' and mposition='top right 2' order by priority asc");?>
                                <?php
							while($mainad=$con->fetch_array($maina)){?>
                            <div>
								<a href="<?php echo $mainad['url']?>" class="banner zoom-in">
									<span class="figure">
										<img src="../uploads/background/<?php echo $mainad['background']?>?v=1" alt=""/>
										<span class="figcaption text-center">
                                        <?php if($mainad['matitlee']!=''){?>
											<span class="block-table">
												<span class="block-table-cell" style="position:absolute;top:10px;width:100%">
													<span class="block text-uppercase font-medium  font-size82" style="font-size:50px"><span class="wrapper-green"><?php echo $mainad['matitlee']?></span></span>
													<span class="block text-uppercase font-light font-size26"></span>
												</span>
											</span>
                                            <?php }?>
										</span>
									</span>
								</a>
                                </div>
                                <?php }?>
                                
                                </div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
                            
                            <div class="banner-slider banner-slider-button">
                            <?php $maina=$con->query("select * from mainad where deleted='0' and mposition='top right 3' order by priority asc");?>
                                <?php
							while($mainad=$con->fetch_array($maina)){?>
                            <div>
								<a href="<?php echo $mainad['url']?>" class="banner zoom-in">
									<span class="figure">
										<img src="../uploads/background/<?php echo $mainad['background']?>?v=1" alt=""/>
										<span class="figcaption">
											<span class="block-table">
												<span class="block-table-cell" style="position:absolute;right:20px;bottom:20px">
													<?php if($mainad['url']!=''){?>	<span class="btn btn--ys btn--lg btn--bg-red" style="display:none">Shop now!</span><?php }?>
												</span>
											</span>
										</span>
									</span>
								</a>
                                </div>
                                <?php }?>
                                </div>
							</div>
						</div>
					</div>
					<!-- /col-right -->
				</div>
			</div>
			
		
			
			<div class="content offset-top-0  fullwidth indent-col-none">
				<div class="container">
					<div class="row">
						<div class="bannerCarousel box-baners ">
							<div class="col-sm-3">
                            <?php $maina=$con->query("select * from mainad where deleted='0' and mposition='bottom 1'  order by priority asc limit 1");?>
                                <?php
							while($mainad=$con->fetch_array($maina)){?>
								<a href="<?php echo $mainad['url']?>" class="banner zoom-in">
									<span class="figure">
										<img src="../uploads/background/<?php echo $mainad['background']?>?v=1" alt=""/>
										<span class="figcaption text-left">
											<span class="block-table">
												<span class="block-table-cell">
													<span class="block font-size82 text-uppercase font-bold text-dark"><?php echo $mainad['matitlee']?></span>
													<?php echo $mainad['descc']?>													
												</span>
											</span>
										</span>
									</span>
								</a>
                                <?php }?>
							</div>
							<div class="col-sm-3">
                            <?php $maina=$con->query("select * from mainad where deleted='0' and mposition='bottom 2'  order by priority asc limit 1");?>
                                <?php
							while($mainad=$con->fetch_array($maina)){?>
								<a href="<?php echo $mainad['url']?>" class="banner zoom-in">
								<span class="figure">
									<img src="../uploads/background/<?php echo $mainad['background']?>?v=1" alt=""/>
									<span class="figcaption">
										<span class="block-table">
											<span class="block-table-cell">
												<span class="block text-uppercase font-bold  font-size40"><?php echo $mainad['matitlee']?></span>
												<span class="block text-uppercase top-indent-sm1 font-size22"><?php echo $mainad['descc']?></span>
												<?php if($mainad['url']!=''){?>	<span class="top-indent-md" style="display:none"><br><br>Shop now!</span><?php }?>
											</span>
										</span>
									</span>
								</span>
								</a>
                                <?php }?>
							</div>
							<div class="col-sm-3">
                            <?php $maina=$con->query("select * from mainad where deleted='0' and mposition='bottom 3'  order by priority asc limit 1");?>
                                <?php
							while($mainad=$con->fetch_array($maina)){?>
								<a href="<?php echo $mainad['url']?>" class="banner zoom-in">
								<span class="figure">
									<img src="../uploads/background/<?php echo $mainad['background']?>?v=1" alt=""/>
									<span class="figcaption text-left text-top">
										<span class="block-table">
											<span class="block-table-cell">
												<span class="block text-uppercase font-bold  font-size54"><?php echo $mainad['matitlee']?></span>
												<em class="block top-indent-sm1 @custom-font font-light font-size21 "><?php echo $mainad['descc']?></em>
											</span>
										</span>
									</span>
								</span>
								</a>
                                <?php }?>
							</div>							
							<div class="col-sm-3">
                            <?php $maina=$con->query("select * from mainad where deleted='0' and mposition='bottom 4'  order by priority asc limit 1");?>
                                <?php
							while($mainad=$con->fetch_array($maina)){?>
								<a href="<?php echo $mainad['url']?>" class="banner zoom-in">
									<span class="figure">
										<img src="../uploads/background/<?php echo $mainad['background']?>?v=1" alt=""/>
										<span class="figcaption">
											<span class="block-table">
												<span class="block-table-cell" style="position:absolute;bottom:10px;text-align:center;left:0px;right:0px;width:100%">
                                                 <?php if($mainad['matitlee']!=''){?>
													<span class="block text-uppercase font-medium  font-size82">
														<?php echo $mainad['matitlee']?>
														
													</span>
                                                    <?php }?>
												 <?php if($mainad['descc']!=''){?>	<span class="block text-uppercase font-medium font-size26"><span class="wrapper-coquelicot"><?php echo $mainad['descc']?></span></span><?php }?>
												</span>
											</span>
										</span>
									</span>
								</a>
                                <?php }?>
							</div>
						</div>
					</div>
				</div>
			</div>
            
            </div>
            
            <!-- tab -->
            
            <!-- tab -->
            
            <?php   $countp=0;
            $query="select * from projects left join supplier on supplierid=pidsupplier left join category on categoryid=idcategory left join brands on brandsid=idbrands left join subcategory on subcategoryid=idsubcategory where projects.deleted='0' and (prodactive='Yes' or prodactive='OOS') and pshowhome='Yes' and newarrival='Yes' limit 20  ";
     $res=$con->query($query);
     if($con->num_rows($res)!=0){?>
            
            <div style="text-align:center;margin-top:20px">NEW ARRIVALS <br>
            <h1 class="text-center text-uppercase title-under title-under-color3" style="font-size:40px;font-weight:bold">SOMETHING NEW FOR YOU</h1></div>
            
            <div class="content">
				<div class="container">
					<!-- title -->
					
					<!-- /title --> 
					<!-- carousel -->
                   <div class="" id="" style="overflow-y:hidden;white-space:nowrap;overflow-x: scroll;   -webkit-overflow-scrolling: touch;">
					       <?php
     
        
        while($ress=$con->fetch_array($res)){

             if($ress['image']!=''){
															   $img="../uploads/project_thumb/".$ress['image']."";
														   }else{
															   $img="../uploads/static/default_thumb.jpg";
														   }?>
		
	<div class="" style="vertical-align:top;white-space:normal;display:inline-block;width:160px">
                            <input type="hidden" id="productsid<?php echo $countp?>" value="<?php echo $ress['projectsid']?>" />
                                                           <input type="hidden" id="quantity<?php echo $countp?>" value="1" />
								<!-- product -->
								<div class="product">
									<div class="product__inside">
										<!-- product image -->
										<div class="product__inside__image">
<?php echo gettop($ress)?>
											<a href="product?id=<?php echo $ress['projectsid']?>"> <img src="<?php echo $img?>" alt=""> </a>
											<!-- quick-view -->
											<a href="product?id=<?php echo $ress['projectsid']?>" onClick="window.location='product?id=<?php echo $ress['projectsid']?>'" class="quick-view"><b><span class="icon icon-visibility"></span> Details</b> </a> 
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
										<div class="product__inside__price price-box"><?php echo convert($ress['pspecialprice'], $_SESSION['hj_language'],'en')?><span class="priceliner"></span> <?php if($ress['pspecialprice']!=$ress['pprice']){?><span class="price-box__old"><?php echo convert($ress['pprice'], $_SESSION['hj_language'],'en')?></span><?php }?></div>
										<!-- /product price -->
										<!-- product review -->
										<!-- visible only in row-view mode -->
										<div class="product__inside__review row-mode-visible">
											<?php echo getreviews($ress['projectsid'])?>
										</div>
										<!-- /product review -->
										<div class="product__inside__hover">
											<!-- product info -->
											<div class="product__inside__info">
												<div class="product__inside__info__btns"> 
                                                <?php if(colorexists($ress['projectsid'])){?>
                                                <a href="product?id=<?php echo $ress['projectsid']?>" onClick="window.location='product?id=<?php echo $ress['projectsid']?>'"  id="addtocartholder" class=" btn btn--ys btn--xl"><span class="icon icon-shopping_basket"></span> Add to cart</a>
                                                <?php }else{?>
                                                <a href="javascript:void()" id="addtocartholder"  onClick="ajaxbasket('quantity<?php echo $countp?>','productsid<?php echo $countp?>');return false" class="btn btn--ys btn--xl"><span class="icon icon-shopping_basket"></span> Add to cart</a>
                                                <?php }?>
													<a href="javascript:void()"  onClick="ajaxwishlist('<?php echo $ress['projectsid']?>');return false;" class="btn btn--ys btn--xl visible-xs"><span class="icon icon-favorite_border"></span></a>
													
												</div>
												<ul class="product__inside__info__link hidden-sm">
													<li class="text-right"><span class="icon icon-favorite_border  tooltip-link"></span><a href="javascript:void()"  onClick="ajaxwishlist('<?php echo $ress['projectsid']?>');return false;"><span class="text">Add to wishlist</span></a></li>
													
												</ul>
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
                            <?php $countp++;}?>
                            </div>
					
					<!-- /carousel --> 
				</div>
			</div>
            
            <div class="hrr">&nbsp;</div>
            <?php }?>
            
            
			
			<div class="content">
				<div class="container">
					<!-- title -->
					<div class="title-with-button">
						<div class="carousel-products__button pull-right"> <span class="btn-prev"></span> <span class="btn-next"></span> </div>
						<h2 class="text-center text-uppercase title-under title-under-color2">FEATURED PRODUCTS</h2>
					</div>
					<!-- /title --> 
					<!-- carousel -->
                    <div class="carousel-products row" id="carouselFeatured">
                    <?php
      $query="select * from projects left join supplier on supplierid=pidsupplier left join category on categoryid=idcategory left join brands on brandsid=idbrands left join subcategory on subcategoryid=idsubcategory where projects.deleted='0' and (prodactive='Yes' or prodactive='OOS') and pshowhome='Yes' and isfeatured='Yes' limit 20  ";
     $res=$con->query($query);
        
        while($ress=$con->fetch_array($res)){

             if($ress['image']!=''){
															   $img="../uploads/project_thumb/".$ress['image']."";
														   }else{
															   $img="../uploads/static/default_thumb.jpg";
														   }?>
		
	<div class="col-xs-6 col-sm-3 col-md-6 col-lg-3 col-xl-one-fifth">
                            <input type="hidden" id="productsid<?php echo $countp?>" value="<?php echo $ress['projectsid']?>" />
                                                           <input type="hidden" id="quantity<?php echo $countp?>" value="1" />
								<!-- product -->
								<div class="product">
									<div class="product__inside">
										<!-- product image -->
										<div class="product__inside__image">
<?php echo gettop($ress)?>
											<a href="product?id=<?php echo $ress['projectsid']?>"> <img src="<?php echo $img?>" alt=""> </a>
											<!-- quick-view -->
											<a href="product?id=<?php echo $ress['projectsid']?>" onClick="window.location='product?id=<?php echo $ress['projectsid']?>'" class="quick-view"><b><span class="icon icon-visibility"></span> Details</b> </a> 
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
										<div class="product__inside__price price-box"><?php echo convert($ress['pspecialprice'], $_SESSION['hj_language'],'en')?><span class="priceliner"></span> <?php if($ress['pspecialprice']!=$ress['pprice']){?><span class="price-box__old"><?php echo convert($ress['pprice'], $_SESSION['hj_language'],'en')?></span><?php }?></div>
										<!-- /product price -->
										<!-- product review -->
										<!-- visible only in row-view mode -->
										<div class="product__inside__review row-mode-visible">
											<?php echo getreviews($ress['projectsid'])?>
										</div>
										<!-- /product review -->
										<div class="product__inside__hover">
											<!-- product info -->
											<div class="product__inside__info">
												<div class="product__inside__info__btns"> 
                                                <?php if(colorexists($ress['projectsid'])){?>
                                                <a href="product?id=<?php echo $ress['projectsid']?>" onClick="window.location='product?id=<?php echo $ress['projectsid']?>'"  id="addtocartholder" class=" btn btn--ys btn--xl"><span class="icon icon-shopping_basket"></span> Add to cart</a>
                                                <?php }else{?>
                                                <a href="javascript:void()" id="addtocartholder"  onClick="ajaxbasket('quantity<?php echo $countp?>','productsid<?php echo $countp?>');return false" class="btn btn--ys btn--xl"><span class="icon icon-shopping_basket"></span> Add to cart</a>
                                                <?php }?>
													<a href="javascript:void()"  onClick="ajaxwishlist('<?php echo $ress['projectsid']?>');return false;" class="btn btn--ys btn--xl visible-xs"><span class="icon icon-favorite_border"></span></a>
													
												</div>
												<ul class="product__inside__info__link hidden-sm">
													<li class="text-right"><span class="icon icon-favorite_border  tooltip-link"></span><a href="javascript:void()"  onClick="ajaxwishlist('<?php echo $ress['projectsid']?>');return false;"><span class="text">Add to wishlist</span></a></li>
													
												</ul>
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
                            <?php $countp++;}?>
                    </div>
					
					
					<!-- /carousel --> 
				</div>
			</div>
            <div class="hrr">&nbsp;</div>		
            
            
            
            
            <!-- mobiles-->	
            <?php //check if submenu is hidden
            $theid="21-hj";
             $query="select * from projects left join supplier on supplierid=pidsupplier left join category on categoryid=idcategory left join brands on brandsid=idbrands left join subcategory on subcategoryid=idsubcategory where projects.deleted='0' and (prodactive='Yes' or prodactive='OOS') and pidsupplier='$theid' and pshowhome='Yes' limit 20  ";
     $res=$con->query($query);
     
            $sactive=$con->getcertainvalue("select * from supplier where supplierid='$theid' and deleted='0'",array("sname"=>"sname","sactive"=>"sactive",));
            if($sactive['sactive']=='Yes' && $con->num_rows($res)!=0){?>
            <div class="content">
				<div class="container">
					<!-- title -->
					<div class="title-with-button">
						
						<h2 class="text-center text-uppercase title-under title-under-color2"><a href="products?s=<?php echo urlfriendlyi($sactive['sname'])?>"><?php echo $sactive['sname']?></a></h2>
					</div>
					<!-- /title --> 
					<!-- carousel -->
                   <div class="" id="" style="overflow-y:hidden;white-space:nowrap;overflow-x: scroll;   -webkit-overflow-scrolling: touch;">
					       <?php
     
        
        while($ress=$con->fetch_array($res)){

             if($ress['image']!=''){
															   $img="../uploads/project_thumb/".$ress['image']."";
														   }else{
															   $img="../uploads/static/default_thumb.jpg";
														   }?>
		
	<div class="" style="vertical-align:top;white-space:normal;display:inline-block;width:160px">
                            <input type="hidden" id="productsid<?php echo $countp?>" value="<?php echo $ress['projectsid']?>" />
                                                           <input type="hidden" id="quantity<?php echo $countp?>" value="1" />
								<!-- product -->
								<div class="product">
									<div class="product__inside">
										<!-- product image -->
										<div class="product__inside__image">
<?php echo gettop($ress)?>
											<a href="product?id=<?php echo $ress['projectsid']?>"> <img src="<?php echo $img?>" alt=""> </a>
											<!-- quick-view -->
											<a href="product?id=<?php echo $ress['projectsid']?>" onClick="window.location='product?id=<?php echo $ress['projectsid']?>'" class="quick-view"><b><span class="icon icon-visibility"></span> Details</b> </a> 
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
										<div class="product__inside__price price-box"><?php echo convert($ress['pspecialprice'], $_SESSION['hj_language'],'en')?><span class="priceliner"></span> <?php if($ress['pspecialprice']!=$ress['pprice']){?><span class="price-box__old"><?php echo convert($ress['pprice'], $_SESSION['hj_language'],'en')?></span><?php }?></div>
										<!-- /product price -->
										<!-- product review -->
										<!-- visible only in row-view mode -->
										<div class="product__inside__review row-mode-visible">
											<?php echo getreviews($ress['projectsid'])?>
										</div>
										<!-- /product review -->
										<div class="product__inside__hover">
											<!-- product info -->
											<div class="product__inside__info">
												<div class="product__inside__info__btns"> 
                                                <?php if(colorexists($ress['projectsid'])){?>
                                                <a href="product?id=<?php echo $ress['projectsid']?>" onClick="window.location='product?id=<?php echo $ress['projectsid']?>'"  id="addtocartholder" class=" btn btn--ys btn--xl"><span class="icon icon-shopping_basket"></span> Add to cart</a>
                                                <?php }else{?>
                                                <a href="javascript:void()" id="addtocartholder"  onClick="ajaxbasket('quantity<?php echo $countp?>','productsid<?php echo $countp?>');return false" class="btn btn--ys btn--xl"><span class="icon icon-shopping_basket"></span> Add to cart</a>
                                                <?php }?>
													<a href="javascript:void()"  onClick="ajaxwishlist('<?php echo $ress['projectsid']?>');return false;" class="btn btn--ys btn--xl visible-xs"><span class="icon icon-favorite_border"></span></a>
													
												</div>
												<ul class="product__inside__info__link hidden-sm">
													<li class="text-right"><span class="icon icon-favorite_border  tooltip-link"></span><a href="javascript:void()"  onClick="ajaxwishlist('<?php echo $ress['projectsid']?>');return false;"><span class="text">Add to wishlist</span></a></li>
													
												</ul>
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
                            <?php $countp++;}?>
                            </div>
					
					<!-- /carousel --> 
				</div>
			</div>
             <div class="hrr">&nbsp;</div>
            <?php }?>
            
            
            
            
           <?php //check if submenu is hidden
           //electronics
            $theid="20-hj";
            $query="select * from projects left join supplier on supplierid=pidsupplier left join category on categoryid=idcategory left join brands on brandsid=idbrands left join subcategory on subcategoryid=idsubcategory where projects.deleted='0' and (prodactive='Yes' or prodactive='OOS') and pidsupplier='$theid' and pshowhome='Yes' limit 20  ";
     $res=$con->query($query);
     
            $sactive=$con->getcertainvalue("select * from supplier where supplierid='$theid' and deleted='0'",array("sname"=>"sname","sactive"=>"sactive",));
            if($sactive['sactive']=='Yes' && $con->num_rows($res)!=0){?>
            <div class="content">
				<div class="container">
					<!-- title -->
					<div class="title-with-button">
						
						<h2 class="text-center text-uppercase title-under title-under-color2"><a href="products?s=<?php echo urlfriendlyi($sactive['sname'])?>"><?php echo $sactive['sname']?></a></h2>
					</div>
					<!-- /title --> 
					<!-- carousel -->
                    <div class="" id="" style="overflow-y:hidden;white-space:nowrap;overflow-x: scroll;   -webkit-overflow-scrolling: touch;">
					       <?php
     
        
        while($ress=$con->fetch_array($res)){

             if($ress['image']!=''){
															   $img="../uploads/project_thumb/".$ress['image']."";
														   }else{
															   $img="../uploads/static/default_thumb.jpg";
														   }?>
		
	<div class="" style="vertical-align:top;white-space:normal;display:inline-block;width:160px">
                            <input type="hidden" id="productsid<?php echo $countp?>" value="<?php echo $ress['projectsid']?>" />
                                                           <input type="hidden" id="quantity<?php echo $countp?>" value="1" />
								<!-- product -->
								<div class="product">
									<div class="product__inside">
										<!-- product image -->
										<div class="product__inside__image">
<?php echo gettop($ress)?>
											<a href="product?id=<?php echo $ress['projectsid']?>"> <img src="<?php echo $img?>" alt=""> </a>
											<!-- quick-view -->
											<a href="product?id=<?php echo $ress['projectsid']?>" onClick="window.location='product?id=<?php echo $ress['projectsid']?>'" class="quick-view"><b><span class="icon icon-visibility"></span> Details</b> </a> 
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
										<div class="product__inside__price price-box"><?php echo convert($ress['pspecialprice'], $_SESSION['hj_language'],'en')?><span class="priceliner"></span> <?php if($ress['pspecialprice']!=$ress['pprice']){?><span class="price-box__old"><?php echo convert($ress['pprice'], $_SESSION['hj_language'],'en')?></span><?php }?></div>
										<!-- /product price -->
										<!-- product review -->
										<!-- visible only in row-view mode -->
										<div class="product__inside__review row-mode-visible">
											<?php echo getreviews($ress['projectsid'])?>
										</div>
										<!-- /product review -->
										<div class="product__inside__hover">
											<!-- product info -->
											<div class="product__inside__info">
												<div class="product__inside__info__btns"> 
                                                <?php if(colorexists($ress['projectsid'])){?>
                                                <a href="product?id=<?php echo $ress['projectsid']?>" onClick="window.location='product?id=<?php echo $ress['projectsid']?>'"  id="addtocartholder" class=" btn btn--ys btn--xl"><span class="icon icon-shopping_basket"></span> Add to cart</a>
                                                <?php }else{?>
                                                <a href="javascript:void()" id="addtocartholder"  onClick="ajaxbasket('quantity<?php echo $countp?>','productsid<?php echo $countp?>');return false" class="btn btn--ys btn--xl"><span class="icon icon-shopping_basket"></span> Add to cart</a>
                                                <?php }?>
													<a href="javascript:void()"  onClick="ajaxwishlist('<?php echo $ress['projectsid']?>');return false;" class="btn btn--ys btn--xl visible-xs"><span class="icon icon-favorite_border"></span></a>
													
												</div>
												<ul class="product__inside__info__link hidden-sm">
													<li class="text-right"><span class="icon icon-favorite_border  tooltip-link"></span><a href="javascript:void()"  onClick="ajaxwishlist('<?php echo $ress['projectsid']?>');return false;"><span class="text">Add to wishlist</span></a></li>
													
												</ul>
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
                            <?php $countp++;}?>
                            </div>
					
					<!-- /carousel --> 
				</div>
			</div>
             <div class="hrr">&nbsp;</div>
            <?php }?>
            
           <?php //check if submenu is hidden
           //home
            $theid="23-hj";
             $query="select * from projects left join supplier on supplierid=pidsupplier left join category on categoryid=idcategory left join brands on brandsid=idbrands left join subcategory on subcategoryid=idsubcategory where projects.deleted='0' and (prodactive='Yes' or prodactive='OOS') and pidsupplier='$theid' and pshowhome='Yes' limit 20  ";
     $res=$con->query($query);
     
            $sactive=$con->getcertainvalue("select * from supplier where supplierid='$theid' and deleted='0'",array("sname"=>"sname","sactive"=>"sactive",));
            if($sactive['sactive']=='Yes' && $con->num_rows($res)!=0){?>
            <div class="content">
				<div class="container">
					<!-- title -->
					<div class="title-with-button">
						
						<h2 class="text-center text-uppercase title-under title-under-color2"><a href="products?s=<?php echo urlfriendlyi($sactive['sname'])?>"><?php echo $sactive['sname']?></a></h2>
					</div>
					<!-- /title --> 
					<!-- carousel -->
                    <div class="" id="" style="overflow-y:hidden;white-space:nowrap;overflow-x: scroll;   -webkit-overflow-scrolling: touch;">
					       <?php
     
        
        while($ress=$con->fetch_array($res)){

             if($ress['image']!=''){
															   $img="../uploads/project_thumb/".$ress['image']."";
														   }else{
															   $img="../uploads/static/default_thumb.jpg";
														   }?>
		
	<div class="" style="vertical-align:top;white-space:normal;display:inline-block;width:160px">
                            <input type="hidden" id="productsid<?php echo $countp?>" value="<?php echo $ress['projectsid']?>" />
                                                           <input type="hidden" id="quantity<?php echo $countp?>" value="1" />
								<!-- product -->
								<div class="product">
									<div class="product__inside">
										<!-- product image -->
										<div class="product__inside__image">
<?php echo gettop($ress)?>
											<a href="product?id=<?php echo $ress['projectsid']?>"> <img src="<?php echo $img?>" alt=""> </a>
											<!-- quick-view -->
											<a href="product?id=<?php echo $ress['projectsid']?>" onClick="window.location='product?id=<?php echo $ress['projectsid']?>'" class="quick-view"><b><span class="icon icon-visibility"></span> Details</b> </a> 
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
										<div class="product__inside__price price-box"><?php echo convert($ress['pspecialprice'], $_SESSION['hj_language'],'en')?><span class="priceliner"></span> <?php if($ress['pspecialprice']!=$ress['pprice']){?><span class="price-box__old"><?php echo convert($ress['pprice'], $_SESSION['hj_language'],'en')?></span><?php }?></div>
										<!-- /product price -->
										<!-- product review -->
										<!-- visible only in row-view mode -->
										<div class="product__inside__review row-mode-visible">
											<?php echo getreviews($ress['projectsid'])?>
										</div>
										<!-- /product review -->
										<div class="product__inside__hover">
											<!-- product info -->
											<div class="product__inside__info">
												<div class="product__inside__info__btns"> 
                                                <?php if(colorexists($ress['projectsid'])){?>
                                                <a href="product?id=<?php echo $ress['projectsid']?>" onClick="window.location='product?id=<?php echo $ress['projectsid']?>'"  id="addtocartholder" class=" btn btn--ys btn--xl"><span class="icon icon-shopping_basket"></span> Add to cart</a>
                                                <?php }else{?>
                                                <a href="javascript:void()" id="addtocartholder"  onClick="ajaxbasket('quantity<?php echo $countp?>','productsid<?php echo $countp?>');return false" class="btn btn--ys btn--xl"><span class="icon icon-shopping_basket"></span> Add to cart</a>
                                                <?php }?>
													<a href="javascript:void()"  onClick="ajaxwishlist('<?php echo $ress['projectsid']?>');return false;" class="btn btn--ys btn--xl visible-xs"><span class="icon icon-favorite_border"></span></a>
													
												</div>
												<ul class="product__inside__info__link hidden-sm">
													<li class="text-right"><span class="icon icon-favorite_border  tooltip-link"></span><a href="javascript:void()"  onClick="ajaxwishlist('<?php echo $ress['projectsid']?>');return false;"><span class="text">Add to wishlist</span></a></li>
													
												</ul>
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
                            <?php $countp++;}?>
                            </div>
					
					<!-- /carousel --> 
				</div>
			</div>
             <div class="hrr">&nbsp;</div>
            <?php }?>
            
           <?php //check if submenu is hidden
           //beauty
            $theid="25-hj";
             $query="select * from projects left join supplier on supplierid=pidsupplier left join category on categoryid=idcategory left join brands on brandsid=idbrands left join subcategory on subcategoryid=idsubcategory where projects.deleted='0' and (prodactive='Yes' or prodactive='OOS') and pidsupplier='$theid' and pshowhome='Yes' limit 20  ";
     $res=$con->query($query);
     
            $sactive=$con->getcertainvalue("select * from supplier where supplierid='$theid' and deleted='0'",array("sname"=>"sname","sactive"=>"sactive",));
            if($sactive['sactive']=='Yes' && $con->num_rows($res)!=0){?>
            <div class="content">
				<div class="container">
					<!-- title -->
					<div class="title-with-button">
						
						<h2 class="text-center text-uppercase title-under title-under-color2"><a href="products?s=<?php echo urlfriendlyi($sactive['sname'])?>"><?php echo $sactive['sname']?></a></h2>
					</div>
					<!-- /title --> 
					<!-- carousel -->
                     <div class="" id="" style="overflow-y:hidden;white-space:nowrap;overflow-x: scroll;   -webkit-overflow-scrolling: touch;">
					       <?php
     
        
        while($ress=$con->fetch_array($res)){

             if($ress['image']!=''){
															   $img="../uploads/project_thumb/".$ress['image']."";
														   }else{
															   $img="../uploads/static/default_thumb.jpg";
														   }?>
		
	<div class="" style="vertical-align:top;white-space:normal;display:inline-block;width:160px">
                            <input type="hidden" id="productsid<?php echo $countp?>" value="<?php echo $ress['projectsid']?>" />
                                                           <input type="hidden" id="quantity<?php echo $countp?>" value="1" />
								<!-- product -->
								<div class="product">
									<div class="product__inside">
										<!-- product image -->
										<div class="product__inside__image">
<?php echo gettop($ress)?>
											<a href="product?id=<?php echo $ress['projectsid']?>"> <img src="<?php echo $img?>" alt=""> </a>
											<!-- quick-view -->
											<a href="product?id=<?php echo $ress['projectsid']?>" onClick="window.location='product?id=<?php echo $ress['projectsid']?>'" class="quick-view"><b><span class="icon icon-visibility"></span> Details</b> </a> 
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
										<div class="product__inside__price price-box"><?php echo convert($ress['pspecialprice'], $_SESSION['hj_language'],'en')?> <span class="priceliner"></span> <?php if($ress['pspecialprice']!=$ress['pprice']){?><span class="price-box__old"><?php echo convert($ress['pprice'], $_SESSION['hj_language'],'en')?></span><?php }?></div>
										<!-- /product price -->
										<!-- product review -->
										<!-- visible only in row-view mode -->
										<div class="product__inside__review row-mode-visible">
											<?php echo getreviews($ress['projectsid'])?>
										</div>
										<!-- /product review -->
										<div class="product__inside__hover">
											<!-- product info -->
											<div class="product__inside__info">
												<div class="product__inside__info__btns"> 
                                                <?php if(colorexists($ress['projectsid'])){?>
                                                <a href="product?id=<?php echo $ress['projectsid']?>" onClick="window.location='product?id=<?php echo $ress['projectsid']?>'"  id="addtocartholder" class=" btn btn--ys btn--xl"><span class="icon icon-shopping_basket"></span> Add to cart</a>
                                                <?php }else{?>
                                                <a href="javascript:void()" id="addtocartholder"  onClick="ajaxbasket('quantity<?php echo $countp?>','productsid<?php echo $countp?>');return false" class="btn btn--ys btn--xl"><span class="icon icon-shopping_basket"></span> Add to cart</a>
                                                <?php }?>
													<a href="javascript:void()"  onClick="ajaxwishlist('<?php echo $ress['projectsid']?>');return false;" class="btn btn--ys btn--xl visible-xs"><span class="icon icon-favorite_border"></span></a>
													
												</div>
												<ul class="product__inside__info__link hidden-sm">
													<li class="text-right"><span class="icon icon-favorite_border  tooltip-link"></span><a href="javascript:void()"  onClick="ajaxwishlist('<?php echo $ress['projectsid']?>');return false;"><span class="text">Add to wishlist</span></a></li>
													
												</ul>
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
                            <?php $countp++;}?>
                            </div>
					
					<!-- /carousel --> 
				</div>
			</div>
             <div class="hrr">&nbsp;</div>
            
            <?php }?>
            
            <?php //check if submenu is hidden
           //men
            $theid="22-hj";
            $query="select * from projects left join supplier on supplierid=pidsupplier left join category on categoryid=idcategory left join brands on brandsid=idbrands left join subcategory on subcategoryid=idsubcategory where projects.deleted='0' and (prodactive='Yes' or prodactive='OOS') and pidsupplier='$theid' and pshowhome='Yes' limit 20  ";
     $res=$con->query($query);
     
            $sactive=$con->getcertainvalue("select * from supplier where supplierid='$theid' and deleted='0'",array("sname"=>"sname","sactive"=>"sactive",));
            if($sactive['sactive']=='Yes' && $con->num_rows($res)!=0){?>
            <div class="content">
				<div class="container">
					<!-- title -->
					<div class="title-with-button">
						
						<h2 class="text-center text-uppercase title-under title-under-color2"><a href="products?s=<?php echo urlfriendlyi($sactive['sname'])?>"><?php echo $sactive['sname']?></a></h2>
					</div>
					<!-- /title --> 
					<!-- carousel -->
                    <div class="" id="" style="overflow-y:hidden;white-space:nowrap;overflow-x: scroll;   -webkit-overflow-scrolling: touch;">
					       <?php
     
        
        while($ress=$con->fetch_array($res)){

             if($ress['image']!=''){
															   $img="../uploads/project_thumb/".$ress['image']."";
														   }else{
															   $img="../uploads/static/default_thumb.jpg";
														   }?>
		
	<div class="" style="vertical-align:top;white-space:normal;display:inline-block;width:160px">
                            <input type="hidden" id="productsid<?php echo $countp?>" value="<?php echo $ress['projectsid']?>" />
                                                           <input type="hidden" id="quantity<?php echo $countp?>" value="1" />
								<!-- product -->
								<div class="product">
									<div class="product__inside">
										<!-- product image -->
										<div class="product__inside__image">
<?php echo gettop($ress)?>
											<a href="product?id=<?php echo $ress['projectsid']?>"> <img src="<?php echo $img?>" alt=""> </a>
											<!-- quick-view -->
											<a href="product?id=<?php echo $ress['projectsid']?>" onClick="window.location='product?id=<?php echo $ress['projectsid']?>'" class="quick-view"><b><span class="icon icon-visibility"></span> Details</b> </a> 
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
										<div class="product__inside__price price-box"><?php echo convert($ress['pspecialprice'], $_SESSION['hj_language'],'en')?> <span class="priceliner"></span> <?php if($ress['pspecialprice']!=$ress['pprice']){?><span class="price-box__old"><?php echo convert($ress['pprice'], $_SESSION['hj_language'],'en')?></span><?php }?></div>
										<!-- /product price -->
										<!-- product review -->
										<!-- visible only in row-view mode -->
										<div class="product__inside__review row-mode-visible">
											<?php echo getreviews($ress['projectsid'])?>
										</div>
										<!-- /product review -->
										<div class="product__inside__hover">
											<!-- product info -->
											<div class="product__inside__info">
												<div class="product__inside__info__btns"> 
                                                <?php if(colorexists($ress['projectsid'])){?>
                                                <a href="product?id=<?php echo $ress['projectsid']?>" onClick="window.location='product?id=<?php echo $ress['projectsid']?>'"  id="addtocartholder" class=" btn btn--ys btn--xl"><span class="icon icon-shopping_basket"></span> Add to cart</a>
                                                <?php }else{?>
                                                <a href="javascript:void()" id="addtocartholder"  onClick="ajaxbasket('quantity<?php echo $countp?>','productsid<?php echo $countp?>');return false" class="btn btn--ys btn--xl"><span class="icon icon-shopping_basket"></span> Add to cart</a>
                                                <?php }?>
													<a href="javascript:void()"  onClick="ajaxwishlist('<?php echo $ress['projectsid']?>');return false;" class="btn btn--ys btn--xl visible-xs"><span class="icon icon-favorite_border"></span></a>
													
												</div>
												<ul class="product__inside__info__link hidden-sm">
													<li class="text-right"><span class="icon icon-favorite_border  tooltip-link"></span><a href="javascript:void()"  onClick="ajaxwishlist('<?php echo $ress['projectsid']?>');return false;"><span class="text">Add to wishlist</span></a></li>
													
												</ul>
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
                            <?php $countp++;}?>
                            </div>
					
					<!-- /carousel --> 
				</div>
			</div>
             <div class="hrr">&nbsp;</div>
            
            <?php }?>
            
            <?php //check if submenu is hidden
           //women
            $theid="27-hj";
             $query="select * from projects left join supplier on supplierid=pidsupplier left join category on categoryid=idcategory left join brands on brandsid=idbrands left join subcategory on subcategoryid=idsubcategory where projects.deleted='0' and (prodactive='Yes' or prodactive='OOS') and pidsupplier='$theid' and pshowhome='Yes' limit 20  ";
     $res=$con->query($query);
     
            $sactive=$con->getcertainvalue("select * from supplier where supplierid='$theid' and deleted='0'",array("sname"=>"sname","sactive"=>"sactive",));
            if($sactive['sactive']=='Yes' && $con->num_rows($res)!=0){?>
            <div class="content">
				<div class="container">
					<!-- title -->
					<div class="title-with-button">
						
						<h2 class="text-center text-uppercase title-under title-under-color2"><a href="products?s=<?php echo urlfriendlyi($sactive['sname'])?>"><?php echo $sactive['sname']?></a></h2>
					</div>
					<!-- /title --> 
					<!-- carousel -->
                   <div class="" id="" style="overflow-y:hidden;white-space:nowrap;overflow-x: scroll;   -webkit-overflow-scrolling: touch;">
					       <?php
     
        
        while($ress=$con->fetch_array($res)){

             if($ress['image']!=''){
															   $img="../uploads/project_thumb/".$ress['image']."";
														   }else{
															   $img="../uploads/static/default_thumb.jpg";
														   }?>
		
	<div class="" style="vertical-align:top;white-space:normal;display:inline-block;width:160px">
                            <input type="hidden" id="productsid<?php echo $countp?>" value="<?php echo $ress['projectsid']?>" />
                                                           <input type="hidden" id="quantity<?php echo $countp?>" value="1" />
								<!-- product -->
								<div class="product">
									<div class="product__inside">
										<!-- product image -->
										<div class="product__inside__image">
<?php echo gettop($ress)?>
											<a href="product?id=<?php echo $ress['projectsid']?>"> <img src="<?php echo $img?>" alt=""> </a>
											<!-- quick-view -->
											<a href="product?id=<?php echo $ress['projectsid']?>" onClick="window.location='product?id=<?php echo $ress['projectsid']?>'" class="quick-view"><b><span class="icon icon-visibility"></span> Details</b> </a> 
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
										<div class="product__inside__price price-box"><?php echo convert($ress['pspecialprice'], $_SESSION['hj_language'],'en')?> <span class="priceliner"></span> <?php if($ress['pspecialprice']!=$ress['pprice']){?><span class="price-box__old"><?php echo convert($ress['pprice'], $_SESSION['hj_language'],'en')?></span><?php }?></div>
										<!-- /product price -->
										<!-- product review -->
										<!-- visible only in row-view mode -->
										<div class="product__inside__review row-mode-visible">
											<?php echo getreviews($ress['projectsid'])?>
										</div>
										<!-- /product review -->
										<div class="product__inside__hover">
											<!-- product info -->
											<div class="product__inside__info">
												<div class="product__inside__info__btns"> 
                                                <?php if(colorexists($ress['projectsid'])){?>
                                                <a href="product?id=<?php echo $ress['projectsid']?>" onClick="window.location='product?id=<?php echo $ress['projectsid']?>'"  id="addtocartholder" class=" btn btn--ys btn--xl"><span class="icon icon-shopping_basket"></span> Add to cart</a>
                                                <?php }else{?>
                                                <a href="javascript:void()" id="addtocartholder"  onClick="ajaxbasket('quantity<?php echo $countp?>','productsid<?php echo $countp?>');return false" class="btn btn--ys btn--xl"><span class="icon icon-shopping_basket"></span> Add to cart</a>
                                                <?php }?>
													<a href="javascript:void()"  onClick="ajaxwishlist('<?php echo $ress['projectsid']?>');return false;" class="btn btn--ys btn--xl visible-xs"><span class="icon icon-favorite_border"></span></a>
													
												</div>
												<ul class="product__inside__info__link hidden-sm">
													<li class="text-right"><span class="icon icon-favorite_border  tooltip-link"></span><a href="javascript:void()"  onClick="ajaxwishlist('<?php echo $ress['projectsid']?>');return false;"><span class="text">Add to wishlist</span></a></li>
													
												</ul>
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
                            <?php $countp++;}?>
                            </div>
					
					<!-- /carousel --> 
				</div>
			</div>
             <div class="hrr">&nbsp;</div>
            
            <?php }?>
            
           <?php //check if submenu is hidden
           //kids
            $theid="28-hj";
            $query="select * from projects left join supplier on supplierid=pidsupplier left join category on categoryid=idcategory left join brands on brandsid=idbrands left join subcategory on subcategoryid=idsubcategory where projects.deleted='0' and (prodactive='Yes' or prodactive='OOS') and pidsupplier='$theid' and pshowhome='Yes' limit 20  ";
     $res=$con->query($query);
     
            $sactive=$con->getcertainvalue("select * from supplier where supplierid='$theid' and deleted='0'",array("sname"=>"sname","sactive"=>"sactive",));
            if($sactive['sactive']=='Yes' && $con->num_rows($res)!=0){?>
            <div class="content">
				<div class="container">
					<!-- title -->
					<div class="title-with-button">
						
						<h2 class="text-center text-uppercase title-under title-under-color2"><a href="products?s=<?php echo urlfriendlyi($sactive['sname'])?>"><?php echo $sactive['sname']?></a></h2>
					</div>
					<!-- /title --> 
					<!-- carousel -->
                    <div class="" id="" style="overflow-y:hidden;white-space:nowrap;overflow-x: scroll;   -webkit-overflow-scrolling: touch;">
					       <?php
     
        
        while($ress=$con->fetch_array($res)){

             if($ress['image']!=''){
															   $img="../uploads/project_thumb/".$ress['image']."";
														   }else{
															   $img="../uploads/static/default_thumb.jpg";
														   }?>
		
	<div class="" style="vertical-align:top;white-space:normal;display:inline-block;width:160px">
                            <input type="hidden" id="productsid<?php echo $countp?>" value="<?php echo $ress['projectsid']?>" />
                                                           <input type="hidden" id="quantity<?php echo $countp?>" value="1" />
								<!-- product -->
								<div class="product">
									<div class="product__inside">
										<!-- product image -->
										<div class="product__inside__image">
<?php echo gettop($ress)?>
											<a href="product?id=<?php echo $ress['projectsid']?>"> <img src="<?php echo $img?>" alt=""> </a>
											<!-- quick-view -->
											<a href="product?id=<?php echo $ress['projectsid']?>" onClick="window.location='product?id=<?php echo $ress['projectsid']?>'" class="quick-view"><b><span class="icon icon-visibility"></span> Details</b> </a> 
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
										<div class="product__inside__price price-box"><?php echo convert($ress['pspecialprice'], $_SESSION['hj_language'],'en')?> <span class="priceliner"></span> <?php if($ress['pspecialprice']!=$ress['pprice']){?><span class="price-box__old"><?php echo convert($ress['pprice'], $_SESSION['hj_language'],'en')?></span><?php }?></div>
										<!-- /product price -->
										<!-- product review -->
										<!-- visible only in row-view mode -->
										<div class="product__inside__review row-mode-visible">
											<?php echo getreviews($ress['projectsid'])?>
										</div>
										<!-- /product review -->
										<div class="product__inside__hover">
											<!-- product info -->
											<div class="product__inside__info">
												<div class="product__inside__info__btns"> 
                                                <?php if(colorexists($ress['projectsid'])){?>
                                                <a href="product?id=<?php echo $ress['projectsid']?>" onClick="window.location='product?id=<?php echo $ress['projectsid']?>'"  id="addtocartholder" class=" btn btn--ys btn--xl"><span class="icon icon-shopping_basket"></span> Add to cart</a>
                                                <?php }else{?>
                                                <a href="javascript:void()" id="addtocartholder"  onClick="ajaxbasket('quantity<?php echo $countp?>','productsid<?php echo $countp?>');return false" class="btn btn--ys btn--xl"><span class="icon icon-shopping_basket"></span> Add to cart</a>
                                                <?php }?>
													<a href="javascript:void()"  onClick="ajaxwishlist('<?php echo $ress['projectsid']?>');return false;" class="btn btn--ys btn--xl visible-xs"><span class="icon icon-favorite_border"></span></a>
													
												</div>
												<ul class="product__inside__info__link hidden-sm">
													<li class="text-right"><span class="icon icon-favorite_border  tooltip-link"></span><a href="javascript:void()"  onClick="ajaxwishlist('<?php echo $ress['projectsid']?>');return false;"><span class="text">Add to wishlist</span></a></li>
													
												</ul>
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
                            <?php $countp++;}?>
                            </div>
					
					<!-- /carousel --> 
				</div>
			</div>
             <div class="hrr">&nbsp;</div>
            
            <?php }?>
            
            <?php //check if submenu is hidden
           //baby and toys
            $theid="24-hj";
            $query="select * from projects left join supplier on supplierid=pidsupplier left join category on categoryid=idcategory left join brands on brandsid=idbrands left join subcategory on subcategoryid=idsubcategory where projects.deleted='0' and (prodactive='Yes' or prodactive='OOS') and pidsupplier='$theid' and pshowhome='Yes' limit 20  ";
     $res=$con->query($query);
     
            $sactive=$con->getcertainvalue("select * from supplier where supplierid='$theid' and deleted='0'",array("sname"=>"sname","sactive"=>"sactive",));
            if($sactive['sactive']=='Yes' && $con->num_rows($res)!=0){?>
            <div class="content">
				<div class="container">
					<!-- title -->
					<div class="title-with-button">
						
						<h2 class="text-center text-uppercase title-under title-under-color2"><a href="products?s=<?php echo urlfriendlyi($sactive['sname'])?>"><?php echo $sactive['sname']?></a></h2>
					</div>
					<!-- /title --> 
					<!-- carousel -->
                     <div class="" id="" style="overflow-y:hidden;white-space:nowrap;overflow-x: scroll;   -webkit-overflow-scrolling: touch;">
					       <?php
     
        
        while($ress=$con->fetch_array($res)){

             if($ress['image']!=''){
															   $img="../uploads/project_thumb/".$ress['image']."";
														   }else{
															   $img="../uploads/static/default_thumb.jpg";
														   }?>
		
	<div class="" style="vertical-align:top;white-space:normal;display:inline-block;width:160px">
                            <input type="hidden" id="productsid<?php echo $countp?>" value="<?php echo $ress['projectsid']?>" />
                                                           <input type="hidden" id="quantity<?php echo $countp?>" value="1" />
								<!-- product -->
								<div class="product">
									<div class="product__inside">
										<!-- product image -->
										<div class="product__inside__image">
<?php echo gettop($ress)?>
											<a href="product?id=<?php echo $ress['projectsid']?>"> <img src="<?php echo $img?>" alt=""> </a>
											<!-- quick-view -->
											<a href="product?id=<?php echo $ress['projectsid']?>" onClick="window.location='product?id=<?php echo $ress['projectsid']?>'" class="quick-view"><b><span class="icon icon-visibility"></span> Details</b> </a> 
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
										<div class="product__inside__price price-box"><?php echo convert($ress['pspecialprice'], $_SESSION['hj_language'],'en')?> <span class="priceliner"></span> <?php if($ress['pspecialprice']!=$ress['pprice']){?><span class="price-box__old"><?php echo convert($ress['pprice'], $_SESSION['hj_language'],'en')?></span><?php }?></div>
										<!-- /product price -->
										<!-- product review -->
										<!-- visible only in row-view mode -->
										<div class="product__inside__review row-mode-visible">
											<?php echo getreviews($ress['projectsid'])?>
										</div>
										<!-- /product review -->
										<div class="product__inside__hover">
											<!-- product info -->
											<div class="product__inside__info">
												<div class="product__inside__info__btns"> 
                                                <?php if(colorexists($ress['projectsid'])){?>
                                                <a href="product?id=<?php echo $ress['projectsid']?>" onClick="window.location='product?id=<?php echo $ress['projectsid']?>'"  id="addtocartholder" class=" btn btn--ys btn--xl"><span class="icon icon-shopping_basket"></span> Add to cart</a>
                                                <?php }else{?>
                                                <a href="javascript:void()" id="addtocartholder"  onClick="ajaxbasket('quantity<?php echo $countp?>','productsid<?php echo $countp?>');return false" class="btn btn--ys btn--xl"><span class="icon icon-shopping_basket"></span> Add to cart</a>
                                                <?php }?>
													<a href="javascript:void()"  onClick="ajaxwishlist('<?php echo $ress['projectsid']?>');return false;" class="btn btn--ys btn--xl visible-xs"><span class="icon icon-favorite_border"></span></a>
													
												</div>
												<ul class="product__inside__info__link hidden-sm">
													<li class="text-right"><span class="icon icon-favorite_border  tooltip-link"></span><a href="javascript:void()"  onClick="ajaxwishlist('<?php echo $ress['projectsid']?>');return false;"><span class="text">Add to wishlist</span></a></li>
													
												</ul>
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
                            <?php $countp++;}?>
                            </div>
					
					<!-- /carousel --> 
				</div>
			</div>
             <div class="hrr">&nbsp;</div>
            
            <?php }?>
            
            <?php //check if submenu is hidden
           //daily needs
            $theid="30-hj";
             $query="select * from projects left join supplier on supplierid=pidsupplier left join category on categoryid=idcategory left join brands on brandsid=idbrands left join subcategory on subcategoryid=idsubcategory where projects.deleted='0' and (prodactive='Yes' or prodactive='OOS') and pidsupplier='$theid' and pshowhome='Yes' limit 20  ";
     $res=$con->query($query);
     
            $sactive=$con->getcertainvalue("select * from supplier where supplierid='$theid' and deleted='0'",array("sname"=>"sname","sactive"=>"sactive",));
            if($sactive['sactive']=='Yes' && $con->num_rows($res)!=0){?>
            <div class="content">
				<div class="container">
					<!-- title -->
					<div class="title-with-button">
						
						<h2 class="text-center text-uppercase title-under title-under-color2"><a href="products?s=<?php echo urlfriendlyi($sactive['sname'])?>"><?php echo $sactive['sname']?></a></h2>
					</div>
					<!-- /title --> 
					<!-- carousel -->
                    <div class="" id="" style="overflow-y:hidden;white-space:nowrap;overflow-x: scroll;   -webkit-overflow-scrolling: touch;">
					       <?php
     
        
        while($ress=$con->fetch_array($res)){

             if($ress['image']!=''){
															   $img="../uploads/project_thumb/".$ress['image']."";
														   }else{
															   $img="../uploads/static/default_thumb.jpg";
														   }?>
		
	<div class="" style="vertical-align:top;white-space:normal;display:inline-block;width:160px">
                            <input type="hidden" id="productsid<?php echo $countp?>" value="<?php echo $ress['projectsid']?>" />
                                                           <input type="hidden" id="quantity<?php echo $countp?>" value="1" />
								<!-- product -->
								<div class="product">
									<div class="product__inside">
										<!-- product image -->
										<div class="product__inside__image">
<?php echo gettop($ress)?>
											<a href="product?id=<?php echo $ress['projectsid']?>"> <img src="<?php echo $img?>" alt=""> </a>
											<!-- quick-view -->
											<a href="product?id=<?php echo $ress['projectsid']?>" onClick="window.location='product?id=<?php echo $ress['projectsid']?>'" class="quick-view"><b><span class="icon icon-visibility"></span> Details</b> </a> 
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
										<div class="product__inside__price price-box"><?php echo convert($ress['pspecialprice'], $_SESSION['hj_language'],'en')?> <span class="priceliner"></span> <?php if($ress['pspecialprice']!=$ress['pprice']){?><span class="price-box__old"><?php echo convert($ress['pprice'], $_SESSION['hj_language'],'en')?></span><?php }?></div>
										<!-- /product price -->
										<!-- product review -->
										<!-- visible only in row-view mode -->
										<div class="product__inside__review row-mode-visible">
											<?php echo getreviews($ress['projectsid'])?>
										</div>
										<!-- /product review -->
										<div class="product__inside__hover">
											<!-- product info -->
											<div class="product__inside__info">
												<div class="product__inside__info__btns"> 
                                                <?php if(colorexists($ress['projectsid'])){?>
                                                <a href="product?id=<?php echo $ress['projectsid']?>" onClick="window.location='product?id=<?php echo $ress['projectsid']?>'"  id="addtocartholder" class=" btn btn--ys btn--xl"><span class="icon icon-shopping_basket"></span> Add to cart</a>
                                                <?php }else{?>
                                                <a href="javascript:void()" id="addtocartholder"  onClick="ajaxbasket('quantity<?php echo $countp?>','productsid<?php echo $countp?>');return false" class="btn btn--ys btn--xl"><span class="icon icon-shopping_basket"></span> Add to cart</a>
                                                <?php }?>
													<a href="javascript:void()"  onClick="ajaxwishlist('<?php echo $ress['projectsid']?>');return false;" class="btn btn--ys btn--xl visible-xs"><span class="icon icon-favorite_border"></span></a>
													
												</div>
												<ul class="product__inside__info__link hidden-sm">
													<li class="text-right"><span class="icon icon-favorite_border  tooltip-link"></span><a href="javascript:void()"  onClick="ajaxwishlist('<?php echo $ress['projectsid']?>');return false;"><span class="text">Add to wishlist</span></a></li>
													
												</ul>
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
                            <?php $countp++;}?>
                            </div>
					
					<!-- /carousel --> 
				</div>
			</div>
             <div class="hrr">&nbsp;</div>
            <?php }?>
            
            
            <?php //check if submenu is hidden
           //promotion
            
             $query="select * from projects left join supplier on supplierid=pidsupplier left join category on categoryid=idcategory left join brands on brandsid=idbrands left join subcategory on subcategoryid=idsubcategory where projects.deleted='0' and (prodactive='Yes' or prodactive='OOS') and ppromotion='Yes' and pshowhome='Yes' limit 20  ";
     $res=$con->query($query);
     
            $sactive=$con->getcertainvalue("select * from supplier where supplierid='$theid' and deleted='0'",array("sname"=>"sname","sactive"=>"sactive",));
            if($con->num_rows($res)!=0){?>
            <div class="content">
				<div class="container">
					<!-- title -->
					<div class="title-with-button">
						
						<h2 class="text-center text-uppercase title-under title-under-color2"><a href="products?type=promotion">Promotion</a></h2>
					</div>
					<!-- /title --> 
					<!-- carousel -->
                    <div class="" id="" style="overflow-y:hidden;white-space:nowrap;overflow-x: scroll;   -webkit-overflow-scrolling: touch;">
					       <?php
     
        
        while($ress=$con->fetch_array($res)){

             if($ress['image']!=''){
															   $img="../uploads/project_thumb/".$ress['image']."";
														   }else{
															   $img="../uploads/static/default_thumb.jpg";
														   }?>
		
	<div class="" style="vertical-align:top;white-space:normal;display:inline-block;width:160px">
                            <input type="hidden" id="productsid<?php echo $countp?>" value="<?php echo $ress['projectsid']?>" />
                                                           <input type="hidden" id="quantity<?php echo $countp?>" value="1" />
								<!-- product -->
								<div class="product">
									<div class="product__inside">
										<!-- product image -->
										<div class="product__inside__image">
<?php echo gettop($ress)?>
											<a href="product?id=<?php echo $ress['projectsid']?>"> <img src="<?php echo $img?>" alt=""> </a>
											<!-- quick-view -->
											<a href="product?id=<?php echo $ress['projectsid']?>" onClick="window.location='product?id=<?php echo $ress['projectsid']?>'" class="quick-view"><b><span class="icon icon-visibility"></span> Details</b> </a> 
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
										<div class="product__inside__price price-box"><?php echo convert($ress['pspecialprice'], $_SESSION['hj_language'],'en')?> <span class="priceliner"></span> <?php if($ress['pspecialprice']!=$ress['pprice']){?><span class="price-box__old"><?php echo convert($ress['pprice'], $_SESSION['hj_language'],'en')?></span><?php }?></div>
										<!-- /product price -->
										<!-- product review -->
										<!-- visible only in row-view mode -->
										<div class="product__inside__review row-mode-visible">
											<?php echo getreviews($ress['projectsid'])?>
										</div>
										<!-- /product review -->
										<div class="product__inside__hover">
											<!-- product info -->
											<div class="product__inside__info">
												<div class="product__inside__info__btns"> 
                                                <?php if(colorexists($ress['projectsid'])){?>
                                                <a href="product?id=<?php echo $ress['projectsid']?>" onClick="window.location='product?id=<?php echo $ress['projectsid']?>'"  id="addtocartholder" class=" btn btn--ys btn--xl"><span class="icon icon-shopping_basket"></span> Add to cart</a>
                                                <?php }else{?>
                                                <a href="javascript:void()" id="addtocartholder"  onClick="ajaxbasket('quantity<?php echo $countp?>','productsid<?php echo $countp?>');return false" class="btn btn--ys btn--xl"><span class="icon icon-shopping_basket"></span> Add to cart</a>
                                                <?php }?>
													<a href="javascript:void()"  onClick="ajaxwishlist('<?php echo $ress['projectsid']?>');return false;" class="btn btn--ys btn--xl visible-xs"><span class="icon icon-favorite_border"></span></a>
													
												</div>
												<ul class="product__inside__info__link hidden-sm">
													<li class="text-right"><span class="icon icon-favorite_border  tooltip-link"></span><a href="javascript:void()"  onClick="ajaxwishlist('<?php echo $ress['projectsid']?>');return false;"><span class="text">Add to wishlist</span></a></li>
													
												</ul>
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
                            <?php $countp++;}?>
                            </div>
					
					<!-- /carousel --> 
				</div>
			</div>
             <div class="hrr">&nbsp;</div>
            <?php }?>
            
            
            
            
         <?php $query="select * from news  where deleted='0' and (active='Yes') order by datee desc,ntitle asc limit 10";
							 //echo $query; 
                             $res=$con->query($query);
													   $n=0;
                                                       if($con->num_rows($res)!=0){?>   
			
			<div class="content carusel--parallax"  data-image="" style="padding-top:0px">
				<div class="container">					
					<div class="row">
						<div class="col-lg-12">
							<!-- title -->
							<div class="title-with-button">
								<div class="carousel-products__button pull-right">
									<span class="btn-prev"></span>
									<span class="btn-next"></span>        
								</div>
								<h2 class="text-center text-uppercase title-under title-under-color2">RECENT POSTS</h2>
							</div>
							<!-- /title -->
							<!-- carousel-new -->
							<div class="carousel-products row" id="postsCarousel">
								<!-- slide-->
                                
                                                      
                                                       <?php while($ress=$con->fetch_array($res)){
														   
														   if($ress['image']!=''){
															   $img="../uploads/news_thumb/".$ress['image']."";
														   }else{
															   $img="../uploads/static/default_thumb_news.jpg";
														   }
														   ?>
								<div class="col-sm-3 col-xl-6">
									<!--  -->
									<div class="recent-post-box">
										<div class="col-lg-12 col-xl-6">
											<a href="blog1?id=<?php echo $ress['newsid']?>">
												<span class="figure">
													<img src="<?php echo $img?>" alt="">
                                                    <?php if($ress['datee']!='0000-00-00'){?>
													<span class="figcaption label-top-left">
														<span>
															<b><?php echo formatdate($ress['datee'],"d")?></b>
															<em><?php echo formatdate($ress['datee'],"M")?></em>
														</span>
													</span>
                                                    <?php }?>
												</span>
											</a>
										</div>
										<div class="col-lg-12 col-xl-6">
											<div class="recent-post-box__text">
												<h4><a href="blog1?id=<?php echo $ress['newsid']?>"><?php echo $ress['ntitle']?></a></h4>
												<p>
													<?php echo $ress['sdescc']?>
												</p>
												
											</div>
										</div>
									</div>
									<!-- / -->
								</div>
                                <?php }?>
							
								
							</div>
							<!-- /carousel-new -->
						</div>
					</div>
				</div>
			</div>
            <?php }?>
		
			
			
			
			
			
		</div>
		<!-- End CONTENT section -->
		<!-- FOOTER section -->
		</div>
        <div style="background-color:#1b3383;padding-top:40px;color:#ffffff">
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
                                <?php if($m_config['whatsapp']!=''){?><li><a target=_blank class="icon fa fa-whatsapp" href="https://api.whatsapp.com/send?phone=<?php echo $m_config['whatsapp']?>&amp;text"></a></li><?php }?>
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
<?php include "footer.php"?>
		<!-- END FOOTER section -->
	
	  

	
      

		<!-- jQuery 1.10.1--> 
		<script src="../external/jquery/jquery-2.1.4.min.js"></script> 
		<!-- Bootstrap 3--> 
		<script src="../external/bootstrap/bootstrap.min.js"></script> 
		<!-- Specific Page External Plugins --> 
		<script src="../external/slick/slick.min.js"></script>
		<script src="../external/bootstrap-select/bootstrap-select.min.js"></script>  
		<!--<script src="../external/countdown/jquery.plugin.min.js"></script> 
		<script src="../external/countdown/jquery.countdown.min.js"></script>  			
			
		<script src="../external/magnific-popup/jquery.magnific-popup.min.js"></script> -->	   		
		<script src="../external/isotope/isotope.pkgd.min.js"></script> 
		<script src="../external/imagesloaded/imagesloaded.pkgd.min.js"></script>
		<!--<script src="../external/parallax/jquery.parallax-1.1.3.js"></script>-->
		<script src="../external/colorbox/jquery.colorbox-min.js"></script>
        <script src="../js/fancybox.js"></script> 
<script type="text/javascript" src="../js/notification.js"></script><script src="../js/functions.js"></script> <?php include "extrascripts.php"?> 
		<!-- Custom --> 
		<script src="../js/custom.js?v=1"></script>			
		<script>
        $j(window).load(function(){
           // $j(".bannerloading").fadeOut()
           // $j(".bannerholder").fadeIn()
            
        })
			$j(document).ready(function() {
			
			
				// Init All Carousel
				productCarousel($j('#megaMenuCarousel1'),1,1,1,1,1); 
				productCarousel($j('.-carousel-1'),4,4,3,2,1);
				brandsCarousel($j('.brands-carousel'));
				productCarousel($j('#carouselFeatured'),6,6,3,2,1);	
				productCarousel($j('.bannerCarousel'),4,4,3,2,1);
				//productCarousel($j('.banner-slider'),1,1,1,1,1); 
				
				productCarousel_sec($j('#carousel1'),6,6,3,2,1);	
				productCarousel_sec($j('#carousel2'),6,6,3,2,1);	
				productCarousel_sec($j('#carousel3'),6,6,3,2,1);	
                productCarousel_sec($j('#carousel4'),6,6,3,2,1);
                productCarousel_sec($j('#carousel5'),6,6,3,2,1);
                productCarousel_sec($j('#carousel6'),6,6,3,2,1);
                productCarousel_sec($j('#carousel7'),6,6,3,2,1);
                productCarousel_sec($j('#carousel8'),6,6,3,2,1);
                productCarousel_sec($j('#carousel9'),6,6,3,2,1);
				
				
				mobileOnlyCarousel();
				
				$j('.banner-slider').slick({
					slidesToShow: 1,
					arrows:false,
					slidesToScroll: 1,
					speed: 500,
					autoplay:true,
  						autoplaySpeed:5000,
						responsive: [{
							breakpoint: 1770,
							settings: {
								slidesToShow: 1,
								slidesToScroll: 1
							}
						},{
							breakpoint: 992,
							settings: {
								slidesToShow: 1,
								slidesToScroll: 1
							}
						}, {
							breakpoint: 768,
							settings: {
								slidesToShow: 1,
								slidesToScroll: 1
							}
						}, {
							breakpoint: 480,
							settings: {
								slidesToShow: 1,
								slidesToScroll: 1
							}
						}]
				});
			


			
				
				productCarousel($j('#postsCarousel'),3,3,3,2,1); // 3 - xl, 3 - lg, 3 - md, 2 - sm, 1 - xs
				
				
				
				
				
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
		   
		})
	  
	  //$j('.page').parent().css('background','url(../images/menuon.png) no-repeat')
	   //$j(this).parent().css('background','url(../images/menuoff.png) no-repeat')
}


		</script>
	</body>


</html>