<?php
//including the database connection file
include_once("../dbconnect.php");

//fetching data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT idsaldo, nama_sopir, tipesaldo, jumlahsaldo, statussaldo, tgl_request, banksaldo, namauser, nomorrek, nomorhp FROM trans_iklan INNER JOIN sopir on trans_iklan.idsopir=sopir.id_sopir");
?>
<link rel="stylesheet"type="text/css"href="../button.css"/>
<html>
<body>
<table width="100%;background:#fff"><tr>
<td style="border-right:none;background:none;color:grey"><center>
<h3>Request dan pembayaran Iklan kendaraan</h3><br>
Menampilkan payment iklan deluxe kendaraan yang harus di confirm oleh admin lapakrental
</center></td>
<td style="border-right:none;background:none">
<center><a href="print.php" target="blank"><button id="cmd" style="background:green;border:none"><div style="background:green;width:200px" class="testbutton">Print Data</div></button></a>
</center></td>
</tr></table>
<table width='100%' border=0>

	<tr>
		<th>No</th>
		<th>Date request</th>
		<th>Nama Pemilik</th>
		<th>Phone</th>
		<th>Type Request</th>
<th>Price</th>
<th>Confirmation by admin</th>
		<th>Name bank</th>
		<th>Bank account number</th>
		<th>Account number</th>
		<th>Navigation</th>
		<th>[x]</th>
	
	</tr>
	<?php 
	while($res = mysqli_fetch_array($result)) {
$nominal = $res['jumlahsaldo']; 
$jumlah = number_format($nominal,0,",",".");
		echo "<tr>";
		echo "<td>".$res['idsaldo']."</td>";
		echo "<td>".$res['tgl_request']."</td>";
		echo "<td>".$res['nama_sopir']."</td>";
		echo "<td>".$res['nomorhp']."</td>";
		echo "<td>".$res['tipesaldo']."</td>";
		echo "<td>USD ".$jumlah."</td>";	echo "<td width=5%>";
	if($res['statussaldo']=='dijemput')
      {
echo "Sudah Confirm";		
		
  }echo "</td>";
		echo "<td>".$res['banksaldo']."</td>";
		echo "<td>".$res['namauser']."</td>";
		echo "<td>".$res['nomorrek']."</td>";
			echo "<td width=5%>";
	if($res['statussaldo']=='dijemput')
      {
echo "<a href=\"layani.php?idsaldo=$res[idsaldo]\" style=background:green;padding:10px;color:#fff>Confirmation</a>";		
		
  }
  if($res['statussaldo']=='finish')
      {
echo "Done";
  }
  if($res['statussaldo']=='minta')   {
echo "pending...";		
		
  }
	  
  echo "</td>";
	
echo "<td> <a href=\"delete.php?idsaldo=$res[idsaldo]\" onClick=\"return confirm('Are you sure you want to delete request?')\">Delete</a></td>";		
	
}
	?>
	</table>
</body>
</html>
