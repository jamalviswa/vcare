<?php
session_start();
include_once '../dbconnect.php';
$idsaldo = $_GET["idsaldo"];
$result = mysqli_query($mysqli, "SELECT id, id_users, afiliasi, kodeinvoice, saldo, idsaldo, first_name, tipesaldo, jumlahsaldo, statussaldo, tgl_request, banksaldo, namauser, nomorrek, phone FROM trans_user INNER JOIN users on trans_user.id_users=users.id where idsaldo='$idsaldo'");
$row= mysqli_fetch_array($result);
if(isset($_POST['topup'])){
$saldo=$_POST['awal'];
$total=$_POST['jumlahsaldo'];
$pensaldoan=$saldo+$total;
$tagihan=$_POST['tagihan'];
$jimsaldoan=$pensaldoan-$tagihan;

$bado=$_POST['jamal'];
$binus=3/100;
$fulusan=$binus*$total;
$bonusan=$bado+$fulusan;
mysqli_query($mysqli, "UPDATE trans_user set statussaldo='finish' WHERE idsaldo='" . $_POST["idsaldo"] . "' and statussaldo='dijemput'");
mysqli_query($mysqli, "UPDATE users set saldo='$jimsaldoan' WHERE id='" . $_POST["id_users"] . "'");
mysqli_query($mysqli, "UPDATE users set saldo='$bonusan' WHERE shareafiliasi='" . $_POST["afiliasi"] . "'");
mysqli_query($mysqli, "UPDATE transaksi set status_trans='dijemput', lunas='yes' WHERE id_trans='" . $_POST["id_trans"] . "' and pembayaran='" . $_POST["kodeinvoice"] . "'");
header("Location: index.php"); }

if(isset($_POST['withdraw'])){
$bando=$_POST['awal'];
$bopang=$_POST['jumlahsaldo'];
$withdraw=$bando-$bopang;
mysqli_query($mysqli, "UPDATE trans_user set statussaldo='finish' WHERE idsaldo='" . $_POST["idsaldo"] . "' and statussaldo='dijemput'");
mysqli_query($mysqli, "UPDATE users set saldo='$withdraw' WHERE id='" . $_POST["id_users"] . "'");
header("Location: index.php"); }

if(isset($_POST['deposit'])){
$lando=$_POST['awal'];
$cocal=$_POST['jumlahsaldo'];
$jimsaldoan=$lando+$cocal;
mysqli_query($mysqli, "UPDATE trans_user set statussaldo='finish' WHERE idsaldo='" . $_POST["idsaldo"] . "' and statussaldo='dijemput'");
mysqli_query($mysqli, "UPDATE users set saldo='$jimsaldoan' WHERE id='" . $_POST["id_users"] . "'");
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
<center><small><b>Request from <?php echo $row['first_name']; ?></b></small><br><br>
<?php 
if($row['tipesaldo']=='deposit')
      { ?> 
<b>Deposit</b><br>
<table><br>
<tr style="font-size:12px;color:#565656"><td>Nota</td><td>:</td><td width="50%"> <?php echo $row['idsaldo']; ?></td></tr>
<tr style="font-size:12px;color:#565656"><td>date<td>:</td><td width="50%"> <?php echo $row["tgl_request"]; ?></td></tr>
<tr style="font-size:12px;color:#565656"><td>Nama user</td><td>:</td><td width="50%"> <?php echo $row['first_name']; ?></td></tr>
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
Jika user <?php echo $row['first_name']; ?> Sudah melakukan pembayaran ke rekening admin, Silahkan confirmation.

</td></tr>

</table>
<form name="frmUser"method="post"action="<?php echo $_SERVER['PHP_SELF']?>"><br><br>
<center>
<input type="hidden"name="jumlahsaldo" value="<?php echo $row['jumlahsaldo']; ?>">
<input type="hidden"name="awal" value="<?php echo $row['saldo']; ?>">
<input type="hidden"name="id_users" value="<?php echo $row['id_users']; ?>">
<input type="hidden"name="idsaldo" value="<?php echo $row['idsaldo']; ?>">
<p><button style="border:1px solid green;padding:4px;color:green;font-size:18px;"type="submit"name="deposit"class="btnSubmit"> Confirmation</button></p><br>
</form>
	  <?php } ?>
<?php 
if($row['tipesaldo']=='topup')
      { ?> 
<b>Topup</b><br>
<table><br>
<tr style="font-size:12px;color:#565656"><td>Nota</td><td>:</td><td width="50%"> <?php echo $row['idsaldo']; ?></td></tr>
<tr style="font-size:12px;color:#565656"><td>Invoice Code</td><td>:</td><td width="50%"> <?php echo $row["kodeinvoice"]; ?></td></tr>
<tr style="font-size:12px;color:#565656"><td>date<td>:</td><td width="50%"> <?php echo $row["tgl_request"]; ?></td></tr>
<tr style="font-size:12px;color:#565656"><td>Nama user</td><td>:</td><td width="50%"> <?php echo $row['first_name']; ?></td></tr>
<tr style="font-size:12px;color:#565656"><td>Jumlah Transfer</td><td>:</td><td width="50%">USD  <?php
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
Jika user <?php echo $row['first_name']; ?> Sudah melakukan pembayaran ke rekening admin Beko, Silahkan confirmation.

</td></tr>

</table>
<form name="frmUser"method="post"action="<?php echo $_SERVER['PHP_SELF']?>"><br><br>
<?php
$pembayaran=$row['kodeinvoice'];
$nek=mysqli_query($mysqli, "SELECT * FROM transaksi WHERE pembayaran='$pembayaran'");
$pen=mysqli_fetch_array($nek);
?>
<input type="hidden"name="id_trans" value="<?php echo $pen['id_trans']; ?>">
<input type="hidden"name="tagihan" value="<?php echo $pen['total']; ?>">
<input type="hidden"name="kodeinvoice" value="<?php echo $row['kodeinvoice']; ?>">
<center>
<?php
$shareafiliasi=$row['afiliasi'];
$kum=mysqli_query($mysqli, "SELECT * FROM users WHERE shareafiliasi='$shareafiliasi'");
$cum=mysqli_fetch_array($kum);
?>
<input type="hidden"name="jamal" value="<?php echo $cum['saldo']; ?>">

<input type="hidden"name="jumlahsaldo" value="<?php echo $row['jumlahsaldo']; ?>">
<input type="hidden"name="awal" value="<?php echo $row['saldo']; ?>">
<input type="hidden"name="id_users" value="<?php echo $row['id_users']; ?>">
<input type="hidden"name="afiliasi" value="<?php echo $row['afiliasi']; ?>">
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
<input type="hidden"name="id_users" value="<?php echo $row['id_users']; ?>">
<input type="hidden"name="idsaldo" value="<?php echo $row['idsaldo']; ?>">
<p><button style="border:1px solid green;padding:4px;color:green;font-size:18px;"type="submit"name="withdraw"class="btnSubmit"> Confirm</button></p><br>
</form>
	  <?php } ?></center><br>
</center>
<p><a href="index.php"style="color:orange">Back</a>
</center></div>
</body>