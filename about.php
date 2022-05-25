<?php
session_start();
include_once 'dbconnect.php';
if(!isset($_SESSION['user']))
{
	header("Location: firli.php");
}
$res=mysqli_query($mysqli, "SELECT * FROM users WHERE id=".$_SESSION['user']);
$rows=mysqli_fetch_array($res);
?>
<head><meta charset="UTF-8"/>
<meta http-equiv="refresh" content="30"><meta http-equiv="X-UA-Compatible"content="IE=edge,chrome=1"><meta name="viewport"content="width=device-width, initial-scale=1.0"><link rel="stylesheet"type="text/css"href="demo.css"/>
<link rel="stylesheet" href="css/bemo.css">
<link rel="stylesheet" href="dist/ladda.min.css">
</head><body style="overflow:auto" onkeydown="javascript:if(window.event.keyCode==13)window.event.keyCode=9"><div class="sodrops-top"><span class="actions"><ul>
<li><a href="javascript:history.go(0)"><img src="icon/refresh.png"width="25px"/></a></li><li><a href="home.php#home"><img src="icon/home.png"width="25px"/></a></li>
</ul></span><div style="color:#fff;margin-left:20px;font-size:18px;font-weight:bold;margin-top:5;">
Invoice
</div></div><br>
<?php
$users = $_SESSION['user'];
$query = "SELECT COUNT(*) AS total FROM transaksi where id_users='$users'"; 
$result = mysqli_query($mysqli, $query); 
$values = mysqli_fetch_assoc($result); 
$num_rows = $values['total']; 
if($num_rows == '0')
      { ?>
  <div style="margin-top:35px;font-size:17px;padding:20px;color:"><br><br>
  <center>No request<br><br><img src="icon/logo.png" width="150px"/><br>We ready to service...<br><small>Choose our service when you need</small><br></center></div>
<br>
<section class="button-demo" style="padding:20;width:100%">
<a href="home.php#home" onclick="javascript:showDiv();"><button style="width:100%" class="ladda-button" data-color="blue" data-style="expand-right">
<small>Request Active</small></button></a></center>
</section>
<?php } ?>
<?php 
$id_users = $_SESSION['user'];
$view=mysqli_query($mysqli, "SELECT * FROM transaksi where id_users='$id_users'");
while($row=mysqli_fetch_array($view)){
$price= $row['price'];
	?>
		<?php
if($row['status_trans']=='otw')
      {?>
<script>document.location.href="otw.php";</script><?php }?>
	<?php 
 if($row['status_trans']=='dijemput')
      { ?>
<script>document.location.href="dijemput.php";</script>
<?php }; ?>
<?php }	 ;?>
<?php
$users = $_SESSION['user'];
$jim=mysqli_query($mysqli, "SELECT * FROM transaksi where id_users='$users'");
while($jow=mysqli_fetch_array($jim)){
if($jow['status_trans']=='minta')
      { ?>
<div style="color:#444;background-color:#fff;padding:20px;width:100%;overflow:auto"><br><br>
<br><center><b style="color:green">Service <?php echo $jow["layanan"]; ?></b></center>
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
  <?php }else {?>
<p style="font-size:12px;color:#565656"><b><small>Passengers Adress:</small></b><br/><?php echo $jow['alamat']; ?></p>
<?php } ?>
<p style="font-size:12px;color:#565656"><b><small>Code Invoice:</small></b><br/><?php echo $jow["kode_trans"]; ?></p>
<p style="font-size:12px;color:#565656"><b><small>Request date:</small></b><br/><?php echo $jow['tanggal']; ?></p>
<p style="font-size:12px;color:#565656"><b><small>Service Type:</small></b><br/><?php echo $jow['layanan']; ?></p>
<p style="font-size:12px;color:#565656"><b><small>Type:</small></b><br/><?php echo $jow['tipe']; ?></p>
<p style="font-size:12px;color:#565656"><b><small>Destination Adress:</small></b><br/><?php echo $jow['tujuan']; ?></p>
<p style="font-size:12px;color:#565656"><b><small>No. Handphone:</small></b><br/><?php echo $jow['phone']; ?></p>
<p style="font-size:12px;color:#565656"><b><small>Service Status:</small></b><br/>Waiting respond <?php echo $jow["layanan"]; ?></p>
<p>
<div class="mop"style="padding:10px;color:#565656;border:1px solid #565656; border-style: dashed;">
<b>Total Price: USD  <?php 
$layanan = $jow['harga'];
$harga = number_format($layanan,0,",",".");
echo $harga;?>
</b></div></p><br>
<center>
<a href="cancel.php?id_trans=<?php echo $jow['id_trans']; ?>" onClick="return confirm('are you sure to cancel?')">
<button style="width:100%;font-size:15px;height:auto;margin-top:0px;padding-bottom:20px;"class="ladda-button"data-color="red">Cancel</button>
</a>
</center><br>
<p style="font-size:10px;color:#444444"><label> Please wait<br>need our minutes, click refresh to check</label></p>
<br>
</div>
<?php }
if($jow['status_trans']=='ttd')
      { ?>
<script>document.location.href="home.php#ttd";</script>
	  <?php }};?>
</body>