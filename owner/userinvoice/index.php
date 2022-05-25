php                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 session_start();
include_once '../dbconnect.php';

if(!isset($_SESSION['user']))
{
	header("Location: index.php");
}
$res=mysql_query("SELECT * FROM users WHERE id=".$_SESSION['user']);
$rows=mysql_fetch_array($res);
$nomoUSD langgan=$rows['nomoUSD langgan'];
?><html lang="en">
<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
<meta name="viewport" content="width=device-width" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
</head>
<body>

<div class="wrapper">
 
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card" style="padding:20px">
                            <div class="header">
                                <h4 class="title">Hasil Rating Billing Invoice Anda</h4>
                                <p class="category"><small>Hasil rating pada bulan php echo date('M'); ?> - php echo date('Y'); ?>, <br>ditampilkan berdasarkan nomor pelanggan anda<br>jika ingin mencari data date, time, destination dll klik Ctrl+F untuk membuka pencarian di browser lalu ketik pencarian <br>Untuk mencetak invoice klik tombol cetak pada rating tiap pelanggan</small></p>
                            </div>
php
//including the database connection file
include_once("../dbconnect.php");

//fetching data in descending order (lastest entry first)
$nenul = mysql_query("SELECT * from billingrate where YEAR(date) = YEAR(NOW( ))  and MONTH(date) = MONTH(NOW( )) and account='$nomoUSD langgan'order by idbilling Asc");

?>
                            <div class="content table-responsive table-full-width">
<table id="dtBasicExample" style="font-size:10px;" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                                    <thead>
<th class="th-sm">No.</th>
<th class="th-sm">Nomor Pelanggan</th>
<th class="th-sm">Date</th>
		<th class="th-sm">Time</th>
		<th class="th-sm">Caller ID</th>
		<th class="th-sm">Destination</th>
		<th class="th-sm">Description</th>
		<th class="th-sm">Duration (second)</th>
<th class="th-sm">ID PIC</th>
<th class="th-sm">Tarif</th>
<th class="th-sm">navigation</th>
	
                                    </thead>
php 
$i = 1;
	while($res = mysql_fetch_array($nenul)) { 	
$harga=$res['harga']; $tarif = number_format($harga,0,",",".");	
		echo "<tbody>";
		echo "<tr>";		
		echo "<td >";
		echo $i;
        $i++;"</td>";	
		echo "<td >".$res['account']."</td>";	
		echo "<td >".$res['date']."</td>";			
		echo "<td >".$res['time']."</td>";	
		echo "<td >".$res['callerid']."</td>";	
		echo "<td >".$res['destination']."</td>";	
		echo "<td >".$res['description']."</td>";	
		echo "<td >".$res['durationsecond']."</td>";	
		echo "<td >".$res['pic']."</td>";
		echo "<td >USD ".$tarif."</td>";
		echo "<td> <b><a href=\"invoice.php?account=$res[account]\" target=_blank onClick=\"return confirm('Anda ingin mencetak invoice seluruh tagihan bulan ini?')\">Cetak</a></b></td>";		
	
		echo "</tr>";		
		echo "</tbody>";
		
	}
	?>
                                </table>
  </div>
                </div>
            </div>
        </div>
</div>
<script>
$(document).ready(function () {
  $('#dtBasicExample').DataTable();
  $('.dataTables_length').addClass('bs-select');
});
</script>

<script>
$(document).ready(function () {
  $('#dtBasicExample').DataTable({
    "paging": false // false to disable pagination (or any other option)
  });
  $('.dataTables_length').addClass('bs-select');
});
</script>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
</body>
</html>