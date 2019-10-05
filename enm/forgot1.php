<?php require "../includes/ini.php";?>
<?php $pagetitle1="mlogin"?>
<?php $pagetitle="Forgot Password"?>
<?php $pagetitle2=""?>
<?php 
$clientsupplier=m_fill("clientsupplier",$_POST);
//supplierlogin
if($clientsupplier=="supplier"){
	$email=m_fill("email",$_POST);
	
	
	
	
	$suppliersa=$con->getcertainvalue("select * from access where email='".m_prepare($email)."' and aactive='Yes' and atype='normal' and deleted='0'",array("accessid"=>"accessid","ausername"=>"ausername","apassword"=>"apassword","email"=>"email","fname"=>"fname","lname"=>"lname","accessid"=>"accessid"));
	if(!isset($suppliersa['accessid'])){
		$msgclient="<font class='itsnotok'>Invalid Email Address</font>";
	}else{
		
		$body="<table>
		<tr>
		<td><div style='text-align:center'><img src='".$m_rooturl."images/logoprint.png' style='max-width:100%'></div><br><br>
		to reset your ".$titl." password please click on the following link:<br><br>
		<a href='".$m_rooturl."enm/resetpassword?change=".base64_encode($suppliersa['accessid'])."'>".$m_rooturl."enm/resetpassword?change=".base64_encode($suppliersa['accessid'])."</a>
        
       
		</td>
		</tr>
		</table>";
		
	
		
		
				   

		 if(sendmail($m_config['coperationsemail'],$suppliersa['email'], $titl." Password Request",$body)){
					   $msgclient="<font class='itsok'>The link was sent to reset your new password</font>";
				   }else{
					   $msgclient="<font class='itsok'>Error sending email, please try again later</font>";
				   }
		 
	
		 
		 
		 
      
      
	}
}
?>

        <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
        <html xmlns="http://www.w3.org/1999/xhtml">
        <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="description" content="">
        <meta name="KEYWORDS" CONTENT="">
        <meta http-equiv="Cache-Control" content="no-cache" />
        <meta http-equiv="Expires" content="0" />
        <title><?php echo $m_config['ctitle']?>-<?php echo $pagetitle?></title>
        <link rel="stylesheet" type="text/css" media="all" href="../styles/hanco.css" />
        <link rel="stylesheet" type="text/css" media="all" href="../styles/jquery_ui_datepicker.css" />
        
        <link type="text/css" href="../css/style-layout11.css" rel="stylesheet"  />
        <link type="text/css" href="../styles/fancybox.css" rel="stylesheet"  />
        <script type="text/javascript" src="../js/jquery.js"></script>

        <script type="text/javascript" src="../js/jquery_ui_core.js"></script>
        <script type="text/javascript" src="../js/jquery_ui_widget.js"></script>
        <script type="text/javascript" src="../js/jquery_ui_datepicker.js"></script>
        <script type="text/javascript" src="../js/jeasing.js"></script>
        <script type="text/javascript" src="../js/jwplayer.js"></script>
        <script type="text/javascript" src="../js/fancybox.js"></script>
        <script type="text/javascript" src="../js/functions.js"></script>
        <script type="text/javascript" src="../js/startup_website.js"></script>
        <script type="text/javascript">

$(document).ready(function(){

	
	$("a.inline").fancybox({ //for the video
		'hideOnContentClick': true
	});
	
	$("a.iframe").fancybox({ //for the send to a friend
		'hideOnContentClick': true,
		'type': 'iframe',
		'width'				: '30%',
		'height'			: '70%',
        'autoScale'     	: false
	});
	
	$("a.iframe_supplierreg").fancybox({ //for the send to a friend
		'hideOnContentClick': true,
		'type': 'iframe',
		'width'				: '50%',
		'height'			: '100%',
        'autoScale'     	: false
	});
	
	
});

</script>
        <style>
	body {padding-bottom:0px!important;overflow-y:hidden}
	.formMain td {padding-bottom:10px}
</style>
        </head>
        
        <table style="width:100%">
          <tr>
            <td style="vertical-align:top"><table align="center" class="formMain">
                <tr>
                <td style="vertical-align:top;width:100%"><div class="content shadow">
                    <h2 style="margin-bottom:10px"><?php echo $pagetitle?></h2>
                      <form name="formclient" method="post" action="">
                                   <input type="hidden" name="clientaction" value="1">
                                   <?php if(isset($msgclient)){?>
									<div style="margin-bottom:5px"><?php echo $msgclient?></div><br />
                                 <?php }?>
                                 Please Enter your email address to reset your password.<br /><br />
                                 <table width="97%">
                                 
                                  
                                  <tr>
                                    <td class="login" width="100px"><label for="email">Email Address:</label> <font class="itsnotok">*</font><br>
                                    <input type="text" name="email" id="email" class="inputtext" style="width:380px;padding:3px" autocomplete="off"></td>
                                  </tr>
                                  <tr>
                                  <td class="left" colspan="3"><div style="float:left"><button type="submit"  class="butt">&nbsp;&nbsp;Recover</button></div></td>
                                  </tr>
                                </table>
                                <input type="hidden" name="clientsupplier" value="supplier">
                                </form>
                  </div></td>
              </tr>
              </table></td>
          </tr>
        </table>
        </body>
        </html>
        