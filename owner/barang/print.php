<?php
session_start();
include_once '../dbconnect.php';

if(!isset($_SESSION['mitra']))
{
	header("Location: ../index.php");
}
$res=mysqli_query($mysqli, "SELECT * FROM mitra WHERE id_mitra=".$_SESSION['mitra']);
$rows=mysqli_fetch_array($res);
?>
<?php
//including the database connection file
include_once("../dbconnect.php");

//fetching data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM jw_product ORDER BY product_id ASC");
?>
<link rel="stylesheet"type="text/css"href="../button.css"/>
<html>
<body style="padding:25px;"onload="window.print()">
<?php
include "../dbconnect.php";
?>
<body>
<table width='100%' border=0>
	<tr>
<th>Picture</th>
<th>input date</th>
<th>Products</th>
		<th>Details</th>
		<th>Price</th>
	</tr>
	<?php 
	while($res = mysqli_fetch_array($result)) { 	
$product_id=$res['product_id'];
$product_tag=$res['product_tag'];
$product_price_view=$res['product_price_view'];
$product_price=$res['product_price'];
$product_date=$res['product_date'];
$product_image_ori=$res['product_image_ori'];	
$hargaeceran=$res['hargaeceran'];
$rego = number_format($hargaeceran,0,",",".");
$stock=$res['stock'];
$sales=$res['sales'];
		echo "<tr>";
		echo "<td>";?><img width="100px" src="../fotobarang/<?php echo $res['product_image_ori'];?>"/>
		<?php echo "</td>";
		echo "<td>".$res['product_date']."</td>";
		echo "<td>".$res['product_tag']."</td>";
		echo "<td>";
		echo $res['spesifikasi'];
		echo "<br>Product Code: ".$res['kodeproduk']."";
		echo "<br><br>Restaurant: ";
$menu_id=$res['menu_id'];
$bensult = mysqli_query($mysqli, "SELECT * FROM jw_product INNER JOIN jw_menu_detail on jw_product.menu_id=jw_menu_detail.id where jw_product.menu_id='$menu_id'");
$mes = mysqli_fetch_array($bensult);
$namakategori=$mes['namalapangan'];
echo $namakategori;		
echo "<br>Brand/Franchise: ";
$brand_id=$res['brand_id'];
$julu = mysqli_query($mysqli, "SELECT * FROM jw_product INNER JOIN brand on jw_product.brand_id=brand.id where jw_product.brand_id='$brand_id'");
$ker = mysqli_fetch_array($julu);
$namasub=$ker['namalapangan'];
echo $namasub;
		echo "<br> Details: ".$res['deskripsi']."";
		echo "</td>";
	
		echo "<td> USD ".$rego."</td>";	
	}
	?>
	</table>
</li>
</ul><center>
</body>
</html>
