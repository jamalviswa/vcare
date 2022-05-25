<?php
include_once '../dbconnect.php';
$id_users=$_SESSION['mitra'];
$kodeproduk = $_GET['kodeproduk'];
$jim=mysqli_fetch_array(mysqli_query($mysqli, "select * from jw_product where kodeproduk='$kodeproduk'"));
?>
<center>
<img src="../fotobarang/<?php echo $jim['product_image_ori'];?>" style="width:80%;top:0"/>
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
<div style="margin-top:-60px;width:100%;background:rgba(0,0,0,0.7);color:#fff;padding:20px;z-index:999;position:absolute">
<b><?php echo $jim['product_tag'];?></b>
</div>
<div style="padding:30px;color:#616161;border:none">
<p>Restoran : <?php 
$menu_id = $jim['menu_id'];
$sugery=mysqli_fetch_array(mysqli_query($mysqli, "select * from jw_menu_detail where id='$menu_id'"));
echo $sugery['namalapangan'];
  ?></p>
  <p>Brand franchise : <?php 
$brand_id = $jim['brand_id'];
$bubi=mysqli_fetch_array(mysqli_query($mysqli, "select * from brand where id='$brand_id'"));
echo $bubi['namalapangan'];
  ?></p>
<p>Menu/Produk name : <?php echo $jim['product_tag'];?></p>
<br><p>Kode Produk : <?php echo $jim['kodeproduk'];?></p>
<p>Deskripsi : <?php echo $jim['deskripsi'];?></p>
<p><b>Harga per quantity : USD  <?php echo $jim['hargaeceran'];?></b><br>
</p>
<p>Jumlah Stock Saat ini : <?php echo $jim['stock'];?></p>
<p>Total penjualan : <?php echo $jim['sales'];?></p>
<center>
<br><br>
<div class="container" style="background-color:#fff;"><br><br><center><h4 style="color: #6f6f6f;">Statistik Pembelian Produk <?php echo $jim['product_tag'];?></h4>
			<!-- Codrops top bar -->
		<div class="section group">
<br>
	<div class="col span_2_of_2">

	Grafik Pembelian pada Tanggal <?php date_default_timezone_set('Asia/Jakarta'); echo date('d-m-Y'); ?>
<br>
	<?php
	
$kodeproduk = $_GET['kodeproduk'];
$id = $_SESSION['mitra'];
$banjal = mysqli_query($mysqli,"SELECT tanggal FROM transaksi WHERE kodeproduk='$kodeproduk' and YEAR(tanggal) = YEAR(NOW( )) AND MONTH(tanggal) = MONTH(NOW( )) AND DAY(tanggal) = DAY(NOW( )) order by tanggal ASC");
$jemhasilan = mysqli_query($mysqli,"SELECT * FROM transaksi WHERE kodeproduk='$kodeproduk' YEAR(tanggal) = YEAR(NOW( )) AND MONTH(tanggal) = MONTH(NOW( )) AND DAY(tanggal) = DAY(NOW( )) order by tanggal ASC");
?>
        <style type="text/css">
            .fonte {
				border-bottom:1px solid grey;
				padding-bottom:10px;
                width: 100%;
                margin: 0px auto;
            }
        </style>
        <div class="fonte">
            <canvas id="gak"></canvas>
        </div>
        <script>
            var ctx = document.getElementById("gak");
            var gak = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: [<?php while ($t = mysqli_fetch_array($banjal)) { echo '"' . $t['tanggal'] . '",';}?>],
                    datasets: [{
                            label: 'Transaksi',
                            data: [<?php while ($f = mysqli_fetch_array($jemhasilan)) { echo '"' . $f['harga'] . '",'; }?>],
                       backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)',
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255,99,132,1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)',
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                            ],
                            borderWidth: 1
                        }]
                },
                options: {
                    scales: {
                        yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                    }
                }
            });
        </script>
	</div>	
	
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/ilmudetil.css">
	<script src="assets/js/highcharts.js"></script>
	
	<script src="assets/js/jquery-1.10.1.min.js"></script>
	
	
<script src="assets/js/highcharts.js"></script>
<script src="assets/js/jquery-1.10.1.min.js"></script>
</div>
		</div><!-- /container --></center>
<div id="loading" style="display:none">
</div>
<script type="text/javascript">
        function showDiv() {
            div = document.getElementById('loading');
            div.style.display = "block";
        }
</script>
</div>
<br><br><br>
Close (x) untuk menutup layar</center>
</div><br><br>
</body>