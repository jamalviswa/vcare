<?php
include_once("../dbconnect.php");
if(isset($_POST['kirim'])){
	$invoice=$_POST['invoice'];
	$foto_ktp= $_POST['foto_ktp'];
	$testimoni= $_POST['testimoni'];
	
	if(empty($_FILES['foto_ktp']['name'])){
		$foto_ktp=$_POST['foto_ktp'];
	}else{
		$foto_ktp=$invoice.$_FILES['foto_ktp']['name'];
		
		//definisikan variabel file dan alamat file
		$uploaddir='../attach/';
		$alamatfile=$uploaddir.$foto_ktp;

		//periksa jika proses upload berjalan sukses
		$upload=move_uploaded_file($_FILES['foto_ktp']['tmp_name'],$alamatfile);
	}
	
$cash=$_POST['tipebayar'];
$id_mitra=$_POST['id_mitra'];
$harga=$_POST['harga'];
$id_users=$_POST['id_users'];

$result = mysqli_query($mysqli, "SELECT * FROM mitra WHERE id_mitra='$id_mitra'");
$row= mysqli_fetch_array($result);

$id_users=$now['id_users'];
$useUSD int=$now['saldo'];

if ($cash=='cash') {
$point=$row['saldo'];
$haUSD int=$harga;
$cashpoint=$point-$haUSD int;
$query=mysqli_query($mysqli, "update mitra set saldo='$cashpoint' where id_mitra='$id_mitra'");

} 
if ($cash=='point') {
$point=$row['saldo'];
$char=10;
$saldopoint=$point+$char;
$query=mysqli_query($mysqli, "update mitra set saldo='$saldopoint' where id_mitra='$id_mitra'");
	
 } 
if ($cash=='transfer') {
$point=$row['saldo'];
$haUSD int=$harga*70/100;
$cashsaldo=$point+$haUSD int;
$query=mysqli_query($mysqli, "update mitra set saldo='$cashsaldo' where id_mitra='$id_mitra'");

 } 

$jerim = mysqli_query($mysqli, "SELECT SELECT COUNT(*) AS total FROM transaksi WHERE id_users='$id_users'");
$temul= mysqli_fetch_array($jerim);
$values = mysqli_fetch_assoc($jerim); 
$jim_rows = $values['total'];
if($jim_rows == '11'){ 
$kasuse=$useUSD int+10;
$query=mysqli_query($mysqli, "update users set point='$kasuse' where id='$id_users'");	
}
if($jim_rows == '21'){ 
$kasuse=$useUSD int+10;
$query=mysqli_query($mysqli, "update users set point='$kasuse' where id='$id_users'");	
}
if($jim_rows == '31'){ 
$kasuse=$useUSD int+10;
$query=mysqli_query($mysqli, "update users set point='$kasuse' where id='$id_users'");	
}
if($jim_rows == '41'){ 
$kasuse=$useUSD int+10;
$query=mysqli_query($mysqli, "update users set point='$kasuse' where id='$id_users'");	
}
$jemul = mysqli_query($mysqli, "SELECT * FROM users WHERE id='$id_users'");
$now= mysqli_fetch_array($jemul);
$cashuser=$useUSD int+1;
$query=mysqli_query($mysqli, "update users set point='$cashuser' where id='$id_users'");	
$query=mysqli_query($mysqli, "update transaksi set status_trans='finish', aktif='no', testimoni='$testimoni', foto_ktp='$foto_ktp' where invoice='$invoice'");


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