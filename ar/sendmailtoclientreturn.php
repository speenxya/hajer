<?php


if($total<0){
	$total=0;
}


    $body="مرحبا ".$clientdetail['fname']." ".$clientdetail['lname']."<br>";
if($type=='after'){	
	$body.="
    لقد تلقينا طلب إرجاع المنتج الخاص بك للسلع المذكورة أدناه. <br>
   سوف يتم فحص الصورة التي قمت بإرفاقها للمنتج, وعند الموافقة على طلب الإرجاع الخاص بك, سيتم تزويدك برقم بوليصة الإرجاع من شركة  ".$returncompany." بواسطتنا عبر البريد الالكتروني. ومن ثم سيتم تحديد موعد استلام المرتجع منك.<br><br>
    ماذا تفعل الآن؟<br><br>
    1-	قم بطباعة بوليصة الإرجاع.<br>
2-	إعادة المنتج في نفس الحالة التي وصلك عليها.<br>
3-	ألصق البوليصة على المنتج وسلمه لموظفي أرمكس.<br><br>

بمجرد استلامنا للمرتجع, سيتم فحصه والتحقق من سلامة المنتج. ومن ثم ستتم عملية رد الأموال المستحقة لحسابك الخاص. سيتم إشعارك عبر البريد الإلكتروني بمجرد إنهاء عملية رد الأموال الخاصة بك.<br><br>
ملاحظة: يحق لنا رفض طلب الإرجاع بعد استلامه في حالة لم تنطبق عليه الشروط ويتحمل العميل جميع التكاليف.
<br><br>";
	
	
}

$body.="بإمكانك معرفة خطوات و سياسة الإلغاء و الاسترجاع و استرداد المبلغ خلال زيارة الرابط  <a href='https://jawhara.online/ar/returnproduct'>https://jawhara.online/ar/returnproduct</a><br><br>";
    

$body.="<h3>تفاصيل الطلب</h3>
رقم الطلب: <span style='color:#f1aecf'>".$invoice."</span>, في ".formatdate($clientdetail['orders_created'],"Y-m-d")."<br>
طريقة الدفع: <b>".$paymentmethod."</b><br>
شركة شحن: <b>".$returncompany."</b><br>";



                
                


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
			   $ori=$con->query("select * from orderitems where orderitemsid='".$id."'");

         if($con->num_rows($ori)!='0'){
			 while($orii=$con->fetch_array($ori)){
				 $cbc=$con->getcertainvalue("select * from projects left join category on categoryid=idcategory left join supplier on supplierid=pidsupplier where projectsid='".$orii['oidproject']."'",array('psize'=>'psize','prodbrand'=>'prodbrand','projectsid'=>'projectsid','ptitlear'=>'ptitlear','pprice'=>'pprice','pspecialprice'=>'pspecialprice','bnamear'=>'bnamear','snamear'=>'snamear'));

				 //special price or not
				
				 $pricee=$cbc['pspecialprice'];
                 if($type=='before'){
                    $orii['oquantity']=$orii['rquantity'];
                    }
                    
				 $subtotal=$subtotal+($orii['oquantity']*$pricee);
         $body.="<tr style='background-color:#dde2e6'>
           <td style='border:1px solid #ffffff' align='center'>".$cbc['snamear']."</td>
           <td style='border:1px solid #ffffff' align='center'>".$cbc['ptitlear'];
		   if($orii['ocolor']!=''){
			   $body.="<br>اللون:".$con->getcertainvalue("select * from colors where colorname='".$orii['ocolor']."'","colornamear");
		   }
		   if($orii['osize']!=''){
			   $body.="<br>الحجم:".$con->getcertainvalue("select * from sizes where sizesname='".$orii['osize']."'","sizesnamear");
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
		   <!--<tr style='background-color:#dde2e6'>
           <td colspan='4' align='left'>رسوم التوصيل ( شامل الضريبة ) </td>
		   <td align='left'>".convert($clientdetail['sshippingprice'], $_SESSION['hj_language'],'ar')."</td>
		   </tr>-->";
           $subtotal=$subtotal+$clientdetail['sshippingprice'];
		   if($clientdetail['idvoucher']!=''){
			    if($clientdetail['voucherfixed']=='0'){
				   $vouchcur="%";
			   }else{
				   $vouchcur="".$_SESSION['hj_language']."";
			   }
			  
		   }
          // if($clientdetail['cashextra']!='0'){
		//	   $body.="<tr style='background-color:#dde2e6'>
          // <td colspan='4' align='left'>رسوم الدفع عند الاستلام (شامل الضريبة) </td>
		  // <td align='left'> ".convert($clientdetail['cashextra'], $_SESSION['hj_language'],'ar')."</td>
		  // </tr>";
		  //; }
           
            
		   $body.="
		  <!-- <tr style='background-color:#f1aecf'>
           <td colspan='4' align='left'>المجموع  الاجمالي </td>
		   <td align='left'>".convert($subtotal, $_SESSION['hj_language'],'ar')." </td>
		   </tr>-->
           
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
			
			
		
		   
		  