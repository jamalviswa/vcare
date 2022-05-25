<table width="100%"><?php
include "dbconnect.php";
if(isSet($_POST['getLastContentId']))
{
$getLastContentId=$_POST['getLastContentId'];
$result=mysqli_query($mysqli, "SELECT product_id, product_tag, product_price_view, hargaeceran, product_image_ori FROM jw_product where product_id >".$getLastContentId." order by product_id ASC limit 6");
$count=mysqli_num_rows($result);
if($count>0){
while($row=mysqli_fetch_array($result))
{
$menu_id=$row['menu_id'];
$product_id=$row['product_id'];
$product_tag=$row['product_tag'];
$product_price_view=$row['product_price_view'];
$product_price=$row['product_price'];
$product_image_ori=$row['product_image_ori'];
?>
<li>
<a style="padding-bottom:20px;" onclick="javascript:showDiv();" href="homes.php?product_id=<?php echo $row['product_id'];?>">
<table width="100%"style="padding-bottom:10px;margin-top:-35px;background-color:#ffff;color:#444">
<tr style="font-size:11px;border-top:1px solid #dcdcdc;">
<td width="30%">
	<?php
 if($row['product_image_ori']=='0')
      { ?>
<img src="icon/nopic.png" style="float:right;width:80px;top:0;"/>
<?php }
else{?>
<img src="fotobarang/<?php echo $row['product_image_ori'];?>" style="padding:10px;width:100px;"onclick="javascript:showDiv();"/>
<?php } ?>
</td>
<td width="70%"style="font-size:11px;padding:10px">
<b><small><?php echo $row['product_tag'];?>
</small></b><br>
<?php 
$sebagai=$rows['tipeuser'];
if($sebagai == 'Eceran'){?>
USD  <?php 
$sistim = $row['hargaeceran'];
$rego = number_format($sistim,0,",",".");
echo $rego;?><br><small>(per quantity)</small>
<input type="hidden"name="hrg"value="<?php echo $row['hargaeceran'];?>"/>
<?php } 
?>
<div style="float:right;font-size:12px;"><img style="vertical-align:middle;margin-top:5px;margin-right:15px;" src="icon/cart.png" width="25px"/></div>
</td>
</tr>
</table></a>
</li>
<center>
<div class="more_div"><a href="#"><div id="load_more_<?php echo $product_id; ?>" class="more_tab">
<div class="more_button" id="<?php echo $product_id; ?>"style="border: 1px solid #868686;border-radius:5px;color: #868686;width: 200px;">Lihat berikutnya</div></a></div></center><br><br>
</div>
 
<?php
} else{
echo "<center><div class='all_loaded' style='color:#444'>Data sudah ditampilkan semua</div></center>";
}
}
?>