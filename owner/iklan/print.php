<?php
//including the database connection file
include_once("../dbconnect.php");

//fetching data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT idsaldo, nama_sopir, tipesaldo, jumlahsaldo, statussaldo, tgl_request, banksaldo, namauser, nomorrek, nomorhp FROM trans_iklan INNER JOIN sopir on trans_iklan.idsopir=sopir.id_sopir");
?>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/> 
<link rel="stylesheet"type="text/css"href="../button.css"/>
<html>
<body style="padding:25px;"onload="window.print()"><center>
<h3>Data Pembayaran Kendaraan Deluxe</h3></center>
<div id="content">
<table width='100%' border=0>

	<tr>
		<th>No</th>
		<th>Date request</th>
		<th>Nama Pemilik</th>
		<th>Phone</th>
		<th>Type Request</th>
<th>Price</th>
<th>Confirmation by admin</th>
		<th>Name bank</th>
		<th>Bank account number</th>
		<th>Account number</th>
		<th>Navigation</th>
	
	</tr>
	<?php 
	while($res = mysqli_fetch_array($result)) {
$nominal = $res['jumlahsaldo']; 
$jumlah = number_format($nominal,0,",",".");
		echo "<tr>";
		echo "<td>".$res['idsaldo']."</td>";
		echo "<td>".$res['tgl_request']."</td>";
		echo "<td>".$res['nama_sopir']."</td>";
		echo "<td>".$res['nomorhp']."</td>";
		echo "<td>".$res['tipesaldo']."</td>";
		echo "<td>USD ".$jumlah."</td>";	echo "<td width=5%>";
	if($res['statussaldo']=='dijemput')
      {
echo "Sudah Confirm";		
		
  }echo "</td>";
		echo "<td>".$res['banksaldo']."</td>";
		echo "<td>".$res['namauser']."</td>";
		echo "<td>".$res['nomorrek']."</td>";
			echo "<td width=5%>";
	if($res['statussaldo']=='dijemput')
      {
echo "<a href=\"layani.php?idsaldo=$res[idsaldo]\" style=background:green;padding:10px;color:#fff>Confirmation</a>";		
		
  }
  if($res['statussaldo']=='finish')
      {
echo "Done";
  }
  if($res['statussaldo']=='minta')   {
echo "pending...";		
		
  }
	  
  echo "</td>";
		
}
	?>
	</table>
</div>
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
