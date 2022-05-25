<?php
//including the database connection file
include("../dbconnect.php");

//getting id of the data from url
$id_sensor = $_GET['id_sensor'];

//deleting the row from table
$result = mysqli_query($mysqli, "DELETE FROM sensor WHERE id_sensor='$id_sensor'");

//redirecting to the display page (index.php in our case)
header("Location:index.php");
?>

