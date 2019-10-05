<?php include "../includes/ini.php"?>
<?php checkofferdate();?>

<?php $pagetitle1="mproducts";
$pagetitle="Products"?>
<?php 

//remove new if the product is more than 15 days
$con->query("update projects set newarrival='No' where newarrival='Yes' and DATEDIFF('".date("Y-m-d")."',projects_modified)>15");

syncbasket(session_id());
removeoldbasket();

?>
<?php $s=urlfriendlyo(m_fill("s",$_REQUEST));
$c=urlfriendlyo(m_fill("c",$_REQUEST));
$subcategory=urlfriendlyo(m_fill("subcategory",$_REQUEST));
$brand=urlfriendlyo(m_fill("brand",$_REQUEST));
$feature=urlfriendlyo(m_fill("feature",$_REQUEST));
$colors=urlfriendlyo(m_fill("colors",$_REQUEST));
$sizes=urlfriendlyo(m_fill("sizes",$_REQUEST));
$lastpiece=urlfriendlyo(m_fill("lastpiece",$_REQUEST));
$typee=urlfriendlyo(m_fill("typee",$_REQUEST));
$material=urlfriendlyo(m_fill("material",$_REQUEST));
$min_price=(m_fill("min_price",$_REQUEST));
$max_price=(m_fill("max_price",$_REQUEST));
$min_discount=(m_fill("min_discount",$_REQUEST));
$max_discount=(m_fill("max_discount",$_REQUEST));
$bestprice=(m_fill("bestprice",$_REQUEST));
$buygetfree=(m_fill("buygetfree",$_REQUEST));
$newarrival=(m_fill("newarrival",$_REQUEST));
$orderby=(m_fill("orderby",$_REQUEST));
$searchh=(m_fill("searchh",$_REQUEST));
$type=(m_fill("type",$_REQUEST));
$display_mode=(m_fill("display_mode",$_REQUEST));
if($display_mode==''){
	$display_mode="grid";
}



$extracategory='';
$extrasubcategory='';
$extrabrand='';
$extracolorfeaturetypematerialsize='';

$material_query='';
$feature_query='';
$type_query='';
$color_query='';
$size_query='';

if($s==''){
	$s="all";
}
if($s!='all' && $s!='new' && $s!='promotion' && $s!='preorder'){
	$sdata=$con->fetch_array($con->query("select * from supplier where sname='".m_prepare($s)."' or snamear='".m_prepare($s)."'"));
}

if($c!='all' && $c!=''){
	$cdata=$con->fetch_array($con->query("select * from category where bname='".m_prepare($c)."' or bnamear='".m_prepare($c)."'"));
}
if($subcategory!='all' && $subcategory!=''){
	$subcategorydata=$con->fetch_array($con->query("select * from subcategory where subcategoryname='".m_prepare($subcategory)."' or subcategorynamear='".m_prepare($subcategory)."'"));
}
if($s=='all'){
	$sdata['sname']="All";
}
if($type=='new'){
	$pagetitle="New";
}


$brandbrand=explode("|",$brand);
$materialmaterial=explode("|",$material);
$typeetypee=explode("|",$typee);
$featurefeature=explode("|",$feature);
$colorscolors=explode("|",$colors);
$sizessizes=explode("|",$sizes);

$brandvalue='';
$materialvalue='';
$typeevalue='';
$featurevalue='';
$colorsvalue='';
$sizesvalue='';

$brandcombine=array();
$materialcombine=array();
$typeecombine=array();
$featurecombine=array();
$colorscombine=array();
$sizescombine=array();

