<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
body {
	font-family:"Lucida Grande", "Lucida Sans Unicode", Verdana, Arial, Helvetica, sans-serif;
	font-size:12px;
}



 .success {
	border: 1px solid;
	margin: 0 auto;
	padding:10px 5px 10px 60px;
	background-repeat: no-repeat;
	background-position: 10px center;
    
     width:450px;
     color: #4F8A10;
	background-color: #DFF2BF;
	background-image:url('images/success.png');
     
}



 .errormsgbox {
	border: 1px solid;
	margin: 0 auto;
	padding:10px 5px 10px 60px;
	background-repeat: no-repeat;
	background-position: 10px center;

     width:450px;
    	color: #D8000C;
	background-color: #FFBABA;
	background-image: url('images/error.png');
     
}

</style>

</head>
<body><?php
include ('../dbconnect.php');

if (isset($_GET['email']) && preg_match('/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/', $_GET['email']))
{
    $email = $_GET['email']; 
}
if (isset($_GET['key']) && (strlen($_GET['key']) == 32))
{
    $key = $_GET['key'];
}
if (isset($_GET['phone']))
{
    $phone = $_GET['phone'];
}

if (isset($email) && isset($phone) && isset($key))
{

    // Update databse untuk menset isi aktivasi ke "NULL" 

    $query_activate_account = "UPDATE users SET forgot_pass_identity='NULL' WHERE email ='$email' AND forgot_pass_identity='$key' AND phone='$phone' LIMIT 1";

   
    $result_activate_account = mysqli_query($dbc, $query_activate_account) ;

   
    if (mysqli_affected_rows($dbc) == 1)//Jika proses update telah berhasil
    {
    echo '<div class="success" style="width:100%">One more step, Please verify your phone number <br><br>then, you can login</div>';

    } else
    {
        echo '<div class="success" style="width:100%">'.$email .' your email and phone already registered, but not complete, <br>please verify your phone number.</div>';

    }

    mysqli_close($dbc);

} 

include_once("../dbconnect.php");
$phone= $_GET['phone'];
$email= $_GET['email'];
$suljer=mysqli_fetch_array(mysqli_query($mysqli, "select * from users where email='$email'"));
$juber=$suljer['phone'];
if ($phone==$juber){
}else {
        echo '<div class="errormsgbox" style="width:100%">Your phone number already registered and active, dont use same number</div>';
}



?>
</body>
<?php 

include_once("../dbconnect.php");
error_reporting(0);

$change="";
$abc="";


 define ("MAX_SIZE","900000");
 function getExtension($str) {
         $i = strrpos($str,".");
         if (!$i) { return ""; }
         $l = strlen($str) - $i;
         $ext = substr($str,$i+1,$l);
         return $ext;
 }

 $errors=0;
  
 if($_SERVER["REQUEST_METHOD"] == "POST")
 {
 	$image =$_FILES["file"]["name"];
	$uploadedfile = $_FILES['file']['tmp_name'];
     
 
 	if ($image) 
 	{
 	
 		$filename = stripslashes($_FILES['file']['name']);
 	
  		$extension = getExtension($filename);
 		$extension = strtolower($extension);
		
		
 if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) 
 		{
		
 			$change='<div class="msgdiv">Unknown Image extension </div> ';
 			$errors=1;
 		}
 		else
 		{

 $size=filesize($_FILES['file']['tmp_name']);


if ($size > MAX_SIZE*102400)
{
	$change='<div class="msgdiv">You have exceeded the size limit!</div> ';
	$errors=1;
}


if($extension=="jpg" || $extension=="jpeg" )
{
$uploadedfile = $_FILES['file']['tmp_name'];
$src = imagecreatefromjpeg($uploadedfile);

}
else if($extension=="png")
{
$uploadedfile = $_FILES['file']['tmp_name'];
$src = imagecreatefrompng($uploadedfile);

}
else 
{
$src = imagecreatefromgif($uploadedfile);
}

echo $scr;

list($width,$height)=getimagesize($uploadedfile);


$newwidth=800;
$newheight=($height/$width)*$newwidth;
$tmp=imagecreatetruecolor($newwidth,$newheight);


$newwidth1=600;
$newheight1=($height/$width)*$newwidth1;
$tmp1=imagecreatetruecolor($newwidth1,$newheight1);

imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);

imagecopyresampled($tmp1,$src,0,0,0,0,$newwidth1,$newheight1,$width,$height);


$jirname = "../foto_mitra/". $_FILES['file']['name'];

$filename1 = "../foto_mitra/small". $_FILES['file']['name'];



imagejpeg($tmp,$jirname,100);

imagejpeg($tmp1,$filename1,100);

imagedestroy($src);
imagedestroy($tmp);
imagedestroy($tmp1);
}}

}

