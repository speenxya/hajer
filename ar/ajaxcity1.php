<?php include "../includes/ini.php";
$g=$con->query("select * from city where deleted='0' and  ccountry='".$_REQUEST['name']."' order by cnameear asc");
echo "<select name='scity' id='scity'>
   <option value='' selected='selected'></option>";
while($gg=$con->fetch_array($g)){
	echo "<option value='".$gg['cnamee']."'>".$gg['cnameear']."</option>";
}
echo "</select>";
exit();?>