<?php
if(!($GLOBALS["___mysqli_ston"] = mysqli_connect("localhost", "barisand_bidjobs", "OracleCloud1234")))
{
	die('oops connection problem ! --> '.mysqli_error($GLOBALS["___mysqli_ston"]));
}
if(!mysqli_select_db($mysqli, "barisand_bidjobs"))
{
	die('oops database selection problem ! --> '.mysqli_error($GLOBALS["___mysqli_ston"]));
}

$jatuhtempo=date('d-m-Y');
$query = "SELECT COUNT(*) AS total FROM panic where statuspanic='dijemput'"; 
$result = mysqli_query($mysqli, $query); 
$values = mysqli_fetch_assoc($result); 
$num_rows = $values['total']; 
echo $num_rows;
	   if ($num_rows>0)
	   {
		 ?>
<audio controls autoplay style="visibility:hidden"name="Android" id="Android" src="Android.mp3" preload="auto"></audio>
<audio name="Android" id="Android" src="Android.mp3" preload="auto"></audio>
<style>
#hideme {
    -webkit-animation: cssAnimation 105s forwards; 
    animation: cssAnimation 105s forwards;
}
@keyframes cssAnimation {
    0%   {opacity: 1;}
    90%  {opacity: 1;}
    100% {opacity: 0;}
}
@-webkit-keyframes cssAnimation {
    0%   {opacity: 1;}
    90%  {opacity: 1;}
    100% {opacity: 0;}
}
</style>
<div id="hideme"style="font-family:segoe UI;width:100%;position:relative;color:#ef2525;z-index:99999;top:0px;padding:20px;box-shadow:5px 2px 8px 1px rgba(0,0,0,0.15);background-color:rgba(255, 255, 82, 0.95)">
<center>Panic button Alert !!!!<br> Call Police</center><br>
<?php 
$view=mysqli_query($mysqli, "SELECT * FROM panic");
while($data=mysqli_fetch_array($view)){
?>
<?php 
     
 if($data['statuspanic']=='dijemput')
      { 
$id_trans=$data['id_trans'];
$miow=mysqli_query($mysqli, "SELECT * FROM transaksi INNER JOIN users ON transaksi.id_mitra=users.id where id_trans='$id_trans'");
$paka=mysqli_fetch_array($miow);
  ?>
<table style="width:100%">
<tr><td >
<div style="font-size:12px;color:#444">
<b><small>Panic button Emergency <?php echo $paka["first_name"]; ?></small></b><br>
<table style="width:100%">
<tr style="font-size:12px;color:#565656"><td>Invoice Code</td><td>:</td><td width="50%"> <?php echo $paka['kode_trans']; ?></td></tr>
<tr style="font-size:12px;color:#565656"><td>Services</td><td>:</td><td width="50%"> <?php echo $paka['layanan']; ?> <?php echo $paka['tipe']; ?></td></tr>
<tr style="font-size:12px;color:#565656"><td>Date</td><td>:</td><td width="50%"> <?php echo $paka['tanggal']; ?></td></tr>
<tr style="font-size:12px;color:#565656"><td>Total Invoice</td><td>:</td><td width="50%"> USD<?php 
$jika = $paka['harga'];
$toto = number_format($jika,0,",",".");
echo $toto;?></td></tr>
<tr style="font-size:12px;color:#565656"><td>Address</td><td>:</td><td width="50%"> <?php echo $paka["alamat"]; ?></td></tr>
<tr style="font-size:12px;color:#565656"><td>Details</td><td>:</td><td width="50%"> <?php echo $paka["tujuan"]; ?></td></tr>
<tr style="font-size:12px;color:#565656"><td>Latitude <?php echo $paka["first_name"]; ?></td><td>:</td><td width="50%"> <?php echo $paka["lat"]; ?></td></tr>
<tr style="font-size:12px;color:#565656"><td>Longitude <?php echo $paka["first_name"]; ?></td><td>:</td><td width="50%"> <?php echo $paka["lng"]; ?></td></tr>
</table>

</div>
<script src="../dist/spin.min.js"></script>
<script src="../dist/ladda.min.js"></script>
<script>Ladda.bind(".button-demo button");Ladda.bind(".progress-demo button",{callback:function(b){var a=0;var c=setInterval(function(){a=Math.min(a+Math.random()*0.1,1);b.setProgress(a);if(a===1){b.stop();clearInterval(c)}},200)}});</script>
</p>
</td>
</tr>
</table>
	  <?php  }     
	} ;
 ?>
</div>
<?php
		   
	   }
?>
