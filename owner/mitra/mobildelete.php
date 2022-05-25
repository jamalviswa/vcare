<?php
//including the database connection file
include("../dbconnect.php");

//getting id of the data from url
$idambulance= $_GET['idambulance'];

//deleting the row from table
$result = mysqli_query($mysqli, "DELETE FROM kendaraan WHERE idambulance=$idambulance");

//redirecting to the display page (index.php in our case)
header("Location:car.php");
?>

