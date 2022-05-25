<?php
//including the database connection file
include_once("../dbconnect.php");

//fetching data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT idsaldo, first_name, tipesaldo, kodeinvoice, jumlahsaldo, statussaldo, tgl_request, banksaldo, namauser, nomorrek, phone FROM trans_user INNER JOIN users on trans_user.id_users=users.id");
?>
<link rel="stylesheet"type="text/css"href="../button.css"/>
<html>
<body>
<table width="100%;background:#fff"><tr>
<td style="border-right:none;background:none;color:grey"><center>
<h3>Pembayaran dari User & Request Saldo</h3>
	</center></td>

</tr></table>
<table width='100%' border=0>

	<tr>
		<th>No</th>
		<th>Kode Invoice</th>
		<th>Tanggal Confirm</th>
		<th>Nama Pembeli</th>
		<th>Phone</th>
		<th>Type Request</th>
<th>Price</th>
<th>Confirmation by admin</th>
		<th>Bank Name</th>
		<th>Owner Name</th>
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
		echo "<td>".$res['kodeinvoice']."</td>";
		echo "<td>".$res['tgl_request']."</td>";
		echo "<td>".$res['first_name']."</td>";
		echo "<td>".$res['phone']."</td>";
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
