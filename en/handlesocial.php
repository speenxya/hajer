<?php include "../includes/ini.php";
require "../classes/passwordgenerator.php";
?>
<?php  $args = array(
				'length'				=>	5,
				'alpha_upper_include'	=>	false,
				'alpha_lower_include'	=>	false,
				'number_include'		=>	true,
				'symbol_include'		=>	false,
			);
$object = new chip_password_generator($args);
$apassword=$object->get_password();

if(!isset($_SESSION['fblang'])){
    $_SESSION['fblang']='en';
    }?>

<?php 
$a_raw['fname']=m_fill("fname",$_REQUEST);
$a_raw['lname']=m_fill("lname",$_REQUEST);
$a_raw['email']=m_fill("email",$_REQUEST);
$a_raw['socialid']=m_fill("id",$_REQUEST);
$a_raw['atype']=m_fill("type",$_REQUEST);
$a_raw['ausername']=$a_raw['email'];
$a=m_prepareall($a_raw);
$msg="";

 

if($msg==''){


//patient


			$duplicate=0;
			 if(recordexists("access","accessid",array("socialid"=>$a['socialid']),'',"and deleted='0'")){
					  $duplicate="<font class='itsnotok'>Email Address Already Exists</font>";
				  }
				  if($duplicate=='0'){
					  if($a_raw['atype']=='twitter'){
					  echo changelocation("signlog2?socialid=".$a_raw['socialid']."&fname=".$a_raw['fname']."&lname=".$a_raw['lname']."&email=".$a_raw['email']."");
					  }else{
						 
						  $a["access_created"]=date("Y-m-d H:i:s"); // we insert date created here . note the table name prefix
							$a["access_modified"]=date("Y-m-d H:i:s"); // we insert date modified here . note the table name prefix
							$a['aactive']="Yes";
                            $a['apassword']=$a['email'];
							
							
							  if(insert("access",$a,$con)){
										  $insertidd=$con->insert_id();
										  update("access",array("accessid"=>$insertidd."-".$m_branch),"where dummy_accessid='$insertidd'",$con);
										  $code=$insertidd."-".$m_branch;
										  
									   //log him in
									   logs("","","access.php?view=1&code=".$code."","a user has been registered from a social platform","","","website");
									   
										$_SESSION['hj_id']=$code;
										  $_SESSION['hj_username']=$a_raw['email'];
										  $_SESSION['hj_fname']=$a_raw['fname'];
										  $_SESSION['hj_lname']=$a_raw['lname'];
                                          
                                          populatebasket(session_id(),$code);
                                          
                                          if($_SESSION['fblang']=='ar'){
                                             echo changelocation("../ar/index");
										 exit();
                                            }else{
                                                 echo changelocation("index");
										 exit();
                                                }
										  
										
					  }
					  }
			      }else{
					  
					 $duplicate=0;
				 $suppliersa=$con->getcertainvalue("select * from access where socialid='".$a['socialid']."' and aactive='Yes' and deleted='0'",array("accessid"=>"accessid","fname"=>"fname","lname"=>"lname","email"=>"email"));
				if(!isset($suppliersa['accessid'])){
					echo changelocation("index.php");
				}else{
										   $_SESSION['hj_id']=$suppliersa['accessid'];
							  $_SESSION['hj_username']=$suppliersa['email'];
							  $_SESSION['hj_fname']=$suppliersa['fname'];
							  $_SESSION['hj_lname']=$suppliersa['lname'];
                              
                              populatebasket(session_id(),$suppliersa['accessid']);
                              
                             
										
                                          if($_SESSION['fblang']=='ar'){
                                             echo changelocation("../ar/index");
										 exit();
                                            }else{
                                                 echo changelocation("index");
										 exit();
                                                }
										  
				}
				  }

				  
} //if msg !=''
	  
	  echo $msg."<br><br><a href='#' onClick='history.go(-1)'>Back</a>";
?>