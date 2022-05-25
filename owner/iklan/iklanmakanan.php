<?php
//including the database connection file
include_once("../dbconnect.php");

//fetching data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM car JOIN sopir ON car.pemilikmobil=sopir.id_sopir JOIN jadwal_ads ON car.id_mobil=jadwal_ads.product_id where jadwal_ads.statusads='aktif' Order by id_ads ASC");
?>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/> 
<link rel="stylesheet"type="text/css"href="../button.css"/>
<html>
<body>
<table width="100%;background:#fff"><tr>
<td style="border-right:none;background:none;color:grey">
<center><a href="../car/index.php"><button id="cmd" style="background:orange;border:none"><div style="background:green;width:200px" class="testbutton">Back ke Standard</div></button></a>
</center>
</td>
<td style="color:#444; border-right:none;background:none"><center>
<h3>Data Kendaraan yang disewakan (Deluxe)</h3><br>
Untuk melihat data kendaraan yang ditayangkan dalam iklan Standard, klik Kendaraan Standard
</center>
</td>
</tr></table>
<div id="content">
<table width='100%'>
	<tr>
		<th >Data Iklan</th>
		<th >Kategori Iklan</th>
		<th >Data pemilik/Pengiklan</th>
		<th >Iklan Aktif</th>
		<th >Iklan Selesai</th>
		<th >Tarif Iklan</th>	
<th >(x)</th>
	</tr>
	<?php 
while($res = mysqli_fetch_array($result)) { 		
$id_ads=$res['id_ads'];
$view=mysqli_query($mysqli, "SELECT * FROM ads where id_ads='$id_ads'");
$row=mysqli_fetch_array($view);
$kodejadwal=$res['kodejadwal'];
$met=mysqli_query($mysqli, "SELECT * FROM trans_iklan where kodejadwal='$kodejadwal'");
$kal=mysqli_fetch_array($met);
		echo "<tr style=border-bottom:1px solid grey>";
		echo "<td width=10%><img width=100px src=../../fotobarang/$res[gambarmobil]> </img><br>".$res['nama_mobil']."<br>Sewa 1 Hari: USD  ".$res['harga_12jam']."<br>Sewa 1 Bulan: USD  ".$res['harga_24jam']."</td>";
		echo "<td width=15%><b>".$row['menu_ads']."</b><br>USD  ".$row['harga_ads']."/bln</td>";
		echo "<td width=5%>".$res['nama_sopir']."<br>".$res['nomorhp']."<br>".$res['kendaraan']."</td>";	
		echo "<td width=15%>".$res['time_start']."</td>";
		echo "<td width=5%>".$res['time_end']."</td>";
		echo "<td width=10%>USD  ".$kal['jumlahsaldo']."</td>";
		echo "<td width=5%> <a href=\"delete.php?idjadwal=$res[idjadwal]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
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
