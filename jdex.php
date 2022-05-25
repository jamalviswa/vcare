<?php
session_start();
include_once 'dbconnect.php';
$computerId = $_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT'].$_SERVER['SERVER_ADDR'].$_SERVER['SERVER_PORT']; 
$benjo=str_replace(' ', '', $computerId);
	$res=mysqli_query($mysqli, "SELECT * FROM users WHERE forgot_pass_identity='$benjo'");
	$row=mysqli_fetch_array($res);
	$rembo=$row['forgot_pass_identity'];
	
$res=mysqli_query($mysqli, "SELECT * FROM users WHERE forgot_pass_identity='".$benjo."'");
$row=mysqli_fetch_array($res);
$tession = $row['id'];
if($tession)
{
		$_SESSION['user'] = $tession;
	?>
<script>document.location.href="mithome.php";</script><?php
}
?>
<head>
<meta charset="UTF-8"/><meta http-equiv="X-UA-Compatible"content="IE=edge,chrome=1">
<meta name="viewport"content="width=device-width, initial-scale=1.0">
<link rel="stylesheet"type="text/css"href="demo.css"/><link href="style.css"rel="stylesheet"><meta name="HandheldFriendly"content="True"><meta name="MobileOptimized"content="320"><meta name="viewport"content="width=device-width, initial-scale=1.0">
<style type="text/css">
.content p {
color:#444;font-size:12px;line-height: 17px;
}b, strong {
    font-size: 12px;
}
body{font-family:Segoe UI;color:#fff;background:#101D25;}h1{font-size:2.2em;padding:0 .5em 0}h2{font-size:1.5em}.header{padding:1em 0}.col{padding:1em 0;text-align:center}</style>
<link rel="stylesheet" href="css/bemo.css">
<link rel="stylesheet" href="dist/ladda.min.css">
</head>
<body style="color:#fff;font-family:Segoe UI; font-size:11px">
<div id="reg" class="panel" style="color:#fff;font-family:Segoe UI; font-size:11px"><div class="content" style="font-size:11px;padding:20px">
<h3>PRIVACY POLICY</h3><br>
We at the Vcare Systems Application take your privacy very seriously. We believe that electronic privacy is very important for the continued success of the Internet. We believe that this information is only and must be used to help us provide better services. That is why we have put in place policies to protect your personal information.<br><br>
<h3>
PRIVACY PROTECTION</h3>
We will take appropriate steps to protect your privacy. Every time you provide sensitive information (for example, a credit card number to make a purchase), we will take reasonable steps to protect it, such as encrypting your card number. We will also take reasonable security measures to protect your personal information in safekeeping. Credit card numbers are only used for payment processing and are not stored for marketing purposes. We will not give your personal information to other companies or individuals without your permission. "We ensure your order process is safe because with the direct rental payment system. Payment is received by the owner of the Partner<br><br>
<h3>
COOKIE USE</h3>
This application uses "cookies" to identify user sessions on the Application and thus offers continuity as long as members navigate inside the Application. Cookies are only used in applications to store non-critical data. Cookies are pieces of information where the information is transferred to your Smartphone hard drive for the purpose of keeping records.
Cookies allow web applications to maintain user information across connections. Cookies are small strings of characters that are used by many Applications to send data to your Smartphone, and in certain circumstances, return information to a web application. Cookies only contain information provided by members, and they do not have the ability to infiltrate users' hard drives and steal personal information. The simple function of a cookie is to help users navigate the Application with as few constraints as possible.
<br><br>
<h3>SECURITY</h3>
This application has security measures to protect the loss, misuse and alteration of information within our control. These steps include basic and complex data protection methods, storing certain information offline and securing our database server. This application gives users the option to delete their information from our database in order not to receive information going forward or to no longer receive our services.<br><br><br>
<center>
<a href="jimli.php" onclick="javascript:showDiv();"><button onclick="javascript:showDiv()" style="width:200px;font-size:12px;height:auto;margin-top:10px;color:#101D25;background:#FFA800;border-radius:20px;"class="ladda-button"><b>Accept & Continue</b></button></a>
</p><br><br></center><br><br>
</div>
</div>

</body>
<script src="dist/spin.min.js">
</script>
<script src="dist/ladda.min.js">
</script></section>
<script>Ladda.bind(".button-demo button");Ladda.bind(".progress-demo button",{callback:function(a){var c=0;var b=setInterval(function(){c=Math.min(c+Math.random()*0.1,1);a.setProgress(c);if(c===1){a.stop();clearInterval(b)}},200)}});
</script>
<style>#loading{display:block;position:absolute;top:0;left:0;z-index:99999;width:100vw;height:100vh;background-image:url("hourglass.svg");background-repeat:no-repeat;background-position:center}</style>
<div id="loading" style="display:none">
</div>
<script type="text/javascript">function showDiv(){div=document.getElementById("loading");div.style.display="block"};</script>
