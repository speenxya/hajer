<?php include "../includes/ini.php"?>
<?php 

include "../classes/paypal.php";
$pagetitle1="mcart";
$pagetitle="Order Summary";
ini_set("display_errors", "1");
error_reporting(E_ALL);
?>

<?php $bas=new basket();
$bas->init('hj_cart');
if(!$bas->get_cart()){
echo changelocation("cart");
}



if(!isset($_REQUEST['register'])){
	echo changelocation("cart");
	exit();
}

if(!isset($_SESSION['hj_id'])){
	echo changelocation("cart");
}



syncbasket(session_id());

$cc=m_fill("cc",$_REQUEST);

if($cc==''){
	echo changelocation("checkout");
}


if($cc=='4'){
	$paymentmethod="Cash";
}
if($cc=='1'){
		$paymentmethod="VISA";
}
if($cc=='2'){
		$paymentmethod="MASTER";
}
if($cc=='3'){
		$paymentmethod="SADAD";
}
if($cc=='5'){
		$paymentmethod="MADA";
}




//getting the total and checking if the items still exist and updating the basket accordingly
$subtotal=0;
$stoporder=0;
 foreach($bas->get_cart() as $a=>$b){
				 $aa=explode(":::",$a);
				 $dat=$con->getcertainvalue("select * from projects left join category on categoryid=idcategory left join supplier on supplierid=idsupplier where projectsid='".$aa[0]."'",array("pcode"=>"pcode","projectsid"=>"projectsid","ptitlear"=>"ptitlear","pprice".getptype()=>"pprice".getptype(),"pcost"=>"pcost","pspecialprice".getptype()=>"pspecialprice".getptype(),"bnamear"=>"bnamear","snamear"=>"snamear"));
				 //special price or not

				  $finalstock=getstock($dat['projectsid'],$aa[1],$aa[2],session_id(),$original="1");
                  
                  
			
				
				 if($b>$finalstock){
					 if($finalstock==0 || $finalstock<0){
						 //$bas->remove_cart($dat['projectsid'].":::".$aa[1].":::".$aa[2]);
						// basketremove($dat['projectsid'],session_id(),$aa[1],$aa[2],@$_SESSION['hj_id']);
						 echo "removed";
					 }else{
						 // $bas->update_cart($dat['projectsid'].":::".$aa[1].":::".$aa[2],$finalstock);
						 // updatebasket($dat['projectsid'],$finalstock,session_id(),$aa[1],$aa[2],@$_SESSION['hj_id']);
						  echo "updated";
					 }
					 $stoporder=1;
				 }
				
				 $pricee=$dat['pspecialprice'.getptype()];
				 
				
								
				$subtotal=$subtotal+($b*$pricee);
 }
 



 

 if($subtotal<=0){
	 echo changelocation("cart.php?msg=not available");
	 exit();
 }
 
 if($stoporder==1){
	 echo changelocation("cart.php?msg=not available");
	 exit();
 }
 

 
 
 $total=$_SESSION['sgiftprice']+$subtotal;
  if(isset($_SESSION['voucherdiscount'])){
					if($_SESSION['voucherfixed']=='0'){
					$total=$total-($_SESSION['voucherdiscount']*$total)/100;
					}else{
						$total=$total-$_SESSION['voucherdiscount'];
					}
					
				}
				
			
				$total=$total+$_SESSION['shippingprice'];
                
                // $total=$total+(5*$total)/100    ; 
				
				if($total<0){
						$total=0;
					}

 

