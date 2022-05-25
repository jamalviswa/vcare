<?php
include_once("../dbconnect.php");
if(isset($_POST['kirim'])){
	$idpromo=$_POST['idpromo'];
	$kodepromo=$_POST['kodepromo'];
	$diskonpersen=$_POST['diskonpersen'];
	$query=mysqli_query($mysqli, "update promo set kodepromo='$kodepromo', diskonpersen='$diskonpersen' where idpromo='$idpromo'");
						
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