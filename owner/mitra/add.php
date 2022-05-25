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
	$email = mysqli_real_escape_string($mysqli, $_POST['email']);
	$upass = md5(mysqli_real_escape_string($mysqli, $_POST['upass']));
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
	$suspen = mysqli_real_escape_string($mysqli, $_POST['suspen']);
	$idunik = mysqli_real_escape_string($mysqli, $_POST['idunik']);
	$departement = mysqli_real_escape_string($mysqli, $_POST['departement']);
	$nourut = mysqli_real_escape_string($mysqli, $_POST['nourut']);
	$jabatan = mysqli_real_escape_string($mysqli, $_POST['jabatan']);
	$departement = mysqli_real_escape_string($mysqli, $_POST['departement']);
	$title = mysqli_real_escape_string($mysqli, $_POST['title']);
	$uname = trim($uname);
	$email = trim($email);
	$upass = trim($upass);
	
	// email exist or not
	$query = "SELECT mitra_email FROM mitra WHERE mitra_email='$email'";
	$result = mysqli_query($mysqli, $query);
	
	$count = mysqli_num_rows($result); // if email not found then register
	
	
	if($count == 0){
		
	$foto_mitra = $_POST['foto_mitra'];
	if(empty($_FILES['foto_mitra']['name'])){
		$foto_mitra=$_POST['foto_mitra'];
	}else{
		$foto_mitra=$_FILES['foto_mitra']['name'];
		//definisikan variabel file dan kendaraan file
		$uploaddir='../foto_mitra/';
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
	
		if(mysqli_query($mysqli, "INSERT INTO `mitra` (`id_mitra`, `saldo`, `bankmitra`, `rekmitra`, `namarekmitra`, `jambuka`, `alamat`, `kecamatan`, `kota`, `propinsi`, `nama_mitra`, `foto_mitra`, `kelamin`, `latmitra`, `lngmitra`, `nomorhp`, `no_ktp`, `mitra_email`, `mitra_pass`, `dokumen`, `sebagai`, `tanggal`, `suspen`, `idunik`, `kodearea`, `nourut`, `jabatan`, `departement`, `title`) VALUES (NULL, '0', '$bankmitra', '$rekmitra', '$namarekmitra', '$jambuka', '$alamat', '$kecamatan', '$kota', '$propinsi', '$uname', '$foto_mitra', '$kelamin', '$latmitra', '$lngmitra', '$nomorhp', '$no_ktp', '$email', '$upass', '$dokumen', '$sebagai', '$tanggal', '0', '$idunik ', '$kodearea', '$nourut', '$jabatan', '$departement', '$title');"))
		{
			?>
	<script>document.location.href="index.php";</script>
			<?php
		}
		else
		{
			?><div style="color: #F0;">Busy Server</div><?php
		}		
	}
	else{
			?><div style="color: #F0;">Email/ID has ben registered</div><?php
	}
	
}
?>
<html>
<head>
	<title>Add Data</title>
</head>
<body style="font-family:Segoe UI;margin-left:70px;margin-right:70px">
<center><b style="padding:10px">add Data Partner/Admin</b></center><br>
<form id="form"action="add.php" enctype="multipart/form-data"  method="post" name="postform">

<table style="width:100%;padding:10px">
  <tr style="padding:10px">
    <th colspan="4" style="padding:10px"></th>
  </tr>
  <tr>
  <input style="padding:10px;width:100%"type="hidden" name="sebagai" value="Admin">
<td style="padding:10px;background:#dadada">Departemen<br>(Role menu)</td>
    <td> 
  <select style="padding:10px;background:#dadada" name="departement" > 
    <?php
session_start();
include_once '../dbconnect.php';
		$get=mysqli_query($mysqli, "SELECT * FROM departement");
            while($jim = mysqli_fetch_assoc($get))
            {
            ?>
            <option name="departement" style="color:grey"value="<?php echo $jim['departement'];?>" >
                <b style="color:grey"><?php echo $jim['departement']; ?></b>
            </option>
            <?php
            }               
        ?>
         </select>
        </td>
  <td style="padding:10px;background:#dadada">Jenis Kelamin</td>
    <td>
	<select style="padding:10px;width:100%" name="kelamin"required=required>
