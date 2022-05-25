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
	header("Location: fdex.html#login");
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
      {?>
<script>document.location.href="topupuser.php#tunggu";</script><?php }};?>

<?php
if(isset($_POST['tambah'])){
if (empty($_POST['jumlahsaldo'])) {
   ?>
<script>window.alert("Connection problem!");window.history.back(-2);</script><?php
  return false;
}
$id_users = $_POST['id_users'];
$tipesaldo	= $_POST['tipesaldo'];
$jumlahsaldo = $_POST['jumlahsaldo'];
$statussaldo = $_POST['statussaldo'];
$tgl_request = $_POST['tgl_request'];


$banksaldo = $_POST['banksaldo'];
$namauser = $_POST['namauser'];
$nomorrek = $_POST['nomorrek'];
$id_trans = $_POST['id_trans'];
$input = "SELECT id_users FROM trans_user WHERE id_users='$id_users' and statussaldo='minta'";
$result = mysqli_query($mysqli, $input);
$count = mysqli_num_rows($result); // if email not found then register
if($count == 0){
if(mysqli_query($mysqli, "INSERT INTO `trans_user` (`idsaldo`, `id_users`, `tipesaldo`, `jumlahsaldo`, `statussaldo`, `tgl_request`, `banksaldo`, `namauser`, `nomorrek`, `id_trans`) VALUES (NULL, '$id_users', '$tipesaldo', '$jumlahsaldo', 'minta', '$tgl_request', '$banksaldo', '$namauser', '$nomorrek', '$id_trans');"))
		{
			?>
<script>document.location.href="bayarin.php#saldo";</script><?php
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
<link href="css/timepicki.css"rel="stylesheet">
<link rel="stylesheet"href="themes/base/jquery.ui.all.css">
<script src="js/jquery.min.js"></script>
<script src="js/jquery-ui.min.js"></script>
<link rel="stylesheet"type="text/css"href="demo.css"/>
<style type="text/css">ul{padding:0;list-style:none}ul li{display:inline-block;position:relative;line-height:21px;text-align:left}ul li a{display:block;padding:8px 25px;color:#444;text-decoration:none}ul li a:hover{color:#red}ul li ul.dropdown{min-width:100%;background-color:#FFF;display:none;position:absolute;z-index:999;left:-50px;top:35px;border:1px solid grey}ul li:hover ul.dropdown{display:block}ul li ul.dropdown li{display:block}#cari{display:none}#loading{display:block;position:absolute;top:0;left:0;z-index:99999;width:100vw;height:100vh;background-image:url("hourglass.svg");background-repeat:no-repeat;background-position:center}</style>
<link rel="stylesheet"href="css/bemo.css">
<link rel="stylesheet"href="dist/ladda.min.css">
<?php 
$id_trans = $_GET['id_trans'];
$view=mysqli_query($mysqli, "SELECT * FROM transaksi where id_trans='$id_trans'");
while($row=mysqli_fetch_array($view)){
?>
<body style="width:100%;background:#fff;padding:0;font-family:Segoe UI">
<div class="sodrops-top" style="height:60px;background-color:#d00909">
<span class="actions" style="float:left">
<ul>
<li><a href="javascript:history.back();" onclick="javascript:showDiv();"><img src="icon/backwhite.png"width="25px"/></i></a></li>
</ul>
</span>
<div style="margin-top:20px;font-size:18px;font-family:Segoe UI light;float:right;padding-right:20px;">Payment
</div>
<center style="width:100%;"><br><br><br>
<img src="icon/topup.jpg" style="width:100%;height:200px;"/>
</center>
<div style="width:100%;color:#fff;position:absolute;">
<table width="100%" style="background-color:rgba(1, 102, 185, 0.76);">
<tr>
<td width="50%" style="background-color:#3a3b3c;padding:10px;"><center>
1. Transfer to admin bank account
</center></td>
<td width="50%" style="background-color:#b71313;padding:10px;"><center>
2. Payment Confirm
</center></td>
</tr>
</table>
</div>
<div style="color:#444;padding:20px"><br><br><br><br><br><center>

</div>
<form id="form"action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
<input name="tipesaldo" type="hidden" value="topup"/>
<input name="statussaldo" type="hidden" value="minta"/>
<input name="banksaldo" type="hidden" value="0"/>
<input name="namauser" type="hidden" value="0"/>
<input name="nomorrek" type="hidden" value="0"/>
<input name="idtrans" type="hidden" value="<?php echo $row['kode_trans'];?>"/>
<input name="id_users" type="hidden" value="<?php echo $_SESSION['user'];?>"/>
<input type="hidden"name="tgl_request"value="<?php date_default_timezone_set('Asia/Jakarta');
echo date('d-m-Y'); ?>"/>
<center style="color:#000;font-size:20"><div id="input">Your invoice :<br>
<b style="color:#000;font-size:30">USD <?php 
$jumlah = $row['harga'];
$subtotal = number_format($jumlah,0,",",".");
echo $subtotal;?></b>
<input type='hidden'name="jumlahsaldo" value="<?php echo $row['harga'];?>"/>
<input type='hidden'name="id_trans" value="<?php echo $row['id_trans'];?>"/></div><br></center>
<br><br>
<table width="100%" style="width:100%;z-index:9999;bottom:0;position:fixed;background-color:#444;box-shadow: 0 2px 5px rgba(0,0,0,.26);"><tr>
<td style="font-size:12px;padding:20px;color:#fff"width="50%">click Next to transfer
</td>
<td style="font-size:15px;padding:20px;color:#fff;"width="50%">
<center>
<button type="submit"name="tambah" style="color:#fff;background:green;border:none;padding:10px;border-radius:20px;" onclick="javascript:showDiv();">Next</button>
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
<div id="saldo"class="panel" style="background:#fff"><div class="content" style="background:#fff;color:">
<div class="sodrops-top"><span class="actions"><ul>
<li><a href="javascript:history.go(0)"><img src="icon/refresh.png"width="25px"/></a></li><li><a href="home.php#home"><img src="icon/home.png"width="25px"/></a></li>
</ul></span><div style="color:#fff;margin-left:20px;font-size:18px;font-weight:bold;margin-top:5;">
Request
</div></div><br>
<br><br><br><br>

<div style="padding:10px;font-size:14px;color:#444;font-family:Segoe UI;background:#dedede;border-top:1px solid grey;border-bottom:1px solid grey;border-style:dashed;">
<?php 
$milk=mysqli_query($mysqli, "SELECT * FROM trans_user where id_users=".$_SESSION['user']);
while($ent=mysqli_fetch_array($milk)){

$id_trans=$ent['id_trans'];
$her=mysqli_query($mysqli, "SELECT * FROM transaksi where id_trans='$id_trans'");
$mul=mysqli_fetch_array($her);
 if($ent['statussaldo']=='minta')
      { 
   if($ent['tipesaldo']=='topup')
      { ?>

Payment Code : <?php  echo $mul['kode_trans'];?><br>
Invoice : USD  <?php  $jumlah=$ent['jumlahsaldo'];$subtotal = number_format($jumlah,0,",",".");echo $subtotal;?><br><br>
<br><b><small>Choose one account admin for your payment :</small></b><br><br>
<?php
$result = mysqli_query($mysqli, "SELECT * FROM infobank");
?>

	<table style="color:#444;font-size:12px;"width='100%' border=0>

	<tr>
		<th><small>Bank Name</small></th>
		<th><small>Account number</small></th>
		<th><small>Owner Name</small></th>
	</tr>
	<?php 
$i = 1;
	while($res = mysqli_fetch_array($result)) { 		
		echo "<tr>";	
		echo "<td>".$res['namabank']."</td>";
		echo "<td>".$res['norek']."</td>";
		echo "<td>".$res['namaorang']."</td>";
		echo "</tr>";	
		}
	?>
	</table>
<br><br><br></div>
<center><br><br>
<a href="#Confirm">
<button style="width:100%;font-size:15px;height:auto;margin-top:0px;padding-bottom:20px;border-radius:0px;"class="ladda-button"data-color="green">Confirm Payment</button>
</a>
</center>
	  <?php }
	  if($ent['tipesaldo']=='withdraw')
      {?>
<b><small>Your request Withdrawal</small></b><br><br>

	  <? }}
 if($ent['statussaldo']=='dijemput')
 {
?><br>
<b><small>Request <?php echo $ent['tipesaldo'];?> Already check with Admin</small></b><br><br>
<?php }}?>
</div></div>


<div id="Confirm"class="panel" style="background:#fff"><div class="content" style="background:#fff;color:"><br>
<center>
<b><small>Please fill this form and Confirm</small></b></center>
<br>
<form id="form"action="topupuser.php" method="post">
<input name="id_users" type="hidden" value="<?php echo $_SESSION['user'];?>"/>
<center style="color:"><div id="input">Choose your bank<br>
  <select style="padding:10px;background:#fff;font-size:11px;" name="banksaldo" > 
    <?php
session_start();
include_once 'dbconnect.php';
		$get=mysqli_query($mysqli, "SELECT * FROM infobank");
            while($jim = mysqli_fetch_assoc($get))
            {
            ?>
            <option name="banksaldo" style="color:grey" value="<?php echo $jim['namabank'];?>" ><?php echo $jim['namabank']; ?></option>
            <?php
            }               
        ?>
         </select><nav></nav></div><br>
<center style="color:"><div id="input">Account number :<br>
<input style="color:#444;padding:5px;
    vertical-align: middle;
    border-bottom: 1px solid grey;
    background-size: 20px;" type='number'name="nomorrek"class='holo' placeholder="Your Bank Account number" aria-required="true" required="required"/>
<nav></nav></div><br>
<center style="color:"><div id="input">Owner Name :<br>
<input style="color:#444;padding:5px;
    vertical-align: middle;
    border-bottom: 1px solid grey;
    background-size: 20px;" type='text'name="namauser"class='holo' placeholder="Your name" aria-required="true" required="required"/>
<nav></nav></div><br>
<button type="submit"name="Confirm" style="width:200px;color:#fff;background:green;border:none;padding:10px;border-radius:20px;" onclick="javascript:showDiv();">Confirm</button>
<br><br>
<a href="bayarin.php#saldo"style="color:orange">Back</a>
</center>
</form>
</div></div>


</body>