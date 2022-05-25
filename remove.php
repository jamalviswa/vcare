<?php 
include "../dbconnect.php";
$id = $_POST['id'];
if($id > 0){

	// Check record exists
	$checkRecord = mysqli_query($con,"SELECT * FROM keranjang WHERE idcatalog='".$id."'");
	$totalrows = mysqli_num_rows($checkRecord);
				
	$him = mysqli_query($con,"SELECT * FROM keranjang WHERE idcatalog='".$id."'");
	$gims = mysqli_fetch_array($him);
$idbarang = $gims['idbarang'];
$quantity = $gims['quantity'];
$tagalog = $gims['idcatalog'];

	$lim = mysqli_query($con,"SELECT * FROM jw_product WHERE product_id='".$idbarang."'");
	$mim = mysqli_fetch_array($lim);
$product_id = $mim['product_id'];
$adastock = $mim['stock'];
$adasales = $mim['sales'];
$stockupdate = $adastock+$quantity;
$sales = $adasales-$quantity;

	if($totalrows > 0){
		// Delete record
		$query = "DELETE FROM keranjang WHERE idcatalog='".$id."'";
		mysqli_query($con,$query);
		
		$mujeri = "UPDATE jw_product set stock='".$stockupdate."',sales='".$sales."' WHERE product_id='".$product_id."'";
		mysqli_query($con,$mujeri);
echo 1;
exit;
	}
}

echo 0;
exit;