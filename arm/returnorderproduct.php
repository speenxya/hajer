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
    $returncompany="أرامكس";
    }
if($_REQUEST['returncompany']=='Jawhara (Inside Al Ahsa)'){
    $returncompany="جوهره (داخل الاحساء)";
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
											  $msgv="<font class='itsnotok'><br>يرجى اختيار صورة صالحة</font>";
										  }
										}else{
										  $msgv="<font class='itsnotok'>يرجى إرفاق صورة صالحةe</font>";
										  }//handle
										unset($handle);
						 }//ifsset
                         
                          if(!isset($msgv)){
					 $con->query("update orderitems set returnstatus='Return Processing',returncompany='".m_prepare($_REQUEST['returncompany'])."', returnreason='".m_prepare($_REQUEST['cancelreason'])."', returnreasonother='".m_prepare($_REQUEST['cancelreasonother'])."' where orderitemsid='".m_prepare($id)."'");
                     $con->query("update orders set  sstatus='Return Processing' where ordersid='".m_prepare($clientdetail['ordersid'])."'");
                        if(insert("orderstatement",array("idorder"=>$clientdetail['ordersid'],"comment"=>m_prepare($_REQUEST['cancelreason']),"status"=>"Return Processing","orderstatement_created"=>date("Y-m-d H:i:s"),"orderstatement_modified"=>date("Y-m-d H:i:s")),$con)){
							  $insertidd=$con->insert_id();
							  update("orderstatement",array("orderstatementid"=>$insertidd."-".$m_branch),"where dummy_orderstatementid='$insertidd'",$con);
                               
                              
                              }
                     }
                     }
                      if($type=='before'){
                        $con->query("update orderitems set  rquantity=oquantity,oquantity=0,returnstatus='Cancelled',returncompany='".m_prepare($_REQUEST['returncompany'])."', returnreason='".m_prepare($_REQUEST['cancelreason'])."', returnreasonother='".m_prepare($_REQUEST['cancelreasonother'])."' where orderitemsid='".m_prepare($id)."'");
                        $con->query("update orders set  sstatus='Pending' where ordersid='".m_prepare($clientdetail['ordersid'])."'");
                        
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
                                        شكراً لقد تم استلام طلبك.<br>
سنقوم بدراسة طلب الإرجاع وفحص السلع المرتجعة والتأكد من حالتها, وعند صدور الموافقة سيتم تحرير المبلغ إلى حساب العميل.<br><br>
<span style='color:red'>تذكير:</span><br>

- إذا كان يوجد بالمنتج عيب سنتحمل تكاليف الشحن وإرجاع المبلغ كاملاً .<br>
- إذا كان المنتج خالياً من العيوب وتم استلامه ثم أراد المشتري إلغاءه فحينئذ تكون رسوم الشحن على المشتري.<br><br>


<span style='color:blue'>ماذا تفعل الآن:</span><br>
<ol style='padding-right:12px'>
<li>سوف يتم التواصل معك وتزويدك برقم بوليصة الشحن عبر البريد الالكتروني.</li>
<li>اعد تغليف السلعة بغلافها الأصلي. ولا تقم بإزالة آي ملصقات من على الغلاف وقم بإلصاق بوليصة الشحن على غلاف السلعة.</li>
</ol>
</font>";
}

 if($type=='before'){
    $msgv="<font class='itsok'>شكرا لك ، طلبك قيد المراجعة</font>";
    }
                                        
                                          $total=$clientdetail['stotal'];
$invoice=$clientdetail['invoicenumber'];
$paymentmethod =$clientdetail['spaymethod'];
$awbnumber =$clientdetail['awbnumber'];

         include "sendmailtoclientreturn.php";
         
        
        
          if($type=='after'){
            $subject="سيتم إرجاع السلعة";
            }
            if($type=='before'){
                $subject="سيتم الغاء السلعة";
                }
                
         	@sendmail($m_config['creturnemail'],$clientdetail['email'], $titl." - ".$subject."",$body);
            @sendmail($m_config['creturnemail'],$m_config['creturnemail'], $titl." - ".$subject."",$body);
            
            
                                         $success=1;
                                         }//$msg for image
				   }
                   


				   ?>
        <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
        <html xmlns="http://www.w3.org/1999/xhtml">
        <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="DESCRIPTION" CONTENT="">
        <meta name="KEYWORDS" CONTENT="">
        <meta http-equiv="Cache-Control" content="no-cache" />
        <meta http-equiv="Expires" content="0" />
        <?php include "metastuff.php"?>
        <link rel="stylesheet" type="text/css" media="all" href="../styles/admin.css" />
		<link rel="stylesheet" type="text/css" media="print" href="../styles/adminprint.css" />
        <link rel="stylesheet" type="text/css" media="all" href="../styles/jquery_ui_datepicker.css" />
        <link rel="stylesheet" type="text/css" media="all" href="../styles/jquery_ui_theme.css" />
        <link type="text/css" href="../styles/lava.css" rel="stylesheet"  />
        <link type="text/css" href="../styles/fancybox.css" rel="stylesheet"  />
        	<link rel="stylesheet" href="../css/style-layout11ar.css?v=2">
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
        </head>
        <body>
        <div class="pagechange" style="display:none;;position:fixed;top:0px;left:0px;width:100%;height:100%;z-index:100000000;background:rgba(0,157,192,0.5)">
<div style="text-align:center;padding-top:20%">
<div id="" style="text-align:Center;margin:0 auto;color:#ffffff;font-size:20px;font-weight:bold">جاري التحميل ...</div>

