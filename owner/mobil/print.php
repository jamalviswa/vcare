<?php
//including the database connection file
include_once("../dbconnect.php");

//fetching data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM car");
?>
<link rel="stylesheet"type="text/css"href="../button.css"/>
<html>
<body style="padding:25px;"onload="window.print()">
<table width="100%;background:#fff"><tr>
<td style="border-right:none;background:none;color:grey"><center>
<h3>Data Kendaraan yang disewakan pada Trol</h3>
</center></td>
</tr></table>
	<table width='100%' border=0>
	<tr>
		<th>Foto Mobil</th>
		<th>Rincian Mobil</th>
		<th width="10%">1 Jam</th>
		<th width="10%">6 Jam</th>
		<th width="10%">12 Jam</th>
		<th width="10%">24 Jam</th>
		<th width="10%">1 Bulan</th>
	</tr>
	<?php 
	while($res = mysqli_fetch_array($result)) { 		
		echo "<tr>";
		echo "<td><img width=150px src=../../fotobarang/$res[gambarmobil]> </img></td>";
		echo "<td><br>".$res['nama_mobil']."<br>(".$res['merkmobil'].")<br>".$res['deskripsimobil']."<br></td>";
		echo "<td> IDR ".$res['1jam']."</td>";
		echo "<td> IDR ".$res['6jam']."</td>";
		echo "<td> IDR ".$res['harga_12jam']."</td>";
		echo "<td> IDR ".$res['harga_24jam']."</td>";
		echo "<td> IDR ".$res['1bulan']."</td>";
	}
	?>
	</table>
</body>
</html>