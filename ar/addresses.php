<?php include "../includes/ini.php"?>
<?php $pagetitle1="meditprofile";
$pagetitle="الملف الشخصي"?>
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
	echo changelocation("index");
	exit();
}

$code=m_fill("code",$_REQUEST);


$a_raw['idaccess']=$_SESSION['hj_id'];
	$a_raw['addressesname']=m_fill("addressesname",$_REQUEST);
    $a_raw['country']=m_fill("country",$_REQUEST,'Saudi Arabia');
    $a_raw['city']=m_fill("city",$_REQUEST);
    $a_raw['mobile']=m_fill("mobile",$_REQUEST);
    $a_raw['address']=m_fill("address",$_REQUEST);
    $a_raw['postalcode']=m_fill("postalcode",$_REQUEST);
    $a_raw['alat']=m_fill("alat",$_REQUEST,"0");
    $a_raw['along']=m_fill("along",$_REQUEST,"0");
    $a_raw['azoom']=m_fill("azoom",$_REQUEST,"0");


	if(isset($_REQUEST['register'])){
	$a=m_prepareall($a_raw);
if($code==''){
$duplicate=0;
	  
	  
	  //if(recordexists("access","accessid",array("ausername"=>$a['ausername']),'',"and deleted='0'")){
	//	  $duplicate="<font class='itsnotok'>Username Already Exists</font>";
	 // }
	  
	  
	  if($duplicate=='0'){
		        $a["addresses_created"]=date("Y-m-d H:i:s"); // we insert date created here . note the table name prefix
				$a["addresses_modified"]=date("Y-m-d H:i:s"); // we insert date modified here . note the table name prefix
				$a['addressesactive']="Yes";
				
				  if(insert("addresses",$a,$con)){
				    $insertidd=$con->insert_id();
				    update("addresses",array("addressesid"=>$insertidd."-".$m_branch),"where dummy_addressesid='$insertidd'",$con);
							  $code=$insertidd."-".$m_branch;
					  $msg="<font class='itsok'>تم الحفظ</font>";
                      
                      echo changelocation("editprofile");
					  }
	  }else{
		  $msg=$duplicate;
	  }
      
      }else{
        
	  $duplicate=0;
	  //if(recordexists("access","accessid",array("ausername"=>$a['ausername']),'',"and deleted='0'")){
	//	  $duplicate="<font class='itsnotok'>Username Already Exists</font>";
	 // }
	  
	  
	  if($duplicate=='0'){
		         $a["addresses_created"]=date("Y-m-d H:i:s"); // we insert date created here . note the table name prefix
				$a["addresses_modified"]=date("Y-m-d H:i:s"); // we insert date modified here . note the table name prefix
				$a['addressesactive']="Yes";
				
				  if(update("addresses",$a,"where addressesid='".m_prepare($code)."'",$con)){
					  $msg="<font class='itsok'>تم الحفظ</font>";
					  }
	  }else{
		  $msg=$duplicate;
	  }
      }
}

