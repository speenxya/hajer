<?php include("../includes/ini.php");
unset($_SESSION['hj_id']);
	unset($_SESSION['hj_username']);
	unset($_SESSION['hj_fname']);
	unset($_SESSION['hj_lname']);
    
    $bas=new basket();
		$bas->init('hj_cart');
		$bas->removeall_cart(); 
        
	echo changelocation("index");
?>