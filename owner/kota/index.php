<?php
//including the database connection file
include_once("../dbconnect.php");

//fetching data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM sensor");
?>
<link rel="stylesheet"type="text/css"href="../button.css"/>
<html>
<body><br><br>

<h3>Service City Settings</h3><table width="100%"><tr><td>
Add latitude and longitude for marketing target users<br> 
For example, the application is only used specifically for residents of the city of Melbourne Melbourne. If there are requests from application users from Tokyo, Japan cannot be served by the driver<br>
The driver application will detect user requests in the area around the location point with a distance of 900km. 
Admin can add another point for large location</td><td>
<a href="add.html"><div class="testbutton" style="float:right">Add New Data</div></a><br/></td></tr></table>
	<table width='100%' border=0>

	<tr>
		<th>Name point/City</th>
		<th>Latitude</th>
		<th>Longitude</th>
<th>x</th>
	
	</tr>
	<?php 
	while($res = mysqli_fetch_array($result)) { 		
		echo "<tr>";
		echo "<td>".$res['nama_sensor']."</td>";
		echo "<td>".$res['latsensor']."</td>";
		echo "<td>".$res['lngsensor']."</td>";
echo "<td> <a href=\"delete.php?id_sensor=$res[id_sensor]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";				
	}
	?>
	</table>
</body>
</html>