<?php
include_once 'dbconnect.php';

if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
} 
session_start();
if(!isset($_SESSION['user']))
{
	header("Location: mithome.php");
}
$kufuan="SELECT * FROM users where id='".$_SESSION['user']."'";
$yupuan = mysqli_query($con,$kufuan);
$gupuan = mysqli_fetch_array($yupuan);

$kap=$gupuan['lat'];
$kop=$gupuan['lng'];
$brul="SELECT id_sensor, nama_sensor, latsensor, lngsensor, ( 3959 * acos( cos( radians('$kap') ) * cos( radians( latsensor ) ) * cos( radians( lngsensor ) - radians('$kop') ) + sin( radians('$kap') ) * sin( radians( latsensor ) ) ) ) AS distance FROM sensor HAVING distance < '570' ORDER BY distance";
$sim = mysqli_query($con,$brul);
$sul = mysqli_fetch_array($sim);
$count = mysqli_num_rows($sim); 
if($count >= 1){
$yat=$gupuan['lat'];
$yop=$gupuan['lng'];
$sql="SELECT id_trans, tanggal, id_users, layanan, kode_trans, tipe, id_mitra, alamat, lat, lng, tujuan, harga, status_trans, aktif, tipebayar, timepicker1, ( 3959 * acos( cos( radians('$yat') ) * cos( radians( lat ) ) * cos( radians( lng ) - radians('$yop') ) + sin( radians('$yat') ) * sin( radians( lat ) ) ) ) AS distance FROM transaksi WHERE status_trans='minta' HAVING distance < '570' ORDER BY distance";
$eful = mysqli_query($con,$sql);
while($yur = mysqli_fetch_array($eful)) {
$teh=$yur['id_users'];
$mafia="SELECT * FROM users where id='".$teh."'";
$migas = mysqli_query($con,$mafia);
$sil = mysqli_fetch_array($migas);
?>

<style>.jontainer{border:2px solid #dedede;background-color:#f1f1f1;border-radius:5px;padding:10px;margin:10px 0}.darker{border-color:#ccc;background-color:#ddd}.jontainer::after{content:"";clear:both;display:table}.jontainer img{float:left;max-width:60px;width:100%;margin-right:20px;border-radius:50%}.jontainer img.right{float:right;margin-left:20px;margin-right:0}.time-right{float:right;color:#aaa}.time-left{float:left;color:#999}</style>
<a href="edit.php?id_trans=<?php echo $yur['id_trans'];?>" onclick="javascript:showDiv();">
<div class="jontainer">
<img src="<?php echo $sil['picture'];?>" alt="Avatar" style="width:30px"><b><small style="color:#444;font-size:10px;float:left;margin-left:-10px"><?php echo $sil['first_name'];?> <?php echo $sil['last_name'];?></small></b><br>
<div style="float:left;font-family:segoe UI light;color:#444"><?php echo $yur['layanan']; ?> <?php echo $yur['tipe']; ?><br>
<small style="text-align:left">from <?php echo $yur['alamat'];?> <br>to <?php echo $yur['tujuan'];?><br>
Total price: USD  <?php 
$layanan = $yur['harga'];
$harga = number_format($layanan,0,",",".");
echo $harga;?>,-<br></small></center>
</div></a>
<span class="time-right" style="font-weight:normal"><small><?php echo $yur['tanggal'];?> || Request code: <?php echo $yur['kode_trans'];?></small></span>
</div> 
<?php 
}}
mysqli_close($con);
?>
<?php
if(!($mysqli = mysqli_connect("localhost", "viswatechnologys_webtrack", "!dsnUDD5Ilf2")))
{
	die('oops connection problem ! --> '.mysqli_error($mysqli));
}
if(!mysqli_select_db($mysqli, "viswatechnologys_barisand_cargo"))
{
	die('oops database selection problem ! --> '.mysqli_error($mysqli));
}

$jatuhtempo=date('d-m-Y');
$query = "SELECT COUNT(*) AS total FROM transaksi where status_trans='minta'"; 
$result = mysqli_query($mysqli, $query); 
$values = mysqli_fetch_assoc($result); 
$num_rows = $values['total']; 
	   if ($num_rows==1)
	   {
		 ?>
<script>
window.onload=function(){
document.getElementById('Android').click();
};
// document.getElementById('Android').click();
</script>

<?php
		   
	   }
?>
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>-->

<script>
 function showAndroidDialog(dialogmsg) {
     alert("hai");
Android.showDialog(dialogmsg);
Android.play();
    }
</script>
<input style="visibility:hidden" type="button" id="Android" name="Android" onload="showAndroidDialog('Ada request')" />
