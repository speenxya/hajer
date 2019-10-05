<?php include "../includes/ini.php";?>
<?php ?>
<?php $bas=new basket();
$bas->init('hj_cart');
$total="0";
if($bas->get_cart()){
	
	foreach($bas->get_cart() as $a=>$b){
		$total=$total+$b;
	}
}
echo $total;
exit();?>