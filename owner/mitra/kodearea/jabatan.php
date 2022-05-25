
<head>
<meta charset="UTF-8"/><meta http-equiv="X-UA-Compatible"content="IE=edge,chrome=1">
<meta name="viewport"content="width=device-width, initial-scale=1.0">
<link rel="stylesheet"href="../../../themes/base/jquery.ui.all.css">
<script src="../../../jquery.ui.addresspicker.js"></script>
<link rel="stylesheet"type="text/css"href="../../../demo.css"/>
<link rel="stylesheet"href="../../../dist/ladda.min.css">
<link rel="stylesheet"href="../../../css/bemo.css">
<style type="text/css">ul{padding:0;list-style:none}ul li{display:inline-block;position:relative;line-height:21px;text-align:left}ul li a{display:block;padding:8px 25px;color:#444;text-decoration:none}ul li a:hover{color:#red}ul li ul.dropdown{min-width:100%;background-color:#FFF;display:none;position:absolute;z-index:999;left:0;top:35px;border:1px solid grey}ul li:hover ul.dropdown{display:block}ul li ul.dropdown li{display:block}</style>
</head><body onkeydown="javascript:if(window.event.keyCode==13)window.event.keyCode=9">
<div id="home"class="panel"style="color:"><div class="content">
<?php
include_once("../dbconnect.php");
if(isset($_POST['tambah'])) {	
if (empty($_POST['jabatan'])) {
   ?>
<script>window.alert("pengisian Gagal!!,Lengkapi kolom yang kosong..");document.location.href="index.php";</script><?php
  return false;
}
if (empty($_POST['keteranganjabatan'])) {
   ?>
<script>window.alert("pengisian Gagal!!,Lengkapi kolom yang kosong..");document.location.href="index.php";</script><?php
  return false;
}if (empty($_POST['kapasitasjabatan'])) {
   ?>
<script>window.alert("pengisian Gagal!!,Lengkapi kolom yang kosong..");document.location.href="index.php";</script><?php
  return false;
}
$keteranganjabatan = $_POST['keteranganjabatan'];
$kapasitasjabatan = $_POST['kapasitasjabatan'];
$jabatan = $_POST['jabatan'];
$result = mysqli_query($mysqli, "INSERT INTO jabatan(keteranganjabatan, kapasitasjabatan, jabatan) VALUES('$keteranganjabatan', '$kapasitasjabatan', '$jabatan')");?>
<script>document.location.href="index.php";</script><?php } ?>


    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>


    <!-- Bootstrap core CSS     -->
    <link href="../../assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="../../assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="../../assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>


    <!--  CSS for Demo PuUSD se, don't include it in your project     -->
    <link href="../../assets/css/demo.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="../../assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
</head>
<body>
	
        <div class="content" style="padding:10px;">
            <div class="container-fluid">
                <div class="row" style="margin-left:0;margin-right:0;">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Tambah jabatan</h4>
                            </div>
                            <div class="content">
                                <form id="form"action="<?php echo $_SERVER['PHP_SELF']?>"method="post" style="padding:10px;">
                                    <div class="row">
                                     
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>jabatan</label>
                                                <input type="text" class="form-control" name="jabatan" placeholder="Nama jabatan">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Kapasitas</label>
                                                <input type="number" name="kapasitasjabatan" class="form-control" placeholder="Kapasitas">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Deskripsi/Keterangan</label>
                                                <textarea rows="5" name="keteranganjabatan" class="form-control" placeholder="Deskripsi/job" value=""></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit"name="tambah" class="btn btn-info btn-fill pull-right">Simpan</button>
                                    <br><br>
                                    </div>

                              
                                   <div class="clearfix"></div>
                                </form>
                            </div>
							
						<center>
						
<a href="index.php"style="color:orange">Batal input data</a><br><br>
						</center>
                        </div>
                    </div>
				</div>
			</div>
		</div>
	</body>