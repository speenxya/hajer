<?php include "../includes/ini.php"?>
<?php $pagetitle1="mcart";
$pagetitle="Shopping Cart"?>
<?php syncbasket(session_id());?>
<!DOCTYPE html>
<html>
	

<head>
		<!-- Basic -->
		<meta charset="utf-8">
		<title><?php echo $titl?> | <?php echo $pagetitle?></title>
		<meta name="keywords" content="" />
		<meta name="description" content="<?php echo $titl?>">
        <?php 

if(isset($_REQUEST['status'])){
			if(@$_SESSION['subtotal']<"10"){
				$msg="<font class='itsnotok'>Total Product must not be less than 10</font>";
			}else{
				echo changelocation("signlog.php");
			}
}

if(isset($_REQUEST['msg'])){
    $msg="<font class='itsnotok'>There are non available products in your cart , it has been updated</font>";
    }

if(isset($_REQUEST['update'])){

	$up_id=m_fill("id",$_REQUEST);
	$quan=m_fill("quan",$_REQUEST);
	$color=m_fill("color",$_REQUEST);
	$size=m_fill("size",$_REQUEST);
	$cc=$con->getcertainvalue("select * from projects where projectsid='".m_prepare($up_id)."'",array("pcode"=>"pcode","projectsid"=>"projectsid","ptitle"=>"ptitle","pprice"=>"pprice","pspecialprice"=>"pspecialprice","pquantity"=>"pquantity","pminquantity"=>"pminquantity"));
	$cc['pquantity']=getstock($cc['projectsid'],$color,$size,session_id());

	
	
	if(isset($cc['projectsid'])){
		if(is_int($quan) || ($quan!='0' && $quan!='')){ 
			if($quan>$cc['pquantity']+$m[$up_id.':::'.$color.':::'.$size]){ //we added +m[product] so that the basket does not count his own from the basketitems table
				$msg="<font class='itsnotok'>The quantity you requested is not available at this time</font>";
			}else{
				$bas->update_cart($up_id.":::".$color.":::".$size,$quan);
				updatebasket($up_id,$quan,session_id(),$color,$size,@$_SESSION['hj_id']); //updating the basket table
				$msg="<font class='itsok'>Cart updated successfully</font>";
			}
	     }else{
		$msg="<font class='itsnotok'>Quantity is not valid</font>";
	}		
	}else{
		$msg="<font class='itsnotok'>Product not found</font>";
	}
	


}

