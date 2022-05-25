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
$result = mysqli_query($mysqli, "SELECT * FROM departement");
?>

<link rel="stylesheet"type="text/css"href="../../button.css"/>
<html>
<body style="padding:10px;">
<h3><center>Pengaturan Data Departement dan Akses Menu</center></h3><br>
<a href="../index.php" style="background:orange;padding:5px;color:#fff;text-decoration:none">< Back</a><br><br><br>
<a style="padding:10px;color:#fff;background:#1e941e;"href="inputkategori.php#home">Tambah Departement</a>
<br><br>
	<table width='100%' border=0>

	<tr>
		
		<th>Nama Departement</th>
		<th>Deskripsi</th>
		<th>Kapasitas</th>
		<th>Notifikasi</th>
		<th>Topup</th>
		<th>Transaksi</th>
		<th>User</th>
		<th>Driver</th>
		<th>Admin</th>
		<th>Tarif layanan</th>
		<th>Voucher</th>
		<th>Setting bank</th>
		<th>(x)</th>
	</tr>
	<?php 
	while($res = mysqli_fetch_array($result)) { 		
		echo "<tr>";
		echo "<td>".$res['departement']."</td>";
		echo "<td>".$res['keterangandepartement']."</td>";
		echo "<td>".$res['kapasitasdepartement']." orang</td>";
		echo "<td>".$res['notifikasi']."</td>";
		echo "<td>".$res['topup']."</td>";
		echo "<td>".$res['payment']."</td>";
		echo "<td>".$res['user']."</td>";
		echo "<td>".$res['narasumber']."</td>";
		echo "<td>".$res['admin']."</td>";
		echo "<td>".$res['client']."</td>";
		echo "<td>".$res['voucher']."</td>";
		echo "<td>".$res['bank']."</td>";
		echo "<td> <a href=\"deletekategori.php?iddepartement=$res[iddepartement]\" onClick=\"return confirm('Are you sure you want to delete?')\">Hapus</a></td>";		
	}
	?>
	</table>
	<br><br>
	
</body>
</html>
