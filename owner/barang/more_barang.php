<table width='100%' border=0>
<?php
include "../dbconnect.php";
if(isSet($_POST['getLastContentId']))
{
$getLastContentId=$_POST['getLastContentId'];
$result = mysqli_query($mysqli, "SELECT * FROM jw_product where product_id >".$getLastContentId." order by product_id ASC limit 20");
$count=mysqli_num_rows($result);
if($count>0){
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
		<img width="100px" src="../../fotobarang/<?php echo $res['product_image_ori'];?>"> </img></a>
		<?php echo "</td>";
		echo "<td>".$res['product_date']."</td>";
		echo "<td>".$res['product_tag']."</td>";
		echo "<td>";
		echo $res['spesifikasi'];
		echo "<br>Kode Produk: ".$res['kodeproduk']."";
		echo "<br>warna: ".$res['warna']."";
		echo "<br><br>Kategori: ";
$menu_id=$res['menu_id'];
$bensult = mysqli_query($mysqli, "SELECT * FROM jw_product INNER JOIN jw_menu_detail on jw_product.menu_id=jw_menu_detail.id where jw_product.menu_id='$menu_id'");
$mes = mysqli_fetch_array($bensult);
$namakategori=$mes['namalapangan'];
echo $namakategori;		
echo "<br>Toko penjual: ";
$brand_id=$res['brand_id'];
$julu = mysqli_query($mysqli, "SELECT * FROM jw_product INNER JOIN brand on jw_product.brand_id=brand.id where jw_product.brand_id='$brand_id'");
$ker = mysqli_fetch_array($julu);
$namasub=$ker['namalapangan'];
echo $namasub;
		echo "<br> Deskripsi: ".$res['deskripsi']."";
		echo "</td>";
		echo "<td>".$res['fullwaranty']."</td>";
		echo "<td>".$res['motorwaranty']."</td>";
		echo "<td> USD ".$rego."</td>";	
		echo "<td>".$stock."</td>";	
		echo "<td>".$sales."</td>";	
		echo "<td width=10%> <a style=padding:5px;color:#fff;background:red href=\"delete.php?product_id=$res[product_id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a><br><br>
		<a style=padding:5px;color:#fff;background:puUSD e target=_blank href=lihat.php?kodeproduk=$res[kodeproduk]>Lihat Detail</a><br><br>
		<a style=padding:5px;color:#fff;background:Orange href=ubah.php?product_id=$res[product_id]>Edit</a>
		</td>";	
	}
	?>
	</table>
<center>
<div class="more_div"><a href="#"><div id="load_more_<?php echo $product_id; ?>" class="more_tab">
<div class="more_button" id="<?php echo $product_id; ?>"style="border: 1px solid #868686;border-radius:5px;color: #868686;width: 200px;">Lihat berikutnya</div></a></div></center><br><br>
</div>
 
<?php
} else{
echo "<center><div class='all_loaded'>Data sudah ditampilkan semua</div></center>";
}
}
?>