if(isset($_REQUEST['delete'])){
	$codes="";
	for($i=0;$i<$_REQUEST['countt'];$i++){
		if(isset($_REQUEST['chk'.$i])){
		  
		   $bas->remove_cart($_REQUEST['chk'.$i]);
		   $myprod=explode(':::',$_REQUEST['chk'.$i]);
		   basketremove($myprod[0],session_id(),$myprod[1],$myprod[2],@$_SESSION['hj_id']);
		    $datap=$con->fetch_array($con->query("select *  from projects left join category on categoryid=idcategory where projectsid='".$myprod[0]."'"));?>
           <?php 
	   }
	}?>
<?php }?>
		
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
				<div class="container">
                <?php if(isset($msg)){
					echo $msg;
				}?>
                <form name="form2" method="post">
        <input type="hidden" name="delete" value="1">
        <div class="tablescroller">
        <table style="text-align:centerborder-collapse:collapse;width:100%">
         <tr>
           <td colspan="4"><div style="margin-bottom:10px"><i>Minimum order is <?php echo $_SESSION['hj_language']?> 10 </i></div></td>
        </tr>
         <tr>
           <td nowrap="nowrap" width="3%" class="smallmobile" style="text-align:center;background-color:#1a3282;color:#fff;border:1px solid #cccccc;padding:10px"><input type="checkbox" name="chckall" onClick="checkall(this.checked,document.form2.countt.value)"></td>
           <td nowrap="nowrap" width="21%" class="smallmobile hideinmobile" style="text-align:center;background-color:#1a3282;color:#fff;border:1px solid #cccccc;padding:10px"><strong>Image</strong></td>
           <td nowrap="nowrap" width="32%" class="smallmobile" style="text-align:center;background-color:#1a3282;color:#fff;border:1px solid #cccccc;padding:10px"><strong>Item</strong></td>
           <td nowrap="nowrap" width="7%" class="smallmobile" style="text-align:center;background-color:#1a3282;color:#fff;border:1px solid #cccccc;padding:10px"><strong>Available Qty</strong></td>
           <td nowrap="nowrap" width="7%" class="smallmobile" style="text-align:center;background-color:#1a3282;color:#fff;border:1px solid #cccccc;padding:10px"><strong>Qty</strong></td>
           <td nowrap="nowrap" width="10%" class="smallmobile" style="text-align:center;background-color:#1a3282;color:#fff;border:1px solid #cccccc;padding:10px"><strong>Unit Price</strong></td>
         </tr>
         <?php $countt="0";
		       $subtotal="0";?>
         <?php if($bas->get_cart()){
			 foreach($bas->get_cart() as $a=>$b){
				 $aa=explode(":::",$a);
				 $cc=$con->getcertainvalue("select * from projects left join category on categoryid=idcategory left join supplier on supplierid=idsupplier where projectsid='".$aa[0]."'",array("projectsid"=>"projectsid","image"=>"image","ptitle"=>"ptitle","pprice".getptype()=>"pprice".getptype(),"pspecialprice".getptype()=>"pspecialprice".getptype(),"bname"=>"bname","sname"=>"sname"));
				 //special price or not
				
				 $pricee=$cc['pspecialprice'.getptype()];
                 $stockav=getstock($aa[0],$aa[1],$aa[2],session_id(),$original='1');
                 
                 
                 $cc['image']=colorimage($aa[0],$aa[1]);
                 ?>
         <tr>
           <td nowrap="nowrap" style="text-align:center;border:1px solid #cccccc;padding:5px"><input type="checkbox" name="chk<?php echo $countt?>" id="chk<?php echo $countt?>" value="<?php echo $a?>"> <input type="hidden" name="quant<?php echo $countt?>" id="quant<?php echo $countt?>" value="<?php echo $b?>"></td>
           <td nowrap="nowrap"  class="hideinmobile" style="border:1px solid #cccccc;padding:5px;text-align:center"><?php if($cc['image']!=''){?><a href="<?php echo $cc['image']?>" rel="cart" class="inline"><img src="<?php echo $cc['image']?>" alt='<?php echo str_replace("'",'`',$cc['ptitle'])?>' style="width:50%"></a><?php }?></td>
           <td  style="border:1px solid #cccccc;padding:5px;text-align:center"  class="smallmobile"><a target=_blank href="product?id=<?php echo $cc['projectsid']?>"><?php echo $cc['ptitle']?></a>
            <?php if(($aa[1]!='')){?><div style="font-size:12px">Color: <?php echo $aa[1]?></div><?php }?>
           <?php if(($aa[2])!=''){?><div style="font-size:12px">Size: <?php echo $aa[2]?></div><?php }?></td>
           <td nowrap="nowrap" style="border:1px solid #cccccc;padding:5px;text-align:center"><?php echo $stockav?></td>
           <td nowrap="nowrap" style="border:1px solid #cccccc;background-color:#1e3386;padding:5px;text-align:center" class="smallreducepadding"><div style=";padding-left:10px;padding-right:10px;padding-top:2px" class="smallreducepadding" >
           														<a class="smallmobile" style="color:#ffffff" href="javascript:changequan('-',<?php echo $countt?>,<?php echo $stockav?>)">- </a>&nbsp;
           														<span class="smallmobile"  style="color:#ffffff" id="quan<?php echo $countt?>_1"><?php echo $b?></span><input type="hidden" name="quan<?php echo $countt?>" id="quan<?php echo $countt?>" value="<?php echo $b?>" onKeyPress="return onlynumbers_dot(event)" style="width:25px;border:1px solid #cccccc;padding:1px">
                                                               &nbsp;<a class="smallmobile"  style="color:#ffffff" href="javascript:changequan('+',<?php echo $countt?>,<?php echo $stockav?>)">+ </a><br>
           													    <a class="smallmobile" href="javascript:;" onClick="window.location='?update=1&quan='+$j('#quan<?php echo $countt?>').val()+'&id=<?php echo $cc['projectsid']?>&color=<?php echo $aa[1]?>&size=<?php echo $aa[2]?>'" style="color:#ffffff;text-decoration:underline">Update</a>
                                                                </div></td>
           <td nowrap="nowrap" style="border:1px solid #cccccc;padding:5px;text-align:right" class="smallmobile"><?php echo convert($pricee, $_SESSION['hj_language'],'en')?></td>
         </tr>
         <?php $subtotal=$subtotal+($b*$pricee);
		  $countt++;
		  }?>
        <?php }else{?>
         <tr>
           <td colspan="5" style="text-align:center">No Items Found</td>
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
        
         <?php if($bas->get_cart()){?>
         <table style="padding:0">
         <tr>
           <td colspan="2"><div style="line-height:5px">&nbsp;</div><input style="background-color:red;border:none" type="button" class="butt" value="Delete" onClick="dome()"></td>
         </tr>
         </table>
         
         <?php }?>
         
         <?php if($bas->get_cart()){?>
         
         <table style="width:100%" >
         <tr>
          <td style="padding-top:10px">
             <table style="padding:0"  align="right">
              <tr>
               <td colspan="5" align="right">
                 <table>
                  <tr>
                    <td>Items Total (VAT Included):</td>
                    <td align="right"><?php echo convert($subtotal, $_SESSION['hj_language'],'en')?>
                    <?php $_SESSION['subtotal']=$subtotal?></td>
                  </tr>
                  
                 </table>
               <br /><br />
               <input type="button" value="Next" class="btn btn-primary" onClick="window.location='cart?status=check'" style="width:200px" /></td>
             </tr>
              </table>
        </td>
        </tr>
        </table>
             <?php }else{?>
             </table>
             <?php }?>
         
       
        
        <input type="hidden" name="countt" value="<?php echo $countt?>" />
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
			$j(document).ready(function() {
			
				// popup ini			
				$j('.quick-view').magnificPopup({
					type: 'ajax'
				});
			
				// Init All Carousel			
			
				productCarousel($j('#megaMenuCarousel1'),1,1,1,1,1);
				blogCarousel($j('.slider-blog'),1,1,1,1,1);
				
				
		
			 })
			
			function changequan(typ,coun,maxx){
	valu=$j('#quan'+coun+'').val()
	if(typ=="-"){
		 valu--;
		 if(valu<=1){
			 valu=1;
		 }
		 $j('#quan'+coun+'_1').html(valu)
		 $j('#quan'+coun+'').val(valu)
	}else{
		 valu++;
		 if(valu>maxx){
			 valu=maxx;
		 }
		 $j('#quan'+coun+'_1').html(valu)
		 $j('#quan'+coun+'').val(valu)
	}
}
		</script>
	</body>


</html>