<?php include "../includes/ini.php";?>
<?php $hh=$con->query("select distinct sizesname,sizesnamear,iquantity from projectspics  left join colors on colorsid=iidcolor left join sizes on sizesid=iidsizes where projectspics.deleted='0' and iidsizes!='' and iquantity!=0 and idproject='".m_prepare($_REQUEST['id'])."' and colorname='".m_prepare($_REQUEST['name'])."'");

									 if($con->num_rows($hh)!=0){
									   $sizecounter=0;?>
                                      الحجم   <select onchange="setmax()" name="thesize" id="thesize" style="padding:5px 10px;border:1px solid #cccccc">
                                               <option value="pleaseselect">اختر</option>
                                               <?php while($h=$con->fetch_array($hh)){
                                                if($sizecounter==0){
                                                    ?>
                                                 <script>
                                                   setmax()
                                                 </script>
                                                <?php }?>
                                                 <option themax="<?php echo $h['iquantity']?>" value="<?php echo $h['sizesname']?>"><?php echo $h['sizesnamear']?></option>
                                               <?php $sizecounter++;}?>
                                              </select>
                                     <br>  <br>                                              
                                     <?php }else{
                                        $h=$con->fetch_array($con->query("select distinct sizesname,iquantity from projectspics  left join colors on colorsid=iidcolor left join sizes on sizesid=iidsizes where projectspics.deleted='0'  and iquantity!=0 and idproject='".m_prepare($_REQUEST['id'])."' and colorname='".m_prepare($_REQUEST['name'])."'"));?>
                                     <input type="hidden" themaxx="<?php echo $h['iquantity']?>" name="thesize" id="thesize" value="">
                                      <script>
                                                   setmax()
                                                 </script>
                                     <?php }?>
