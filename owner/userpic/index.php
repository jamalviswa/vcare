<?php
session_start();
include_once '../dbconnect.php';
if(!isset($_SESSION['user']))
{
	header("Location: ../index.php");
}
$res=mysqli_query($mysqli, "SELECT * FROM users WHERE id=".$_SESSION['user']);
$rows=mysqli_fetch_array($res);

$id = $_GET['id'];
$row=mysqli_fetch_array(mysqli_query($mysqli, "select * from users where id='$id'"));

if(isset($_POST['post']))
{
		
	$id = mysqli_real_escape_string($mysqli, $_POST['id']);
	$first_name = mysqli_real_escape_string($mysqli, $_POST['first_name']);
	$email = mysqli_real_escape_string($mysqli, $_POST['email']);
	$phone = mysqli_real_escape_string($mysqli, $_POST['phone']);
	$password = md5(mysqli_real_escape_string($mysqli, $_POST['password']));
	$lat = mysqli_real_escape_string($mysqli, $_POST['lat']);
	$lng = mysqli_real_escape_string($mysqli, $_POST['lng']);
	$forgot_pass_identity = mysqli_real_escape_string($mysqli, $_POST['forgot_pass_identity']);
	$created = mysqli_real_escape_string($mysqli, $_POST['created']);
	$modified = mysqli_real_escape_string($mysqli, $_POST['modified']);
	$status = mysqli_real_escape_string($mysqli, $_POST['status']);
	$akses = mysqli_real_escape_string($mysqli, $_POST['akses']);
	$tipeuser = mysqli_real_escape_string($mysqli, $_POST['tipeuser']);
	$afiliasi = mysqli_real_escape_string($mysqli, $_POST['afiliasi']);
	$saldo = mysqli_real_escape_string($mysqli, $_POST['saldo']);
	$shareafiliasi = mysqli_real_escape_string($mysqli, $_POST['shareafiliasi']);
	$pembelian = mysqli_real_escape_string($mysqli, $_POST['pembelian']);
	$noktp = mysqli_real_escape_string($mysqli, $_POST['noktp']);
	$fotouser = mysqli_real_escape_string($mysqli, $_POST['fotouser']);
	$fotoktp = mysqli_real_escape_string($mysqli, $_POST['fotoktp']);
	$fotoselfi = mysqli_real_escape_string($mysqli, $_POST['fotoselfi']);
	$nomoUSD langgan = mysqli_real_escape_string($mysqli, $_POST['nomoUSD langgan']);
	$coUSD ratename = mysqli_real_escape_string($mysqli, $_POST['coUSD ratename']);
	$brandcoUSD rate = mysqli_real_escape_string($mysqli, $_POST['brandcoUSD rate']);
	$npwp = mysqli_real_escape_string($mysqli, $_POST['npwp']);
	$alamatkantor1 = mysqli_real_escape_string($mysqli, $_POST['alamatkantor1']);
	$alamatkantor2 = mysqli_real_escape_string($mysqli, $_POST['alamatkantor2']);
	$alamatkantor3 = mysqli_real_escape_string($mysqli, $_POST['alamatkantor3']);
	$alamatkantor4 = mysqli_real_escape_string($mysqli, $_POST['alamatkantor4']);
	$telpkantor = mysqli_real_escape_string($mysqli, $_POST['telpkantor']);
	$faxkantor = mysqli_real_escape_string($mysqli, $_POST['faxkantor']);
	$alamatuser = mysqli_real_escape_string($mysqli, $_POST['alamatuser']);
$fotoselfi = $_POST['fotoselfi'];
	if(empty($_FILES['fotoselfi']['name'])){
		$fotoselfi=$_POST['fotoselfi'];
	}else{
		$fotoselfi=$_FILES['fotoselfi']['name'];
		//definisikan variabel file dan kendaraan file
		$uploaddir='../foto_mitra/';
		$kendaraanfile=$uploaddir.$fotoselfi;
		//periksa jika proses upload berjalan sukses
		$upload=move_uploaded_file($_FILES['fotoselfi']['tmp_name'],$kendaraanfile);
	}
	
$query=mysqli_query($mysqli, "UPDATE `users` SET `first_name` = '$first_name', `email` = '$email', `password` = '$password', `phone` = '$phone', `lat` = '$lat', `lng` = '$lng', `fotouser` = '$fotouser', `fotoktp` = '$fotoktp', `fotoselfi` = '$fotoktp', `coUSD ratename` = '$coUSD ratename', `brandcoUSD rate` = '$brandcoUSD rate', `alamatkantor1` = '$alamatkantor1', `alamatkantor2` = '$alamatkantor2', `alamatkantor3` = '$alamatkantor3', `alamatkantor4` = '$alamatkantor4', `telpkantor` = '$telpkantor', `faxkantor` = '$faxkantor' WHERE `users`.`id` = '$id';");
if($query){
		?>
	<center><script>document.location.href="index.php";</script>
</center>
		<?php
	}else{
		echo mysql_query();
	}
	

}else{
	unset($_POST['submit']);
}
?>
<!doctype html>
<html lang="en">
<head>
	
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
	
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Mengubah Profile Saya</h4>
                            </div>
                            <div class="content">
                                <form id="form"action="index.php" enctype="multipart/form-data"  method="post" name="postform">
								
