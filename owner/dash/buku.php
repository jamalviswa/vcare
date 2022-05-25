<?php
session_start();
include_once '../dbconnect.php';

if(!isset($_SESSION['mitra']))
{
	header("Location: index.php");
}

?>

<?php
//including the database connection file
include_once("../dbconnect.php");
$idsmart=$_GET['idsmart'];
//fetching data in descending order (lastest entry first)
$firtu = mysqli_query($mysqli, "SELECT id, namalapangan from kategoripustaka where id='$idsmart'");
$inul = mysqli_fetch_array($firtu);
$nenul = mysqli_query($mysqli, "SELECT idsmartpustaka, judulsmartpustaka, tahunsmartpustaka, penulissmartpustaka, penerbitsmartpustaka, shortsmartpustaka, urlsmartpustaka, idkategori from smartpustaka where idkategori='$idsmart' order by idsmartpustaka DESC");
?>
<html lang="en">
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
						<a href="smartpustaka.php" onclick="javascript:showDiv();"><img src="../../icon/backblack.png"width="25px"/> Back</i></a><br>
                            <div class="header">
                                <h4 class="title">Buku kategori <?php echo $inul['namalapangan'];?></h4>
                                 </div>

 <div class="header" style="border-top:1px solid orange">
                                <b>Search data</b>
								
<?php include "../dbconnect.php";?>
<script src="jquery.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		<!-- event textbox keyup
		$("#golek").keyup(function() {
			var strcari = $("#golek").val(); <!-- mendapatkan nilai dari textbox -->
			if (strcari != "") <!-- jika value strcari tidak kosong-->
			{
				$("#jesil").html("<img width=300px src='loading.gif'/>") <!-- menampilkan animasi loading -->
				<!-- request data ke cari.php lalu menampilkan ke <div id="hasil"></div> -->
				$.ajax({
					type:"post",
					url:"cari.php",
					data:"r="+ strcari,
					success: function(data){
						$("#jesil").html(data);
					}
				});
			}
		});
    });
</script>
<br><br>
<div><center><input type="text" name="golek" id="golek" placeholder="Ketik Judul buku, tahun, penulis atau penerbit" style="width: 90%;border-bottom: 1px solid #989494;border-left: none;border-right: none;border-top: none;padding: 5px;"/></center></div>
<div id="jesil"></div><br><br>
                                </div>

                            <div class="content table-responsive table-full-width">
<table id="dtBasicExample" style="font-size:10px;" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                                    <thead>
<th class="th-sm">No.</th>
<th class="th-sm">Judul</th>
<th class="th-sm">Tahun</th>
		<th class="th-sm">Penulis</th>
		<th class="th-sm">Penerbit</th>
		<th class="th-sm">Deskripsi Singkat</th>
		<th class="th-sm">Kategori</th>
		<th class="th-sm">Url Smartpustaka</th>
<th class="th-sm">navigation</th>
	
                                    </thead>
<?php 
$i = 1;
	while($res = mysqli_fetch_array($nenul)) { 	
		echo "<tbody>";
		echo "<tr>";		
		echo "<td >";
		echo $i;
        $i++;"</td>";	
		echo "<td >".$res['judulsmartpustaka']."</td>";	
		echo "<td >".$res['tahunsmartpustaka']."</td>";			
		echo "<td >".$res['penulissmartpustaka']."</td>";	
		echo "<td >".$res['penerbitsmartpustaka']."</td>";	
		echo "<td >".$res['shortsmartpustaka']."</td>";	
		echo "<td >".$inul['namalapangan']."</td>";	
		echo "<td >".$res['urlsmartpustaka']."</td>";	
		echo "<td> <b><a href=\"$res[urlsmartpustaka]\" target=_blank>Baca</a></b><br><br>
		<a style=color:red href=\"deletebuku.php?idsmartpustaka=$res[idsmartpustaka]\">Hapus</a></td>";		
	
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