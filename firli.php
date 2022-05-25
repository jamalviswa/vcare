<head>
<meta charset="UTF-8"/><meta http-equiv="X-UA-Compatible"content="IE=edge,chrome=1"><meta name="viewport"content="width=device-width, initial-scale=1.0"><link rel="stylesheet"type="text/css"href="demo.css"/><link href="style.css"rel="stylesheet"><meta name="HandheldFriendly"content="True"><meta name="MobileOptimized"content="320"><meta name="viewport"content="width=device-width, initial-scale=1.0">
<style type="text/css">h1{font-size:2.2em;padding:0 .5em 0}h2{font-size:1.5em}.header{padding:1em 0}.col{padding:1em 0;text-align:center}</style>
<link rel="stylesheet" href="css/bemo.css">
<link rel="stylesheet" href="dist/ladda.min.css">
</head>
<body>
<div id="done"class="panel"style="z-index:9999">
<div class="content"style="width:100%;right:0;left:0;">
<br><center><div style="color:green;font-size:14px">
Congratulations !! Your account is active. Please log in with the application installed on your Android smartphone</div><br><br>
</center>
</div>
</div>
<?php

session_start();
include_once 'dbconnect.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if(!isset($_SESSION['user']))
{
	
	?>
<script>document.location.href="firli.php#login";</script><?php
}
if(isset($_POST['btn-login']))
{

	$email = mysqli_real_escape_string($mysqli, $_POST['email']);
	$upass = mysqli_real_escape_string($mysqli, $_POST['pass']);
	$email = trim($email);
	$upass = trim($upass);
	$res=mysqli_query($mysqli, "SELECT id, first_name, password, phone, email, kunci FROM users WHERE email='$email' or phone='$email'");
	$row=mysqli_fetch_array($res);
// 		print_r($res);
// 		exit;
	if($row['kunci']=='1')
      { ?> <style>#hideme{-webkit-animation:cssAnimation 15s forwards;animation:cssAnimation 15s forwards}@keyframes cssAnimation{0%{opacity:1}90%{opacity:1}100%{opacity:0}}@-webkit-keyframes cssAnimation{0%{opacity:1}90%{opacity:1}100%{opacity:0}}</style>
<div id="hideme"style="width:100%;position:relative;color:#ef2525;z-index:99999;top:0px;padding:20px;box-shadow:5px 2px 8px 1px rgba(0,0,0,0.15);background-color:rgba(255, 255, 82, 0.95)"><center>Your account is not verified, we send link verification to your mail
<br>
Please verify your phone number <?php echo $row['phone'];?> then you can sign in perfectly<br><br>
<center><a href="registrasiemail/activate.php?email=<?php echo $_POST['email'];?>&&key=<?php echo $row['activation'];?>"><div style="color:#fff;background-color:#101D25;padding:10px;">Verify Now</div></a></center><br>
<br><center><b><a href="firli.php#login">SignIn Again</a></b></center>
</div><?php   return false; }
	$count = mysqli_num_rows($res);
// 	 print_r("hai");
// 	 print_r($count);
// 	 exit;
	if($count == 1 && $row['password']==md5($upass))
	{
	   // print_r("hai");
	   // exit;
$_SESSION['user'] = $row['id'];
		?>
<script>document.location.href="home.php#home";</script><?php
	}
 
	else
	{
		?>
<style>#hideme{-webkit-animation:cssAnimation 15s forwards;animation:cssAnimation 15s forwards}@keyframes cssAnimation{0%{opacity:1}90%{opacity:1}100%{opacity:0}}@-webkit-keyframes cssAnimation{0%{opacity:1}90%{opacity:1}100%{opacity:0}}</style>
<div id="hideme"style="width:100%;position:relative;color:#ef2525;z-index:99999;top:0px;padding:20px;box-shadow:5px 2px 8px 1px rgba(0,0,0,0.15);background-color:rgba(255, 255, 82, 0.95)"><center>Email or password is wrong...
<br><br>
<br><center><b><a href="firli.php#login">SignIn Again</a></b></center>
</div><?php
	}

}
?><center><div style="background-color:#101d25;width:100%;height:150px;position:absolute;z-index:-9"></div>
<div style="background-color:#101d25;width:100%;border-radius:40%">
<br><br>
<?php
$computerId = $_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT'].$_SERVER['SERVER_ADDR'].$_SERVER['SERVER_PORT']; 
$benjo=str_replace(' ', '', $computerId);
	$res=mysqli_query($mysqli,"SELECT * FROM users WHERE forgot_pass_identity='$benjo' and kunci='0'");
	$row=mysqli_fetch_array($res);
	$rembo=$row['forgot_pass_identity'];
