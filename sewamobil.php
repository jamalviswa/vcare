<?php
$session_lifetime = 3600 * 24 * 860; // 2 days
session_set_cookie_params ($session_lifetime);
session_start();
include_once 'dbconnect.php';
if(!isset($_SESSION['user']))
{
	header("Location: firli.php#login");
}
$res=mysqli_query($mysqli, "SELECT * FROM users WHERE id=".$_SESSION['user']);
$rows=mysqli_fetch_array($res);
$piko=mysqli_query($mysqli, "SELECT * FROM bebanbiaya WHERE idbeban='1'");
$loki=mysqli_fetch_array($piko);
?>

<?php 
if(count($_POST)>0) {
	if (empty($_POST['sekolah'])) {
   ?>
<script>window.alert("Pilih fasilitas!");window.history.back(-2);</script><?php
  return false;
}if (empty($_POST['keterangan'])) {
   ?>
<script>window.alert("Pilih tujuan kota!");window.history.back(-2);</script><?php
  return false;
}if (empty($_POST['tujuan'])) {
   ?>
<script>window.alert("Input Adress anda!");window.history.back(-2);</script><?php
  return false;
}if (empty($_POST['timepicker1'])) {
   ?>
<script>window.alert("tentukan waktu kunjungan!");window.history.back(-2);</script><?php
  return false;
}
if ($_POST['sekolah']=='sopir'){
	$bebanuser=$_POST['bebanuser'];
	$tambahansopir=$_POST['tambahansopir'];
	$normal=$_POST['normal'];
	$harga=$tambahansopir+$normal+$bebanuser;
}else{
$bebanuser=$_POST['bebanuser'];
$normal=$_POST['normal'];
$harga=$normal+$bebanuser;
}
mysqli_query($mysqli, "UPDATE transaksi set harga='$harga', keterangan='" . $_POST["keterangan"] . "', tujuan='" . $_POST["tujuan"] . "', timepicker1='" . $_POST["timepicker1"] . "', status_trans='dijemput', sekolah='" . $_POST["sekolah"] . "', person='" . $_POST["person"] . "', bed='" . $_POST["bed"] . "' WHERE id_users='" . $_SESSION['user']. "' and status_trans='minta'");
}
?>
<head><meta charset="UTF-8"/>
<meta http-equiv="refresh" content="100">
<meta http-equiv="X-UA-Compatible"content="IE=edge,chrome=1"><meta name="viewport"content="width=device-width, initial-scale=1.0"><link rel="stylesheet"type="text/css"href="demo.css"/>
<link href="css/timepicki.css"rel="stylesheet">
<link rel="stylesheet"href="themes/base/jquery.ui.all.css">
<script src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script src="js/jquery.min.js"></script>
<script src="js/jquery-ui.min.js"></script>
<script src="jquery.ui.addresspicker.js"></script>
<link rel="stylesheet"type="text/css"href="demo.css"/>
<style type="text/css">ul{padding:0;list-style:none}ul li{display:inline-block;position:relative;line-height:21px;text-align:left}ul li a{display:block;padding:8px 25px;color:#444;text-decoration:none}ul li a:hover{color:#red}ul li ul.dropdown{min-width:100%;background-color:#FFF;display:none;position:absolute;z-index:999;left:0;top:35px;border:1px solid grey}ul li:hover ul.dropdown{display:block}ul li ul.dropdown li{display:block}}</style>
<link rel="stylesheet"href="css/bemo.css">
<link rel="stylesheet"href="dist/ladda.min.css">

</head><body onkeydown="javascript:if(window.event.keyCode==13)window.event.keyCode=9"><body onkeydown="javascript:if(window.event.keyCode==13)window.event.keyCode=9">
<div class="sodrops-top"><span class="actions"><ul>
<li><a href="javascript:history.go(0)"><img src="icon/refresh.png"width="25px"/></a></li><li><a href="fdex.php#jogin"><img src="icon/home.png"width="25px"/></a></li>
</ul></span><div style="color:#fff;margin-left:20px;font-size:18px;font-weight:bold;margin-top:5;">
Transaksi Sewa
</div></div><br><br><br>
<?php
$users = $_SESSION['user'];
$query = "SELECT COUNT(*) AS total FROM transaksi where id_users='$users'"; 
$result = mysqli_query($mysqli, $query); 
$values = mysqli_fetch_assoc($result); 
$num_rows = $values['total']; 
if($num_rows == '0')
      { ?>
  <div style="margin-top:35px;font-size:17px;padding:20px;color:"><br><br>
  <center>Tidak ada permintaan Sewa<br><br></center></div>
<?php } ?>
<?php 
$users = $_SESSION['user'];
$id_mobil = $result['jarak'];
$view=mysqli_query($mysqli, "SELECT * FROM transaksi INNER JOIN car ON transaksi.jarak=car.id_mobil INNER JOIN sopir ON transaksi.id_sopir=sopir.id_sopir where transaksi.id_users='$users'");
while($row=mysqli_fetch_array($view)){
	?><?php 
 if($row['status_trans']=='otw')
      { ?>
<script>document.location.href=" sewamobil.php#otw";</script>
<div id="otw" class="panel" style="background-color:#fff; width:100%;padding-left:0px;padding-right:0px"><div class="content" style="width:100%;padding-right:0px;padding-left:0px" ><br>
<center><div style="margin-top:-20px;color:#19719a;font-size:16px;">Sewa Aktif</div><br>
Sewa <?php echo $row['jarak']; ?> (<?php echo $row['lama']; ?>)<br>
<small>Tanggal : <?php echo $row['tanggal']; ?></small><br><br>
<center>
<?php
 if($row['gambarmobil']=='0')
      { ?>
<img src="icon/nopic.png" style="width:100%;top:0;height:200px;"/>
<?php }
else{?>
<a style="color:#fff" ><img src="fotobarang/<?php echo $row['gambarmobil'];?>" style="width:100%;top:0;height:auto;"/>
</a><?php } ?></center>
<table width="100%" style="background-color:rgba(1, 102, 185, 0.76);">
<tr><td style="background-color:#3a3b3c;padding:10px;"><center><?php echo $row['nama_mobil'];?></center></td>
<td style="background-color:#3a3b3c;padding:10px;"><center>
<img style="width:80px" src="<?php 
$id_sopir=$row['id_sopir'];
$query=mysqli_fetch_array(mysqli_query($mysqli, "select * from ratings where art_id='$id_sopir'"));
	$total_votes=$query['total_votes'];
	$total_points=$query['total_points'];
	$ratings=$total_points/$total_votes;echo ''.ceil($ratings); echo '.png';?>"/>
</center></td>
</tr></table>
<p style="color:"><label>Spesifikasi</label><br><br>
<table width="100%" style="color:#444;font-size:12px">
<tr><td><div style="float:left"><img src="tahun.png"width="16px" style="vertical-align:middle"/> <?php echo $row['tahun'];?></div></td><td><div style="float:left"><img src="orang.png"width="16px" style="vertical-align:middle"/> <?php echo $row['kursi'];?></div></td></tr>
<tr><td><div style="float:left"><img src="paint.png"width="16px" style="vertical-align:middle"/> <?php echo $row['warna'];?></div></td><td><div style="float:left"><img src="travel.png"width="16px" style="vertical-align:middle"/> <?php echo $row['bagasi'];?></div></td></tr>
<tr><td><div style="float:left"><img src="gas.png"width="16px" style="vertical-align:middle"/> <?php echo $row['jenisbahanbakar'];?></div></td><td><div style="float:left"><img src="transmisi.png"width="16px" style="vertical-align:middle"/> <?php echo $row['jaraktransmisi'];?></div></td></tr>

</table>
</p>
<p><label>Fasilitas</label><br><br>
<table width="100%" style="color:#444;font-size:12px">
<tr>
<td><div style="float:left">Single AC</div>  <div style="float:right;margin-right:20px"><?php
 if($row['singleac']=='yes')
      { ?>
<img src="icon/check.png"width="16px" style="vertical-align:middle"/> 
<?php }
else{?>
<img src="no.png"width="16px" style="vertical-align:middle"/> 
<?php } ?></div></td>
<td><div style="float:left">Double AC</div> <div style="float:right;margin-right:20px"><?php
 if($row['doubleac']=='yes')
      { ?>
<img src="icon/check.png"width="16px" style="vertical-align:middle"/> 
<?php }
else{?>
<img src="no.png"width="16px" style="vertical-align:middle"/> 
<?php } ?></div> </td>
</tr>
<tr>
<td><div style="float:left">Charger HP</div><div style="float:right;margin-right:20px"><?php
 if($row['chargerhp']=='yes')
      { ?>
<img src="icon/check.png"width="16px" style="vertical-align:middle"/> 
<?php }
else{?>
<img src="no.png"width="16px" style="vertical-align:middle"/> 
<?php } ?></div></td>
<td><div style="float:left">TeUSD l</div><div style="float:right;margin-right:20px"><?php
 if($row['teUSD l']=='yes')
      { ?>
<img src="icon/check.png"width="16px" style="vertical-align:middle"/> 
<?php }
else{?>
<img src="no.png"width="16px" style="vertical-align:middle"/> 
<?php } ?></div></td>
</tr>
<tr>
<td><div style="float:left">Audio</div><div style="float:right;margin-right:20px"><?php
 if($row['audio']=='yes')
      { ?>
<img src="icon/check.png"width="16px" style="vertical-align:middle"/> 
<?php }
else{?>
<img src="no.png"width="16px" style="vertical-align:middle"/> 
<?php } ?></div></td>
<td><div style="float:left">Video</div><div style="float:right;margin-right:20px"><?php
 if($row['video']=='yes')
      { ?>
<img src="icon/check.png"width="16px" style="vertical-align:middle"/> 
<?php }
else{?>
<img src="no.png"width="16px" style="vertical-align:middle"/> 
<?php } ?></div></td>
</tr>

<tr>
<td><div style="float:left">Toilet</div><div style="float:right;margin-right:20px"><?php
 if($row['toilet']=='yes')
      { ?>
<img src="icon/check.png"width="16px" style="vertical-align:middle"/> 
<?php }
else{?>
<img src="no.png"width="16px" style="vertical-align:middle"/> 
<?php } ?></div></td>
<td><div style="float:left">Ban Cadangan</div><div style="float:right;margin-right:20px"><?php
 if($row['bancadangan']=='yes')
      { ?>
<img src="icon/check.png"width="16px" style="vertical-align:middle"/> 
<?php }
else{?>
<img src="no.png"width="16px" style="vertical-align:middle"/> 
<?php } ?></div></td>
</tr>
</table>
</p>
<p style="color:#565656"><label>Deskripsi Mobil & Layanan</label><br>
<div style="font-size:12px"><?php echo $row['deskripsimobil']; ?></div>
</p><br>
<div style="color:#19719a;font-size:16px;">Biaya Sewa dan Fasilitas</div><br>
Biaya sewa <?php echo $row['lama']; ?>: USD  <?php
$jam = $row['price'];
$biaya = number_format($jam,0,",",".");
echo $biaya;?><br>
Biaya Fasilitas <?php echo $row['sekolah']; ?>: 
<?php if($row['sekolah']=='sopir')
      { ?>
USD  <?php
$jam = $row['hargasopir'];
$biaya = number_format($jam,0,",",".");
echo $biaya;?>
	  <?php } else{?> -
	  <?php } ?>
<br>
Total Price : USD  <?php
$jim = $row['harga'];
$muk = number_format($jim,0,",",".");
echo $muk;?><br>
<br>
Status pembayaran: Lunas
<br><br>
</table>
<center style="color:">Lokasi Pemilik Mobil</center>
<iframe width="100%"height="250"frameborder="0"scrolling="yes"marginheight="0"marginwidth="0"src="http://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=<?php echo $row['latsopir']?>,<?php echo $row['lngsopir']?> (custom heading)&amp;output=embed"></iframe>
<br><small style="color:">Penyewa mobil bisa melihat posisi lokasi pemilik mobil, penyewa bisa bertemu pemilik mobil melalui lokasi ataupun menunggu dijemput</small>
<br><br></div></div>
<?php }	  
 if($row['status_trans']=='dijemput')
      { ?>
<script>document.location.href=" sewamobil.php#row";</script>
<div id="row"class="panel" style="background-color:#fff; width:100%;padding-left:0px;padding-right:0px"><div class="content" style="width:100%;padding-right:0px;padding-left:0px">

<center><div style="margin-top:-20px;color:#19719a;font-size:16px;">You Have Invoice</div><br>
Sewa <?php echo $row['jarak']; ?> (<?php echo $row['lama']; ?>)<br>
<small>Tanggal : <?php echo $row['tanggal']; ?></small><br><br>
<center>
<?php
 if($row['gambar']=='0')
      { ?>
<img src="icon/nopic.png" style="width:100%;top:0;height:200px;"/>
<?php }
else{?>
<a style="color:#fff" ><img src="fotobarang/<?php echo $row['gambarmobil'];?>" style="width:100%;top:0;height:auto;"/>
</a><?php } ?></center>
<table width="100%" style="background-color:rgba(1, 102, 185, 0.76);">
<tr><td style="background-color:#3a3b3c;padding:10px;"><center><?php echo $row['nama_mobil'];?></center></td>
<td style="background-color:#3a3b3c;padding:10px;"><center>
<img style="width:80px" src="<?php 
$id_sopir=$row['id_sopir'];
$query=mysqli_fetch_array(mysqli_query($mysqli, "select * from ratings where art_id='$id_sopir'"));
	$total_votes=$query['total_votes'];
	$total_points=$query['total_points'];
	$ratings=$total_points/$total_votes;echo ''.ceil($ratings); echo '.png';?>"/>
</center></td>
</tr></table>
<p style="color:"><label>Spesifikasi</label><br><br>
<table width="100%" style="color:#444;font-size:12px">
<tr><td><div style="float:left"><img src="tahun.png"width="16px" style="vertical-align:middle"/> <?php echo $row['tahun'];?></div></td><td><div style="float:left"><img src="orang.png"width="16px" style="vertical-align:middle"/> <?php echo $row['kursi'];?></div></td></tr>
<tr><td><div style="float:left"><img src="paint.png"width="16px" style="vertical-align:middle"/> <?php echo $row['warna'];?></div></td><td><div style="float:left"><img src="travel.png"width="16px" style="vertical-align:middle"/> <?php echo $row['bagasi'];?></div></td></tr>
<tr><td><div style="float:left"><img src="gas.png"width="16px" style="vertical-align:middle"/> <?php echo $row['jenisbahanbakar'];?></div></td><td><div style="float:left"><img src="transmisi.png"width="16px" style="vertical-align:middle"/> <?php echo $row['jaraktransmisi'];?></div></td></tr>

</table>
</p>
<p style="color:"><label>Fasilitas</label><br><br>
<table width="100%" style="color:#444;font-size:12px">
<tr>
<td><div style="float:left">Single AC</div>  <div style="float:right;margin-right:20px"><?php
 if($row['singleac']=='yes')
      { ?>
<img src="icon/check.png"width="16px" style="vertical-align:middle"/> 
<?php }
else{?>
<img src="no.png"width="16px" style="vertical-align:middle"/> 
<?php } ?></div></td>
<td><div style="float:left">Double AC</div> <div style="float:right;margin-right:20px"><?php
 if($row['doubleac']=='yes')
      { ?>
<img src="icon/check.png"width="16px" style="vertical-align:middle"/> 
<?php }
else{?>
<img src="no.png"width="16px" style="vertical-align:middle"/> 
<?php } ?></div> </td>
</tr>
<tr>
<td><div style="float:left">Charger HP</div><div style="float:right;margin-right:20px"><?php
 if($row['chargerhp']=='yes')
      { ?>
<img src="icon/check.png"width="16px" style="vertical-align:middle"/> 
<?php }
else{?>
<img src="no.png"width="16px" style="vertical-align:middle"/> 
<?php } ?></div></td>
<td><div style="float:left">TeUSD l</div><div style="float:right;margin-right:20px"><?php
 if($row['teUSD l']=='yes')
      { ?>
<img src="icon/check.png"width="16px" style="vertical-align:middle"/> 
<?php }
else{?>
<img src="no.png"width="16px" style="vertical-align:middle"/> 
<?php } ?></div></td>
</tr>
<tr>
<td><div style="float:left">Audio</div><div style="float:right;margin-right:20px"><?php
 if($row['audio']=='yes')
      { ?>
<img src="icon/check.png"width="16px" style="vertical-align:middle"/> 
<?php }
else{?>
<img src="no.png"width="16px" style="vertical-align:middle"/> 
<?php } ?></div></td>
<td><div style="float:left">Video</div><div style="float:right;margin-right:20px"><?php
 if($row['video']=='yes')
      { ?>
<img src="icon/check.png"width="16px" style="vertical-align:middle"/> 
<?php }
else{?>
<img src="no.png"width="16px" style="vertical-align:middle"/> 
<?php } ?></div></td>
</tr>

<tr>
<td><div style="float:left">Toilet</div><div style="float:right;margin-right:20px"><?php
 if($row['toilet']=='yes')
      { ?>
<img src="icon/check.png"width="16px" style="vertical-align:middle"/> 
<?php }
else{?>
<img src="no.png"width="16px" style="vertical-align:middle"/> 
<?php } ?></div></td>
<td><div style="float:left">Ban Cadangan</div><div style="float:right;margin-right:20px"><?php
 if($row['bancadangan']=='yes')
      { ?>
<img src="icon/check.png"width="16px" style="vertical-align:middle"/> 
<?php }
else{?>
<img src="no.png"width="16px" style="vertical-align:middle"/> 
<?php } ?></div></td>
</tr>
</table>
</p>
<p style="color:#565656"><label>Deskripsi Mobil & Layanan</label><br>
<div style="font-size:12px"><?php echo $row['deskripsimobil']; ?></div>
</p><br>
<div style="color:#19719a;font-size:16px;">Biaya Sewa dan Fasilitas</div><br>
Biaya sewa <?php echo $row['lama']; ?>: USD  <?php
$jam = $row['price'];
$biaya = number_format($jam,0,",",".");
echo $biaya;?><br>
Biaya Fasilitas <?php echo $row['sekolah']; ?>: 
<?php if($row['sekolah']=='sopir')
      { ?>
USD  <?php
$jam = $row['hargasopir'];
$biaya = number_format($jam,0,",",".");
echo $biaya;?>
	  <?php } else{?> -
	  <?php } ?>
<br><br>
<section class="button-demo" style="padding:0;width:100%">
<a href="bayarin.php?id_trans=<?php echo $row['id_trans']; ?>" onclick="javascript:showDiv();"><button style="width:100%" class="ladda-button" data-color="green" data-style="expand-right">
<small>Proceed to Payment <br> Sub Total: USD 
<?php 
$penjumlahan = $row['harga'];
$subtotal = number_format($penjumlahan,0,",",".");
echo $subtotal;?>,- </small></button></a></center>
<center>
<a href="cancelmobil.php?id_trans=<?php echo $row['id_trans']; ?>" onClick="return confirm('Yakin membatalkan sewa?')">
<button style="width:100%;font-size:15px;height:auto;margin-top:0px;"class="ladda-button"data-color="red">Cancel</button>
</a>
</center><br><br>
</section>

<script src="dist/spin.min.js"></script>
</div></div><?php }};?>
<?php
$users = $_SESSION['user'];
$query = "SELECT COUNT(*) AS total FROM transaksi where transaksi.id_users='$users' and status_trans='minta' or status_trans='dijemput'"; 
$result = mysqli_query($mysqli, $query); 
$values = mysqli_fetch_assoc($result); 
$num_rows = $values['total']; 

$jim=mysqli_query($mysqli, "SELECT * FROM transaksi INNER JOIN car ON transaksi.jarak=car.id_mobil where transaksi.id_users='$users' and status_trans='minta'");
while($jow=mysqli_fetch_array($jim)){
if($values['total']=='0')
      { ?>	<br>
	<div style="width:100%;border-top:1px solid ;color:">No  request yang sedang berlangsung...
<?php }else{ ?>
<script>document.location.href=" sewamobil.php#about";</script>
<div id="about"class="panel" style="background-color:#fff; width:100%;padding-left:0px;padding-right:0px"><div class="content" style="width:100%;padding-right:0px;padding-left:0px">
<div style="margin-top:-65px;font-size:12px;padding:20px;"><br>
<div style="color:#19719a;font-size:16px;">Informasi Penyewa</div><br>
<br>Nama Lengkap : <?php echo $jow['nama_rumah']; ?>
<br>Nomor Handphone : <?php echo $jow['nomor']; ?><br><br>
Tanggal sewa: <?php echo $jow['tanggal']; ?><br>
Lama Sewa: <?php echo $jow['lama']; ?><br>
Biaya sewa: USD  <?php
$jam = $jow['price'];
$biaya = number_format($jam,0,",",".");
echo $biaya;?><br>
<br>
<script>$(function(){var a=$("#addresspicker").addresspicker({componentsFilter:"country:ID"})});</script>

<form id="form"name="frmUser"method="post"action="<?php echo $_SERVER['PHP_SELF']?>">

<div style="color:#19719a;font-size:16px;">Lengkapi formulir</div><br>
<select id="sekolah" name="sekolah" required=required>
<option value="<?php echo $jow['sekolah']; ?>">-Tambahan Sopir-</option>
<option name="sekolah"value="-">Tanpa Sopir</option>
<option name="sekolah"value="sopir">Sopir  +USD  <?php echo $jow['hargasopir'];?></option>
</select><br><br>
<select id="person" name="person" required=required>
<option value="<?php echo $jow['person']; ?>">-Tujuan Kota-</option>
<option name="person"value="Dalam Kota">Dalam kota</option>
<option name="person"value="Luar kota">Luar Kota</option>
</select><br><br>
<p><label>Tambahkan Alamat rumah anda: </label>
<div class="demo"><div class='input'>
<input id="addresspicker"type="text"name="tujuan"placeholder="Ketik Nama street name, house number, Nomor rumah"required="required"/>
</div></div></p>
<p><label>Kota tujuan anda :</label>
<input id="keterangan" name="keterangan"type="text"placeholder="Masukkan kota tujuan"required="required"/></p>
<p><label>Tentukan jam :<br>(untuk bertemu pemilik mobil/dijemput sopir)</label><div class="inner cover indexpicker"><input id="timepicker1"type="text"placeholder="Pilih Jam kunjungan"name="timepicker1"required="required"/></div>
<script src="js/timepicki.js"></script>
<script>$("#timepicker1").timepicki();</script></p>
</div>
<p style="padding:100px"><input type="hidden" name="bed"type="text" value="24 jam"/>
<input type="hidden" name="tambahansopir"type="text" value="<?php echo $jow['hargasopir'];?>"/>
<input type="hidden" name="bebanuser"type="text" value="<?php echo $loki['bebanpenyewa'];?>"/>
<input type="hidden" name="normal"type="text" value="<?php echo $jow['price'];?>"/>
</p><br><br><br><br>
<table width="100%" style="width:100%;z-index:9999;bottom:0;position:fixed;background-color:none;">
<td width="100%">
<section style="width:100%;padding:0"class="button-demo"><button style="background:orange;width:100%;border-radius:0px;height:auto"type="submit" name="submit" class="ladda-button"data-color="green"data-style="expand-right"><small>Proceed to Payment Process</small></button></section>
</form>

<p><center>
<a href="cancel.php?id_trans=<?php echo $jow['id_trans']; ?>" onClick="return confirm('Yakin membatalkan sewa?')">
<button style="width:100%;font-size:15px;height:auto;margin-top:-25px;padding-bottom:20px;"class="ladda-button"data-color="red">Cancel</button>
</a>
</p>
</center>
<script src="dist/spin.min.js">
</script>
<script src="dist/ladda.min.js">
</script></section>
<script>Ladda.bind(".button-demo button");Ladda.bind(".progress-demo button",{callback:function(a){var c=0;var b=setInterval(function(){c=Math.min(c+Math.random()*0.1,1);a.setProgress(c);if(c===1){a.stop();clearInterval(b)}},200)}});
</script>

</td>
</tr>
</table><?php }};?>
</div></div>

</body>