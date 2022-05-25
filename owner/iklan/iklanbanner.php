<?php
//including the database connection file
include_once("../dbconnect.php");

//fetching data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM sopir ORDER BY id_sopir Asc");
?>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/> 
<link rel="stylesheet"type="text/css"href="../button.css"/>
<html>
<body><center>
<h3>Data Restoran Kunera Food</h3></center>
<table width="100%;background:#fff"><tr>
<td style="border-right:none;background:none"><center>
<a href="add.php"><div style="background:green;width:200px" class="testbutton"><small>Tambah Data Restoran dan admin</small></div></a>
</center></td>
<td style="border-right:none;background:none">
<center><a href="lacaksales.php"><div style="background:green;width:200px" class="testbutton"><small>Tampilkan Lokasi Semua Restoran</small></div></a>
</center></td>
<td style="border-right:none;background:none">
<center><a href="print.php" target="blank"><button id="cmd" style="background:green;border:none"><div style="background:green;width:200px" class="testbutton"><small>Print Data</small></div></button></a>
</center></td>
</tr></table>
<div id="content">
<table width='100%'>

	<tr>
	<th >Foto</th>
		<th >Nama</th>
		<th >Pria / Wanita</th>
		<th >Alamat Tinggal</th>
		<th >Nomor handphone</th>
		<th >Email</th>	
<th>-</th>
<th >(x)</th>
	
		
	</tr>
	<?php 
	while($res = mysqli_fetch_array($result)) { 		
		echo "<tr>";
		echo "<td width=10%><img width=100px src=../../foto_sopir/$res[foto_sopir]> </img></td>";
		echo "<td width=15%><b>".$res['nama_sopir']."  (".$res['kelamin'].")</b><br></td>";
		echo "<td width=5%>".$res['kelamin']."</td>";	
		echo "<td width=15%>".$res['kendaraan']."</td>";
		echo "<td width=5%>".$res['nomorhp']."</td>";
		echo "<td width=10%>".$res['sopir_email']."</td>";
		echo "<td width=10%> <a href=\"updatekordinat.php?id_sopir=$res[id_sopir]\">Edit Lokasi</a></td>";
		echo "<td width=5%> <a href=\"delete.php?id_sopir=$res[id_sopir]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
		echo "</tr>";	
		
	}
	?>
	</table><br>
</div>
<div id="editor"></div>
</body>
</html>
<script>
var doc = new jsPDF();
var specialElementHandlers = {
    '#editor': function (element, renderer) {
        return true;
    }
};

$('#cmd').click(function () {
    doc.fromHTML($('#content').html(), 15, 15, {
        'width': 170,
            'elementHandlers': specialElementHandlers
    });
    doc.save('sample-file.pdf');
});
</script>
