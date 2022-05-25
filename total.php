<?php
session_start();
include_once 'dbconnect.php';
if(!isset($_SESSION['user']))
{
	header("Location: firli.php#login");
}
$res=mysqli_query($mysqli, "SELECT * FROM users WHERE id=".$_SESSION['user']);
$rows=mysqli_fetch_array($res);

$query = "SELECT sum(tot) FROM keranjang WHERE id_users='".$_SESSION['user']."' and aktif='yes' and idtrans='0' and checkout='no'"; 
$result = mysqli_query($mysqli, $query); 
$values = mysqli_fetch_assoc($result); 
$num_rows = $values['sum(tot)']; 
$total = number_format($num_rows,0,",",".");
echo 'USD  '.$total.',-';
?>
