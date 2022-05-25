<?php
//including the database connection file
include("../dbconnect.php");

//getting id of the data from url
$idpromo = $_GET['idpromo'];

//deleting the row from table
$result = mysqli_query($mysqli, "DELETE FROM promo WHERE idpromo=$idpromo");

//redirecting to the display page (index.php in our case)
header("Location:index.php");
?>

