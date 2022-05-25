<?php
session_start();
include_once '../dbconnect.php';
if(!isset($_SESSION['mitra']))
{
	header("Location:../index.php");
}
$res=mysqli_query($mysqli, "SELECT * FROM mitra WHERE id_mitra=".$_SESSION['mitra']);
$rows=mysqli_fetch_array($res);

$product_id = $_GET['product_id'];
$row=mysqli_fetch_array(mysqli_query($mysqli, "select * from jw_product where product_id='$product_id'"));

if(isset($_POST['post']))
{
	
	$product_tag = mysqli_real_escape_string($mysqli, $_POST['product_tag']);
	$menu_id = mysqli_real_escape_string($mysqli, $_POST['menu_id']);
	$product_id = mysqli_real_escape_string($mysqli, $_POST['product_id']);
	$brand_id = mysqli_real_escape_string($mysqli, $_POST['brand_id']);
	$product_price = mysqli_real_escape_string($mysqli, $_POST['product_price']);
	$product_price_view = mysqli_real_escape_string($mysqli, $_POST['product_price_view']);
	$product_weight = mysqli_real_escape_string($mysqli, $_POST['product_weight']);
	$product_image_ori = mysqli_real_escape_string($mysqli, $_POST['product_image_ori']);
	$product_date = mysqli_real_escape_string($mysqli, $_POST['product_date']);
	$stockkosong = mysqli_real_escape_string($mysqli, $_POST['stockkosong']);
	$pajakkantor = mysqli_real_escape_string($mysqli, $_POST['pajakkantor']);
	$id_sopir = mysqli_real_escape_string($mysqli, $_POST['id_sopir']);
	$hargaeceran = mysqli_real_escape_string($mysqli, $_POST['hargaeceran']);
	$hargagrosir = mysqli_real_escape_string($mysqli, $_POST['hargagrosir']);
	$hargadealerkecil = mysqli_real_escape_string($mysqli, $_POST['hargadealerkecil']);
	$hargadealerbesar = mysqli_real_escape_string($mysqli, $_POST['hargadealerbesar']);
	$hargadistributorkecil = mysqli_real_escape_string($mysqli, $_POST['hargadistributorkecil']);
	$hargadistributorbesar = mysqli_real_escape_string($mysqli, $_POST['hargadistributorbesar']);
	$hargacabang = mysqli_real_escape_string($mysqli, $_POST['hargacabang']);
	$warna = mysqli_real_escape_string($mysqli, $_POST['warna']);
	$deskripsi = mysqli_real_escape_string($mysqli, $_POST['deskripsi']);
	$stock = mysqli_real_escape_string($mysqli, $_POST['stock']);
	$kodeproduk = mysqli_real_escape_string($mysqli, $_POST['kodeproduk']);
	$vpanjang = mysqli_real_escape_string($mysqli, $_POST['vpanjang']);
	$vlebar = mysqli_real_escape_string($mysqli, $_POST['vlebar']);
	$vtinggi = mysqli_real_escape_string($mysqli, $_POST['vtinggi']);
	$fullwaranty = mysqli_real_escape_string($mysqli, $_POST['fullwaranty']);
	$motorwaranty = mysqli_real_escape_string($mysqli, $_POST['motorwaranty']);
	$spesifikasi = mysqli_real_escape_string($mysqli, $_POST['spesifikasi']);
	
	$product_image_ori = $_POST['product_image_ori'];
	if(empty($_FILES['product_image_ori']['name'])){
		$product_image_ori=$_POST['product_image_ori'];
	}else{
		$product_image_ori=$_FILES['product_image_ori']['name'];
		//definisikan variabel file dan kendaraan file
		$uploaddir='../fotobarang/';
		$kendaraanfile=$uploaddir.$product_image_ori;
		//periksa jika proses upload berjalan sukses
		$upload=move_uploaded_file($_FILES['product_image_ori']['tmp_name'],$kendaraanfile);
	}
$query=mysqli_query($mysqli, "UPDATE jw_product set menu_id='$menu_id', brand_id='$brand_id', product_image_ori='$product_image_ori', product_tag='$product_tag', product_date='$product_date', hargaeceran='$hargaeceran', deskripsi='$deskripsi', stock='$stock', kodeproduk='$kodeproduk', vpanjang='$vpanjang', vlebar='$vlebar', vtinggi='$vtinggi', warna='$warna', fullwaranty='$fullwaranty', motorwaranty='$motorwaranty', spesifikasi='$spesifikasi' where product_id='$product_id'");
if($query){
		?>
	<center><script>document.location.href="index.php";</script>
</center>
		<?php
	}else{
		echo mysql_query();
	}
	

}else{
	unset($_POST['submit']);
}
?>
<html>
<head>
	<title>Edit data</title>
