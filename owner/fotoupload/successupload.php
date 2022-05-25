<?php
include_once("../dbconnect.php");
if(isset($_POST['kirim'])){
	$id_trans=$_POST['id_trans'];
	$foto_stnk= $_POST['foto_stnk'];
	$foto_bpkb= $_POST['foto_bpkb'];
	$foto_ktp= $_POST['foto_ktp'];
	$foto_mobil= $_POST['foto_mobil'];
	
	if(empty($_FILES['foto_stnk']['name'])){
		$foto_stnk=$_POST['foto_stnk'];
	}else{
		$foto_stnk=$_FILES['foto_stnk']['name'];
		
		//definisikan variabel file dan alamat file
		$uploaddir='../attach/';
		$alamatfile=$uploaddir.$foto_stnk;

		//periksa jika proses upload berjalan sukses
		$upload=move_uploaded_file($_FILES['foto_stnk']['tmp_name'],$alamatfile);
	}

	//bpkb
		if(empty($_FILES['foto_bpkb']['name'])){
		$foto_bpkb=$_POST['foto_bpkb'];
	}else{
		$foto_bpkb=$_FILES['foto_bpkb']['name'];
		
		//definisikan variabel file dan alamat file
		$kuploaddir='../attach/';
		$dalamatfile=$kuploaddir.$foto_bpkb;

		//periksa jika proses upload berjalan sukses
		$zupload=move_uploaded_file($_FILES['foto_bpkb']['tmp_name'],$dalamatfile);
	}
	//ktp
	
		if(empty($_FILES['foto_ktp']['name'])){
		$foto_ktp=$_POST['foto_ktp'];
	}else{
		$foto_ktp=$_FILES['foto_ktp']['name'];
		
		//definisikan variabel file dan alamat file
		$fuploaddir='../attach/';
		$ralamatfile=$fuploaddir.$foto_ktp;

		//periksa jika proses upload berjalan sukses
		$nupload=move_uploaded_file($_FILES['foto_ktp']['tmp_name'],$ralamatfile);
	}
	//mobil
		if(empty($_FILES['foto_mobil']['name'])){
		$foto_mobil=$_POST['foto_mobil'];
	}else{
		$foto_mobil=$_FILES['foto_mobil']['name'];
		
		//definisikan variabel file dan alamat file
		$guploaddir='../attach/';
		$balamatfile=$guploaddir.$foto_mobil;

		//periksa jika proses upload berjalan sukses
		$vupload=move_uploaded_file($_FILES['foto_mobil']['tmp_name'],$balamatfile);
	}


	$query=mysqli_query($mysqli, "update transaksi set foto_mobil='$foto_mobil', foto_ktp='$foto_ktp', foto_bpkb='$foto_bpkb', foto_stnk='$foto_stnk'  where id_trans='$id_trans'");
						
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