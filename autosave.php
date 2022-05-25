<?php
session_start();
include_once 'dbconnect.php';
if(!isset($_SESSION['user']))
{
	header("Location: firli.php#login");
}


$lat = mysqli_real_escape_string($mysqli, $_POST['lat']);
$lng = mysqli_real_escape_string($mysqli, $_POST['lng']);
$id = mysqli_real_escape_string($mysqli, $_POST['id']);
$TokenCek = mysqli_query($mysqli, "select * from users where id='$id'");
$computerId = $_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT'].$_SERVER['SERVER_ADDR'].$_SERVER['SERVER_PORT']; 
$benjo= str_replace(' ', '', $computerId);
if (empty($_POST['lat'])) {
mysqli_query($mysqli, "update users set lat='-6.936019942295096', lng='107.64282666930762', forgot_pass_identity='$benjo' where id='$id'");
}
//save contents to database
mysqli_query($mysqli, "update users set lat='$lat', lng='$lng', forgot_pass_identity='$benjo' where id='$id'");
//get timestamp
//output timestamp

// $jetis= $rows['jenistransportasi'];
$query = "SELECT COUNT(*) AS total FROM transaksi where status_trans='minta'"; 
$result = mysqli_query($mysqli, $query); 
$values = mysqli_fetch_assoc($result); 
$num_rows = $values['total']; 

	   if ($num_rows==1)
	   {
		   ?>
		
<script>
// window.onload=function(){
// document.getElementById('Android').click();
    
// };
// document.getElementById('Android').click();
</script>
<?php
		print_r("hai");
exit;   
	   }
?>

<script>
 function showAndroidDialog(dialogmsg) {
     alert("hai");
Android.showDialog(dialogmsg);
Android.play();
    }
</script>
<input style="visibility:hidden" type="button" id="Android" name="Android" onload="showAndroidDialog('have request')" />