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
<div id="pageContent">
        <?php if(isset($sdata['supplierimage']) && $sdata['supplierimage']!=''){
            if($sdata['bannerlink1']!='' && $sdata['bannerlink1']!='0' ){
                $link=$sdata['bannerlink1'];
              }else{
                $link="#";
                }?>
                        <div class="container">
            <div clas="row">
              <div class="col-sm-12">
                    <div class="banner-slider banner-slider-button">
							<div>
								<a href="<?php echo $link?>" class="banner zoom-in font-size-responsive">
									<span class="figure">
										<img src="../uploads/supplier/<?php echo $sdata['supplierimage']?>" alt=""/>
									</span>
								</a>
							</div>
                            <?php if(isset($sdata['supplierimage1']) && $sdata['supplierimage1']!=''){
                                if($sdata['bannerlink2']!='' && $sdata['bannerlink2']!='0' ){
                                    $link=$sdata['bannerlink2'];
                                  }else{
                                    $link="#";
                                    }?>
                            <div>
								<a href="<?php echo $link?>" class="banner zoom-in font-size-responsive">
									<span class="figure">
										<img src="../uploads/supplier/<?php echo $sdata['supplierimage1']?>" alt=""/>
									</span>
								</a>
							</div>
                            <?php }?>
                             <?php if(isset($sdata['supplierimage2']) && $sdata['supplierimage2']!=''){
                                if($sdata['bannerlink3']!='' && $sdata['bannerlink3']!='0' ){
                                    $link=$sdata['bannerlink3'];
                                  }else{
                                    $link="#";
                                    }?>
                            <div>
								<a href="<?php echo $link?>" class="banner zoom-in font-size-responsive">
									<span class="figure">
										<img src="../uploads/supplier/<?php echo $sdata['supplierimage2']?>" alt=""/>
									</span>
								</a>
							</div>
                            <?php }?>
						</div>
              </div>
            </div>
          </div>
           <div class="container" style="margin-top:20px;margin-bottom:40px;">
					<div class="row">
						<div class="brands-carousel" style="margin-top:0px">
                         <?php $brr=$con->query("select * from brands where deleted='0' and bractive='Yes' and brandsimages!=''  and brandsid in (select idbrands from projects left join supplier on supplierid=pidsupplier where projects.deleted='0' and sname='".m_prepare($s)."' )   order by brpriority asc,brname asc");
                         
                         
						while($br=$con->fetch_array($brr)){?>
							<div style=""><a href="products?s=all&c=&min_price=&max_price=&orderby=&brand=<?php echo urlfriendlyi($br['brname'])?>">
                            <img src="../uploads/brands_thumb/<?php echo $br['brandsimages']?>" alt="<?php echo $br['brname']?>" style="border:1px solid black"></a></div>
                            <?php }?>
						</div>
					</div>
				</div>
                
        <?php }?>
        
       
                
			<div class="container">
				<!-- two columns -->
				<div class="row">
					<!-- left column -->
                    <form action="products?s=<?php echo urlfriendlyi($s)?>&c=<?php echo urlfriendlyi($c)?>&subcategory=<?php echo urlfriendlyi($subcategory)?>&orderby=<?php echo $orderby?>&brand=<?php echo urlfriendlyi($brand)?>&type=<?php echo $type?>&min_discount=<?php echo $min_discount?>&max_discount=<?php echo $max_discount?>&bestprice=<?php echo $bestprice?>&buygetfree=<?php echo $buygetfree?>&newarrival=<?php echo $newarrival?>&feature=<?php echo urlfriendlyi($feature)?>&lastpiece=<?php echo $lastpiece?>&material=<?php echo urlfriendlyi($material)?>&typee=<?php echo urlfriendlyi($typee)?>&sizes=<?php echo urlfriendlyi($sizes)?>&colors=<?php echo urlfriendlyi($colors)?>" enctype="application/x-www-form-urlencoded" method="get">
         <input type="hidden" name="s" value="<?php echo urlfriendlyi($s)?>">
         <input type="hidden" name="subcategory" value="<?php echo urlfriendlyi($subcategory)?>">
         <input type="hidden" name="c" value="<?php echo urlfriendlyi($c)?>">
         <input type="hidden" name="orderby" value="<?php echo ($orderby)?>">
         <input type="hidden" name="brand" value="<?php echo urlfriendlyi($brand)?>">
         <input type="hidden" name="type" value="<?php echo ($type)?>">
         <input type="hidden" name="feature" value="<?php echo ($feature)?>">
         <input type="hidden" name="colors" value="<?php echo ($colors)?>">
         <input type="hidden" name="sizes" value="<?php echo ($sizes)?>">
         <input type="hidden" name="material" value="<?php echo ($material)?>">
         <input type="hidden" name="typee" value="<?php echo ($typee)?>">
					<aside class="col-md-4 col-lg-3 col-xl-2" id="leftColumn">
						<a href="#" class="slide-column-close visible-sm visible-xs"><span class="icon icon-chevron_left"></span>back</a>
						<div class="filters-block visible-xs">
							<div class="filters-row__select">
								<label>Sort by: </label>
								<div class="select-wrapper">
									<select name="orderby" onChange="window.location='<?php echo $_SERVER['PHP_SELF']?>?s=<?php echo urlfriendlyi($s)?>&c=<?php echo urlfriendlyi($c)?>&subcategory=<?php echo urlfriendlyi($subcategory)?>&min_price=<?php echo $min_price?>&max_price=<?php echo $max_price?>&orderby='+this.value+'&brand=<?php echo urlfriendlyi($brand)?>&type=<?php echo $type?>&min_discount=<?php echo $min_discount?>&max_discount=<?php echo $max_discount?>&bestprice=<?php echo $bestprice?>&buygetfree=<?php echo $buygetfree?>&newarrival=<?php echo $newarrival?>&feature=<?php echo urlfriendlyi($feature)?>&lastpiece=<?php echo $lastpiece?>&material=<?php echo urlfriendlyi($material)?>&typee=<?php echo urlfriendlyi($typee)?>&sizes=<?php echo urlfriendlyi($sizes)?>&colors=<?php echo urlfriendlyi($colors)?>&searchh=<?php echo $searchh?>'"  class="select--ys sort-position">
											<option value="name"  <?php if($orderby=='name'){?>selected='selected'<?php }?>>Default sorting</option>
                                                <option value="date" <?php if($orderby=='date'){?>selected='selected'<?php }?> >Newness</option>
                                                <option value="price_low" <?php if($orderby=='price_low'){?>selected='selected'<?php }?> >Price: low to high</option>
                                                <option value="price_high" <?php if($orderby=='price_high'){?>selected='selected'<?php }?> >Price: high to low</option>
										</select>
								</div>
								
							</div>
							
							<a href="#" class="icon icon-arrow-down active"></a><a href="#" class="icon icon-arrow-up"></a>
						</div>
						
						<!-- /shopping by block -->
						<!-- category block -->
						<div class="collapse-block open">
							<h4 class="collapse-block__title ">Category</h4>
							<div class="collapse-block__content">
								<ul class="expander-list">
                                <?php if(isset($sdata['supplierid'])){
									$catex="and idsupplier='".$sdata['supplierid']."'";
								}else{
									$catex="";
								}?>
                                <li <?php if($c=='all'){?>class="active"<?php }?>><a href="products?s=<?php echo urlfriendlyi($s)?>&c=<?php echo urlfriendlyi('')?>&subcategory=&min_price=&max_price=&orderby=<?php echo $orderby?>&type=<?php echo $type?>&min_discount=<?php echo $min_discount?>&max_discount=<?php echo $max_discount?>&bestprice=<?php echo $bestprice?>&buygetfree=<?php echo $buygetfree?>&newarrival=<?php echo $newarrival?>&searchh=<?php echo $searchh?>&display_mode=<?php echo $display_mode?>">All</a></li>
                                <?php $gg=$con->query("select * from category where deleted='0' and bactive='Yes' and (bname!='New Arrivals') $catex  $extracategory order by bpriority asc,bname asc");
                                
                                
										while($g=$con->fetch_array($gg)){?>
									<li <?php if($c==$g['bname']){?>class="active open"<?php }?>>
										<a href="products?s=<?php echo urlfriendlyi($s)?>&c=<?php echo urlfriendlyi($g['bname'])?>&subcategory=&min_price=&max_price=&orderby=<?php echo $orderby?>&type=<?php echo $type?>&min_discount=<?php echo $min_discount?>&max_discount=<?php echo $max_discount?>&bestprice=<?php echo $bestprice?>&buygetfree=<?php echo $buygetfree?>&newarrival=<?php echo $newarrival?>&searchh=<?php echo $searchh?>"><?php echo $g['bname']?></a><span class="expander"></span>
										<ul>
                                        <?php $ggc=$con->query("select *,count(*) as countt  from projects  left join subcategory on subcategoryid=idsubcategory where subcategory.deleted='0'   and (prodactive='Yes' or prodactive='OOS') and sidcategory='".$g['categoryid']."' $extrasubcategory and subcategoryactive='Yes' and projects.deleted='0' group by subcategoryid order by subcategorypriority desc");
                                        
                                         
										while($gc=$con->fetch_array($ggc)){?>
											<li <?php if($c==$gc['subcategoryname']){?>class="active"<?php }?>>
                                            <a href="products?s=<?php echo urlfriendlyi($s)?>&c=<?php echo urlfriendlyi($g['bname'])?>&subcategory=<?php echo urlfriendlyi($gc['subcategoryname'])?>&min_price=&max_price=&orderby=<?php echo $orderby?>&type=<?php echo $type?>&min_discount=<?php echo $min_discount?>&max_discount=<?php echo $max_discount?>&bestprice=<?php echo $bestprice?>&buygetfree=<?php echo $buygetfree?>&newarrival=<?php echo $newarrival?>&searchh=<?php echo $searchh?>"><?php echo $gc['subcategoryname']?></a> (<?php echo $gc['countt']?>)</li>
                                            <?php }?>
										</ul>
									</li>
                                    <?php }?>
									
									
								</ul>
							</div>
						</div>
						<!-- /category block -->
                        <?php if(!isset($hideprice)){?>
						<!-- price slider block -->
						<div class="collapse-block open">
							<h4 class="collapse-block__title">PRICE</h4>
							<div class="collapse-block__content">
								<div id="priceSlider" class="price-slider"></div>
								<form action="products">
                                <input type="hidden" name="s" value="<?php echo urlfriendlyi($s)?>">
                                 <input type="hidden" name="c" value="<?php echo urlfriendlyi($c)?>">
                                 <input type="hidden" name="orderby" value="<?php echo ($orderby)?>">
                                 <input type="hidden" name="brand" value="<?php echo urlfriendlyi($brand)?>">
                                 <input type="hidden" name="type" value="<?php echo ($type)?>">
									<div class="price-input">
										<label>From:</label>
										<input type="text" id="min_price" name="min_price" />
									</div>
									<div class="price-input-divider">-</div>
									<div class="price-input">
										<label>To:</label>
										<input type="text" id="max_price" name="max_price" />
									</div>
									<div class="price-input">
										<button type="submit" class="btn btn--ys btn--md">Filter</button>
									</div>
								</form>
							</div>
						</div>
                        <?php }?>
						<!-- /price slider block -->
						<!-- size block -->
						
						<!-- /size block -->
						
						<!-- brands block -->
						<div class="collapse-block <?php if($brand!=''){?>open<?php }?>">
							<h4 class="collapse-block__title">BRANDS</h4>
							<div class="collapse-block__content" style="<?php if($brand!=''){?>display:block<?php }?>">
								<ul class="simple-list">
                                <li <?php if($brand==''){?>class="active"<?php }?>><a  class="ajaxx"  href="<?php echo $_SERVER['PHP_SELF']?>?s=<?php echo urlfriendlyi($s)?>&c=<?php echo urlfriendlyi($c)?>&subcategory=<?php echo urlfriendlyi($subcategory)?>&min_price=<?php echo $min_price?>&max_price=<?php echo $max_price?>&orderby=<?php echo $orderby?>&brand=&type=<?php echo $type?>&min_discount=<?php echo $min_discount?>&max_discount=<?php echo $max_discount?>&bestprice=<?php echo $bestprice?>&buygetfree=<?php echo $buygetfree?>&newarrival=<?php echo $newarrival?>&searchh=<?php echo $searchh?>&display_mode=<?php echo $display_mode?>">All</a></li>
                                <?php $gg=$con->query("select *,count(*) as countt from projects left join brands on brandsid=idbrands left join supplier on supplierid=pidsupplier left join category on categoryid=idcategory left join subcategory on subcategoryid=idsubcategory where projects.deleted='0' and prodactive='yes'  and (prodactive='Yes' or prodactive='OOS') $extracolorfeaturetypematerialsize group by brandsid  order by brpriority asc,brname asc");

				while($g=$con->fetch_array($gg)){?>
									  <li <?php if($brand==$g['brname']){?>class="active"<?php }?>><a class="ajaxx"  href="<?php echo $_SERVER['PHP_SELF']?>?s=<?php echo urlfriendlyi($s)?>&c=<?php echo urlfriendlyi($c)?>&subcategory=<?php echo urlfriendlyi($subcategory)?>&min_price=<?php echo $min_price?>&max_price=<?php echo $max_price?>&orderby=<?php echo $orderby?>&brand=<?php echo urlfriendlyi($brand)?>|<?php echo urlfriendlyi($g['brname'])?>&type=<?php echo $type?>&min_discount=<?php echo $min_discount?>&max_discount=<?php echo $max_discount?>&bestprice=<?php echo $bestprice?>&buygetfree=<?php echo $buygetfree?>&newarrival=<?php echo $newarrival?>&searchh=<?php echo $searchh?>">
                                      <input  class="thecheckbox" type="checkbox" <?php if (in_array($g['brname'], $brandcombine)) {?>checked="checked"<?php }?>\></label> <?php echo $g['brname']?> (<?php echo $g['countt']?>)
                                        </a></li>
                                    <?php }?>
								</ul>
							</div>
						</div>
                     	<!-- /brands block -->   
                        <?php 
                        $materialcheck=$con->query("select * from projects left join supplier on supplierid=pidsupplier left join category on categoryid=idcategory left join brands on brandsid=idbrands left join subcategory on subcategoryid=idsubcategory where projects.deleted='0' and (prodactive='Yes' or prodactive='OOS') $material_query and projectsid in (select idproject from projectsmaterial where deleted='0')");
                        
                        if($con->num_rows($materialcheck)!=0){?>
                        	<div class="collapse-block <?php if($material!=''){?>open<?php }?>">
							<h4 class="collapse-block__title">MATERIAL</h4>
							<div class="collapse-block__content" style="<?php if($material!=''){?>display:block<?php }?>">
								<ul class="simple-list">
                                <li <?php if($material==''){?>class="active"<?php }?>><a class="ajaxx" href="<?php echo $_SERVER['PHP_SELF']?>?s=<?php echo urlfriendlyi($s)?>&c=<?php echo urlfriendlyi($c)?>&subcategory=<?php echo urlfriendlyi($subcategory)?>&min_price=<?php echo $min_price?>&max_price=<?php echo $max_price?>&orderby=<?php echo $orderby?>&brand=<?php echo $brand?>&type=<?php echo $type?>&min_discount=<?php echo $min_discount?>&max_discount=<?php echo $max_discount?>&bestprice=<?php echo $bestprice?>&buygetfree=<?php echo $buygetfree?>&newarrival=<?php echo $newarrival?>&feature=<?php echo urlfriendlyi($feature)?>&lastpiece=<?php echo $lastpiece?>&material=&typee=<?php echo urlfriendlyi($typee)?>&sizes=<?php echo urlfriendlyi($sizes)?>&colors=<?php echo urlfriendlyi($colors)?>&searchh=<?php echo $searchh?>&display_mode=<?php echo $display_mode?>">All</a></li>
                                <?php $gg=$con->query("select *,count(*) as countt from projectsmaterial left join material on materialid=idmaterial  left join projects on idproject=projectsid left join supplier on supplierid=pidsupplier left join category on categoryid=idcategory left join subcategory on subcategoryid=idsubcategory left join brands on brandsid=idbrands where projects.deleted='0' and materialactive='Yes'  and (prodactive='Yes' or prodactive='OOS') $material_query  group by materialid order by materialpriority asc,materialname asc");
                                
				while($g=$con->fetch_array($gg)){?>
									  <li <?php if($material==$g['materialname']){?>class="active"<?php }?>><a class="ajaxx" href="<?php echo $_SERVER['PHP_SELF']?>?s=<?php echo urlfriendlyi($s)?>&c=<?php echo urlfriendlyi($c)?>&subcategory=<?php echo urlfriendlyi($subcategory)?>&min_price=<?php echo $min_price?>&max_price=<?php echo $max_price?>&orderby=<?php echo $orderby?>&brand=<?php echo $brand?>&type=<?php echo $type?>&min_discount=<?php echo $min_discount?>&max_discount=<?php echo $max_discount?>&bestprice=<?php echo $bestprice?>&buygetfree=<?php echo $buygetfree?>&newarrival=<?php echo $newarrival?>&feature=<?php echo urlfriendlyi($feature)?>&lastpiece=<?php echo $lastpiece?>&material=<?php echo urlfriendlyi($material)?>|<?php echo urlfriendlyi($g['materialname'])?>&typee=<?php echo urlfriendlyi($typee)?>&sizes=<?php echo urlfriendlyi($sizes)?>&colors=<?php echo urlfriendlyi($colors)?>&searchh=<?php echo $searchh?>">
                                      <input class="thecheckbox" type="checkbox" <?php if (in_array($g['materialname'], $materialcombine)) {?>checked="checked"<?php }?>\> <?php echo $g['materialname']?> (<?php echo $g['countt']?>)
                                        </a></li>
                                    <?php }?>
								</ul>
							</div>
						</div>
                        <?php }?>
                     	<!-- /material block -->   
                         <?php $typeecheck=$con->query("select * from projects left join supplier on supplierid=pidsupplier left join category on categoryid=idcategory left join brands on brandsid=idbrands left join subcategory on subcategoryid=idsubcategory where projects.deleted='0' and (prodactive='Yes' or prodactive='OOS') $globalprice  $type_query and projectsid in (select idproject from projectstypee left join typee on typeeid=idtypee where typee.deleted='0')");
                         
                        if($con->num_rows($typeecheck)!=0){?>
                        	<div class="collapse-block <?php if($typee!=''){?>open<?php }?>">
							<h4 class="collapse-block__title">TYPE</h4>
							<div class="collapse-block__content" style="<?php if($typee!=''){?>display:block<?php }?>">
								<ul class="simple-list">
                                <li <?php if($typee==''){?>class="active"<?php }?>><a class="ajaxx" href="<?php echo $_SERVER['PHP_SELF']?>?s=<?php echo urlfriendlyi($s)?>&c=<?php echo urlfriendlyi($c)?>&subcategory=<?php echo urlfriendlyi($subcategory)?>&min_price=<?php echo $min_price?>&max_price=<?php echo $max_price?>&orderby=<?php echo $orderby?>&brand=<?php echo $brand?>&type=<?php echo $type?>&min_discount=<?php echo $min_discount?>&max_discount=<?php echo $max_discount?>&bestprice=<?php echo $bestprice?>&buygetfree=<?php echo $buygetfree?>&newarrival=<?php echo $newarrival?>&feature=<?php echo urlfriendlyi($feature)?>&lastpiece=<?php echo $lastpiece?>&material=<?php echo urlfriendlyi($material)?>&typee=&sizes=<?php echo urlfriendlyi($sizes)?>&colors=<?php echo urlfriendlyi($colors)?>&searchh=<?php echo $searchh?>&display_mode=<?php echo $display_mode?>">All</a></li>
                                <?php $gg=$con->query("select *,count(*) as countt from projectstypee left join typee on typeeid=idtypee left join projects on idproject=projectsid left join supplier on supplierid=pidsupplier left join category on categoryid=idcategory left join subcategory on subcategoryid=idsubcategory left join brands on brandsid=idbrands where projects.deleted='0' $type_query and (prodactive='Yes' or prodactive='OOS') group by typeeid order by typeepriority asc,typeename asc");
				while($g=$con->fetch_array($gg)){?>
									  <li <?php if($typee==$g['typeename']){?>class="active"<?php }?>><a class="ajaxx" href="<?php echo $_SERVER['PHP_SELF']?>?s=<?php echo urlfriendlyi($s)?>&c=<?php echo urlfriendlyi($c)?>&subcategory=<?php echo urlfriendlyi($subcategory)?>&min_price=<?php echo $min_price?>&max_price=<?php echo $max_price?>&orderby=<?php echo $orderby?>&brand=<?php echo $brand?>&type=<?php echo $type?>&min_discount=<?php echo $min_discount?>&max_discount=<?php echo $max_discount?>&bestprice=<?php echo $bestprice?>&buygetfree=<?php echo $buygetfree?>&newarrival=<?php echo $newarrival?>&feature=<?php echo urlfriendlyi($feature)?>&lastpiece=<?php echo $lastpiece?>&material=<?php echo urlfriendlyi($material)?>&typee=<?php echo urlfriendlyi($typee)?>|<?php echo urlfriendlyi($g['typeename'])?>&sizes=<?php echo urlfriendlyi($sizes)?>&colors=<?php echo urlfriendlyi($colors)?>&searchh=<?php echo $searchh?>">
                                      <input class="thecheckbox" type="checkbox" <?php if (in_array($g['typeename'], $typeecombine)) {?>checked="checked"<?php }?>\> <?php echo $g['typeename']?> (<?php echo $g['countt']?>)
                                        </a></li>
                                    <?php }?>
								</ul>
							</div>
						</div>
                        <?php }?>
                        	<!-- /type block -->
                             <?php $featurecheck=$con->query("select * from projects left join supplier on supplierid=pidsupplier left join category on categoryid=idcategory left join brands on brandsid=idbrands left join subcategory on subcategoryid=idsubcategory where projects.deleted='0' and (prodactive='Yes' or prodactive='OOS') $globalprice  $feature_query and projectsid in (select idproject from projectsfeatures left join features on featuresid=idfeature where features.deleted='0')");
                             
                        if($con->num_rows($featurecheck)!=0){?>
                        	<div class="collapse-block <?php if($feature!=''){?>open<?php }?>">
							<h4 class="collapse-block__title">FEATURES</h4>
							<div class="collapse-block__content" style="<?php if($feature!=''){?>display:block<?php }?>">
								<ul class="simple-list">
                                <li <?php if($feature==''){?>class="active"<?php }?>><a class="ajaxx" href="<?php echo $_SERVER['PHP_SELF']?>?s=<?php echo urlfriendlyi($s)?>&c=<?php echo urlfriendlyi($c)?>&subcategory=<?php echo urlfriendlyi($subcategory)?>&min_price=<?php echo $min_price?>&max_price=<?php echo $max_price?>&orderby=<?php echo $orderby?>&brand=<?php echo $brand?>&type=<?php echo $type?>&min_discount=<?php echo $min_discount?>&max_discount=<?php echo $max_discount?>&bestprice=<?php echo $bestprice?>&buygetfree=<?php echo $buygetfree?>&newarrival=<?php echo $newarrival?>&feature=&lastpiece=<?php echo $lastpiece?>&material=<?php echo urlfriendlyi($material)?>&typee=<?php echo urlfriendlyi($typee)?>&sizes=<?php echo urlfriendlyi($sizes)?>&colors=<?php echo urlfriendlyi($colors)?>&searchh=<?php echo $searchh?>&display_mode=<?php echo $display_mode?>">All</a></li>
                                <?php $gg=$con->query("select *,count(*) as countt from projectsfeatures left join features on featuresid=idfeature left join projects on idproject=projectsid left join supplier on supplierid=pidsupplier left join category on categoryid=idcategory left join subcategory on subcategoryid=idsubcategory left join brands on brandsid=idbrands where projects.deleted='0' $feature_query and featuresactive='Yes' and (prodactive='Yes' or prodactive='OOS') group by featuresid order by featurespriority asc,featuresname asc");
				while($g=$con->fetch_array($gg)){?>
									  <li <?php if($feature==$g['featuresname']){?>class="active"<?php }?>><a class="ajaxx" href="<?php echo $_SERVER['PHP_SELF']?>?s=<?php echo urlfriendlyi($s)?>&c=<?php echo urlfriendlyi($c)?>&subcategory=<?php echo urlfriendlyi($subcategory)?>&min_price=<?php echo $min_price?>&max_price=<?php echo $max_price?>&orderby=<?php echo $orderby?>&brand=<?php echo $brand?>&type=<?php echo $type?>&min_discount=<?php echo $min_discount?>&max_discount=<?php echo $max_discount?>&bestprice=<?php echo $bestprice?>&buygetfree=<?php echo $buygetfree?>&newarrival=<?php echo $newarrival?>&feature=<?php echo urlencode(urlfriendlyi($feature))?>|<?php echo urlencode(urlfriendlyi($g['featuresname']))?>&lastpiece=<?php echo $lastpiece?>&material=<?php echo urlfriendlyi($material)?>&typee=<?php echo urlfriendlyi($typee)?>&sizes=<?php echo urlfriendlyi($sizes)?>&colors=<?php echo urlfriendlyi($colors)?>&searchh=<?php echo $searchh?>">
                                         <input class="thecheckbox" type="checkbox" <?php if (in_array($g['featuresname'], $featurecombine)) {?>checked="checked"<?php }?>\> <?php echo $g['featuresname']?> (<?php echo $g['countt']?>)
                                        </a></li>
                                    <?php }?>
								</ul>
							</div>
						</div>
                        <?php }?>
                        	<!-- /feature block -->
                             <?php $colorecheck=$con->query("select * from projects left join supplier on supplierid=pidsupplier left join category on categoryid=idcategory left join brands on brandsid=idbrands left join subcategory on subcategoryid=idsubcategory where projects.deleted='0' and (prodactive='Yes' or prodactive='OOS') $globalprice  $color_query and projectsid in (select idproject from projectscolors left join colors on colorsid=idcolors where colors.deleted='0')");
                        if($con->num_rows($colorecheck)!=0){?>
                        	<div class="collapse-block <?php if($colors!=''){?>open<?php }?>">
							<h4 class="collapse-block__title">COLORS</h4>
							<div class="collapse-block__content" style="<?php if($colors!=''){?>display:block<?php }?>">
								<ul class="simple-list">
                                <li <?php if($colors==''){?>class="active"<?php }?>><a class="ajaxx" href="<?php echo $_SERVER['PHP_SELF']?>?s=<?php echo urlfriendlyi($s)?>&c=<?php echo urlfriendlyi($c)?>&subcategory=<?php echo urlfriendlyi($subcategory)?>&min_price=<?php echo $min_price?>&max_price=<?php echo $max_price?>&orderby=<?php echo $orderby?>&brand=<?php echo $brand?>&type=<?php echo $type?>&min_discount=<?php echo $min_discount?>&max_discount=<?php echo $max_discount?>&bestprice=<?php echo $bestprice?>&buygetfree=<?php echo $buygetfree?>&newarrival=<?php echo $newarrival?>&feature=<?php echo urlfriendlyi($feature)?>&lastpiece=<?php echo $lastpiece?>&material=<?php echo urlfriendlyi($material)?>&typee=<?php echo urlfriendlyi($typee)?>&sizes=<?php echo urlfriendlyi($sizes)?>&colors=&searchh=<?php echo $searchh?>&display_mode=<?php echo $display_mode?>">All</a></li>
                                <?php $gg=$con->query("select *,count(*) as countt from projectscolors left join colors on colorsid=idcolors left join projects on idproject=projectsid left join supplier on supplierid=pidsupplier left join category on categoryid=idcategory left join subcategory on subcategoryid=idsubcategory left join brands on brandsid=idbrands where projects.deleted='0' $color_query and coloractive='Yes' and (prodactive='Yes' or prodactive='OOS') group by colorsid order by colorpriority asc,colorname asc");
				while($g=$con->fetch_array($gg)){?>
									  <li <?php if($colors==$g['colorname']){?>class="active"<?php }?>><a class="ajaxx" href="<?php echo $_SERVER['PHP_SELF']?>?s=<?php echo urlfriendlyi($s)?>&c=<?php echo urlfriendlyi($c)?>&subcategory=<?php echo urlfriendlyi($subcategory)?>&min_price=<?php echo $min_price?>&max_price=<?php echo $max_price?>&orderby=<?php echo $orderby?>&brand=<?php echo $brand?>&type=<?php echo $type?>&min_discount=<?php echo $min_discount?>&max_discount=<?php echo $max_discount?>&bestprice=<?php echo $bestprice?>&buygetfree=<?php echo $buygetfree?>&newarrival=<?php echo $newarrival?>&feature=<?php echo urlfriendlyi($feature)?>&lastpiece=<?php echo $lastpiece?>&material=<?php echo urlfriendlyi($material)?>&typee=<?php echo urlfriendlyi($typee)?>&sizes=<?php echo urlfriendlyi($sizes)?>&colors=<?php echo urlfriendlyi($colors)?>|<?php echo urlfriendlyi($g['colorname'])?>&searchh=<?php echo $searchh?>">
                                      <input class="thecheckbox" type="checkbox" <?php if (in_array($g['colorname'], $colorscombine)) {?>checked="checked"<?php }?>\> <?php echo $g['colorname']?> (<?php echo $g['countt']?>)
                                        </a></li>
                                    <?php }?>
								</ul>
							</div>
						</div>
                        <?php }?>
                        	<!-- /color block -->
                             <?php $sizecheck=$con->query("select * from projects left join supplier on supplierid=pidsupplier left join category on categoryid=idcategory left join brands on brandsid=idbrands left join subcategory on subcategoryid=idsubcategory where projects.deleted='0' and (prodactive='Yes' or prodactive='OOS') $globalprice  $size_query and projectsid in (select idproject from projectssizes left join sizes on sizesid=idsizes where sizes.deleted='0')");
                        if($con->num_rows($sizecheck)!=0){?>
                        	<div class="collapse-block <?php if($sizes!=''){?>open<?php }?>">
							<h4 class="collapse-block__title">SIZE</h4>
							<div class="collapse-block__content" style="<?php if($sizes!=''){?>display:block<?php }?>">
								<ul class="simple-list">
                                <li <?php if($sizes==''){?>class="active"<?php }?>><a class="ajaxx" href="<?php echo $_SERVER['PHP_SELF']?>?s=<?php echo urlfriendlyi($s)?>&c=<?php echo urlfriendlyi($c)?>&subcategory=<?php echo urlfriendlyi($subcategory)?>&min_price=<?php echo $min_price?>&max_price=<?php echo $max_price?>&orderby=<?php echo $orderby?>&brand=<?php echo $brand?>&type=<?php echo $type?>&min_discount=<?php echo $min_discount?>&max_discount=<?php echo $max_discount?>&bestprice=<?php echo $bestprice?>&buygetfree=<?php echo $buygetfree?>&newarrival=<?php echo $newarrival?>&feature=<?php echo urlfriendlyi($feature)?>&lastpiece=<?php echo $lastpiece?>&material=<?php echo urlfriendlyi($material)?>&typee=<?php echo urlfriendlyi($typee)?>&sizes=&colors=<?php echo urlfriendlyi($colors)?>&searchh=<?php echo $searchh?>&display_mode=<?php echo $display_mode?>">All</a></li>
                                <?php $gg=$con->query("select *,count(*) as countt from projectssizes left join sizes on sizesid=idsizes left join projects on idproject=projectsid left join supplier on supplierid=pidsupplier left join category on categoryid=idcategory left join subcategory on subcategoryid=idsubcategory left join brands on brandsid=idbrands where projects.deleted='0'  $size_query and sizesactive='Yes' and (prodactive='Yes' or prodactive='OOS') group by sizesid order by sizespriority asc,sizesname asc");
				while($g=$con->fetch_array($gg)){?>
									  <li <?php if($sizes==$g['sizesname']){?>class="active"<?php }?>><a class="ajaxx" href="<?php echo $_SERVER['PHP_SELF']?>?s=<?php echo urlfriendlyi($s)?>&c=<?php echo urlfriendlyi($c)?>&subcategory=<?php echo urlfriendlyi($subcategory)?>&min_price=<?php echo $min_price?>&max_price=<?php echo $max_price?>&orderby=<?php echo $orderby?>&brand=<?php echo $brand?>&type=<?php echo $type?>&min_discount=<?php echo $min_discount?>&max_discount=<?php echo $max_discount?>&bestprice=<?php echo $bestprice?>&buygetfree=<?php echo $buygetfree?>&newarrival=<?php echo $newarrival?>&feature=<?php echo urlfriendlyi($feature)?>&lastpiece=<?php echo $lastpiece?>&material=<?php echo urlfriendlyi($material)?>&typee=<?php echo urlfriendlyi($typee)?>&sizes=<?php echo urlfriendlyi($sizes)?>|<?php echo urlfriendlyi($g['sizesname'])?>&colors=<?php echo urlfriendlyi($colors)?>&searchh=<?php echo $searchh?>">
                                      <input class="thecheckbox" type="checkbox" <?php if (in_array($g['sizesname'], $sizescombine)) {?>checked="checked"<?php }?>\> <?php echo $g['sizesname']?> (<?php echo $g['countt']?>)
                                        </a></li>
                                    <?php }?>
								</ul>
							</div>
						</div>
                        <?php }?>
                        	<!-- /size block -->
					
					</aside>
                    </form>
					<!-- /left column -->
					<!-- center column -->
					<aside class="col-md-8 col-lg-9 col-xl-10" id="centerColumn">
						<!-- title -->
						<!--<div class="title-box">
							<h1 class="text-center text-uppercase title-under">women’s</h1>
						</div>-->
						<!-- /title -->



						<!-- filters row -->
						<div class="filters-row border-top-none">
							<div class="pull-left">
								<div class="filters-row__mode">
										<a href="#" class="btn btn--ys slide-column-open visible-xs visible-sm hidden-xl hidden-lg hidden-md">Filter</a>
									<a class="filters-row__view active link-grid-view btn-img btn-img-view_module"><span></span></a>
									<a class="filters-row__view link-row-view btn-img btn-img-view_list"><span></span></a>
								</div>
								<div class="filters-row__select hidden-sm hidden-xs">
									<label>Sort by: </label>
									<div class="select-wrapper">
										<select name="orderby" onChange="window.location='products?s=<?php echo urlfriendlyi($s)?>&c=<?php echo urlfriendlyi($c)?>&subcategory=<?php echo urlfriendlyi($subcategory)?>&min_price=<?php echo $min_price?>&max_price=<?php echo $max_price?>&orderby='+this.value+'&brand=<?php echo urlfriendlyi($brand)?>&type=<?php echo $type?>&min_discount=<?php echo $min_discount?>&max_discount=<?php echo $max_discount?>&bestprice=<?php echo $bestprice?>&buygetfree=<?php echo $buygetfree?>&newarrival=<?php echo $newarrival?>&feature=<?php echo urlfriendlyi($feature)?>&lastpiece=<?php echo $lastpiece?>&material=<?php echo urlfriendlyi($material)?>&typee=<?php echo urlfriendlyi($typee)?>&sizes=<?php echo urlfriendlyi($sizes)?>&colors=<?php echo urlfriendlyi($colors)?>&searchh=<?php echo $searchh?>'"  class="select--ys sort-position">
											<option value="name"  <?php if($orderby=='name'){?>selected='selected'<?php }?>>Default sorting</option>
                                                <option value="date" <?php if($orderby=='date'){?>selected='selected'<?php }?> >Newness</option>
                                                <option value="price_low" <?php if($orderby=='price_low'){?>selected='selected'<?php }?> >Price: low to high</option>
                                                <option value="price_high" <?php if($orderby=='price_high'){?>selected='selected'<?php }?> >Price: high to low</option>
										</select>
									</div>
									
								</div>
							</div>
							
						</div>
						<!-- /filters row -->
                        
                        
						<div class="product-listing row" style="position:relative">
                        <div class="listingload" style="display:none;text-align:center;z-index:1;background:rgba(255,255,255,0.5);position:absolute;width:100%;height:100%">
                          <div style="margin-top:20%"><img src="../images/loading.gif"></div>
                        </div>
                        
                        <?php
							
							  
							  $extra2='';
							   if($orderby!=""){
								    if($orderby=="name"){
										$extra2=",ptitle asc";
									}
									if($orderby=="date"){
										$extra2=",projects_created desc";
									}
									if($orderby=="price_low"){
										$extra2=",pspecialprice asc";
									}
									if($orderby=="price_high"){
										$extra2=",pspecialprice desc";
									}
							   }
							  
							 
							 $query="select * from projects left join supplier on supplierid=pidsupplier left join category on categoryid=idcategory left join brands on brandsid=idbrands left join subcategory on subcategoryid=idsubcategory where projects.deleted='0' and (prodactive='Yes' or prodactive='OOS') $globalprice  $extra1 $extra11 order by ppriority asc $extra2 ";
							 
						 
							 
						//echo $query;
							 
							 
							 
												   if($con->num_rowsfast($query)!=0){
													   //pager
													   $thispage=isset($_REQUEST['thispage'])?$_REQUEST['thispage']:1;
													   $thispage1=isset($_REQUEST['thispage1'])?$_REQUEST['thispage1']:1;
													   $passingparams="thispage1=".$thispage1."&amp;s=".urlfriendlyi($s)."&amp;c=".urlfriendlyi($c).""."&amp;subcategory=".urlfriendlyi($subcategory).""."&amp;searchh=".rawurlencode($searchh).""."&amp;brand=".rawurlencode($brand).""."&amp;min_price=".rawurlencode($min_price).""."&amp;max_price=".rawurlencode($max_price).""."&amp;orderby=".rawurlencode($orderby).""."&amp;type=".rawurlencode($type).""."&amp;min_discount=".rawurlencode($min_discount).""."&amp;max_discount=".rawurlencode($max_discount).""."&amp;bestprice=".rawurlencode($bestprice).""."&amp;buygetfree=".rawurlencode($buygetfree).""."&amp;newarrival=".rawurlencode($newarrival).""."&amp;feature=".urlfriendlyi($feature).""."&amp;lastpiece=".rawurlencode($lastpiece).""."&amp;material=".rawurlencode(urlfriendlyi($material))."&amp;colors=".urlfriendlyi($colors)."&amp;sizes=".urlfriendlyi($sizes)."&amp;typee=".urlfriendlyi($typee)."&amp;display_mode=".rawurlencode($display_mode)."";
													   $passingparamssort="";
														$pager=new pagination($con->con,$query,$thispage,30,$passingparams."&".$passingparamssort);
														  $pager->type="normal"; //dropdown,normal
														  $pager->pagingdistance="2"; //it is the distance of upper and lower part of the page number,can be 0 to show all the records
														  $pager->prev="<";
														  $pager->next=">";
														  $pager->first="<<";
														  $pager->last=">>";
														  $pager->showifonepage=false;
														  
														  //pager
													   $res = $pager->paginate();
													   $countp=0;
													   $n=0;?>
                                                      
                                                       <?php while($ress=$con->fetch_array($res)){
														   
														   if($ress['image']!=''){
															   $img="../uploads/project_thumb/".$ress['image']."";
														   }else{
															   $img="../uploads/static/default_thumb.jpg";
														   }
														   ?>
							
							<div class="col-xs-6 col-sm-3 col-md-6 col-lg-3 col-xl-one-fifth">
                            <input type="hidden" id="productsid<?php echo $countp?>" value="<?php echo $ress['projectsid']?>" />
                                                           <input type="hidden" id="quantity<?php echo $countp?>" value="1" />
								<!-- product -->
								<div class="product">
									<div class="product__inside">
										<!-- product image -->
										<div class="product__inside__image">
											<a href="product?id=<?php echo $ress['projectsid']?>"> <img src="<?php echo $img?>" alt=""> </a>
											<!-- quick-view -->
											<a href="quickview?id=<?php echo $ress['projectsid']?>" class="inline_i quick-view"><b><span class="icon icon-visibility"></span> Quick view</b> </a> 
											<!-- /quick-view -->
										</div>
										<!-- /product image -->
                                        
                                            <?php if($ress['newarrival']=='Yes'){?>
                                            <!--<div class="product__label product__label--right product__label--new"> <span>new</span> </div>-->
                                            <?php }?>
                                            <?php if($ress['pfreeshipping']=='1'){?>
                                            <div class="product__label product__label--right product__label--sale" style="background:none"> <span><span style="color:red;font-weight:bold;background-color:#ffffff">Free Shipping</span> <br /><img src="../images/free.png" alt="Free Shipping" style="width:50px"></span> 
											</div>
                                            <?php }?>
                                            
										<!-- product name -->
										<div class="product__inside__name">
											<h2><a href="product?id=<?php echo $ress['projectsid']?>"><?php echo wordslice($ress['ptitle'])?></a></h2>
										</div>
										<!-- /product name -->                 <!-- product description -->
										<!-- visible only in row-view mode -->
										
										<!-- /product description -->                 <!-- product price -->
										<div class="product__inside__price price-box"><?php echo convert($ress['pspecialprice'], $_SESSION['hj_language'],'en')?> <?php if($ress['pspecialprice']!=$ress['pprice']){?><span class="price-box__old"><?php echo convert($ress['pprice'], $_SESSION['hj_language'],'en')?></span><?php }?></div>
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
                                                <a href="quickview?id=<?php echo $ress['projectsid']?>"  id="addtocartholder" class="inline_i  btn btn--ys btn--xl"><span class="icon icon-shopping_basket"></span> Add to cart</a>
                                                <?php }else{?>
                                                <a href="javascript:void()" id="addtocartholder"  onClick="ajaxbasket('quantity<?php echo $countp?>','productsid<?php echo $countp?>');return false" class="btn btn--ys btn--xl"><span class="icon icon-shopping_basket"></span> Add to cart</a>
                                                <?php }?>
													<a href="javascript:void()"  onClick="ajaxwishlist('<?php echo $ress['projectsid']?>');return false;" class="btn btn--ys btn--xl visible-xs"><span class="icon icon-favorite_border"></span></a>
													
												</div>
												<ul class="product__inside__info__link hidden-sm">
													<li class="text-right"><span class="icon icon-favorite_border  tooltip-link"></span><a href="javascript:void()"  onClick="ajaxwishlist('<?php echo $ress['projectsid']?>');return false;"><span class="text">Add to wishlist</span></a></li>
													
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
                            <?php $n++;
								$countp++;}?>
           							 <br />
                                     <div class="clearfix"></div>
                                                       <table style="padding:5px">
                                                            <tr>
                                                              <td valign="top"><?php $pager->first()?></td>
                                                              <td valign="top"><?php $pager->previous()?></td>
                                                              <td valign="top"><?php $pager->render()?></td>
                                                              <td valign="top"><?php $pager->next()?></td>
                                                              <td valign="top"><?php $pager->last()?></td>
                                                            </tr>
                </table>
            <?php }else{?>
            No Products Found
            <?php }?>
							
							
							

						</div>
						<!-- filters row -->
						
						<!-- /filters row -->
					</aside>
					<!-- center column -->
				</div>
				<!-- /two columns -->
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
			 
            // getproduct("ajax_products.php?s=<?php echo urlfriendlyi($s)?>&c=<?php echo urlfriendlyi($c)?>&subcategory=<?php echo urlfriendlyi($subcategory)?>&min_price=<?php echo $min_price?>&max_price=<?php echo $max_price?>&orderby=<?php echo $orderby?>&brand=<?php echo $brand?>&type=<?php echo $type?>&min_discount=<?php echo $min_discount?>&max_discount=<?php echo $max_discount?>&bestprice=<?php echo $bestprice?>&buygetfree=<?php echo $buygetfree?>&newarrival=<?php echo $newarrival?>&searchh=<?php echo $searchh?>&display_mode=<?php echo $display_mode?>")
			 
            

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
				
		$j('.thecheckbox').click(function(){window.location=$j(this).parent().attr("href")})


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