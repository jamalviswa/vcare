
<head>
<meta charset="UTF-8"/><meta http-equiv="X-UA-Compatible"content="IE=edge,chrome=1">
<meta name="viewport"content="width=device-width, initial-scale=1.0">
<style type="text/css">ul{padding:0;list-style:none}ul li{display:inline-block;position:relative;line-height:21px;text-align:left}ul li a{display:block;padding:8px 25px;color:#444;text-decoration:none}ul li a:hover{color:#red}ul li ul.dropdown{min-width:100%;background-color:#FFF;display:none;position:absolute;z-index:999;left:0;top:35px;border:1px solid grey}ul li:hover ul.dropdown{display:block}ul li ul.dropdown li{display:block}</style>
</head><body onkeydown="javascript:if(window.event.keyCode==13)window.event.keyCode=9">
<div id="home"class="panel"style="color:"><div class="content">
<?php
include_once("../dbconnect.php");
if(isset($_POST['tambah'])) {	
if (empty($_POST['judulsurvey'])) {
   ?>
<script>window.alert("pengisian Gagal!!,Lengkapi kolom yang kosong..");document.location.href="index.php";</script><?php
  return false;
}
if (empty($_POST['idkategori'])) {
   ?>
<script>window.alert("pengisian Gagal!!,Lengkapi kolom yang kosong..");document.location.href="index.php";</script><?php
  return false;
}if (empty($_POST['urlsurvey'])) {
   ?>
<script>window.alert("pengisian Gagal!!,Lengkapi kolom yang kosong..");document.location.href="index.php";</script><?php
  return false;
}
$namabank = $_POST['namabank'];
$jambuka = $_POST['jambuka'];
$norek = $_POST['norek'];
$namaorang = $_POST['namaorang'];
$result = mysqli_query($mysqli, "INSERT INTO `survey` (`idsurvey`, `judulsurvey`, `tahunsurvey`, `targetkoresponden`, `jumlahkoresponden`, `tujuansurvey`, `urlsurvey`, `point`, `idkategori`) VALUES (NULL, '".$_POST['judulsurvey']."', '".$_POST['tahunsurvey']."', '".$_POST['targetkoresponden']."', '".$_POST['jumlahkoresponden']."', '".$_POST['tujuansurvey']."', '".$_POST['urlsurvey']."', '1', '".$_POST['idkategori']."');");?>
<script>document.location.href="survey.php";</script><?php } ?>


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
                                <h4 class="title">Tambah Materi/Topik Survey</h4>
								<p class="category"><small>Silahkan gunakan google form untuk membuat point quistionaire sesuai desain yang diinginkan. Login ke google form, kemudian share link dan inputkan ke kolom url survey, <br>Sistem survei ini berkolaborasi dengan google Form untuk create page dan point pertanyaan survey. <br>list google form tersebut akan ditampilkan pada aplikasi user</small></p>
                            <br><br>
								<a target="_blank" style="padding:10px;border:1px solid #09c;border-radius:10px;" href="https://docs.google.com/forms?usp=mkt_forms" style="class="btn btn-info btn-fill pull-right"">Akses Google Forms</a>
								
                            </div>
							
                            <div class="content">
                                <form id="form"action="<?php echo $_SERVER['PHP_SELF']?>"method="post" style="padding:10px;">
                                    <div class="row">
                                     
                            
								<div class="col-md-6">
                                            <div class="form-group">
                                                <label>Kategori Survey</label><br>
                                                <select style="background:#ffff" name="idkategori" > 
    <?php
session_start();
include_once '../dbconnect.php';
		$get=mysqli_query($mysqli, "SELECT * FROM jw_menu_detail");
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
                                                <input type="number" name="tahunsurvey" class="form-control" placeholder="Tahun Survey">
                                            </div>
                                        </div>
   <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Judul Survey</label>
                                                <input type="text" name="judulsurvey" class="form-control" required placeholder="Judul Survey">
                                            </div>
                                        </div>
										 <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Obyek Survey</label>
                                                <input type="text" name="targetkoresponden" class="form-control" required placeholder="Siapa obyek survey?">
                                            </div>
                                        </div> <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Jumlah Koresponden yang diinginkan</label>
                                                <input type="number" name="jumlahkoresponden" class="form-control" required placeholder="Berapa target jumlah koresponden">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Url Google Form <a href="https://support.google.com/docs/answer/6281888?hl=en&ref_topic=6063584" target="_blank">(lihat cara penggunaan!)</a></label>
                                                <input type="text" name="urlsurvey" class="form-control" required placeholder="misal https://gramedia.com/namabuku">
                                            </div>
                                        </div>                                        
										<div class="col-md-12">
                                            <div class="form-group">
                                                <label>Deskripsi Singkat Tujuan Survey</label>
                                                <textarea type="text" name="tujuansurvey" class="form-control" required></textarea>
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
						
<a href="survey.php"style="color:orange">Batal input data</a><br><br>
						</center>
                        </div>
                    </div>
				</div>
			</div>
		</div>
	</body>