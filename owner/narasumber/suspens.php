<?php
//including the database connection file
include("../dbconnect.php");

//getting id of the data from url
$id= $_GET['id'];
//deleting the row from table
$result = mysqli_query($mysqli, "Update users set kunci='1' WHERE id=$id");

//redirecting to the display page (index.php in our case)
header("Location:index.php");
?>

