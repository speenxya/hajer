<?php include "../includes/ini.php"?>
<?php $bas=new basket();
$bas->init('hj_cart');
$m=$bas->get_cart();

removeoldbasket();

?>
<form name="form2" method="post">
        <input type="hidden" name="delete" value="1">
        <div class="tablescroller">
        <div style="max-height:300px;overflow-y:scroll;">
        <table style="line-height:20px;text-align:centerborder-collapse:collapse;width:100%">
         
        
         <?php $countt="0";
		       $subtotal="0";?>
         <?php if($bas->get_cart()){
			 foreach($bas->get_cart() as $a=>$b){
				 $aa=explode(":::",$a);
				 $cc=$con->getcertainvalue("select * from projects left join category on categoryid=idcategory left join supplier on supplierid=idsupplier  left join brands on brandsid=idbrands where projectsid='".$aa[0]."'",array("pidsupplier"=>"pidsupplier","pcode"=>"pcode","projectsid"=>"projectsid","image"=>"image","ptitle"=>"ptitle","pprice"=>"pprice","pspecialprice"=>"pspecialprice","bname"=>"bname","sname"=>"sname"));
				 //special price or not
				
				 $pricee=$cc['pspecialprice'];
                 $cc['image']=colorimage($aa[0],$aa[1]);
				 ?>
                 
         <tr>
           <td nowrap="nowrap"  style="line-height:20px;border:1px solid #cccccc;padding:5px;text-align:center;">
		   <div class="topcart_image" style="width:75px"><?php if($cc['image']!=''){?><a style="" href="details?id=<?php echo $cc['projectsid']?>" rel="cart" ><img src="<?php echo $cc['image']?>" alt='<?php echo str_replace("'",'`',$cc['ptitle'])?>' style="display:block;width:100%"></a><?php }?></div></td>
           <td nowrap="nowrap" style="border:1px solid #cccccc;padding:5px;text-align:left;color:#000000">
           <a style="color:#000000" href="product?id=<?php echo $cc['projectsid']?>" onclick="window.location='product?id=<?php echo $cc['projectsid']?>'"  >
		   <?php echo $cc['pcode']?><br><?php echo $cc['ptitle']?> ( x<?php echo $b?>) <br /> Price: <?php echo convert($b*$pricee, $_SESSION['hj_language'],'en')?>
           <?php if(($aa[1]!='')){?><div style="font-size:12px">Color: <?php echo $aa[1]?></div><?php }?>
           <?php if(($aa[2]!='')){?><div style="font-size:12px">Size: <?php echo $aa[2]?></div><?php }?>
                </a></td>
         </tr>
         <?php $subtotal=$subtotal+($b*$pricee);
		  $countt++;
		  }?>
        <?php }else{?>
         <tr>
           <td colspan="5" style="text-align:center;color:#000000" nowrap>No Items Found</td>
         </tr>
        <?php }?>
                 
         </table>
         </div>
          </div>
         <?php if($bas->get_cart()){?>
         <table style="width:100%" cellpadding="0" cellspacing="0">
         <tr>
          <td style="padding-top:10px">
             <table cellpadding="0" cellspacing="0" align="right">
              <tr>
               <td colspan="5" align="right">
                 <table>
                  <tr>
                    <td style="color:#color:#000000">Items Total (VAT Included):</td>
                    <td align="right"><?php echo number_format($subtotal, 2)?>
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
<input type="button" style="padding:10px" value="Cart" onclick="window.location='cart'" class="btn btn-primary">
<input type="button" style="padding:10px" value="Checkout" onclick="window.location='cart?status=check'" class="btn btn-primary">
<?php }?>