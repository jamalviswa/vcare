<?php
    session_start();
    if(isset($_SESSION['first_name'])){
	    header("Location: page.php");
	}
	
include ('../dbconnect.php');
if (isset($_POST['formsubmitted'])) {
    // print_r($_POST);
    // exit;
    $error = array();//buat array untuk menampung pesan eror  
    if (empty($_POST['name']))
    {
        $error[] = 'input your name ';//tambahkan ke array sebagai pesan error
    } 
	    if (empty($_POST['phone']))
	    {
	       
        $error[] = 'input your phone for called by driver';//tambahkan ke array sebagai pesan error
    } else {
        $name = $_POST['name'];
        $picture = $_POST['picture'];
        $saldo = $_POST['saldo'];//jika ada maka masukan isi dari variabel nama
		$kunci = $_POST['kunci'];
		$link = $_POST['link'];
		
    }
 if (empty($_POST['phone']))
 {
        $error[] = 'Please Enter your Phone ';
    } 
    if (empty($_POST['e-mail'])) 
    {
        $error[] = 'Please Enter your Email ';
    } else 
    {


        if (preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $_POST['e-mail'])) {
           //regular expression untuk validasi email
            $Email = $_POST['e-mail'];
			$lat = $_POST['lat'];
			$lng = $_POST['lng'];
			$phone = $_POST['phone'];
        } else {
             $error[] = 'Email not valid';
        }


    }


    if (empty($_POST['Password'])) {
        $error[] = 'create your password ';
    } else {
        $Password = md5($_POST['Password']);
    }


    if (empty($error)) //kirim ke database jika tidak ada eror

    { 

        // memastikan apakah email sudah ada di database atau belum
        $query_verify_email = "SELECT * FROM users WHERE email='$Email'";
        $result_verify_email = mysqli_query($dbc, $query_verify_email);
        if (!$result_verify_email)
        {//if the Query Failed ,similar to if($result_verify_email==false)
            echo ' Email already exist ';
        }

        if (mysqli_num_rows($result_verify_email) == 0) 
        { // Jika tidak ada user lain yang teregistrasi telah menggunakan email ini
            // membuat kode aktivasi
                $activation = md5(uniqid(rand(), true));
            
            
            
   $query_insert_user = "INSERT INTO `users` (`id`, `oauth_provider`, `oauth_uid`, `first_name`, `last_name`, `picture`, `link`, `created`, `modified`, `email`, `password`, `forgot_pass_identity`, `saldo`, `pembelian`, `noktp`, `tempatlahir`, `tgllahir`, `kelamin`, `agama`, `alamat1`, `kota`, `provinsi`, `pendidikan`, `profesi`, `jabatan`, `pendapatan`, `statusnikah`, `phone`, `kunci`, `pengalaman`, `almamater`, `ahlibidang`, `sebagai`, `online`, `lat`, `lng`, `jenistransportasi`) VALUES (NULL, '', '', '$name', '', '', '$link', '', '', '$Email', '$Password', '$activation', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '$phone', '1', '', '', '', 'user', 'online', '', '', '');";
                  $result_insert_user = mysqli_query($dbc,$query_insert_user) or die(mysqli_error($dbc));
                //   print_r("hai");
                	$message = "Thanks for register on Vcare Systems \"Wellcome, enjoy using our services.\" \n\n";
                $message .= 'You can Verify your account with this Code fgfgfg: ' .$link . "";
                @mail($Email, 'Confirmation', $message, 'From:viswa.technologysolution@gmail.com');

                  print_r($result_insert_user);
                //   exit;
            if (!$result_insert_user) {
                echo 'Query Failed ';
                // exit;
            }
            // else{ // code by suresh to redirect register user to login page
            //     header("Location:https://vcare.viswatechnologysolutions.com/taxi/sendotp.php");
            // }
            

            if (mysqli_affected_rows($dbc) == 1) { //Jika data yang dimasukan ke database sukses


                // kirim email
				$message = "Thanks for register on Vcare Systems \"Wellcome, enjoy using our services.\" \n\n";
                $message .= 'You can Verify your account with this Code: ' .$link . "";
                mail($Email, 'Confirmation', $message, 'From: admin@barisandata.com');

  

                // Jika registrasi berhasil dan email telah terkirim
                echo '<div class="success">';
?>
Thanks for using our app, verification link has been send to your email. Please check inbox or spam folder <?php echo $Email;?> <br>Please verify your phone number <?php echo $phone;?> then you can sign in perfectly<br><br>
<center><a href="activate.php?email=<?php echo $Email;?>&&phone=<?php echo $phone;?>"><div style="color:#fff;background-color:#09C;padding:10px;">Verify Now</div></a></center><br>
<?php 
 echo '</div>';
            } else { 
 echo '<div class="success">';
?>
Please verify your phone number <?php echo $phone;?> then you can sign in perfectly<br><br>
<center><a href="activate.php?email=<?php echo $Email;?>&&phone=<?php echo $phone;?>"><div style="color:#fff;background-color:#101D25;padding:10px;">Verify Now</div></a></center><br>
<?php 
 echo '</div>';
			}

        } else { // email addres telah terdaftar
 echo '<div class="success">';
?>
Please verify your phone number <?php echo $phone;?> then you can sign in perfectly<br><br>
<center><a href="activate.php?email=<?php echo $Email;?>&&phone=<?php echo $phone;?>"><div style="color:#ffffff;background-color:#FFA500;padding:10px;border-radius:20px;"><b>Verify Now</b></div></a></center><br>
<?php 
 echo '</div>';
		}

    } else {//Jika terdapat kesalahan pada array error maka tampilkan
        
        

echo '<div class="errormsgbox"> <ol>';
        foreach ($error as $key => $values) {
            
            echo '	<li>'.$values.'</li>';


       
        }
        echo '</ol></div>';

    }
  
    mysqli_close($dbc);//Tutup koneksi database

}



