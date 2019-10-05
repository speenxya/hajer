<?php include "../includes/ini.php"?>
<?php $pagetitle1="mdetail";
$pagetitle="تفاصيل الطلب";
$id=m_fill("id",$_REQUEST)?>
<?php syncbasket(session_id());?>
<!DOCTYPE html>
<html>
	

<head>
		<!-- Basic -->
		<meta charset="utf-8">
		<title><?php echo $titlar?> | <?php echo $pagetitle?></title>
		<meta name="keywords" content="" />
		<meta name="description" content="<?php echo $titlar?>">
        
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
		<link rel="stylesheet" href="../css/style-layout11ar.css">
		<!-- Icon Fonts  -->
		<link rel="stylesheet" href="../font/style.css">
<link rel="stylesheet" href="../styles/fancybox.css">
<link type="text/css" href="../styles/notificationar.css" rel="stylesheet"  />
		<!-- Head Libs -->
		<!-- Modernizr -->
		<script src="../external/modernizr/modernizr.js"></script>
	</head>
	<body class="index">
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
        		
			<!-- parallax-img -->
			
			<!-- /parallax-img -->
			<!--  -->
			<section class="content">
				<div class="container">
                <h1><?php echo $pagetitle?></h1>
                   <div>
                  <table style="width:100%;height:100%">
         <tr>
                <td style="vertical-align:top">
                   <?php $g=$con->query("select * from orders left join access on oiduser=accessid where ordersid='".m_prepare($id)."'");
				   $gg=$con->fetch_array($g);
                   
                    $now = time(); // or your date as well
$your_date = strtotime($gg['orders_modified']);
$datediff = $now - $your_date;

