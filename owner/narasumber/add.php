<?php
session_start();
include_once '../dbconnect.php';

if(!isset($_SESSION['mitra']))
{
	header("Location: ../index.php");
}
$res=mysqli_query($mysqli, "SELECT * FROM mitra WHERE id_mitra=".$_SESSION['mitra']);
$rows=mysqli_fetch_array($res);
?>
<?php

if(isset($_POST['submit']))
{
	
	$uname = mysqli_real_escape_string($mysqli, $_POST['uname']);
	$last_name = mysqli_real_escape_string($mysqli, $_POST['last_name']);
	$email = mysqli_real_escape_string($mysqli, $_POST['email']);
	$upass = md5(mysqli_real_escape_string($mysqli, $_POST['upass']));
	$kelamin = mysqli_real_escape_string($mysqli, $_POST['kelamin']);
	$noktp = mysqli_real_escape_string($mysqli, $_POST['noktp']);
	$created = mysqli_real_escape_string($mysqli, $_POST['created']);
	$modified = mysqli_real_escape_string($mysqli, $_POST['modified']);
	$picture = mysqli_real_escape_string($mysqli, $_POST['picture']);
	$saldo = mysqli_real_escape_string($mysqli, $_POST['saldo']);
	$pembelian = mysqli_real_escape_string($mysqli, $_POST['pembelian']);
	$agama = mysqli_real_escape_string($mysqli, $_POST['agama']);
	$phone = mysqli_real_escape_string($mysqli, $_POST['phone']);
	$tempatlahir = mysqli_real_escape_string($mysqli, $_POST['tempatlahir']);
	$tgllahir = mysqli_real_escape_string($mysqli, $_POST['tgllahir']);
	$pengalaman = mysqli_real_escape_string($mysqli, $_POST['pengalaman']);
	$alamat1 = mysqli_real_escape_string($mysqli, $_POST['alamat1']);
	$kota = mysqli_real_escape_string($mysqli, $_POST['kota']);
	$provinsi = mysqli_real_escape_string($mysqli, $_POST['provinsi']);
	$pendidikan = mysqli_real_escape_string($mysqli, $_POST['pendidikan']);
	$profesi = mysqli_real_escape_string($mysqli, $_POST['profesi']);
	$jabatan = mysqli_real_escape_string($mysqli, $_POST['jabatan']);
	$pendapatan = mysqli_real_escape_string($mysqli, $_POST['pendapatan']);
	$statusnikah = mysqli_real_escape_string($mysqli, $_POST['statusnikah']);
	$sebagai = mysqli_real_escape_string($mysqli, $_POST['sebagai']);
	$almamater = mysqli_real_escape_string($mysqli, $_POST['almamater']);
	$ahlibidang = mysqli_real_escape_string($mysqli, $_POST['ahlibidang']);
	$online = mysqli_real_escape_string($mysqli, $_POST['online']);
	$kunci = mysqli_real_escape_string($mysqli, $_POST['kunci']);
	$lat = mysqli_real_escape_string($mysqli, $_POST['lat']);
	$lng = mysqli_real_escape_string($mysqli, $_POST['lng']);
	$noktp = trim($noktp);
	$email = trim($email);
	$upass = trim($upass);
	
	// email exist or not
	$query = "SELECT mitra_email FROM mitra WHERE mitra_email='$email'";
	$result = mysqli_query($mysqli, $query);
	
	$count = mysqli_num_rows($result); // if email not found then register
	
	
	if($count == 0){
		
	$picture = $_POST['picture'];
	if(empty($_FILES['picture']['name'])){
		$picture=$_POST['picture'];
	}else{
		$picture=$_FILES['picture']['name'];
		//definisikan variabel file dan kendaraan file
		$uploaddir='../../foto_mitra/';
		$kendaraanfile=$uploaddir.$picture;
		//periksa jika proses upload berjalan sukses
		$upload=move_uploaded_file($_FILES['picture']['tmp_name'],$kendaraanfile);
	}
	
$dokumen = $_POST['dokumen'];
	if(empty($_FILES['dokumen']['name'])){
		$dokumen=$_POST['dokumen'];
	}else{
		$dokumen=$_FILES['dokumen']['name'];
		//definisikan variabel file dan kendaraan file
		$jumpakj='../../foto_mitra/';
		$limes=$jumpakj.$dokumen;
		//periksa jika proses upload berjalan sukses
		$rupso=move_uploaded_file($_FILES['dokumen']['tmp_name'],$limes);
	}
	
		if(mysqli_query($mysqli, "INSERT INTO `users` (`id`, `oauth_provider`, `oauth_uid`, `first_name`, `last_name`, `picture`, `link`, `created`, `modified`, `email`, `password`, `forgot_pass_identity`, `saldo`, `pembelian`, `noktp`, `tempatlahir`, `tgllahir`, `kelamin`, `agama`, `alamat1`, `kota`, `provinsi`, `pendidikan`, `profesi`, `jabatan`, `pendapatan`, `statusnikah`, `phone`, `kunci`, `pengalaman`, `almamater`, `ahlibidang`, `sebagai`, `online`, `lat`, `lng`, `jenistransportasi`) VALUES (NULL, '', '', '$uname', '$last_name', '$picture', '$link', '2019-02-01 00:00:00', '2019-02-08 00:00:00', '$email', '$upass', '$forgot_pass_identity', '0', '0', '$noktp', '$tempatlahir', '$tgllahir', '$kelamin', '$agama', '$alamat1', '$kota', '$provinsi', '$pendidikan', '$profesi', '$jabatan', '$pendapatan', '$statusnikah', '$phone', '0', '$pengalaman', '$almamater', '$ahlibidang', 'driver', 'online', '$lat', '$lng', '$jenistransportasi');"))
		{
			?>
	<script>document.location.href="index.php";</script>
			<?php
		}
		else
		{
			?><div style="color: #F0;">Server Sibuk,Coba Ulangi</div><?php
		}		
	}
	else{
			?><div style="color: #F0;">ID has ben registered</div><?php
	}
	
}
?>
<html>
<head>
	<title>Add Data</title>