<option name="kelamin" value="">-sex-</option>
<option name="kelamin"value="male">male</option>
<option name="kelamin"value="female">female</option>
</select></td>  </tr>
  <tr>
    <td style="padding:10px;background:#dadada">Full name</td>
    <td><input style="padding:10px;width:100%"type="text" name="uname"required="required"></td>
    <td style="padding:10px;background:#dadada">National Identity number</td>
    <td><input style="padding:10px;width:100%"type="number" name="no_ktp"required="required"></td>
  </tr>
  <tr>
    <td style="padding:10px;background:#dadada">Adress</td>
    <td><input style="padding:10px;width:100%"type="text" name="alamat"required="required"></td>
    <td style="padding:10px;background:#dadada">State</td>
    <td><input style="padding:10px;width:100%"type="text" name="kecamatan"required="required"></td>
  </tr>  
  <tr>
    <td style="padding:10px;background:#dadada">City</td>
    <td><input style="padding:10px;width:100%"type="text" name="kota"required="required"></td>
    <td style="padding:10px;background:#dadada">Province</td>
    <td><input style="padding:10px;width:100%"type="text" name="propinsi"required="required"></td>
  </tr>
    <tr>
    <td style="padding:10px;background:#dadada">No. Handphone</td>
    <td><input style="padding:10px;width:100%" type="number" name="nomorhp"required="required"></td>
    <td style="padding:10px;background:#dadada">Email</td>
    <td><input style="padding:10px;width:100%"type="email" name="email"required="required"></td>
  </tr>
  </tr>
 
      <tr>
<input type="hidden" name="tanggal"value="<?php echo date('d-m-Y h:i:s'); ?>"/>
<input type="hidden" name="suspen"value="0"/>

    <td style="padding:10px;background:#dadada">profile picture</td>
    <td>

	<input style="border:1px solid grey;padding:10px;width:100%" ID="FileUpload1" onchange="IsFileSelected()" type="file" name="foto_mitra" size="999999" required="required"></td>

	<td style="padding:10px;background:#dadada">Passsword</td>
    <td><input style="padding:10px;width:100%"type="password" name="upass"required="required"></td>
  </tr>
      <tr>
    <td style="padding:10px;background:#dadada">Title<br>(Mr./Mrs)</td>
    <td><input style="padding:20px;width:100%"type="text" placeholder="Manual input" name="title"required="required"></td>
   <td style="padding:10px;background:#dadada">ID employee<br>(Optional)</td>
    <td><input style="padding:20px;width:100%"type="text" placeholder="ID" name="idunik"></td>
    
  </tr>
   <tr>
    <td style="padding:10px;background:#dadada">Scan dokumen KTP/Passport/SIM</td>
    <td><input style="border:1px solid grey;padding:10px;width:100%" ID="FileUpload1" onchange="IsFileSelected()" type="file" name="dokumen" size="999999" required="required"></td>
    <td colspan="2"style="padding:10px;background:#dadada"><small>**agree that
The data entered is true according to the individual data, the data entered is registered into the database with the agreement of the individual data owner. If there is a change regarding the identity or personal data of the individual, it will be corrected through the data editing procedure on the app <small> </td></tr>

			<tr> 
			  <td>		
</td>
    <td></td><td>
<input type="hidden" name="latmitra" value="-1.943318" />
<input type="hidden" name="lngmitra" value="113.287041" />
<input name="dokumen"type="hidden"value="Belum"/>

<center><a href="index.php"><div style="background:red;width:200px;border:none;padding:10px;width:90%;color:#fff" class="testbutton">cancel</div></a>
</center>
				</td>
				<td><center><button style="background:green;width:200px;border:none;padding:10px;width:90%;color:#fff" class="testbutton" type="submit" name="submit" value="save Data">save Data</button></center></td>
			</tr>
		</table>
  
		<br>
	</form>
</body>
</html>