<input type="hidden" name="tanggal"value="<?php echo date('d-m-Y h:i:s'); ?>"/>
                                   <div class="row">
										<div class="col-md-6">
                                            <div class="form-group">
                                                <label>Nama Lengkap</label>
                                                <input type="text"  class="form-control" name="first_name" placeholder="Nama Lengkap" value="<?php echo $rows['first_name'];?>">
                                             </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email address</label>
                                                <input type="email" readonly class="form-control" name="email" placeholder="Email" value="<?php echo $rows['email'];?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
									 <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Nomor KTP</label>
                                                <input type="number" readonly name="noktp"  class="form-control" placeholder="no ktp" value="<?php echo $rows['noktp'];?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>NPWP</label>
                                                <input type="text" class="form-control"  name="npwp" placeholder="NPWP" value="<?php echo $rows['npwp'];?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
									<div class="col-md-12">
                                            <div class="form-group">
                                                <label>Alamat Kantor</label>
                                                <input type="text" name="alamatkantor1"  class="form-control" placeholder="Nama Jalan" value="<?php echo $rows['alamatkantor1'];?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Alamat kantor 2</label>
                                                <input type="text" name="alamatkantor2"  class="form-control" placeholder="nomor, lantai dll" value="<?php echo $rows['alamatkantor2'];?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Alamat kantor 3</label>
                                                <input type="text" name="alamatkantor3"  class="form-control" placeholder="kota" value="<?php echo $rows['alamatkantor3'];?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Alamat kantor4</label>
                                                <input type="text" name="alamatkantor4"  class="form-control" placeholder="provinsi" value="<?php echo $rows['alamatkantor4'];?>">
                                            </div>
                                        </div>
                                    </div>
                                   <div class="row">
									<div class="col-md-6">
                                            <div class="form-group">
                                                <label>Nama Perusahaan (PT/CV/UD)</label>
                                                <input type="text" class="form-control"  required name="coUSD ratename" placeholder="Nama Perusaan" value="<?php echo $rows['coUSD ratename'];?>">
                                            </div>
                                        </div>
									
									<div class="col-md-6">
                                            <div class="form-group">
                                                <label>Nama Brand (merk)</label>
                                                <input type="text" class="form-control"  required name="brandcoUSD rate" placeholder="Nama Brand perusahaan" value="<?php echo $rows['brandcoUSD rate'];?>">
                                            </div>
                                        </div>
                                    </div>                                   
									<div class="row">
									<div class="col-md-6">
                                            <div class="form-group">
                                                <label>Phone Kantor</label>
                                                <input type="number" class="form-control"  required name="telpkantor" placeholder="Telp" value="<?php echo $rows['telpkantor'];?>">
                                            </div>
                                        </div>
									
									<div class="col-md-6">
                                            <div class="form-group">
                                                <label>Fax Kantor</label>
                                                <input type="number" class="form-control"  name="faxkantor" placeholder="Fax" value="<?php echo $rows['faxkantor'];?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
									<div class="col-md-12">
                                            <div class="form-group">
                                                <label>Nomor Pelanggan (Otomatis/custom)</label>
                                                <input type="number" readonly class="form-control"  required name="nomoUSD langgan" value="<?php echo $rows['nomoUSD langgan'];?>" placeholder="nomor pelanggan">
                                            </div>
                                        </div>
									
                                    </div>
									
                                    <div class="row">
									<div class="col-md-12">
                                            <div class="form-group">
                                                <label>Password (Wajib input password saat update)</label>
                                                <input type="password" class="form-control" required name="password" placeholder="password">
                                            </div>
                                        </div>
									<noscript>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>About Me</label>
                                                <textarea rows="5" class="form-control" placeholder="Here can be your description" value="Mike">Lamborghini Mercy, Your chick she so thirsty, I'm in that two seat Lambo.</textarea>
                                            </div>
                                        </div>
										</noscript>
                                    </div>
                                    <button type="submit" name="post" class="btn btn-info btn-fill pull-right">Update Profile</button>
                                    <div class="clearfix"></div>
									
<input type="hidden" name="id" value="<?php echo $rows['id']; ?>" />
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-user">
                            <div class="image">
                                <img src="https://ununsplash.imgix.net/photo-1431578500526-4d9613015464?fit=crop&fm=jpg&h=300&q=75&w=400" alt="..."/>
                            </div>
                            <div class="content">
                                <div class="author">
                                     <a href="#">
                                    <img class="avatar border-gray" src="../foto_mitra/<?php echo $rows['fotoselfi'];?>" alt="..."/>
									<input style="border:1px solid grey;padding:10px;width:100%" ID="FileUpload1" onchange="IsFileSelected()" type="file" name="foto_mitra" size="999999" required="required">

                                      <h4 class="title"><?php echo $rows['first_name'];?><br />
                                         <small><?php echo $rows['email'];?></small>
                                      </h4>
                                    </a>
                                </div>
                                <p class="description text-center"> "CoUSD tate: <?php echo $rows['coUSD ratename'];?><br>
                                                    Brand: <?php echo $rows['brandcoUSD rate'];?>"
                                </p>

                            </div>
                            <hr>
                            <div class="text-center">
                                <button href="#" class="btn btn-simple"><i class="fa fa-facebook-square"></i></button>
                                <button href="#" class="btn btn-simple"><i class="fa fa-twitter"></i></button>
                                <button href="#" class="btn btn-simple"><i class="fa fa-google-plus-square"></i></button>

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
                    &copy; <script>document.write(new Date().getFullYear())</script> profitgm
                </p>
            </div>
        </footer>
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
