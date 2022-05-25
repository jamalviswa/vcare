<?php
session_start();
include_once 'dbconnect.php';
if(!isset($_SESSION['user']))
{
	header("Location: firli.php#login");
}
$res=mysqli_query($mysqli, "SELECT * FROM users WHERE id=".$_SESSION['user']);
$rows=mysqli_fetch_array($res);
$id_users=$_SESSION['user'];
$idcatalog = $_GET['idcatalog'];
$cor=mysqli_fetch_array(mysqli_query($mysqli, "select * from keranjang where idcatalog='$idcatalog'"));
$idbarang=$cor['idbarang'];
$jim=mysqli_fetch_array(mysqli_query($mysqli, "select * from jw_product where product_id='$idbarang'"));
?>
<?php
if(isset($_POST['tambah'])) {
$idbarang = $_POST['idbarang'];
$quantity = $_POST['quantity'];
$idcatalog = $_POST['idcatalog'];

$fen=mysqli_fetch_array(mysqli_query($mysqli, "select * from jw_product where product_id='$idbarang'"));

$hrg	= $fen['hargaeceran'];
$tot	= $hrg*$quantity;
$juy=mysqli_fetch_array(mysqli_query($mysqli, "select * from limithutang where idlimit='1'"));
$limitday=$juy['jumlahlimit'];
$pok = $hrg*$quantity;
$id_users = $_SESSION['user'];
$purba = "SELECT sum(tot) AS total FROM keranjang where id_users='$id_users' and aktif='yes' and checkout='no'"; 
$lupa = mysqli_query($mysqli, $purba); 
$jalumes = mysqli_fetch_assoc($lupa); 
$turow = $jalumes['total']; 
$purge=$turow+$pok;
if($purge >= $limitday){ ?>
<script>window.alert("Overlimit");window.history.back(-1);</script><?php
  return false;
}

$result = mysqli_query($mysqli, "UPDATE keranjang set idbarang='$idbarang', hrg='$hrg', quantity='$quantity', tot='$tot' where idcatalog='$idcatalog' and checkout='no'");

$quantity=$_POST['quantity'];
$awalnya=$_POST['awalnya'];
$adastock=$_POST['adastock'];
$adasales=$_POST['adasales'];
$stockupdate=$adastock+$awalnya-$quantity;
$sales=$adasales-$awalnya+$quantity;
$result = mysqli_query($mysqli, "UPDATE jw_product SET stock='$stockupdate',sales='$sales' WHERE product_id='".$_POST['product_id']."'");

echo '<script language="javascript">';
echo 'alert("Successfully Edited")';
echo '</script>';
?><script>document.location.href="mobil.php#cart";</script>
<?php } ?><br><br><br><br>
<center>
<img src="owner/fotobarang/<?php echo $jim['product_image_ori'];?>" style="width:80%;top:0"/>
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
<body>
<div class="sodrops-top" style="height:60px;">
<span class="actions" style="float:left">
<ul>
<li><a href="mobil.php#cart" onclick="javascript:showDiv();"><img src="icon/back.png"width="25px"/></i></a></li>
</ul>
</span>
<div style="color:#fff;margin-top:20px;font-size:18px;font-family:Segoe UI light;float:right;padding-right:20px;"><?php echo $jim['product_tag'];?>
</div>
</div>
<div style="padding:30px;color:#616161;border:none">
<form style="color:" id="form"action="<?php echo $_SERVER['PHP_SELF']?>"method="post">
<p>
<?php
$idcatalog = $_GET['idcatalog'];
$cumm=mysqli_fetch_array(mysqli_query($mysqli, "select * from keranjang where idcatalog='$idcatalog'"));
?><p>
<label>Change item Quantity</label>
<input type="number" name="quantity" min="1" max="100" value="<?php echo $cumm['quantity'];?>" />
</p>
<input type="hidden" name="idcatalog" value="<?php echo $_GET['idcatalog'];?>" />
<?php $fen=mysqli_fetch_array(mysqli_query($mysqli, "select * from jw_product where product_id='".$cumm['idbarang']."'")); ?>
<input type="hidden" name="awalnya" value="<?php echo $cumm['quantity'];?>" />
<input type="hidden" name="adastock" value="<?php echo $fen['stock'];?>" />
<input type="hidden" name="adasales" value="<?php echo $fen['sales'];?>" />
<input type="hidden" name="product_id" value="<?php echo $fen['product_id'];?>" />
<input type="hidden" name="idbarang" value="<?php echo $cumm['idbarang'];?>" />
</p>
<section class="button-demo"><button style="width:200px;height:auto" onclick="javascript:showDiv();" type="submit"name="tambah"class="ladda-button"data-color="green"data-style="expand-right">Submit</button></section>
<script src="../dist/spin.min.js"></script>
<script src="../dist/ladda.min.js"></script>
<script>Ladda.bind(".button-demo button");Ladda.bind(".progress-demo button",{callback:function(e){var f=0;var d=setInterval(function(){f=Math.min(f+Math.random()*0.1,1);e.setProgress(f);if(f===1){e.stop();clearInterval(d)}},200)}});</script>
</form>
<center>
<br><br>
<a href="javascript:history.back()" onclick="javascript:showDiv();" style="color:orange">Back</a></center>
</div><br><br>
</body>

<div id="loading" style="display:none">
</div>
<script type="text/javascript">
        function showDiv() {
            div = document.getElementById('loading');
            div.style.display = "block";
        }
</script>