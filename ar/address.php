<?php include "../includes/ini.php"?>
<?php $pagetitle1="maddress";
$pagetitle="العنوان"?>
<!DOCTYPE html>
<html>
	

<head>
		<!-- Basic -->
		<meta charset="utf-8">
		<title><?php echo $titlar?> | <?php echo $pagetitle?></title>
		<meta name="keywords" content="" />
		<meta name="description" content="<?php echo $titlar?>">
        
        <?php 
if(!isset($_SESSION['hj_id'])){
	echo changelocation("cart");
}

$aa['pickupdate']=date("Y-m-d");
	$aa['pickuptime']="00:00";
    
    $myaddress=m_fill("myaddress",$_REQUEST);
	
	$aa_raw['pickupdate']=m_fill("pickupdate",$_REQUEST);
	$aa_raw['pickuptime']=m_fill("pickuptime",$_REQUEST);
	$aa_raw['giftcheck']=m_fill("giftcheck",$_REQUEST);
	$aa_raw['sgiftprice']="10";
	$aa_raw['sgift']=m_fill("sgift",$_REQUEST);
	$aa_raw['sshipping']=m_fill("sshipping",$_REQUEST);
	$aa_raw['sshippingprice']="0";

if(isset($_REQUEST['register'])){
	
	$s_raw['scity']=m_fill("scity",$_REQUEST);
	$s_raw['saddress']=m_fill("saddress",$_REQUEST);
    $s_raw['spostalcode']=m_fill("spostalcode",$_REQUEST);
	$s_raw['sadditional']=m_fill("sadditional",$_REQUEST);
	$s_raw['scountry']=m_fill("scountry",$_REQUEST);
	$s_raw['stel']=m_fill("stel",$_REQUEST);
	$s_raw['sfax']=m_fill("sfax",$_REQUEST);
	$s_raw['smobile']=m_fill("smobile",$_REQUEST);
    $s_raw['alat']=m_fill("alat",$_REQUEST);
    $s_raw['along']=m_fill("along",$_REQUEST);
    $s_raw['azoom']=m_fill("azoom",$_REQUEST);
	$s=m_prepareall($s_raw);
	
	$_SESSION['sgift']='';
		$_SESSION['sgiftprice']='0';
	//}
	
	$_SESSION['sshipping']=$aa_raw['sshipping'];
	$_SESSION['sshippingprice']=$aa_raw['sshippingprice'];
	$_SESSION['pickupdate']=$aa_raw['pickupdate'];
	$_SESSION['pickuptime']=$aa_raw['pickuptime'];

$duplicate=0;
	 // if(recordexists("access","accessid",array("email"=>$a['email']),'')){
		//  $duplicate="<font class='itsnotok'>بريد الالكتروني موجود</font>";
	 // }
     
      $pc=$con->getcertainvalue("select * from countries where name='".$s_raw['scountry']."'","haspostal");
	  if($pc!=''){
		  $pcc=explode(",",$pc);
		  $pclength=0;
		  foreach($pcc as $pc1=>$pc2){
			  if(strlen(trim($pc2))>$pclength){
				  $pclength=strlen(trim($pc2));
			  }
		  }
		  
	  if(trim($s_raw['spostalcode'])=='' || strlen($s_raw['spostalcode'])>$pclength || strpos($s_raw['spostalcode'], " ") !== false    || preg_match('/[a-z]/i', $s_raw['spostalcode'])){
		     $duplicate="<font class='itsnotok'>الرمز البريد  is mandatory for delivery address (".$pc.")</font>";
	  }
      
      
	  }
      
      if(trim($s_raw['alat'])=='0' || trim($s_raw['alat'])==''){
		     $duplicate="<font class='itsnotok'>يرجى تحديد موقعك على الخريطة</font>";
	  }
      
      
      if($_SESSION['sshipping']=='ARAMEX'){
     $shipping=getcostfixed($s_raw['scountry'],$s_raw['scity'],$s_raw['spostalcode']);
     
    
      if($shipping==0){
            $duplicate="<font class='itsnotok'>الشحن غير موجود لمدينتك</font>";
        }
      }
      
     
      
      
	  
	  if($duplicate=='0'){
		 if($myaddress=='' || $myaddress=='Default'){
		  update("access",array("alat"=>$s['alat'],"along"=>$s['along'],"azoom"=>$s['azoom'],"postalcode"=>$s['spostalcode'],"city"=>$s['scity'],"address"=>$s['saddress'],"additional"=>$s['sadditional'],"country"=>$s['scountry'],"mobile"=>$s['smobile'],"tel"=>$s['stel'],"fax"=>$s['sfax'],),"where accessid='".m_prepare($_SESSION['hj_id'])."'",$con);
          }
			 $_SESSION['scountry']=$s_raw['scountry'];
			 $_SESSION['scity']=$s_raw['scity'];
			 $_SESSION['saddress']=$s_raw['saddress'];
             $_SESSION['spostalcode']=$s_raw['spostalcode'];
			 $_SESSION['sadditional']=$s_raw['sadditional'];
			 $_SESSION['scountry']=$s_raw['scountry'];
			 $_SESSION['stel']=$s_raw['stel'];
             $_SESSION['slat']=$s_raw['alat'];
             $_SESSION['slong']=$s_raw['along'];
             $_SESSION['szoom']=$s_raw['azoom'];
			 $_SESSION['sfax']=$s_raw['sfax'];
			 $_SESSION['smobile']=$s_raw['smobile'];
			 
		 echo changelocation("checkout");
		 
		 
	  }else{
		  $msg1=$duplicate;
	  }
}

