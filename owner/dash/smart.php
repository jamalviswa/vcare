<?php
session_start();
include_once '../dbconnect.php';

if(!isset($_SESSION['mitra']))
{
	header("Location: index.php");
}
?><html lang="en">
<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
<meta name="viewport" content="width=device-width" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
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
    <link href="../assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
</head>
<body>

<div class="wrapper">
 
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card" style="padding:20px">
                            <div class="header">
                                <h4 class="title">All transaction</h4>
								          <div class="chart">
			  
<?php 

 $connect = mysqli_connect("localhost","viswatechnologys_webtrack","!dsnUDD5Ilf2","viswatechnologys_barisand_cargo");


 $query = "SELECT city, count(*) as total FROM tracking GROUP BY city"; 
 $nemu = "SELECT tipe, count(*) as total FROM transaksi GROUP BY tipe"; 

 $result = mysqli_query($connect, $query); 
 $meso = mysqli_query($connect, $nemu); 
 ?> 
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
 
           <script type="text/javascript" src="chart.js"></script> 
<table width="100%"><tr><td width="50%">
           <script type="text/javascript"> 

           google.charts.load('current', {'packages':['corechart']}); 

           google.charts.setOnLoadCallback(drawChart); 

           function drawChart()  { 

                var data = google.visualization.arrayToDataTable([ 

                          ['City', 'Total'],

                          <?php 

                          while($row = mysqli_fetch_array($result))  { 

                               echo "['".$row["city"]."', ".$row["total"]."],"; 

                          } 

                          ?> 

                     ]);

                var options = { 

                      title: 'Statistic City Services', 

                      is3D:true 

                      // pieHole: 0.4 

                     }; 

                var chart = new google.visualization.PieChart(document.getElementById('piechart')); 

                chart.draw(data, options); 

           } 

           </script> 
		   
           <div style="width:100%;"> 

                <div id="piechart" style="width: 100%; height: auto;"></div> 

           </div> 
</td><td width="50%">
           <script type="text/javascript"> 

           google.charts.load('current', {'packages':['corechart']}); 

           google.charts.setOnLoadCallback(maChart); 

           function maChart()  { 

                var kaha = google.visualization.arrayToDataTable([ 

                          ['Tipe', 'Total'],

                          <?php 

                          while($mon = mysqli_fetch_array($meso))  { 

                               echo "['".$mon["tipe"]."', ".$mon["total"]."],"; 

                          } 

                          ?> 

                     ]);

                var kopi = { 

                      title: 'Popular Services', 

                      is3D:true 

                      // pieHole: 0.4 

                     }; 

                var mars = new google.visualization.PieChart(document.getElementById('donutchart')); 

                mars.draw(kaha, kopi); 

           } 

           </script> 

           <div style="width:100%;"> 

                <div id="donutchart" style="width: 100%; height: auto;"></div> 

           </div> 
</td></tr>
</table>
<br><br>
		  
<?php
// conection mysqli_connect("localhost","viswatechnologys_webtrack","!dsnUDD5Ilf2","viswatechnologys_barisand_cargo");

