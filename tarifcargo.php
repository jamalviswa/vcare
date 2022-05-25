
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
<?php
if(isset($_POST['tambah'])){
	if (empty($_POST['lat'])) {
   ?>
<script>window.alert("Please choose destination!");window.history.back(-3);</script><?php
  return false;
}
if (empty($_POST['latfrom'])) {
   ?>
<script>window.alert("Please choose your location!");window.history.back(-3);</script><?php
  return false;
}if (empty($_POST['tipe'])) {
   ?>
<script>window.alert("Error... please select vehicle");window.history.back(-3);</script><?php
  return false;
}if (empty($_POST['harga'])) {
   ?>
<script>window.alert("Error... far from home");window.history.back(-3);</script><?php
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
<link rel="stylesheet" href="w3.css">
<script src="https://maps.google.com/maps/api/js?sensor=true"></script>
</head>
<body>
<div class="w3-container w3-center w3-animate-top">
<div class="sodrops-top" style="height:60px;">
<span class="actions" style="float:left">
<ul>
<li><a href="home.php" onclick="javascript:showDiv();"><img src="icon/back.png"width="25px"/></i></a></li>
</ul>
</span>
<div style="color:#fff;margin-top:20px;font-size:15px;font-weight:bold;font-family:Segoe UI light;float:right;padding-right:20px;">Delivery Routes
</div></div></div>
<div class="w3-container w3-center w3-animate-bottom">
<br><br><br><style>#map{height:400px;width:100%}.controls{margin-top:10px;border:1px solid transparent;border-radius:2px 0 0 2px;box-sizing:border-box;-moz-box-sizing:border-box;height:32px;outline:0;box-shadow:0 2px 6px rgba(0,0,0,0.3);left:0}#type-selector{color:#fff;background-color:#4d90fe;padding:5px 11px 0 11px}#type-selector label{font-family:Roboto;font-size:13px;font-weight:300}#target{width:345px}.cc-selector input{margin:0;padding:0;-webkit-appearance:none;-moz-appearance:none;appearance:none}.cc-selector-2 input{position:absolute;z-index:999}.visa{background-image:url(img/motor.png)}.mastercard{background-image:url(img/car.png)}.cc-selector-2 input:active+.drinkcard-cc,.cc-selector input:active+.drinkcard-cc{opacity:.9}.cc-selector-2 input:checked+.drinkcard-cc,.cc-selector input:checked+.drinkcard-cc{-webkit-filter:none;-moz-filter:none;filter:none}.drinkcard-cc{cursor:pointer;background-size:contain;background-repeat:no-repeat;display:inline-block;width:40;height:40px;-webkit-transition:all 100ms ease-in;-moz-transition:all 100ms ease-in;transition:all 100ms ease-in;-webkit-filter:brightness(1.8) grayscale(1) opacity(.7);-moz-filter:brightness(1.8) grayscale(1) opacity(.7);filter:brightness(1.8) grayscale(1) opacity(.7)}.drinkcard-cc:hover{-webkit-filter:brightness(1.2) grayscale(.5) opacity(.9);-moz-filter:brightness(1.2) grayscale(.5) opacity(.9);filter:brightness(1.2) grayscale(.5) opacity(.9)}a:visited{color:#888}a{color:#444;text-decoration:none}p{margin-bottom:.3em}</style>
<?php
if (empty($_POST['lat'])) {
   ?>
<style>.btn{background:#428bca;border:#357ebd solid 1px;border-radius:3px;color:#fff;display:inline-block;font-size:14px;padding:8px 15px;text-decoration:none;text-align:center;min-width:60px;position:relative;transition:color .1s ease}.btn:hover{background:#357ebd}.btn.btn-big{font-size:18px;padding:15px 20px;min-width:100px}.btn-close{color:#aaa;font-size:30px;text-decoration:none;position:absolute;right:5px;top:0}.btn-close:hover{color:#919191}.sendal:before{content:"";display:none;background:rgba(0,0,0,0.6);position:fixed;top:0;left:0;right:0;bottom:0;z-index:10}.sendal:target:before,.sendal.loaded:before{display:block}.sendal:target .sendal-dialog,.sendal.loaded .sendal-dialog{-webkit-transform:translate(0,0);-ms-transform:translate(0,0);transform:translate(0,0);top:0}.sendal-dialog{background:#fefefe;border:#333 solid 1px;border-radius:5px;margin-left:-200px;position:fixed;left:50%;top:-100%;z-index:11;-webkit-transform:translate(0,-500%);-ms-transform:translate(0,-500%);transform:translate(0,-500%);-webkit-transition:-webkit-transform .3s ease-out;-moz-transition:-moz-transform .3s ease-out;-o-transition:-o-transform .3s ease-out;transition:transform .3s ease-out}.sendal-body{padding:20px;color:#444}.sendal-header,.sendal-footer{padding:10px 20px}.sendal-header{border-bottom:#eee solid 1px}.sendal-header h2{font-size:20px}.sendal-footer{border-top:#eee solid 1px;text-align:right}</style>
<div class="sendal" id="sendal-one" aria-hidden="true">
<div class="sendal-dialog">
<div class="sendal-header">
<h4>Please following this step</h4>
<a href="javascript: history.go(-2)" class="btn-close" aria-hidden="true">×</a>
</div>
<div class="sendal-body">
<p style="color:#444">Drag marker on house front, not inside building!!</p>
<br><center>
<img src="dapan.gif" alt="this slowpoke moves"  width="250"/></center>
</div>
<div class="sendal-footer">
<a href="javascript: history.go(-2)" class="btn">Ok, Try again</a>
</div>
</div>
</div>
<script>$(document).ready(function(){$(".sendal").addClass("loaded");$(".btn-close, .btn").click(function(){$(".sendal").removeClass("loaded")})});</script>

<?php
  return false;
}else{
$lat= $_POST['lat'];
$lng= $_POST['lng'];
}
?>
<center style="color:#444"><small>Your Route</small>
</center><br>
<iframe style="z-index:9999"width="100%" height="400" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/directions?origin=<?php echo $_POST["asal"]; ?>&amp;destination=<?php echo $_POST['lat']?>,<?php echo $_POST['lng']?>&amp;key=AIzaSyAO4lbxY6SKygcJxTuzu-Qi7kAAP9SdAwM" allowfullscreen="no"></iframe>

<table width="100%" style="border:1px solid grey;padding:10px;background: #fbfb41;padding: 10px;">
<tr><th colspan="2"><small style="color: green"><center><?php echo $_POST["layanan"]; ?> <?php echo $_POST["tipe"]; ?></center></small></th></tr><tr>
<td style="border:1px solid grey;padding:10px;font-size:11px;color:#444;font-weight:bold" width="50%"><center>
<small>Distance : </small><br>
<small>Based on distance shortcut</small>
</center></td><td width="50%" style="border:1px solid grey;padding:10px;font-size:11px;color:#444;font-weight:bold"width="80%">
<center><?php
$menarif=mysqli_query($mysqli, "SELECT * FROM tarif where id_tarif='1'");
$vision=mysqli_fetch_array($menarif);
$latfrom= $_POST['latfrom'];
$lngfrom= $_POST['lngfrom'];
$lat= $_POST['lat'];
$lng= $_POST['lng'];
$urlApi = "https://dev.virtualearth.net/REST/v1/Routes/DistanceMatrix?origins=".$latfrom.",".$lngfrom."&destinations=".$lat.",".$lng."&travelMode=driving&key=Ap2D3Kzfhmdy7jATbLxY14xRhnKW25efAyj2dUjxyxD6IqZS9gHAoI8SZRLX1C63";
$result = file_get_contents($urlApi);
$data   = json_decode($result, true);

$eks = $data['resourceSets'][0]['resources'][0]['results'][0]['travelDistance'];

$tarif= $vision['paket'];
$fon=round($eks, 0)*$tarif;
$pembulatan=round($eks, 0);
$zonk=$pembulatan*$tarif;

echo $pembulatan;
?> Km<br>
</center></td></tr></table>
<form id="form"action="tarif.php" method="post">
<input type="hidden" name="id_users"type="text" value="<?php echo $_SESSION['user']?>"/>
<input type="hidden" name="tanggal"value="<?php echo date('Y-m-d h:i:s'); ?>"/>
<input type="hidden" name="asal"value="<?php echo $_POST["asal"]; ?>"/>
<input type="hidden" name="tipe"value="<?php echo $_POST["tipe"]; ?>"/>
<input type="hidden" name="layanan"value="<?php echo $_POST["layanan"]; ?>"/>
<input type="hidden" name="lat"value="<?php echo $_POST["lat"]; ?>"/>
<input type="hidden" name="lng"value="<?php echo $_POST["lng"]; ?>"/>
<input type="hidden" name="latfrom"value="<?php echo $_POST["latfrom"]; ?>"/>
<input type="hidden" name="lngfrom"value="<?php echo $_POST["lngfrom"]; ?>"/>
<input type="hidden" name="alamat"value="<?php echo $_POST["alamat"]; ?>"/>
<input type="hidden" name="tujuan"value="<?php echo $_POST["tujuan"]; ?>"/>
<input type="hidden" name="jarak"value="<?php echo $pembulatan; ?>"/>
<input type="hidden" name="tarifdasar"value="<?php echo $tarif; ?>"/>
<input type="hidden" name="online"value="unread"/>
<input type="hidden" name="status_trans"value="minta"/>
<input type="hidden" name="status_bayar"value="belum"/>
<input type="hidden" name="phone"value="<?php echo $rows['phone']?>"/>
<input type="hidden" name="kode_trans"value="<?php
function resi(){
$gpass=NULL;
$n = 8; // jumlah karakter yang akan di bentuk.
$chr = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
for($i=0;$i<$n;$i++){
$rIdx = rand(1,strlen($chr));
$gpass .=substr($chr,$rIdx,1);
}
return $gpass;
};
echo resi(); 
?>"/>
<input type="hidden" name="harga"value="<?php   
if($zonk < $tarif)
      {
echo $tarif;
      } 
if($zonk > $tarif)
      {
echo $zonk;
      }                      
    ;?>"/>
<br><br><br><br><br></div>
<table width="100%" style="width:100%;z-index:9999;bottom:0;position:fixed;background-color:#3aa4ff">
<tr>
<td style="font-size:11px;padding:20px;color:#fff"width="50%">
<center>Total Price :<br><br></small>
USD  <?php   
if($zonk < $tarif)
      {
$arip = number_format($tarif,0,",","."); echo $arip;
      } 
if($zonk > $tarif)
      {
$surip = number_format($zonk,0,",","."); echo $surip;
      }                        
    ;?>,-</center></td>
<td style="font-size:17px;padding:20px;color:#fff"width="50%">
<center>
<button type="submit"name="tambah" style="padding:10px;border:2px solid #fff;border-radius:10px;text-align:center;tfont-weight:bold;color:#fff;background:0" onclick="javascript:showDiv()"><small>Submit</small></button>
</center>
</form>
</td>
</tr>
</table>
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