$tession = $row['id'];
if($tession)
{
		$_SESSION['user'] = $tession;
	?>
<script>document.location.href="fdex.php";</script><?php
}

?>

<?php
$computerId = $_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT'].$_SERVER['SERVER_ADDR'].$_SERVER['SERVER_PORT']; 
$bento=str_replace(' ', '', $computerId);
	$pit=mysqli_query($mysqli,"SELECT * FROM users WHERE forgot_pass_identity='$bento'");
	$kakpit=mysqli_fetch_array($pit);
	$er=$kakpit['forgot_pass_identity'];
$boykunci = $kakpit['kunci'];
if($boykunci==1)
{
header ("Location: registrasiemail/activate.php?email=" . $kakpit['email']. "&&key=" . $kakpit['forgot_pass_identity']. "&&phone=" . $kakpit['phone']. "");
}
?>
<style>
#clouds{
height:10px;
}

/*Time to finalise the cloud shape*/
.cloud {
	width: 200px; height: 60px;
	background: #fff;
	border-radius: 200px;
	-moz-border-radius: 200px;
	-webkit-border-radius: 200px;
	
	position: relative; 
}

.cloud:before, .cloud:after {
	content: '';
	position: absolute; 
	background: #fff;
	width: 100px; height: 80px;
	position: absolute; top: -15px; left: 10px;
	
	border-radius: 100px;
	-moz-border-radius: 100px;
	-webkit-border-radius: 100px;
	
	-webkit-transform: rotate(30deg);
	transform: rotate(30deg);
	-moz-transform: rotate(30deg);
}

.cloud:after {
	width: 120px; height: 120px;
	top: -55px; left: auto; right: 15px;
}

/*Time to animate*/
.x1 {
	-webkit-animation: moveclouds 15s linear infinite;
	-moz-animation: moveclouds 15s linear infinite;
	-o-animation: moveclouds 15s linear infinite;
}

/*variable speed, opacity, and position of clouds for realistic effect*/
.x2 {
	left: 200px;
	
	-webkit-transform: scale(0.6);
	-moz-transform: scale(0.6);
	transform: scale(0.6);
	opacity: 0.6; /*opacity proportional to the size*/
	
	/*Speed will also be proportional to the size and opacity*/
	/*More the speed. Less the time in 's' = seconds*/
	-webkit-animation: moveclouds 25s linear infinite;
	-moz-animation: moveclouds 25s linear infinite;
	-o-animation: moveclouds 25s linear infinite;
}

.x3 {
	left: -250px; top: -200px;
	
	-webkit-transform: scale(0.8);
	-moz-transform: scale(0.8);
	transform: scale(0.8);
	opacity: 0.8; /*opacity proportional to the size*/
	
	-webkit-animation: moveclouds 20s linear infinite;
	-moz-animation: moveclouds 20s linear infinite;
	-o-animation: moveclouds 20s linear infinite;
}

.x4 {
	left: 470px; top: -250px;
	
	-webkit-transform: scale(0.75);
	-moz-transform: scale(0.75);
	transform: scale(0.75);
	opacity: 0.75; /*opacity proportional to the size*/
	
	-webkit-animation: moveclouds 18s linear infinite;
	-moz-animation: moveclouds 18s linear infinite;
	-o-animation: moveclouds 18s linear infinite;
}

.x5 {
	left: -150px; top: -150px;
	
	-webkit-transform: scale(0.8);
	-moz-transform: scale(0.8);
	transform: scale(0.8);
	opacity: 0.8; /*opacity proportional to the size*/
	
	-webkit-animation: moveclouds 20s linear infinite;
	-moz-animation: moveclouds 20s linear infinite;
	-o-animation: moveclouds 20s linear infinite;
}

