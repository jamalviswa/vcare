<?php
//including the database connection file
include_once("../dbconnect.php");

//fetching data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM jw_menu_detail");
?>
<link rel="stylesheet"type="text/css"href="../button.css"/>
<html>
<body><h3><center>Pengaturan Kategori Menu</center></h3><br>
<a style="padding:10px;color:#fff;background:#1e941e;"href="inputkategori.php#home">Tambah Kategori Baru</a>
<br><br>
	<table width='100%' border=0>

	<tr>
		
		<th>gambar</th>
		<th>Nama Ketegori barang</th>
		<th>-/-</th>
		<th>(x)</th>
	</tr>
	<?php 
	while($res = mysqli_fetch_array($result)) { 		
		echo "<tr>";
		echo "<td>";?>
		<img width="100px" src="../../fotobarang/<?php echo $res['gambar'];?>"> </img>
		<?php echo "</td>";
		echo "<td>".$res['menu_name']."</td>";
		echo "<td> <a style=font-weight:bold;color:orange href=\"updatekategori.php?menu_detail_id=$res[menu_detail_id]\" >Edit kategori</a></td>";	
		echo "<td> <a href=\"deletekategori.php?menu_detail_id=$res[menu_detail_id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Hapus</a></td>";		
	}
	?>
	</table>
</body>
</html>
