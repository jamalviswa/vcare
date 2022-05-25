<?php
//including the database connection file
include_once("../dbconnect.php");

//fetching data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM kendaraan ORDER BY idambulance Asc");
?>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/> 
<link rel="stylesheet"type="text/css"href="../button.css"/>
<html>
<body><center>
<h3>Data Mitra Ambulance dan pemadam Kebakaran</h3></center>
<table width="100%;background:#fff"><tr>
<td style="border-right:none;background:none"></td><td style="border-right:none;background:none"><center>
<a href="index.php"><div style="background:green;width:200px" class="testbutton"><small>Tampilkan data mitra</small></div></a>
</center></td>
<td style="border-right:none;background:none"></td><td style="border-right:none;background:none"><center>
<a href="ambulance.html"><div style="background:green;width:200px" class="testbutton"><small>Tambah Data Ambulance dan Pemadam</small></div></a>
</center></td>
<td style="border-right:none;background:none">
<center><a href="ambulanceprint.php" target="blank"><button id="cmd" style="background:green;border:none"><div style="background:green;width:200px" class="testbutton"><small>Print Data Ambulance dan Pemadam</small></div></button></a>
</center></td>
</tr></table>
<div id="content">
<table width='100%'>

	<tr>
	<th >Foto mitra</th>
		<th >Nama mitra</th>
		<th >Pria / Wanita</th>
		<th >Kategori</th>
		<th >Instansi</th>
		<th >No KTP/NIK</th>
		<th >No. SIM</th>
		<th >Tanggal berakhir SIM</th>
		<th >No. Plat mobil</th>
		<th >Merek Mobil</th>
		<th >Warna Mobil</th>
	<th >Foto SIM</th>
	<th >Foto Mobil</th>
		<th >Alamat Tinggal</th>
		<th >Nomor handphone</th>
		<th >Email</th>
<th >(x)</th>
	
		
	</tr>
	<?php 
	while($res = mysqli_fetch_array($result)) { 		
		echo "<tr>";
		echo "<td width=10%><img width=100px src=../../foto_mitra/$res[profil_foto]> </img></td>";
		echo "<td width=15%>".$res['nama_mitra']."</td>";
		echo "<td width=10%>".$res['jeniskelamin']."</td>";
		echo "<td width=5%>".$res['tipe_petugas']."</td>";
		echo "<td width=5%>".$res['instansi_kendaraan']."</td>";
		echo "<td width=5%>".$res['ktp_nik']."</td>";
		echo "<td width=5%>".$res['no_sim']."</td>";
		echo "<td width=5%>".$res['akhir_sim']."</td>";
		echo "<td width=5%>".$res['plat_kendaraan']."</td>";
		echo "<td width=5%>".$res['merek_kendaraan']."</td>";
		echo "<td width=5%>".$res['warna_kendaraan']."</td>";
		echo "<td width=10%><img width=100px src=../../foto_mitra/$res[foto_sim]> </img></td>";
		echo "<td width=10%><img width=100px src=../../foto_mitra/$res[foto_kendaraan]> </img></td>";
		echo "<td width=5%>".$res['alamat']."</td>";	
		echo "<td width=15%>".$res['handphone']."</td>";
		echo "<td width=5%>".$res['email_kendaraan']."</td>";
		echo "<td width=5%> <a href=\"mobildelete.php?idambulance=$res[idambulance]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
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
