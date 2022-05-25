<?php
include_once("../dbconnect.php");
$id_trans = $_GET['id_trans'];
$ght=mysqli_query($mysqli, "SELECT * FROM transaksi where id_trans='$id_trans'");
$rot=mysqli_fetch_array($ght);
$jim=mysqli_query($mysqli, "SELECT * FROM inspeksi_mobil where id_trans='$id_trans'");
$jow=mysqli_fetch_array($jim);
$dokumen=mysqli_query($mysqli, "SELECT * FROM inspeksi_dokumen where id_trans='$id_trans'");
$okumen=mysqli_fetch_array($dokumen);
$aksesoris=mysqli_query($mysqli, "SELECT * FROM inspeksi_aksesoris where id_trans='$id_trans'");
$sesoris=mysqli_fetch_array($aksesoris);
$databan=mysqli_query($mysqli, "SELECT * FROM inpeksi_databan where id_trans='$id_trans'");
$ban=mysqli_fetch_array($databan);
$dashboard=mysqli_query($mysqli, "SELECT * FROM inspeksi_interior_dashboard where id_trans='$id_trans'");
$board=mysqli_fetch_array($dashboard);
$instrumen=mysqli_query($mysqli, "SELECT * FROM inspeksi_interior_instrumen where id_trans='$id_trans'");
$men=mysqli_fetch_array($instrumen);
$injok=mysqli_query($mysqli, "SELECT * FROM inspeksi_interiorjok where id_trans='$id_trans'");
$jok=mysqli_fetch_array($injok);
$eksbody=mysqli_query($mysqli, "SELECT * FROM inspeksi_eksterior_body where id_trans='$id_trans'");
$body=mysqli_fetch_array($eksbody);
$kacalampu=mysqli_query($mysqli, "SELECT * FROM inspeksi_eksterior_kaca where id_trans='$id_trans'");
$lampu=mysqli_fetch_array($kacalampu);
$bankolong=mysqli_query($mysqli, "SELECT * FROM inspeksi_eksteriorban where id_trans='$id_trans'");
$kolong=mysqli_fetch_array($bankolong);
$olimesin=mysqli_query($mysqli, "SELECT * FROM inspeksi_mesin_oil where id_trans='$id_trans'");
$oil=mysqli_fetch_array($olimesin);
$ruangmesin=mysqli_query($mysqli, "SELECT * FROM inspeksi_ruangmesin where id_trans='$id_trans'");
$mesin=mysqli_fetch_array($ruangmesin);
$tes=mysqli_query($mysqli, "SELECT * FROM inspeksi_drive where id_trans='$id_trans'");
$drive=mysqli_fetch_array($tes);
$perlengkap=mysqli_query($mysqli, "SELECT * FROM inspeksi_perlengkapan where id_trans='$id_trans'");
$tambahan=mysqli_fetch_array($perlengkap);
	?>
<style>
table, td, th {
   padding: 5px;
}
@media all {
	.page-break	{ display: block; }
}

@media print {
	.page-break	{ display: block; page-break-before: always; }
}
</style>
	<body width="100%">
	<div class="page-break"><table style="border-collapse:collapse; width:100%;">
<img src="../../logo.jpg" width="200px"/>
<tbody>
<tr style="height:0px;">
<td colspan="5" style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>
</p></td>
</tr>
<tr style="height:0px;">
<td colspan="2" style="width:0px;padding:00pt 5,pt 00pt 5,pt ;background:rgb(199,218,241);vertical-align:top;">
<p><strong>Laporan Kondisi Kendaraan</strong></p>
</td>
<td colspan="3" style="width:0px;padding:00pt 5,pt 00pt 5,pt ;background:rgb(199,218,241);vertical-align:top;">
<p>Tanggal Inspeksi : <?php echo $jow['tanggal_inspeksi']; ?></p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;background:rgb(241,241,241);vertical-align:top;">
<table style="border-collapse:collapse; margin-left:5,pt; width:100%">
<tbody>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>No. Polisi</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>Merk</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>Model / Tipe</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>Transmisi</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>Tipe Body</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>Tahun</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>Isi Silinder</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>No. Rangka</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>No. Mesin</p>
</td>
</tr>
</tbody>
</table>

<p>&nbsp;</p>
</td>
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;background:rgb(241,241,241);vertical-align:top;">
<table style="border-collapse:collapse; margin-left:5,pt; width:100%">
<tbody>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>: <?php echo $jow['nopol']; ?></p>
</td>
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>: <?php echo $jow['merk']; ?></p>
</td>
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>: <?php echo $jow['model']; ?></p>
</td>
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>: <?php echo $jow['transmisi']; ?></p>
</td>
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>: <?php echo $jow['tipebody']; ?></p>
</td>
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>: <?php echo $jow['tahun']; ?></p>
</td>
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>: <?php echo $jow['isi_silinder']; ?></p>
</td>
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>: <?php echo $jow['no_rangka']; ?></p>
</td>
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>: <?php echo $jow['no_mesin']; ?></p>
</td>
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>&nbsp;</p>
</td>
</tr>
</tbody>
</table>
</div>
<p>&nbsp;</p>
</td>
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;background:rgb(241,241,241);vertical-align:top;">
<table style="border-collapse:collapse; margin-left:5,pt; width:100%">
<tbody>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>Warna Eksterior/Interior</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>Bahan Interior</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>Bahan bakar</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>Odometer</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>Pajak Berlaku Sampai</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>Kepemilikan</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>Pemilik Pertama</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>Km Servis Terakhir</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>Tanggal Servis Terakhir</p>
</td>
</tr>
</tbody>
</table>