</head>
<body style="font-family:Segoe UI;margin-left:70px;margin-right:70px">
<center><b style="padding:10px;color:#ffa500">Add Data Technician</b></center><br>
<form id="form"action="add.php" enctype="multipart/form-data"  method="post" name="postform">

<table style="width:100%;padding:10px">
  <tr style="padding:10px">
    <th colspan="4" style="padding:10px"></th>
  </tr>
  <tr>
  <td style="padding:10px;background:#dadada">Religion</td>
    <td>
<select style="padding:10px;width:100%" name="agama"required=required>
<option value="">-choose-</option>
<option name="agama"value="Islam">Islam</option>
<option name="agama"value="Kristen Katolik">Catholic</option>
<option name="agama"value="Kristen Protestan">Christian</option>
<option name="agama"value="Budha">Budha</option>
<option name="agama"value="shinto">shinto</option>
</select></td>
  <td style="padding:10px;background:#dadada">Sex</td>
    <td>
	<select style="padding:10px;width:100%" name="kelamin"required=required>
<option name="kelamin" value="">-choose-</option>
<option name="kelamin"value="male">male</option>
<option name="kelamin"value="female">female</option>
</select></td>  </tr>
      <tr>

<td style="padding:10px;background:#dadada">Brand vehicle & model</td>
    <td><small>choose vehicle</small><br>
