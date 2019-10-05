<?php include "../includes/ini.php"?>
<?php $pagetitle1="mcheckout";
$pagetitle="Checkout";
?>
<?php checkofferdate();?>
<?php syncbasket(session_id());
?>
<!DOCTYPE html>
<html>
	

<head>
		<!-- Basic -->
		<meta charset="utf-8">
		<title><?php echo $titl?> | <?php echo $pagetitle?></title>
		<meta name="keywords" content="" />
		<meta name="description" content="<?php echo $titl?>">
        
        <?php 
        
        if(($_SESSION['sshipping']=='ARAMEX') || $_SESSION['sshipping']=='ARAMEX (Delivery to all regions of the Kingdom)'){
                          $m_config['cashextra']=$m_config['cashextraaramex'];
                 }
                 
                 if($_SESSION['sshipping']=='Jawhara (Inside Al Ahsa)'){
                            $m_config['cashextra']=$m_config['cashextra'];
                 }

unset($_SESSION['idvoucher']);
unset($_SESSION['voucherdiscount']);
unset($_SESSION['discounthj']);

if(!isset($_SESSION['scity'])){
	echo changelocation("address.php");
}



if(!isset($_SESSION['hj_id'])){
	echo changelocation("cart");
}


			if(@$_SESSION['subtotal']<"10"){
				echo changelocation("cart.php?status=check");
				$msg="<font class='itsnotok'>Total Product must not be less than 10</font>";
			}else{
				//echo changelocation("signlog.php");
			}
		
		
		//apply voucher
if(isset($_POST['vouchersend'])){
	$d=$con->query("select * from vouchers where deleted='0' and vactive='Yes' and vdate>='".date("Y-m-d")."' and vname='".m_prepare($_POST['voucher'])."'");
	if($con->num_rows($d)==0){
		$msgv="Voucher does not apply on the selected products";
	}else{
		//check if the user has already used it or not
		$dd=$con->fetch_array($d);
        
        $totaldiscount=0;
		
		if($dd['voucherunlimited']=='1'){
			 foreach($bas->get_cart() as $a=>$b){
				 $aa=explode(":::",$a);
				 $cc=$con->getcertainvalue("select * from projects left join category on categoryid=idcategory left join supplier on supplierid=idsupplier where projectsid='".$aa[0]."'",array("pfreeshipping"=>"pfreeshipping","projects_created"=>"projects_created","projects_modified"=>"projects_modified","psize"=>"psize","prodbrand"=>"prodbrand","bname"=>"bname","projectsid"=>"projectsid","image"=>"image","ptitle"=>"ptitle","pprice"=>"pprice","pspecialprice"=>"pspecialprice","bname"=>"bname","sname"=>"sname"));
                 $discount=voucherexists($cc['projectsid'],$dd['vouchersid'],$b,$con->getcertainvalue("select * from colors where colorname='".@$aa[1]."'","colorsid"));
                 //$discount=$discount*$b;
                  $totaldiscount=$totaldiscount+($discount*$b);
                   if($discount!=0){
                    $_SESSION['discounthj'][$cc['projectsid']]=$discount;
                    }
                 }
                 
                  if($totaldiscount>$dd['vlimitall'] && $dd['vlimitall']!='0'){
                    $totaldiscount=$dd['vlimitall'];
                    }
                 
                 if($totaldiscount!=0){
                    
			 $_SESSION['idvoucher']=$dd['vouchersid'];
			$_SESSION['voucherdiscount']=$totaldiscount;
			$_SESSION['voucherfixed']="1";
            }else{
                $msgv="Voucher does not apply on the selected products";
                }
	     }else{
			$ifuserused=$con->getcertainvalue("select * from orders left join access on accessid=oiduser where orders.deleted='0' and spaid='Yes' and accessid='".$_SESSION['hj_id']."' and idvoucher='".$dd['vouchersid']."'",array("ordersid"=>"ordersid"));
			if(isset($ifuserused['ordersid']))		{
				$msgv="Voucher has been already used";
			}else{
			foreach($bas->get_cart() as $a=>$b){
				 $aa=explode(":::",$a);
				 $cc=$con->getcertainvalue("select * from projects left join category on categoryid=idcategory left join supplier on supplierid=idsupplier where projectsid='".$aa[0]."'",array("pfreeshipping"=>"pfreeshipping","projects_created"=>"projects_created","projects_modified"=>"projects_modified","psize"=>"psize","prodbrand"=>"prodbrand","bname"=>"bname","projectsid"=>"projectsid","image"=>"image","ptitle"=>"ptitle","pprice"=>"pprice","pspecialprice"=>"pspecialprice","bname"=>"bname","sname"=>"sname"));
                 $discount=voucherexists($cc['projectsid'],$dd['vouchersid'],$b,$con->getcertainvalue("select * from colors where colorname='".@$aa[1]."'","colorsid"));
                  $totaldiscount=$totaldiscount+($discount*$b);
                  if($discount!=0){
                    $_SESSION['discounthj'][$cc['projectsid']]=$discount;
                    }
                 }
                 
                  if($totaldiscount>$dd['vlimitall'] && $dd['vlimitall']!='0'){
                    $totaldiscount=$dd['vlimitall'];
                    }
                 
                 if($totaldiscount!=0){
                    
			 $_SESSION['idvoucher']=$dd['vouchersid'];
			$_SESSION['voucherdiscount']=$totaldiscount;
			$_SESSION['voucherfixed']="1";
            }else{
                $msgv="Voucher has been already used";
                }
			}
		 }
		
	}
}


