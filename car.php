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
$jiew=mysqli_query($mysqli, "SELECT * FROM transaksi where id_users=".$_SESSION['user']);
while($jow=mysqli_fetch_array($jiew)){
	?><?php 
 if($jow['status_trans']=='minta' && $jow['jarak']=='car')
      { ?>
<script>document.location.href="sewamobil.php#row";</script><?php }
?>
<?php 
 if($jow['status_trans']=='dijemput' && $jow['jarak']=='car')
      { ?>
<script>document.location.href="sewamobil.php#row";</script><?php }
?>
<?php
if($jow['status_trans']=='otw' && $jow['jarak']=='car')
      {?>
<script>document.location.href="sewamobil.php#otw";</script><?php }};?>
<head>
<meta charset="UTF-8"/>
<meta http-equiv="X-UA-Compatible"content="IE=edge,chrome=1">
<meta name="viewport"content="width=device-width, initial-scale=1.0">
<link href="css/timepicki.css"rel="stylesheet">
<link rel="stylesheet"href="themes/base/jquery.ui.all.css">
<script src="js/jquery.min.js"></script>
<script src="js/jquery-ui.min.js"></script>
<link rel="stylesheet"type="text/css"href="demo.css"/>
<style type="text/css">ul{padding:0;list-style:none}ul li{display:inline-block;position:relative;line-height:21px;text-align:left}ul li a{display:block;padding:8px 25px;color:#444;text-decoration:none}ul li a:hover{color:#red}ul li ul.dropdown{min-width:100%;background-color:#FFF;display:none;position:absolute;z-index:999;left:-50px;top:35px;border:1px solid grey}ul li:hover ul.dropdown{display:block}ul li ul.dropdown li{display:block}#cari{display:none}#loading{display:block;position:absolute;top:0;left:0;z-index:99999;width:100vw;height:100vh;background-image:url("hourglass.svg");background-repeat:no-repeat;background-position:center}</style>
<link rel="stylesheet"href="css/bemo.css">
<link rel="stylesheet"href="dist/ladda.min.css">
<link href="estilos.css" rel="stylesheet"/>
</head>
<body onkeydown="javascript:if(window.event.keyCode==13)window.event.keyCode=9">
   <div id="mobile-nav"></div>
    <nav>
<div style="top:0;width:100%;background:#9c0b0b;height:200px;">
<center>
<img src="icon/profile.png" style="margin-top:70px;width:100px;height:auto;border-radius:50%;top:0;"/>
<br><i style="color:#fff;margin-top:60px"><?php echo $rows['first_name'];?> (Penyewa)<br></i></center>
</div>
      <ul class="menu" style="font-family:Segoe UI light;">
        <li><a href="fdex.php#jogin"><img style="vertical-align:middle" src="dashboard.png" width="20px" onclick="javascript:showDiv();"/>  Menu utama</a></li>
        <li><a href="car.php#cari"><img style="vertical-align:middle" src="list.png" width="20px"/>  Pilih Mobil</a></li>
        <li><a href="car.php#basrent"><img style="vertical-align:middle" src="dist/history.png" width="20px"/>  History</a></li>
        <li><a href="sewamobil.php#about"><img style="vertical-align:middle" src="dist/jadwal.png" width="20px"/>  invoice</a></li>
		<li><a href="setting.php?id=<?php echo $rows['id'];?>"><img style="vertical-align:middle" src="dist/invite.png" width="20px"/>  Profile</a></li>
		<li><a href="setting.php?id=<?php echo $rows['id'];?>"><img style="vertical-align:middle" src="dist/setting.png" width="20px"/>  Settings</a></li>
		<li><a href="logout.php?logout"><img style="vertical-align:middle" src="dist/logout.png" width="20px"/>  Log Out</a></li>
      </ul>
    </nav>
<header style="background:#9c0b0b;position:fixed;width:100%;height:60px;z-index:999;">
<div style="margin-top:15px;margin-right:20px;font-size:20px;font-family:Segoe UI light;color:#fff"><center>Sewa Mobil</center></div>
<div style="margin-top:-25px;margin-right:25px"><a style="float:right;font-size:9px" href="#beby"><img src="search-1.png"width="27px"/></a></div>
</header>
<div id="saldo"class="panel" style="background:#fff"><div class="content" style="background:#fff;color:"><br><br><br><br>
<center style="color:"><h4>Your Balance saat ini:</h4>
<b>IDR <?php 
$sistim = $rows['saldo'];
$saldo = number_format($sistim,0,",",".");
echo $saldo;?></b>
</center><br>
<center style="padding:10px;font-size:12px;color:grey;font-family:Segoe UI light">Your Balance dapat digunakan untuk pembayaran sewa , anda bisa melakukan deposit ke akun anda atau widthdraw ke rekening anda</center>
<br>
<center style="font-size:14px;color:#444;font-family:Segoe UI;background:#dedede;border-top:1px solid grey;border-bottom:1px solid grey;border-style:dashed;">
<?php 
$her=mysqli_query($mysqli, "SELECT * FROM infobank where idinfo='1'");
$mul=mysqli_fetch_array($her);
$milk=mysqli_query($mysqli, "SELECT * FROM trans_saldo where id_users=".$_SESSION['user']);
while($ent=mysqli_fetch_array($milk)){
 if($ent['statussaldo']=='minta')
      { 
   if($ent['tipesaldo']=='topup')
      { ?>
<b><small>You Request Topup</small></b><br><br>
Silahkan melakukan transfer ke rekening admin rento:<br>
Bank Name: <?php echo $mul['namabank'];?><br>
Account number: <?php echo $mul['norek'];?><br>
Owner Name: <?php echo $mul['namaorang'];?><br><br>
jam operasional finance rento: <?php echo $mul['jambuka'];?><br>
<small>Setelah transfer, segera lakukan Payment Confirm</small><br><br>
<center>
<a href="#Confirm">
<button style="width:100%;font-size:15px;height:auto;margin-top:0px;padding-bottom:20px;border-radius:0px;"class="ladda-button"data-color="green">Payment Confirm</button>
</a>
</center>
	  <?php }
	  if($ent['tipesaldo']=='withdraw')
      {?>
<b><small>Anda request Withdrawal</small></b><br><br>

	  <? }}
 if($ent['statussaldo']=='dijemput')
 {
?><br>
<b><small>Request <?php echo $ent['tipesaldo'];?> Anda sedang diproses Admin</small></b><br><br>
<?php }}
$input = "SELECT * FROM trans_saldo WHERE id_users='".$_SESSION['user']."' and statussaldo='minta' or statussaldo='dijemput'";
$result = mysqli_query($mysqli, $input);
$count = mysqli_num_rows($result);
if($count == 0){?>
 </center><center>
<section class="button-demo" style="padding:0;width:100%">
<a href="topup.php?id=<?php echo $rows['id'];?>"><button style="width:100%;border-radius:0px;" class="ladda-button" data-color="blue" data-style="expand-right">
<small>Toup Up/Deposit saldo</small></button></a>
</section>
<center>
<a href="wd.php?id=<?php echo $rows['id'];?>">
<button style="width:100%;font-size:15px;height:auto;margin-top:0px;padding-bottom:20px;border-radius:0px;"class="ladda-button"data-color="green">Withdraw Saldo</button>
</a>
</center>
<?php }?>
</div></div>
<div id="Confirm"class="panel" style="background:#fff"><div class="content" style="background:#fff;color:"><br>
<center>
<b><small>Confirmkan pembayaran anda</small></b></center>
<br>
<form id="form"action="topup.php" method="post">
<input name="id_users" type="hidden" value="<?php echo $_SESSION['user'];?>"/>
<center style="color:"><div id="input">Bank Name :<br>
<input style="color:#444;padding:5px;
    vertical-align: middle;
    border-bottom: 1px solid grey;
    background-size: 20px;" type='text'name="banksaldo"class='holo' placeholder="Tulis Bank Name anda" aria-required="true" required="required"/>
<nav></nav></div><br>
<center style="color:"><div id="input">Account number :<br>
<input style="color:#444;padding:5px;
    vertical-align: middle;
    border-bottom: 1px solid grey;
    background-size: 20px;" type='number'name="nomorrek"class='holo' placeholder="Tulis Account number anda" aria-required="true" required="required"/>
<nav></nav></div><br>
<center style="color:"><div id="input">Owner Name :<br>
<input style="color:#444;padding:5px;
    vertical-align: middle;
    border-bottom: 1px solid grey;
    background-size: 20px;" type='text'name="namauser"class='holo' placeholder="Tulis Nama akun pemilik rekening" aria-required="true" required="required"/>
<nav></nav></div><br>
<button type="submit"name="Confirm" style="width:200px;color:#fff;background:green;border:none;padding:10px;border-radius:20px;" onclick="javascript:showDiv();">Konfirm</button>
<br><br>
<a href="car.php#saldo"style="color:orange">Back</a>
</center>
</form>
</div></div>

<div id="beby"class="panel" style="background:#fff"><div class="content" style="background:#fff;color:"><br><br><br><br>
<br><?php include "dbconnect.php";?>
<script src="jquery.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		<!-- event textbox keyup
		$("#golek").keyup(function() {
			var strcari = $("#golek").val(); <!-- mendapatkan nilai dari textbox -->
			if (strcari != "") <!-- jika value strcari tidak kosong-->
			{
				$("#jesil").html("<img width=300px src='loading.gif'/>") <!-- menampilkan animasi loading -->
				<!-- request data ke cari.php lalu menampilkan ke <div id="hasil"></div> -->
				$.ajax({
					type:"post",
					url:"caricar.php",
					data:"r="+ strcari,
					success: function(data){
						$("#jesil").html(data);
					}
				});
			}
		});
    });
