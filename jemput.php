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

<link rel="stylesheet" href="css/bemo.css">
<link rel="stylesheet" href="dist/ladda.min.css">
<body style="font-family:Segoe UI;padding:20px;"><br>
<meta http-equiv="refresh" content="60">
<?php
$id_mitra = $_SESSION['user'];
$view=mysqli_query($mysqli, "SELECT * FROM transaksi where id_mitra='$id_mitra' and status_trans='dijemput'");
while($row=mysqli_fetch_array($view)){
	?>
<?php 
if(count($_POST)>0) {
mysqli_query($mysqli, "UPDATE transaksi set status_trans='otw' WHERE id_trans='" . $_POST["id_trans"] . "'");
header("Location: jemput.php");
}
?>
<?php
include('dbconnect.php');
?>		
<script type="text/javascript" src="autosave5/jquery-1.6.1.js"></script>		
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
	<input type="hidden" id="id" name="id" value="<?php echo $rows['id'];?>" />
		<input type="hidden" id="lat" type="float" name="lat"/>
		<input type="hidden" id="lng" type="float" name="lng"/>
	</form>

<br><center><small><b style="color:green">Accept job <?php echo $row["layanan"]; ?></b></small></center>
<?php 
 if($row['layanan']=='buy')
      { 
$tipe=$row['tipe']; 
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
$id_users=$row['id_users'];
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
$bamba = $row['harga'];
$botal = number_format($bamba,0,",",".");
echo $botal;?></small></b></div><br><br>
<br><b><small>Invoice:</small></b><br/><?php echo $row["kode_trans"]; ?></br>
<br><b><small>Request date:</small></b><br/><?php echo $row['tanggal']; ?></br>
<br><b><small>Service Type:</small></b><br/><?php echo $row['layanan']; ?></br>
  <?php }else {?>
<br><b><small>Invoice:</small></b><br/><?php echo $row["kode_trans"]; ?></br>
<br><b><small>Request date:</small></b><br/><?php echo $row['tanggal']; ?></br>
<br><b><small>Service Type:</small></b><br/><?php echo $row['layanan']; ?></br>
<br><b><small>Type:</small></b><br/><?php echo $row['tipe']; ?></br>
<br><b><small>distance:</small></b><br/><?php echo $row['jarak']; ?> km.</br>
<br><b><small>price rate:</small></b><br/>USD  <?php echo $row['tarifdasar']; ?>/km</br>
<br><b><small>Passengers Adress:</small></b><br/><?php echo $row['alamat']; ?></br>
<?php } ?>
<br><b><small>Destination Adress:</small></b><br/><?php echo $row['tujuan']; ?></br>
<br><b><small>No. Handphone:</small></b><br/><?php echo $row['phone']; ?></br>
<br><b><small>Service Status:</small></b><br/>Waiting for payment</br>
<p>

<div class="mop"style="padding:10px;color:#565656;border:1px solid #565656; border-style: dashed;">
<b><small>Total Price: USD  <?php $rego=$row['harga']; $sakan3 = number_format($rego,0,",","."); echo $sakan3; ?></small>
</b></div>
<label style="color:grey">client location <?php echo $row['nama_rumah'];?> :
</label><iframe width="100%"height="250"frameborder="0"scrolling="yes"marginheight="0"marginwidth="0"src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=<?php echo $row['latfrom']?>,<?php echo $row['lngfrom']?> (custom heading)&amp;output=embed"></iframe></p>


<small><label style="color:grey"><br>
<br>Driver, <br>please wait your client completing payment <b>
<br>
<?php }?>
<?php 
$id_mitra = $_SESSION['user'];
$jim=mysqli_query($mysqli, "SELECT * FROM transaksi where id_mitra='$id_mitra' and status_trans='otw'");
while($jow=mysqli_fetch_array($jim)){
$id_users=$jow['id_users'];
$tol=mysqli_query($mysqli, "SELECT * FROM users where id='$id_users'");
$kon=mysqli_fetch_array($tol);
$pos=mysqli_query($mysqli, "SELECT * FROM users where id='$id_mitra'");
$kos=mysqli_fetch_array($pos);
	?><br><center><small><b style="color:green">Accept job <?php echo $jow["layanan"]; ?></b></small></center>
<p>
<label style="color:#444">Client address (<?php echo $kon['first_name'];?>) :<br>
<?php echo $jow['alamat']; ?>
</label><br><br>
<small>client adress</small>
<iframe style="z-index:9999"width="100%" height="400" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/directions?origin=<?php echo $kos['lat']?>,<?php echo $kos['lng']?>&amp;destination=<?php echo $jow['latfrom']?>,<?php echo $jow['lngfrom']?>&amp;key=AIzaSyAO4lbxY6SKygcJxTuzu-Qi7kAAP9SdAwM" allowfullscreen="no"></iframe>
<br>
<script type="text/javascript"src="//maps.google.com/maps/api/js?sensor=true"></script>
<script>if(!navigator.geolocation){alert("Your phone does not support maps Location.")}navigator.geolocation.getCurrentPosition(success,error);function success(f){var g=f.coords.latitude;var e=f.coords.longitude;var h=f.coords.accuracy;document.getElementById("lat").value=g;document.getElementById("lng").value=e}function error(b){};
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
<button style="border-radius:10px;border:0;background:green;color:#fff;" type="submit" name="kirim" /><center>Refresh location</center></button><br>
    </form>
</p>
<?php 
 if($jow['layanan']=='buy')
      { 
$tipe=$jow['tipe']; 
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
$id_users=$jow['id_users'];
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
$bamba = $jow['harga'];
$botal = number_format($bamba,0,",",".");
echo $botal;?></small></b></div><br><br>
<br><b><small>Invoice:</small></b><br/><?php echo $jow["kode_trans"]; ?></br>
<br><b><small>Request date:</small></b><br/><?php echo $jow['tanggal']; ?></br>
<br><b><small>Service Type:</small></b><br/><?php echo $jow['layanan']; ?></br>
  <?php }else {?>
<br><b><small>Invoice:</small></b><br/><?php echo $jow["kode_trans"]; ?></br>
<br><b><small>Request date:</small></b><br/><?php echo $jow['tanggal']; ?></br>
<br><b><small>Service Type:</small></b><br/><?php echo $jow['layanan']; ?></br>
<br><b><small>Type:</small></b><br/><?php echo $jow['tipe']; ?></br>
<br><b><small>Distance:</small></b><br/><?php echo $jow['jarak']; ?> km.</br>
<br><b><small>Price rate:</small></b><br/>USD  <?php echo $jow['tarifdasar']; ?>/km</br>
<br><b><small>Passengers Adress:</small></b><br/><?php echo $jow['alamat']; ?></br>
<?php } ?>
<br><b><small>Destination Adress:</small></b><br/><?php echo $jow['tujuan']; ?></br>
<br><b><small>No. Handphone:</small></b><br/><?php echo $jow['phone']; ?></br>
<br style="font-size:12px;color:#565656"><b><small>Payment method:</small></b><br/>
<?php
$cash=$jow['tipebayar'];
if ($cash=='cash') { ?>
<small>The user chooses Pay with Cash, you can request payment to the user according to the bill. <br>the driver's balance will increase according to the user's service nominal, deducted 20% for barisandata Management fee<br>Please do not request additional charge money from the user</small>
<?php } 
if ($cash=='saldo') {?>
<small>The user chooses payment by balance, after serving the request, the driver's balance will increase according to the user's service nominal, deducted 20% for barisandata Management fee<br>Please do not request additional charge money from the user</small>
<?php } 
if ($cash=='transfer') {?>
<small>The user chooses payment by transfer, after serving the request, the driver's balance will increase according to the user's service nominal, deducted 20% for barisandata Management fee<br>Please do not request additional charge money from the user</small>
<?php  } ?><br>
<div class="mop"style="padding:10px;color:#565656;border:1px solid #565656; border-style: dashed;">
<b><small>Total Price: USD  <?php $rego=$jow['harga']; $sakan3 = number_format($rego,0,",","."); echo $sakan3; ?> </small>
</b></div>
<?php 
$id_users=$jow['id_users'];
$bensult = mysqli_query($mysqli, "SELECT * FROM users WHERE id='$id_users'");
$yup= mysqli_fetch_array($bensult);
?>
<table width="100%" style="background: #fbfb41;padding: 10px;"><tr><td style="font-size:11px;color:#444;font-weight:bold"width="80%">
Call Passengers: <?php echo $kon['first_name'];?>: <br>
<?php echo $jow['alamat']; ?>, <?php echo $kon['phone']; ?>.<br>
</td><td width="20%">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<a href="https://profitgm.com/calluser.php?id_users=<?php echo $jow['id_users']; ?>" target="_blank"><center><i style="font-size:60px;color:green" class="fa fa-phone-square" aria-hidden="true"></i></a>
</td></tr></table>
<br>ready to pickup your client <br>
<br>Click start service when you start driving to destination address to drop off passengers
<center>
<p><a href="finish.php?id_trans=<?php echo $jow['id_trans'] ?>">
<button class="ladda-button" data-color="blue" data-style="expand-right"><small>Start Service</small></button>
</a></p>
<br>
<a href="panic.php?id_trans=<?php echo $jow['id_trans'] ?>">
<button class="ladda-button" data-color="red" data-style="expand-right"><small>Police Button</small></button>
</a>
</center>
<?php }?>
<br></body>