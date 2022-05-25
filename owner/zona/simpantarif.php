<?php
include_once("../dbconnect.php");
if(isset($_POST['kirim'])){
	$persen=$_POST['persen'];
$query=mysqli_query($mysqli, "update potongan set persen='$persen' where idpotongan='1'");					
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
<?php
include_once("../dbconnect.php");
if(isset($_POST['jirim'])){
	$tarif=$_POST['tarif'];
$query=mysqli_query($mysqli, "update tarif set tarif='$tarif' where id_tarif='1'");					
	if($query){
		?>
<script>document.location.href="index.php";</script>
		<?php
	}else{
		echo mysql_query();
	}
	

}else{
	unset($_POST['jirim']);
}
?>