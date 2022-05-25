<?php
//including the database connection file
include("../dbconnect.php");

//getting id of the data from url
$product_id = $_GET['product_id'];

//deleting the row from table
$result = mysqli_query($mysqli,"DELETE FROM jw_product WHERE product_id='$product_id'");
$result = mysqli_query($mysqli,"DELETE FROM keranjang WHERE idbarang='$product_id' and aktif='yes' and checkout='no'");

//redirecting to the display page (index.php in our case)
header("Location:index.php");
?>

