<head><meta charset="UTF-8"/><meta http-equiv="X-UA-Compatible"content="IE=edge,chrome=1"><meta name="viewport"content="width=device-width, initial-scale=1.0"><link rel="stylesheet"type="text/css"href="../demo.css"/><link rel="stylesheet"href="../css/bemo.css"><link rel="stylesheet"href="../dist/ladda.min.css"></head>
<body style="background: #fff"><br><br><br>
<div style="background: #fff;
    -webkit-box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14), 0 3px 1px -2px rgba(0,0,0,0.12), 0 1px 5px 0 rgba(0,0,0,0.2);
    box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14), 0 3px 1px -2px rgba(0,0,0,0.12), 0 1px 5px 0 rgba(0,0,0,0.2);
    display: block;
    margin: 0 auto;
    min-height: 0;
    width: 450px;">

<?php
include_once '../dbconnect.php';
$id_users=$_SESSION['user'];
$product_id = $_GET['product_id'];
$jim=mysqli_fetch_array(mysqli_query($mysqli, "select * from jw_product where product_id='$product_id'"));
?>
<script src="../../jquery.ui.addresspicker.js"></script>
<link rel="stylesheet"type="text/css"href="../../demo.css"/>
<style type="text/css">ul{padding:0;list-style:none}ul li{display:inline-block;position:relative;line-height:21px;text-align:left}ul li a{display:block;padding:8px 25px;color:#444;text-decoration:none}ul li a:hover{color:#red}ul li ul.dropdown{min-width:100%;background-color:#FFF;display:none;position:absolute;z-index:999;left:-50px;top:35px;border:1px solid grey}ul li:hover ul.dropdown{display:block}ul li ul.dropdown li{display:block}#home{display:none}#loading{display:block;position:absolute;top:0;left:0;z-index:99999;width:100vw;height:100vh;background-image:url("hourglass.svg");background-repeat:no-repeat;background-position:center}</style>
<link rel="stylesheet"href="../../css/bemo.css">
<link rel="stylesheet"href="../../dist/ladda.min.css">
<div class="sodrops-top" style="height:130px;">
<span class="actions" style="float:left">
<ul>
<li>
<noscript>
  	<?php
include_once("../dbconnect.php");
$product_id= $_GET['product_id'];
$query=mysqli_fetch_array(mysqli_query($mysqli, "select * from jw_product where product_id='$product_id'"));
$product_id= $query['product_id'];
?>
<?php 

include_once("../dbconnect.php");
error_reporting(0);

$change="";
$abc="";


 define ("MAX_SIZE","00");
 function getExtension($str) {
         $i = strUSD s($str,".");
         if (!$i) { return ""; }
         $l = strlen($str) - $i;
         $ext = substr($str,$i+1,$l);
         return $ext;
 }

 $errors=0;
  
 if($_SERVER["REQUEST_METHOD"] == "POST")
 {
 	$image =$_FILES["gbr"]["name"];
	$uploadedmobil = $_FILES['gbr']['tmp_name'];
     
 
 	if ($image) 
 	{
 	
 		$filename = stripslashes($_FILES['gbr']['name']);
 	
  		$extension = getExtension($filename);
 		$extension = strtolower($extension);
		
		
 if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) 
 		{
		
 			$change='<div class="msgdiv">Unknown Image extension </div> ';
 			$errors=1;
 		}
 		else
 		{

 $size=filesize($_FILES['gbr']['tmp_name']);


if ($size > MAX_SIZE*102400)
{
	$change='<div class="msgdiv">You have exceeded the size limit!</div> ';
	$errors=1;
}


if($extension=="jpg" || $extension=="jpeg" )
{
$uploadedmobil = $_FILES['gbr']['tmp_name'];
$mobil = imagecreatefromjpeg($uploadedmobil);

}
else if($extension=="png")
{
$uploadedmobil = $_FILES['gbr']['tmp_name'];
$mobil = imagecreatefrompng($uploadedmobil);

}
else 
{
$mobil = imagecreatefromgif($uploadedmobil);
}

echo $scr;

list($width1,$height1)=getimagesize($uploadedmobil);


$newwidth1=800;
$newheight1=($height1/$width1)*$newwidth1;
$tmp1=imagecreatetruecolor($newwidth1,$newheight1);

imagecopyresampled($tmp1,$mobil,0,0,0,0,$newwidth1,$newheight1,$width1,$height1);

$gbr = "../fotobarang/small". $_FILES['gbr']['name'];
$idproduct=$_POST['idproduct'];

imagejpeg($tmp1,$gbr,100);

imagedestroy($mobil);
imagedestroy($tmp1);
}}

}

//If no errors registred, print the success message
 if(isset($_POST['Submit']) && !$errors) 
 {
	$query=mysqli_query($mysqli, "INSERT INTO galery(idproduct, gbr) VALUES('$idproduct', '$gbr')");
 if($query){
		?>
<script>window.history.go(-3);</script>
		<?php
	}
   // mysql_query("update {$prefix}users set img='$big',img_small='$small' where user_id='$user'");
 	$change=' <div class="msgdiv">Image Uploaded Successfully!</div>';
 }
 
?>
</noscript>
<?php
global $conn;
$servername = "localhost";
$username = "wakz6334_mobile";
$password = "KdmiJMF-RXUd";
$dbname = "wakz6334_mobile";


