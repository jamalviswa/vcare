<?php
session_start();

if(isset($_POST['submit']))
{
    $type=$_POST['type'];
}

include_once 'dbconnect.php';
if(!isset($_SESSION['user']))
{
	header("Location: firli.php#login");
}
/*$lat = mysqli_real_escape_string($mysqli, $_POST['lat']);
$lng = mysqli_real_escape_string($mysqli, $_POST['lng']);
$id = mysqli_real_escape_string($mysqli, $_POST['id']);
$TokenCek = mysqli_query($mysqli, "select * from users where id='$id'");
$computerId = $_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT'].$_SERVER['SERVER_ADDR'].$_SERVER['SERVER_PORT']; 
$benjo= str_replace(' ', '', $computerId);
if (empty($_POST['lat'])) {
mysqli_query($mysqli, "update users set Service_location='".$_POST['location']."' ,Service_name='".$_POST['type']."' , lat='-6.936019942295096', lng='107.64282666930762', forgot_pass_identity='$benjo' where id='$id'");
}
//save contents to database
mysqli_query($mysqli, "update users set Service_location='".$_POST['location']."',Service_name='".$_POST['type']."' ,lat='$lat', lng='$lng', service='1', forgot_pass_identity='$benjo',isOpen='yes' where id='$id'");
//get timestamp
//output timestamp
*/

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
// 		print_r("hai");


// exit;   
	   }
?>

<center style="color:#000;padding:20px;">
    
    <img src="success.png" style="width:100%;">
    <h1><b>Thank You for Contacting Us.</b></h1><br><h3>Our Technical Team will contact you Soon.</h3>
    <a href="home.php"><button style="border-radius:20px; color:#FFA800;width:40%;padding:10px;background:#101D25"><b>Go Home</b></button></a>
</center>

<script>
 function showAndroidDialog(dialogmsg) {
Android.showDialog(dialogmsg);
Android.play();
    }
</script>
<input style = "display:none;"type="button" id="Android" name="Android" onload="showAndroidDialog('have request')" />


