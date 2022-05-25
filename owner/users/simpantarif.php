<?php
include_once("../dbconnect.php");
if(isset($_POST['kirim'])){
$idlimit=$_POST['idlimit'];
$jumlahlimit = $_POST['jumlahlimit'];
$keterangan = $_POST['keterangan'];
$query=mysqli_query($mysqli, "update limithutang set idlimit='$idlimit', jumlahlimit='$jumlahlimit', keterangan='$keterangan' where idlimit='$idlimit'");					
	if($query){
		?>
		<blockquote>
          <p></p>
		  <p>Save successfull...<br><a href="javascript:history.back(-3)">Click to back</a></p>
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