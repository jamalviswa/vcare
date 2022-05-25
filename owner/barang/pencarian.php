<?php
//including the database connection file
include_once("../dbconnect.php");

$menu_id=$_POST['menu_id'];
$brand_id=$_POST['brand_id'];
//fetching data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM jw_product where menu_id='$menu_id' and brand_id='$brand_id' ORDER BY product_id ASC ");
?>
<link rel="stylesheet"type="text/css"href="../button.css"/>
<html>
<body style="padding:25px;">
<?php
include "../dbconnect.php";
?>
<body>
<div align="left">
					<a href="index.php"><button style="border:none;background:#09c; padding: 10px; color: #fff; font-size:12px;font-weight:bold" type="button" class="btn btn-info btn-lg">Back</button></a>
				</div>
				<div align="right">
					Search Category<br><?php 	
$menu_id=$_POST['menu_id'];
$get=mysqli_query($mysqli, "SELECT * FROM jw_menu_detail where id='$menu_id'");
$jim = mysqli_fetch_array($get);
echo $jim['namalapangan']; ?>, <?php 	
$brand_id=$_POST['brand_id'];
$lem=mysqli_query($mysqli, "SELECT * FROM brand where id='$brand_id'");
$jj = mysqli_fetch_array($lem);
echo $jj['namalapangan']; ?>
					</div>
<table width='100%' border=0>
	<tr>
<th>Picture</th>
<th>input date</th>
<th>Food/drink name</th>
		<th>Details Product</th>
		<th>price <br>one menu</th>
<th>- / -</th>
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
		echo "<td>";?>
<a target="_blank" href="gallery.php?product_id=<?php echo $res['product_id'];?>" onmouseover="bigImg(this)" onmouseout="normalImg(this)" style="font-weight:bold;color:orange;"><div style="float:right;font-size:9px;"><img style="vertical-align:middle;margin-top:5px;margin-right:15px;" src="gallery.png" width="25px"/>Show Gallery</div>
		<img width="100px" src="../fotobarang/<?php echo $res['product_image_ori'];?>"> </img></a>
		<?php echo "</td>";
		echo "<td>".$res['product_date']."</td>";
		echo "<td>".$res['product_tag']."</td>";
		echo "<td>";
		echo $res['spesifikasi'];
		echo "<br>Kode Produk: ".$res['kodeproduk']."";
		echo "<br><br>Kategori: ";
$menu_id=$res['menu_id'];
$bensult = mysqli_query($mysqli, "SELECT * FROM jw_product INNER JOIN jw_menu_detail on jw_product.menu_id=jw_menu_detail.id where jw_product.menu_id='$menu_id'");
$mes = mysqli_fetch_array($bensult);
$namakategori=$mes['namalapangan'];
echo $namakategori;		
echo "<br>Resto Penjual: ";
$brand_id=$res['brand_id'];
$julu = mysqli_query($mysqli, "SELECT * FROM jw_product INNER JOIN brand on jw_product.brand_id=brand.id where jw_product.brand_id='$brand_id'");
$ker = mysqli_fetch_array($julu);
$namasub=$ker['namalapangan'];
echo $namasub;
		echo "<br> Deskripsi: ".$res['deskripsi']."";
		echo "</td>";
	
		echo "<td> USD ".$rego."</td>";	
		echo "<td width=10%> <a style=padding:5px;color:#fff;background:red href=\"delete.php?product_id=$res[product_id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a><br><br>
		<a style=padding:5px;color:#fff;background:puUSD e target=_blank href=lihat.php?kodeproduk=$res[kodeproduk]>show Detail</a><br><br>
		<a style=padding:5px;color:#fff;background:Orange href=ubah.php?product_id=$res[product_id]>Edit</a>
		</td>";	
	}
	?>
	</table>
</li>
</ul><center>
</body>
</html>
