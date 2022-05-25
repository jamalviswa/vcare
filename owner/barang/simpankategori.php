<?php
include_once("../dbconnect.php");
if(isset($_POST['kirim'])){
	$menu_detail_id=$_POST['menu_detail_id'];
	$menu_name=$_POST['menu_name'];
	$query=mysqli_query($mysqli, "update jw_menu_detail set menu_name='$menu_name' where menu_detail_id='$menu_detail_id'");
						
	if($query){
		?>
<script>document.location.href="kategori.php";</script>
		<?php
	}else{
		echo mysql_query();
	}
	

}else{
	unset($_POST['kirim']);
}
?>