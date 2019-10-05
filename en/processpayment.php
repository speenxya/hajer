<?php include "../includes/ini.php"?>
<?php $pagetitle1="mpayment";
$pagetitle="Payment"?>
<?php $bas=new basket();
$bas->init('hj_cart');
$m=$bas->get_cart();

?>
<?php 



$clientdetail=$con->fetch_array($con->query("select * from  orders left join access on accessid=oiduser where hyperpayid='".m_prepare(@$_REQUEST['id'])."'"));
if($clientdetail['ordersid']==''){
	echo changelocation("error.php");
	exit();
}



//parsing the payment request
if(isset($_REQUEST['resourcePath'])){
	
	
	
if($clientdetail['spaymethod']=='MADA' || $clientdetail['spaymethod']=='Visa & Mastercard' || $clientdetail['spaymethod']=='SADAD' || $clientdetail['spaymethod']=='VISA' || $clientdetail['spaymethod']=='MASTER' || $clientdetail['spaymethod']=='AMEX'){
	$entity="8acda4c96ade4a49016afe90feb912ea";
	
	
}elseif($clientdetail['spaymethod']=='PAYPAL'){
	$entity="8acda4c96ade4a49016afe90feb912ea";
}else{
	exit();
}





	function request1() {
		global $clientdetail;
		global $entity;
	$url = "https://oppwa.com".$_REQUEST['resourcePath'];
	
	if($clientdetail['spaymethod']=='MADA' || $clientdetail['spaymethod']=='Visa & Mastercard' || $clientdetail['spaymethod']=='VISA' || $clientdetail['spaymethod']=='MASTER' || $clientdetail['spaymethod']=='AMEX'){
	  $url = "https://oppwa.com".$_REQUEST['resourcePath'];
	}
	

	
	$url .= "?authentication.entityId=".$entity."";
    
	
	

	$ch = curl_init();
	
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);// this should be set to true in production
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                   'Authorization:Bearer OGFjZGE0Yzk2YWRlNGE0OTAxNmFmZTkwY2U5NDEyZTV8UGpYbkpwdEgyNg=='));
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$responseData = curl_exec($ch);
	if(curl_errno($ch)) {
		return curl_error($ch);
	}
	curl_close($ch);
	return $responseData;
}
$responseData1 = request1();




$responseData1=json_decode($responseData1,true);

//print_r($responseData1);
//exit();




if(!isset($responseData1['result']['code'])){
	echo changelocation("error.php");
	exit();
}else{
	
//saving all result	
$con->query("update orders set hypertextall='".m_prepare(json_encode($responseData1))."' where ordersid='".$clientdetail['ordersid']."'");

	
	//save the result in db
	//this is for test
	//$responseData1['merchantTransactionId']="85";
	//$responseData1['result']['code']='000.400.000';
	//$responseData1['result']['description']="success";
	if(!isset($responseData1['merchantTransactionId'])){
		
			

		echo changelocation("error.php");
		exit();
	}
	
	$continue='No';
	
	
	if(preg_match('/^(000\.000\.|000\.100\.1|000\.[36])/', $responseData1['result']['code'], $matches, PREG_OFFSET_CAPTURE)){ //test for success
		$continue='Yes';
	}
	if(preg_match('/^(000\.400\.0|000\.400\.100)/', $responseData1['result']['code'], $matches, PREG_OFFSET_CAPTURE)){ //test for manual review
		$continue='Yes';
	}


	
	
	
	$order=$clientdetail['ordersid'];
	if(isset($responseData1['resultDetails']['ErrorMessage'])){
		 $con->query("update orders set hypertextoneresult='".m_prepare($responseData1['resultDetails']['ErrorMessage'])."', hyperpayresult=concat(hyperpayresult,'".date("Y-m-d H:i:s")." ".m_prepare($responseData1['resultDetails']['ErrorMessage'])."<br><br>')   where ordersid='".$order."'");
	}else{
			$con->query("update orders set hypertextoneresult='".m_prepare($responseData1['result']['description'])."', hyperpayresult=concat(hyperpayresult,'".date("Y-m-d H:i:s")." ".m_prepare($responseData1['result']['description'])."<br><br>')   where ordersid='".$order."'");
	}
	if($continue=='Yes'){
		$spaidd=$con->getcertainvalue("select * from orders where ordersid='".$order."'","spaid");
		if($spaidd!='Yes'){
		$_SESSION['paycontinue']=1;
		$con->query("update orders set spaid='Yes'   where ordersid='".$order."'");
		//include "success.php";
        echo changelocation("success.php?order=".$order);
		}else{
		  echo changelocation("conclusion?order=".$order);
		  }
		exit();
	}else{
		echo changelocation("error.php?order=".$order);
		exit();
	}
}

}
?>
