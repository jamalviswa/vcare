
<html>
<body style="padding:25px;"onload="window.print()"><center>
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
                                <h4 class="title">Data PIC Billing Admin</h4>
                                <p class="category">Seluruh akun admin dan PIC Trol billing system</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
<th >Foto</th>
		<th >Profile</th>
		<th >Tgl registrasi</th>
		<th >Alamat Tinggal</th>
		<th >Registrasi sebagai</th>	
		<th >departement</th>
	
                                    </thead>
<?php 
	while($res = mysqli_fetch_array($result)) { 		
		echo "<tr>";
		echo"<td width='10%'>";
	if($res['foto_mitra']=='0')
      {
		echo "<img width=100px src=../nopic.png> </img>";
		  }
		  else {?>
<img src="../../foto_mitra/<?php echo $res['foto_mitra'];?>" style="width:100px"/>
		 <?php }
		echo"</td>";
		echo "<td width=15%><b>".$res['title']." ".$res['nama_mitra']."  (".$res['kelamin'].")</b><br>".$res['mitra_email']."<br>Hp: ".$res['nomorhp']." <br>KTP: ".$res['no_ktp']."<br><br>Jabatan: ".$res['jabatan']."</td>";
		echo "<td width=5%>".$res['tanggal']."</td>";	
		echo "<td width=15%>".$res['alamat']."<br>".$res['kecamatan']."<br>".$res['kota']."<br>".$res['propinsi']."</td>";
					echo "<td width=5%>";
	if($res['sebagai']=='Admin')
      {
	
		echo "Billing Admin";	
  }
  if($res['sebagai']=='customerservice')
      {
	
		echo "Cs";	
  }
  if($res['sebagai']=='superadmin')
      {
	
		echo "Owner<br>";	
  }
  if($res['sebagai']=='pic')
      {
echo "PIC";
  }
  echo "<br>";
  if($res['suspen']=='1')
      {
	
		echo "<small style=color:red>SUSPENSED</small><br>";	
  }
  if($res['suspen']=='0'&&$res['sebagai']=='pic')
      {
echo "<small style=color:green>AKTIF</small><br>";
  }
  echo "</td>";
  echo "<td width=5%>".$res['departement']."</td>";	
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

        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>
                        <li>
                            <a href="#">
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Company
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Portfolio
                            </a>
                        </li>
                        <li>
                            <a href="#">
                               Blog
                            </a>
                        </li>
                    </ul>
                </nav>
                <p class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script> sinyonya
                </p>
            </div>
        </footer>


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
