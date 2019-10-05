<?php require "../includes/ini.php";

$id=m_fill("id",$_REQUEST)?>
        <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
        <html xmlns="http://www.w3.org/1999/xhtml">
        <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="description" content="">
        <meta name="KEYWORDS" CONTENT="">
        <meta http-equiv="Cache-Control" content="no-cache" />
        <meta http-equiv="Expires" content="0" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/base.css"/>
	<link rel="stylesheet" href="../css/skeleton.css"/>
	<link rel="stylesheet" href="../css/layout.css"/>
	<link rel="stylesheet" href="../css/settings.css"/>
	<link rel="stylesheet" href="../css/font-awesome.css" />
	<link rel="stylesheet" href="../css/owl.carousel.css"/>
	<link rel="stylesheet" href="../css/retina.css"/>
	<link rel="stylesheet" href="../css/colorbox.css"/>
	<link rel="stylesheet" href="../css/animsition.min.css"/>
    <link rel="stylesheet" href="../styles/fancybox.css"/>
        <link rel="stylesheet" type="text/css" media="all" href="../styles/admin.css" />
		<link rel="stylesheet" type="text/css" media="print" href="../styles/adminprint.css" />
        <link rel="stylesheet" type="text/css" media="all" href="../styles/jquery_ui_datepicker.css" />
        <link rel="stylesheet" type="text/css" media="all" href="../styles/jquery_ui_theme.css" />
        <link type="text/css" href="../styles/fancybox.css" rel="stylesheet"  />
        
        <script type="text/javascript" src="../js/jquery.js"></script>
        <script type="text/javascript" src="../js/jquery_ui_core.js"></script>
        <script type="text/javascript" src="../js/jquery_ui_widget.js"></script>
        <script type="text/javascript" src="../js/jquery_ui_datepicker.js"></script>
        <script type="text/javascript" src="../js/jeasing.js"></script>
        <script type="text/javascript" src="../js/jwplayer.js"></script>
        
        <script type="text/javascript" src="../js/functions.js"></script>
        <script type="text/javascript" src="../js/startup_website.js"></script>
        <script type="text/javascript">

$(document).ready(function(){

	
	$("a.inline").fancybox({ //for the video
		'hideOnContentClick': true,
		'autoScale'     	: false
	});
	
	$("a.iframe").fancybox({ //for the send to a friend
		'hideOnContentClick': true,
		'type': 'iframe',
		'width'				: '30%',
		'height'			: '70%',
        'autoScale'     	: false
	});
	
	$('#datee').datepicker({
		   dateFormat:'yy-mm-dd',
		//minDate:'0',
		 showAnim:'fadeIn',
		autoSize: true
		});
	
});

