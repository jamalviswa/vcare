<?php
//including the database connection file
include("../dbconnect.php");

//getting id of the data from url
$iddepartement = $_GET['iddepartement'];

//deleting the row from table
$result = mysqli_query($mysqli, "DELETE FROM departement WHERE iddepartement=$iddepartement");

//redirecting to the display page (index.php in our case)
header("Location:index.php");
?>