if($myaddress=='' || $myaddress=='Default'){
@$data=$con->getcertainvalue("select * from access where accessid='".m_prepare($_SESSION['hj_id'])."'",array("alat"=>"alat","along"=>"along","azoom"=>"azoom","postalcode"=>"postalcode","address"=>"address","additional"=>"additional","city"=>"city","country"=>"country","tel"=>"tel","fax"=>"fax","mobile"=>"mobile"));
}else{
    @$data=$con->getcertainvalue("select * from addresses where addressesid='".m_prepare($myaddress)."'",array("alat"=>"alat","along"=>"along","azoom"=>"azoom","postalcode"=>"postalcode","address"=>"address","additional"=>"additional","city"=>"city","country"=>"country","tel"=>"tel","fax"=>"fax","mobile"=>"mobile"));
}

if($data['country']==''){
        $data['country']='Saudi Arabia';
        }


?>
		
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
		<link rel="stylesheet" href="../css/style-layout11ar.css?v=2">
		<!-- Icon Fonts  -->
		<link rel="stylesheet" href="../font/style.css">
<link rel="stylesheet" href="../styles/fancybox.css">
<link type="text/css" href="../styles/notificationar.css" rel="stylesheet"  />
<link rel="stylesheet" type="text/css" media="all" href="../styles/jquery_ui_theme.css" />
<style>
.ui-autocomplete {width:300px!important}
.ui-autocomplete a {font-size:12px}
</style>
		<!-- Head Libs -->
		<!-- Modernizr -->
		<script src="../external/modernizr/modernizr.js"></script>
        <!-- jQuery 1.10.1--> 
		<script src="../external/jquery/jquery-2.1.4.min.js"></script>
         <script type='text/javascript' src='../js/jquerymigrate.js'></script>
        <script type='text/javascript' src='../js/jqueryui.js'></script> 
		 
        <script type="text/javascript" src="https://maps.google.com/maps/api/js?key=AIzaSyDpEXfSZ8Y3ltYLG6-HaiUx32S0FrQqi9w"></script>
