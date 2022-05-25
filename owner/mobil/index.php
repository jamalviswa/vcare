<?php
//including the database connection file
include_once("../dbconnect.php");

//fetching data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM car");
?>
<link rel="stylesheet"type="text/css"href="../button.css"/>
<html>
<body>
<table width="100%;background:#fff"><tr>
<td style="border-right:none;background:none;color:grey"><center>
<h3>Data Kendaraan yang disewakan pada Trol</h3><br>
admin dapat mengelola data mobil seperti input data mobil, edit deskripsi dan harga sewa atau menghapus data
</center></td>
<td style="border-right:none;background:none">
<center><a href="print.php"><button id="cmd" style="background:green;border:none"><div style="background:green;width:200px" class="testbutton">Cetak Data mobil</div></button></a>
<br><br>
<a href="add.php"><button id="cmd" style="background:#09c;border:none"><div style="background:#09c;width:200px" class="testbutton">Tambah Data mobil</div></button></a>
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
		<th>Navigation</th>
	</tr>
	<?php 
	while($res = mysqli_fetch_array($result)) { 		
		echo "<tr>";
		echo "<td><img width=150px src=../../fotobarang/$res[gambarmobil]> </img></td>";
		echo "<td><br>".$res['nama_mobil']."<br>(".$res['merkmobil'].")<br>".$res['deskripsimobil']."<br></td>";
		echo "<td> IDR ".$res['harga1jam']."</td>";
		echo "<td> IDR ".$res['harga6jam']."</td>";
		echo "<td> IDR ".$res['harga_12jam']."</td>";
		echo "<td> IDR ".$res['harga_24jam']."</td>";
		echo "<td> IDR ".$res['harga1bulan']."</td>";
		echo "<td width=10%> <a style=padding:5px;color:#fff;background:red href=\"delete.php?id_mobil=$res[id_mobil]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a><br><br>
		<a style=padding:5px;color:#fff;background:puUSD e target=_blank href=lihat.php?id_mobil=$res[id_mobil]>Lihat Detail</a><br><br>
		<a style=padding:5px;color:#fff;background:Orange href=ubah.php?id_mobil=$res[id_mobil]>Edit</a>
		</td>";	
	}
	?>
	</table>
</body>
</html>
