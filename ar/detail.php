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
        <link rel="stylesheet" href="../css/style-layout11ar.css">
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
                   
                   
                   <table class="detailstd" style="text-align:centerborder-collapse:collapse;width:100%">
         <tr class="detailtr">
           <td width="21%" style="text-align:center;background-color:#1a3282;color:#fff;border:1px solid #cccccc;padding:10px"><strong>الصورة</strong></td>
           <td width="21%" style="text-align:center;background-color:#1a3282;color:#fff;border:1px solid #cccccc;padding:10px"><strong>الفئة</strong></td>
           <td width="32%" style="text-align:center;background-color:#1a3282;color:#fff;border:1px solid #cccccc;padding:10px"><strong>المنتج</strong></td>
           <td width="7%" style="text-align:center;background-color:#1a3282;color:#fff;border:1px solid #cccccc;padding:10px"><strong>الكمية</strong></td>
           <td width="10%" style="text-align:center;background-color:#1a3282;color:#fff;border:1px solid #cccccc;padding:10px"><strong>السعر</strong></td>
           <td width="10%" style="text-align:center;background-color:#1a3282;color:#fff;border:1px solid #cccccc;padding:10px"><strong>حالة السلعة</strong></td>
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
           <td style="border:1px solid #cccccc;text-align:center"><?php if($hh['image']!=''){?><a href="<?php echo $hh['image']?>" rel="cart" class="inline"><img src="<?php echo $hh['image']?>" alt='<?php echo str_replace("'",'`',$hh['ptitle'])?>' style="width:50%"></a><?php }?></td>
           <td style="border:1px solid #cccccc;text-align:center"><?php echo $hh['snamear']?></td>
           <td style="border:1px solid #cccccc;text-align:center"><a target=_blank href="product?id=<?php echo $hh['projectsid']?>"><?php echo $hh['ptitlear']?></a>
           <?php if($hh['ocolor']!=''){?><div>اللون: <?php echo $con->getcertainvalue("select * from colors where colorname='".$hh['ocolor']."'","colornamear")?></div><?php }?>
           <?php if($hh['osize']!=''){?><div>الحجم: <?php echo $con->getcertainvalue("select * from sizes where sizesname='".$hh['osize']."'","sizesnamear")?></div><?php }?></td>
           <td style="border:1px solid #cccccc;text-align:center"><?php echo $hh['oquantity']?></td>
           <td style="border:1px solid #cccccc" align="left"><?php echo convert($pricee, $_SESSION['hj_language'],'ar')?></td>
           <?php if($gg['sstatus']=='Delivered'){
            
            if($hh['returnstatus']!=''){?>
               <td style=";border:1px solid #cccccc;text-align:center">

               <?php $returnstatus=getarabicstatus($hh['returnstatus']);
           echo $returnstatus?>

              </td>
              
            <?php }else{
                
            if($days<=15){?>
           <td style=";border:1px solid #cccccc;text-align:center"><a href="returnorderproduct.php?id=<?php echo $hh['orderitemsid']?>&type=after">طلب الإرجاع</td>
           <?php }else{?>
           <td style=";border:1px solid #cccccc;text-align:center">لا يمكن إرجاع المنتج ، لقد مر 15 يومًا</td>
           <?php }?>
           <?php }?>
           <?php }elseif($gg['spaymethod']=='Cash' && ($gg['sstatus']=='Pending'  || $gg['sstatus']=='Cancel Processing' || $gg['sstatus']=='Return Processing' || $gg['sstatus']=='Return Accepted' || $gg['sstatus']=='Return Unaccepted' )){
            
            if($hh['returnstatus']!=''){?>
               <td style=";border:1px solid #cccccc;text-align:center">

                <?php $returnstatus=getarabicstatus($hh['returnstatus']);
           echo $returnstatus?>
                </td>
                <?php }else{?>
           <td style=";border:1px solid #cccccc;text-align:center"><a href="returnorderproduct.php?id=<?php echo $hh['orderitemsid']?>&type=before">الغاء المنتج</td>
           <?php }
           }else{?>
           <td style=";border:1px solid #cccccc;text-align:center">
              <?php if($hh['returnstatus']!=''){
                $returnstatus=getarabicstatus($hh['returnstatus']);
           echo $returnstatus;
           } ?>
           </td>
           <?php }?>
         </tr>
         <?php $subtotal=$subtotal+($hh['oquantity']*$pricee);
		  $countt++;
		  }?>
          
         <tr style='background-color:#b9babe'>
           <td colspan='5' align='left'>مجموع سعر السلع (شامل الضريبة) </td>
		   <td align='left'><?php echo convert($subtotal, $_SESSION['hj_language'],'ar')?></td>
		   </tr>
		   <tr style='background-color:#dde2e6'>
           <td colspan='5' align='left'>رسوم التوصيل ( شامل الضريبة ) </td>
		   <td align='left'><?php echo convert($gg['sshippingprice'], $_SESSION['hj_language'],'ar')?></td>
		   </tr>
           <?php if($gg['idvoucher']!=''){?>
           <tr style='background-color:#dde2e6'>
           <td colspan='5' align='left'> خصم</td>
		   <td align='left'> <?php echo $gg['voucherdiscount']?>  <?php if($gg['voucherfixed']=='0'){?>%<?php }else{?>ريال<?php }?></td>
		   </tr>
           <?php }?>
           <?php if($gg['spaymethod']=='Cash'){?>
           <tr style='background-color:#dde2e6'>
           <td colspan='5' align='left'> رسوم الدفع عند الاستلام (شامل الضريبة) </td>
		   <td align='left'><?php echo convert($gg['cashextra'], $_SESSION['hj_language'],'ar')?> </td>
		   </tr>
           <?php }?>
           
		   <tr style='background-color:#f1aecf'>
           <td colspan='5' align='left'>المجموع  الاجمالي </td>
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
           <td colspan='5' align='left'>مجموع الضريبة المدفوعة </td>
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
        
        
       
        
         <h3 style="text-align:right">طريقة الدفع</h3>
        <?php if($gg['spaymethod']=='Visa'){
                         $spaymethod="فيزا";
                        }
                        if($gg['spaymethod']=='Master' || $gg['spaymethod']=='MASTER'){
                         $spaymethod="مستركارد";
                        }
                        if($gg['spaymethod']=='Visa & Mastercard'){
                         $spaymethod="فيزا ومستركارد";
                        }
                        
                        if($gg['spaymethod']=='Visa' || $gg['spaymethod']=='VISA'){
                         $spaymethod="فيزا";
                        }
                        if($gg['spaymethod']=='Mada' || $gg['spaymethod']=='MADA'){
                         $spaymethod="مدى";
                        }
                        if($gg['spaymethod']=='Sadad' || $gg['spaymethod']=='SADAD'){
                         $spaymethod="سداد";
                        }
                        if($gg['spaymethod']=='Cash'){
                         $spaymethod="الدفع عند الاستلام ";
                        }
                        
                        echo $spaymethod?><br /><br />
        
        <h3 style="text-align:right">عنوان التوصيل</h3>
        <table>
          <tr>
           <td>المدينة: </td>
           <td><?php echo $gg['scity']?></td>
          </tr>
          <tr>
           <td>البلد: </td>
           <td><?php echo $gg['scountry']?></td>
          </tr>
           <tr>
           <td>العنوان: </td>
           <td><?php echo $gg['saddress']?></td>
          </tr>
          
          <tr>
           <td>الجوال: </td>
           <td><?php echo $gg['smobile']?></td>
          </tr>
          <tr>
           <td>تعليقات ووقت التسليم المفضل: </td>
           <td><?php if($gg['sadditional']!=''){
			   echo nl2br($gg['sadditional']);
		   }else{
			   echo nl2br($gg['additional']);
		   }?></td>
          </tr>
        </table>
        <br /><br />
        <h3 style="text-align:right">User Information</h3>
        <table>
          <tr>
           <td>الاسم: </td>
           <td><?php echo $gg['fname']?> <?php echo $gg['lname']?></td>
          </tr>
          <tr>
           <td>بريد الالكتروني: </td>
           <td><?php echo $gg['email']?></td>
          </tr>
          <tr>
           <td>المدينة: </td>
           <td><?php echo $gg['city']?></td>
          </tr>
          <tr>
           <td>البلد: </td>
           <td><?php echo $gg['country']?></td>
          </tr>
          <tr>
           <td>العنوان: </td>
           <td><?php echo $gg['address']?></td>
          </tr>
          
          <tr>
           <td>الجوال: </td>
           <td><?php echo $gg['mobile']?></td>
          </tr>
          <tr>
           <td>معلومة اضافية: </td>
           <td><?php echo nl2br($gg['additional'])?></td>
          </tr>
        </table>
        </body>
        </html>
        