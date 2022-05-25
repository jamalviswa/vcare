<?php
session_start();
include_once 'dbconnect.php';

if(!isset($_SESSION['mitra']))
{
	header("Location: ../owner/index.php");
}
$res=mysqli_query($mysqli, "SELECT * FROM mitra WHERE id_mitra=".$_SESSION['mitra']);
$rows=mysqli_fetch_array($res);

if(isset($_POST['allocate']))
{
    $query=mysqli_query($mysqli,"UPDATE `users` SET `tech_id`=".$_POST['tech']." where `id`=".$_POST['job_id'])or die(mysqli_error($mysqli));
    if($query)
    {
        ?>
        <script>
            alert("Job Allocated");
            window.location="http://vcare.viswatechnologysolutions.com/taxi/responsive/dashboard.php";
        </script>
        <?php
    }
}
?>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
   Vcare Systems
  </title>
  <!-- Favicon -->
  <link href="./assets/img/brand/logo.png" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="./assets/js/plugins/nucleo/css/nucleo.css" rel="stylesheet" />
  <link href="./assets/js/plugins/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="./assets/css/argon-dashboard.css?v=1.1.1" rel="stylesheet" />
</head>

<body class="" style="background:#101D25">
  <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light" style="background:#101D25;" id="sidenav-main">
    <div class="container-fluid" style="overflow: auto; background:#101D25">
      <!-- Toggler -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Brand -->
      <a class="navbar-brand pt-0" href="./dashboard.php">
			  			<?php 
	if($rows['sebagai']=='Admin')
      {
	?>  
        <img src="logo.png" style="max-width:100px;max-height:auto;" class="navbar-brand-img" alt="..."><br><h3 style="color:#FFA500">IAM ADMIN</h3>
	<?php } ?>
				  			<?php 
	if($rows['sebagai']=='Agen')
      {
	?>  
        <img src="agen.png" style="max-width:100px;max-height:auto" class="navbar-brand-img" alt="..."><br><h3>IAM AGEN</h3>
	<?php } ?>
              </a>
      </a>
      <!-- User -->
      <ul class="nav align-items-center d-md-none">
        <li class="nav-item dropdown">
          <a class="nav-link nav-link-icon" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="ni ni-bell-55"></i>
          </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div class="media align-items-center">
              <span class="avatar avatar-sm rounded-circle">
				<?php
