<?php include "../includes/ini.php"?>
<!DOCTYPE html>
<html>
	

<head>
		<!-- Basic -->
		<meta charset="utf-8">
		<title><?php echo $titlar?></title>
		<meta name="keywords" content="" />
		<meta name="description" content="<?php echo $titlar?>">
		
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
		<link rel="stylesheet" href="../css/style-layout11ar.css?v=<?php echo rand(0,100)?>">
		<!-- Icon Fonts  -->
		<link rel="stylesheet" href="../font/style.css">
<link rel="stylesheet" href="../styles/fancybox.css">
<link type="text/css" href="../styles/notificationar.css" rel="stylesheet"  />
<style>
body {background-color:#f4f4f4}
.product {background-color:#ffffff;padding:0px}
.product__inside__image {padding:10px}
.hrr {float:none;border-top:1px solid #cccccc;max-width:60%;margin:0 auto;margin-top:4%;line-height:1px;height:1px}
#carousel10 .slick-prev, #carousel10 .slick-next {top:-50px!important}
</style>
		<!-- Head Libs -->	
		<!-- Modernizr -->
		<script src="../external/modernizr/modernizr.js"></script>
	</head>
	<body class="index">
		<?php //include "loader.php"?>
        
		<!-- الرجوع to top -->
	    <div class="back-to-top"><span class="icon-keyboard_arrow_up"></span></div>
	    <!-- /الرجوع to top -->
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
					<!-- col-right -->
					<div class="col-xs-12 col-sm-12 col-md-6" style="border-bottom:1px solid #ffffff">
						<!-- banner-slider -->
						<div class="banner-slider banner-slider-button">
                        <?php $maina=$con->query("select * from mainad where deleted='0' and mposition='top left' order by priority asc");?>
                                <?php
							while($mainad=$con->fetch_array($maina)){?>
							<div>
								<a href="<?php echo $mainad['urlar']?>" class="banner zoom-in font-size-responsive">
									<span class="figure">
										<img src="../uploads/background/<?php echo $mainad['backgroundar']?>?v=1" alt=""/>
										<span class="figcaption">
											<span class="btn-right-bottom">
												<?php if($mainad['url']!=''){?><span  class="btn btn--ys btn--l btn--bg-yellow" style='direction:rtl;display:none'>اشتر الان!</span><?php }?>
											</span>
											<span class="block-left-bottom">
												<span class="block font-size70 color-blue-light custom-font font-bold"><?php echo $mainad['matitleear']?></span>
												<span class="block font-size30 text-dark text-uppercase font-light"><?php echo $mainad['desccar']?></span>
											</span>
										</span>
									</span>
								</a>
							</div>
                            <?php }?>
                           
							
						</div>
						<!-- /banner-slider -->
					</div>
					<!-- /col-right -->
					<!-- col-left -->
					<div class="col-xs-12 col-sm-12 col-md-6">
						<div class="row">
							<div class="col-sm-6 col-md-6">
                            <?php $maina=$con->query("select * from mainad where deleted='0' and mposition='top right 1' order by priority asc limit 1");?>
                                <?php
							while($mainad=$con->fetch_array($maina)){?>
								<a href="<?php echo $mainad['urlar']?>" class="banner zoom-in">
									<span class="figure">
										<img src="../uploads/background/<?php echo $mainad['backgroundar']?>?v=1" alt=""/>
										<span class="figcaption text-right">
											<span class="block-table">
												<span class="block-table-cell" style="direction:rtl">
													<span class="block font-size82 text-uppercase font-light"><?php echo $mainad['matitleear']?></span>
													<span class="block text-uppercase font-size26"><?php echo $mainad['desccar']?></span>
													<?php if($mainad['url']!=''){?>	<em class="link-btn-20 main-font color-yellow" style='direction:rtl;display:none'>اشتر الان! <span class="icon icon-navigate_next"></span></em><?php }?>
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
								<a href="<?php echo $mainad['urlar']?>" class="banner zoom-in">
									<span class="figure">
										<img src="../uploads/background/<?php echo $mainad['backgroundar']?>?v=1" alt=""/>
										<span class="figcaption text-center">
                                        <?php if($mainad['matitlee']!=''){?>
											<span class="block-table">
												<span class="block-table-cell" style="position:absolute;top:10px;width:100%">
													<span class="block text-uppercase font-medium  font-size82" style="font-size:50px"><span class="wrapper-green"><?php echo $mainad['matitleear']?></span></span>
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
								<a href="<?php echo $mainad['urlar']?>" class="banner zoom-in">
									<span class="figure">
										<img src="../uploads/background/<?php echo $mainad['backgroundar']?>?v=1" alt=""/>
										<span class="figcaption">
											<span class="block-table">
												<span class="block-table-cell" style="direction:rtl;position:absolute;left:20px;bottom:20px">
													<?php if($mainad['url']!=''){?>	<span class="btn btn--ys btn--lg btn--bg-red" style='direction:rtl;display:none'>اشتر الان!</span><?php }?>
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
					<!-- /col-left -->
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
								<a href="<?php echo $mainad['urlar']?>" class="banner zoom-in">
									<span class="figure">
										<img src="../uploads/background/<?php echo $mainad['backgroundar']?>?v=1" alt=""/>
										<span class="figcaption text-right">
											<span class="block-table">
												<span class="block-table-cell" style="direction:rtl">
													<span class="block font-size82 text-uppercase font-bold text-dark"><?php echo $mainad['matitleear']?></span>
													<?php echo $mainad['desccar']?>													
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
								<a href="<?php echo $mainad['urlar']?>" class="banner zoom-in">
								<span class="figure">
									<img src="../uploads/background/<?php echo $mainad['backgroundar']?>?v=1" alt=""/>
									<span class="figcaption">
										<span class="block-table">
											<span class="block-table-cell" style="direction:rtl">
												<span class="block text-uppercase font-bold  font-size40"><?php echo $mainad['matitleear']?></span>
												<span class="block text-uppercase top-indent-sm1 font-size22"><?php echo $mainad['desccar']?></span>
												<?php if($mainad['url']!=''){?>	<span class="top-indent-md" style='direction:rtl;display:none'><br><br>اشتر الان!</span><?php }?>
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
								<a href="<?php echo $mainad['urlar']?>" class="banner zoom-in">
								<span class="figure">
									<img src="../uploads/background/<?php echo $mainad['backgroundar']?>?v=1" alt=""/>
									<span class="figcaption text-right text-top">
										<span class="block-table">
											<span class="block-table-cell" style="direction:rtl">
												<span class="block text-uppercase font-bold  font-size54"><?php echo $mainad['matitleear']?></span>
												<em class="block top-indent-sm1 @custom-font font-light font-size21 "><?php echo $mainad['desccar']?></em>
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
								<a href="<?php echo $mainad['urlar']?>" class="banner zoom-in">
									<span class="figure">
										<img src="../uploads/background/<?php echo $mainad['backgroundar']?>?v=1" alt=""/>
										<span class="figcaption">
											<span class="block-table">
												<span class="block-table-cell" style="direction:rtl;position:absolute;bottom:10px;text-align:center;right:0px;left:0px;width:100%">
                                                 <?php if($mainad['matitleear']!=''){?>
													<span class="block text-uppercase font-medium  font-size82">
														<?php echo $mainad['matitleear']?>
														
													</span>
                                                    <?php }?>
													 <?php if($mainad['descc']!=''){?><span class="block text-uppercase font-medium font-size26"><span class="wrapper-coquelicot"><?php echo $mainad['desccar']?></span></span><?php }?>
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
            
            <!-- tab -->
            
             <?php   $countp=0;
          $query="select * from projects left join supplier on supplierid=pidsupplier left join category on categoryid=idcategory left join brands on brandsid=idbrands left join subcategory on subcategoryid=idsubcategory where projects.deleted='0' and (prodactive='Yes' or prodactive='OOS') and pshowhome='Yes' and newarrival='Yes'  limit 20";
     $res=$con->query($query);
     if($con->num_rows($res)!=0){?>
            
            <div style="text-align:center;margin-top:20px">وصل حديثا<br>
            <h1 class="text-center text-uppercase title-under title-under-color3" style="font-size:40px;font-weight:bold">شيء جديد لك</h1></div>
            
            <div class="content">
				<div class="container">
					<!-- title -->
					
					<!-- /title --> 
					<!-- carousel -->
                    <div class="carousel-products row" id="carousel10">
					       <?php
    
        
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
<?php echo gettopar($ress)?>
											<a href="product?id=<?php echo $ress['projectsid']?>"> <img src="<?php echo $img?>" alt=""> </a>
											<!-- quick-view -->
											<a href="quickview?id=<?php echo $ress['projectsid']?>" class="inline_i quick-view"><b><span class="icon icon-visibility"></span> نظرة سريعة</b> </a> 
											<!-- /quick-view -->
										</div>
										<!-- /product image -->
                                        
                                             
										<!-- product name -->
										<div class="product__inside__name">
											<h2><a href="product?id=<?php echo $ress['projectsid']?>"><?php echo wordslice($ress['ptitlear'])?></a></h2>
										</div>
										<!-- /product name -->                 <!-- product description -->
										<!-- visible only in row-view mode -->
										
										<!-- /product description -->                 <!-- product price -->
										<div class="product__inside__price price-box"><?php echo convert($ress['pspecialprice'], $_SESSION['hj_language'],'ar')?> <?php if($ress['pspecialprice']!=$ress['pprice']){?><span class="price-box__old"><?php echo convert($ress['pprice'], $_SESSION['hj_language'],'ar')?></span><?php }?></div>
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
                                                <a href="quickview?id=<?php echo $ress['projectsid']?>"  id="addtocartholder" class="inline_i  btn btn--ys btn--xl"><span class="icon icon-shopping_basket"></span>  أضف الى السلة</a>
                                                <?php }else{?>
                                                <a href="javascript:void()" id="addtocartholder"  onClick="ajaxbasket('quantity<?php echo $countp?>','productsid<?php echo $countp?>');return false" class="btn btn--ys btn--xl"><span class="icon icon-shopping_basket"></span> أضف الى السلة</a>
                                                <?php }?>
													<a href="javascript:void()"  onClick="ajaxwishlist('<?php echo $ress['projectsid']?>');return false;" class="btn btn--ys btn--xl visible-xs"><span class="icon icon-favorite_border"></span></a>
													
												</div>
												<ul class="product__inside__info__link hidden-sm">
													<li class="text-right"><span class="icon icon-favorite_border  tooltip-link"></span><a href="javascript:void()"  onClick="ajaxwishlist('<?php echo $ress['projectsid']?>');return false;"><span class="text">أضف إلى قائمة الامنيات</span></a></li>
													
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
						<div class="carousel-products__button pull-left"> <span class="btn-prev"></span> <span class="btn-next"></span> </div>
						<h2 class="text-center text-uppercase title-under title-under-color2">منتجات مميزة</h2>
					</div>
					<!-- /title --> 
					<!-- carousel -->
                    <div class="carousel-products row" id="carouselFeatured">
                    <?php
      $query="select * from projects left join supplier on supplierid=pidsupplier left join category on categoryid=idcategory left join brands on brandsid=idbrands left join subcategory on subcategoryid=idsubcategory where projects.deleted='0' and (prodactive='Yes' or prodactive='OOS') and pshowhome='Yes' and isfeatured='Yes'  limit 20";
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
<?php echo gettopar($ress)?>
											<a href="product?id=<?php echo $ress['projectsid']?>"> <img src="<?php echo $img?>" alt=""> </a>
											<!-- quick-view -->
											<a href="quickview?id=<?php echo $ress['projectsid']?>" class="inline_i quick-view"><b><span class="icon icon-visibility"></span> نظرة سريعة</b> </a> 
											<!-- /quick-view -->
										</div>
										<!-- /product image -->
                                        
                                             
										<!-- product name -->
										<div class="product__inside__name">
											<h2><a href="product?id=<?php echo $ress['projectsid']?>"><?php echo wordslice($ress['ptitlear'])?></a></h2>
										</div>
										<!-- /product name -->                 <!-- product description -->
										<!-- visible only in row-view mode -->
										
										<!-- /product description -->                 <!-- product price -->
										<div class="product__inside__price price-box"><?php echo convert($ress['pspecialprice'], $_SESSION['hj_language'],'ar')?> <?php if($ress['pspecialprice']!=$ress['pprice']){?><span class="price-box__old"><?php echo convert($ress['pprice'], $_SESSION['hj_language'],'ar')?></span><?php }?></div>
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
                                                <a href="quickview?id=<?php echo $ress['projectsid']?>"  id="addtocartholder" class="inline_i  btn btn--ys btn--xl"><span class="icon icon-shopping_basket"></span>  أضف الى السلة</a>
                                                <?php }else{?>
                                                <a href="javascript:void()" id="addtocartholder"  onClick="ajaxbasket('quantity<?php echo $countp?>','productsid<?php echo $countp?>');return false" class="btn btn--ys btn--xl"><span class="icon icon-shopping_basket"></span> أضف الى السلة</a>
                                                <?php }?>
													<a href="javascript:void()"  onClick="ajaxwishlist('<?php echo $ress['projectsid']?>');return false;" class="btn btn--ys btn--xl visible-xs"><span class="icon icon-favorite_border"></span></a>
													
												</div>
												<ul class="product__inside__info__link hidden-sm">
													<li class="text-right"><span class="icon icon-favorite_border  tooltip-link"></span><a href="javascript:void()"  onClick="ajaxwishlist('<?php echo $ress['projectsid']?>');return false;"><span class="text">أضف إلى قائمة الامنيات</span></a></li>
													
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
             $query="select * from projects left join supplier on supplierid=pidsupplier left join category on categoryid=idcategory left join brands on brandsid=idbrands left join subcategory on subcategoryid=idsubcategory where projects.deleted='0' and (prodactive='Yes' or prodactive='OOS') and pidsupplier='$theid' and pshowhome='Yes'  limit 20";
     $res=$con->query($query);
     
            $sactive=$con->getcertainvalue("select * from supplier where supplierid='$theid' and deleted='0'",array("snamear"=>"snamear","sactive"=>"sactive",));
            if($sactive['sactive']=='Yes' && $con->num_rows($res)!=0){?>
            <div class="content">
				<div class="container">
					<!-- title -->
					<div class="title-with-button">
						<div class="carousel-products__button pull-left"> <span class="btn-prev"></span> <span class="btn-next"></span> </div>
						<h2 class="text-center text-uppercase title-under title-under-color2"><a href="products?s=<?php echo urlfriendlyi($sactive['snamear'])?>"><?php echo $sactive['snamear']?></a></h2>
					</div>
					<!-- /title --> 
					<!-- carousel -->
                    <div class="carousel-products row" id="carousel1">
					       <?php
     
        
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
<?php echo gettopar($ress)?>
											<a href="product?id=<?php echo $ress['projectsid']?>"> <img src="<?php echo $img?>" alt=""> </a>
											<!-- quick-view -->
											<a href="quickview?id=<?php echo $ress['projectsid']?>" class="inline_i quick-view"><b><span class="icon icon-visibility"></span> نظرة سريعة</b> </a> 
											<!-- /quick-view -->
										</div>
										<!-- /product image -->
                                        
                                             
										<!-- product name -->
										<div class="product__inside__name">
											<h2><a href="product?id=<?php echo $ress['projectsid']?>"><?php echo wordslice($ress['ptitlear'])?></a></h2>
										</div>
										<!-- /product name -->                 <!-- product description -->
										<!-- visible only in row-view mode -->
										
										<!-- /product description -->                 <!-- product price -->
										<div class="product__inside__price price-box"><?php echo convert($ress['pspecialprice'], $_SESSION['hj_language'],'ar')?> <?php if($ress['pspecialprice']!=$ress['pprice']){?><span class="price-box__old"><?php echo convert($ress['pprice'], $_SESSION['hj_language'],'ar')?></span><?php }?></div>
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
                                                <a href="quickview?id=<?php echo $ress['projectsid']?>"  id="addtocartholder" class="inline_i  btn btn--ys btn--xl"><span class="icon icon-shopping_basket"></span>  أضف الى السلة</a>
                                                <?php }else{?>
                                                <a href="javascript:void()" id="addtocartholder"  onClick="ajaxbasket('quantity<?php echo $countp?>','productsid<?php echo $countp?>');return false" class="btn btn--ys btn--xl"><span class="icon icon-shopping_basket"></span> أضف الى السلة</a>
                                                <?php }?>
													<a href="javascript:void()"  onClick="ajaxwishlist('<?php echo $ress['projectsid']?>');return false;" class="btn btn--ys btn--xl visible-xs"><span class="icon icon-favorite_border"></span></a>
													
												</div>
												<ul class="product__inside__info__link hidden-sm">
													<li class="text-right"><span class="icon icon-favorite_border  tooltip-link"></span><a href="javascript:void()"  onClick="ajaxwishlist('<?php echo $ress['projectsid']?>');return false;"><span class="text">أضف إلى قائمة الامنيات</span></a></li>
													
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
            $query="select * from projects left join supplier on supplierid=pidsupplier left join category on categoryid=idcategory left join brands on brandsid=idbrands left join subcategory on subcategoryid=idsubcategory where projects.deleted='0' and (prodactive='Yes' or prodactive='OOS') and pidsupplier='$theid' and pshowhome='Yes'  limit 20";
     $res=$con->query($query);
     
            $sactive=$con->getcertainvalue("select * from supplier where supplierid='$theid' and deleted='0'",array("snamear"=>"snamear","sactive"=>"sactive",));
            if($sactive['sactive']=='Yes' && $con->num_rows($res)!=0){?>
            <div class="content">
				<div class="container">
					<!-- title -->
					<div class="title-with-button">
						<div class="carousel-products__button pull-left"> <span class="btn-prev"></span> <span class="btn-next"></span> </div>
						<h2 class="text-center text-uppercase title-under title-under-color2"><a href="products?s=<?php echo urlfriendlyi($sactive['snamear'])?>"><?php echo $sactive['snamear']?></a></h2>
					</div>
					<!-- /title --> 
					<!-- carousel -->
                    <div class="carousel-products row" id="carousel2">
					       <?php
     
        
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
<?php echo gettopar($ress)?>
											<a href="product?id=<?php echo $ress['projectsid']?>"> <img src="<?php echo $img?>" alt=""> </a>
											<!-- quick-view -->
											<a href="quickview?id=<?php echo $ress['projectsid']?>" class="inline_i quick-view"><b><span class="icon icon-visibility"></span> نظرة سريعة</b> </a> 
											<!-- /quick-view -->
										</div>
										<!-- /product image -->
                                        
                                             
										<!-- product name -->
										<div class="product__inside__name">
											<h2><a href="product?id=<?php echo $ress['projectsid']?>"><?php echo wordslice($ress['ptitlear'])?></a></h2>
										</div>
										<!-- /product name -->                 <!-- product description -->
										<!-- visible only in row-view mode -->
										
										<!-- /product description -->                 <!-- product price -->
										<div class="product__inside__price price-box"><?php echo convert($ress['pspecialprice'], $_SESSION['hj_language'],'ar')?> <?php if($ress['pspecialprice']!=$ress['pprice']){?><span class="price-box__old"><?php echo convert($ress['pprice'], $_SESSION['hj_language'],'ar')?></span><?php }?></div>
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
                                                <a href="quickview?id=<?php echo $ress['projectsid']?>"  id="addtocartholder" class="inline_i  btn btn--ys btn--xl"><span class="icon icon-shopping_basket"></span>  أضف الى السلة</a>
                                                <?php }else{?>
                                                <a href="javascript:void()" id="addtocartholder"  onClick="ajaxbasket('quantity<?php echo $countp?>','productsid<?php echo $countp?>');return false" class="btn btn--ys btn--xl"><span class="icon icon-shopping_basket"></span> أضف الى السلة</a>
                                                <?php }?>
													<a href="javascript:void()"  onClick="ajaxwishlist('<?php echo $ress['projectsid']?>');return false;" class="btn btn--ys btn--xl visible-xs"><span class="icon icon-favorite_border"></span></a>
													
												</div>
												<ul class="product__inside__info__link hidden-sm">
													<li class="text-right"><span class="icon icon-favorite_border  tooltip-link"></span><a href="javascript:void()"  onClick="ajaxwishlist('<?php echo $ress['projectsid']?>');return false;"><span class="text">أضف إلى قائمة الامنيات</span></a></li>
													
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
             $query="select * from projects left join supplier on supplierid=pidsupplier left join category on categoryid=idcategory left join brands on brandsid=idbrands left join subcategory on subcategoryid=idsubcategory where projects.deleted='0' and (prodactive='Yes' or prodactive='OOS') and pidsupplier='$theid' and pshowhome='Yes'  limit 20";
     $res=$con->query($query);
     
            $sactive=$con->getcertainvalue("select * from supplier where supplierid='$theid' and deleted='0'",array("snamear"=>"snamear","sactive"=>"sactive",));
            if($sactive['sactive']=='Yes' && $con->num_rows($res)!=0){?>
            <div class="content">
				<div class="container">
					<!-- title -->
					<div class="title-with-button">
						<div class="carousel-products__button pull-left"> <span class="btn-prev"></span> <span class="btn-next"></span> </div>
						<h2 class="text-center text-uppercase title-under title-under-color2"><a href="products?s=<?php echo urlfriendlyi($sactive['snamear'])?>"><?php echo $sactive['snamear']?></a></h2>
					</div>
					<!-- /title --> 
					<!-- carousel -->
                    <div class="carousel-products row" id="carousel3">
					       <?php
    
        
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
<?php echo gettopar($ress)?>
											<a href="product?id=<?php echo $ress['projectsid']?>"> <img src="<?php echo $img?>" alt=""> </a>
											<!-- quick-view -->
											<a href="quickview?id=<?php echo $ress['projectsid']?>" class="inline_i quick-view"><b><span class="icon icon-visibility"></span> نظرة سريعة</b> </a> 
											<!-- /quick-view -->
										</div>
										<!-- /product image -->
                                        
                                             
										<!-- product name -->
										<div class="product__inside__name">
											<h2><a href="product?id=<?php echo $ress['projectsid']?>"><?php echo wordslice($ress['ptitlear'])?></a></h2>
										</div>
										<!-- /product name -->                 <!-- product description -->
										<!-- visible only in row-view mode -->
										
										<!-- /product description -->                 <!-- product price -->
										<div class="product__inside__price price-box"><?php echo convert($ress['pspecialprice'], $_SESSION['hj_language'],'ar')?> <?php if($ress['pspecialprice']!=$ress['pprice']){?><span class="price-box__old"><?php echo convert($ress['pprice'], $_SESSION['hj_language'],'ar')?></span><?php }?></div>
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
                                                <a href="quickview?id=<?php echo $ress['projectsid']?>"  id="addtocartholder" class="inline_i  btn btn--ys btn--xl"><span class="icon icon-shopping_basket"></span>  أضف الى السلة</a>
                                                <?php }else{?>
                                                <a href="javascript:void()" id="addtocartholder"  onClick="ajaxbasket('quantity<?php echo $countp?>','productsid<?php echo $countp?>');return false" class="btn btn--ys btn--xl"><span class="icon icon-shopping_basket"></span> أضف الى السلة</a>
                                                <?php }?>
													<a href="javascript:void()"  onClick="ajaxwishlist('<?php echo $ress['projectsid']?>');return false;" class="btn btn--ys btn--xl visible-xs"><span class="icon icon-favorite_border"></span></a>
													
												</div>
												<ul class="product__inside__info__link hidden-sm">
													<li class="text-right"><span class="icon icon-favorite_border  tooltip-link"></span><a href="javascript:void()"  onClick="ajaxwishlist('<?php echo $ress['projectsid']?>');return false;"><span class="text">أضف إلى قائمة الامنيات</span></a></li>
													
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
             $query="select * from projects left join supplier on supplierid=pidsupplier left join category on categoryid=idcategory left join brands on brandsid=idbrands left join subcategory on subcategoryid=idsubcategory where projects.deleted='0' and (prodactive='Yes' or prodactive='OOS') and pidsupplier='$theid' and pshowhome='Yes'  limit 20";
     $res=$con->query($query);
            $sactive=$con->getcertainvalue("select * from supplier where supplierid='$theid' and deleted='0'",array("snamear"=>"snamear","sactive"=>"sactive",));
            if($sactive['sactive']=='Yes'){?>
            <div class="content">
				<div class="container">
					<!-- title -->
					<div class="title-with-button">
						<div class="carousel-products__button pull-left"> <span class="btn-prev"></span> <span class="btn-next"></span> </div>
						<h2 class="text-center text-uppercase title-under title-under-color2"><a href="products?s=<?php echo urlfriendlyi($sactive['snamear'])?>"><?php echo $sactive['snamear']?></a></h2>
					</div>
					<!-- /title --> 
					<!-- carousel -->
                    <div class="carousel-products row" id="carousel4">
					       <?php
     
        
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
<?php echo gettopar($ress)?>
											<a href="product?id=<?php echo $ress['projectsid']?>"> <img src="<?php echo $img?>" alt=""> </a>
											<!-- quick-view -->
											<a href="quickview?id=<?php echo $ress['projectsid']?>" class="inline_i quick-view"><b><span class="icon icon-visibility"></span> نظرة سريعة</b> </a> 
											<!-- /quick-view -->
										</div>
										<!-- /product image -->
                                        
                                             
										<!-- product name -->
										<div class="product__inside__name">
											<h2><a href="product?id=<?php echo $ress['projectsid']?>"><?php echo wordslice($ress['ptitlear'])?></a></h2>
										</div>
										<!-- /product name -->                 <!-- product description -->
										<!-- visible only in row-view mode -->
										
										<!-- /product description -->                 <!-- product price -->
										<div class="product__inside__price price-box"><?php echo convert($ress['pspecialprice'], $_SESSION['hj_language'],'ar')?> <?php if($ress['pspecialprice']!=$ress['pprice']){?><span class="price-box__old"><?php echo convert($ress['pprice'], $_SESSION['hj_language'],'ar')?></span><?php }?></div>
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
                                                <a href="quickview?id=<?php echo $ress['projectsid']?>"  id="addtocartholder" class="inline_i  btn btn--ys btn--xl"><span class="icon icon-shopping_basket"></span>  أضف الى السلة</a>
                                                <?php }else{?>
                                                <a href="javascript:void()" id="addtocartholder"  onClick="ajaxbasket('quantity<?php echo $countp?>','productsid<?php echo $countp?>');return false" class="btn btn--ys btn--xl"><span class="icon icon-shopping_basket"></span> أضف الى السلة</a>
                                                <?php }?>
													<a href="javascript:void()"  onClick="ajaxwishlist('<?php echo $ress['projectsid']?>');return false;" class="btn btn--ys btn--xl visible-xs"><span class="icon icon-favorite_border"></span></a>
													
												</div>
												<ul class="product__inside__info__link hidden-sm">
													<li class="text-right"><span class="icon icon-favorite_border  tooltip-link"></span><a href="javascript:void()"  onClick="ajaxwishlist('<?php echo $ress['projectsid']?>');return false;"><span class="text">أضف إلى قائمة الامنيات</span></a></li>
													
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
             $query="select * from projects left join supplier on supplierid=pidsupplier left join category on categoryid=idcategory left join brands on brandsid=idbrands left join subcategory on subcategoryid=idsubcategory where projects.deleted='0' and (prodactive='Yes' or prodactive='OOS') and pidsupplier='$theid' and pshowhome='Yes'  limit 20";
     $res=$con->query($query);
     
            $sactive=$con->getcertainvalue("select * from supplier where supplierid='$theid' and deleted='0'",array("snamear"=>"snamear","sactive"=>"sactive",));
            if($sactive['sactive']=='Yes' && $con->num_rows($res)!=0){?>
            <div class="content">
				<div class="container">
					<!-- title -->
					<div class="title-with-button">
						<div class="carousel-products__button pull-left"> <span class="btn-prev"></span> <span class="btn-next"></span> </div>
						<h2 class="text-center text-uppercase title-under title-under-color2"><a href="products?s=<?php echo urlfriendlyi($sactive['snamear'])?>"><?php echo $sactive['snamear']?></a></h2>
					</div>
					<!-- /title --> 
					<!-- carousel -->
                    <div class="carousel-products row" id="carousel5">
					       <?php
     
        
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
<?php echo gettopar($ress)?>
											<a href="product?id=<?php echo $ress['projectsid']?>"> <img src="<?php echo $img?>" alt=""> </a>
											<!-- quick-view -->
											<a href="quickview?id=<?php echo $ress['projectsid']?>" class="inline_i quick-view"><b><span class="icon icon-visibility"></span> نظرة سريعة</b> </a> 
											<!-- /quick-view -->
										</div>
										<!-- /product image -->
                                        
                                             
										<!-- product name -->
										<div class="product__inside__name">
											<h2><a href="product?id=<?php echo $ress['projectsid']?>"><?php echo wordslice($ress['ptitlear'])?></a></h2>
										</div>
										<!-- /product name -->                 <!-- product description -->
										<!-- visible only in row-view mode -->
										
										<!-- /product description -->                 <!-- product price -->
										<div class="product__inside__price price-box"><?php echo convert($ress['pspecialprice'], $_SESSION['hj_language'],'ar')?> <?php if($ress['pspecialprice']!=$ress['pprice']){?><span class="price-box__old"><?php echo convert($ress['pprice'], $_SESSION['hj_language'],'ar')?></span><?php }?></div>
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
                                                <a href="quickview?id=<?php echo $ress['projectsid']?>"  id="addtocartholder" class="inline_i  btn btn--ys btn--xl"><span class="icon icon-shopping_basket"></span>  أضف الى السلة</a>
                                                <?php }else{?>
                                                <a href="javascript:void()" id="addtocartholder"  onClick="ajaxbasket('quantity<?php echo $countp?>','productsid<?php echo $countp?>');return false" class="btn btn--ys btn--xl"><span class="icon icon-shopping_basket"></span> أضف الى السلة</a>
                                                <?php }?>
													<a href="javascript:void()"  onClick="ajaxwishlist('<?php echo $ress['projectsid']?>');return false;" class="btn btn--ys btn--xl visible-xs"><span class="icon icon-favorite_border"></span></a>
													
												</div>
												<ul class="product__inside__info__link hidden-sm">
													<li class="text-right"><span class="icon icon-favorite_border  tooltip-link"></span><a href="javascript:void()"  onClick="ajaxwishlist('<?php echo $ress['projectsid']?>');return false;"><span class="text">أضف إلى قائمة الامنيات</span></a></li>
													
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
             $query="select * from projects left join supplier on supplierid=pidsupplier left join category on categoryid=idcategory left join brands on brandsid=idbrands left join subcategory on subcategoryid=idsubcategory where projects.deleted='0' and (prodactive='Yes' or prodactive='OOS') and pidsupplier='$theid' and pshowhome='Yes'  limit 20";
     $res=$con->query($query);
     
            $sactive=$con->getcertainvalue("select * from supplier where supplierid='$theid' and deleted='0'",array("snamear"=>"snamear","sactive"=>"sactive",));
            if($sactive['sactive']=='Yes' && $con->num_rows($res)!=0){?>
            <div class="content">
				<div class="container">
					<!-- title -->
					<div class="title-with-button">
						<div class="carousel-products__button pull-left"> <span class="btn-prev"></span> <span class="btn-next"></span> </div>
						<h2 class="text-center text-uppercase title-under title-under-color2"><a href="products?s=<?php echo urlfriendlyi($sactive['snamear'])?>"><?php echo $sactive['snamear']?></a></h2>
					</div>
					<!-- /title --> 
					<!-- carousel -->
                    <div class="carousel-products row" id="carousel6">
					       <?php
     
        
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
<?php echo gettopar($ress)?>
											<a href="product?id=<?php echo $ress['projectsid']?>"> <img src="<?php echo $img?>" alt=""> </a>
											<!-- quick-view -->
											<a href="quickview?id=<?php echo $ress['projectsid']?>" class="inline_i quick-view"><b><span class="icon icon-visibility"></span> نظرة سريعة</b> </a> 
											<!-- /quick-view -->
										</div>
										<!-- /product image -->
                                        
                                             
										<!-- product name -->
										<div class="product__inside__name">
											<h2><a href="product?id=<?php echo $ress['projectsid']?>"><?php echo wordslice($ress['ptitlear'])?></a></h2>
										</div>
										<!-- /product name -->                 <!-- product description -->
										<!-- visible only in row-view mode -->
										
										<!-- /product description -->                 <!-- product price -->
										<div class="product__inside__price price-box"><?php echo convert($ress['pspecialprice'], $_SESSION['hj_language'],'ar')?> <?php if($ress['pspecialprice']!=$ress['pprice']){?><span class="price-box__old"><?php echo convert($ress['pprice'], $_SESSION['hj_language'],'ar')?></span><?php }?></div>
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
                                                <a href="quickview?id=<?php echo $ress['projectsid']?>"  id="addtocartholder" class="inline_i  btn btn--ys btn--xl"><span class="icon icon-shopping_basket"></span>  أضف الى السلة</a>
                                                <?php }else{?>
                                                <a href="javascript:void()" id="addtocartholder"  onClick="ajaxbasket('quantity<?php echo $countp?>','productsid<?php echo $countp?>');return false" class="btn btn--ys btn--xl"><span class="icon icon-shopping_basket"></span> أضف الى السلة</a>
                                                <?php }?>
													<a href="javascript:void()"  onClick="ajaxwishlist('<?php echo $ress['projectsid']?>');return false;" class="btn btn--ys btn--xl visible-xs"><span class="icon icon-favorite_border"></span></a>
													
												</div>
												<ul class="product__inside__info__link hidden-sm">
													<li class="text-right"><span class="icon icon-favorite_border  tooltip-link"></span><a href="javascript:void()"  onClick="ajaxwishlist('<?php echo $ress['projectsid']?>');return false;"><span class="text">أضف إلى قائمة الامنيات</span></a></li>
													
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
            $query="select * from projects left join supplier on supplierid=pidsupplier left join category on categoryid=idcategory left join brands on brandsid=idbrands left join subcategory on subcategoryid=idsubcategory where projects.deleted='0' and (prodactive='Yes' or prodactive='OOS') and pidsupplier='$theid' and pshowhome='Yes'  limit 20";
     $res=$con->query($query);
     
            $sactive=$con->getcertainvalue("select * from supplier where supplierid='$theid' and deleted='0'",array("snamear"=>"snamear","sactive"=>"sactive",));
            if($sactive['sactive']=='Yes' && $con->num_rows($res)!=0){?>
            <div class="content">
				<div class="container">
					<!-- title -->
					<div class="title-with-button">
						<div class="carousel-products__button pull-left"> <span class="btn-prev"></span> <span class="btn-next"></span> </div>
						<h2 class="text-center text-uppercase title-under title-under-color2"><a href="products?s=<?php echo urlfriendlyi($sactive['snamear'])?>"><?php echo $sactive['snamear']?></a></h2>
					</div>
					<!-- /title --> 
					<!-- carousel -->
                    <div class="carousel-products row" id="carousel7">
					       <?php
      
        
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
<?php echo gettopar($ress)?>
											<a href="product?id=<?php echo $ress['projectsid']?>"> <img src="<?php echo $img?>" alt=""> </a>
											<!-- quick-view -->
											<a href="quickview?id=<?php echo $ress['projectsid']?>" class="inline_i quick-view"><b><span class="icon icon-visibility"></span> نظرة سريعة</b> </a> 
											<!-- /quick-view -->
										</div>
										<!-- /product image -->
                                        
                                             
										<!-- product name -->
										<div class="product__inside__name">
											<h2><a href="product?id=<?php echo $ress['projectsid']?>"><?php echo wordslice($ress['ptitlear'])?></a></h2>
										</div>
										<!-- /product name -->                 <!-- product description -->
										<!-- visible only in row-view mode -->
										
										<!-- /product description -->                 <!-- product price -->
										<div class="product__inside__price price-box"><?php echo convert($ress['pspecialprice'], $_SESSION['hj_language'],'ar')?> <?php if($ress['pspecialprice']!=$ress['pprice']){?><span class="price-box__old"><?php echo convert($ress['pprice'], $_SESSION['hj_language'],'ar')?></span><?php }?></div>
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
                                                <a href="quickview?id=<?php echo $ress['projectsid']?>"  id="addtocartholder" class="inline_i  btn btn--ys btn--xl"><span class="icon icon-shopping_basket"></span>  أضف الى السلة</a>
                                                <?php }else{?>
                                                <a href="javascript:void()" id="addtocartholder"  onClick="ajaxbasket('quantity<?php echo $countp?>','productsid<?php echo $countp?>');return false" class="btn btn--ys btn--xl"><span class="icon icon-shopping_basket"></span> أضف الى السلة</a>
                                                <?php }?>
													<a href="javascript:void()"  onClick="ajaxwishlist('<?php echo $ress['projectsid']?>');return false;" class="btn btn--ys btn--xl visible-xs"><span class="icon icon-favorite_border"></span></a>
													
												</div>
												<ul class="product__inside__info__link hidden-sm">
													<li class="text-right"><span class="icon icon-favorite_border  tooltip-link"></span><a href="javascript:void()"  onClick="ajaxwishlist('<?php echo $ress['projectsid']?>');return false;"><span class="text">أضف إلى قائمة الامنيات</span></a></li>
													
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
             $query="select * from projects left join supplier on supplierid=pidsupplier left join category on categoryid=idcategory left join brands on brandsid=idbrands left join subcategory on subcategoryid=idsubcategory where projects.deleted='0' and (prodactive='Yes' or prodactive='OOS') and pidsupplier='$theid' and pshowhome='Yes'  limit 20";
     $res=$con->query($query);
     
            $sactive=$con->getcertainvalue("select * from supplier where supplierid='$theid' and deleted='0'",array("snamear"=>"snamear","sactive"=>"sactive",));
            if($sactive['sactive']=='Yes' && $con->num_rows($res)!=0){?>
            <div class="content">
				<div class="container">
					<!-- title -->
					<div class="title-with-button">
						<div class="carousel-products__button pull-left"> <span class="btn-prev"></span> <span class="btn-next"></span> </div>
						<h2 class="text-center text-uppercase title-under title-under-color2"><a href="products?s=<?php echo urlfriendlyi($sactive['snamear'])?>"><?php echo $sactive['snamear']?></a></h2>
					</div>
					<!-- /title --> 
					<!-- carousel -->
                    <div class="carousel-products row" id="carousel8">
					       <?php
     
        
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
<?php echo gettopar($ress)?>
											<a href="product?id=<?php echo $ress['projectsid']?>"> <img src="<?php echo $img?>" alt=""> </a>
											<!-- quick-view -->
											<a href="quickview?id=<?php echo $ress['projectsid']?>" class="inline_i quick-view"><b><span class="icon icon-visibility"></span> نظرة سريعة</b> </a> 
											<!-- /quick-view -->
										</div>
										<!-- /product image -->
                                        
                                             
										<!-- product name -->
										<div class="product__inside__name">
											<h2><a href="product?id=<?php echo $ress['projectsid']?>"><?php echo wordslice($ress['ptitlear'])?></a></h2>
										</div>
										<!-- /product name -->                 <!-- product description -->
										<!-- visible only in row-view mode -->
										
										<!-- /product description -->                 <!-- product price -->
										<div class="product__inside__price price-box"><?php echo convert($ress['pspecialprice'], $_SESSION['hj_language'],'ar')?> <?php if($ress['pspecialprice']!=$ress['pprice']){?><span class="price-box__old"><?php echo convert($ress['pprice'], $_SESSION['hj_language'],'ar')?></span><?php }?></div>
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
                                                <a href="quickview?id=<?php echo $ress['projectsid']?>"  id="addtocartholder" class="inline_i  btn btn--ys btn--xl"><span class="icon icon-shopping_basket"></span>  أضف الى السلة</a>
                                                <?php }else{?>
                                                <a href="javascript:void()" id="addtocartholder"  onClick="ajaxbasket('quantity<?php echo $countp?>','productsid<?php echo $countp?>');return false" class="btn btn--ys btn--xl"><span class="icon icon-shopping_basket"></span> أضف الى السلة</a>
                                                <?php }?>
													<a href="javascript:void()"  onClick="ajaxwishlist('<?php echo $ress['projectsid']?>');return false;" class="btn btn--ys btn--xl visible-xs"><span class="icon icon-favorite_border"></span></a>
													
												</div>
												<ul class="product__inside__info__link hidden-sm">
													<li class="text-right"><span class="icon icon-favorite_border  tooltip-link"></span><a href="javascript:void()"  onClick="ajaxwishlist('<?php echo $ress['projectsid']?>');return false;"><span class="text">أضف إلى قائمة الامنيات</span></a></li>
													
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
            $query="select * from projects left join supplier on supplierid=pidsupplier left join category on categoryid=idcategory left join brands on brandsid=idbrands left join subcategory on subcategoryid=idsubcategory where projects.deleted='0' and (prodactive='Yes' or prodactive='OOS') and pidsupplier='$theid' and pshowhome='Yes'  limit 20";
     $res=$con->query($query);
     
            $sactive=$con->getcertainvalue("select * from supplier where supplierid='$theid' and deleted='0'",array("snamear"=>"snamear","sactive"=>"sactive",));
            if($sactive['sactive']=='Yes' && $con->num_rows($res)!=0){?>
            <div class="content">
				<div class="container">
					<!-- title -->
					<div class="title-with-button">
						<div class="carousel-products__button pull-left"> <span class="btn-prev"></span> <span class="btn-next"></span> </div>
						<h2 class="text-center text-uppercase title-under title-under-color2"><a href="products?s=<?php echo urlfriendlyi($sactive['snamear'])?>"><?php echo $sactive['snamear']?></a></h2>
					</div>
					<!-- /title --> 
					<!-- carousel -->
                    <div class="carousel-products row" id="carousel9">
					       <?php
      
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
<?php echo gettopar($ress)?>
											<a href="product?id=<?php echo $ress['projectsid']?>"> <img src="<?php echo $img?>" alt=""> </a>
											<!-- quick-view -->
											<a href="quickview?id=<?php echo $ress['projectsid']?>" class="inline_i quick-view"><b><span class="icon icon-visibility"></span> نظرة سريعة</b> </a> 
											<!-- /quick-view -->
										</div>
										<!-- /product image -->
                                        
                                             
										<!-- product name -->
										<div class="product__inside__name">
											<h2><a href="product?id=<?php echo $ress['projectsid']?>"><?php echo wordslice($ress['ptitlear'])?></a></h2>
										</div>
										<!-- /product name -->                 <!-- product description -->
										<!-- visible only in row-view mode -->
										
										<!-- /product description -->                 <!-- product price -->
										<div class="product__inside__price price-box"><?php echo convert($ress['pspecialprice'], $_SESSION['hj_language'],'ar')?> <?php if($ress['pspecialprice']!=$ress['pprice']){?><span class="price-box__old"><?php echo convert($ress['pprice'], $_SESSION['hj_language'],'ar')?></span><?php }?></div>
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
                                                <a href="quickview?id=<?php echo $ress['projectsid']?>"  id="addtocartholder" class="inline_i  btn btn--ys btn--xl"><span class="icon icon-shopping_basket"></span>  أضف الى السلة</a>
                                                <?php }else{?>
                                                <a href="javascript:void()" id="addtocartholder"  onClick="ajaxbasket('quantity<?php echo $countp?>','productsid<?php echo $countp?>');return false" class="btn btn--ys btn--xl"><span class="icon icon-shopping_basket"></span> أضف الى السلة</a>
                                                <?php }?>
													<a href="javascript:void()"  onClick="ajaxwishlist('<?php echo $ress['projectsid']?>');return false;" class="btn btn--ys btn--xl visible-xs"><span class="icon icon-favorite_border"></span></a>
													
												</div>
												<ul class="product__inside__info__link hidden-sm">
													<li class="text-right"><span class="icon icon-favorite_border  tooltip-link"></span><a href="javascript:void()"  onClick="ajaxwishlist('<?php echo $ress['projectsid']?>');return false;"><span class="text">أضف إلى قائمة الامنيات</span></a></li>
													
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
           //promotions
            
            $query="select * from projects left join supplier on supplierid=pidsupplier left join category on categoryid=idcategory left join brands on brandsid=idbrands left join subcategory on subcategoryid=idsubcategory where projects.deleted='0' and (prodactive='Yes' or prodactive='OOS') and ppromotion='Yes' and pshowhome='Yes'  limit 20";
     $res=$con->query($query);
     
            $sactive=$con->getcertainvalue("select * from supplier where supplierid='$theid' and deleted='0'",array("snamear"=>"snamear","sactive"=>"sactive",));
            if($con->num_rows($res)!=0){?>
            <div class="content">
				<div class="container">
					<!-- title -->
					<div class="title-with-button">
						<div class="carousel-products__button pull-left"> <span class="btn-prev"></span> <span class="btn-next"></span> </div>
						<h2 class="text-center text-uppercase title-under title-under-color2"><a href="products?type=promotion">عروض</a></h2>
					</div>
					<!-- /title --> 
					<!-- carousel -->
                    <div class="carousel-products row" id="carousel9">
					       <?php
      
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
<?php echo gettopar($ress)?>
											<a href="product?id=<?php echo $ress['projectsid']?>"> <img src="<?php echo $img?>" alt=""> </a>
											<!-- quick-view -->
											<a href="quickview?id=<?php echo $ress['projectsid']?>" class="inline_i quick-view"><b><span class="icon icon-visibility"></span> نظرة سريعة</b> </a> 
											<!-- /quick-view -->
										</div>
										<!-- /product image -->
                                        
                                             
										<!-- product name -->
										<div class="product__inside__name">
											<h2><a href="product?id=<?php echo $ress['projectsid']?>"><?php echo wordslice($ress['ptitlear'])?></a></h2>
										</div>
										<!-- /product name -->                 <!-- product description -->
										<!-- visible only in row-view mode -->
										
										<!-- /product description -->                 <!-- product price -->
										<div class="product__inside__price price-box"><?php echo convert($ress['pspecialprice'], $_SESSION['hj_language'],'ar')?> <?php if($ress['pspecialprice']!=$ress['pprice']){?><span class="price-box__old"><?php echo convert($ress['pprice'], $_SESSION['hj_language'],'ar')?></span><?php }?></div>
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
                                                <a href="quickview?id=<?php echo $ress['projectsid']?>"  id="addtocartholder" class="inline_i  btn btn--ys btn--xl"><span class="icon icon-shopping_basket"></span>  أضف الى السلة</a>
                                                <?php }else{?>
                                                <a href="javascript:void()" id="addtocartholder"  onClick="ajaxbasket('quantity<?php echo $countp?>','productsid<?php echo $countp?>');return false" class="btn btn--ys btn--xl"><span class="icon icon-shopping_basket"></span> أضف الى السلة</a>
                                                <?php }?>
													<a href="javascript:void()"  onClick="ajaxwishlist('<?php echo $ress['projectsid']?>');return false;" class="btn btn--ys btn--xl visible-xs"><span class="icon icon-favorite_border"></span></a>
													
												</div>
												<ul class="product__inside__info__link hidden-sm">
													<li class="text-right"><span class="icon icon-favorite_border  tooltip-link"></span><a href="javascript:void()"  onClick="ajaxwishlist('<?php echo $ress['projectsid']?>');return false;"><span class="text">أضف إلى قائمة الامنيات</span></a></li>
													
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
								<div class="carousel-products__button pull-left">
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
													<span class="figcaption label-top-right">
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
		
			<div class="content clearfix">
				<div class="container">
					<div class="row">
						<div class="brands-carousel">
                         <?php $brr=$con->query("select * from brands where deleted='0' and brandsimages!='' and bractive='Yes' order by brpriority asc,brnamear asc");
						while($br=$con->fetch_array($brr)){?>
							<div style="height:120px"><a href="products?s=all&c=&min_price=&max_price=&orderby=&brand=<?php echo urlfriendlyi($br['brnamear'])?>">
                            <img src="../uploads/brands_thumb/<?php echo $br['brandsimages']?>" alt="<?php echo $br['brnamear']?>"></a></div>
                            <?php }?>
						</div>
					</div>
				</div>
			</div>
			
			<div class="content">
				<div class="container-fluid box-baners">
					<div class="row">
						<div class="banner-carousel-1">
							<!--  -->
							<div class="col-md-3 col-sm-6 col-xs-12">
                            <?php $maina=$con->query("select * from mainad where deleted='0' and mposition='footer 1'  order by priority asc limit 1");?>
                                <?php
							while($mainad=$con->fetch_array($maina)){?>
								<!-- banner -->
								<a href="<?php echo $mainad['urlar']?>" class="banner banner-md zoom-in" style="background:url(../uploads/background/<?php echo $mainad['backgroundar']?>?v=1)">
									<span class="figure">
										<span class="figcaption text-center">
											<span class="block-table">
												<span class="block-table-cell" style="direction:rtl">
													<span class="block font-size90 text-uppercase font-light"><?php echo $mainad['matitleear']?></span>
													<?php if($mainad['url']!='#'){?><span class="btn btn--border btn--xl" style='direction:rtl'>اشتر الان!</span><?php }?>
												</span>
											</span>
										</span>
									</span>
								</a>
								<!-- /banner -->
                                <?php }?>
							</div>
							<!-- / -->
							<!--  -->
							<div class="col-md-3 col-sm-6 col-xs-12">
                            <?php $maina=$con->query("select * from mainad where deleted='0' and mposition='footer 2'  order by priority asc limit 1");?>
                                <?php
							while($mainad=$con->fetch_array($maina)){?>
								<a href="<?php echo $mainad['urlar']?>" class="banner banner-md  zoom-in" style="background:url(../uploads/background/<?php echo $mainad['backgroundar']?>?v=1)">
									<span class="figure">
										<span class="figcaption text-center">
											<span class="block-table">
												<span class="block-table-cell" style="direction:rtl">
												   <!--<span class="block font-size40 text-uppercase font-medium">Order Return</span>
													<span class="block block-top-md font-size20 text-uppercase font-light">Returns within</span>
													<em class="block  block-top-sm font-size46">7 days</em>-->
                                                    <?php echo $mainad['desccar']?>
                                                    <?php if($mainad['url']!='#'){?><span class="btn btn--border btn--xl" style='direction:rtl'>اشتر الان!</span><?php }?>
												</span>
											</span>
										</span>
									</span>
								</a>
                                <?php }?>
							</div>
							<!-- / -->
							<!--  -->
							<div class="col-md-3 col-sm-6 col-xs-12">
                            <?php $maina=$con->query("select * from mainad where deleted='0' and mposition='footer 3'  order by priority asc limit 1");?>
                                <?php
							while($mainad=$con->fetch_array($maina)){?>
								<a href="<?php echo $mainad['urlar']?>" class="banner banner-md bg-yellow zoom-in" style="background:url(../uploads/background/<?php echo $mainad['backgroundar']?>?v=1)">
									<span class="figure">
										<span class="figcaption text-center">
											<span class="block-table">
												<span class="block-table-cell" style="direction:rtl">
												  <!-- <span class="block font-size40 text-uppercase font-medium text-dark">Free<br>shipping</span>
													<span class="block font-size24 text-uppercase font-light block-top-md text-dark">on orders over $99.</span>
													<em class="block block-top-md font-size16 main-font text-dark">This offer is valid on all our store items.</em>-->
                                                    <?php echo $mainad['desccar']?>
                                                    <?php if($mainad['url']!='#'){?><span class="btn btn--border btn--xl" style='direction:rtl'>اشتر الان!</span><?php }?>
												</span>
											</span>
										</span>
									</span>
								</a>
                                <?php }?>
							</div>
							<!-- / -->
							<!--  -->
							<div class="col-md-3 col-sm-6 col-xs-12">
                            <?php $maina=$con->query("select * from mainad where deleted='0' and mposition='footer 4'  order by priority asc limit 1");?>
                                <?php
							while($mainad=$con->fetch_array($maina)){?>
								<a href="<?php echo $mainad['urlar']?>" class="banner banner-md bg-green-light zoom-in" style="background:url(../uploads/background/<?php echo $mainad['backgroundar']?>?v=1)">
									<span class="figure">
										<span class="figcaption text-center">
											<span class="block-table">
												<span class="block-table-cell" style="direction:rtl">
												   <!--<em class="block font-size26 text-uppercase main-font">COD</em>
													<span class="block block-top-md font-size40 text-uppercase font-medium">Cash<br>on delivery</span>-->
                                                    <?php echo $mainad['desccar']?>
                                                    <?php if($mainad['url']!='#'){?><span class="btn btn--border btn--xl" style='direction:rtl'>اشتر الان!</span><?php }?>
												</span>
											</span>
										</span>
									</span>
								</a>
                                <?php }?>
							</div>
							<!-- / -->
						</div>
					</div>
				</div>
			</div>
			
			
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
		<script src="../js/custom.js"></script>			
		<script>
			$j(document).ready(function() {
			 
             
//alert(jQuery(window).width())
			
			
				// Init All Carousel
				productCarousel($j('#megaMenuCarousel1'),1,1,1,1,1); 
				productCarousel($j('.-carousel-1'),4,4,3,2,1);
				brandsCarousel($j('.brands-carousel'));
				productCarousel($j('#carouselFeatured'),6,6,3,2,1);	
				productCarousel($j('.bannerCarousel'),4,4,3,2,1);
				//productCarousel($j('.banner-slider'),1,1,1,1,1); 
				
				productCarousel($j('#carousel1'),6,6,3,2,1);	
				productCarousel($j('#carousel2'),6,6,3,2,1);	
				productCarousel($j('#carousel3'),6,6,3,2,1);	
                productCarousel($j('#carousel4'),6,6,3,2,1);
                productCarousel($j('#carousel5'),6,6,3,2,1);
                productCarousel($j('#carousel6'),6,6,3,2,1);
                productCarousel($j('#carousel7'),6,6,3,2,1);
                productCarousel($j('#carousel8'),6,6,3,2,1);
                productCarousel($j('#carousel9'),6,6,3,2,1);
                productCarousel($j('#carousel10'),6,6,3,2,1);
				
				
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
		   
		})
	  
	  //$j('.page').parent().css('background','url(../images/menuon.png) no-repeat')
	   //$j(this).parent().css('background','url(../images/menuoff.png) no-repeat')
}



<?php if(!isset($_SESSION['hajer_lat'])){?>
//get location
if ("geolocation" in navigator) {
  navigator.geolocation.getCurrentPosition(function(position) {
  savelocation(position.coords.latitude, position.coords.longitude);
});

//if(geo_position_js.init()){ geo_position_js.getCurrentPosition(success_callback,error_callback); } else{ alert("Functionality not available"); }
}



function savelocation(lat,long){
	 jQuery.ajax({
		  url: 'setlocation.php?lat='+lat+'&long='+long,
		  beforeSend: function ( xhr ) {
		          }
		}).done(function ( data ) {
		});
}
<?php }?>

		</script>
	</body>


</html>