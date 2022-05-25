<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><meta http-equiv="X-UA-Compatible"content="IE=edge,chrome=1">
<meta name="viewport"content="width=device-width, initial-scale=1.0">
<style type="text/css">ul{padding:0;list-style:none}ul li{display:inline-block;position:relative;line-height:21px;text-align:left}ul li a{display:block;padding:8px 25px;color:#444;text-decoration:none}ul li a:hover{color:#red}ul li ul.dropdown{min-width:100%;background-color:#FFF;display:none;position:absolute;z-index:999;left:-50px;top:35px;border:1px solid grey}ul li:hover ul.dropdown{display:block}ul li ul.dropdown li{display:block}#home{display:none}#loading{display:block;position:absolute;top:0;left:0;z-index:99999;width:100vw;height:100vh;background-image:url("../../hourglass.svg");background-repeat:no-repeat;background-position:center}</style>
<link rel="stylesheet"href="../../css/bemo.css"><link rel="stylesheet"href="../../dist/ladda.min.css">
<link rel="stylesheet"href="../../themes/base/jquery.ui.all.css"><script src="../../js/jquery.min.js"></script>
<script src="../../js/jquery-ui.min.js"></script>
<div style="margin:0;background-color:#292929;width:100%;height:60px;position:fixed;z-index:999;">
<span class="actions" style="float:left"><ul><li><a href="../../pemilik.php#home" onclick="javascript:showDiv();"><img style="margin-top:10px" src="../../icon/back.png"width="25px"/></i></a></li></ul></span><div style="padding-right:30px;margin-top:20px;font-size:18px;font-family:Segoe UI;color:#fff;float:right">Statistic</div></div>       <script src="Chart.bundle.js"></script>
<?php

session_start();
include_once '../dbconnect.php';
if(!isset($_SESSION['user']))
{
	header("Location: ../../firli.php#login");
}
$res=mysqli_query($mysqli, "SELECT * FROM users WHERE id=".$_SESSION['user']);
$rows=mysqli_fetch_array($res);

?>

<style>
/*  SECTIONS  */
.section {
	clear: both;
	padding: 0px;
	margin: 0px; 
}

/*  COLUMN SETUP  */
.col {
	display: block;
	float:left;
}
.col:first-child { margin-left: 0; }

/*  GROUPING  */
.group:before,
.group:after { content:""; display:table; }
.group:after { clear:both;}
.group { zoom:1; /* For IE 6/7 */ }
/*  GRID OF TWO  */
.span_2_of_2 {
	width: 100%;
}
.span_1_of_2 {
	width: 49.2%;
}

/*  GO FULL WIDTH AT LESS THAN 480 PIXELS */

@media only screen and (max-width: 480px) {
	.col { 
		margin: 1% 0 1% 0%;
	}
}

@media only screen and (max-width: 480px) {
	.span_2_of_2, .span_1_of_2 { width: 100%; }
}    

</style>
<br />
<div class="container" style="background-color:#fff;"><br><br><center><h4 style="color: #6f6f6f;">Statistik Pendapatan</h4>
			<!-- Codrops top bar -->
		<div class="section group">
<br>
	<div class="col span_2_of_2">

	Grafik Penghasilan pada Bulan <?php echo date('M'); ?>
<br>
	<?php
include_once '../dbconnect.php';
$mysqli = mysqli_connect('localhost','rento_app','Txewd59fU9!e','rento_app');

$id = $_SESSION['user'];
$banjal = mysqli_query($mysqli,"SELECT tanggal FROM transaksi WHERE MONTH(tanggal) = MONTH(NOW( )) and id_sopir='$id' order by tanggal ASC");
$jemhasilan = mysqli_query($mysqli,"SELECT * FROM transaksi WHERE MONTH(tanggal) = MONTH(NOW( )) and id_sopir='$id' order by tanggal ASC");
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
                            label: 'Transaksi Sewa',
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
	<?php
$mysqli = mysqli_connect("localhost", "rento_app", "Txewd59fU9!e", "rento_app");

$id = $_SESSION['user'];
$tanggal = mysqli_query($mysqli, "SELECT tanggal FROM transaksi WHERE YEAR(tanggal) = YEAR(NOW( )) and id_sopir='$id' order by tanggal ASC");
$penghasilan = mysqli_query($mysqli, "SELECT * FROM transaksi WHERE YEAR(tanggal) = YEAR(NOW( )) and id_sopir='$id' order by tanggal ASC");
?>
        <style type="text/css">
            .ponten {
				border-bottom:1px solid grey;
				padding-bottom:10px;
				padding-top:10px;
                width: 100%;
                margin: 0px auto;
            }
        </style>
        <div class="ponten" >
	Grafik Penghasilan pada Tahun <?php echo date('Y'); ?>
<br>
            <canvas id="myChart"></canvas>
        </div>
        <script>
            var ctx = document.getElementById("myChart");
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: [<?php while ($b = mysqli_fetch_array($tanggal)) { echo '"' . $b['tanggal'] . '",';}?>],
                    datasets: [{
                            label: 'Transaksi Sewa',
                            data: [<?php while ($p = mysqli_fetch_array($penghasilan)) { echo '"' . $p['jarak'] . '",'; }?>],
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
<br>
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