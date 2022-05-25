<?php
//including the database connection file
include("dbconnect.php");
//getting id of the data from url
$id_trans = $_GET['id_trans'];
//deleting the row from table
$result = mysqli_query($mysqli, "UPDATE `counterinterview` SET `statusinterview` = 'off' WHERE `counterinterview`.`id_trans` = '$id_trans';");
$result = mysqli_query($mysqli, "UPDATE `transaksi` SET `status_trans` = 'finish', `aktif` = 'no' WHERE `transaksi`.`id_trans` = '$id_trans';");

//redirecting to the display page (index.php in our case)
header("Location:history.php#home");
?>

