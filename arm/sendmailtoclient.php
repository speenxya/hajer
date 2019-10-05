<?php


if($total<0){
	$total=0;
}

if(isset($statusshipped)){
    $body="مرحبا ".$clientdetail['fname']." ".$clientdetail['lname']."<br>
    نشكر لك تسوقك عبر موقع جوهره, ويسرنا اعلامك أنه قد تم شحن مشترياتك التالية. مشترياتك في الطريق اليك. ";
    }else{
$body="<div style='text-align:center'><img src='".$m_rooturl."images/logoprint.png' style='max-width:100%'></div><br><br>
تهانينا! تم تقديم طلب جديد على جوهره <br>
".$clientdetail['fname']." ".$clientdetail['lname']." (".$clientdetail['email'].")<br><br>";


}

$body.="بإمكانك معرفة خطوات و سياسة الإلغاء و الاسترجاع و استرداد المبلغ خلال زيارة الرابط  <a href='https://jawhara.online/ar/returnproduct'>https://jawhara.online/ar/returnproduct</a><br><br>";

$body.="<h3>تفاصيل الطلب</h3>
رقم الطلب: <span style='color:#f1aecf'>".$invoice."</span>, في ".formatdate($clientdetail['orders_created'],"Y-m-d")."<br>
طريقة الدفع: <b>".$paymentmethod."</b><br>
شركة شحن: <b>".$clientdetail['sshipping']."</b><br>";
if($awbnumber!=''){
    if($clientdetail['sshipping']=='ARAMEX'){
    $body.="رقم awb الخاص بك هو: ".$awbnumber.". تتبع طلبك من خلال النقر <a href='https://www.aramex.com/express/track_results_multiple.aspx?ShipmentNumber=".$awbnumber."'>هنا</a>";
    }
    }


                
                


