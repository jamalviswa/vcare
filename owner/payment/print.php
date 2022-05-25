<?php
//including the database connection file
include_once("../dbconnect.php");

//fetching data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT first_name, tipesaldo, jumlahsaldo, statussaldo, tgl_request, banksaldo, namauser, nomorrek, phone FROM trans_saldo INNER JOIN users on trans_saldo.id_users=users.id");
?>
<link rel="stylesheet"type="text/css"href="../button.css"/>
<html>
<body onload="window.print()">
<center>
<h3>Data Seluruh Request saldo user</h3>

<table width='100%' border=0>

	<tr>
		<th>Request date</th>
		<th>Nama User</th>
		<th>Nomor Handphone</th>
		<th>Tipe Request</th>
<th>Nominal</th>
<th>Status Payment Confirm</th>
		<th>Bank Name</th>
		<th>Nama Akun rekening</th>
		<th>Account number</th>
	
	</tr>
	<?php 
	while($res = mysqli_fetch_array($result)) {
$nominal = $res['jumlahsaldo']; 
$jumlah = number_format($nominal,0,",",".");
		echo "<tr>";
		echo "<td>".$res['tgl_request']."</td>";
		echo "<td>".$res['first_name']."</td>";
		echo "<td>".$res['phone']."</td>";
		echo "<td>".$res['tipesaldo']."</td>";
		echo "<td>USD ".$jumlah."</td>";echo "<td width=5%>";
	if($res['statussaldo']=='dijemput')
      {
echo "Sudah Confirm";		
		
  }echo "</td>";
		echo "<td>".$res['banksaldo']."</td>";
		echo "<td>".$res['namauser']."</td>";

echo "<td> <a href=\"delete.php?id_saldo=$res[id_saldo]\" onClick=\"return confirm('Are you sure you want to delete request?')\">Delete</a></td>";		
	
}
	?>
</table>
</body>
</html>
