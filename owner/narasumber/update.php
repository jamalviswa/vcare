   <body> 
    <?php
	include_once("../dbconnect.php");
$id = $_GET['id'];
	$query=mysqli_fetch_array(mysqli_query($mysqli, "select * from users where id='$id'"));
	$id=$query['id'];
	$first_name = $query['first_name'];
	$no_ktp = $query['no_ktp'];
	$kelamin = $query['kelamin'];
	$lat = $query['lat'];
	$lng = $query['lng'];
	$phone = $query['phone'];
	$status = $query['status'];
	$akses = $query['akses'];
	$password= $query['password'];
	$email = $query['email'];
	$saldo = $query['saldo'];
	$tipeuser = $query['tipeuser'];
	$noktp = $query['noktp'];
	$fotouser = $query['fotouser'];
	$fotoktp = $query['fotoktp'];
	$fotoselfi = $query['fotoselfi'];
	$afiliasi = $query['afiliasi'];
	$shareafiliasi = $query['shareafiliasi'];
	$pembelian = $query['pembelian'];
	
	
	$nomoUSD langgan = $query['nomoUSD langgan'];
	$telpkantor = $query['telpkantor'];
	$faxkantor = $query['faxkantor'];
	$npwp = $query['npwp'];
	$alamatkantor1 = $query['alamatkantor1'];
	$alamatkantor2 = $query['alamatkantor2'];
	$alamatkantor3 = $query['alamatkantor3'];
	$alamatkantor4 = $query['alamatkantor4'];
	$coUSD ratename = $query['coUSD ratename'];
	$brandcoUSD rate = $query['brandcoUSD rate'];
	?>
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
<form style="padding:20px;" id="form"action="simpanupdate.php" enctype="multipart/form-data"  method="post" name="postform">
<input style="width:100%;padding:5px"type="hidden" name="lat" value="<?php echo $lat;?>" />
<input style="width:100%;padding:5px"type="hidden" name="lng" value="<?php echo $lng;?>" />
<input style="width:100%;padding:5px"type="hidden" name="id" value="<?php echo $id;?>" />
<input style="width:100%;padding:5px"type="hidden" name="fotoktp" value="<?php echo $fotoktp?>" />
<input style="width:100%;padding:5px"type="hidden" name="fotoselfi" value="<?php echo $fotoselfi?>" />
<input style="width:100%;padding:5px"type="hidden" name="password" value="<?php echo $query['password'];?>" />
<center><h2>Ubah data Pelanggan</h2></center>
<table style="padding:20px;">

<tr>
<td style="padding:10px;width:30%;background:#dadada">Foto KTP<br>
<?php if($res['fotoktp']=='0')
      {
echo "<img width=100px src=../icon/nopic.png> </img>";
		  }
		  else {?>
<img src="../foto_mitra/<?php echo $fotoktp;?>" style="width:100px"/>
		 <?php } ?></td>
<td style="padding:10px;width:70%;background:#fffbc9">Ganti Foto KTP<br><input style="width:100%;padding:5px"type="file" name="fotoktp" size="999999" value="<?php echo $foto_mitra;?>"/></td>
</tr>
<tr>
<td style="padding:10px;width:30%;background:#dadada">Foto Profile<br>
<?php if($res['fotoktp']=='0')
      {
echo "<img width=100px src=../icon/nopic.png> </img>";
		  }
		  else {?>
<img src="../foto_mitra/<?php echo $fotoselfi;?>" style="width:100px"/>
		 <?php } ?></td>
