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
                                <h4 class="title"><img src="wawancara.png"width="80px"/> Data Wawancara</h4>
                                <p class="category"><small>Silahkan melihat percakapan wawancara, <br>admin bisa melihat seluruh percakapan dari list wawancara yang aktif</small></p>
                            </div>

<br>

<?php
//including the database connection file
include_once("../dbconnect.php");

//fetching data in descending order (lastest entry first)
$nenul = mysqli_query($mysqli, "SELECT * from pm order by id Asc");

?>
                            <div class="content table-responsive table-full-width">
<table id="dtBasicExample" style="font-size:10px;" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                                    <thead>
<th class="th-sm">No.</th>
<th class="th-sm">id wawancara</th>
		<th class="th-sm">User</th>
		<th class="th-sm">Narasumber</th>
		<th class="th-sm">Jumlah pertanyaan user</th>
		<th class="th-sm">Jumlah respon narasumber</th>
		<th class="th-sm">isi Chat terakhir</th>
<th class="th-sm">navigation</th>
	
                                    </thead>
<?php 
$i = 1;
	while($res = mysqli_fetch_array($nenul)) { 	
$id=$res['id'];	
$user1=$res['user1'];	
$user2=$res['user2'];
$firtu = mysqli_query($mysqli, "SELECT * from users where id='$user1'");
$inul = mysqli_fetch_array($firtu);
$miku = mysqli_query($mysqli, "SELECT * from users where id='$user2'");
$jiku = mysqli_fetch_array($miku);

$yuhu = mysqli_query($mysqli, "SELECT count(*) as total from pm where id='$id' and user1='$user1'");
$popo = mysqli_fetch_assoc($yuhu);
$kuku = mysqli_query($mysqli, "SELECT count(*) as total from pm where id='$id' and user1='$user2'");
$lulu = mysqli_fetch_assoc($kuku);
		echo "<tbody>";
		echo "<tr>";		
		echo "<td >";
		echo $i;
        $i++;"</td>";	
		echo "<td >".$res['id']."</td>";	
		echo "<td >".$inul['first_name']."</td>";	
		echo "<td >".$jiku['first_name']."</td>";	
		echo "<td >".$popo['total']."</td>";	
		echo "<td >".$lulu['total']."</td>";	
		echo "<td >".$res['message']."</td>";	
		echo "<td> <b><a href=\"$res[id]\" target=_blank>Baca lengkap</a></b></td>";		
	
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
  $('#dtBasicExample').DataTable({
    "paging": true, // false to disable pagination (or any other option)
    "searching": false, // false to disable pagination (or any other option)
    "destroy": false, // false to disable pagination (or any other option)
	"retrieve": true
  });
  $('.dataTables_length').addClass('bs-select');
});
</script>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
</body>
</html>