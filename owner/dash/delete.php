<?php
//including the database connection file
include("../dbconnect.php");

//getting id of the data from url
$id_trans = $_GET['id_trans'];
$keke = mysqli_query($mysqli, "SELECT * FROM transaksi WHERE id_trans='$id_trans'");
$crut= mysqli_fetch_array($keke);
$simitra=$crut['id_mitra'];
$siklien=$crut['id_users'];

$mere = mysqli_query($mysqli, "SELECT * FROM users WHERE id='$siklien'");
$kuku= mysqli_fetch_array($mere);

$awalpembelian=$crut['harga'];
$sisaldo=$kuku['saldo'];
$pembelian=$sisaldo+$awalpembelian;
mysqli_query("UPDATE `users` SET `saldo` = '$pembelian' WHERE `users`.`id` = '$siklien'");
//deleting the row from table
$result = mysqli_query($mysqli,"DELETE FROM transaksi WHERE id_trans='$id_trans'");

//redirecting to the display page (index.php in our case)
header("Location:index.php");
?>

