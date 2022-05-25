   <body> 
    <?php
	include_once("../dbconnect.php");
$id_liburan= $_GET['id_liburan'];
$query=mysqli_fetch_array(mysqli_query($mysqli, "select * from liburnasional where id_liburan='$id_liburan'"));
$tanggal_liburan= $query['tanggal_liburan'];
$keterangan_liburan= $query['keterangan_liburan'];
	?><br><br><br><br>
<form action="simpanupdate.php" enctype="multipart/form-data"  method="post" name="postform">

<table style="width:100%;padding:10px">
  <tr style="padding:10px">
    <th colspan="4" style="padding:10px"></th>
  </tr>

   <tr>
    <td style="padding:10px;background:#dadada">Tanggal Libur</td>
    <td><input style="padding:10px;width:100%"type="date" placeholder="Hari libur" value="<?php echo $tanggal_liburan;?>" name="tanggal_liburan"required="required"></td>

	  <td style="padding:10px;background:#dadada">Deskripsi Layanan</td>
    <td><textarea style="padding:10px;width:100%"type="text" name="keterangan_liburan"required="required"><?php echo $keterangan_liburan;?></textarea></td>
<input type="hidden" name="id_liburan" value="<?php echo $id_liburan;?>"/>
	  </tr>
   

			<tr> 
			<td>
<center><a href="index.php"><div style="background:red;width:200px;border:none;padding:10px;width:90%;color:#fff" class="testbutton">Batal</div></a>
</center>
				</td>
				<td><center><button style="background:green;width:200px;border:none;padding:10px;width:90%;color:#fff" class="testbutton" type="submit" name="kirim" value="Simpan Data">Simpan Data</button></center></td>
			</tr>
		</table>
  
		<br>
	</form>
    <p><br /></p></body>