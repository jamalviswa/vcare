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
<head>
<meta charset="UTF-8"/><meta http-equiv="X-UA-Compatible"content="IE=edge,chrome=1">
<meta name="viewport"content="width=device-width, initial-scale=1.0">
<link rel="stylesheet"href="../../themes/base/jquery.ui.all.css">
<script src="../../jquery.ui.addresspicker.js"></script>
<link rel="stylesheet"type="text/css"href="../../demo.css"/>
<link rel="stylesheet"href="../../dist/ladda.min.css">
<link rel="stylesheet"href="../../css/bemo.css">
<style type="text/css">ul{padding:0;list-style:none}ul li{display:inline-block;position:relative;line-height:21px;text-align:left}ul li a{display:block;padding:8px 25px;color:#000;text-decoration:none}ul li a:hover{color:#red}ul li ul.dropdown{min-width:100%;background-color:#FFF;display:none;position:absolute;z-index:999;left:0;top:35px;border:1px solid grey}ul li:hover ul.dropdown{display:block}ul li ul.dropdown li{display:block}</style>
</head><body onkeydown="javascript:if(window.event.keyCode==13)window.event.keyCode=9">
<div id="home"class="panel"style="color:#000"><div class="content">
<?php
include_once("../dbconnect.php");
if(isset($_POST['tambah'])) {	

if (empty($_POST['phone'])) {
   ?>
<script>window.alert("pengisian Gagal!!,Lengkapi kolom yang kosong..");document.location.href="index.php";</script><?php
  return false;
}
$phone=$_POST['phone'];
	$query = "SELECT phone FROM contact WHERE phone='$phone'";
	$result = mysqli_query($mysqli, $query);
	
	$count = mysqli_num_rows($result);
	if($count == 1){
	   ?>
<script>window.alert("pengisian Gagal!!,Nomor sudah terdaftar, pakai nomor lain");document.location.href="index.php";</script><?php
  return false;
}	

$idcontact = $_POST['idcontact'];
$phone = $_POST['phone'];
$namaadmin = $_POST['namaadmin'];

$result = mysqli_query($mysqli, "INSERT INTO contact(namaadmin, phone) VALUES('$namaadmin', '$phone')");?>
<script>document.location.href="index.php";</script><?php } ?>
<br><form style="color:#000" id="form"action="<?php echo $_SERVER['PHP_SELF']?>"method="post">
<p>
<label>Nama Contact</label><br>
<input type="text" placeholder="Nama administrator/Support team" name="namaadmin" required="required" value="<?php echo $namaadmin;?>"></br></br>
<input type="number" placeholder="Nomor Telepon" name="phone" required="required" value="<?php echo $phone;?>"></br></br>
</p>

<center>
<section class="button-demo"><button style="width:200px;height:auto"type="submit"name="tambah"class="ladda-button"data-color="green"data-style="expand-right">Lanjut</button></section>
<script src="../../dist/spin.min.js"></script>
<script src="../../dist/ladda.min.js"></script>
<script>Ladda.bind(".button-demo button");Ladda.bind(".progress-demo button",{callback:function(e){var f=0;var d=setInterval(function(){f=Math.min(f+Math.random()*0.1,1);e.setProgress(f);if(f===1){e.stop();clearInterval(d)}},200)}});</script>
</form>
<br>
<a href="index.php"style="color:orange">Batal input data</a>
</center></div></div></body>