<script type="text/javascript" src="../js/functions.js"></script>
	</head>
	<body class="index">
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
            <div class="row">
            
            <div class="col-sm-6">
                <div  style="margin:0;border:1px solid #cccccc;padding:10px;padding-top:20px;margin-bottom:20px">
                <h3>عناويني</h3>
                <div>
                  <select name="myaddress" id="myaddress" onChange="window.location='address?myaddress='+this.value">
                   <option value="Default">العنوان الرئيسي </option>
                   <?php $phh=$con->query("select * from addresses left join access on accessid=idaccess where idaccess='".$_SESSION['hj_id']."'");
			   while($ph=$con->fetch_array($phh)){?>
               <option value="<?php echo $ph['addressesid']?>" <?php if($ph['addressesid']==$myaddress){?>selected="selected"<?php }?>><?php echo $ph['addressesname']?></option>
               <?php }?>
                  </select> &nbsp;&nbsp;(<a href="editprofile" style="color:blue">اضافة عنوان </a>)
                </div>
                </div>
            </div>    
            <?php if($data['alat']=='0'){
                    if(isset($_SESSION['hajer_lat'])){
                        $data['alat']=$_SESSION['hajer_lat'];
                        }
                    }?>
                    <?php if($data['along']=='0'){
                    if(isset($_SESSION['hajer_long'])){
                        $data['along']=$_SESSION['hajer_long'];
                        }
                    }?>
                
                <div class="col-sm-12">
                <form enctype="multipart/form-data" name="form1" method="post" action="" onSubmit="return m_submit1()">
                        <input type="hidden" name="register" value="1" />
                        <input type="hidden" name="alat" id="alat" value="<?php echo $data['alat']?>" />
                        <input type="hidden" name="along" id="along" value="<?php echo $data['along']?>" />
                        <input type="hidden" name="azoom" id="azoom" value="<?php echo $data['azoom']?>" />
                        
                       
                <div class="row">
                
                <div class="col-sm-6">
                <div  style="margin:0;border:1px solid #cccccc;padding:10px;padding-top:20px">
                <h3>الموقع</h3>
                
                
                <div class="input-with-icon  left">                                       
							<i class=""></i>
							 <div id="map" style="width: 100%; height: 450px"></div>
              <script type="text/javascript">
			  var gicons = [];
			  gicons["red"] = new google.maps.MarkerImage("../images/icon2.png",
		      new google.maps.Size(32, 37),
		      new google.maps.Point(0,0),
		      new google.maps.Point(16, 34));
			  var gmarkers = [];
              
              var geocoder = new google.maps.Geocoder;
		      
		      var map = null;
			  var myOptions = {
							  
							  <?php if($data['alat']!='0'){?>
                              zoom: <?php echo $data['azoom']?>,
							  center: new google.maps.LatLng(<?php echo $data['alat']?>,<?php echo $data['along']?>),
							  <?php }else{?>
                              zoom: 5,
							  <?php if(isset($_SESSION['hajer_lat'])){?>
							  center: new google.maps.LatLng(<?php echo $_SESSION['hajer_lat']?>,<?php echo $_SESSION['hajer_long']?>),
                              <?php }else{?>
                              center: new google.maps.LatLng(23.885942,45.079162),
                              <?php }?>
							  <?php }?>
							  draggableCursor:'crosshair',
							  mapTypeId: google.maps.MapTypeId.HYBRID //ROADMAP SATELLITE HYBRID TERRAIN
								}
																	    map = new google.maps.Map(document.getElementById("map"), myOptions);
																		google.maps.event.addListener(map, 'click', function(e){
																		 //first remove all markers
																		  for (var i = 0; i < gmarkers.length; i++ ) {
																					  gmarkers[i].setMap(null);
																					}	
																		 $j('#alat').val(e.latLng.lat().toString() )
																		 $j('#along').val(e.latLng.lng().toString() )
																		 $j('#azoom').val(map.getZoom())
                                                                         
                                                                         geocodeLatLng(geocoder, map,e.latLng.lat().toString(),e.latLng.lng().toString() )
																		 
																		   var point =  new google.maps.LatLng(e.latLng.lat().toString(),e.latLng.lng().toString());
																		  var html = "";
																		  var category = "red"
																		  // create the marker
																		   var marker = createNormalMarkerAdmin(point,name,html,category);
																		});	
																		
																		<?php if($data['alat']!='0'){?>
																		 var point =  new google.maps.LatLng(<?php echo $data['alat']?>,<?php echo $data['along']?>);
																		  var html = "";
																		  var category = "red"
																		  // create the marker
																		   var marker = createNormalMarkerAdmin(point,name,html,category);
																		 <?php }?>  
                                                                         
                                                                          function geocodeLatLng(geocoder, map,latt,longg) {
                                                                                var latlng = {lat: parseFloat(latt), lng: parseFloat(longg)};
                                                                                geocoder.geocode({'location': latlng}, function(results, status) {
                                                                                  if (status === 'OK') {
                                                                                    if (results[0]) {
                                                                                        $j("#saddress").val(results[0].formatted_address)
                                                                                    } else {
                                                                                      window.alert('No results found');
                                                                                    }
                                                                                  } else {
                                                                                    window.alert('Geocoder failed due to: ' + status);
                                                                                  }
                                                                                });
                                                                              }
                                                                              
                                                                               $(document).ready(function($j) {
																					var geocoder= new google.maps.Geocoder();
         $j("#saddress").autocomplete({
         
           source: function(request, response) {

          if (geocoder == null){
           geocoder = new google.maps.Geocoder();
          }
             geocoder.geocode( {'address': request.term }, function(results, status) {
               if (status == google.maps.GeocoderStatus.OK) {

                  var searchLoc = results[0].geometry.location;
               var lat = results[0].geometry.location.lat();
                  var lng = results[0].geometry.location.lng();
                  var latlng = new google.maps.LatLng(lat, lng);
                  var bounds = results[0].geometry.bounds;
				  
				  

                  geocoder.geocode({'latLng': latlng}, function(results1, status1) {
                      if (status1 == google.maps.GeocoderStatus.OK) {
                        if (results1[1]) {
                         response($j.map(results1, function(loc) {
                        return {
                            label  : loc.formatted_address,
                            value  : loc.formatted_address,
                            bounds   : loc.geometry.bounds,
							latitude: loc.geometry.location.lat(),
							longitude: loc.geometry.location.lng()
                          }
                        }));
                        }
                      }
                    });
            }
              });
           },
           select: function(event,ui){
      var pos = ui.item.position;
      var lct = ui.item.locType;
      var bounds = ui.item.bounds;
	  
	   for (var i = 0; i < gmarkers.length; i++ ) {
							  gmarkers[i].setMap(null);
						}	
					 $j('#alat').val(ui.item.latitude.toString() )
					 $j('#along').val(ui.item.longitude.toString() )
					 $j('#azoom').val(map.getZoom())
				  
				   var point =  new google.maps.LatLng(ui.item.latitude.toString(),ui.item.longitude.toString());
				  var html = "";
				  var category = "red"
			  // create the marker
			   var marker = createNormalMarkerAdmin(point,name,html,category);

      if (bounds){
       map.fitBounds(bounds);
      }
           }
         });
     });
																		</script>
						</div>
                
              </div>
              </div>
                <div class="col-sm-6">
                <div  style="margin:0;border:1px solid #cccccc;padding:10px;padding-top:20px">
                <h3>عنوان التوصيل</h3>
                
              
                        
            <?php if(isset($msg1)){?>
                  <?php echo $msg1?>
               <?php }?>
                <div class="btnsHolder" style="text-align:right;display:none"><input class="btn btn-primary" type="button" onClick="changeaddress()"  value="نفس عنوان المنزل" style="max-width:270px"></div>
                 <div style="line-height:10px">&nbsp;</div>
              <div>
               <div class="inputEntity sshipment scountry" ><label for="scountry">البلد <font class="itsnotok">*</font></label><?php //echo dropdown(array('ownn'=>'0'),"countries","name","name","","","scountry","","-","class='span12 selectt'")?>
               <?php echo  dropdown(array('ownn'=>'0'),"countries","name","namear","where deleted='0'","changecity1(this.value)","scountry",$data['country'],"","class='span12 selectt'")?></div>
               
                <div class="inputEntity select"><label for="scity">المدينة <font class="itsnotok">*</font></label>
                <div style="position:relative" class="customcityholder1">
                    <select name="scity" id="scity">
                    <?php $cci=$con->query("select * from city where 1=2  order by ccountry asc,cnamee asc");
					while($cco=$con->fetch_array($cci)){?>
                      <option value="<?php echo $cco['cnamee']?>"><?php echo $cco['cnameear']?></option></li>
                      <?php }?>
                    </select>
                </div>
                </div>
                
               <!-- <div class="inputEntity"><label for="scountry">البلد</label><?php //echo dropdown(array('ownn'=>'0'),"countries","name","name","","","scountry","","-","class='span12 selectt'")?>-->
                
                
                <div class="inputEntity"><label for="saddress">شركة شحن  <font class="itsnotok">*</font></label>
                <?php $shh=$con->query("select * from company where deleted='0' and companyactive='Yes' order by companypriority asc,companyname asc");
                while($sh=$con->fetch_array($shh)){?>
                <div style="direction:rtl">
                 <input type="radio" name="sshipping" id="sshipping" value="<?php echo $sh['companyname']?>"  style="display:inline-block;width:15px;height:15px">
                 <?php if($sh['companyimage']!=''){?>
                   <img src="../uploads/company/<?php echo $sh['companyimage']?>" style="width:50px">&nbsp;
                 <?php }?>
                  <?php echo $sh['companylabelar']?><br /><br />
                  </div>
                <?php }?>
                
                </div>
                <div class="inputEntity"><label for="saddress">اسم العنوان   <font class="itsnotok">*</font></label><input type="text" name="saddress" id="saddress" maxlength="50" value="<?php echo $data['address']?>"  ></div>
                <div class="inputEntity"><label for="saddress">الرمز البريد  </label><input type="text" name="spostalcode" id="spostalcode" maxlength="50" value="<?php echo $data['postalcode']?>"  ></div>
                <!--<div class="inputEntity"><label for="stel">Tel</label></div>-->
                
                 <!--<div class="inputEntity"><label for="sfax">Fax</label></div>-->
                
                  <div class="inputEntity"><label for="smobile">الجوال<font class="itsnotok">*</font></label><input type="text" maxlength="10" name="smobile" id="smobile" value="<?php echo $data['mobile']?>" placeholder="05xxxxxxxx" ></div>
                  <div class="inputEntity"><label for="sadditional">ملاحظات  ووقت التسليم المفضل</label><textarea type="text" name="sadditional" id="sadditional"><?php echo $data['additional']?></textarea></div>
              </div>
              </div>
            
           
            
                </div>
                
            
           
            
                </div>
                </div>
                 <div style="clear:both">&nbsp;</div>
                 
                        
               
              <div class="">
                
               

                
                <input type="hidden" name="pickupdate" id="pickupdate" value="<?php echo date("Y-m-d",strtotime('today'))?>"/>
                <input type="hidden" name="pickuptime" id="pickuptime" value="09:00"/>
                <br><br>
              
              
               <!-- <h3>Gift</h3><br>
                
                <input type="checkbox" name="giftcheck" id="giftcheck"> I would like my order to be gift-wrapped.(Additional cost of $10.00	(tax excl.))
                
                <br><br>
                If you wish, you can add a note to the gift<br><br>
                <textarea name="sgift" id="sgift" style="width:100%;height:70px"></textarea>
                <br><br>
                -->
                <div style="padding:0px 10px"> 
                 <h3>شروط الخدمة</h3><br>
                
                <input type="checkbox" name="termcheck" id="termcheck" style="">  أوافق على شروط الخدمة وسوف ألتزم بها دون قيد أو شرط. <a href="#readterms" class="inline">(اقرأ سياسات الموقع)</a>
                <div id="readterms" style="display:none">
                  <div style="padding:10px">
                 <?php echo $alls['mprivacy']['fieldar']?>
                  </div>
                </div>
                </div>
                
             
                
               
            </div>
            <br><br>
                <div style="clear:both">&nbsp;</div>
           
              
              
                <div class="btnsHolder" style="text-align:right;float:right;width:30%"><input class="btn btn-primary" type="button" onClick="window.location='cart'" value="الرجوع"></div>
                <div class="btnsHolder" style="text-align:left;float:left;width:30%"><input class="btn btn-primary" type="submit" value="التالي"></div>
                <div style="clear:both">&nbsp;</div>
                </form>
            
                </div>
                
                
                </div>
            </div>
                <div class="bottommargin">&nbsp;</div>
			</section>
			
			
				
		</div>
		<!-- End CONTENT section -->
		<!-- FOOTER section -->
		</div>
