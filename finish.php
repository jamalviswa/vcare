<?php
session_start();
include_once 'dbconnect.php';

if(!isset($_SESSION['user']))
{
	header("Location: mithome.php#home");
}
$res=mysqli_query($mysqli, "SELECT * FROM users WHERE id=".$_SESSION['user']);
$rows=mysqli_fetch_array($res);
?>
<?php 

$result = mysqli_query($mysqli, "SELECT * FROM transaksi WHERE id_mitra='" . $_SESSION['user'] . "' and status_trans='otw'");
$row= mysqli_fetch_array($result);
if(count($_POST)>0) {
mysqli_query($mysqli, "UPDATE transaksi set status_trans='finish', aktif='no' WHERE id_trans='" . $_POST["id_trans"] . "'");

$cash=$_POST['tipebayar'];
$id_mitra=$_POST['id_mitra'];
$harga=$_POST['harga'];
$id_users=$_POST['id_users'];

$pesul = mysqli_query($mysqli, "SELECT * FROM users WHERE id='$id_mitra'");
$pow= mysqli_fetch_array($pesul);

if ($cash=='cash') {
$harga=$_POST['harga'];
$persen=20/100;
$potongan=$harga*$persen;
$point=$pow['saldo'];
$cashpoint=$point-$potongan;
mysqli_query($mysqli, "update users set saldo='$cashpoint' where id='$id_mitra'");

} 
if ($cash=='saldo') {
$harga=$_POST['harga'];
$persen=20/100;
$potongan=$harga*$persen;
$point=$pow['saldo'];
$jadian=$harga-$potongan;
$saldopoint=$point+$jadian;
mysqli_query($mysqli, "update users set saldo='$saldopoint' where id='$id_mitra'");
	
 } 
header("Location: mithome.php#home");
}
?>
<?php
include('dbconnect.php');
?>		
<script type="text/javascript" src="../autosave5/jquery-1.6.1.js"></script>		
	<script type="text/javascript">
	$(document).ready(function(){	
	
		autosave();
	});
	
	function autosave()
	{
		
		var t = setTimeout("autosave()", );
		$('#timestamp').show(50).delay();	
		var id = $("#id").val();
		var lat = $("#lat").val();
		var lng = $("#lng").val();
		
		if (lat.length > 0 || lng.length > 0)
		{
			$.ajax(
			{
				type: "POST",
				url: "autosave.php",
				data: "&id=" + id + "&lat=" + lat + "&lng=" + lng,
				cache: false,
				success: function(message)
				{	
					$('#timestamp').hide(50).delay();
					$("#timestamp").empty().append(message);
				}
			});
		}
	} 
	</script>	
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script>if(!navigator.geolocation){alert("Your phone does not support maps Location.")}navigator.geolocation.getCurrentPosition(success,error);function success(f){var g=f.coords.latitude;var e=f.coords.longitude;var h=f.coords.accuracy;document.getElementById("lat").value=g;document.getElementById("lng").value=e}function error(b){};
</script>
	<form  id="article_form" method="post" action="autosave.php">

	<input type="hidden" id="id" name="id" value="<?php echo $rows['id_mitra'];?>" />
		<input type="hidden" id="lat" type="float" name="lat"/>
		<input type="hidden" id="lng" type="float" name="lng"/>
	</form>
	
