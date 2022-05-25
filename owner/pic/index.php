<?php
session_start();
include_once '../dbconnect.php';
if(!isset($_SESSION['mitra']))
{
	header("Location: ../index.php");
}
// print_r($_SESSION['mitra']);
// exit;
$res=mysqli_query($mysqli, "SELECT * FROM mitra WHERE id_mitra=".$_SESSION['mitra']);
$rows=mysqli_fetch_array($res);

// $id_mitra = $_GET['id_mitra'];
// $row=mysqli_fetch_array(mysqli_query($mysqli, "select * from mitra where id_mitra='$id_mitra'"));

if(isset($_POST['post']))
{
	
	$nama_mitra = mysqli_real_escape_string($mysqli, $_POST['nama_mitra']);
	$email = mysqli_real_escape_string($mysqli, $_POST['email']);
	$password = md5(mysqli_real_escape_string($mysqli, $_POST['password']));
	$kelamin = mysqli_real_escape_string($mysqli, $_POST['kelamin']);
	$no_ktp = mysqli_real_escape_string($mysqli, $_POST['no_ktp']);
	$sim = mysqli_real_escape_string($mysqli, $_POST['sim']);
	$dokumen = mysqli_real_escape_string($mysqli, $_POST['dokumen']);
	$foto_mitra = mysqli_real_escape_string($mysqli, $_POST['foto_mitra']);
	$kendaraan = mysqli_real_escape_string($mysqli, $_POST['kendaraan']);
	$latmitra = mysqli_real_escape_string($mysqli, $_POST['latmitra']);
	$lngmitra = mysqli_real_escape_string($mysqli, $_POST['lngmitra']);
	$nomorhp = mysqli_real_escape_string($mysqli, $_POST['nomorhp']);
	$sebagai = mysqli_real_escape_string($mysqli, $_POST['sebagai']);
	$saldo = mysqli_real_escape_string($mysqli, $_POST['saldo']);
	$bankmitra = mysqli_real_escape_string($mysqli, $_POST['bankmitra']);
	$rekmitra = mysqli_real_escape_string($mysqli, $_POST['rekmitra']);
	$namarekmitra = mysqli_real_escape_string($mysqli, $_POST['namarekmitra']);
	$jambuka = mysqli_real_escape_string($mysqli, $_POST['jambuka']);
	$alamat = mysqli_real_escape_string($mysqli, $_POST['alamat']);
	$kota = mysqli_real_escape_string($mysqli, $_POST['kota']);
	$propinsi = mysqli_real_escape_string($mysqli, $_POST['propinsi']);
	$kecamatan = mysqli_real_escape_string($mysqli, $_POST['kecamatan']);
	$kabupaten = mysqli_real_escape_string($mysqli, $_POST['kabupaten']);
	$tanggal = mysqli_real_escape_string($mysqli, $_POST['tanggal']);
	$id_mitra = mysqli_real_escape_string($mysqli, $_POST['id_mitra']);
	$idunik = mysqli_real_escape_string($mysqli, $_POST['idunik']);
	$nourut = mysqli_real_escape_string($mysqli, $_POST['nourut']);
	$departement = mysqli_real_escape_string($mysqli, $_POST['departement']);
	$title = mysqli_real_escape_string($mysqli, $_POST['title']);
	$jabatan = mysqli_real_escape_string($mysqli, $_POST['jabatan']);
	$nama_mitra = trim($nama_mitra);
	$email = trim($email);
	
$foto_mitra = $_POST['foto_mitra'];
	if(empty($_FILES['foto_mitra']['name'])){
		$foto_mitra=$_POST['foto_mitra'];
	}else{
		$foto_mitra=$_FILES['foto_mitra']['name'];
		//definisikan variabel file dan kendaraan file
		$uploaddir='../../foto_mitra/';
		$kendaraanfile=$uploaddir.$foto_mitra;
		//periksa jika proses upload berjalan sukses
		$upload=move_uploaded_file($_FILES['foto_mitra']['tmp_name'],$kendaraanfile);
	}
	
$dokumen = $_POST['dokumen'];
	if(empty($_FILES['dokumen']['name'])){
		$dokumen=$_POST['dokumen'];
	}else{
		$dokumen=$_FILES['dokumen']['name'];
		//definisikan variabel file dan kendaraan file
		$jumpakj='../foto_mitra/';
		$limes=$jumpakj.$dokumen;
		//periksa jika proses upload berjalan sukses
		$rupso=move_uploaded_file($_FILES['dokumen']['tmp_name'],$limes);
	}
$query=mysqli_query($mysqli, "UPDATE `mitra` SET `bankmitra` = '$bankmitra', `rekmitra` = '$rekmitra', `namarekmitra` = '$namarekmitra', `jambuka` = '$jambuka', `alamat` = '$alamat', `kecamatan` = '$kecamatan', `kota` = '$kota', `propinsi` = '$kota', `nama_mitra` = '$nama_mitra', `foto_mitra` = '$foto_mitra', `kelamin` = '$kelamin', `latmitra` = '$latmitra', `lngmitra` = '$lngmitra', `nomorhp` = '$nomorhp', `no_ktp` = '$no_ktp', `mitra_email` = '$email', `mitra_pass` = '$password', `dokumen` = '$dokumen', `sebagai` = '$sebagai', `tanggal` = '$tanggal', `idunik` = '$idunik', `kodearea` = '$kodearea', `nourut` = '$nourut', `jabatan` = '$jabatan', `departement` = '$departement', `title` = '$title' WHERE `mitra`.`id_mitra` = '$id_mitra';");
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
                                <h4 class="title">Edit Profile</h4>
                            </div>
                            <div class="content">
                                <form id="form"action="index.php" enctype="multipart/form-data"  method="post" name="postform">
								
<input type="hidden" name="tanggal"value="<?php echo date('d-m-Y h:i:s'); ?>"/>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Register As</label>
                                                <input type="text" class="form-control" name="sebagai" readonly placeholder="Register as" value="<?php echo $rows['sebagai']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Departement</label>
                                                <input type="text" class="form-control" name="departement" readonly placeholder="departement" value="<?php echo $rows['departement']; ?>">
                                            </div>
                                        </div>
										<div class="col-md-3">
                                            <div class="form-group">
                                                <label>Your position</label>
                                                <input type="text" class="form-control" name="jabatan" placeholder="Position" value="<?php echo $rows['jabatan']; ?>">
                                             </div>
                                        </div>
                               		<div class="col-md-3">
                                            <div class="form-group">
                                                <label>Male/Female</label>
                                                <input type="text" class="form-control" name="kelamin" readonly placeholder="sex" value="<?php echo $rows['kelamin']; ?>">
                                             </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                       <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Title</label>
                                                <input type="text" class="form-control" name="title" placeholder="Title (Mr./Mrs.)" value="<?php echo $rows['title']; ?>">
                                            </div>
                                        </div>
										<div class="col-md-3">
                                            <div class="form-group">
                                                <label>Full name</label>
                                                <input type="text" class="form-control" name="nama_mitra" placeholder="Full name" value="<?php echo $rows['nama_mitra']; ?>">
                                             </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email address</label>
                                                <input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo $rows['mitra_email']; ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
									 <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Identity number</label>
                                                <input type="text" name="no_ktp" readonly class="form-control" placeholder="no_ktp" value="<?php echo $rows['no_ktp']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Address</label>
                                                <input type="text" class="form-control" name="alamat" placeholder="Home Address" value="<?php echo $rows['alamat']; ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>City</label>
                                                <input type="text" name="kota" class="form-control" placeholder="City" value="<?php echo $rows['kota']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>State</label>
                                                <input type="text" name="kecamatan" class="form-control" placeholder="State" value="<?php echo $rows['kecamatan']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Province</label>
                                                <input type="text" name="propinsi" class="form-control" placeholder="Province" value="<?php echo $rows['propinsi']; ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
									<div class="col-md-12">
                                            <div class="form-group">
                                                <label>Password (must be input)</label>
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
									
<input type="hidden" name="id_mitra" value="<?php echo $rows['id_mitra']; ?>" />
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
                                    <img class="avatar border-gray" src="../../foto_mitra/<?php echo $rows['foto_mitra'];?>" alt="..."/>
									<input style="border:1px solid grey;padding:10px;width:100%" ID="FileUpload1" onchange="IsFileSelected()" type="file" name="foto_mitra" size="999999" required="required">

                                      <h4 class="title"><?php echo $rows['title'];?> <?php echo $rows['nama_mitra'];?><br />
                                         <small><?php echo $rows['mitra_email'];?></small>
                                      </h4>
                                    </a>
                                </div>
                                <p class="description text-center"> "Departement <?php echo $rows['departement'];?><br>
                                                    as <?php echo $rows['jabatan'];?>"
                                </p>

                                </form>
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
                    &copy; <script>document.write(new Date().getFullYear())</script> RIDERKO
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