$conn = mysqli_connect($servername,$username,$password,$dbname);
if (!$conn){
    die("Connection failed : ".mysqli_connect_error());
}

?>
<?php 
	include "../dbconnect.php";
	if (isset($_POST["Submit"])) {
		$jumlah = count($_FILES['gambar']['name']);
		if ($jumlah > 0) {
			for ($i=0; $i < $jumlah; $i++) { 
			$idproduct=$_POST['idproduct'];
				$file_name = $_FILES['gambar']['name'][$i];
				$tmp_name = $_FILES['gambar']['tmp_name'][$i];				
				move_uploaded_file($tmp_name, "../fotobarang/".$file_name);
				mysqli_query($conn,"INSERT INTO galery(idproduct, gbr) VALUES('$idproduct','$file_name')");				
			}
			echo "<b style='color:#444'>Berhasil Upload</b>";
		}
		else{
			echo "Gambar tidak ada";
		}
	}
	
?>
<form style="padding:20px" method="post" action="" enctype="multipart/form-data" name="form1">
<center style="color:#444"> Untuk menambah gambar galery silahkan pilih file, kemudian klik upload</center>
<input type="hidden" name="idproduct" value="<?php echo $jim['product_id']; ?>"/>	
<input style="color:" type="file" name="gambar[]" multiple /><br><br>
<button type="submit"name="Submit" style="color:#fff;background:#257d25;border:none;padding:10px;border-radius:20px;">Upload</button>
</form>
</li>
</ul>
</span>
<div style="color:#444;margin-top:20px;font-size:18px;font-family:Segoe UI light;float:right;padding-right:20px;"><?php echo $jim['product_tag'];?>
</div>
</div>
<center><br><br><br><br><br><br><br>
<img src="../fotobarang/<?php echo $jim['product_image_ori'];?>" style="width:80%;top:0"/>
<?php
$idproduct=$jim['product_id'];
$query=mysqli_query($mysqli, "SELECT * FROM galery where idproduct='$idproduct' Order by idproduct ASC");
$result = mysqli_query($mysqli, $query); 
$values = mysqli_fetch_assoc($result); 
$num_rows = $values['total']; 
if($num_rows == '0'){ ?>

<?php }else { ?>
  <link rel="stylesheet" href="../../swipe/css/swiper.min.css">

  <!-- Demo styles -->
  <style>
   
    .swiper-container {
      width: 100%;
      height: 300px;
      margin-left: auto;
      margin-right: auto;
    }
    .swiper-slide {
      background-size: cover;
      background-position: center;
    }
    .gallery-top {
      width: 100%;
    }
    .gallery-thumbs {
      height: 20%;
      box-sizing: border-box;
      padding: 10px 0;
    }
    .gallery-thumbs .swiper-slide {
      height: 100%;
      opacity: 0.4;
    }
    .gallery-thumbs .swiper-slide-active {
      opacity: 1;
    }

  </style>
</head>
  <!-- Swiper -->
  <div class="swiper-container gallery-top" style="padding:50">   
  <div class="swiper-wrapper">
 
<?php 
$idproduct=$jim['product_id'];
$jiew=mysqli_query($mysqli, "SELECT * FROM galery where idproduct='$idproduct' Order by idproduct ASC");
while($jows=mysqli_fetch_array($jiew)){
?>

      <div class="swiper-slide" style="padding: 50px;margin-right:0;width:100%;background-image:url(../fotobarang/<?php echo $jows['gbr'];?>)"></div>
    
	
<?php } ?>

</div>
    <!-- Add Arrows -->
    <div class="swiper-button-next swiper-button-white"></div>
    <div class="swiper-button-prev swiper-button-white"></div>
  </div>
  </div>

  <!-- Swiper JS -->
  <script src="../../swipe/js/swiper.js"></script>

  <!-- Initialize Swiper -->
  <script>
    var galleryTop = new Swiper('.gallery-top', {
      spaceBetween: 10,
      loop:true,
      loopedSlides: 5, //looped slides should be the same
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    });
   
  </script>
  <?php }?>

<center style="color:#444;font-weight:bold">
<br><br>
Close (x) untuk menutup layar</center>
<br><br>
</center>
<head>
<meta charset="UTF-8"/>
<meta http-equiv="X-UA-Compatible"content="IE=edge,chrome=1">
<meta name="viewport"content="width=device-width, initial-scale=1.0">
<link rel="stylesheet"href="themes/base/jquery.ui.all.css"><script src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script src="jquery.ui.addresspicker.js"></script>
<link rel="stylesheet"type="text/css"href="demo.css"/><style type="text/css">body{font-size:12px}ul{padding:0;list-style:none}ul li{display:inline-block;position:relative;line-height:21px;text-align:left}ul li a{display:block;padding:8px 25px;color:#444;text-decoration:none}ul li a:hover{color:#red}ul li ul.dropdown{min-width:100%;background-color:#FFF;display:none;position:absolute;z-index:999;left:0;top:35px;border:1px solid grey}ul li:hover ul.dropdown{display:block}ul li ul.dropdown li{display:block}#home{display:none}#loading{display:block;position:absolute;top:0;left:0;z-index:99999;width:100vw;height:100vh;background-image:url("hourglass.svg");background-repeat:no-repeat;background-position:center}</style>
<link rel="stylesheet"href="css/bemo.css">
<link rel="stylesheet"href="dist/ladda.min.css">
</head>

</div>
</body>