<p>&nbsp;</p>
</td>
<td colspan="2" style="width:0px;padding:00pt 5,pt 00pt 5,pt ;background:rgb(241,241,241);vertical-align:top;">
<table style="border-collapse:collapse; margin-left:5,pt; width:100%">
<tbody>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>: <?php echo $jow['warna_interior_eksterior']; ?></p>
</td>
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>: <?php echo $jow['bahan_interior']; ?></p>
</td>
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>: <?php echo $jow['bahan_bakar']; ?></p>
</td>
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>: <?php echo $jow['odometer']; ?></p>
</td>
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>: <?php echo $jow['pajakberlaku']; ?></p>
</td>
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>: <?php echo $jow['kepemilikan']; ?></p>
</td>
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>: <?php echo $jow['pemilik_pertama']; ?></p>
</td>
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>: <?php echo $jow['km_servis']; ?></p>
</td>
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>: <?php echo $jow['tgl_servis']; ?></p>
</td>
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>&nbsp;</p>
</td>
</tr>
</tbody>
</table>

<p>&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td colspan="2" style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">

<p><img src="../../attach/<?php echo $rot['mitra_attach']; ?>" width="500px" /></p>
</td>
<td colspan="3" style="width:0px;vertical-align:top;">
<table width="100%" border="1" style="border-color: #d2d4d0;font-weight:bold;border-collapse:collapse">
  <tr height="50px">
    <th style="background: #f7f7ed;"><center>Interior</center></th>
    <th style="background: #f7f7ed;"><center>Eksterior</center></th>
    <th style="background: #f7f7ed;"><center>Mesin & Suspensi</center></th>
  </tr>
  <tr height="100px">
    <td style="font-size:30px"><center><?php echo $jow['nilai_interior']; ?></center></td>
    <td style="font-size:30px"><center><?php echo $jow['nilai_eksterior']; ?></center></td>
    <td style="font-size:30px"><center><?php echo $jow['nilai_mesin']; ?></center></td>
  </tr>
  <tr width="100%" height="50px">
    <td colspan="3" style="background: #f7f7ed;"><center>Skor Keseluruhan</center></td>
  </tr>
  <tr height="100px">
    <td style="font-size:30px" colspan="3"><center><?php echo $jow['skor_inspeksi']; ?></center></td>
  </tr>
</table>
<p>&nbsp;</p>
</td>
</tr>

</tbody>
</table>
</div>
<table style="border-collapse:collapse; width:100%">
<tbody>
<tr style="height:0px;">
<td colspan="9" style="width:0px;padding:00pt 5,pt 00pt 5,pt ;background:rgb(199,218,241);vertical-align:top;">
<p><strong>Dokumen</strong></p>
</td>
</tr>
<tr style="height:0px;">
<td colspan="9" style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p><span style="height:250px; left:0px; margin-left:213,px; margin-top:11,2667px; position:absolute; width:910px; z-index:1">
</span><span style="height:250px; left:0px; margin-left:355,px; margin-top:10,2667px; position:absolute; width:2020px; z-index:1">

</span><span style="height:250px; left:0px; margin-left:127,px; margin-top:13,2667px; position:absolute; width:840px; z-index:1">

</span>&nbsp;</p>

<p><span style="height:180px; left:0px; margin-left:180,8667px; margin-top:0,9333px; position:absolute; width:260px; z-index:1">
</span><span style="height:180px; left:0px; margin-left:317,8667px; margin-top:0,9333px; position:absolute; width:260px; z-index:1">
</span><span style="height:180px; left:0px; margin-left:95,8667px; margin-top:0,px; position:absolute; width:260px; z-index:1">
</span>Keterangan : <img style="vertical-align:middle"src="keterangan1.jpg" width="500px"/></p>

<p>&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td colspan="2" style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<table style="border-collapse:collapse; margin-left:5,pt; width:100%">
<tbody>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>STNK </p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>Faktur</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>No Rangka Sesuai STNK</p>
</td>
</tr>
</tbody>
</table>

<p>&nbsp;</p>
</td>
<td colspan="2" style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<table style="border-collapse:collapse; margin-left:5,pt; width:100%">
<tbody>
<tr style="height:0px;">
<td colspan="2" style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p >&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p style="background-color:<?php echo $okumen['dokumen_stnk']; ?>;width:50px">&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p style="background-color:<?php echo $okumen['dokumen_faktur']; ?>;width:50px">&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p style="background-color:<?php echo $okumen['dokumen_rangka']; ?>;width:50px">&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p><span style="height:200px; left:0px; margin-left:5,3333px; margin-top:4,9333px; position:absolute; width:280px; z-index:1">
</span>&nbsp;</p>
</td>
</tr>
</tbody>
</table>

<p>&nbsp;</p>
</td>
<td colspan="2" style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<table style="border-collapse:collapse; margin-left:5,pt; width:100%">
<tbody>

<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p >&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>BPKB</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>Form A</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>No. Mesin Sesuai STNK</p>
</td>
</tr>
</tbody>
</table>

<p>&nbsp;</p>
</td>
<td colspan="3" style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<table style="border-collapse:collapse; margin-left:5,pt; width:100%">
<tbody>
<tr style="height:0px;">
<td colspan="2" style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p >&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p style="background-color:<?php echo $okumen['dokumen_bpkb']; ?>;width:50px">&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p style="background-color:<?php echo $okumen['dokumen_forma']; ?>;width:50px">&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p style="background-color:<?php echo $okumen['dokumen_mesin']; ?>;width:50px">&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p><span style="height:200px; left:0px; margin-left:8,2667px; margin-top:6,9333px; position:absolute; width:280px; z-index:1">
</span>&nbsp;</p>
</td>
</tr>
</tbody>
</table>

<p>&nbsp;</p>

<p>&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td colspan="9" style="border-bottom:1px solid ;width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p><strong>Catatan :</strong> <?php echo $okumen['catatan_dokumen']; ?></p><br><br><br>
</td>
</tr>
<tr style="height:0px;">
<td colspan="9" style="width:0px;padding:00pt 5,pt 00pt 5,pt ;background:rgb(199,218,241);vertical-align:top;">
<p><strong>Aksesoris</strong></p>
</td>
</tr>
<tr style="height:0px;">
<td colspan="9" style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p><span style="height:250px; left:0px; margin-left:213,px; margin-top:11,2667px; position:absolute; width:910px; z-index:1">
</span><span style="height:250px; left:0px; margin-left:355,px; margin-top:10,2667px; position:absolute; width:2020px; z-index:1">
</span><span style="height:250px; left:0px; margin-left:127,px; margin-top:13,2667px; position:absolute; width:840px; z-index:1">
</span>&nbsp;</p>

