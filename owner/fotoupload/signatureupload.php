<?php
include_once("../dbconnect.php");
if(isset($_POST['kirim'])){
	$id_mitra=$_POST['id_mitra'];
	$gbrsignature= $_POST['gbrsignature'];
	
	if(empty($_FILES['gbrsignature']['name'])){
		$gbrsignature=$_POST['gbrsignature'];
	}else{
		$gbrsignature=$id_mitra.$_FILES['gbrsignature']['name'];
		
		//definisikan variabel file dan alamat file
		$uploaddir='../attach/';
		$alamatfile=$uploaddir.$gbrsignature;

		//periksa jika proses upload berjalan sukses
		$upload=move_uploaded_file($_FILES['gbrsignature']['tmp_name'],$alamatfile);
	}

	$query=mysqli_query($mysqli, "update mitra set gbrsignature='$gbrsignature' where id_mitra='$id_mitra'");
						
	if($query){
		?>
<script>document.location.href="index.html";</script>
		<?php
	}else{
		echo mysql_query();
	}
	

}else{
	unset($_POST['kirim']);
}
?>