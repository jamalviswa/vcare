<?php
session_start();
include_once '../dbconnect.php';
$idsaldo = $_GET["idsaldo"];
$result = mysqli_query($mysqli, "SELECT id_sopir, idsopir, idsaldo, kodejadwal, nama_sopir, tipesaldo, jumlahsaldo, statussaldo, tgl_request, banksaldo, namauser, nomorrek, nomorhp FROM trans_iklan INNER JOIN sopir on trans_iklan.idsopir=sopir.id_sopir where idsaldo='$idsaldo'");
$row= mysqli_fetch_array($result);
if(isset($_POST['topup'])){
mysqli_query($mysqli, "UPDATE trans_iklan set statussaldo='finish' WHERE idsaldo='" . $_POST["idsaldo"] . "' and kodejadwal='" . $_POST["kodejadwal"] . "' and statussaldo='dijemput'");
mysqli_query($mysqli, "UPDATE jadwal_ads set statusads='aktif' WHERE kodejadwal='" . $_POST["kodejadwal"] . "' and statusads='minta'");

header("Location: index.php"); }

if(isset($_POST['withdraw'])){
$bando=$_POST['awal'];
$bopang=$_POST['jumlahsaldo'];
$withdraw=$bando-$bopang;
mysqli_query($mysqli, "UPDATE trans_iklan set statussaldo='finish' WHERE idsaldo='" . $_POST["idsaldo"] . "' and statussaldo='dijemput'");
mysqli_query($mysqli, "UPDATE sopir set saldo='$withdraw' WHERE id_sopir='" . $_POST["id_sopir"] . "'");
header("Location: index.php"); }
?><head><meta charset="UTF-8"/><meta http-equiv="X-UA-Compatible"content="IE=edge,chrome=1">
<meta name="viewport"content="width=device-width, initial-scale=1.0">
<link rel="stylesheet"type="text/css"href="../../demo.css"/></head><body style="background: -moz-linear-gradient(29deg, rgba(168,252,255,1) 0%, rgba(59,127,255,1) 100%); /* ff3.6+ */
background: -webkit-gradient(linear, left bottom, right top, color-stop(0%, rgba(168,252,255,1)), color-stop(100%, rgba(59,127,255,1))); /* safari4+,chrome */
background: -webkit-linear-gradient(29deg, rgba(168,252,255,1) 0%, rgba(59,127,255,1) 100%); /* safari5.1+,chrome10+ */
background: -o-linear-gradient(29deg, rgba(168,252,255,1) 0%, rgba(59,127,255,1) 100%); /* opera 11.10+ */
background: -ms-linear-gradient(29deg, rgba(168,252,255,1) 0%, rgba(59,127,255,1) 100%); /* ie10+ */
background: linear-gradient(61deg, rgba(168,252,255,1) 0%, rgba(59,127,255,1) 100%); /* w3c */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#A8FCFF', endColorstr='#3B7FFF',GradientType=1 ); /* ie6-9 */" onkeydown="javascript:if(window.event.keyCode == 13) window.event.keyCode = 9;"><!--sodrops top bar-->
<div style="background: #fff;
    -webkit-box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14), 0 3px 1px -2px rgba(0,0,0,0.12), 0 1px 5px 0 rgba(0,0,0,0.2);
    box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14), 0 3px 1px -2px rgba(0,0,0,0.12), 0 1px 5px 0 rgba(0,0,0,0.2);
    display: block;
    margin: 0 auto;
    min-height: 0;
    width: 450px;padding:15px;color:"><br><br>
