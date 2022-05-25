<?php
//including the database connection file
include("dbconnect.php");
//getting id of the data from url
$id_trans = $_GET['id_trans'];
//deleting the row from table

$him=mysqli_query($mysqli, "SELECT * FROM transaksi WHERE id_trans='$id_trans' and aktif='yes' and status_trans='minta'");
$gims = mysqli_fetch_array($him);
$id_users=$gims['id_users'];
$id_sopir=$gims['id_sopir'];
//deleting the row from table
mysqli_query($mysqli, "UPDATE keranjang set checkout='no' WHERE aktif='yes' and id_users='$id_users' and idtrans='0' and checkout='yes'");

$result = mysqli_query($mysqli, "DELETE FROM transaksi WHERE id_trans='$id_trans' and status_trans='minta'");
//redirecting to the display page (index.php in our case)
header("Location:home.php");
?>