if($code!=''){
	
	$h=$con->query("select * from addresses where addressesid='".m_prepare($code)."'");
$hh=$con->fetch_array($h);
$a_raw=m_displayall($hh);
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
		<link rel="stylesheet" href="../css/style-layout11ar.css">
		<!-- Icon Fonts  -->
		<link rel="stylesheet" href="../font/style.css">
<link rel="stylesheet" href="../styles/fancybox.css">
 <link rel="stylesheet" type="text/css" media="all" href="../styles/jquery_ui_datepicker.css" />
<link rel="stylesheet" type="text/css" media="all" href="../styles/jquery_ui_theme.css" />
<style>
.ui-autocomplete {width:300px!important}
.ui-autocomplete a {font-size:12px}
</style>

<link type="text/css" href="../styles/notificationar.css" rel="stylesheet"  />
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
            <div class="row" style="margin:0;border:1px solid #cccccc;padding-top:20px;padding-bottom:20px">
                <div>
                <?php if($a_raw['alat']=='0'){
                    if(isset($_SESSION['hajer_lat'])){
                        $a_raw['alat']=$_SESSION['hajer_lat'];
                        }
                    }?>
                    <?php if($a_raw['along']=='0'){
                    if(isset($_SESSION['hajer_long'])){
                        $a_raw['along']=$_SESSION['hajer_long'];
                        }
                    }?>
                 <form enctype="multipart/form-data" name="form1" method="post" action="" onSubmit="return m_submit1()">
                        <input type="hidden" name="register" value="1" />
                        <input type="hidden" name="alat" id="alat" value="<?php echo $a_raw['alat']?>" />
                        <input type="hidden" name="along" id="along" value="<?php echo $a_raw['along']?>" />
                        <input type="hidden" name="azoom" id="azoom" value="<?php echo $a_raw['azoom']?>" />
               
               <?php if(isset($msg)){?>
                  <div style="padding-right:10px;text-align:right"><?php echo $msg?></div>
               <?php }?>
              
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
							  
							  <?php if($a_raw['alat']!='0'){?>
                              zoom: <?php echo $a_raw['azoom']?>,
							  center: new google.maps.LatLng(<?php echo $a_raw['alat']?>,<?php echo $a_raw['along']?>),
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
																		
																		<?php if($a_raw['alat']!='0'){?>
																		 var point =  new google.maps.LatLng(<?php echo $a_raw['alat']?>,<?php echo $a_raw['along']?>);
																		  var html = "";
																		  var category = "red"
																		  // create the marker
																		   var marker = createNormalMarkerAdmin(point,name,html,category);
																		 <?php }?>  
                                                                         
                                                                         	<?php if($a_raw['alat']=='0'){?>
                                                                            <?php if(isset($_SESSION['hajer_lat'])){?>
																		 var point =  new google.maps.LatLng(<?php echo $_SESSION['hajer_lat']?>,<?php  echo $_SESSION['hajer_long']?>);
																		  var html = "";
																		  var category = "red"
																		  // create the marker
																		   var marker = createNormalMarkerAdmin(point,name,html,category);
                                                                           <?php }?>
																		 <?php }?>  
                                                                         
                                                                          function geocodeLatLng(geocoder, map,latt,longg) {
                                                                                var latlng = {lat: parseFloat(latt), lng: parseFloat(longg)};
                                                                                geocoder.geocode({'location': latlng}, function(results, status) {
                                                                                  if (status === 'OK') {
                                                                                    if (results[0]) {
                                                                                        $j("#address").val(results[0].formatted_address)
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
         $j("#address").autocomplete({
         
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
                <h3>العنوان</h3>
                
              
                        
           
                <div class="btnsHolder" style="text-align:right;display:none"><input class="btn btn-primary" type="button" onClick="changeaddress()"  value="Same as Home العنوان" style="max-width:270px"></div>
                 <div style="line-height:10px">&nbsp;</div>
              <div>
              <div class="inputEntity"><label>اسم العنوان  </label><input type="text" name="addressesname" id="addressesname" value="<?php echo $a_raw['addressesname']?>"></div>
               <div class="inputEntity sshipment scountry" ><label for="scountry">البلد <font class="itsnotok">*</font></label><?php //echo dropdown(array('ownn'=>'0'),"countries","name","name","","","scountry","","-","class='span12 selectt'")?>
               <?php echo  dropdown(array('ownn'=>'0'),"countries","name","namear","where deleted='0'","changecity(this.value)","country",$a_raw['country'],"","class='span12 selectt'")?></div>
               
                <div class="inputEntity select"><label for="scity">المدينة <font class="itsnotok">*</font></label>
                <div style="position:relative" class="customcityholder1">
                    <select name="city" id="city">
                    <?php $cci=$con->query("select * from city where 1=2  order by ccountry asc,cnamee asc");
					while($cco=$con->fetch_array($cci)){?>
                      <option value="<?php echo $cco['cnamee']?>"><?php echo $cco['cnameear']?></option></li>
                      <?php }?>
                    </select>
                </div>
                </div>
                
               <!-- <div class="inputEntity"><label for="scountry">البلد</label><?php //echo dropdown(array('ownn'=>'0'),"countries","name","name","","","scountry","","-","class='span12 selectt'")?>-->
                
                
                <div class="inputEntity"><label for="saddress">العنوان  <font class="itsnotok">*</font></label><input type="text" name="address" id="address" maxlength="50" value="<?php echo $a_raw['address']?>"  ></div>
                <div class="inputEntity"><label for="saddress">الرمز البريد  </label><input type="text" name="postalcode" id="postalcode" maxlength="50" value="<?php echo $a_raw['postalcode']?>"  ></div>
                <!--<div class="inputEntity"><label for="stel">Tel</label></div>-->
                
                 <!--<div class="inputEntity"><label for="sfax">Fax</label></div>-->
                
                  <div class="inputEntity"><label for="smobile">الجوال<font class="itsnotok">*</font></label><input type="text" maxlength="10" name="mobile" id="mobile" value="<?php echo $a_raw['mobile']?>" placeholder="05xxxxxxxx" ></div>
              </div>
              </div>
            
           
            
                </div>
                
            
           
            
                
              
              <div class="col-sm-12">
               <div class="btnsHolder"><input class="btn btn-primary" type="submit" value="الحفظ"></div>
              </div>
              
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
				
				$j('#dob').datepicker({
												dateFormat:'yy-mm-dd',
											//minDate:'0',
											 showAnim:'fadeIn',
											autoSize: true,
											changeMonth: true,
										  changeYear: true,
										  yearRange: "-69:-18"
											});
			
				// Init All Carousel			
			
				productCarousel($j('#megaMenuCarousel1'),1,1,1,1,1);
				blogCarousel($j('.slider-blog'),1,1,1,1,1);
				
				
		
			 })
			
	function changecity(x){
	$j.post( "ajaxcity.php?name="+x, function( data ) {
					$j('.customcityholder1').html(data)
					//$('#scity').val($('#city').val()).change()
					<?php if($a_raw['city']!=''){?>
					$j('#city').val('<?php echo $a_raw['city']?>').change()
					<?php }?>
     
});
	}
	
	 changecity('<?php echo $a_raw['country']?>')		

function m_submit1(){
	
	
    var variabl="addressesname"
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
	

    
     var variabl="city"
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
	
	
	
	var variabl="address"
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
	

	
	
	
	var variabl="mobile"
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
	
	 var variabl="mobile"
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
		
		
		
	return true
}		
		</script>
	</body>


</html>