<select name="jenistransportasi"required=required>
<option name="jenistransportasi"value="motorcycle">Motorcycle</option>
<option name="jenistransportasi"value="car">car</option>
<option name="jenistransportasi"value="Cargo box">Cargo</option>
<option name="jenistransportasi"value="food">Delivery food</option>
</select><br><input style="padding:10px;width:100%" placeholder="Merk/type" type="text" name="ahlibidang"required="required"></td>
<td style="padding:10px;background:#dadada">Vehicle ID</td>
    <td><input style="padding:10px;width:100%"type="text" name="jabatan"required="required"></td>
  </tr>
  <tr>
    <td style="padding:10px;background:#dadada">first name</td>
    <td><input style="padding:10px;width:100%"type="text" placeholder="First name" name="uname"required="required"></td>
    <td style="padding:10px;background:#dadada">Last name</td>
    <td><input style="padding:10px;width:100%"type="text" placeholder="Last name" name="last_name"required="required"></td>
  </tr>
  <tr>
    <td style="padding:10px;background:#dadada">adress</td>
    <td><input style="padding:10px;width:100%"type="text" placeholder="adress" name="alamat1"required="required"></td>
	<td style="padding:10px;background:#dadada">Nationality number</td>
    <td><input style="padding:10px;width:100%"type="number" placeholder="ID nationality" name="noktp"required="required"></td>
  </tr>  
    <tr>
    <td style="padding:10px;background:#dadada">City</td>
    <td><input style="padding:10px;width:100%"type="text" name="kota"required="required"></td>
    <td style="padding:10px;background:#dadada">Province</td>
    <td><input style="padding:10px;width:100%"type="text" name="provinsi"required="required"></td>
  </tr>
   <tr>
    <td style="padding:10px;background:#dadada">City Born</td>
    <td><input style="padding:10px;width:100%"type="text" name="tempatlahir"required="required"></td>
	<td style="padding:10px;background:#dadada">Birth date</td>
    <td><input style="padding:10px;width:100%"type="date" name="tgllahir"required="required"></td>
  </tr>  
    <tr>
    <td style="padding:10px;background:#dadada">No. Handphone</td>
    <td><input style="padding:10px;width:100%" type="number" name="phone"required="required"></td>
    <td style="padding:10px;background:#dadada">Email</td>
    <td><input style="padding:10px;width:100%"type="email" name="email"required="required"></td>
  </tr>
  </tr>
 
      <tr>
<input type="hidden" name="tanggal"value="<?php echo date('d-m-Y h:i:s'); ?>"/>
<input type="hidden" name="suspen"value="0"/>

    <td style="padding:10px;background:#dadada">profile photos</td>
    <td>

	<input style="border:1px solid grey;padding:10px;width:100%" ID="FileUpload1" onchange="IsFileSelected()" type="file" name="picture" size="999999" required="required"></td>

	<td style="padding:10px;background:#dadada">Passsword</td>
    <td><input style="padding:10px;width:100%"type="password" name="upass"required="required"></td>
  </tr>
      <tr>
    <td style="padding:10px;background:#dadada">Education<br></td>
    <td><input style="padding:10px;width:100%"type="text" placeholder="University" name="almamater"required="required"></td>
   <td style="padding:10px;background:#dadada">Certified</td>
    <td><input style="padding:10px;width:100%"type="text" placeholder=" ID Certified licence" name="pendidikan"></td>
    
  </tr>
   <tr>
    <td style="padding:10px;background:#dadada">Experience</td>
    <td><input style="padding:10px;width:100%"type="text" placeholder="Years?" name="pengalaman"></td>
    <td colspan="2"style="padding:10px;background:#dadada"><small>**agree that the data entered is correct in accordance with individual data<br>The data entered is registered into the database with the agreement of the individual data owners. If there is a change in the identity or personal data of individuals, it will be corrected through the data editing procedure in the technician application<small></td>
  </tr>

			<tr> 
			  <td>		
</td>
    <td></td><td>
<input type="hidden" name="latmitra" value="-1.943318" />
<input type="hidden" name="lngmitra" value="113.287041" />
<input name="dokumen"type="hidden"value="Belum"/>

<center><a href="index.php"><div style="background:red;width:200px;border:none;padding:10px;width:90%;color:#fff" class="testbutton">Cancel</div></a>
</center>
				</td>
				<td><center><button style="background:green;width:200px;border:none;padding:10px;width:90%;color:#fff" class="testbutton" type="submit" name="submit" value="Simpan Data">Save</button></center></td>
			</tr>
		</table>
  
		<br>
	</form>
</body>
</html>

