<?php


if($total<0){
	$total=0;
}


$body="<div style='text-align:center'><img src='".$m_rooturl."images/logoprint.png' style='max-width:100%'></div><br><br>
Congratulations! A new order was placed on Jawhara:<br>
".$clientdetail['fname']." ".$clientdetail['lname']." (".$clientdetail['email'].")<br><br>

You can find out the steps and the cancellation and recovery and refund policy by visiting the link <a href='https://jawhara.online/en/returnproduct'>https://jawhara.online/en/returnproduct</a><br><br>

<h3>Order Details</h3>
Order Number: <span style='color:#f1aecf'>".$invoice."</span>, placed on ".formatdate($clientdetail['orders_created'],"Y-m-d")."<br>
Payment Method: <b>".$paymentmethod."</b><br>
Shipping Company: <b>".$clientdetail['sshipping']."</b><br>";
if($awbnumber!=''){
    if($clientdetail['sshipping']=='ARAMEX'){
    $body.="your awb number is: ".$awbnumber.". Track your order by clicking <a href='https://www.aramex.com/express/track_results_multiple.aspx?ShipmentNumber=".$awbnumber."'>here</a>";
    }
    }


                
                


$body.="<table align='center' width='100%' cellpadding='4' cellspacing='2' style='border-collapse:collapse'>
         <tr>
           <td width='21%' align='center'  style='background-color:#b9babe;color:#fff;border:1px solid #ffffff;padding:10px'><strong>Category</strong></td>
           <td width='32%' align='center' style='background-color:#b9babe;color:#fff;border:1px solid #ffffff;padding:10px'><strong>Product</strong></td>
           <td width='7%' align='center'  style='background-color:#b9babe;color:#fff;border:1px solid #ffffff;padding:10px'><strong>Price</strong></td>
		   <td width='7%' align='center'  style='background-color:#b9babe;color:#fff;border:1px solid #ffffff;padding:10px'><strong>Qty</strong></td>
           <td width='10%' align='center'  style='background-color:#b9babe;color:#fff;border:1px solid #ffffff;padding:10px'><strong>Total</strong></td>
         </tr>";
         $countt='0';
		       $subtotal='0';
			   $ori=$con->query("select * from orderitems where idorders='".$code."'");

         if($con->num_rows($ori)!='0'){
			 while($orii=$con->fetch_array($ori)){
				 $cbc=$con->getcertainvalue("select * from projects left join category on categoryid=idcategory left join supplier on supplierid=pidsupplier where projectsid='".$orii['oidproject']."'",array('psize'=>'psize','prodbrand'=>'prodbrand','projectsid'=>'projectsid','ptitle'=>'ptitle','pprice'=>'pprice','pspecialprice'=>'pspecialprice','bname'=>'bname','sname'=>'sname'));

				 //special price or not
				
				 $pricee=$cbc['pspecialprice'];
				 $subtotal=$subtotal+($orii['oquantity']*$pricee);
         $body.="<tr style='background-color:#dde2e6'>
           <td style='border:1px solid #ffffff' align='center'>".$cbc['sname']."</td>
           <td style='border:1px solid #ffffff' align='center'>".$cbc['ptitle'];
		   if($orii['ocolor']!=''){
			   $body.="<br>Color:".$orii['ocolor'];
		   }
		   if($orii['osize']!=''){
			   $body.="<br>Size:".$orii['osize'];
		   }
		  $body.="</td><td style='border:1px solid #ffffff' align='right'>".convert($pricee, $_SESSION['hj_language'],'en')." </td>
           <td style='border:1px solid #ffffff' align='center'>".$orii['oquantity']."</td>
           <td style='border:1px solid #ffffff' align='right'>".convert($orii['oquantity']*$pricee, $_SESSION['hj_language'],'en')." </td>
         </tr>";
         
		  $countt++;
		  }
		  }else{
         $body.="<tr>
           <td colspan='7' align='center'>No Items Found</td>
         </tr>";
        }
          $body.="<tr style='background-color:#b9babe'>
           <td colspan='4' align='right'>Items Total (VAT Included)</td>
		   <td align='right'>".convert($subtotal, $_SESSION['hj_language'],'en')." </td>
		   </tr>
		   <tr style='background-color:#dde2e6'>
           <td colspan='4' align='right'>Delivery Charge (VAT Included) </td>
		   <td align='right'>".convert($clientdetail['sshippingprice'], $_SESSION['hj_language'],'en')."</td>
		   </tr>";
		   if($clientdetail['idvoucher']!=''){
			    if($clientdetail['voucherfixed']=='0'){
				   $vouchcur="%";
			   }else{
				   $vouchcur="Riyals";
			   }
			   $body.="<tr style='background-color:#dde2e6'>
           <td colspan='4' align='right'>Discount</td>
		   <td align='right'>  ".convert($clientdetail['voucherdiscount'], $_SESSION['hj_language'],'en')." </td>
		   </tr>";
		   }
            if($clientdetail['cashextra']!='0'){
			   $body.="<tr style='background-color:#dde2e6'>
           <td colspan='4' align='right'>Cash on Delivery (VAT Included) </td>
		   <td align='right'> ".convert($clientdetail['cashextra'], $_SESSION['hj_language'],'en')."</td>
		   </tr>";
		   }
           
            
		   $body.="
		   <tr style='background-color:#f1aecf'>
           <td colspan='4' align='right'>Total Paid</td>
		   <td align='right'>".convert($total, $_SESSION['hj_language'],'en')." </td>
		   </tr>
           <tr style='background-color:#dde2e6'>
           <td colspan='4' align='right'>Total VAT Paid </td>
		   <td align='right'>".convert($clientdetail['stotal']-($clientdetail['stotal']/1.05), $_SESSION['hj_language'],'en')."</td>
		   </tr>
		   </table>
           <br /><br />
		   
		   <table width='100%' cellpadding='0' cellspacing='0'>
		     <tr>
			   <td width='100%' valign='top'>
			   <h3 style='background-color:#b9babe;margin:0;padding:10px'>Delivery Address</h3>
			     <table cellpadding='2' cellspacing='0' width='100%'  style='background-color:#ebecee'>
                 <tr>
					   <td>Location: </td>
					   <td><a href='".$m_rooturl."admin_cp/map.php?coord=".$clientdetail['slat'].",".$clientdetail['slong']."'>View Location</a></td>
					  </tr>
					  <tr>
					   <td width='200px'>Name: </td>
					   <td>".$clientdetail['fname']." ".$clientdetail['lname']."</td>
					  </tr>
					  <tr>
					   <td>City: </td>
					   <td>".$clientdetail['scity']."</td>
					  </tr>
					  <tr>
					   <td>Country: </td>
					   <td>".$clientdetail['scountry']."</td>
					  </tr>
					   <tr>
					   <td>Address: </td>
					   <td>".$clientdetail['saddress']."</td>
					  </tr>
					  
					  <tr>
					   <td>Mobile: </td>
					   <td>".$clientdetail['smobile']."</td>
					  </tr>
					  <tr>
					   <td>Comments & Preferred Delivery time: </td>";
					   if($clientdetail['sadditional']!=''){
					   $body.="<td>".$clientdetail['sadditional']."</td>";
					   }else{
						   $body.="<td>".$clientdetail['additional']."</td>";
					   }
					  $body.="</tr>
					  
			 
		   </table>
		   
		    <br /><br />
        
       ";
			
			
		
		   
		  