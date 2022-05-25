<?php
// Include FB config file && User class
require_once 'fb../dbconnect.php';
require_once 'user.php';

if(isset($accessToken)){
    if(isset($_SESSION['facebook_access_token'])){
        $fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
    }else{
        // Put short-lived access token in session
        $_SESSION['facebook_access_token'] = (string) $accessToken;
        
          // OAuth 2.0 client handler helps to manage access tokens
        $oAuth2Client = $fb->getOAuth2Client();
        
        // Exchanges a short-lived access token for a long-lived one
        $longLivedAccessToken = $oAuth2Client->getLongLivedAccessToken($_SESSION['facebook_access_token']);
        $_SESSION['facebook_access_token'] = (string) $longLivedAccessToken;
        
        // Set default access token to be used in script
        $fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
    }
    
    // Redirect the user back to the same page if url has "code" parameter in query string
    if(isset($_GET['code'])){
        header('Location: ./');
    }
    
    // Getting user facebook profile info
    try {
        $profileRequest = $fb->get('/me?fields=name,first_name,last_name,email,link,gender,locale,picture');
        $fbUseUSD ofile = $profileRequest->getGraphNode()->asArray();
    } catch(FacebookResponseException $e) {
        echo 'Graph returned an error: ' . $e->getMessage();
        session_destroy();
        // Redirect user back to app login page
        header("Location: ./");
        exit;
    } catch(FacebookSDKException $e) {
        echo 'Facebook SDK returned an error: ' . $e->getMessage();
        exit;
    }
    
    // Initialize User class
    $user = new User();
    
    // Insert or update user data to the database
    $fbUserData = array(
        'oauth_provider'=> 'facebook',
        'oauth_uid'     => $fbUseUSD ofile['id'],
        'first_name'    => $fbUseUSD ofile['first_name'],
        'last_name'     => $fbUseUSD ofile['last_name'],
        'picture'       => $fbUseUSD ofile['picture']['url'],
        'email'         => $fbUseUSD ofile['email'],
        'phone'         => $fbUseUSD ofile['phone'],
        'link'          => $fbUseUSD ofile['link']
    );
    $userData = $user->checkUser($fbUserData);
    
    // Put user data into session
    $_SESSION['userData'] = $userData;
    
    // Get logout url
    /* $logoutURL = $helper->getLogoutUrl($accessToken, $redirectURL.'logout.php');
*/    
    // Render facebook profile data
    if(!empty($userData)){	
		$_SESSION['user'] = $userData['id'];
			?>
<script>document.location.href="../mithome.php#home";</script><?php
        }else{
        $output = '<h3 style="color:red">Gagal untuk login melalui facebook.</h3>';
    }
    
}else{
    // Get login url
    $loginURL = $helper->getLoginUrl($redirectURL, $fbPermissions);
    
    // Render facebook login button
    $output = '<a href="'.htmlspecialchars($loginURL).'"><img onclick="javascript:showDiv()" style="width:100%;height:auto" src="fblogin.png"></a>';
}

?>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="w3.css">
<meta charset="UTF-8"/><meta http-equiv="X-UA-Compatible"content="IE=edge,chrome=1">
<meta name="viewport"content="width=device-width, initial-scale=1.0">
<link rel="stylesheet"type="text/css"href="../demo.css"/>
<link href="../style.css"rel="stylesheet">
<meta name="HandheldFriendly"content="True"><meta name="MobileOptimized"content="320">
<meta name="viewport"content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../css/bemo.css">
<link rel="stylesheet" href="../dist/ladda.min.css">


</head><body style="margin-top:100px;font-family:segoe UI;padding-right:30px;padding-left:30px;">
<div class="w3-container w3-center w3-animate-top"><center><small style="color:#1f87d7;font-weight:bold">Login Khusus Driver</small></center><br><br>
<center><img style="padding-right:30px;padding-left:30px;max-width: 200px;height:auto" src="../icon/logo.png"><br><br><small style="color:#1f87d7;font-weight:bold">Driver & Partners</small></center>
</div><br><br>
<div class="w3-container w3-center w3-animate-bottom">
<center>
<section style="padding-right:30px;padding-left:30px;width:100%;padding:0"class="button-demo"><a href="../jimli.php#login"><button onclick="javascript:showDiv()" style="background:#1f87d7;width:100%;border-radius:5px;height:auto"type="submit"name="btn-login"class="ladda-button"data-color="orange"data-style="expand-right"><small>Login with Phone or Email</small></button></a></section>
<script src="../dist/spin.min.js">
</script>
<script src="../dist/ladda.min.js">
</script></section>
  </center>
<div><center><?php echo $output; ?></center></div>
</div>
</body>
<style>#loading{display:block;position:absolute;top:0;left:0;z-index:99999;width:100vw;height:100vh;background-image:url("hourglass.svg");background-repeat:no-repeat;background-position:center}</style>
<div id="loading" style="display:none">
</div>
<script type="text/javascript">function showDiv(){div=document.getElementById("loading");div.style.display="block"};</script>
