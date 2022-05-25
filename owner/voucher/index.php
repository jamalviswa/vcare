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
$result = mysqli_query($mysqli, "SELECT * FROM promo");
?>
<link rel="stylesheet"type="text/css"href="../button.css"/>
<html>
<body><h3 style = {"color:#fffff"}><center>Settings Voucher Promotion or discount</center></h3><br>
<a style="padding:10px;color:#fff;background:#1e941e;"href="inputkategori.php#home">Add New Voucher</a>
<br><br>
	<table width='100%' border=0>

	<tr>
		
		<th>Banner</th>
		<th>Promotoin code</th>
		<th>Promote name</th>
		<th>Description Promo</th>
		<th>Discount percent(%)</th>
		<th>-/-</th>
		<th>(x)</th>
	</tr>
	<?php 
	while($res = mysqli_fetch_array($result)) { 		
		echo "<tr>";
		echo"<td width='10%'>";
	if($res['picture']=='')
      {
		echo "<img width=100px src=../icon/nopic.png> </img>";
		  }
		  else {?>
<img src="../../foto_mitra/<?php echo $res['picture'];?>" style="width:100px"/>
		 <?php }
		echo"</td>";
		echo "<td>".$res['kodepromo']."</td>";
		echo "<td>".$res['namapromo']."</td>";
		echo "<td>".$res['deskripsipromo']."</td>";
		echo "<td>".$res['diskonpersen']."%</td>";
		echo "<td> <a style=font-weight:bold;color:orange href=\"updatekategori.php?idpromo=$res[idpromo]\" >Edit Promo</a></td>";	
		echo "<td> <a href=\"deletekategori.php?idpromo=$res[idpromo]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
	}
	?>
	</table>
</body>
</html>