</div>
</div>

        <div style="max-width:700px;margin:0 auto">        
        <table width="100%" height="100%" cellpadding="0" cellspacing="0" align="center">
         <tr>
                <td valign="top">
                <div style="text-align:center"><img src="../images/logoloader.png" syle="width:100px"></div>
                  
                
					   <?php if(isset($msgv)){?>
                       <div style="text-align:right"><?php echo $msgv?><br /><br /></div>
                       <?php }?>
                        <?php if(!isset($success)){?>
                      <form name="form" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF']?>" method="post" onsubmit="return m_submit()">
                      <input type="hidden" name="action" value="1">
                      <input type="hidden" name="id" value="<?php echo $id?>">
                      <input type="hidden" name="type" value="<?php echo $type?>">
                      
                      
                      <div style="text-align:right">يرجى تحديد السبب</div>
                      <div style="margin-bottom:20px"><select name="cancelreason" style="direction:rtl;width:100%;padding:10px">
                      
                         <?php if($type=='after'){?>
                         <?php $gpp=$con->query("select * from reasons where deleted='0' and reasonstype='after' and reasonsactive='Yes' order by reasonspriority asc, reasonsname asc");
                         while($gp=$con->fetch_array($gpp)){?>
                        <option value="<?php echo $gp['reasonsname']?>" selected="selected"><?php echo $gp['reasonsnamear']?></option>
                        <?php }?>
                        <?php }?>
                        
                        <?php if($type=='before'){?>
                         <?php $gpp=$con->query("select * from reasons where deleted='0' and reasonstype='before' and reasonsactive='Yes' order by reasonspriority asc, reasonsname asc");
                         while($gp=$con->fetch_array($gpp)){?>
                        <option value="<?php echo $gp['reasonsname']?>" selected="selected"><?php echo $gp['reasonsnamear']?></option>
                        <?php }?>
                        <?php }?>
                        
                        <option value="Other" selected="selected">أخر</option>
                      </select></div>
                      <div style="text-align:right">سبب أخر</div>
                      <div style="margin-bottom:20px""><textarea name="cancelreasonother" style="direction:rtl;width:100%"></textarea></div>
                      <?php if($type=='after'){?>
                      <div>يرجى اختيار شركة الشحن</div>
                      <div style="margin-bottom:20px"><select name="returncompany" style="width:100%;padding:10px">
                        <?php $shh=$con->query("select * from company where deleted='0' and companyactive='Yes' order by companypriority asc,companyname asc");
                while($sh=$con->fetch_array($shh)){?>
                        <option value="<?php echo $sh['companyname']?>" selected="selected"><?php echo $sh['companylabelar']?></option>
                        <?php }?>
                      </select></div>
                      
                      <div style="margin-bottom:10px">يرجى تحميل صورة المنتج</div>
                      <div style="margin-bottom:20px">
                      <input type="file" name="returnimage"  ></div>
                      
                      
                      <?php }else{?>
                      <input type="hidden" name="returncompany">
                      <?php }?>
                      
                      <?php if($type=='after'){?>
                      <div><i>لا يمكن إرجاع المنتج إذا تم استخدامه وأتلفه أو من دون تغليف ( أي تغليف المنتج الأصلي حين الاستلام ) أو من دون بطاقات الأسعار أو من دون الإكسسوارات أو من دون الرقم التسلسلي على المنتج أو من دون كرتونه الأصلي المرسل .</i></div>
                      
                      <div style="margin-top:20px">
                      <input type="checkbox" name="termcheck" id="termcheck">  أوافق على <a style="color:blue" target=_blank href="returnproduct" class="inline">سياسة الاسترجاع والاستبدال</a>
                      </div>
                      <?php }?>
                      
                      <?php if($type=='after'){?>
                      <div style="text-align:center;margin-top:20px"><input style="color: #fff;background-color: #1b3281;border-color: #1b3281;border:none;-webkit-appearance: none;border-radius: 0;padding:10px 20px" type="submit"  class="theupload" value="اعادة السلعة" />
                      </div>
                      <?php }?>
                      <?php if($type=='before'){?>
                      <div style="text-align:center;margin-top:20px"><input style="color: #fff;background-color: #1b3281;border-color: #1b3281;border:none;-webkit-appearance: none;border-radius: 0;padding:10px 20px" type="submit"  class="theupload" value="الغاء السلعة" />
                      </div>
                      <?php }?>
                      </form>
                 <?php }?>
                  
                   
                  <div style="text-align:center;margin-top:20px"><a href="orderhistory.php" style="color: #fff;background-color: #1b3281;border-color: #1b3281;text-decoration:none;padding:0px 5px">الرجوع</a></div> 
                   
                  </td>
          </tr>
        </table>
        </div>
        
       <script>
       
        
        
     
       function m_submit(){
         <?php if($type=='after'){?>
         if(document.form.termcheck.checked===false){
		alert("يرجى الوافقة على سياسة الاسترجاع والاستبدال")
		return false
		}
        
       
        
        
        var tt= confirm("يرجى  التأكد من اختيار سبب الارجاع الصحيح حتى لا يتم رفضه عند الفحص \n\  هل انت منأكد من أنك تريد اتمام عملية الإرجاع؟")
if(tt==true){
     $(".theupload").val("يرجى الانتظار")
$('.pagechange').show()
return true;
}else{
return false;
}

        <?php }?>
        <?php if($type=='before'){?>
        return confirm("هل انت متأكد؟")
        <?php }?>
        }
       </script>
        
        </body>
        </html>
        