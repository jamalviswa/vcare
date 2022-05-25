<?php
session_start();
include_once 'dbconnect.php';
if(!isset($_SESSION['user']))
{
	header("Location: firli.php");
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
<?php
include_once 'dbconnect.php';
if(isset($_POST['tambah'])){

$lat=$_POST['lat'];
$lng=$_POST['lng'];
$tanggal=$_POST['tanggal'];
$kode_trans=$_POST['kode_trans'];
$online=$_POST['online'];
$nama_voucher=$_POST['nama_voucher'];
$id_users=$_POST['id_users'];
$status_bayar=$_POST['status_bayar'];

$jem=mysqli_query($mysqli, "SELECT * FROM voucher WHERE idvoucher='$nama_voucher'");
$less=mysqli_fetch_array($jem);
$idvoucher=$less['idvoucher'];
$namavoucher=$less['namavoucher'];
$rego=$less['hargavoucher'];
$digit=substr(str_shuffle("0123456789"), 0, 3);
$hargavoucher=$rego+$digit;
$durasivoucher=$less['durasivoucher'];
$pointvoucher=$less['pointvoucher'];

$input = "SELECT id_users FROM transaksi WHERE id_users='$id_users' and status_bayar='belum' and aktif='yes'";
$result = mysqli_query($mysqli, $input);
$count = mysqli_num_rows($result);

if($count == 0){

if(mysqli_query($mysqli, "INSERT INTO `transaksi` (`id_trans`, `tanggal`, `id_users`, `id_mitra`, `nama_voucher`, `kode_trans`, `lat`, `lng`, `timepicker1`, `harga`, `status_trans`, `aktif`, `phone`, `status_bayar`, `online`, `layanan`, `tipebayar`, `timestart`, `timeend`) VALUES (NULL, '$tanggal', '$id_users', '0', '$idvoucher', '$kode_trans', '$lat', '$lng', '$durasivoucher', '$hargavoucher', 'dijemput', 'yes', '$phone', '$status_bayar', '$online', '$namavoucher', '$tipebayar', '0', '0');"))
		{	
			?>
<script>document.location.href="dijemput.php";</script><?php
		}
}
}
?>
<head>
<meta charset="UTF-8"/>
<meta http-equiv="X-UA-Compatible"content="IE=edge,chrome=1">
<meta http-equiv="refresh" content="30">
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
<li><a href="home.php" onclick="javascript:showDiv();"><img src="icon/back.png"width="25px"/></i></a></li>
</ul>
</span>
<div style="color:#fff;margin-top:20px;font-size:15px;font-weight:bold;font-family:Segoe UI light;float:right;padding-right:20px;">On going service
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
<script type="text/javascript"src="https://maps.google.com/maps/api/js?sensor=true"></script>
<script>if(!navigator.geolocation){alert("Your phone does not support maps Location.")}navigator.geolocation.getCurrentPosition(success,error);function success(f){var g=f.coords.latitude;var e=f.coords.longitude;var h=f.coords.accuracy;document.getElementById("lat").value=g;document.getElementById("lng").value=e}function error(b){};
</script><br><br><br>
<?php


include_once 'dbconnect.php';

$kip=mysqli_query($mysqli, "SELECT count(*) as total FROM transaksi where id_users='".$_SESSION['user']."' and aktif='yes'");
$kor=mysqli_fetch_array($kip);
$values = mysqli_fetch_assoc($kip); 
$huua=$kor['total']; 
 if($huua=='0')
      { ?>
 <center>No orders</center><br><br>
 <?php }
 if($huua=='1')
      { ?>
 <?php
$jp=mysqli_query($mysqli, "SELECT * FROM transaksi where id_users='".$_SESSION['user']."' and status_trans='otw' and aktif='yes'");
$rok=mysqli_fetch_array($jp);
 
$id_mitra=$rok['id_mitra'];
$nama_voucher=$rok['nama_voucher'];
$less=mysqli_query($mysqli, "SELECT * FROM users WHERE id='$id_mitra'");
$jim=mysqli_fetch_array($less);

?>
<div style="color:#444;background-color:#fff;padding:20px;width:100%;">
<br><center><b style="color:green">Active Service <?php echo $rok["layanan"]; ?></b></center>
<br>
<?php 
 if($rok['layanan']=='buy')
      { 
$tipe=$rok['tipe']; 
$lim=mysqli_query($mysqli, "SELECT * FROM jw_product where product_id='$tipe'");
$nos=mysqli_fetch_array($lim);
$penjual=$nos['brand_id'];
$kis=mysqli_query($mysqli, "SELECT * FROM brand where id='$penjual'");
$tim=mysqli_fetch_array($kis);
  ?>
<table width="100%"style="border-bottom:1px solid ;color:#444;">
<tr style="border-bottom:1px solid ;color:">
<th><center>Product</center></th>
<th><center>Quantity</center></th>
<th><center>Total</center></th>
</tr>
<?php 
$id_users=$rok['id_users'];
$yir=mysqli_query($mysqli, "SELECT * FROM keranjang INNER JOIN jw_product ON keranjang.idbarang=jw_product.product_id WHERE keranjang.id_users='$id_users' and keranjang.checkout='yes' and keranjang.aktif='yes'");
while($gos = mysqli_fetch_array($yir)) { 
$nike=$gos['hrg'];
$jualitas=$gos['quantity'];
$kama=$nike*$jualitas;
echo "<tr >";
echo "<td style=font-size:12px>".$gos['product_tag']."<br> USD  ".$nike."</td>";
echo "<td style=font-size:13px>".$gos['quantity']."</td>";
echo "<td style=font-size:13px;float:right>".$kama."</td>";
}
?>
</table>
<div style="float:right;font-size:13px;padding:7px;color:#565656;border:1px solid #565656; border-style: dashed;">
<b><small>Total Price: USD  <?php 
$bamba = $rok['harga'];
$botal = number_format($bamba,0,",",".");
echo $botal;?></small></b></div><br><br>
  <?php }?>
<table id="iseqchart"><tr><th id="index"><center>Driver</center></th></tr><tr style="border-top:1px solid #999">
<td><center><div style="font-size:10px"><b><small> <?php echo $jim["first_name"]; ?> <?php echo $jim["last_name"]; ?></small></b></div><br>
<?php 
if (empty($rows['oauth_provider'])) { ?>
<img src="foto_mitra/<?php echo $jim['picture'] ?>"style="width:80px;border-radius:50%;border:2px solid grey;"/>
<?php } else{ ?>
<img src="<?php echo $jim['picture'] ?>"style="width:80px;border-radius:50%;border:2px solid grey;"/>
<?php } ?><br>
<br><br><center>
<?php
$art_id= $jim['id'];
$mika=mysqli_query($mysqli, "SELECT * FROM ratings where art_id='$art_id'");
$how=mysqli_fetch_array($mika);


$pak=mysqli_query($mysqli, "SELECT Count(*) as total FROM ratings where art_id='$art_id'");
$ndul=mysqli_fetch_assoc($pak);
$puma=$ndul['total'];
if($puma=='0')
      { ?>No ratings
	  <?php } else {?>
<img src="<?php $total_votes=$how['total_votes'];$total_points=$how['total_points'];$ratings=$total_points/$total_votes;echo ''.ceil($ratings); echo '.png';?>"/>
	  <?php } ?></center>
<table style="width:100%">
<tr style="font-size:12px;color:#565656"><td>Gender</td><td>:</td><td width="50%"> <?php echo $jim["kelamin"]; ?></td></tr>
<tr style="font-size:12px;color:#565656"><td>Phone</td><td>:</td><td width="50%"> <?php echo $jim["phone"]; ?></td></tr>
<tr style="font-size:12px;color:#565656"><td>Driver Type</td><td>:</td><td width="50%"> <?php echo $jim["sebagai"]; ?> <?php echo $rok["tipe"]; ?></td></tr>
<tr style="font-size:12px;color:#565656"><td>Vehicle & type</td><td>:</td><td width="50%"> <?php echo $jim["ahlibidang"]; ?></td></tr>
<tr style="font-size:12px;color:#565656"><td>Number car</td><td>:</td><td width="50%"> <?php echo $jim["jabatan"]; ?></td></tr></center>
</td></tr></table>
<table width="100%" style="background: #fbfb41;padding: 10px;"><tr><td style="font-size:11px;color:#444;font-weight:bold"width="80%">
Call Driver: <?php echo $jim['first_name'];?>: <br>
<?php echo $jow['alamat']; ?>, <?php echo $jim['phone']; ?>.<br>
</td><td width="20%">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<a href="https://profitgm.com/call.php?id_mitra=<?php echo $jim['id']; ?>" target="_blank"><center><i style="font-size:60px;color:green" class="fa fa-phone-square" aria-hidden="true"></i></a>
</td></tr></table>
<br><br>
<iframe style="z-index:9999"width="100%" height="400" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/directions?origin=<?php echo $rok['latfrom']?>,<?php echo $rok['lngfrom']?>&amp;destination=<?php echo $rok['lat']?>,<?php echo $rok['lng']?>&amp;key=AIzaSyAO4lbxY6SKygcJxTuzu-Qi7kAAP9SdAwM" allowfullscreen="no"></iframe>
<script src="dist/spin.min.js"></script>
</div>
<br><br>
 <?php }?>
<br><br>
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