$body.="<table align='center' width='100%' cellpadding='4' cellspacing='2' style='border-collapse:collapse'>
         <tr>
           <td width='21%' align='center'  style='background-color:#b9babe;color:#fff;border:1px solid #ffffff;padding:10px'><strong>الفئة</strong></td>
           <td width='32%' align='center' style='background-color:#b9babe;color:#fff;border:1px solid #ffffff;padding:10px'><strong>المنتج</strong></td>
           <td width='7%' align='center'  style='background-color:#b9babe;color:#fff;border:1px solid #ffffff;padding:10px'><strong>السعر</strong></td>
		   <td width='7%' align='center'  style='background-color:#b9babe;color:#fff;border:1px solid #ffffff;padding:10px'><strong>الكمية</strong></td>
           <td width='10%' align='center'  style='background-color:#b9babe;color:#fff;border:1px solid #ffffff;padding:10px'><strong>المجموع</strong></td>
         </tr>";
         $countt='0';
		       $subtotal='0';
			   $ori=$con->query("select * from orderitems where idorders='".$code."'");

         if($con->num_rows($ori)!='0'){
			 while($orii=$con->fetch_array($ori)){
				 $cbc=$con->getcertainvalue("select * from projects left join category on categoryid=idcategory left join supplier on supplierid=pidsupplier where projectsid='".$orii['oidproject']."'",array('psize'=>'psize','prodbrand'=>'prodbrand','projectsid'=>'projectsid','ptitlear'=>'ptitlear','pprice'=>'pprice','pspecialprice'=>'pspecialprice','bnamear'=>'bnamear','snamear'=>'snamear'));

				 //special price or not
				
				 $pricee=$cbc['pspecialprice'];
				 $subtotal=$subtotal+($orii['oquantity']*$pricee);
         $body.="<tr style='background-color:#dde2e6'>
           <td style='border:1px solid #ffffff' align='center'>".$cbc['snamear']."</td>
           <td style='border:1px solid #ffffff' align='center'>".$cbc['ptitlear'];
		   if($orii['ocolor']!=''){
			   $body.="<br>Color:".$orii['ocolor'];
		   }
		   if($orii['osize']!=''){
			   $body.="<br>Size:".$orii['osize'];
		   }
		  $body.="</td><td style='border:1px solid #ffffff' align='left'>".convert($pricee, $_SESSION['hj_language'],'ar')." </td>
           <td style='border:1px solid #ffffff' align='center'>".$orii['oquantity']."</td>
           <td style='border:1px solid #ffffff' align='left'>".convert($orii['oquantity']*$pricee, $_SESSION['hj_language'],'ar')." </td>
         </tr>";
         
		  $countt++;
		  }
		  }else{
         $body.="<tr>
           <td colspan='7' align='center'>لم يتم العثور على منتجات</td>
         </tr>";
        }
          $body.="<tr style='background-color:#b9babe'>
           <td colspan='4' align='left'>مجموع سعر السلع (شامل الضريبة) </td>
		   <td align='left'>".convert($subtotal, $_SESSION['hj_language'],'ar')." </td>
		   </tr>
		   <tr style='background-color:#dde2e6'>
           <td colspan='4' align='left'>رسوم التوصيل ( شامل الضريبة ) </td>
		   <td align='left'>".convert($clientdetail['sshippingprice'], $_SESSION['hj_language'],'ar')."</td>
		   </tr>";
		   if($clientdetail['idvoucher']!=''){
			    if($clientdetail['voucherfixed']=='0'){
				   $vouchcur="%";
			   }else{
				   $vouchcur="ريال";
			   }
			   $body.="<tr style='background-color:#dde2e6'>
           <td colspan='4' align='left'>خصم</td>
		   <td align='left'>  ".convert($clientdetail['voucherdiscount'], $_SESSION['hj_language'],'ar')." </td>
		   </tr>";
		   }
           if($clientdetail['cashextra']!='0'){
			   $body.="<tr style='background-color:#dde2e6'>
           <td colspan='4' align='left'>رسوم الدفع عند الاستلام (شامل الضريبة) </td>
		   <td align='left'> ".convert($clientdetail['cashextra'], $_SESSION['hj_language'],'ar')."</td>
		   </tr>";
		   }
           
            
		   $body.="
		   <tr style='background-color:#f1aecf'>
           <td colspan='4' align='left'>المجموع  الاجمالي </td>
		   <td align='left'>".convert($total, $_SESSION['hj_language'],'ar')." </td>
		   </tr>
           <tr style='background-color:#dde2e6'>
           <td colspan='4' align='left'>مجموع الضريبة المدفوعة </td>
		   <td align='left'>".convert($clientdetail['stotal']-($clientdetail['stotal']/1.05), $_SESSION['hj_language'],'ar')."</td>
		   </tr>
		   </table>
           <br /><br />
		   
		   <table width='100%' cellpadding='0' cellspacing='0'>
		     <tr>
			   <td width='100%' valign='top'>
			   <h3 style='background-color:#b9babe;margin:0;padding:10px'>عنوان التوصيل</h3>
			     <table cellpadding='2' cellspacing='0' width='100%'  style='background-color:#ebecee'>
                 <tr>
					   <td>الموقع: </td>
					   <td><a href='".$m_rooturl."admin_cp/map.php?coord=".$clientdetail['slat'].",".$clientdetail['slong']."'> الموقع</a></td>
					  </tr>
					  <tr>
					   <td width='200px'>الاسم: </td>
					   <td>".$clientdetail['fname']." ".$clientdetail['lname']."</td>
					  </tr>
					  <tr>
					   <td>المدينة: </td>
					   <td>".$clientdetail['scity']."</td>
					  </tr>
					  <tr>
					   <td>البلد: </td>
					   <td>".$clientdetail['scountry']."</td>
					  </tr>
					   <tr>
					   <td>العنوان: </td>
					   <td>".$clientdetail['saddress']."</td>
					  </tr>
					  
					  <tr>
					   <td>الجوال: </td>
					   <td>".$clientdetail['smobile']."</td>
					  </tr>
					  <tr>
					   <td>تعليقات ووقت التسليم المفضل: </td>";
					   if($clientdetail['sadditional']!=''){
					   $body.="<td>".$clientdetail['sadditional']."</td>";
					   }else{
						   $body.="<td>".$clientdetail['additional']."</td>";
					   }
					  $body.="</tr>
					  
			 
		   </table>
		   
		    <br /><br />
        
       ";
			
			
		
		   
		  