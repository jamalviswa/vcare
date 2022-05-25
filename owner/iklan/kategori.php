<?php
//including the database connection file
include_once("../dbconnect.php");

//fetching data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM ads");
?>
<link rel="stylesheet"type="text/css"href="../button.css"/>
<html>
<body><h3><center>Pengaturan Harga Iklan Deluxe</center></h3><br>
<br><br>
	<table width='100%' border=0>

	<tr>
		
		<th>Menu Iklan</th>
		<th>Biaya iklan 30 Hari(per data)</th>
		<th>-/-</th>
	</tr>
	<?php 
	while($res = mysqli_fetch_array($result)) { 	
$harga_ads = $res['harga_ads']; 
$laba = number_format($harga_ads,0,",",".");	
		echo "<tr>";
		echo "<td>".$res['menu_ads']."</td>";
		echo "<td>USD  ".$laba."</td>";
		echo "<td> <a style=font-weight:bold;color:orange href=\"updatekategori.php?id_ads=$res[id_ads]\" >Edit Tarif</a></td>";	
		}
	?>
	</table>
</body>
</html>
