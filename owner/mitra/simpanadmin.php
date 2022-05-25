<?php
include_once("../dbconnect.php");
if(isset($_POST['kirim'])){
	$id_mitra=$_POST['id_mitra'];
	$nama_mitra = $_POST['nama_mitra'];
	$foto_mitra = $_POST['foto_mitra'];
	$kelamin = $_POST['kelamin'];
	$sim = $_POST['sim'];
	$pengalaman = $_POST['pengalaman'];
	$kendaraan = $_POST['kendaraan'];
	$latmitra = $_POST['latmitra'];
	$lngmitra = $_POST['lngmitra'];
	$nomorhp = $_POST['nomorhp'];
        $no_ktp = $_POST['no_ktp'];
	$dokumen = $_POST['dokumen'];
	$mitra_email = $_POST['mitra_email'];
	$mitra_pass = md5($_POST['mitra_pass']);
	$art_id = $_POST['art_id'];
	$result = mysqli_query($mysqli, "INSERT INTO  'zkeduct1_massase'.'ratings' ('id' ,'art_id' ,'total_votes' ,'total_points')VALUES (NULL ,  '$art_id',  '1',  '1')");
	if(empty($_FILES['foto_mitra']['name'])){
		$foto_mitra=$_POST['foto_mitra'];
	}else{
		$foto_mitra=$_FILES['foto_mitra']['name'];
		//definisikan variabel file dan alamat file
		$uploaddir='../../foto_mitra/';
		$alamatfile=$uploaddir.$foto_mitra;
		//periksa jika proses upload berjalan sukses
		$upload=move_uploaded_file($_FILES['foto_mitra']['tmp_name'],$alamatfile);
	}

$query=mysqli_query($mysqli, "update mitra set nama_mitra='$nama_mitra',foto_mitra='$foto_mitra',kelamin='$kelamin',sim='$sim',pengalaman='$pengalaman',kendaraan='$kendaraan',latmitra='$latmitra',lngmitra='$lngmitra',nomorhp='$nomorhp',no_ktp='$no_ktp',mitra_email='$mitra_email',mitra_pass='$mitra_pass', dokumen='$dokumen' where id_mitra='$id_mitra'");					
	if($query){
	header("Location:index.php");
	}else{
		echo mysql_query();
	}
	

}else{
	unset($_POST['kirim']);
}
?>