<?php include "footer.php"?>
		<!-- END FOOTER section -->		




		
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
			
			function changeaddress(){
	$j('#scity').val($j('#city').val()).change()
	$j('#scountry').val($j('#country').val())
	$j('#saddress').val($j('#address').val())
	$j('#sadditional').val($j('#additional').val())
	$j('#sfax').val($j('#fax').val())
	$j('#smobile').val($j('#mobile').val())
	$j('#stel').val($j('#tel').val())
}

function changecity1(x){
	$j.post( "ajaxcity1.php?name="+x, function( data ) {
					$j('.customcityholder1').html(data)
					//$('#scity').val($('#city').val()).change()
					<?php if($data['city']!=''){?>
					$j('#scity').val('<?php echo $data['city']?>').change()
					<?php }?>
     
});
	}
	
	 changecity1('<?php echo $data['country']?>')


function m_submit1(){
    
    var variabl="sshipping"
	 if (!$j("input[name='sshipping']:checked").val()) {
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
	
	
    var variabl="scity"
	if($j('#'+variabl).val().trim()==''){
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
	
	
	
	var variabl="saddress"
	if($j('#'+variabl).val().trim()=='' || $j('#'+variabl).val().trim().length<5){
		  $j('#'+variabl).addClass("errorclass")
			  if(!$j('#'+variabl+'-error').length){
			   $j('#'+variabl).after("<div id='"+variabl+"-error' class='errorclass1'>حقل إلزامي 5 أحرف على الأقل</div>")
			  }
			 $j('#'+variabl).focus()
			 return false
	}else{
		$j('#'+variabl).removeClass("errorclass")
		$j('#'+variabl+'-error').remove()
	}
	

	
	
	
	var variabl="smobile"
	if($j('#'+variabl).val().trim()==''){
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
	
	 var variabl="smobile"
	if(isNaN($j('#'+variabl).val().trim())){
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
	
	
	
	var date = new Date;

var hour = date.getHours();
var minutes= date.getMinutes()<10?'0':''
minutes=minutes+date.getMinutes()


	if($j('#pickupdate').val()==$j('#todayy').val()){
		if(hour+''+minutes>1500){
			alert("same day delivery must be placed before 3 pm")
			return false
		}
		
		//check if the pickup time is less than actual time
		if(parseInt($j('#pickuptime').val().replace(":", ""))<=parseInt(hour+''+minutes)){
			
			alert("delivery time must be more than now")
			return false
		}
		
	}
	//if($j('#pickupdate').val()==$j('#tomorrow').val()){
	//	if(hour+''+minutes<=1500){
		//	alert("next day delivery must be placed after 3 pm")
		//	return false
		//}
	//}
	
	
	if($j('#termcheck').is(':checked')===false){
		alert("يرجى الموافقة على سياسة الخصوصية")
		return false
		}
	
	
		
	return true
}		
		</script>
	</body>


</html>