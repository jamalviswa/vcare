<?php
session_start();
include_once 'dbconnect.php';
if(!isset($_SESSION['user']))
{
	header("Location: fdex.php#login");
}
$res=mysqli_query($mysqli, "SELECT * FROM users WHERE id=".$_SESSION['user']);
$rows=mysqli_fetch_array($res);
?>
<head>
<meta charset="UTF-8"/>
<meta http-equiv="X-UA-Compatible"content="IE=edge,chrome=1">
<meta name="viewport"content="width=device-width, initial-scale=1.0">
<link href="css/timepicki.css"rel="stylesheet">
<link rel="stylesheet"href="themes/base/jquery.ui.all.css">
<script src="js/jquery.min.js"></script> 
<script src="js/jquery-ui.min.js"></script>
<link rel="stylesheet"type="text/css"href="demo.css"/>
<style type="text/css">ul{padding:0;list-style:none}ul li{display:inline-block;position:relative;line-height:21px;text-align:left}ul li a{display:block;padding:8px 25px;color:#444;text-decoration:none}ul li a:hover{color:#red}ul li ul.dropdown{min-width:100%;background-color:#FFF;display:none;position:absolute;z-index:999;left:-50px;top:35px;border:1px solid grey}ul li:hover ul.dropdown{display:block}ul li ul.dropdown li{display:block}#loading{display:block;position:absolute;top:0;left:0;z-index:99999;width:100vw;height:100vh;background-image:url("hourglass.svg");background-repeat:no-repeat;background-position:center}</style>
<link rel="stylesheet"href="css/bemo.css">
<link rel="stylesheet"href="dist/ladda.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<?php 
$id_users=$_SESSION['user'];
$id_barang=$_GET['product_id'];
$jin = "SELECT * FROM keranjang WHERE idbarang='$id_barang' and id_users='$id_users' and aktif='yes' and idtrans='0'";
$fes = mysqli_query($mysqli, $jin);
$lemo = mysqli_fetch_array($fes);
$pon = mysqli_num_rows($fes);
if($pon == 1){ ?>
<script>document.location.href="returedit.php?idcatalog=<?php echo $lemo['idcatalog'];?>";</script>
<?php } else {?>
<div id="buy"class="panel">
<div class="content"style="width:100%;right:0;left:0;">

<?php
if(isset($_POST['sambat'])){
$tgl=$_POST['tgl'];
$id_users=$_POST['id_users'];
$idcatalog=$_POST['idcatalog'];
$quantity=$_POST['quantity'];
$aktif=$_POST['aktif'];
$idtrans=$_POST['idtrans'];
$id_sopir=$_POST['id_sopir'];
$checkout=$_POST['checkout'];
$hrg=$_POST['hrg'];
$idbarang=$_POST['idbarang'];
$tot=$hrg*$quantity;
$fen=mysqli_fetch_array(mysqli_query($mysqli, "select * from jw_product where product_id='$idbarang'"));
$juy=mysqli_fetch_array(mysqli_query($mysqli, "select * from limithutang where idlimit='1'"));
$limitday=$juy['jumlahlimit'];
$pok=$hrg*$quantity;
$id_users=$_SESSION['user'];
$purba = "SELECT sum(tot) AS total FROM keranjang where id_users='$id_users' and aktif='yes' and checkout='no'"; 
$lupa = mysqli_query($mysqli, $purba); 
$jalumes = mysqli_fetch_assoc($lupa); 
$turow=$jalumes['total']; 
$purge=$turow+$pok;
if($purge >= $limitday){ ?>
<script>window.alert("Harga Pembelian melebihi limit");window.history.back(-1);</script><?php
  return false;
}

$input = "SELECT idbarang FROM keranjang WHERE id_users='$id_users' and idbarang='$idbarang' and aktif='yes' and idtrans='0'";
$result = mysqli_query($mysqli, $input);
$count = mysqli_num_rows($result);

$kodebayar=$_POST['pembayaran'];
if($count == 0){
$quantity=$_POST['quantity'];
$product_id=$_GET['product_id'];
$adastock=$_POST['adastock'];
$adasales=$_POST['adasales'];
$stockupdate=$adastock-$quantity;
$sales=$adasales+$quantity;

		if(mysqli_query($mysqli, "INSERT INTO `keranjang` (`idcatalog`, `tgl`, `idbarang`, `id_users`, `quantity`, `aktif`, `hrg`, `tot`, `idtrans`, `id_sopir`, `checkout`, `kodebayar`) VALUES('$idcatalog', '$tgl', '$idbarang', '$id_users', '$quantity', 'yes', '$hrg', '$tot', '0', '1', 'no', '0')"))
		{
			
mysqli_query($mysqli, "UPDATE jw_product SET stock='$stockupdate',sales='$sales' WHERE product_id='".$_POST['product_id']."'");
			?>
<script>document.location.href="mobil.php#cart";</script><?php
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
<?php 
$product_id=$_GET['product_id'];
$kess=mysqli_query($mysqli, "SELECT * FROM jw_product WHERE product_id='$product_id'");
$fefes = mysqli_fetch_array($kess);
?>
  <div id="id01" class="w3-modal" style="position:absolute;padding-top: 100px;display:block;">
    <div class="w3-modal-content" style="position:relative;background-color:#ffff;">
      <header style="color:#444;background-color:#ffff;"> 
        <center style="color:#444;padding-top:10px"><b><small>Buy<br><?php echo $fefes['product_tag'];?></small></b><br>USD  <?php 
$jim=$fefes['hargaeceran'];
$total = number_format($jim,0,",",".");
echo $total;?>/Pcs</center>
      </header>
	  
      <div class="w3-container"style="color:#4444;">
        <p style="color:#444"><br>How much?<br>
<script data-require="jquery@3.1.1" data-semver="3.1.1" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="plus.css" />
    <script src="plus.js"></script>
<!------ Include the above in your HEAD tag ---------->
<form id="form1" action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
<input name="id_users" type="hidden" value="<?php echo $_SESSION['user'];?>"/>
<input type="hidden"name="tgl"value="<?php 
date_default_timezone_set('Asia/Manila');
echo date('Y-m-d h:i:s'); ?>"/>
<input type="hidden"name="adastock"value="<?php echo $fefes['stock'];?>"/>
<input type="hidden"name="product_id"value="<?php echo $fefes['product_id'];?>"/>
<input type="hidden"name="adasales"value="<?php echo $fefes['sales'];?>"/>
<input type="hidden"name="idbarang"value="<?php echo $fefes['product_id'];?>"/>
<input type="hidden" name="idcatalog"value="<?php echo(rand(10,100));?>"/>
<input type="hidden"name="id_sopir"value="<?php echo $fefes['id_sopir'];?>"/>
<input type="hidden"name="checkout"value="no"/>
<input type="hidden"name="aktif"value="yes"/>
<input type="hidden"name="idtrans"value="0"/>
	<input type="hidden" value="<?php echo $fefes['hargaeceran'];?>" name="hrg" id="price">
   <div class="quantity buttons_added" style="float:left">
	<input type="button" value="-" class="minus" style="width:50px;">
	<input id="myText" onchange="myFunction(this.value)" style="width:100px;"type="number" step="1" min="1" max="" name="quantity" value="1" title="Qty" class="input-text qty text" size="4" pattern="" inputmode="">
	<input type="button" value="+" class="plus" style="width:50px;">
</div>
		</p>
Estimated Price: <div style="color:#444" id="nemo"></div>

<script>
function myFunction() {
    var x = document.getElementById("myText").value;
  var get_package=$("#price").val();
    var total = get_package * x;
	document.getElementById("total").value=total;
	
    var number = get_package * x;
	thousand_separator = '.';
	
var	number_string = number.toString(),
	rest 	  = number_string.length % 3,
	result 	  = number_string.substr(0, rest),
	thousands = number_string.substr(rest).match(/\d{3}/gi);
		
		if (thousands) {
	separator = rest ? thousand_separator : '';
	result += separator + thousands.join(thousand_separator);
}

// Print the result
    document.getElementById("nemo").innerHTML = "P  " + result;
    document.getElementById("demo").innerHTML = total;
}
</script>
<input type="hidden" name="tot" id="total">

	   </div>
      <footer style="padding:10px;background-color:#ffff!important;color:#fff">
        <p><center>
		<button onclick="javascript:showDiv();" style="border:none;border-radius:10px;width:40%;color:#fff;background:#3ea53e;padding:10px;float:right;" type="submit" name="sambat">BUY</button>
		<a onclick="javascript:showDiv();" href="javascript:history.back();" style="width:40%;color:#c52828;border:2px solid #c52828;padding:10px;float:left;border-radius:10px;">CANCEL</a>
		</center></p>
      </footer>
	  </form>
    </div>
  </div>
  
  
</div>
</div>

<?php }?>
<div id="loading" style="display:none">
</div>
<script type="text/javascript">
        function showDiv() {
            div = document.getElementById('loading');
            div.style.display = "block";
        }
</script>
