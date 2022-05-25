<form action="simpankordinat.php" enctype="multipart/form-data"  method="post" name="postform">
   <body> 
    <?php
	include_once("../dbconnect.php");
$id_mitra= $_GET['id_mitra'];
	$query=mysqli_fetch_array(mysqli_query($mysqli, "select * from mitra where id_mitra='$id_mitra'"));
$nama_mitra= $query['nama_mitra'];
	$latmitra=$query['latmitra'];
	$lngmitra= $query['lngmitra'];
	?>
    <table>
<tr>
<td>Nama Pemilik Kedai</td>
<td><input type="text" name="nama_mitra" required="required" value="<?php echo $nama_mitra;?>"></td>
</tr>
   <tr>
<input type="hidden" name="id_mitra" required="required" value="<?php echo $id_mitra;?>">
<td>Latitude </td>
<td><input type="text" name="latmitra" required="required" value="<?php echo $latmitra;?>"></td>
</tr>
<tr>
<td>Logitude </td>
<td><input type="text" name="lngmitra" required="required" value="<?php echo $lngmitra;?>"></td>
</tr>
    <tr>
      <td>&nbsp;</td>
      <td><a href="index.php"style="color:orange">Batal Ubah data</a></td>
      <td><input type="submit" value="Simpan"  onclick="return confirm('Apakah Anda yakin akan mengubah data?')"name="kirim" /></td>
    </tr>
    </table>
    </form>
    <p><br /></p></body>