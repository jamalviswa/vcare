<?php
include_once '../dbconnect.php';
$id_users=$_SESSION['mitra'];
$kodeproduk = $_GET['kodeproduk'];
$jim=mysqli_fetch_array(mysqli_query($mysqli, "select * from jw_product where kodeproduk='$kodeproduk'"));
?>
<center>
<img src="../fotobarang/<?php echo $jim['product_image_ori'];?>" style="width:80%;top:0"/>
</center>
<head><meta charset="utf-8" />
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
<p>Restaurant : <?php 
$menu_id = $jim['menu_id'];
$sugery=mysqli_fetch_array(mysqli_query($mysqli, "select * from jw_menu_detail where id='$menu_id'"));
echo $sugery['namalapangan'];
  ?></p>
  <p>Brand franchise : <?php 
$brand_id = $jim['brand_id'];
$bubi=mysqli_fetch_array(mysqli_query($mysqli, "select * from brand where id='$brand_id'"));
echo $bubi['namalapangan'];
  ?></p>
<p>Menu/product name : <?php echo $jim['product_tag'];?></p>
<br><p>Product Code : <?php echo $jim['kodeproduk'];?></p>
<p>Details : <?php echo $jim['deskripsi'];?></p>
<p>Total sales: <?php 
$idbarang = $jim['product_id'];
$bubi=mysqli_fetch_array(mysqli_query($mysqli, "select count(*) as oto from keranjang where idbarang='$idbarang'"));
echo $bubi['oto'];
  ?></p>
<p><b>price per quantity : USD  <?php echo $jim['hargaeceran'];?></b><br>
</p>
<center>
<br><br>
<div class="container" style="background-color:#fff;"><br><br><center><h4 style="color: #6f6f6f;">Statistic order <?php echo $jim['product_tag'];?></h4>
			<!-- Codrops top bar -->
		<div class="section group">
	  
<?php
// conection
define('DB_SERVER','localhost');
define('DB_USER','xxdatabasexx');
define('DB_PASS' ,'xxdbpasswordxx');
define('DB_NAME', 'xxdatabasexx');
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
  $idbarang=$jim['product_id'];
  $tahun=date("Y");
  $total = mysqli_query($con,"SELECT count(*) as jum FROM keranjang where idbarang='$idbarang' and YEAR(tgl)='$tahun'");
  $data = mysqli_fetch_row($total);
  $totalall = $data[0];

  $hasil1 = mysqli_query($con,"SELECT count(*) as jum FROM keranjang WHERE idbarang='$idbarang' and MONTH(tgl)='01' and YEAR(tgl)='$tahun'");
  $data1 = mysqli_fetch_row($hasil1);
  $jumlah1 = $data1[0];


  $hasil2 = mysqli_query($con,"SELECT count(*) as jum FROM keranjang WHERE idbarang='$idbarang' and MONTH(tgl)='02' and YEAR(tgl)='$tahun'");
  $data2 = mysqli_fetch_row($hasil2);
  $jumlah2 = $data2[0];


  $hasil3 = mysqli_query($con,"SELECT count(*) as jum FROM keranjang WHERE idbarang='$idbarang' and MONTH(tgl)='03' and YEAR(tgl)='$tahun'");
  $data3 = mysqli_fetch_row($hasil3);
  $jumlah3 = $data3[0];


  $hasil4 = mysqli_query($con,"SELECT count(*) as jum FROM keranjang WHERE idbarang='$idbarang' and MONTH(tgl)='04' and YEAR(tgl)='$tahun'");
  $data4 = mysqli_fetch_row($hasil4);
  $jumlah4 = $data4[0];


  $hasil5 = mysqli_query($con,"SELECT count(*) as jum FROM keranjang WHERE idbarang='$idbarang' and MONTH(tgl)='05' and YEAR(tgl)='$tahun'");
  $data5 = mysqli_fetch_row($hasil5);
  $jumlah5 = $data5[0];


  $hasil6 = mysqli_query($con,"SELECT count(*) as jum FROM keranjang WHERE idbarang='$idbarang' and MONTH(tgl)='06' and YEAR(tgl)='$tahun'");
  $data6 = mysqli_fetch_row($hasil6);
  $jumlah6 = $data6[0];


  $hasil7 = mysqli_query($con,"SELECT count(*) as jum FROM keranjang WHERE idbarang='$idbarang' and MONTH(tgl)='07' and YEAR(tgl)='$tahun'");
  $data7 = mysqli_fetch_row($hasil7);
  $jumlah7 = $data7[0];


  $hasil8 = mysqli_query($con,"SELECT count(*) as jum FROM keranjang WHERE idbarang='$idbarang' and MONTH(tgl)='08' and YEAR(tgl)='$tahun'");
  $data8 = mysqli_fetch_row($hasil8);
  $jumlah8 = $data8[0];


  $hasil9 = mysqli_query($con,"SELECT count(*) as jum FROM keranjang WHERE idbarang='$idbarang' and MONTH(tgl)='09' and YEAR(tgl)='$tahun'");
  $data9 = mysqli_fetch_row($hasil9);
  $jumlah9 = $data9[0];


  $hasil10 = mysqli_query($con,"SELECT count(*) as jum FROM keranjang WHERE idbarang='$idbarang' and MONTH(tgl)='10' and YEAR(tgl)='$tahun'");
  $data10 = mysqli_fetch_row($hasil10);
  $jumlah10 = $data10[0];

  $hasil11 = mysqli_query($con,"SELECT count(*) as jum FROM keranjang WHERE idbarang='$idbarang' and MONTH(tgl)='11' and YEAR(tgl)='$tahun'");
  $data11 = mysqli_fetch_row($hasil11);
  $jumlah11 = $data11[0];


  $hasil12 = mysqli_query($con,"SELECT count(*) as jum FROM keranjang WHERE idbarang='$idbarang' and MONTH(tgl)='12' and YEAR(tgl)='$tahun'");
  $data12 = mysqli_fetch_row($hasil12);
  $jumlah12 = $data12[0];

  ?>



  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ['Month', 'Total Order'],
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
<h5 align="center">Monthly Sakes Analitics <?php echo date('Y'); ?></h5>
<br />
<form method="post">
 <div class="form-group">
   <div id="curve_chart" style="width: 800px; height: 300px"></div>
 </div>
</form>

</div>
                           
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
Close (x) for hide page</center>
</div><br><br>
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