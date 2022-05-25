<?php
session_start();
include_once '../dbconnect.php';

if(!isset($_SESSION['mitra']))
{
	header("Location: index.php");
}
$res=mysqli_query($mysqli, "SELECT * FROM mitra WHERE id_mitra=".$_SESSION['mitra']);
$rows=mysqli_fetch_array($res);
?>

<?php
$idsaldo = $_GET["idsaldo"];
$result = mysqli_query($mysqli, "SELECT id, saldo, idsaldo, first_name, tipesaldo, jumlahsaldo, statussaldo, tgl_request, banksaldo, namauser, nomorrek, phone, id_trans FROM trans_user INNER JOIN users on trans_user.id_users=users.id where trans_user.idsaldo='$idsaldo'");
$row= mysqli_fetch_array($result);
if(isset($_POST['topup'])){
$saldo=$_POST['saldo'];
$total=$_POST['jumlahsaldo'];
$id_trans=$_POST['id_trans'];
$status_trans=$_POST['status_trans'];
$id_users=$_POST['id_users'];
$pensaldoan=$saldo+$total;

$siko=mysqli_query($mysqli, "SELECT * FROM transaksi WHERE id_trans='$id_trans'");
$kamsia=mysqli_fetch_array($siko);

$nama_voucher=$kamsia['nama_voucher'];
$less=mysqli_query($mysqli, "SELECT * FROM voucher WHERE idvoucher='$nama_voucher'");
$jim=mysqli_fetch_array($less);
$pointvoucher=$jim['pointvoucher'];
$lamadurasi=$jim['durasivoucher'];
if($pointvoucher=='smartpustaka')
            {
$tanggalSekarang=date('d-m-Y');
$newTanggalSekarang=strtotime($tanggalSekarang);
$jumlahHari=$lamadurasi;
$NewjumlahHari=86400*$jumlahHari;
$hasilJumlah = $newTanggalSekarang + $NewjumlahHari;
$timeend=date('d-m-Y', $hasilJumlah);
mysqli_query($mysqli, "UPDATE transaksi set status_trans='otw', status_bayar='lunas', timestart='$tanggalSekarang', timeend='$timeend' WHERE id_trans='$id_trans' and status_trans='dijemput'");
			}else {
mysqli_query($mysqli, "UPDATE transaksi set status_trans='otw', status_bayar='lunas' WHERE id_trans='$id_trans' and status_trans='dijemput'");
			}				
mysqli_query($mysqli, "UPDATE trans_user set statussaldo='finish' WHERE idsaldo='" . $_POST["idsaldo"] . "' and statussaldo='dijemput'");
?>
<script>document.location.href="index.php";</script><?php }
if(isset($_POST['deposit'])){
$saldo=$_POST['saldo'];
$total=$_POST['jumlahsaldo'];
$id_trans=$_POST['id_trans'];
$status_trans=$_POST['status_trans'];
$id_users=$_POST['id_users'];
$pensaldoan=$saldo+$total;

$siko=mysqli_query($mysqli, "SELECT * FROM transaksi WHERE id_trans='$id_trans'");
$kamsia=mysqli_fetch_array($siko);

$nama_voucher=$kamsia['nama_voucher'];
$less=mysqli_query($mysqli, "SELECT * FROM voucher WHERE idvoucher='$nama_voucher'");
$jim=mysqli_fetch_array($less);
$pointvoucher=$jim['pointvoucher'];
$lamadurasi=$jim['durasivoucher'];
if($pointvoucher=='smartpustaka')
            {
$tanggalSekarang=date('d-m-Y');
$newTanggalSekarang=strtotime($tanggalSekarang);
$jumlahHari=$lamadurasi;
$NewjumlahHari=86400*$jumlahHari;
$hasilJumlah = $newTanggalSekarang + $NewjumlahHari;
$timeend=date('d-m-Y', $hasilJumlah);
mysqli_query($mysqli, "UPDATE transaksi set status_trans='otw', status_bayar='lunas', timestart='$tanggalSekarang', timeend='$timeend' WHERE id_trans='$id_trans' and status_trans='dijemput'");
			}else {
mysqli_query($mysqli, "UPDATE transaksi set status_trans='otw', status_bayar='lunas' WHERE id_trans='$id_trans' and status_trans='dijemput'");
			}				
mysqli_query($mysqli, "UPDATE trans_user set statussaldo='finish' WHERE idsaldo='" . $_POST["idsaldo"] . "' and statussaldo='dijemput'");
mysqli_query($mysqli, "UPDATE users set saldo='$pensaldoan' WHERE id='" . $_POST["id"] . "'");
?>
<script>document.location.href="index.php";</script><?php }

