<?php
session_start();
include_once 'dbconnect.php';
	$_SESSION["id"] = $_POST["id"];
	$_SESSION["name"] = $_POST["name"];
	$_SESSION["email"] = $_POST["email"];
	$_SESSION["picture"] = $_POST["picture"];
	$_SESSION["phone"] = $_POST["phone"];


	$sql = "SELECT * FROM users WHERE oauth_uid='".$_POST["id"]."'";
	$result = $mysqli->query($sql);


	if(!empty($result->fetch_assoc())){
		$sql2 = "UPDATE users SET first_name = '".$_POST['name']."', last_name = '".$_POST['last_name']."', picture = '".$_POST['picture']."', link = '', modified = '".date("Y-m-d H:i:s")."' WHERE oauth_provider = 'google' AND oauth_uid = '".$_POST['id']."'";
	}else{
		$sql2 = "INSERT INTO users SET oauth_provider = 'google', oauth_uid = '".$_POST['id']."', first_name = '".$_POST['name']."', last_name = '".$userData['last_name']."', picture = '".$_POST['picture']."', link = '', created = '".date("Y-m-d H:i:s")."', modified = '".date("Y-m-d H:i:s")."', email = '".$_POST['email']."', password = '', forgot_pass_identity = '', saldo = '0', pembelian = '50', noktp = '', tempatlahir = '', tgllahir = '', kelamin = '', agama = '', alamat1 = '', kota = '', provinsi = '', pendidikan = '', profesi = '', jabatan = '', pendapatan = '0', statusnikah = '', phone = ''".$_POST['phone']."'', kunci = '', pengalaman = '', almamater = '', ahlibidang = '', sebagai = 'driver', online = 'online', lat = '', lng = '', jenistransportasi = ''";
	}


	$mysqli->query($sql2);
	
$res=mysqli_query($mysqli, "SELECT * FROM users WHERE oauth_uid='".$_POST["id"]."'");
$row=mysqli_fetch_array($res);
$tession = $row['id'];
if($tession)
{
		$_SESSION['user'] = $tession;
	?>
<script>document.location.href="home.php";</script><?php
}
?>