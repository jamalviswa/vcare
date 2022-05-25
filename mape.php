<?php
include_once("dbconnect.php");
if(isset($_POST['kirim'])){
	if (empty($_POST['lat'])) {
   ?>
<script>window.alert("Location not detected!");window.history.back(-2);</script><?php
  return false;
}
$id_mitra=$_POST['id_mitra'];
$lat = $_POST['lat'];
$lng = $_POST['lng'];

	$query=mysqli_query($mysqli, "update users set lat='$lat', lng='$lng' where id='$id_mitra'");
						
	if($query){
		?>
<script>window.history.back(-2);</script>
		<?php
	

}}
?>