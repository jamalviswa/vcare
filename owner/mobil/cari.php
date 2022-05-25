<?php 
include "../dbconnect.php";
$r=$_POST['r'];
$query=mysqli_query($mysqli, "select * from jw_product where product_tag like '%".$r."%' or kodeproduk like '%".$r."%' LIMIT 400");
$row=mysqli_num_rows($query);
if ($row > 0) // jika baris lebih dari 0 / data ditemukan
{
	while ($data=mysqli_fetch_array($query)) // perulangna untuk menampilkan data
	{
		// menampilkan data dalam bentuk table
		echo "<table width='100%' style='color:#444;border-bottom:1px solid #d4d4d4;font-size:14px;padding:4px;'>
				<tr>
    				<td>".$data['product_tag']."</td>
    				<td><a target=_blank href=lihat.php?kodeproduk=".$data['kodeproduk'].">Lihat</a></td>
				</tr>
			</table>";	
	}
}
else // jika data tidak ditemukan
{
	echo "<br><br><center><strong>Data tidak ditemukan</strong></center>";	
}
?>