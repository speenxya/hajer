<?php include "../includes/ini.php";?>
<?php ?>
<?php $bas=new basket();
$bas->init('hj_cart');
$tot="0";
if($bas->get_cart()){ 
foreach($bas->get_cart() as $a=>$b){
				 $aa=explode(":::",$a);
				  $cc=$con->getcertainvalue("select * from projects left join category on categoryid=idcategory left join supplier on supplierid=idsupplier where projectsid='".$aa[0]."'",array("projectsid"=>"projectsid","image"=>"image","ptitlear"=>"ptitlear","pprice"=>"pprice","pspecialprice"=>"pspecialprice","bnamear"=>"bnamear","snamear"=>"snamear"));
				 //special price or not
				 $useprice=$cc['pspecialprice'];
				
				 $tot=$tot+$useprice*$b;
			 }
			 }
			 
echo convert($tot, $_SESSION['hj_language'],'en',$nosign=1);
exit();?>