$days= round($datediff / (60 * 60 * 24));
				   ?>
                   
                   
                   <table class="detailstd" style="margin:0px;text-align:centerborder-collapse:collapse;width:100%" cellpadding="10" cellspacing="10">
         
         <?php $countt="0";
		       $subtotal="0";?>
         <?php 
		 $h=$con->query("select * from orderitems left join projects on projectsid=oidproject left join supplier on supplierid=pidsupplier where idorders='".m_prepare($id)."'");
		 if($con->num_rows($h)!=''){
			 while($hh=$con->fetch_array($h)){
				 $pricee=$hh['oprice'];
                 $hh['image']=colorimage($hh['projectsid'],$hh['ocolor']);?>
         <tr style='background-color:#dde2e6'>
           <td  style="WIDTH:100px;border:1px solid #cccccc;text-align:right"><?php if($hh['image']!=''){?><a href="<?php echo $hh['image']?>" rel="cart" class="inline"><img src="<?php echo $hh['image']?>" alt='<?php echo str_replace("'",'`',$hh['ptitle'])?>' style="width:50%"></a><?php }?></td>
           <td  style="padding-bottom:10px;border:1px solid #cccccc;text-align:right"><?php echo $hh['snamear']?>
           <div>
           <a target=_blank href="product?id=<?php echo $hh['projectsid']?>"><?php echo $hh['ptitlear']?></a>
           <?php if($hh['ocolor']!=''){?><div>اللون: <?php echo $con->getcertainvalue("select * from colors where colorname='".$hh['ocolor']."'","colornamear")?></div><?php }?>
           <?php if($hh['osize']!=''){?><div>الحجم: <?php echo $con->getcertainvalue("select * from sizes where sizesname='".$hh['osize']."'","sizesnamear")?></div><?php }?>
           </div>
           <div><?php echo $hh['oquantity']?></div>
           <div>
           <?php if($gg['sstatus']=='Delivered'){
            
            if($hh['returnstatus']!=''){?>
               
               <?php $returnstatus=getarabicstatus($hh['returnstatus']);
           echo $returnstatus?>

             
              
            <?php }else{
                
            if($days<=15){?>
           <a class="butt" style="padding:2px 10px" href="returnorderproduct.php?id=<?php echo $hh['orderitemsid']?>&type=after">طلب الإرجاع</a>
           <?php }else{?>
           لا يمكن إرجاع المنتج ، لقد مر 15 يومًا</td>
           <?php }?>
           <?php }?>
           <?php }elseif($gg['spaymethod']=='Cash' && ($gg['sstatus']=='Pending'  || $gg['sstatus']=='Cancel Processing' || $gg['sstatus']=='Return Processing' || $gg['sstatus']=='Return Accepted' || $gg['sstatus']=='Return Unaccepted' )){
            
            if($hh['returnstatus']!=''){?>
               

                <?php $returnstatus=getarabicstatus($hh['returnstatus']);
           echo $returnstatus?>
                
                <?php }else{?>
           <a class="butt" style="padding:2px 10px" href="returnorderproduct.php?id=<?php echo $hh['orderitemsid']?>&type=before">الغاء المنتج</a>
           <?php }
           }else{?>
           
              <?php if($hh['returnstatus']!=''){
                $returnstatus=getarabicstatus($hh['returnstatus']);
           echo $returnstatus;
           } ?>
           
           <?php }?>
           </div>
           
          </div>
           
         </tr>
        
         <?php $subtotal=$subtotal+($hh['oquantity']*$pricee);
		  $countt++;
		  }?>
           </table>
          <table width="100%" cellpadding="10" cellspacing="10">
         <tr style='background-color:#b9babe'>
           <td colspan='2' align='left'>مجموع سعر السلع (شامل الضريبة) </td>
		   <td align='left'><?php echo convert($subtotal, $_SESSION['hj_language'],'ar')?></td>
		   </tr>
		   <tr style='background-color:#dde2e6'>
           <td colspan='2' align='left'>رسوم التوصيل ( شامل الضريبة ) </td>
		   <td align='left'><?php echo convert($gg['sshippingprice'], $_SESSION['hj_language'],'ar')?></td>
		   </tr>
           <?php if($gg['idvoucher']!=''){?>
           <tr style='background-color:#dde2e6'>
           <td colspan='2' align='left'> خصم</td>
		   <td align='left'> <?php echo $gg['voucherdiscount']?> <?php if($gg['voucherfixed']=='0'){?>%<?php }else{?>ريال<?php }?> </td>
		   </tr>
           <?php }?>
           <?php if($gg['spaymethod']=='Cash'){?>
           <tr style='background-color:#dde2e6'>
           <td colspan='2' align='left'> رسوم الدفع عند الاستلام (شامل الضريبة) </td>
		   <td align='left'><?php echo convert($gg['cashextra'], $_SESSION['hj_language'],'ar')?> </td>
		   </tr>
           <?php }?>
           
		   <tr style='background-color:#f1aecf'>
           <td colspan='2' align='left'>المجموع  الاجمالي </td>
		   <td align='left'>
           <?php $total=$gg['sgiftprice']+$subtotal;
		   if($gg['idvoucher']!=''){
					if($gg['voucherfixed']=='0'){
					$total=$total-($gg['voucherdiscount']*$total)/100;
					}else{
						$total=$total-$gg['voucherdiscount'];
					}
					
				}
                
                	$total=$total+$gg['sshippingprice'];
                    
                    if($gg['spaymethod']=='Cash'){
                    $total=$total+$gg['cashextra'];
                    }
				if($total<0){
					$total=0;
				}?>
           <?php echo convert($total, $_SESSION['hj_language'],'ar')?></td>
		   </tr>
           <tr style='background-color:#dde2e6'>
           <td colspan='2' align='left'>مجموع الضريبة المدفوعة </td>
		   <td align='left'><?php echo convert($gg['stotal']-($gg['stotal']/1.05), $_SESSION['hj_language'],'ar')?></td>
		   </tr>
          
          
        <?php }else{?>
         <tr>
           <td colspan="4" style="text-align:center">لم يتم العثور على منتجات</td>
         </tr>
        <?php }?>
        </table>
                  </td>
          </tr>
        </table>
                  



                   </div>
                
                </div>
                <div class="bottommargin">&nbsp;</div>
			</section>
			
			<div style="text-align:center;margin-top:20px"><a href="orderhistory.php">[الرجوع]</a></div>
				
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
				$j('.quick-view').magnificPopup({
					type: 'ajax'
				});
			
				// Init All Carousel			
			
				productCarousel($j('#megaMenuCarousel1'),1,1,1,1,1);
				blogCarousel($j('.slider-blog'),1,1,1,1,1);
				
				
		
			 })
			
			function changequan(typ,coun){
	valu=$j('#quan'+coun+'').val()
	if(typ=="-"){
		 valu--;
		 if(valu<=1){
			 valu=1;
		 }
		 $j('#quan'+coun+'_1').html(valu)
		 $j('#quan'+coun+'').val(valu)
	}else{
		 valu++;
		 if(valu>20){
			 valu=20;
		 }
		 $j('#quan'+coun+'_1').html(valu)
		 $j('#quan'+coun+'').val(valu)
	}
}
		</script>
	</body>


</html>