   <body> 
    <?php
	include_once("../dbconnect.php");
$idlimit = $_GET['idlimit'];
	$query=mysqli_fetch_array(mysqli_query($mysqli, "select * from limithutang where idlimit='$idlimit'"));
	$idlimit=$query['idlimit'];
	$jumlahlimit = $query['jumlahlimit'];
	$keterangan = $query['keterangan'];
	?>
<form id="form"action="simpantarif.php" enctype="multipart/form-data"  method="post" name="postform">
<input type="hidden" name="idlimit" value="<?php echo $idlimit;?>" />
<center><h3>Ubah Limit pembelian untuk setiap user</h3><small>Fungsi limit pembelian ini adalah untuk membatasi total pembelian Product oleh setiap user, jika melebihi limit user tidak bisa order lagi</small></center>
<table>
<td style="border-bottom:1px solid grey">Keterangan :<br>
* Keterangan limit
</td>
<td><input type="text" name="keterangan"required="required" value="<?php echo $keterangan;?>"></td>
</tr>
<tr>
<td style="border-bottom:1px solid grey">Jumlah limit:<br>
* Berapa Jumlah Limit?
</td>
<td><input type="number" name="jumlahlimit"required="required" value="<?php echo $jumlahlimit;?>"></td>
</tr>
    <tr>
      <td>&nbsp;</td>
      <td><br><br><input type="submit" value="Save"  onclick="return confirm('Sure to change bank information?')"name="kirim" /><br><br><a a href="javascript:history.back()" style="color:orange">Cancel</a></td>
    </tr>
    </table>
    </form>
    <p><br /></p></body>