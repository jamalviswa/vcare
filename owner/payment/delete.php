<?php
//including the database connection file
include("../dbconnect.php");

//getting id of the data from url
$idsaldo = $_GET['idsaldo'];

//deleting the row from table
$result = mysqli_query($mysqli, "DELETE FROM trans_user WHERE idsaldo='$idsaldo'");

//redirecting to the display page (index.php in our case)
header("Location:index.php");
?>

