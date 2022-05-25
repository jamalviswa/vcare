<?php 
include "../dbconnect.php";
$r=$_POST['r'];
$query=mysqli_query($mysqli, "select * from users where nomoUSD langgan like '%".$r."%' or noktp like '%".$r."%' or npwp like '%".$r."%' LIMIT 400");
$row=mysqli_num_rows($query);
if ($row > 0) // jika baris lebih dari 0 / data ditemukan
{
	while ($data=mysqli_fetch_array($query)) // perulangna untuk menampilkan data
	{
		// menampilkan data dalam bentuk table
		echo "<table width='100%' style='color:#444;border-bottom:1px solid #d4d4d4;font-size:14px;padding:4px;'>
				<tr>
    				<td style='padding:10px' width='20%'><a style='color:green' href=../board/pilih.php?id=".$data['id']."><b><small>".$data['first_name']."</small></b></td>
    				<td style='padding:10px' width='20%'><a style='color:green'  href=../board/pilih.php?id=".$data['id'].">".$data['coUSD ratename']."<br>".$data['brandcoUSD rate']."</td>
    				<td style='padding:10px' width='10%'><a style='color:green'  href=../board/pilih.php?id=".$data['id'].">KTP: ".$data['noktp']."</td>
    				<td style='padding:10px' width='10%'><a style='color:green'  href=../board/pilih.php?id=".$data['id'].">NPWP: ".$data['npwp']."</td>
    				<td style='padding:10px'width='20%'><a style='color:green'  href=../board/pilih.php?id=".$data['id'].">Nomor Pelanggan: ".$data['nomoUSD langgan']."</a></td>
				</tr>
			</table>";	
	}
}
else // jika data tidak ditemukan
{
	echo "<br><br><center><strong>Data tidak ditemukan</strong></center>";	
}
?>