define('DB_SERVER','localhost');
define('DB_USER','viswatechnologys_webtrack');
define('DB_PASS' ,'!dsnUDD5Ilf2');
define('DB_NAME', 'viswatechnologys_barisand_cargo');
$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
// Check connection
if (mysqli_connect_errno())
{
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  

  <?php
  $tahun=date("Y");
  $total = mysqli_query($con,"SELECT count(*) as jum FROM transaksi where YEAR(tanggal)='$tahun'");
  $data = mysqli_fetch_row($total);
  $totalall = $data[0];

  $hasil1 = mysqli_query($con,"SELECT count(*) as jum FROM transaksi WHERE MONTH(tanggal)='01' and YEAR(tanggal)='$tahun'");
  $data1 = mysqli_fetch_row($hasil1);
  $jumlah1 = $data1[0];


  $hasil2 = mysqli_query($con,"SELECT count(*) as jum FROM transaksi WHERE MONTH(tanggal)='02' and YEAR(tanggal)='$tahun'");
  $data2 = mysqli_fetch_row($hasil2);
  $jumlah2 = $data2[0];


  $hasil3 = mysqli_query($con,"SELECT count(*) as jum FROM transaksi WHERE MONTH(tanggal)='03' and YEAR(tanggal)='$tahun'");
  $data3 = mysqli_fetch_row($hasil3);
  $jumlah3 = $data3[0];


  $hasil4 = mysqli_query($con,"SELECT count(*) as jum FROM transaksi WHERE MONTH(tanggal)='04' and YEAR(tanggal)='$tahun'");
  $data4 = mysqli_fetch_row($hasil4);
  $jumlah4 = $data4[0];


  $hasil5 = mysqli_query($con,"SELECT count(*) as jum FROM transaksi WHERE MONTH(tanggal)='05' and YEAR(tanggal)='$tahun'");
  $data5 = mysqli_fetch_row($hasil5);
  $jumlah5 = $data5[0];


  $hasil6 = mysqli_query($con,"SELECT count(*) as jum FROM transaksi WHERE MONTH(tanggal)='06' and YEAR(tanggal)='$tahun'");
  $data6 = mysqli_fetch_row($hasil6);
  $jumlah6 = $data6[0];


  $hasil7 = mysqli_query($con,"SELECT count(*) as jum FROM transaksi WHERE MONTH(tanggal)='07' and YEAR(tanggal)='$tahun'");
  $data7 = mysqli_fetch_row($hasil7);
  $jumlah7 = $data7[0];


  $hasil8 = mysqli_query($con,"SELECT count(*) as jum FROM transaksi WHERE MONTH(tanggal)='08' and YEAR(tanggal)='$tahun'");
  $data8 = mysqli_fetch_row($hasil8);
  $jumlah8 = $data8[0];


  $hasil9 = mysqli_query($con,"SELECT count(*) as jum FROM transaksi WHERE MONTH(tanggal)='09' and YEAR(tanggal)='$tahun'");
  $data9 = mysqli_fetch_row($hasil9);
  $jumlah9 = $data9[0];


  $hasil10 = mysqli_query($con,"SELECT count(*) as jum FROM transaksi WHERE MONTH(tanggal)='10' and YEAR(tanggal)='$tahun'");
  $data10 = mysqli_fetch_row($hasil10);
  $jumlah10 = $data10[0];

  $hasil11 = mysqli_query($con,"SELECT count(*) as jum FROM transaksi WHERE MONTH(tanggal)='11' and YEAR(tanggal)='$tahun'");
  $data11 = mysqli_fetch_row($hasil11);
  $jumlah11 = $data11[0];


  $hasil12 = mysqli_query($con,"SELECT count(*) as jum FROM transaksi WHERE MONTH(tanggal)='12' and YEAR(tanggal)='$tahun'");
  $data12 = mysqli_fetch_row($hasil12);
  $jumlah12 = $data12[0];

  ?>



  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ['Month', 'Total Services'],
        ['Jan',  <?php echo $jumlah1 = $data1[0]; ?>],
        ['Feb',  <?php echo $jumlah2 = $data2[0]; ?>],
        ['Mar',  <?php echo $jumlah3 = $data3[0]; ?>],
        ['Apr',  <?php echo $jumlah4 = $data4[0]; ?>],
        ['Mei',  <?php echo $jumlah5 = $data5[0]; ?>],
        ['Jun',  <?php echo $jumlah6 = $data6[0]; ?>],
        ['Jul',  <?php echo $jumlah7 = $data7[0]; ?>],
        ['Aug',  <?php echo $jumlah8 = $data8[0]; ?>],
        ['Sep',  <?php echo $jumlah9 = $data9[0]; ?>],
        ['Oct',  <?php echo $jumlah10 = $data10[0]; ?>],
        ['Nov',  <?php echo $jumlah11 = $data11[0]; ?>],
        ['Dec',  <?php echo $jumlah12 = $data12[0]; ?>]
        ]);

      var options = {
        curveType: 'function',
        legend: { position: 'bottom' }
      };
      
    //css 
    options.chartArea = { left: '10%', top: '5%', width: "100%", height: "80%" };
    
        //create trigger to resizeEnd event     
        $(window).resize(function() {
          if(this.resizeTO) clearTimeout(this.resizeTO);
          this.resizeTO = setTimeout(function() {
            $(this).trigger('resizeEnd');
          }, 500);
        });

//redraw graph when window resize is completed  
$(window).on('resizeEnd', function() {
  drawChart(data);
});
//end

var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

chart.draw(data, options);
}
</script>

  <br /><br />
  <div class="container">
