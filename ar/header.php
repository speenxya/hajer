<?php //set langiage
if(!isset($_SESSION['hj_language'])){
$_SESSION['hj_language']='SAR';
}

if(isset($_REQUEST['changelanguage'])){
   if($_REQUEST['changelanguage']=='USD'){ 	
	$_SESSION['hj_language']='USD';
   }
   if($_REQUEST['changelanguage']=='SAR'){ 	
	$_SESSION['hj_language']='SAR';
   }
   if($_REQUEST['changelanguage']=='EURO'){ 	
	$_SESSION['hj_language']='EURO';
   }
}

$searchval='';
if(isset($_REQUEST['searchh'])){
    $searchval=$_REQUEST['searchh'];
}?>
<div class="hidden">
			<nav id="off-canvas-menu">				
            
				<ul class="expander-list" style="margin-top:40px;display:none">				
                <li>
                <div class="search-dropdown customsearch-dropdown menusearch" style="display:block;left:0px;width:100%">
                        <form  action="products" method="get">
											<div class="input-outer"  style="width:100%;padding-left:40px">
												<input  type="search" name="searchh" value="<?php echo $searchval?>" maxlength="128" placeholder="عما تبحث؟">
												<button type="submit" title="" class="fa fa-search" style="left:20px"></button>
											</div>
										</form>
                                        </div>
                </li>
                
                </ul>
										
                <div  style="margin-top:40px">&nbsp;</div>
					
				<div class="menuholder" style="background-color:#f6f6f9">كل الفئات</div>	
				<ul class="expander-list">		
					 <?php $hca=$con->query("select * from supplier where deleted='0'  and sactive='Yes' order by spriority asc");
	 while($hcaa=$con->fetch_array($hca)){?>					
										
					<li>
						<span class="name">
							<span class="expander">-</span>
							<a href="#"><span class="act-underline"><?php echo $hcaa['snamear']?><!--<span class="badge badge--menu badge--color">SALE</span>--></span></a>
						</span>
						<ul class="multicolumn-level">
                        <li><a href="products?s=<?php echo $hcaa['snamear']?>">الكل</a></li>
                        <?php $mobcc=$con->query("select * from category where deleted='0' and bactive='Yes' and idsupplier='".$hcaa['supplierid']."'");
						while($mobc=$con->fetch_array($mobcc)){?>
							<li>
								<span class="name">
									<span class="expander">-</span>
									<a class="megamenu__subtitle" href="#">										
										<span><?php echo $mobc['bnamear']?></span>
									</a>
								</span>
								<ul class="image-links-level-3 megamenu__submenu">	
                                <li class="level3"><a href="products?s=<?php echo urlfriendlyi($hcaa['snamear'])?>&c=<?php echo urlfriendlyi($mobc['bnamear'])?>">الكل</a></li>
                                <?php $mobss=$con->query("select * from subcategory where deleted='0' and subcategoryactive='Yes' and sidcategory='".$mobc['categoryid']."' and subcategoryid in( select idsubcategory from projects where deleted='0' and idcategory='".$mobc['categoryid']."' )"); 
						while($mobs=$con->fetch_array($mobss)){?>								
									<li class="level3"><a href="products?s=<?php echo urlfriendlyi($hcaa['snamear'])?>&c=<?php echo urlfriendlyi($mobc['bnamear'])?>&subcategory=<?php echo urlfriendlyi($mobs['subcategorynamear'])?>"><?php echo $mobs['subcategorynamear']?></a> <span class="badge badge--menu badge--color" style="display:none">SALE</span></li>	
                                    <?php }?>								
								</ul>
							</li>
                            <?php }?>
							
							
						
						</ul>
					</li>
                   
                    
                    <?php }?>
                    
                    </ul>
                    
                   
                    
                     
                     <div class="menuholder" style="background-color:#f6f6f9">اللغة</div>	
                     <ul class="expander-list" style="display:none">	
                      <li>
                     <span class="name">
                            <a href="../en/<?php echo basename($_SERVER['PHP_SELF'])?>?<?php echo $_SERVER['QUERY_STRING']?>"><span class="act-underline">English</span></a>
						</span>
                     </li>
                     
                     </ul>
                     
                     
                    
                  <div class="menuholder" style="background-color:#f6f6f9">حسابي</div>	  
                    <ul class="expander-list" style="display:none">	 
                      <?php if(isset($_SESSION['hj_id'])){?>
                       <li><span class="name"><a href="editprofile"><span class="act-underline">الملف الشخصي</span></a></span></li>	
                       <li><span class="name"><a href="wishlist"><span class="act-underline">قائمة امنياتي</span></a></span></li>	
                       <li><span class="name"><a href="orderhistory"><span class="act-underline">طلباتي</span></a></span></li>	
                       <li><span class="name"><a href="logout"><span class="act-underline">الخروج</span></a></span></li>	
             <?php }else{?>
                    <li><span class="name"><a href="signlog"><span class="act-underline">سجل / ادخل</span></a></span></li>	
                    <?php }?>
                    </ul>
                    
                     <ul class="expander-list">	
                      <li>
                     <span class="name">
							<a href="contact"><span class="act-underline">اتصل بنا</span></a>
						</span>
                     </li>
                     </ul>
                    
                    
                    
                   
				
			</nav>
		</div>
        
        
        
        
        
        
        