if($rows['foto_mitra']==''){
	?>
<img src="user.png"/>
	  <?php } else {?>
	  <img src="../foto_mitra/<?php echo $rows['foto_mitra'];?>"/>
	<?php }
	?>
              </span>
            </div>
          </a>
          <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
            <div class=" dropdown-header noti-title">
              <h6 class="text-overflow m-0">Get job and paid!</h6>
            </div>
            <a onclick="openCity(event,'pic')" class="dropdown-item">
              <i class="ni ni-single-02"></i>
                <span>My profile</span>
            </a>
              <div class="dropdown-divider"></div>
              <a href="../owner/logoutadmin.php?logout" class="dropdown-item">
                <i class="ni ni-user-run"></i>
                <span>Logout</span>
              </a>
          </div>
        </li>
      </ul>
      <!-- Collapse -->
      <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Collapse header -->
        <div class="navbar-collapse-header d-md-none" style="display:none">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a href="./dashboard.php">
			  			<?php 
	if($rows['sebagai']=='Admin')
      {
	?>  
        <img src="admin.png" style="max-width:100px;max-height:auto" class="navbar-brand-img" alt="..."><br><h3>Admin</h3>
	<?php } ?>
				  			<?php 
	if($rows['sebagai']=='Agen')
      {
	?>  
        <img src="agen.png" style="max-width:100px;max-height:auto" class="navbar-brand-img" alt="..."><br><h3>IAM AGEN</h3>
	<?php } ?>
              </a>
            </div>
            <div class="col-6 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>
        <!-- Form -->
        <form class="mt-4 mb-3 d-md-none">
          <div class="input-group input-group-rounded input-group-merge">
            <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="Search" aria-label="Search">
            <div class="input-group-prepend">
              <div class="input-group-text">
                <span class="fa fa-search"></span>
              </div>
            </div>
          </div>
        </form>
        <!-- Navigation -->
        <ul class="navbar-nav">

          <li class="nav-item  active ">
            <a class="nav-link  active " onclick="openCity(event,'home')" id="defaultOpen" style="color:white;">
              <i class="ni ni-tv-2 text-primary"></i> Dashboard
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link " onclick="openCity(event,'toko')" style="color:white;">
              <i class="ni ni-folder-17 text-green"></i> Products
            </a>
          </li>

		  <li class="nav-item">
            <a class="nav-link " onclick="openCity(event,'notifikasi')" style="color:white">
              <i class="ni ni-send text-dark"></i> Notification
            </a>
          </li>
			
		  <li class="nav-item">
            <a class="nav-link" onclick="openCity(event,'pic')" style="color:white;">
              <i class="ni ni-circle-08 text-purple"></i> My Account
            </a>
          </li>		
          <li class="nav-item">
            <a class="nav-link" onclick="openCity(event,'users')" style="color:white">
              <i class="ni ni-circle-08 text-pink"></i> Users
            </a>
          </li>
			<li class="nav-item">
            <a class="nav-link" onclick="openCity(event,'narasumber')" style="color:white">
              <i class="ni ni-circle-08 text-pink"></i> Technicians
            </a>
          </li>
		  			<li class="nav-item">
            <a class="nav-link" onclick="openCity(event,'mitra')" style="color:white">
              <i class="ni ni-single-02 text-yellow"></i> Administrators
            </a>
          </li>
		  
          <li class="nav-item">
            <a class="nav-link " onclick="openCity(event,'toko1')" style="color:white">
              <i class="ni ni-user-run text-red"></i> Banner
            </a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link " onclick="openCity(event,'feedback')" style="color:white">
              <i class="fa fa-comments text-yellow"></i> Feedback
            </a>
          </li>
        </ul>
        <!-- Divider -->
        <hr class="my-3">
        <!-- Heading -->
      </div>
    </div>
  </nav>
  
  <div class="main-content">
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main" style="background:#FFA500">
      <div class="container-fluid">
	  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script><link rel="stylesheet" href="w3.css">
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" ><div style="color:#101D25"><b>Vcare Systems</b></div></a>
        <!-- Form -->
        <form class="navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex ml-lg-auto" style="color:#101D25;" >
          <div class="form-group mb-0" >
            <div class="input-group input-group-alternative" style="border: 2px solid #101D25; margin-top:10px;background:#101D25">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-search"></i></span>
              </div>
<?php include "dbconnect.php";?>
<script type="text/javascript">/*<![CDATA[*/$(document).ready(function(){$("#golek").keyup(function(){var a=$("#golek").val();if(a!=""){$("#jesil").html("<img width=300px src='loading.gif'/>");$.ajax({type:"post",url:"cari.php",data:"r="+a,success:function(b){$("#jesil").html(b)}})}})});/*]]>*/</script>            
<input class="form-control" style="background:none" id="golek" placeholder="Search Admin name" type="text"><div style="width: 100%;border: 5px;border-radius: 40px;color:#101D25" id="jesil"></div>
            </div>
          </div>
        </form>
        <!-- User -->
        <ul class="navbar-nav align-items-center d-none d-md-flex">
          <li class="nav-item dropdown">
            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <div class="media align-items-center">
                <span class="avatar avatar-sm rounded-circle">
				<?php
