<?php if(!isset($order)){include "../includes/ini.php";};?>
<?php 
$pagetitle1="mcart";
$pagetitle="Order Successful";
$code=m_fill("order",$_REQUEST);
$dontcountstock=m_fill("dontcountstock",$_REQUEST);

if(isset($order)){
    $code=$order;    
    } 


if(isset($_SESSION['paycontinue'])){
}else{
	if(!isset($_REQUEST['mobile'])){
	echo changelocation("index");
	exit();
	}
}
unset($_SESSION['paycontinue']);


$clientdetail=$con->fetch_array($con->query("select * from  orders left join access on accessid=oiduser where ordersid='".m_prepare($code)."'"));
if($clientdetail['ordersid']==''){
	echo changelocation("index.php");
	exit();
}
$invoice=$clientdetail['invoicenumber'];
$paymentmethod=$clientdetail['spaymethod'];
$total=$clientdetail['stotal'];

//if(1==1){
if(!isset($_SESSION['sendemail_'.$code])){
	
	//give points to the user
	$con->query("update access set points=points+".floor($clientdetail['stotal']/25)." where accessid='".m_prepare($clientdetail['oiduser'])."'");
	
	//update quantity
	$prods=$con->query("select * from orderitems left join projects on projectsid=oidproject where idorders='".m_prepare($code)."'");
	$preparemail='';
	$farmland='';
	$linkfresh='';
	
	while($prodz=$con->fetch_array($prods)){
		//prepare mail ifitem remain is 0
		                 if($dontcountstock==''){
									
									
                                    
                                   //remove from colors as well if color exists in the cart
							 		 if($prodz['ocolor']!=''){
							 		  $colorquantity=$con->getcertainvalue("select * from projectspics left join colors on colorsid=iidcolor left join sizes on sizesid=iidsizes where projectspics.deleted='0'  and colorname='".$prodz['ocolor']."' and sizesname='".$prodz['osize']."' and idproject='".m_prepare($prodz['projectsid'])."'","iquantity");
                                      
							 		  $pquantity=$colorquantity-$prodz['oquantity'];
                                      
                                      
                                      if($pquantity<0){
										$pquantity=0;
									}
                                      $thequery="update projectspics left join colors on colorsid=iidcolor left join sizes on sizesid=iidsizes set iquantity=".m_prepare($pquantity)."  where projectspics.deleted='0' and iquantity!='0'   and colorname='".$prodz['ocolor']."' and sizesname='".$prodz['osize']."' and idproject='".m_prepare($prodz['projectsid'])."'";
                                      
                                        $con->query($thequery);
                                        
                                       // }else{
                                        }
                                            $pquantity=$prodz['pquantity']-$prodz['oquantity'];
                                            if($pquantity<0){
										$pquantity=0;
									}
							 		 $con->query("update projects set pquantity=".m_prepare($pquantity)." where projectsid='".m_prepare($prodz['projectsid'])."'");
                                     //}
									//echo "update projects set pquantity=".m_prepare($pquantity)." where projectsid='".m_prepare($prodz['projectsid'])."'";
									
									//if($prodz['originalquantity']-$prodz['oquantity']<=0){
									if($pquantity<=0){		
										//$preparemail.="<div>".$prodz['pcode']." - ".$prodz['ptitle']." - ".$prodz['psize']." - ".$prodz['prodbrand']." - ".$prodz['typee']."</div>";
									}
									}
	}
    
	
	//if($preparemail!=''){
	//	@sendmail($company_email,$contact_email, "Out of stock notification",$preparemail);
	//}
	
	
	
	//remove his session items from the db
	basketremoveses(session_id());
    
    //awb number
    $awbnumber=$clientdetail['awbnumber'];
    if($awbnumber==''){    
	if($clientdetail['sshipping']=='ARAMEX'){
		$result=getawbnumber($code);
		//$result="Success|123";
		$type=explode("|",$result);
		if($type[0]=='Error'){
			$con->query("update orders set awberror='".m_prepare($type[1])."' where ordersid='".$code."'");
			$con->query("update orders set awbnumber='' where ordersid='".$code."'");
			$con->query("update orders set awbpdf='' where ordersid='".$code."'");
		}
		if($type[0]=='Success'){
			$con->query("update orders set awbnumber='".$type[1]."' where ordersid='".$code."'");
			$con->query("update orders set awbpdf='".$type[2]."' where ordersid='".$code."'");
			$con->query("update orders set awberror='' where ordersid='".$code."'");
			$awbnumber=$type[1];
				
		}
	}
    }    
	
	 $_SESSION['sendemail_'.$code]='1';
	 
	

								include "sendmailtoclient.php";
                                
						
								                                    
                                  //send mail to admin	
								  
								//if(!isset($_REQUEST['mobile'])){  
								@sendmail($m_config['corderemail'],$m_config['corderemail'], $titl." ".$clientdetail['invoicenumber']."",$body);
										  //send mail to client	
								//}
										  
								
								//if(!isset($_REQUEST['mobile'])){		  
										 
								@sendmail($m_config['corderemail'],$clientdetail['email'], $titl." ".$clientdetail['invoicenumber']."",$body);
										  
								//}
	 }
     
     
	 
//lets clear the order
$bas=new basket();
$bas->init('hj_cart');
$bas->removeall_cart();
echo changelocation("conclusion?order=".$code);
exit();?>
