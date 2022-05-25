<?php
session_start();
include_once '../dbconnect.php';
if(!isset($_SESSION['mitra']))
{
	header("Location: ../index.php");
}
$res=mysqli_query($mysqli, "SELECT * FROM mitra WHERE id_mitra=".$_SESSION['mitra']);
$rows=mysqli_fetch_array($res);

$id_mitra = $_GET['id_mitra'];
$row=mysqli_fetch_array(mysqli_query($mysqli, "select * from mitra where id_mitra='$id_mitra'"));

if(isset($_POST['post']))
{
	
	$id_mitra = mysqli_real_escape_string($mysqli, $_POST['id_mitra']);
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
	$departement = mysqli_real_escape_string($mysqli, $_POST['departement']);
	$title = mysqli_real_escape_string($mysqli, $_POST['title']);
	$jabatan = mysqli_real_escape_string($mysqli, $_POST['jabatan']);
	$uname = trim($uname);
	$email = trim($email);
	$upass = trim($upass);
	
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
		$jumpakj='../../foto_mitra/';
		$limes=$jumpakj.$dokumen;
		//periksa jika proses upload berjalan sukses
		$rupso=move_uploaded_file($_FILES['dokumen']['tmp_name'],$limes);
	}
$query=mysqli_query($mysqli, "UPDATE mitra set mitra_pass='$upass', dokumen='$dokumen', bankmitra='$bankmitra', rekmitra='$rekmitra', namarekmitra='$namarekmitra', alamat='$alamat', kecamatan='$kecamatan', kota='$kota', propinsi='$propinsi', nama_mitra='$uname', foto_mitra='$foto_mitra', nomorhp='$nomorhp', no_ktp='$no_ktp', mitra_email='$email', tanggal='$tanggal', departement='$departement', title='$title', jabatan='$jabatan' where id_mitra='$id_mitra'");
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
<html>
<head>
	<title>Edit</title>
</head>
<body style="font-family:Segoe UI;margin-left:70px;margin-right:70px">
<center><b style="padding:10px">Edit Data Admin</b></center><br>
<form id="form"action="upadateadmin.php" enctype="multipart/form-data"  method="post" name="postform">

<table style="width:100%;padding:10px">
  <tr style="padding:10px">
    <th colspan="4" style="padding:10px"></th>
  </tr>
  <tr>
  <td style="padding:10px;background:#dadada">Registered as</td>
    <td>
	<?php 
	if($row['sebagai']=='Admin')
      {
	
	  echo $row['sebagai']; } else { echo "merchant";
	  }
	?></td>
  <td style="padding:10px;background:#dadada">Sex</td>
    <td><?php echo $row['kelamin']; ?></td>  </tr>
  <tr>
    <td style="padding:10px;background:#dadada">Full name</td>
    <td><input style="padding:10px;width:100%"type="text" name="uname"required="required" value="<?php echo $row['nama_mitra']; ?>"></td>
    <td style="padding:10px;background:#dadada">Nationality Identity number</td>
    <td><input style="padding:10px;width:100%"type="number" name="no_ktp"required="required" value="<?php echo $row['no_ktp']; ?>"></td>
  </tr>
  <tr>
    <td style="padding:10px;background:#dadada">Adress</td>
    <td><input style="padding:10px;width:100%"type="text" name="alamat"required="required" value="<?php echo $row['alamat']; ?>"></td>
    <td style="padding:10px;background:#dadada">State</td>
    <td><input style="padding:10px;width:100%"type="text" name="kecamatan"required="required" value="<?php echo $row['kecamatan']; ?>"></td>
  </tr>  
  <tr>
    <td style="padding:10px;background:#dadada">City</td>
    <td><input style="padding:10px;width:100%"type="text" name="kota"required="required" value="<?php echo $row['kota']; ?>"></td>
    <td style="padding:10px;background:#dadada">Province</td>
    <td><input style="padding:10px;width:100%"type="text" name="propinsi"required="required" value="<?php echo $row['propinsi']; ?>"></td>
  </tr>
    <tr>
    <td style="padding:10px;background:#dadada">Bank Name</td>
    <td><input style="padding:10px;width:100%"type="text" name="bankmitra"required="required" value="<?php echo $row['bankmitra']; ?>"></td>
    <td style="padding:10px;background:#dadada">No.Rekening</td>
    <td><input style="padding:10px;width:100%"type="number" name="rekmitra"required="required" value="<?php echo $row['rekmitra']; ?>"></td>
  </tr>
    <tr>
    <td style="padding:10px;background:#dadada">No. Handphone</td>
    <td><input style="padding:10px;width:100%" type="number" name="nomorhp"required="required" value="<?php echo $row['nomorhp']; ?>"></td>
    <td style="padding:10px;background:#dadada">Email</td>
    <td><input style="padding:10px;width:100%"type="email" name="email"required="required" value="<?php echo $row['mitra_email']; ?>"></td>
  </tr>
  </tr>
 
      <tr>
	  
<input type="hidden" name="tanggal"value="<?php echo date('d-m-Y h:i:s'); ?>"/>
<td style="padding:10px;background:#dadada">profile picture</td>
    <td>
	<input style="border:1px solid grey;padding:10px;width:100%" ID="FileUpload1" onchange="IsFileSelected()" type="file" name="foto_mitra" size="999999" required="required">
	</td>
<td style="padding:10px;background:#dadada">Passsword</td>
    <td><input style="padding:10px;width:100%"type="password" name="upass" placeholder="Wajib isi Password setiap perubahan profile" required="required"></td>
   </tr>
   <tr>
    <td style="padding:10px;background:#dadada">Scan document National Identity card</td>
    <td><input style="border:1px solid grey;padding:10px;width:100%" ID="FileUpload1" onchange="IsFileSelected()" type="file" name="dokumen" size="999999" required="required"></td>
    <td colspan="2"style="padding:10px;background:#dadada"><small>**Agree with update data<br><small></td>
  </tr>

			<tr> 
			  <td>		
</td>
    <td></td><td>
	
<input type="hidden" name="id_mitra" value="<?php echo $row['id_mitra']; ?>" />

<center><a href="index.php"><div style="background:red;width:200px;border:none;padding:10px;width:90%;color:#fff" class="testbutton">cancel</div></a>
</center>
				</td>
				<td><center><button style="background:green;width:200px;border:none;padding:10px;width:90%;color:#fff" class="testbutton" type="submit" name="post" value="save Data">save Data</button></center></td>
			</tr>
		</table>
  
		<br>
	</form>
	</form>
</body>
</html>
<?php
$sebagai=$row['sebagai'];
if($sebagai=='mitra')
      { ?>
<script>document.location.href="update.php?id_mitra=<?php echo $id_mitra; ?>";</script>	  
	<?php
}?>