<td style="padding:10px;width:70%;background:#fffbc9">Ganti Foto Profile<br><input style="width:100%;padding:5px"type="file" name="fotoselfi" size="999999" value="<?php echo $foto_mitra;?>"/></td>
</tr>
<tr>
<td style="padding:10px;width:30%;background:#dadada">Nama Customer</td>
<td style="padding:10px;width:70%;background:#fffbc9"><input style="width:100%;padding:5px"type="text" name="first_name"required="required" value="<?php echo $first_name;?>"></td>
</tr>
<tr>
<td style="padding:10px;width:30%;background:#dadada">Nama Perusahaan</td>
<td style="padding:10px;width:70%;background:#fffbc9"><input style="width:100%;padding:5px"type="text" name="coUSD ratename"required="required" value="<?php echo $coUSD ratename;?>"></td>
</tr>
<tr>
<td style="padding:10px;width:30%;background:#dadada">Brand CoUSD rate (Brand)</td>
<td style="padding:10px;width:70%;background:#fffbc9"><input style="width:100%;padding:5px"type="text" name="brandcoUSD rate"required="required" value="<?php echo $brandcoUSD rate;?>"></td>
</tr>
<tr>
<td style="padding:10px;width:30%;background:#dadada">Nomor Pelanggan</td>
<td style="padding:10px;width:70%;background:#fffbc9"><input style="width:100%;padding:5px"type="text" name="nomoUSD langgan"required="required" value="<?php echo $nomoUSD langgan;?>"></td>
</tr>
<tr>
<td style="padding:10px;width:30%;background:#dadada">Nomor KTP</td>
<td style="padding:10px;width:70%;background:#fffbc9"><input style="width:100%;padding:5px"type="number" name="noktp"required="required" value="<?php echo $noktp;?>"></td>
</tr>
<tr>
<td style="padding:10px;width:30%;background:#dadada">Nomor NPWP</td>
<td style="padding:10px;width:70%;background:#fffbc9"><input style="width:100%;padding:5px"type="number" name="npwp"required="required" value="<?php echo $noktp;?>"></td>
</tr>
<tr>
<td style="padding:10px;width:30%;background:#dadada">Nomor Telepon Kantor</td>
<td style="padding:10px;width:70%;background:#fffbc9"><input style="width:100%;padding:5px"type="number" name="telpkantor"required="required" value="<?php echo $telpkantor;?>"></td>
</tr>
<tr>
<td style="padding:10px;width:30%;background:#dadada">Fax Kantor</td>
<td style="padding:10px;width:70%;background:#fffbc9"><input style="width:100%;padding:5px"type="number" name="faxkantor"required="required" value="<?php echo $faxkantor;?>"></td>
</tr>
<tr>
<td style="padding:10px;width:30%;background:#dadada">Alamat Kantor</td>
<td style="padding:10px;width:70%;background:#fffbc9">
<input style="width:100%;padding:5px"type="text" name="alamatkantor1"required="required" placeholder="Alamat Jl." value="<?php echo $alamatkantor1;?>"><br>
<input style="width:100%;padding:5px"type="text" name="alamatkantor2"required="required" placeholder="Nomor Bangunan, Lantai, dll" value="<?php echo $alamatkantor2;?>"><br>
<input style="width:100%;padding:5px"type="text" name="alamatkantor3"required="required" placeholder="Kota - Provinsi" value="<?php echo $alamatkantor3;?>"><br>
<input style="width:100%;padding:5px"type="text" name="alamatkantor4"required="required" placeholder="Country" value="<?php echo $alamatkantor4;?>"><br>
</td>
</tr>
<tr>
<td style="padding:10px;width:30%;background:#dadada">Aktifkan akun user <?php echo $first_name;?> :</td>
<td style="padding:10px;width:70%;background:#fffbc9">
<select name="akses">
<option name="akses" value="<?php echo $akses?>">-Pilihan status-</option>
<option name="akses"value="1">Nonaktifkan</option>
<option name="akses"value="0">Verifikasi</option>
</select></td>
      <td ><p></p></td>
    </tr>
<tr>
<td style="padding:10px;width:30%;background:#dadada">Email</td>
<td style="padding:10px;width:70%;background:#fffbc9"><input style="width:100%;padding:5px"type="email" name="email"required="required" value="<?php echo $email;?>"></td>
</tr>
<?php
if($dokumen=='admin')
      { ?>
<script>document.location.href="upadateadmin.php?id=<?php echo $id; ?>";</script>	  
	<?php
} else {?>
<tr>
<td style="padding:10px;width:30%;background:#dadada">Password</td>
<td style="padding:10px;width:70%;background:#fffbc9"><input style="width:100%;padding:5px"type="hidden" name="sipas"value="<?php echo $password;?>"> Password users tidak bisa diubah oleh Admin
</tr>
<?php } ?>
    <tr>
      <td style="padding:10px;width:30%;background:#dadada">
<center><a href="index.php"><div style="background:red;width:200px;border:none;padding:10px;width:90%;color:#fff" class="testbutton">Batal</div></a>
</center> </td>
      <td style="padding:10px;width:30%;background:#dadada">
	  <center><button style="background:green;width:200px;border:none;padding:10px;width:90%;color:#fff" class="testbutton" type="submit" name="kirim" value="Simpan Data">Simpan Data</button></center>
	  </td>
      <td>
	  &nbsp;</td>
    </tr>
    </table>
    </form>
    <p><br /></p></body>