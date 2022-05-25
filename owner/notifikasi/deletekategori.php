<?php
//including the database connection file
include("../dbconnect.php");

//getting id of the data from url
$idevent = $_GET['idevent'];

//deleting the row from table
$result = mysqli_query($mysqli, "DELETE FROM event WHERE idevent=$idevent");

//redirecting to the display page (index.php in our case)
header("Location:index.php");
?>

