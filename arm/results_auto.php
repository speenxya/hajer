<?php include "../includes/ini.php";
require_once 'paytabs.php';

$pt = new paytabs("e-marketing@jawharathajer.com", "XikYypqKA8DvOW9hXMYe1cY7835WiuqgNKel9F6JNJfCGoUDaSSc4QjdTp9cUzsHjH3tm9caTsNzRHd2A5eFWySPY12SBuAVcDoz");
$result = $pt->verify_payment($_POST['payment_reference']);
echo "<center><h1>" . $result->result . "</h1></center>";




if(!isset($result->reference_no)){
    echo changelocation("error");
    }
    
    $con->query("update orders set kresult=CONCAT(kresult,'<br>".m_prepare($result->result)."') where ordersid='".m_prepare($result->reference_no)."'");
    
    
    
if($result->result=='The payment is completed successfully!'){    
    
$clientdetail=$con->fetch_array($con->query("select * from orders left join access on accessid=oiduser where ordersid='".m_prepare($result->reference_no)."'"));
if($clientdetail['spaid']=='Yes'){
        echo changelocation("conclusion?order=".$clientdetail['ordersid']);
    }else{
        update("orders",array("spaid"=>"Yes"),"where ordersid='".m_prepare($clientdetail['ordersid'])."'",$con);
        $_SESSION['paycontinue']=1;
        $order=$clientdetail['ordersid'];
         include "success.php";
        }
        
        }else{
            echo changelocation("error?err=".urlencode($result->result));
            }

?>