<p><span style="height:180px; left:0px; margin-left:180,8667px; margin-top:0,9333px; position:absolute; width:260px; z-index:1">
</span><span style="height:180px; left:0px; margin-left:317,8667px; margin-top:0,9333px; position:absolute; width:260px; z-index:1">
</span><span style="height:180px; left:0px; margin-left:95,8667px; margin-top:0,px; position:absolute; width:260px; z-index:1">
</span>Keterangan : <img style="vertical-align:middle"src="keterangan1.jpg" width="500px"/></p>

<p>&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td colspan="2" style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<table style="border-collapse:collapse; margin-left:5,pt; width:100%">
<tbody>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>Standard</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>Sistem AC</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>Electric Mirror</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>Sistem Audio</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>Power Steering</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>Car Alarm</p>
</td>
</tr>
</tbody>
</table>

<p>&nbsp;</p>
</td>
<td colspan="2" style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<table style="border-collapse:collapse; margin-left:5,pt; width:100%">
<tbody>
<tr style="height:0px;">
<td colspan="2" style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p style="background-color:<?php echo $sesoris['aksesoris_ac']; ?>;width:50px">&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p style="background-color:<?php echo $sesoris['aksesoris_mirror']; ?>;width:50px">&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p style="background-color:<?php echo $sesoris['aksesoris_audio']; ?>;width:50px">&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p style="background-color:<?php echo $sesoris['aksesoris_power']; ?>;width:50px">&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:50px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p style="background-color:<?php echo $sesoris['aksesoris_alarm']; ?>;width:50px;">&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p><span style="height:200px; left:0px; margin-left:5,3333px; margin-top:6,px; position:absolute; width:280px; z-index:1">
</span>&nbsp;</p>
</td>
</tr>
</tbody>
</table>

<p>&nbsp;</p>
</td>
<td colspan="2" style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<table style="border-collapse:collapse; margin-left:5,pt; width:100%">
<tbody>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>Central Lock</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>Power Window</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>Air Bag</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>Rem ABS</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>&nbsp;</p>
</td>
</tr>
</tbody>
</table>

<p>&nbsp;</p>
</td>
<td colspan="2" style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<table style="border-collapse:collapse; margin-left:5,pt; width:100%">
<tbody>
<tr style="height:0px;">
<td colspan="2" style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p >&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p style="background-color:<?php echo $sesoris['aksesoris_lock']; ?>;width:50px">&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p style="background-color:<?php echo $sesoris['aksesoris_window']; ?>;width:50px">&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p style="background-color:<?php echo $sesoris['aksesoris_airbag']; ?>;width:50px">&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p style="background-color:<?php echo $sesoris['aksesoris_rem']; ?>;width:50px">&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p><span style="height:200px; left:0px; margin-left:5,3333px; margin-top:3,8667px; position:absolute; width:280px; z-index:1">
</span>&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>&nbsp;</p>
</td>
</tr>
</tbody>
</table>

<p>&nbsp;</p>
</td>
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td colspan="9" style="border-bottom:1px solid ;width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p><strong>Catatan :</strong></p> <?php echo $sesoris['catatan_aksesoris']; ?><br><br><br><br><br>
</td>
</tr>
<br><br><br><br><br>
<tr style="height:0px;">
<td colspan="9" style="width:0px;padding:00pt 5,pt 00pt 5,pt ;background:rgb(199,218,241);vertical-align:top;">
<p><strong>Data Ban</strong></p>
</td>
</tr>
<tr style="height:0px;">
<td colspan="9" style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p><span style="height:250px; left:0px; margin-left:454,px; margin-top:14,2667px; position:absolute; width:2020px; z-index:1">
</span><span style="height:250px; left:0px; margin-left:289,px; margin-top:14,2667px; position:absolute; width:1470px; z-index:1">
</span><span style="height:250px; left:0px; margin-left:121,px; margin-top:14,2667px; position:absolute; width:1950px; z-index:1">
</span>&nbsp;</p>

<p><span style="height:180px; left:0px; margin-left:428,8667px; margin-top:0,9333px; position:absolute; width:260px; z-index:1">
</span><span style="height:180px; left:0px; margin-left:256,8667px; margin-top:0,9333px; position:absolute; width:260px; z-index:1">
</span><span style="height:180px; left:0px; margin-left:95,8667px; margin-top:0,px; position:absolute; width:260px; z-index:1">
</span>Keterangan : <img style="vertical-align:middle"src="keterangan2.jpg" width="500px"/></p>

