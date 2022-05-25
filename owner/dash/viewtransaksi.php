
   <body style="padding:20px;font-family:segoe UI"> 
    <?php
	include_once("../dbconnect.php");
$id_mitra = $_GET['id_mitra'];
	$query=mysqli_fetch_array(mysqli_query($mysqli, "select * from mitra where id_mitra='$id_mitra'"));
	$surgery=mysqli_fetch_array(mysqli_query($mysqli, "select * from ratings where art_id='$id_mitra'"));
$fulgery=mysqli_fetch_array(mysqli_query($mysqli, "select * from layanan where id_layanan='1'"));
$jasaharga=$fulgery['harga_layanan'];
$comprofit=$jasaharga*20;
$omset=$jasaharga-$comprofit*$ifu;
$komisi=$res['comission'];
$referalfee=$comprofit-16500*$komisi;
$comtotal=$comprofit*$jimbo-$referalfee;
$comtotal=number_format($comtotal,0,",",".");
$referalfee=number_format($referalfee,0,",",".");
$komisi=number_format($komisi,0,",",".");
$omset=number_format($omset,0,",",".");
$comprofit=number_format($comprofit,0,",",".");
$jasaharga=number_format($jasaharga,0,",",".");
$bugery = "SELECT COUNT(*) AS total FROM transaksi where id_mitra='$id_mitra' and status_trans='finish'"; 
$jenset = mysqli_query($mysqli, $bugery); 
$pinset = mysqli_fetch_assoc($jenset); 
$jimbo = $pinset['total'];

$ceko = "SELECT COUNT(*) AS total FROM transaksi where id_mitra='$id_mitra' and status_trans='dijemput'"; 
$pinko = mysqli_query($mysqli, $ceko); 
$kimi = mysqli_fetch_assoc($pinko); 
$ifu = $kimi['total']; 
 
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
	
<table width="100%">
  <tr>
    <th class="" colspan="8"><center><h2>Transaksi Referral <?php echo $nama_mitra;?></h2></center>  <p style="border-bottom:1px solid "></p></th>
  </tr>
  
  
  <tr>
    <td class="">Tanggal :</td>
    <td class=""></td>
    <td class=""></td>
    <td class="">Company percentage :</td>
    <td class=""> 20</td>
    <td class=""></td>
    <td class=""></td>
    <td class=""></td>
  </tr>
  <tr>
    <td class="">Nama :</td>
    <td class=""><?php echo $nama_mitra;?></td>
    <td class=""></td>
    <td class="">Position :</td>
    <td class=""><?php echo $sebagai;?></td>
    <td class=""></td>
    <td class=""></td>
    <td class=""></td>
  </tr>
  <tr>
    <td class="">NIK :</td>
    <td class=""><?php echo $nik;?></td>
    <td class=""></td>
    <td class=""></td>
    <td class=""></td>
    <td class=""></td>
    <td class=""></td>
    <td class=""></td>
  </tr>
  <tr>
    <td class="">Rating :</td>
    <td class=""><?php $ratings=$total_points/$total_votes;echo ''.ceil($ratings); ?></td>
    <td class=""></td>
    <td class=""></td>
    <td class=""></td>
    <td class=""></td>
    <td class=""></td>
    <td class=""></td>
  </tr>
</table>
	
		<table width='100%'>
	<tr style="background: orange;">
	<th ><center>Transaksi Sukses</center></th>
		<th ><center>Transaksi Pending/Gagal</center></th>
		<th ><center>Harga Jasa</center></th>
		<th ><center>Nama Mitra</center></th>
		<th ><center>Company profit</center></th>
		<th ><center>Total Omset</center></th>
		<th ><center>Comission %</center></th>
		<th ><center>Total Referral Fee</center></th>
		<th ><center>Total Company</center></th>
	</tr>
	<?php 
	$result=mysqli_query($mysqli, "select * from mitra where sebagai='referal' AND referalmitra='$referalmitra'");
	while($res = mysqli_fetch_array($result)) { 		
		echo "<tr style=border-top:1px solid >";
		echo "<td width=10%><center>".$jimbo."</center></td>";
		echo "<td width=5%><center>".$ifu."</center></td>";
		echo "<td width=5%><center>".$res['nama_mitra']."</center></td>";
		echo "<td width=5%><center>USD ".$jasaharga."</center></td>";
		echo "<td width=10%><center>USD ".$comprofit."</center></td>";
		echo "<td width=5%><center>USD ".$omset."</center></td>";	
		echo "<td width=5%><center>".$res['comission']." %</center></td>";
		echo "<td width=5%><center>USD ".$referalfee."</center></td>";
		echo "<td width=5%><center>USD ".$comtotal."</center></td>";
		echo "</tr>";	
		
	}
	?>
	</table>
	</body>