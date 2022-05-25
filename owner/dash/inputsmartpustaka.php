
<head>
<meta charset="UTF-8"/><meta http-equiv="X-UA-Compatible"content="IE=edge,chrome=1">
<meta name="viewport"content="width=device-width, initial-scale=1.0">
<style type="text/css">ul{padding:0;list-style:none}ul li{display:inline-block;position:relative;line-height:21px;text-align:left}ul li a{display:block;padding:8px 25px;color:#444;text-decoration:none}ul li a:hover{color:#red}ul li ul.dropdown{min-width:100%;background-color:#FFF;display:none;position:absolute;z-index:999;left:0;top:35px;border:1px solid grey}ul li:hover ul.dropdown{display:block}ul li ul.dropdown li{display:block}</style>
</head><body onkeydown="javascript:if(window.event.keyCode==13)window.event.keyCode=9">
<div id="home"class="panel"style="color:"><div class="content">
<?php
include_once("../dbconnect.php");
if(isset($_POST['tambah'])) {	
if (empty($_POST['judulsmartpustaka'])) {
   ?>
<script>window.alert("pengisian Gagal!!,Lengkapi kolom yang kosong..");document.location.href="index.php";</script><?php
  return false;
}
if (empty($_POST['idkategori'])) {
   ?>
<script>window.alert("pengisian Gagal!!,Lengkapi kolom yang kosong..");document.location.href="index.php";</script><?php
  return false;
}if (empty($_POST['urlsmartpustaka'])) {
   ?>
<script>window.alert("pengisian Gagal!!,Lengkapi kolom yang kosong..");document.location.href="index.php";</script><?php
  return false;
}
$namabank = $_POST['namabank'];
$jambuka = $_POST['jambuka'];
$norek = $_POST['norek'];
$namaorang = $_POST['namaorang'];
$result = mysqli_query($mysqli, "INSERT INTO `smartpustaka` (`idsmartpustaka`, `judulsmartpustaka`, `tahunsmartpustaka`, `penulissmartpustaka`, `penerbitsmartpustaka`, `shortsmartpustaka`, `urlsmartpustaka`, `point`, `idkategori`, `edisibuku`, `halamanbuku`) VALUES (NULL, '".$_POST['judulsmartpustaka']."', '".$_POST['tahunsmartpustaka']."', '".$_POST['penulissmartpustaka']."', '".$_POST['penerbitsmartpustaka']."', '".$_POST['shortsmartpustaka']."', '".$_POST['urlsmartpustaka']."', '1', '".$_POST['idkategori']."', '".$_POST['edisibuku']."', '".$_POST['halamanbuku']."');");?>
<script>document.location.href="smartpustaka.php";</script><?php } ?>


    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>


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
	
        <div class="content" style="padding:10px;">
            <div class="container-fluid">
                <div class="row" style="margin-left:0;margin-right:0;">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Tambah Data Smart Pustaka</h4>
                            </div>
                            <div class="content">
                                <form id="form"action="<?php echo $_SERVER['PHP_SELF']?>"method="post" style="padding:10px;">
                                    <div class="row">
                                     
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Nama Penulis</label>
                                                <input type="text" class="form-control" name="penulissmartpustaka" required placeholder="Nama Penulis">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Penerbit</label>
                                                <input type="text" name="penerbitsmartpustaka" class="form-control" placeholder="Penerbit">
                                            </div>
                                        </div>
								<div class="col-md-6">
                                            <div class="form-group">
                                                <label>Kategori</label><br>
                                                <select style="background:#ffff" name="idkategori" > 
    <?php
session_start();
include_once '../dbconnect.php';
		$get=mysqli_query($mysqli, "SELECT * FROM kategoripustaka");
            while($jim = mysqli_fetch_assoc($get))
            {
            ?>
            <option name="idkategori" style="color:grey"value="<?php echo $jim['id'];?>" >
                <b style="color:grey"><?php echo $jim['namalapangan']; ?></b>
            </option>
            <?php
            }               
        ?>
         </select>  </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Tahun</label>
                                                <input type="number" name="tahunsmartpustaka" class="form-control" placeholder="Tahun terbit">
                                            </div>
                                        </div>
   <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Judul Buku</label>
                                                <input type="text" name="judulsmartpustaka" class="form-control" required placeholder="Judul buku">
                                            </div>
											
											                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Edisi Buku</label>
                                                <input type="text" name="edisibuku" class="form-control" placeholder="Edisi / seri buku">
                                            </div>
                                        </div>
   <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Halaman</label>
                                                <input type="number" name="halamanbuku" class="form-control" required placeholder="Berapa lembar? buku">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Url website (berisi materi)</label>
                                                <input type="text" name="urlsmartpustaka" class="form-control" required placeholder="misal https://gramedia.com/namabuku">
                                            </div>
                                        </div>                                        
										<div class="col-md-12">
                                            <div class="form-group">
                                                <label>Deskripsi Singkat</label>
                                                <textarea type="text" name="shortsmartpustaka" class="form-control" required></textarea>
                                            </div>
                                        </div>
                                    </div>

                                                <input type="hidden" name="point" class="form-control">
                                    <button type="submit"name="tambah" class="btn btn-info btn-fill pull-right">Simpan</button>
                                    <br><br>
                                    </div>

                              
                                   <div class="clearfix"></div>
                                </form>
                            </div>
							
						<center>
						
<a href="smartpustaka.php"style="color:orange">Batal input data</a><br><br>
						</center>
                        </div>
                    </div>
				</div>
			</div>
		</div>
	</body>