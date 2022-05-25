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
						<a href="index.php" onclick="javascript:showDiv();"><img src="../../icon/backblack.png"width="25px"/> Back</i></a><br>
                            <div class="header">
                                <h4 class="title">All transaction</h4>
                                <p class="category"><small>Search with code invoice</small></p>
                            </div>
						<table width="100%;background:#fff"><tr>
<td style="border-right:none;background:none">
<center><a href="chartjs/piegraph.php" target="_blank"><div style="padding:10px;color:#fff;background:green;width:90%" class="testbutton"><small>Statistic</small></div></a>
</center></td>
<td style="border-right:none;background:none">
<center><a href="print.php" target="_blank"><div style="padding:10px;color:#fff;background:green;width:90%" class="testbutton"><small>print this data</small></div></a>
</center></td>
</tr></table>

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
		echo "<td><b>".$res['first_name']."</b><br><br>".$res['alamat']."</td>";
		echo "<td><b>".$tesul['first_name']."</b><br><br>".$tesul['phone']."</td>";
echo "<td>".$res['layanan']." ".$res['tipe']."</td>";
echo "<td>From ".$res['alamat']."<br>to ".$res['tujuan']."</td>";
		echo "<td>".$res['kode_trans']."</td>";
		echo "<td>".$res['phone']."</td>";
		echo "<td style=font-weight:bold;color:grey> USD ".$harga."</td>";
		echo "<td>".$res['tipebayar']."</td>";
		echo "<td style=font-weight:bold;color:grey> USD ".$perawat."</td>";
		echo "<td style=font-weight:bold;color:grey> USD ".$admin."</td>";
		echo "<td> <a href=\"delete.php?id_trans=$res[id_trans]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";	
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