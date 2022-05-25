<?php
session_start();
include_once '../dbconnect.php';
$id_trans= $_GET["id_trans"];
$result = mysqli_query($mysqli, "SELECT * FROM transaksi where id_trans='$id_trans'");
$row= mysqli_fetch_array($result);
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
<br><center><b style="color:green">Services <?php echo $row["layanan"]; ?></b></center>
<p style="font-size:12px;color:#565656"><b><small>Invoice Code:</small></b><br/><?php echo $row["kode_trans"]; ?></p>
<p style="font-size:12px;color:#565656"><b><small>Request date:</small></b><br/><?php echo $row['tanggal']; ?></p>
<p style="font-size:12px;color:#565656"><b><small>Service Type:</small></b><br/><?php echo $row['layanan']; ?></p>
<p style="font-size:12px;color:#565656"><b><small>Type:</small></b><br/><?php echo $row['tipe']; ?></p>
<p style="font-size:12px;color:#565656"><b><small>Passengers Adress:</small></b><br/><?php echo $row['alamat']; ?></p>
<p style="font-size:12px;color:#565656"><b><small>Destination Adress:</small></b><br/><?php echo $row['tujuan']; ?></p>
<p style="font-size:12px;color:#565656"><b><small>Phone :</small></b><br/><?php echo $row['phone']; ?></p>
<p style="font-size:12px;color:#565656"><b><small>Service Status:</small></b><br/>Done</p>
<p>
<div class="mop"style="padding:10px;color:#565656;border:1px solid #565656; border-style: dashed;">
<b>Total Price: USD  <?php 
$layanan = $row['harga'];
$harga = number_format($layanan,0,",",".");
echo $harga;?> (PAID)
</b></div></p><br>
<p style="font-size:12px;color:#565656"><b><small>Direction Route:</small></b>
<br/>
<iframe style="z-index:9999"width="100%" height="400" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/directions?origin=<?php echo $row['latfrom']?>,<?php echo $row['lngfrom']?>&amp;destination=<?php echo $row['lat']?>,<?php echo $row['lng']?>&amp;key=AIzaSyAO4lbxY6SKygcJxTuzu-Qi7kAAP9SdAwM" allowfullscreen="no"></iframe>

</p>

</td></tr>
<center>Click Ctrl+P for print</center></div>
</body>