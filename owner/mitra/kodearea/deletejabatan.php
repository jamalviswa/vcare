<?php
//including the database connection file
include("../dbconnect.php");

//getting id of the data from url
$idjabatan = $_GET['idjabatan'];

//deleting the row from table
$result = mysqli_query($mysqli, "DELETE FROM jabatan WHERE idjabatan=$idjabatan");

//redirecting to the display page (index.php in our case)
header("Location:index.php");
?>

