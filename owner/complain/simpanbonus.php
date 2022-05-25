<?php
include_once("../dbconnect.php");
if(isset($_POST['kirim'])){
	$uang=$_POST['uang'];
	$tanggal=$_POST['tanggal'];
$query=mysqli_query($mysqli, "update bonus set uang='$uang', tanggal='$tanggal' where idbonus='1'");					
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