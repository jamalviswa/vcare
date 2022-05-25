<?php
include_once("../dbconnect.php");
if(isset($_POST['kirim'])){
	$idcontact=$_POST['idcontact'];
	$phone=$_POST['phone'];
	$namaadmin=$_POST['namaadmin'];

	$query=mysqli_query($mysqli, "update contact set namaadmin='$namaadmin', phone='$phone' where idcontact='$idcontact'");
						
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