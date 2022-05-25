<?php
session_start();
include_once '../dbconnect.php';
if(!isset($_SESSION['mitra']))
{
	header("Location:../index.php");
}
$res=mysqli_query($mysqli, "SELECT * FROM mitra WHERE id_mitra=".$_SESSION['mitra']);
$rows=mysqli_fetch_array($res);
$id_mobil = $_GET['id_mobil'];
$row=mysqli_fetch_array(mysqli_query($mysqli, "select * from car where id_mobil='$id_mobil'"));
if(isset($_POST['post']))
{
	$id_mobil = mysqli_real_escape_string($mysqli, $_POST['id_mobil']);
	$nama_mobil = mysqli_real_escape_string($mysqli, $_POST['nama_mobil']);
	$merkmobil = mysqli_real_escape_string($mysqli, $_POST['merkmobil']);
	$deskripsimobil = mysqli_real_escape_string($mysqli, $_POST['deskripsimobil']);
	$harga_12jam = mysqli_real_escape_string($mysqli, $_POST['harga_12jam']);
	$harga_24jam = mysqli_real_escape_string($mysqli, $_POST['harga_24jam']);
	$pemilikmobil = mysqli_real_escape_string($mysqli, $_POST['pemilikmobil']);
	$gambarmobil = mysqli_real_escape_string($mysqli, $_POST['gambarmobil']);
	$jenisbahanbakar = mysqli_real_escape_string($mysqli, $_POST['jenisbahanbakar']);
	$alamat_barang = mysqli_real_escape_string($mysqli, $_POST['alamat_barang']);
	$ada = mysqli_real_escape_string($mysqli, $_POST['ada']);
	$plat = mysqli_real_escape_string($mysqli, $_POST['plat']);
	$kursi = mysqli_real_escape_string($mysqli, $_POST['kursi']);
	$pintu = mysqli_real_escape_string($mysqli, $_POST['pintu']);
	$hargasopir = mysqli_real_escape_string($mysqli, $_POST['hargasopir']);
	$fitur = mysqli_real_escape_string($mysqli, $_POST['fitur']);
	$tipetransmisi = mysqli_real_escape_string($mysqli, $_POST['tipetransmisi']);
	$kecamatan = mysqli_real_escape_string($mysqli, $_POST['kecamatan']);
	$tahun = mysqli_real_escape_string($mysqli, $_POST['tahun']);
	$warna = mysqli_real_escape_string($mysqli, $_POST['warna']);
	$bagasi = mysqli_real_escape_string($mysqli, $_POST['bagasi']);
	$singleac = mysqli_real_escape_string($mysqli, $_POST['singleac']);
	$doubleac = mysqli_real_escape_string($mysqli, $_POST['doubleac']);
	$chargerhp = mysqli_real_escape_string($mysqli, $_POST['chargerhp']);
	$audio = mysqli_real_escape_string($mysqli, $_POST['audio']);
	$entertainment = mysqli_real_escape_string($mysqli, $_POST['entertainment']);
	$airbag = mysqli_real_escape_string($mysqli, $_POST['airbag']);
	$teUSD l = mysqli_real_escape_string($mysqli, $_POST['teUSD l']);
	$bancadangan = mysqli_real_escape_string($mysqli, $_POST['bancadangan']);
	$jenismobil = mysqli_real_escape_string($mysqli, $_POST['jenismobil']);
	$kodeafiliasi = mysqli_real_escape_string($mysqli, $_POST['kodeafiliasi']);
	$tipeads = mysqli_real_escape_string($mysqli, $_POST['tipeads']);
	$harga1jam = mysqli_real_escape_string($mysqli, $_POST['harga1jam']);
	$harga6jam = mysqli_real_escape_string($mysqli, $_POST['harga6jam']);
	$harga1bulan = mysqli_real_escape_string($mysqli, $_POST['harga1bulan']);
	$gambarmobil = $_POST['gambarmobil'];
	if(empty($_FILES['gambarmobil']['name'])){
		$gambarmobil=$_POST['gambarmobil'];
	}else{
		$gambarmobil=$_FILES['gambarmobil']['name'];
		//definisikan variabel file dan kendaraan file
		$uploaddir='../fotobarang/';
		$kendaraanfile=$uploaddir.$gambarmobil;
		//periksa jika proses upload berjalan sukses
		$upload=move_uploaded_file($_FILES['gambarmobil']['tmp_name'],$kendaraanfile);
	}
		
$query=mysqli_query($mysqli, "UPDATE `car` SET `nama_mobil` = '$nama_mobil', `merkmobil` = '$merkmobil', `deskripsimobil` = '$deskripsimobil', `harga_12jam` = '$harga_12jam', `harga_24jam` = '$harga_24jam', `pemilikmobil` = '$pemilikmobil', `gambarmobil` = '$gambarmobil', `jenisbahanbakar` = '$jenisbahanbakar', `alamat_barang` = '$alamat_barang', `kursi` = '$kursi', `pintu` = '$pintu', `hargasopir` = '$hargasopir', `fitur` = '$fitur', `tipetransmisi` = '$tipetransmisi', `plat` = '$plat', `kecamatan` = '$kecamatan', `tahun` = '$tahun', `warna` = '$warna', `bagasi` = '$bagasi', `singleac` = '$singleac', `doubleac` = '$doubleac', `chargerhp` = '$chargerhp', `audio` = '$audio', `entertainment` = '$entertainment', `airbag` = '$airbag', `teUSD l` = '$teUSD l', `bancadangan` = '$bancadangan', `jenismobil` = '$jenismobil', `kodeafiliasi` = '$kodeafiliasi', `harga1jam` = '$harga1jam', `harga6jam` = '$harga6jam', `harga1bulan` = '$harga1bulan' WHERE `car`.`id_mobil` = '$id_mobil';");
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