if(isset($_POST['withdraw'])){
$bando=$_POST['saldo'];
$bopang=$_POST['jumlahsaldo'];
$withdraw=$bando-$bopang;
mysqli_query($mysqli, "UPDATE trans_user set statussaldo='finish' WHERE idsaldo='" . $_POST["idsaldo"] . "' and statussaldo='dijemput'");
mysqli_query($mysqli, "UPDATE users set saldo='$withdraw' WHERE id='" . $_POST["id"] . "'");
?>
<script>document.location.href="index.php";</script><?php }
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
    width: 450px;padding:15px;color:444"><br><br>
<center><small><b>Payment <?php echo $row['first_name']; ?></b></small><br><br>
<?php 
if($row['tipesaldo']=='topup')
      { ?> 
<b>Detail Transfers</b><br>
<table><br>
<tr style="font-size:12px;color:#565656"><td>ID Transaction</td><td>:</td><td width="50%"> <?php echo $row['idsaldo']; ?></td></tr>
<tr style="font-size:12px;color:#565656"><td>Tanggal<td>:</td><td width="50%"> <?php echo $row["tgl_request"]; ?></td></tr>
<tr style="font-size:12px;color:#565656"><td>Owner Name</td><td>:</td><td width="50%"> <?php echo $row['first_name']; ?></td></tr>
<tr style="font-size:12px;color:#565656"><td>Invoice</td><td>:</td><td width="50%">USD  <?php
$nominal = $row['jumlahsaldo']; 
$jumlah = number_format($nominal,0,",",".");
echo $jumlah; ?></td></tr>
<tr style="font-size:12px;color:#565656"><td>Name Bank User</td><td>:</td><td width="50%"> <?php echo $row['namauser']; ?></td></tr>
<tr style="font-size:12px;color:#565656"><td>Name Bank</td><td>:</td><td width="50%"> <?php echo $row["banksaldo"]; ?></td></tr>
<tr style="font-size:12px;color:#565656"><td>Account Number</td><td>:</td><td width="50%"> <?php echo $row["nomorrek"]; ?></td></tr>
<tr style="font-size:12px;color:#565656"><td>
<br><br>Already transfered to admin bank account:<br>
Name bank: <?php 
$namabank=$row['banksaldo'];
$her=mysqli_query($mysqli, "SELECT * FROM infobank where namabank like '%".$namabank."%'");
$mul=mysqli_fetch_array($her);
echo $mul['namabank'];?><br>
Account Number: <?php echo $mul['norek'];?><br>
Name: <?php echo $mul['namaorang'];?><br><br>
if payment user <?php echo $row['first_name']; ?> already transfered to administrator bank, click confirm.

</td></tr>
</table>
<form name="frmUser"method="post"action="<?php echo $_SERVER['PHP_SELF']?>"><br><br>
<center>
<input type="hidden"name="saldo" value="<?php echo $row['saldo']; ?>">
<input type="hidden"name="jumlahsaldo" value="<?php echo $row['jumlahsaldo']; ?>">
<input type="hidden"name="id" value="<?php echo $row['id']; ?>">
<input type="hidden"name="idsaldo" value="<?php echo $row['idsaldo']; ?>">
<input type="hidden" name="id_trans" value="<?php echo $row['id_trans']; ?>">
<input type="hidden" name="id_users" value="<?php echo $row['id_users']; ?>">
<input type="hidden" name="status_trans" value="finish">
<p><button style="border:1px solid green;padding:4px;color:green;font-size:18px;"type="submit"name="topup"class="btnSubmit"> Confirm</button></p><br>
</form>
	  <?php } ?>
