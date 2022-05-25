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
      {?>
<script>document.location.href="topupuser.php#tunggu";</script><?php }};?>

<?php
//including the database connection file
include("dbconnect.php");
//getting id_trans of the data from url
$id_trans = $_GET['id_trans'];
//deleting the row from table
$res=mysqli_query($mysqli, "SELECT * FROM transaksi WHERE id_trans='$id_trans' and status_trans='dijemput'");
$rows=mysqli_fetch_array($res);
$id=$rows['id_users'];
$mes=mysqli_query($mysqli, "SELECT * FROM users WHERE id='$id'");
$jows=mysqli_fetch_array($mes);
$pointawal=$jows['saldo'];
$total_price=$rows['harga'];
$koint=$pointawal-$total_price;
$result = mysqli_query($mysqli, "UPDATE users set saldo='$koint' where id='$id'");

$siko=mysqli_query($mysqli, "SELECT * FROM transaksi WHERE id_trans='$id_trans'");
$kamsia=mysqli_fetch_array($siko);

$nama_voucher=$kamsia['nama_voucher'];
$less=mysqli_query($mysqli, "SELECT * FROM voucher WHERE idvoucher='$nama_voucher'");
$jim=mysqli_fetch_array($less);
$pointvoucher=$jim['pointvoucher'];
$lamadurasi=$jim['durasivoucher'];
if($pointvoucher=='transportasi')
            {
$tanggalSekarang=date('d-m-Y');
$newTanggalSekarang=strtotime($tanggalSekarang);
$jumlahHari=$lamadurasi;
$NewjumlahHari=86400*$jumlahHari;
$hasilJumlah = $newTanggalSekarang + $NewjumlahHari;
$timeend=date('d-m-Y', $hasilJumlah);
$result = mysqli_query($mysqli, "UPDATE transaksi set status_trans='otw', status_bayar='lunas', tipebayar='saldo', timestart='$tanggalSekarang', timeend='$timeend' WHERE id_trans='$id_trans' and status_trans='dijemput'");
			}else {
$result = mysqli_query($mysqli, "UPDATE transaksi set status_trans='otw', status_bayar='lunas', tipebayar='saldo' WHERE id_trans='$id_trans' and status_trans='dijemput'");
			}				
//redirecting to the display page (index.php in our case)
header("Location:otw.php");
?>

<?php
$jiew=mysqli_query($mysqli, "SELECT * FROM transaksi where id_users='".$_SESSION['user']."' and aktif='yes'");
while($jow=mysqli_fetch_array($jiew)){
	?><?php 
 if($jow['status_trans']=='otw')
      { ?>
<script>document.location.href="otw.php";</script><?php }};?>
