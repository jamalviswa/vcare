<?php
session_start();
include_once 'dbconnect.php';
if(!isset($_SESSION['user']))
{
	header("Location: ../mithome.php");
}
$res=mysqli_query($mysqli, "SELECT * FROM users WHERE id=".$_SESSION['user']);
$rows=mysqli_fetch_array($res);
?>

<head>
<meta charset="UTF-8"/><meta http-equiv="X-UA-Compatible"content="IE=edge,chrome=1"><meta name="viewport"content="width=device-width, initial-scale=1.0">
<link rel="stylesheet"type="text/css"href="../demo.css"/><link rel="stylesheet"href="../css/bemo.css"><link rel="stylesheet"href="../dist/ladda.min.css"></head>
<body onkeydown="javascript:if(window.event.keyCode == 13) window.event.keyCode = 9;"><!--sodrops top bar-->
<div class="sodrops-top" style="height:60px;background-color:#d00909">
<span class="actions" style="float:left">
<ul>
<li><a style="margin-left:-20px;" href="../mithome.php#saldo" onclick="javascript:showDiv();"><img src="../icon/back.png"width="25px"/></i></a></li>
</ul>
</span>
<div style="font-size:18px;font-family:Segoe UI light;float:right;padding-right:20px;">
<a href="javascript:history.go(0)"><img src="../icon/refresh.png"width="25px"/></a>
</div>
</div><br><br><br><br>
<center style="color:#444"><h4>Your Balance</h4>
<b>USD  <?php 
$sistim = $rows['saldo'];
$saldo = number_format($sistim,0,",",".");
echo $saldo;?></b>
</center><br>
<br>
<br>
<center style="font-size:14px;color:#444;font-family:Segoe UI;background:#dedede;border-top:1px solid grey;border-bottom:1px solid grey;border-style:dashed;">
<?php 
$milk=mysqli_query($mysqli, "SELECT * FROM trans_sopir where idsopir=".$_SESSION['user']);
while($ent=mysqli_fetch_array($milk)){
 if($ent['statussaldo']=='minta')
      { 
   if($ent['tipesaldo']=='topup')
      { ?>
<b><small>You Request Topup</small></b><br><br>
Please transfer payment to admin bank accoount value:<br><center>USD  <?php $koker = $ent['jumlahsaldo']; $broker = number_format($koker,0,",","."); echo $broker;?>,-</center>
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
<small>after transfer money, please confirmation data</small><br><br>
<br>
<center>
<b><small>Confirm Your payment here</small></b></center>
<br>
<form id="form"action="topupdriver.php" method="post">
<input name="id_mitra" type="hidden" value="<?php echo $_SESSION['user'];?>"/>
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
    background-size: 20px;" id="txt" type='number'name="nomorrek"class='holo' placeholder="Account number" aria-required="true" required="required"/>
<nav></nav></div><br>
<center style="color:"><div id="input">Owner Name :<br>
<input style="color:#444;padding:5px;
    vertical-align: middle;
    border-bottom: 1px solid grey;
    background-size: 20px;" type='text'name="namauser"class='holo' placeholder="Owner Name" aria-required="true" required="required"/>
<nav></nav></div><br>
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
document.getElementById("txt").onkeypress = function(e) {
    var chr = String.fromCharCode(e.which);
    if ("1234567890".indexOf(chr) < 0)
        return false;
};
</script>
<button type="submit"name="Confirm" style="width:200px;color:#fff;background:green;border:none;padding:10px;border-radius:20px;" onclick="javascript:showDiv();">Confirm</button>
<br><br>
<a href="saldohabis.php#saldo"style="color:orange">Back</a>
</center>
</form>
	  <?php }
	  if($ent['tipesaldo']=='withdraw')
      {?>
<b><small>You request Withdrawal</small></b><br><br>

	  <? }}
 if($ent['statussaldo']=='dijemput')
 {
?><br>
<b><small>Request <?php echo $ent['tipesaldo'];?> on going process by administrator...</small></b><br>
<?php echo $ent['tipesaldo'];?> value: USD  <?php $koker = $ent['jumlahsaldo']; $broker = number_format($koker,0,",","."); echo $broker;?>,-<br>
<?php }}
$input = "SELECT count(*) as total FROM trans_sopir WHERE idsopir='".$_SESSION['user']."' and statussaldo='minta'";
$result = mysqli_query($mysqli, $input);
$count = mysqli_fetch_assoc($result);
$jimrows=$count['total'];
if($jimrows==0){?>
 </center><center>
<section class="button-demo" style="padding:0;width:100%">
<a href="topupdriver.php?id=<?php echo $rows['id'];?>"><button style="width:100%;border-radius:0px;" class="ladda-button" data-color="blue" data-style="expand-right">
<small>Toup Up/Deposit balance</small></button></a>
</section>
<?php }else{}?>
</body>
<?php 
$id_trans=$_GET['id_trans'];
$mitra = $_SESSION['mitra'];
$view=mysqli_query($mysqli, "SELECT * FROM transaksi where id_mitra='$mitra' and id_trans='$id_trans'");
while($row=mysqli_fetch_array($view)){
	?><?php 
 if($row['status_trans']=='dijemput')
      { ?><script>document.location.href="../jemput.php";</script><?php }	} ;
 ?>