<?php
session_start();
include_once 'dbconnect.php';
if(!isset($_SESSION['user']))
{
	header("Location: home.php#home");
}
$res=mysqli_query($mysqli, "SELECT * FROM users WHERE id=".$_SESSION['user']);
$rows=mysqli_fetch_array($res);
?>
<head><meta charset="UTF-8"/>
<meta http-equiv="refresh" content="30"><meta http-equiv="X-UA-Compatible"content="IE=edge,chrome=1"><meta name="viewport"content="width=device-width, initial-scale=1.0"><link rel="stylesheet"type="text/css"href="demo.css"/>
<link rel="stylesheet" href="css/bemo.css">
<link rel="stylesheet" href="dist/ladda.min.css">
</head><body onkeydown="javascript:if(window.event.keyCode==13)window.event.keyCode=9"><div class="sodrops-top"><span class="actions"><ul>
<li><a href="javascript:history.go(0)"><img src="icon/refresh.png"width="25px"/></a></li><li><a href="home.php#home"><img src="icon/home.png"width="25px"/></a></li>
</ul></span><div style="color:#fff;margin-left:20px;font-size:18px;font-weight:bold;margin-top:5;">
Invoice
</div></div><br>
<?php 
$id_users = $_SESSION['user'];
$view=mysqli_query($mysqli, "SELECT * FROM transaksi INNER JOIN users ON transaksi.id_mitra= users.id where transaksi.id_users='$id_users'");
while($row=mysqli_fetch_array($view)){
$price= $row['price'];
	?>
	<?php
if($row['status_trans']=='otw')
      {?>
<script>document.location.href="otw.php";</script><?php }?>
	<?php 
 if($row['status_trans']=='dijemput')
      { ?><br><br>
<div style="color:#444;background-color:#fff;padding:20px;width:100%;">
<br><center><b style="color:green">invoice <?php echo $row["layanan"]; ?></b></center>
<br>
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
  <?php }?>
<table id="iseqchart"><tr><th id="index"><center>Driver</center></th></tr><tr style="border-top:1px solid #999"><td><center><div style="font-size:10px"><b><small> <?php echo $row["first_name"]; ?> <?php echo $row["last_name"]; ?></small></b></div><br>
<?php 
if (empty($rows['oauth_provider'])) { ?>
<img src="foto_mitra/<?php echo $row['picture'] ?>"style="width:80px;border-radius:50%;border:2px solid grey;"/>
<?php } else{ ?>
<img src="<?php echo $row['picture'] ?>"style="width:80px;border-radius:50%;border:2px solid grey;"/>
<?php } ?>
<br>
<table style="width:100%">
<tr style="font-size:12px;color:#565656"><td>Gender</td><td>:</td><td width="50%"> <?php echo $row["kelamin"]; ?></td></tr>
<tr style="font-size:12px;color:#565656"><td>Phone</td><td>:</td><td width="50%"> <?php echo $row["phone"]; ?></td></tr>
<tr style="font-size:12px;color:#565656"><td>Driver type</td><td>:</td><td width="50%"> <?php echo $row["sebagai"]; ?> <?php echo $row["tipe"]; ?></td></tr></td></tr></table>
<?php
$saldo=$rows['saldo'];
$invoice=$row['harga'];
if ($saldo>$invoice) {
   ?>
<section class="button-demo" style="padding:0;width:100%">
<a href="bayarsaldo.php?id_trans=<?php echo $row['id_trans']; ?>" onclick="javascript:showDiv();"><button style="width:100%" class="ladda-button" data-color="blue" data-style="expand-right">
<small>Pay with balance</small><br>USD 
<?php 
$jumlah = $row['harga'];
$penjumlahan = $jumlah;
$subtotal = number_format($penjumlahan,0,",",".");
echo $subtotal;?>,- <br>
<small style="font-size:9px">(Your Balance USD <?php  $makro=$rows['saldo']; $dafo = number_format($makro,0,",","."); echo $dafo;?>)</small></button></a></center>
</section>
<?php }else{?>
<section class="button-demo" style="padding:0;width:100%">
<a href="bayarin.php?id_trans=<?php echo $row['id_trans']; ?>" onclick="javascript:showDiv();"><button style="width:100%" class="ladda-button" data-color="blue" data-style="expand-right">
<small>Bank Transfer<br>USD 
<?php 
$jumlah = $row['harga'];
$penjumlahan = $jumlah;
$subtotal = number_format($penjumlahan,0,",",".");
echo $subtotal;?>,- </small></button></a></center>
</section>
<section class="button-demo" style="padding:0;width:100%">
<a href="bayarcash.php?id_trans=<?php echo $row['id_trans']; ?>" onclick="javascript:showDiv();"><button style="width:100%" class="ladda-button" data-color="green" data-style="expand-right">
<small>Pay with Cash<br>USD 
<?php 
$jumlah = $row['harga'];
$penjumlahan = $jumlah;
$subtotal = number_format($penjumlahan,0,",",".");
echo $subtotal;?>,- </small></button></a></center>
</section>
<?php }?>
<div id="smart-button-container">
      <div style="text-align: center;">
        <div id="paypal-button-container"></div>
      </div>
    </div>
  <script src="https://www.paypal.com/sdk/js?client-id=AV2TFTCFxJ-17ycEM3U2DSn_e3MSXPZeT83L2KeLSHpLhMfGGYqxl1mHz_ThaoVSjAV3Si9A352WHNHJ&currency=USD" data-sdk-integration-source="button-factory"></script>
  <script>
    function initPayPalButton() {
      paypal.Buttons({
        style: {
          shape: 'rect',
          color: 'gold',
          layout: 'vertical',
          label: 'paypal',
          
        },

        createOrder: function(data, actions) {
          return actions.order.create({
            purchase_units: [{"amount":{"currency_code":"USD","value":"<?php echo $row['harga']; ?>"}}]
          });
        },

        onApprove: function(data, actions) {
          return actions.order.capture().then(function(details) {
            alert('Transaction completed by ' + details.payer.name.given_name + '!');
          });
        },

        onError: function(err) {
          console.log(err);
        }
      }).render('#paypal-button-container');
    }
    initPayPalButton();
  </script>
<!--Sample modules for payment with gateway like paypal etc-->
<center>
<a href="canceljahat.php?id_trans=<?php echo $row['id_trans']; ?>" onClick="return confirm('Cancel request?')">
<button style="width:100%;font-size:15px;height:auto;margin-top:0px;padding-bottom:20px;"class="ladda-button"data-color="red">Cancel</button>
</a>
</center>
<br><br>
<iframe width="100%"height="250"frameborder="0"scrolling="yes"marginheight="0"marginwidth="0"src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=<?php echo $row['lat']?>,<?php echo $row['lng']?> (custom heading)&amp;output=embed"></iframe>
<script src="dist/spin.min.js"></script>
</div>
<?php } }?>
</body>