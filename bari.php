<table width="100%" style="color:#444;border-bottom:1px solid #d4d4d4;font-size:14px;padding:4px;">
<?php
include "dbconnect.php";
$k=$_POST['k'];
$query=mysqli_query($mysqli, "select * from users where sebagai='narasumber' and ahlibidang like '%".$k."%' or first_name like '%".$k."%' LIMIT 10");
$row=mysqli_num_rows($query);
if ($row > 0) // jika baris lebih dari 0 / data ditemukan
{
	
$i = 0;
while ($data=mysqli_fetch_array($query)) // perulangna untuk menampilkan data
	{
?>
<?php 
if ( $i % 3 == 0 && $i != 0 && $i != $count ) echo "<tr></tr>"; ?>
<td style="width:33.4%;height:150px;">
<a href="narasumber.php?id=<?php echo $data['id'];?>"><center>
<img src="foto_mitra/<?php echo $data['picture'];?>" style="width:90;height:90px;border-radius:50%;padding:5px;" onclick="javascript:showDiv()"/>
<div style="font-weight:normal;color;font-size:11px;padding-bottom:5px">
<?php echo $data['first_name'];?><br><small><?php echo $data['ahlibidang'];?></small>
</div>
</a>
</center>
</td>
<?php $i++;} ?>
</table><?php } 
else // jika data tidak ditemukan
{
	echo "<br><br><center><strong>Data tidak ditemukan</strong></center>";	
}
?><style>#loading{display:block;position:absolute;top:0;left:0;z-index:99999;width:100vw;height:100vh;background-image:url("hourglass.svg");background-repeat:no-repeat;background-position:center}</style>
<div id="loading" style="display:none">
</div>
<script type="text/javascript">function showDiv(){div=document.getElementById("loading");div.style.display="block"};</script>