foreach($brandbrand as $ss1=>$ss2){
   if($ss2!=''){
    if(!isset($brandcombine[$ss2])){
        $brandcombine[$ss2]=$ss2;
        }else{
            unset($brandcombine[$ss2]);
            }
    }
    }
    
    foreach($materialmaterial as $ss1=>$ss2){
   if($ss2!=''){
    if(!isset($materialcombine[$ss2])){
        $materialcombine[$ss2]=$ss2;
        }else{
            unset($materialcombine[$ss2]);
            }
    }
    }
    
    foreach($typeetypee as $ss1=>$ss2){
   if($ss2!=''){
    if(!isset($typeecombine[$ss2])){
        $typeecombine[$ss2]=$ss2;
        }else{
            unset($typeecombine[$ss2]);
            }
    }
    }
    
    foreach($featurefeature as $ss1=>$ss2){
   if($ss2!=''){
    if(!isset($featurecombine[$ss2])){
        $featurecombine[$ss2]=$ss2;
        }else{
            unset($featurecombine[$ss2]);
            }
    }
    }
    
    foreach($colorscolors as $ss1=>$ss2){
   if($ss2!=''){
    if(!isset($colorscombine[$ss2])){
        $colorscombine[$ss2]=$ss2;
        }else{
            unset($colorscombine[$ss2]);
            }
    }
    }
    
    foreach($sizessizes as $ss1=>$ss2){
   if($ss2!=''){
    if(!isset($sizescombine[$ss2])){
        $sizescombine[$ss2]=$ss2;
        }else{
            unset($sizescombine[$ss2]);
            }
    }
    }
    
    
    $brandvalue=substr($brandvalue,0,-1);
    $brand='';
    foreach($brandcombine as $ss1=>$ss2){
         $brandvalue.="'".m_prepare($ss2)."',";
        $brand.=($ss2)."|";
        }
     $brand=substr($brand,0,-1); 
     $brandvalue=substr($brandvalue,0,-1);
     
     
     
     
     
     
      $materialvalue=substr($materialvalue,0,-1);
    $material='';
    foreach($materialcombine as $ss1=>$ss2){
         $materialvalue.="'".m_prepare($ss2)."',";
        $material.=($ss2)."|";
        }
     $material=substr($material,0,-1); 
     $materialvalue=substr($materialvalue,0,-1);
     
     
     
     
     
     
      $featurevalue=substr($featurevalue,0,-1);
    $feature='';
    foreach($featurecombine as $ss1=>$ss2){
         $featurevalue.="'".m_prepare($ss2)."',";
        $feature.=($ss2)."|";
        }
     $feature=substr($feature,0,-1); 
     $featurevalue=substr($featurevalue,0,-1);
     
     
     
     
      $typeevalue=substr($typeevalue,0,-1);
    $typee='';
    foreach($typeecombine as $ss1=>$ss2){
         $typeevalue.="'".m_prepare($ss2)."',";
        $typee.=($ss2)."|";
        }
     $typee=substr($typee,0,-1); 
     $typeevalue=substr($typeevalue,0,-1);
     
     
     
     
      $colorsvalue=substr($colorsvalue,0,-1);
    $colors='';
    foreach($colorscombine as $ss1=>$ss2){
         $colorsvalue.="'".m_prepare($ss2)."',";
        $colors.=($ss2)."|";
        }
     $colors=substr($colors,0,-1); 
     $colorsvalue=substr($colorsvalue,0,-1);
     
     
     
     
     
      $sizesvalue=substr($sizesvalue,0,-1);
    $sizes='';
    foreach($sizescombine as $ss1=>$ss2){
         $sizesvalue.="'".m_prepare($ss2)."',";
        $sizes.=($ss2)."|";
        }
     $sizes=substr($sizes,0,-1); 
     $sizesvalue=substr($sizesvalue,0,-1);





