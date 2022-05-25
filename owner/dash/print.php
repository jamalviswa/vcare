<?php
//including the database connection file
include_once("../dbconnect.php");

//fetching data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM transaksi");
?>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/> 
<link rel="stylesheet"type="text/css"href="../button.css"/>
<html>
<body style="padding:25px;"onload="window.print()"><center>
<h3>All transaction</h3></center>
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
$query = "SELECT sum(harga) AS total FROM transaksi where status_trans='otw' or status_trans='finish'"; 
$result = mysqli_query($mysqli, $query); 
$values = mysqli_fetch_assoc($result); 
$num_rows = $values['total']; 
$laba = number_format($num_rows,0,",",".");
echo $laba;
 ?> ,-</b>
</td></tr><tr style="border-top:1px solid ;border-bottom:1px solid "><td><b>All orders: </b></td><td>
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
</div></div>
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