?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible"content="IE=edge,chrome=1">
<meta name="viewport"content="width=device-width, initial-scale=1.0">
<link rel="stylesheet"type="text/css"href="../demo.css"/>
<link href="../style.css"rel="stylesheet">
<meta name="HandheldFriendly"content="True">
<meta name="MobileOptimized"content="320">
<link rel="stylesheet"href="../css/bemo.css">
<link rel="stylesheet"href="../dist/ladda.min.css">
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=true"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />

<style type="text/css">
body {
	font-family:"Segoe UI;
	font-size:12px;
}
.registration_form {
	margin:0 auto;
	width:100%;
}
label {
	width: 10em;
	float: left;
	margin-right: 0.5em;
	display: block
}

fieldset {
	background:#EBF4FB none repeat scroll 0 0;
	border:2px solid #B7DDF2;
	width: 100%;
}
legend {
	color: #fff;
	background: #80D3E2;
	border: 1px solid #781351;
	padding: 2px 6px
}
.elements {
	padding:10px;
}
p {
	border-bottom:1px solid #B7DDF2;
	color:#666666;
	font-size:11px;
	margin-bottom:20px;
	padding-bottom:10px;
}
a{
    color:#0099FF;
font-weight:bold;
}

/* Box Style */


 .success, .warning, .errormsgbox, .validation {
	/*border: 1px solid;*/
	margin: auto;
	padding:10px;
	background-repeat: no-repeat;
	/*background-position: 10px center;*/
     font-size:10px;
     width:100%;
     
}

.success {
   
	color: #ffffff;
	background-color: #101D25;
	background-image:url('images/success.png');
}
.warning {

	color: #9F;
	background-color: #FEEFB3;
	background-image: url('images/warning.png');
}
.errormsgbox {
 
	color: #DC;
	background-color: #FFBABA;
	background-image: url('images/error.png');
	
}
.validation {
 
	color: #D63301;
	background-color: #FFCCBA;
	background-image: url('images/error.png');
}



</style>

</head>

<body>

<style>
::-webkit-input-placeholder { /* WebKit, Blink, Edge */
    color:    #888;
}
:-moz-placeholder { /* Mozilla Firefox 4 to 18 */
   color:    #888;
   opacity:  1;
}
::-moz-placeholder { /* Mozilla Firefox 19+ */
   color:    #888;
   opacity:  1;
}
:-ms-input-placeholder { /* Internet Explorer 10-11 */
   color:    #888;
}
::-ms-input-placeholder { /* Microsoft Edge */
   color:    #888;
}
#input {
	color: #fff;
    position: relative;
    display:block;
	width:100%
}

nav {
	position: absolute;
	content: '';
	height: 40px;
	height: 2px;
    background: #53b5e6;
    transition: all 0.2s linear;
    width: 0;
    bottom: 1px;  
}

