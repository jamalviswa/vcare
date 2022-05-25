<?php
//including the database connection file
include_once("../dbconnect.php");

//fetching data in descending order (lastest entry first)

$result = mysqli_query($mysqli, "SELECT * FROM transaksi WHERE YEAR(tanggal) = YEAR(NOW( )) AND MONTH(tanggal) = MONTH(NOW( )) AND DAY(tanggal) = DAY(NOW( )) order by tanggal ASC");
?>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/> 
<link rel="stylesheet"type="text/css"href="../button.css"/>
<html>
<body style="padding:25px;"onload="window.print()"><center>
<h3>Data Transaksi Trol hari ini <?php echo date('d-m-Y'); ?></h3></center>
<div id="content">
<table id="dtBasicExample" style="font-size:10px;" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                                    <thead>
<th class="th-sm">Service Date</th>
<th class="th-sm">Client & Adress</th>
<th class="th-sm">Driver</th>
<th class="th-sm">Services</th>
<th class="th-sm">Pickup address & Destination</th>
<th class="th-sm">Invoice Code</th>
<th class="th-sm">Client Phone</th>
<th class="th-sm">Total Price</th>
<th class="th-sm">Payment method </th>
<th class="th-sm">Profit drivers 80%</th>
<th class="th-sm">Fee Admin 20%</th>
	</thead>
	<?php 
	while($res = mysqli_fetch_array($result)) {
		
	
$guy_rows = $res['harga']; 
$harga = number_format($guy_rows,0,",",".");

$bagian=80/100;
$cumi = $guy_rows*$bagian; 
$perawat = number_format($cumi,0,",",".");


$propmob= $guy_rows-$cumi;
$admin = number_format($propmob,0,",",".");

$mitra=$res['id_mitra'];
$mesult = mysqli_query($mysqli, "SELECT * FROM users where id='$mitra'");
$tesul = mysqli_fetch_array($mesult);

		echo "<tbody>";
		echo "<tr>";
		echo "<td>".$res['tanggal']."</td>";
		echo "<td><b>".$res['first_name']."</b><br><br>".$res['alamat']."</td>";
		echo "<td><b>".$tesul['first_name']."</b><br><br>".$tesul['phone']."</td>";
echo "<td>".$res['layanan']." ".$res['tipe']."</td>";
echo "<td>Dari ".$res['alamat']."<br>ke ".$res['tujuan']."</td>";
		echo "<td>".$res['kode_trans']."</td>";
		echo "<td>".$res['phone']."</td>";
		echo "<td style=font-weight:bold;color:grey> USD ".$harga."</td>";
		echo "<td>".$res['tipebayar']."</td>";
		echo "<td style=font-weight:bold;color:grey> USD ".$perawat."</td>";
		echo "<td style=font-weight:bold;color:grey> USD ".$admin."</td>";
		echo "</tr>";
		echo "</tbody>";
		}
	?>
	</table>
		<div style="padding:10px;color:#565656;border:1px solid #565656; border-style: dashed;">
<p><b><small>All Profit</small></b></p>
<table width="100%"style="text-decoration:justify;border-bottom:1px solid ;color:#444;">
<tr style="border-top:1px solid ;border-bottom:1px solid "><td><b>Gross profit: </b></td><td>
<b> USD  <?php
$query = "SELECT sum(harga) AS total FROM transaksi where status_trans='otw' or status_trans='finish' and YEAR(tanggal) = YEAR(NOW( )) AND MONTH(tanggal) = MONTH(NOW( )) AND DAY(tanggal) = DAY(NOW( ))"; 
$result = mysqli_query($mysqli, $query); 
$values = mysqli_fetch_assoc($result); 
$num_rows = $values['total']; 
$laba = number_format($num_rows,0,",",".");
echo $laba;
 ?> ,-</b>
