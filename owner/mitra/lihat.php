<body style="padding:20px;font-family:segoe UI"> 
    <?php
	include_once("../dbconnect.php");
$id_mitra = $_GET['id_mitra'];
	$query=mysqli_fetch_array(mysqli_query($mysqli, "select * from mitra where id_mitra='$id_mitra'"));
$id_mitra=$query['id_mitra'];
	$saldo = $query['saldo'];
	$bankmitra = $query['bankmitra'];
	$rekmitra = $query['rekmitra'];
	$namarekmitra = $query['namarekmitra'];
	$jambuka = $query['jambuka'];
	$alamat = $query['alamat'];
	$kecamatan = $query['kecamatan'];
	$kota = $query['kota'];
	$propinsi = $query['propinsi'];
	$nama_mitra = $query['nama_mitra'];
	$foto_mitra= $query['foto_mitra'];
	$kelamin = $query['kelamin'];
	$latmitra = $query['latmitra'];
	$lngmitra = $query['lngmitra'];
	$nomorhp = $query['nomorhp'];
	$no_ktp = $query['no_ktp'];
	$mitra_email = $query['mitra_email'];
	$mitra_pass = $query['mitra_pass'];
	$dokumen = $query['dokumen'];
	$sebagai = $query['sebagai'];
	$tanggal = $query['tanggal'];
	$suspen = $query['suspen'];
	$idunik = $query['idunik'];
	$title = $query['title'];
	$departement = $query['departement'];
	$jabatan = $query['jabatan'];
	
	?>
	<center><h2>Profile</h2></center>
<table >
  <tr >
    <th style="padding:20px;" rowspan="19">
<img src="../../foto_mitra/<?php echo $foto_mitra;?>" style="width:350px"/><br><br>
<img src="../../foto_mitra/<?php echo $dokumen;?>" style="width:350px"/>	</th>
    <th ></th>
    <th ></th>
    <th ></th>
  </tr>
<tr>
<td>Registered As</td>
      <td>:</td>
<td>
<?php 
	if($query['sebagai']=='superadmin')
      {
	
		echo "Owner";	
  }
  if($query['sebagai']=='pic')
      {
echo "PIC";
  } if($query['sebagai']=='Admin')
      {
echo "Billing Admin";
  }
?></td>
</tr>
<tr>
<td>Name</td>
      <td>:</td>
<td><?php echo $title;?> <?php echo $nama_mitra;?></td>
</tr>
<tr>
<td>Gender</td>
      <td>:</td>
<td><?php echo $kelamin;?></td>
</tr>
<tr>
<td>Email</td>
      <td>:</td>
<td><?php echo $mitra_email;?></td>
</tr>

<tr>
<td>ID Card</td>
      <td>:</td>
<td><?php echo $no_ktp;?></td>
</tr>

<tr>
<td>Phone</td>
      <td>:</td>
<td><?php echo $nomorhp;?></td>
</tr>
<tr>
<td>Address</td>
      <td>:</td>
<td><?php echo $alamat;?><br><?php echo $kecamatan;?><br><?php echo $kota;?> - <?php echo $propinsi;?></td>
</tr>
<tr>
<td>Last Updated</td>
      <td>:</td>
<td><?php echo $tanggal;?></td>
</tr>
<tr>
<td>ID Pegawai</td>
      <td>:</td>
<td><?php echo $idunik;?></td>
</tr>
<tr>
<td>Departement</td>
      <td>:</td>
<td><?php echo $departement;?></td>
</tr>

<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
  
    </table>
    <p style="border-bottom:1px solid "><br /></p>
	
	</body>