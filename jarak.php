<?php
session_start();
include_once 'dbconnect.php';
if(!isset($_SESSION['user']))
{
	header("Location: firli.php#login");
}
$res=mysqli_query($mysqli, "SELECT * FROM users WHERE id=".$_SESSION['user']);
$rows=mysqli_fetch_array($res);
?>

<head>
<meta charset="UTF-8"/>
<meta http-equiv="X-UA-Compatible"content="IE=edge,chrome=1">
<meta name="viewport"content="width=device-width, initial-scale=1.0">
<link rel="stylesheet"href="themes/base/jquery.ui.all.css">
<link href="css/timepicki.css"rel="stylesheet">
<script src="jquery.ui.addresspicker.js"></script>
<script src="js/jquery.min.js"></script>
<script src="js/jquery-ui.min.js"></script>
<link rel="stylesheet"type="text/css"href="demo.css"/>
<style type="text/css">ul{padding:0;list-style:none}ul li{display:inline-block;position:relative;line-height:21px;text-align:left}ul li a{display:block;padding:8px 25px;color:#444;text-decoration:none}ul li a:hover{color:#red}ul li ul.dropdown{min-width:100%;background-color:#FFF;display:none;position:absolute;z-index:999;left:-50px;top:35px;border:1px solid grey}ul li:hover ul.dropdown{display:block}ul li ul.dropdown li{display:block}#loading{display:block;position:absolute;top:0;left:0;z-index:99999;width:100vw;height:100vh;background-image:url("hourglass.svg");background-repeat:no-repeat;background-position:center}</style>
<link rel="stylesheet"href="css/bemo.css">
<link rel="stylesheet"href="dist/ladda.min.css">
</head>
<?php
if(isset($_POST['tambah'])){
	if (empty($_POST['lat'])) {
   ?>
<script>window.alert("Anda belum menentukan kordinat sesuai lokasi tujuan anda!");window.history.back(-3);</script><?php
  return false;
}if (empty($_POST['harga'])) {
   ?>
<script>window.alert("Error... Tujuan anda terlalu jauh bagi driver kami");window.history.back(-3);</script><?php
  return false;
}
if (empty($_POST['phone'])) {
   ?>
<script>window.alert("Lengkapi nomor ponsel pada profile anda, karena untuk dihubungi");window.history.back(-3);</script><?php
  return false;
}
$tanggal = $_POST['tanggal'];
$id_users = $_POST['id_users'];
$id_mitra = $_POST['id_mitra'];
$layanan = $_POST['layanan'];
$tipe = $_POST['tipe'];
$latfrom = $_POST['lat'];
$lngfrom = $_POST['lng'];
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
$kode_trans = str_replace(' ', '', $_POST['kode_trans']);
$alamat = $_POST['alamat'];
$tujuan = $_POST['tujuan'];
$phone = $_POST['phone'];
$input = "SELECT id_users FROM transaksi WHERE id_users='$id_users' and status_trans='minta'";
$result = mysqli_query($mysqli, $input);
$count = mysqli_num_rows($result); // if email not found then register
if($count == 0){
mysqli_query($mysqli, "UPDATE keranjang set checkout='yes', kodebayar='$kode_trans' WHERE id_users='$id_users' and checkout='no' and idtrans='0' and aktif='yes'");
if(mysqli_query($mysqli, "INSERT INTO `transaksi` (`id_trans`, `tanggal`, `id_users`, `id_mitra`, `nama_voucher`, `kode_trans`, `lat`, `lng`, `timepicker1`, `harga`, `status_trans`, `aktif`, `phone`, `status_bayar`, `online`, `layanan`, `tipebayar`, `timestart`, `timeend`, `latfrom`, `lngfrom`, `tipe`, `jarak`, `tarifdasar`, `beritaacara`, `alamat`, `tujuan`) VALUES (NULL, '$tanggal', '$id_users', '0', '$nama_voucher', '$kode_trans', '$lat', '$lng', '$timepicker1', '$harga', 'minta', 'yes', '$phone', '$status_bayar', '$online', '$layanan', '$tipebayar', '$timestart', '$timeend', '$latfrom', '$lngfrom', '$tipe', '$jarak', '$tarifdasar', '$beritaacara', '$alamat', '$tujuan');"))
			{
			?>
<script>document.location.href="about.php#about";</script><?php
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
<div style="background-color:rgba(90,90,90,0.68);overflow:auto"id="jarak"class="panel">
<div style="top:20px;display:block;position:absolute;background-color:#FFF;height:auto;padding:20px;"class="content">
<?php
$kodepromo= $_POST['kodepromo'];
$menarif=mysqli_query($mysqli, "SELECT * FROM promo where kodepromo='$kodepromo'");
$vision=mysqli_fetch_array($menarif);
$nama_rumah	= $_POST['nama_rumah'];
$nomor= $_POST['nomor'];
$lat= $_POST['lat'];
$lng= $_POST['lng'];
$id_sopir= $_POST['id_sopir'];
$booking= $_POST['booking'];
$timepicker1= $_POST['timepicker1'];
$harga= $_POST['harga'];
$tujuan= $_POST['tujuan'];
$rincianalamat= $_POST['rincianalamat'];
$kodepos= $_POST['kodepos'];
$jatuhtempo= $_POST['jatuhtempo'];
$diskon= $vision['diskonpersen'];
$persenan=$diskon/100;
$nakalan=$persenan*$harga;
$potongan=$harga-$nakalan;
?>
<center><p style="color:#565656">Details orders</p></center>
<p style="font-size:12px;color:#565656">Your name:<br/><b><small><?php echo $nama_rumah;?></small></b></p>
<p style="font-size:12px;color:#565656">Phone:<br/><b><small><?php echo $nomor;?></small></b></p>
<p style="font-size:12px;color:#565656">Address:<br/><b><small><?php echo $tujuan;?><br><?php echo $rincianalamat; ?><br><?php echo $kodepos; ?></small></b></p>
<p style="font-size:12px;color:#565656">Promotional Code:<br/><b><small><?php echo $kodepromo;?></small></b></p>
<p style="font-size:12px;color:#565656">Total Orders: <br/><b><small>USD  <?php 
$jim = $harga;
$total = number_format($jim,0,",",".");
echo $total; ?></small></b></p>
<p style="font-size:12px;color:#565656">Total orders (after discount <?php echo $vision['diskonpersen']; ?>%): <br/><b><small>USD  <?php 
$lobi = $potongan;
$kokal = number_format($lobi,0,",",".");
echo $kokal; ?></small></b></p>
<form id="form"action="<?php echo $_SERVER['PHP_SELF']?>"method="post">
<input type="hidden" name="jarak"value="<?php echo $kodepromo; ?>"/>
<input type="hidden" name="tipe"value="food"/>
<input type="hidden" name="layanan"value="buy"/>
<input type="hidden" id="harga" name="harga" value="<?php echo $potongan; ?>"/>
<input type="hidden" id="tujuan" name="tujuan" value="<?php echo $tujuan; ?>, <?php echo $rincianalamat; ?>, <?php echo $kodepos; ?>"/>
<input type="hidden" name="tanggal"value="<?php echo date('Y-m-d h:i:s'); ?>"/>
<input type="hidden" id="nama_rumah" name="nama_rumah" value="Owner Name: <?php echo $nama_rumah; ?>"/>
<input type="hidden" id="phone" name="phone" value="<?php echo $nomor; ?>"/>
<input type="hidden"name="id_users" value="<?php echo $_SESSION['user'];?>"/>
<input type="hidden"name="status_trans"value="minta"/>
<input type="hidden"name="aktif"value="yes"/>
<input type="hidden"name="id_driver"value="0"/>
<input type="hidden"name="status_bayar"value="belum"/>
<input type="hidden"name="online"value="unread"/>
<input type="hidden"name="id_sopir"value="0"/>
<input type="hidden"name="lat"value="<?php echo $lat; ?>"/>
<input type="hidden"name="lng"value="<?php echo $lng; ?>"/>
<input type="hidden"name="timepicker1"value="<?php echo $timepicker1; ?>"/>
<?php
$bt=date('m');
$th=date('Y');
$uss=$_SESSION['user'];
?>
<input type="hidden" name="po"value="<?php echo $uss; ?>/<?php echo $bt; ?>/<?php echo $th; ?>"/>
<input type="hidden"name="kodepos"value="<?php echo $kodepos; ?>"/>
<input type="hidden"name="jatuhtempo"value="<?php echo $jatuhtempo; ?>"/>
<input type="hidden" name="id_trans"value="<?php echo(rand(10,100));?>"/>
<input type="hidden" name="kode_trans"value="<?php
function resi(){
$gpass=NULL;
$n = 10; // jumlah karakter yang akan di bentuk.
$chr = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
for($i=0;$i<$n;$i++){
$rIdx = rand(1,strlen($chr));
$gpass .=substr($chr,$rIdx,1);
}
return $gpass;
};
echo resi(); 
?>"/><br><br>
<section class="button-demo" style="padding:0px">
<button style="width:100%;font-size:12px;height:auto"type="submit"name="tambah"class="ladda-button"data-color="green"data-style="expand-right">Yes, Accept</button>
<br><br><br><br></section>
</form>
</div>
</div>
<script src="dist/spin.min.js"></script>
<script src="dist/ladda.min.js"></script>
<script>Ladda.bind(".button-demo button");Ladda.bind(".progress-demo button",{callback:function(e){var f=0;var d=setInterval(function(){f=Math.min(f+Math.random()*0.1,1);e.setProgress(f);if(f===1){e.stop();clearInterval(d)}},200)}});</script>
</div>
<div id="loading" style="display:none">
</div>