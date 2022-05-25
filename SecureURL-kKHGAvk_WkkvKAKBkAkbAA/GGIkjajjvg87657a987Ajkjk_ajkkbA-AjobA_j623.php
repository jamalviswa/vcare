<link rel="stylesheet"href="../themes/base/jquery.ui.all.css">
<script src="../js/jquery.min.js"></script>
<script src="../js/jquery-ui.min.js"></script>
<script src="../jquery.ui.addresspicker.js"></script>
<link rel="stylesheet"type="text/css"href="../demo.css"/>
<style type="text/css">body{padding:25px;font-size:12px;}ul{padding:0;list-style:none}ul li{display:inline-block;position:relative;line-height:21px;text-align:left}ul li a{display:block;padding:8px 25px;color:#444;text-decoration:none}ul li a:hover{color:#red}ul li ul.dropdown{min-width:100%;background-color:#FFF;display:none;position:absolute;z-index:999;left:0;top:35px;border:1px solid grey}ul li:hover ul.dropdown{display:block}ul li ul.dropdown li{display:block}#home{display:none}#loading{display:block;position:absolute;top:0;left:0;z-index:99999;width:100vw;height:100vh;background-image:url("hourglass.svg");background-repeat:no-repeat;background-position:center}</style>
<link rel="stylesheet"href="../css/bemo.css">
<link rel="stylesheet"href="../dist/ladda.min.css">
</head><body>

<?php
include_once("../dbconnect.php");
$id_trans= $_GET['id_trans'];
$query=mysqli_fetch_array(mysqli_query($mysqli, "select * from transaksi where id_trans='$id_trans'"));
$user_attach= $query['user_attach'];
?>
<div style="padding:10px;color:#565656;border:1px solid #565656; border-style: dashed;">
<b>Data Survei Mobil</b><br>
<table>
<tr style="font-size:12px;color:#565656"><td>Kode transaksi</td><td>:</td><td width="50%"> <?php echo $query['kodetrans']; ?></td></tr>
<tr style="font-size:12px;color:#565656"><td>Nama Layanan</td><td>:</td><td width="50%"> <?php echo $query['layanan']; ?></td></tr>
<tr style="font-size:12px;color:#565656"><td>Harga Layanan</td><td>:</td><td width="50%"> USD <?php echo $query['harga']; ?></td></tr>
<tr style="font-size:12px;color:#565656"><td>Owner Name</td><td>:</td><td width="50%"> <?php echo $query["nama_rumah"]; ?></td></tr>
<tr style="font-size:12px;color:#565656"><td>Alamat</td><td>:</td><td width="50%"> <?php echo $query["alamat"]; ?></td></tr>
<tr style="font-size:12px;color:#565656"><td>Jam Kunjungan<td>:</td><td width="50%"> <?php echo $query["keterangan"]; ?></td></tr>
<tr style="font-size:12px;color:#565656"><td>Merek/Tipe Mobil</td><td>:</td><td width="50%"> <?php echo $query['kendaraan']; ?></td></tr>
<tr style="font-size:12px;color:#565656"><td>Deskripsi permasalahan</td><td>:</td><td width="50%"> <?php echo $query['deskripsi']; ?></td></tr>

</table>
<center>
<p style="color:"><label>Upload Foto Mobil</label></p>
<form action="okejeh.php" enctype="multipart/form-data"  method="post" name="postform">
   <body> <br><br>
   
<input type="hidden" name="id_trans" value="<?php echo $query['id_trans']; ?>"/>

<div style="padding:10px;color:#565656;border:1px solid #565656; border-style: dashed;">
<input type="file" accept="image/*" name="mitra_attach" id="fileInput" size="999999"/>
</div>
<br><br>
<section class="button-demo" style="padding:0px">
<button style="width:150px;font-size:12px;height:auto"type="submit"name="kirim"class="ladda-button"data-color="green"data-style="expand-right">Upload</button>
</section>

<script src="../dist/spin.min.js"></script>
<script src="../dist/ladda.min.js"></script>
<script>Ladda.bind(".button-demo button");Ladda.bind(".progress-demo button",{callback:function(b){var a=0;var c=setInterval(function(){a=Math.min(a+Math.random()*0.1,1);b.setProgress(a);if(a===1){b.stop();clearInterval(c)}},200)}});</script>
</form>
</div>
</center>
</body>