</script>
<style>
body {padding:20px}
td {padding:5px}
</style>
        </head>
        
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
                   
                   
                   
                    
                   <table class="detailstd" cellpadding="0" cellspacing="0"  style="text-align:centerborder-collapse:collapse;width:100%">
         <tr class="detailtr">
           <td width="21%" style="text-align:center;background-color:#1a3282;color:#fff;border:1px solid #cccccc;padding:10px"><strong>Image</strong></td>
           <td width="21%" style="text-align:center;background-color:#1a3282;color:#fff;border:1px solid #cccccc;padding:10px"><strong>Category</strong></td>
           <td width="32%" style="text-align:center;background-color:#1a3282;color:#fff;border:1px solid #cccccc;padding:10px"><strong>Item</strong></td>
           <td width="7%" style="text-align:center;background-color:#1a3282;color:#fff;border:1px solid #cccccc;padding:10px"><strong>Qty</strong></td>
           <td width="10%" style="text-align:center;background-color:#1a3282;color:#fff;border:1px solid #cccccc;padding:10px"><strong>Unit Price</strong></td>
           <td width="10%" style="text-align:center;background-color:#1a3282;color:#fff;border:1px solid #cccccc;padding:10px"><strong>Product Status</strong></td>
         </tr>
         <?php $countt="0";
		       $subtotal="0";?>
         <?php 
		 $h=$con->query("select * from orderitems left join projects on projectsid=oidproject left join supplier on supplierid=pidsupplier where idorders='".m_prepare($id)."'");
		 if($con->num_rows($h)!=''){
			 while($hh=$con->fetch_array($h)){
				 $pricee=$hh['oprice'];
                  $hh['image']=colorimage($hh['projectsid'],$hh['ocolor']);?>
         <tr style='background-color:#dde2e6'>
         <td style="border:1px solid #cccccc;text-align:center"><?php if($hh['image']!=''){?><a href=".<?php echo $hh['image']?>" rel="cart" class="inline"><img src="<?php echo $hh['image']?>" alt='<?php echo str_replace("'",'`',$hh['ptitle'])?>' style="width:50%"></a><?php }?></td>
           <td style="border:1px solid #cccccc;text-align:center"><?php echo $hh['sname']?></td>
           <td style="border:1px solid #cccccc;text-align:center"><a target=_blank href="product?id=<?php echo $hh['projectsid']?>"><?php echo $hh['ptitle']?></a>
           <?php if($hh['ocolor']!=''){?><div>Color: <?php echo $hh['ocolor']?></div><?php }?>
           <?php if($hh['osize']!=''){?><div>Size: <?php echo $hh['osize']?></div><?php }?></td>
           <td style="border:1px solid #cccccc;text-align:center"><?php echo $hh['oquantity']?></td>
           <td style="border:1px solid #cccccc" align="right"><?php echo convert($pricee, $_SESSION['hj_language'],'en')?></td>
           
           <?php if($gg['sstatus']=='Delivered'){

            if($hh['returnstatus']!=''){?>
            
               <td style=";border:1px solid #cccccc;text-align:center"><?php echo $hh['returnstatus']?></td>
            <?php }else{

            if($days<=15){?>
           <td style=";border:1px solid #cccccc;text-align:center"><a href="returnorderproduct.php?id=<?php echo $hh['orderitemsid']?>&type=after">Return Request</td>
           <?php }else{?>
           <td style=";border:1px solid #cccccc;text-align:center">Product cannot be returned, 15 days have passed</td>
           <?php }?>
           <?php }?>
           
           <?php }elseif($gg['spaymethod']=='Cash' && ($gg['sstatus']=='Pending' || $gg['sstatus']=='Cancel Processing' || $gg['sstatus']=='Return Processing' || $gg['sstatus']=='Return Accepted' || $gg['sstatus']=='Return Unaccepted' )){
            
            if($hh['returnstatus']!=''){?>
            <td style=";border:1px solid #cccccc;text-align:center"><?php echo $hh['returnstatus']?></td>
            <?php }else{?>

           <td style=";border:1px solid #cccccc;text-align:center"><a href="returnorderproduct.php?id=<?php echo $hh['orderitemsid']?>&type=before">Cancel Product</td>
           <?php }?>
           <?php }else{?>
           
           <td style=";border:1px solid #cccccc;text-align:center">
              <?php if($hh['returnstatus']!=''){
                $returnstatus=($hh['returnstatus']);
           echo $returnstatus;
           } ?>
           </td>
           <?php }?>
         </tr>
         <?php $subtotal=$subtotal+($hh['oquantity']*$pricee);
		  $countt++;
		  }?>
          
         <tr style='background-color:#b9babe'>
           <td colspan='5' align='right'>Items Total (VAT Included) </td>
		   <td align='right'><?php echo convert($subtotal, $_SESSION['hj_language'],'en')?></td>
		   </tr>
		   <tr style='background-color:#dde2e6'>
           <td colspan='5' align='right'>Delivery Charge (VAT Included)</td>
		   <td align='right'><?php echo convert($gg['sshippingprice'], $_SESSION['hj_language'],'en')?></td>
		   </tr>
           <?php if($gg['idvoucher']!=''){?>
           <tr style='background-color:#dde2e6'>
           <td colspan='5' align='right'>Voucher Discount</td>
		   <td align='right'> <?php echo $gg['voucherdiscount']?> <?php if($gg['voucherfixed']=='0'){?>%<?php }else{?>Riyals<?php }?> </td>
		   </tr>
           <?php }?>
           <?php if($gg['spaymethod']=='Cash'){?>
           <tr style='background-color:#dde2e6'>
           <td colspan='5' align='right'>Cash on Delivery (VAT Included) </td>
		   <td align='right'><?php echo convert($gg['cashextra'], $_SESSION['hj_language'],'en')?> </td>
		   </tr>
           <?php }?>
           
		   <tr style='background-color:#f1aecf'>
           <td colspan='5' align='right'>Net Total</td>
		   <td align='right'>
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
           <?php echo convert($total, $_SESSION['hj_language'],'en')?></td>
		   </tr>
           <tr style='background-color:#dde2e6'>
           <td colspan='5' align='right'>Total VAT Paid </td>
		   <td align='right'><?php echo convert($gg['stotal']-($gg['stotal']/1.05), $_SESSION['hj_language'],'en')?></td>
		   </tr>
          
          
        <?php }else{?>
         <tr>
           <td colspan="4" style="text-align:center">No Items Found</td>
         </tr>
        <?php }?>
        </table>
                  </td>
          </tr>
        </table>
        
        
       
        
         <h3 style="text-align:left">Payment Method</h3>
        <?php echo $gg['spaymethod']?><br /><br />
        
        <h3 style="text-align:left">Delivery Address</h3>
        <table>
          <tr>
           <td>City: </td>
           <td><?php echo $gg['scity']?></td>
          </tr>
          <tr>
           <td>Country: </td>
           <td><?php echo $gg['scountry']?></td>
          </tr>
           <tr>
           <td>Address: </td>
           <td><?php echo $gg['saddress']?></td>
          </tr>
          
          <tr>
           <td>Mobile: </td>
           <td><?php echo $gg['smobile']?></td>
          </tr>
          <tr>
           <td>Comments & Preferred Delivery time: </td>
           <td><?php if($gg['sadditional']!=''){
			   echo nl2br($gg['sadditional']);
		   }else{
			   echo nl2br($gg['additional']);
		   }?></td>
          </tr>
        </table>
        <br /><br />
        <h3 style="text-align:left">User Information</h3>
        <table>
          <tr>
           <td>Name: </td>
           <td><?php echo $gg['fname']?> <?php echo $gg['lname']?></td>
          </tr>
          <tr>
           <td>Email: </td>
           <td><?php echo $gg['email']?></td>
          </tr>
          <tr>
           <td>City: </td>
           <td><?php echo $gg['city']?></td>
          </tr>
          <tr>
           <td>Country: </td>
           <td><?php echo $gg['country']?></td>
          </tr>
          <tr>
           <td>Address: </td>
           <td><?php echo $gg['address']?></td>
          </tr>
          
          <tr>
           <td>Mobile: </td>
           <td><?php echo $gg['mobile']?></td>
          </tr>
          <tr>
           <td>Additional Information: </td>
           <td><?php echo nl2br($gg['additional'])?></td>
          </tr>
        </table>
        </body>
        </html>
        