<head><meta charset="UTF-8"/>
<meta http-equiv="X-UA-Compatible"content="IE=edge,chrome=1"><meta name="viewport"content="width=device-width, initial-scale=1.0">
<link rel="stylesheet"type="text/css"href="../demo.css"/>
<link rel="stylesheet" href="../css/bemo.css">
<link rel="stylesheet" href="../dist/ladda.min.css"></head>
<body><div class="sodrops-top" style="z-index:9999">
<span class="actions"><ul><li><a href="javascript:history.go(0)">
<img src="icon/refresh.png"width="25px"/></a></li>
<li><a href="panic.php?id_trans=<?php echo $row["id_trans"]; ?>">
<img src="icon/warning.png"width="25px"/></a></li>
</ul></span><div style="margin-left:20px;margin-top:13px;font-size:18px;font-weight:bold;color:#fff;">Start Services</div></div><div style="padding:45px;z-index:999;position:absolute;color:#565656;font-size:14px"><br><br>
<p>
<?php
$id_mitra=$row['id_mitra'];
$id_users=$row['id_users'];
$tol=mysqli_query($mysqli, "SELECT * FROM users where id='$id_users'");
$kon=mysqli_fetch_array($tol);
$pos=mysqli_query($mysqli, "SELECT * FROM users where id='$id_mitra'");
$kos=mysqli_fetch_array($pos);
?>
<label style="color:#444">Destination (adress <?php echo $kon['first_name'];?>) :<br>
<?php echo $row['tujuan']; ?>
</label><br><br>
<small>This is a Passengers destination Adress from pickup location. <br>Click refresh to reload position, or more option for show Gmaps</small>
<iframe style="z-index:9999"width="100%" height="400" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/directions?origin=<?php echo $row['latfrom']?>,<?php echo $row['lngfrom']?>&amp;destination=<?php echo $row['lat']?>,<?php echo $row['lng']?>&amp;key=AIzaSyAO4lbxY6SKygcJxTuzu-Qi7kAAP9SdAwM" allowfullscreen="no"></iframe>
<br>
<script type="text/javascript"src="//maps.google.com/maps/api/js?sensor=true"></script>
<script>if(!navigator.geolocation){alert("Your phone does not support maps Location.")}navigator.geolocation.getCurrentPosition(success,error);function success(f){var g=f.coords.latitude;var e=f.coords.longitude;var h=f.coords.accuracy;document.getElementById("lat").value=g;document.getElementById("lng").value=e}function error(b){alert("Please Enable GPS!!!")};
</script>
<form id="form"action="mape.php" enctype="multipart/form-data"  method="post" name="postform">
<?php
$id_mitra = $_SESSION['user'];
$query=mysqli_fetch_array(mysqli_query($mysqli, "select * FROM users where id='$id_mitra'"));
$id_mitra=$query['id'];
	?>
<input type="hidden"name="lat"id="lat"/>
<input type="hidden"name="lng"id="lng"/>
<input type="hidden" name="id_mitra" value="<?php echo $id_mitra;?>"/>
<button style="border-radius:10px;border:0;background:green;color:#fff;" type="submit" name="kirim" /><center>Refresh</center></button><br>
    </form>
