<?php include "../includes/ini.php"?>
<?php $pagetitle1="morderhistory";
$pagetitle="Order Information";
if(!isset($_SESSION['hj_id'])){
	echo changelocation("signlog");
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
                
                <div class="">
                
                <form name="form2" method="post">
        <input type="hidden" name="delete" value="1">
        <div  class="tablescroller">
        <table style="text-align:centerborder-collapse:collapse;width:100%">
         <tr>
           <td width="14%" style="text-align:center;background-color:#1a3282;color:#fff;border:1px solid #cccccc;padding:10px"><strong>Order Number</strong></td>
           <td width="8%" style="text-align:center;background-color:#1a3282;color:#fff;border:1px solid #cccccc;padding:10px"><strong>Price</strong></td>
           <td width="14%" style="text-align:center;background-color:#1a3282;color:#fff;border:1px solid #cccccc;padding:10px"><strong>Date</strong></td>
           <td width="15%" style="text-align:center;background-color:#1a3282;color:#fff;border:1px solid #cccccc;padding:10px"><strong>Payment Method</strong></td>
           <!--<td width="10%" style="text-align:center;background-color:#1a3282;color:#fff;border:1px solid #cccccc;padding:10px"><strong>Paid</strong></td>-->
           <td width="10%" style="text-align:center;background-color:#1a3282;color:#fff;border:1px solid #cccccc;padding:10px"><strong>Status</strong></td>
           <td width="10%" style="text-align:center;background-color:#1a3282;color:#fff;border:1px solid #cccccc;padding:10px"><strong>Cancel Order</strong></td>
           <td width="14%" style="text-align:center;background-color:#1a3282;color:#fff;border:1px solid #cccccc;padding:10px"><strong>Details</strong></td>
           <td width="14%" style="text-align:center;background-color:#1a3282;color:#fff;border:1px solid #cccccc;padding:10px"><strong>Track Order</strong></td>
         </tr>
        
         <?php  $or=$con->query("select * from orders where oiduser='".$_SESSION['hj_id']."' and deleted='0' and spaid='Yes' order by orders_created desc");
		 if($con->num_rows($or)!=0){
			 while($orr=$con->fetch_array($or)){?>
         <tr>
           <td nowrap="nowrap" style="border:1px solid #cccccc;padding:5px;text-align:center"><?php echo $orr['ordersid']?><br />(<?php echo $orr['invoicenumber']?>)</td></td>
           <td nowrap="nowrap" style="border:1px solid #cccccc;padding:5px;text-align:center"><?php echo convert($orr['stotal'], $_SESSION['hj_language'],'en')?></td>
           <td nowrap="nowrap" style="border:1px solid #cccccc;padding:5px;text-align:center"><?php echo formatdate($orr['orders_created'],'d M Y')?></td>
           <td nowrap="nowrap" style="border:1px solid #cccccc;padding:5px;text-align:center"><?php echo $orr['spaymethod']?></td>
           <td nowrap="nowrap" style="display:none;border:1px solid #cccccc;padding:5px;text-align:center">
            <?php if($orr['spaid']=='No' && $orr['spaymethod']!='Cash'){
				if($orr['spaymethod']=='Credit Card'){
					$c='2';
				}else{
					$c='1';
				}?>
           <!-- <a style="text-decoration:underline" title="Continue to payment gateway" href="?pay=1&c=<?php echo $c?>&orderid=<?php echo $orr['ordersid']?>"><?php echo $orr['spaid']?>, Reapply</a>-->
       		   <?php echo $orr['spaid']?>
            <?php }else{?>
		   <?php echo $orr['spaid']?>
           <?php }?></td>
           <td nowrap="nowrap" style="border:1px solid #cccccc;padding:5px;text-align:center">
           <?php echo $orr['sstatus']?>
           </td>
           <?php $canceltype='';
           if($orr['spaymethod']=='Cash' && $orr['sstatus']=='Pending'){
            $canceltype="before";
            }
            
                if(($canceltype!='')){?>
           <td  nowrap="nowrap" style="border:1px solid #cccccc;text-align:center"><a href="cancelorder.php?type=<?php echo $canceltype?>&id=<?php echo $orr['ordersid']?>" class="iframe2">Cancel Order</a></td>
           <?php }else{?>
           <td  nowrap="nowrap" style="border:1px solid #cccccc;text-align:center">-</td>
           <?php }?>
           <td nowrap="nowrap" style="border:1px solid #cccccc;text-align:center"><a href="detail.php?id=<?php echo $orr['ordersid']?>" class="iframe">Details</a></td>
           <td nowrap="nowrap" style="border:1px solid #cccccc;text-align:center">
           <?php if($orr['awbnumber']!=''){
             if($orr['sshipping']=='ARAMEX'){?>
           <a href="https://www.aramex.com/express/track_results_multiple.aspx?ShipmentNumber=<?php echo $orr['awbnumber']?>" target=_blank>Track</a></td>
           <?php }
           }?>
           
         </tr>
         <?php
		  }?>
        <?php }else{?>
         <tr>
           <td colspan="7" style="text-align:center">No Items Found</td>
         </tr>
        <?php }?>
        </table>
        </div>
        </form>
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
				
				
										
										 $j("a.iframe").fancybox({ //for the send to a friend
								'hideOnContentClick': true,
								'type': 'iframe',
								'padding': '0',
								'maxWidth'				: '100%',
								'minWidth'				: '100%',
								'maxHeight'			: 520,
								'autoScale'     	: false
							});
                            
                            $j("a.iframe2").fancybox({ //for the send to a friend
								'hideOnContentClick': true,
								'type': 'iframe',
								'padding': '0',
								'maxWidth'				: 500,
								'minWidth'				: 200,
								'maxHeight'			: 520,
								'autoScale'     	: false
							});
	
			
				// popup ini			
				$j('.quick-view').magnificPopup({
					type: 'ajax'
				});
			
				// Init All Carousel			
			
				productCarousel($j('#megaMenuCarousel1'),1,1,1,1,1);
				blogCarousel($j('.slider-blog'),1,1,1,1,1);
				
				
		
			 })
		</script>
	</body>


</html>