</script>
<br><br><center><a href="#cari"><img src="icon/back.png" width="20px"/><b> Back</b></a></center><br><br>
<div><center><input type="text" name="golek" id="golek" placeholder="Ketik nama kota, lalu klik lihat" style="width: 90%;border-bottom: 1px solid #989494;border-left: none;border-right: none;border-top: none;padding: 5px;"/></center></div>
<div id="jesil"></div>
</div></div>
<div id="home"class="panel"><div class="content"><br><br><center style="color:#444">Kendaraan yang tersedia di dekat anda<br><small>Radius 70 Km</small><br><br></center>
<?php
$query=mysqli_fetch_array(mysqli_query($mysqli, "select * from jadwal_ads"));
$id_mobil=$query['product_id'];
$yat=$rows['lat'];
$yop=$rows['lng'];
$sim=mysqli_query($mysqli, "SELECT id_sopir, latsopir, lngsopir, id_mobil, gambarmobil, harga_12jam, nama_mobil, tahun, warna, jenisbahanbakar, kursi, bagasi, tipetransmisi, ( 3959 * acos( cos( radians('$yat') ) * cos( radians( latsopir ) ) * cos( radians( lngsopir ) - radians('$yop') ) + sin( radians('$yat') ) * sin( radians( latsopir ) ) ) ) AS distance FROM sopir join car on sopir.id_sopir=car.pemilikmobil HAVING distance < '40' ORDER BY distance");
while($kor=mysqli_fetch_array($sim)){
$product_id=$kor['id_mobil'];
$mik=mysqli_query($mysqli, "select * from jadwal_ads where product_id='$product_id'");
while($lod=mysqli_fetch_array($mik)){
?>
<a onclick="javascript:showDiv();" href="cars.php?id_mobil=<?php echo $kor['id_mobil'];?>" style="font-family:Segoe UI light;color:">

<table width="100%" style="font-family:verdana;margin-top:5px;background-color:#fff;font-size:10px;-webkit-box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14), 0 3px 1px -2px rgba(0,0,0,0.12), 0 1px 5px 0 rgba(0,0,0,0.2);
    box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14), 0 3px 1px -2px rgba(0,0,0,0.12), 0 1px 5px 0 rgba(0,0,0,0.2);">
  <tr>
    <td width="50%">
	<table><td>
	<?php
 if($kor['gambarmobil']=='0')
      { ?>
<img src="icon/nopic.png" style="float:right;width:100%;top:0;"/>
<?php }
else{?>
<img src="fotobarang/<?php echo $kor['gambarmobil'];?>" style="float:right;width:100%;top:0;"/>
<?php } ?>
</td></tr></table>
</td>
<td width="50%" style="padding:10px;color:#444;font-size:13px"><center style="font-weight:bold;font-size:12px;color:"><?php echo $kor['nama_mobil'];?></center>
<div style="width:100%;padding:5px;color:#fff;background:#9c0b0b"><center>USD  <?php 
$jam=$kor['harga_12jam'];
$harga_12jam = number_format($jam,0,",",".");
echo $harga_12jam;?></center></div><br><table style="color:#444;font-size:10px">
<tr><td><div style="float:left"><img src="tahun.png"width="16px" style="vertical-align:middle"/> <?php echo $kor['tahun'];?></div></td><td><div style="float:left"><img src="orang.png"width="16px" style="vertical-align:middle"/> <?php echo $kor['kursi'];?></div></td></tr>
<tr><td><div style="float:left"><img src="paint.png"width="16px" style="vertical-align:middle"/> <?php echo $kor['warna'];?></div></td><td><div style="float:left"><img src="travel.png"width="16px" style="vertical-align:middle"/> <?php echo $kor['bagasi'];?></div></td></tr>
<tr><td><div style="float:left"><img src="gas.png"width="16px" style="vertical-align:middle"/> <?php echo $kor['jenisbahanbakar'];?></div></td><td><div style="float:left"><img src="transmisi.png"width="16px" style="vertical-align:middle"/> <?php echo $kor['tipetransmisi'];?></div></td></tr>
</table></td>
  </tr>
</table>
</a>
<?php }}?>
<br>
<p>
<center>
<a href="#cari"><div style="color:#fff;padding:10px;width:100%;font-size:13px;height:auto" class="ladda-button"data-color="blue">Cari Kendaraan Lain
</div></a>
</center>
</p>
</div></div>
<div id="cari"class="panel"><div class="content"><br>
<?php 
$query=mysqli_fetch_array(mysqli_query($mysqli, "select * from sopir INNER JOIN ratings ON sopir.id_sopir=ratings.art_id"));
$jiew=mysqli_query($mysqli, "SELECT * FROM car INNER JOIN sopir ON car.pemilikmobil=sopir.id_sopir where ada='1'");
while($jows=mysqli_fetch_array($jiew)){
?>
<a onclick="javascript:showDiv();" href="cars.php?id_mobil=<?php echo $jows['id_mobil'];?>" style="font-family:Segoe UI light;color:">

<table width="100%" style="font-family:verdana;margin-top:5px;background-color:#fff;font-size:10px;-webkit-box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14), 0 3px 1px -2px rgba(0,0,0,0.12), 0 1px 5px 0 rgba(0,0,0,0.2);
    box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14), 0 3px 1px -2px rgba(0,0,0,0.12), 0 1px 5px 0 rgba(0,0,0,0.2);">
  <tr>
    <td width="50%">
	<table><td>
	<?php
 if($jows['gambarmobil']=='0')
      { ?>
<img src="icon/nopic.png" style="float:right;width:100%;top:0;"/>
<?php }
else{?>
<img src="fotobarang/<?php echo $jows['gambarmobil'];?>" style="float:right;width:100%;top:0;"/>
<?php } ?>
</td></tr></table>
</td>
<td width="50%" style="padding:10px;color:#444;font-size:13px"><center style="font-weight:bold;font-size:12px;color:"><?php echo $jows['nama_mobil'];?></center>
<div style="width:100%;padding:5px;color:#fff;background:#9c0b0b"><center>USD  <?php 
$jam=$jows['harga_12jam'];
$harga_12jam = number_format($jam,0,",",".");
echo $harga_12jam;?></center></div><br><table style="color:#444;font-size:10px">
<tr><td><div style="float:left"><img src="tahun.png"width="16px" style="vertical-align:middle"/> <?php echo $jows['tahun'];?></div></td><td><div style="float:left"><img src="orang.png"width="16px" style="vertical-align:middle"/> <?php echo $jows['kursi'];?></div></td></tr>
<tr><td><div style="float:left"><img src="paint.png"width="16px" style="vertical-align:middle"/> <?php echo $jows['warna'];?></div></td><td><div style="float:left"><img src="travel.png"width="16px" style="vertical-align:middle"/> <?php echo $jows['bagasi'];?></div></td></tr>
<tr><td><div style="float:left"><img src="gas.png"width="16px" style="vertical-align:middle"/> <?php echo $jows['jenisbahanbakar'];?></div></td><td><div style="float:left"><img src="transmisi.png"width="16px" style="vertical-align:middle"/> <?php echo $jows['tipetransmisi'];?></div></td></tr>

