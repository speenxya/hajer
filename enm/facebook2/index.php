<?php require_once 'autoload.php';
require_once '../../includes/ini.php';

if(isset($_REQUEST['type'])){
	   $_SESSION['my_type']=$_REQUEST['type'];
   }
   
$fb = new \Facebook\Facebook([
  'app_id' => '2021404091464480',
  'app_secret' => 'c050340f42bf588b7cdeb554c85f56e9',
  'default_graph_version' => 'v2.10',
  //'default_access_token' => '{access-token}', // optional
]);

$helper = $fb->getRedirectLoginHelper();
$permissions = ['email']; // Optional permissions
$loginUrl = $helper->getLoginUrl($m_rooturl.'enm/facebook2/index.php', $permissions);

try {
  $accessToken = $helper->getAccessToken();
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  // When Graph returns an error
  echo 'Graph returned an error: ' . $e->getMessage();
  echo changelocation($loginUrl);
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  // When validation fails or other local issues
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  echo changelocation($loginUrl);
  exit;
}

if (isset($accessToken)) {
  // Logged in!
try {
  // Returns a `Facebook\FacebookResponse` object
  $response = $fb->get('/me?fields=id,name,email,last_name,first_name', $accessToken);
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  echo 'Graph returned an error: ' . $e->getMessage();

echo changelocation($loginUrl);

  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  	

echo changelocation($loginUrl);

  exit;
}
   
  $user = @$response->getGraphUser();
  echo changelocation("../handlesocial.php?fname=".urlencode($user['first_name'])."&lname=".urlencode($user['last_name'])."&email=".urlencode($user['email'])."&id=".urlencode($user['id'])."&type=facebook");
  //echo "../handlesocial.php?fname=".urlencode($user['first_name'])."&lname=".urlencode($user['last_name'])."&email=".urlencode($user['email'])."&id=".urlencode($user['id'])."&type=facebook";

  // Now you can redirect to another page and use the
  // access token from $_SESSION['facebook_access_token']
}else{
	

echo changelocation($loginUrl);
}