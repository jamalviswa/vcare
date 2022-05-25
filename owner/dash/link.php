<?php
//including the database connection file
include_once("../dbconnect.php");

//fetching data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM mitra INNER JOIN ratings ON mitra.id_mitra=ratings.art_id");
?>
<link rel="stylesheet"type="text/css"href="../button.css"/>
<html>
<body style="color:">
<center><h3>Transaksi Referal Mypass App</h3></center>
Untuk Mencari data nama berdasarkan kata, tanggal dan angka, klik tombol "ctrl+F" lalu ketikkan kata.<br><table width='100%' border=0>

<tr>
		<th>Nama</th>
		<th>NIK</th>
		<th>Rating</th>
		<th>Company %</th>
		<th>Referal List</th>
		<th>Comission %</th>
		<th>Position</th>
		<th>Transaction</th>
	
	</tr>
	<?php 
	while($res = mysqli_fetch_array($result)) {
	$total_votes=$res['total_votes'];
	$total_points=$res['total_points'];
		echo "<tr>";
		echo "<td>".$res['nama_mitra']."</td>";
		echo "<td>".$res['nik']."</td>";
echo "<td>".$ratings=$total_points/$total_votes;echo ''.ceil($ratings);"</td>";
echo "<td>20</td>";
echo "<td> <a style=padding:10px;background:green;color:#fff href=\"viewreferal.php?id_mitra=$res[id_mitra]\">View Referal</a></td>";		
		echo "<td>".$res['comission']."</td>";
		echo "<td>".$res['sebagai']."</td>";
		echo "<td> <a target=_blank style=padding:10px;background:green;color:#fff href=\"viewtransaksi.php?id_mitra=$res[id_mitra]\" >View Transaction</a></td>";		
	}
	?>
	</table>
</body>
</html>
