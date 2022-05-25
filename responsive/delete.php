<?php
//including the database connection file
include_once 'dbconnect.php';

//getting id of the data from url
$id = $_GET['id'];
$result = mysqli_query($mysqli, "UPDATE users SET isOpen='no' WHERE id=$id");
header("Location:dashboard.php");
?>