</p>
<p>
<br><center><small><b style="color:green">Start Service <?php echo $row["layanan"]; ?> <?php echo $row["tipe"]; ?></b></small></center>
<br style="font-size:12px;color:#565656"><b><small>Invoice :</small></b><br/><?php echo $row["kode_trans"]; ?>
<br style="font-size:12px;color:#565656"><b><small>Request date :</small></b><br/><?php echo $row['tanggal']; ?>
<br style="font-size:12px;color:#565656"><b><small>Description :</small></b><br/><?php echo $row['alamat']; ?> to <?php echo $row['tujuan']; ?><br><br>
<?php
$cash=$row['tipebayar'];
if ($cash=='saldo') { ?>
<small>The user chooses payment by balance, after serving the request, the driver's balance will increase according to the user's service nominal, deducted 20% for barisandata Management fee<br>Please do not request additional charge money from the user</small>
<?php } 
if ($cash=='cash') {?>
<small>The user chooses Pay with Cash, you can request payment to the user according to the bill. <br>the driver's balance will increase according to the user's service nominal, deducted 20% for barisandata Management fee<br>Please do not request additional charge money from the user</small>
<?php  } ?><br>
<?php
$timeend=$row['timeend'];
if ($timeend=='0') { ?>
<?php 
$satuan=$row['satuanlayanan'];
if ($satuan=='hari') { ?>

<?php
date_default_timezone_set("Asia/Bangkok");
$startTime = date("Y-m-d H:i:s");
$startHour = date("H:i:s");
$pike = date("Y-m-d H:i:s");
$timestamp = strtotime($pike);
$timestamp_one_hour_later = $timestamp + 86400; // 3600 sec. = 1 day

$cenvertedTime = date('Y-m-d H:i:s',strftime($timestamp_one_hour_later));
?>
</p>
<center> <br><br>Time<br>
<h1><?php echo $startHour;?></h1></center>
<br><br>
Driver,<br> finish button will show when service is done.
Click finish when done.<br>Then your client give ratings for your service</center>
<form id="form"action="jame.php" enctype="multipart/form-data"  method="post" name="postform">
<input type="hidden"name="timestart"id="timestart" value="<?php echo $startTime;?>">
<input type="hidden"name="timeend"id="timeend" value="<?php echo $cenvertedTime;?>">
<input type="hidden" name="id_trans" value="<?php echo $row['id_trans'];?>"/>

<input type="hidden" name="kode_trans" value="<?php echo $row['kode_trans']; ?>"/>
<input type="hidden" name="tipebayar" value="<?php echo $row['tipebayar']; ?>"/>
<input type="hidden" name="id_mitra" value="<?php echo $row['id_mitra']; ?>"/>
<input type="hidden" name="harga" value="<?php echo $row['harga']; ?>"/>
<input type="hidden" name="id_users" value="<?php echo $row['id_users']; ?>"/>
<button style="border-radius:10px;border:0;background:green;color:#fff;" type="submit" name="kirim" /><center>Start service</center></button><br>
    </form>
<?php } else { ?>

<?php
date_default_timezone_set("Asia/Bangkok");
$startTime = date("Y-m-d H:i:s");
$startHour = date("H:i:s");
$pike = date("Y-m-d H:i:s");
$timestamp = strtotime($pike);
$timestamp_one_hour_later = $timestamp + 3600; // 3600 sec. = 1 hour

$cenvertedTime = date('Y-m-d H:i:s',strftime($timestamp_one_hour_later));
?>
</p>
<center> <br><br>Time<br>
<h1><?php echo $startHour;?></h1></center>
<br><br>
Driver,<br> finish button will show when service is done.
Click finish when done.<br>Then your client give ratings for your service</center>
<form id="form"action="jame.php" enctype="multipart/form-data"  method="post" name="postform">
<input type="hidden"name="timestart"id="timestart" value="<?php echo $startTime;?>">
<input type="hidden"name="timeend"id="timeend" value="<?php echo $cenvertedTime;?>">
<input type="hidden" name="id_trans" value="<?php echo $row['id_trans'];?>"/>
<button style="border-radius:10px;border:0;background:green;color:#fff;" type="submit" name="kirim" /><center>Start</center></button><br>
    </form>

<?php } ?>

<?php } else { ?>
<?php
$now = date("Y-m-dH:i:s");
$timeend=$row['timeend'];
if ($now>=$timeend) { ?>
<form name="frmUser"method="post"action="<?php echo $_SERVER['PHP_SELF']?>">
<input type="hidden"name="id_trans"value="<?php echo $row['id_trans']; ?>"/><br>

<input type="hidden" name="kode_trans" value="<?php echo $row['kode_trans']; ?>"/>
<input type="hidden" name="tipebayar" value="<?php echo $row['tipebayar']; ?>"/>
<input type="hidden" name="id_mitra" value="<?php echo $_SESSION['user']; ?>"/>
<input type="hidden" name="harga" value="<?php echo $row['harga']; ?>"/>
<input type="hidden" name="id_users" value="<?php echo $row['id_users']; ?>"/>

<?php 
$cash=$row['tipebayar'];
if ($cash=='transfer') {

$juler = "SELECT COUNT(*) AS total FROM transaksi where id_mitra='" . $_SESSION['user'] . "' and status_trans='finish'"; 
$ssss = mysqli_query($mysqli, $juler); 
$jalume = mysqli_fetch_assoc($ssss); 
$bumped = $jalume['total']; 
if ($bumped=='0') {?>
<p style="color:#444"><center>No charge because you first service in here </center></p>
<?php

} else {
?>
<p style="color:#444"><center>Your Balance will charge 20%</center></p>
<?php

}
 } 
?>
<p><section class="button-demo"><button type="submit"name="submit"class="ladda-button" data-color="green" data-style="expand-right">Finish</button></section><script src="../dist/spin.min.js"></script>
<script src="../dist/ladda.min.js"></script>
<script>Ladda.bind(".button-demo button");Ladda.bind(".progress-demo button",{callback:function(a){var c=0;var b=setInterval(function(){c=Math.min(c+Math.random()*0.1,1);a.setProgress(c);if(c===1){a.stop();clearInterval(b)}},200)}});</script></p>
</form>
<?php } else { ?>
<center>
<small>Start</small><br>
<?php echo $row['timestart']; ?><br>
<br><small>Finish</small><br>
<?php echo $row['timeend']; ?>
<br>
</center>
</small>
<?php } ?>

<?php } ?>
<br><a href="jemput.php"style="color:orange">back</a>
</div>
</div>
</body>