//global price search for left side menus
$globalprice='';
if(!isset($_SESSION['hj_language'])){
	$_SESSION['hj_language']='SAR';
}
if($_SESSION['hj_language']=='SAR'){  
							  if($min_price!=""){
								  $globalprice.=" and pspecialprice>='".m_prepare($min_price)."'";
                                  $extracolorfeaturetypematerialsize.=" and pspecialprice>='".m_prepare($min_price)."'";
                                  $extrasubcategory.=" and subcategoryid in(select idsubcategory from projects where deleted='0' and  pspecialprice>='".m_prepare($min_price)."')";
                                  $extracategory.=" and categoryid in (select idcategory from projects where deleted='0' and  pspecialprice>='".m_prepare($min_price)."')";
							  }
							  if($max_price!=""){
								  $globalprice.=" and pspecialprice<='".m_prepare($max_price)."'";
                                  $extracolorfeaturetypematerialsize.=" and pspecialprice<='".m_prepare($max_price)."'";
                                  $extrasubcategory.=" and subcategoryid in(select idsubcategory from projects where deleted='0' and pspecialprice<='".m_prepare($max_price)."')";
                                  $extracategory.=" and categoryid in (select idcategory from projects where deleted='0' and pspecialprice<='".m_prepare($max_price)."')";
							  }
							}
							if($_SESSION['hj_language']=='USD'){  
							  if($min_price!=""){
								  $globalprice.=" and pspecialprice*".$m_config['conversion'].">='".m_prepare($min_price)."'";
                                  $extracolorfeaturetypematerialsize.=" and pspecialprice*".$m_config['conversion'].">='".m_prepare($min_price)."'";
                                  $extrasubcategory.=" and subcategoryid in(select idsubcategory from projects where deleted='0' and  pspecialprice*".$m_config['conversion'].">='".m_prepare($min_price)."')";
                                  $extracategory.=" and categoryid in (select idcategory from projects where deleted='0' and  pspecialprice*".$m_config['conversion'].">='".m_prepare($min_price)."')";
							  }
							  if($max_price!=""){
								  $globalprice.=" and pspecialprice*".$m_config['conversion']."<='".m_prepare($max_price)."'";
                                  $extracolorfeaturetypematerialsize.=" and pspecialprice*".$m_config['conversion']."<='".m_prepare($max_price)."'";
                                  $extrasubcategory.=" and subcategoryid in(select idsubcategory from projects where deleted='0' and  pspecialprice*".$m_config['conversion']."<='".m_prepare($max_price)."')";
                                  $extracategory.=" and categoryid in (select idcategory from projects where deleted='0' and  pspecialprice*".$m_config['conversion']."<='".m_prepare($max_price)."')";
                                  
							  }
							}
							

if($lastpiece!=''){
	$extracategory.=" and categoryid in (select idcategory from projects where deleted='0' and pquantity='1')";
	$extrasubcategory.=" and subcategoryid in (select idsubcategory from projects where deleted='0' and pquantity='1')";
	$extrabrand.=" and brandsid in (select idbrands from projects where deleted='0' and pquantity='1' )";
    $extracolorfeaturetypematerialsize.=" and pquantity='1'";
}	
if($newarrival!=''){
	$extracategory.=" and categoryid in (select idcategory from projects where deleted='0' and newarrival='Yes')";
	$extrasubcategory.=" and subcategoryid in (select idsubcategory from projects where deleted='0' and newarrival='Yes')";
	$extrabrand.=" and brandsid in (select idbrands from projects where deleted='0' and newarrival='Yes' )";
}	
if($bestprice!=''){
	$extracategory.=" and categoryid in (select idcategory from projects where deleted='0' and isbestprice='Yes')";
	$extrasubcategory.=" and subcategoryid in (select idsubcategory from projects where deleted='0' and isbestprice='Yes')";
	$extrabrand.=" and brandsid in (select idbrands from projects where deleted='0' and isbestprice='Yes' )";
}						
if($buygetfree!=''){
	$extracategory.=" and categoryid in (select idcategory from projects where deleted='0' and isbuygetfree='Yes')";
	$extrasubcategory.=" and subcategoryid in (select idsubcategory from projects where deleted='0' and isbuygetfree='Yes')";
	$extrabrand.=" and brandsid in (select idbrands from projects where deleted='0' and isbuygetfree='Yes' )";
}	
if($feature!=''){
	$extracategory.=" and categoryid in (select idcategory from projects where deleted='0' and  projectsid in(select idproject from projectsfeatures left join features on featuresid=idfeature where projectsfeatures.deleted='0' and (featuresname='".m_prepare($feature)."' or featuresnamear='".m_prepare($feature)."')) )";
	$extrasubcategory.=" and subcategoryid in (select idsubcategory from projects where deleted='0' and  projectsid in(select idproject from projectsfeatures left join features on featuresid=idfeature where projectsfeatures.deleted='0' and (featuresname='".m_prepare($feature)."' or featuresnamear='".m_prepare($feature)."')) )";
	$extrabrand.=" and brandsid in (select idbrands from projects where deleted='0' and projectsid in(select idproject from projectsfeatures left join features on featuresid=idfeature where projectsfeatures.deleted='0' and (featuresname='".m_prepare($feature)."' or featuresnamear='".m_prepare($feature)."'))  )";
}						