input:hover ~ nav {
	width: 100%;
}

.curve{
    background-color: #101D25;
    border-radius: 0px 0px 40% 40%;
    padding: 10%;
    text-align: center;
}
.curve img{
    width:40%;
}
.text-center{
    font-family: Segoe UI Bold;
    color: #101d25;
    text-align: center;
}

</style>

<!--------------->


    <div class="row">
        <div class="col-12">
            <div class="curve">
                <img src="https://vcare.viswatechnologysolutions.com/taxi/icon/ggo.png"/>
                <h1 style="color:#ffa800; font-size:24px; font-family :Times New Roman";>Vcare Systems</h1>
            </div>
        </div>
        <h2 class="text-center">Register</h2>
    </div>


<!---------------->



<form id="form" action="index.php" method="post" class="registration_form" style="width:85%">

<input type="hidden" id="lat" type="float" name="lat"/>
<input type="hidden" id="lng" type="float" name="lng"/>
<div id="input"><input style="color:#101D25;background: url(../icon/user.png) no-repeat 12px;
    padding-left: 40px;
    vertical-align: middle;
    border-bottom: 1px solid #101D25;
    background-size: 20px;" type='text'name="name"class='holo'placeholder="Name" aria-required="true" required="required"/>
<nav></nav></div>
<br>
<div id="input"><input style="color:#101D25;background: url(../icon/email.png) no-repeat 12px;
    padding-left: 40px;
    vertical-align: middle;
    border-bottom: 1px solid #101D25;
    background-size: 20px;" type='text'name="e-mail"class='holo'placeholder="Email" aria-required="true" required="required"/>
<nav></nav></div>
<br>
<div id="input"><input style="color:#101D25;background: url(../icon/password.png) no-repeat 12px;
    padding-left: 40px;
    vertical-align: middle;
    border-bottom: 1px solid #101D25;
    background-size: 20px;" type="password" name="Password"class='holo'placeholder="Password" aria-required="true" required="required"/>
<nav></nav></div><br>
<div id="input"><input style="color:#101D25;background: url(../icon/user.png) no-repeat 12px;
    padding-left: 40px;
    vertical-align: middle;
    border-bottom: 1px solid #101D25;
    background-size: 20px;" type="number" name="phone"class='holo'placeholder="Phone for Verification" required="required" aria-required="true"/>
<nav></nav></div><br>

<div style="margin-top:50px"class="submit">
<input type="hidden" name="formsubmitted" value="TRUE" />
<input type="hidden" name="picture" value="0" />
<input type="hidden" name="saldo" value="0" />
<input name="kunci"type="hidden"value="1"/>
<input type="hidden" name="link" value="<?php
function resi(){
$gpass=NULL;
$n = 4; // jumlah karakter yang akan di bentuk.
$chr = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
for($i=0;$i<$n;$i++){
$rIdx = rand(1,strlen($chr));
$gpass .=substr($chr,$rIdx,1);
}return $gpass;};echo resi();?>" />
<section style="margin-top:-50px;width:100%;padding:0"class="button-demo"><button style="background:#101d25;width:100%;border-radius:20px;color:#FFA800;height:auto"type="submit"name="btn-login"class="ladda-button"data-color="green"data-style="expand-right"><small>Join</small></button></section>
</div>
</form>
<center><p style="color: #757575;font-size:12px;color:#000;padding:10px">Have an account? <a onclick="javascript:showDiv();" href="../firli.php"style="font-size:16px;color:#101d25"><b>Sign In</b></a>
</p>

</center>
<script src="dist/spin.min.js">
</script>
<script src="dist/ladda.min.js">
</script></section>
<script>Ladda.bind(".button-demo button");Ladda.bind(".progress-demo button",{callback:function(a){var c=0;var b=setInterval(function(){c=Math.min(c+Math.random()*0.1,1);a.setProgress(c);if(c===1){a.stop();clearInterval(b)}},200)}});
</script>
<style>#loading{display:block;position:absolute;top:0;left:0;z-index:99999;width:100vw;height:100vh;background-image:url("../hourglass.svg");background-repeat:no-repeat;background-position:center}</style>
<div id="loading" style="display:none">
</div>
<script type="text/javascript">function showDiv(){div=document.getElementById("loading");div.style.display="block"};</script>





</body>
</html>