if($rows['foto_mitra']==''){
	?>
<img src="user.png"/>
	  <?php } else {?>
	  <img src="../foto_mitra/<?php echo $rows['foto_mitra'];?>"/>
	<?php }
	?>
                </span>
                <div style="color: #101D25" class="media-body ml-2 d-none d-lg-block">
                  <span class="mb-0 text-sm  font-weight-bold">
				 <?php echo $rows['title'];?> <?php echo $rows['nama_mitra'];?> 
				  </span>
                </div>
              </div>
            </a>
            <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
              <div class=" dropdown-header noti-title">
                <h6 class="text-overflow m-0">Best Partners for Job</h6>
              </div>
              <a onclick="openCity(event,'pic')" class="dropdown-item">
                <i class="ni ni-single-02"></i>
                <span>My profile</span>
              </a>
              <div class="dropdown-divider"></div>
              <a href="../owner/logoutadmin.php?logout" class="dropdown-item">
                <i class="ni ni-user-run"></i>
                <span>Logout</span>
              </a>
            </div>
          </li>
        </ul>
      </div>
    </nav>
    <!-- End Navbar -->
	<div id="home" class="mainpanel">
    <!-- Header -->
    <div class="header pb-8 pt-5 pt-md-8" style="background:#101D25">
      <div class="container-fluid">
        <div class="header-body">
          <!-- Card stats --><br><br><br>
          <div class="row">
            <div class="col-xl-4 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Service Engineers</h5>
                          <span class="h2 font-weight-bold mb-0"><?php
                            $query = "SELECT COUNT(*) AS total FROM users where sebagai='driver'";  
                            $result = mysqli_query($mysqli, $query); 
                            $values = mysqli_fetch_assoc($result); 
                            $num_rows = $values['total']; 
                            echo $num_rows;
                             ?>
                          </span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                        <i class="ni ni-circle-08"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-nowrap">Technicians</span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Products</h5>
                      <span class="h2 font-weight-bold mb-0"><?php
                        $query = "SELECT COUNT(*) AS total FROM jw_product"; 
                        $result = mysqli_query($mysqli, $query); 
                        $values = mysqli_fetch_assoc($result); 
                        $num_rows = $values['total']; 
                        echo $num_rows;
                         ?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                        <i class="ni ni-bell-55"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-nowrap">items</span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Users</h5>
                      <span class="h2 font-weight-bold mb-0"><?php
                        $query = "SELECT COUNT(*) AS total FROM users where sebagai='user'"; 
                        $result = mysqli_query($mysqli, $query); 
                        $values = mysqli_fetch_assoc($result); 
                        $num_rows = $values['total']; 
                        echo $num_rows;
                         ?> </span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                        <i class="ni ni-circle-08"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-nowrap">Users</span>
                  </p>
                </div>
              </div>
            </div>
          </div>
         </div>
      </div>
    </div>
    
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style = "font-size:20px;">
                        <b>Allocate Technician</b>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="dataTable" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>S.NO</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Service Name</th>
                                        <th>Location</th>
                                        <th>Technician</th>
                                           <th>Status</th>
                                        <th>Action</th>
                                     
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query=mysqli_query($mysqli,"SELECT * FROM `users` WHERE sebagai!='driver' and `isOpen`='yes' ORDER by first_name ASC")or die(mysqli_error($con));
                                    $i=1;
                                    while($row=mysqli_fetch_array($query))
                                    {
                                        ?>
                                        <tr>
                                            <td><?php echo $i++?></td>    
                                            
                                            <td><?php echo $row['first_name'].' '.$row['last_name']?></td>
                                            <td><?php echo $row['phone']?></td>
                                            <td><?php echo $row['Service_name']?></td>
                                            <td><?php echo $row['Service_location']?></td>
                                        
                                            <td>
                                                <?php
                                                    if($row['tech_id']==-1)
                                                    {
                                                     ?>
                                                <form method="POST">
                                                    <div class="form-group">
                                                        <label>Technician</label>
                                                        <select name="tech" required class="form-control">
                                                            <option value="">Select Technician</option>
                                                            <?php
                                                            $result = mysqli_query($mysqli, "SELECT * FROM users where sebagai='driver' ORDER BY id Asc");
                                                            while($row1=mysqli_fetch_array($result))
                                                            {
                                                                ?>
                                                                <option value="<?php echo $row1['id']?>"><?php echo $row1['first_name'].' '.$row1['last_name']?></option>
                                                                <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <input type="hidden"  name="job_id" value="<?php echo $row['id']?>"/>
                                                    <input type="submit" name="allocate" class="btn btn-info btn-sm" value="Allocate"/>
                                                </form>
                                              
                                                <?php
                                                    }
                                                    else
                                                    {
                                                        echo $row['tech_id'];
                                                         $query1=mysqli_query($mysqli,"SELECT * FROM `users` WHERE id='".$row['tech_id']."'")or die(mysqli_error($con));
                                                        $arr=mysqli_fetch_array($query1);
                                                        echo $arr['first_name'].' '.$arr['last_name'];
                                                        
                                          
                                                    }
                                                
                                                ?>
                                            </td>
                                              <td>
                                                    <input style="border:none;"  name="job_id" value="<?php if(($row['service'] )==1){ echo "Processing";} else { echo"Not Processing";}?>"/>
                                                </td>
                                             <td width=10%> <a style=padding:5px;color:#fff;background:red  onClick="return confirm('Are you sure you want to delete?')" href="delete.php?id=<?php echo $row['id'] ?>">Delete</a>
                                         </td>
                                     
                                        </tr>
                                        <?php
                                    }
                                    
                                    ?>
                                </tbody>
                            </table>
                            
                        </div>
                        <br>
                        <br>
                    </div>
                </div>
            </div> 
        </div>
    <br>
    </div>
	
    <div class="container-fluid mt--7"style="display:none;">
      <div class="row">
<div class="col-xl-12 mb-5 mb-xl-0">
<div class="card shadow border-0" style="display:none;">
            <div class="card-header bg-transparent">
              <div class="row align-items-center" style="display:none">
                <div style="color:#444" class="col">
                  <h6 style="color:#444 !important" class="text-uppercase text-light ls-1 mb-1">All Active Orders</h6>
                  <h2 style="color:#444 !important" class="text-white mb-0"><small>Dashboard</small></h2>
                </div>
				
                <div class="col">
				Total Profit on this Month: <b>USD <?php
$query = "SELECT SUM(harga) AS total FROM transaksi WHERE YEAR(tanggal) = YEAR(NOW( )) AND MONTH(tanggal) = MONTH(NOW( ))"; 
$result = mysqli_query($mysqli, $query); 
$values = mysqli_fetch_assoc($result); 
$num_rows = $values['total']; 
$lam = "SELECT COUNT(*) AS nok FROM transaksi WHERE YEAR(tanggal) = YEAR(NOW( )) AND MONTH(tanggal) = MONTH(NOW( ))"; 
$asas = mysqli_query($mysqli, $lam); 
$aak = mysqli_fetch_assoc($asas); 
$jemah = $aak['nok']; 
$perawat = number_format($num_rows,0,",","."); echo $perawat;
 ?> <small>(<?php echo $jemah;?> Orders)</small></b>
  <script type="text/javascript">
 $(document).ready(function() {
        loadData();
    });

    var loadData = function() {
        $.ajax({    //create an ajax request to load_page.php
            type: "GET",
            url: "../owner/meleck.php",             
            dataType: "html",   //expect html to be returned                
            success: function(response){                    
                $("#responsecontainer").html(response);
                setTimeout(loadData, 5000); 
            }

        });
    };

</script>

<div id="responsecontainer" align="center"></div>
				<noscript>
                  <ul class="nav nav-pills justify-content-end">
                    <li class="nav-item mr-2 mr-md-0"  >
                      <a target="_blank" style="background:#499c49;color:#fff" href="exportall.php" class="nav-link py-2 px-3 active">
                        <span class="d-none d-md-block">Excel</span>
                      </a>
                    </li>
                    <li class="nav-item" >
                      <a target="_blank" style="background:#ef4747;color:#fff" href="all.php" class="nav-link py-2 px-3">
                        <span class="d-none d-md-block">PDF</span>
                      </a>
                    </li>
                  </ul>
				</noscript>
                </div>
              </div>
            </div>
    <style>
      #map-canvas {
        width: 100%;
        height: 500px;
      }
    </style>
  <script type="text/javascript" src="//maps.google.com/maps/api/js?sensor=true"></script>
  <script type="text/javascript"src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAO4lbxY6SKygcJxTuzu-Qi7kAAP9SdAwM&callback=initMap"></script> <script>
    var marker;
      function initialize() {
        var mapCanvas = document.getElementById('map-canvas');
        var mapOptions = {
          mapTypeId: google.maps.MapTypeId.ROADMAP
        }     
        var map = new google.maps.Map(mapCanvas, mapOptions);
        var infoWindow = new google.maps.InfoWindow;      
        var bounds = new google.maps.LatLngBounds();
 
 
        function bindInfoWindow(marker, map, infoWindow, html) {
          google.maps.event.addListener(marker, 'click', function() {
            infoWindow.setContent(html);
            infoWindow.open(map, marker);
          });
        }
 
          function addMarker(lat, lng, info) {
            var pt = new google.maps.LatLng(lat, lng);
            bounds.extend(pt);
var iconBase = 'https://barisandata.com/mitra.png';
            var marker = new google.maps.Marker({
				icon: iconBase,
                map: map,
                position: pt
            });       
            map.fitBounds(bounds);
            bindInfoWindow(marker, map, infoWindow, info);
          }
 
          <?php
            $query = mysqli_query($mysqli, "SELECT * FROM transaksi where aktif='yes' and lat is not NULL and lat !='';");
          while ($data = mysqli_fetch_array($query)) {
			  
$baka=mysqli_query($mysqli, "SELECT * FROM users WHERE id=".$data['id_users']);
$jon=mysqli_fetch_array($baka);
            $lat = $data['lat'];
            $lng = $data['lng'];
            $first_name = $jon['first_name'];
			$id_trans = $data['id_trans'];
			$phone = $data['phone'];
			$sebagai = $data['sebagai'];
			$alamat = $data['alamat'];
			$tujuan = $data['tujuan'];
            $harga= $data['harga'];
            $layanan= $data['layanan'];
            $tipe= $data['tipe'];
            echo ("addMarker($lat, $lng, '<a href=../owner/cetak.php?id_trans=$id_trans target=_blank style=font-size:11px;color:#000><b>$first_name Request $layanan</b><br> Client Address: $alamat <br>Total Invoice: USD $harga <br> phone $first_name : $phone <br></a>');\n");                        
          }
          ?>
        }
      google.maps.event.addDomListener(window, 'load', initialize);
    </script>
    <div id="map-canvas"></div> <center style="color:#000">Click maps markers for details<br><br>
          <div class="row">
            <div class="col-xl-4 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Active Orders</h5>
                      <span class="h4 font-weight-bold mb-0"><?php
