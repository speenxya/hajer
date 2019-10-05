<?php require "../includes/ini.php";
$id=m_fill("id",$_REQUEST);
$type=m_fill("type",$_REQUEST);
$returncompany=m_fill("returncompany",$_REQUEST);

if(isset($_REQUEST['changelanguage'])){
   if($_REQUEST['changelanguage']=='USD'){ 	
	$_SESSION['hj_language']='USD';
   }
   if($_REQUEST['changelanguage']=='SAR'){ 	
	$_SESSION['hj_language']='SAR';
   }
   if($_REQUEST['changelanguage']=='EURO'){ 	
	$_SESSION['hj_language']='EURO';
   }
}

$code=$id;



				   if(isset($_REQUEST['action'])){
				    
                    $clientdetail=$con->fetch_array($con->query("select * from orderitems left join  orders on ordersid=idorders left join access on accessid=oiduser where orderitemsid='".$id."'"));
if($_REQUEST['returncompany']=='ARAMEX'){
    $returncompany="ARAMEX";
    }
if($_REQUEST['returncompany']=='Jawhara (Inside Al Ahsa)'){
    $returncompany="Jawhara (Inside Al Ahsa)";
    }
    
    
					   //get order details
                       
                       
                        if($type=='after'){
                            
                            
                             if(isset($_FILES['returnimage'])){				
							$handle=new upload($_FILES['returnimage']);
										 $handle->allowed = array('image/*');
										 if ($handle->uploaded) {
											
										 $handle->file_new_name_body=$id."_image";
										 $handle->file_overwrite=false;
										  if($handle->image_src_x>10){//crop if the image is bigger than 450px
											 $handle->image_resize         = true;
											 //$handle->image_ratio_no_zoom_in = true;
											  if($handle->image_src_y>=$handle->image_src_x){
												 $handle->image_ratio_fill      = true;
												 $handle->image_background_color = '#ffffff';
											  }
											  if($handle->image_src_x>$handle->image_src_y){
											 $handle->image_ratio_crop      = "TB";//as in crop from top only
											  }
											 $handle->image_ratio_y = true;
											 //$handle->image_x              = 300;
											 $handle->image_x             = 500;
											 
										 }
										  $handle->process('../uploads/productreturns');
										  if ($handle->processed) {
												  update("orderitems",array("returnimage"=>$handle->file_dst_name),"where orderitemsid='$id'",$con);
											  $handle->clean();
										  } else {
											  $msgv="<font class='itsnotok'><br>Error Uploading Image: ".$handle->error."</font>";
										  }
										}else{
										  $msgv="<font class='itsnotok'>Please attach valid image</font>";
										  }//handle
										unset($handle);
						 }//ifsset
                         
                      
                         
                        
                         
                         if(!isset($msgv)){
					 $con->query("update orderitems set returnstatus='Return Processing',returncompany='".m_prepare($_REQUEST['returncompany'])."', returnreason='".m_prepare($_REQUEST['cancelreason'])."', returnreasonother='".m_prepare($_REQUEST['cancelreasonother'])."' where orderitemsid='".m_prepare($id)."'");
                     $con->query("update orders set  sstatus='Pending' where ordersid='".m_prepare($clientdetail['ordersid'])."'");
                     if(insert("orderstatement",array("idorder"=>$clientdetail['ordersid'],"comment"=>m_prepare($_REQUEST['cancelreason']),"status"=>"Return Processing","orderstatement_created"=>date("Y-m-d H:i:s"),"orderstatement_modified"=>date("Y-m-d H:i:s")),$con)){
							  $insertidd=$con->insert_id();
							  update("orderstatement",array("orderstatementid"=>$insertidd."-".$m_branch),"where dummy_orderstatementid='$insertidd'",$con);
                              }
                     }
                     }
                      if($type=='before'){
                       $con->query("update orderitems set rquantity=oquantity,oquantity=0,returnstatus='Cancelled',returncompany='".m_prepare($_REQUEST['returncompany'])."', returnreason='".m_prepare($_REQUEST['cancelreason'])."', returnreasonother='".m_prepare($_REQUEST['cancelreasonother'])."' where orderitemsid='".m_prepare($id)."'");
                        $con->query("update orders set  sstatus='Cancel Processing' where ordersid='".m_prepare($clientdetail['ordersid'])."'");
                        if(insert("orderstatement",array("idorder"=>$clientdetail['ordersid'],"comment"=>m_prepare($_REQUEST['cancelreason']),"status"=>'Cancel Processing',"orderstatement_created"=>date("Y-m-d H:i:s"),"orderstatement_modified"=>date("Y-m-d H:i:s")),$con)){
							  $insertidd=$con->insert_id();
							  update("orderstatement",array("orderstatementid"=>$insertidd."-".$m_branch),"where dummy_orderstatementid='$insertidd'",$con);
                              
                              //recalculate total
                               $ori=$con->query("select * from orderitems left join projects on projectsid=oidproject where idorders='".m_prepare($clientdetail['ordersid'])."'");
                               $subtotal=0;
                                $totaldiscunt=0;
			              while($orii=$con->fetch_array($ori)){
			                 $subtotal=$subtotal+(($orii['oquantity'])*$orii['pspecialprice']);
                             $totaldiscunt=$totaldiscunt+($orii['voucherprice']*$orii['oquantity']);
            			     }
							 
							 if(($clientdetail['sshipping']=='ARAMEX') || $clientdetail['sshipping']=='ARAMEX (Delivery to all regions of the Kingdom)'){
                             $clientdetail['sshippingprice']=getcostfixed_order($clientdetail['scountry'],$clientdetail['scity'],$clientdetail['spostalcode'],'',$clientdetail['ordersid']);
                             }
							 
                             $subtotal=$subtotal+$clientdetail['sshippingprice'];
                            if($totaldiscunt!=0){
                                //if($clientdetail['voucherfixed']=='0'){
                				//	$subtotal=$subtotal-($clientdetail['voucherdiscount']*$total)/100;
                					//}else{
                						$subtotal=$subtotal-$totaldiscunt;
                					//}
                                }
                                $subtotal=$subtotal+$clientdetail['cashextra'];
                                $con->query("update orders set  voucherdiscount='".$totaldiscunt."',stotal='".$subtotal."',sshippingprice='".$clientdetail['sshippingprice']."' where ordersid='".m_prepare($clientdetail['ordersid'])."'");
                              }

                        }
                    
                     if(!isset($msgv)){
                    if($type=='after'){
                       
                     $msgv="<font class=''>
                                       Thank you! Return request has been received.<br><br>
We will study the return request and check the returned goods condition. Upon approval, the amount will be released to the customer's account.<br><br>
<span style='color:red'>Reminder</span>:<br>

If the product has a defect we will bear the shipping costs and return the full amount.<br>
If the product is free of defects and was received by the buyer then wanted to cancel it, the shipping charges will be on the buyer.<br><br>

<span style='color:blue'>What to do now?</span><br>
<ol style='padding-left:12px'>
<li>You will be contacted and provided with the waybill number by e-mail.</li>
<li>Re-package the product in its original package. Do not remove any stickers, paste the waybill number on the package cover.</li>
</ul>

                                        </font>";
                                        
                                        
                                        }
                                        
                                        
                                        if($type=='before'){
                                            $msgv="<font class='itsok'>Thank you, your order is under review</font>";
                                        }
                                        
                                        $total=$clientdetail['stotal'];
$invoice=$clientdetail['invoicenumber'];
$paymentmethod =$clientdetail['spaymethod'];
$awbnumber =$clientdetail['awbnumber'];



         include "sendmailtoclientreturn.php";
         
         
         
         
         
        
        
        if($type=='before'){
            $subject="Product will be cancelled";
            }
            if($type=='after'){
                $subject="Product will be returned";
                }
                
                //echo $body;
               // echo $subject;
         
         	@sendmail($m_config['creturnemail'],$clientdetail['email'], $titl." - ".$subject."",$body);
            @sendmail($m_config['creturnemail'],$m_config['creturnemail'], $titl." - ".$subject."",$body);
            
            
            
                                        $success=1;
                                        }//$msgv
				   
				   }
                   
                   

				   ?>
        <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
        <html xmlns="http://www.w3.org/1999/xhtml">
        <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="DESCRIPTION" CONTENT="">
        <meta name="KEYWORDS" CONTENT="">
        <?php include "metastuff.php"?>
        <meta http-equiv="Cache-Control" content="no-cache" />
        <meta http-equiv="Expires" content="0" />
        <link rel="stylesheet" type="text/css" media="all" href="../styles/admin.css" />
		<link rel="stylesheet" type="text/css" media="print" href="../styles/adminprint.css" />
        <link rel="stylesheet" type="text/css" media="all" href="../styles/jquery_ui_datepicker.css" />
        <link rel="stylesheet" type="text/css" media="all" href="../styles/jquery_ui_theme.css" />
        <link type="text/css" href="../styles/lava.css" rel="stylesheet"  />
        <link type="text/css" href="../styles/fancybox.css" rel="stylesheet"  />
        <script type="text/javascript" src="../js/jquery.js"></script>
        <script type="text/javascript" src="../js/jquery_ui_core.js"></script>
        <script type="text/javascript" src="../js/jquery_ui_widget.js"></script>
        <script type="text/javascript" src="../js/jquery_ui_datepicker.js"></script>
        <script type="text/javascript" src="../js/jeasing.js"></script>
        <script type="text/javascript" src="../js/jwplayer.js"></script>
        
        <script type="text/javascript" src="../js/functions.js"></script>
        <script type="text/javascript" src="../js/startup_website.js"></script>
        <script type="text/javascript">