<h5 align="center">Monthly Services Analitics <?php echo date('Y'); ?></h5>
<br />
<form method="post">
 <div class="form-group">
   <div id="curve_chart" style="width: 800px; height: 300px"></div>
 </div>
</form>

</div>
                            </div>
						<table width="100%;background:#fff"><tr>
<td style="border-right:none;background:none">
<center><a href="chartjs/piegraph.php" target="_blank"><div style="padding:10px;color:#fff;background:green;width:90%" class="testbutton"><small>Statistic</small></div></a>
</center></td>
<td style="border-right:none;background:none">
<center><a href="print.php" target="_blank"><div style="padding:10px;color:#fff;background:green;width:90%" class="testbutton"><small>print this data</small></div></a>
</center></td>
</tr></table>
<br>
<?php
//including the database connection file
include_once("../dbconnect.php");

//fetching data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM transaksi");
?>
                            <div class="content table-responsive table-full-width">
<table class="table table-bordered" style="font-size:12px;" id="dataTable" width="100%" cellspacing="0">
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
<th class="th-sm">-</th>
<th class="th-sm">navigation</th>
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
		echo "<td><b>".@$res['first_name']."</b><br><br>".$res['alamat']."</td>";
		echo "<td><b>".$tesul['first_name']."</b><br><br>".$tesul['phone']."</td>";
echo "<td>".$res['layanan']." ".$res['tipe']."</td>";
echo "<td>From ".$res['alamat']."<br>to ".$res['tujuan']."</td>";
		echo "<td>".$res['kode_trans']."</td>";
		echo "<td>".$res['phone']."</td>";
		echo "<td style=font-weight:bold;color:grey> USD ".$harga."</td>";
		echo "<td>".$res['tipebayar']."</td>";
		echo "<td style=font-weight:bold;color:grey> USD ".$perawat."</td>";
		echo "<td style=font-weight:bold;color:grey> USD ".$admin."</td>";
		echo "<td> <a onClick=\"return confirm('Delete not working on demo version')\">Delete</a></td>";	
			echo "<td width=5%>";
	if($res['status_trans']=='finish')
      {
	
		echo "<a href=\"cetak.php?id_trans=$res[id_trans]\" style=font-weight:bold;color:green target=_blank><img src=pinter.png width=30px/></a>";	
  }
  if($res['status_trans']=='dijemput')
      {
echo "<a href=\"layani.php?id_trans=$res[id_trans]\" style=font-weight:bold;color:green target=_blank>Payment Confirm</a>";
  }
  if($res['status_trans']=='minta')   {
echo "Waiting respond Driver...";		
		
  } 
  echo "</td>";

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
$query = "SELECT sum(harga) AS total FROM transaksi where status_trans='otw' or status_trans='finish'"; 
$result = mysqli_query($mysqli, $query); 
$values = mysqli_fetch_assoc($result); 
$num_rows = $values['total']; 
$laba = number_format($num_rows,0,",",".");
echo $laba;
 ?> ,-</b>
</td></tr>
<tr style="border-top:1px solid ;border-bottom:1px solid "><td><b>Net profit: </b></td><td>
<b> USD  <?php
$query = "SELECT sum(harga) AS total FROM transaksi where status_trans='otw' or status_trans='finish'"; 
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
$query = "SELECT sum(harga) AS total FROM transaksi"; 
$result = mysqli_query($mysqli, $query); 
$values = mysqli_fetch_assoc($result); 
$num_rows = $values['total']; 
$laba = number_format($num_rows,0,",",".");
echo $laba;
 ?> ,-</b>
</td></tr>
</table>
</p>
<table width="100%;background:#fff"><tr>
<td style="border-right:none;background:none"><center>
<a href="harian.php" target="_blank"><div style="padding:10px;color:#fff;background:green;width:200px" class="testbutton"><small>Daily Transaction</small></div></a>
</center></td>
<td style="border-right:none;background:none">
<center><a href="bulanan.php" target="_blank"><div style="padding:10px;color:#fff;background:green;width:200px" class="testbutton"><small>Monthly Transaction</small></div></a>
</center></td>
<td style="border-right:none;background:none">
<center><a href="tahunan.php" target="_blank"><div style="padding:10px;color:#fff;background:green;width:200px" class="testbutton"><small>Years Transaction</small></div></a>
</center></td>
</tr></table>
</div>
  </div>
                </div>
            </div>
        </div>
</div>
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
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
</body>
</html>