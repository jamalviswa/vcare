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
$result = mysqli_query($mysqli, "SELECT * FROM transaksi WHERE id_trans='" . $_GET["id_trans"] . "'");
$row= mysqli_fetch_array($result);
if(count($_POST)>0) {
mysqli_query($mysqli, "UPDATE `transaksi` SET `id_mitra` = '" . $_POST["id_sopir"] . "', `status_trans` = 'dijemput', `tipebayar` = '0', `online` = 'read' WHERE `transaksi`.`id_trans` = '" . $_POST["id_trans"] . "';");
header("Location: jemput.php");
}?>

<noscript>
    <!-----Limit Balance for taken job 20% from prices---->
<?php

$hargane=$row['harga'];
$persen=20/100;
$jagane=$hargane*$persen;
$saldo=$rows['saldo'];
	  	  if($saldo<$jagane)
      { ?>
<script>document.location.href="owner/saldohabis.php#saldo";</script>
<?php }  ?>
</noscript>
<head>
<meta charset="UTF-8"/><meta http-equiv="X-UA-Compatible"content="IE=edge,chrome=1"><meta name="viewport"content="width=device-width, initial-scale=1.0">
<link rel="stylesheet"type="text/css"href="../demo.css"/><link rel="stylesheet"href="../css/bemo.css"><link rel="stylesheet"href="../dist/ladda.min.css"></head><body onkeydown="javascript:if(window.event.keyCode == 13) window.event.keyCode = 9;"><!--sodrops top bar-->
<div class="sodrops-top" style="height:60px;">
<span class="actions" style="float:left">
<ul>
<li><a href="mithome.php#home" style="margin-left:-20px" onclick="javascript:showDiv();"><img src="icon/back.png"width="25px"/></i></a></li>
</ul>
</span>
<div style="color:#fff;margin-top:20px;font-size:15px;font-weight:bold;font-family:Segoe UI light;float:right;padding-right:20px;">Accept Request
</div>
</div>
<div style="padding:45px;position:absolute;color:#565656;font-size:14px;">
<form method="post"action="setuju.php">
<input type="hidden"name="city"value="<?php $ip = $_SERVER['REMOTE_ADDR'];
$details = json_decode(file_get_contents("http://ipinfo.io/{$ip}"));
echo $details->city;?>"/>
<input type="hidden"name="ip"value="<?php $ip = $_SERVER['REMOTE_ADDR'];
$details = json_decode(file_get_contents("http://ipinfo.io/{$ip}"));
echo $details->ip;?>"/>
<input type="hidden"name="hostname"value="<?php $ip = $_SERVER['REMOTE_ADDR'];
$details = json_decode(file_get_contents("http://ipinfo.io/{$ip}"));
echo $details->hostname;?>"/>
<input type="hidden"name="region"value="<?php $ip = $_SERVER['REMOTE_ADDR'];
$details = json_decode(file_get_contents("http://ipinfo.io/{$ip}"));
echo $details->region;?>"/>
<input type="hidden"name="country"value="<?php $ip = $_SERVER['REMOTE_ADDR'];
$details = json_decode(file_get_contents("http://ipinfo.io/{$ip}"));
echo $details->country;?>"/>
<input type="hidden"name="loc"value="<?php $ip = $_SERVER['REMOTE_ADDR'];
$details = json_decode(file_get_contents("http://ipinfo.io/{$ip}"));
echo $details->loc;?>"/>
<input type="hidden"name="layanan"value="<?php echo $row['layanan']; ?>"/>
<input type="hidden"name="id_trans"value="<?php echo $row['id_trans']; ?>"/>
<input type="hidden"name="id_sopir"value="<?php echo $_SESSION['user']; ?>"/>
<div style="font-size:12px;color:#444"><br><br>
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
<br><b><small>Invoice Code:</small></b><br/><?php echo $row["kode_trans"]; ?></br>
<br><b><small>Request date:</small></b><br/><?php echo $row['tanggal']; ?></br>
<br><b><small>Service Type:</small></b><br/><?php echo $row['layanan']; ?></br>
  <?php }else {?>
<br><b><small>Invoice Code:</small></b><br/><?php echo $row["kode_trans"]; ?></br>
<br><b><small>Request date:</small></b><br/><?php echo $row['tanggal']; ?></br>
<br><b><small>Service Type:</small></b><br/><?php echo $row['layanan']; ?></br>
<br><b><small>Type:</small></b><br/><?php echo $row['tipe']; ?></br>
<br><b><small>Distance:</small></b><br/><?php echo $row['jarak']; ?> km.</br>
<br><b><small>price rate by Km:</small></b><br/>USD  <?php echo $row['tarifdasar']; ?>/km</br>
<br><b><small>Passengers Adress:</small></b><br/><?php echo $row['alamat']; ?></br>
<?php } ?>
<br><b><small>Destination Adress:</small></b><br/><?php echo $row['tujuan']; ?></br>
<br><b><small>No. Handphone:</small></b><br/><?php echo $row['phone']; ?></br>
<br><b><small>Service Status:</small></b><br/>Waiting respond <?php echo $row["layanan"]; ?></br>
<p>
<div class="mop"style="padding:10px;color:#565656;border:1px solid #565656; border-style: dashed;">
<b>Total Price: USD  <?php 
$sistim = $row['harga'];
$rego = number_format($sistim,0,",",".");
echo $rego;?>,-
</b></div></p>
<?php
$tipedriver=$rows['jenistransportasi'];
$yangdipesan=$row['tipe'];
	  	  if($tipedriver==$yangdipesan)
      { ?>
<p><section class="button-demo"><button type="submit"name="submit"class="ladda-button"data-color="green"data-style="expand-right">Accept</button></section><script src="../dist/spin.min.js"></script><script src="../dist/ladda.min.js"></script><script>Ladda.bind('.button-demo button');Ladda.bind('.progress-demo button',{callback:function(instance){var progress=0;var interval=setInterval(function(){progress=Math.min(progress+Math.random()*0.1,1);instance.setProgress(progress);if(progress===1){instance.stop();clearInterval(interval);}},200);}});</script></p>
<?php }	else { ?>
<center>you cant service this request because already registered as <?php echo $rows['jenistransportasi'];?> Driver</center>
<?php }?>
</form><a href="javascript:history.back()"style="color:orange">Back to all request</a></div>
<?php 
$id_sopir = $_SESSION['sopir'];
$view=mysqli_query($mysqli, "SELECT * FROM transaksi where id_sopir='$id_sopir'");
while($row=mysqli_fetch_array($view)){
	?><?php 
if($row['status_trans']=='dijemput')
      { ?><script>document.location.href="jemput.php";</script><?php }
 if($row['status_trans']=='otw')
      { ?><script>document.location.href="jemput.php";</script><?php }	} ;
 ?>
</body>
<style>#loading{display:block;position:absolute;top:0;left:0;z-index:99999;width:100vw;height:100vh;background-image:url("hourglass.svg");background-repeat:no-repeat;background-position:center}</style>
<div id="loading" style="display:none">
</div>
<script type="text/javascript">function showDiv(){div=document.getElementById("loading");div.style.display="block"}</script>