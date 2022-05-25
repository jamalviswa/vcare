<html>
<body>
<?php
//including the database connection file
include_once("../dbconnect.php");
if(isset($_POST['submit'])) {	
	$latsensor = $_POST['latsensor'];
	$lngsensor = $_POST['lngsensor'];
	$nama_sensor = $_POST['nama_sensor'];
$result = mysqli_query($mysqli, "INSERT INTO sensor(nama_sensor,latsensor,lngsensor) VALUES('$nama_sensor','$latsensor','$lngsensor')");
header("Location:index.php");		//display success message
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='index.php'>View Result</a>";
	}
	
?>
</body>
</html>
