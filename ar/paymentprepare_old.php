<?php include "../includes/ini.php"?>
<?php $code=m_fill("code",$_REQUEST);
 $payment_reference=$code?>
<?php require_once 'paytabs.php';


$clientdetail=$con->fetch_array($con->query("select * from orders left join access on accessid=oiduser where ordersid='".m_prepare($code)."'"));


if($clientdetail['ordersid']==''){
    echo changelocation("error");
    }

$country=$con->fetch_array($con->query("select * from countries  where name='".m_prepare($clientdetail['country'])."'"));
$country1=$con->fetch_array($con->query("select * from countries  where name='".m_prepare($clientdetail['scountry'])."'"));
$countrycode=explode("/",$country['countrycode']);
$countrycode1=explode("/",$country1['countrycode']);
$countrycode=$countrycode[1];
$countrycode1=$countrycode1[1];

$gg=$con->query("select * from orderitems left join projects on projectsid=oidproject where idorders='".$clientdetail['ordersid']."'");

$products='';
$quantities='';
$unitprices='';
$subtotal=0;
$discount=0;
while($g=$con->fetch_array($gg)){
    $products.=$g['ptitle']." || ";
    $quantities.=$g['oquantity']." || ";
    $unitprices.=$g['pspecialprice']." || ";
    $subtotal=$subtotal+$g['pspecialprice']*$g['oquantity'];
    }
    
   
    
   $othercharges=0;
    
     if($clientdetail['idvoucher']!=''){
					if($gg['voucherfixed']=='0'){
					$discount=($clientdetail['voucherdiscount']*$subtotal)/100;
                    $subtotal=$subtotal-($clientdetail['voucherdiscount']*$subtotal)/100;
					}else{
						$discount=$clientdetail['voucherdiscount'];
                        $subtotal=$subtotal-$clientdetail['voucherdiscount'];
					}
					
				}
                
                	
                 $subtotal=$subtotal+$clientdetail['sshippingprice'];
                 
                  $totalunit=$subtotal;

                 $othercharges=$clientdetail['sshippingprice'];
                
               // $discount=$discount+$clientdetail['sshippingprice'];
                
                
                
                
    
    $products=substr($products,0,-4);
    $quantities=substr($quantities,0,-4);
    $unitprices=substr($unitprices,0,-4);
    
    if($clientdetail['postalcode']==''){
        $clientdetail['postalcode']="-";
        }
        
        if($clientdetail['spostalcode']==''){
        $clientdetail['spostalcode']="-";
        }

$array=(array(
    //Customer's Personal Information
    	"merchant_email" => "e-marketing@jawharathajer.com",						 // PayTabs Merchant Account's email address
    'secret_key' => "XikYypqKA8DvOW9hXMYe1cY7835WiuqgNKel9F6JNJfCGoUDaSSc4QjdTp9cUzsHjH3tm9caTsNzRHd2A5eFWySPY12SBuAVcDoz", // Secret Key can be fount at PayTabs Merchant Dashboard > Mobile Payments > Secret Key
      //	"merchant_email" => "speenxya@hotmail.com",						 // PayTabs Merchant Account's email address
    //'secret_key' => "x7z0rFnc27YEDiaB6rKl3pBNlfpr6D6DKGEcl1po8n2MGdoMF88IxKwS0Vk6zqJj7owspVRyjUlZ7JMMRVvpF1iFXCMw3wQaUmDk", // Secret Key can be fount at
    
    'cc_first_name' => $clientdetail['fname'],          //This will be prefilled as Credit Card First Name
    'cc_last_name' => $clientdetail['lname'],              //This will be prefilled as Credit Card Last Name
    'cc_phone_number' => $clientdetail['smobile'],  
    'phone_number' => $clientdetail['smobile'],  
    'email' => $clientdetail['email'],  
    
    //Customer's Billing Address (All fields are mandatory)
    //When the country is selected as USA or CANADA, the state field should contain a String of 2 characters containing the ISO state code otherwise the payments may be rejected. 
    //For other countries, the state can be a string of up to 32 characters.
    'billing_address' => $clientdetail['saddress'],  
    'city' => $clientdetail['city'],  
    'state' => $clientdetail['city'], 
    'postal_code' => $clientdetail['postalcode'],  
    'country' => trim($countrycode),
    
    //Customer's Shipping Address (All fields are mandatory)
    'address_shipping' => $clientdetail['saddress'],  
    'city_shipping' => $clientdetail['scity'],
    'state_shipping' => $clientdetail['scity'],
    'postal_code_shipping' => $clientdetail['spostalcode'],
    'country_shipping' => trim($countrycode1),
   
   //Product Information
    "products_per_title" =>  $products,   //Product title of the product. If multiple products then add “||” separator
    'quantity' => $quantities,                                    //Quantity of products. If multiple products then add “||” separator
    'unit_price' =>  $unitprices,                                  //Unit price of the product. If multiple products then add “||” separator.
    "other_charges" => $othercharges,                                    //Additional charges. e.g.: shipping charges, taxes, VAT, etc.
        "reference_no"=>$clientdetail['ordersid'] ,
    
    'amount' => $totalunit,                                         //Amount of the products and other charges, it should be equal to: amount = (sum of all products’ (unit_price * quantity)) + other_charges
    'discount'=>$discount,                                                //Discount of the transaction. The Total amount of the invoice will be= amount - discount
    'currency' => "SAR",                                            //Currency of the amount stated. 3 character ISO currency code 
   

    
    //Invoice Information
    'title' => $clientdetail['fname']." ".$clientdetail['lname'],               // Customer's Name on the invoice
    "msg_lang" => "en",                 //Language of the PayPage to be created. Invalid or blank entries will default to English.(Englsh/Arabic)
    "reference_no" => $clientdetail['ordersid'],        //Invoice reference number in your system
   
    
    //Website Information
    "site_url" => $m_rooturl,      //The requesting website be exactly the same as the website/URL associated with your PayTabs Merchant Account
    'return_url' => $m_rooturl."en/results",
    "cms_with_version" => "1.0",

    "paypage_info" => "1"
));




//$pt = new paytabs("speenxya@hotmail.com", "x7z0rFnc27YEDiaB6rKl3pBNlfpr6D6DKGEcl1po8n2MGdoMF88IxKwS0Vk6zqJj7owspVRyjUlZ7JMMRVvpF1iFXCMw3wQaUmDk");
$pt = new paytabs("e-marketing@jawharathajer.com", "XikYypqKA8DvOW9hXMYe1cY7835WiuqgNKel9F6JNJfCGoUDaSSc4QjdTp9cUzsHjH3tm9caTsNzRHd2A5eFWySPY12SBuAVcDoz");



//$result = $pt->authentication($array);
$result = $pt->create_pay_page($array);



if(!isset($result->payment_url)){
    echo changelocation("error");
    }
    
    
    
    if($result->payment_url==''){
        echo changelocation("error");
      
        }

//echo "FOLLOWING IS THE RESPONSE: <br />";

 echo '<script type="text/javascript">
         window.location = "'.$result->payment_url.'"
       </script>';
 //$_SESSION['paytabs_api_key'] = $result->secret_key;

?>