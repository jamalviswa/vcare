<?php
include_once("../dbconnect.php");
if(isset($_POST['kirim'])){
	$idpromo=$_POST['idpromo'];
	$kodepromo=$_POST['kodepromo'];
	$diskonpersen=$_POST['diskonpersen'];
	$namapromo=$_POST['namapromo'];
	$deskripsipromo=$_POST['deskripsipromo'];
	$picture = $_POST['picture'];
	if(empty($_FILES['picture']['name'])){
		$picture=$_POST['picture'];
	}else{
		$picture=$_FILES['picture']['name'];
		//definisikan variabel file dan kendaraan file
		$jumpakj='../../foto_mitra/';
		$limes=$jumpakj.$picture;
		//periksa jika proses upload berjalan sukses
		$rupso=move_uploaded_file($_FILES['picture']['tmp_name'],$limes);
	}

	$query=mysqli_query($mysqli, "update promo set kodepromo='$kodepromo', diskonpersen='$diskonpersen', namapromo='$namapromo', deskripsipromo='$deskripsipromo', picture='$picture' where idpromo='$idpromo'");
						
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