<?php
include 'dbconnect.php'; 
// sorry need to get id 
$id = $_POST['delete_id'];
//getting id of the data from url
//deleting the row from table
$him=mysqli_query($mysqli, "SELECT * FROM keranjang WHERE idcatalog='$id'");
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

$row=mysqli_fetch_array(mysqli_query($mysqli, "select * from keranjang where idcatalog='$id'"));
$idprod=$row['product_id'];
mysqli_query($mysqli,"UPDATE `product` SET `status`='available', `kodesewa`='0' WHERE product_id='$idprod';");
$query = mysqli_query($mysqli,"DELETE FROM keranjang WHERE idcatalog='$id'");

 ?>