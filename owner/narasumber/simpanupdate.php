<?php
include_once("../dbconnect.php");
if(isset($_POST['kirim'])){
	$id = $_POST['id'];
	$tipeuser = $_POST['tipeuser'];
	$akses = $_POST['akses'];
	$first_name = $_POST['first_name'];
	$no_ktp = $_POST['no_ktp'];
	$kelamin = $_POST['kelamin'];
	$lat = $_POST['lat'];
	$lng = $_POST['lng'];
	$phone = $_POST['phone'];
	$status = $_POST['status'];
	$password= $_POST['password'];
	$email = $_POST['email'];
	$saldo = $_POST['saldo'];
	$noktp = $_POST['noktp'];
	$fotouser = $_POST['fotouser'];
	$fotoktp = $_POST['fotoktp'];
	$fotoselfi = $_POST['fotoselfi'];
	$afiliasi = $_POST['afiliasi'];
	$shareafiliasi = $_POST['shareafiliasi'];
	$pembelian = $_POST['pembelian'];
	
	
	$nomoUSD langgan = $_POST['nomoUSD langgan'];
	$telpkantor = $_POST['telpkantor'];
	$faxkantor = $_POST['faxkantor'];
	$npwp = $_POST['npwp'];
	$alamatkantor1 = $_POST['alamatkantor1'];
	$alamatkantor2 = $_POST['alamatkantor2'];
	$alamatkantor3 = $_POST['alamatkantor3'];
	$alamatkantor4 = $_POST['alamatkantor4'];
	$coUSD ratename = $_POST['coUSD ratename'];
	$brandcoUSD rate = $_POST['brandcoUSD rate'];
	
		if(empty($_FILES['fotoktp']['name'])){
		$fotoktp=$_POST['fotoktp'];
	}else{
		$fotoktp=$_FILES['fotoktp']['name'];
		//definisikan variabel file dan alamat file
		$uploaddir='../foto_mitra/';
		$alamatfile=$uploaddir.$fotoktp;
		//periksa jika proses upload berjalan sukses
		$upload=move_uploaded_file($_FILES['fotoktp']['tmp_name'],$alamatfile);
	}
		if(empty($_FILES['fotoselfi']['name'])){
		$fotoselfi=$_POST['fotoselfi'];
	}else{
		$fotoselfi=$_FILES['fotoselfi']['name'];
		//definisikan variabel file dan alamat file
		$juplods='../foto_mitra/';
		$jamaa=$juplods.$fotoselfi;
		//periksa jika proses upload berjalan sukses
		$jupload=move_uploaded_file($_FILES['fotoselfi']['tmp_name'],$jamaa);
	}
$query=mysqli_query($mysqli, "update users set fotoselfi='$fotoselfi', fotoktp='$fotoktp', noktp='$noktp', email='$email', first_name='$first_name', akses='$akses', npwp='$npwp', telpkantor='$telpkantor', faxkantor='$faxkantor', coUSD ratename='$coUSD ratename', brandcoUSD rate='$brandcoUSD rate', alamatkantor1='$alamatkantor1', alamatkantor2='$alamatkantor2', alamatkantor3='$alamatkantor3', alamatkantor4='$alamatkantor4', nomoUSD langgan='$nomoUSD langgan' where id='$id'");					
	if($query){
		?>
<script>document.location.href="index.php";</script>
		<?php
	}else{
		echo mysql_query();
	}
	

}else{
	unset($_POST['kirim']);
}
?>

