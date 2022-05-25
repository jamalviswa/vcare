<!doctype html>
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

<div class="wrapper">
 
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Penomoran Surat</h4>
                                <p class="category">Harap isi inputan berikut kemudian cetak surat</p>
                            </div>
                             </div>
                    </div>

                                    </div>

                  
								  <div class="row">
								  <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Tanggal Surat</label>
                                                <input type="date" class="form-control" name="tanggal" placeholder="Nomor Surat" value="<?php echo date('d-m-Y');?>">
                                             </div>
                                        </div>
				
								  <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Nomor Surat</label>
                                                <input type="number" class="form-control" name="tanggal" placeholder="Nomor Surat" value="<?php echo rand();?>">
                                             </div>
                                        </div>
										<div class="col-md-6">
                                            <div class="form-group">
                                                <label>Kode Surat</label>
                                                <input type="text" class="form-control" name="surat" placeholder="Nomor Surat" value="PR/HRD/SPK/<?php echo rand();?>">
                                             </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Nomor PKS</label>
                                                <input type="text" class="form-control" name="pks" placeholder="Nomor PKS" value="PKS/HRD/SPK/<?php echo rand();?>">
                                            </div>
                                        </div>
                                    </div>

							
                                <form id="form"action="cetak.php" enctype="multipart/form-data"  method="post" name="postform">
                                    <div class="row">
										<div class="col-md-6">
                                            <div class="form-group">
                                                <label>Kepada Yth</label>
                                                <input type="text" class="form-control" name="first_name" placeholder="Nama Lengkap" value="">
                                             </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email address</label>
                                                <input type="email" class="form-control" name="email" placeholder="Email" value="">
                                            </div>
                                        </div>
                                    </div>

                                
                                    <div class="row">
									<div class="col-md-12">
                                            <div class="form-group">
                                                <label>Alamat Kantor</label>
                                                <input type="text" name="alamatkantor1" class="form-control" placeholder="Nama Jalan" value="">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Alamat kantor 2</label>
                                                <input type="text" name="alamatkantor2" class="form-control" placeholder="nomor, lantai dll" value="">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Alamat kantor 3</label>
                                                <input type="text" name="alamatkantor3" class="form-control" placeholder="kota" value="">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Alamat kantor4</label>
                                                <input type="text" name="alamatkantor4" class="form-control" placeholder="provinsi" value="">
                                            </div>
                                        </div>
                                    </div>
                                   <div class="row">
									<div class="col-md-6">
                                            <div class="form-group">
                                                <label>Nama Perusahaan (PT/CV/UD)</label>
                                                <input type="text" class="form-control" required name="coUSD ratename" placeholder="Nama Perusaan">
                                            </div>
                                        </div>
									
									<div class="col-md-6">
                                            <div class="form-group">
                                                <label>Nama Brand (merk)</label>
                                                <input type="text" class="form-control" required name="brandcoUSD rate" placeholder="Nama Brand perusahaan">
                                            </div>
                                        </div>
                                    </div>                                   
									<div class="row">
									<div class="col-md-6">
                                            <div class="form-group">
                                                <label>Phone Kantor</label>
                                                <input type="number" class="form-control" required name="telpkantor" placeholder="Telp">
                                            </div>
                                        </div>
									
									<div class="col-md-6">
                                            <div class="form-group">
                                                <label>Fax Kantor</label>
                                                <input type="number" class="form-control" name="faxkantor" placeholder="Fax">
                                            </div>
                                        </div>
                                    </div>
   
									

                                    <button type="submit" name="submit" class="btn btn-info btn-fill pull-right">Cetak Dokumen</button>
                                    <div class="clearfix"></div>
									
                                </form>

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
