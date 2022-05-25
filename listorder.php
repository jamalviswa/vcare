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
include_once 'dbconnect.php';
$id_users=$_SESSION['user'];
$lem=mysqli_query($mysqli, "SELECT * FROM keranjang INNER JOIN mitra ON keranjang.id_sopir=mitra.id_mitra WHERE id_users='$id_users' and aktif='yes' and idtrans='0' and checkout='no'");
$kep = mysqli_fetch_array($lem);
$pes=mysqli_query($mysqli, "SELECT * FROM keranjang INNER JOIN jw_product ON keranjang.idbarang=jw_product.product_id WHERE id_users='$id_users' and aktif='yes' and idtrans='0' and checkout='no'");
while($bes = mysqli_fetch_array($pes)) { 
$price=$bes['hrg'];
$total=$bes['tot'];
$kuantitas=$bes['quantity'];
$harga=$price*$kuantitas;?>
     <link href='smile.css' rel='stylesheet' type='text/css'>
        <script src='jquery-3.0.0.js' type='text/javascript'></script>
        <script src='script.js' type='text/javascript'></script> 
<table style="padding:25px;margin-top:5px;background-color: #ffff;"id="iseqchart">
<tr style="font-size:10px;border-bottom:1px solid #dcdcdc;">
<td width="30%">
	<?php
 if($jows['product_image_ori']=='0')
      { ?>
<img src="icon/nopic.png" style="float:right;width:80px;top:0;"/>
<?php }
else{?>
<img src="owner/fotobarang/<?php echo $bes['product_image_ori'];?>" style="width:100px;border: 1px solid #ffff;"/>
<?php } ?>
</td>
<td width="70%"style="font-size:12px;padding:10px">
<?php echo $bes['product_tag'];?><br>
USD  <?php $saga = $price;
$mike = number_format($price,0,",",".");
echo $mike;?>
<b><small><br>Qty: <?php echo $bes['quantity'];?> <br> Total: USD  <?php 
$barga = $harga;
$hargae = number_format($barga,0,",",".");
echo $hargae;?></small></b><br><br>
<a href="returedit.php?idcatalog=<?php echo $bes['idcatalog'];?>" onclick="javascript:showDiv();" style="background:orange;padding:5px;font-weight:bold;color:#fff">Edit Qty</a>
<?php
$idcatalog = $bes['idcatalog'];
$lims=mysqli_query($mysqli, "SELECT * FROM keranjang where idcatalog='$idcatalog' and checkout='no' and tgl < NOW() - INTERVAL 1 DAY limit 1");
$kimsd=mysqli_fetch_array($lims);
$count = mysqli_num_rows($lims);
if($count==1){
?> 
<?php } else {?>
 <?php  } 
 $id=$bes['idcatalog']; 
 ?>
<a href="deletecart.php?idcatalog=<?php echo $bes['idcatalog'];?>"><div style="float:right;font-size:12px;"><img style="vertical-align:middle;margin-top:5px;margin-right:15px;" src="icon/delete.png" width="20px"/></div></a>
</td>
</tr>
</table>
<?php
}
?>
<div id="loading" style="display:none">
</div>
<script type="text/javascript">
        function showDiv() {
            div = document.getElementById('loading');
            div.style.display = "block";
        }
</script>