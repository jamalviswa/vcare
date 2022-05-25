<?php
global $conn;
$servername = "localhost";
$username = "firstrou_beko";
$password = "FirstRouteBeko1234";
$dbname = "firstrou_beko";


$conn = mysqli_connect($servername,$username,$password,$dbname);
if (!$conn){
    die("Connection failed : ".mysqli_connect_error());
}

?>
<?php 
	include "../dbconnect.php";
	if (isset($_POST["kirim"])) {
		$jumlah = count($_FILES['gambar']['name']);
		if ($jumlah > 0) {
			for ($i=0; $i < $jumlah; $i++) { 
				$file_name = $_FILES['gambar']['name'][$i];
				$tmp_name = $_FILES['gambar']['tmp_name'][$i];				
				move_uploaded_file($tmp_name, "../../fotobarang/".$file_name);
				mysqli_query($conn,"INSERT INTO galery(idproduct, gbr) VALUES('1','$file_name')");				
			}
			echo "Berhasil Upload";
		}
		else{
			echo "Gambar tidak ada";
		}
	}
	
?>
<html>
	<head></head>
	<body>
		<form action="" method="POST" enctype="multipart/form-data">
			<input type="file" name="gambar[]" multiple>
			<br>
			<input type="submit" name="kirim" value="kirim">
		</form>
	</body>
</html>