$query = "SELECT COUNT(*) AS total FROM transaksi where aktif='yes'";  
$result = mysqli_query($mysqli, $query); 
$values = mysqli_fetch_assoc($result); 
$num_rows = $values['total']; 
echo $num_rows;
 ?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                        <i class="ni ni-bell-55"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-nowrap">Orders</span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Balance Users</h5>
                      <span class="h4 font-weight-bold mb-0">USD <?php
$query = "SELECT sum(saldo) AS total FROM users"; 
$result = mysqli_query($mysqli, $query); 
$values = mysqli_fetch_assoc($result); 
$num_rows = $values['total']; 
echo $num_rows;
 ?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                        <i class="ni ni-money-coins"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-nowrap">Client and Partners</span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Profit</h5>
                      <span class="h4 font-weight-bold mb-0">USD <?php
$query = "SELECT sum(harga) AS total FROM transaksi where aktif='no'"; 
$result = mysqli_query($mysqli, $query); 
$values = mysqli_fetch_assoc($result); 
$num_rows = $values['total']; 
echo $num_rows;
 ?> </span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                        <i class="ni ni-money-coins"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-nowrap">Users</span>
                  </p>
                </div>
              </div>
            </div>
          </div>
<link href="./assets/bootstrap.min.css" rel="stylesheet">

    <link href="./assets/datatables.bootstrap4.min.css" rel="stylesheet">

    <!-- Bootstrap core JavaScript-->
    <script src="./assets/jquery.min.js"></script>

    <!-- Page level plugin JavaScript-->
    <script src="./assets/jquery.datatables.min.js"></script>

    <script src="./assets/datatables.bootstrap4.min.js"></script>
      <script>
        $(document).ready(function () {
            $('#dataTable').DataTable();
        });
    </script>
