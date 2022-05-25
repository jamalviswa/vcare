<?php
	session_start();
	$_SESSION["id"] = $_POST["id"];
	$_SESSION["name"] = $_POST["name"];
	$_SESSION["email"] = $_POST["email"];
	$_SESSION["picture"] = $_POST["picture"];
	$_SESSION["phone"] = $_POST["phone"];

	$mysqli = new mysqli("localhost", "denbagus_android", "vfjsUIjwEuPw", "denbagus_android");


	$sql = "SELECT * FROM users WHERE oauth_uid='".$_POST["id"]."'";
	$result = $mysqli->query($sql);


	if(!empty($result->fetch_assoc())){
		$sql2 = "UPDATE users SET first_name = '".$_POST['name']."', last_name = '".$_POST['last_name']."', picture = '".$_POST['picture']."', link = '', modified = '".date("Y-m-d H:i:s")."' WHERE oauth_provider = 'google' AND oauth_uid = '".$_POST['id']."'";
	}else{
		$sql2 = "INSERT INTO users SET oauth_provider = 'google', oauth_uid = '".$_POST['id']."', first_name = '".$_POST['name']."', last_name = '".$userData['last_name']."', picture = '".$_POST['picture']."', link = '', created = '".date("Y-m-d H:i:s")."', modified = '".date("Y-m-d H:i:s")."', email = '".$_POST['email']."', password = '', forgot_pass_identity = '', saldo = '0', pembelian = '50', noktp = '', tempatlahir = '', tgllahir = '', kelamin = '', agama = '', alamat1 = '', kota = '', provinsi = '', pendidikan = '', profesi = '', jabatan = '', pendapatan = '0', statusnikah = '', phone = ''".$_POST['phone']."'', kunci = '', pengalaman = '', almamater = '', ahlibidang = '', sebagai = 'mitra', online = 'online', lat = '', lng = ''";
	}


	$mysqli->query($sql2);

?>