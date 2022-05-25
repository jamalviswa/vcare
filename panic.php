<?php
include_once("dbconnect.php");
if(isset($_POST['Confirm'])){
	$banksaldo=$_POST['banksaldo'];
	$nomorrek = $_POST['nomorrek'];
	$namauser = $_POST['namauser'];
	$id_users = $_POST['id_users'];
$query=mysqli_query($mysqli, "UPDATE trans_saldo set banksaldo='$banksaldo', nomorrek='$nomorrek', namauser='$namauser', statussaldo='dijemput' WHERE id_users='$id_users' and statussaldo='minta'");					
	if($query){
		?><script>document.location.href="bayarin.php#saldo";</script>
		<?php
	}else{
		echo mysql_query();
	}
	

}else{
	unset($_POST['Confirm']);
}
?>
<?php
session_start();
include_once 'dbconnect.php';

if(!isset($_SESSION['user']))
{
	header("Location: mithome.php#home");
}
$res=mysqli_query($mysqli, "SELECT * FROM users WHERE id=".$_SESSION['user']);
$rows=mysqli_fetch_array($res);
?>
<?php
$id_trans=$_GET['id_trans'];
$jiew=mysqli_query($mysqli, "SELECT * FROM panic where id_trans='$id_trans'");
while($jow=mysqli_fetch_array($jiew)){
	?><?php 
 if($jow['statuspanic']=='minta')
      { ?>
<script>document.location.href="bayarin.php#saldo";</script><?php }
?>
<?php
if($jow['statuspanic']=='dijemput')
      {?>
<script>document.location.href="panic.php#saldo";</script><?php }};?>