</div>
</div>
      </div>
	  <br><br>
	  <!-- Footer -->
      <footer class="footer">
        <div class="row align-items-center justify-content-xl-between" style="display:none">
          <div class="col-xl-6">
            <div class="copyright text-center text-xl-left text-muted">
              &copy; <?php echo date('Y');?> barisandata.com
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>

<div id="kota" class="mainpanel">
<br><br>
<iframe src="../owner/kota/index.php" style="width:100%;height:725px;overflow:auto;margin-top:40px" align="center" scrolling="yes" frameborder="0"></iframe>
</div>
<div id="complain" class="mainpanel">
<br><br>
<iframe src="../owner/complain/index.php" style="width:100%;height:725px;overflow:auto;margin-top:40px" align="center" scrolling="yes" frameborder="0"></iframe>
</div>
<div id="dash" class="mainpanel">
<br><br>
<iframe src="../owner/dash/index.php" style="width:100%;height:725px;overflow:auto;margin-top:40px" align="center" scrolling="yes" frameborder="0"></iframe>
</div>
<div id="order" class="mainpanel">
<br><br>
<iframe src="../owner/dash/smart.php" style="width:100%;height:725px;overflow:auto;margin-top:40px" align="center" scrolling="yes" frameborder="0"></iframe>
</div>
<div id="toko" class="mainpanel">
<br><br>
<iframe src="../owner/barang/index.php" style="width:100%;height:725px;overflow:auto;margin-top:40px" align="center" scrolling="yes" frameborder="0"></iframe>
</div>

<div id="toko1" class="mainpanel">
<br><br>
<iframe src="../owner/barang/index1.php" style="width:100%;height:725px;overflow:auto;margin-top:40px" align="center" scrolling="yes" frameborder="0"></iframe>
</div>

<div id="feedback" class="mainpanel">
<br><br>
<iframe src="feedback.php" style="width:100%;height:725px;overflow:auto;margin-top:40px" align="center" scrolling="yes" frameborder="0"></iframe>
</div>


