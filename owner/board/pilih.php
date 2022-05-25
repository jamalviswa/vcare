<?php
session_start();
include_once '../dbconnect.php';

if(!isset($_SESSION['mitra']))
{
	header("Location: ../index.php");
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
<body>
<div class="wrapper">
        <div class="content">
            <div class="container-fluid">
						 <div class="row">
                    <div class="col-md-8">
                        <div class="card">
						   <br><br>
<?php
include "../dbconnect.php";
if(isset($_POST['submit']))
{
	
	$first_name = mysqli_real_escape_string($mysqli, $_POST['first_name']);
	$email = mysqli_real_escape_string($mysqli, $_POST['email']);

	$nomoUSD langgan = mysqli_real_escape_string($mysqli, $_POST['nomoUSD langgan']);
	$coUSD ratename = mysqli_real_escape_string($mysqli, $_POST['coUSD ratename']);
	$brandcoUSD rate = mysqli_real_escape_string($mysqli, $_POST['brandcoUSD rate']);
	
	$date = mysqli_real_escape_string($mysqli, $_POST['date']);
	$time = mysqli_real_escape_string($mysqli, $_POST['time']);
	$callerid = mysqli_real_escape_string($mysqli, $_POST['callerid']);
	$destination = mysqli_real_escape_string($mysqli, $_POST['destination']);
	$description = mysqli_real_escape_string($mysqli, $_POST['description']);
	$durationsecond = mysqli_real_escape_string($mysqli, $_POST['durationsecond']);
	$account = mysqli_real_escape_string($mysqli, $_POST['nomoUSD langgan']);
	$pic = mysqli_real_escape_string($mysqli, $_POST['pic']);
	$tipelayanan = mysqli_real_escape_string($mysqli, $_POST['tipelayanan']);
	$nameservice = mysqli_real_escape_string($mysqli, $_POST['nameservice']);
	
	

$pesul = mysqli_query($mysqli, "SELECT * FROM kota WHERE namakota like '%".$description."%'");
$pow= mysqli_fetch_array($pesul);
$solum = mysqli_num_rows($pesul);

if ($solum=='1') {
$idzonakota=$pow['idzonakota'];
$kum = mysqli_query($mysqli, "SELECT * FROM zona WHERE idzona='$idzonakota'");
$retum= mysqli_fetch_array($kum);


$durasizona=$retum['durasizona'];
$tarifzona=$retum['tarifzona'];

if ($durationsecond<=$durasizona) {
$harga=$retum['tarifzona'];
}if ($durationsecond>$durasizona) {
$pembagian=$durationsecond/$durasizona;
$pembulatan=round($pembagian, 0);
$harga=$tarifzona*$pembulatan;
}

} 
else{
$sljj='SLJJ3';
$sur = mysqli_query($mysqli, "SELECT * FROM zona WHERE namazona like '%".$sljj."%' order by idzona limit 1");
$bur= mysqli_fetch_array($sur);

$durasizona=$bur['durasizona'];
$tarifzona=$bur['tarifzona'];
if ($durationsecond<=$durasizona) {
$harga=$bur['tarifzona'];
}if ($durationsecond>$durasizona) {
$pembagian=$durationsecond/$durasizona;
$pembulatan=round($pembagian, 0);
$harga=$tarifzona*$pembulatan;
}

} 
	
	
	$query = "SELECT * FROM billingrate WHERE date='$date' and account='$account'";
	$result = mysqli_query($mysqli, $query);
	
	$count = mysqli_num_rows($result); // if email not found then register
	
	
	if($count == 0){
		
		if(mysqli_query($mysqli, "INSERT INTO `billingrate` (`idbilling`, `date`, `time`, `callerid`, `destination`, `description`, `durationsecond`, `account`, `pic`, `harga`, `tipelayanan`, `nameservice`) VALUES (NULL, '$date', '$time', '$callerid', '$destination', '$description', '$durationsecond', '$account', '$pic', '$harga', '$tipelayanan', '$nameservice')"))
		{
		
$to = $_POST['email']; // this is your Email address
$first_name = $_POST['first_name'];
$subject = "Penggunaan Layanan";
$subject2 = "Mohon cek tagihan anda pada applikasi billing kami";
$message = "
<html><body>
Dear ".$_POST['first_name']." dari ".$_POST['coUSD ratename'].",<br>
Kami dari PT. Meissa Berkah Teknologi<br>
Baru saja Kami sampaikan Tagihan layanan anda melalui aplikasi billing admin pada url link (https://profitgm.com/.<br>
Setelah mendapatkan Pemberitahuan ini, diharapkan segera melakukan proses pembayaran Sesuai tagihan 
</body></html>
 ";
 

$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
// More headers
$headers .= 'From: <billing@profitgm.com>' . "\r\n";
$headers .= 'Cc: billing@profitgm.com' . "\r\n";        
    mail($to,$subject,$message,$headers);
    echo "Data Billing sudah ditambahkan, Email terkirim ke " . $first_name . " dengan alamat " . $email . "";

			?>
			<?php
		}
		else
		{
			?><div style="color: #F0;">Server sibuk</div><?php
		}		
	}
	else{
			?><div style="color: #F0;">Ulang input data</div><?php
	}
	
}
?>
<br><br>
<div style="margin-left:25px;"><a href="../dash/index.php"style="color:orange;padding:10px;border:1px solid orange;">Batal input data</a></div><br><br>
                            <div class="header" >
                                <h4 class="title">Input data billing</h4><small>Isi data billing kemudian klik submit</small>
                            </div>
                            <div class="content">
                                <form id="form"action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data"  method="post" name="postform">
								
<input type="hidden" name="tanggal"value="<?php echo date('d-m-Y h:i:s'); ?>"/>
                                    <div class="row">
									
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Tanggal (Date)</label>
                                                <input type="date" class="form-control" name="date" placeholder="date" value="<?php echo date('y-m-d'); ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Jam (Time)</label>
                                                <input type="time" class="form-control" name="time" placeholder="time" value="<?php echo time('HH:MM:SS'); ?>">
                                            </div>
                                        </div>
										 <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Duration (Second)</label>
                                                <input type="number" class="form-control" name="durationsecond" placeholder="Duration" value="00">
                                            </div>
                                        </div>
                                    </div>
											<div class="row">
											<div class="col-md-6">
                                            <div class="form-group">
                                                <label>Asal (Caller ID)</label>
                                                <input type="number" class="form-control" name="callerid" placeholder="Caller ID (081xxxxxx)" value="">
                                             </div>
                                        </div>
                               		<div class="col-md-6">
                                            <div class="form-group">
                                                <label>Tujuan (Destination)</label>
                                                <input type="number" class="form-control" name="destination" placeholder="Destination (081xxxxxx)" value="">
                                             </div>
                                        </div>
											</div>
											<div class="row">
											<div class="col-md-6">
                                            <div class="form-group">
                                                <label>Description</label>
                                                <input type="text" class="form-control" name="description" placeholder="Description: City Name">
                                             </div>
                                        </div>
											</div>
											
<input type="hidden" name="tipelayanan"type="text" value="TELEPHONY SERVICES"/>
<input type="hidden" name="nameservice"type="text" value="sip"/>
											<div class="header" >
<?php
$res=mysqli_query($mysqli, "SELECT * FROM users WHERE id='".$_GET['id']."'");
$rows=mysqli_fetch_array($res);
?>				
                                <h5 class="title">Data pelanggan</h5><small>Data pelanggan terisi otomatis karena sudah terdaftar</small>
                            </div>
                                    <div class="row">
										<div class="col-md-6">
                                            <div class="form-group">
                                                <label>Nama Lengkap</label>
                                                <input type="text" readonly class="form-control" name="first_name" placeholder="Nama Lengkap" value="<?php echo $rows['first_name'];?>">
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
                                                <input type="number" name="noktp" readonly class="form-control" placeholder="no ktp" value="<?php echo $rows['noktp'];?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>NPWP</label>
                                                <input type="text" class="form-control" readonly name="npwp" placeholder="NPWP" value="<?php echo $rows['npwp'];?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
									<div class="col-md-12">
                                            <div class="form-group">
                                                <label>Alamat Kantor</label>
                                                <input type="text" name="alamatkantor1" readonly class="form-control" placeholder="Nama Jalan" value="<?php echo $rows['alamatkantor1'];?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Alamat kantor 2</label>
                                                <input type="text" name="alamatkantor2" readonly class="form-control" placeholder="nomor, lantai dll" value="<?php echo $rows['alamatkantor2'];?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Alamat kantor 3</label>
                                                <input type="text" name="alamatkantor3" readonly class="form-control" placeholder="kota" value="<?php echo $rows['alamatkantor3'];?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Alamat kantor4</label>
                                                <input type="text" name="alamatkantor4" readonly class="form-control" placeholder="provinsi" value="<?php echo $rows['alamatkantor4'];?>">
                                            </div>
                                        </div>
                                    </div>
                                   <div class="row">
									<div class="col-md-6">
                                            <div class="form-group">
                                                <label>Nama Perusahaan (PT/CV/UD)</label>
                                                <input type="text" class="form-control" readonly required name="coUSD ratename" placeholder="Nama Perusaan" value="<?php echo $rows['coUSD ratename'];?>">
                                            </div>
                                        </div>
									
									<div class="col-md-6">
                                            <div class="form-group">
                                                <label>Nama Brand (merk)</label>
                                                <input type="text" class="form-control" readonly required name="brandcoUSD rate" placeholder="Nama Brand perusahaan" value="<?php echo $rows['brandcoUSD rate'];?>">
                                            </div>
                                        </div>
                                    </div>                                   
									<div class="row">
									<div class="col-md-6">
                                            <div class="form-group">
                                                <label>Phone Kantor</label>
                                                <input type="number" class="form-control" readonly required name="telpkantor" placeholder="Telp" value="<?php echo $rows['telpkantor'];?>">
                                            </div>
                                        </div>
									
									<div class="col-md-6">
                                            <div class="form-group">
                                                <label>Fax Kantor</label>
                                                <input type="number" class="form-control" readonly name="faxkantor" placeholder="Fax" value="<?php echo $rows['faxkantor'];?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
									<div class="col-md-12">
                                            <div class="form-group">
                                                <label>Nomor Pelanggan (Otomatis/custom)</label>
                                                <input type="number" class="form-control" readonly required name="nomoUSD langgan" value="<?php echo $rows['nomoUSD langgan'];?>" placeholder="nomor pelanggan">
                                            </div>
                                        </div>
									
                                    </div>
<div class="row">
									<div class="col-md-12">
                                            <div class="form-group">
                                                <label>Pilih Penanggung jawab (PIC)</label><br>
<select style="width:100%;padding:10px;background:#dadada" name="pic" > 
    <?php
session_start();
include_once '../dbconnect.php';
		$get=mysqli_query($mysqli, "SELECT * FROM mitra");
            while($jim = mysqli_fetch_assoc($get))
            {
            ?>
            <option name="pic" style="color:grey"value="<?php echo $jim['id_mitra'];?>" >
                <b style="color:grey"><?php echo $jim['title']; ?> <?php echo $jim['nama_mitra']; ?></b>, <?php echo $jim['departement']; ?> - <?php echo $jim['jabatan']; ?> | <?php echo $jim['no_ktp']; ?>
            </option>
            <?php
            }               
        ?>
         </select>                                                
												</div>
                                        </div>
									
                                    </div>

                                    <button type="submit" name="submit" class="btn btn-info btn-fill pull-right">Submit</button>
                                    <div class="clearfix"></div>
									
<input type="hidden" name="id_mitra" value="<?php echo $rows['id_mitra']; ?>" />
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-user">
                            
                            <div class="content">
                                <h4><small>Petunjuk input data billing :</small></h4>
								<table style="font-size:10px;color:grey;">
								<tr style="padding:10px;border-top:1px solid grey">
								<td width="5%" style="vertical-align:text-top">1.</td><td>Input nomor pelanggan KTP atau NPWP, jika nomor pelanggan sudah terdaftar klik hasil pencarian tersebut maka data profile pelanggan otomatis akan muncul<br>Apabila pelanggan belum terdaftar dalam sistem, silahkan menggunakan form pengisian lalu isi data lengkap pelanggan, wajib menginputkan email pelanggan untuk mengirim invoice
								</td></tr>
								<tr style="padding:10px;border-top:1px solid grey">
								<td width="5%" style="vertical-align:text-top">2.</td><td>Pilih layanan yang digunakan oleh pelanggan, deskripsi/keterangan dan input durasi pemakaian layanan
								</td></tr>
								<tr style="padding:10px;border-top:1px solid grey">
								<td width="5%" style="vertical-align:text-top">3.</td><td>Isi data penanggung jawab (PIC), Data PIC muncul setelah memilih nama PIC yang terdaftar dalam sistem
								</td></tr>
								<tr style="padding:10px;border-top:1px solid grey">
								<td width="5%" style="vertical-align:text-top">4.</td><td>Klik Submit, maka data akan disimpan dalam sistem, ditampilkan pada data Billing invoice CDR.<br><br>Data Billing invoice juga bisa ditambahkan melalui prosedur export import dengan cara klik tombol export untuk mendapatkan format tabel pengisian data, kemudian mengisi manual dan disimpan dalam file yang sama. Klik import untuk upload data
								</td></tr>
								<tr style="padding:10px;border-top:1px solid grey">
								<td width="5%" style="vertical-align:text-top">5.</td><td>Apabila pelanggan baru, pertama kali menggunakan layanan maka data login username, password dan invoice akan dikirimkan via email
								</td></tr>
								</table>
							</div>
                            <hr>
                            <div class="text-center">
                                Jangan kosongkan inputan

                            </div>
                        </div>
                    </div>

                </div>

				<br><br><br><br><br><br>
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
