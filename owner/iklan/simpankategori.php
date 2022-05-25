<?php
include_once("../dbconnect.php");
if(isset($_POST['kirim'])){
	$id_ads=$_POST['id_ads'];
	$harga_ads=$_POST['harga_ads'];
	$query=mysqli_query($mysqli, "update ads set harga_ads='$harga_ads' where id_ads='$id_ads'");
						
	if($query){
		?>
<script>document.location.href="kategori.php";</script>
		<?php
	}else{
		echo mysql_query();
	}
	

}else{
	unset($_POST['kirim']);
}
?>