if(isset($_REQUEST['register'])){

$duplicate=0;


	  
	  if($duplicate=='0'){
		  
		        $orders_created=date("Y-m-d H:i:s"); // we insert date created here . note the table name prefix
				$orders_modified=date("Y-m-d H:i:s"); // we insert date modified here . note the table name prefix
				$clientdetail=$con->fetch_array($con->query("select * from access where accessid='".m_prepare($_SESSION['hj_id'])."'"));
				
				$invoicefirstpart=invoicefirstpart($_SESSION['hj_id']);
				$invoicesecondpart=invoicesecondpart($invoicefirstpart);
				$invoice=$invoicefirstpart."-".$invoicesecondpart;
                
                
                $shippingprice=$_SESSION['shippingprice'];
                
                
                $cashextra=0;
                if($cc=='4'){
                    $total=$total+$m_config['cashextra'];
                    $cashextra=$m_config['cashextra'];
                    }
                    
                    
				
				  if(insert("orders",array("oiduser"=>m_prepare($_SESSION['hj_id']),
				                           "scity"=>m_prepare($_SESSION['scity']),
										   "sadditional"=>m_prepare($_SESSION['sadditional']),
                                           "svat"=>m_prepare($_SESSION['svat']),
										   "saddress"=>m_prepare($_SESSION['saddress']),
										   "scountry"=>m_prepare($_SESSION['scountry']),
										   "spostalcode"=>m_prepare($_SESSION['spostalcode']),
                                           "stel"=>m_prepare($_SESSION['stel']),
										   "sfax"=>m_prepare($_SESSION['sfax']),
										   "smobile"=>m_prepare($_SESSION['smobile']),
										   "pickupdate"=>m_prepare($_SESSION['pickupdate']),
										   "pickuptime"=>m_prepare($_SESSION['pickuptime']),
                                           "slat"=>m_prepare($_SESSION['slat']),
                                           "slong"=>m_prepare($_SESSION['slong']),
                                           "szoom"=>m_prepare($_SESSION['szoom']),
										   "idvoucher"=>m_prepare(@$_SESSION['idvoucher']),
										   "voucherdiscount"=>m_prepare(@$_SESSION['voucherdiscount']),
										   "voucherfixed"=>m_prepare(@$_SESSION['voucherfixed']),
										   "stotal"=>m_prepare($total),
                                           "cashextra"=>m_prepare($cashextra),
										   "invoicenumber1"=>$invoicefirstpart,
										   "invoicenumber2"=>$invoicesecondpart,
                                           "orderplatform"=>"mobile",
										   "invoicenumber"=>$invoice,
										   "spaid"=>"No",
										   "sstatus"=>"Pending",
										   "sshipping"=>m_prepare(@$_SESSION['sshipping']),
										   "sshippingprice"=>$shippingprice,
										   "sgift"=>m_prepare($_SESSION['sgift']),
										   "sgiftprice"=>m_prepare($_SESSION['sgiftprice']),
										    "spaymethod"=>$paymentmethod,
											"orders_branch"=>$m_branch,
										   "orders_created"=>$orders_created,
											"orders_modified"=>$orders_modified),$con)){
							  $insertidd=$con->insert_id();
							  update("orders",array("ordersid"=>$insertidd),"where dummy_ordersid='$insertidd'",$con);
							  
							  

							  $code=$insertidd;
							  
							  //now inserting items
							  $products="";
							  
							  foreach($bas->get_cart() as $a=>$b){
								  
								 $aa=explode(":::",$a);
								 if(!isset($aa[1])){
									 $aa[1]='';
								 }
								 if(!isset($aa[2])){
									 $aa[2]='';
								 }
								 
								 $dat=$con->getcertainvalue("select * from projects left join category on categoryid=idcategory left join supplier on supplierid=idsupplier where projectsid='".$aa[0]."'",array("pcode"=>"pcode","pcost"=>"pcost","pquantity"=>"pquantity","pminquantity"=>"pminquantity","projectsid"=>"projectsid","ptitlear"=>"ptitlear","pprice".getptype()=>"pprice".getptype(),"pspecialprice".getptype()=>"pspecialprice".getptype(),"bnamear"=>"bnamear","snamear"=>"snamear"));
								 //special price or not
								 $pcostt=$dat['pcost'];
								 $pricee=$dat['pspecialprice'.getptype()];
								 $products.=$dat['ptitlear']."(".$b."),";
			 				  $finalstock=getstock($dat['projectsid'],$aa[1],$aa[2],session_id());
								 //$dat['pquantity']=getstock($dat['pcode']);
								 
								 
								 
								 $orderitems_created=date("Y-m-d H:i:s"); // we insert date created here . note the table name prefix
								 $orderitems_modified=date("Y-m-d H:i:s"); // we insert date modified here . note the table name prefix
								 
								$voucherprice=0;
                                 if(isset($_SESSION['discounthj'][$dat['projectsid']])){
                                    $voucherprice=$_SESSION['discounthj'][$dat['projectsid']];
                                    }
								 
										  if(insert("orderitems",array("idorders"=>m_prepare($code),
												   "oidproject"=>m_prepare($dat['projectsid']),
												   "oquantity"=>m_prepare($b),
												   "ocolor"=>m_prepare($aa[1]),
												   "osize"=>m_prepare($aa[2]),
												   "originalquantity"=>m_prepare($finalstock+$b),
												   "opcost"=>m_prepare($pcostt),
                                                   "voucherprice"=>m_prepare($voucherprice),
												   "oprice"=>m_prepare($pricee),
													"orderitems_branch"=>$m_branch,
												   "orderitems_modified"=>$orders_created,
													"orderitems_modified"=>$orders_modified),$con)){
									  $insertidd=$con->insert_id();
									  update("orderitems",array("orderitemsid"=>$insertidd."-".$m_branch),"where dummy_orderitemsid='$insertidd'",$con);
									

									//update quantity
									$pquantity=$dat['pquantity']-$b;
							 		// $con->query("update projects set pquantity=".m_prepare($pquantity)." where projectsid='".m_prepare($dat['projectsid'])."'");
									 
									 //send mail if quantity<1
											// if($pquantity<=$dat['pminquantity']){
												// $body="<img src='".$m_rooturl."images/logo.png' <br><br> ".$dat['ptitlear']." is nearly out of stock.<br><br>
														//The remaining stock is now less than the specified minimum of ".$dat['pminquantity'].".<br><br>
														//Remaining stock: ".$pquantity."<br><br>
														//You are advised to open the product's admin Product Page in order to replenish your inventory.<br><br>
														//";
												//@sendmail($company_email,$contact_email, $titl." Product near depletion",$body);
									// }
				                        }//if insert in successful
							  }//foreach
										
									
									  
									 //$bas->removeall_cart();
                                     
                                   
									

									  if($cc=='4'){
										  $_SESSION['paycontinue']=1;
										  update("orders",array("spaid"=>"Yes"),"where ordersid='".m_prepare($code)."'",$con);
									    echo changelocation("success.php?order=".$code);
									  }else{
										 
										  
                                           
                                           if($cc=='1' || $cc=='2' || $cc=='3' || $cc=='5'){
										     echo changelocation("paymentprepare?code=".$code);
                                             exit();
                                             $_SESSION['paycontinue']=1;
										  update("orders",array("spaid"=>"Yes"),"where ordersid='".m_prepare($code)."'",$con);
									    echo changelocation("success.php?order=".$code);
										   }
										   
										   
										   
										//  echo changelocation("success.php");
									  }
								 
										  } //if inset is successfull
							  
							  
						   $msg1="";
						   
						   logs("","","orders.php?view=1&code=".$code."","an order has been made","","","website");
						   
						    
							  
							
							  
				  
	  }else{
		  $msg1=$duplicate;
	  }
}




?>