if($type=='promotion'){
	$pagetitle="Promotion";
	$extracategory.=" and categoryid in (select idcategory from projects where deleted='0' and ppromotion='Yes' $globalprice)";
	$extrabrand.=" and brandsid in (select idbrands from projects where deleted='0' and ppromotion='Yes' $globalprice)";
}

if($type=='preorder'){
	$pagetitle="Preorder";
	$extracategory.=" and categoryid in (select idcategory from projects where deleted='0' and ppreorder='Yes' $globalprice)";
	$extrabrand.=" and brandsid in (select idbrands from projects where deleted='0' and  ppreorder='Yes' $globalprice)";
}

if($brand!=''){
	$brdata=$con->fetch_array($con->query("select * from brands where brname='".m_prepare($brand)."' or brnamear='".m_prepare($brand)."'"));
}

 $extra1='';
 $extra11='';
							 
							  if($s=="all"){
								  $extra1.="";
							  }else{
								  $extra1.="and (sname='".m_prepare($s)."' or snamear='".m_prepare($s)."')";
								  $extrabrand.="and brandsid in (select idbrands from projects left join supplier on supplierid=pidsupplier left join category on categoryid=idcategory left join brands on brandsid=idbrands left join subcategory on subcategoryid=idsubcategory  where projects.deleted='0' and sname='".m_prepare($s)."' )";
                                  
                                  if($c!=''){
								  $extracolorfeaturetypematerialsize.="and (bname='".m_prepare($c)."' or bnamear='".m_prepare($c)."')";
                                  }else{
                                    $extracolorfeaturetypematerialsize.="and (sname='".m_prepare($s)."' or snamear='".m_prepare($s)."')";
                                  }
							  }
							  
							  if($type=="new"){
								  $extra1.=" and newarrival='Yes'";
							  }elseif($type=="promotion"){
								  $extra1.=" and ppromotion='Yes'";
							 }elseif($type=="preorder"){
								  $extra1.=" and ppreorder='Yes'";	
							 }
                             
                             
                             $material_query=$extracolorfeaturetypematerialsize;
                              $feature_query=$extracolorfeaturetypematerialsize;
                               $type_query=$extracolorfeaturetypematerialsize;
                               $color_query=$extracolorfeaturetypematerialsize;
                               $size_query=$extracolorfeaturetypematerialsize;
                               
                               
							  
							  if($c!=""){
								  $extra1.=" and (bname='".m_prepare($c)."' or bnamear='".m_prepare($c)."')";
                                  $extracolorfeaturetypematerialsize.=" and (bname='".m_prepare($c)."' or bnamear='".m_prepare($c)."')";
							  }
                              
                              if($subcategory!=""){
								  $extra1.=" and (subcategoryname='".m_prepare($subcategory)."' or subcategorynamear='".m_prepare($subcategory)."')";
                                  $extracolorfeaturetypematerialsize.="and (subcategoryname='".m_prepare($subcategory)."' or subcategorynamear='".m_prepare($subcategory)."')";
							  }
							  
							  if($brand!=""){
								  $extra1.=" and (brname in (".($brandvalue).") or brnamear  in (".($brandvalue)."))";
                                  
                                  
							  }
							  
							  if($min_discount!=""){
								  $extra1.=" and pdiscount>='".m_prepare($min_discount)."' and pdiscount!=0";
							  }
							  if($max_discount!=""){
								  $extra1.=" and pdiscount<='".m_prepare($max_discount)."' and pdiscount!=0";
							  }
							  if($max_discount!=""){
								  $extra1.=" and pdiscount<='".m_prepare($max_discount)."' and pdiscount!=0";
							  }
							  
							  if($bestprice!=""){
								  $extra1.=" and isbestprice='Yes'";
							  }
							  if($buygetfree!=""){
								  $extra1.=" and isbuygetfree='Yes'";
							  }
							  if($newarrival!=""){
								  $extra1.=" and newarrival='Yes'";
							  }
							   if($lastpiece!=""){
								  $extra1.=" and pquantity='1'";
							  }
                              
                               $material_query.=$extra1;
                              $feature_query.=$extra1;
                               $type_query.=$extra1;
                               $color_query.=$extra1;
                               $size_query.=$extra1;
                               
                               
							  if($feature!=""){
							     $tempquery=" and projectsid in(select idproject from projectsfeatures left join features on featuresid=idfeature where projectsfeatures.deleted='0' and ( featuresname in (".($featurevalue).") or featuresnamear  in (".($featurevalue).") )  )";
								  $extra1.=$tempquery;
                                  $extracolorfeaturetypematerialsize.=$tempquery;
                                  
                                   $material_query.=$tempquery;
                                  $type_query.=$tempquery;
                                  $color_query.=$tempquery;
                                 $size_query.=$tempquery;
                               
                               
							  }
                              if($material!=""){
                                $tempquery=" and projectsid in(select idproject from projectsmaterial left join material on materialid=idmaterial where projectsmaterial.deleted='0' and ( materialname in (".($materialvalue).") or materialnamear  in (".($materialvalue).") )  )";
								  $extra1.=$tempquery;
                                  $extracolorfeaturetypematerialsize.=$tempquery;
                                  
                                   $feature_query.=$tempquery;
                               $type_query.=$tempquery;
                               $color_query.=$tempquery;
                               $size_query.=$tempquery;
                               
							  }
                              
                              
                              if($typee!=""){
                                $tempquery=" and projectsid in(select idproject from projectstypee left join typee on typeeid=idtypee where projectstypee.deleted='0' and ( typeename in (".($typeevalue).") or typeenamear  in (".($typeevalue).") )  )";
								  $extra1.=$tempquery;
                                  $extracolorfeaturetypematerialsize.=$tempquery;
                                  
                                  $material_query.=$tempquery;
                              $feature_query.=$tempquery;
                               $color_query.=$tempquery;
                               $size_query.=$tempquery;
                               
							  }
                               if($colors!=""){
                                 $tempquery=" and projectsid in(select idproject from projectscolors left join colors on colorsid=idcolors where projectscolors.deleted='0' and ( colorname in (".($colorsvalue).") or colornamear  in (".($colorsvalue).") )  )";
								  $extra1.=$tempquery;
                                  $extracolorfeaturetypematerialsize.=$tempquery;
                                  
                                  $material_query.=$tempquery;
                              $feature_query.=$tempquery;
                               $type_query.=$tempquery;
                               $size_query.=$tempquery;
                               
							  }
                               if($sizes!=""){
                                $tempquery=" and projectsid in(select idproject from projectssizes left join sizes on sizesid=idsizes where projectssizes.deleted='0' and ( sizesname in (".($sizesvalue).") or sizesnamear  in (".($sizesvalue).") )  )";
								  $extra1.=$tempquery;
                                  $extracolorfeaturetypematerialsize.=$tempquery;
                                  
                              $material_query.=$tempquery;
                              $feature_query.=$tempquery;
                               $type_query.=$tempquery;
                               $color_query.=$tempquery;
                               
							  }
							  
							 
							
							  
							  if($searchh!=""){
								  $extra11="and (pcode like '%".m_prepare($searchh)."%' or 
                                  prodmetatitle like '%".m_prepare($searchh)."%' or 
                                  prodmetatitlear like '%".m_prepare($searchh)."%' or
                                  prodmetadesc like '%".m_prepare($searchh)."%' or
                                  prodmetadescar like '%".m_prepare($searchh)."%' or
                                  prodkey like '%".m_prepare($searchh)."%' or
                                  prodkeyar like '%".m_prepare($searchh)."%' or
                                  
                                  ptitle like '%".m_prepare($searchh)."%' or brname like '%".m_prepare($searchh)."%' or sname like '%".m_prepare($searchh)."%' or bname like '%".m_prepare($searchh)."%' or subcategoryname like '%".m_prepare($searchh)."%' or ptitlear like '%".m_prepare($searchh)."%' or brnamear like '%".m_prepare($searchh)."%' or snamear like '%".m_prepare($searchh)."%' or bnamear like '%".m_prepare($searchh)."%' or subcategorynamear like '%".m_prepare($searchh)."%')";
                                  
                                  
								  if($s=="all"){
									  $extra11.="";
								  }else{
									  $extra11.="and (sname='".m_prepare($s)."' or snamear='".m_prepare($s)."')";
								  }
								  
								  if($type=="new"){
									  $extra11.="";
								  }elseif($type=="promotion"){
									  $extra11.="";
								  }elseif($type=="preorder"){
									  $extra11.="";	  
								  }
                                  
                                  $extracolorfeaturetypematerialsize.=" ".$extra11;
                                  $extrasubcategory.=" and subcategoryid in (select idsubcategory from projects left join subcategory on subcategoryid=idsubcategory left join supplier on supplierid=pidsupplier left join category on categoryid=idcategory left join brands on brandsid=idbrands  where projects.deleted='0' $extra11)";
                                  $extracategory.=" and categoryid in (select idcategory from projects left join subcategory on subcategoryid=idsubcategory left join supplier on supplierid=pidsupplier left join category on categoryid=idcategory left join brands on brandsid=idbrands where projects.deleted='0' and pquantity='1' $extra11)";
                                  
                                  
                                   $feature_query.=$extra11;
                                  $material_query.=$extra11;
                                  $type_query.=$extra11;
                                  $color_query.=$extra11;
                                 $size_query.=$extra11;
                                  
                                  

							  }
                              
                              //get the min price
                              $prodmin=$con->fetch_array($con->query("select * from projects  left join supplier on supplierid=pidsupplier left join category on categoryid=idcategory left join brands on brandsid=idbrands left join subcategory on subcategoryid=idsubcategory where projects.deleted='0' and (prodactive='Yes' or prodactive='OOS') and pspecialprice!='0' $extra1 $extra11  order by pspecialprice asc limit 1 "));
                              $prodmax=$con->fetch_array($con->query("select * from projects left join supplier on supplierid=pidsupplier left join category on categoryid=idcategory left join brands on brandsid=idbrands left join subcategory on subcategoryid=idsubcategory where projects.deleted='0' and (prodactive='Yes' or prodactive='OOS') and pspecialprice!='0' $extra1 $extra11  order by pspecialprice desc limit 1 "));
                              
                               if($prodmin['pspecialprice']==$prodmax['pspecialprice']){
                               // $prodmax['pspecialprice']=$prodmax['pspecialprice']+1;
                               $hideprice=1;
                                
                                }
                              
                               if($prodmin['pspecialprice']==''){
                                        $prodmin['pspecialprice']='5';
                                        }
                               if($prodmax['pspecialprice']==''){
                                        $prodmax['pspecialprice']='5000';
                                        }          
                              
                              
                              if($min_price==''){
                                	$min_price=$prodmin['pspecialprice'];
                                    if($min_price==''){
                                        $min_price='5';
                                        }
                                }
                                if($max_price==''){
                                	$max_price=$prodmax['pspecialprice'];
                                    if($max_price==''){
                                        $max_price='5000';
                                        }
                                }
                              


