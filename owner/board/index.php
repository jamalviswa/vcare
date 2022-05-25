<?php
session_start();
include_once '../dbconnect.php';

if(!isset($_SESSION['mitra']))
{
	header("Location: index.php");
}
$res=mysqli_query($mysqli, "SELECT * FROM mitra WHERE id_mitra=".$_SESSION['mitra']);
$rows=mysqli_fetch_array($res);
?>

<?php
//including the database connection file
include_once("../dbconnect.php");

//fetching data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT idsaldo, first_name, tipesaldo, jumlahsaldo, statussaldo, tgl_request, banksaldo, namauser, nomorrek, id_trans, phone FROM trans_user INNER JOIN users on trans_user.id_users=users.id where tipesaldo='deposit' or tipesaldo='withdraw' or tipesaldo='topup'");
?>

<html>
<body><center>
<h3>Request Topup/Withdraw from Passengers user</h3><small>waiting Comfirmed by Administrator</small>
</center>
<table class="table table-bordered" style="font-size:12px;" id="dataTable" width="100%" cellspacing="0">
   <thead>
		<th>ID Request</th>
		<th>Details</th>
		<th>Date</th>
		<th>Name User</th>
		<th>User Phone</th>
<th>Total Invoice</th>
<th>Status</th>
		<th>Bank Name</th>
		<th>Owner Name</th>
		<th>Account number</th>
		<th>Navigation</th>
	   </thead>
	<?php 
	while($res = mysqli_fetch_array($result)) {
		
$id_trans=$res['id_trans'];
$samm=mysqli_query($mysqli, "SELECT * FROM transaksi where id_trans='$id_trans'");
$jannah=mysqli_fetch_array($samm);
// $kafa=mysqli_fetch_array($kerr);
	if($res['statussaldo']=='dijemput')
      {

$nominal = $res['jumlahsaldo']; 
$jumlah = number_format($nominal,0,",",".");
		echo "<tr>";
		echo "<td>".$res['idsaldo']."</td>";
		echo "<td style=background:yellow;color:#444>".$res['tipesaldo']."</td>";
		echo "<td>".$res['tgl_request']."</td>";
		echo "<td>".$res['first_name']."</td>";
		echo "<td>".$res['phone']."</td>";
		echo "<td>USD ".$jumlah."</td>";	echo "<td width=5%>";
	if($res['statussaldo']=='dijemput')
      {
echo "User already Payment Confirm";		
		
  }echo "</td>";
		echo "<td>".$res['banksaldo']."</td>";
		echo "<td>".$res['namauser']."</td>";
		echo "<td>".$res['nomorrek']."</td>";
			echo "<td width=5%>";
	if($res['statussaldo']=='dijemput')
      {
echo "<a href=\"layani.php?idsaldo=$res[idsaldo]\" style=background:green;padding:10px;color:#fff>Confirm</a>";		
  }
  if($res['statussaldo']=='finish')
      {
echo "Done";
  }
  if($res['statussaldo']=='minta')   {
echo "waiting Confirm...";		
		
  }
	  
  echo "</td>";
	
}
	else  {

$nominal = $res['jumlahsaldo']; 
$jumlah = number_format($nominal,0,",",".");
		echo "<tr>";
		echo "<td>".$res['idsaldo']."</td>";
		echo "<td >".$res['tipesaldo']."</td>";
		echo "<td>".$res['tgl_request']."</td>";
		echo "<td>".$res['first_name']."</td>";
		echo "<td>".$res['phone']."</td>";
		echo "<td style=color:green>USD ".$jumlah."</td>";	echo "<td width=5%>";
	if($res['statussaldo']=='finish')
      {
echo "Done";		
  }echo "</td>";
		echo "<td>".$res['banksaldo']."</td>";
		echo "<td>".$res['namauser']."</td>";
		echo "<td>".$res['nomorrek']."</td>";
			echo "<td width=5%>";
	if($res['statussaldo']=='finish')
      {
echo "Done";		
  }
 
  
  echo "</td>";
	
}
}
	?>
	</table>
	<link href="../assets-bootsrap/bootstrap.min.css" rel="stylesheet">

    <link href="../assets-bootsrap/datatables.bootstrap4.min.css" rel="stylesheet">

    <!-- Bootstrap core JavaScript-->
    <script src="../assets-bootsrap/jquery.min.js"></script>

    <!-- Page level plugin JavaScript-->
    <script src="../assets-bootsrap/jquery.datatables.min.js"></script>

    <script src="../assets-bootsrap/datatables.bootstrap4.min.js"></script>
      <script>
        $(document).ready(function () {
            $('#dataTable').DataTable();
        });
    </script>
</body>
</html>
