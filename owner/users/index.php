<?php
session_start();
include_once '../dbconnect.php';

if(!isset($_SESSION['mitra']))
{
	header("Location: index.php");
}
$res=mysqli_query($mysqli, "SELECT * FROM mitra WHERE id_mitra=".$_SESSION['mitra']);
$rows=mysqli_fetch_array($res);
?>

<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="../assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

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
<?php
//including the database connection file
include_once("../dbconnect.php");

//fetching data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM users where sebagai='user' ORDER BY id Asc");
?>
<div class="wrapper">
 
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <p style = "color:#101D25;"><b>Data User</b></p>
                                <p class="category">For check user detail click view details</p>
                            </div><br><br>
							<table width="100%;background:#fff;padding:10px;"><tr>



</tr></table><br>
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
<div><center><input type="text" name="golek" id="golek" placeholder="search by email user" style="width: 90%;background: #101D25;border-radius:20px;padding: 10px;color:#FFFFFF"/></center></div>
<div id="jesil"></div><br><br>
                            <div class="content table-responsive table-full-width">
<table class="table table-bordered" style="font-size:12px;" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
<th class="th-sm">Picture</th>
		<th class="th-sm">Profile</th>
		<th class="th-sm">Biodata and job</th>
		<th class="th-sm">Address & Contact</th>
		<th class="th-sm">balance</th>
        <th class="th-sm">Billing/Quotation</th> 
        <th class="th-sm">Navigation</th>
	
                                    </thead>
<?php 
	while($res = mysqli_fetch_array($result)) { 		
		echo "<tbody>";
		echo "<tr>";
		echo"<td width='10%'>";
if($res['oauth_uid']==''){
	?><?php 
if (empty($res['picture'])) { ?>
<img src="../../icon/ggo.png" style="width:100px"/>
<?php }else{ ?>
<img src="../../foto_mitra/<?php echo $res['picture'];?>" style="width:100px"/>
<?php } ?>
	  <?php } else {?>
<img src="<?php echo $res['picture'];?>" style="width:100px"/>
	<?php }
		echo"</td>";
		echo "<td width=15%><b>".$res['first_name']." ".$res['last_name']."</b><br>".$res['email']."<br>Civilization ID: ".$res['noktp']."<br>Gender: ".$res['kelamin']."<br>Religion: ".$res['agama']."<br><br>Born: <br>".$res['tempatlahir'].", ".$res['tgllahir']."</td>";
		echo "<td width=15%><small>".$res['profesi']."<br>(".$res['jabatan'].")<br>Salary: ".$res['pendapatan']."<br>status: ".@$res['statusmenikah']."</small></td>";	
		echo "<td width=15%><small><center>".$res['alamat1']."<br>".$res['kota']."<br>".$res['provinsi']."<br>".$res['phone']."</center></small></td>";
		echo "<td width=15%><small>Balance: INR ".$res['saldo']."</small></td>";
		
		echo '<td width=10%>
	  <form class="myForm" method="post enctype="multipart/form-data">
	  <input type="hidden" value="'.$res['id'].'" name="user_id">
	  <input type="hidden" name="type" value="get" />
         <div class="form-group">
            <label>File Type</label>
            <select class="form-control" name="type">
              <option value="bill">Bill</option>
              <option value="quotation">Quotation</option>
            </select>
         </div>
         <div class="form-group">
            <label>File</label>
             <input required accept="application/pdf" type="file" name="file" class="form-control"/>
         </div>
          <input type="submit" class="btn btn-info"/>
      </form>	
		</td>';
          
		echo "<td width=5%>";?>
		
 
<a style="padding:5px;color:#fff" href="delete.php?id=<?php echo $res['id'];?>" onClick="return confirm('Are you sure you want to delete?')"><img src="../delete.png" width="25px" /> Delete</a>		

<br><br>
<a style="padding:5px;color:#fff;"  target="_blank" href="show.php?id=<?php echo $res['id'];?>"><img src="../print.png" width="25px" /></a><br><br>";
		<?php echo"</td>";
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
            $(document).on('submit','.myForm',function(e){
                e.preventDefault();
                $.ajax({
                        url: "https://vcare.viswatechnologysolutions.com/taxi/ajax/upload.php",
                       type: "POST",
                       data:  new FormData(this),
                       contentType: false,
                             cache: false,
                       processData:false,
                       beforeSend : function()
                       {
                        
                       },
                       success: function(data)
                          {
                              alert(data)
                            
                              
                          }         
                });
                       
                   });
        });
   

</script>
     <footer class="footer">
            <div class="container-fluid">
               
              
            </div>
        </footer>
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

    <!--   Core JS Files   -->
    <script src="../assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
	<script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Charts Plugin -->
	<script src="../assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="../assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo puUSD se -->
	<script src="../assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="../assets/js/demo.js"></script>


</html>
