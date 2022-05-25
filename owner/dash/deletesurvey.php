<?php
//including the database connection file
include("../dbconnect.php");

//getting id of the data from url
$idsurvey= $_GET['idsurvey'];

//deleting the row from table
$result = mysqli_query($mysqli, "DELETE FROM survey WHERE idsurvey=$idsurvey");

//redirecting to the display page (index.php in our case)
header("Location:survey.php");
?>

