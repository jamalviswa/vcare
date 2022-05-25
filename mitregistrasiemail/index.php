<?php
    session_start();
    if(isset($_SESSION['first_name'])){
	    header("Location: page.php");
	}
	
include ('../dbconnect.php');
if (isset($_POST['formsubmitted'])) {
    $error = array();//buat array untuk menampung pesan eror  
    if (empty($_POST['name'])) {//jika variabel nama kosong 
        $error[] = 'input your name ';//tambahkan ke array sebagai pesan error
    } 
	    if (empty($_POST['phone'])) {//jika variabel nama kosong 
        $error[] = 'input your phone for called by customer';//tambahkan ke array sebagai pesan error
    } else {
        $name = $_POST['name'];
        $picture = $_POST['picture'];
        $saldo = $_POST['saldo'];//jika ada maka masukan isi dari variabel nama
		$kunci = $_POST['kunci'];
		$link = $_POST['link'];
		$jenistransportasi = $_POST['jenistransportasi'];
    }
 if (empty($_POST['phone'])) {
        $error[] = 'Please Enter your Phone ';
    } 
    if (empty($_POST['e-mail'])) {
        $error[] = 'Please Enter your Email ';
    } else {


        if (preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $_POST['e-mail'])) {
           //regular expression untuk validasi email
            $Email = $_POST['e-mail'];
			$phone = $_POST['phone'];
        } else {
             $error[] = 'Email not valid';
        }


    }


    if (empty($_POST['Password'])) {
        $error[] = 'please input password ';
    } else {
        $Password = md5($_POST['Password']);
    }


    if (empty($error)) //kirim ke database jika tidak ada eror

    { 

        // memastikan apakah email sudah ada di database atau belum
        $query_verify_email = "SELECT * FROM users WHERE email='$Email'";
        $result_verify_email = mysqli_query($dbc, $query_verify_email);
        if (!$result_verify_email) {//if the Query Failed ,similar to if($result_verify_email==false)
            echo ' Terjadi eror pada database ';
        }

        if (mysqli_num_rows($result_verify_email) == 0) { // Jika tidak ada user lain yang teregistrasi telah menggunakan email ini
            // membuat kode aktivasi
            $activation = md5(uniqid(rand(), true));
        $query_insert_user = "INSERT INTO `users` (`id`, `oauth_provider`, `oauth_uid`, `first_name`, `last_name`, `picture`, `link`, `created`, `modified`, `email`, `password`, `forgot_pass_identity`, `saldo`, `pembelian`, `noktp`, `tempatlahir`, `tgllahir`, `kelamin`, `agama`, `alamat1`, `kota`, `provinsi`, `pendidikan`, `profesi`, `jabatan`, `pendapatan`, `statusnikah`, `phone`, `kunci`, `pengalaman`, `almamater`, `ahlibidang`, `sebagai`, `online`, `lat`, `lng`, `jenistransportasi`) VALUES (NULL, '', '', '$name', '', '', '$link', '$created', '$modified', '$Email', '$Password', '$activation', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '$phone', '1', '', '', '', 'driver', 'online', '', '', '');";
            $result_insert_user = mysqli_query($dbc, $query_insert_user);
            if (!$result_insert_user) {
                echo 'Query Failed ';
            }

            if (mysqli_affected_rows($dbc) == 1) { //Jika data yang dimasukan ke database sukses


                // kirim email
				$message = "Thanks for register on barisandata \"Wellcome, lets ride.\" \n\n";
                $message .= 'You can Verify your account with this Code: ' .$link . "";
                mail($Email, 'Registration confirm', $message, 'From: admin@barisandata.com');
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
<center><a href="activate.php?email=<?php echo $Email;?>&&phone=<?php echo $phone;?>"><div style="color:#fff;background-color:#09C;padding:10px;">Verify Now</div></a></center><br>
<?php 
 echo '</div>';
			}

        } else { // email addres telah terdaftar
            
echo '<div class="success">';
?>
Please verify your phone number <?php echo $phone;?> then you can sign in perfectly<br><br>
<center><a href="activate.php?email=<?php echo $Email;?>&&phone=<?php echo $phone;?>"><div style="color:#fff;background-color:#09C;padding:10px;">Verify Now</div></a></center><br>
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
<style type="text/css">
body {
	font-family:"Segoe UI;
	font-size:12px;
	background-color:#101d25;
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
	border: 1px solid;
	margin: 0 auto;
	padding:10px 5px 10px 50px;
	background-repeat: no-repeat;
	background-position: 10px center;
     font-size:10px;
     width:100%;
     
}

.success {
   
	color: #4F8A10;
	background-color: #DFF2BF;
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
<?php
$computerId = $_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT'].$_SERVER['LOCAL_ADDR'].$_SERVER['LOCAL_PORT']; 
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
$computerId = $_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT'].$_SERVER['LOCAL_ADDR'].$_SERVER['LOCAL_PORT']; 
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
    display: inline-block;
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
</style>

        <div class="col-12" style="padding:10px">
                <img src="https://vcare.viswatechnologysolutions.com/taxi/icon/ggo.png"/>
        </div>
<h2 style="padding:20px;font-family:Segoe UI Bold;color:#ffa800;text-align:center;">Sign Up Driver</h2>
<form id="form" action="index.php" method="post" class="registration_form" style="width:85%;padding:10px">
<div id="input"><input style="color:#444;background: url(../icon/user.png) no-repeat 12px;
    padding-left: 40px;
    vertical-align: middle;
    border-bottom: 1px solid #fff;
    color:#fff;
    background-size: 20px;" type='text'name="name"class='holo'placeholder="Name" aria-required="true" required="required"/>
<nav></nav></div><br><br>
<br>
<div id="input"><input style="color:#444;background: url(../icon/email.png) no-repeat 12px;
    padding-left: 40px;
    vertical-align: middle;
    border-bottom: 1px solid #fff;
    color:#fff;
    background-size: 20px;" type='text'name="e-mail"class='holo'placeholder="Email" aria-required="true" required="required"/>
<nav></nav></div><br><br>
<br>
<div id="input"><input style="color:#444;background: url(../icon/password.png) no-repeat 12px;
    padding-left: 40px;
    vertical-align: middle;
    border-bottom: 1px solid #fff;
    color:#fff;
    background-size: 20px;" type="password" name="Password"class='holo'placeholder="Password" aria-required="true" required="required"/>
<nav></nav></div><br><br><br>
<div id="input"><input style="color:#444;background: url(../icon/user.png) no-repeat 12px;
    padding-left: 40px;
    vertical-align: middle;
    border-bottom: 1px solid #fff;
    color:#fff;
    background-size: 20px;" type="number" name="phone"class='holo'placeholder="Phone for verification" required="required" aria-required="true"/>
<nav></nav></div><br><br>
<div style="margin-top:100px"class="submit">
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
<section style="margin-top:-50px;width:100%;padding:0"class="button-demo"><button style="background:#FFA800;width:100%;color:#101D25;border-radius:20px;height:auto"type="submit"name="btn-login"class="ladda-button"data-color="green"data-style="expand-right"><b>Join</b></button></section>
</div>
</form>
<center><p style="color: white;font-size:12px;padding:10px">Already registered? <a onclick="javascript:showDiv();" href="../jimli.php"style="font-size:16px;color:#ffa800"><b>Sign In</b></a>
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
