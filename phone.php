<?php
include_once("dbconnect.php");
if(isset($_POST['jirim'])){
if (empty($_POST['phone'])) {
   ?><script>window.alert("Update Gagal!!...Jangan kosongkan nomor hanphone");window.history.go(-2);</script><?php
      return false;
}

$id =$_POST['id'];
$phone = $_POST['phone'];
$picture = $_POST['picture'];

$query=mysqli_query($mysqli, "UPDATE `users` SET `phone` = '$phone', `picture` = '$picture' WHERE `users`.`id` = '$id';");
						
	if($query){
		?>
		<script>window.history.go(-1);</script>
		<?php
	

}}
?>