<center><small><b>Request from <?php echo $row['nama_sopir']; ?></b></small><br><br>
<?php 
if($row['tipesaldo']=='topup')
      { ?> 
<b>Pembayaran Iklan Deluxe</b><br>
<?php 
$kodejadwal=$row['kodejadwal'];
$jiew=mysqli_query($mysqli, "SELECT * FROM car JOIN sopir ON car.pemilikmobil=sopir.id_sopir JOIN jadwal_ads ON car.id_mobil=jadwal_ads.product_id where jadwal_ads.kodejadwal='$kodejadwal' and jadwal_ads.statusads='minta'");
while($jows=mysqli_fetch_array($jiew)){
?>
<table width="100%" style="font-family:verdana;margin-top:5px;background-color:#fff;font-size:12px;-webkit-box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14), 0 3px 1px -2px rgba(0,0,0,0.12), 0 1px 5px 0 rgba(0,0,0,0.2);
    box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14), 0 3px 1px -2px rgba(0,0,0,0.12), 0 1px 5px 0 rgba(0,0,0,0.2);">
  <tr>
    <td width="40%">
	<table><tr><td>
	<?php
 if($jows['gambarmobil']=='0')
      { ?>
<img src="../../icon/nopic.png" style="float:right;width:100%;top:0;"/>
<?php }
else{?>
<img src="../../fotobarang/<?php echo $jows['gambarmobil'];?>" style="float:right;width:100%;top:0;"/>
<?php } ?>
</td></tr></table>
</td>
<td width="60%" style="padding:10px;color:#444;font-size:13px"><table style="color:#444;font-size:12px">
<tr><td><div style="float:left"><?php echo $jows['nama_mobil'];?></div></td></tr>
<tr><td><div style="float:left"><small><?php echo $jows['merkmobil'];?></small></div></td></tr>
<tr><td><div style="float:left"><small>Sewa 1 hari: USD  <?php 
$jam=$jows['harga_12jam'];
$harga_12jam = number_format($jam,0,",",".");
echo $harga_12jam;?><br>
Sewa 1 Bulan: USD  <?php 
$ham=$jows['harga_24jam'];
$harga_24jam = number_format($ham,0,",",".");
echo $harga_24jam;?><br>
Tambahan Sopir: USD  <?php 
$pos=$jows['hargasopir'];
$hargasopir = number_format($pos,0,",",".");
echo $hargasopir;?></small>
</div></td></tr>
</table></td>
  </tr>
<tr><td><div style="float:left;color: #d00909;"><small>Iklan Mulai Tayang : <?php echo $jows['time_start'];?></small></div></td></tr>
<tr><td><div style="float:left;color: #d00909;"><small>Iklan berakhir : <?php echo $jows['time_end'];?></small></div></td></tr>
<tr><td><div style="float:left;color: #d00909;"><small>Kategori Iklan : <?php
$id_ads=$jows['id_ads'];
$mikel=mysqli_query($mysqli, "SELECT * FROM ads where id_ads='$id_ads'");
$krm=mysqli_fetch_array($mikel);
$menu_ads=$krm['menu_ads'];
echo $menu_ads;
?>(USD  <?php echo $krm['harga_ads'];?>/30 hari)</small></div></td></tr>
</table></td>
  </tr>
</table>
<?php } ?>
<table><br>
<tr style="font-size:12px;color:#565656"><td>Nota</td><td>:</td><td width="50%"> <?php echo $row['idsaldo']; ?></td></tr>
<tr style="font-size:12px;color:#565656"><td>date<td>:</td><td width="50%"> <?php echo $row["tgl_request"]; ?></td></tr>
<tr style="font-size:12px;color:#565656"><td>Nama user</td><td>:</td><td width="50%"> <?php echo $row['nama_sopir']; ?></td></tr>
<tr style="font-size:12px;color:#565656"><td>Jumlah Deposit</td><td>:</td><td width="50%">USD  <?php
$nominal = $row['jumlahsaldo']; 
$jumlah = number_format($nominal,0,",",".");
echo $jumlah; ?></td></tr>
<tr style="font-size:12px;color:#565656"><td>Owner Name</td><td>:</td><td width="50%"> <?php echo $row['namauser']; ?></td></tr>
<tr style="font-size:12px;color:#565656"><td>Bank Name</td><td>:</td><td width="50%"> <?php echo $row["banksaldo"]; ?></td></tr>
<tr style="font-size:12px;color:#565656"><td>Account number</td><td>:</td><td width="50%"> <?php echo $row["nomorrek"]; ?></td></tr>
<tr style="font-size:12px;color:#565656"><td>
<br><br>Tujuan Transfer:<br>
Bank Name: <?php 
$her=mysqli_query($mysqli, "SELECT * FROM infobank where idinfo='1'");
$mul=mysqli_fetch_array($her);
echo $mul['namabank'];?><br>
Account number: <?php echo $mul['norek'];?><br>
Owner Name: <?php echo $mul['namaorang'];?><br><br>
Jika user <?php echo $row['first_name']; ?> Sudah melakukan pembayaran ke rekening admin Lapak Rental, Silahkan confirmation.

