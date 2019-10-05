<?php include "../includes/ini.php"?>
<?php syncbasket(session_id());?>
<?php 
if(isset($_REQUEST['add'])){
    $color=m_fill("color",$_REQUEST);
	$size=m_fill("size",$_REQUEST);
    
	$productsid=$_REQUEST['productsid'];
	$data=$con->getcertainvalue("select * from projects left join category on categoryid=idcategory   where projectsid='".m_prepare($productsid)."' and projects.deleted='0' ",array("projectsid"=>"projectsid","ptitle"=>"ptitle","bname"=>"bname","prodbrand"=>"prodbrand","psize"=>"psize","pspecialprice"=>"pspecialprice","pcode"=>"pcode","pquantity"=>"pquantity"));
	$data['pquantity']=getstock($data['projectsid'],$color,$size,session_id());
    

		
	$quantity=$_REQUEST['quantity'];
	
	
	if($quantity>$data['pquantity']){
		echo "Quantity not available at this time";
	}else{
		if(is_int($quantity) || ($quantity!='0' && $quantity!='')){
			    $m=$bas->get_cart();
				if(isset($m[$productsid.':::'])){
					$checkp=$m[$productsid.':::'];
				}else{
					$checkp=0;
				}
				//if($checkp+$quantity<=$data['pquantity']){	
				if($quantity<=$data['pquantity']){	
					$bas->add_cart($productsid.":::".$color.":::".$size,$quantity);
					//check if the added if more thanthe required
					$m=$bas->get_cart();
					addbasket($productsid,$quantity,session_id(),$color,$size,@$_SESSION['hj_id']);
					echo "added";
					//also add to the basket items
				}else{
					echo "Quantity not available at this time";
				}
		}else{
			echo "The quantity you have entered is not a valid number";
		}
	}//not available
}
?>