<div id="car" class="mainpanel">
<br><br>
<iframe src="../owner/mobil/index.php" style="width:100%;height:725px;overflow:auto;margin-top:40px" align="center" scrolling="yes" frameborder="0"></iframe>
</div>
<div id="billing" class="mainpanel">
<br><br>
<iframe name="right" src="../owner/board/index.php" style="width:100%;height:725px;overflow:auto;margin-top:40px" align="center" scrolling="yes" frameborder="0"></iframe>
</div>
<div id="pic" class="mainpanel">
<br><br>
<iframe src="../owner/pic/index.php" style="width:100%;height:725px;overflow:auto;margin-top:40px" align="center" scrolling="yes" frameborder="0"></iframe>
</div>
<div id="mitra" class="mainpanel">
<br><br>
<iframe src="../owner/mitra/index.php" style="width:100%;height:725px;overflow:auto;margin-top:40px" align="center" scrolling="yes" frameborder="0"></iframe>
</div>
<div id="users" class="mainpanel">
<br><br>
<iframe src="../owner/users/index.php" style="width:100%;height:725px;overflow:auto;margin-top:40px" align="center" scrolling="yes" frameborder="0"></iframe>
</div>
<div id="narasumber" class="mainpanel">
<br><br>
<iframe src="../owner/narasumber/index.php" style="width:100%;height:725px;overflow:auto;margin-top:40px" align="center" scrolling="yes" frameborder="0"></iframe>
</div>
<div id="invoice" class="mainpanel">
<br><br>
<iframe name="PIK" src="../owner/invoice/index.php" style="width:100%;height:725px;overflow:auto;margin-top:40px" align="center" scrolling="yes" frameborder="0"></iframe>
</div>
<div id="document" class="mainpanel">
<br><br>
<iframe src="../owner/document/index.php" style="width:100%;height:725px;overflow:auto;margin-top:40px" align="center" scrolling="yes" frameborder="0"></iframe>
</div>
<div id="maps" class="mainpanel">
<br><br>
<iframe src="../owner/maps/index.php" style="width:100%;height:725px;overflow:auto;margin-top:40px" align="center" scrolling="yes" frameborder="0"></iframe>
</div>
<div id="voucher" class="mainpanel">
<br><br>
<iframe src="../owner/voucher/index.php" style="width:100%;height:725px;overflow:auto;margin-top:40px" align="center" scrolling="yes" frameborder="0"></iframe>
</div>
<div id="tarif" class="mainpanel">
<br><br>
<iframe src="../owner/tarif/upadatetarif.php" style="width:100%;height:725px;overflow:auto;margin-top:40px" align="center" scrolling="yes" frameborder="0"></iframe>
</div>
<div id="paymentpro" class="mainpanel">
<br><br>
<iframe src="../owner/payment/index.php" style="width:100%;height:725px;overflow:auto;margin-top:40px" align="center" scrolling="yes" frameborder="0"></iframe>
</div>
<div id="notifikasi" class="mainpanel">
<br><br>
<iframe name="Mit" src="../owner/notifikasi/index.php" style="width:100%;height:725px;overflow:auto;margin-top:40px" align="center" scrolling="yes" frameborder="0"></iframe>
</div>
<div id="zona" class="mainpanel">
<br><br>
<iframe src="../owner/zona/index.php" style="width:100%;height:725px;overflow:auto;margin-top:40px" align="center" scrolling="yes" frameborder="0"></iframe>
</div>
  </div>

<script>/*<![CDATA[*/function openCity(b,c){var e,a,d;a=document.getElementsByClassName("mainpanel");for(e=0;e<a.length;e++){a[e].style.display="none"}d=document.getElementsByClassName("tablinks");for(e=0;e<d.length;e++){d[e].className=d[e].className.replace(" active","")}document.getElementById(c).style.display="block";b.currentTarget.className+=" active"}document.getElementById("defaultOpen").click();/*]]>*/</script>

  <!--   Core   -->
  <script src="./assets/js/plugins/jquery/dist/jquery.min.js"></script>
  <script src="./assets/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!--   Optional JS   -->
  <script src="./assets/js/plugins/chart.js/dist/Chart.min.js"></script>
  <script src="./assets/js/plugins/chart.js/dist/Chart.extension.js"></script>
  
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAO4lbxY6SKygcJxTuzu-Qi7kAAP9SdAwM"></script>
</body>

</html>