<p>&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p><strong>Posisi Ban</strong></p>
</td>
<td colspan="2" style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p><strong><center>Merek</center></strong></p>
</td>
<td colspan="2" style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p><strong><center>Tipe Velg</center></strong></p>
</td>
<td colspan="2" style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p><strong><center>Ukuran</center></strong></p>
</td>
<td colspan="2" style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p><strong><center>Kedalaman Alur</center></strong></p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>Kiri Depan</p>
</td>
<td colspan="2" style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p><center><?php echo $ban['zkeductor']; ?></center></p>
</td>
<td colspan="2" style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p><center><?php echo $ban['supervision']; ?></center></p>
</td>
<td colspan="2" style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p><center><?php echo $ban['amangojek']; ?></center></p>
</td>
<td colspan="2" style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p style="background-color:<?php echo $ban['pickgoup']; ?>;width:50px">&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>Kiri Belakang</p>
</td>
<td colspan="2" style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p><center><?php echo $ban['froone']; ?></center></p>
</td>
<td colspan="2" style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p><center><?php echo $ban['tempatles']; ?></center></p>
</td>
<td colspan="2" style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p><center><?php echo $ban['tukangmurah']; ?></center></p>
</td>
<td colspan="2" style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p style="background-color:<?php echo $ban['kangenapp']; ?>;width:50px">&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>Kanan Depan</p>
</td>
<td colspan="2" style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p><center><?php echo $ban['liburanransel']; ?></center></p>
</td>
<td colspan="2" style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p><center><?php echo $ban['massase']; ?></center></p>
</td>
<td colspan="2" style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p><center><?php echo $ban['medgo']; ?></center></p>
</td>
<td colspan="2" style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<div style="background-color:<?php echo $ban['dreamcreation']; ?>;width:50px">&nbsp;</div>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>Kanan Belakang</p>
</td>
<td colspan="2" style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p><center><?php echo $ban['tentor']; ?></center></p>
</td>
<td colspan="2" style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p><center><?php echo $ban['gurulesku']; ?></center></p>
</td>
<td colspan="2" style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p><center><?php echo $ban['tolongku']; ?></center></p>
</td>
<td colspan="2" style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<div style="background-color:<?php echo $ban['mitraera']; ?>;width:50px">&nbsp;</div>
</td>
</tr>
<tr style="height:0px;">
<td colspan="9" style="border-bottom:1px solid ;width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p><strong>Catatan :</strong></p> <?php echo $ban['gobox']; ?><br><br><br><br><br>
</td>
</tr>


<p><strong>Poin inspeksi</strong></p>
</td>
</tr>
<tr style="height:0px;">
<td colspan="9" style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p><span style="height:250px; left:0px; margin-left:213,px; margin-top:11,2667px; position:absolute; width:910px; z-index:1">
</span><span style="height:250px; left:0px; margin-left:355,px; margin-top:10,2667px; position:absolute; width:2020px; z-index:1">
</span><span style="height:250px; left:0px; margin-left:127,px; margin-top:13,2667px; position:absolute; width:840px; z-index:1">
</span>&nbsp;</p>

<p><span style="height:180px; left:0px; margin-left:180,8667px; margin-top:0,9333px; position:absolute; width:260px; z-index:1">
</span><span style="height:180px; left:0px; margin-left:317,8667px; margin-top:0,9333px; position:absolute; width:260px; z-index:1">
</span><span style="height:180px; left:0px; margin-left:95,8667px; margin-top:0,px; position:absolute; width:260px; z-index:1">
</span>Keterangan : <img style="vertical-align:middle"src="keterangan1.jpg" width="500px"/></p>

<p>&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td colspan="2" style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<table style="border-collapse:collapse; margin-left:5,pt; width:100%">
<tbody>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>Interior - Dashboard</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>OBD Scan</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>Panel indikator</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>Kondisi Setir</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>Car Alarm</p>
</td>
</tr>
</tbody>
</table>
<p>&nbsp;</p>
</td>
<td colspan="2" style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<table style="border-collapse:collapse; margin-left:5,pt; width:100%">
<tbody>
<tr style="height:0px;">
<td colspan="2" style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p style="background-color:<?php echo $board['obd_scan']; ?>;width:50px">&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p style="background-color:<?php echo $board['panel_indikator']; ?>;width:50px">&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p style="background-color:<?php echo $board['kondisi_setir']; ?>;width:50px">&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p style="background-color:<?php echo $board['car_alarm']; ?>;width:50px">&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p><span style="height:200px; left:0px; margin-left:5,3333px; margin-top:6,px; position:absolute; width:280px; z-index:1">
</span>&nbsp;</p>
</td>
</tr>
</tbody>
</table>

<p>&nbsp;</p>
</td>
<td colspan="2" style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<table style="border-collapse:collapse; margin-left:5,pt; width:100%">
<tbody>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>Panel Dashboard</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>Laci Dashboard</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>Kisi-Kisi AC</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>&nbsp;</p>
</td>
</tr>
</tbody>
</table>

<p>&nbsp;</p>
</td>
<td colspan="2" style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<table style="border-collapse:collapse; margin-left:5,pt; width:100%">
<tbody>
<tr style="height:0px;">
<td colspan="2" style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p style="background-color:<?php echo $board['panel_dashboard']; ?>;width:50px">&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p style="background-color:<?php echo $board['laci_dashboard']; ?>;width:50px">&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p style="background-color:<?php echo $board['kisi_ac']; ?>;width:50px">&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p><span style="height:200px; left:0px; margin-left:5,3333px; margin-top:4,9333px; position:absolute; width:280px; z-index:1">
</span>&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>&nbsp;</p>
</td>
</tr>
</tbody>
</table>

<p>&nbsp;</p>
</td>
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td colspan="9" style="border-bottom:1px solid ;width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p><strong>Catatan :</strong></p><br><br><br>
</td>
</tr>
<tr style="height:0px;">
<td colspan="2" style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<table style="border-collapse:collapse; margin-left:5,pt; width:100%">
<tbody>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>Interior - Instrumen</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>Rem Tangan</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>Cruise Control</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>Lampu Depan</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>Lampu hazard/Sen</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>Fog lampu</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>Lampu plafon</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>Pengatur Kaca Spion</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>Pembuka Kap mesin</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>Tombol tangki bensin</p>
</td>
</tr>
</tbody>
</table>
<p>&nbsp;</p>
</td>
<td colspan="2" style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<table style="border-collapse:collapse; margin-left:5,pt; width:100%">
<tbody>
<tr style="height:0px;">
<td colspan="2" style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p style="background-color:<?php echo $men['rem_tangan']; ?>;width:50px">&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p style="background-color:<?php echo $men['cruise_control']; ?>;width:50px">&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p style="background-color:<?php echo $men['lampu_depan']; ?>;width:50px">&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p style="background-color:<?php echo $men['lampu_sen']; ?>;width:50px">&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p style="background-color:<?php echo $men['fog_lampu']; ?>;width:50px">&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p style="background-color:<?php echo $men['lampu_plafon']; ?>;width:50px">&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p style="background-color:<?php echo $men['pengatur_spion']; ?>;width:50px">&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p style="background-color:<?php echo $men['pembuka_mesin']; ?>;width:50px">&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p style="background-color:<?php echo $men['tombol_tangki']; ?>;width:50px">&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p><span style="height:200px; left:0px; margin-left:5,3333px; margin-top:7,px; position:absolute; width:280px; z-index:1">
</span>&nbsp;</p>
</td>
</tr>
</tbody>
</table>

