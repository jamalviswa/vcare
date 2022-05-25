<?php
$session_lifetime = 3600 * 24 * 860; // 2 days
session_set_cookie_params ($session_lifetime);
session_start();
include_once 'dbconnect.php';
if(!isset($_SESSION['user']))
{
	header("Location: fdex.html#reg");
}
$res=mysqli_query($mysqli, "SELECT * FROM users WHERE id=".$_SESSION['user']);
$rows=mysqli_fetch_array($res);
		$_SESSION['user'] = $rows['id'];
	if($rows['sebagai']=='driver')
      {
	header("Location: maaf.php");
	  }
?>
<meta charset="UTF-8"/><meta http-equiv="X-UA-Compatible"content="IE=edge,chrome=1">
<meta name="viewport"content="width=device-width, initial-scale=1.0">
<script type="text/javascript" src="autosave5/jquery-1.6.1.js"></script>
<script type="text/javascript">/*<![CDATA[*/$(document).ready(function(){autosave()});function autosave(){var b=setTimeout("autosave()",);$("#timestamp").show(50).delay();var d=$("#id").val();var c=$("#lat").val();var a=$("#lng").val();if(c.length>0||a.length>0){$.ajax({type:"POST",url:"autosave.php",data:"&id="+d+"&lat="+c+"&lng="+a,cache:false,success:function(e){$("#timestamp").hide(50).delay();$("#timestamp").empty().append(e)}})}}/*]]>*/</script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=true"></script>
<script>if(!navigator.geolocation){alert("Your phone does not support maps Location.")}navigator.geolocation.getCurrentPosition(success,error);function success(c){var b=c.coords.latitude;var d=c.coords.longitude;var a=c.coords.accuracy;document.getElementById("lat").value=b;document.getElementById("lng").value=d}function error(a){alert("Nyalakan GPS smartphone anda dan pastikan ijin akses lokasi anda aktif")}</script>
<form id="article_form" method="post" action="autosave.php">
<input type="hidden" id="id" name="id" value="<?php echo $rows['id'];?>" />
<input type="hidden" id="lat" type="float" name="lat"/>
<input type="hidden" id="lng" type="float" name="lng"/>
</form>
<body onload="getLocation()" onkeydown="javascript:if(window.event.keyCode==13)window.event.keyCode=9">
<style>a:link,a:visited,a:hover,a:active{border:0}.slick-initialized .swipe-tab-content{position:relative;min-height:365px}@media screen and (min-width:767px){.slick-initialized .swipe-tab-content{min-height:500px}}.slick-initialized .swipe-tab{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-box-align:center;-webkit-align-items:center;-ms-flex-align:center;align-items:center;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;height:50px;background:0;border:0;color:#757575;cursor:pointer;text-align:center;border-bottom:2px solid transparent;-webkit-transition:all .01s;transition:all .01s}.slick-initialized .swipe-tab:hover{color:}.slick-initialized .swipe-tab.active-tab{border-bottom-color:#444;color:#444;font-weight:bold}.main-container{padding:0;background:#ffff}</style>
<link rel="stylesheet" type="text/css" href="slick.css"/>
<script src="slick.js"></script>
<script type="text/javascript" src="slick.min.js"></script>
<link rel="stylesheet"href="demo.css">
<link rel="stylesheet" href="w3.css">
<style>.sidenav{height:100%;width:0;position:fixed;z-index:1;top:0;left:0;background-color:#10afe4;overflow-x:hidden;transition:.01s;padding-top:60px;font-size:12px}.sidenav a{padding:8px 8px 8px 32px;text-decoration:none;font-size:12px;color:#ffff;display:block;transition:.01s}.sidenav a:hover{color:#f1f1f1}.sidenav .closebtn{position:absolute;top:0;right:25px;font-size:36px;margin-left:50px}@media screen and (max-height:450px){.sidenav{padding-top:15px}.sidenav a{font-size:18px}}</style>
<div id="mySidenav" class="sidenav" style="margin-top:60px">
<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
<a href="about.php#about" onclick="javascript:showDiv()"><img style="vertical-align:middle" src="img/schedule.png"width="25px"/> My Order</a>
<a  ><img style="vertical-align:middle" src="img/achievements.png"width="25px"/> Paket Promo</a>
<a href="https://profitgm.com" target="_blank"><img style="vertical-align:middle" src="img/ratings.png"width="25px"/> Kunjungi website</a>
<a  onclick="javascript:showDiv()"><img style="vertical-align:middle" src="img/voucher.png"width="25px"/> My Voucher</a>
</div>
<div class="sodrops-top" style="float:none;height:60px"><div style="float:right;font-size:12px"><a onclick="javascript:showDiv()" href="logout.php?logout"><img style="vertical-align:middle;margin-top:5px;margin-right:15px" src="specialicon/logout.png" width="25px"/></a></div>
<span style="margin-left:20px;margin-top:20px;font-size:25px;position:fixed;color:#fff;cursor:pointer" onclick="openNav()">&#9776;</span>
<script>function openNav(){document.getElementById("mySidenav").style.width="100%"}function closeNav(){document.getElementById("mySidenav").style.width="0"}</script>
<span class="actions">
<center><img style="position:fixed;margin-top:10px" src="transparent.png"width="40px"/></center>
</span>
</div>
<div style="width:100%"class="w3-container w3-center w3-animate-top">
<div class="sub-header" style="margin-top:60px;background:#efefef">
<div class="swipe-tabs">
<div class="swipe-tab" style="width:50px"><center><img style="vertical-align:middle;margin-top:5px" src="specialicon/icon/home.png"width="25px"/><small>Home</small></center></div>
<div class="swipe-tab" style="width:50px"><center><img style="vertical-align:middle;margin-top:5px" src="specialicon/history.png"width="25px"/><small>History</small></center></div>
<div class="swipe-tab" style="width:50px"><center><img style="vertical-align:middle;margin-top:5px" src="specialicon/notif.png"width="25px"/><small>Notification</small></center></div>
<div class="swipe-tab" style="width:50px"><center><img style="vertical-align:middle;margin-top:5px" src="specialicon/userblack.png"width="25px"/><small>Account</small></center></div>
</div>
</div></div>
<div class="w3-container w3-center w3-animate-bottom">
<div class="main-container">
<div class="swipe-tabs-container">
<div class="swipe-tab-content"><br>
<table width="100%" style="margin-top:20px">
<tr>
<td style="width:50%;height:150px">
<a onclick="javascript:showDiv()" href="homes.php#home"><center>
<img style="vertical-align:middle;margin-top:5px;width:50%;height:auto" src="specialicon/motor.png"/>
<div style="font-weight:normal;color;font-size:11px;padding-bottom:5px"><br>
Motor<br>
</div>
</a>
</center>
</td>
<td style="width:50%;height:150px">
<a onclick="javascript:showDiv()" href="homes.php#home"><center>
<img style="vertical-align:middle;margin-top:5px;width:50%;height:auto" src="specialicon/mobil.png"/>
<div style="font-weight:normal;color;font-size:11px;padding-bottom:5px"><br>
Mobil<br>
</div>
</a>
</center>
</td>
</tr>
<tr>
<td style="width:50%;height:150px">
<a href="#expe3"><center>
<img style="vertical-align:middle;margin-top:5px;width:50%;height:auto" src="specialicon/food.png"/>
<div style="font-weight:normal;color;font-size:11px;padding-bottom:5px"><br>
Makanan / Minuman<br>
</div>
</a>
</center>
</td>
<td style="width:50%;height:150px">
<a href="#expe2"><center><br>
<img style="vertical-align:middle;margin-top:5px;width:50%;height:auto" src="specialicon/dana.png"/>
<div style="font-weight:normal;color;font-size:11px;padding-bottom:5px"><br>
Saldo<br><br>
</div>
</a>
</center>
</td>
</tr>
<tr>
<td style="width:50%;height:150px">
<a><center>
<img style="vertical-align:middle;margin-top:5px;width:50%;height:auto" src="specialicon/barang.png"/>
<div style="font-weight:normal;color;font-size:11px;padding-bottom:5px"><br>
Kirim Barang<br>(Coming Soon)<br>
</div>
</a>
</center>
</td>
<td style="width:50%;height:150px">
<a><center>
<img style="vertical-align:middle;margin-top:5px;width:50%;height:auto" src="specialicon/rental.png" />
<div style="font-weight:normal;color;font-size:11px;padding-bottom:5px"><br>
Rental mobil<br>(Coming Soon)<br>
</div>
</a>
</center>
</td>
</tr>
</table>
</div>
<div class="swipe-tab-content">
<div style="color:#444"><br>
<?php

include_once 'dbconnect.php';

$kip=mysqli_query($mysqli, "SELECT count(*) as total FROM transaksi where id_users='".$_SESSION['user']."'");
$kor=mysqli_fetch_array($kip);
$values = mysqli_fetch_assoc($kip); 
$huua=$kor['total']; 

$jp=mysqli_query($mysqli, "SELECT * FROM transaksi where id_users='".$_SESSION['user']."' and aktif='yes'");
$rok=mysqli_fetch_array($jp);
$sebagai=$rok['sebagai'];
 if($huua=='0')
      { ?>
<center>Kamu belum menggunakan layanan TroL</center>
<?php }else{?>
<div style="margin-top:-20px;color:#444;">
<div style="border-bottom:1px solid #8c8c8c;color:#616161;font-size:14px">Layanan Aktif
</div>
<?php 
$jiew=mysqli_query($mysqli, "SELECT * FROM transaksi where id_users='".$_SESSION['user']."' and aktif='yes'");
while($jows=mysqli_fetch_array($jiew)){
?>
<table style="padding:10px;margin-top:5px;border-radius:20px;"id="iseqchart">
<tr style="font-size:10px;">
<td width="100%"style="padding:10px">
<div style="font-size:12px">
<center><b style="color:#444"><small>Rincian Layanan</small></b></center>
<br>tanggal : <?php echo $jows['tanggal']; ?>
<br  >Pickup address & Destination : <?php echo $jows['alamat']; ?> ke <?php echo $jows['tujuan']; ?>
<br >Service Type : <?php echo $jows["layanan"]; ?> <?php echo $jows["tipe"]; ?>
<br  >Kode Transaksi :<?php echo $jows['kode_trans'];?>
<br>Total Price: USD  <?php $rego=$jows['harga']; $sakan3 = number_format($rego,0,",","."); echo $sakan3; ?>,-<br></div></td>
<td cellspacing="2" style="padding:10px;width:100%;height;100%;">
<a href="about.php#otw"><section class="button-demo" style="padding:0px">
<button style="border-radius:20px;float:right;width:80px;font-size:12px;height:auto"class="ladda-button"data-color="green"data-style="expand-right">lihat</button>
</section>
</a></td>
</tr>
</table>
<?php } ?><br><br>
<div style="border-bottom:1px solid #8c8c8c;color:#616161;font-size:14px">Pembatalan Layanan
</div>
<?php 
$miki=mysqli_query($mysqli, "SELECT * FROM transaksi where id_users='".$_SESSION['user']."' and status_trans='cancel' and aktif='no'");
while($riki=mysqli_fetch_array($miki)){
?>
<table style="padding:10px;margin-top:5px;border-radius:20px;"id="iseqchart">
<tr style="font-size:10px;">
<td width="100%"style="padding:10px">
<div style="font-size:12px">
<br>tanggal : <?php echo $riki['tanggal']; ?>
<br  >Pickup address & Destination : <?php echo $riki['alamat']; ?> ke <?php echo $riki['tujuan']; ?>
<br  >Kode Transaksi :<?php echo $riki['kode_trans'];?>
<br>Total Price: USD  <?php $rego=$riki['harga']; $sakan3 = number_format($rego,0,",","."); echo $sakan3; ?>,-<br></div></td>
<td cellspacing="2" style="color: red;padding:10px;width:100%;height;100%;">
Keterangan: <br>
<?php echo $riki['beritaacara']; ?>
</td>
</tr>
</table>
<?php } ?><br><br>
<div style="border-bottom:1px solid #8c8c8c;color:#616161;font-size:14px">Layanan Selesai
</div>
<?php 
$miki=mysqli_query($mysqli, "SELECT * FROM transaksi where id_users='".$_SESSION['user']."' and status_trans='finish' and aktif='no'");
while($fiki=mysqli_fetch_array($miki)){
?>
<table style="padding:10px;margin-top:5px;border-radius:20px;"id="iseqchart">
<tr style="font-size:10px;">
<td width="100%"style="">
<div style="font-size:12px">
<center><b style="color:#444"><small>Rincian Layanan</small></b></center>
<br>tanggal : <?php echo $fiki['tanggal']; ?>
<br  >Pickup address & Destination : <?php echo $fiki['alamat']; ?> ke <?php echo $fiki['tujuan']; ?>
<br  >Kode Transaksi :<?php echo $fiki['kode_trans'];?>
<br>Total Price: USD  <?php $rego=$fiki['harga']; $sakan3 = number_format($rego,0,",","."); echo $sakan3; ?>,-<br><br>
<a href="rate.php?id_sopir=<?php echo $fiki['id_sopir']; ?>">Berikan Feedback</a></div>
<br>
</td>
</tr>
</table>
<script src="dist/spin.min.js">
</script>
<script src="dist/ladda.min.js">
</script>
<script>Ladda.bind(".button-demo button");Ladda.bind(".progress-demo button",{callback:function(a){var c=0;var b=setInterval(function(){c=Math.min(c+Math.random()*0.1,1);a.setProgress(c);if(c===1){a.stop();clearInterval(b)}},200)}});
</script>
<?php } ?>
</div> 
<?php }?>
</div>
</div>
<div class="swipe-tab-content">
<style>#hideme{-webkit-animation:cssAnimation 450s forwards;animation:cssAnimation 450s forwards}@keyframes cssAnimation{0%{opacity:1}90%{opacity:1}100%{opacity:0}}@-webkit-keyframes cssAnimation{0%{opacity:1}90%{opacity:1}100%{opacity:0}}</style>
<?php 
if (empty($rows['noktp'])) { ?>
<div id="hideme"style="width:100%;position:relative;color:#ef2525;z-index:99999;top:0px;padding:20px;background-color:rgba(255, 255, 82, 0.95)">
<center><small>Kamu harus lengkapi data pribadi seperti No KTP, Phone, Alamat, Pendidikan, dan status<br><br>Lengkapi Profile anda</small>
<br></center>
</div><?php }else{ ?>
<?php } ?>
<?php 
if (empty($rows['oauth_provider'])) { ?>
<?php 
if (empty($rows['phone'])) { ?>
<div id="hideme"style="width:100%;position:relative;color:#ef2525;z-index:99999;top:30px;padding:20px;background-color:rgba(255, 255, 82, 0.95)">
<center><small>Hei, kamu belum verifikasi nomor ponsel. Tenang saja data kamu aman<br><br><a href="registrasiemail/activate.php?email=<?php echo $rows['email'];?>&&key=<?php echo $rows['forgot_pass_identity'];?>" class="fa fa fa-times closer">Verifikasi Sekarang</a></small>
<br></center>
</div><?php }else{ ?>
<?php } ?>
<?php }else{ ?>
<?php } ?>
<?php 
$sim=mysqli_query($mysqli, "SELECT * FROM event order by tanggalevent DESC");
while($kor=mysqli_fetch_array($sim)){
?>
<style>.pontainer{border:2px solid #dedede;background-color:#f1f1f1;border-radius:5px;padding:10px;margin:10px 0}.darker{border-color:#ccc;background-color:#ddd}.pontainer::after{content:"";clear:both;display:table}.pontainer img{float:left;max-width:60px;width:100%;margin-right:20px;border-radius:50%}.pontainer img.right{float:right;margin-left:20px;margin-right:0}.time-right{float:right;color:#aaa}.time-left{float:left;color:#999}</style>
<div class="pontainer">
<img src="icon/user.png" alt="Avatar" style="width:30px"><b><small style="color:#444;font-size:10px;float:left;margin-left:-10px">Administrator</small></b><br>
<p style="font-family:segoe UI light;color:#444"><?php echo $kor['pesan'];?></p>
<span class="time-right"><small><?php echo $kor['tanggalevent'];?></small></span>
</div> <?php  
	} 
 ?>
</div>
<div class="swipe-tab-content"><br>
<div style="color:#444;height:100%;overflow:auto">
<center><b><small>My Account</small></b><br>
Hi, <?php echo $rows['first_name'];?> <?php echo $rows['last_name'];?><br>
<?php 
$id=$rows['id'];
if (empty($rows['oauth_provider'])) { ?>
<small>Akun Terverifikasi dengan Nomor Handphone</small>
<?php }else{ ?><small>Akun Terverifikasi dengan Facebook</small>
<?php } ?><br><br>

<table width="100%">
<tr style="font-weight:normal;border:1px solid grey;color:#444">
<th width="35%" style="font-weight:normal;border-right:1px solid grey;color:#444"><center><small>Jumlah order<br><?php
$jatuhtempo=date('d-m-Y');
$query = "SELECT COUNT(*) AS total FROM transaksi WHERE id_users='$id'"; 
$result = mysqli_query($mysqli, $query); 
$values = mysqli_fetch_assoc($result); 
$jim_rows = $values['total'];
echo $jim_rows; 
 ?></small></center></th>
<th width="30%"style="font-weight:normal;"><center><small>Pengeluaran<br>USD <?php
$query = "SELECT SUM(harga) AS total FROM transaksi where id_users='$id'"; 
$result = mysqli_query($mysqli, $query); 
$values = mysqli_fetch_assoc($result); 
$num_rows = $values['total']; 
$rego = number_format($num_rows,0,",","."); echo $rego;
 ?>,-</small></center></th>
<th width="35%"style="font-weight:normal;border-left:1px solid grey;color:#444"><center><small>saldo tersedia<br>USD <?php  $hargavo=$rows['saldo']; $rego = number_format($hargavo,0,",","."); echo $rego;?></small></center></th>
</tr>
</table>
</center><br>
<center>Setting Profile</center>
<form style="text-align:left;font-size:11px;background:#fff;padding:20px"id="form"action="save.php" enctype="multipart/form-data" method="post" name="postform">
<input type="hidden" name="id" value="<?php echo $rows['id'];?>"/>
<input type="hidden" name="oauth_provider" value="<?php echo $rows['oauth_provider'];?>"/>
No.KTP Kamu (Dibawah 17 tahun menggunakan NIK)<br><small>No. KTP/NIK akan kami pakai sebagai dasar validasi. Kerahasiaan data anda tetap kami jaga</small>
<br><input type="number" name="noktp"required="required" value="<?php echo $rows['noktp'];?>"><br>
<small>Nama Lengkap kamu</small>
<br><input type="text" name="first_name"required="required" value="<?php echo $rows['first_name'];?>"><br>
<small>Tempat lahir (kota)</small>
<br><input type="text" name="tempatlahir"required="required" value="<?php echo $rows['tempatlahir'];?>"><br>
<small>Tanggal Lahir</small>
<br><input type="date" name="tgllahir"required="required" value="<?php echo $rows['tgllahir'];?>"><br>
<small>Jenis Kelamin</small><br>
<select name="kelamin"required=required>
<option name="kelamin"value="Pria">Pria</option>
<option name="kelamin"value="Wanita">Wanita</option>
</select><br><br>
<small>Agama</small><br>
<select name="agama"required=required>
<option name="agama"value="Islam">Islam</option>
<option name="agama"value="Hindu">Hindu</option>
<option name="agama"value="Budha">Budha</option>
<option name="agama"value="Kristen Katolik">Kristen Katolik</option>
<option name="agama"value="Kristen Protestan">Kristen Protestan</option>
<option name="agama"value="Konghucu">Konghucu</option>
<option name="agama"value="Shinto">Shinto</option>
</select><br><br>
<small>Alamat tempat tinggal</small>
<br><input type="text" name="alamat1"required="required" value="<?php echo $rows['alamat1'];?>"><br>
<small>Kota</small>
<br><input type="text" name="kota"required="required" value="<?php echo $rows['kota'];?>"><br>
<small>Provinsi</small>
<br><input type="text" name="provinsi"required="required" value="<?php echo $rows['provinsi'];?>"><br>
<small>Pendidikan Terakhir</small><br>
<select name="pendidikan"required=required>
<option name="pendidikan"value="Tidak sekolah">Tidak sekolah</option>
<option name="pendidikan"value="SD">SD</option>
<option name="pendidikan"value="SMP">SMP</option>
<option name="pendidikan"value="SMA">SMA</option>
<option name="pendidikan"value="Diploma">Diploma</option>
<option name="pendidikan"value="S1">S1</option>
<option name="pendidikan"value="S2">S2</option>
<option name="pendidikan"value="S3">S3</option>
</select><br><br>
<small>Profesi Saat ini</small><br>
<select name="profesi"required=required>
<option name="profesi"value="Mahasiswa/Pelajar">Mahasiswa/Pelajar</option>
<option name="profesi"value="Pegawai Negeri">Pegawai Negeri</option>
<option name="profesi"value="Karyawan Swasta">Karyawan Swasta</option>
<option name="profesi"value="Professional">Professional</option>
<option name="profesi"value="Guru">Guru</option>
<option name="profesi"value="Atlet">Atlet</option>
<option name="profesi"value="Pengusaha">Pengusaha</option>
<option name="profesi"value="Pekerja Seni">Pekerja Seni</option>
<option name="profesi"value="Politikus">Politikus</option>
</select><br><br>
<small>Jabatan</small>
<br><input type="text" name="jabatan"required="required" value="<?php echo $rows['jabatan'];?>"><br>
<small>Pendapatan perbulan / Uang saku bulanan</small><br>
<select name="pendapatan"required=required>
<option name="pendapatan"value="1 sd 2">1 sd 2</option>
<option name="pendapatan"value="3 sd 5">3 sd 5</option>
<option name="pendapatan"value="6 sd 10">6 sd 10</option>
<option name="pendapatan"value="11 sd 50">11 sd 50</option>
<option name="pendapatan"value="> 50">> 50</option>
</select><br><br>
<small>Status Nikah</small><br>
<select name="statusnikah"required=required>
<option name="statusnikah"value="lajang">Lajang</option>
<option name="statusnikah"value="Menikah">Menikah</option>
<option name="statusnikah"value="Duda/Janda">Duda/Janda</option>
</select><br><br>
<small>Email</small>
<br><input type="email" name="email"required="required" value="<?php echo $rows['email'];?>"><br>
<small>Password (wajib diisi)</small>
<br><input type="password" name="password"required="required"><br>
<input style="border:0px;padding:10px;width:100%;background:#f60;color:#fff" type="submit" onclick="javascript:showDiv()" value="Simpan Perubahan" name="kirim" />
</form><br><br>
<link rel="stylesheet" href="css/bemo.css">
<link rel="stylesheet" href="dist/ladda.min.css">
</div>
</div>
</div>
</div></div>
<script>$(function(){var f=$(".swipe-tabs"),h=$(".swipe-tab"),g=$(".swipe-tabs-container"),j=0,i="active-tab";f.on("init",function(a,b){g.removeClass("invisible");f.removeClass("invisible");j=b.getCurrent();h.removeClass(i);$(".swipe-tab[data-slick-index="+j+"]").addClass(i)});f.slick({slidesToShow:3,slidesToScroll:1,arrows:false,infinite:false,swipeToSlide:true,touchThreshold:10});g.slick({asNavFor:f,slidesToShow:1,slidesToScroll:1,arrows:false,infinite:false,swipeToSlide:true,draggable:false,touchThreshold:10});h.on("click",function(a){j=$(this).data("slick-index");h.removeClass(i);$(".swipe-tab[data-slick-index="+j+"]").addClass(i);f.slick("slickGoTo",j);g.slick("slickGoTo",j)});g.on("swipe",function(b,c,a){j=$(this).slick("slickCurrentSlide");h.removeClass(i);$(".swipe-tab[data-slick-index="+j+"]").addClass(i)})});</script>

<div style="font-size:11px;z-index:9999;color:#444;display:block;position:fixed;top:0;background:#fff;width:100%;height:100%;overflow:auto"class="resume" id="expe1">
<br><br><a style="margin-left:25px;margin-top:20px;font-size:22;border:1px solid grey;padding:5px;border-radius:10%" onclick="expe1.style.display='none'" class="closebtn">&times;</a>

</div>
<div style="font-size:11px;z-index:9999;color:#444;display:block;position:fixed;top:0;background:#fff;width:100%;height:100%;overflow:auto"class="resume" id="expe2">
<br><br><a style="margin-left:25px;margin-top:20px;font-size:22;border:1px solid grey;padding:5px;border-radius:10%" onclick="expe2.style.display='none'" class="closebtn">&times;</a>
<center><b style="font-size:11px"><small>Balance</small></b></center>
<br><center><small>You can topup balance for payment service</small></center><br><br>
<center style="color:"><h4>Your Balance</h4>
<b>USD  <?php 
$jumlah = $rows['saldo'];
$subtotal = number_format($jumlah,0,",",",");
echo $subtotal;?>,-
</b>
</center><br>
</center>
<br>
<center style="font-size:14px;color:#444;font-family:Segoe UI;background:#dedede;border-top:1px solid grey;border-bottom:1px solid grey;border-style:dashed;">
<?php 
$milk=mysqli_query($mysqli, "SELECT * FROM trans_user where id_users=".$_SESSION['user']);
while($ent=mysqli_fetch_array($milk)){
 if($ent['statussaldo']=='minta')
      { 
   if($ent['tipesaldo']=='deposit')
      { ?>
<b><small>You Request Topup</small></b><br><br>
Please transfer payment to admin bank account<br>
<br><b><small>Choose one account admin for your payment :</small></b><br><br>
<?php
$result = mysqli_query($mysqli, "SELECT * FROM infobank");
?>

	<table style="color:#444;font-size:12px;"width='100%' border=0>

	<tr>
		<th><small>Bank Name</small></th>
		<th><small>Account number</small></th>
		<th><small>Owner Name</small></th>
	</tr>
	<?php 
$i = 1;
	while($res = mysqli_fetch_array($result)) { 		
		echo "<tr>";	
		echo "<td>".$res['namabank']."</td>";
		echo "<td>".$res['norek']."</td>";
		echo "<td>".$res['namaorang']."</td>";
		echo "</tr>";	
		}
	?>
	</table>
<small>after transfer money, please confirmation data</small><br><br>
<center>
<a href="#expe5">
<button style="width:100%;font-size:15px;height:auto;margin-top:0px;padding-bottom:20px;border-radius:0px;"class="ladda-button"data-color="green">Payment Confirm</button>
</a>
</center>
	  <?php }
	  if($ent['tipesaldo']=='withdraw')
      {?>
<b><small>You request Withdrawal</small></b><br><br>

	  <? }}
 if($ent['statussaldo']=='dijemput')
 {
?><br>
<b><small>Request <?php echo $ent['tipesaldo'];?> on going process by administrator...</small></b><br>
<?php echo $ent['tipesaldo'];?> value: USD  <?php $koker = $ent['jumlahsaldo']; $broker = number_format($koker,0,",","."); echo $broker;?>,-<br>
<?php }}
$input = "SELECT count(*) as total FROM trans_user WHERE id_users='".$_SESSION['user']."' and statussaldo='minta'";
$result = mysqli_query($mysqli, $input);
$count = mysqli_fetch_assoc($result);
$jimrows=$count['total'];
if($jimrows == 0){?>
 </center><center>
<section class="button-demo" style="padding:0;width:100%">
<a href="topuppay.php?id=<?php echo $rows['id'];?>"><button style="width:100%;border-radius:0px;" class="ladda-button" data-color="blue" data-style="expand-right">
<small>Toup Up/Deposit balance</small></button></a>
</section>
<center>
<a href="wdpay.php?id=<?php echo $rows['id'];?>">
<button style="width:100%;font-size:15px;height:auto;margin-top:0px;padding-bottom:20px;border-radius:0px;"class="ladda-button"data-color="green">Withdraw balance</button>
</a>
</center>
<?php }else{}?>
</div>
<div style="font-size:11px;z-index:9999;color:#444;display:block;position:fixed;top:0;background:#fff;width:100%;height:100%;overflow:auto"class="resume" id="expe5">
<br><br><a style="margin-left:25px;margin-top:20px;font-size:22;border:1px solid grey;padding:5px;border-radius:10%" onclick="expe5.style.display='none'" class="closebtn">&times;</a>
<center><b style="font-size:11px"><small>Confirm</small></b></center>
<form id="form"action="topupuser.php" method="post">
<input name="id_users" type="hidden" value="<?php echo $_SESSION['user'];?>"/>
<center style="color:"><div id="input">Choose your bank<br>
  <select style="padding:10px;background:#fff;font-size:11px;" name="banksaldo" > 
    <?php
session_start();
include_once 'dbconnect.php';
		$get=mysqli_query($mysqli, "SELECT * FROM infobank");
            while($jim = mysqli_fetch_assoc($get))
            {
            ?>
            <option name="banksaldo" style="color:grey" value="<?php echo $jim['namabank'];?>" ><?php echo $jim['namabank']; ?></option>
            <?php
            }               
        ?>
         </select><nav></nav></div><br>
<center style="color:"><div id="input">Account number Anda:<br>
<input style="color:#444;padding:5px;
    vertical-align: middle;
    border-bottom: 1px solid grey;
    background-size: 20px;" type='number'name="nomorrek"class='holo' placeholder="Your Bank Account number" aria-required="true" required="required"/>
<nav></nav></div><br>
<center style="color:"><div id="input">Owner Name :<br>
<input style="color:#444;padding:5px;
    vertical-align: middle;
    border-bottom: 1px solid grey;
    background-size: 20px;" type='text'name="namauser"class='holo' placeholder="Your name" aria-required="true" required="required"/>
<nav></nav></div><br>
<button type="submit"name="Confirm" style="width:200px;color:#fff;background:green;border:none;padding:10px;border-radius:20px;" onclick="javascript:showDiv();">Confirm</button>
<br><br>
</center>
</form>
</div>
<div style="font-size:11px;z-index:9999;color:#444;display:block;position:fixed;top:0;background:#fff;width:100%;height:100%;overflow:auto"class="resume" id="expe3">
<br><br><a style="margin-left:25px;margin-top:20px;font-size:22;border:1px solid grey;padding:5px;border-radius:10%" onclick="expe3.style.display='none'" class="closebtn">&times;</a>
<center><b style="font-size:11px"><small>Order Food or Drink</small></b></center>
<br><center>Silahkan tentukan lokasi jemput dan antar<br><small>Klik next apabila setuju</small></center>
</div>
<script>jQuery(document).ready(function(a){a(".resume").hide();a('a[href^="#"]').on("click",function(b){a(".resume").hide();var c=a(this).attr("href");a(".resume"+c).toggle()})});</script>
<style>#loading{display:block;position:absolute;top:0;left:0;z-index:99999;width:100vw;height:100vh;background-image:url("hourglass.svg");background-repeat:no-repeat;background-position:center}</style>
<div id="loading" style="display:none">
</div>
<script type="text/javascript">function showDiv(){div=document.getElementById("loading");div.style.display="block"}</script>
<script src="dist/spin.min.js"></script>
<script src="dist/ladda.min.js"></script></section>
<script>Ladda.bind(".button-demo button");Ladda.bind(".progress-demo button",{callback:function(e){var f=0;var d=setInterval(function(){f=Math.min(f+Math.random()*0.1,1);e.setProgress(f);if(f===1){e.stop();clearInterval(d)}},200)}});</script>
</body>