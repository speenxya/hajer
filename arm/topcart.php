<?php include "../includes/ini.php"?>
<?php $bas=new basket();
$bas->init('hj_cart');
$m=$bas->get_cart();

removeoldbasket();

?>
<form name="form2" method="post">
        <input type="hidden" name="delete" value="1">
        <div class="tablescroller">
        <div style="max-height:300px;overflow-y:scroll;o">
        <table style="line-height:20px;text-align:centerborder-collapse:collapse;width:100%">
         
        
         <?php $countt="0";
		       $subtotal="0";?>
         <?php if($bas->get_cart()){
			 foreach($bas->get_cart() as $a=>$b){
				 $aa=explode(":::",$a);
				 $cc=$con->getcertainvalue("select * from projects left join category on categoryid=idcategory left join supplier on supplierid=idsupplier  left join brands on brandsid=idbrands where projectsid='".$aa[0]."'",array("pidsupplier"=>"pidsupplier","pcode"=>"pcode","projectsid"=>"projectsid","image"=>"image","ptitlear"=>"ptitlear","pprice"=>"pprice","pspecialprice"=>"pspecialprice","bnamear"=>"bnamear","snamear"=>"snamear"));
				 //special price or not
				
				 $pricee=$cc['pspecialprice'];
                 $cc['image']=colorimage($aa[0],$aa[1]);
				 ?>
                 
         <tr>
           <td nowrap="nowrap"  style="line-height:20px;border:1px solid #cccccc;padding:5px;text-align:center;">
		   <div class="topcart_image" style="width:75px"><?php if($cc['image']!=''){?><a style="" href="details?id=<?php echo $cc['projectsid']?>" rel="cart" ><img src="<?php echo $cc['image']?>" alt='<?php echo str_replace("'",'`',$cc['ptitlear'])?>' style="display:block;width:100%"></a><?php }?></div></td>
           <td nowrap="nowrap" style="border:1px solid #cccccc;padding:5px;text-align:right;color:#000000">
           <a style="color:#000000" href="product?id=<?php echo $cc['projectsid']?>" onclick="window.location='product?id=<?php echo $cc['projectsid']?>'"  >
		   <?php echo $cc['pcode']?><br><?php echo $cc['ptitlear']?> ( x<?php echo $b?>) <br /> السعر: <?php echo convert($b*$pricee, $_SESSION['hj_language'],'ar')?>
           <?php if(($aa[1]!='')){?><div style="font-size:12px">اللون: <?php echo $con->getcertainvalue("select * from colors where colorname='".$aa[1]."'","colornamear")?></div><?php }?>
           <?php if(($aa[2]!='')){?><div style="font-size:12px">الحجم: <?php echo $con->getcertainvalue("select * from sizes where sizesname='".$aa[2]."'","sizesnamear")?></div><?php }?>
                </a></td>
         </tr>
         <?php $subtotal=$subtotal+($b*$pricee);
		  $countt++;
		  }?>
        <?php }else{?>
         <tr>
           <td colspan="5" style="text-align:center;color:#000000" nowrap>لم يتم العثور على العناصر
           <div style="padding-top:5px"><button class="butt" onclick="jQuery('.mshoppingcart_data').hide()">إغلاق</button></div></td></td>
         </tr>
        <?php }?>
                 
         </table>
         </div>
          </div>
         <?php if($bas->get_cart()){?>
         <table style="width:100%" cellpadding="0" cellspacing="0">
         <tr>
          <td style="padding-top:10px">
             <table cellpadding="0" cellspacing="0" align="left">
              <tr>
               <td colspan="5" align="left">
                 <table>
                  <tr>
                    <td style="color:#color:#000000">مجموع سعر السلع (شامل الضريبة) :</td>
                    <td align="left"><?php echo number_format($subtotal, 2)?>
                    <?php $_SESSION['subtotal']=$subtotal?></td>
                  </tr>
                 </table>
             </tr>
              </table>
        </td>
        </tr>
        </table>
             <?php }else{?>
             </table>
             <?php }?>
         
       
        
        <input type="hidden" name="countt" value="<?php echo $countt?>" />
        </form>
        
         <?php if($bas->get_cart()){?>
         <br>
<input type="button" style="padding:10px" value="السلة" onclick="window.location='cart'" class="btn btn-primary">
<input type="button" style="padding:10px" value="الدفع" onclick="window.location='cart?status=check'" class="btn btn-primary">
<?php }?>