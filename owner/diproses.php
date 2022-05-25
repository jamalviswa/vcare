<?php
session_start();
include_once 'dbconnect.php';
if(!isset($_SESSION['mitra']))
{
	header("Location: firli.php#login");
}
$res=mysqli_query($mysqli, "SELECT * FROM mitra WHERE id_mitra=".$_SESSION['mitra']);
$rows=mysqli_fetch_array($res);
?>

<head>
<meta charset="UTF-8"/><meta http-equiv="X-UA-Compatible"content="IE=edge,chrome=1"><meta name="viewport"content="width=device-width, initial-scale=1.0">
<link rel="stylesheet"type="text/css"href="../demo.css"/><link rel="stylesheet"href="../css/bemo.css"><link rel="stylesheet"href="../dist/ladda.min.css"></head>
<body onkeydown="javascript:if(window.event.keyCode == 13) window.event.keyCode = 9;"><!--sodrops top bar-->
<div class="sodrops-top" style="height:60px;background-color:#d00909">
<span class="actions" style="float:left">
<ul>
<li><a style="margin-left:-20px;" href="home.php#saldo" onclick="javascript:showDiv();"><img src="../icon/back.png"width="25px"/></i></a></li>
</ul>
</span>
<div style="font-size:18px;font-family:Segoe UI light;float:right;padding-right:20px;">
<a href="javascript:history.go(0)"><img src="icon/refresh.png"width="25px"/></a>
</div>
</div><br><br><br><br>
<div style="color:#444;padding: 20px;"> <?php 
$her=mysqli_query($mysqli, "SELECT * FROM infobank where idinfo='1'");
$mul=mysqli_fetch_array($her);
$milk=mysqli_query($mysqli, "SELECT * FROM trans_sopir where idsopir=".$_SESSION['mitra']);
while($ent=mysqli_fetch_array($milk)){
 if($ent['statussaldo']=='minta')
      { 
   if($ent['tipesaldo']=='topup')
      { ?>
<style> .red{visibility:hidden}</style>
  <b><small>Anda  request Topup</small></b><br><br>
Senilai: USD  <?php echo $ent['jumlahsaldo'];?><br>
Silahkan melakukan transfer ke rekening Perawat:<br>
Bank Name: <?php echo $mul['namabank'];?><br>
Account number: <?php echo $mul['norek'];?><br>
Owner Name: <?php echo $mul['namaorang'];?><br><br>
<small>Setelah melakukan transfer ke rekening Perawat, silahkan Confirm</small><br><br>
Untuk Payment Confirm harap hubungi: <?php echo $mul['jambuka'];?> (Sms/Telp/Whatsapp)<br><small>Wajib melakukan Payment Confirm</small>
<br><br>
<center>
<a href="#Confirm">
<button style="width:100%;font-size:15px;height:auto;margin-top:0px;padding-bottom:20px;border-radius:0px;"class="ladda-button"data-color="green">Payment Confirm</button>
</a>
</center>
	  <?php }
	  if($ent['tipesaldo']=='withdraw')
      {?>

<style> .red{visibility:hidden}</style>
<b><small>Anda request Withdrawal, 
Senilai: USD  <?php echo $ent['jumlahsaldo'];?><br><br>Tunggu ...</small></b><br><br>

	  <? }}
 if($ent['statussaldo']=='dijemput')
 {
?>
<style> .red{visibility:hidden}</style>
<br>
<b><small>Request <?php echo $ent['tipesaldo'];?> Waiting for admin confirmation</small></b><br><br>
<center><img src="hourglass.svg" width="100px"/></center>
<?php }}?>
</div>
 </center>
</body>
<?php 
$id_trans=$_GET['id_trans'];
$mitra = $_SESSION['mitra'];
$view=mysqli_query($mysqli, "SELECT * FROM transaksi where id_mitra='$mitra' and id_trans='$id_trans'");
while($row=mysqli_fetch_array($view)){
	?><?php 
 if($row['status_trans']=='dijemput')
      { ?><script>document.location.href="home.php#klien";</script><?php }	} ;
 ?>