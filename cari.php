<?php 
include "dbconnect.php";
$r=$_POST['r'];
$query=mysqli_query($mysqli, "select idsmartpustaka, judulsmartpustaka, penulissmartpustaka, tahunsmartpustaka, penerbitsmartpustaka, shortsmartpustaka, edisibuku, halamanbuku, id, namalapangan from smartpustaka inner join kategoripustaka on smartpustaka.idkategori=kategoripustaka.id where smartpustaka.judulsmartpustaka like '%".$r."%' or smartpustaka.penulissmartpustaka like '%".$r."%' or smartpustaka.shortsmartpustaka like '%".$r."%' or smartpustaka.tahunsmartpustaka like '%".$r."%' or kategoripustaka.namalapangan like '%".$r."%' LIMIT 10");
$row=mysqli_num_rows($query);
if ($row > 0) // jika baris lebih dari 0 / data ditemukan
{
	while ($data=mysqli_fetch_array($query)) // perulangna untuk menampilkan data
	{
		
$res=mysqli_query($mysqli, "SELECT * FROM kategoripustaka WHERE id=".$data['idkategori']);
$bro=mysqli_fetch_array($res);
		// menampilkan data dalam bentuk table
		echo "<table width='100%' style='color:#444;border-bottom:1px solid #d4d4d4;font-size:14px;padding:4px;'>
  <tr>
    <th width='100%' colspan='3'><center><small style='font-size:11px'>".$data['shortsmartpustaka']."</small><br></center></th>
  </tr>
    <tr>
    <td width='45%' style='float:right'><small>Judul </small></td>
    <td width='10%' ><small>:</small></td>
    <td width='45%'><small> ".$data['judulsmartpustaka']."</small></td>
  </tr>    
  <tr>
    <td width='45%' style='float:right'><small>Edisi </small></td>
    <td width='10%' ><small>:</small></td>
    <td width='45%'><small> ".$data['edisibuku']."</small></td>
  </tr>
  <tr>
    <td width='45%' style='float:right'><small>Kategori</small></td>
    <td width='10%' ><small>:</small></td>
    <td width='45%'><small> ".$data['namalapangan']."</small></td>
  </tr> 
  <tr>
    <td width='45%' style='float:right'><small>Penulis</small></td>
    <td width='10%' ><small>:</small></td>
    <td width='45%'><small> ".$data['penulissmartpustaka']."</small></td>
  </tr>
  <tr>
    <td width='45%' style='float:right'><small>Tahun</small></td>
    <td width='10%' ><small>:</small></td>
    <td width='45%'><small> ".$data['tahunsmartpustaka']."</small></td>
  </tr>
    <tr>
    <td width='45%' style='float:right'><small>Halaman</small></td>
    <td width='10%' ><small>:</small></td>
    <td width='45%'><small> ".$data['halamanbuku']." lembar</small></td>
  </tr>
  <tr>
    <td width='100%' colspan='3'><a href='gotostore.php?idsmartpustaka=".$data['idsmartpustaka']."'><div style='float:right;color:#fff;background:orange;padding:5px'><small>Go to Store</small></div></a></td>
  </tr>
			</table>";	
	}
}
else // jika data tidak ditemukan
{
	echo "<br><br><center><strong>Data tidak ditemukan</strong></center>";	
}
?>