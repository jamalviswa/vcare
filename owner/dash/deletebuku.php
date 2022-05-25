<?php
//including the database connection file
include("../dbconnect.php");

//getting id of the data from url
$id_trans= $_GET['id_trans'];

//deleting the row from table
$result = mysqli_query($mysqli, "DELETE FROM transaksi WHERE id_trans=$id_trans");

//redirecting to the display page (index.php in our case)
header("Location:smartpustaka.php");
?>

