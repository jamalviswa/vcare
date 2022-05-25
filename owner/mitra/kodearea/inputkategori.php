
<head>
<meta charset="UTF-8"/><meta http-equiv="X-UA-Compatible"content="IE=edge,chrome=1">
<meta name="viewport"content="width=device-width, initial-scale=1.0">
<style type="text/css">ul{padding:0;list-style:none}ul li{display:inline-block;position:relative;line-height:21px;text-align:left}ul li a{display:block;padding:8px 25px;color:#444;text-decoration:none}ul li a:hover{color:#red}ul li ul.dropdown{min-width:100%;background-color:#FFF;display:none;position:absolute;z-index:999;left:0;top:35px;border:1px solid grey}ul li:hover ul.dropdown{display:block}ul li ul.dropdown li{display:block}</style>
</head><body onkeydown="javascript:if(window.event.keyCode==13)window.event.keyCode=9">
<div id="home"class="panel"style="color:"><div class="content">
<?php
include_once("../dbconnect.php");
if(isset($_POST['tambah'])) {	
if (empty($_POST['departement'])) {
   ?>
<script>window.alert("pengisian Gagal!!,Lengkapi kolom yang kosong..");document.location.href="index.php";</script><?php
  return false;
}
if (empty($_POST['keterangandepartement'])) {
   ?>
<script>window.alert("pengisian Gagal!!,Lengkapi kolom yang kosong..");document.location.href="index.php";</script><?php
  return false;
}if (empty($_POST['kapasitasdepartement'])) {
   ?>
<script>window.alert("pengisian Gagal!!,Lengkapi kolom yang kosong..");document.location.href="index.php";</script><?php
  return false;
}
$keterangandepartement = $_POST['keterangandepartement'];
$kapasitasdepartement = $_POST['kapasitasdepartement'];
$departement = $_POST['departement'];
$notifikasi = $_POST['notifikasi'];
$topup = $_POST['topup'];
$payment = $_POST['payment'];
$user = $_POST['user'];
$narasumber = $_POST['narasumber'];
$admin = $_POST['admin'];
$voucher = $_POST['voucher'];
$bank = $_POST['bank'];
$client = $_POST['client'];
$result = mysqli_query($mysqli, "INSERT INTO departement(keterangandepartement, kapasitasdepartement, departement, notifikasi, topup, payment, user, narasumber, admin, voucher, bank, client) VALUES('$keterangandepartement', '$kapasitasdepartement', '$departement', '$notifikasi', '$topup', '$payment', '$user', '$narasumber', '$admin', '$voucher', '$bank', '$client')");?>
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
                                <h4 class="title">Tambah Departement</h4>
                            </div>
                            <div class="content">
                                <form id="form"action="<?php echo $_SERVER['PHP_SELF']?>"method="post" style="padding:10px;">
                                    <div class="row">
                                     
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Departement</label>
                                                <input type="text" class="form-control" name="departement" placeholder="Nama Departement">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Kapasitas orang</label>
                                                <input type="number" name="kapasitasdepartement" class="form-control" placeholder="Kapasitas">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Deskripsi/Keterangan</label>
                                                <textarea rows="5" name="keterangandepartement" class="form-control" placeholder="Deskripsi/job" value=""></textarea>
                                            </div>
                                        </div>
                                    </div>
									<div class="row">
<div class="header">
<center><b><small>Pengaturan akses menu</small></b></center>
                            </div><br>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Akses Notifikasi</label>
<select style="padding:10px;width:100%" class="form-control" name="notifikasi"required=required>
<option name="notifikasi" value="ya">Ya</option>
<option name="notifikasi"value="tidak">Tidak</option>
</select>
                                            </div>
                                        </div>	
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Akses Menu Topup/withdraw</label>
<select style="padding:10px;width:100%" class="form-control" name="topup"required=required>
<option name="topup" value="ya">Ya</option>
<option name="topup"value="tidak">Tidak</option>
</select>
                                            </div>
                                        </div>		
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Akses Menu Transaksi</label>
<select style="padding:10px;width:100%" class="form-control" name="payment"required=required>
<option name="payment" value="ya">Ya</option>
<option name="payment"value="tidak">Tidak</option>
</select>
                                            </div>
                                        </div>	
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Akses data User</label>
<select style="padding:10px;width:100%" class="form-control" name="user"required=required>
<option name="user" value="ya">Ya</option>
<option name="user"value="tidak">Tidak</option>
</select>
                                            </div>
                                        </div>	
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Akses Data Driver</label>
<select style="padding:10px;width:100%" class="form-control" name="narasumber"required=required>
<option name="narasumber" value="ya">Ya</option>
<option name="narasumber"value="tidak">Tidak</option>
</select>
                                            </div>
                                        </div>	
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Akses Data Tarif per Km</label>
<select style="padding:10px;width:100%" class="form-control" name="client"required=required>
<option name="client" value="ya">Ya</option>
<option name="client"value="tidak">Tidak</option>
</select>
                                            </div>
                                        </div>										
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Akses data Admin/Mitra</label>
<select style="padding:10px;width:100%" class="form-control" name="admin"required=required>
<option name="admin" value="ya">Ya</option>
<option name="admin"value="tidak">Tidak</option>
</select>
                                            </div>
                                        </div>	
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Akses Menu Voucher</label>
<select style="padding:10px;width:100%" class="form-control" name="voucher"required=required>
<option name="voucher" value="ya">Ya</option>
<option name="voucher"value="tidak">Tidak</option>
</select>
                                            </div>
                                        </div>	
			                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Akses Pengaturan Rekening Bank</label>
<select style="padding:10px;width:100%" class="form-control" name="bank"required=required>
<option name="bank" value="ya">Ya</option>
<option name="bank"value="tidak">Tidak</option>
</select>
                                            </div>
                                        </div>								
										
									
							</div>
                                    <button type="submit"name="tambah" class="btn btn-info btn-fill pull-right">Simpan</button>
                                    <br><br>
                                    </div>

                              
                                  
                                </form>
							
						<center>
						 <div class="clearfix"></div>
<a href="index.php"style="color:orange">Batal input data</a><br><br>
						</center>
                            </div>
                        </div>
                    </div>
				</div>
			</div>
		</div>
	</body>