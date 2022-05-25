<body style="padding:20px;font-family:segoe UI"> 
    <?php
	include_once("../dbconnect.php");
$id_mitra = $_GET['id_mitra'];
	$query=mysqli_fetch_array(mysqli_query($mysqli, "select * from mitra where id_mitra='$id_mitra'"));
	$surgery=mysqli_fetch_array(mysqli_query($mysqli, "select * from ratings where art_id='$id_mitra'"));
	$total_votes=$surgery['total_votes'];
	$total_points=$surgery['total_points'];
	$id_mitra=$query['id_mitra'];
	$nama_mitra = $query['nama_mitra'];
	$no_ktp = $query['no_ktp'];
	$foto_mitra = $query['foto_mitra'];
	$kelamin = $query['kelamin'];
	$latmitra = $query['latmitra'];
	$lngmitra = $query['lngmitra'];
	$nomorhp = $query['nomorhp'];
	$nomor_hp2 = $query['nomor_hp2'];
	$dokumen = $query['dokumen'];
	$mitra_pass= $query['mitra_pass'];
	$mitra_email = $query['mitra_email'];
	$catatan = $query['catatan'];
	$sebagai = $query['sebagai'];
	$nik = $query['nik'];
	$alamatkantor = $query['alamatkantor'];
	$alamat = $query['alamat'];
	$tempatlahir = $query['tempatlahir'];
	$tgllahir = $query['tgllahir'];
	$referalmitra = $query['referalmitra'];
	
	?>
	<center><h2>Profile Mitra</h2></center>
<table >
  <tr >
    <th style="padding:20px;" rowspan="19">
<img src="../../foto_mitra/<?php echo $foto_mitra;?>" style="width:350px"/>	</th>
    <th ></th>
    <th ></th>
    <th ></th>
  </tr>

<tr>
<td>Nama Mitra</td>
      <td>:</td>
<td><?php echo $nama_mitra;?></td>
</tr><tr>
<td>Pria / Wanita</td>
      <td>:</td>
<td><?php echo $kelamin;?></td>
</tr>
<tr>
<td>NIK</td>
      <td>:</td>
<td><?php echo $nik;?></td>
</tr>
<tr>
<td>Nomor KTP</td>
      <td>:</td>
<td><?php echo $no_ktp;?></td>
</tr>
<tr>
<td>Tempat lahir</td>
      <td>:</td>
<td><?php echo $tempatlahir;?></td>
</tr><tr>
<td>Tanggal Lahir</td>
      <td>:</td>
<td><?php echo $tgllahir;?></td>
</tr>
<tr>
<td>Alamat Tinggal</td>
      <td>:</td>
<td><?php echo $alamat;?></td>
</tr><tr>
<td>Alamat Kantor</td>
      <td>:</td>
<td><?php echo $alamatkantor;?></td>
</tr>
<tr>
<td>Nomor handphone</td>
      <td>:</td>
<td><?php echo $nomorhp;?></td>
</tr><tr>
<td>Nomor handhone 2 (opsional)</td>
      <td>:</td>
<td><?php echo $nomor_hp2;?></td>
</tr>

<tr>
<td>Email</td>
      <td>:</td>
<td><?php echo $mitra_email;?></td>
</tr>
<tr>
<td>Sebagai</td>
      <td>:</td>
<td><?php echo $sebagai;?></td>
      <td ><p></p></td>
    </tr>
	<tr>
<td>Dokumen Verifikasi</td>
      <td>:</td>
<td><?php echo $dokumen;?></td>
</tr>
<tr>
      <td>Ratings</td>
      <td>:</td>
      <td><?php $ratings=$total_points/$total_votes;echo ''.ceil($ratings); ?>
</td>
</tr>
<tr>
      <td>ID Referal</td>
      <td>:</td>
      <td><?php echo $referalmitra;?></td>
</tr>
<tr>
<td>Catatan</td>
      <td>:</td>
<td><?php echo $catatan;?></td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
    <tr>
      <td><center><a href="link.php"><div style="border-radius:20px;background:grey;padding:10px;color:#fff;font-weight:bold;">< Back</div></a></center></td>
      <td>&nbsp;</td><td>
	  <?php if($sebagai=='marketing referal'){ ?>
<center><a href="addreferal.php?id_mitra=<?php echo $id_mitra;?>"><div style="border-radius:20px;background:green;padding:10px;color:#fff;font-weight:bold;">Input Referal</div></a></center>
	  <?php }else{ ?> <?php }?>
</td>
</tr>
    </table>
    <p style="border-bottom:1px solid "><br /></p>
	
	<center><h3>Referal dari <?php echo $nama_mitra;?></h3></center>
		<table width='100%'>
	<tr style="background: orange;">
	<th ><center>Foto</center></th>
		<th ><center>No KTP</center></th>
		<th ><center>NIK</center></th>
		<th ><center>Nama Mitra</center></th>
		<th ><center>Pria / Wanita</center></th>
		<th ><center>Tempat & Tanggal lahir</center></th>
		<th ><center>Sebagai</center></th>
<th ><center>(x)</center></th>
	</tr>
	<?php 
	$result=mysqli_query($mysqli, "select * from mitra where sebagai='referal' AND referalmitra='$referalmitra'");
	while($res = mysqli_fetch_array($result)) { 		
		echo "<tr style=border-top:1px solid >";
		echo "<td width=10%><center><img width=100px src=../../foto_mitra/$res[foto_mitra]> </img></center></td>";
		echo "<td width=5%><center>".$res['no_ktp']."</center></td>";
		echo "<td width=5%><center>".$res['nik']."</center></td>";
		echo "<td width=10%><center>".$res['nama_mitra']."</center></td>";
		echo "<td width=5%><center>".$res['kelamin']."</center></td>";	
		echo "<td width=5%><center>".$res['tempatlahir'].", ".$res['tgllahir']."</center></td>";
		echo "<td width=5%><center>".$res['alamat']."</center></td>";
		echo "<td width=5%> <center><a href=\"../mitra/delete.php?id_mitra=$res[id_mitra]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></center></td>";
		echo "</tr>";	
		
	}
	?>
	</table>
	</body>