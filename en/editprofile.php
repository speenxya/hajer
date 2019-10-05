<?php include "../includes/ini.php"?>
<?php $pagetitle1="meditprofile";
$pagetitle="Edit Profile"?>
<!DOCTYPE html>
<html>
	

<head>
		<!-- Basic -->
		<meta charset="utf-8">
		<title><?php echo $titl?> | <?php echo $pagetitle?></title>
		<meta name="keywords" content="" />
		<meta name="description" content="<?php echo $titl?>">
        
         <?php 
if(!isset($_SESSION['hj_id'])){
	echo changelocation("index");
	exit();
}

if(isset($_REQUEST['deleteaddress'])){
	$con->query("delete from addresses where addressesid='".$_REQUEST['deleteaddress']."'");
	
}


	$a_raw['fname']=m_fill("fname",$_REQUEST);
	$a_raw['lname']=m_fill("lname",$_REQUEST);
	$a_raw['email']=m_fill("email",$_REQUEST);
	$a_raw['mobile']=m_fill("mobile",$_REQUEST);
	$a_raw['dob']=m_fill("dob",$_REQUEST);
	//$a_raw['ausername']=m_fill("ausername",$_REQUEST);
	$a_raw['apassword']=m_fill("apassword",$_REQUEST);
    
    $a_raw['country']=m_fill("country",$_REQUEST);
    $a_raw['city']=m_fill("city",$_REQUEST);
    $a_raw['mobile']=m_fill("mobile",$_REQUEST);
    $a_raw['address']=m_fill("address",$_REQUEST);
    $a_raw['postalcode']=m_fill("postalcode",$_REQUEST);
    $a_raw['alat']=m_fill("alat",$_REQUEST);
    $a_raw['along']=m_fill("along",$_REQUEST);
    $a_raw['azoom']=m_fill("azoom",$_REQUEST);


	if(isset($_REQUEST['register'])){
	$a=m_prepareall($a_raw);

$duplicate=0;
	  if(recordexists("access","accessid",array("email"=>$a['email']),$_SESSION['hj_id'],"and atype!='guest' and deleted='0'")){
		  $duplicate="<font class='itsnotok'>Email Address Already Exists</font>";
	  }
	  
	  //if(recordexists("access","accessid",array("ausername"=>$a['ausername']),'',"and deleted='0'")){
	//	  $duplicate="<font class='itsnotok'>Username Already Exists</font>";
	 // }
	  
	  
	  if($duplicate=='0'){
				$a["access_modified"]=date("Y-m-d H:i:s"); // we insert date modified here . note the table name prefix
				$a['aactive']="Yes";
				
				  if(update("access",$a,"where accessid='".m_prepare($_SESSION['hj_id'])."'",$con)){
					  $msg="<font class='itsok'>Your profile has been successfully updated</font>";
					  }
	  }else{
		  $msg=$duplicate;
	  }
}

$h=$con->query("select * from access where accessid='".m_prepare($_SESSION['hj_id'])."'");
$hh=$con->fetch_array($h);
$a_raw['fname']=m_display($hh['fname']);
	$a_raw['lname']=m_display($hh['lname']);
	$a_raw['email']=m_display($hh['email']);
	$a_raw['mobile']=m_display($hh['mobile']);
	$a_raw['ausername']=m_display($hh['ausername']);
	$a_raw['dob']=m_display($hh['dob']);
	$a_raw['apassword']=m_display($hh['apassword']);
    $a_raw['country']=m_display($hh['country']);
    if($a_raw['country']==''){
        $a_raw['country']='Saudi Arabia';
        }
        
    
    $a_raw['city']=m_display($hh['city']);
    $a_raw['mobile']=m_display($hh['mobile']);
    $a_raw['address']=m_display($hh['address']);
    $a_raw['postalcode']=m_display($hh['postalcode']);
    $a_raw['alat']=m_display($hh['alat']);
    $a_raw['along']=m_display($hh['along']);
    $a_raw['azoom']=m_display($hh['azoom']);
	 ?>
		
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
 <link rel="stylesheet" type="text/css" media="all" href="../styles/jquery_ui_datepicker.css" />
