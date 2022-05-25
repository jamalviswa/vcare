<?php
session_start();
include_once '../dbconnect.php';

if(!isset($_SESSION['sopir']))
{
	header("Location: ../../admin-beko/index.php");
}
$res=mysqli_query($mysqli, "SELECT * FROM sopir WHERE id_sopir=".$_SESSION['sopir']);
$rows=mysqli_fetch_array($res);
?>
<?php
$idsaldo = $_GET["idsaldo"];
$result = mysqli_query($mysqli, "SELECT id, saldo, idsaldo, first_name, tipesaldo, jumlahsaldo, statussaldo, tgl_request, banksaldo, namauser, nomorrek, phone, id_trans FROM trans_user INNER JOIN users on trans_user.id_users=users.id");
$row= mysqli_fetch_array($result);
if(isset($_POST['topup'])){
$saldo=$row['saldo'];
$total=$_POST['jumlahsaldo'];
$id_trans=$_POST['id_trans'];
$status_trans=$_POST['status_trans'];
$id_users=$_POST['id_users'];
$pensaldoan=$saldo+$total;
mysqli_query($mysqli, "UPDATE transaksi set id_sopir='" . $_POST["id_sopir"] . "', status_trans='finish' WHERE id_trans='$id_trans'");
mysqli_query($mysqli, "UPDATE trans_user set statussaldo='highlight' WHERE idsaldo='" . $_POST["idsaldo"] . "' and statussaldo='dijemput'");
header("Location: index.php"); }

if(isset($_POST['withdraw'])){
$bando=$row['saldo'];
$bopang=$_POST['jumlahsaldo'];
$withdraw=$bando-$bopang;
mysqli_query($mysqli, "UPDATE trans_user set statussaldo='finish' WHERE idsaldo='" . $_POST["idsaldo"] . "' and statussaldo='dijemput'");
mysqli_query($mysqli, "UPDATE sopir set saldo='$withdraw' WHERE id_sopir='" . $_POST["id"] . "'");
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
<center><small><b>Payment <?php echo $row['first_name']; ?></b></small><br><br>
<?php 
if($row['tipesaldo']=='topup')
      { ?> 
<b>Detail Transfers</b><br>
<table><br>
<tr style="font-size:12px;color:#565656"><td>ID Transaction</td><td>:</td><td width="50%"> <?php echo $row['idsaldo']; ?></td></tr>
<tr style="font-size:12px;color:#565656"><td>Tanggal<td>:</td><td width="50%"> <?php echo $row["tgl_request"]; ?></td></tr>
<tr style="font-size:12px;color:#565656"><td>Owner Name</td><td>:</td><td width="50%"> <?php echo $row['first_name']; ?></td></tr>
<tr style="font-size:12px;color:#565656"><td>Tagihan Invoice</td><td>:</td><td width="50%">USD  <?php
$nominal = $row['jumlahsaldo']; 
$jumlah = number_format($nominal,0,",",".");
echo $jumlah; ?></td></tr>
<tr style="font-size:12px;color:#565656"><td>Name Bank User</td><td>:</td><td width="50%"> <?php echo $row['namauser']; ?></td></tr>
<tr style="font-size:12px;color:#565656"><td>Name Bank</td><td>:</td><td width="50%"> <?php echo $row["banksaldo"]; ?></td></tr>
<tr style="font-size:12px;color:#565656"><td>Account Number</td><td>:</td><td width="50%"> <?php echo $row["nomorrek"]; ?></td></tr>
<tr style="font-size:12px;color:#565656"><td>
<br><br>Sudah di transfer ke rekening Bersama Beko:<br>
Name bank: <?php 
$her=mysqli_query($mysqli, "SELECT * FROM infobank where idinfo='1'");
$mul=mysqli_fetch_array($her);
echo $mul['namabank'];?><br>
Account Number: <?php echo $mul['norek'];?><br>
Name: <?php echo $mul['namaorang'];?><br><br>
Jika pembayaran dari User retailer <?php echo $row['first_name']; ?> Sudah masuk dan sesuai data, klik confirm.

</td></tr>

</table>
<form name="frmUser"method="post"action="<?php echo $_SERVER['PHP_SELF']?>"><br><br>
<center>
<input type="hidden"name="jumlahsaldo" value="<?php echo $row['jumlahsaldo']; ?>">
<input type="hidden"name="id" value="<?php echo $row['id']; ?>">
<input type="hidden"name="idsaldo" value="<?php echo $row['idsaldo']; ?>">
<input type="hidden" name="id_trans" value="<?php echo $row['id_trans']; ?>">
<input type="hidden" name="id_users" value="<?php echo $row['id_users']; ?>">
<input type="hidden" name="id_sopir" value="<?php echo $_SESSION['sopir']; ?>">
<input type="hidden" name="status_trans" value="finish">
<p><button style="border:1px solid green;padding:4px;color:green;font-size:18px;"type="submit"name="topup"class="btnSubmit"> Confirm</button></p><br>
</form>
	  <?php } ?>
	  <?php 
if($row['tipesaldo']=='withdraw')
      { ?>
<b>Withdraw</b><br>
<table><br>
<tr style="font-size:12px;color:#565656"><td>Nota</td><td>:</td><td width="50%"> <?php echo $row['idsaldo']; ?></td></tr>
<tr style="font-size:12px;color:#565656"><td>Tanggal<td>:</td><td width="50%"> <?php echo $row["tgl_request"]; ?></td></tr>
<tr style="font-size:12px;color:#565656"><td>Nama user</td><td>:</td><td width="50%"> <?php echo $row['first_name']; ?></td></tr>
<tr style="font-size:12px;color:#565656"><td>Jumlah Withdraw</td><td>:</td><td width="50%">USD  <?php
$nominal = $row['jumlahsaldo']; 
$jumlah = number_format($nominal,0,",",".");
echo $jumlah; ?></td></tr>
<tr style="font-size:12px;color:#565656"><td>Nama pemilik rekening</td><td>:</td><td width="50%"> <?php echo $row['namauser']; ?></td></tr>
<tr style="font-size:12px;color:#565656"><td>Bank Name</td><td>:</td><td width="50%"> <?php echo $row["banksaldo"]; ?></td></tr>
<tr style="font-size:12px;color:#565656"><td>Account number</td><td>:</td><td width="50%"> <?php echo $row["nomorrek"]; ?><br><br>
apabila pembayaran admin sudah transfer ke rekening <?php echo $row['first_name']; ?>, admin dapat melakukan Confirm.

</td></tr>
</table>
<form name="frmUser"method="post"action="<?php echo $_SERVER['PHP_SELF']?>"><br><br>
<center>
<input type="hidden"name="jumlahsaldo" value="<?php echo $row['jumlahsaldo']; ?>">
<input type="hidden"name="id" value="<?php echo $row['id']; ?>">
<input type="hidden"name="idsaldo" value="<?php echo $row['idsaldo']; ?>">
<input type="hidden"name="id_users" value="<?php echo $row['id_users']; ?>">
<p><button style="border:1px solid green;padding:4px;color:green;font-size:18px;"type="submit"name="withdraw"class="btnSubmit"> Confirm</button></p><br>
</form>
	  <?php } ?></center><br>
</center>
<a href="index.php"style="color:orange">Back</a>
</center></div>
</body>