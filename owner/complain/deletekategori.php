<?php
//including the database connection file
include("../dbconnect.php");

//getting id of the data from url
$idcontact = $_GET['idcontact'];

//deleting the row from table
$result = mysqli_query($mysqli, "DELETE FROM contact WHERE idcontact=$idcontact");

//redirecting to the display page (index.php in our case)
header("Location:index.php");
?>