<link rel="stylesheet" type="text/css" media="all" href="../styles/jquery_ui_theme.css" />
<style>
.ui-autocomplete {width:300px!important}
.ui-autocomplete a {font-size:12px}
</style>

<link type="text/css" href="../styles/notification.css" rel="stylesheet"  />
		<!-- Head Libs -->
		<!-- Modernizr -->
		<script src="../external/modernizr/modernizr.js"></script>
        
        	<script src="../external/jquery/jquery-2.1.4.min.js"></script> 
        <script type='text/javascript' src='../js/jquerymigrate.js'></script>
        <script type='text/javascript' src='../js/jqueryui.js'></script>
        <script type="text/javascript" src="https://maps.google.com/maps/api/js?key=AIzaSyDpEXfSZ8Y3ltYLG6-HaiUx32S0FrQqi9w"></script>
<script type="text/javascript" src="../js/functions.js"></script>
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
            <div class="row" style="margin:0;border:1px solid #cccccc;padding-top:20px;padding-bottom:20px">
                <h3 style="padding-left:10px">Edit Profile</h3>
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
                  <div style="padding-left:10px;text-align:left"><?php echo $msg?></div>
               <?php }?>
              <div class="col-sm-6">
              <div style="">
              
                <div class="inputEntity"><label>First name</label><input type="text" name="fname" id="fname" value="<?php echo $a_raw['fname']?>"></div>
                
                 <div class="inputEntity"><label>Date of Birth <span class="itsnotok">*</span></label><input type="text" name="dob" id="dob" value="<?php echo $a_raw['dob']?>" ></div>
                
                
                </div>
              </div>
              <div class="col-sm-6">
               <div>
                <div class="inputEntity"><label>Last name</label><input type="text" name="lname" id="lname" value="<?php echo $a_raw['lname']?>"></div>
                
                <div class="inputEntity"><label>Email Address</label><input type="text" name="email" id="email" value="<?php echo $a_raw['email']?>" ></div>
                
                
                
                
                
               
              </div>
              </div>
              <div style="clear:both;line-height:1px"></div>
              
              <div class="col-sm-6">
                 <div class="inputEntity"><label>Password</label><input type="password" name="apassword" id="apassword" value="<?php echo $a_raw['apassword']?>" ></div>
              </div>
              <div class="col-sm-6">
                <div class="inputEntity"><label>Repeat Password</label><input type="password" name="apassword1" id="apassword1"></div>
              </div>
              
              <div id="pswd_info">
		<ul>
			<li id="letter" class="invalid">At least <strong>one letter</strong></li>
			<li id="capital" class="invalid">At least <strong>one capital letter</strong></li>
			<li id="number" class="invalid">At least <strong>one number</strong></li>
			<li id="length" class="invalid">Be at least <strong>8 characters</strong></li>
		</ul>
	</div>
              
              <div style="clear:both;line-height:1px"></div>
              
                <div class="col-sm-6">
                <div  style="margin:0;border:1px solid #cccccc;padding:10px;padding-top:20px">
                <h3>Location</h3>
                
                
                <div class="input-with-icon  right">                                       
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
                <h3>My Primary Address</h3>
                
              
                        
           
                <div class="btnsHolder" style="text-align:left;display:none"><input class="btn btn-primary" type="button" onClick="changeaddress()"  value="Same as Home Address" style="max-width:270px"></div>
                 <div style="line-height:10px">&nbsp;</div>
              <div>
               <div class="inputEntity sshipment scountry" ><label for="scountry">Country <font class="itsnotok">*</font></label><?php //echo dropdown(array('ownn'=>'0'),"countries","name","name","","","scountry","","-","class='span12 selectt'")?>
               <?php echo  dropdown(array('ownn'=>'0'),"countries","name","name","where deleted='0'","changecity(this.value)","country",$a_raw['country'],"","class='span12 selectt'")?></div>
               
                <div class="inputEntity select"><label for="scity">City <font class="itsnotok">*</font></label>
                <div style="position:relative" class="customcityholder1">
                    <select name="city" id="city">
                    <?php $cci=$con->query("select * from city where 1=2  order by ccountry asc,cnamee asc");
					while($cco=$con->fetch_array($cci)){?>
                      <option value="<?php echo $cco['cnamee']?>"><?php echo $cco['cnamee']?></option></li>
                      <?php }?>
                    </select>
                </div>
                </div>
                
               <!-- <div class="inputEntity"><label for="scountry">Country</label><?php //echo dropdown(array('ownn'=>'0'),"countries","name","name","","","scountry","","-","class='span12 selectt'")?>-->
                
                
                <div class="inputEntity"><label for="saddress">Address  <font class="itsnotok">*</font></label><input type="text" name="address" id="address" maxlength="50" value="<?php echo $a_raw['address']?>"  ></div>
                <div class="inputEntity"><label for="saddress">Postal code </label><input type="text" name="postalcode" id="postalcode" maxlength="50" value="<?php echo $a_raw['postalcode']?>"  ></div>
                <!--<div class="inputEntity"><label for="stel">Tel</label></div>-->
                
                 <!--<div class="inputEntity"><label for="sfax">Fax</label></div>-->
                
                  <div class="inputEntity"><label for="smobile">Mobile  <font class="itsnotok">*</font></label><input type="text" maxlength="10" name="mobile" id="mobile" value="<?php echo $a_raw['mobile']?>" placeholder="05xxxxxxxx" ></div>
              </div>
              </div>
            
           
            
                </div>
                
            
           
            
                
              
              <div class="col-sm-12">
               <div class="btnsHolder"><input class="btn btn-primary" type="submit" value="Update"></div>
              </div>
              
               <div class="col-sm-12">
               <br /><br />
               <h3>My Addresses</h3>
               
               <input class="btn btn-primary" type="button" value="Add Address" onclick="window.location='addresses'">
               <br /><br />
              </div>
               <div class="col-sm-12">
              <?php $phh=$con->query("select * from addresses left join access on accessid=idaccess where idaccess='".$_SESSION['hj_id']."'");
			   while($ph=$con->fetch_array($phh)){?>
                 <div><?php echo $ph['addressesname']?>
                  (<a href="addresses?code=<?php echo $ph['addressesid']?>">Edit</a> -  <a href="editprofile?deleteaddress=<?php echo $ph['addressesid']?>" onClick="return confirm('Are you sure you want to delete?')">Delete</a>)</div>
               <?php }?>
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




		<!-- jQuery 1.10.1--> 
	
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
					//$j('#scity').val($j('#city').val()).change()
					<?php if($a_raw['city']!=''){?>
					$j('#city').val('<?php echo $a_raw['city']?>').change()
					<?php }?>
     
});
	}
	
	 changecity('<?php echo $a_raw['country']?>')
     
     pwdright=0;	
     
     	$j('#apassword').keyup(function() { 
		
		// set password variable
		var pswd = $j(this).val();
        
          pwdright=0;
		//validate the length
		if ( pswd.length < 8 ) {
			$j('#length').removeClass('valid').addClass('invalid');
		} else {
			$j('#length').removeClass('invalid').addClass('valid');
			pwdright=pwdright+1
			
		}
		
		//validate letter
		if ( pswd.match(/[A-z]/) ) {
			$j('#letter').removeClass('invalid').addClass('valid');
			pwdright=pwdright+1
		
		} else {
			$j('#letter').removeClass('valid').addClass('invalid');
			
		}
		
		//validate uppercase letter
		if ( pswd.match(/[A-Z]/) ) {
			$j('#capital').removeClass('invalid').addClass('valid');
			pwdright=pwdright+1

		} else {
			$j('#capital').removeClass('valid').addClass('invalid');
			
		}
		
		//validate number
		if ( pswd.match(/\d/) ) {
			$j('#number').removeClass('invalid').addClass('valid');
			pwdright=pwdright+1
	
		} else {
			$j('#number').removeClass('valid').addClass('invalid');
			
		}
		
	}).focus(function() {
		$j('#pswd_info').show();
        
	}).blur(function() {
		$j('#pswd_info').hide();
	});	

