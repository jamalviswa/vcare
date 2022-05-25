<!DOCTYPE html>
<html lang="en" class="no-js" style="display: block;
    margin: 0 auto;
    min-height: 0;
    width: 400px;background:#efefef;font-family:Segoe UI">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="style.css" />
		<link rel="stylesheet" type="text/css" href="css/component.css" />
<link rel="stylesheet"href="../css/bemo.css">
<link rel="stylesheet"href="../dist/ladda.min.css">
</head><body>

		<script>(function(e,t,n){var r=e.querySelectorAll("html")[0];r.className=r.className.replace(/(^|\s)no-js(\s|$)/,"$1js$2")})(document,window,0);</script>
	</head><br><br><br><br>
<div style="    box-shadow: 0 2px 2px 0px rgba(0,0,0,0.26);
    line-height: 24px;
    font-size: 11px;
    background: #85dbfb;
    z-index: 9999;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 60px;
    /* -webkit-animation: slideOut .1s ease-in-out .1s backwards; */
    -moz-animation: slideOut .1s ease-in-out .1s backwards;
    -o-animation: slideOut .1s ease-in-out .1s backwards;
    -ms-animation: slideOut .1s ease-in-out .1s backwards;
    animation: slideOut .1s ease-in-out .1s backwards;
    border-bottom: 3px solid #48b1d8;"><img src="../../android1.png" width="40px" style="margin-left: 25px;padding: 10px;vertical-align:middle"><i style="margin-top:20px;color:#fff;font-weight:bold;font-size:20px">Lengkapi Foto</i></div>
	<body>
	<?php
include_once("../dbconnect.php");
$id_trans= $_GET['id_trans'];
$query=mysqli_fetch_array(mysqli_query($mysqli, "select * from transaksi where id_trans='$id_trans'"));
$user_attach= $query['user_attach'];
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
 	$image =$_FILES["foto_mobil"]["name"];
	$uploadedmobil = $_FILES['foto_mobil']['tmp_name'];
     
 
 	if ($image) 
 	{
 	
 		$filename = stripslashes($_FILES['foto_mobil']['name']);
 	
  		$extension = getExtension($filename);
 		$extension = strtolower($extension);
		
		
 if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) 
 		{
		
 			$change='<div class="msgdiv">Unknown Image extension </div> ';
 			$errors=1;
 		}
 		else
 		{

 $size=filesize($_FILES['foto_mobil']['tmp_name']);


if ($size > MAX_SIZE*102400)
{
	$change='<div class="msgdiv">You have exceeded the size limit!</div> ';
	$errors=1;
}


if($extension=="jpg" || $extension=="jpeg" )
{
$uploadedmobil = $_FILES['foto_mobil']['tmp_name'];
$mobil = imagecreatefromjpeg($uploadedmobil);

}
else if($extension=="png")
{
$uploadedmobil = $_FILES['foto_mobil']['tmp_name'];
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

$foto_mobil = "../attach/small". $_FILES['foto_mobil']['name'];


imagejpeg($tmp1,$foto_mobil,100);

imagedestroy($mobil);
imagedestroy($tmp1);
}}

}

//If no errors registred, print the success message
 if(isset($_POST['Submit']) && !$errors) 
 {
	$query=mysqli_query($mysqli, "update transaksi set foto_mobil='$foto_mobil' where id_trans='$id_trans'");
 if($query){
		?>
<script>document.location.href="index.html";</script>
		<?php
	}
   // mysql_query("update {$prefix}users set img='$big',img_small='$small' where user_id='$user'");
 	$change=' <div class="msgdiv">Image Uploaded Successfully!</div>';
 }
 
 
?>



<form action="successupload.php" enctype="multipart/form-data"  method="post" name="postform">

<input type="hidden" name="id_trans" value="<?php echo $query['id_trans']; ?>"/>
		<div class="container">
<div class="section group">
<div class="col span_1_of_2">
	<div class="content">

				<div class="box">
					<input type="file" name="foto_stnk" id="file-1" class="inputfile inputfile-4" data-multiple-caption="{count} files selected" multiple />
					<label for="file-1"><figure><center><img src="icon/cameral.png" style="padding:25px"/></figure> <span><small style="font-size:12px">Foto STNK&hellip;</small></span></center></label>
				</div>

			</div>

</div>
<div class="col span_1_of_2">
	<div class="content">

				<div class="box">
					<input type="file" name="foto_bpkb" id="file-2" class="inputfile inputfile-4" data-multiple-caption="{count} files selected" multiple />
					<label for="file-2"><figure><center><img src="icon/cameral.png" style="padding:25px"/></figure> <span><small style="font-size:12px">Foto BPKB&hellip;</small></span></center></label>
			</div>

			</div>
</div>
</div>
		
<div class="section group">
<div class="col span_1_of_2">
	<div class="content">

				<div class="box">
					<input type="file" name="foto_ktp" id="file-3" class="inputfile inputfile-4" data-multiple-caption="{count} files selected" multiple />
					<label for="file-3"><figure><center><img src="icon/cameral.png" style="padding:25px"/></figure> <span><small style="font-size:12px">Foto KTP&hellip;</small></span></center></label>
			</div>

			</div>

</div>
<div class="col span_1_of_2">
	<div class="content">

				<div class="box">
					<input type="file" name="foto_mobil" id="file-4" class="inputfile inputfile-4" data-multiple-caption="{count} files selected" multiple />
					<label for="file-4"><figure><center><img src="icon/cameral.png" style="padding:25px"/></figure> <span><small style="font-size:12px">Foto Mobil&hellip;</small></span></center></label>
			</div>

			</div>
</div>
</div>
		<br><br>
<center>
<section class="button-demo" style="padding:0px">
<button style="width:150px;font-size:12px;height:auto"type="submit"name="kirim"class="ladda-button"data-color="green"data-style="expand-right">Simpan Perubahan</button>
</section>

<script src="../dist/spin.min.js"></script>
<script src="../dist/ladda.min.js"></script>
<script>Ladda.bind(".button-demo button");Ladda.bind(".progress-demo button",{callback:function(b){var a=0;var c=setInterval(function(){a=Math.min(a+Math.random()*0.1,1);b.setProgress(a);if(a===1){b.stop();clearInterval(c)}},200)}});</script>
</form>
</div>
</center>		
		
		

		</div><!-- /container -->

		<script src="js/custom-file-input.js"></script>
</body>
</html>