<p>&nbsp;</p>
</td>
<td colspan="2" style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<table style="border-collapse:collapse; margin-left:5,pt; width:100%">
<tbody>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>Klakson</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>Fungsi Wiper/Washer</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>Lampu Belakang/Rem</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>Lampu Diam/Jauh</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>Sun Visor</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>Kaca Spion tengah</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>Pemanas Kaca</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>Pembuka bagasi</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>Semua fitur berfungsi</p>
</td>
</tr>
</tbody>
</table>

<p>&nbsp;</p>
</td>
<td colspan="2" style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<table style="border-collapse:collapse; margin-left:5,pt; width:100%">
<tbody>
<tr style="height:0px;">
<td colspan="2" style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>&nbsp;</p>
</td>
</tr>

<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p style="background-color:<?php echo $men['klakson']; ?>;width:50px">&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p style="background-color:<?php echo $men['fungsi_wiper']; ?>;width:50px">&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p style="background-color:<?php echo $men['lampu_rem']; ?>;width:50px">&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p style="background-color:<?php echo $men['lampu_jauh']; ?>;width:50px">&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p style="background-color:<?php echo $men['sun_visor']; ?>;width:50px">&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p style="background-color:<?php echo $men['spion_tengah']; ?>;width:50px">&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p style="background-color:<?php echo $men['pemanas_kaca']; ?>;width:50px">&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p style="background-color:<?php echo $men['pembuka_bagasi']; ?>;width:50px">&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p style="background-color:<?php echo $men['semua_fitur']; ?>;width:50px">&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>&nbsp;</p>
</td>
</tr>
</tbody>
</table>

<p>&nbsp;</p>
</td>
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td colspan="9" style="border-bottom:1px solid ;width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p><strong>Catatan :</strong> <?php echo $men['catatan_instrumen']; ?></p><br><br><br>
</td>
</tr>
<tr style="height:0px;">
<td colspan="2" style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<table style="border-collapse:collapse; margin-left:5,pt; width:100%">
<tbody>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>Interior - Jok, Trim, KaUSD t</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>Kondisi &amp; Fungsi Jok</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>Headrest</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>Handle dan kunci pintu bekerja</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>KaUSD t dasar</p>
</td>
</tr>
</tbody>
</table>
<p>&nbsp;</p>
</td>
<td colspan="2" style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<table style="border-collapse:collapse; margin-left:5,pt; width:100%">
<tbody>
<tr style="height:0px;">
<td colspan="2" style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p style="background-color:<?php echo $jok['fungsi_jok']; ?>;width:50px">&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p style="background-color:<?php echo $jok['headrest']; ?>;width:50px">&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p style="background-color:<?php echo $jok['handle_pintu']; ?>;width:50px">&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p style="background-color:<?php echo $jok['kaUSD t_dasar']; ?>;width:50px">&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p><span style="height:200px; left:0px; margin-left:5,3333px; margin-top:6,px; position:absolute; width:280px; z-index:1">
</span>&nbsp;</p>
</td>
</tr>
</tbody>
</table>

<p>&nbsp;</p>
</td>
<td colspan="2" style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<table style="border-collapse:collapse; margin-left:5,pt; width:100%">
<tbody>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>Fungsi sabuk pengaman</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>Trim dan Panel pintu</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>Kondisi Plafon</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>Tidak berbau (rokok, makanan, lain lain)</p>
</td>
</tr>
</tbody>
</table>

<p>&nbsp;</p>
</td>
<td colspan="2" style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<table style="border-collapse:collapse; margin-left:5,pt; width:100%">
<tbody>
<tr style="height:0px;">
<td colspan="2" style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p style="background-color:<?php echo $jok['fungsi_sabuk']; ?>;width:50px">&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p style="background-color:<?php echo $jok['trim_pintu']; ?>;width:50px">&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p style="background-color:<?php echo $jok['kondisi_plafon']; ?>;width:50px">&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p style="background-color:<?php echo $jok['tidak_bau']; ?>;width:50px">&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p><span style="height:200px; left:0px; margin-left:5,3333px; margin-top:5,1333px; position:absolute; width:280px; z-index:1">
</span>&nbsp;</p>
</td>
</tr>
</tbody>
</table>

<p>&nbsp;</p>
</td>
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td colspan="9" style="border-bottom:1px solid ;width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p><strong>Catatan :</strong> <?php echo $jok['catatan_interiorjok']; ?></p><br><br><br>
</td>
</tr>
</tbody>
</table>

<p>&nbsp;</p>

<table style="border-collapse:collapse; width:100%">
<tbody>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<table style="border-collapse:collapse; margin-left:5,pt; width:100%">
<tbody>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>Eksterior - Body</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>Konsistensi Ketebalan Cat</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>Kerataan Panel Body</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>Bamper Depan</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>Kondisi/fungsi kap mesin</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>Kondisi panel &amp; Handle pintu</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>Kondisi Karet weather strip</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>Trim Eksterior</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>Kondisi fungsi pintu bagasi</p>
</td>
</tr>
</tbody>
</table>