</table></td>
  </tr>
</table>
</a>

<script src="dist/spin.min.js">
</script>
<script src="dist/ladda.min.js">
</script>
<script>Ladda.bind(".button-demo button");Ladda.bind(".progress-demo button",{callback:function(a){var c=0;var b=setInterval(function(){c=Math.min(c+Math.random()*0.1,1);a.setProgress(c);if(c===1){a.stop();clearInterval(b)}},200)}});
</script>
<?php }?>
</div></div>
<div id="basrent"class="panel" style="background:#fff" >
<div class="content" style="width:100%;padding-right:0px;padding-left:0px"><br><br>
<?php
$users = $_SESSION['user'];
$kim=mysqli_query($mysqli, "SELECT * FROM transaksi INNER JOIN car ON transaksi.kapasitas=car.id_mobil where transaksi.id_users='$users' ORDER BY id_trans DESC");
while($bow=mysqli_fetch_array($kim)){
if($bow['aktif']=='no')
      { ?>
<table width="100%" style="padding:5px;font-family:verdana;margin-top:5px;background-color:#f5f5f5;font-size:10px;-webkit-box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14), 0 3px 1px -2px rgba(0,0,0,0.12), 0 1px 5px 0 rgba(0,0,0,0.2);
    box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14), 0 3px 1px -2px rgba(0,0,0,0.12), 0 1px 5px 0 rgba(0,0,0,0.2);">
  <tr>
    <td width="50%">
	<table><tr><td><center style="font-weight:bold;font-size:12px;color:"><?php echo $bow['nama_mobil'];?></center></td><tr><td>
	<?php
 if($bow['gambarmobil']=='0')
      { ?>
<img src="icon/nopic.png" style="float:right;width:100%;top:0;"/>
<?php }
else{?>
<img src="fotobarang/<?php echo $bow['gambarmobil'];?>" style="float:right;width:100%;top:0;"/>
<?php } ?>
</td></tr></table>
</td>
<td width="50%" style="padding:10px;color:#444;font-size:13px">
<div style="width:100%;padding:5px;color:#fff;background:grey"><center>Sewa Selesai</center></div><br><table style="color:#444;font-size:10px">
<tr><td><div style="float:left"><img src="tahun.png"width="16px" style="vertical-align:middle"/> <?php echo $bow['tahun'];?></div></td><td><div style="float:left"><img src="orang.png"width="16px" style="vertical-align:middle"/> <?php echo $bow['kursi'];?></div></td></tr>
<tr><td><div style="float:left"><img src="paint.png"width="16px" style="vertical-align:middle"/> <?php echo $bow['warna'];?></div></td><td><div style="float:left"><img src="travel.png"width="16px" style="vertical-align:middle"/> <?php echo $bow['bagasi'];?></div></td></tr>
<tr><td><div style="float:left"><img src="gas.png"width="16px" style="vertical-align:middle"/> <?php echo $bow['jenisbahanbakar'];?></div></td><td><div style="float:left"><img src="transmisi.png"width="16px" style="vertical-align:middle"/> <?php echo $bow['tipetransmisi'];?></div></td></tr>

</table></td>
  </tr><tr style="color:#444;float:left"><td>
Biaya sewa <?php echo $bow['lama']; ?>:</td><td> USD  <?php
$jam = $bow['price'];
$biaya = number_format($jam,0,",",".");
echo $biaya;?></td></tr><tr style="color:#444;float:left"><td>
Biaya Fasilitas <?php echo $bow['sekolah']; ?>: </td><td>
<?php if($bow['sekolah']=='sopir')
      { ?>
USD  <?php
$jam = $bow['hargasopir'];
$biaya = number_format($jam,0,",",".");
echo $biaya;?></td></tr><tr style="color:#444;float:left"><td>
	  <?php } else{?> -
	  <?php } ?></td></tr><tr style="color:#444;float:left"><td>
Fee Admin : USD  <?php
$fee = $loki['bebanpenyewa'];
$jiraya = number_format($fee,0,",",".");
echo $jiraya;?></td></tr><tr style="color:#444;float:left"><td>
Total Price : USD  <?php
$jim = $bow['harga'];
$muk = number_format($jim,0,",",".");
echo $muk;?>
</td></tr><tr style="color:#444;float:left"><td>
Status pembayaran :</td><td> Lunas</td></tr>
  <tr style="border-top:1px solid #dedede">
    <td style="font-family:verdana;color:#444;float:left;margin-left:10px;padding:10px" width="50%">

</td>
    <td width="50%"><center style="padding:10px;"> 
	<a href="rate.php?id_sopir=<?php echo $bow['id_sopir']; ?>"><div style="font-weight:bold;font-decoration:none;width:100%;font-size:12px;height:auto;"class="ladda-button"data-color="green" >Berikan Rating</div></center></a>
	</td>
  </tr>
</table><br><br><?php }};?>
</div> </div>
<div id="loading"></div>
<script type="text/javascript">
        function showDiv() {
            div = document.getElementById('loading');
            div.style.display = "block";
        }
</script>
<script>function onReady(c){var b=window.setInterval(a,200);function a(){if(document.getElementsByTagName("body")[0]!==undefined){window.clearInterval(b);c.call(this)}}}function show(b,a){document.getElementById(b).style.display=a?"block":"none"}onReady(function(){show("cari",true);show("loading",false)});</script>
<script src="js/jret.js"></script>
<script src="js/mostrar_nav.js"></script>
</body>