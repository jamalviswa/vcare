<?php
session_start();
include_once '../dbconnect.php';

if(!isset($_SESSION['mitra']))
{
	header("Location: index.php");
}
$res=mysqli_query($mysqli, "SELECT * FROM mitra WHERE id_mitra=".$_SESSION['mitra']);
$rows=mysqli_fetch_array($res);
if(isset($_POST['submit']))
{
	$product_tag = mysqli_real_escape_string($mysqli, $_POST['product_tag']);
	$menu_id = mysqli_real_escape_string($mysqli, $_POST['menu_id']);
	$brand_id = mysqli_real_escape_string($mysqli, $_POST['brand_id']);
	$product_date = mysqli_real_escape_string($mysqli, $_POST['product_date']);
	$id_mitra = mysqli_real_escape_string($mysqli, $_POST['id_mitra']);
	$hargaeceran = mysqli_real_escape_string($mysqli, $_POST['hargaeceran']);
	$deskripsi = mysqli_real_escape_string($mysqli, $_POST['deskripsi']);
	$stock = mysqli_real_escape_string($mysqli, $_POST['stock']);
	$sales = mysqli_real_escape_string($mysqli, $_POST['sales']);
	$kodeproduk = mysqli_real_escape_string($mysqli, $_POST['kodeproduk']);
	$vpanjang = mysqli_real_escape_string($mysqli, $_POST['vpanjang']);
	$vlebar = mysqli_real_escape_string($mysqli, $_POST['vlebar']);
	$vtinggi = mysqli_real_escape_string($mysqli, $_POST['vtinggi']);
	$warna = mysqli_real_escape_string($mysqli, $_POST['warna']);
	$fullwaranty = mysqli_real_escape_string($mysqli, $_POST['fullwaranty']);
	$motorwaranty = mysqli_real_escape_string($mysqli, $_POST['motorwaranty']);
	$spesifikasi = mysqli_real_escape_string($mysqli, $_POST['spesifikasi']);
	
	$product_tag = trim($product_tag);
	// email exist or not
	$query = "SELECT product_tag FROM jw_product WHERE product_tag='$product_tag'";
	$result = mysqli_query($mysqli, $query);
	
	$count = mysqli_num_rows($result); // if email not found then register
	
	
	if($count == 0){
		
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
		
		if(mysqli_query($mysqli, "INSERT INTO jw_product(menu_id, brand_id, product_image_ori, product_tag, product_date, id_mitra, hargaeceran, deskripsi, stock, sales, kodeproduk, vpanjang, vlebar, vtinggi, warna, fullwaranty, motorwaranty, spesifikasi)VALUES('$menu_id', '$brand_id', '$product_image_ori', '$product_tag', '$product_date', '$id_mitra', '$hargaeceran', '$deskripsi', '$stock', '$sales', '$kodeproduk', '$vpanjang', '$vlebar', '$vtinggi', '$warna', '$fullwaranty', '$motorwaranty', '$spesifikasi')"))
		{
			?>
	<script>document.location.href="index.php";</script>
			<?php
		}
		else
		{
			?><div style="color: #F0;">Server is busy trafic</div><?php
		}		
	}
	else{
			?><div style="color: #F0;">Name or product already registered</div><?php
	}
	die();
}
?>
<html>
<head>
	<title>Add Data</title>
</head>
<body style="font-family:Segoe UI light;margin-left:70px;margin-right:70px">
<form id="form"action="add.php" enctype="multipart/form-data"  method="post" name="postform">

<table style="width:100%;padding:10px">
  <tr>
    <th colspan="4" style="padding:10px;color:#101D25;"><center><b>Add Data Product</b></center></th>
  </tr>
 <tr>
    <th colspan="2" rowspan="6" style="padding:10px;background-color:#dadada"><center><br><br><br><br><br>
		<article>
        <label for="files">Add product picture: </label>
        <input size="999999" required="required" name="product_image_ori" id="files" type="file"/>
        <output id="result" />
    </article>
  <style>

  article
{
    width: 80%;
    margin:auto;
    margin-top:10px;
}