<p>&nbsp;</p>
</td>
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<table style="border-collapse:collapse; margin-left:5,pt; width:100%">
<tbody>
<tr style="height:0px;">
<td colspan="2" style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p style="background-color:<?php echo $body['ketebalan_cat']; ?>;width:50px">&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p style="background-color:<?php echo $body['kerataan_body']; ?>;width:50px">&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p style="background-color:<?php echo $body['bamper_depan']; ?>;width:50px">&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p style="background-color:<?php echo $body['kap_mesin']; ?>;width:50px">&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p style="background-color:<?php echo $body['handle_pintu']; ?>;width:50px">&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p style="background-color:<?php echo $body['karet_strip']; ?>;width:50px">&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p style="background-color:<?php echo $body['trim_eksterior']; ?>;width:50px">&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p style="background-color:<?php echo $body['fungsi_pintu_bagasi']; ?>;width:50px">&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p><span style="height:200px; left:0px; margin-left:5,3333px; margin-top:7,px; position:absolute; width:280px; z-index:1">
</span>&nbsp;</p>
</td>
</tr>
</tbody>
</table>

<p>&nbsp;</p>
</td>
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<table style="border-collapse:collapse; margin-left:5,pt; width:100%">
<tbody>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>Cet karat kondisi</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>Celah antar panel</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>Grill</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>Cek fender depan</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>Cek pilar pintu</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>Cek fender belakang</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>Bemper belakang</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>Cek panel body atap</p>
</td>
</tr>
</tbody>
</table>

<p>&nbsp;</p>
</td>
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<table style="border-collapse:collapse; margin-left:5,pt; width:100%">
<tbody>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p style="background-color:<?php echo $body['cat_karat']; ?>;width:50px">&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p style="background-color:<?php echo $body['celah_panel']; ?>;width:50px">&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p style="background-color:<?php echo $body['grill']; ?>;width:50px">&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p style="background-color:<?php echo $body['cek_fender_depan']; ?>;width:50px">&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p style="background-color:<?php echo $body['cek_pilar']; ?>;width:50px">&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p style="background-color:<?php echo $body['cek_fender_belakang']; ?>;width:50px">&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p style="background-color:<?php echo $body['bemper_belakang']; ?>;width:50px">&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p style="background-color:<?php echo $body['panel_atap']; ?>;width:50px">&nbsp;</p>
</td>
</tr>
</span>&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p><span style="height:200px; left:0px; margin-left:5,3333px; margin-top:6,px; position:absolute; width:280px; z-index:1">
</span>&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>&nbsp;</p>
</td>
</tr>
</tbody>
</table>

<p>&nbsp;</p>
</td>
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td colspan="5" style="border-bottom:1px solid ;width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p><strong>Catatan :</strong> <?php echo $body['catatan_eksterior_body']; ?></p><br><br><br>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<table style="border-collapse:collapse; margin-left:5,pt; width:100%">
<tbody>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>Eksterior - Kaca, lampu</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>Tanda Orisinil pabrik pada kaca</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>Cek kondisi kaca jendela</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>Cek kondisi kaca belakang</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>Kondisi lampu (Embun, Jamur, dll)</p>
</td>
</tr>
</tbody>
</table>

<p>&nbsp;</p>
</td>
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<table style="border-collapse:collapse; margin-left:5,pt; width:100%">
<tbody>
<tr style="height:0px;">
<td colspan="2" style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p style="background-color:<?php echo $lampu['tanda_orisinil_kaca']; ?>;width:50px">&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p style="background-color:<?php echo $lampu['kondisi_jendela']; ?>;width:50px">&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p style="background-color:<?php echo $lampu['kondisi_kaca_belakang']; ?>;width:50px">&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p style="background-color:<?php echo $lampu['kondisi_jamur']; ?>;width:50px">&nbsp;</p>
</td>
</tr>
</tbody>
</table>

<p>&nbsp;</p>
</td>
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<table style="border-collapse:collapse; margin-left:5,pt; width:100%">
<tbody>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>Cek kondisi kaca depan</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>Cek kondisi kaca Spion</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>Kaca Film</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>Reflektor Lampu</p>
</td>
</tr>
</tbody>
</table>

<p>&nbsp;</p>
</td>
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<table style="border-collapse:collapse; margin-left:5,pt; width:100%">
<tbody>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p><span style="height:200px; left:0px; margin-left:5,3333px; margin-top:5,1333px; position:absolute; width:280px; z-index:1">
</span>&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p style="background-color:<?php echo $lampu['kondisi_kaca_depan']; ?>;width:50px">&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p style="background-color:<?php echo $lampu['kondisi_kaca_spion']; ?>;width:50px">&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p style="background-color:<?php echo $lampu['kaca_film']; ?>;width:50px">&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p style="background-color:<?php echo $lampu['reflektor_lampu']; ?>;width:50px">&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p><span style="height:200px; left:0px; margin-left:5,3333px; margin-top:4,9333px; position:absolute; width:280px; z-index:1">
</span>&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p><span style="height:200px; left:0px; margin-left:5,3333px; margin-top:5,1333px; position:absolute; width:280px; z-index:1">
</span>&nbsp;</p>
</td>
</tr>
</tbody>
</table>

<p>&nbsp;</p>
</td>
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td colspan="5" style="border-bottom:1px solid ;width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p><strong>Catatan :</strong></p> <?php echo $lampu['catatan_eksterior_kaca']; ?><br><br><br>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<table style="border-collapse:collapse; margin-left:5,pt; width:100%">
<tbody>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>Eksterior - Ban, Kolong</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>Kondisi Ban</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>Kondisi Velg</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>Cek bocor/rembes</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>Kondisi lisplang</p>
</td>
</tr>
</tbody>
</table>
<p>&nbsp;</p>

</td>
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<table style="border-collapse:collapse; margin-left:5,pt; width:100%">
<tbody>
<tr style="height:0px;">
<td colspan="2" style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p style="background-color:<?php echo $kolong['kondisi_ban']; ?>;width:50px">&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p style="background-color:<?php echo $kolong['kondisi_velg']; ?>;width:50px">&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p style="background-color:<?php echo $kolong['cek_bocor']; ?>;width:50px">&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p style="background-color:<?php echo $kolong['kondisi_lisplang']; ?>;width:50px">&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p><span style="height:200px; left:0px; margin-left:5,3333px; margin-top:6,px; position:absolute; width:280px; z-index:1">
</span>&nbsp;</p>
</td>
</tr>
</tbody>
</table>