//If no errors registred, print the success message
?>
<head>
<meta name="viewport" content="width=device-width,height=100%,user-scalable = yes"> 
<link rel="stylesheet"href="../themes/base/jquery.ui.all.css">
<script src="../js/jquery.min.js"></script>
<script src="../js/jquery-ui.min.js"></script>
<script src="../jquery.ui.addresspicker.js"></script>
<link rel="stylesheet"type="text/css"href="../demo.css"/>
<style type="text/css">body{padding:25px;font-size:12px;}ul{padding:0;list-style:none}ul li{display:inline-block;position:relative;line-height:21px;text-align:left}ul li a{display:block;padding:8px 25px;color:#000;text-decoration:none}ul li a:hover{color:#red}ul li ul.dropdown{min-width:100%;background-color:#FFF;display:none;position:absolute;z-index:999;left:0;top:35px;border:1px solid grey}ul li:hover ul.dropdown{display:block}ul li ul.dropdown li{display:block}#home{display:none}#loading{display:block;position:absolute;top:0;left:0;z-index:99999;width:100vw;height:100vh;background-image:url("hourglass.svg");background-repeat:no-repeat;background-position:center}</style>
<link rel="stylesheet"href="../css/bemo.css">
<link rel="stylesheet"href="../dist/ladda.min.css">
  <link href=".css" media="screen, projection" rel="stylesheet" type="text/css">
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery_002.js"></script>
<script type="text/javascript" src="js/displaymsg.js"></script>
<script type="text/javascript" src="js/ajaxdelete.js"></script>
    
	 
</head><body>

<?php
include_once("../dbconnect.php");
$email= $_GET['email'];
$query=mysqli_fetch_array(mysqli_query($mysqli, "select * from users where email='$email'"));
?>
<div style="padding:10px;color:#565656;border:1px solid #565656; border-style: dashed;">
<style>
  .hide { position:absolute; top:-1px; left:-1px; width:1px; height:1px; }
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("#mide").click(function(){
    $("p").hide();
div=document.getElementById("mole");div.style.display="block"
  });

});
</script>
<div id="mole" style="display:none"><br><br>
<b><small><center>
If an old SMS is sent or you experience network problems, you can try other options such as registering from the Google signIn button, or sending a Security code via Email. It is also sent via WhatsApp while online</center><small></b><br>
<center><?php 
if(isset($_POST['submit'])){
    $to = $_POST['email'];// this is your Email address
    $from = "admin@barisandata.com";  // this is the sender's Email address
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $subject = "Security Code Barisandata";
    $subject2 = "Use this Security code in app";
    $message = "Hi, " . $first_name . "\n\n Security kode Barisandata is: " . $_POST['message'];
    $headers = "From:" . $from;
    $headers2 = "From:" . $to;
    mail($to,$subject,$message,$headers);
    mail($from,$subject2,$message2,$headers2); // sends a copy of the message to the sender
    echo "Mail Sent. Thank you " . $first_name . ", we will contact you shortly.";
    // You can also use header('Location: thank_you.php'); to redirect to another page.
	$userkey = '2ndwp9';
$passkey = 'gbsi4zq7yn';
$telepon = $query['phone'];
$message = "Hi, " . $first_name . "\n\n Security Code Barisandatais: " . $_POST['message'];
$url = 'http://sms.weedirect.in/api/mt/';
    $curlHandle = curl_init();
curl_setopt($curlHandle, CURLOPT_URL, $url);
curl_setopt($curlHandle, CURLOPT_HEADER, 0);
    curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curlHandle, CURLOPT_SSL_VERIFYHOST, 2);
curl_setopt($curlHandle, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($curlHandle, CURLOPT_TIMEOUT,30);
curl_setopt($curlHandle, CURLOPT_POST, 1);
curl_setopt($curlHandle, CURLOPT_POSTFIELDS, array(
    'userkey' => $userkey,
    'passkey' => $passkey,
    'nohp' => $telepon,
    'pesan' => $message
));
$results = json_decode(curl_exec($curlHandle), true);
curl_close($curlHandle);
    }
?></center>
<form action="" method="post">
<input type="hidden" name="first_name" value="<?php echo $query['first_name'];?>,">
<input type="hidden" name="email" value="<?php echo $query['email'];?>">
<input type="hidden" name="message" value="<?php echo $query['link'];?>">
<input style="color:#fff;background-color:#23982c;padding:10px;font-size:15px;" name="submit" class="btn-link" value="Send Code on Email" type="submit">
</form>
</div>


<p>
<label style="color:#444">We will send security code to your phone <?php echo $query['phone'];?></label><br>


 <a  target="hiddenFrame2" href="http://sms.weedirect.in/api/mt/SendSMS?user=Vcare_Systems&password=Vcare@12&senderid=VCRSYS&channel=Trans&DCS=0&flashsms=0&number= <?php echo $query['phone'];?> &text=Hi <?php echo $query['first_name'];?>, your security code is: <?php echo $query['link'];?>"> <input style="color:#fff;background-color:#09C;padding:10px;"; class="btn-link" name ="submit" value="Send Security Code" type="submit"></a>


<style>.btn-link{
  border:none;
  outline:none;
  background:none;
  cursor:pointer;
  color:#0000EE;
  padding:0;
  text-decoration:underline;
  font-family:inherit;
  font-size:inherit;
}</style>
</p>

  <form method="post" action="verifik.php" enctype="multipart/form-data" name="form1">
<p>
<div id="input"><input style="color:#444;background: url(../icon/password.png) no-repeat 12px;
    padding-left: 40px;
    vertical-align: middle;
    border-bottom: 1px solid #ddd;
    background-size: 20px;" type='text'name="kode"class='holo'placeholder="input your code" aria-required="true" required="required"/>
<nav></nav></div>
<br><br>
</p>

<input type="hidden" name="email" value="<?php echo $query['email']; ?>"/>
<input type="hidden" name="link" value="<?php echo $query['link']; ?>"/>
</div>

<section class="button-demo" style="padding:0px">
<button style="width:150px;font-size:12px;height:auto"type="submit"name="submit"class="ladda-button"data-color="green"data-style="expand-right">Verify now</button>
</section>

<script src="../dist/spin.min.js"></script>
<script src="../dist/ladda.min.js"></script>
<script>Ladda.bind(".button-demo button");Ladda.bind(".progress-demo button",{callback:function(b){var a=0;var c=setInterval(function(){a=Math.min(a+Math.random()*0.1,1);b.setProgress(a);if(a===1){b.stop();clearInterval(c)}},200)}});</script>
</form>
</div>
</center>
</body>
</html>