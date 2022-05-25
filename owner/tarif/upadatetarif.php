   <body> 
    <?php
	include_once("../dbconnect.php");
	print_r($_POST);
	exit;
$idtarif = $_GET['idtarif'];
	$query=mysqli_fetch_array(mysqli_query($mysqli, "select * from tarif where id_tarif='$idtarif'"));
	$idtarif=$query['idtarif'];
	$transportasi = $query['transportasi'];
	$transportasimobil = $query['transportasimobil'];
	$makanan = $query['makanan'];
	$paket = $query['paket'];
	?>
<form id="form"action="simpantarif.php" enctype="multipart/form-data"  method="post" name="postform">
<input type="hidden" name="idtarif" value="<?php echo $idtarif;?>" />
<center><h3>Change Service price</h3></center>
<table>
<tr>
<td style="border-bottom:1px solid grey"> Price for Barisandata Motorcycle transportation rate per KM :</td>
<td>USD  <input id='txt' type="number" name="transportasi"required="required" value="<?php echo $transportasi;?>"></td>
</tr>
<tr>
<td style="border-bottom:1px solid grey"> Price for Barisandata Car transportation rate per KM :</td>
<td>USD  <input id='txt' type="number" name="transportasimobil"required="required" value="<?php echo $transportasimobil;?>"></td>
</tr>
<tr>
<td style="border-bottom:1px solid grey">Price for Barisandata DElivery Food transportation rate per KM :<br>
* Barisandata Food/drink <br>Distance from rentaurant to customer house
</td>
<td>USD  <input id='txt' type="number" name="makanan"required="required" value="<?php echo $makanan;?>"></td>
</tr>
<tr>
<td style="border-bottom:1px solid grey">Price for Barisandata Cargo good transportation rate per KM :<br>
* For send goods or package <br>price for send from customer house to destination
</td>
<td>USD  <input id='txt' type="number" name="paket"required="required" value="<?php echo $paket;?>"></td>
</tr>
    <tr>
      <td>&nbsp;</td>
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
document.getElementById("txt").onkeypress = function(e) {
    var chr = String.fromCharCode(e.which);
    if ("1234567890".indexOf(chr) < 0)
        return false;
};
</script>
      <td><br><br><input type="submit" value="Save"  onclick="return confirm('are you sure to change?')"name="kirim" /><br><br><a a href="javascript:history.back()" style="color:orange">Cancel</a></td>
    </tr>
    </table>
    </form>
    <p><br /></p></body>