<?php session_start(); ?>
<?php
include_once '../dbconnect.php';

if(!isset($_SESSION['mitra']))
{
	header("Location: index.php");
}
$res=mysqli_query($mysqli, "SELECT * FROM mitra WHERE id_mitra=".$_SESSION['mitra']);
$rows=mysqli_fetch_array($res);
?>
<?php
//fetching data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM jw_product ORDER BY menu_id ASC");
?>
<style>
.content{width:100%;height:100%;padding-top:40px;padding-right: 25px;padding-left: 25px;top:0;position:absolute;padding-bottom:30px}
.content p{width:100%;font-size:12px;color:#444;;padding:10px;line-height:24px;color:#fff;display:inline-block;padding:10px;margin:3px 0}.parsel{min-width:100%;height:100%;overflow-y:auto;overflow-x:hidden;position:absolute}.parel{min-width:65%;height:100%;overflow-y:auto;overflow-x:hidden;position:absolute}
.panel{-webkit-animation:slideOut .1s ease-in-out .1s backwards;-moz-animation:slideOut .1s ease-in-out .1s backwards;-o-animation:slideOut .1s ease-in-out .1s backwards;-ms-animation:slideOut .1s ease-in-out .1s backwards;animation:slideOut .1s ease-in-out .1s backwardsbackground-color:#f5f5f5;color:#444;min-width:100%;height:100%;overflow-y:auto;overflow-x:hidden;position:absolute;margin-top:-150%;opacity:0;z-index:2;-webkit-transition:opacity .1s ease-in-out;-moz-transition:opacity .1s ease-in-out;-o-transition:opacity .1s ease-in-out;-ms-transition:opacity .1s ease-in-out;transition:opacity .1s ease-in-out}.panel:target{opacity:1;margin-top:0}
.ladda-button{position:relative}.ladda-button .ladda-spinner{position:absolute;z-index:2;display:inline-block;width:32px;height:32px;top:50%;margin-top:0;opacity:0;pointer-events:none}.ladda-button .ladda-label{position:relative;z-index:3}.ladda-button .ladda-progress{position:absolute;width:0;height:100%;left:0;top:0;background:rgba(0,0,0,0.2);visibility:hidden;opacity:0;-webkit-transition:0.1s linear all !important;-moz-transition:0.1s linear all !important;-ms-transition:0.1s linear all !important;-o-transition:0.1s linear all !important;transition:0.1s linear all !important}.ladda-button[data-loading] .ladda-progress{opacity:1;visibility:visible}.ladda-button,.ladda-button .ladda-spinner,.ladda-button .ladda-label{-webkit-transition:0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275) all !important;-moz-transition:0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275) all !important;-ms-transition:0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275) all !important;-o-transition:0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275) all !important;transition:0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275) all !important}.ladda-button[data-style=zoom-in],.ladda-button[data-style=zoom-in] .ladda-spinner,.ladda-button[data-style=zoom-in] .ladda-label,.ladda-button[data-style=zoom-out],.ladda-button[data-style=zoom-out] .ladda-spinner,.ladda-button[data-style=zoom-out] .ladda-label{-webkit-transition:0.3s ease all !important;-moz-transition:0.3s ease all !important;-ms-transition:0.3s ease all !important;-o-transition:0.3s ease all !important;transition:0.3s ease all !important}.ladda-button[data-style=expand-right] .ladda-spinner{right:-6px}.ladda-button[data-style=expand-right][data-size="s"] .ladda-spinner,.ladda-button[data-style=expand-right][data-size="xs"] .ladda-spinner{right:-12px}.ladda-button[data-style=expand-right][data-loading]{padding-right:56px}.ladda-button[data-style=expand-right][data-loading] .ladda-spinner{opacity:1}.ladda-button[data-style=expand-right][data-loading][data-size="s"],.ladda-button[data-style=expand-right][data-loading][data-size="xs"]{padding-right:40px}.ladda-button[data-style=expand-left] .ladda-spinner{left:26px}.ladda-button[data-style=expand-left][data-size="s"] .ladda-spinner,.ladda-button[data-style=expand-left][data-size="xs"] .ladda-spinner{left:4px}.ladda-button[data-style=expand-left][data-loading]{padding-left:56px}.ladda-button[data-style=expand-left][data-loading] .ladda-spinner{opacity:1}.ladda-button[data-style=expand-left][data-loading][data-size="s"],.ladda-button[data-style=expand-left][data-loading][data-size="xs"]{padding-left:40px}.ladda-button[data-style=expand-up]{overflow:hidden}.ladda-button[data-style=expand-up] .ladda-spinner{top:-32px;left:50%;margin-left:0}.ladda-button[data-style=expand-up][data-loading]{padding-top:54px}.ladda-button[data-style=expand-up][data-loading] .ladda-spinner{opacity:1;top:26px;margin-top:0}.ladda-button[data-style=expand-up][data-loading][data-size="s"],.ladda-button[data-style=expand-up][data-loading][data-size="xs"]{padding-top:32px}.ladda-button[data-style=expand-up][data-loading][data-size="s"] .ladda-spinner,.ladda-button[data-style=expand-up][data-loading][data-size="xs"] .ladda-spinner{top:4px}.ladda-button[data-style=expand-down]{overflow:hidden}.ladda-button[data-style=expand-down] .ladda-spinner{top:62px;left:50%;margin-left:0}.ladda-button[data-style=expand-down][data-size="s"] .ladda-spinner,.ladda-button[data-style=expand-down][data-size="xs"] .ladda-spinner{top:40px}.ladda-button[data-style=expand-down][data-loading]{padding-bottom:54px}.ladda-button[data-style=expand-down][data-loading] .ladda-spinner{opacity:1}.ladda-button[data-style=expand-down][data-loading][data-size="s"],.ladda-button[data-style=expand-down][data-loading][data-size="xs"]{padding-bottom:32px}.ladda-button[data-style=slide-left]{overflow:hidden}.ladda-button[data-style=slide-left] .ladda-label{position:relative}.ladda-button[data-style=slide-left] .ladda-spinner{left:100%;margin-left:0}.ladda-button[data-style=slide-left][data-loading] .ladda-label{opacity:0;left:-100%}.ladda-button[data-style=slide-left][data-loading] .ladda-spinner{opacity:1;left:50%}.ladda-button[data-style=slide-right]{overflow:hidden}.ladda-button[data-style=slide-right] .ladda-label{position:relative}.ladda-button[data-style=slide-right] .ladda-spinner{right:100%;margin-left:0;left:16px}.ladda-button[data-style=slide-right][data-loading] .ladda-label{opacity:0;left:100%}.ladda-button[data-style=slide-right][data-loading] .ladda-spinner{opacity:1;left:50%}.ladda-button[data-style=slide-up]{overflow:hidden}.ladda-button[data-style=slide-up] .ladda-label{position:relative}.ladda-button[data-style=slide-up] .ladda-spinner{left:50%;margin-left:0;margin-top:1em}.ladda-button[data-style=slide-up][data-loading] .ladda-label{opacity:0;top:-1em}.ladda-button[data-style=slide-up][data-loading] .ladda-spinner{opacity:1;margin-top:0}.ladda-button[data-style=slide-down]{overflow:hidden}.ladda-button[data-style=slide-down] .ladda-label{position:relative}.ladda-button[data-style=slide-down] .ladda-spinner{left:50%;margin-left:0;margin-top:-2em}.ladda-button[data-style=slide-down][data-loading] .ladda-label{opacity:0;top:1em}.ladda-button[data-style=slide-down][data-loading] .ladda-spinner{opacity:1;margin-top:0}.ladda-button[data-style=zoom-out]{overflow:hidden}.ladda-button[data-style=zoom-out] .ladda-spinner{left:50%;margin-left:32px;-webkit-transform:scale(2.5);-moz-transform:scale(2.5);-ms-transform:scale(2.5);-o-transform:scale(2.5);transform:scale(2.5)}.ladda-button[data-style=zoom-out] .ladda-label{position:relative;display:inline-block}.ladda-button[data-style=zoom-out][data-loading] .ladda-label{opacity:0;-webkit-transform:scale(0.5);-moz-transform:scale(0.5);-ms-transform:scale(0.5);-o-transform:scale(0.5);transform:scale(0.5)}.ladda-button[data-style=zoom-out][data-loading] .ladda-spinner{opacity:1;margin-left:0;-webkit-transform:none;-moz-transform:none;-ms-transform:none;-o-transform:none;transform:none}.ladda-button[data-style=zoom-in]{overflow:hidden}.ladda-button[data-style=zoom-in] .ladda-spinner{left:50%;margin-left:-16px;-webkit-transform:scale(0.2);-moz-transform:scale(0.2);-ms-transform:scale(0.2);-o-transform:scale(0.2);transform:scale(0.2)}.ladda-button[data-style=zoom-in] .ladda-label{position:relative;display:inline-block}.ladda-button[data-style=zoom-in][data-loading] .ladda-label{opacity:0;-webkit-transform:scale(2.2);-moz-transform:scale(2.2);-ms-transform:scale(2.2);-o-transform:scale(2.2);transform:scale(2.2)}.ladda-button[data-style=zoom-in][data-loading] .ladda-spinner{opacity:1;margin-left:0;-webkit-transform:none;-moz-transform:none;-ms-transform:none;-o-transform:none;transform:none}.ladda-button[data-style=contract]{overflow:hidden;width:100px}.ladda-button[data-style=contract] .ladda-spinner{left:50%;margin-left:0}.ladda-button[data-style=contract][data-loading]{border-radius:50%;width:52px}.ladda-button[data-style=contract][data-loading] .ladda-label{opacity:0}.ladda-button[data-style=contract][data-loading] .ladda-spinner{opacity:1}.ladda-button[data-style=contract-overlay]{overflow:hidden;width:100px;box-shadow:0px 0px 0px px transparent}.ladda-button[data-style=contract-overlay] .ladda-spinner{left:50%;margin-left:0}.ladda-button[data-style=contract-overlay][data-loading]{border-radius:50%;width:52px;box-shadow:0px 0px 0px px rgba(0,0,0,0.8)}.ladda-button[data-style=contract-overlay][data-loading] .ladda-label{opacity:0}.ladda-button[data-style=contract-overlay][data-loading] .ladda-spinner{opacity:1}.ladda-button{background:#3ec525;border:0;padding:14px 18px;font-size:18px;cursor:pointer;color:#fff;border-radius:2px;border:1px solid transparent;-webkit-appearance:none;-webkit-font-smoothing:antialiased;-webkit-tap-highlight-color:transparent}.ladda-button:hover{border-color:rgba(0,0,0,0.07);background-color:#888}.ladda-button[data-color=green]{background:#2aca76}.ladda-button[data-color=green]:hover{background-color:#38d683}.ladda-button[data-color=blue]{background:#53b5e6}.ladda-button[data-color=blue]:hover{background-color:#69bfe9}.ladda-button[data-color=red]{background:#ea8557}.ladda-button[data-color=red]:hover{background-color:#ed956e}.ladda-button[data-color=puUSD e]{background:#9973C2}.ladda-button[data-color=puUSD e]:hover{background-color:#a685ca}.ladda-button[data-color=mint]{background:#16a085}.ladda-button[data-color=mint]:hover{background-color:#19b698}.ladda-button[disabled],.ladda-button[data-loading]{border-color:rgba(0,0,0,0.07)}.ladda-button[disabled],.ladda-button[disabled]:hover,.ladda-button[data-loading],.ladda-button[data-loading]:hover{cursor:default;background-color:#999}.ladda-button[data-size=xs]{padding:4px 8px}.ladda-button[data-size=xs] .ladda-label{font-size:0.7em}.ladda-button[data-size=s]{padding:6px 10px}.ladda-button[data-size=s] .ladda-label{font-size:0.9em}.ladda-button[data-size=l] .ladda-label{font-size:1.2em}.ladda-button[data-size=xl] .ladda-label{font-size:1.5em}
</style>
<link rel="stylesheet"type="text/css"href="../button.css"/>
<html>
<body>
   <!-- Bootstrap core CSS     -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Animation library for notifications   -->
    <link href="../assets/css/animate.min.css" rel="stylesheet"/>
    <!--  Light Bootstrap Table core CSS    -->
    <link href="../assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>
    <!--  CSS for Demo PuUSD se, don't include it in your project     -->
    <link href="../assets/css/demo.css" rel="stylesheet" />

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="../assets/css/pe-icon-7-stroke.css" rel="stylesheet" /><br><br><br>
<table width="100%" style="border: 1px solid #c1c1c1;padding: 10px;background-color:#f8f8f8"><tr>
<td width="25%" style="padding:20px;background:none">
<center><a style="width:100%;padding:15px;color:#FFA500;background:#101D25;border-radius:20px;"href="add.php">Add Products</a></center>
</td>
<td width="25%"style="padding:20px;background:none">
<center><a style="width:100%;padding:15px;color:#FFA500;background:#101D25;border-radius:20px;" href="kategori/index.php" onclick="myFunction()">Add Categories</a></center>
</td>
</tr></table>
<br/><br>
</head>
<body>
<table class="table table-bordered" style="font-size:12px;" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
<th style="background:#fff;color:#101D25;"><b>Picture</b></th>
<th style="background:#fff;color:#101D25;"><b>input date</b></th>
<th style="background:#fff;color:#101D25;"><b>Products</b></th>
		<th style="background:#fff;color:#101D25;"><b>Product details</b></th>
		<th style="background:#fff;color:#101D25;"><b>Price <br>one menu</b></th>
<th style="background:#fff;color:#101D25;"><b>- / -</b></th>
	</thead>
	<?php 
	while($res = mysqli_fetch_array($result)) { 	
$product_id=$res['product_id'];
$product_tag=$res['product_tag'];
$product_price_view=@$res['product_price_view'];
$product_price=@$res['product_price'];
$product_date=$res['product_date'];
$product_image_ori=$res['product_image_ori'];	
$hargaeceran=$res['hargaeceran'];
$rego = number_format($hargaeceran,0,",",".");
$stock=$res['stock'];
$sales=$res['sales'];
		echo "<tr>";
		echo "<td>";?>
		<img width="100px" src="../fotobarang/<?php echo $res['product_image_ori'];?>"> </img></a>
		<?php echo "</td>";
		echo "<td>".$res['product_date']."</td>";
		echo "<td>".$res['product_tag']."</td>";
		echo "<td>";
		echo $res['spesifikasi'];
		echo "<br>Product ID ".$res['kodeproduk']."";
		echo "<br><br>Product Category: ";
$menu_id=$res['menu_id'];
$bensult = mysqli_query($mysqli, "SELECT * FROM jw_product INNER JOIN jw_menu_detail on jw_product.menu_id=jw_menu_detail.id where jw_product.menu_id='$menu_id'");
$mes = mysqli_fetch_array($bensult);
$namakategori=$mes['namalapangan'];
echo $namakategori;	
$brand_id=$res['brand_id'];
$julu = mysqli_query($mysqli, "SELECT * FROM jw_product INNER JOIN brand on jw_product.brand_id=brand.id where jw_product.brand_id='$brand_id'");
$ker = mysqli_fetch_array($julu);
$namasub=$ker['namalapangan'];
echo $namasub;
		echo "<br> Details: ".$res['deskripsi']."";
		echo "</td>";
	
		echo "<td> ₹ ".$rego."</td>";	
		echo "<td width=10%> <a style=padding:5px;color:#fff;background:red href=\"delete.php?product_id=$res[product_id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a><br><br>
		<a style=padding:5px;color:#fff;background:purple target=_blank href=lihat.php?kodeproduk=$res[kodeproduk]>show Detail</a><br><br>
		<a style=padding:5px;color:#fff;background:Orange href=ubah.php?product_id=$res[product_id]>Edit</a>
		</td>";	
	}
	?>
	</table>
	<link href="../assets-bootsrap/bootstrap.min.css" rel="stylesheet">

    <link href="../assets-bootsrap/datatables.bootstrap4.min.css" rel="stylesheet">

    <!-- Bootstrap core JavaScript-->
    <script src="../assets-bootsrap/jquery.min.js"></script>

    <!-- Page level plugin JavaScript-->
    <script src="../assets-bootsrap/jquery.datatables.min.js"></script>

    <script src="../assets-bootsrap/datatables.bootstrap4.min.js"></script>
      <script>
        $(document).ready(function () {
            $('#dataTable').DataTable();
        });
    </script>
<center>

</body>
</html>
