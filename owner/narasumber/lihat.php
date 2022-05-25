<body style="padding:20px;font-family:segoe UI">
    <?php
	include_once("../dbconnect.php");
$id = $_GET['id'];
	$query=mysqli_fetch_array(mysqli_query($mysqli, "select * from users where id='$id'"));
	$total_votes=$query['total_votes'];
	$total_points=$query['total_points'];
	$id=$query['id'];
	$email=$query['email'];
	$first_name = $query['first_name'];
	$last_name = $query['last_name'];
	$oauth_provider = $query['oauth_provider'];
	$oauth_uid = $query['oauth_uid'];
	$picture = $query['picture'];
	$link = $query['link'];
	$phone = $query['phone'];
	$saldo = $query['saldo'];
	$pembelian = $query['pembelian'];
	$password= $query['password'];
	$noktp = $query['noktp'];
	
	
	$tempatlahir = $query['tempatlahir'];
	$tgllahir = $query['tgllahir'];
	$kelamin = $query['kelamin'];
	$agama = $query['agama'];
	$alamat1 = $query['alamat1'];
	$kota = $query['kota'];
	$provinsi = $query['provinsi'];
	$pendidikan = $query['pendidikan'];
	$profesi = $query['profesi'];
	$jabatan = $query['jabatan'];
	$pendapatan = $query['pendapatan'];
	$statusnikah = $query['statusnikah'];
	$pengalaman = $query['pengalaman'];
	$almamater = $query['almamater'];
	$ahlibidang = $query['ahlibidang'];
	$sebagai = $query['sebagai'];
	?>
	<center><h2>Profile Driver</h2></center>
<table >
  <tr >
    <th style="padding:20px;" rowspan="19">
<?php if($oauth_uid==''){
?><img src="../../foto_mitra/<?php echo $picture;?>" style="width:100px"/>
	  <?php } else {?>
<img src="<?php echo $picture;?>" style="width:100px"/>
	<?php }
?>
    <th ></th>
    <th ></th>
    <th ></th>
  </tr>

<tr>
<td>Name</td>
      <td>:</td>
<td><?php echo $first_name;?> <?php echo $last_name;?></td>
</tr>
<tr>
<td>Email</td>
      <td>:</td>
<td><?php echo $email;?></td>
</tr>
<tr>
<td>National Identity number</td>
      <td>:</td>
<td><?php echo $noktp;?></td>
</tr>

<tr>
<td >Sex</td>
      <td>:</td>
<td ><?php echo $kelamin;?></td>
</tr>
<tr>
<td >Religion</td>
      <td>:</td>
<td ><?php echo $agama;?></td>
</tr>
<tr>
<td >Marital Status</td>
      <td>:</td>
<td ><?php echo $statusnikah;?></td>
</tr>
<tr>
<td >Phone</td>
      <td>:</td>
<td ><?php echo $phone;?></td>
</tr>
<tr>
<td >City born, Birth date</td>
      <td>:</td>
<td ><?php echo $tempatlahir;?>, <?php echo $tgllahir;?></td>
</tr>
<tr>
<td >Adress</td>
      <td>:</td>
<td >
<?php echo $alamat1;?><br>
<?php echo $kota;?><br>
<?php echo $provinsi;?><br>
</td>
</tr>
<tr>
<td >Job</td>
      <td>:</td>
<td ><?php echo $profesi;?></td>
</tr>
<tr>
<td >Vehicle</td>
      <td>:</td>
<td ><?php echo $jabatan;?></td>
</tr>
<tr>
<td >Sallary</td>
      <td>:</td>
<td ><?php echo $pendapatan;?></td>
</tr>
<tr>
<tr>
<td >Education</td>
      <td>:</td>
<td ><?php echo $almamater;?></td>
</tr>
<tr>
<tr>
<td >Ahli Bidang</td>
      <td>:</td>
<td ><?php echo $ahlibidang;?></td>
</tr>
<tr>

<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
  
    </table>
    <p style="border-bottom:1px solid <br /></p>
	
	</body>