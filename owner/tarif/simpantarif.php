<?php
include_once("../dbconnect.php");
if(isset($_POST['kirim'])){
$query=mysqli_query($mysqli, "UPDATE `tarif` SET `transportasi`='".$_POST['transportasi']."' ,`makanan`='".$_POST['makanan']."' ,`paket`='".$_POST['paket']."' ,`transportasimobil`='".$_POST['transportasimobil']."' WHERE id_tarif='1'");					
	if($query){
		?>
		<script>window.history.go(-1);</script>
		<?php
	}else{
		echo mysql_query();
	}
	

}else{
	unset($_POST['kirim']);
}
?>