<p>&nbsp;</p>
</td>
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<table style="border-collapse:collapse; margin-left:5,pt; width:100%">
<tbody>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>Kondisi kaki-kaki</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>Kondisi Disc Brake</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>Kondisi Knalpot</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>Cek Kondisi sasis</p>
</td>
</tr>
</tbody>
</table>

<p>&nbsp;</p>
</td>
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<table style="border-collapse:collapse; margin-left:5,pt; width:100%">
<tbody>

<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p><span style="height:200px; left:0px; margin-left:5,3333px; margin-top:4,9333px; position:absolute; width:280px; z-index:1">
</span>&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p style="background-color:<?php echo $kolong['kondisi_kaki']; ?>;width:50px">&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p style="background-color:<?php echo $kolong['kondisi_brake']; ?>;width:50px">&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p style="background-color:<?php echo $kolong['kondisi_knalpot']; ?>;width:50px">&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p style="background-color:<?php echo $kolong['kondisi_sasis']; ?>;width:50px">&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p><span style="height:200px; left:0px; margin-left:5,3333px; margin-top:4,9333px; position:absolute; width:280px; z-index:1">
</span>&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p><span style="height:200px; left:0px; margin-left:5,3333px; margin-top:5,1333px; position:absolute; width:280px; z-index:1">
</span>&nbsp;</p>
</td>
</tr>
</tbody>
</table>

<p>&nbsp;</p>
</td>
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td colspan="5" style="border-bottom:1px solid ;width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p><strong>Catatan :</strong></p><br><br><br>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<table style="border-collapse:collapse; margin-left:5,pt; width:100%">
<tbody>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>Mesin - Oli/Cairan</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>Kondisi/Volume oli mesin</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>Kondisi/Volume oli rem</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>Kondisi/Volume oli coolant</p>
</td>
</tr>
</tbody>
</table>

<p>&nbsp;</p>
</td>
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<table style="border-collapse:collapse; margin-left:5,pt; width:100%">
<tbody>
<tr style="height:0px;">
<td colspan="2" style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p style="background-color:<?php echo $oil['kondisi_oilmesin']; ?>;width:50px">&nbsp;</p>
</td>
</tr>

<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p style="background-color:<?php echo $oil['kondisi_oilrem']; ?>;width:50px">&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p style="background-color:<?php echo $oil['kondisi_oilcoolant']; ?>;width:50px">&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p><span style="height:200px; left:0px; margin-left:5,3333px; margin-top:6,px; position:absolute; width:280px; z-index:1">
</span>&nbsp;</p>
</td>
</tr>
</tbody>
</table>

<p>&nbsp;</p>
</td>
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<table style="border-collapse:collapse; margin-left:5,pt; width:100%">
<tbody>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>Kondisi/Volume oli transmisi</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>Kondisi/Volume oli Power Steering</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>&nbsp;</p>
</td>
</tr>
</tbody>
</table>

<p>&nbsp;</p>
</td>
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<table style="border-collapse:collapse; margin-left:5,pt; width:100%">
<tbody>
<tr style="height:0px;">
<td colspan="2" style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p style="background-color:<?php echo $oil['kondisi_oiltransmisi']; ?>;width:50px">&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p style="background-color:<?php echo $oil['kondisi_oilsteering']; ?>;width:50px">&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p><span style="height:200px; left:0px; margin-left:5,3333px; margin-top:16,1333px; position:absolute; width:280px; z-index:1">
</span>&nbsp;</p>
</td>
</tr>
</tbody>
</table>

<p>&nbsp;</p>
</td>
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td colspan="5" style="border-bottom:1px solid ;width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p><strong>Catatan :</strong> <?php echo $oil['catatan_mesinoil']; ?></p><br><br><br>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<table style="border-collapse:collapse; margin-left:5,pt; width:100%">
<tbody>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>Mesin - Ruang mesin</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>Mesin bebas bocor/rembes</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>Cek kondisi selang</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>Kondisi belt</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>Kondisi Radiator</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>Kondisi kabel-kabel</p>
</td>
</tr>
</tbody>
</table>
<p>&nbsp;</p>
</td>
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<table style="border-collapse:collapse; margin-left:5,pt; width:100%">
<tbody>
<tr style="height:0px;">
<td colspan="2" style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p style="background-color:<?php echo $mesin['mesin_rembes']; ?>;width:50px">&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p style="background-color:<?php echo $mesin['kondisi_selang']; ?>;width:50px">&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p style="background-color:<?php echo $mesin['kondisi_belt']; ?>;width:50px">&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p style="background-color:<?php echo $mesin['kondisi_radiator']; ?>;width:50px">&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p style="background-color:<?php echo $mesin['kondisi_kabel']; ?>;width:50px">&nbsp;</p>
</td>
</tr>
</tbody>
</table>

<p><span style="height:200px; left:0px; margin-left:12,5333px; margin-top:6,px; position:absolute; width:280px; z-index:1">
</span>&nbsp;</p>
</td>
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<table style="border-collapse:collapse; margin-left:5,pt; width:100%">
<tbody>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>Kondisi Rack Steer</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>Kondisi Aki</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>Kondisi Kipas mesin</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>Bunyi kasar/getaran keras</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>&nbsp;</p>
</td>
</tr>
</tbody>
</table>

<p>&nbsp;</p>
</td>
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<table style="border-collapse:collapse; margin-left:5,pt; width:100%">
<tbody>
<tr style="height:0px;">
<td colspan="2" style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p style="background-color:<?php echo $mesin['kondisi_rack']; ?>;width:50px">&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p style="background-color:<?php echo $mesin['kondisi_aki']; ?>;width:50px">&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p style="background-color:<?php echo $mesin['kondisi_kipas']; ?>;width:50px">&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p style="background-color:<?php echo $mesin['bunyi_kasar']; ?>;width:50px">&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p><span style="height:200px; left:0px; margin-left:5,3333px; margin-top:5,1333px; position:absolute; width:280px; z-index:1">
</span>&nbsp;</p>
</td>
</tr>
</tbody>
</table>

