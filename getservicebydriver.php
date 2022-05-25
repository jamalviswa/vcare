<?php
session_start();
include_once 'dbconnect.php';
if(!isset($_SESSION['user']))
{
	header("Location: firli.php#login");
}


// $lat = mysqli_real_escape_string($mysqli, $_POST['lat']);
// $lng = mysqli_real_escape_string($mysqli, $_POST['lng']);
$id =  $_POST['id'];
$service =  $_POST['service'];
$TokenCek = mysqli_query($con, "select * from users where id='$id'");
$computerId = $_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT'].$_SERVER['SERVER_ADDR'].$_SERVER['SERVER_PORT']; 
$benjo= str_replace(' ', '', $computerId);

// if ($service == 1) {//empty($_POST['lat'])
$time = mysqli_query($mysqli, "select * from users where service='0' and sebagai = 'user' and tech_id=".$id);

foreach($time as $key => $row){
   $then['lat'] = $row['lat'] ;
 $then['lng'] = $row['lng'];
$then['first_name'] = $row['first_name'];
 echo json_encode($then);
//   echo 1;
// }

}
?>
