<?php

session_start();
include_once 'dbconnect.php';
if(!isset($_SESSION['user']))
{
	header("Location: home.php#home");
}
$res=mysqli_query($mysqli, "SELECT * FROM users WHERE id=".$_SESSION['user']);
$rows=mysqli_fetch_array($res);
?>
<?php
$jiew=mysqli_query($mysqli, "SELECT * FROM transaksi where id_users=".$_SESSION['user']);
while($jow=mysqli_fetch_array($jiew)){
	?><?php 
 if($jow['status_trans']=='minta')
      { ?>
<script>document.location.href="about.php#about";</script><?php }
?>
<?php 
 if($jow['status_trans']=='dijemput')
      { ?>
<script>document.location.href="about.php#about";</script><?php }
?>
<?php
if($jow['status_trans']=='otw')
      {?>
<script>document.location.href="about.php#about";</script><?php }};?>
<?php
if(isset($_POST['tambah'])){
if (empty($_POST['jumlahsaldo'])) {
   ?>
<script>window.alert("Pilih tipe sewa!");window.history.back(-2);</script><?php
  return false;
}
$jumlahsaldo=$_POST['jumlahsaldo'];
$awal=$rows['saldo'];
if ($jumlahsaldo>$awal) {
   ?>
<script>window.alert("withdraw is more than your balance");window.history.back(-2);</script><?php
  return false;
}
$id_users = $_POST['id_users'];
$tipesaldo	= $_POST['tipesaldo'];
$jumlahsaldo = $_POST['jumlahsaldo'];
$statussaldo = $_POST['statussaldo'];
$tgl_request = $_POST['tgl_request'];

$banksaldo = $_POST['banksaldo'];
$namauser = $_POST['namauser'];
$nomorrek = $_POST['nomorrek'];
$input = "SELECT id_users FROM trans_user WHERE id_users='$id_users' and statussaldo='minta'";
$result = mysqli_query($mysqli, $input);
$count = mysqli_num_rows($result); // if email not found then register
if($count == 0){
if(mysqli_query($mysqli, "INSERT INTO `trans_user` (`idsaldo`, `id_users`, `tipesaldo`, `jumlahsaldo`, `statussaldo`, `tgl_request`, `banksaldo`, `namauser`, `nomorrek`, `id_trans`) VALUES (NULL, '$id_users', '$tipesaldo', '$jumlahsaldo', 'dijemput', '$tgl_request', '$banksaldo', '$namauser', '$nomorrek', 'withdraw');"))
		{

			?>
<script>document.location.href="home.php#saldo";</script><?php
		}
		else
		{
			?>
<?php
		}		
	}
	else{
			?>
<?php
	}
	
}
?>
<?php 
$id = $_GET['id'];
$view=mysqli_query($mysqli, "SELECT * FROM users where id='$id'");
while($row=mysqli_fetch_array($view)){
?>
<head>
<meta charset="UTF-8"/>
<meta http-equiv="X-UA-Compatible"content="IE=edge,chrome=1">
<meta name="viewport"content="width=device-width, initial-scale=1.0">
<link rel="stylesheet"type="text/css"href="demo.css"/>
<style type="text/css">ul{padding:0;list-style:none}ul li{display:inline-block;position:relative;line-height:21px;text-align:left}ul li a{display:block;padding:8px 25px;color:#444;text-decoration:none}ul li a:hover{color:#red}ul li ul.dropdown{min-width:100%;background-color:#FFF;display:none;position:absolute;z-index:999;left:-50px;top:35px;border:1px solid grey}ul li:hover ul.dropdown{display:block}ul li ul.dropdown li{display:block}#home{display:none}#loading{display:block;position:absolute;top:0;left:0;z-index:99999;width:100vw;height:100vh;background-image:url("hourglass.svg");background-repeat:no-repeat;background-position:center}</style>
<link rel="stylesheet"href="css/bemo.css">
<link rel="stylesheet"href="dist/ladda.min.css">
<link rel="stylesheet"href="themes/base/jquery.ui.all.css">
<script src="js/jquery.min.js">
</script>
<script src="js/jquery-ui.min.js">
</script>

<body onkeydown="javascript:if(window.event.keyCode==13)window.event.keyCode=9">
<body style="width:100%;background:#fff;padding:0;font-family:Segoe UI">
<div class="sodrops-top">
<span class="actions" style="float:left">
<ul>
<li><a href="javascript:history.back()" onclick="javascript:showDiv();"><img src="icon/back.png"width="25px"/></i></a></li>
</ul>
</span>
<div style="margin-top:20px;font-size:18px;font-family:Segoe UI light"><center>Withdraw Balance</center>
</div>
</div>
<center style="width:100%;"><br><br><br>
<img src="icon/wd.jpg" style="width:100%;height:200px;"/>
</center>
<div style="width:100%;color:#fff;position:absolute;">
<table width="100%" style="background-color:rgba(1, 102, 185, 0.76);">
<tr>
<td width="30%" style="background-color:#36a2cc;padding:10px;"><center>
1. input value withdraw balance
</center></td>
<td width="30%" style="background-color:#3a3b3c;padding:10px;"><center>
2. input your Bank account data
</center></td>
<td width="30%" style="background-color:#b71313;padding:10px;"><center>
3. Money transfered in your bank account
</center></td>
</tr>
</table>
<center style="padding:10px;background-color:rgba(1, 102, 185, 0.76);border-bottom:5px solid #5cb55c">You must following this step</center>
</div>
<div style="color:#444;padding:20px"><br><br><br><br><br><center>

</div>
<form id="form"action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
<input name="tipesaldo" type="hidden" value="withdraw"/>
<input name="statussaldo" type="hidden" value="dijemput"/>
<input name="id_users" type="hidden" value="<?php echo $_SESSION['user'];?>"/>
<input type="hidden"name="tgl_request"value="<?php echo date('d-m-Y'); ?>"/><br><br>
<center style="color:"><div id="input">How much Withdraw :<br>
<input style="color:#000;padding:5px;
    vertical-align: middle;
    border-bottom: 1px solid grey;
    background-size: 20px;"class="form-control" placeholder="input value in USD." value="<?php echo $rows['saldo'];?>" max="<?php echo $rows['saldo'];?>"  id="number" name="jumlahsaldo" type="number" data-rule-required="true" aria-required="true" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');" onKeyDown="if(this.value.length==10 && event.keyCode!=8) return false;">

<nav></nav></div><br></center>
<br><br><br><br><br>

<script>
$('#text').on('change keyup', function() {
  var sanitized = $(this).val().replace(/[^0-9]/g, '');
  $(this).val(sanitized);
});

</script>
<input name="id_users" type="hidden" value="<?php echo $_SESSION['user'];?>"/>
<center style="color:"><div id="input">Choose your bank<br>
  <select style="padding:10px;background:#fff;font-size:11px;" name="banksaldo" > 
    <?php
session_start();
include_once 'dbconnect.php';
		$get=mysqli_query($mysqli, "SELECT * FROM infobank");
            while($jim = mysqli_fetch_assoc($get))
            {
            ?>
            <option name="banksaldo" style="color:grey" value="<?php echo $jim['namabank'];?>" ><?php echo $jim['namabank']; ?></option>
            <?php
            }               
        ?>
         </select><nav></nav></div><br>
<center style="color:"><div id="input">your Account number :<br>
<input style="color:#444;padding:5px;
    vertical-align: middle;
    border-bottom: 1px solid grey;
    background-size: 20px;" type='number'name="nomorrek"class='holo' placeholder="Your bank account number" aria-required="true" required="required"/>
<nav></nav></div><br>
<center style="color:"><div id="input">account owner name :<br>
<input style="color:#444;padding:5px;
    vertical-align: middle;
    border-bottom: 1px solid grey;
    background-size: 20px;" type='text'name="namauser"class='holo' placeholder="Owner Name" aria-required="true" required="required"/>
<nav></nav></div><br><br><br><br><br><br><br>
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
document.getElementById("txt").onkeypress = function(e) {
    var chr = String.fromCharCode(e.which);
    if ("1234567890".indexOf(chr) < 0)
        return false;
};
</script>
<table width="100%" style="width:100%;z-index:9999;bottom:0;position:fixed;background-color:#444;box-shadow: 0 2px 5px rgba(0,0,0,.26);"><tr>
<td style="font-size:12px;padding:20px;color:#fff"width="50%">next step click submit
</td>
<td style="font-size:15px;padding:20px;color:#fff;"width="50%">
<center>
<button type="submit"name="tambah" style="color:#fff;background:green;border:none;padding:10px;border-radius:20px;" onclick="javascript:showDiv();">Submit</button>
</div>
</form>
</div>
</td>
</tr>
</table>
</body>
<?php 	}
 ?>