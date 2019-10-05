<?php include "../includes/ini.php";
$id=m_fill("id",$_REQUEST);
//$id='6-hj';
checkofferdate();
$data=$con->fetch_array($con->query("select * from projects left join supplier on supplierid=pidsupplier left join category on categoryid=idcategory left join brands on brandsid=idbrands where projects.deleted='0' and projectsid='".m_prepare($id)."'"));
if($data['projectsid']==''){
	echo changelocation("products");
	exit();
}

$data['pquantity']=getstock($data['projectsid'],'','',session_id());?>
<?php checkofferdate();?>
<?php $pagetitle1="mproducts";
$pagetitle=$data['ptitlear']?>
<?php require "../classes/passwordgenerator.php";?>
        <?php  $args = array(
				'length'				=>	5,
				'alpha_upper_include'	=>	false,
				'alpha_lower_include'	=>	false,
				'number_include'		=>	true,
				'symbol_include'		=>	false,
			);
$object = new chip_password_generator($args);
	
$generatedid=$password = "Ref-".$object->get_password();?>
<!DOCTYPE html>
<html>
	

<head>
		<!-- Basic -->
		<meta charset="utf-8">
		<title> <?php echo $pagetitle?> | <?php echo $titlar?></title>
		
        
        
        <meta name="keywords" content="<?php echo $data['prodkey']?>" />
	<meta name="description" content="<?php echo strip_tags($data['prodmetatitle'])?>">
    <meta property="og:title" content="<?php echo $data['ptitlear']?>" />
    <meta property="og:description" content="<?php echo strip_tags($data['prodmetatitle'])?>" />
    <meta property="og:image" content="<?php echo $m_rooturl?>uploads/project_thumb/<?php echo $data['image']?>" />
    
    <meta name="twitter:card" content="summary">
    <meta property="twitter:title" content="<?php echo $data['ptitlear']?>" />
    <meta property="twitter:description" content="<?php echo strip_tags($data['prodmetatitle'])?>" />
    <meta property="twitter:image" content="<?php echo $m_rooturl?>uploads/project_thumb/<?php echo $data['image']?>" />
    
    <meta itemprop="name" content="<?php echo $data['ptitlear']?>">
    <meta itemprop="description" content="<?php echo strip_tags($data['prodmetatitle'])?>">
    <meta itemprop="image" content="<?php echo $m_rooturl?>uploads/project_thumb/<?php echo $data['image']?>">
        
        <?php
	$rating=isset($_REQUEST['rating'])?$_REQUEST['rating']:"5";
	$idproject=isset($_REQUEST['idproject'])?$_REQUEST['idproject']:"";
	$namee=isset($_REQUEST['namee'])?$_REQUEST['namee']:"";
	$comments=isset($_REQUEST['comments'])?$_REQUEST['comments']:"";
	
	
 if(isset($_REQUEST['send'])){
	 $generatedid=isset($_REQUEST['generatedid'])?$_REQUEST['generatedid']:$generatedid;
$img = new Securimage();
$valid = $img->check($_POST['code']);	

					 
	
			
if($valid == true) {
	$success=1;
	 if($success==1){
	$body='<table style="padding:5px">
									  <tr>
										<td style="vertical-align:top">Rating</td>
										<td>'.$rating.'</td>
									  </tr>
									  <tr>
									 
									 
									  <tr>
										<td style="vertical-align:top">Product</td>
										<td>'.$data['ptitlear'].'</td>
									  </tr>
									 
									  <tr>
										<td style="vertical-align:top">Name</td>
										<td>'.$namee.'</td>
									  </tr>
									  
									  <tr>
										<td style="vertical-align:top">Comments</td>
										<td>'.nl2br($comments).'</td>
									  </tr>
								    </table>';
									
									$feedback_created=date("Y-m-d H:i:s"); // we insert date created here . note the table name prefix
								 $feedback_modified=date("Y-m-d H:i:s"); // we insert date modified here . note the table name prefix
									
									 if(insert("feedback",array("idproject"=>m_prepare($idproject),
																					   "rating"=>m_prepare($rating),
																					   "namee"=>m_prepare($namee),
																					   "comments"=>m_prepare($comments),
																					   "ractive"=>m_prepare("Yes"),
												   "feedback_created"=>$feedback_created,
													"feedback_modified"=>$feedback_modified),$con)){
									  $insertidd=$con->insert_id();
									  update("feedback",array("feedbackid"=>$insertidd."-".$m_branch),"where dummy_feedbackid='$insertidd'",$con);
                                      
                                      $avg=$con->getcertainvalue("select *,avg(rating) as avgg from feedback where idproject='".$data['projectsid']."' and deleted='0'",array("avgg"=>"avgg"));
                                      $con->query("update projects set pdefaultrate='".number_format($avg['avgg'],2)."' where projectsid='".$data['projectsid']."'");
									 
									 }
									 
									

		 		
if(@!sendmail($company_email,$contact_email, $titl." product rating ",$body)) {
  $msg="<font class='itsnotok'>Error sending comment, please try again later</font>";
	
} else {
  $msg="<font class='itsok'>Your comments have been successfully sent</font>";
 // logs("","","","a comment has been submitted from contact us","","","website");
  //sendemailtoclient($email);
  $rating="";
	$namee="";
	$comments="";
}
	 }else{//if success
		 // $msg="<font class='itsnotok'>Please select resume</font>";
	 }
}else{
	$msg="<font class='itsnotok'>الرجاء إدخال قيمة اختبار كود صالحة</font>";
}

}?>
		
		<?php include "metastuff.php"?>
<link rel="shortcut icon" href="favicon.ico">
		<!-- الجوالSpecific Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- External Plugins CSS -->
		<link rel="stylesheet" href="../external/slick/slickar.css">
		<link rel="stylesheet" href="../external/slick/slick-themear.css">
		<link rel="stylesheet" href="../external/magnific-popup/magnific-popup.css">
		<link rel="stylesheet" href="../external/bootstrap-select/bootstrap-select.css">
		<!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
		<link rel="stylesheet" type="text/css" href="../external/rs-plugin/css/settings.css" media="screen" />
		<!-- Custom CSS -->
		<link rel="stylesheet" href="../css/style-layout11ar.css?v=1">
		<!-- Icon Fonts  -->
		<link rel="stylesheet" href="../font/style.css">
