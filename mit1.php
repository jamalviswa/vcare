<?php
session_start();
include_once 'dbconnect.php';
if(!isset($_POST['submit']))
{
    
   $name=$_POST['name'];
   $service=$_POST['service'];
   $intime=$_POST['intime'];
   $date = date('Y-m-d');
 
  $outtime=$_POST['outime'];
  $status=$_POST['status'];
 


 $res=mysqli_query($mysqli, "INSERT INTO `driverfb` ( `name`,`datecr`,`service`, `intime`, `outime`, `status`) VALUES ('$name','$date','$service','$intime', '$outtime','$status');");
if($res)
{
 header('Location:thankyou.php ');

}
else
{
echo $date;

}
}


if(!isset($_POST['hlo']))
{
    
  echo"hihihi";
}
?>