	<meta charset="utf-8" />
	<html>
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
<body style="padding:25px;"onload="window.print()"><center>
<?php
//including the database connection file
include_once("../dbconnect.php");

//fetching data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM users ORDER BY id Asc");
?>
<div class="wrapper">
 
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Data User</h4>
                              </div><br><br>
                            <div class="content table-responsive table-full-width">
<table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                                    <thead>
<th class="th-sm">Photo</th>
		<th class="th-sm">Profile</th>
		<th class="th-sm">Job</th>
		<th class="th-sm">Adress/Contact</th>
		<th class="th-sm">Balance</th>
	
                                    </thead>
<?php 
	while($res = mysqli_fetch_array($result)) { 		
		echo "<tbody>";
		echo "<tr>";
		echo"<td width='10%'>";
if($res['oauth_uid']==''){
	?>
<img src="../../foto_mitra/<?php echo $res['picture'];?>" style="width:100px"/>
	  <?php } else {?>
<img src="<?php echo $res['picture'];?>" style="width:100px"/>
	<?php }
		echo"</td>";
		echo "<td width=15%><b>".$res['first_name']." ".$res['last_name']."</b><br>".$res['email']."<br>KTP: ".$res['noktp']."<br>Gender: ".$res['kelamin']."<br>Agama: ".$res['agama']."<br><br>Tempat Tgl lahir: <br>".$res['tempatlahir'].", ".$res['tgllahir']."</td>";
		echo "<td width=15%><small>".$res['profesi']."<br>(".$res['jabatan'].")<br>Pendapatan: ".$res['pendapatan']."<br>status: ".$res['statusmenikah']."</small></td>";	
		echo "<td width=15%><small><center>".$res['alamat1']."<br>".$res['kota']."<br>".$res['provinsi']."<br>".$res['phone']."</center></small></td>";
		echo "<td width=15%><small>Saldo: USD ".$res['saldo']."<br>Point: ".$res['pembelian']."</small></td>";
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
                    &copy; <script>document.write(new Date().getFullYear())</script> barisandata
                </p>
            </div>
        </footer>


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

<div id="editor"></div>
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
</center>

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
