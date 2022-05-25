<?php
//including the database connection file
include_once 'dbconnect.php';

//getting id of the data from url
$id = $_GET['id'];
$result = mysqli_query($mysqli, "Delete FROM driverfb WHERE id=$id");

header("Location:feedback.php");
?>