</head>
    <!-- Bootstrap core CSS     -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Animation library for notifications   -->
    <link href="../assets/css/animate.min.css" rel="stylesheet"/>
    <!--  Light Bootstrap Table core CSS    -->
    <link href="../assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>
    <!--  CSS for Demo PuUSD se, don't include it in your project     -->
    <link href="../assets/css/demo.css" rel="stylesheet" />

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="../assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
<body style="font-family:opensans;margin-left:70px;margin-right:70px">
<center><b style="padding:10px">Change Data Product</b></center><br>
<form id="form"action="ubah.php" enctype="multipart/form-data"  method="post" name="postform">

<table style="width:100%;padding:10px">
  <tr style="padding:10px">
    <th colspan="4" style="padding:10px"></th>
  </tr>
  <tr>
  <td style="padding:10px;background:#dadada">Picture Product</td>
    <td style="border:1px solid grey;padding:10px;"> 
	<img style="max-width:400px;height:auto" src="../fotobarang/<?php echo $row['product_image_ori'];?>"> </img>
	</td>
  <td style="padding:10px;background:#dadada">Category Product</td>
    <td style="border:1px solid grey;padding:10px;">
	<?php
	$idkategori=$row['menu_id'];
		$pam=mysqli_query($mysqli, "SELECT * FROM jw_menu_detail where id='$idkategori'");
            $lam = mysqli_fetch_array($pam);
			echo $lam['namalapangan'];
				?><br>
<select style="color:grey" name="menu_id"> 
    <option name="menu_id"value="" required="required">Change Restaurant</option>
        <?php
		$get=mysqli_query($mysqli, "SELECT * FROM jw_menu_detail");
            while($jim = mysqli_fetch_assoc($get))
            {
            ?>
            <option name="menu_id" style="color:grey" value="<?php echo $jim['id'];?>" <?php if ($jim['id']==$row['menu_id']) echo "selected='selected'"; else echo ""; ?>
                <b style="color:grey"><?php echo $jim['namalapangan']; ?></b>
            </option>
            <?php
            }               
        ?>
    </select><br>
	
		<?php
	$idbrand=$row['brand_id'];
		$san=mysqli_query($mysqli, "SELECT * FROM brand where id='$idbrand'");
            $ssa = mysqli_fetch_array($san);
			echo $ssa['namalapangan'];
				?><br>
<select style="color:grey" name="brand_id"> 
    <option name="brand_id"value="" required="required">Change Retail Store</option>
        <?php
		$hes=mysqli_query($mysqli, "SELECT * FROM brand");
            while($jism = mysqli_fetch_assoc($hes))
            {
            ?>
            <option name="brand_id" style="color:grey" value="<?php echo $jism['id'];?>" <?php if ($jism['id']==$row['brand_id']) echo "selected='selected'"; else echo ""; ?>
                <b style="color:grey"><?php echo $jism['namalapangan']; ?></b>
            </option>
            <?php
            }               
        ?>
    </select>
	</td>  
	
	</tr>
 
<tr>
    <td style="padding:10px;background:#dadada">Change Product picture</td>
    <td>
	<input style="border:1px solid grey;padding:10px;width:100%" ID="FileUpload1" onchange="IsFileSelected()" type="file" name="product_image_ori" size="999999" ></td>
	<td style="padding:10px;background:#dadada">Product Name</td>
    <td><input style="padding:10px;width:100%"type="text" name="product_tag" value="<?php echo $row['product_tag']; ?>" required="required"></td>
  </tr>
<tr>
    <td style="padding:10px;background:#dadada">Details/info</td>
    <td><input style="padding:10px;width:100%"type="text" name="spesifikasi" value="<?php echo $row['spesifikasi']; ?>" required="required"><br><input style="padding:10px;width:100%"type="text" name="deskripsi" value="<?php echo $row['deskripsi']; ?>" required="required"></td>
	<td style="padding:10px;background:#dadada">price Per quantity</td>
    <td><input style="padding:10px;width:100%" type="number" name="hargaeceran" value="<?php echo $row['hargaeceran']; ?>" required="required"></td>
    
</tr>
<tr>
      <td>
<input type="hidden" name="id_sopir" value="<?php echo $row['id_sopir']; ?>" />
<input type="hidden" name="product_id" value="<?php echo $row['product_id']; ?>" />
<input type="hidden" name="product_image_ori" value="<?php echo $row['product_image_ori']; ?>" />

<input name="product_date" type="hidden"value="<?php echo date('Y-m-d H:i:s'); ?>"/>

<center><a href="index.php"><div style="background:red;width:200px;border:none;padding:10px;width:90%;color:#fff" class="testbutton">cancel</div></a>
</center>
				</td>
				<td><center><button style="background:green;width:200px;border:none;padding:10px;width:90%;color:#fff" class="testbutton" type="submit" name="post" value="save Data">save Data</button></center></td>
			<td style="padding:10px;background:#dadada">Product Code (automatic/Custom)</td>
    <td><input style="padding:10px;width:100%" type="text" name="kodeproduk" value="<?php echo $row['kodeproduk']; ?>" required="required"></td>
    
</tr>
			<tr> 
			
			</tr>
		</table>
  
		<br>
	</form>
</body>
</html>

