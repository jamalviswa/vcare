<?php
include_once("../dbconnect.php");
if(isset($_POST['kirim'])){

	$id_trans=$_POST['id_trans'];
	$mitra_attach= $_POST['mitra_attach'];
	
	if(empty($_FILES['mitra_attach']['name'])){
		?>
<script>window.alert("Foto tidak berhasil diupload!");window.history.back(-1);</script><?php
	}else{
		
		$mitra_attach=$_FILES['mitra_attach']['name'];
		
		//definisikan variabel file dan alamat file
		$uploaddir='../attach/';
		$alamatfile=$uploaddir.$mitra_attach;
		
		$upload=move_uploaded_file($_FILES['mitra_attach']['tmp_name'],$alamatfile);

	}

	$query=mysqli_query($mysqli, "update transaksi set mitra_attach='$mitra_attach' where id_trans='$id_trans'");
					**//	
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