<?php
include_once("../dbconnect.php");
if(isset($_POST['kirim'])){
	$latmitra= $_POST['latmitra'];
	$lngmitra= $_POST['lngmitra'];
$id_mitra= $_POST['id_mitra'];
$nama_mitra= $_POST['nama_mitra'];
	
	$query=mysqli_query($mysqli, "update mitra set nama_mitra='$nama_mitra',latmitra='$latmitra',lngmitra='$lngmitra' where id_mitra='$id_mitra'");
						
	if($query){
	header("Location:index.php");
	}else{
		echo mysql_query();
	}
	

}else{
	unset($_POST['kirim']);
}
?>