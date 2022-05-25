<?php
include_once("../dbconnect.php");
if(isset($_POST['kirim'])){
$tanggal_liburan = $_POST['tanggal_liburan'];
	$keterangan_liburan = $_POST['keterangan_liburan'];
	$id_liburan = $_POST['id_liburan'];

	$query=mysqli_query($mysqli, "update liburnasional set tanggal_liburan='$tanggal_liburan', keterangan_liburan='$keterangan_liburan' where id_liburan='$id_liburan'");
						
	if($query){
		header("Location:index.php");	
		?>
		<blockquote><br><br><br>
          <p></p>
		  <p>Success Saved...<br><a href='index.php'>Show</a></p>
		  <p></p>
		</blockquote>
		<?php
	}else{
		echo mysql_query();
	}
	

}else{
	unset($_POST['kirim']);
}
?>