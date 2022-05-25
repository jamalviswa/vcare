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
                                <h4 class="title"><img src="survey.png"width="80px"/> Survey</h4>
                                <p class="category"><small>Silahkan mengetik pencarian topik survey di kolom pencarian, <br>Sistem survei ini berkolaborasi dengan google Form untuk create page dan point pertanyaan survey. <br>Admin bisa klik tombol tambahkan survey untuk membuat materi survei sesuai topik baru</small></p>
                            </div>

<br>
<table  width="100%" style="margin-top:10px">
<?php
$jiew=mysqli_query($mysqli, "SELECT id, namalapangan, image FROM jw_menu_detail ORDER BY id ASC");
$count=mysqli_num_rows($jiew);
$i = 0;
while($jows=mysqli_fetch_array($jiew)){
$id=$jows['id'];
$namalapangan=$jows['namalapangan'];
$image=$jows['image'];
?>
<?php 
if ( $i % 3 == 0 && $i != 0 && $i != $count ) echo "<tr></tr>"; ?>
<td style="width:33.4%;height:auto;">
<a href="sur.php?idsurvey=<?php echo $id;?>"><center>
<div style="font-weight:bold;color:#444;font-size:13px;padding:30px;background-color:orange;padding:20px">
<?php echo $namalapangan;?><br>
</div>
</a>
</center>
</td>
<?php $i++;} ?>
</table><br><br>
								<table width="100%;background:#fff"><tr>
								<td style="border-right:none;background:none"><center>
<a href="../survei/kategori/index.php"><div style="padding:10px;color:#fff;background:green;width:200px" class="testbutton"><small>Tambah/Edit/Hapus Kategori Survey</small></div></a>
</center></td>
<td style="border-right:none;background:none"><center>
<a href="inputsurvey.php"><div style="padding:10px;color:#fff;background:green;width:200px" class="testbutton"><small>Tambahkan List survey</small></div></a>
</center></td>
<td style="border-right:none;background:none">
<center><a href="print.php" target="blank"><button id="cmd" style="padding:10px;color:#fff;background:green;border:none"><div style="background:green;width:200px" class="testbutton"><small>Cetak semua list survey</small></div></button></a>
</center></td>
</tr></table>
<br><br> <center>
 <div class="header" style="border-top:1px solid orange">
                                <b>Search data</b>
								
<?php include "../dbconnect.php";?>
<script src="jquery.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		<!-- event textbox keyup
		$("#gojek").keyup(function() {
			var strcari = $("#gojek").val(); <!-- mendapatkan nilai dari textbox -->
			if (strcari != "") <!-- jika value strcari tidak kosong-->
			{
				$("#kevil").html("<img width=300px src='loading.gif'/>") <!-- menampilkan animasi loading -->
				<!-- request data ke cari.php lalu menampilkan ke <div id="hasil"></div> -->
				$.ajax({
					type:"post",
					url:"bari.php",
					data:"r="+ strcari,
					success: function(data){
						$("#kevil").html(data);
					}
				});
			}
		});
    });
</script>
<br><br>
<div><center><input type="text" name="gojek" id="gojek" placeholder="Ketik topik survey" style="width: 90%;border-bottom: 1px solid #989494;border-left: none;border-right: none;border-top: none;padding: 5px;"/></center></div>
<div id="kevil"></div><br><br>
                                </div>
<?php
//including the database connection file
include_once("../dbconnect.php");

//fetching data in descending order (lastest entry first)
$nenul = mysqli_query($mysqli, "SELECT * from survey order by survey.idsurvey Asc");

?>
                            <div class="content table-responsive table-full-width">
<table id="dtBasicExample" style="font-size:10px;" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                                    <thead>
<th class="th-sm">No.</th>
<th class="th-sm">Judul</th>
<th class="th-sm">Tahun</th>
		<th class="th-sm">Tujuan Survey</th>
		<th class="th-sm">Kategori</th>
		<th class="th-sm">Url survey</th>
<th class="th-sm">navigation</th>
	
                                    </thead>
<?php 
$i = 1;
	while($res = mysqli_fetch_array($nenul)) { 	
$idkategori=$res['idkategori'];
$firtu = mysqli_query($mysqli, "SELECT id, namalapangan from jw_menu_detail where id='$idkategori'");
$inul = mysqli_fetch_array($firtu);
		echo "<tbody>";
		echo "<tr>";		
		echo "<td >";
		echo $i;
        $i++;"</td>";	
		echo "<td >".$res['judulsurvey']."</td>";	
		echo "<td >".$res['tahunsurvey']."</td>";	
		echo "<td >".$res['tujuansurvey']."</td>";	
		echo "<td >".$inul['namalapangan']."</td>";	
		echo "<td >".$res['urlsurvey']."</td>";	
		echo "<td> <b><a href=\"$res[urlsurvey]\" target=_blank>Baca</a><br><a style=color:red href=deletesurvey.php?idsurvey=".$res['idsurvey'].">Hapus data</a></b></td>";		
	
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