@-webkit-keyframes moveclouds {
	0% {margin-left: 1000px;}
	100% {margin-left: -1000px;}
}
@-moz-keyframes moveclouds {
	0% {margin-left: 1000px;}
	100% {margin-left: -1000px;}
}
@-o-keyframes moveclouds {
	0% {margin-left: 1000px;}
	100% {margin-left: -1000px;}
}
</style>
<div id="clouds" style="display:none">
	<div class="cloud x1"></div>
	<!-- Time for multiple clouds to dance around -->
	<div class="cloud x2"></div>
	<div class="cloud x3"></div>
	<div class="cloud x4"></div>
	<div class="cloud x5"></div>
</div>
<center><br><br>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
<img src="icon/ggo.png" width="150px"/>
<h1 style="color:#ffa800; font-size:24px; font-family :Times New Roman";>Vcare Systems</h1><br><br></div>

<br>
<style>::-webkit-input-placeholder{color:#ada7a7}:-moz-placeholder{color:#ada7a7;opacity:1}::-moz-placeholder{color:#ada7a7;opacity:1}:-ms-input-placeholder{color:#ada7a7}::-ms-input-placeholder{color:#ada7a7}#input{color:#fff;position:relative;display:inline-block;width:100%}nav{position:absolute;content:'';height:40px;height:2px;background:#e87817;transition:all .2s linear;width:0;bottom:1px}input:hover ~ nav{width:100%}</style>
<form id="form" method="post" style="padding-right: 25px;padding-left: 25px;">
<div id="input"><input style="color:#101D25;background:url(icon/email.png) no-repeat 12px;padding-left:40px;vertical-align:middle;border-bottom:1px solid #101D25;background-size:20px" type='text'name="email"class='holo'placeholder="Email/phone" aria-required="true" required="required"/>
<nav></nav></div>
<br><br>
<div id="input"><input style="color:#101D25;background:url(icon/password.png) no-repeat 12px;padding-left:40px;vertical-align:middle;border-bottom:1px solid #101D25;background-size:20px" type="password" name="pass"class='holo'placeholder="Password" aria-required="true" required="required"/>
<nav></nav></div><br>
<div style="float:right;padding:20px"><a href="loginregister/forgotPassword.php"style="color:#101d25" onclick="javascript:showDiv()"><small>Forgot password?</small></a></div></p>
<br>
<section style="width:100%;padding:0"class="button-demo"><button style="background:#101d25;width:100%;color:#FFA800;border-radius:20px;height:auto"type="submit"name="btn-login"class="ladda-button"data-color="green"data-style="expand-right" onclick="javascript:showDiv()"><small>Sign In</small></button></section>
</form><p><center>
<small><div style="color:#000000">Don't have an account? <a style="color:#101d25" onclick="javascript:showDiv();" href="registrasiemail/index.php"><b>Register Now</b></a><br><br>


<style type="text/css">
.Glogout-link { font-weight: bold; font-size: 18px}
#google_profile_box{ display: none; width: 400px; margin: 0 auto;}
#Gimg { text-align: left;}
.container { background: #fff; width: 80%; margin: 20px auto;}
</style>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script src="https://apis.google.com/js/platform.js" async defer></script>
<div id="google_login_box">
<div class="g-signin2" data-longtitle="true" data-onsuccess="onSignIn" data-theme="light" data-width="200" data-ux_mode="redirect"></div>
</div><br><br><br>
<script type="text/javascript">
    function onSignIn(googleUser) {
      var profile = googleUser.getBasicProfile();


      if(profile){
          $.ajax({
                type: 'POST',
                url: 'check_user.php',
                data: {id:profile.getId(), name:profile.getName(), email:profile.getEmail(), picture:profile.getImageUrl()}
            })
            .done(function(data){
                console.log(data);
                window.location.href = 'google-oauth/fdex.php';
            }).fail(function() { 
                alert( "Posting failed." );
            });
      }


    }
</script>
</small></div></p>
</center>
<script src="dist/spin.min.js"></script>
<script src="dist/ladda.min.js"></script></section>
<script>Ladda.bind(".button-demo button");Ladda.bind(".progress-demo button",{callback:function(e){var f=0;var d=setInterval(function(){f=Math.min(f+Math.random()*0.1,1);e.setProgress(f);if(f===1){e.stop();clearInterval(d)}},200)}});</script>
</body>

 <style>#loading{display:block;position:absolute;top:0;left:0;z-index:99999;width:100vw;height:100vh;background-image:url("hourglass.svg");background-repeat:no-repeat;background-position:center}</style>
<div id="loading" style="display:none">
</div>