</td></tr>
<tr style="border-top:1px solid ;border-bottom:1px solid "><td><b>Net profit: </b></td><td>
<b> USD  <?php
$query = "SELECT sum(harga) AS total FROM transaksi where status_trans='otw' or status_trans='finish' and YEAR(tanggal) = YEAR(NOW( )) AND MONTH(tanggal) = MONTH(NOW( )) AND DAY(tanggal) = DAY(NOW( ))"; 
$result = mysqli_query($mysqli, $query); 
$values = mysqli_fetch_assoc($result); 
$num_rows = $values['total'];
$bagian=80/100;
$cumi = $num_rows*$bagian;
$laba= $num_rows-$cumi;
$kapa = number_format($laba,0,",",".");
echo $kapa;
 ?> ,-</b>
</td></tr>
<tr style="border-top:1px solid ;border-bottom:1px solid "><td><b>All orders: </b></td><td>
<b> USD  <?php
$query = "SELECT sum(harga) AS total FROM transaksi where YEAR(tanggal) = YEAR(NOW( )) AND MONTH(tanggal) = MONTH(NOW( )) AND DAY(tanggal) = DAY(NOW( ))"; 
$result = mysqli_query($mysqli, $query); 
$values = mysqli_fetch_assoc($result); 
$num_rows = $values['total']; 
$laba = number_format($num_rows,0,",",".");
echo $laba;
 ?> ,-</b>
</td></tr>
</table>
</div></div>
<!--- Script Chart -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><meta http-equiv="X-UA-Compatible"content="IE=edge,chrome=1">
<meta name="viewport"content="width=device-width, initial-scale=1.0">
<style type="text/css">ul{padding:0;list-style:none}ul li{display:inline-block;position:relative;line-height:21px;text-align:left}ul li a{display:block;padding:8px 25px;color:#444;text-decoration:none}ul li a:hover{color:#red}ul li ul.dropdown{min-width:100%;background-color:#FFF;display:none;position:absolute;z-index:999;left:-50px;top:35px;border:1px solid grey}ul li:hover ul.dropdown{display:block}ul li ul.dropdown li{display:block}#home{display:none}#loading{display:block;position:absolute;top:0;left:0;z-index:99999;width:100vw;height:100vh;background-image:url("../../hourglass.svg");background-repeat:no-repeat;background-position:center}</style>
<link rel="stylesheet"href="../../css/bemo.css"><link rel="stylesheet"href="../../dist/ladda.min.css">
<link rel="stylesheet"href="../../themes/base/jquery.ui.all.css"><script src="../../js/jquery.min.js"></script>
<script src="../../js/jquery-ui.min.js"></script>

<script src="Chart.bundle.js"></script>

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

	Grafik Penghasilan pada Tanggal <?php echo date('d-m-Y'); ?>
<br>
	<?php
include_once '../dbconnect.php';


$id = $_SESSION['user'];
$banjal = mysqli_query($mysqli,"SELECT tanggal FROM transaksi WHERE YEAR(tanggal) = YEAR(NOW( )) AND MONTH(tanggal) = MONTH(NOW( )) AND DAY(tanggal) = DAY(NOW( )) order by tanggal ASC");
$jemhasilan = mysqli_query($mysqli,"SELECT * FROM transaksi WHERE YEAR(tanggal) = YEAR(NOW( )) AND MONTH(tanggal) = MONTH(NOW( )) AND DAY(tanggal) = DAY(NOW( )) order by tanggal ASC");
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
                            label: 'Daily transaction',
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
<!---ending--->
<div id="editor"></div>
</body>
</html>
<script>
var doc = new jsPDF();
var specialElementHandlers = {
    '#editor': function (element, renderer) {
        return true;
    }
};

$('#cmd').click(function () {
    doc.fromHTML($('#content').html(), 15, 15, {
        'width': 170,
            'elementHandlers': specialElementHandlers
    });
    doc.save('sample-file.pdf');
});
</script>
