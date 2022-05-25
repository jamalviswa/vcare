<?php
session_start();
include_once '../dbconnect.php';

if(!isset($_SESSION['mitra']))
{
	header("Location: ../index.php");
}

$res=mysqli_query($mysqli, "SELECT * FROM mitra WHERE id_mitra=".$_SESSION['mitra']);
$rows=mysqli_fetch_array($res);
$departement=$rows['departement'];
$kat=mysqli_query($mysqli, "SELECT * FROM departement WHERE departement='$departement'");
$kot=mysqli_fetch_array($kat);

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
<body style="font-size:10px; background:#101D25;">
<div class="wrapper">
        <div class="content">
            <div class="container-fluid">
						
<div class="col-md-12">
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8" style="background:#101d25 !important">
      <div class="container-fluid">
        <div class="header-body">
          <!-- Card stats --><br><br><br>
          <div class="row">
            <div class="col-xl-4 col-md-4">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body" style="padding:10px; text-align:center;">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0" style="color:#101D25;"><b>Service Engineers</b></h5>
                          <span class="h2 font-weight-bold mb-0"><?php
                            $query = "SELECT COUNT(*) AS total FROM users where sebagai='driver'";  
                            $result = mysqli_query($mysqli, $query); 
                            $values = mysqli_fetch_assoc($result); 
                            $num_rows = $values['total']; 
                            echo $num_rows;
                             ?>
                          </span>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm" style = "margin-top:10px;">
                    <span class="text-nowrap">Technicians</span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-md-4">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body" style="padding:10px; text-align:center;">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0" style="color:#101D25;"><b>Products</b></h5>
                      <span class="h2 font-weight-bold mb-0"><?php
                        $query = "SELECT COUNT(*) AS total FROM jw_product"; 
                        $result = mysqli_query($mysqli, $query); 
                        $values = mysqli_fetch_assoc($result); 
                        $num_rows = $values['total']; 
                        echo $num_rows;
                         ?></span>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm" style = "margin-top:10px;">
                    <span class="text-nowrap">items</span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-md-4">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body" style="padding:10px; text-align:center;">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0" style="color:#101D25;"><b>Users</b></h5>
                      <span class="h2 font-weight-bold mb-0"><?php
                        $query = "SELECT COUNT(*) AS total FROM users where sebagai='user'"; 
                        $result = mysqli_query($mysqli, $query); 
                        $values = mysqli_fetch_assoc($result); 
                        $num_rows = $values['total']; 
                        echo $num_rows;
                         ?> </span>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm" style = "margin-top:10px;">
                    <span class="text-nowrap">Users</span>
                  </p
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>      
</div>
</div>

<div class="card" style="padding:10px;">
        <div class="row" style="padding:10px;">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style = "font-size:20px; padding:10px;">
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
		
</body>

    <!--   Core JS Files   -->
    <script src="../assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
	<script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Charts Plugin -->
	<script src="../assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="../assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAO4lbxY6SKygcJxTuzu-Qi7kAAP9SdAwM"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo puUSD se -->
	<script src="../assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="../assets/js/demo.js"></script>


</html>
<style>#loading{display:block;position:absolute;top:0;left:0;z-index:99999;width:100vw;height:100vh;background-image:url("../hourglass.svg");background-repeat:no-repeat;background-position:center}</style>
<div id="loading" style="display:none">
</div>
<script type="text/javascript">function showDiv(){div=document.getElementById("loading");div.style.display="block"};</script>