<div class="header-wrapper">
			<header id="header" class="header-layout-06 desktop">
            
				<div class="container">
					<div class="row mainrow">
						<div class="middleheader col-sm-2 smnopadding1024" style="padding-bottom:5px;text-align:center">
							<!-- logo start --> 
							<a href="index.php"><img class="logo img-responsive" src="../images/logoar.png" alt="<?php echo $titlar?>"/></a> 
							<!-- logo end --> 
						</div>
						
                        <div class="col-sm-8">
                        <div class="search-dropdown customsearch-dropdown">
                        <form  action="products" method="get">
											<div class="input-outer"  style="width:100%">
												<input  type="search" name="searchh" value="<?php echo $searchval?>" maxlength="128" placeholder="عما تبحث؟">
												<button type="submit" title="" class="fa fa-search"></button>
											</div>
										</form>
                                        </div>
                                        </div>
         
						
                        
                        
                        
                        <!-- normal left bar -->
						<div class="pull-left  col-sm-3 alignment-extra thetopone" >
							<div class=" signsmaller text-right smnomargin" style="margin-top:25px;color:#ffffff;font-weight:bold">
                            <a href="../en/<?php echo basename($_SERVER['PHP_SELF'])?>?<?php echo $_SERVER['QUERY_STRING']?>" style="color:#ffffff;font-weight:16px;font-family:'ge_sslight'">English</a>  <span style="padding:0 5px">| </span>
                             <?php if(isset($_SESSION['hj_id'])){?>
                   <select name="account" id="account" onchange="change_account_location(this.value)" style="color:#ffffff;background-color: #1b3281;border: none;">
                  <option value="">حسابي</option>
                  <option value="editprofile">الملف الشخصي</option>
                  <option value="wishlist">قائمة امنياتي</option>
                  <option value="orderhistory">طلباتي</option>
                  <option value="logout">الخروج</option>
                </select>
             <?php }else{?>
					<div style="display:inline-block;position:relative;z-index:10"  class="signholder"><a href="signlog" style="color:#ffffff">سجل / ادخل <img src="../images/menudownwhite.png"></a> 
                    <div class="signcontent" style="position:absolute;left:0px;width:200px;display:none;z-index:10">
                       <div style="text-align:center;background-color:#ffffff;border:1px solid #666666;color:#000000;padding:20px">
                        <div style="margin-bottom:5px"> تسجيل الدخول </div>
                        <a class="butt" href="signlog" style="max-width:100px;margin:0 auto;display:block;background-color:#3a66dd;color:#ffffff;padding:10px 20px">الدخول</a>
                        
                        <hr style="border-top:1px solid #cccccc;margin:10px"/>
                        ليس لديك حساب؟ <br>
                        <a href="signlog" class="color2">سجل دخول</a>
                       </div>
                    </div>
                    </div>
                                  <?php }?> <span style="padding:0 5px">| </span>
                                  
								<!-- search start -->
								<div class="search link-inline">
									
									<div class="search-dropdown">
										<form  action="products" method="get">
											<div class="input-outer">
												<input  type="search" name="searchh" value="<?php echo $searchval?>" maxlength="128" placeholder="عما تبحث؟">
												<button type="submit" title="" class="fa fa-search"></button>
											</div>
											<a href="#" class="search__close"><span class="icon icon-close" style="color:#000000"></span></a>									
										</form>
									</div>
								</div>
								<!-- search end -->			
								<!-- account menu start -->
								
								<!-- account menu end -->
								<!-- icon toggle menu -->
								<!-- /icon toggle menu -->
								<!-- shopping cart start -->
								<div class="cart link-inline thetopone">
									<div class="dropdown text-right shopping-cart ">
										<a class="dropdown-toggle " href="cart">
										<!--<span class="fa fa-shopping-cart " style="color:#ffffff;font-size:20px">dfdf</span>-->
                                        <div class='cart-count' style="color:#d1e146;position:absolute;left:0px;top:0px"><?php echo getcartcount()?></div>
                                        <img src="../images/cart1.png" style="width:22px;position:relative;top:-5px">
										<span class="badge badge--cart cart-count" style="display:none"><?php echo getcartcount()?></span>
                                        
                                        <div class="mshoppingcart_data" style="display:none;position:absolute;left:0px;top:20px;border:1px solid #cccccc;z-index:20;background-color:#ffffff;max-width:700px">
                                                  <div class="mshoppingcart_content" style="padding:10px">
                                                    <div>جاري التحميل</div>
                                                  </div>
                                                </div>
										</a>
										
									</div>
								</div>
								<!-- shopping cart end -->			
							</div>
						</div>
					</div>
                    
                    
				</div>			
                
                
                <div  style="background-color:#ffffff;border-bottom:1px solid #1c3380;position:relative;z-index:0" class="bottomheader">
                <div class="container">
                  <div class="row">
                    <div>
                      <div class="col-sm-12 text-center smnopadding">							
                      
							<div class="stuck-nav">
								<div class="container">
                                <div class="stucklogo" style="display:none;float: right;margin-top: 10px;padding-left: 20px;">
                                <a href="index.php"><img class="" src="../images/logoar.png" style="width:180px" alt="<?php echo $titlar?>"/></a> </div>
                                
                                <div class="col-xs-2 visible-mobile-menu-on stuckmenu_inmobile" style="display:none">
											<div class="navbar expand-nav compact-hidden">
												<a href="#off-canvas-menu" class="off-canvas-menu-toggle">
													<div class="navbar-toggle"> 
														<span class="icon-bar"></span> 
														<span class="icon-bar"></span> 
														<span class="icon-bar"></span> 
														<span class="menu-text">القائمة</span> 
													</div>
												</a>
											</div>
										</div>
                                        
									<!-- navigation start -->
									<div class="col-stuck-menu">
                                    
                                    
                                    <div class="search-dropdown customsearch-dropdown searchh">
                        <form  action="products" method="get">
											<div class="input-outer"  style="width:100%">
												<input  type="search" name="searchh" value="<?php echo $searchval?>" maxlength="128" placeholder="عما تبحث؟">
												<button type="submit" title="" class="fa fa-search"></button>
											</div>
										</form>
                                        </div>
										<nav class="navbar">
                                        <div style="float:right;display:none" class="showmobilelogo"><a href="index.php"><img class="img-responsive" src="../images/logoar.png" style="width:180px;padding:10px" alt="<?php echo $titlar?>"/></a> </div>
												<div class="responsive-menu mainMenu">									
										<!-- الجوالmenu Button-->
										<div class="col-xs-2 visible-mobile-menu-on">
                                        
											<div class="expand-nav compact-hidden">
												<a href="#off-canvas-menu" class="off-canvas-menu-toggle">
													<div class="navbar-toggle"> 
														<span class="icon-bar"></span> 
														<span class="icon-bar"></span> 
														<span class="icon-bar"></span> 
														<span class="menu-text">القائمة</span> 
													</div>
												</a>
											</div>
										</div>
                                        
                                        
										<!-- //end الجوالmenu Button -->
										<ul class="nav navbar-nav">
											<li class="dl-close"><a href="#"><span class="icon icon-close"></span>إغلاق</a></li>										
																						
											
										<li class="dropdown dropdown-mega-menu">
                                        <a href="#">
                                          كل الفئات &nbsp;&nbsp;&nbsp;<img src="../images/menudown.png">
                                          <div style="position:absolute;bottom:-10px;text-align:center;width:100%;right:0px;display:none;z-index:10;" class="menuhoverr"><img src="../images/menuhover.png"></div>
                                            
                                            <span style="padding:0 10px;color:#1c3380">|</span>
                                            </a>
                                            
                                            <ul class="dropdown-menu megamenu">
													<li class="col-sm-12">
													  <div class="col-sm-3" style="background-color:#f8f7ef">
                                                      <?php $hca=$con->query("select * from supplier where deleted='0' and sactive='Yes' and snamear!='Offer & More' order by spriority asc");
														 while($hcaa=$con->fetch_array($hca)){?>	
                                                         <div  style="font-size:14px"><a href="#" class="showcateg <?php if($hcaa['supplierid']=='21-hj'){?>active<?php }?>" id="<?php echo $hcaa['supplierid']?>"><?php echo $hcaa['snamear']?></a></div>
                                                         <?php }?>
                                                      </div>
                                                      <div class="col-sm-9">
                                                      <?php $hca=$con->query("select * from supplier where deleted='0' and sactive='Yes' and snamear!='Offer & More' order by spriority asc");
														 while($hcaa=$con->fetch_array($hca)){
															 $allcatdisplay='display:none';
															 if($hcaa['supplierid']=='21-hj'){
																 $allcatdisplay='display:block';
															 }?>	
                                                           <div class="showcatdata <?php echo $hcaa['supplierid']?>" style="<?php echo $allcatdisplay?>">
                                                              <h2><?php echo $hcaa['snamear']?></h2>
                                                              <hr style="margin:10px 0px" />
                                                              <?php $bca=$con->query("select * from category where deleted='0' and bactive='Yes' and idsupplier='".$hcaa['supplierid']."' order by bpriority asc");
																 while($bcaa=$con->fetch_array($bca)){?>
                                                                   <div style="font-size:14px"><a href="products?s=<?php echo urlfriendlyi($hcaa['snamear'])?>&c=<?php echo urlfriendlyi($bcaa['bnamear'])?>"><?php echo $bcaa['bnamear']?></a></div>
																 <?php }?>
                                                           </div>
                                                         <?php }?>
                                                      </div>
													</li>
													
												</ul>
                                        </li>	
											
										<?php $hca=$con->query("select * from supplier where deleted='0' and sactive='Yes' order by spriority asc");
	 while($hcaa=$con->fetch_array($hca)){?>		
																						
											<li class="dropdown dropdown-mega-menu">
												<span class="dropdown-toggle extra-arrow"></span>
                                                
												<a href="products?s=<?php echo urlfriendlyi($hcaa['snamear'])?>" ><span class="act-underline"><?php echo $hcaa['snamear']?><span class="badge badge--menu badge--color"><!--SALE--></span></span>
                                                <div style="position:absolute;bottom:-10px;text-align:center;width:100%;right:0px;display:none;z-index:10;" class="menuhoverr"><img src="../images/menuhover.png"></div>
                                                </a>
                                                <?php if($hcaa['supplierid']=='21-hj'){ //mobiles?>
												<ul class="dropdown-menu megamenu" >
                                                
													<li class="dl-back"><a href="#"><span class="icon icon-chevron_left"></span>back</a></li>
													<li class="col-sm-2">
                                                      <?php if(iscactive('22-hj')){?>												
														<a href="products?s=<?php echo urlfriendlyi($hcaa['snamear'])?>&c=<?php echo getcnamear('22-hj',1)?>" class="megamenu__subtitle"><span><?php echo getcnamear('22-hj',0)?></span></a>
                                                        <?php echo displaysubar(urlfriendlyi($hcaa['snamear']),'22-hj')?>
                                                      <?php }?>  
														
													</li>
													<li class="col-sm-2">
														<a href="#" class="megamenu__subtitle">
															<span>تسوق حسب السعر</span>
														</a>
														<ul class="megamenu__submenu megamenu__submenu--marked">
															<li class="dl-back"><a href="#"><span class="icon icon-chevron_left"></span>back</a></li>
															<li class="level2"><a href="products?s=<?php echo urlfriendlyi($hcaa['snamear'])?>&min_price=5&max_price=299">تحت 299</a></li>
															<li class="level2"><a href="products?s=<?php echo urlfriendlyi($hcaa['snamear'])?>&min_price=300&max_price=499">300-499</a></li>
															<li class="level2"><a href="products?s=<?php echo urlfriendlyi($hcaa['snamear'])?>&min_price=500&max_price=999">500-999</a></li>
															<li class="level2"><a href="products?s=<?php echo urlfriendlyi($hcaa['snamear'])?>&min_price=1000&max_price=1499">1000-1499</a></li>
                                                            <li class="level2"><a href="products?s=<?php echo urlfriendlyi($hcaa['snamear'])?>&min_price=1500&max_price=1999">1500-1999</a></li>
                                                            <li class="level2"><a href="products?s=<?php echo urlfriendlyi($hcaa['snamear'])?>&min_price=1999&max_price=5000">فوق 1999</a></li>
														</ul>
                                                        
                                                       
													</li>
													<li class="col-sm-2">
                                                      <?php if(iscactive('23-hj')){?>
														<a href="products?s=<?php echo urlfriendlyi($hcaa['snamear'])?>&c=<?php echo getcnamear('23-hj',1)?>" class="megamenu__subtitle"><span><?php echo getcnamear('23-hj',0)?></span></a>
                                                        <?php echo displaysubar(urlfriendlyi($hcaa['snamear']),'23-hj')?>
                                                      <?php }?>  
                                                      
                                                       <a href="products?s=<?php echo urlfriendlyi($hcaa['snamear'])?>" class="megamenu__subtitle"><span>التسوق حسب الميزات</span></a>
                                                        <ul class="megamenu__submenu megamenu__submenu--marked">
															<li class="dl-back"><a href="#"><span class="icon icon-chevron_left"></span>back</a></li>
															<li class="level2"><a href="products?s=<?php echo urlfriendlyi($hcaa['snamear'])?>&feature=<?php echo urlfriendlyi('Pro Camera')?>">كاميرا للمحترفين</a></li>
															<li class="level2"><a href="products?s=<?php echo urlfriendlyi($hcaa['snamear'])?>&feature=<?php echo urlfriendlyi('Big Display')?>">عرض الكبير</a></li>
															<li class="level2"><a href="products?s=<?php echo urlfriendlyi($hcaa['snamear'])?>&feature=<?php echo urlfriendlyi('3GB+ RAM')?>">3GB+ RAM</a></li>
															<li class="level2"><a href="products?s=<?php echo urlfriendlyi($hcaa['snamear'])?>&feature=<?php echo urlfriendlyi('3000+ mah Battery')?>">3بطارية 3000+ ماه</a></li>
                                                            <li class="level2"><a href="products?s=<?php echo urlfriendlyi($hcaa['snamear'])?>&feature=<?php echo urlfriendlyi('Dual SIM')?>">ذو شريحتين</a></li>
														</ul>
                                                        
                                                       
													</li>
													<li class="col-sm-2">
                                                    <?php if(iscactive('24-hj')){?>
														<a href="products?s=<?php echo urlfriendlyi($hcaa['snamear'])?>&c=<?php echo getcnamear('24-hj',1)?>" class="megamenu__subtitle"><span><?php echo getcnamear('24-hj',0)?></span></a>
                                                        <?php echo displaysubar(urlfriendlyi($hcaa['snamear']),'24-hj')?>
                                                    <?php }?>    
                                                      
													</li>
                                                    <li class="col-sm-4">
                                                    <?php if($hcaa['menuimage1ar']!=''){
                                                        $menuurl1='#';
                                                        if($hcaa['menuurl1ar']!=''){
                                                            $menuurl1=$hcaa['menuurl1ar'];
                                                            }?>
                                                            <a href="<?php echo $menuurl1?>"><img src="../uploads/supplier_menu/<?php echo $hcaa['menuimage1ar']?>" style="width:100%"></a>
                                                    
                                                    <?php }?>
                                                    <?php if($hcaa['menuimage2ar']!=''){
                                                        $menuurl2='#';
                                                        if($hcaa['menuurl2ar']!=''){
                                                            $menuurl2=$hcaa['menuurl2ar'];
                                                            }?>
                                                           <a href="<?php echo $menuurl2?>"><img src="../uploads/supplier_menu/<?php echo $hcaa['menuimage2ar']?>" style="width:100%"></a>
                                                    
                                                    <?php }?>
														
													</li>
                                                    
                                                    <li class="col-sm-12">
                                                    <br><br>
                                                      <table width="100%" cellpadding="0" cellspacing="0">
                                                        <tr>
                                                          <?php $brr=$con->query("select * from brands where deleted='0' and brandsid in (select idbrand from brandsmenu where deleted='0' and idsupplier='21-hj') and bractive='Yes' and brandsimages!='' order by brpriority asc,brnamear asc");
																while($br=$con->fetch_array($brr)){?>
																	<td><div style="border:2px solid #ffffff;margin-left:10px;text-align:center"><a href="products?s=<?php echo urlfriendlyi($hcaa['snamear'])?>&c=&min_price=&max_price=&orderby=&brand=<?php echo urlfriendlyi($br['brnamear'])?>">
																	<img src="../uploads/brands_thumb/<?php echo $br['brandsimages']?>" alt="<?php echo $br['brnamear']?>" style="max-width:100%;"></a></div>
                                                                    </td>
																	<?php }?>
                                                        </tr>
                                                      </table>
                                                     </li>
                                                    
													
												</ul>
                                                <?php }?>
                                                
                                                <?php if($hcaa['supplierid']=='20-hj'){ //electronoics?>
                                                <ul class="dropdown-menu megamenu" >
                                                
													<li class="dl-back"><a href="#"><span class="icon icon-chevron_left"></span>back</a></li>
													<li class="col-sm-2">
                                                    <?php if(iscactive('27-hj')){?>												
														<a href="products?s=<?php echo urlfriendlyi($hcaa['snamear'])?>&c=<?php echo getcnamear('27-hj',1)?>" class="megamenu__subtitle"><span><?php echo getcnamear('27-hj',0)?></span></a>
                                                        <?php echo displaysubar(urlfriendlyi($hcaa['snamear']),'27-hj')?>
                                                    <?php }?>
                                                    <?php if(iscactive('31-hj')){?>    
                                                        <a href="products?s=<?php echo urlfriendlyi($hcaa['snamear'])?>&c=<?php echo getcnamear('31-hj',1)?>" class="megamenu__subtitle"><span><?php echo getcnamear('31-hj',0)?></span></a>
                                                        <?php echo displaysubar(urlfriendlyi($hcaa['snamear']),'31-hj')?>
                                                    <?php }?> 
                                                    
                                                     
													</li>
													<li class="col-sm-2">
                                                      
                                                      
                                                      <?php if(iscactive('32-hj')){?> 
                                                        <a href="products?s=<?php echo urlfriendlyi($hcaa['snamear'])?>&c=<?php echo getcnamear('32-hj',1)?>" class="megamenu__subtitle"><span><?php echo getcnamear('32-hj',0)?></span></a>
                                                        <?php echo displaysubar(urlfriendlyi($hcaa['snamear']),'32-hj')?>
                                                        <?php }?>
                                                        

													</li>
													<li class="col-sm-2">
                                                    <?php if(iscactive('29-hj')){?>
														<a href="products?s=<?php echo urlfriendlyi($hcaa['snamear'])?>&c=<?php echo getcnamear('29-hj',1)?>" class="megamenu__subtitle"><span><?php echo getcnamear('29-hj',0)?></span></a>
                                                        <?php echo displaysubar(urlfriendlyi($hcaa['snamear']),'29-hj')?>
                                                     <?php }?>   
                                                       
                                                       
                                                       
													</li>
													<li class="col-sm-2">
                                                   <?php if(iscactive('33-hj')){?> 
                                                        <a href="products?s=<?php echo urlfriendlyi($hcaa['snamear'])?>&c=<?php echo getcnamear('33-hj',1)?>" class="megamenu__subtitle"><span><?php echo getcnamear('33-hj',0)?></span></a>
                                                        <?php echo displaysubar(urlfriendlyi($hcaa['snamear']),'33-hj')?>
                                                      <?php }?>   
                                                      
                                                      <?php if(iscactive('97-hj')){?> 
                                                        <a href="products?s=<?php echo urlfriendlyi($hcaa['snamear'])?>&c=<?php echo getcnamear('97-hj',1)?>" class="megamenu__subtitle"><span><?php echo getcnamear('97-hj',0)?></span></a>
                                                        <?php echo displaysubar(urlfriendlyi($hcaa['snamear']),'97-hj')?>
                                                      <?php }?>      
                                                        
                                                       
                                                        
													</li>
                                                    <li class="col-sm-4">
                                                    <?php if($hcaa['menuimage1ar']!=''){
                                                        $menuurl1='#';
                                                        if($hcaa['menuurl1ar']!=''){
                                                            $menuurl1=$hcaa['menuurl1ar'];
                                                            }?>
                                                            <a href="<?php echo $menuurl1?>"><img src="../uploads/supplier_menu/<?php echo $hcaa['menuimage1ar']?>" style="width:100%"></a>
                                                    
                                                    <?php }?>
                                                    <?php if($hcaa['menuimage2ar']!=''){
                                                        $menuurl2='#';
                                                        if($hcaa['menuurl2ar']!=''){
                                                            $menuurl2=$hcaa['menuurl2ar'];
                                                            }?>
                                                           <a href="<?php echo $menuurl2?>"><img src="../uploads/supplier_menu/<?php echo $hcaa['menuimage2ar']?>" style="width:100%"></a>
                                                    
                                                    <?php }?>
														
													</li>
                                                    
                                                    <li class="col-sm-12">
                                                    <br><br>
                                                      <table width="100%" cellpadding="0" cellspacing="0">
                                                        <tr>
                                                          <?php $brr=$con->query("select * from brands where deleted='0' and brandsid in (select idbrand from brandsmenu where deleted='0' and idsupplier='20-hj') and bractive='Yes' and brandsimages!='' order by brpriority asc,brnamear asc");
																while($br=$con->fetch_array($brr)){?>
																	<td><div style="border:2px solid #ffffff;margin-left:10px;text-align:center"><a href="products?s=<?php echo urlfriendlyi($hcaa['snamear'])?>&c=&min_price=&max_price=&orderby=&brand=<?php echo urlfriendlyi($br['brnamear'])?>">
																	<img src="../uploads/brands_thumb/<?php echo $br['brandsimages']?>" alt="<?php echo $br['brnamear']?>" style="max-width:100%;"></a></div>
                                                                    </td>
																	<?php }?>
                                                        </tr>
                                                      </table>
                                                     </li>
													
												</ul>
                                                <?php }?>
                                                <?php if($hcaa['supplierid']=='22-hj'){ //men?>
                                                <ul class="dropdown-menu megamenu" >
                                                
													<li class="dl-back"><a href="#"><span class="icon icon-chevron_left"></span>back</a></li>
													<li class="col-sm-2">
                                                    <?php if(iscactive('49-hj')){?>												
														<a href="products?s=<?php echo urlfriendlyi($hcaa['snamear'])?>&c=<?php echo getcnamear('49-hj',1)?>" class="megamenu__subtitle"><span><?php echo getcnamear('49-hj',0)?></span></a>
                                                        <?php echo displaysubar(urlfriendlyi($hcaa['snamear']),'49-hj')?>
                                                    <?php }?>
                                                    
                                                    <?php if(iscactive('52-hj')){?>    
                                                        <a href="products?s=<?php echo urlfriendlyi($hcaa['snamear'])?>&c=<?php echo getcnamear('52-hj',1)?>" class="megamenu__subtitle"><span><?php echo getcnamear('52-hj',0)?></span></a>
                                                        <?php echo displaysubar(urlfriendlyi($hcaa['snamear']),'52-hj')?>
                                                     <?php }?>   
                                                        
                                                        <a  href="products?s=<?php echo urlfriendlyi($hcaa['snamear'])?>&newarrival=1" class=" megamenu__subtitle"><span class="color3">وصل حديثا</span></a>
													</li>
													<li class="col-sm-2">
                                                    <?php if(iscactive('50-hj')){?>
														<a href="products?s=<?php echo urlfriendlyi($hcaa['snamear'])?>&c=<?php echo getcnamear('50-hj',1)?>" class="megamenu__subtitle"><span><?php echo getcnamear('50-hj',0)?></span></a>
                                                        <?php echo displaysubar(urlfriendlyi($hcaa['snamear']),'50-hj')?>
                                                     <?php }?>   
                                                        
                                                       <?php if(iscactive('53-hj')){?> 
                                                        <a href="products?s=<?php echo urlfriendlyi($hcaa['snamear'])?>&c=<?php echo getcnamear('53-hj',1)?>" class="megamenu__subtitle"><span><?php echo getcnamear('53-hj',0)?></span></a>
                                                        <?php echo displaysubar(urlfriendlyi($hcaa['snamear']),'53-hj')?>
                                                      <?php }?>  
													</li>
													<li class="col-sm-2">
                                                    
                                                    <?php if(iscactive('51-hj')){?>
														 <a href="products?s=<?php echo urlfriendlyi($hcaa['snamear'])?>&c=<?php echo getcnamear('51-hj',1)?>" class="megamenu__subtitle"><span><?php echo getcnamear('51-hj',0)?></span></a>
                                                        <?php echo displaysubar(urlfriendlyi($hcaa['snamear']),'51-hj')?>
                                                     <?php }?>
                                                     
                                                     <?php if(iscactive('89-hj')){?>   
                                                         <a href="products?s=<?php echo urlfriendlyi($hcaa['snamear'])?>&c=<?php echo getcnamear('89-hj',1)?>" class="megamenu__subtitle"><span><?php echo getcnamear('89-hj',0)?></span></a>
                                                        <?php echo displaysubar(urlfriendlyi($hcaa['snamear']),'89-hj')?>
                                                     <?php }?>
                                                     
                                                     <?php if(iscactive('54-hj')){?>   
                                                         <a href="products?s=<?php echo urlfriendlyi($hcaa['snamear'])?>&c=<?php echo getcnamear('54-hj',1)?>" class="megamenu__subtitle"><span><?php echo getcnamear('54-hj',0)?></span></a>
                                                        <?php echo displaysubar(urlfriendlyi($hcaa['snamear']),'54-hj')?>
                                                     <?php }?>   
                                                        
                                                        
                                                       
                                                        
													</li>
                                                    <li class="col-sm-6">
														 <?php if($hcaa['menuimage1ar']!=''){
                                                        $menuurl1='#';
                                                        if($hcaa['menuurl1ar']!=''){
                                                            $menuurl1=$hcaa['menuurl1ar'];
                                                            }?>
                                                            <a href="<?php echo $menuurl1?>"><img src="../uploads/supplier_menu/<?php echo $hcaa['menuimage1ar']?>" style="width:100%"></a>
                                                    
                                                    <?php }?>
													</li>
                                                    
                                                    <li class="col-sm-12">
                                                    <br><br>
                                                      <table width="100%" cellpadding="0" cellspacing="0">
                                                        <tr>
                                                          <?php $brr=$con->query("select * from brands where deleted='0' and brandsid in (select idbrand from brandsmenu where deleted='0' and idsupplier='22-hj') and bractive='Yes' and brandsimages!='' order by brpriority asc,brnamear asc");
																while($br=$con->fetch_array($brr)){?>
																	<td><div style="border:2px solid #ffffff;margin-left:10px;text-align:center"><a href="products?s=<?php echo urlfriendlyi($hcaa['snamear'])?>&c=&min_price=&max_price=&orderby=&brand=<?php echo urlfriendlyi($br['brnamear'])?>">
																	<img src="../uploads/brands_thumb/<?php echo $br['brandsimages']?>" alt="<?php echo $br['brnamear']?>" style="max-width:100%;"></a></div>
                                                                    </td>
																	<?php }?>
                                                        </tr>
                                                      </table>
                                                     </li>
													
												</ul>
                                                <?php }?>
                                                <?php if($hcaa['supplierid']=='23-hj'){ //home?>
                                                <ul class="dropdown-menu megamenu" >
                                                
													<li class="dl-back"><a href="#"><span class="icon icon-chevron_left"></span>back</a></li>
													<li class="col-sm-2">
                                                    <?php if(iscactive('34-hj')){?>												
														<a href="products?s=<?php echo urlfriendlyi($hcaa['snamear'])?>&c=<?php echo getcnamear('34-hj',1)?>" class="megamenu__subtitle"><span><?php echo getcnamear('34-hj',0)?></span></a>
                                                        <?php echo displaysubar(urlfriendlyi($hcaa['snamear']),'34-hj')?>
                                                    <?php }?>    
                                                       
													</li>
													<li class="col-sm-2">
                                                    <?php if(iscactive('35-hj')){?>
														<a href="products?s=<?php echo urlfriendlyi($hcaa['snamear'])?>&c=<?php echo getcnamear('35-hj',1)?>" class="megamenu__subtitle"><span><?php echo getcnamear('35-hj',0)?></span></a>
                                                        <?php echo displaysubar(urlfriendlyi($hcaa['snamear']),'35-hj')?>
                                                    <?php }?>    
													</li>
													<li class="col-sm-2">
                                                    <?php if(iscactive('36-hj')){?>
														<a href="products?s=<?php echo urlfriendlyi($hcaa['snamear'])?>&c=<?php echo getcnamear('36-hj',1)?>" class="megamenu__subtitle"><span><?php echo getcnamear('36-hj',0)?></span></a>
                                                        <?php echo displaysubar(urlfriendlyi($hcaa['snamear']),'36-hj')?>
                                                     <?php }?>   
                                                        
                                                        
													</li>
													<li class="col-sm-2">
                                                    <?php if(iscactive('37-hj')){?>
														<a href="products?s=<?php echo urlfriendlyi($hcaa['snamear'])?>&c=<?php echo getcnamear('37-hj',1)?>" class="megamenu__subtitle"><span><?php echo getcnamear('37-hj',0)?></span></a>
                                                        <?php echo displaysubar(urlfriendlyi($hcaa['snamear']),'37-hj')?>
                                                    <?php }?>    
                                                        
                                                        
                                                        
                                                       
                                                        
                                                        
                                                       
                                                        
													</li>
                                                    <li class="col-sm-2">
                                                    
                                                    <a href="products?s=<?php echo urlfriendlyi($hcaa['snamear'])?>&c=<?php echo getcnamear('39-hj',1)?>" class="megamenu__subtitle"><span><?php echo getcnamear('39-hj',0)?></span></a>
                                                        <?php echo displaysubar(urlfriendlyi($hcaa['snamear']),'39-hj')?>
                                                        
                                                        
                                                        
														 <a href="#" class="megamenu__subtitle">
															<span>تسوق حسب الميزانية</span>
														</a>
														<ul class="megamenu__submenu megamenu__submenu--marked">
															<li class="dl-back"><a href="#"><span class="icon icon-chevron_left"></span>back</a></li>
															<li class="level2"><a href="products?s=<?php echo urlfriendlyi($hcaa['snamear'])?>&min_price=5&max_price=49">تحت 49</a></li>
															<li class="level2"><a href="products?s=<?php echo urlfriendlyi($hcaa['snamear'])?>&min_price=5&max_price=99">تحت 99</a></li>
															<li class="level2"><a href="products?s=<?php echo urlfriendlyi($hcaa['snamear'])?>&min_price=5&max_price=149">تحت 149</a></li>
															<li class="level2"><a href="products?s=<?php echo urlfriendlyi($hcaa['snamear'])?>&min_price=5&max_price=199">تحت 199</a></li>
                                                            <li class="level2"><a href="products?s=<?php echo urlfriendlyi($hcaa['snamear'])?>&min_price=5&max_price=249">تحت 249</a></li>
                                                            <li class="level2"><a href="products?s=<?php echo urlfriendlyi($hcaa['snamear'])?>&min_price=5&max_price=399">تحت 399</a></li>
														</ul>
                                                        
                                                        <a href="#" class="megamenu__subtitle">
															<span>عروض مميزة</span>
														</a>
														<ul class="megamenu__submenu megamenu__submenu--marked">
															<li class="dl-back"><a href="#"><span class="icon icon-chevron_left"></span>back</a></li>
                                                            <?php $ofcatt=$con->query("select * from  projects left join supplier on supplierid=pidsupplier where projects.deleted='0' and pidsupplier='".$hcaa['supplierid']."' and ppromotion='Yes' order by rand() limit 10");
															while($ofcat=$con->fetch_array($ofcatt)){?>
                                                            <li class="level2"><a href="product?id=<?php echo $ofcat['projectsid']?>"><?php echo $ofcat['ptitlear']?> at <?php echo convert($ofcat['pspecialprice'], $_SESSION['hj_language'],'ar')?></a></li>
                                                            <?php }?>
														</ul>
                                                        <?php if(iscactive('40-hj')){?>
                                                        <a href="products?s=<?php echo urlfriendlyi($hcaa['snamear'])?>&c=<?php echo getcnamear('40-hj',1)?>" class="megamenu__subtitle"><span><?php echo getcnamear('40-hj',0)?></span></a>
                                                        <?php echo displaysubar(urlfriendlyi($hcaa['snamear']),'40-hj')?>
                                                       <?php }?>  
													</li>
                                                    
                                                     <li class="col-sm-2">
                                                     
                                                     <a href="products?s=<?php echo urlfriendlyi($hcaa['snamear'])?>&c=<?php echo getcnamear('42-hj',1)?>" class="megamenu__subtitle"><span><?php echo getcnamear('42-hj',0)?></span></a>
                                                        <?php echo displaysubar(urlfriendlyi($hcaa['snamear']),'42-hj')?>
                                                        
                                                        
                                                     <?php if(iscactive('38-hj')){?>
                                                        <a href="products?s=<?php echo urlfriendlyi($hcaa['snamear'])?>&c=<?php echo getcnamear('38-hj',1)?>" class="megamenu__subtitle"><span><?php echo getcnamear('38-hj',0)?></span></a>
                                                        <?php echo displaysubar(urlfriendlyi($hcaa['snamear']),'38-hj')?>
                                                        <?php }?>
                                                        
                                                        <?php if(iscactive('41-hj')){?>
                                                        <a href="products?s=<?php echo urlfriendlyi($hcaa['snamear'])?>&c=<?php echo getcnamear('41-hj',1)?>" class="megamenu__subtitle"><span><?php echo getcnamear('41-hj',0)?></span></a>
                                                        <?php echo displaysubar(urlfriendlyi($hcaa['snamear']),'41-hj')?>
                                                        <?php }?>
                                                        
                                                         <a href="#" class="megamenu__subtitle">
															<span>تسوق حسب الخصم</span>
														</a>
														<ul class="megamenu__submenu megamenu__submenu--marked">
															<li class="dl-back"><a href="#"><span class="icon icon-chevron_left"></span>back</a></li>
															<li class="level2"><a href="products?s=<?php echo urlfriendlyi($hcaa['snamear'])?>&max_discount=30">الى %30 </a></li>
															<li class="level2"><a href="products?s=<?php echo urlfriendlyi($hcaa['snamear'])?>&max_discount=50">الى %50 </a></li>
															<li class="level2"><a href="products?s=<?php echo urlfriendlyi($hcaa['snamear'])?>&bestprice=1">ضمان أفضل الأسعار</a></li>
                                                            <li class="level2"><a href="products?s=<?php echo urlfriendlyi($hcaa['snamear'])?>&buygetfree=1">اشتر واحدًا واحصل على 1 مجانًا</a></li>
														</ul>
													</li>
                                                    
                                                     <li class="col-sm-12">
                                                    <br><br>
                                                      <table width="100%" cellpadding="0" cellspacing="0">
                                                        <tr>
                                                          <?php $brr=$con->query("select * from brands where deleted='0' and brandsid in (select idbrand from brandsmenu where deleted='0' and idsupplier='23-hj') and bractive='Yes' and brandsimages!='' order by brpriority asc,brnamear asc");
																while($br=$con->fetch_array($brr)){?>
																	<td><div style="border:2px solid #ffffff;margin-left:10px;text-align:center"><a href="products?s=<?php echo urlfriendlyi($hcaa['snamear'])?>&c=&min_price=&max_price=&orderby=&brand=<?php echo urlfriendlyi($br['brnamear'])?>">
																	<img src="../uploads/brands_thumb/<?php echo $br['brandsimages']?>" alt="<?php echo $br['brnamear']?>" style="max-width:100%;"></a></div>
                                                                    </td>
																	<?php }?>
                                                        </tr>
                                                      </table>
                                                     </li>
													
												</ul>
                                                <?php }?>
                                                 <?php if($hcaa['supplierid']=='24-hj'){ //baby and toys?>
                                                 <ul class="dropdown-menu megamenu" >
                                               
													<li class="dl-back"><a href="#"><span class="icon icon-chevron_left"></span>back</a></li>
													<li class="col-sm-2">
                                                    <?php if(iscactive('69-hj')){?>												
														<a href="products?s=<?php echo urlfriendlyi($hcaa['snamear'])?>&c=<?php echo getcnamear('69-hj',1)?>" class="megamenu__subtitle"><span><?php echo getcnamear('69-hj',0)?></span></a>
                                                        <?php echo displaysubar(urlfriendlyi($hcaa['snamear']),'69-hj')?>
                                                      <?php }?>
                                                      <?php if(iscactive('74-hj')){?>  
                                                        <a href="products?s=<?php echo urlfriendlyi($hcaa['snamear'])?>&c=<?php echo getcnamear('74-hj',1)?>" class="megamenu__subtitle"><span><?php echo getcnamear('74-hj',0)?></span></a>
                                                        <?php echo displaysubar(urlfriendlyi($hcaa['snamear']),'74-hj')?>
                                                      <?php }?>
                                                      
                                                      <?php if(iscactive('76-hj')){?>  
                                                        <a href="products?s=<?php echo urlfriendlyi($hcaa['snamear'])?>&c=<?php echo getcnamear('76-hj',1)?>" class="megamenu__subtitle"><span><?php echo getcnamear('76-hj',0)?></span></a>
                                                        <?php echo displaysubar(urlfriendlyi($hcaa['snamear']),'76-hj')?>
                                                        <?php }?>
													</li>
													<li class="col-sm-2">
                                                    <?php if(iscactive('70-hj')){?>
														<a href="products?s=<?php echo urlfriendlyi($hcaa['snamear'])?>&c=<?php echo getcnamear('70-hj',1)?>" class="megamenu__subtitle"><span><?php echo getcnamear('70-hj',0)?></span></a>
                                                        <?php echo displaysubar(urlfriendlyi($hcaa['snamear']),'70-hj')?>
                                                      <?php }?>
                                                      
                                                      
                                                        
                                                        <?php if(iscactive('77-hj')){?> 
                                                        <a href="products?s=<?php echo urlfriendlyi($hcaa['snamear'])?>&c=<?php echo getcnamecar('77-hj',1)?>" class="megamenu__subtitle"><span><?php echo getcnamecar('77-hj',0)?></span></a>
                                                        <?php }?>
                                                        <?php if(iscactive('79-hj')){?>
                                                        <a href="products?s=<?php echo urlfriendlyi($hcaa['snamear'])?>&c=<?php echo getcnamecar('79-hj',1)?>" class="megamenu__subtitle"><span><?php echo getcnamecar('79-hj',0)?></span></a>
                                                        <?php }?>
                                                        
                                                        

													</li>
													<li class="col-sm-2">
                                                    <?php if(iscactive('71-hj')){?>
														<a href="products?s=<?php echo urlfriendlyi($hcaa['snamear'])?>&c=<?php echo getcnamear('71-hj',1)?>" class="megamenu__subtitle"><span><?php echo getcnamear('71-hj',0)?></span></a>
                                                        <?php echo displaysubar(urlfriendlyi($hcaa['snamear']),'71-hj')?>
                                                       <?php }?> 
                                                        
                                                        <?php if(iscactive('90-hj')){?>
                                                        <a href="products?s=<?php echo urlfriendlyi($hcaa['snamear'])?>&c=<?php echo getcnamear('90-hj',1)?>" class="megamenu__subtitle"><span><?php echo getcnamear('90-hj',0)?></span></a>
                                                        <?php echo displaysubar(urlfriendlyi($hcaa['snamear']),'90-hj')?>
                                                        <?php }?>
                                                        
                                                        <?php if(iscactive('75-hj')){?>
                                                        <a href="products?s=<?php echo urlfriendlyi($hcaa['snamear'])?>&c=<?php echo getcnamear('75-hj',1)?>" class="megamenu__subtitle"><span><?php echo getcnamear('75-hj',0)?></span></a>
                                                        <?php echo displaysubar(urlfriendlyi($hcaa['snamear']),'75-hj')?>
                                                        <?php }?>
                                                        
                                                        <?php if(iscactive('78-hj')){?>
                                                        <a href="products?s=<?php echo urlfriendlyi($hcaa['snamear'])?>&c=<?php echo getcnamecar('78-hj',1)?>" class="megamenu__subtitle"><span><?php echo getcnamecar('78-hj',0)?></span></a>
                                                        <?php }?>
                                                        <?php if(iscactive('80-hj')){?>
                                                        <a href="products?s=<?php echo urlfriendlyi($hcaa['snamear'])?>&c=<?php echo getcnamecar('80-hj',1)?>" class="megamenu__subtitle"><span><?php echo getcnamecar('80-hj',0)?></span></a>
                                                        <?php }?>
                                                        
                                                         <?php if(iscactive('72-hj')){?>
														<a href="products?s=<?php echo urlfriendlyi($hcaa['snamear'])?>&c=<?php echo getcnamear('72-hj',1)?>" class="megamenu__subtitle"><span><?php echo getcnamear('72-hj',0)?></span></a>
                                                        <?php echo displaysubar(urlfriendlyi($hcaa['snamear']),'72-hj')?>
                                                     <?php }?> 
													</li>
													<li class="col-sm-2">
                                                     
                                                        
                                                        <a href="#" class="megamenu__subtitle">
															<span>التسوق حسب السعر</span>
														</a>
														<ul class="megamenu__submenu megamenu__submenu--marked">
															<li class="dl-back"><a href="#"><span class="icon icon-chevron_left"></span>back</a></li>
															<li class="level2"><a href="products?s=<?php echo urlfriendlyi($hcaa['snamear'])?>&min_price=5&max_price=99">تحت 99</a></li>
															<li class="level2"><a href="products?s=<?php echo urlfriendlyi($hcaa['snamear'])?>&min_price=5&max_price=299">تحت 299</a></li>
															<li class="level2"><a href="products?s=<?php echo urlfriendlyi($hcaa['snamear'])?>&min_price=5&max_price=499">تحت 499</a></li>
															<li class="level2"><a href="products?s=<?php echo urlfriendlyi($hcaa['snamear'])?>&min_price=5&max_price=999">تحت 999</a></li>
														</ul>
                                                        
                                                       
                                                        
													</li>
                                                     <li class="col-sm-4">
                                                    <?php if($hcaa['menuimage1ar']!=''){
                                                        $menuurl1='#';
                                                        if($hcaa['menuurl1ar']!=''){
                                                            $menuurl1=$hcaa['menuurl1ar'];
                                                            }?>
                                                            <a href="<?php echo $menuurl1?>"><img src="../uploads/supplier_menu/<?php echo $hcaa['menuimage1']?>" style="width:100%"></a>
                                                    
                                                    <?php }?>
                                                    <?php if($hcaa['menuimage2ar']!=''){
                                                        $menuurl2='#';
                                                        if($hcaa['menuurl2ar']!=''){
                                                            $menuurl2=$hcaa['menuurl2ar'];
                                                            }?>
                                                           <a href="<?php echo $menuurl2?>"><img src="../uploads/supplier_menu/<?php echo $hcaa['menuimage2']?>" style="width:100%"></a>
                                                    
                                                    <?php }?>
														
													</li>
                                                    
                                                    <li class="col-sm-12">
                                                    <br><br>
                                                      <table width="100%" cellpadding="0" cellspacing="0">
                                                        <tr>
                                                          <?php $brr=$con->query("select * from brands where deleted='0' and brandsid in (select idbrand from brandsmenu where deleted='0' and idsupplier='24-hj') and bractive='Yes' and brandsimages!='' order by brpriority asc,brnamear asc");
																while($br=$con->fetch_array($brr)){?>
																	<td><div style="border:2px solid #ffffff;margin-left:10px;text-align:center"><a href="products?s=<?php echo urlfriendlyi($hcaa['snamear'])?>&c=&min_price=&max_price=&orderby=&brand=<?php echo urlfriendlyi($br['brnamear'])?>">
																	<img src="../uploads/brands_thumb/<?php echo $br['brandsimages']?>" alt="<?php echo $br['brnamear']?>" style="max-width:100%;"></a></div>
                                                                    </td>
																	<?php }?>
                                                        </tr>
                                                      </table>
                                                     </li>
													
												</ul>
                                                <?php }?>
                                                 <?php if($hcaa['supplierid']=='25-hj'){ //beauty?>
                                                 <ul class="dropdown-menu megamenu" >
                                                
													<li class="dl-back"><a href="#"><span class="icon icon-chevron_left"></span>back</a></li>
													<li class="col-sm-2">
                                                    <?php if(iscactive('43-hj')){?>												
														<a href="products?s=<?php echo urlfriendlyi($hcaa['snamear'])?>&c=<?php echo getcnamear('43-hj',1)?>" class="megamenu__subtitle"><span><?php echo getcnamear('43-hj',0)?></span></a>
                                                        <?php echo displaysubar(urlfriendlyi($hcaa['snamear']),'43-hj')?>
                                                        <?php }?>
                                                        
                                                        <a href="#" class="megamenu__subtitle">
															<span>التسوق حسب السعر</span>
														</a>
														<ul class="megamenu__submenu megamenu__submenu--marked">
															<li class="dl-back"><a href="#"><span class="icon icon-chevron_left"></span>back</a></li>
															<li class="level2"><a href="products?s=<?php echo urlfriendlyi($hcaa['snamear'])?>&min_price=5&max_price=99">تحت 99</a></li>
															<li class="level2"><a href="products?s=<?php echo urlfriendlyi($hcaa['snamear'])?>&min_price=5&max_price=199">تحت 199</a></li>
															<li class="level2"><a href="products?s=<?php echo urlfriendlyi($hcaa['snamear'])?>&min_price=5&max_price=299">تحت 299</a></li>
															<li class="level2"><a href="products?s=<?php echo urlfriendlyi($hcaa['snamear'])?>&min_price=5&max_price=399">تحت 399</a></li>
                                                            <li class="level2"><a href="products?s=<?php echo urlfriendlyi($hcaa['snamear'])?>&min_price=5&max_price=499">تحت 499</a></li>
														</ul>
                                                        
                                                        
                                                        <?php if(iscactive('99-hj')){?>												
														<a href="products?s=<?php echo urlfriendlyi($hcaa['snamear'])?>&c=<?php echo getcnamear('99-hj',1)?>" class="megamenu__subtitle"><span><?php echo getcnamear('99-hj',0)?></span></a>
                                                        <?php echo displaysubar(urlfriendlyi($hcaa['snamear']),'99-hj')?>
                                                        <?php }?>
                                                        
                                                        <?php if(iscactive('100-hj')){?>												
														<a href="products?s=<?php echo urlfriendlyi($hcaa['snamear'])?>&c=<?php echo getcnamear('100-hj',1)?>" class="megamenu__subtitle"><span><?php echo getcnamear('100-hj',0)?></span></a>
                                                        <?php echo displaysubar(urlfriendlyi($hcaa['snamear']),'100-hj')?>
                                                        <?php }?>
													</li>
													<li class="col-sm-2">
                                                    <?php if(iscactive('44-hj')){?>
														<a href="products?s=<?php echo urlfriendlyi($hcaa['snamear'])?>&c=<?php echo getcnamear('44-hj',1)?>" class="megamenu__subtitle"><span><?php echo getcnamear('44-hj',0)?></span></a>
                                                        <?php echo displaysubar(urlfriendlyi($hcaa['snamear']),'44-hj')?>
                                                        <?php }?>
                                                        
                                                        
                                                        

													</li>
													<li class="col-sm-2">
                                                    <?php if(iscactive('45-hj')){?>
														<a href="products?s=<?php echo urlfriendlyi($hcaa['snamear'])?>&c=<?php echo getcnamear('45-hj',1)?>" class="megamenu__subtitle"><span><?php echo getcnamear('45-hj',0)?></span></a>
                                                        <?php echo displaysubar(urlfriendlyi($hcaa['snamear']),'45-hj')?>
                                                        <?php }?>
                                                        
                                                        <a  href="products?s=<?php echo urlfriendlyi($hcaa['snamear'])?>&newarrival=1" class=" megamenu__subtitle"><span class="color3">وصل حديثا</span></a>
                                                        
                                                        <?php if(iscactive('46-hj')){?>
                                                        <a href="products?s=<?php echo urlfriendlyi($hcaa['snamear'])?>&c=<?php echo getcnamear('46-hj',1)?>" class="megamenu__subtitle"><span><?php echo getcnamear('46-hj',0)?></span></a>
                                                        <?php echo displaysubar(urlfriendlyi($hcaa['snamear']),'46-hj')?>
                                                        <?php }?>
                                                        
                                                        <?php if(iscactive('47-hj')){?>
                                                        <a href="products?s=<?php echo urlfriendlyi($hcaa['snamear'])?>&c=<?php echo getcnamear('47-hj',1)?>" class="megamenu__subtitle"><span><?php echo getcnamear('47-hj',0)?></span></a>
                                                        <?php echo displaysubar(urlfriendlyi($hcaa['snamear']),'47-hj')?>
                                                        <?php }?>
													</li>
													<li class="col-sm-2">
														<a  href="products?s=<?php echo urlfriendlyi($hcaa['snamear'])?>&c=" class=" megamenu__subtitle"><span class="color3">العلامات التجارية</span></a>
                                                        <ul class="megamenu__submenu megamenu__submenu--marked">
															<li class="dl-back"><a href="#"><span class="icon icon-chevron_left"></span>back</a></li>
                                                            <?php $brr=$con->query("select * from brands where deleted='0' and brandsid in (select idbrand from brandsmenu where deleted='0' and idsupplier='25-hj') and bractive='Yes' and brandsimages!='' order by brpriority asc,brnamear asc");
																while($br=$con->fetch_array($brr)){?>
															<li class="level2"><a href="products?s=<?php echo urlfriendlyi($hcaa['snamear'])?>&brand=<?php echo urlfriendlyi($br['brnamear'])?>"><?php echo $br['brnamear']?></a></li>
                                                            <?php }?>
														</ul>
                                                        
                                                        
                                                       
                                                        
													</li>
                                                    <li class="col-sm-4">
														 <?php if($hcaa['menuimage1ar']!=''){
                                                        $menuurl1='#';
                                                        if($hcaa['menuurl1ar']!=''){
                                                            $menuurl1=$hcaa['menuurl1ar'];
                                                            }?>
                                                            <a href="<?php echo $menuurl1?>"><img src="../uploads/supplier_menu/<?php echo $hcaa['menuimage1ar']?>" style="width:100%"></a>
                                                    
                                                    <?php }?>
													</li>
                                                    
                                                    <li class="col-sm-12">
                                                    <br><br>
                                                      <table width="100%" cellpadding="0" cellspacing="0">
                                                        <tr>
                                                          <?php $brr=$con->query("select * from brands where deleted='0' and brandsid in (select idbrand from brandsmenu where deleted='0' and idsupplier='25-hj') and bractive='Yes' and brandsimages!='' order by brpriority asc,brnamear asc");
																while($br=$con->fetch_array($brr)){?>
																	<td><div style="border:2px solid #ffffff;margin-left:10px;text-align:center"><a href="products?s=<?php echo urlfriendlyi($hcaa['snamear'])?>&c=&min_price=&max_price=&orderby=&brand=<?php echo urlfriendlyi($br['brnamear'])?>">
																	<img src="../uploads/brands_thumb/<?php echo $br['brandsimages']?>" alt="<?php echo $br['brnamear']?>" style="max-width:100%;"></a></div>
                                                                    </td>
																	<?php }?>
                                                        </tr>
                                                      </table>
                                                     </li>
													
												</ul>
                                                <?php }?>
                                                 <?php if($hcaa['supplierid']=='27-hj'){ //women?>
                                                 <ul class="dropdown-menu megamenu" >
                                               
													<li class="dl-back"><a href="#"><span class="icon icon-chevron_left"></span>back</a></li>
													<li class="col-sm-2">
                                                    <?php if(iscactive('55-hj')){?>												
														<a href="products?s=<?php echo urlfriendlyi($hcaa['snamear'])?>&c=<?php echo getcnamear('55-hj',1)?>" class="megamenu__subtitle"><span><?php echo getcnamear('55-hj',0)?></span></a>
                                                        <?php echo displaysubar(urlfriendlyi($hcaa['snamear']),'55-hj')?>
                                                        <?php }?>
                                                        
                                                        <?php if(iscactive('59-hj')){?>
                                                        <a href="products?s=<?php echo urlfriendlyi($hcaa['snamear'])?>&c=<?php echo getcnamear('59-hj',1)?>" class="megamenu__subtitle"><span><?php echo getcnamear('59-hj',0)?></span></a>
                                                        <?php echo displaysubar(urlfriendlyi($hcaa['snamear']),'59-hj')?>
                                                        <?php }?>
                                                        
                                                        <a  href="products?s=<?php echo urlfriendlyi($hcaa['snamear'])?>&newarrival=1" class=" megamenu__subtitle"><span class="color3">وصل حديثا</span></a>
													</li>
													<li class="col-sm-2">
                                                    <?php if(iscactive('50-hj')){?>
														<a href="products?s=<?php echo urlfriendlyi($hcaa['snamear'])?>&c=<?php echo getcnamear('50-hj',1)?>" class="megamenu__subtitle"><span><?php echo getcnamear('56-hj',0)?></span></a>
                                                        <?php echo displaysubar(urlfriendlyi($hcaa['snamear']),'56-hj')?>
                                                        <?php }?>
                                                        
                                                        <?php if(iscactive('60-hj')){?>
                                                        <a href="products?s=<?php echo urlfriendlyi($hcaa['snamear'])?>&c=<?php echo getcnamear('53-hj',1)?>" class="megamenu__subtitle"><span><?php echo getcnamear('60-hj',0)?></span></a>
                                                        <?php echo displaysubar(urlfriendlyi($hcaa['snamear']),'60-hj')?>
                                                        <?php }?>
													</li>
													<li class="col-sm-2">
                                                    <?php if(iscactive('57-hj')){?>
														 <a href="products?s=<?php echo urlfriendlyi($hcaa['snamear'])?>&c=<?php echo getcnamear('57-hj',1)?>" class="megamenu__subtitle"><span><?php echo getcnamear('57-hj',0)?></span></a>
                                                        <?php echo displaysubar(urlfriendlyi($hcaa['snamear']),'57-hj')?>
                                                        <?php }?>
                                                        
                                                        <?php if(iscactive('58-hj')){?>
                                                         <a href="products?s=<?php echo urlfriendlyi($hcaa['snamear'])?>&c=<?php echo getcnamear('58-hj',1)?>" class="megamenu__subtitle"><span><?php echo getcnamear('58-hj',0)?></span></a>
                                                        <?php echo displaysubar(urlfriendlyi($hcaa['snamear']),'58-hj')?>
                                                        <?php }?>
                                                        <?php if(iscactive('61-hj')){?>
                                                         <a href="products?s=<?php echo urlfriendlyi($hcaa['snamear'])?>&c=<?php echo getcnamear('61-hj',1)?>" class="megamenu__subtitle"><span><?php echo getcnamear('61-hj',0)?></span></a>
                                                        <?php echo displaysubar(urlfriendlyi($hcaa['snamear']),'61-hj')?>
                                                        <?php }?>
                                                        
                                                        
                                                       
                                                        
													</li>
                                                    <li class="col-sm-6" style="padding-right:30px">
														 <?php if($hcaa['menuimage1ar']!=''){
                                                        $menuurl1='#';
                                                        if($hcaa['menuurl1ar']!=''){
                                                            $menuurl1=$hcaa['menuurl1ar'];
                                                            }?>
                                                            <a href="<?php echo $menuurl1?>"><img src="../uploads/supplier_menu/<?php echo $hcaa['menuimage1ar']?>" style="width:100%"></a>
                                                    
                                                    <?php }?>
													</li>
                                                    
                                                    <li class="col-sm-12">
                                                    <br><br>
                                                      <table width="100%" cellpadding="0" cellspacing="0">
                                                        <tr>
                                                          <?php $brr=$con->query("select * from brands where deleted='0' and brandsid in (select idbrand from brandsmenu where deleted='0' and idsupplier='27-hj') and bractive='Yes' and brandsimages!='' order by brpriority asc,brnamear asc");
																while($br=$con->fetch_array($brr)){?>
																	<td><div style="border:2px solid #ffffff;margin-left:10px;text-align:center"><a href="products?s=<?php echo urlfriendlyi($hcaa['snamear'])?>&c=&min_price=&max_price=&orderby=&brand=<?php echo urlfriendlyi($br['brnamear'])?>">
																	<img src="../uploads/brands_thumb/<?php echo $br['brandsimages']?>" alt="<?php echo $br['brnamear']?>" style="max-width:100%;"></a></div>
                                                                    </td>
																	<?php }?>
                                                        </tr>
                                                      </table>
                                                     </li>
													
												</ul>
                                                <?php }?>
                                                 <?php if($hcaa['supplierid']=='28-hj'){ //kids?>
                                                 <ul class="dropdown-menu megamenu" >
                                                
													<li class="dl-back"><a href="#"><span class="icon icon-chevron_left"></span>back</a></li>
													<li class="col-sm-2">	
                                                    <?php if(iscactive('62-hj')){?>											
														<a href="products?s=<?php echo urlfriendlyi($hcaa['snamear'])?>&c=<?php echo getcnamear('62-hj',1)?>" class="megamenu__subtitle"><span><?php echo getcnamear('62-hj',0)?></span></a>
                                                        <?php echo displaysubar(urlfriendlyi($hcaa['snamear']),'62-hj')?>
                                                        <?php }?>
                                                        <?php if(iscactive('66-hj')){?>
                                                        <a href="products?s=<?php echo urlfriendlyi($hcaa['snamear'])?>&c=<?php echo getcnamear('66-hj',1)?>" class="megamenu__subtitle"><span><?php echo getcnamear('66-hj',0)?></span></a>
                                                        <?php echo displaysubar(urlfriendlyi($hcaa['snamear']),'66-hj')?>
                                                        <?php }?>
                                                        
                                                        <a  href="products?s=<?php echo urlfriendlyi($hcaa['snamear'])?>&newarrival=1" class=" megamenu__subtitle"><span class="color3">وصل حديثا</span></a>
													</li>
													<li class="col-sm-2">
                                                        <?php if(iscactive('67-hj')){?>
                                                        <a href="products?s=<?php echo urlfriendlyi($hcaa['snamear'])?>&c=<?php echo getcnamear('67-hj',1)?>" class="megamenu__subtitle"><span><?php echo getcnamear('67-hj',0)?></span></a>
                                                        <?php echo displaysubar(urlfriendlyi($hcaa['snamear']),'67-hj')?>
                                                        <?php }?>
													</li>
													<li class="col-sm-2">
                                                    <?php if(iscactive('64-hj')){?>
														 <a href="products?s=<?php echo urlfriendlyi($hcaa['snamear'])?>&c=<?php echo getcnamear('64-hj',1)?>" class="megamenu__subtitle"><span><?php echo getcnamear('64-hj',0)?></span></a>
                                                        <?php echo displaysubar(urlfriendlyi($hcaa['snamear']),'64-hj')?>
                                                        <?php }?>
                                                        <?php if(iscactive('65-hj')){?>
                                                         <a href="products?s=<?php echo urlfriendlyi($hcaa['snamear'])?>&c=<?php echo getcnamear('65-hj',1)?>" class="megamenu__subtitle"><span><?php echo getcnamear('65-hj',0)?></span></a>
                                                        <?php echo displaysubar(urlfriendlyi($hcaa['snamear']),'65-hj')?>
                                                        <?php }?>
                                                        <?php if(iscactive('68-hj')){?>
                                                         <a href="products?s=<?php echo urlfriendlyi($hcaa['snamear'])?>&c=<?php echo getcnamear('68-hj',1)?>" class="megamenu__subtitle"><span><?php echo getcnamear('68-hj',0)?></span></a>
                                                        <?php echo displaysubar(urlfriendlyi($hcaa['snamear']),'68-hj')?>
                                                        <?php }?>
                                                        
                                                        
                                                       
                                                        
													</li>
                                                    <li class="col-sm-6">
														 <?php if($hcaa['menuimage1ar']!=''){
                                                        $menuurl1='#';
                                                        if($hcaa['menuurl1ar']!=''){
                                                            $menuurl1=$hcaa['menuurl1ar'];
                                                            }?>
                                                            <a href="<?php echo $menuurl1?>"><img src="../uploads/supplier_menu/<?php echo $hcaa['menuimage1ar']?>" style="width:100%"></a>
                                                    
                                                    <?php }?>
													</li>
                                                    
                                                    <li class="col-sm-12">
                                                    <br><br>
                                                      <table width="100%" cellpadding="0" cellspacing="0">
                                                        <tr>
                                                          <?php $brr=$con->query("select * from brands where deleted='0' and brandsid in (select idbrand from brandsmenu where deleted='0' and idsupplier='28-hj') and bractive='Yes' and brandsimages!='' order by brpriority asc,brnamear asc");
																while($br=$con->fetch_array($brr)){?>
																	<td><div style="border:2px solid #ffffff;margin-left:10px;text-align:center"><a href="products?s=<?php echo urlfriendlyi($hcaa['snamear'])?>&c=&min_price=&max_price=&orderby=&brand=<?php echo urlfriendlyi($br['brnamear'])?>">
																	<img src="../uploads/brands_thumb/<?php echo $br['brandsimages']?>" alt="<?php echo $br['brnamear']?>" style="max-width:100%;"></a></div>
                                                                    </td>
																	<?php }?>
                                                        </tr>
                                                      </table>
                                                     </li>
													
												</ul>
                                                <?php }?>
                                                 <?php if($hcaa['supplierid']=='30-hj'){ //dailyneeds?>
                                                 <ul class="dropdown-menu megamenu" >
                                                
													<li class="dl-back"><a href="#"><span class="icon icon-chevron_left"></span>back</a></li>
													<li class="col-sm-2">
                                                    <?php if(iscactive('81-hj')){?>
														<a href="products?s=<?php echo urlfriendlyi($hcaa['snamear'])?>&c=<?php echo getcnamear('81-hj',1)?>" class="megamenu__subtitle"><span><?php echo getcnamear('81-hj',0)?></span></a>
                                                        <?php echo displaysubar(urlfriendlyi($hcaa['snamear']),'81-hj')?>
                                                      <?php }?>  
                                                        
                                                        <?php if(iscactive('84-hj')){?>
                                                        <a href="products?s=<?php echo urlfriendlyi($hcaa['snamear'])?>&c=<?php echo getcnamear('84-hj',1)?>" class="megamenu__subtitle"><span><?php echo getcnamear('84-hj',0)?></span></a>
                                                        <?php echo displaysubar(urlfriendlyi($hcaa['snamear']),'84-hj')?>
                                                        <?php }?>
                                                        
                                                        <?php if(iscactive('87-hj')){?>
                                                         <a href="products?s=<?php echo urlfriendlyi($hcaa['snamear'])?>&c=<?php echo getcnamear('87-hj',1)?>" class="megamenu__subtitle"><span><?php echo getcnamear('87-hj',0)?></span></a>
                                                        <?php echo displaysubar(urlfriendlyi($hcaa['snamear']),'87-hj')?>
                                                        <?php }?>
                                                        
													</li>
													<li class="col-sm-2">
                                                    <?php if(iscactive('82-hj')){?>
														<a href="products?s=<?php echo urlfriendlyi($hcaa['snamear'])?>&c=<?php echo getcnamear('82-hj',1)?>" class="megamenu__subtitle"><span><?php echo getcnamear('82-hj',0)?></span></a>
                                                        <?php echo displaysubar(urlfriendlyi($hcaa['snamear']),'82-hj')?>
                                                        <?php }?>
                                                        <?php if(iscactive('85-hj')){?>
                                                        <a href="products?s=<?php echo urlfriendlyi($hcaa['snamear'])?>&c=<?php echo getcnamear('85-hj',1)?>" class="megamenu__subtitle"><span><?php echo getcnamear('85-hj',0)?></span></a>
                                                        <?php echo displaysubar(urlfriendlyi($hcaa['snamear']),'85-hj')?>
                                                        <?php }?>
                                                        <?php if(iscactive('88-hj')){?>
                                                        <a href="products?s=<?php echo urlfriendlyi($hcaa['snamear'])?>&c=<?php echo getcnamear('88-hj',1)?>" class="megamenu__subtitle"><span><?php echo getcnamear('88-hj',0)?></span></a>
                                                        <?php echo displaysubar(urlfriendlyi($hcaa['snamear']),'88-hj')?>
                                                        <?php }?>
                                                        
                                                        
                                                       
                                                        
													</li>
                                                    <li class="col-sm-2">
                                                    <?php if(iscactive('83-hj')){?>
														<a href="products?s=<?php echo urlfriendlyi($hcaa['snamear'])?>&c=<?php echo getcnamear('83-hj',1)?>" class="megamenu__subtitle"><span><?php echo getcnamear('83-hj',0)?></span></a>
                                                        <?php echo displaysubar(urlfriendlyi($hcaa['snamear']),'83-hj')?>
                                                        <?php }?>
                                                        <?php if(iscactive('86-hj')){?>
                                                        <a href="products?s=<?php echo urlfriendlyi($hcaa['snamear'])?>&c=<?php echo getcnamear('86-hj',1)?>" class="megamenu__subtitle"><span><?php echo getcnamear('86-hj',0)?></span></a>
                                                        <?php echo displaysubar(urlfriendlyi($hcaa['snamear']),'86-hj')?>
                                                        <?php }?>
                                                        
													</li>
                                                    <li class="col-sm-6">
														 <table width="100%">
                                                         <tr>
                                                         <?php if($hcaa['menuimage1ar']!=''){
                                                        $menuurl1='#';
                                                        if($hcaa['menuurl1ar']!=''){
                                                            $menuurl1=$hcaa['menuurl1ar'];
                                                            }?>
                                                           <td> <a href="<?php echo $menuurl1?>"><img src="../uploads/supplier_menu/<?php echo $hcaa['menuimage1ar']?>" style="width:100%"></a></td>
                                                    
                                                    <?php }?>
                                                    <?php if($hcaa['menuimage2ar']!=''){
                                                        $menuurl2='#';
                                                        if($hcaa['menuurl2ar']!=''){
                                                            $menuurl2=$hcaa['menuurl2ar'];
                                                            }?>
                                                          <td><a href="<?php echo $menuurl2?>"><img src="../uploads/supplier_menu/<?php echo $hcaa['menuimage2ar']?>" style="width:100%"></a></td>
                                                    
                                                    <?php }?>
                                                    <?php if($hcaa['menuimage3ar']!=''){
                                                        $menuurl3='#';
                                                        if($hcaa['menuurl3ar']!=''){
                                                            $menuurl3=$hcaa['menuurl3ar'];
                                                            }?>
                                                          <td><a href="<?php echo $menuurl3?>"><img src="../uploads/supplier_menu/<?php echo $hcaa['menuimage3ar']?>" style="width:100%"></a></td>
                                                    
                                                    <?php }?>
                                                    </tr>
                                                         </table>
													</li>
                                                    
                                                    <li class="col-sm-12">
                                                    <br><br>
                                                      <table width="100%" cellpadding="0" cellspacing="0">
                                                        <tr>
                                                          <?php $brr=$con->query("select * from brands where deleted='0' and brandsid in (select idbrand from brandsmenu where deleted='0' and idsupplier='30-hj') and bractive='Yes' and brandsimages!='' order by brpriority asc,brnamear asc");
																while($br=$con->fetch_array($brr)){?>
																	<td><div style="border:2px solid #ffffff;margin-left:10px;text-align:center"><a href="products?s=<?php echo urlfriendlyi($hcaa['snamear'])?>&c=&min_price=&max_price=&orderby=&brand=<?php echo urlfriendlyi($br['brnamear'])?>">
																	<img src="../uploads/brands_thumb/<?php echo $br['brandsimages']?>" alt="<?php echo $br['brnamear']?>" style="max-width:100%;"></a></div>
                                                                    </td>
																	<?php }?>
                                                        </tr>
                                                      </table>
                                                     </li>
													
												</ul>
                                                <?php }?>
                                                 <?php if($hcaa['supplierid']=='31-hj'){ //offer?>
                                                 <ul class="dropdown-menu megamenu" >
                                                
													<li class="dl-back"><a href="#"><span class="icon icon-chevron_left"></span>back</a></li>
                                                    <li class="col-sm-2">
													<?php if(iscactive('98-hj')){?>
														<a href="products?s=<?php echo urlfriendlyi($hcaa['snamear'])?>&c=<?php echo getcnamear('98-hj',1)?>" class="megamenu__subtitle"><span><?php echo getcnamear('98-hj',0)?></span></a>
                                                        <?php echo displaysubar(urlfriendlyi($hcaa['snamear']),'98-hj')?>
                                                        <?php }?>
                                                        </li>
													<li class="col-sm-2">
														<a href="#" class="megamenu__subtitle">
															<span>تسوق حسب الخصم</span>
														</a>
														<ul class="megamenu__submenu megamenu__submenu--marked">
															<li class="dl-back"><a href="#"><span class="icon icon-chevron_left"></span>back</a></li>
															<li class="level2"><a href="products?s=min_discount=80">الادنى 80%</a></li>
															<li class="level2"><a href="products?s=&min_discount=70">الادنى 70%</a></li>
															<li class="level2"><a href="products?s=&min_discount=60">الادنى 60%</a></li>
															<li class="level2"><a href="products?s=&min_discount=50">الادنى 50%</a></li>
                                                            <li class="level2"><a href="products?s=&max_discount=50">تحت 50%</a></li>

														</ul>
                                                        
                                                       
                                                        
													</li>
                                                    <li class="col-sm-2">
														<a href="#" class="megamenu__subtitle">
															<span>التسوق حسب السعر</span>
														</a>
														<ul class="megamenu__submenu megamenu__submenu--marked">
															<li class="dl-back"><a href="#"><span class="icon icon-chevron_left"></span>back</a></li>
															<li class="level2"><a href="products?s=&min_price=5&max_price=49">تحت 49</a></li>
															<li class="level2"><a href="products?s=&min_price=5&max_price=99">تحت 99</a></li>
															<li class="level2"><a href="products?s=&min_price=5&max_price=149">تحت 149</a></li>
															<li class="level2"><a href="products?s=&min_price=5&max_price=199">تحت 199</a></li>
														</ul>
													</li>
                                                    <li style="display:none" class="col-sm-2">
														<a href="#" class="megamenu__subtitle">
															<span>العلامات التجارية</span>
														</a>
														<ul class="megamenu__submenu megamenu__submenu--marked">
															<li class="dl-back"><a href="#"><span class="icon icon-chevron_left"></span>back</a></li>
															<li class="level2"><a href="#">Apple??</a></li>
															<li class="level2"><a href="#">Samsung??</a></li>
															<li class="level2"><a href="#">Infinix??</a></li>
														</ul>
													</li>
                                                    
                                                    <li class="col-sm-2">
														<a href="#" class="megamenu__subtitle">
															<span>فئات جديدة</span>
														</a>
														<ul class="megamenu__submenu megamenu__submenu--marked">
															<li class="dl-back"><a href="#"><span class="icon icon-chevron_left"></span>back</a></li>
                                                            <?php $ofcatt=$con->query("select * from category left join supplier on supplierid=idsupplier where categorynew='Yes' and category.deleted='0'");
															while($ofcat=$con->fetch_array($ofcatt)){?>
															<li class="level2"><a href="products?s=<?php echo urlfriendlyi($ofcat['snamear'])?>&c=<?php echo urlfriendlyi($ofcat['bnamear'])?>"><?php echo $ofcat['bnamear']?></a></li>
                                                            <?php }?>
														</ul>
													</li>
                                                    <li class="col-sm-2">
														<a href="#" class="megamenu__subtitle">
															<span>عروض مثيرة</span>
														</a>
														<ul class="megamenu__submenu megamenu__submenu--marked">
															<li class="dl-back"><a href="#"><span class="icon icon-chevron_left"></span>back</a></li>
															<li class="level2"><a href="products?lastpiece=1">Last Piece</a></li>
                                                            <?php $ofcatt=$con->query("select * from subcategory left join category on sidcategory=categoryid left join supplier on supplierid=idsupplier where subcategoryid in (select idsubcategory from projects where deleted='0' and ppromotion='Yes'  ) order by rand() limit 3");
															while($ofcat=$con->fetch_array($ofcatt)){?>
                                                            <li class="level2"><a href="products?s=<?php echo urlfriendlyi($ofcat['snamear'])?>&c=<?php echo urlfriendlyi($ofcat['bnamear'])?>"><?php echo $ofcat['subcategorynamear']?></a></li>
                                                            <?php }?>
														</ul>
													</li>
                                                    
                                                    <li class="col-sm-12">
                                                    <br><br>
                                                      <table width="100%" cellpadding="0" cellspacing="0">
                                                        <tr>
														<td><div style="margin-left:10px;text-align:center;font-family:'ge_sslight';font-size:14px">
														<img src="../images/brands/apple.png" alt="Apple"  style="max-width:100%;"></div>
                                                         </td>
                                                         <td><div style="margin-left:10px;text-align:center;font-family:'ge_sslight';font-size:14px">
														<img src="../images/brands/o1.png" alt="أقل من 99" style="max-width:100%;"><br>
                                                        أقل من 99</div>
                                                         </td>
                                                          <td><div style="margin-left:10px;text-align:center;font-family:'ge_sslight';font-size:14px">
														<img src="../images/brands/o2.png" alt="خصم 50% كحد ادنى" style="max-width:100%;"><br>
                                                       خصم 50% كحد ادنى</div>
                                                         </td>
                                                         <td><div style="margin-left:10px;text-align:center;font-family:'ge_sslight';font-size:14px">
														<img src="../images/brands/o3.png" alt="أفضل 100 صفقة" style="max-width:100%;"><br>
                                                     أفضل 100 صفقة</div>
                                                         </td>
                                                         <td><div style="margin-left:10px;text-align:center;font-family:'ge_sslight';font-size:14px">
														<img src="../images/brands/o4.png" alt="تصفيات وتخفيضات" style="max-width:100%;"><br>
                                                    تصفيات وتخفيضات</div>
                                                         </td>
                                                          <td><div style="margin-left:10px;text-align:center;font-family:'ge_sslight';font-size:14px">
														<img src="../images/brands/o5.png" alt="سعر منخفض" style="max-width:100%;"><br>
                                                    سعر منخفض</div>
                                                         </td>
                                                         <td><div style="margin-left:10px;text-align:center;font-family:'ge_sslight';font-size:14px">
														<img src="../images/brands/o6.png" alt="أفضل سعر" style="max-width:100%;"><br>
                                                    أفضل سعر</div>
                                                         </td>
                                                          <td><div style="margin-left:10px;text-align:center;font-family:'ge_sslight';font-size:14px">
														<img src="../images/brands/offers.png" alt="offers" style="max-width:100%;"><br>
                                                    </div>
                                                         </td>
																	
                                                        </tr>
                                                      </table>
                                                     </li>
													
												</ul>
                                                <?php }?>
											</li>
                                            
                                            <?php }?>
                                            
                                            
                                            
                                   
                                            
										</ul>
									</div>
										</nav>
									</div>
									<!-- /navigation end -->
									<!-- shopping cart start -->
                                    
									<div class="pull-left col-stuck-cart text-right" style="color:#ffffff;font-weight:bold">	
                                   <span class="thetopone"> 
                                    <a href="../en/<?php echo basename($_SERVER['PHP_SELF'])?>?<?php echo $_SERVER['QUERY_STRING']?>" style="color:#ffffff;font-weight:16px;font-family:'ge_sslight'">English</a>  <span style="padding:0 5px">| </span>
                             <?php if(isset($_SESSION['hj_id'])){?>
                   <select name="account" id="account" onchange="change_account_location(this.value)" style="color:#ffffff;background-color: #1b3281;border: none;">
                  <option value="">حسابي</option>
                  <option value="editprofile">الملف الشخصي</option>
                  <option value="wishlist">قائمة امنياتي</option>
                  <option value="orderhistory">طلباتي</option>
                  <option value="logout">الخروج</option>
                </select>
             <?php }else{?>
					<div style="display:inline-block;position:relative;z-index:10"  class="signholder"><a href="signlog" style="color:#ffffff">سجل / ادخل <img src="../images/menudownwhite.png"></a> 
                    <div class="signcontent" style="position:absolute;left:0px;width:200px;display:none;z-index:10">
                       <div style="text-align:center;background-color:#ffffff;border:1px solid #666666;color:#000000;padding:20px">
                        <div style="margin-bottom:5px"> تسجيل الدخول</div>
                        <a class="butt" href="signlog" style="max-width:100px;margin:0 auto;display:block;background-color:#3a66dd;color:#ffffff;padding:10px 20px">الدخول</a>
                        
                        <hr style="border-top:1px solid #cccccc;margin:10px"/>
                        ليس لديك حساب؟ <br>
                        <a href="signlog" class="color2">سجل دخول</a>
                       </div>
                    </div>
                    </div>
                                  <?php }?> <span style="padding:0 5px">| </span>
								<!-- search start -->
								<div class="search link-inline">
									
									<div class="search-dropdown">
										<form  action="products" method="get">
											<div class="input-outer">
												<input  type="search" name="searchh" value="<?php echo $searchval?>" maxlength="128" placeholder="عما تبحث؟">
												<button type="submit" title="" class="fa fa-search"></button>
											</div>
											<a href="#" class="search__close"><span class="icon icon-close" style="color:#000000"></span></a>									
										</form>
									</div>
								</div>
                                </span>
								<!-- search end -->			
                                    							
										<div class="cart link-inline fixablecart">
										<div class="dropdown text-right shopping-cart">
											<a class="dropdown-toggle" href="cart">
                                            <div class='cart-count' style="color:#d1e146;position:absolute;right:29px;top:0px"><?php echo getcartcount()?></div>
											 <img src="../images/cart1.png" style="width:22px;position:relative;top:-5px">
											<span class="badge badge--cart cart-count" style="display:none"><?php echo getcartcount()?></span>
											</a>
											<div class="mshoppingcart_data" style="display:none;position:absolute;left:0px;top:20px;border:1px solid #cccccc;z-index:20;background-color:#ffffff;max-width:700px">
                                                  <div class="mshoppingcart_content" style="padding:10px">
                                                    <div>جاري التحميل</div>
                                                  </div>
                                                </div>
										</div>
									</div>
									<!-- shopping cart end -->	
								</div>	
						    </div>							
						</div>
							
						</div>
                    </div>
                    </div>
                    </div>
                </div>
			</header>
            
            
            
            
        <!-- tablet-->    
            
            <header id="header" class="header-layout-06 tablet" style="position:fixed;width:100%">
            
				<div class="container">
					<div class="row">
						<div style="float:right;width:30%" class="leftholder">
                        <div class="navbar" style="">
                        <div class="expand-nav compact-hidden">
												<a href="#off-canvas-menu" class="off-canvas-menu-toggle">
													<div class="navbar-toggle"> 
														<span class="icon-bar"></span> 
														<span class="icon-bar"></span> 
														<span class="icon-bar"></span> 
													</div>
												</a>
											</div>
                                            </div>
                                            
							<!-- logo start --> 
							<div class="tabletleft" style="float:right;width: 200px;padding-right: 30px;position: relative;top: -3px;"><a href="index.php"><img class="logo img-responsive" src="../images/logoar.png" alt="<?php echo $titlar?>"/></a> </div>
							<!-- logo end --> 
						</div>
						
                        <div style="float:right;width:50%" class="middletablet">
                        <div class="search-dropdown customsearch-dropdown">
                        <form  action="products" method="get">
											<div class="input-outer"  style="width:100%">
												<input  type="search" name="searchh" value="<?php echo $searchval?>" maxlength="128" placeholder="عما تبحث؟">
												<button type="submit" title="" class="fa fa-search"></button>
											</div>
										</form>
                                        </div>
                                        </div>
         
                        <!-- normal left bar -->
						<div style="float:left;width:25%;padding-left:30px;padding-top:20px" class="tabletright">
							<div class="text-right smnomargin" style="margin-top:20px;color:#ffffffl;font-weight:bold">
                             <?php if(isset($_SESSION['hj_id'])){?>
                   <select name="account" id="account" onchange="change_account_location(this.value)" style="color:#ffffff;background-color: #1b3281;border: none;">
                  <option value="">حسابي</option>
                  <option value="editprofile">الملف الشخصي</option>
                  <option value="wishlist">قائمة امنياتي</option>
                  <option value="orderhistory">طلباتي</option>
                  <option value="logout">الخروج</option>
                </select>
             <?php }else{?>
             <span class="tabletsign" style="color:#ffffff">
					<div style="display:inline-block;position:relative;z-index:10"  class="signholder"><a href="signlog" style="color:#ffffff">سجل / ادخل <img src="../images/menudownwhite.png"></a> 
                    <div class="signcontent" style="position:absolute;left:0px;width:200px;display:none;z-index:10">
                       <div style="text-align:center;background-color:#ffffff;border:1px solid #666666;color:#000000;padding:20px">
                        <div style="margin-bottom:5px"> تسجيل الدخول </div>
                        <a class="butt" href="signlog" style="max-width:100px;margin:0 auto;display:block;background-color:#3a66dd;color:#ffffff;padding:10px 20px">الدخول</a>
                        
                        <hr style="border-top:1px solid #cccccc;margin:10px"/>
                        ليس لديك حساب؟ <br>
                        <a href="signlog" class="color2">سجل دخول</a>
                       </div>
                    </div>
                    </div> 
                                  <?php }?> <span style="padding:0 5px">| </span>
                                  </span>
								<div class="cart link-inline" style="display:inline">
									<div class="dropdown text-right shopping-cart ">
										<a class="dropdown-toggle " href="cart">
                                        <div class='cart-count' style="color:#d1e146;position:absolute;left:-10px;top:0px"><?php echo getcartcount()?></div>
										 <img src="../images/cart1.png" style="width:22px;position:relative;top:-5px">
										<span class="badge badge--cart cart-count" style="display:none"><?php echo getcartcount()?></span>
                                        
                                        <div class="mshoppingcart_data" style="display:none;position:absolute;left:0px;top:20px;border:1px solid #cccccc;z-index:20;background-color:#ffffff;max-width:700px">
                                                  <div class="mshoppingcart_content" style="padding:10px">
                                                    <div>جاري التحميل</div>
                                                  </div>
                                                </div>
										</a>
										
									</div>
								</div>
								<!-- shopping cart end -->			
							</div>
						</div>
                        
                        <div class="mobilesearch" style="display:none;clear:both;">
                        <div style="padding: 0 24px;margin-right: -10px;">
                    <div class="search-dropdown customsearch-dropdown" style="border-radius:10px">
                            <form  action="products" method="get">
											<div class="input-outer"  style="width:100%">
												<input  style="border-radius:10px"  type="search" name="searchh" value="<?php echo $searchval?>" maxlength="128" placeholder="عما تبحث؟">
												<button type="submit" title="" class="fa fa-search"></button>
											</div>
										</form>
                                        </div>
                        </div>
                    </div>
					</div>
                    
                    
                    
				</div>			
                
                
                
			</header>
            
            

		</div>