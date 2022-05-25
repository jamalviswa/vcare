<?php
session_start();
include "dbconnect.php";  
$id_sopir=$_SESSION['user'];

if(!isset($_SESSION['user']))
{
	header("Location: jdex.php#reg");
}
else if(isset($_SESSION['user'])!="")
{
	header("Location: jdex.php#reg");
}

if(isset($_GET['logout']))
{

	session_destroy();
	unset($_SESSION['user']);
	header("Location: jdex.php#reg");
}
?>