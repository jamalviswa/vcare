<?php
include_once("../dbconnect.php");
if(isset($_POST['kirim'])){
	$id = $_POST['id'];
	$tipeuser = $_POST['tipeuser'];
	$akses = $_POST['akses'];
$query=mysqli_query($mysqli, "update users set akses='$akses', tipeuser='$tipeuser' where id='$id'");					
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

