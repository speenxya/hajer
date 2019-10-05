<?php include "../includes/ini.php";
$g=$con->query("select * from city where deleted='0' and  ccountry='".$_REQUEST['name']."' order by cnamee asc");
echo "<select name='city' id='city'>
   <option value='' selected='selected'></option>";
while($gg=$con->fetch_array($g)){
	echo "<option value='".$gg['cnamee']."'>".$gg['cnamee']."</option>";
}
echo "</select>";
exit();?>