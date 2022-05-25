<?php
//including the database connection file
include("dbconnect.php");
//getting id of the data from url
//deleting the row from table
$ip=$_POST['ip'];
$hostname=$_POST['hostname'];
$city=$_POST['city'];
$country=$_POST['country'];
$region=$_POST['region'];
$loc=$_POST['loc'];
$layanan=$_POST['layanan'];
 if($_POST['layanan']=='buy')
      { 
 $result = mysqli_query($mysqli, "UPDATE `transaksi` SET `id_mitra` = '" . $_POST["id_sopir"] . "', `status_trans` = 'dijemput',  `tipebayar` = '-',`online` = 'read' WHERE `transaksi`.`id_trans` = '" . $_POST["id_trans"] . "';"); 
	  }else{
$result = mysqli_query($mysqli, "UPDATE `transaksi` SET `id_mitra` = '" . $_POST["id_sopir"] . "', `status_trans` = 'dijemput',  `tipebayar` = '',`online` = 'read' WHERE `transaksi`.`id_trans` = '" . $_POST["id_trans"] . "';");
	  }
$result = mysqli_query($mysqli, "INSERT INTO tracking VALUES('', '$kodetrans', '$ip', '$hostname', '$city', '$region', '$country', '$loc')");

//redirecting to the display page (index.php in our case)
header("Location:jemput.php");
?>