<?php 
if($row['tipesaldo']=='deposit')
      { ?> 
<b>Detail Transfers</b><br>
<table><br>
<tr style="font-size:12px;color:#565656"><td>ID Transaction</td><td>:</td><td width="50%"> <?php echo $row['idsaldo']; ?></td></tr>
<tr style="font-size:12px;color:#565656"><td>Tanggal<td>:</td><td width="50%"> <?php echo $row["tgl_request"]; ?></td></tr>
<tr style="font-size:12px;color:#565656"><td>Owner Name</td><td>:</td><td width="50%"> <?php echo $row['first_name']; ?></td></tr>
<tr style="font-size:12px;color:#565656"><td>Invoice</td><td>:</td><td width="50%">USD  <?php
$nominal = $row['jumlahsaldo']; 
$jumlah = number_format($nominal,0,",",".");
echo $jumlah; ?></td></tr>
<tr style="font-size:12px;color:#565656"><td>Name Bank User</td><td>:</td><td width="50%"> <?php echo $row['namauser']; ?></td></tr>
<tr style="font-size:12px;color:#565656"><td>Name Bank</td><td>:</td><td width="50%"> <?php echo $row["banksaldo"]; ?></td></tr>
<tr style="font-size:12px;color:#565656"><td>Account Number</td><td>:</td><td width="50%"> <?php echo $row["nomorrek"]; ?></td></tr>
<tr style="font-size:12px;color:#565656"><td>
<br><br>Already transfered to admin bank account:<br>
Name bank: <?php 
$namabank=$row['banksaldo'];
$her=mysqli_query($mysqli, "SELECT * FROM infobank where namabank like '%".$namabank."%'");
$mul=mysqli_fetch_array($her);
echo $mul['namabank'];?><br>
Account Number: <?php echo $mul['norek'];?><br>
Name: <?php echo $mul['namaorang'];?><br><br>
if payment user <?php echo $row['first_name']; ?> already transfered to administrator bank, click confirm.

</td></tr>
</table>
<form name="frmUser"method="post"action="<?php echo $_SERVER['PHP_SELF']?>"><br><br>
<center>
<input type="hidden"name="saldo" value="<?php echo $row['saldo']; ?>">
<input type="hidden"name="jumlahsaldo" value="<?php echo $row['jumlahsaldo']; ?>">
<input type="hidden"name="id" value="<?php echo $row['id']; ?>">
<input type="hidden"name="idsaldo" value="<?php echo $row['idsaldo']; ?>">
<input type="hidden" name="id_trans" value="<?php echo $row['id_trans']; ?>">
<input type="hidden" name="id_users" value="<?php echo $row['id_users']; ?>">
<input type="hidden" name="status_trans" value="finish">
<p><button style="border:1px solid green;padding:4px;color:green;font-size:18px;"type="submit"name="deposit"class="btnSubmit"> Confirm</button></p><br>
</form>
	  <?php } ?>
	  <?php 
if($row['tipesaldo']=='withdraw')
      { ?>
<b>Withdraw</b><br>
<table><br>
<tr style="font-size:12px;color:#565656"><td>Nota</td><td>:</td><td width="50%"> <?php echo $row['idsaldo']; ?></td></tr>
<tr style="font-size:12px;color:#565656"><td>Tanggal<td>:</td><td width="50%"> <?php echo $row["tgl_request"]; ?></td></tr>
<tr style="font-size:12px;color:#565656"><td>Name user</td><td>:</td><td width="50%"> <?php echo $row['first_name']; ?></td></tr>
<tr style="font-size:12px;color:#565656"><td>Amount Withdraw</td><td>:</td><td width="50%">USD  <?php
$nominal = $row['jumlahsaldo']; 
$jumlah = number_format($nominal,0,",",".");
echo $jumlah; ?></td></tr>
<tr style="font-size:12px;color:#565656"><td>Owner name</td><td>:</td><td width="50%"> <?php echo $row['namauser']; ?></td></tr>
<tr style="font-size:12px;color:#565656"><td>Bank Name</td><td>:</td><td width="50%"> <?php echo $row["banksaldo"]; ?></td></tr>
<tr style="font-size:12px;color:#565656"><td>Account number</td><td>:</td><td width="50%"> <?php echo $row["nomorrek"]; ?><br><br>
if admin already transfered payment to bank <?php echo $row['first_name']; ?>, please Confirm.

</td></tr>
</table>
<form name="frmUser"method="post"action="<?php echo $_SERVER['PHP_SELF']?>"><br><br>
<center>
<input type="hidden"name="saldo" value="<?php echo $row['saldo']; ?>">
<input type="hidden"name="jumlahsaldo" value="<?php echo $row['jumlahsaldo']; ?>">
<input type="hidden"name="id" value="<?php echo $row['id']; ?>">
<input type="hidden"name="idsaldo" value="<?php echo $row['idsaldo']; ?>">
<input type="hidden"name="id_users" value="<?php echo $row['id_users']; ?>">
<p><button style="border:1px solid green;padding:4px;color:green;font-size:18px;"type="submit"name="withdraw"class="btnSubmit"> Confirm</button></p><br>
</form>
	  <?php } ?></center><br>
</center><br>
<a href="delete.php?idsaldo=<?php echo $_GET['idsaldo']; ?>"style="float:right;color:red">delete if nothing payment from user</a><br>
<a href="index.php"style="color:orange">Back</a>
</center></div>
</body>