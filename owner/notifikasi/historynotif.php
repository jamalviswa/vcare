<?php
//including the database connection file
include_once("../dbconnect.php");

//fetching data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM event");
?>
<link rel="stylesheet"type="text/css"href="../button.css"/>
<html>
<body><h3><center>Notification Message</center></h3><br>
<a href="index.php" onclick="javascript:showDiv();"><img style="vertical-align:middle" src="../../icon/backblack.png"width="25px"/> Back</i></a><br>
<br><br>
	<table width='100%' border=0>

	<tr>
		<th>to</th>
		<th>Date</th>
		<th>Message</th>
		<th>(x)</th>
	</tr>
	<?php 
	while($res = mysqli_fetch_array($result)) { 		
		echo "<tr>";
		echo "<td>".$res['idtujuan']."</td>";
		echo "<td>".$res['tanggalevent']."</td>";
		echo "<td>".$res['pesan']."</td>";	
		echo "<td> <a href=\"deletekategori.php?idevent=$res[idevent]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
	}
	?>
	</table>
</body>
</html>
