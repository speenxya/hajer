<?php include "../includes/ini.php"?>
<?php $pagetitle1="mpreparepayment";
$pagetitle="Payment"?>
<?php $code=m_fill("code",$_REQUEST);

if(!isset($_SESSION['hj_language'])){
    $_SESSION['hj_language']='SAR';
    }

if(isset($_REQUEST['currency'])){
	$_SESSION['hj_language']=$_REQUEST['currency'];
}
?>
<?php if(!isset($_SESSION['hj_order']) && $code==''){
	echo changelocation("cart.php");
	exit();
}

$ordercode=@$_SESSION['hj_order'];
if($code!=''){
	$ordercode=$code;
}

$clientdetail=$con->fetch_array($con->query("select * from  orders left join access on accessid=oiduser where ordersid='".m_prepare($ordercode)."'"));

if($clientdetail['spaymethod']=='MADA' || $clientdetail['spaymethod']=='Visa & Mastercard' || $clientdetail['spaymethod']=='SADAD' || $clientdetail['spaymethod']=='VISA' || $clientdetail['spaymethod']=='MASTER' || $clientdetail['spaymethod']=='AMEX'){
	$entity="8acda4c96ade4a49016afe90feb912ea";
}


?>
<!DOCTYPE html>
<html>
	

<head>
<?php 



//inirialize payment start
function request_first() {
	global $user;
		global $pass;
	global $entity;
	global $m_config;
	global $m_rooturl;
	global $clientdetail;
	$dataextra='';
	//$dataextra="&bankAccount.country=SA";
	if($clientdetail['spaymethod']=='SADAD'){
		$dataextra="&bankAccount.country=SA";
	}
	if($clientdetail['spaymethod']=='PAYPAL'){
		$cur="USD";
		$paymentType="DB";
	$total=number_format(($clientdetail['stotal']*$m_config['conversion']), 2, '.', '');
	}else{
		$cur="SAR";
		$paymentType="DB";
		$total=number_format(($clientdetail['stotal']), 2, '.', '');
	}
	
	
	

	$url = "https://oppwa.com/v1/checkouts";
	$testmode='';
	if($clientdetail['spaymethod']=='MADA' || $clientdetail['spaymethod']=='Visa & Mastercard' || $clientdetail['spaymethod']=='VISA' || $clientdetail['spaymethod']=='MASTER' || $clientdetail['spaymethod']=='AMEX'){
	  //$testmode="&testMode=EXTERNAL";
      
}
	$data = "authentication.entityId=".$entity."" .
		"&amount=".$total."" .
		"&currency=".$cur."" .
		$testmode.
		$dataextra.
		"&merchantTransactionId=".$clientdetail['ordersid']."" .
		"&customer.email=".$clientdetail['email']."" .
		"&customer.ip=".getip()."" .
        //"&customer.ip=127.0.0.1" .
		"&paymentType=".$paymentType;
		
		//echo "<pre>";
       // echo $data;
       // echo "</pre>";

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
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

$responseData = request_first();
$responseData=json_decode($responseData,true);
//print_r($responseData);
//exit();
if(!isset($responseData['id'])){
	echo changelocation("error.php");
	exit();
}
$con->query("update orders set hyperpayid='".$responseData['id']."' where ordersid='".$clientdetail['ordersid']."'");

?>


		<!-- Basic -->
		<meta charset="utf-8">
		<title><?php echo $titl?> | <?php echo $pagetitle?></title>
		<meta name="keywords" content="" />
		<meta name="description" content="<?php echo $titl?>">
		
		<?php include "metastuff.php"?>
<link rel="shortcut icon" href="favicon.ico">
		<!-- Mobile Specific Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
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
		<?php //include "loader.php"?>
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
			<div class="row">
            <div class="col-sm-12" style="text-align:center;margin-top:50px"><h3>Total: <?php echo convert($clientdetail['stotal'], $_SESSION['hj_language'],'en')?></h3></div>
					<div class="col-md-12  col-sm-12 fieldholder">
                    <?php if(!isset($_REQUEST['resourcePath'])){?>
                       <form action="<?php echo $m_rooturl?>en/processpayment.php" class="paymentWidgets"><?php echo $clientdetail['spaymethod']?>
                       <input type="hidden" name="send" value="1">
                       </form>
                       <?php }else{?>
                       <?php }?>
                       
					</div>
                    <?php if(!isset($_REQUEST['mobile'])){?>
                    <div class="col-sm-12" style="text-align:center;margin-bottom:20px"><input type="button" class="butt" onclick="window.location='checkout'" value="Back"></div>
                    <?php }?>
					
				</div>
			
			
				
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
		<script src="../js/custom.js?v=2"></script>			
		<script>
			$j(document).ready(function() {
			
				// popup ini			
				
			
				// Init All Carousel			
			
			//	productCarousel($j('#megaMenuCarousel1'),1,1,1,1,1);
			//	blogCarousel($j('.slider-blog'),1,1,1,1,1);
				
				
		
			 })
		</script>
        <?php if($clientdetail['spaymethod']=='MADA' || $clientdetail['spaymethod']=='VISA' || $clientdetail['spaymethod']=='MASTER' || $clientdetail['spaymethod']=='AMEX'){?>
	  <script async  src="https://oppwa.com/v1/paymentWidgets.js?checkoutId=<?php echo $responseData['id']?>"></script>
      <script>
var wpwlOptions = {
forceCardHolderEqualsBillingName: true,


}
</script>
<?php }else{?>
<script src="https://oppwa.com/v1/paymentWidgets.js?checkoutId=<?php echo $responseData['id']?>"></script>
<script>
var wpwlOptions = {
style:"card",
forceCardHolderEqualsBillingName: true,
paymentTarget:"_top",
labels:{
olpId:"SADAD Account ID"
}
}
</script>

<?php }?>
	</body>


</html>