<?php
//including the database connection file
include("dbconnect.php");
//getting id_trans of the data from url
$id_trans = $_GET['id_trans'];
//deleting the row from table
$res=mysqli_query($mysqli, "SELECT * FROM transaksi WHERE id_trans='$id_trans'");
$rows=mysqli_fetch_array($res);
$id=$rows['id_users'];
$mes=mysqli_query($mysqli, "SELECT * FROM users WHERE id='$id'");
$jows=mysqli_fetch_array($mes);
$result = mysqli_query($mysqli, "UPDATE transaksi set tipebayar='cash', status_trans='otw' where id_trans='$id_trans'");
//redirecting to the display page (index.php in our case)
header("Location:about.php#otw");
?>

