
<?php
session_start();
include_once 'dbconnect.php';
if(!isset($_SESSION['user']))
{
	header("Location: home.php");
}
$res=mysqli_query($mysqli, "SELECT * FROM users WHERE id=".$_SESSION['user']);
$rows=mysqli_fetch_array($res);

?>
<?php
$jiew=mysqli_query($mysqli, "SELECT * FROM transaksi where id_users='".$_SESSION['user']."' and aktif='yes'");
$jow=mysqli_fetch_array($jiew);
	?>
<?php 
 if($jow['status_trans']=='minta')
      { ?>
<script>document.location.href="about.php#about";</script><?php }
?>
<?php
if($jow['status_trans']=='dijemput')
      {?>
<script>document.location.href="dijemput.php";</script><?php }?>
<head>
<meta charset="UTF-8"/>
<meta http-equiv="X-UA-Compatible"content="IE=edge,chrome=1">
<meta name="viewport"content="width=device-width, initial-scale=1.0">
<link rel="stylesheet"href="themes/base/jquery.ui.all.css"><script src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script src="jquery.ui.addresspicker.js"></script>
<link rel="stylesheet"type="text/css"href="demo.css"/>
<style type="text/css">ul{padding:0;list-style:none}ul li{display:inline-block;position:relative;line-height:21px;text-align:left}ul li a{display:block;padding:8px 25px;color:#444;text-decoration:none}ul li a:hover{color:#red}ul li ul.dropdown{min-width:100%;background-color:#FFF;display:none;position:absolute;z-index:999;left:-50px;top:35px;border:1px solid grey}ul li:hover ul.dropdown{display:block}ul li ul.dropdown li{display:block}#home{display:none}#loading{display:block;position:absolute;top:0;left:0;z-index:99999;width:100vw;height:100vh;background-image:url("hourglass.svg");background-repeat:no-repeat;background-position:center}</style>
<link rel="stylesheet"href="css/bemo.css">
<link rel="stylesheet"href="dist/ladda.min.css">
</head>
<body>
<div class="sodrops-top" style="height:60px;">
<span class="actions" style="float:left">
<ul>
<li><a href="filterisasi.php" onclick="javascript:showDiv();"><img src="icon/back.png"width="25px"/></i></a></li>
</ul>
</span>
<div style="color:#fff;margin-top:20px;font-size:15px;font-weight:bold;font-family:Segoe UI light;float:right;padding-right:20px;">My Order History
</div>
</div>
<style>
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 60px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 0px;
  border: 1px solid #888;
  width: 100%;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: ;
  text-decoration: none;
  cursor: pointer;
}
</style>
<div style="font-family:segoe UI;padding:30px;color:#616161;border:none"><br><br>
<script type="text/javascript"src="https://maps.google.com/maps/api/js?sensor=true"></script>
<script>if(!navigator.geolocation){alert("Your phone does not support maps Location.")}navigator.geolocation.getCurrentPosition(success,error);function success(f){var g=f.coords.latitude;var e=f.coords.longitude;var h=f.coords.accuracy;document.getElementById("lat").value=g;document.getElementById("lng").value=e}function error(b){};
</script>
<?php


include_once 'dbconnect.php';

$kip=mysqli_query($mysqli, "SELECT count(*) as total FROM transaksi where id_users='".$_SESSION['user']."' and aktif='yes'");
$kor=mysqli_fetch_array($kip);
$values = mysqli_fetch_assoc($kip); 
$huua=$kor['total']; 

$jp=mysqli_query($mysqli, "SELECT * FROM transaksi where id_users='".$_SESSION['user']."' and status_trans='otw' and aktif='yes'");
$rok=mysqli_fetch_array($jp);
$sebagai=$rok['sebagai'];
 if($huua=='0'&&$sebagai=='user')
      { ?>
 <center>Kamu belum terdaftar Proplan saat ini</center><br><br>
 <?php }else{}
 if($huua=='1')
      { ?>
 <?php
$jp=mysqli_query($mysqli, "SELECT * FROM transaksi where id_users='".$_SESSION['user']."' and status_trans='otw' and aktif='yes'");
$rok=mysqli_fetch_array($jp);
 
 
$nama_voucher=$rok['nama_voucher'];
$less=mysqli_query($mysqli, "SELECT * FROM voucher WHERE idvoucher='$nama_voucher'");
$jim=mysqli_fetch_array($less);
?>
<table id="iseqchart"><tr><th id="index"><center>Kamu memiliki order layanan aktif</center></th>
</tr>
<tr style="border-top:1px solid #999">
<td><table style="width:100%">
<tr style="font-size:12px;color:#565656"><td>Kode Pembayaran</td><td>:</td><td width="50%"> <?php echo $rok["kode_trans"]; ?></td></tr>
<tr style="font-size:12px;color:#565656"><td>Package</td><td>:</td><td width="50%"> <?php echo $jim['namavoucher']; ?></td></tr>
<tr style="font-size:12px;color:#565656"><td>Harga</td><td>:</td><td width="50%"> USD <?php  $hargavo=$rok['harga']; $rego = number_format($hargavo,0,",","."); echo $rego;?></td></tr>
<tr style="font-size:12px;color:#565656"><td>Quantity<td>:</td><td width="50%"> 
<?php 
$pointvoucher=$jim['pointvoucher'];
if($pointvoucher=='smartpustaka')
            {
?>
<?php echo $jim['durasivoucher']; ?> Hari<small><br>
Aktif mulai <?php echo $rok['timestart']; ?> sampai <?php echo $rok['timeend']; ?>
			<?php }else{ ?>  
<?php echo $jim['durasivoucher']; ?> ticket
<small><br>
 <?php }?>


</td></tr></td></tr></table><br><br>
 <?php }?>

</div>

</div><br><br>
</body>
<div id="loading" style="display:none">
</div>
<script type="text/javascript">function showDiv(){div=document.getElementById("loading");div.style.display="block"};</script>
<script src="dist/spin.min.js">
</script>
<script src="dist/ladda.min.js">
</script></section>
<script>Ladda.bind(".button-demo button");Ladda.bind(".progress-demo button",{callback:function(a){var c=0;var b=setInterval(function(){c=Math.min(c+Math.random()*0.1,1);a.setProgress(c);if(c===1){a.stop();clearInterval(b)}},200)}});
</script>
