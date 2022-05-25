<?php
//including the database connection file
include("../dbconnect.php");

//getting id of the data from url
$idinfo = $_GET['idinfo'];

//deleting the row from table
$result = mysqli_query($mysqli, "DELETE FROM infobank WHERE idinfo=$idinfo");

//redirecting to the display page (index.php in our case)
header("Location:index.php");
?>

