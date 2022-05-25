<?php
session_start();
include_once 'dbconnect.php';
if(!isset($_SESSION['user']))
{
	header("Location: jdex.html#login");
}
$res=mysqli_query($mysqli, "SELECT * FROM users WHERE id=".$_SESSION['user']);
$rows=mysqli_fetch_array($res);
?>
<?php
$jiew=mysqli_query($mysqli, "SELECT * FROM trans_user where id_users=".$_SESSION['user']);
while($jow=mysqli_fetch_array($jiew)){
	?><?php 
 if($jow['statussaldo']=='minta')
      { ?>
<script>document.location.href="bayarin.php#saldo";</script><?php }
?>
<?php 
 if($jow['statussaldo']=='dijemput')
      { ?>
<script>document.location.href="#tunggu";</script><?php }};?>


<link rel="stylesheet"type="text/css"href="demo.css"/>
<style type="text/css">ul{padding:0;list-style:none}ul li{display:inline-block;position:relative;line-height:21px;text-align:left}ul li a{display:block;padding:8px 25px;color:#000;text-decoration:none}ul li a:hover{color:#red}ul li ul.dropdown{min-width:100%;background-color:#FFF;display:none;position:absolute;z-index:999;left:-50px;top:35px;border:1px solid grey}ul li:hover ul.dropdown{display:block}ul li ul.dropdown li{display:block}#cari{display:none}#loading{display:block;position:absolute;top:0;left:0;z-index:99999;width:100vw;height:100vh;background-image:url("hourglass.svg");background-repeat:no-repeat;background-position:center}</style>
<link rel="stylesheet"href="css/bemo.css">
<link rel="stylesheet"href="dist/ladda.min.css">
<div class="sodrops-top" style="background:#444;height:50px;"><span class="actions"><ul>
<li><a style="margin-top: 0px;padding:5px;"href="profit.php"><img src="icon/refresh.png"width="25px"/></a></li>
<li><a style="margin-top: 0px;padding:5px;" href="mithome.php#home" onclick="javascript:showDiv();"><img src="icon/home.png"width="25px"/></a></li></ul></span>
<div style="color:#fff;margin-left:20px;font-size:18px;font-weight:bold;margin-top:5;">
My Profit
</div></div>
<center>
<div style="margin-top:100px;color:#000;font-size:15px"><br>
<table width="100%">
<tr style="font-weight:normal;border:1px solid grey;color:#444">
<th width="40%" style="font-weight:normal;border-right:1px solid grey;color:#444"><center><small>Total order<br><?php
$jatuhtempo=date('d-m-Y');
$query = "SELECT COUNT(*) AS total,SUM(harga) as totservis FROM transaksi WHERE id_mitra='".$_SESSION['user']."'"; 
$result = mysqli_query($mysqli, $query); 
$mum = mysqli_fetch_array($result); 
$totservis=$mum['totservis'];
$bagian=80/100;
$cudi = $totservis*$bagian; 
$values = mysqli_fetch_assoc($result); 
$jim_rows = $mum['total'];
echo $jim_rows; 
 ?></small></center></th>
 <th width="30%"style="font-weight:normal;border-left:1px solid grey;color:#444"><center><small>Income<br>USD <?php  $jenngo = number_format($cudi,0,",","."); echo $jenngo;?></small></center></th>
<th width="30%"style="font-weight:normal;border-left:1px solid grey;color:#444"><center><small>Available balance<br>USD <?php  $hargavo=$rows['saldo']; $rego = number_format($hargavo,0,",","."); echo $rego;?></small></center></th>
</tr>
</table>
<br><center>History Order</center><br>
<?php 
$pisti=mysqli_query($mysqli, "SELECT * FROM transaksi where id_mitra='".$_SESSION['user']."'");
while($liki=mysqli_fetch_array($pisti)){
?>
<table style="padding:10px;color:#444;border-bottom:1px solid grey;"id="iseqchart">
<tr style="font-size:10px;">
<td width="25%"style="">
<?php echo $liki['tanggal'];?> 
</td>
<td width="25%"style="">
<?php echo $liki['tipe'];?> 
</td>
<td width="25%"style="">
Total Rp.<?php echo $liki['harga'];?> 
</td>
<td width="25%"style="">
Pendapatan Rp. <?php 
$bagian=80/100;
$guy_rows=$liki['harga'];
$cumi = $guy_rows*$bagian; 
$perawat = number_format($cumi,0,",",".");
echo $perawat;?> 
</td>
</tr>
</table>
<?php } ?>
</div>
<br>
<br><br></center>
</div>