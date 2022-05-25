<?php
session_start();
include_once 'dbconnect.php';
if(!isset($_SESSION['sopir']))
{
	header("Location: fdex.html#login");
}
$res=mysqli_query($mysqli, "SELECT * FROM sopir WHERE id_sopir=".$_SESSION['sopir']);
$rows=mysqli_fetch_array($res);
?>
<head>
<meta charset="UTF-8"/><meta http-equiv="X-UA-Compatible"content="IE=edge,chrome=1">
<meta name="viewport"content="width=device-width, initial-scale=1.0">
<link rel="stylesheet"href="../../themes/base/jquery.ui.all.css">
<script src="../../jquery.ui.addresspicker.js"></script>
<link rel="stylesheet"type="text/css"href="../../demo.css"/>
<link rel="stylesheet"href="../../dist/ladda.min.css">
<link rel="stylesheet"href="../../css/bemo.css">
<style type="text/css">ul{padding:0;list-style:none}ul li{display:inline-block;position:relative;line-height:21px;text-align:left}ul li a{display:block;padding:8px 25px;color:#444;text-decoration:none}ul li a:hover{color:#red}ul li ul.dropdown{min-width:100%;background-color:#FFF;display:none;position:absolute;z-index:999;left:0;top:35px;border:1px solid grey}ul li:hover ul.dropdown{display:block}ul li ul.dropdown li{display:block}</style>
</head><body onkeydown="javascript:if(window.event.keyCode==13)window.event.keyCode=9">
<?php
session_start();
include_once '../dbconnect.php';

if(isset($_POST['tambah']))
{
if (empty($_POST['menu_name'])) {
   ?>
<script>window.alert("pengisian Gagal!!,Lengkapi kolom yang kosong..");document.location.href="kategori.php";</script><?php
  return false;
}


$menu_name = mysqli_real_escape_string($mysqli, $_POST['menu_name']);
$menu_id = mysqli_real_escape_string($mysqli, $_POST['menu_id']);
$gambar = mysqli_real_escape_string($mysqli, $_POST['gambar']);
	// email exist or not
	$query = "SELECT menu_name FROM jw_menu_detail WHERE menu_name='$menu_name'";
	$result = mysqli_query($mysqli, $query);
	
	$count = mysqli_num_rows($result); // if email not found then register
	
	
	if($count == 0){
		
	$gambar = $_POST['gambar'];
	if(empty($_FILES['gambar']['name'])){
		$gambar=$_POST['gambar'];
	}else{
		$gambar=$_FILES['gambar']['name'];
		//definisikan variabel file dan kendaraan file
		$uploaddir='../../fotobarang/';
		$kendaraanfile=$uploaddir.$gambar;
		//periksa jika proses upload berjalan sukses
		$upload=move_uploaded_file($_FILES['gambar']['tmp_name'],$kendaraanfile);
	}
		
		if(mysqli_query($mysqli, "INSERT INTO jw_menu_detail(menu_id, menu_name, gambar) 
			VALUES('$menu_id','$menu_name','$gambar')"))
		{
			?>
	<script>document.location.href="kategori.php";</script>
			<?php
		}
		else
		{
			?><div style="color: #F0;">Server Sibuk,Coba Ulangi</div><?php
		}		
	}
	else{
			?><div style="color: #F0;">Barang Sudah ada</div><?php
	}
	
}
?>
<br><form style="color:" id="form"action="<?php echo $_SERVER['PHP_SELF']?>"method="post"><p><b><label style="font-size:14px">Tambah Kategori baru</label></b>
<input name="menu_id"type="hidden" value="<?php echo uniqid(); ?>"/>
<input name="menu_name"type="text"placeholder="Tulis Nama Kategori"required="required"/><br>
<p><label>Upload gambar kategori</label>
<input type="file" name="gambar" size="999999" required="required"></p>
<center>
<section class="button-demo"><button style="width:200px;height:auto"type="submit"name="tambah"class="ladda-button"data-color="green"data-style="expand-right">Lanjut</button></section>
<script src="../../dist/spin.min.js"></script>
<script src="../../dist/ladda.min.js"></script>
<script>Ladda.bind(".button-demo button");Ladda.bind(".progress-demo button",{callback:function(e){var f=0;var d=setInterval(function(){f=Math.min(f+Math.random()*0.1,1);e.setProgress(f);if(f===1){e.stop();clearInterval(d)}},200)}});</script>
</form>
<br>
<a href="kategori.php"style="color:orange">Batal input data</a>
</center></body>