<?php include "../includes/ini.php"?>
<?php
if(isset($_REQUEST['add'])){
	$productsid=$_REQUEST['productsid'];
	if(isset($_SESSION['hj_id'])){
		 $countt=$con->getcertainvalue("select *, count(*) as counts from wishlist where userid='".$_SESSION['hj_id']."' and projectsid='".$productsid."'","counts");
		 if($countt==0){
			$con->query("insert into wishlist values('".$_SESSION['hj_id']."','".$productsid."')");
			echo "added";
		 }else{
			 echo "المنتج يوجد في قائمة امنياتك";
		 }
	//echo "added";
	}else{
		echo "notlogged";
	}
	
	
}
?>