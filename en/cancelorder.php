<?php require "../includes/ini.php";
$id=m_fill("id",$_REQUEST);
$type=m_fill("type",$_REQUEST);

$clientdetail=$con->fetch_array($con->query("select * from orderitems left join  orders on ordersid=idorders left join access on accessid=oiduser where ordersid='".$id."'"));

				   if(isset($_REQUEST['action'])){
					   //get order details
					 $con->query("update orders set  sstatus='Cancelled', cancelreason='".m_prepare($_REQUEST['cancelreason'])."', cancelreasonother='".m_prepare($_REQUEST['cancelreasonother'])."' where ordersid='".m_prepare($id)."'");
                      if(insert("orderstatement",array("idorder"=>$id,"comment"=>m_prepare($_REQUEST['cancelreason']),"status"=>"Cancelled","orderstatement_created"=>date("Y-m-d H:i:s"),"orderstatement_modified"=>date("Y-m-d H:i:s")),$con)){
							  $insertidd=$con->insert_id();
							  update("orderstatement",array("orderstatementid"=>$insertidd."-".$m_branch),"where dummy_orderstatementid='$insertidd'",$con);
                              }
                     $msgv="<font class='itsok'>Your order has been successfully cancelled.<br>
                     We are sorry if you had problems during your shopping with us.</font>";
                     
                       $body="<table>
		<tr>
		<td><div style='text-align:center'><img src='".$m_rooturl."images/logoprint.png' style='max-width:100%'></div><br><br>
		The order with the invoice number <b>".$clientdetail['invoicenumber']."</b> has been cancelled
		</td>
		</tr>
		</table>";
        
        
        @sendmail($m_config['creturnemail'],$m_config['creturnemail'], $titl." Order has been Cancelled (".$clientdetail['ordersid'].")",$body);
        
                      $success=1;
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

	
	$("a.inline").fancybox({ //for the video
		'hideOnContentClick': true,
helpers: {
			overlay: {
			  locked: false
			}
		  },
		'autoScale'     	: false
	});
	
	$("a.iframe").fancybox({ //for the send to a friend
		'hideOnContentClick': true,
helpers: {
			overlay: {
			  locked: false
			}
		  },
		'type': 'iframe',
		'width'				: '30%',
		'height'			: '70%',
        'autoScale'     	: false
	});
	
	$('#datee').datepicker({
		   dateFormat:'yy-mm-dd',
		//minDate:'0',
		 showAnim:'fadeIn',
		autoSize: true
		});
	
});

</script>
<style>
body {padding:20px;margin:0}
</style>
        </head><body>

        <table width="100%" height="100%" cellpadding="0" cellspacing="0" align="center">
         <tr>
                <td valign="top">
                  
                
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
                      <?php if($type=='before'){?>
                         <?php $gpp=$con->query("select * from reasons where deleted='0' and reasonstype='before' and reasonsactive='Yes' order by reasonspriority asc, reasonsname asc");
                         while($gp=$con->fetch_array($gpp)){?>
                        <option value="<?php echo $gp['reasonsname']?>" selected="selected"><?php echo $gp['reasonsname']?></option>
                        <?php }?>
                       <?php }?>
                        
                        <option value="Other" selected="selected">Other</option>
                      </select></div>
                      <div>Other reason</div>
                      <div><textarea name="cancelreasonother" style="width:100%"></textarea></div>
                       
                      <div style="text-align:center;margin-top:20px"><input type="submit" value="Cancel Order" /></div>
                      </form>
                 <?php }?>
                  
                   
                   
                   
                  </td>
          </tr>
        </table>
        </div>
        
       <script>
       function m_submit(){
        return confirm("Are you sure you want to cancel the order?")
        }
       </script>
        
        </body>
        </html>
        