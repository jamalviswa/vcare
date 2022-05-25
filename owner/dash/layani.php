<?php
session_start();
include_once '../dbconnect.php';
$id_trans= $_GET["id_trans"];
$result = mysqli_query($mysqli, "SELECT * FROM transaksi INNER JOIN users on transaksi.id_users=users.id where transaksi.id_trans='$id_trans'");
$row= mysqli_fetch_array($result);
if(isset($_POST['submit'])){
mysqli_query($mysqli, "UPDATE transaksi set status_trans='finish' WHERE id_trans='" . $_POST["id_trans"] . "' and status_trans='dijemput'");
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
<small>Payment from user: <?php echo $row['first_name']; ?></small><br><br>
<center><b style="color:green">Layanan <?php echo $row["layanan"]; ?></b></center>
<p style="font-size:12px;color:#565656"><b><small>Invoice:</small></b><br/><?php echo $row["invoice"]; ?></p>
<p style="font-size:12px;color:#565656"><b><small>Request date:</small></b><br/><?php echo $row['tanggal']; ?></p>
<p style="font-size:12px;color:#565656"><b><small>Service Type:</small></b><br/><?php echo $row['layanan']; ?></p>
<p style="font-size:12px;color:#565656"><b><small>Description:</small></b><br/><?php echo $row['keterangan']; ?></p>
<p style="font-size:12px;color:#565656"><b><small>Owner Name:</small></b><br/><?php echo $row['nama_rumah']; ?></p>
<p style="font-size:12px;color:#565656"><b><small>No. Handphone:</small></b><br/><?php echo $row['nomor']; ?></p>
<p style="font-size:12px;color:#565656"><b><small>Destination address:</small></b><br/><?php echo $row['alamat']; ?></p>
<p>
<div class="mop"style="padding:10px;color:#565656;border:1px solid #565656; border-style: dashed;">
<b>Total Price: USD  <?php 
$layanan = $row['harga'];
$harga = number_format($layanan,0,",",".");
echo $harga;?>
</b></div></p>
<center>
Admin can call contact person user to check payment<br>if Payment from user <?php echo $row['first_name']; ?> already complete, please click confirm.

</td></tr>

</center>
<form name="frmUser"method="post"action="<?php echo $_SERVER['PHP_SELF']?>"><br><br>
<center>
<input type="hidden"name="id_trans" value="<?php echo $row['id_trans'];?>">
<p><button style="border:1px solid green;padding:4px;color:green;font-size:18px;"type="submit"name="submit"class="btnSubmit"> Confirm</button></p><br>
</center></form></div>
</body>