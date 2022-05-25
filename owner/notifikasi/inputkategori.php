<?php
session_start();
include_once '../dbconnect.php';
if(!isset($_SESSION['mitra']))
{
	header("Location: fdex.html#login");
}
$res=mysqli_query($mysqli, "SELECT * FROM mitra WHERE id_sopir=".$_SESSION['mitra']);
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
if (empty($_POST['pesan'])) {
   ?>
<script>window.alert("pengisian Gagal!!,Lengkapi kolom yang kosong..");document.location.href="index.php";</script><?php
  return false;
}
$idpengirim = $_POST['idpengirim'];
$idtujuan = $_POST['idtujuan'];
$pesan = $_POST['pesan'];
$eventer = $_POST['eventer'];
$tanggalevent = $_POST['tanggalevent'];

$result = mysqli_query($mysqli, "INSERT INTO `event` (`idevent`, `idpengirim`, `idtujuan`, `pesan`, `eventer`, `tanggalevent`) VALUES (NULL, '0', '$idtujuan', '$pesan', '0', '$tanggalevent')");?>
<script>document.location.href="historynotif.php";</script><?php } ?>
<br><br><br><form style="color:#000" id="form"action="<?php echo $_SERVER['PHP_SELF']?>"method="post"><p><b><label style="font-size:14px">Create Message for user</label></b>

<label>Send for</label>
<select name="idtujuan" required>
  <option name="idtujuan" value="user">User passengers</option>
  <option name="idtujuan" value="mitra">Driver</option>
</select><br>
<label>Message</label>
<textarea name="pesan"type="text" required placeholder="Describe your message"> </textarea>
<input name="tanggalevent"type="hidden"value="<?php echo date('d-m-Y'); ?>"/>
<input name="idpengirim"type="hidden"value="<?php echo $_SESSION['mitra']; ?>"/>
<center>
<section class="button-demo"><button style="width:200px;height:auto"type="submit"name="tambah"class="ladda-button"data-color="green"data-style="expand-right">Send</button></section>
<script src="../../dist/spin.min.js"></script>
<script src="../../dist/ladda.min.js"></script>
<script>Ladda.bind(".button-demo button");Ladda.bind(".progress-demo button",{callback:function(e){var f=0;var d=setInterval(function(){f=Math.min(f+Math.random()*0.1,1);e.setProgress(f);if(f===1){e.stop();clearInterval(d)}},200)}});</script>
</form>
<br>
<a href="index.php"style="color:orange">Cancel</a>
</center></div></div></body>