?>
<!DOCTYPE html>
<html>
	

<head>
		<!-- Basic -->
		<meta charset="utf-8">
		<title><?php echo $titl?></title>
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
		<link rel="stylesheet" href="../external/nouislider/nouislider.css">
		<link rel="stylesheet" href="../external/bootstrap-select/bootstrap-select.css">
		<!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
		<link rel="stylesheet" type="text/css" href="../external/rs-plugin/css/settings.css" media="screen" />
		<!-- Custom CSS -->
		<link rel="stylesheet" href="../css/style-layout11.css?v=4">
		<!-- Icon Fonts  -->
		<link rel="stylesheet" href="../font/style.css">
<link rel="stylesheet" href="../styles/fancybox.css">
<link type="text/css" href="../styles/notification.css" rel="stylesheet"  />
		<!-- Head Libs -->
		<!-- Modernizr -->
		<script src="../external/modernizr/modernizr.js"></script>
	</head>
	<body>
		<?php include "loader.php"?>
		<!-- Back to top -->
	    <div class="back-to-top"><span class="icon-keyboard_arrow_up"></span></div>
	    <!-- /Back to top -->
	    <!-- mobile menu -->
		
	    <!-- /mobile menu -->
		<!-- HEADER section -->
		<?php include "header.php"?>
