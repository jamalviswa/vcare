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
$result = mysqli_query($mysqli, "SELECT * FROM mitra ORDER BY id_mitra Asc");
?>
<div class="wrapper">
 
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <p style="color:#101D25;"><b>Data Admin Management</b></p>
                                <p class="category">for see details profile click view</p>
                            </div>
							<table width="100%;background:#fff"><tr>
<td style="border-right:none;background:none"><center>
<a href="add.php"><div style="padding:10px;color:#FFA500;background:#101D25;width:200px;border-radius:20px;" class="testbutton"><b>add Administrator</b></div></a>
</center></td>
	<?php 
	if($rows['id']=='1')
      {
	?>
<td style="border-right:none;background:none"><center>
<a href="kodearea/index.php"><div style="padding:10px;color:#fff;background:green;width:200px" class="testbutton"><small>Role Departement/position</small></div></a>
</center></td>
<?php 
      }else {}
?>

</tr></table>
<br>
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
<div><center><input type="text" name="golek" id="golek" placeholder="search name or nationalit ID" style="width: 90%;background:#101D25;color:#fffff;border-radius:20px;padding:10px;"/></center></div>
<div id="jesil"></div><br><br>
                            <div class="content table-responsive table-full-width">
                                
<table class="table table-bordered" style="font-size:12px;" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
<th >photo</th>
		<th >Profile</th>
		<th >date registration</th>
		<th >Adress</th>
		<th >Register as</th>	
		<th >departement</th>	
<th >navigation</th>
	
                                    </thead>
<?php 
	while($res = mysqli_fetch_array($result)) { 		
		echo "<tr>";
		echo"<td width='10%'>";?>
	<?php 
if (empty($res['picture'])) { ?>
<img src="../../icon/ggo.png" style="width:100px"/>
<?php }else{ ?>
		<?php
	if($res['foto_mitra']=='0')
      {
		echo "<img width=100px src=../nopic.png> </img>";
		  }
		  else {?>
<img src="../../foto_mitra/<?php echo $res['foto_mitra'];?>" style="width:100px"/>
<?php }}
		echo"</td>";
		echo "<td width=15%><b>".$res['title']." ".$res['nama_mitra']."  (".$res['kelamin'].")</b><br>".$res['mitra_email']."<br>Phone: ".$res['nomorhp']." <br>Civilization ID: ".$res['no_ktp']."</td>";
		echo "<td width=5%>".$res['tanggal']."</td>";	
		echo "<td width=15%>".$res['alamat']."<br>".$res['kecamatan']."<br>".$res['kota']."<br>".$res['propinsi']."</td>";
					echo "<td width=5%>";
	if($res['sebagai']=='Admin')
      {
	
		echo "Administrator";	
  }
  if($res['sebagai']=='customerservice')
      {
	
		echo "Cs";	
  }
  if($res['sebagai']=='superadmin')
      {
	
		echo "Owner<br>";	
  }
  if($res['sebagai']=='it')
      {
echo "IT Support";
  }
   if($res['sebagai']=='sales')
      {
echo "Sales";
  }
  echo "<br>";
  if($res['suspen']=='1')
      {
	
		echo "<small style=color:red>SUSPENSED</small><br><br>
		<a style=padding:5px;color:#fff;background:Orange href=aktifkan.php?id_mitra=$res[id_mitra]>Activated</a>";	
  }
  if($res['suspen']=='0'&&$res['sebagai']=='Admin')
      {
echo "<small style=color:green>ACTIVE</small><br><br>
		<a style=padding:5px;color:#fff;background:red href=suspens.php?id_mitra=$res[id_mitra]>SUSPEND</a>";
  }
  echo "</td>";
  echo "<td width=5%>".$res['departement']."</td>";	
		
		echo "<td width=5%>";
if($res['sebagai']=='superadmin')
      {
	if($res['id_mitra']=='1')
      {	 
echo "";
	  }else{
 echo "<a style=padding:5px;color:#fff href=delete.php?id_mitra=$res[id_mitra] onClick=\"return confirm('Are you sure you want to delete?')\"><img src=../delete.png width=25px />Delete</a>";	
	  }}else {
		echo "";
	  }
echo"<br><br>
		<a style=padding:5px;color:#fff  target=_blank href=lihat.php?id_mitra=$res[id_mitra]><img src=../print.png width=25px /></a><br><br>
		<a style=padding:5px;color:#fff;background:Orange href=update.php?id_mitra=$res[id_mitra]>Edit</a>"; 
		echo"</td>";
		echo "</tr>";	
		
	}
	?>
                                    </tbody>
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
        });
    </script>
        


</div>


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
