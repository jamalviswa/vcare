<?php
//including the database connection file
include("../dbconnect.php");

//getting id of the data from url
$menu_detail_id = $_GET['menu_detail_id'];

//deleting the row from table
$result = mysqli_query($mysqli, "DELETE FROM jw_menu_detail WHERE menu_detail_id=$menu_detail_id");

//redirecting to the display page (index.php in our case)
header("Location:kategori.php");
?>

