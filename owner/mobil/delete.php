<?php
//including the database connection file
include("../dbconnect.php");

//getting id of the data from url
$id_mobil = $_GET['id_mobil'];

//deleting the row from table
$result = mysqli_query($mysqli, "DELETE FROM car WHERE id_mobil='$id_mobil'");
//redirecting to the display page (index.php in our case)
header("Location:index.php");
?>

