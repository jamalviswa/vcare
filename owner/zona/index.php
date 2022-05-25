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
$result = mysqli_query($mysqli, "SELECT * FROM infobank");
// 	$query=mysqli_fetch_array(mysqli_query($mysqli, "select * from potongan where idpotongan='1'"));
    $query = mysqli_fetch_array($result);
	$persen=@$query['persen'];
	
	$jesul=mysqli_fetch_array(mysqli_query($mysqli, "select * from tarif where id_tarif='1'"));
	$tarif=@$jesul['tarif'];
?>


<link rel="stylesheet"type="text/css"href="../button.css"/>
<html>
<body style="padding:10px;">
<h3><center>Setting Data Administrator bank account barisandata</center></h3><br>(for topup balance user)<br><br>
<a style="padding:10px;color:#fff;background:#1e941e;"href="inputkategori.php#home">add bank Account</a>
<br><br>
	<table width='100%' border=0>

	<tr>
		
<th class="th-sm">No.</th>
		<th>Bank Name</th>
		<th>Account number</th>
		<th>Branch Bank</th>
		<th>Owner Name</th>
		<th>(x)</th>
	</tr>
	<?php 
$i = 1;
	while($res = mysqli_fetch_array($result)) { 		
		echo "<tr>";echo "<td >";
		echo $i;
        $i++;"</td>";	
		echo "<td>".$res['namabank']."</td>";
		echo "<td>".$res['norek']."</td>";
		echo "<td>".$res['jambuka']."</td>";
		echo "<td>".$res['namaorang']."</td>";
		echo "<td> <a href=\"deletekategori.php?idinfo=$res[idinfo]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
	}
	?>
	</table>
</body>
</html>
