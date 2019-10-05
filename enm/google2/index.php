<?php require 'setup.php';
// Create a new Google API client
$client = new apiClient();
//$client->setApplicationName("Tutorialzine");

  if(isset($_REQUEST['lang'])){
	   $_SESSION['fblang']=$_REQUEST['lang'];
   }else{
    if(!isset($_SESSION['fblang'])){
      $_SESSION['fblang']="en";
      }
    }

function changelocation($location){
	if(!@header("location:$location")){
    return "<script type='text/javascript'>window.location=\"$location\"</script>";
	}
}

// Configure it
$client->setClientId($client_id);
$client->setClientSecret($client_secret);
$client->setDeveloperKey($api_key);
$client->setRedirectUri($redirect_url);
$client->setApprovalPrompt(false);
$oauth2 = new apiOauth2Service($client);


// The code parameter signifies that this is
// a redirect from google, bearing a temporary code
if (isset($_GET['code'])) {
	
	// This method will obtain the actuall access token from Google,
	// so we can request user info
	$client->authenticate();
	
	// Get the user data
	$info = $oauth2->userinfo->get();
	
	// Find this person in the database
	
	
		 header("location:../handlesocial.php?fname=".urlencode($info['given_name']." ".$info['family_name'])."&lname=".urlencode($info['family_name'])."&email=".urlencode($info['email'])."&id=".urlencode($info['id'])."&type=google");
		// No such person was found. Register!

	
	// Save the user id to the session
	
	// Redirect to the base demo URL
//	header("Location: $redirect_url");
	//exit;
}



?>

			<?php if(isset($_GET['code'])){?>
			<?php }else{?>
            <?php //header("location:".$client->createAuthUrl())
			echo changelocation($client->createAuthUrl())?>
            <?php }?>

      