?>
		
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
		<?php include "backer.php"?>
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
				<div>
               
                <div class="container">
                
                <form name="form2" method="post">
        <input type="hidden" name="delete" value="1">
        <div  class="tablescrollers">
        <table style="text-align:centerborder-collapse:collapse;width:100%">
         <tr>
           <td nowrap="nowrap" width="21%" class="smallmobile hideinmobile" style="text-align:center;background-color:#1a3282;color:#fff;border:1px solid #cccccc;padding:10px"><strong>Image</strong></td>
           <td nowrap="nowrap" width="32%" class="smallmobile" style="text-align:center;background-color:#1a3282;color:#fff;border:1px solid #cccccc;padding:10px"><strong>Item</strong></td>
           <td nowrap="nowrap" width="7%" class="smallmobile" style="text-align:center;background-color:#1a3282;color:#fff;border:1px solid #cccccc;padding:10px"><strong>Qty</strong></td>
           <td nowrap="nowrap" width="10%" class="smallmobile" style="text-align:center;background-color:#1a3282;color:#fff;border:1px solid #cccccc;padding:10px"><strong>Unit Price</strong></td>
         </tr>
         <?php $countt="0";
		       $subtotal="0";
               $freeship="1";?>
         <?php if($bas->get_cart()){
			 foreach($bas->get_cart() as $a=>$b){
				 $aa=explode(":::",$a);
				 $cc=$con->getcertainvalue("select * from projects left join category on categoryid=idcategory left join supplier on supplierid=idsupplier where projectsid='".$aa[0]."'",array("pcode"=>"pcode","idbrands"=>"idbrands","idsubcategory"=>"idsubcategory","idcategory"=>"idcategory","pidsupplier"=>"pidsupplier","pfreeshipping"=>"pfreeshipping","projects_created"=>"projects_created","projects_modified"=>"projects_modified","psize"=>"psize","prodbrand"=>"prodbrand","bname"=>"bname","projectsid"=>"projectsid","image"=>"image","ptitle"=>"ptitle","pprice"=>"pprice","pspecialprice"=>"pspecialprice","bname"=>"bname","sname"=>"sname"));
				 
				 if($cc['pfreeshipping']=='0'){
				     $freeship="0";
				    }
				 //special price or not
				
				 $pricee=$cc['pspecialprice'];
                 
                 //if it exists in the config list of categorys , disable max shipping price
                  $checkconfigfree=checkconfig($cc,$aa['1']);
                if($checkconfigfree=='1'){
                    $disablemaxfreeshipping='1';
                    }
                    
                 $cc['image']=colorimage($aa[0],$aa[1]);?>
         <tr>
           <td class="hideinmobile" nowrap="nowrap" style="border:1px solid #cccccc;padding:5px;text-align:center"><?php if($cc['image']!=''){?><a href="<?php echo $cc['image']?>" rel="cart" class="inline"><img src="<?php echo $cc['image']?>" alt='<?php echo str_replace("'",'`',$cc['ptitle'])?>' style="width:50%"></a><?php }?></td>
           <td style="border:1px solid #cccccc;padding:5px;text-align:center"><?php echo $cc['ptitle']?>
            <?php if(($aa[1]!='')){?><div style="font-size:12px">Color: <?php echo $aa[1]?></div><?php }?>
           <?php if(($aa[2]!='')){?><div style="font-size:12px">Size: <?php echo $aa[2]?></div><?php }?></td>
           <td nowrap="nowrap" style="border:1px solid #cccccc;padding:5px;text-align:center"><?php echo $b?></td>
           <td nowrap="nowrap" style="border:1px solid #cccccc;padding:5px;text-align:right"><?php echo convert($pricee, $_SESSION['hj_language'],'en')?></td>
         </tr>
         <?php $subtotal=$subtotal+($b*$pricee);
		  $countt++;
		  }?>
          
        <?php }else{
			echo changelocation("cart");
			exit();?>
         <tr>
           <td colspan="7" style="text-align:center">No Items Found</td>
         </tr>
        
         
        <?php }?>
         </table>
        </div>
         <script>
		 function dome(){
			if(confirm_me('Are you sure you want to delete?')){
				document.form2.submit()
			}
		 }
         </script>

        <?php 
		 
			
			
			//get customer data
			$cdata=$con->fetch_array($con->query("select * from access where accessid='".$_SESSION['hj_id']."'"));
			
			//get total order for customer
			$corderdata=$con->fetch_array($con->query("select *,count(*) as countt from orders where deleted='0' and oiduser='".$_SESSION['hj_id']."'"));
			if($corderdata['countt']==''){
				$corderdata['countt']=0;
			}
			
			//get total spent for customer
			$corderdata1=$con->fetch_array($con->query("select *,sum(stotal) as countt from orders where deleted='0' and oiduser='".$_SESSION['hj_id']."'"));
			if($corderdata1['countt']==''){
				$corderdata1['countt']=0;
			}
			
			
			
			
		
			
		?>

         <?php if($bas->get_cart()){?>
          <table style="width:100%" >
         <tr>
          <td style="padding-top:10px">
                   <table style="padding:0"  align="right" >         
          <tr>
           <td colspan="4" align="right">
             <table>
              <tr>
                <td>Items Total (VAT Included): </td>
                <td align="right"><?php echo convert($subtotal, $_SESSION['hj_language'],'en')?></td>
              </tr>
              <tr>
                <td>Delivery Charge (VAT Included) : </td>
                <?php
                $shippingprice="0";
               
                 if(($_SESSION['sshipping']=='ARAMEX') || $_SESSION['sshipping']=='ARAMEX (Delivery to all regions of the Kingdom)'){
                            $shippingprice=getcostfixed($_SESSION['scountry'],$_SESSION['scity'],$_SESSION['spostalcode']);
                            // $shippingprice=$shippingprice+(5*$shippingprice)/100;
                             
                 }
                //// echo $_SESSION['sshipping'];
                // echo $shippingprice;
                 
                 if($_SESSION['sshipping']=='Jawhara (Inside Al Ahsa)'){
                            $shippingprice=$m_config['hajershipping'];
                             
                 }
                 
                
                 
                 
                 
                 
                 
                if($m_config['freeshippingmax']!=0){
                    
                      if($subtotal>$m_config['freeshippingmax']){
                        
                       if(!isset($disablemaxfreeshipping)){
                        $shippingprice=0;
                        }
                        }
                    }
                    
                    if($freeship=='1'){
                         $shippingprice=0;
                        }?>
                <td align="right"><?php $_SESSION['shippingprice']=$shippingprice; echo convert($shippingprice, $_SESSION['hj_language'],'en')?></td>
              </tr>
              <tr class="codholder" style="display:none">
                <td>Cash on Delivery (VAT Included) : </td>
                <td align="right"><?php echo convert($m_config['cashextra'], $_SESSION['hj_language'],'en')?></td>
              </tr>
               <?php if(isset($_SESSION['voucherdiscount'])){?>
               <tr>
                <td>Discount: </td>
                <td align="right"><?php echo convert($_SESSION['voucherdiscount'], $_SESSION['hj_language'],'en')?> </td>
              </tr>
              <?php }?>
              
              <?php $total=$_SESSION['sgiftprice']+$subtotal;
				 if(isset($_SESSION['voucherdiscount'])){
					if($_SESSION['voucherfixed']=='0'){
					$total=$total-($_SESSION['voucherdiscount']*$total)/100;
					}else{
						$total=$total-$_SESSION['voucherdiscount'];
					}
					
					
				
					
					
					              
				}
                
                	$total=$total+$shippingprice;

                
               
                
                $_SESSION['svat']=(5*$total)/100;
                   // $total=$total+(5*$total)/100    ;  
				
				if($total<0){
						$total=0;
					}?>
                    
                   
              <tr>
               <td colspan="2"><hr size="1" style="color:#cccccc;width:100%;padding:0;margin:0"></td>
              </tr>
              <tr>
                <td>Net Total:</td>
                <td align="right">
                
				<div id="thetotal" thevalue="<?php echo $total?>"><?php echo convert($total, $_SESSION['hj_language'],'en')?></div></td>
              </tr>
               <tr>
                <td>Total VAT Paid : </td>
                <td id="thetotalvat" thevalue="<?php echo ($total-($total/1.05))?>" align="right"><?php echo convert($total-($total/1.05), $_SESSION['hj_language'],'en')?> </td>
              </tr>
              </table>
             
           <br /><br />
           
           
           </td>
         </tr>
          </table>
        </td>
        </tr>
        </table>
         <?php }?>
         
        
        <?php if(!isset($_SESSION['idvoucher'])){?>
        <div> 
        <h3>Do you have a promo code?<br>Enter it here</h3>
        <form name="formv" method="post" action="checkout" onSubmit="">
        <input type="hidden" name="vouchersend" value="1">
         <?php if(isset($msgv)){?>
           <div class="itsnotok"><?php echo $msgv?></div>
         <?php }?>
         <div style="display:inline-block;margin-bottom:10px"><input type="text" name="voucher"  id="voucher" ></div>
               
        
         <div style="display:inline-block;margin-bottom:10px"><input type="submit" value="Apply" id="submitorder1"  class="butt"  style="width:200px" /></div>
        
        </form>
        </div><br><br>
        <?php }?>
       
         
       
        
        
        <input type="hidden" name="countt" value="<?php echo $countt?>" />
        </form>
        <h3>Payment Methods</h3>
        <?php if($m_config['cash']=='1'){$cc=4;?>	 <input type="radio" name="ceecee" id="payment4" onClick="$j('#cc').val('4');cod(<?php echo $m_config['cashextra']?>,'add')" checked="checked" > <label for="payment4">Cash on Delivery will be added (<?php echo convert($m_config['cashextra'], $_SESSION['hj_language'],'en')?>) to the total</label></a>
        <br><?php }?>
       <?php if($m_config['visa']=='1'){ $cc=1;?>	<input type="radio" name="ceecee" id="payment1" onClick="$j('#cc').val('1');cod(<?php echo $m_config['cashextra']?>,'remove')" checked="checked"> <label for="payment1">Visa</label></a>
        <br><?php }?>
         <?php if($m_config['visa']=='1'){ $cc=2;?>	<input type="radio" name="ceecee" id="payment2" onClick="$j('#cc').val('2');cod(<?php echo $m_config['cashextra']?>,'remove')" checked="checked"> <label for="payment1">Mastercard</label></a>
        <br><?php }?>
         <?php if($m_config['sadad']=='1'){$cc=3;?>	<input type="radio" name="ceecee" id="payment3" onClick="$j('#cc').val('3');cod(<?php echo $m_config['cashextra']?>,'remove')" checked="checked"> <label for="payment3">Sadad</label></a>
        <br><?php }?>
         <?php if($m_config['mada']=='1'){$cc=5;?>	<input type="radio" name="ceecee" id="payment5" onClick="$j('#cc').val('5');cod(<?php echo $m_config['cashextra']?>,'remove')" checked="checked"> <label for="payment5">Mada - Best & Fastest Payment Choice </label></a>
        <br><?php }?>
        
        <div>(There are no fees for online payment) </div>
       
       <?php if($total>0){?>   
        <?php }?>
        
        <form name="form2" method="post" action="order" onSubmit="showpopp();$j('#submitorder').attr('disabled', true)">
        <input type="hidden" name="register" value="1">
        <input type="hidden" name="cc" id="cc" value="<?php echo $cc?>">
         
         <br>        
               
        
        <div style="display:inline-block;margin-bottom:10px"> <input type="submit" value="I Confirm My Order" id="submitorder"   class="butt"  style="width:200px" /></div>
         <div style="display:inline-block;margin-bottom:10px"> <input type="button" value="Back" id="" onClick="window.location='address.php'" class="butt pageshower"  style="width:200px" /></div>
        
        </form>
        
        
        
      
              
       
      
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
        function cod(val,type){
            
            if(type=='remove'){
                $j('.codholder').hide()
                $j('#thetotal').html((parseFloat($j('#thetotal').attr("thevalue"))).toFixed(2))
                $j('#thetotalvat').html((parseFloat($j('#thetotalvat').attr("thevalue"))).toFixed(2))
                }
                if(type=='add'){
                    $j('.codholder').show()
                $j('#thetotal').html((parseFloat($j('#thetotal').attr("thevalue"))+parseFloat(val)).toFixed(2))
                
                thetot=parseFloat($j('#thetotal').attr("thevalue"))+parseFloat(val)
                $j('#thetotalvat').html((thetot-(thetot)/1.05).toFixed(2))
                }
            }
			$j(document).ready(function() {
			
				// popup ini			
				$j('.quick-view').magnificPopup({
					type: 'ajax'
				});
			
				// Init All Carousel			
			
				productCarousel($j('#megaMenuCarousel1'),1,1,1,1,1);
				blogCarousel($j('.slider-blog'),1,1,1,1,1);
				
				
		
			 })
			
			function showpopp(){
			$j.fancybox(
					'<div style="color:#000000;text-align:justify;padding:10px;"><div style="text-align:center">Your order is being processed\
					<div style="color:red">Please do not close the browser, do not refresh<br> or press \'back\'</div>\
					<div style="margin-top:10px"><img src="../images/loading.gif"></div>\
					</div></div>',
					{
							'autoSize'	: false,
						'maxWidth'         		: 400,
						'height'        		: 'auto',
						
						'transitionIn'		: 'none',
						'transitionOut'		: 'none',
						'closeBtn':false,
						 'closeClick': false,
						keys : {
							close  : null
						  },
						helpers: {
							overlay: { 'closeClick': false,'locked': false }
					  }
					}
				);
			         
		}
		</script>
	</body>


</html>