function m_submit1(){
	
	
    var variabl="fname"
	if($j('#'+variabl).val().trim()==''){
		  $j('#'+variabl).addClass("errorclass")
			  if(!$j('#'+variabl+'-error').length){
			   $j('#'+variabl).after("<div id='"+variabl+"-error' class='errorclass1'>Mandatory Field</div>")
			  }
			 $j('#'+variabl).focus()
			 return false
	}else{
		$j('#'+variabl).removeClass("errorclass")
		$j('#'+variabl+'-error').remove()
	}
	
	var variabl="lname"
	if($j('#'+variabl).val().trim()==''){
		  $j('#'+variabl).addClass("errorclass")
			  if(!$j('#'+variabl+'-error').length){
			   $j('#'+variabl).after("<div id='"+variabl+"-error' class='errorclass1'>Mandatory Field</div>")
			  }
			 $j('#'+variabl).focus()
			 return false
	}else{
		$j('#'+variabl).removeClass("errorclass")
		$j('#'+variabl+'-error').remove()
	}
	
		
		var variabl="email"
		if($j('#'+variabl).val().trim()=='' || !validemail($j('#'+variabl).val().trim())){
			  $j('#'+variabl).addClass("errorclass")
				  if(!$j('#'+variabl+'-error').length){
				   $j('#'+variabl).after("<div id='"+variabl+"-error' class='errorclass1'>Mandatory Field</div>")
				  }
				 $j('#'+variabl).focus()
				 return false
		}else{
			$j('#'+variabl).removeClass("errorclass")
			$j('#'+variabl+'-error').remove()
		} 
		
		var variabl="dob"
	if($j('#'+variabl).val().trim()=='' || $j('#'+variabl).val().trim()=='0000-00-00'){
		  $j('#'+variabl).addClass("errorclass")
			  if(!$j('#'+variabl+'-error').length){
			   $j('#'+variabl).after("<div id='"+variabl+"-error' class='errorclass1'>Mandatory Field</div>")
			  }
			 $j('#'+variabl).focus()
			 return false
	}else{
		$j('#'+variabl).removeClass("errorclass")
		$j('#'+variabl+'-error').remove()
	}
	

	
	
	
	 var variabl="apassword"
	if(pwdright!=4){
		  $j('#'+variabl).addClass("errorclass")
			  if(!$j('#'+variabl+'-error').length){
			   $j('#'+variabl).after("<div id='"+variabl+"-error' class='errorclass1'>Mandatory Field</div>")
			  }
			 $j('#'+variabl).focus()
			 return false
	}else{
		$j('#'+variabl).removeClass("errorclass")
		$j('#'+variabl+'-error').remove()
	}
	
	var variabl="apassword"
	if($j('#'+variabl).val()==''){
		  $j('#'+variabl).addClass("errorclass")
			  if(!$j('#'+variabl+'-error').length){
			   $j('#'+variabl).after("<div id='"+variabl+"-error' class='errorclass1'>Mandatory Field</div>")
			  }
			 $j('#'+variabl).focus()
			 return false
	}else{
		$j('#'+variabl).removeClass("errorclass")
		$j('#'+variabl+'-error').remove()
	}
	
	var variabl="apassword1"
	if($j('#'+variabl).val()!=$j('#apassword').val()){
		  $j('#'+variabl).addClass("errorclass")
			  if(!$j('#'+variabl+'-error').length){
			   $j('#'+variabl).before("<div id='"+variabl+"-error' class='errorclass1'>Passwords Must Match</div>")
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
			   $j('#'+variabl).after("<div id='"+variabl+"-error' class='errorclass1'>Mandatory Field</div>")
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
			   $j('#'+variabl).after("<div id='"+variabl+"-error' class='errorclass1'>Mandatory Field at least 5 characters</div>")
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
			   $j('#'+variabl).after("<div id='"+variabl+"-error' class='errorclass1'>Mandatory Field</div>")
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
			   $j('#'+variabl).after("<div id='"+variabl+"-error' class='errorclass1'>Mandatory Field</div>")
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