<?php
if(isset($_POST['tambah'])){
if (empty($_POST['id_trans'])) {
   ?>
<script>window.alert("Connection problem!");window.history.back(-2);</script><?php
  return false;
}
$tglpanic = $_POST['tglpanic'];
$id_mitra = $_POST['id_mitra'];
$id_users = $_POST['id_users'];
$statuspanic = $_POST['statuspanic'];
$lat	= $_POST['lat'];
$lng = $_POST['lng'];
$id_trans = $_POST['id_trans'];
$input = "SELECT id_trans FROM panic WHERE id_trans='$id_trans' and statussaldo='dijemput'";
$result = mysqli_query($mysqli, $input);
$count = mysqli_num_rows($result); // if email not found then register
if($count == 0){
if(mysqli_query($mysqli, "INSERT INTO `panic` (`idpanic`, `id_trans`, `id_mitra`, `id_users`, `statuspanic`, `tglpanic`) VALUES (NULL, '$id_trans', '$id_mitra', '$id_users', '$statuspanic', '$tglpanic');"))
		{
			?>
<script>document.location.href="panic.php#saldo";</script><?php
		}
		else
		{
			?>
<?php
		}		
	}
	else{
			?>
<?php
	}
	
}
?>
<meta charset="UTF-8"/>
<meta http-equiv="X-UA-Compatible"content="IE=edge,chrome=1">
<meta name="viewport"content="width=device-width, initial-scale=1.0">
<link href="../css/timepicki.css"rel="stylesheet">
<link rel="stylesheet"href="../themes/base/jquery.ui.all.css">
<script src="../js/jquery.min.js"></script>
<script src="../js/jquery-ui.min.js"></script>
<link rel="stylesheet"type="text/css"href="../demo.css"/>
<style type="text/css">ul{padding:0;list-style:none}ul li{display:inline-block;position:relative;line-height:21px;text-align:left}ul li a{display:block;padding:8px 25px;color:#444;text-decoration:none}ul li a:hover{color:#red}ul li ul.dropdown{min-width:100%;background-color:#FFF;display:none;position:absolute;z-index:999;left:-50px;top:35px;border:1px solid grey}ul li:hover ul.dropdown{display:block}ul li ul.dropdown li{display:block}#cari{display:none}#loading{display:block;position:absolute;top:0;left:0;z-index:99999;width:100vw;height:100vh;background-image:url("hourglass.svg");background-repeat:no-repeat;background-position:center}</style>
<link rel="stylesheet"href="../css/bemo.css">
<link rel="stylesheet"href="../dist/ladda.min.css">
<?php 
$id_trans = $_GET['id_trans'];
$view=mysqli_query($mysqli, "SELECT * FROM transaksi where id_trans='$id_trans'");
while($row=mysqli_fetch_array($view)){
?>
<body style="width:100%;background:#fff;padding:0;font-family:Segoe UI">
<div class="sodrops-top" style="height:60px;background-color:#d00909">
<span class="actions" style="float:left">
<ul>
<li><a href="javascript:history.back();" onclick="javascript:showDiv();"><img src="../icon/backwhite.png"width="25px"/></i></a></li>
</ul>
</span>
<div style="margin-top:20px;font-size:18px;font-family:Segoe UI light;float:right;padding-right:20px;">Police Button
</div>
</div>
<center style="width:100%;"><br><br><br>
<img src="icon/alert.jpg" style="width:100%;height:200px;"/>
</center>
<div style="width:100%;color:#fff;position:absolute;">
<table width="100%" style="background-color:rgba(1, 102, 185, 0.76);">
<tr>
<td width="50%" style="background-color:#3a3b3c;padding:10px;"><center>
1. You will send this alert to admin
</center></td>
<td width="50%" style="background-color:#b71313;padding:10px;"><center>
2. Admin call POLICE Officer to help
</center></td>
</tr>
</table>
</div>
<div style="color:#444;padding:20px"><br><br><br><br><br><center>
Police Button use for dangerous condition<br>
if you are in danger and see a criminal, use this button to call the police officer
</div>
<form id="form"action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
<input name="statuspanic" type="hidden" value="dijemput"/>
<input name="id_mitra" type="hidden" value="<?php echo $_SESSION['user'];?>"/>
<input type="hidden"name="tglpanic"value="<?php date_default_timezone_set('Asia/Jakarta');
echo date('d-m-Y H:i:s'); ?>"/>
<input type='hidden'name="id_users" value="<?php echo $row['id_users'];?>"/>
<input type='hidden'name="id_trans" value="<?php echo $row['id_trans'];?>"/></div><br></center>
<br><br>
<table width="100%" style="width:100%;z-index:9999;bottom:0;position:fixed;background-color:#444;box-shadow: 0 2px 5px rgba(0,0,0,.26);"><tr>
<td style="font-size:12px;padding:20px;color:#fff"width="50%">Click Police Button
</td>
<td style="font-size:15px;padding:20px;color:#fff;"width="50%">
<center>
<button type="submit"name="tambah" style="color:#fff;background:green;border:none;padding:10px;border-radius:20px;" onclick="javascript:showDiv();">Police Button</button>
</div>
</form>
</div>
</td>
</tr>
</table>
<div id="loading" style="display:none">
</div>
<script type="text/javascript">
        function showDiv() {
            div = document.getElementById('loading');
            div.style.display = "block";
        }
</script>
<?php 	}
 ?>
<div id="saldo"class="panel" style="background:#fff"><div class="content" style="background:#fff;color:"><br><br><br><br>
<div style="padding:10px;font-size:14px;color:#444;font-family:Segoe UI;background:#dedede;border-top:1px solid grey;border-bottom:1px solid grey;border-style:dashed;">
<?php 
$milk=mysqli_query($mysqli, "SELECT * FROM panic where id_mitra=".$_SESSION['user']);
while($ent=mysqli_fetch_array($milk)){
 if($ent['statuspanic']=='minta')
      { 
   if($ent['tipesaldo']=='topup')
      { ?>

	  <?php }
	  if($ent['tipesaldo']=='withdraw')
      {?>
	  <? }}
 if($ent['statuspanic']=='dijemput')
 {
?><br>
<b><small>Laporan darurat Anda sudah diterima, bantuan segera menuju lokasi GPS anda</small></b><br><br>
<?php }}?>
</div></div>

</body>