</td></tr>

</table>
<form name="frmUser"method="post"action="<?php echo $_SERVER['PHP_SELF']?>"><br><br>
<center>
<input type="hidden"name="jumlahsaldo" value="<?php echo $row['jumlahsaldo']; ?>">
<input type="hidden"name="awal" value="<?php echo $row['saldo']; ?>">
<input type="hidden"name="id_sopir" value="<?php echo $row['id_sopir']; ?>">
<input type="hidden"name="kodejadwal" value="<?php echo $row['kodejadwal']; ?>">
<input type="hidden"name="idsaldo" value="<?php echo $row['idsaldo']; ?>">
<p><button style="border:1px solid green;padding:4px;color:green;font-size:18px;"type="submit"name="topup"class="btnSubmit"> Confirmation</button></p><br>
</form>
	  <?php } ?>
	  <?php 
if($row['tipesaldo']=='withdraw')
      { ?>
<b>Withdraw</b><br>
<table><br>
<tr style="font-size:12px;color:#565656"><td>No</td><td>:</td><td width="50%"> <?php echo $row['idsaldo']; ?></td></tr>
<tr style="font-size:12px;color:#565656"><td>date<td>:</td><td width="50%"> <?php echo $row["tgl_request"]; ?></td></tr>
<tr style="font-size:12px;color:#565656"><td>Nama User</td><td>:</td><td width="50%"> <?php echo $row['first_name']; ?></td></tr>
<tr style="font-size:12px;color:#565656"><td>Jumlah Withdraw</td><td>:</td><td width="50%">USD  <?php
$nominal = $row['jumlahsaldo']; 
$jumlah = number_format($nominal,0,",",".");
echo $jumlah; ?></td></tr>
<tr style="font-size:12px;color:#565656"><td>Owner Name</td><td>:</td><td width="50%"> <?php echo $row['namauser']; ?></td></tr>
<tr style="font-size:12px;color:#565656"><td>Bank Name</td><td>:</td><td width="50%"> <?php echo $row["banksaldo"]; ?></td></tr>
<tr style="font-size:12px;color:#565656"><td>Account number</td><td>:</td><td width="50%"> <?php echo $row["nomorrek"]; ?></td></tr>
<tr style="font-size:12px;color:#565656"><td>
Jika Request withdraw Sudah ditransfer admin ke rekening <?php echo $row['first_name']; ?>, Silahkan Klik confirm.
</td></tr>
</table>
<form name="frmUser"method="post"action="<?php echo $_SERVER['PHP_SELF']?>"><br><br>
<center>
<input type="hidden"name="jumlahsaldo" value="<?php echo $row['jumlahsaldo']; ?>">
<input type="hidden"name="awal" value="<?php echo $row['saldo']; ?>">
<input type="hidden"name="id_sopir" value="<?php echo $row['id_sopir']; ?>">
<input type="hidden"name="idsaldo" value="<?php echo $row['idsaldo']; ?>">
<p><button style="border:1px solid green;padding:4px;color:green;font-size:18px;"type="submit"name="withdraw"class="btnSubmit"> Confirm</button></p><br>
</form>
	  <?php } ?></center><br>
</center>
<p><a href="index.php"style="color:orange">Back</a>
</center></div>
</body>