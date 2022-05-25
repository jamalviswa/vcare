<?php
//including the database connection file
include("dbconnect.php");
//getting id of the data from url
$idcatalog = $_GET['idcatalog'];
//deleting the row from table
$him=mysqli_query($mysqli, "SELECT * FROM keranjang WHERE idcatalog='$idcatalog'");
$gims = mysqli_fetch_array($him);
$idbarang=$gims['idbarang'];
$quantity=$gims['quantity'];
$tagalog=$gims['idcatalog'];

$lim=mysqli_query($mysqli, "SELECT * FROM jw_product WHERE product_id='$idbarang'");
$mim = mysqli_fetch_array($lim);
$product_id=$mim['product_id'];
$adastock=$mim['stock'];
$adasales=$mim['sales'];
$stockupdate=$adastock+$quantity;
$sales=$adasales-$quantity;
$result = mysqli_query($mysqli, "UPDATE jw_product set stock='$stockupdate', sales='$sales' WHERE product_id='$product_id'");

$result = mysqli_query($mysqli, "DELETE FROM keranjang WHERE idcatalog='$tagalog'");
echo '<script language="javascript">';
echo 'alert("Berhasil dihapus")';
echo '</script>';
//redirecting to the display page (index.php in our case)
header("Location:mobil.php#cart");
?>

