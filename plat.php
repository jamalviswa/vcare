<?php
include_once("dbconnect.php");
if(isset($_POST['jirim'])){
if (empty($_POST['ahlibidang'])) {
   ?><script>window.alert("Dont empty vehicle");window.history.go(-2);</script><?php
      return false;
}

if (empty($_POST['jabatan'])) {
   ?><script>window.alert("Dont empty Vehicle Number licence");window.history.go(-2);</script><?php
      return false;
}

$id =$_POST['id'];
$jabatan = $_POST['jabatan'];
$ahlibidang = $_POST['ahlibidang'];
$jenistransportasi = $_POST['jenistransportasi'];

$query=mysqli_query($mysqli, "UPDATE `users` SET `jabatan` = '$jabatan', `ahlibidang` = '$ahlibidang', `jenistransportasi` = '$jenistransportasi' WHERE `users`.`id` = '$id';");
						
	if($query){
		?>
		<script>window.history.go(-1);</script>
		<?php
	

}}
?>