<?php
session_start();
include_once '../dbconnect.php';

if(!isset($_SESSION['mitra']))
{
	header("Location: index.php");
}
$res=mysqli_query($mysqli, "SELECT * FROM mitra WHERE id_mitra=".$_SESSION['mitra']);
$rows=mysqli_fetch_array($res);
?>
<?php
//including the database connection file
include_once("../dbconnect.php");

//fetching data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM contact");

?>
<link rel="stylesheet"type="text/css"href="../button.css"/>
<html>
<body><h3><center>Setting contact administration for complainment</center></h3><br>
<a style="padding:10px;color:#fff;background:#1e941e;"href="inputkategori.php#home">add contact</a>
<br><br>
	<table width='100%' border=0>

	<tr>
		
		<th>No.</th>
		<th>name admin</th>
		<th>Phone</th>
		<th>-/-</th>
		<th>(x)</th>
	</tr>
	<?php 
$counter = 1; 
	while($res = mysqli_fetch_array($result)) { 		
		echo "<tr>";
		echo "<td>".$counter++."</td>";
		echo "<td>".$res['namaadmin']."</td>";
		echo "<td>".$res['phone']."</td>";
		echo "<td> <a style=font-weight:bold;color:orange href=\"updatekategori.php?idcontact=$res[idcontact]\" >Edit</a></td>";	
		echo "<td> <a href=\"deletekategori.php?idcontact=$res[idcontact]\" onClick=\"return confirm('Are you sure you want to delete?')\">delete</a></td>";		
	}
	?>
	</table><br>
	
</body>
</html>
