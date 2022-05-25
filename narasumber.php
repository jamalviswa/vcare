<?php
$session_lifetime = 3600 * 24 * 860; // 2 days
session_set_cookie_params ($session_lifetime);
session_start();
include_once 'dbconnect.php';
if(!isset($_SESSION['user']))
{
	header("Location: home.php");
}
$res=mysqli_query($mysqli, "SELECT * FROM users WHERE id=".$_SESSION['user']);
$rows=mysqli_fetch_array($res);
$_SESSION['user'] = $rows['id'];
$id=$_GET['id'];
$jes=mysqli_query($mysqli, "SELECT * FROM users WHERE id='".$id."'");
$bro=mysqli_fetch_array($jes);
?><head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name=viewport content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="w3.css">
<meta charset="UTF-8"/><meta http-equiv="X-UA-Compatible"content="IE=edge,chrome=1"><meta name="viewport"content="width=device-width, initial-scale=1.0"><link rel="stylesheet"type="text/css"href="../demo.css"/><link rel="stylesheet"href="../css/bemo.css"><link rel="stylesheet"href="../dist/ladda.min.css"></head>
</head>
<body ><br><br><br>
<div style="display: block;margin: 0 auto;min-height: 0;width: 85%;">

<div class="w3-container w3-center w3-animate-top">
<center><h4 style="border-bottom:1px solid grey;color:grey;padding:10px">Profile Narasumber</h4>
<table width="100%"><tr><td style="padding:10px;font-size:12px;color:#444;font-weight:bold"width="100%"><br>
<center><img src="foto_mitra/<?php echo $bro['picture'];?>" style="max-width:150px;height:auto;padding:5px;"/><br><?php echo $bro['first_name']; ?></center>
<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;}
.tg td{font-family:Arial, sans-serif;font-size:12px;padding:5px;overflow:hidden;word-break:normal;color:#444}
.tg th{font-family:Arial, sans-serif;font-size:12px;font-weight:normal;padding:5px;overflow:hidden;word-break:normal;color:#444}
.tg .tg-baqh{text-align:center;vertical-align:top}
.tg .tg-lqy6{text-align:right;vertical-align:top}
.tg .tg-0lax{text-align:left;vertical-align:top}
</style>
<table width="100%"class="tg">
  <tr>
    <td class="tg-lqy6">Umur</td>
    <td class="tg-baqh">:</td>
    <td class="tg-0lax">
<?php
$tiframe=$bro['tgllahir'];;
  $birth_date = strtotime($tiframe);
  $now = time();
  $age = $now-$birth_date;
  $a = $age/60/60/24/365.25;
  echo floor($a);
?> Tahun</td>
  </tr>
  <tr>
    <td class="tg-lqy6">Pengalaman</td>
    <td class="tg-baqh">:</td>
    <td class="tg-0lax"><?php echo $bro['pengalaman']; ?></td>
  </tr>
  <tr>
    <td class="tg-lqy6">Pekerjaan</td>
    <td class="tg-baqh">:</td>
    <td class="tg-0lax"><?php echo $bro['profesi']; ?></td>
  </tr>
  <tr>
    <td class="tg-lqy6">Almamater</td>
    <td class="tg-baqh">:</td>
    <td class="tg-0lax"><?php echo $bro['almamater']; ?></td>
  </tr>
  <tr>
    <td class="tg-lqy6">Ahli Bidang</td>
    <td class="tg-baqh">:</td>
    <td class="tg-0lax"><?php echo $bro['ahlibidang']; ?></td>
  </tr>
</table>
</td></tr><tr><td width="100%">
<form id="mailajob" style="background:#fff;padding:20px"id="form"action="setujusmartpustaka.php" enctype="multipart/form-data" method="post" name="postform">
<input type="hidden" name="id" value="<?php echo $rows['id'];?>"/>
<input type="hidden" name="pembelian" value="<?php echo $rows['pembelian'];?>"/>
<input type="hidden" name="point" value="<?php echo $bro['point'];?>"/>
</form></div>
<div class="w3-container w3-center w3-animate-bottom">

<?php
$kip=mysqli_query($mysqli, "SELECT id_trans, kode_trans, id_users, online, nama_voucher, pointvoucher FROM transaksi INNER JOIN voucher on transaksi.nama_voucher=voucher.idvoucher where transaksi.id_users='".$_SESSION['user']."' and transaksi.status_trans='otw'");
$kor=mysqli_fetch_array($kip); 
$huua = $kor['pointvoucher']; 
$jumlahonline = $kor['online']; 
$id_trans = $kor['id_trans']; 
$posli = "SELECT count(*) FROM counterinterview WHERE id_users='".$_SESSION['user']."' and id_trans='$id_trans'";
$nenek = mysqli_query($mysqli, $posli);
$interview = mysqli_fetch_array($nenek);
$interview = $kor['online']; 
 if($huua=='wawancara')
      { 
 if($interview<$jumlahonline)
      { ?>
<center><br><a onclick="document.getElementById('mailajob').submit();" style="width:100%;border-radius:10px;padding:10px;background:green;color:#fff" href="new_pm.php?recip=<?php echo $bro['id']; ?>" >Start Interview</a></center>
 <?php }  else
      { ?>
 <center style="color:grey">Kamu memiliki jadwal interview/wawancara aktif<br>
 <a onclick="javascript:showDiv()" href="list_pm.php#home">
<button class="ladda-button" data-color="red" ><small>next Interview</small></button>
</a></center><br>
	  <?php }} else{ ?><center style="color:grey">Kamu belum memiliki tiket interview</center><br>
<a onclick="javascript:showDiv()" href="proplan.php#home">
<button class="ladda-button" data-color="blue" ><small>Upgrade to ProPlan</small></button>
</a><br><br>
<?php }?>
 <br><center><a href="javascript:history.go(-1)">Back</a></center><br></td></tr></table>
</center><br></div>
</body>
