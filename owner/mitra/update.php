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
	
	$nama_mitra = mysqli_real_escape_string($mysqli, $_POST['nama_mitra']);
	$no_ktp = mysqli_real_escape_string($mysqli, $_POST['no_ktp']);
	$sim = mysqli_real_escape_string($mysqli, $_POST['sim']);
	$dokumen = mysqli_real_escape_string($mysqli, $_POST['dokumen']);
	$kendaraan = mysqli_real_escape_string($mysqli, $_POST['kendaraan']);
	$latmitra = mysqli_real_escape_string($mysqli, $_POST['latmitra']);
	$lngmitra = mysqli_real_escape_string($mysqli, $_POST['lngmitra']);
	$nomorhp = mysqli_real_escape_string($mysqli, $_POST['nomorhp']);
	$sebagai = mysqli_real_escape_string($mysqli, $_POST['sebagai']);
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
	$id_mitra = mysqli_real_escape_string($mysqli, $_POST['id_mitra']);
	$idunik = mysqli_real_escape_string($mysqli, $_POST['idunik']);
	$departement = mysqli_real_escape_string($mysqli, $_POST['departement']);
	$nourut = mysqli_real_escape_string($mysqli, $_POST['nourut']);
	$departement = mysqli_real_escape_string($mysqli, $_POST['departement']);
	$title = mysqli_real_escape_string($mysqli, $_POST['title']);
	$jabatan = mysqli_real_escape_string($mysqli, $_POST['jabatan']);
	$nama_mitra = trim($nama_mitra);
	$email = trim($email);
	
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
$query=mysqli_query($mysqli, "UPDATE `mitra` SET `bankmitra` = '$bankmitra', `rekmitra` = '$rekmitra', `namarekmitra` = '$namarekmitra', `jambuka` = '$jambuka', `alamat` = '$alamat', `kecamatan` = '$kecamatan', `kota` = '$kota', `propinsi` = '$kota', `nama_mitra` = '$nama_mitra', `foto_mitra` = '$foto_mitra', `kelamin` = '$kelamin', `latmitra` = '$latmitra', `lngmitra` = '$lngmitra', `nomorhp` = '$nomorhp', `no_ktp` = '$no_ktp', `mitra_email` = '$email', `dokumen` = '$dokumen', `tanggal` = '$tanggal', `idunik` = '$idunik', `kodearea` = '$kodearea', `nourut` = '$nourut', `jabatan` = '$jabatan', `departement` = '$departement', `title` = '$title' WHERE `mitra`.`id_mitra` = '$id_mitra';");
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
</head>
<body style="font-family:Segoe UI;margin-left:70px;margin-right:70px">
<center><b style="padding:10px">Change Admin Profile</b></center><br>
<form id="form"action="update.php" enctype="multipart/form-data"  method="post" name="postform">

<table style="width:100%;padding:10px">
  <tr style="padding:10px">
    <th colspan="4" style="padding:10px"></th>
  </tr>
  <tr>
     <td style="padding:10px;background:#dadada">Departement (Access menu)</td>
    <td>  <select style="padding:10px;background:#dadada" name="departement" > 
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
         </select></td>
  <td style="padding:10px;background:#dadada">Gender</td>
    <td><?php echo $row['kelamin']; ?></td>  </tr>
  <tr>
    <td style="padding:10px;background:#dadada">Full Name</td>
    <td><input style="padding:10px;width:100%"type="text" name="nama_mitra"required="required" value="<?php echo $row['nama_mitra']; ?>"></td>
    <td style="padding:10px;background:#dadada">ID Card</td>
    <td><input style="padding:10px;width:100%"type="number" name="no_ktp"required="required" value="<?php echo $row['no_ktp']; ?>"></td>
  </tr>
  <tr>
    <td style="padding:10px;background:#dadada">Address</td>
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
    <td style="padding:10px;background:#dadada">Phone</td>
    <td><input style="padding:10px;width:100%" type="number" name="nomorhp"required="required" value="<?php echo $row['nomorhp']; ?>"></td>
    <td style="padding:10px;background:#dadada">Email (Locked)</td>
    <td><input style="padding:10px;width:100%"type="email" name="email" required="required" value="<?php echo $row['mitra_email']; ?>" readonly></td>
  </tr>
  </tr>
 
      <tr>
	  
<input type="hidden" name="tanggal"value="<?php echo date('d-m-Y h:i:s'); ?>"/>

    <td style="padding:10px;background:#dadada">Picture</td>
    <td>
<img width="200px" src="../../foto_mitra/<?php echo $row['foto_mitra'];?>"/>
<br>
<input style="border:1px solid grey;padding:10px;width:100%" ID="FileUpload1" onchange="IsFileSelected()" type="file" name="foto_mitra" size="999999" >
</td>

	<td style="padding:10px;background:#dadada">Passsword</td>
    <td><center><small>Password Protected can change from Account administrator</small></center></td>
  </tr>
      <tr>
    <td style="padding:10px;background:#dadada">Title<br>(Mr./Mrs/Miss)</td>
    <td><input style="padding:20px;width:100%"type="text" placeholder="title" name="title"value="<?php echo $row['title']; ?>"></td>
     <td style="padding:10px;background:#dadada">ID Employee<br>(opsional)</td>
    <td><input style="padding:20px;width:100%"type="text" placeholder="ID Employee" name="idunik"></td>
      
  </tr>

			<tr> 
			  <td>		
</td>
    <td></td><td>
	
<input type="hidden" name="id_mitra" value="<?php echo $row['id_mitra']; ?>" />

<center><a href="index.php"><div style="background:red;width:200px;border:none;padding:10px;width:90%;color:#fff" class="testbutton">Cancel</div></a>
</center>
				</td>
				<td><center><button style="background:green;width:200px;border:none;padding:10px;width:90%;color:#fff" class="testbutton" type="submit" name="post" value="Save Data">Save Data</button></center></td>
			</tr>
		</table>
  
		<br>
	</form>
	</form>
</body>
</html>
<?php
$sebagai=$row['sebagai'];
if($sebagai=='superadmin')
      { ?>
<script>document.location.href="upadateadmin.php?id_mitra=<?php echo $row['id_mitra']; ?>";</script>	  
	<?php
}?>