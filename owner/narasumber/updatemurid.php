   <body> 
    <?php
	include_once("../dbconnect.php");
$id = $_GET['id'];
	$query=mysqli_fetch_array(mysqli_query($mysqli, "select * from users where id='$id'"));
	$id = $query['id'];
	$first_name = $query['first_name'];
	$tipeuser = $query['tipeuser'];
	$akses = $query['akses'];
	?><br><br><br>
<form id="form"action="simpanmurid.php" enctype="multipart/form-data"  method="post" name="postform">
<input type="hidden" name="id" value="<?php echo $id;?>" />
<table><tr>
<td>Aktifkan akun user <?php echo $first_name;?> :</td>
<td>
<select name="akses">
<option name="akses" value="">-Pilihan status-</option>
<option name="akses"value="1">Nonaktifkan</option>
<option name="akses"value="0">Verifikasi</option>
</select></td>
</tr><tr>
<td>pilih hak akses untuk <?php echo $first_name;?> :</td>
<td>
<select name="tipeuser"required=required>
<option name="tipeuser" value="">-Pilihan-</option>
<option name="tipeuser"value="Eceran">Eceran</option>
<option name="tipeuser"value="Grosir">Grosir</option>
<option name="tipeuser"value="Dealer Kecil">Dealer Kecil</option>
<option name="tipeuser"value="Dealer Besar">Dealer Besar</option>
<option name="tipeuser"value="Distributor Kecil">Distributor Kecil</option>
<option name="tipeuser"value="Distributor Besar">Distributor Besar</option>
<option name="tipeuser"value="Cabang">Cabang</option>
</select></td>
</tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><input type="submit" value="Simpan"  onclick="return confirm('Apakah Anda yakin akan mengubah akses user?')"name="kirim" /><br><br><a href="index.php"style="color:orange">Batal Ubah data</a></td>
    </tr>
    </table>
    </form>
    <p><br /></p></body>