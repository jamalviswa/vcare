<?php
$session_lifetime = 3600 * 24 * 860; // 2 days
session_set_cookie_params ($session_lifetime);
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
<?php
if(isset($_POST['tambah'])){
if (empty($_POST['lama'])) {
   ?>
<script>window.alert("Pilih tipe sewa!");window.history.back(-2);</script><?php
  return false;
}
$tanggal = $_POST['tanggal'];
$id_users = $_POST['id_users'];
$id_mitra = $_POST['id_mitra'];
$layanan = $_POST['layanan'];
$tipe = $_POST['tipe'];
$latfrom = $_POST['latfrom'];
$lngfrom = $_POST['lngfrom'];
$lat = $_POST['lat'];
$lng = $_POST['lng'];
$jarak = $_POST['jarak'];
$tarifdasar = $_POST['tarifdasar'];
$beritaacara = $_POST['beritaacara'];
$harga = $_POST['harga'];
$online = $_POST['online'];
$aktif = $_POST['aktif'];
$status_trans = $_POST['status_trans'];
$status_bayar = $_POST['status_bayar'];
$kode_trans = $_POST['kode_trans'];
$alamat = $_POST['alamat'];
$tujuan = $_POST['tujuan'];
$phone = $_POST['phone'];
$input = "SELECT id_users FROM transaksi WHERE id_users='$id_users' and status_trans='minta'";
$result = mysqli_query($mysqli, $input);
$count = mysqli_num_rows($result); // if email not found then register
if($count == 0){
	if(mysqli_query($mysqli, "INSERT INTO `transaksi` (`id_trans`, `tanggal`, `id_users`, `id_mitra`, `nama_voucher`, `kode_trans`, `lat`, `lng`, `timepicker1`, `harga`, `status_trans`, `aktif`, `phone`, `status_bayar`, `online`, `layanan`, `tipebayar`, `timestart`, `timeend`, `latfrom`, `lngfrom`, `tipe`, `jarak`, `tarifdasar`, `beritaacara`, `alamat`, `tujuan`) VALUES (NULL, '$tanggal', '$id_users', '0', '$nama_voucher', '$kode_trans', '$lat', '$lng', '$timepicker1', '$harga', 'minta', 'yes', '$phone', '$status_bayar', '$online', '$layanan', '$tipebayar', '$timestart', '$timeend', '$latfrom', '$lngfrom', '$tipe', '$jarak', '$tarifdasar', '$beritaacara', '$alamat', '$tujuan');"))
			{
			?>
<script>document.location.href="car.php#asrent";</script><?php
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
$id_mobil = $_GET['id_mobil'];
$view=mysqli_query($mysqli, "SELECT * FROM car where id_mobil='$id_mobil'");
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
<script src="jquery.ui.addresspicker.js">
</script>
<style>
.modalDialog {
    position: fixed;
    font-family: Arial, Helvetica, sans-serif;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    background: rgba(0, 0, 0, 0.8);
    z-index: 99999;
    opacity:0;
    -webkit-transition: opacity 400ms ease-in;
    -moz-transition: opacity 400ms ease-in;
    transition: opacity 400ms ease-in;
    pointer-events: none;
}
.modalDialog:target {
    opacity:1;
    pointer-events: auto;
    overflow: scroll;
}
.modalDialog > div {
    width: 90%;
    position: relative;
    margin: 10% auto;
    padding: 5px 20px 13px 20px;
    border-radius: 10px;
    background: #fff;
}
.close {
    background: #606061;
    color: #FFFFFF;
    line-height: 25px;
    position: absolute;
    right: -12px;
    text-align: center;
    top: -10px;
    width: 24px;
    text-decoration: none;
    font-weight: bold;
    -webkit-border-radius: 12px;
    -moz-border-radius: 12px;
    border-radius: 12px;
    -moz-box-shadow: 1px 1px 3px ;
    -webkit-box-shadow: 1px 1px 3px ;
    box-shadow: 1px 1px 3px ;
}
.close:hover {
    background: #00d9ff;
}
</style>
</head>
<script>$(function(){var a=$("#addresspicker").addresspicker({componentsFilter:"country:ID"})});</script><body onkeydown="javascript:if(window.event.keyCode==13)window.event.keyCode=9">
<body style="width:100%;background:#fff;padding:0;font-family:Segoe UI">
<div class="sodrops-top">
<span class="actions" style="float:left">
<ul>
<li><a href="home.php#home" onclick="javascript:showDiv();"><img src="icon/back.png"width="25px"/></i></a></li>
</ul>
</span>
<div style="margin-top:20px;font-size:18px;font-family:Segoe UI light"><center><b>Detail mobil</b></center>
</div>
</div>
<center>
<?php
 if($row['gambarmobil']=='0')
      { ?>
<img src="icon/nopic.png" style="width:100%;top:0;height:200px;"/>
<?php }
else{?>
<a style="color:#fff" ><img src="fotobarang/<?php echo $row['gambarmobil'];?>" style="width:100%;top:0;height:340px;"/>
</a><?php } ?></center>
<div style="margin-top:-42px;width:100%;color:#fff;position:absolute;">
<table width="100%" style="background-color:rgba(1, 102, 185, 0.76);">
<tr><td colspan="2" width="50%" style="background-color:#3a3b3c;padding:10px;"><center><?php echo $row['nama_mobil'];?><br>(<small><?php echo $row['jenismobil'];?></small>)</center></td>
<td colspan="2" width="50%" style="background-color:#3a3b3c;padding:10px;"><center>
<?php 
$id_sopir=$row['id_sopir'];
$query=mysqli_fetch_array(mysqli_query($mysqli, "select * from ratings where art_id='$id_sopir'"));
$total_votes=$query['total_votes'];
$total_points=$query['total_points'];
$ratings=$total_points/$total_votes;
if ($ratings==0){
echo 'Belum ada rating';
}else{
?>
<img style="width:80px" src="<?php echo ''.ceil($ratings); echo '.png'; ?>"/>
<?php } ?>
</center></td>
</tr>
<tr>
<td width="25%" style="background-color:#36a2cc;padding:10px;"><center>IDR <?php
$satujam = $row['harga1jam'];
$harga1jam = number_format($satujam,0,",",".");
echo $harga1jam;?><br>1 Jam</center></td>
<td width="25%" style="background-color:#36a2cc;padding:10px;"><center>IDR <?php
$enamjam = $row['harga6jam'];
$harga6jam = number_format($enamjam,0,",",".");
echo $harga6jam;?><br>6 Jam</center></td>
<td width="25%" style="background-color:#36a2cc;padding:10px;"><center>IDR <?php
$duabelas = $row['harga_12jam'];
$harga_24jam = number_format($duabelas,0,",",".");
echo $harga_24jam;?><br>12 Jam</center></td>
<td width="25%" style="background-color:#36a2cc;padding:10px;"><center>IDR <?php
$duaempat = $row['harga_24jam'];
$harga_24jam = number_format($duaempat,0,",",".");
echo $harga_24jam;?><br>24 Jam</center></td>
</tr>
</table>
</div>

<div style="color:#444;padding:20px">
<script>if(!navigator.geolocation){alert("Your phone does not support maps Location.")}navigator.geolocation.getCurrentPosition(success,error);function success(f){var g=f.coords.latitude;var e=f.coords.longitude;var h=f.coords.accuracy;document.getElementById("lat").value=g;document.getElementById("lng").value=e}function error(b){};
</script>
<form id="form"action="<?php echo $_SERVER['PHP_SELF']?>" method="post"><br><br><br>

<p><label>Spesifikasi</label><br><br>
<table width="100%" style="color:#444;font-size:12px">
<tr><td><div style="float:left"><img src="tahun.png"width="16px" style="vertical-align:middle"/> <?php echo $row['tahun'];?></div></td><td><div style="float:left"><img src="orang.png"width="16px" style="vertical-align:middle"/> <?php echo $row['kursi'];?></div></td></tr>
<tr><td><div style="float:left"><img src="paint.png"width="16px" style="vertical-align:middle"/> <?php echo $row['warna'];?></div></td><td><div style="float:left"><img src="travel.png"width="16px" style="vertical-align:middle"/> <?php echo $row['bagasi'];?></div></td></tr>
<tr><td><div style="float:left"><img src="gas.png"width="16px" style="vertical-align:middle"/> <?php echo $row['jenisbahanbakar'];?></div></td><td><div style="float:left"><img src="transmisi.png"width="16px" style="vertical-align:middle"/> <?php echo $row['tipetransmisi'];?></div></td></tr>
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
<td><div style="float:left">Entertainment</div><div style="float:right;margin-right:20px"><?php
 if($row['entertainment']=='yes')
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
<td><div style="float:left">Ban Cadangan</div><div style="float:right;margin-right:20px"><?php
 if($row['bancadangan']=='yes')
      { ?>
<img src="icon/check.png"width="16px" style="vertical-align:middle"/> 
<?php }
else{?>
<img src="no.png"width="16px" style="vertical-align:middle"/> 
<?php } ?></div></td>
</tr>

<tr>
<td><div style="float:left">Airbag</div><div style="float:right;margin-right:20px"><?php
 if($row['airbag']=='yes')
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
<p style="color:#565656"><label>Lengkapi Formulir Sewa</label><br>
<div id="input" style="font-size:12px">Nama Lengkap Anda:<br>
<input style="color:#444;padding:5px;
    vertical-align: middle;
    border-bottom: 1px solid grey;
    background-size: 20px;" placeholder="Isi Nama lengkap anda" type='text'name="nama_rumah"class='holo'value="<?php echo $rows['first_name']; ?>" aria-required="true" required="required"/>
<nav></nav></div><br><br>
<div id="input" style="font-size:12px">Nomor Handphone :<br>
<input style="color:#444;padding:5px;
    vertical-align: middle;
    border-bottom: 1px solid grey;
    background-size: 20px;" placeholder="Tuliskan Nomor Handphone" type='text'name="nomor"class='holo'value="<?php echo $rows['phone']; ?>" aria-required="true" required="required"/>
<nav></nav></div>
<br><br>
<select id="pilihan" name="pilihan" required=required>
<option value="<?php echo $row['pilihan']; ?>">-Pilih Lama sewa-</option>
<option name="pilihan"value="satu">1 Jam</option>
<option name="pilihan"value="enam">6 Jam</option>
<option name="pilihan"value="jam">12 Jam</option>
<option name="pilihan"value="hari">24 Jam</option>
<option name="pilihan"value="bulan">1 bulan</option>
</select></p><br><br><br><br><br>
</div>
<input name="id_users" type="hidden" value="<?php echo $_SESSION['user'];?>"/>
<input type="hidden"name="lat"id="lat"/>
<input type="hidden"name="lng"id="lng"/>
<input type="hidden"name="tanggal"value="<?php echo date('d-m-Y'); ?>"/>
<input type="hidden"name="status_trans"value="minta"/>
<input type="hidden"name="aktif"value="yes"/>
<input type="hidden"name="online"value="unread"/>
<input type="hidden"name="ktp"value="0"/>
<input type="hidden"name="person"value="0"/>
<input type="hidden"name="bed"value="0"/>
<input type="hidden"name="jatuhtempo"value="0"/>
<input type="hidden"name="waktulunas"value="-"/>
<input name="id_sopir" type="hidden"value="<?php echo $row['pemilikmobil'];?>"/>
<input name="kodeafiliasi" type="hidden"value="<?php echo $row['kodeafiliasi'];?>"/>
<input name="keterangan"type="hidden" value="-"/>
<input name="kapasitas"type="hidden" value="<?php echo $row['id_mobil'];?>"/>
<input type="hidden"name="jarak"value="car"/>
<input type="hidden"name="sekolah"value="0"/>
<input name="tujuan"type="hidden" value="0"/>
</p>
</div>

<table width="100%" style="width:100%;z-index:9999;bottom:0;position:fixed;background-color:#5cb55c;box-shadow: 0 2px 5px rgba(0,0,0,.26);"><tr>
<td style="font-size:12px;padding:20px;color:#fff"width="50%"><b style="font-size:11px;color:">Biaya Sewa</b>
<br>
<div id="satu" style="display:none"><p style="color:#fff;font-size:14px;">
USD  <?php 
$jam = $row['harga1jam'];
$harga1jam = number_format($jam,0,",",".");
echo $harga1jam;?><small> (per 1 jam)</small>
<br><a style="font-weight:bold;color:yellow"href="javascript:history.go(0)">Ubah</a>
</p>
<input type="hidden" name="price"type="text" value="<?php echo $row['harga1jam'];?>"/>
<input type="hidden" name="lama"type="text" value="1 Jam"/>
</div>
<div id="enam" style="display:none"><p style="color:#fff;font-size:14px;">
USD  <?php 
$jam = $row['harga6jam'];
$harga6jam = number_format($jam,0,",",".");
echo $harga6jam;?><small> (per 6 Jam)</small>
<br><a style="font-weight:bold;color:yellow"href="javascript:history.go(0)">Ubah</a>
</p>
<input type="hidden" name="price"type="text" value="<?php echo $row['harga6jam'];?>"/>
<input type="hidden" name="lama"type="text" value="6 Jam"/>
</div>
<div id="jam" style="display:none"><p style="color:#fff;font-size:14px;">
USD  <?php 
$jam = $row['harga_12jam'];
$harga_12jam = number_format($jam,0,",",".");
echo $harga_12jam;?><small> (per 12 jam)</small>
<br><a style="font-weight:bold;color:yellow"href="javascript:history.go(0)">Ubah</a>
</p>
<input type="hidden" name="price"type="text" value="<?php echo $row['harga_12jam'];?>"/>
<input type="hidden" name="lama"type="text" value="12 Jam"/>
</div>
<div id="hari" style="display:none"><p style="color:#fff;font-size:14px;">
USD  <?php 
$hari = $row['harga_24jam'];
$harga_24jam = number_format($hari,0,",",".");
echo $harga_24jam;?><small> (per 24 jam)</small>
<br><a style="font-weight:bold;color:yellow"href="javascript:history.go(0)">Ubah</a>
</p>
<input type="hidden" name="price"type="text" value="<?php echo $row['harga_24jam'];?>"/>
<input type="hidden" name="lama"type="text" value="24 Jam"/>
</div>
<div id="bulan" style="display:none"><p style="color:#fff;font-size:14px;">
USD  <?php 
$hari = $row['harga1bulan'];
$harga1bulan = number_format($hari,0,",",".");
echo $harga1bulan;?><small> (per 1 Bulan)</small>
<br><a style="font-weight:bold;color:yellow"href="javascript:history.go(0)">Ubah</a>
</p>
<input type="hidden" name="price"type="text" value="<?php echo $row['harga1bulan'];?>"/>
<input type="hidden" name="lama"type="text" value="1 bulan"/>
</div>
</td>
<td style="font-size:15px;padding:20px;color:#fff;"width="50%">
<center>
<button type="submit"name="tambah" style="color:#fff;background:none;border:none" onclick="javascript:showDiv();">next</button>
</div>
</form>
</div>
</td>
</tr>
</table>
<script>
$("#pilihan").change(function(){var a=$(this).val();if(a=="satu"){$("#satu").val("").show()}else{$("#pilihan").hide();$("#satu").remove()}});
$("#pilihan").change(function(){var a=$(this).val();if(a=="enam"){$("#enam").val("").show()}else{$("#pilihan").hide();$("#enam").remove()}});
$("#pilihan").change(function(){var a=$(this).val();if(a=="jam"){$("#jam").val("").show()}else{$("#pilihan").hide();$("#jam").remove()}});
$("#pilihan").change(function(){var a=$(this).val();if(a=="hari"){$("#hari").val("").show()}else{$("#pilihan").hide();$("#hari").remove()}});
$("#pilihan").change(function(){var a=$(this).val();if(a=="bulan"){$("#bulan").val("").show()}else{$("#pilihan").hide();$("#bulan").remove()}});</script>
<div id="loading" style="display:none">
</div>
<script type="text/javascript">
        function showDiv() {
            div = document.getElementById('loading');
            div.style.display = "block";
        }
</script>
</body>
<?php 	}
 ?>