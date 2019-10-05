<?php require_once '../../includes/ini.php';
require_once('oauth/twitteroauth.php');

 if(isset($_REQUEST['type'])){
	   $_SESSION['my_type']=$_REQUEST['type'];
   }
   
	

class StripeAPI{
	protected  $consumer_key	 = 'jOb1d4KQVuqk2mrgQBdj7ywRT';
	protected  $consumer_secret	 = 'Nk3QOtSZ680kpMFGaOmjYeQm6Xs95CXolKNTLBobpJfJ5JGK3E';
	protected  $oauth_callback	 = 'https://jawharathajer.com/en/twitter2/callback.php';
	
   function __construct() {

	// if(empty($_SESSION['twitterstatus'])){		
		 $this->login_twitter();
		
		// }  
   }
   
  
function login_twitter(){
	if ($this->consumer_key === '' || $this->consumer_secret === '') {
  echo 'You need a consumer key and secret to test the sample code. Get one from <a href="https://twitter.com/apps">https://twitter.com/apps</a>';
 // exit;
}

/* Build an image link to start the redirect process. */
echo $content = '<a href="index.php?connect=twitter"><img src="../images/lighter.png" alt="Sign in with Twitter"/></a>';

if(isset($_GET['connect']) && $_GET['connect']=='twitter'){
	
			$connection = new TwitterOAuth($this->consumer_key, $this->consumer_secret);// Key and Sec
			$request_token = $connection->getRequestToken($this->oauth_callback);// Retrieve Temporary credentials. 

			$_SESSION['oauth_token'] = $token = $request_token['oauth_token'];
			$_SESSION['oauth_token_secret'] = $request_token['oauth_token_secret'];


			switch ($connection->http_code) {
			  case 200:    $url = $connection->getAuthorizeURL($token); // Redirect to authorize page.
				header('Location: ' . $url); 
				break;
			  default:
				echo 'Could not connect to Twitter. Refresh the page or try again later.';
	}
		}	
	}
	
function twitter_callback(){
$connection = new TwitterOAuth($this->consumer_key, $this->consumer_secret, $_SESSION['oauth_token'], $_SESSION['oauth_token_secret']);
$access_token = $connection->getAccessToken($_REQUEST['oauth_verifier']);	
$_SESSION['access_token'] = $access_token;
unset($_SESSION['oauth_token']);
unset($_SESSION['oauth_token_secret']);

if (200 == $connection->http_code) {
  echo $_SESSION['twitterstatus'] = 'verified';
   header('Location: ./index.php?connected');
} else {
 header('Location: ./destroy.php?2');
}
}	


function  view(){
	if (empty($_SESSION['access_token']) || empty($_SESSION['access_token']['oauth_token']) || empty($_SESSION['access_token']['oauth_token_secret'])) {
    header('Location: ./destroy.php?3');
}
$access_token = $_SESSION['access_token'];

$connection = new TwitterOAuth($this->consumer_key, $this->consumer_secret, $access_token['oauth_token'], $access_token['oauth_token_secret']);

/* If method is set change API call made. Test is called by default. */
$content = $connection->get('account/verify_credentials');

//echo $content->name;echo $content->location;echo $content->followers_count;echo $content->friends_count;
//echo $content->friends_count;echo "<img src='{$content->profile_image_url}'/>";echo "<a href='./destroy.php'>LogOut</a>";
	?>

<?php echo "<pre>";
//print_r($content);

echo $content->name;

echo changelocation("../handlesocial.php?fname=".urlencode($content->name)."&lname=".urlencode('')."&email=".urlencode('')."&id=".urlencode($content->id)."&type=twitter");
echo "</pre>";?>



<?php

}
	

}

global $twitter_obj;


if(isset($_REQUEST['connected']) && isset($_SESSION['twitterstatus'])){
$twitter_obj = New StripeAPI();
$twitter_obj->view();
}else{
	$twitter_obj = New StripeAPI();
}