$(document).ready(function(){

	
	
	
	
});

</script>
<style>
body {padding:20px;margin:0}
</style>
        </head><body>
        <div class="pagechange" style="display:none;position:fixed;top:0px;left:0px;width:100%;height:100%;z-index:100000000;background:rgba(0,157,192,0.5)">
<div style="text-align:center;padding-top:20%">
<div id="" style="text-align:Center;margin:0 auto;color:#ffffff;font-size:20px;font-weight:bold">Loading ...</div>

</div>
</div>
        <div style="max-width:700px;margin:0 auto">        
        <table width="100%" height="100%" cellpadding="0" cellspacing="0" align="center">
         <tr>
                <td valign="top">
                  <div style="text-align:center"><img src="../images/logoloader.png" syle="width:100px"></div>
                
					   <?php if(isset($msgv)){?>
                       <div><?php echo $msgv?><br /><br /></div>
                       <?php }?>
                       
                       <?php if(!isset($success)){?>
                      <form name="form" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF']?>" method="post" onsubmit="return m_submit()">
                      <input type="hidden" name="action" value="1">
                      <input type="hidden" name="id" value="<?php echo $id?>">
                      <input type="hidden" name="type" value="<?php echo $type?>">
                      
                      
                      <div>Please select reason</div>
                      <div style="margin-bottom:20px"><select name="cancelreason" style="width:100%;padding:10px">
                     
                         <?php if($type=='after'){?>
                         <?php $gpp=$con->query("select * from reasons where deleted='0' and reasonstype='after' and reasonsactive='Yes' order by reasonspriority asc, reasonsname asc");
                         while($gp=$con->fetch_array($gpp)){?>
                        <option value="<?php echo $gp['reasonsname']?>" selected="selected"><?php echo $gp['reasonsname']?></option>
                        <?php }?>
                        <?php }?>
                         <?php if($type=='before'){?>
                         <?php $gpp=$con->query("select * from reasons where deleted='0' and reasonstype='before' and reasonsactive='Yes' order by reasonspriority asc, reasonsname asc");
                         while($gp=$con->fetch_array($gpp)){?>
                        <option value="<?php echo $gp['reasonsname']?>" selected="selected"><?php echo $gp['reasonsname']?></option>
                        <?php }?>
                        <?php }?>
                        <option value="Other" selected="selected">Other</option>
                      </select></div>
                      <div>Other reason</div>
                      <div style="margin-bottom:20px"><textarea name="cancelreasonother" style="width:100%"></textarea></div>
                      <?php if($type=='after'){?>
                      <div>Please select Shipping Company</div>
                      <div style="margin-bottom:20px"><select name="returncompany" style="width:100%;padding:10px">
                        <?php $shh=$con->query("select * from company where deleted='0' and companyactive='Yes' order by companypriority asc,companyname asc");
                while($sh=$con->fetch_array($shh)){?>
                        <option value="<?php echo $sh['companyname']?>" selected="selected"><?php echo $sh['companylabel']?></option>
                        <?php }?>
                      </select></div>
                      
                      <div style="margin-bottom:10px">Please upload product image</div>
                      <div style="margin-bottom:20px">
                      <input type="file" name="returnimage"   ></div>
                      
                      <?php }else{?>
                      <input type="hidden" name="returncompany">
                      <?php }?>
                       <?php if($type=='after'){?>
                      <div><i>The product cannot be returned, If it  is used and damaged or without packaging (packaging of the original product when received), price tags, accessories, serial number on the product or without the original carton of the sender.</i></div>
                      
                      <div style="margin-top:20px">
                      <input type="checkbox" name="termcheck" id="termcheck">  I agree to the <a target=_blank href="returnproduct" style="color:blue" class="inline">Return & Replacement Policy</a>
                      </div>
                      <?php }?>
                      
                      <?php if($type=='after'){?>
                      <div style="text-align:center;margin-top:20px"><input style="color: #fff;background-color: #1b3281;border-color: #1b3281;border:none;-webkit-appearance: none;border-radius: 0;padding:10px 20px" type="submit" class="theupload" value="Return Product"  /> 
                      </div>
                      <?php }?>
                      <?php if($type=='before'){?>
                      <div style="text-align:center;margin-top:20px"><input style="color: #fff;background-color: #1b3281;border-color: #1b3281;border:none;-webkit-appearance: none;border-radius: 0;padding:10px 20px" type="submit" class="theupload"  value="Cancel Product" />
                      </div>
                      <?php }?>
                      </form>
                      <?php }?>
                 
                  
                   
                   
                   <div style="text-align:center;margin-top:20px"><a href="orderhistory.php" style="color: #fff;background-color: #1b3281;border-color: #1b3281;text-decoration:none;padding:0px 5px">Back</a></div>
                   
                  </td>
          </tr>
        </table>
        </div>
        
       <script>
       function m_submit(){
        
       
        
        
        <?php if($type=='after'){?>
        
        if(document.form.termcheck.checked===false){
		alert("Please agree to our Return & replacement Policy")
		return false
		}
        
        
        
        var tt= confirm("Please check the correct reason so that it does not get rejected during testing\n\
Are you sure you want to continue?")
if(tt==true){
     $(".theupload").val("Please Wait")
$('.pagechange').show()
return true;
}else{
return false;
}
<?php }?>
 <?php if($type=='before'){?>
        return confirm("Are you sure?")
        <?php }?>
        
       
        
       
        
         
        }
       </script>
       
       <script>
      
       
       </script>
        
        </body>
        </html>
        