<?php
session_start();
include_once '../dbconnect.php';
$id_trans = $_GET["id_trans"];
$result = mysqli_query($mysqli, "SELECT * FROM transaksi WHERE id_trans='$id_trans' and status_trans='dijemput'");
$row= mysqli_fetch_array($result);
if(count($_POST)>0) {
mysqli_query($mysqli, "UPDATE transaksi set status_trans='otw' WHERE id_trans='" . $_POST["id_trans"] . "' and status_trans='dijemput'");
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
<center><small><b>Rincian permintaan</b></small><br><br>
<?php 
if($row['layanan']=='survey')
      { ?> 
<b>Survei mobil</b><br>
<table><br>
<tr style="font-size:12px;color:#565656"><td>Kode Layanan</td><td>:</td><td width="50%"> <?php echo $row['kodetrans']; ?></td></tr>
<tr style="font-size:12px;color:#565656"><td>Permintaan Layanan</td><td>:</td><td width="50%"> <?php echo $row['layanan']; ?></td></tr>
<tr style="font-size:12px;color:#565656"><td>Merek/Tipe Mobil</td><td>:</td><td width="50%"> <?php echo $row['kendaraan']; ?></td></tr>
<tr style="font-size:12px;color:#565656"><td>Harga Layanan</td><td>:</td><td width="50%"> USD <?php echo $row['harga']; ?></td></tr>
<tr style="font-size:12px;color:#565656"><td>Owner Name</td><td>:</td><td width="50%"> <?php echo $row["nama_rumah"]; ?></td></tr>
<tr style="font-size:12px;color:#565656"><td>Alamat</td><td>:</td><td width="50%"> <?php echo $row["alamat"]; ?></td></tr>
<tr style="font-size:12px;color:#565656"><td>Jam Kunjungan<td>:</td><td width="50%"> <?php echo $row["keterangan"]; ?></td></tr>
<tr style="font-size:12px;color:#565656"><td>Phone <?php echo $row["nama_rumah"]; ?><td>:</td><td width="50%"> <?php echo $row["nomor"]; ?></td></tr>

</table>

	  <?php } ?>
	  <?php 
if($row['layanan']=='stnk')
      { ?>
<b>PeUSD njangan STNK</b><br>
<table>
<tr style="font-size:12px;color:#565656"><td>Kode Layanan</td><td>:</td><td width="50%"> <?php echo $row['kodetrans']; ?></td></tr>
<tr style="font-size:12px;color:#565656"><td>Permintaan</td><td>:</td><td width="50%"> PeUSD njangan <?php echo $row['layanan']; ?></td></tr>
<tr style="font-size:12px;color:#565656"><td>Merek/Tipe Mobil</td><td>:</td><td width="50%"> <?php echo $row['kendaraan']; ?></td></tr>
<tr style="font-size:12px;color:#565656"><td>Harga Layanan</td><td>:</td><td width="50%"> USD <?php echo $row['harga']; ?></td></tr>
<tr style="font-size:12px;color:#565656"><td>Owner Name</td><td>:</td><td width="50%"> <?php echo $row["nama_rumah"]; ?></td></tr>
<tr style="font-size:12px;color:#565656"><td>Alamat</td><td>:</td><td width="50%"> <?php echo $row["alamat"]; ?></td></tr>
<tr style="font-size:12px;color:#565656"><td>Jam Kunjungan<td>:</td><td width="50%"> <?php echo $row["keterangan"]; ?></td></tr>
<tr style="font-size:12px;color:#565656"><td>Phone <?php echo $row["nama_rumah"]; ?><td>:</td><td width="50%"> <?php echo $row["nomor"]; ?></td></tr>
</table>
<center>
<?php
 if($row['foto_stnk']=='0')
      { ?>
** Foto Dokumen belum diupload, sebaiknya tunggu klien <?php echo $row["nama_rumah"]; ?> melengkapi foto dokumen**
<img src="../icon/nopic.png" style="width:300px;top:0;"/>
<?php }
else{?>
<center>
<table width="100%" style="color:">
<tr>
<td>
Foto STNK<br><img src="../attach/<?php echo $row['foto_stnk'];?>" style="width:100%;top:0;"/>

</td>
<td>
Foto BPKB<br><img src="../attach/<?php echo $row['foto_bpkb'];?>" style="width:100%;top:0;"/>

</td></tr><tr>
<td>
Foto KTP<br><img src="../attach/<?php echo $row['foto_ktp'];?>" style="width:100%;top:0;"/>

</td>
<td>
Foto Mobil<br><img src="../attach/<?php echo $row['foto_mobil'];?>" style="width:100%;top:0;"/>
</td>
</tr>
</table>
</center>

	  <?php }} ?></center><br>
<div class="mop"style="padding:10px;color:#565656;border:1px solid #565656; border-style: dashed;">
<b>Total Price: USD  <?php echo $row['harga']; ?>
</b></div>
<br><br>apabila <?php echo $row['nama_rumah']; ?> sudah melakukan pembayaran, admin dapat melakukan Confirm dengan menanyakan kode transaksi dari <?php echo $row['nama_rumah']; ?>.
</center>
<form name="frmUser"method="post"action="<?php echo $_SERVER['PHP_SELF']?>"><br><br>
<center>
<input type="hidden"name="status_trans" value="otw">
<input type="hidden"name="id_trans" value="<?php echo $id_trans;?>">
<p><button style="border:1px solid green;padding:4px;color:green;font-size:18px;"type="submit"name="submit"class="btnSubmit"> Confirm</button></p><br>
<a href="index.php"style="color:orange">Back</a>
</center></form></div>
</body>