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
<div class="sodrops-top" style="float:none;height:60px;background-color:#444;">
<span class="actions" style="float:left">
<ul>
<li><a href="home.php#home" onclick="javascript:showDiv();"><img src="icon/backwhite.png"width="25px"/></i></a></li>
</ul>
</span><div style="float:right;font-size:12px;"><a href="mobil.php#cart" onclick="javascript:showDiv();"><img style="vertical-align:middle;margin-top:5px;margin-right:15px;" src="icon/cartwhite.png" width="25px"/></a></div>
<div style="margin-bottom:15px;margin-top:20px;font-size:18px;font-family:Segoe UI light"><center><b>Select Product</b></center>
</div>
</div><br>
<br>

<body onkeydown="javascript:if(window.event.keyCode==13)window.event.keyCode=9">


<div style="padding-right:25px;padding-left:25px;height:900px;background-color:#fff"><br><br>
<?php
include "dbconnect.php";
?>

<?php
$menu_id = $_GET['menu_id'];
$jiew=mysqli_query($mysqli, "SELECT product_id, product_tag, hargaeceran, product_image_ori FROM jw_product where menu_id='$menu_id' ORDER BY product_id ASC");
$count=mysqli_num_rows($jiew);
$i = 0;
while($jows=mysqli_fetch_array($jiew)){
$menu_id=$jows['menu_id'];
$product_id=$jows['product_id'];
$product_tag=$jows['product_tag'];
$product_price_view=$jows['product_price_view'];
$product_price=$jows['product_price'];
$product_image_ori=$jows['product_image_ori'];
?>
<table width="100%"style="background-color:#ffff;color:#444">
<tr style="font-weight:normal;font-size:11px;border-top:1px solid #dcdcdc;">
<th rowspan="2" width="30%">
	<?php
 if($jows['product_image_ori']=='0')
      { ?>
<img src="icon/nopic.png" style="float:right;width:80px;top:0;"/>
<?php }
else{?>
<img src="owner/fotobarang/<?php echo $jows['product_image_ori'];?>" style="padding:5px;width:100px;"/>
<?php } ?>
</th>
<th rowspan="2" width="50%"style="font-weight:normal;font-size:11px;">
<b><small><?php echo $jows['product_tag'];?></small></b><br><small>
USD <?php 
$jim=$jows['hargaeceran'];
$total = number_format($jim,0,",",".");
echo $total;?>/Pcs</small>
<input type="hidden"name="hrg"value="<?php echo $jows['hargaeceran'];?>"/>
</th>
<th width="20%">
<a style="float:right" onclick="javascript:showDiv();" href="calc.php?product_id=<?php echo $jows['product_id'];?>#buy" ><div class="red" style="float:right;font-size:12px;"><img style="vertical-align:middle;margin-top:5px;" src="icon/cart.png" width="25px"/></div>
</a>
</th>
</tr>
</table>
<?php } 
?>
</li>
</ul><center>

<script src="dist/spin.min.js"></script>
<script src="dist/ladda.min.js"></script>
<script>Ladda.bind(".button-demo button");Ladda.bind(".progress-demo button",{callback:function(e){var f=0;var d=setInterval(function(){f=Math.min(f+Math.random()*0.1,1);e.setProgress(f);if(f===1){e.stop();clearInterval(d)}},200)}});</script>
</div>

</body>
<?php 
$id_users = $_SESSION['user'];
$kon=mysqli_fetch_array(mysqli_query($mysqli, "select * from transaksi where id_users='$id_users'"));
$aktif=$kon['aktif'];
if($aktif == 'yes'){ ?><center>
<style>.red{display:none;visibility:hidden}</style>
<div style="position:fixed;width:100%;color:red;z-index:99999;bottom:0;padding:30px;box-shadow:5px 2px 8px 1px rgba(0,0,0,0.15);background-color:yellow"><b><small>Now, you cannot order<br> Plese wait your request delivered by drivers</b></small>
<br><br><br>
<a href="about.php#about"><button style="width:250px;font-size:12px;height:auto;margin-top:-20px;padding-bottom:20px"class="ladda-button"data-color="red">Show Transaction</button></a>
</center>
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
