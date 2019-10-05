<?php include "../includes/ini.php"?>
<?php $pagetitle1="mblog";
$pagetitle=$alls[$pagetitle1]['titleear']?>
<!DOCTYPE html>
<html>
	

<head>
		<!-- Basic -->
		<meta charset="utf-8">
		<title><?php echo $titlar?> - <?php echo $pagetitle?></title>
		<meta name="keywords" content="" />
		<meta name="description" content="<?php echo $titlar?>">
		
		<?php include "metastuff.php"?>
<link rel="shortcut icon" href="favicon.ico">
		<!-- الجوالSpecific Metas -->
		
		<!-- External Plugins CSS -->
		<link rel="stylesheet" href="../external/slick/slickar.css">
		<link rel="stylesheet" href="../external/slick/slick-themear.css">
		<link rel="stylesheet" href="../external/magnific-popup/magnific-popup.css">
		<link rel="stylesheet" href="../external/nouislider/nouislider.css">
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
	<body>
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
			<div class="container">				
				<div class="row">
					<div class="blog-layout">
						<!-- title -->
						<div class="title-box">
							<h1 class="text-center text-uppercase title-under"><?php echo $pagetitle?></h1>
						</div>
						<!-- /title -->						 
						<!-- col -->
                         <?php $query="select * from news where deleted='0' and active='Yes'  order by npriority desc, datee desc";
							 
												   if($con->num_rowsfast($query)!=0){
													   //pager
													   $thispage=isset($_REQUEST['thispage'])?$_REQUEST['thispage']:1;
													   $thispage1=isset($_REQUEST['thispage1'])?$_REQUEST['thispage1']:1;
													   $passingparams="thispage1=".$thispage1."";
													   $passingparamssort="";
														$pager=new pagination($con->con,$query,$thispage,20,$passingparams."&amp;".$passingparamssort);
														  $pager->type="normal"; //dropdown,normal
														  $pager->pagingdistance="2"; //it is the distance of upper and lower part of the page number,can be 0 to show all the records
														  $pager->prev="<";
														  $pager->next=">";
														  $pager->first="<<";
														  $pager->last=">>";
														  $pager->showifonepage=false;
														  
														  //pager
													   $res = $pager->paginate();
													   $n=0;
													   
                                                      
                                                      while($ress=$con->fetch_array($res)){
														   
														   if($n>=3){?>
                                                       <div style="clear:both"></div>
                                                       <?php $n=0;}
														   
														   if($ress['image']!=''){
															   $img="<img  alt='".str_replace("'",'`',$ress['ntitle'])."' src='../uploads/news_thumb/".$ress['image']."' style='width:100%;border:1px solid #cccccc'>";
														   }else{
															   $img="<img alt='".$titl."' src='../uploads/static/default_thumb_news.jpg' style='width:100%;border:1px solid #cccccc'>";
														   }?>
						<div class="col-sm-4">											
							<!-- Post start -->
							<div class="post">							
								<!-- title post -->
								<div class="post__title_block">
									<figure>
										<a href="blog1?id=<?php echo urlfriendlyi($ress['ntitle'])?>"><?php echo $img?></a>									
									</figure>
                                    <?php if($ress['datee']!='0000-00-00'){?>
									<div class="pull-right">
										<div class="time">
											<span><?php echo formatdate($ress['datee'],"d")?></span>
											<?php echo formatdate($ress['datee'],"M")?>
										</div>
									</div>	
                                    <?php }?>									
									<div class="pull-right">
										<h2 class="post__title text-uppercase"><a href="blog1?id=<?php echo urlfriendlyi($ress['ntitle'])?>"><?php echo $ress['ntitle']?></a></h2>
										
									</div>									
								</div>
								<!-- /title post -->
								<!-- content post -->
                                <div style="">
								<p>
									<?php echo $ress['sdescc']?>
								</p>
                                </div>
																		          				 
	            				<!-- /content post -->
							</div>
							<!-- /Post end -->					
						</div>
                        
                        <?php $n++;}?>
           
           <div style="clear:both"></div>
           <table style="padding:5px">
                                                            <tr>
                                                              <td><?php $pager->first()?></td>
                                                              <td><?php $pager->previous()?></td>
                                                              <td><?php $pager->render()?></td>
                                                              <td><?php $pager->next()?></td>
                                                              <td><?php $pager->last()?></td>
                                                            </tr>
                                                          </table>
            <?php }?>
						<!-- /col -->

					</div>
				</div>
				
			</div>
		</div>
		<!-- End CONTENT section --> 
		<!-- FOOTER section -->
		</div>
<?php include "footer.php"?>
		<!-- END FOOTER section -->
		<!-- External JS --> 
		<!-- jQuery 1.10.1--> 
		<script src="../external/jquery/jquery-2.1.4.min.js"></script> 
		<!-- Bootstrap 3--> 
		<script src="../external/bootstrap/bootstrap.min.js"></script> 
		<!-- Specific Page External Plugins --> 
		<script src="../external/slick/slick.min.js"></script>
		<script src="../external/bootstrap-select/bootstrap-select.min.js"></script>  
		<script src="../external/countdown/jquery.plugin.min.js"></script> 
		<script src="../external/countdown/jquery.countdown.min.js"></script> 		
		<script src="../external/instafeed/instafeed.min.js"></script> 
		<script src="../external/magnific-popup/jquery.magnific-popup.min.js"></script> 
		<script src="../external/nouislider/nouislider.min.js"></script>
		<script src="../external/isotope/isotope.pkgd.min.js"></script> 
		<script src="../external/imagesloaded/imagesloaded.pkgd.min.js"></script>
        <script src="../external/colorbox/jquery.colorbox-min.js"></script> 
        <script src="../js/fancybox.js"></script> 
<script type="text/javascript" src="../js/notification.js"></script><script src="../js/functions.js"></script> <?php include "extrascripts.php"?>
		<!-- Custom --> 
		<script src="../js/custom.js"></script> 
		<script>
			$j(document).ready(function() {
			
				// popup ini			
				$j('.quick-view').magnificPopup({
					type: 'ajax'
				});
				
				listingModeToggle();
			
				// Init All Carousel			
				productCarousel($j('#megaMenuCarousel1'),1,1,1,1,1);
				verticalCarousel($j('.vertical-carousel-1'),2);
				verticalCarousel($j('.vertical-carousel-2'),2);
			
			})
		</script>
	</body>


</html>