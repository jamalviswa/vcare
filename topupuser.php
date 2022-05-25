<?php

session_start();
include_once 'dbconnect.php';
if(!isset($_SESSION['user']))
{
	header("Location: firli.php#login");
}
$res=mysqli_query($mysqli, "SELECT * FROM users WHERE id=".$_SESSION['user']);
$rows=mysqli_fetch_array($res);
?>
<?php
$jiew=mysqli_query($mysqli, "SELECT * FROM trans_user where id_users=".$_SESSION['user']);
while($jow=mysqli_fetch_array($jiew)){
	?><?php 
 if($jow['statussaldo']=='minta')
      { ?>
<script>document.location.href="bayarin.php#saldo";</script><?php }
?>
<?php 
 if($jow['statussaldo']=='dijemput')
      { ?>
<script>document.location.href="#tunggu";</script><?php }};?>

<?php
include_once("dbconnect.php");
if(isset($_POST['Confirm'])){
	$banksaldo=$_POST['banksaldo'];
	$nomorrek = $_POST['nomorrek'];
	$namauser = $_POST['namauser'];
	$id_users = $_POST['id_users'];
$query=mysqli_query($mysqli, "UPDATE trans_user set banksaldo='$banksaldo', nomorrek='$nomorrek', namauser='$namauser', statussaldo='dijemput' WHERE id_users='$id_users' and statussaldo='minta'");					
	if($query){
		?><script>document.location.href="topupuser.php#tunggu";</script>
		<?php
	}else{
		echo mysql_query();
	}
	

}else{
	unset($_POST['Confirm']);
}
?>

<link rel="stylesheet"type="text/css"href="demo.css"/>
<style type="text/css">ul{padding:0;list-style:none}ul li{display:inline-block;position:relative;line-height:21px;text-align:left}ul li a{display:block;padding:8px 25px;color:#444;text-decoration:none}ul li a:hover{color:#red}ul li ul.dropdown{min-width:100%;background-color:#FFF;display:none;position:absolute;z-index:999;left:-50px;top:35px;border:1px solid grey}ul li:hover ul.dropdown{display:block}ul li ul.dropdown li{display:block}#cari{display:none}#loading{display:block;position:absolute;top:0;left:0;z-index:99999;width:100vw;height:100vh;background-image:url("hourglass.svg");background-repeat:no-repeat;background-position:center}</style>
<link rel="stylesheet"href="css/bemo.css">
<link rel="stylesheet"href="dist/ladda.min.css">
<meta http-equiv="refresh" content="26">
<div id="tunggu"class="panel" style="background:#fff"><div class="content" style="background:#fff;color:"><br>
<div class="sodrops-top" style="background:#444;height:50px;"><span class="actions"><ul>
<li><a href="about.php#otw"><img src="icon/refresh.png"width="25px"/></a></li>
<li><a href="home.php#home" onclick="javascript:showDiv();"><img src="icon/home.png"width="25px"/></a></li></ul></span>
<div style="color:#fff;margin-left:20px;font-size:18px;font-weight:bold;margin-top:5;">
Payment
</div></div>
<center>
<div style="margin-top:150px;color:#444;font-size:15px">Plese wait.... refresh status to check change<br><br>
<img src="icon/perawa.png" width="300px"/>
<br><br>
pleese wait...<br> Your payment proceed by Admin</div>
<br>
<br><br></center>
</div></div>