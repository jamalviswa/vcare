<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name=viewport content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="w3.css">
<meta charset="UTF-8"/><meta http-equiv="X-UA-Compatible"content="IE=edge,chrome=1"><meta name="viewport"content="width=device-width, initial-scale=1.0"><link rel="stylesheet"type="text/css"href="../demo.css"/><link rel="stylesheet"href="../css/bemo.css"><link rel="stylesheet"href="../dist/ladda.min.css"></head>
</head>
<body ><br><br><br>
<div style="display: block;margin: 0 auto;min-height: 0;width: 85%;">
<?php
$session_lifetime = 3600 * 24 * 860; // 2 days
session_set_cookie_params ($session_lifetime);
session_start();
include_once 'dbconnect.php';
if(!isset($_SESSION['user']))
{
	header("Location: fdex.html#reg");
}
$res=mysqli_query($mysqli, "SELECT * FROM users WHERE id=".$_SESSION['user']);
$rows=mysqli_fetch_array($res);
$idsmartpustaka=$_GET['idsmartpustaka'];
$jes=mysqli_query($mysqli, "SELECT * FROM smartpustaka WHERE idsmartpustaka='".$idsmartpustaka."'");
$bro=mysqli_fetch_array($jes);
?>

<?php
$kip=mysqli_query($mysqli, "SELECT id_trans, kode_trans, id_users, timeend, nama_voucher, pointvoucher FROM transaksi INNER JOIN voucher on transaksi.nama_voucher=voucher.idvoucher where transaksi.id_users='".$_SESSION['user']."' and transaksi.status_trans='otw'");
$kor=mysqli_fetch_array($kip); 
$huua = $kor['pointvoucher']; 
$timeend = $kor['timeend'];  
$theday = date('d-m-y');
 if($huua=='smartpustaka'&&$theday<=$timeend)
      { ?>
<div class="w3-container w3-center w3-animate-top">
<center><h4 style="border-bottom:1px solid grey;color:grey;padding:10px">Hi, <?php echo $rows['first_name']; ?></h4>
<table width="100%"><tr><td style="padding:10px;font-size:12px;color:#444;font-weight:bold"width="100%">
Anda membaca buku <?php echo $bro['judulsmartpustaka'];?><br>Kamu memiliki paket ProPlan untuk menggunakan layanan SmartPustaka, Gunakan secara bijak hingga masa aktif selesai tanggal <?php echo $kor['timeend'];?> <br></center>
<br><center style="border-top:1px solid grey"><small style="color:grey">Aplikasi ini akan membuka browser smartphone anda, pastikan jaringan  internet anda aktif</small>
</td></tr><tr><td width="100%">
<form id="mailajob" style="background:#fff;padding:20px"id="form"action="setujusmartpustaka.php" enctype="multipart/form-data" method="post" name="postform">
<input type="hidden" name="id" value="<?php echo $rows['id'];?>"/>
<input type="hidden" name="pembelian" value="<?php echo $rows['pembelian'];?>"/>
<input type="hidden" name="point" value="<?php echo $bro['point'];?>"/>
</form>
</div>
<div class="w3-container w3-center w3-animate-bottom">
<center><br><a onclick="document.getElementById('mailajob').submit();" style="width:100%;border-radius:10px;padding:10px;background:green;color:#fff" href="<?php echo $bro['urlsmartpustaka']; ?>" target="_blank">Setuju</a></center>
 <br><center><a href="javascript:history.go(-1)">Back</a></center><br></td></tr></table>
</center><br></div>
	  <?php }else{ ?>
<div class="w3-container w3-center w3-animate-top">
<center><h4 style="border-bottom:1px solid grey;color:grey;padding:10px">Hi, <?php echo $rows['first_name']; ?></h4>
<table width="100%"><tr><td style="padding:10px;font-size:12px;color:#444;font-weight:bold"width="100%">
Anda membaca buku <?php echo $bro['judulsmartpustaka'];?><br>akan menggunakan <?php echo $bro['point'];?> Point untuk membaca materi dari buku ini <br></center>
<br><center style="border-top:1px solid grey"><small style="color:grey">Aplikasi ini akan membuka browser smartphone anda, pastikan jaringan  internet anda aktif</small>
</td></tr><tr><td width="100%">
<form id="mailajob" style="background:#fff;padding:20px"id="form"action="setujusmartpustaka.php" enctype="multipart/form-data" method="post" name="postform">
<input type="hidden" name="id" value="<?php echo $rows['id'];?>"/>
<input type="hidden" name="pembelian" value="<?php echo $rows['pembelian'];?>"/>
<input type="hidden" name="point" value="<?php echo $bro['point'];?>"/>
</form>
</div>
<div class="w3-container w3-center w3-animate-bottom">

<?php
$point=$bro['point'];
$akun=$rows['pembelian'];
if($akun<$point){
?><center style="color:grey"><small>Oh, maaf point kamu 0 tidak bisa menggunakan layanan ini</small></center><br>
<a onclick="javascript:showDiv()" href="proplan.php#home">
<button class="ladda-button" data-color="blue" ><small>Upgrade to ProPlan</small></button>
</a><br><br>
<?php } else {?>
<center><br><a onclick="document.getElementById('mailajob').submit();" style="width:100%;border-radius:10px;padding:10px;background:green;color:#fff" href="<?php echo $bro['urlsmartpustaka']; ?>" target="_blank">Setuju</a></center>
 <?php  } ?>
 <br><center><a href="javascript:history.go(-1)">Back</a></center><br></td></tr></table>
</center><br></div>

	  <?php }?>
</body>
<style>#loading{display:block;position:absolute;top:0;left:0;z-index:99999;width:100vw;height:100vh;background-image:url("hourglass.svg");background-repeat:no-repeat;background-position:center}</style>
<div id="loading" style="display:none">
</div>
<script type="text/javascript">function showDiv(){div=document.getElementById("loading");div.style.display="block"};</script>