<p>&nbsp;</p>
</td>
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td colspan="5" style="border-bottom:1px solid ;width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p><strong>Catatan :</strong></p> <?php echo $mesin['catatan_mesin']; ?><br><br><br>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<table style="border-collapse:collapse; margin-left:5,pt; width:100%">
<tbody>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>Test Drive</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>Starter mobil normal</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>Kopling berfungsi normal</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>PeUSD ndahan transmisi tidak delay</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>Setir lurus jika dilepas</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>Suspensi normal pada jalan tidak rata</p>
</td>
</tr>
</tbody>
</table>

<p>&nbsp;</p>
</td>
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<table style="border-collapse:collapse; margin-left:5,pt; width:100%">
<tbody>
<tr style="height:0px;">
<td colspan="2" style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p style="background-color:<?php echo $drive['starter_mobil']; ?>;width:50px">&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p style="background-color:<?php echo $drive['kopling_fungsi']; ?>;width:50px">&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p style="background-color:<?php echo $drive['transmisi_delay']; ?>;width:50px">&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p style="background-color:<?php echo $drive['setir_lurus']; ?>;width:50px">&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p style="background-color:<?php echo $drive['suspensi_normal']; ?>;width:50px">&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p><span style="height:200px; left:0px; margin-left:5,3333px; margin-top:6,px; position:absolute; width:280px; z-index:1">
</span>&nbsp;</p>
</td>
</tr>
</tbody>
</table>

<p><span style="height:200px; left:0px; margin-left:12,5333px; margin-top:6,px; position:absolute; width:280px; z-index:1">
</span>&nbsp;</p>
</td>
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<table style="border-collapse:collapse; margin-left:5,pt; width:100%">
<tbody>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>USD  tidak Drop/naik</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>PeUSD ndahan transmisi halus</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>Rem tidak dalam saat diinjak</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>Rem tidak bunyi saat diinjak</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>Rem tidak berat/bunyi saat belok</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>Tidak ada bunyi getaran tidak wajar</p>
</td>
</tr>
</tbody>
</table>

<p>&nbsp;</p>
</td>
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<table style="border-collapse:collapse; margin-left:5,pt; width:100%">
<tbody>
<tr style="height:0px;">
<td colspan="2" style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p style="background-color:<?php echo $drive['USD ']; ?>;width:50px">&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p style="background-color:<?php echo $drive['transmisi_halus']; ?>;width:50px">&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p style="background-color:<?php echo $drive['rem_dalam']; ?>;width:50px">&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p style="background-color:<?php echo $drive['rem_bunyi_injak']; ?>;width:50px">&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p style="background-color:<?php echo $drive['rem_bunyi_belok']; ?>;width:50px">&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p style="background-color:<?php echo $drive['getaran_gakwajar']; ?>;width:50px">&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p><span style="height:200px; left:0px; margin-left:6,3333px; margin-top:8,3333px; position:absolute; width:280px; z-index:1">
</span>&nbsp;</p>
</td>
</tr>
</tbody>
</table>

<p>&nbsp;</p>
</td>
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td colspan="5" style="border-bottom:1px solid ;width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p><strong>Catatan :</strong> <?php echo $drive['catatan_drive']; ?></p><br><br><br>
</td>
</tr>
</tbody>
</table>

<p>&nbsp;</p>

<table style="border-collapse:collapse; width:100%">
<tbody>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<table style="border-collapse:collapse; margin-left:5,pt; width:100%">
<tbody>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>Tambahan - Perlengkapan</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>Buku servis</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>Kunci serep</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>Dongkrak</p>
</td>
</tr>
</tbody>
</table>

<p>&nbsp;</p>
</td>
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<table style="border-collapse:collapse; margin-left:5,pt; width:100%">
<tbody>
<tr style="height:0px;">
<td colspan="2" style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p style="background-color:<?php echo $tambahan['buku_servis']; ?>;width:50px">&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p style="background-color:<?php echo $tambahan['kunci_serep']; ?>;width:50px">&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p style="background-color:<?php echo $tambahan['dongkrak']; ?>;width:50px">&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p><span style="height:200px; left:0px; margin-left:5,3333px; margin-top:6,px; position:absolute; width:280px; z-index:1">
</span>&nbsp;</p>
</td>
</tr>
</tbody>
</table>

<p>&nbsp;</p>
</td>
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<table style="border-collapse:collapse; margin-left:5,pt; width:100%">
<tbody>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>Buku manual</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>Ban Serep</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>Perkakas Kunci</p>
</td>
</tr>
</tbody>
</table>

<p>&nbsp;</p>
</td>
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<table style="border-collapse:collapse; margin-left:5,pt; width:100%">
<tbody>
<tr style="height:0px;">
<td colspan="2" style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p style="background-color:<?php echo $tambahan['buku']; ?>;width:50px">&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p style="background-color:<?php echo $tambahan['ban_serep']; ?>;width:50px">&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p style="background-color:<?php echo $tambahan['kunci']; ?>;width:50px">&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p><span style="height:200px; left:0px; margin-left:6,3333px; margin-top:9,3333px; position:absolute; width:280px; z-index:1">
</span>&nbsp;</p>
</td>
</tr>
</tbody>
</table>

<p>&nbsp;</p>
</td>
<td style="width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p>&nbsp;</p>
</td>
</tr>
<tr style="height:0px;">
<td colspan="5" style="border-bottom:1px solid ;width:0px;padding:00pt 5,pt 00pt 5,pt ;vertical-align:top;">
<p><strong>Catatan :</strong> <?php echo $tambahan['catatan_perlengkapan']; ?></p><br><br><br>
</td>
</tr>
</tbody>
</table>
</body>