<div class="pageholder">
   <div style="text-align:center;padding:100px"><img src="../images/loading.gif"></div>
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
		<script src="../external/jquery/jquery-2.1.4.min.js"></script>
		<!-- Bootstrap 3-->
		<script src="../external/bootstrap/bootstrap.min.js"></script>
		<!-- Specific Page External Plugins -->
		<script src="../external/slick/slick.min.js"></script>
		<script src="../external/bootstrap-select/bootstrap-select.min.js"></script>
		<script src="../external/countdown/jquery.plugin.min.js"></script>
		<script src="../external/countdown/jquery.countdown.min.js"></script>
		<script src="../external/instafeed/instafeed.min.js"></script>
		<script src="../external/magnific-popup/jquery.magnific-popup.min.js"></script>
		<script src="../external/nouislider/nouislider.min.js"></script>
		<script src="../external/isotope/isotope.pkgd.min.js"></script>
		<script src="../external/imagesloaded/imagesloaded.pkgd.min.js"></script>
		<script src="../external/colorbox/jquery.colorbox-min.js"></script> 
        <script src="../js/fancybox.js"></script> 
<script type="text/javascript" src="../js/notification.js"></script><script src="../js/functions.js"></script> <?php include "extrascripts.php"?>
		<!-- Custom -->
		<script src="../js/custom.js"></script>
		<script>
			$j(document).ready(function() {
			 
             getproduct("ajax_products.php?s=<?php echo urlfriendlyi($s)?>&c=<?php echo urlfriendlyi($c)?>&subcategory=<?php echo urlfriendlyi($subcategory)?>&min_price=<?php echo $min_price?>&max_price=<?php echo $max_price?>&orderby=<?php echo $orderby?>&brand=<?php echo $brand?>&type=<?php echo $type?>&min_discount=<?php echo $min_discount?>&max_discount=<?php echo $max_discount?>&bestprice=<?php echo $bestprice?>&buygetfree=<?php echo $buygetfree?>&newarrival=<?php echo $newarrival?>&searchh=<?php echo $searchh?>&display_mode=<?php echo $display_mode?>")
			 
            

		//get the ajax product
		function getproduct(url){
		 // alert(url)

			$j.ajax({
			  url: url,
			  async : true,
			  method:'Get',
			}).done(function(data) {

			 
			  $j('.pageholder').html( data);
              
              
			  //$('html, body').animate({scrollTop: $('.products-grid').offset().top - 150}, 200);
			});
		}
				
	//	$j('.thecheckbox').click(function(){window.location=$j(this).parent().attr("href")})


				listingModeToggle();
				
				productCarousel($j('.banner-slider'),1,1,1,1,1); 
				brandsCarousel($j('.brands-carousel'));

				// Init All Carousel
				productCarousel($j('#megaMenuCarousel1'),1,1,1,1,1);
				verticalCarousel($j('.vertical-carousel-1'),2);
				verticalCarousel($j('.vertical-carousel-2'),2);
				
				

		if ($j('.price-slider').length) {
		
			var priceSlider = document.getElementById('priceSlider');

			noUiSlider.create(priceSlider, {
				start: [<?php echo $min_price?>, <?php echo $max_price?>],
				connect: true,
				step: 1,
				range: {
					'min': <?php echo $prodmin['pspecialprice']?>,
					'max': <?php echo $prodmax['pspecialprice']?>
				}
			});
			
			var inputPriceMax = document.getElementById('max_price');
			var inputPriceMin = document.getElementById('min_price');

			priceSlider.noUiSlider.on('update', function( values, handle ) {

				var value = values[handle];

				if ( handle ) {
					inputPriceMax.value = value;
				} else {
					inputPriceMin.value = value;
				}
			});

			inputPriceMax.addEventListener('change', function(){
				priceSlider.noUiSlider.set([null, this.value]);
			});			
			inputPriceMin.addEventListener('change', function(){
				priceSlider.noUiSlider.set([this.value, null]);
			});
		};
	
			})
			
			function ajaxbasket(quan,id){
	quant=$j('#'+quan).val()
	idd=$j('#'+id).val()

	  $j.ajax({
		  url: 'ajaxbasket.php?add=1&quantity='+quant+'&productsid='+idd,
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
                                    message: "Item successfully added",
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
                                    message: "Wishlist successfully added",
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
		</script>
	</body>


</html>