<?php
//including the database connection file
include("../dbconnect.php");
//getting id of the data from url
//deleting the row from table
$result = mysqli_query($mysqli, "DELETE FROM panic WHERE statuspanic='dijemput'");
//redirecting to the display page (index.php in our case)
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>