.thumbnail{

    width: 300px;height: auto;
    margin: 10px;    
}

  </style>
  <script>
  window.onload = function(){
        
    //Check File API support
    if(window.File && window.FileList && window.FileReader)
    {
        var filesInput = document.getElementById("files");
        
        filesInput.addEventListener("change", function(event){
            
            var files = event.target.files; //FileList object
            var output = document.getElementById("result");
            
            for(var i = 0; i< files.length; i++)
            {
                var file = files[i];
                
                //Only pics
                if(!file.type.match('image'))
                  continue;
                
                var picReader = new FileReader();
                
                picReader.addEventListener("load",function(event){
                    
                    var picFile = event.target;
                    
                    var div = document.createElement("div");
                    
                    div.innerHTML = "<img class='thumbnail' src='" + picFile.result + "'" +
                            "title='" + picFile.name + "'/>";
                    
                    output.insertBefore(div,null);            
                
                });
                
                 //Read the image
                picReader.readAsDataURL(file);
            }                               
           
        });
    }
    else
    {
        console.log("Your browser does not support File API");
    }
}
    
  </script></center>
	</th>
  <th style="padding:10px;border:1px solid grey;">
  <select style="color:grey"name="menu_id" > 
    <option name="menu_id"value="" required="required">Select Categories</option>
        <?php
		$get=mysqli_query($mysqli, "SELECT * FROM jw_menu_detail");
            while($jim = mysqli_fetch_assoc($get))
            {
            ?>
            <option name="menu_id" style="color:grey"value="<?php echo $jim['id'];?>" >
                <b style="color:grey"><?php echo $jim['namalapangan']; ?></b>
            </option>
            <?php
            }               
        ?>
    </select>
  </th>
    
<tr>
    <td style="padding:10px;border:1px solid grey">
	<input style="padding:10px;width:100%"type="text" name="product_tag" placeholder="Name Product/Model/Tipe" required="required"></td>
    <td style="padding:10px;border:1px solid grey"><input style="padding:10px;width:100%" type="number" name="hargaeceran" placeholder="price per quantity (INR )" required="required"></td>
  </tr>
 
<tr>
	<td style="padding:10px;border:1px solid grey"><small>Qty stock</small><br><input style="padding:10px;width:100%"type="number" name="stock" min="1" placeholder="available stock"></td>
    <td style="padding:10px;border:1px solid grey"><small>Product Code (automatic/custom)</small><br><input style="padding:10px;width:100%" type="text" name="kodeproduk" value="<?php
function resi(){
$gpass=NULL;
$n = 10; // jumlah karakter yang akan di bentuk.
$chr = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
for($i=0;$i<$n;$i++){
$rIdx = rand(1,strlen($chr));
$gpass .=substr($chr,$rIdx,1);
}
return $gpass;
};
echo resi(); 
?>" required="required"></td>
    
</tr>
<tr>
	   
</tr>
<tr>
   
</tr>
<tr>
   
</tr>
    <th colspan="2" style="padding:10px;background:#dadada"> 
<small>Product Details</small><br><input style="padding:10px;width:100%" type="text" name="spesifikasi" placeholder="Short description" required="required"><br><textarea style="padding:10px;width:100%"type="text" name="deskripsi" placeholder="Details spesification" required="required"></textarea>
	</th>
			
<td colspan="2" style="padding:10px;background:#dadada">
<input type="hidden" name="id_mitra" value="<?php echo $rows['id_mitra']; ?>" />
<input type="hidden" name="sales" value="0" />
<input name="product_date" type="hidden"value="<?php echo date('Y-m-d H:i:s'); ?>"/>
<center><small>make sure about your product information, Click save, then Show Gallery to add many picture product</small><br><br><a href="index.php"><div style="width:200px;border-radius:30px;background:red;border:none;padding:10px;color:#fff" class="testbutton">Cancel</div></a>
<br><button style="width:200px;border-radius:30px;background:green;border:none;padding:10px;color:#fff" class="testbutton" type="submit" name="submit" value="save Data">Save</button></center>
</td>
			</tr>
		</table>
  
		<br>
	</form>
</body>
</html>

