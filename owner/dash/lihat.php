
<head><meta charset="UTF-8"/>
<meta http-equiv="X-UA-Compatible"content="IE=edge,chrome=1"><meta name="viewport"content="width=device-width, initial-scale=1.0">
<link rel="stylesheet"type="text/css"href="../../demo.css"/><link rel="stylesheet" href="../../css/bemo.css">
<?php
//including the database connection file
include_once("../dbconnect.php");

//fetching data in descending order (lastest entry first)

$id_trans = $_GET['id_trans'];
$result = mysqli_query($mysqli, "SELECT * FROM transaksi where id_trans='$id_trans'");
?>
<link rel="stylesheet"type="text/css"href="../button.css"/>
<html>
<body>
<h3>Data Transaksi Mypass App</h3>
Untuk Mencari data nama berdasarkan kata, tanggal dan angka, klik tombol "ctrl+F" lalu ketikkan kata.<br><table width='100%' border=0>

	<tr>
		<th>Kode transaksi</th>
		<th>Invoice</th>
		<th>Services</th>
		<th>alamat</th>
		<th>Mobil</th>
		<th>Deskripsi</th>
		<th>Foto STNK</th>
		<th>Foto BPKB</th>
		<th>Foto KTP</th>
		<th>Foto MOBIL</th>
		<th>Mitra Upload</th>
	
	</tr>
	<?php 
	while($res = mysqli_fetch_array($result)) {
		echo "<tr>";
		echo "<td>".$res['kodetrans']."</td>";
		echo "<td>".$res['invoice']."</td>";
		echo "<td>".$res['layanan']."</td>";
		echo "<td width=20%>".$res['alamat']."</td>";
		echo "<td>".$res['kendaraan']."</td>";
		echo "<td width=10%>".$res['deskripsi']."</td>";
		echo "<td width=30%><img width=100px src=../../attach/$res[foto_stnk]> </img></td>";
		echo "<td width=30%><img width=100px src=../../attach/$res[foto_bpkb]> </img></td>";
		echo "<td width=30%><img width=100px src=../../attach/$res[foto_ktp]> </img></td>";
		echo "<td width=30%><img width=100px src=../../attach/$res[foto_mobil]> </img></td>";
		echo "<td width=30%><img width=100px src=../../attach/$res[mitra_attach]> </img></td>";
		echo "<tr>";
		}
	?>
	</table>
</body>
</html>