<link rel="stylesheet" href="../styles/fancybox.css">
<link type="text/css" href="../styles/notificationar.css" rel="stylesheet"  />
<link href="../css/barrating/css-stars.css" rel="stylesheet">
<style>
.slick-track li {list-style-type:none}
.clothdatacm img ,.clothdatainch img {max-width:100%!important;height:auto!important}
</style>
<script src="../external/jquery/jquery-2.1.4.min.js"></script>
<script src="../external/imagesloaded/imagesloaded.pkgd.min.js"></script>
<script src="../external/elevatezoom/jquery.elevatezoom.js"></script>
<script src="../external/slick/slick.min.js"></script>
<script src="../js/custom.js?v=4"></script>
<script>
function changecolor(x){
       if(x!=''){
        	if($j('.product-images-carousel ul').hasClass("slick-initialized")){
        	   $j('.product-images-carousel ul').slick('slickUnfilter')
                    $j('.product-images-carousel ul').slick('unslick');
                      }
                      if($j('#mobileGallery').hasClass("slick-initialized")){
        	   $j('#mobileGallery').slick('slickUnfilter')
                    $j('#mobileGallery').slick('unslick');
                      }
                      
                thumbnailsCarousel($j('.product-images-carousel ul'));  
                thumbnailsCarousel($j('#mobileGallery'));  	
        
        $j('.product-images-carousel ul').slick('slickFilter', jQuery(".colorimageholder[thecolor="+x.replace(" ","")+"]").parent());
        $j('#mobileGallery').slick('slickFilter', jQuery(".colorimageholder[thecolor="+x.replace(" ","")+"]").parent());
                
                 jQuery(".themainimage").hide()
        jQuery(".themainimage"+x.replace(" ","")).eq(0).show()
        
        $j.removeData($j('img'), 'elevateZoom');
      $j('.zoomContainer').remove();
        	elevateZoom();
            
                  
                    
        
        //	if($j('.product-images-carousel ul').hasClass("slick-initialized")){
                   // $j('.product-images-carousel ul').slick('unslick');
                  //  }
                    
        //$j('#smallGallery').slick('refresh');
        
        
        jQuery(".colorimageholder[thecolor="+x.replace(" ","")+"]").click()
        jQuery.post( "ajaxsize.php?id=<?php echo $data['projectsid']?>&name="+x, function( data ) {
					jQuery('.sizeholder').html(data)
                    
                    
        //jQuery(".zoomLens").css("width","100px")
        
                                        
                    

});
}else{
    	jQuery('.sizeholder').html(' <input type="hidden" name="thesize" id="thesize" value="">')
    }
        }
        
        function setmax(){
           tempm=jQuery('#thesize').attr("themaxx");
            if (typeof tempm !== typeof undefined && tempm !== false) {
                   var themax=tempm
                }else{
            var themax=(jQuery('option:selected', jQuery('#thesize')).attr('themax'))
            }
            thelabel=themax;
            if(typeof(themax)=='undefined'){
                
                themax="1"
                thelabel='يرجى الاختيار'
                }
                jQuery(".number").attr("maxx", themax);
            jQuery(".availabi").html(thelabel);
            
            jQuery("#quantity0").val("1");
            if(themax>0){
                jQuery(".quantityholder").show()
                }else{
                    jQuery(".quantityholder").hide()
                    }
            
            }
