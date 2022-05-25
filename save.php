<?php
include_once("dbconnect.php");
if(isset($_POST['kirim'])){
if (empty($_POST['noktp'])) {
   ?><script>window.alert("dont empty ID nationality!!");window.history.go(-2);</script><?php
      return false;
}

if (empty($_POST['password'])) {
   ?><script>window.alert("dont empty input password!!");window.history.go(-2);</script><?php
      return false;
}

$id =$_POST['id'];
$first_name =$_POST['first_name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$tipeuser = $_POST['tipeuser'];
$password = $_POST['password'];
$password = md5($password);
$oauth_uid = $_POST['oauth_uid'];
$last_name = $_POST['last_name'];
$picture = $_POST['picture'];
$link = $_POST['link'];
$forgot_pass_identity = $_POST['forgot_pass_identity'];
$noktp = $_POST['noktp'];
$saldo = $_POST['saldo'];
$pembelian = $_POST['pembelian'];
$tempatlahir = $_POST['tempatlahir'];
$tgllahir = $_POST['tgllahir'];
$kelamin = $_POST['kelamin'];
$agama = $_POST['agama'];
$alamat1 = $_POST['alamat1'];
$kota = $_POST['kota'];
$provinsi = $_POST['provinsi'];
$pendidikan = $_POST['pendidikan'];
$profesi = $_POST['profesi'];
$jabatan = $_POST['jabatan'];
$pendapatan = $_POST['pendapatan'];
$statusnikah = $_POST['statusnikah'];
$kunci = $_POST['kunci'];
$phone = $_POST['phone'];

$query=mysqli_query($mysqli, "UPDATE `users` SET `first_name` = '$first_name', `link` = '$link', `email` = '$email', `password` = '$password', `noktp` = '$noktp', `tempatlahir` = '$tempatlahir', `tgllahir` = '$tgllahir', `kelamin` = '$kelamin', `agama` = '$agama', `alamat1` = '$alamat1', `kota` = '$kota', `provinsi` = '$provinsi', `pendidikan` = '$pendidikan', `profesi` = '$profesi', `jabatan` = '$jabatan', `pendapatan` = '$pendapatan', `statusnikah` = '$statusnikah' WHERE `users`.`id` = '$id';");
						
	if($query){
header('Location: ' . $_SERVER['HTTP_REFERER']);
}}
?>
<?php
include_once("dbconnect.php");
if(isset($_POST['firim'])){
if (empty($_POST['picture'])) {
   ?><script>window.alert("No picture Selected, Please Choose one!");window.history.go(-2);</script><?php
      return false;
}

		if(empty($_FILES['picture']['name'])){
		$picture=$_POST['picture'];
	}else{
		$picture=$_FILES['picture']['name'];
		//definisikan variabel file dan alamat file
		$uploaddir='foto_mitra/';
		$alamatfile=$uploaddir.$picture;
		//periksa jika proses upload berjalan sukses
		$upload=move_uploaded_file($_FILES['picture']['tmp_name'],$alamatfile);
	}
$id =$_POST['id'];
$query=mysqli_query($mysqli, "UPDATE `users` SET `picture` = '$picture' WHERE `users`.`id` = '$id';");
						
	if($query){?>
		
		<script>window.history.go(-1);</script>
<?php
}}
?>
<?php
include_once("dbconnect.php");
if(isset($_POST['pimi'])){
$id = $_POST['id'];
$lat = $_POST['lat'];
$lng = $_POST['lng'];
$computerId = $_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT'].$_SERVER['LOCAL_ADDR'].$_SERVER['LOCAL_PORT']; 
$benjo=str_replace(' ', '', $computerId);

$query=mysqli_query($mysqli, "UPDATE `users` SET lat= '$lat', lng= '$lng', forgot_pass_identity='$benjo' WHERE id='$id';");
						
	if($query){
header('Location: ' . $_SERVER['HTTP_REFERER']);

}}
?>