</script>
<style>
.pdesc {padding:10px}
.pdesc:nth-child(1),.pdesc:nth-child(2),.pdesc:nth-child(3),.pdesc:nth-child(4) {background-color:#28307e;color:#ffffff}
.pdesc:nth-child(9),.pdesc:nth-child(10),.pdesc:nth-child(11),.pdesc:nth-child(12) {background-color:#28307e;color:#ffffff}
.pdesc:nth-child(17),.pdesc:nth-child(18),.pdesc:nth-child(19),.pdesc:nth-child(20) {background-color:#28307e;color:#ffffff}
.pdesc:nth-child(25),.pdesc:nth-child(26),.pdesc:nth-child(27),.pdesc:nth-child(28) {background-color:#28307e;color:#ffffff}
.pdesc:nth-child(33),.pdesc:nth-child(34),.pdesc:nth-child(35),.pdesc:nth-child(36) {background-color:#28307e;color:#ffffff}
.pdesc:nth-child(41),.pdesc:nth-child(42),.pdesc:nth-child(43),.pdesc:nth-child(44) {background-color:#28307e;color:#ffffff}
.pdesc:nth-child(49),.pdesc:nth-child(50),.pdesc:nth-child(51),.pdesc:nth-child(52) {background-color:#28307e;color:#ffffff}

.video-container {
    position: relative;
    overflow: hidden;
    padding-top: 56.25%;
}

.video-container iframe{
    position: absolute;
    top: 0;
    right: 0;
    width: 100%;
    height: 100%;
    border: 0;
}

.slick-slide { float:left}

 .clothsizeholder {width:100%}
                                    .clothsizeholder td {padding:5px}
                                    .clothsizeholder tr:nth-child(even) {background: #f4f4f4}
</style>
		<!-- Head Libs -->
		<!-- Modernizr -->
		<script src="../external/modernizr/modernizr.js"></script>
	</head>
	<body>
		<?php include "loader.php"?>
		<!-- الرجوع to top -->
	    <div class="back-to-top"><span class="icon-keyboard_arrow_up"></span></div>
	    <!-- /الرجوع to top -->
	    <!-- mobile menu -->
		
	    <!-- /mobile menu -->
		<!-- HEADER section -->
		<?php include "header.php"?>
<div class="pageholder">
		<!-- End HEADER section -->
		<!-- breadcrumbs -->
		<div class="breadcrumbs">
			<div class="container">
				<ol class="breadcrumb breadcrumb--ys pull-right">
					<li class="home-link"><a href="index.php" class="icon icon-home"></a></li>
					<li><a href="products?s=<?php echo urlfriendlyi($data['snamear'])?>"><?php echo $data['snamear']?></a></li>
                    <li><a href="products?s=<?php echo urlfriendlyi($data['snamear'])?>&c=<?php echo urlfriendlyi($data['bnamear'])?>"><?php echo $data['bnamear']?></a></li>
              <li><?php echo $data['ptitlear']?></li>
				</ol>
			</div>
		</div>
		<!-- /breadcrumbs -->
		<!-- CONTENT section -->
		<div id="pageContent">
			<section class="content offset-top-0">
				<div class="container">
					<div class="row product-info-outer">
						<div class="col-sm-12 col-md-12 col-lg-12 col-xl-8">
							<div class="row">
								<div class="col-sm-5 hidden-xs">
									<div class="product-main-image">
                                    <?php echo gettopar($data)?>
                                    <?php if($data['imageb']!=''){?>
										<div class="product-main-image__item"><img class="product-zoom" src='../uploads/projects/<?php echo $data['imageb']?>'  data-zoom-image="../uploads/projects/<?php echo $data['imageb']?>" alt="" /></div>
                                        <?php }else{?>
                                        
                                         <?php $tempcount=0; $pp=$con->query("select * from projectspics left join colors on colorsid=iidcolor where idproject='".$data['projectsid']."' and projectspics.deleted='0'  group by colorname");
					while($p=$con->fetch_array($pp)){?>
                    <div class="product-main-image__item themainimage themainimage<?php echo str_replace(" ","",$p['colorname'])?>" style="<?php if($tempcount==0){?>display:bloock<?php }else{?>display:none<?php }?>"><img  class="product-zoom" src='../uploads/projects/<?php echo $p['image']?>'  data-zoom-image="../uploads/projects/<?php echo $p['image']?>" alt="" /></div>
                    <?php $tempcount++;}?>
                    
                                        <?php }?>
										<div class="product-main-image__zoom"></div>
									</div>
									<div class="product-images-carousel">
										<ul id="smallGallery">
                                        <?php if($data['imageb']!=''){?>
											<li><a href="#" data-image="../uploads/projects/<?php echo $data['imageb']?>" data-zoom-image="../uploads/projects/<?php echo $data['imageb']?>"><img src="../uploads/projects/<?php echo $data['imageb']?>" alt="" /></a></li>
                                            <?php }?>
                                        <?php if($data['imageb2']!=''){?>
											<li><a href="#" data-image="../uploads/projects/<?php echo $data['imageb2']?>" data-zoom-image="../uploads/projects/<?php echo $data['imageb2']?>"><img src="../uploads/projects/<?php echo $data['imageb2']?>" alt="" /></a></li>
                                            <?php }?>
                                            
                                            <?php if($data['imageb3']!=''){?>
											<li><a href="#" data-image="../uploads/projects/<?php echo $data['imageb3']?>" data-zoom-image="../uploads/projects/<?php echo $data['imageb3']?>"><img src="../uploads/projects/<?php echo $data['imageb3']?>" alt="" /></a></li>
                                            <?php }?>
                                            <?php $pp=$con->query("select * from projectspics left join colors on colorsid=iidcolor where idproject='".$data['projectsid']."' and duplicate='0' and projectspics.deleted='0' order by ppriority asc");
					while($p=$con->fetch_array($pp)){?>
                    <li ><a class="colorimageholder" href="#" thecolor="<?php echo str_replace(" ","",$p['colorname'])?>" data-image="../uploads/projects/<?php echo $p['image']?>" data-zoom-image="../uploads/projects/<?php echo $p['image']?>"><img src="../uploads/projects/<?php echo $p['image']?>" alt="" /></a></li>
                    <?php }?>
										</ul>
									</div>
									<!--<a href="http://www.youtube.com/watch?v=0O2aH4XLbto" class="video-link"><span class="icon icon-videocam"></span>Video</a>-->
								</div>
								<div class="product-info col-sm-7">
                                
									<div class="wrapper hidden-xs">
										<!--<div class="product-info__sku pull-right">SKU: <strong></strong></div>-->
										<!--<div class="product-info__availability pull-left">التوفر:   <?php if($data['pquantity']!=0){?><strong class="color">متوفر</strong><?php }else{?>غير متوفر<?php }?></div>-->
                                        <div class="product-info__availability pull-left">التوفر:  <span class="availabi"> <?php echo $data['pquantity']?></span></div>
                                        
									</div>
                                    
									<div class="product-info__title">
										<h1><?php echo $data['ptitlear']?></h1>
									</div>
                                    
                                    	<ul class="product-link">
										<li class="text-right"><a href="javascript:void()"  onClick="ajaxwishlist('<?php echo $data['projectsid']?>');return false;"><span class="icon icon-favorite_border  tooltip-link"></span><span class="text">أضف إلى قائمة الامنيات</span></a></li>
										
									</ul>
                                    
									<div class="wrapper visible-xs">
										<!--<div class="product-info__sku pull-right">SKU: <strong></strong></div>-->
										<!--<div class="product-info__availability pull-left">التوفر:   <?php if($data['pquantity']!=0){?><strong class="color">متوفر</strong><?php }else{?>غير متوفر<?php }?></div>-->
                                        <div class="product-info__availability pull-left">التوفر:  <span class="availabi"> <?php echo $data['pquantity']?></span></div>
									</div>
									<div class="visible-xs">
										<div class="clearfix"></div>
										<ul id="mobileGallery">
                                        <?php if($data['imageb']!=''){?>
											<li><a href="#" data-image="../uploads/projects/<?php echo $data['imageb']?>" data-zoom-image="../uploads/projects/<?php echo $data['imageb']?>"><img src="../uploads/projects/<?php echo $data['imageb']?>" alt="" /></a></li>
                                            <?php }?>
                                        <?php if($data['imageb2']!=''){?>
											<li><a href="#" data-image="../uploads/projects/<?php echo $data['imageb2']?>" data-zoom-image="../uploads/projects/<?php echo $data['imageb2']?>"><img src="../uploads/projects/<?php echo $data['imageb2']?>" alt="" /></a></li>
                                            <?php }?>
                                            <?php if($data['imageb3']!=''){?>
											<li><a href="#" data-image="../uploads/projects/<?php echo $data['imageb3']?>" data-zoom-image="../uploads/projects/<?php echo $data['imageb3']?>"><img src="../uploads/projects/<?php echo $data['imageb3']?>" alt="" /></a></li>
                                            <?php }?>
                                            <?php $pp=$con->query("select * from projectspics left join colors on colorsid=iidcolor where idproject='".$data['projectsid']."' and duplicate='0' and projectspics.deleted='0'");
					while($p=$con->fetch_array($pp)){?>
                    <li ><a class="colorimageholder" href="#" thecolor="<?php echo str_replace(" ","",$p['colorname'])?>" data-image="../uploads/projects/<?php echo $p['image']?>" data-zoom-image="../uploads/projects/<?php echo $p['image']?>"><img src="../uploads/projects/<?php echo $p['image']?>" alt="" /></a></li>
                    <?php }?>
										</ul>
									</div>
									<div class="price-box product-info__price"><?php echo convert($data['pspecialprice'], $_SESSION['hj_language'],'ar')?> <?php if($data['pspecialprice']!=$data['pprice']){?><span class="price-box__old" style="margin-top:5px"><?php echo convert($data['pprice'], $_SESSION['hj_language'],'ar')?> <span style="display:inline-block;font-size:20px;color:#fa6b6b;padding-right:20px">توفر <?php echo convert($data['pprice']-$data['pspecialprice'], $_SESSION['hj_language'],'ar')?> </span></span><?php }?></div>
                                    <div><i>* السعر شامل ضريبة القيمة المضافة </i></div>
									<div class="product-info__review">
										<?php echo getreviews($data['projectsid'])?>
									</div>
									<div class="divider divider--xs product-info__divider"></div>
									<div class="divider divider--sm"></div>
                                    
                                     <?php $query="select * from city where deleted='0' and ccountry='Saudi Arabia' and khasiya!=''  order by citypriority asc,cnameear asc";
                                     $khh=$con->query($query);
                                        if($con->num_rows($khh)!=0){?>
                                        <div style="clear:both">
                                        <div>للحصول على تفاصيل الوصول يرجى اختيار المدينة
                                        <select name="khasiyacity" id="khasiyacity" onChange="changekhasiya(this.value)">
                                        <option value=''></option>
                                        <?php while($kh=$con->fetch_array($khh)){?>
                                           <option value="<?php echo $kh['cityid']?>"><?php echo $kh['cnameear']?></option>
                                        <?php }?>
                                           
                                        </select></div>
                                        <?php 
                                         $khh=$con->query($query);
                                            while($kh=$con->fetch_array($khh)){?>
                                                
                                              <div style="display:none" class='khasiya khasiya<?php echo $kh['cityid']?>'>
                                                <?php echo nl2br($kh['khasiyaar'])?>
                                              </div>
                                            <?php }?>
                                       <br />
                                        <?php }?>
                                        
                                        
									<div class="wrapper">
                                   <div style="display:inline-block;vertical-align:top;padding-right:20px">
                                     <?php $hh=$con->query("select distinct colorname,colornamear from projectspics left join colors on colorsid=iidcolor where projectspics.deleted='0' and iquantity>0 and idproject='".$data['projectsid']."'");
                                     $colorcount=0;
									 if($con->num_rows($hh)!=0){?>
                                      اللون   <select onChange="changecolor(this.value)" name="thecolor" id="thecolor" style="padding:5px 10px;border:1px solid #cccccc">
                                               
                                               <?php while($h=$con->fetch_array($hh)){
                                                if($colorcount==0){
                                                    //get the first quantity as set it as pquantity
                                                     $data['pquantity']=$con->getcertainvalue("select * from projectspics where deleted='0' and idproject='".$data['projectsid']."' limit 1","iquantity");
                                                    ?>
                                                 <script>
                                                   changecolor('<?php echo $h['colorname']?>')
                                                 </script>
                                                <?php }?>
                                                 <option value="<?php echo $h['colorname']?>"><?php echo $h['colornamear']?></option>
                                               <?php $colorcount++;}?>
                                              </select>
                                     <br>  <br>                                              
                                     <?php }else{?>
                                     <input type="hidden" name="thecolor" id="thecolor" value="">
                                     <?php }?>
                                    </div>
                                    <div class="sizeholder" style="display:inline-block;vertical-align:top;padding-right:20px">
                                
                                     <input type="hidden" name="thesize" id="thesize" value="">
                                    
                                    </div>
                                    <div style="clear:both"></div>
                                    
                                    <?php if($data['pvideoar']!=''){?>
                                    <div style="display:inline-block;vertical-align:top;padding-left:20px;margin-bottom:20px">
                                      <i class="fa fa-video-camera" aria-hidden="true"></i> <a href="#vid" class="inline">شاهد الفيديو</a>
                                    </div>
                                    
                                    <div style="display:none">
                                      <div id="vid" style="">
            <div class="video-container" style="width:500px">
                     <iframe src="<?php echo $data['pvideoar']?>"  frameborder="0" allowfullscreen="allowfullscreen"></iframe>
                  </div> 
          </div>
                                    </div>
                                    <?php }?>
                                    
                                    
                                    <div class="quantityholder" <?php if($data['pquantity']<=0){?>style="display:none"<?php }?>>
										<div class="pull-right"><span class="qty-label">الكمية:</span></div>
										<div class="pull-right">
											<!--  -->
											<div class="number input-counter" maxx="<?php echo $data['pquantity']?>">
                                            <?php $countp=0;?>
											    <span class="minus-btn"></span>
											    <input type="text" name="quantity<?php echo $countp?>" id="quantity<?php echo $countp?>" value="1" size="5"/>
											    <span class="plus-btn"></span>
                                                
											</div>
                                            <input type="hidden" id="productsid<?php echo $countp?>" value="<?php echo $data['projectsid']?>" />
											<!-- / -->
										</div>
										<div class="pull-right"><button type="button" onClick="ajaxbasket('quantity<?php echo $countp?>','productsid<?php echo $countp?>');return false" class="btn btn--ys btn--xxl"><span class="icon icon-shopping_basket"></span> أضف الى السلة</button></div>
                                        </div>
                                        
                                        
                                       
                                        
                                        <div style="clear:both;float:left">
                                        <?php include "share.php"?></div>
                                        
									</div>
								
									<!-- Go to www.addthis.com/dashboard to customize your tools
									<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-552765a6695754de" async="async"></script>
									<div class="addthis_sharing_toolbox"></div> -->
								</div>
							</div>
                            
                            <?php if(isset($msg)){?>
                    <div class="row">
                     <div class="col-sm-12">
                               <?php echo $msg?>
                              </div>
                      </div>        
                                <?php }?>
                               
                               <div style="clear:both"></div> 
							<div class="content">
								<!-- Nav tabs -->
								<ul class="nav nav-tabs nav-tabs--ys1" role="tablist">
									<li class="active"><a href="#Tab1"  role="tab" data-toggle="tab" class="text-uppercase">الوصف</a></li>
                                    <li><a href="#Tab3"  role="tab" data-toggle="tab" class="text-uppercase">المواصفات</a></li>
                                    <?php if ($data['clothsizecmar']!=''){?>
                                    <li><a href="#Tab4"  role="tab" data-toggle="tab" class="text-uppercase">دليل المقاس</a></li>
                                    <?php }?>
									<li><a href="#Tab2" role="tab" data-toggle="tab" class="text-uppercase">التعليقات</a></li>
								</ul>
								<!-- Tab panes -->
								<div class="tab-content tab-content--ys nav-stacked">
									<div role="tabpanel" class="tab-pane active" id="Tab1">
										<p style="font-size:20px"><?php echo $data['desccar']?> </p>
										<div class="divider divider--md"></div>
										
									</div>
                                    
                                    <div role="tabpanel" class="tab-pane" id="Tab4">
                                          <div><input type="radio" name="clothradio" id="clothradio" value="cm" checked="" onClick="changeclothsize()"> سم <input type="radio" name="clothradio" id="clothradio" value="inch" onClick="changeclothsize()"> انش</div>
										<p style="font-size:20px">
                                        <div class="clothdatacm"><?php echo $data['clothsizecmar']?></div>
                                        <div class="clothdatainch" style="display:none"><?php echo $data['clothsizeinchar']?></div> </p>
										<div class="divider divider--md"></div>
										
									</div>
                                    
                                    <div role="tabpanel" class="tab-pane" id="Tab3">
									     <div class="row">
                                         <?php if($data['pcode']!=''){?>
                                              <div class="col-sm-3 col-xs-6 pdesc">كود المنتج </div>
                                              <div class="col-sm-3 col-xs-6 pdesc"><?php echo $data['pcode']?></div>
                                              <?php }?>
                                           <?php $gg=$con->query("select * from projectscolors left join colors on colorsid=idcolors where idproject='".$data['projectsid']."' ");
                                                                  $thedat='';
                                                                  while($g=$con->fetch_array($gg)){
                                                                    $thedat=$thedat."".$g['colornamear'].",";
                                                                    }?>
                                                                    <?php if($thedat!=''){?>
                                              <div class="col-sm-3 col-xs-6 pdesc">اللون</div>
                                              <div class="col-sm-3 col-xs-6 pdesc"><?php echo substr($thedat,0,-1)?></div>
                                                <?php }?>
                                                 <?php $gg=$con->query("select * from projectsmaterial left join material on materialid=idmaterial where idproject='".$data['projectsid']."' ");
                                                                  $thedat='';
                                                                  while($g=$con->fetch_array($gg)){
                                                                    $thedat=$thedat."".$g['materialnamear'].",";
                                                                    }?>
                                              <?php if($thedat!=''){?>
                                              <div class="col-sm-3 col-xs-6 pdesc">مادة الصنع</div>
                                              <div class="col-sm-3 col-xs-6 pdesc"><?php echo substr($thedat,0,-1)?></div>
                                              <?php }?>
                                               <?php if($data['plength']!=''){?>
                                              <div class="col-sm-3 col-xs-6 pdesc">طول المنتج</div>
                                              <div class="col-sm-3 col-xs-6 pdesc"><?php echo $data['plength']?> سم</div>
                                              <?php }?>
                                              <?php if($data['pheight']!=''){?>
                                              <div class="col-sm-3 col-xs-6 pdesc">ارتفاع المنتج</div>
                                              <div class="col-sm-3 col-xs-6 pdesc"><?php echo $data['pheight']?> سم</div>
                                              <?php }?>
                                              <?php if($data['pwidth']!=''){?>
                                              <div class="col-sm-3 col-xs-6 pdesc">عرض المنتج / العمق</div>
                                              <div class="col-sm-3 col-xs-6 pdesc"><?php echo $data['pwidth']?> سم</div>
                                              <?php }?>
                                              <?php if($data['pcapacity']!=''){?>
                                              <div class="col-sm-3 col-xs-6 pdesc">الوزن </div>
                                              <div class="col-sm-3 col-xs-6 pdesc"><?php echo $data['pcapacity']?></div>
                                              <?php }?>
                                              <?php if($data['ppower']!=''){?>
                                              <div class="col-sm-3 col-xs-6 pdesc">استهلاك الطاقة</div>
                                              <div class="col-sm-3 col-xs-6 pdesc"><?php echo $data['ppower']?> W</div>
                                              <?php }?>
                                              <?php if($data['pvoltage']!=''){?>
                                              <div class="col-sm-3 col-xs-6 pdesc">الجهد االكهربى</div>
                                              <div class="col-sm-3 col-xs-6 pdesc"><?php echo $data['pvoltage']?> V</div>
                                              <?php }?>
                                              <?php if($data['penergy']!=''){?>
                                              <div class="col-sm-3 col-xs-6 pdesc">الطاقة المستخدمة</div>
                                              <div class="col-sm-3 col-xs-6 pdesc"><?php echo $data['penergy']?></div>
                                              <?php }?>
                                              <?php if($data['pfrequency']!=''){?>
                                              <div class="col-sm-3 col-xs-6 pdesc">التكرر</div>
                                              <div class="col-sm-3 col-xs-6 pdesc"><?php echo $data['pfrequency']?> Hz</div>
                                              <?php }?>
                                              <?php if($data['pspeed']!=''){?>
                                              <div class="col-sm-3 col-xs-6 pdesc">السرعة</div>
                                              <div class="col-sm-3 col-xs-6 pdesc"><?php echo $data['pspeed']?> </div>
                                              <?php }?>
                                              <?php if($data['psizeml']!=''){?>
                                              <div class="col-sm-3 col-xs-6 pdesc">الحجم (مل)</div>
                                              <div class="col-sm-3 col-xs-6 pdesc"><?php echo $data['psizeml']?> </div>
                                              <?php }?>
                                               <?php if($data['psizegram']!=''){?>
                                              <div class="col-sm-3 col-xs-6 pdesc">الحجم (غرام)</div>
                                              <div class="col-sm-3 col-xs-6 pdesc"><?php echo $data['psizegram']?> </div>
                                              <?php }?>
                                               <?php if($data['psizeton']!=''){?>
                                              <div class="col-sm-3 col-xs-6 pdesc">الحجم (طن)</div>
                                              <div class="col-sm-3 col-xs-6 pdesc"><?php echo $data['psizeton']?> </div>
                                              <?php }?>
                                               <?php if($data['psizegalon']!=''){?>
                                              <div class="col-sm-3 col-xs-6 pdesc">الحجم (غالون)</div>
                                              <div class="col-sm-3 col-xs-6 pdesc"><?php echo $data['psizegalon']?> </div>
                                              <?php }?>
                                               <?php if($data['ppieces']!=''){?>
                                              <div class="col-sm-3 col-xs-6 pdesc">عدد القطع</div>
                                              <div class="col-sm-3 col-xs-6 pdesc"><?php echo $data['ppieces']?> </div>
                                              <?php }?>
                                               <?php if($data['pheightmeter']!=''){?>
                                              <div class="col-sm-3 col-xs-6 pdesc">الارتفاع (متر)</div>
                                              <div class="col-sm-3 col-xs-6 pdesc"><?php echo $data['pheightmeter']?> </div>
                                              <?php }?>
                                               <?php if($data['pheightfeet']!=''){?>
                                              <div class="col-sm-3 col-xs-6 pdesc">الارتفاع (قدم)</div>
                                              <div class="col-sm-3 col-xs-6 pdesc"><?php echo $data['pheightfeet']?> </div>
                                              <?php }?>
                                               <?php if($data['pcapacitygalon']!=''){?>
                                              <div class="col-sm-3 col-xs-6 pdesc">السعة (غالون)</div>
                                              <div class="col-sm-3 col-xs-6 pdesc"><?php echo $data['pcapacitygalon']?> </div>
                                              <?php }?>
                                               <?php if($data['pcapacityliter']!=''){?>
                                              <div class="col-sm-3 col-xs-6 pdesc">السعة (لتر)</div>
                                              <div class="col-sm-3 col-xs-6 pdesc"><?php echo $data['pcapacityliter']?> </div>
                                              <?php }?>
                                               <?php if($data['pcapacitygram']!=''){?>
                                              <div class="col-sm-3 col-xs-6 pdesc">السعة (غرام)</div>
                                              <div class="col-sm-3 col-xs-6 pdesc"><?php echo $data['pcapacitygram']?> </div>
                                              <?php }?>
                                               <?php if($data['pinsurance']!=''){?>
                                              <div class="col-sm-3 col-xs-6 pdesc">الضمان (سنوات)</div>
                                              <div class="col-sm-3 col-xs-6 pdesc"><?php echo $data['pinsurance']?>  سنة</div>
                                              <?php }?>
                                              
                                               <?php if($data['pnotes']!=''){?>
                                              <div class="col-sm-3 col-xs-6 pdesc">ملاحظات</div>
                                              <div class="col-sm-3 col-xs-6 pdesc"><?php echo $data['pnotes']?> </div>
                                              <?php }?>
                                              
                                           
                                         </div>
										<div class="divider divider--md"></div>
										
									</div>
									<div role="tabpanel" class="tab-pane" id="Tab2">
							       
                                   				
							 <?php $query="select * from feedback where deleted='0' and idproject='".m_prepare($data['projectsid'])."' and ractive='Yes' order by feedback_created desc";
							 
							 
												   if($con->num_rowsfast($query)!=0){
													   //pager
													   $thispage=isset($_REQUEST['thispage'])?$_REQUEST['thispage']:1;
													   $thispage1=isset($_REQUEST['thispage1'])?$_REQUEST['thispage1']:1;
													   $passingparams="thispage1=".$thispage1."&amp;id=".$data['projectsid'];
													   $passingparamssort="";
														$pager=new pagination($con->con,$query,$thispage,1000,$passingparams."&amp;".$passingparamssort);
														  $pager->type="normal"; //dropdown,normal
														  $pager->pagingdistance="2"; //it is the distance of upper and lower part of the page number,can be 0 to show all the records
														  $pager->prev="<";
														  $pager->next=">";
														  $pager->first="<<";
														  $pager->last=">>";
														  $pager->showifonepage=false;
														  
														  //pager
													   $res = $pager->paginate();
													   $n=0;?>
                                                      
                                                       <?php while($ress=$con->fetch_array($res)){
														   
														   if($n>=2){
															   $n=-1;
															 
														   }else{
															
														   }?>
                                  <div style="clear:both;border-bottom:1px solid #cccccc;margin-bottom:10px">
                                  
                                  <div style="float:right;width:100px;margin-left:20px"><?php echo formatdate($ress['feedback_created'],'M d Y')?><br>
                                 							 <?php if($ress['rating']=="1") echo "<img src='../images/star.png' alt='star'>"?>
                                                             <?php if($ress['rating']=="2") echo "<img src='../images/star.png' alt='star'><img src='../images/star.png' alt='star'>"?>
                                                             <?php if($ress['rating']=="3") echo "<img src='../images/star.png' alt='star'><img src='../images/star.png' alt='star'><img src='../images/star.png' alt='star'>"?>
                                                             <?php if($ress['rating']=="4") echo "<img src='../images/star.png' alt='star'><img src='../images/star.png' alt='star'><img src='../images/star.png' alt='star'><img src='../images/star.png' alt='star'>"?>
                                                             <?php if($ress['rating']=="5") echo "<img src='../images/star.png' alt='star'><img src='../images/star.png' alt='star'><img src='../images/star.png' alt='star'><img src='../images/star.png' alt='star'><img src='../images/star.png' alt='star'>"?>
                                                             </div>
                                  <div style="overflow:hidden">
                                    <div style="font-weight:bold"><?php echo $ress['namee']?></div>
                                    <div><?php echo nl2br($ress['comments'])?></div>
                                  </div>
                                  </div>
                                  
                                <?php $n++;}?>
           							 <br />
                                     <div class="clear"></div>
                                                       <table style="padding:5px">
                                                            <tr>
                                                              <td><?php $pager->first()?></td>
                                                              <td><?php $pager->previous()?></td>
                                                              <td><?php $pager->render()?></td>
                                                              <td><?php $pager->next()?></td>
                                                              <td><?php $pager->last()?></td>
                                                            </tr>
                                                          </table>
            <?php }?>
					
					
                                  
				
				<form enctype="multipart/form-data" name="form" method="post" action="<?php echo $_SERVER['PHP_SELF']?>" onSubmit="return m_submit()">
                        <input type="hidden" name="send" value="1" />
                        <input type="hidden" name="generatedid" value="<?php echo $generatedid?>" />
                        <input type="hidden" name="idproject" value="<?php echo $data['projectsid']?>" />
                        <input type="hidden" name="id" value="<?php echo $data['projectsid']?>" />
                        
            <div class="row" style="">
              <div>
              <div class="col-sm-6" >
                <div class="inputEntity" style="float:right"><label>التقييم</label><select name="rating" id="rate">
              													  <option value="1" <?php if($rating=='1'){?>selected="selected"<?php }?>>1</option>
                                                                   <option value="2" <?php if($rating=='2'){?>selected="selected"<?php }?>>2</option>
                                                                   <option value="3" <?php if($rating=='3'){?>selected="selected"<?php }?>>3</option>
                                                                   <option value="4" <?php if($rating=='4'){?>selected="selected"<?php }?>>4</option>
                                                                   <option value="5" <?php if($rating=='5'){?>selected="selected"<?php }?>>5</option>
                </select></div>
                <div style="clear:both;line-height:1px!important">&nbsp;</div>
                </div>
                
                <div class="col-sm-6">
                <div class="inputEntity"><label>الاسم *</label><input type="text" name="namee" id="namee" value="<?php echo $namee?>" ></div>
                </div>
                
                <div class="col-sm-6">
                <div class="inputEntity"><label>ملاحظات *</label><textarea name="comments" id="comments"><?php echo $comments?></textarea></div>
                </div>
                
                <div class="col-sm-6">
                <div class="inputEntity"><label>ادخل الكود *</label>
                <div style="margin-bottom:10px">
                <img id="siimage" alt='verification' align="right" style="border: 1px solid #d2d7d5" src="../classes/secureimage/securimage_show.php?sid=<?php echo md5(time()) ?>" />
                                    <div style="clear:both;line-height:1px">&nbsp;</div>
                                    <input type="text" name="code" id="code" size="12" style="position:relative;top:8px;width:90%;display:inline-block" />
                                    <a tabindex="-1" style="border-style: none" href="#" title="Refresh Image" onClick="document.getElementById('siimage').src = '../classes/secureimage/securimage_show.php?sid=' + Math.random(); return false"><img src="../classes/secureimage/images/refresh.gif" alt="Reload Image" border="0" onClick="this.blur()" align="bottom" style="position:relative;top:10px" /></a>
                </div>
                </div>
                </div>
                
                <div class="col-sm-12">
                
                <div class="inputEntity"><em class="blue">الحقول التي تحمل علامة * هي حقول إلزامية.</em></div>
                <div class="btnsHolder"><input type="submit" value="إرسال" class="btn btn-primary"></div>
                </div>
              </div>
            </div>
            <div style="clear:both"></div>
            
            </form>	
						</div>
									
									
									
								</div>
							</div>
						</div>
						
					</div>
				</div>
			</section>
			<!-- related products -->
            
            
			<section class="content">
				<div class="container">
					<!-- title -->
					<div class="title-with-button">
						<div class="carousel-products__center pull-left"> <span class="btn-prev"></span> <span class="btn-next"></span> </div>
						<h2 class="text-right text-uppercase title-under pull-right">قد تكون مهتم أيضا في المنتجات التالية</h2>
					</div>
					<!-- /title -->
					<!-- carousel -->
					<div class="carousel-products row" id="carouselRelated">
                    
                     <?php $countp="1";
      $query="select * from projects left join supplier on supplierid=pidsupplier left join category on categoryid=idcategory left join brands on brandsid=idbrands left join subcategory on subcategoryid=idsubcategory where projects.deleted='0' and (prodactive='Yes' or prodactive='OOS') and idcategory='".$data['idcategory']."'   limit 20";
     $res=$con->query($query);
        
        while($ress=$con->fetch_array($res)){

             if($ress['image']!=''){
															   $img="../uploads/project_thumb/".$ress['image']."";
														   }else{
															   $img="../uploads/static/default_thumb.jpg";
														   }?>
		
	<div class="col-xs-6 col-sm-3 col-md-6 col-lg-3 col-xl-one-fifth">
                            <input type="hidden" id="productsid<?php echo $countp?>" value="<?php echo $ress['projectsid']?>" />
                                                           <input type="hidden" id="quantity<?php echo $countp?>" value="1" />
								<!-- product -->
								<div class="product">
									<div class="product__inside">
										<!-- product image -->
										<div class="product__inside__image">
                                        <?php echo gettopar($ress)?>
											<a href="product?id=<?php echo $ress['projectsid']?>"> <img src="<?php echo $img?>" alt=""> </a>
											<!-- quick-view -->
											<a href="quickview?id=<?php echo $ress['projectsid']?>" class="inline_i quick-view"><b><span class="icon icon-visibility"></span> نظرة سريعة</b> </a> 
											<!-- /quick-view -->
										</div>
										<!-- /product image -->
                                        
                                         
										<!-- product name -->
										<div class="product__inside__name">
											<h2><a href="product?id=<?php echo $ress['projectsid']?>"><?php echo wordslice($ress['ptitlear'])?></a></h2>
										</div>
										<!-- /product name -->                 <!-- product description -->
										<!-- visible only in row-view mode -->
										
										<!-- /product description -->                 <!-- product price -->
										<div class="product__inside__price price-box"><?php echo convert($ress['pspecialprice'], $_SESSION['hj_language'],'ar')?> <?php if($ress['pspecialprice']!=$ress['pprice']){?><span class="price-box__old"><?php echo convert($ress['pprice'], $_SESSION['hj_language'],'ar')?></span><?php }?></div>
										<!-- /product price -->
										<!-- product review -->
										<!-- visible only in row-view mode -->
										<div class="product__inside__review row-mode-visible">
											<?php echo getreviews($ress['projectsid'])?>
										</div>
										<!-- /product review -->
										<div class="product__inside__hover">
											<!-- product info -->
											<div class="product__inside__info">
												<div class="product__inside__info__btns"> 
                                                <?php if(colorexists($ress['projectsid'])){?>
                                                <a href="quickview?id=<?php echo $ress['projectsid']?>"  id="addtocartholder" class="inline_i  btn btn--ys btn--xl"><span class="icon icon-shopping_basket"></span>  أضف الى السلة</a>
                                                <?php }else{?>
                                                <a href="javascript:void()" id="addtocartholder"  onClick="ajaxbasket('quantity<?php echo $countp?>','productsid<?php echo $countp?>');return false" class="btn btn--ys btn--xl"><span class="icon icon-shopping_basket"></span> أضف الى السلة</a>
                                                <?php }?>
													<a href="javascript:void()"  onClick="ajaxwishlist('<?php echo $ress['projectsid']?>');return false;" class="btn btn--ys btn--xl visible-xs"><span class="icon icon-favorite_border"></span></a>
													
												</div>
												<ul class="product__inside__info__link hidden-sm">
													<li class="text-right"><span class="icon icon-favorite_border  tooltip-link"></span><a href="javascript:void()"  onClick="ajaxwishlist('<?php echo $ress['projectsid']?>');return false;"><span class="text">أضف إلى قائمة الامنيات</span></a></li>
													
												</ul>
											</div>
											<!-- /product info -->
											<!-- product rating -->
											<div class="rating row-mode-hide"> <?php echo getreviews($ress['projectsid'])?> </div>
											<!-- /product rating -->
										</div>
									</div>
								</div>
								<!-- /product -->
							</div>
                            <?php $countp++;}?>
						
						
						
						
						
						
						
					</div>
					<!-- /carousel -->
				</div>
			</section>
			<!-- /related products -->
		</div>
		<!-- End CONTENT section -->
		<!-- FOOTER section -->
		</div>
<?php include "footer.php"?>
		<!-- END FOOTER section -->
		<!-- Modal (quickViewModal) -->
		
		<!-- / Modal (quickViewModal) -->
		<!-- External JS -->
		<!-- jQuery 1.10.1-->
		
		<!-- Bootstrap 3-->
		<script src="../external/bootstrap/bootstrap.min.js"></script>
		<!-- Specific Page External Plugins -->
		
		<script src="../external/bootstrap-select/bootstrap-select.min.js"></script>
		<script src="../external/countdown/jquery.plugin.min.js"></script>
		<script src="../external/countdown/jquery.countdown.min.js"></script>
		<script src="../external/instafeed/instafeed.min.js"></script>
		<script src="../external/magnific-popup/jquery.magnific-popup.min.js"></script>
		<script src="../external/nouislider/nouislider.min.js"></script>
		
		
		<script src="../external/colorbox/jquery.colorbox-min.js"></script> 
        <script src="../js/fancybox.js"></script> 
<script type="text/javascript" src="../js/notification.js"></script><script src="../js/functions.js"></script>
<script src="../js/barrating.js"></script>
 <?php include "extrascripts.php"?>
		<!-- Custom -->
		
		<script>
			$j(document).ready(function() {
			 
             $j('#rate').barrating({
        theme: 'css-stars'
      });       


				// Init All Carousel
				productCarousel($j('#megaMenuCarousel1'),1,1,1,1,1);
				verticalCarousel($j('.vertical-carousel-1'),2);
                
                if($j('.product-images-carousel ul').hasClass("slick-initialized")){
                    }else{
				thumbnailsCarousel($j('.product-images-carousel ul'));
                }
                
                if($j('#mobileGallery').hasClass("slick-initialized")){
                    }else{
				thumbnailsCarousel($j('#mobileGallery'));
                }
                
				productCarousel($j('#carouselRelated'),6,4,4,2,1);
				verticalCarousel($j('.vertical-carousel-2'),3);
				


				elevateZoom();

			})
			
			function ajaxbasket(quan,id){
	quant=$j('#'+quan).val()
	idd=$j('#'+id).val()
	color=$j('#thecolor').val()
	size=$j('#thesize').val()
    
    if(size=='pleaseselect'){
        alert("يرجى اختيار الحجم")
        return false
        }
	  $j.ajax({
		  url: 'ajaxbasket.php?add=1&quantity='+quant+'&productsid='+idd+'&color='+color+'&size='+size,
		  beforeSend: function ( xhr ) {}
		}).done(function ( data ) {
		   if(data=="added"){
			     $j.post( "gettotalcart.php", function( data ) {
							  $j('.cart-count').html( data );
							});
				$j.post( "gettotalamount.php", function( data ) {
							  $j('.cart-amount').html( data );
							});			
			    showNotification({
                                    message: "تمت إضافة  المنتج بنجاح",
                                    type: "success",
									autoClose: true,
                            duration: 2
                                });
		   }else{
			    showNotification({
                                    message: data,
                                    type: "error",
									autoClose: true,
                            duration: 2
                                });
		   }
		   
		});
	  
	  //$j('.page').parent().css('background','url(../images/menuon.png) no-repeat')
	   //$j(this).parent().css('background','url(../images/menuoff.png) no-repeat')
}

function ajaxwishlist(id){
	//idd=$j('#'+id).val()
	  $j.ajax({
		  url: 'ajaxwishlist.php?add=1&productsid='+id,
		  beforeSend: function ( xhr ) {
			         
		          }
		}).done(function ( data ) {
		   if(data=="added"){
                      showNotification({
                                    message: "تمت الإضافة لقائمة الأمنيات بنجاح",
                                    type: "success",
									autoClose: true,
                            duration: 2
                                });
		   }else if(data=="notlogged"){
			    window.location='signlog.php?standalone=1'
		   }else{
			   showNotification({
                                    message: data,
                                    type: "error",
									autoClose: true,
                            duration: 2
                                });
		   }
		   
		});
	  
	  //$j('.page').parent().css('background','url(../images/menuon.png) no-repeat')
	   //$j(this).parent().css('background','url(../images/menuoff.png) no-repeat')
}

function changeclothsize(){
    
    if($j('input[name=clothradio]:checked', '').val()=='inch'){
          $j(".clothdatacm").hide()
             $j(".clothdatainch").show()
        }else{
             $j(".clothdatacm").show()
             $j(".clothdatainch").hide()
            }
}

function m_submit(){
		
		 var variabl="rate"
		if($j('#'+variabl).val()==''){
			  $j('#'+variabl).addClass("errorclass")
				  if(!$j('#'+variabl+'-error').length){
				   $j('#'+variabl).after("<div id='"+variabl+"-error' class='errorclass1'>حقل الزامي</div>")
				  }
				 $j('#'+variabl).focus()
				 return false
		}else{
			$j('#'+variabl).removeClass("errorclass")
			$j('#'+variabl+'-error').remove()
		} 
		
		
		
		var variabl="namee"
		if($j('#'+variabl).val()==''){
			  $j('#'+variabl).addClass("errorclass")
				  if(!$j('#'+variabl+'-error').length){
				   $j('#'+variabl).after("<div id='"+variabl+"-error' class='errorclass1'>حقل الزامي</div>")
				  }
				 $j('#'+variabl).focus()
				 return false
		}else{
			$j('#'+variabl).removeClass("errorclass")
			$j('#'+variabl+'-error').remove()
		} 
		
		var variabl="comments"
		if($j('#'+variabl).val()==''){
			  $j('#'+variabl).addClass("errorclass")
				  if(!$j('#'+variabl+'-error').length){
				   $j('#'+variabl).after("<div id='"+variabl+"-error' class='errorclass1'>حقل الزامي</div>")
				  }
				 $j('#'+variabl).focus()
				 return false
		}else{
			$j('#'+variabl).removeClass("errorclass")
			$j('#'+variabl+'-error').remove()
		} 
		
	
		
		 var variabl="code"
		if($j('#'+variabl).val()==''){
			  $j('#'+variabl).addClass("errorclass")
				  if(!$j('#'+variabl+'-error').length){
				   $j('#'+variabl).before("<div id='"+variabl+"-error' class='errorclass1'>حقل الزامي</div>")
				  }
				 $j('#'+variabl).focus()
				 return false
		}else{
			$j('#'+variabl).removeClass("errorclass")
			$j('#'+variabl+'-error').remove()
		} 
   
	

	return true

}

function changekhasiya(x){
    
    $j('.khasiya').hide();
    if(x!=''){
    $j('.khasiya'+x).show();
    }
    }
    
    
		</script>
	</body>


</html>