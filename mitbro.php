<?php
$session_lifetime = 3600 * 24 * 860; // 2 days
session_set_cookie_params ($session_lifetime);
session_start();
include_once 'dbconnect.php';
if(!isset($_SESSION['user']))
{
	header("Location: jdex.php#reg");
}
$res=mysqli_query($mysqli, "SELECT * FROM users WHERE id=".$_SESSION['user']);
$rows=mysqli_fetch_array($res);
		$_SESSION['user'] = $rows['id'];
	if($rows['sebagai']=='user')
      {
	header("Location: maafmitra.php");
	  } 
$id_users = $_SESSION['user'];
$view=mysqli_query($mysqli, "SELECT * FROM transaksi where id_mitra='$id_users'");
while($row=mysqli_fetch_array($view)){
	?> 
		<?php
if($row['status_trans']=='otw')
      {?>
<script>document.location.href="jemput.php";</script><?php }?>
	<?php 
 if($row['status_trans']=='dijemput')
      { ?>
<script>document.location.href="jemput.php";</script>
<?php }; ?>
<?php }	 ;?>
<meta charset="UTF-8"/><meta http-equiv="X-UA-Compatible"content="IE=edge,chrome=1">
<meta name="viewport"content="width=device-width, initial-scale=1.0">
<script type="text/javascript" src="autosave5/jquery-1.6.1.js"></script>
<script type="text/javascript" src="autosave5/jquery-1.6.1.js"></script>		
	<script type="text/javascript">
	$(document).ready(function(){	
	
		autosave();
	});
	
	function autosave()
	{
		
		var t = setTimeout("autosave()", );
		$('#timestamp').show(50).delay();	
		var id = $("#id").val();
		var lat = $("#lat").val();
		var lng = $("#lng").val();
		
		if (lat.length > 0 || lng.length > 0)
		{
			$.ajax(
			{
				type: "POST",
				url: "autosave.php",
				data: "&id=" + id + "&lat=" + lat + "&lng=" + lng,
				cache: false,
				success: function(message)
				{	
					$('#timestamp').hide(50).delay();
					$("#timestamp").empty().append(message);
				}
			});
		}
	} 
	</script>	
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=true"></script>
<script>if(!navigator.geolocation){alert("Your phone does not support maps Location.")}navigator.geolocation.getCurrentPosition(success,error);function success(c){var b=c.coords.latitude;var d=c.coords.longitude;var a=c.coords.accuracy;document.getElementById("lat").value=b;document.getElementById("lng").value=d}function error(a){}</script>
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
<style>.sidenav{height:100%;width:0;position:fixed;z-index:1;top:0;left:0;background-color:#444;overflow-x:hidden;transition:.01s;padding-top:60px;font-size:12px}.sidenav a{padding:8px 8px 8px 32px;text-decoration:none;font-size:12px;color:#ffff;display:block;transition:.01s}.sidenav a:hover{color:#f1f1f1}.sidenav .closebtn{position:absolute;top:0;right:25px;font-size:36px;margin-left:50px}@media screen and (max-height:450px){.sidenav{padding-top:15px}.sidenav a{font-size:18px}}</style>
<div id="mySidenav" class="sidenav" style="margin-top:60px">
<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
<a href="#expe2" ><img style="vertical-align:middle" src="icon/fa-usd.png"width="25px"/> My Saldo</a>
<a href="profit.php#home" onclick="javascript:showDiv()"><img style="vertical-align:middle" src="img/ratings.png" width="25px"/> My Profit</a>
</div>
<div class="sodrops-top" style="background-color:#101d25;float:none;height:60px"><div style="float:right;font-size:12px"><a onclick="javascript:showDiv()" href="logoutdriver.php?logout"><img style="vertical-align:middle;margin-top:5px;margin-right:15px" src="specialicon/logout.png" width="25px"/></a></div>
<span style="margin-left:20px;margin-top:20px;font-size:25px;position:fixed;color:#fff;cursor:pointer" onclick="openNav()">&#9776;</span>
<script>function openNav(){document.getElementById("mySidenav").style.width="100%"}function closeNav(){document.getElementById("mySidenav").style.width="0"}</script>
<span class="actions">
<center><img style="position:fixed;margin-top:10px" src="icon/ggo.png"width="40px"/></center>
</span>
</div>
<div style="width:100%"class="w3-container w3-center w3-animate-top">
<div class="sub-header" style="margin-top:60px;background:#efefef">
<div class="swipe-tabs">
<div class="swipe-tab" style="width:50px"><center><img style="vertical-align:middle;margin-top:5px" src="specialicon/home.png"width="25px"/><small>Home</small></center></div>
<div class="swipe-tab" style="width:50px"><center><img style="vertical-align:middle;margin-top:5px" src="specialicon/history.png"width="25px"/><small>History</small></center></div>
<div class="swipe-tab" style="width:50px"><center><img style="vertical-align:middle;margin-top:5px" src="specialicon/notif.png"width="25px"/><small>Notification</small></center></div>
<div class="swipe-tab" style="width:50px"><center><img style="vertical-align:middle;margin-top:5px" src="specialicon/userblack.png"width="25px"/><small>Account</small></center></div>
</div>
</div></div>
<div class="w3-container w3-center w3-animate-bottom">
<div class="main-container">
<div class="swipe-tabs-container">
<div class="swipe-tab-content"><br>
<?php 
if (empty($rows['phone'])) { ?>
<div id="hideme"style="width:100%;position:relative;color:#ef2525;z-index:99999;top:0px;padding:20px;background-color:rgba(255, 255, 82, 0.95)">
<center><small>Please complete this step:</small><br><br>
<br>
<form style="text-align:left;font-size:11px;background:#fff;padding:20px"id="form"action="phone.php" enctype="multipart/form-data" method="post" name="postform">
<input type="hidden" name="id" value="<?php echo $rows['id'];?>"/>
<small>Phone Number</small>
<br><input type="number" name="phone"required="required" value="<?php echo $rows['phone'];?>"><br>
<input type="hidden" name="picture" value="<?php echo $rows['picture'];?>"><br>
<input style="border:0px;padding:10px;width:100%;background:#f60;color:#fff" type="submit" onclick="javascript:showDiv()" value="Save changes" name="jirim" />
</form><br><br>
</center>
</div><?php }else{ } ?>
<?php 
if (empty($rows['jenistransportasi'])) { ?>
<div id="hideme"style="width:100%;position:relative;color:#ef2525;z-index:99999;top:0px;padding:20px;background-color:rgba(255, 255, 82, 0.95)">
<center><small>You must register vehicle type, Please choose one :</small><br><br>
<br>
<form style="text-align:left;font-size:11px;background:#fff;padding:20px"id="form"action="plat.php" enctype="multipart/form-data" method="post" name="postform">
<input type="hidden" name="id" value="<?php echo $rows['id'];?>"/>
<small>Select one</small><br>
<select name="jenistransportasi"required=required>
<option name="jenistransportasi"value="motorcycle">Motorcycle</option>
<option name="jenistransportasi"value="car">car</option>
<option name="jenistransportasi"value="Cargo box">Cargo Box</option>
<option name="jenistransportasi"value="food">Delivery food</option>
</select><br><br>
<small>Number vehicle ID</small>
<br><input type="text" name="jabatan"required="required" value="<?php echo $rows['jabatan'];?>"><br>
<small>Brand Vehicle & Type product</small>
<br><input type="text" name="ahlibidang"required="required" value="<?php echo $rows['ahlibidang'];?>"><br>
<input style="border:0px;padding:10px;width:100%;background:#f60;color:#fff" type="submit" onclick="javascript:showDiv()" value="Save changes" name="jirim" />
</form><br><br>
</center>
</div><?php }else{ ?>
 <?php 
if (empty($rows['lat'])) { ?>
<form id="form"action="save.php" enctype="multipart/form-data" method="post" name="postform">
<center style="color:#444"><small>Please input address and drop marker into your position</small></center><br>
<style type="text/css">.input-controls{margin-top:5px;border:1px solid transparent;border-radius:2px 0 0 2px;box-sizing:border-box;-moz-box-sizing:border-box;background:#fff;height:32px;outline:0;box-shadow:0 2px 6px rgba(0,0,0,0.3)}#searchInput{background:#fff;font-family:Roboto;font-size:15px;font-weight:300;margin-left:12px;padding:0 11px 0 13px;text-overflow:ellipsis}#searchInput:focus{border-color:#4d90fe}</style><script type="text/javascript"src="https://maps.googleapis.com/maps/api/js?sensor=true&key=AIzaSyAO4lbxY6SKygcJxTuzu-Qi7kAAP9SdAwM&v=3.exp&libraries=places&callback=initMap"></script>
<input style="background:#fff;z-index:9;position:absolute;margin-left:-197px;top:0;width:100%;border-bottom:3px solid #09c;height:60px" id="searchInput" class="input-controls" type="text" placeholder="Input Address, City or place">
<script>function initialize(){var f=new google.maps.LatLng(-4.546272, 136.884857);var e=new google.maps.Map(document.getElementById("map"),{center:f,zoom:13});var a=new google.maps.Marker({map:e,position:f,draggable:true,anchorPoint:new google.maps.Point(0,-29)});var b=document.getElementById("searchInput");e.controls[google.maps.ControlPosition.TOP_LEFT].push(b);var d=new google.maps.Geocoder();var c=new google.maps.places.Autocomplete(b);c.bindTo("bounds",e);c.addListener("place_changed",function(){a.setVisible(false);var g=c.getPlace();if(!g.geometry){window.alert("Autocomplete's returned place contains no geometry");return}if(g.geometry.viewport){e.fitBounds(g.geometry.viewport)}else{e.setCenter(g.geometry.location);e.setZoom(17)}a.setPosition(g.geometry.location);a.setVisible(true);bindDataToForm(g.formatted_address,g.geometry.location.lat(),g.geometry.location.lng());infowindow.setContent(g.formatted_address);infowindow.open(e,a)});google.maps.event.addListener(a,"dragend",function(){d.geocode({latLng:a.getPosition()},function(h,g){if(g==google.maps.GeocoderStatus.OK){if(h[0]){bindDataToForm(h[0].formatted_address,a.getPosition().lat(),a.getPosition().lng());infowindow.setContent(h[0].formatted_address);infowindow.open(e,a)}}})})}function bindDataToForm(a,c,b){document.getElementById("location").value=a;document.getElementById("lat").value=c;document.getElementById("lng").value=b}google.maps.event.addDomListener(window,"load",initialize);</script>

<input type="hidden" name="alamat" id="location">
<input type="hidden" name="lat" id="lat">
<input type="hidden" name="lng" id="lng">
<div id="map" style="border-top:5px solid #444"></div>
<input type="hidden" name="id"value="<?php echo $_SESSION['user']?>"/>
<center><br>
<button type="submit"name="pimi" style="font-size: 20;width:100%;padding:10px;border:none;border-radius:10px;text-align:center;font-weight:bold;color:#fff;background:#101d25;" onclick="javascript:showDiv()"><small>Save</small></button>
</center>

<center><small style="color:#444">Save your position for passengers can find you</small></center><br>
</form>
<?php } else {
header("Location: https://barisandata.com/mithome.php");
 } ?>
<center style="color:#444">Request <?php echo $rows['jenistransportasi'];?> in your area<br></center>
<?php } ?>
 <script type="text/javascript">
 $(document).ready(function() {
        loadData();
    });

    var loadData = function() {
        $.ajax({    //create an ajax request to load_page.php
            type: "GET",
            url: "getuser.php",             
            dataType: "html",   //expect html to be returned                
            success: function(response){                    
                $("#responsecontainer").html(response);
                setTimeout(loadData, 5000); 
            }

        });
    };

</script>
<div id="responsecontainer" align="center"></div>

</div>
<div class="swipe-tab-content" style="overflow:auto">
<div style="color:#444"><br>
<?php

include_once 'dbconnect.php';

$kip=mysqli_query($mysqli, "SELECT count(*) as total FROM transaksi where id_mitra='".$_SESSION['user']."'");
$kor=mysqli_fetch_array($kip);
$values = mysqli_fetch_assoc($kip); 
$huua=$kor['total']; 

$jp=mysqli_query($mysqli, "SELECT * FROM transaksi where id_mitra='".$_SESSION['user']."' and aktif='yes'");
$rok=mysqli_fetch_array($jp);
$sebagai=$rok['sebagai'];
 if($huua=='0')
      { ?>
<center>You must taken for job</center><br>
<form id="form"action="save.php" enctype="multipart/form-data" method="post" name="postform">
<center style="color:#444"><small>Please input address and drop marker into your position</small></center><br>
<style type="text/css">.input-controls{margin-top:5px;border:1px solid transparent;border-radius:2px 0 0 2px;box-sizing:border-box;-moz-box-sizing:border-box;background:#fff;height:32px;outline:0;box-shadow:0 2px 6px rgba(0,0,0,0.3)}#searchInput{background:#fff;font-family:Roboto;font-size:15px;font-weight:300;margin-left:12px;padding:0 11px 0 13px;text-overflow:ellipsis}#searchInput:focus{border-color:#4d90fe}</style><script type="text/javascript"src="https://maps.googleapis.com/maps/api/js?sensor=true&key=AIzaSyAO4lbxY6SKygcJxTuzu-Qi7kAAP9SdAwM&v=3.exp&libraries=places&callback=initMap"></script>
<input style="background:#fff;z-index:9;position:absolute;margin-left:-197px;top:0;width:100%;border-bottom:3px solid #09c;height:60px" id="searchInput" class="input-controls" type="text" placeholder="Input Address, City or place">
<script>function initialize(){var f=new google.maps.LatLng(-4.546272, 136.884857);var e=new google.maps.Map(document.getElementById("map"),{center:f,zoom:13});var a=new google.maps.Marker({map:e,position:f,draggable:true,anchorPoint:new google.maps.Point(0,-29)});var b=document.getElementById("searchInput");e.controls[google.maps.ControlPosition.TOP_LEFT].push(b);var d=new google.maps.Geocoder();var c=new google.maps.places.Autocomplete(b);c.bindTo("bounds",e);c.addListener("place_changed",function(){a.setVisible(false);var g=c.getPlace();if(!g.geometry){window.alert("Autocomplete's returned place contains no geometry");return}if(g.geometry.viewport){e.fitBounds(g.geometry.viewport)}else{e.setCenter(g.geometry.location);e.setZoom(17)}a.setPosition(g.geometry.location);a.setVisible(true);bindDataToForm(g.formatted_address,g.geometry.location.lat(),g.geometry.location.lng());infowindow.setContent(g.formatted_address);infowindow.open(e,a)});google.maps.event.addListener(a,"dragend",function(){d.geocode({latLng:a.getPosition()},function(h,g){if(g==google.maps.GeocoderStatus.OK){if(h[0]){bindDataToForm(h[0].formatted_address,a.getPosition().lat(),a.getPosition().lng());infowindow.setContent(h[0].formatted_address);infowindow.open(e,a)}}})})}function bindDataToForm(a,c,b){document.getElementById("location").value=a;document.getElementById("lat").value=c;document.getElementById("lng").value=b}google.maps.event.addDomListener(window,"load",initialize);</script>

<input type="hidden" name="alamat" id="location">
<input type="hidden" name="lat" id="lat">
<input type="hidden" name="lng" id="lng">
<div id="map" style="border-top:5px solid #444"></div>
<input type="hidden" name="id"value="<?php echo $_SESSION['user']?>"/>
<center><br>
<button type="submit"name="pimi" style="font-size: 20;width:100%;padding:10px;border:none;border-radius:10px;text-align:center;font-weight:bold;color:#ffa800;background:#101d25;" onclick="javascript:showDiv()"><small>Save</small></button>
</center>

<center><small style="color:#444">Save your position for passengers can find you</small></center><br>
</form>
<?php }else{?>
<div style="margin-top:-20px;color:#444;">
<div style="border-bottom:1px solid #8c8c8c;color:#616161;font-size:14px">Active Service
</div>
<?php 
$jiew=mysqli_query($mysqli, "SELECT * FROM transaksi where id_mitra='".$_SESSION['user']."' and aktif='yes'");
while($jows=mysqli_fetch_array($jiew)){
?>
<table style="padding:10px;margin-top:5px;border-radius:20px;"id="iseqchart">
<tr style="font-size:10px;">
<td width="100%"style="padding:10px">
<div style="font-size:12px">
<center><b style="color:#444"><small>Orders</small></b></center>
<br>Dates : <?php echo $jows['tanggal']; ?>
<br  >Pickup address : <?php echo $jows['alamat']; ?> ke <?php echo $jows['tujuan']; ?>
<br >Service Type : <?php echo $jows["layanan"]; ?> <?php echo $jows["tipe"]; ?>
<br  >No. invoice<?php echo $jows['kode_trans'];?>
<br>Total price: USD  <?php $rego=$jows['harga']; $sakan3 = number_format($rego,0,",","."); echo $sakan3; ?>,-<br></div></td>
<td cellspacing="2" style="padding:10px;width:100%;height;100%;">
<a href="jemput.php"><section class="button-demo" style="padding:0px">
<button style="border-radius:20px;float:right;width:80px;font-size:12px;height:auto"class="ladda-button"data-color="green"data-style="expand-right">Show</button>
</section>
</a></td>
</tr>
</table>
<?php } ?><br><br>

<div style="border-bottom:1px solid #8c8c8c;color:#616161;font-size:14px">Cancel orders
</div>
<?php 
$miki=mysqli_query($mysqli, "SELECT * FROM transaksi where id_mitra='".$_SESSION['user']."' and status_trans='cancel' and aktif='no'");
while($riki=mysqli_fetch_array($miki)){
?>
<table style="padding:10px;margin-top:5px;border-radius:20px;"id="iseqchart">
<tr style="font-size:10px;">
<td width="100%"style="padding:10px">
<div style="font-size:12px">
<br>Dates : <?php echo $riki['tanggal']; ?>
<br  >Pickup address : <?php echo $riki['alamat']; ?> ke <?php echo $riki['tujuan']; ?>
<br  >No. invoice<?php echo $riki['kode_trans'];?>
<br>Total price: USD  <?php $rego=$riki['harga']; $sakan3 = number_format($rego,0,",","."); echo $sakan3; ?>,-<br></div></td>
<td cellspacing="2" style="color: red;padding:10px;width:100%;height;100%;">
Details: <br>
<?php echo $riki['beritaacara']; ?>
</td>
</tr>
</table>
<?php } ?><br><br>
<div style="border-bottom:1px solid #8c8c8c;color:#616161;font-size:14px">Finish Orders
</div>
<?php 
$miki=mysqli_query($mysqli, "SELECT * FROM transaksi where id_mitra='".$_SESSION['user']."' and status_trans='finish' and aktif='no' order by tanggal DESC");
while($fiki=mysqli_fetch_array($miki)){
?>
<table style="padding:10px;margin-top:5px;border-radius:20px;"id="iseqchart">
<tr style="font-size:10px;">
<td width="100%"style="">
<div style="font-size:12px">
<center><b style="color:#444"><small>Orders</small></b></center>
<br>Dates : <?php echo $fiki['tanggal']; ?>
<br  >Pickup address : <?php echo $fiki['alamat']; ?> ke <?php echo $fiki['tujuan']; ?>
<br  >No. invoice<?php echo $fiki['kode_trans'];?>
<br>Total price: USD  <?php $rego=$fiki['harga']; $sakan3 = number_format($rego,0,",","."); echo $sakan3; ?>,-<br><br></div>
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
<?php }?><br><br><br>
</div>
</div>
<div class="swipe-tab-content">
<style>#hideme{-webkit-animation:cssAnimation 450s forwards;animation:cssAnimation 450s forwards}@keyframes cssAnimation{0%{opacity:1}90%{opacity:1}100%{opacity:0}}@-webkit-keyframes cssAnimation{0%{opacity:1}90%{opacity:1}100%{opacity:0}}</style>
<?php 
if (empty($rows['noktp'])) { ?>
<div id="hideme"style="width:100%;position:relative;color:#ef2525;z-index:99999;top:0px;padding:20px;background-color:rgba(255, 255, 82, 0.95)">
<center><small>You must input Identity, address, degree status etc.<br><br><a href="#expe4" class="fa fa fa-times closer">Complete now</a></small>
<br></center>
</div><?php }else{ ?>
<?php } ?>
<?php 
if (empty($rows['oauth_provider'])) { ?>
<?php 
if (empty($rows['phone'])) { ?>
<div id="hideme"style="width:100%;position:relative;color:#ef2525;z-index:99999;top:30px;padding:20px;background-color:rgba(255, 255, 82, 0.95)">
<center><small>Please verify your phone<br><br><a href="registrasiemail/activate.php?email=<?php echo $rows['email'];?>&&key=<?php echo $rows['forgot_pass_identity'];?>" class="fa fa fa-times closer">Verify Now</a></small>
<br></center>
</div><?php }else{ ?>
<?php } ?>
<?php }else{ ?>
<?php } ?>
<?php 
$sim=mysqli_query($mysqli, "SELECT * FROM event order by tanggalevent DESC");
while($kor=mysqli_fetch_array($sim)){
?>
<style>.pontainer{background-color:#f5f5f5;border-radius:5px;padding:10px;margin:10px 0}.darker{border-color:#ccc;background-color:#ddd}.pontainer::after{content:"";clear:both;display:table}.pontainer img{float:left;max-width:60px;width:100%;margin-right:20px;border-radius:50%}.pontainer img.right{float:right;margin-left:20px;margin-right:0}.time-right{float:right;color:#aaa}.time-left{float:left;color:#999}</style>
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
<?php
if($rows['oauth_uid']==''){
	?>
<img src="foto_mitra/<?php echo $rows['picture'];?>" style="width:100px"/>
	  <?php } else {?>
<img src="<?php echo $rows['picture'];?>" style="width:100px"/>
	<?php }
	?><br>
<?php echo $rows['first_name'];?> <?php echo $rows['last_name'];?><br>
<?php 
$id=$rows['id'];
if (empty($rows['oauth_provider'])) { ?>
<small>Verified by phone</small>
<?php }else{ ?><small>Verified by google account</small>
<?php } ?><br><br>
<table width="100%">
<tr style="font-weight:normal;border:1px solid grey;color:#444">
<th width="50%" style="font-weight:normal;border-right:1px solid grey;color:#444"><center><small>Total orders<br><?php
$jatuhtempo=date('d-m-Y');
$query = "SELECT COUNT(*) AS total FROM transaksi WHERE id_mitra='$id'"; 
$result = mysqli_query($mysqli, $query); 
$values = mysqli_fetch_assoc($result); 
$jim_rows = $values['total'];
echo $jim_rows; 
 ?></small></center></th>
<th width="50%"style="font-weight:normal;border-left:1px solid grey;color:#444"><center><small>available balance<br>USD <?php  $hargavo=$rows['saldo']; $rego = number_format($hargavo,0,",","."); echo $rego;?></small></center></th>
</tr>
</table>
</center><br><br>
<a href="#expe2" style="margin-top:20px;width:100%;color:#ffff;border-radius:20px;padding:10px;background:#101d25;color:#ffa800" >My Balance</a><br><br>
<center>Settings Profile</center>
<form style="text-align:left;font-size:11px;background:#fff;padding:20px"id="form"action="save.php" enctype="multipart/form-data" method="post" name="postform">
<input type="hidden" name="id" value="<?php echo $rows['id'];?>"/>
<input type="hidden" name="oauth_provider" value="<?php echo $rows['oauth_provider'];?>"/>
your ID card (Nationality)<br><small>Your data will be secure</small>
<br><input type="number" name="noktp"required="required" value="<?php echo $rows['noktp'];?>"><br>
<small>Your name</small>
<br><input type="text" name="first_name"required="required" value="<?php echo $rows['first_name'];?>"><br>
<small>City born</small>
<br><input type="text" name="tempatlahir"required="required" value="<?php echo $rows['tempatlahir'];?>"><br>
<small>Birth date</small>
<br><input type="date" name="tgllahir"required="required" value="<?php echo $rows['tgllahir'];?>"><br>
<small>Sex</small><br>
<select name="kelamin"required=required>
<option name="kelamin"value="Man">Man</option>
<option name="kelamin"value="Woman">Woman</option>
</select><br><br>
<small>Religi</small><br>
<select name="agama"required=required>
<option name="agama"value="Islam">Islam</option>
<option name="agama"value="Hindu">Hindu</option>
<option name="agama"value="Budha">Budha</option>
<option name="agama"value="Cristian">Cristian</option>

<option name="agama"value="Konghucu">Konghucu</option>
<option name="agama"value="Shinto">Shinto</option>
</select><br><br>
<small>Adress</small>
<br><input type="text" name="alamat1"required="required" value="<?php echo $rows['alamat1'];?>"><br>
<small></small>
<br><input type="text" name=""required="required" value="<?php echo $rows[''];?>"><br>
<small>Province</small>
<br><input type="text" name="provinsi"required="required" value="<?php echo $rows['provinsi'];?>"><br>
<small>Last Education</small><br>
<select name="pendidikan"required=required>
<option name="pendidikan"value="no school">no school</option>
<option name="pendidikan"value="High School">High School</option>
<option name="pendidikan"value="Diploma">Diploma</option>
<option name="pendidikan"value="Bachelor degree">Bachelor degree</option>
</select><br><br>
<small>Your Job</small><br>
<select name="profesi"required=required>
<option name="profesi"value="College">College</option>
<option name="profesi"value="Government employee">Government employee</option>
<option name="profesi"value="Engineer">Engineer</option>
<option name="profesi"value="Professional">Professional</option>
<option name="profesi"value="Teacher">Teacher</option>
<option name="profesi"value="Athlete">Athlete</option>
<option name="profesi"value="Entrepreneur">Entrepreneur</option>
<option name="profesi"value="Artist">Artist</option>
<option name="profesi"value="Politician">Politician</option>
</select><br><br>
<small>ID vehicle number</small>
<br><input type="text" name="jabatan"required="required" value="<?php echo $rows['jabatan'];?>"><br>
<small>Brand vehicle</small>
<br><input type="text" name="ahlibidang"required="required" value="<?php echo $rows['ahlibidang'];?>"><br>
<small>Jenis Transportasi</small>
<br><?php echo $rows['jenistransportasi'];?><br>
<small>Sallary</small><br>
<select name="pendapatan"required=required>
<option name="pendapatan"value="1 sd 2">1 sd 2</option>
<option name="pendapatan"value="3 sd 5">3 sd 5</option>
<option name="pendapatan"value="6 sd 10">6 sd 10</option>
<option name="pendapatan"value="11 sd 50">11 sd 50</option>
<option name="pendapatan"value="> 50">> 50</option>
</select><br><br>
<small>Marriage</small><br>
<select name="statusnikah"required=required>
<option name="statusnikah"value="Single">Single</option>
<option name="statusnikah"value="Married">Married</option>

</select><br><br>
<small>Email</small>
<br><input type="email" name="email"required="required" value="<?php echo $rows['email'];?>"><br>
<small>Password (Cant update password in demo version)</small>
<br><input type="password" value="1234" readonly name="password"required="required"><br>
<input style="border-radius:20px;padding:10px;width:100%;background:#101d25;color:#ffa800" type="submit" onclick="javascript:showDiv()" value="Save changes" name="kirim" />
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
$milk=mysqli_query($mysqli, "SELECT * FROM trans_sopir where idsopir='".$_SESSION['user']."'");
while($ent=mysqli_fetch_array($milk)){
 if($ent['statussaldo']=='minta')
      { 
   if($ent['tipesaldo']=='topup')
      { ?>
<b><small>You Request Topup</small></b><br><br>
Please transfer payment to admin bank account<br>USD <?php $koker = $ent['jumlahsaldo']; $broker = number_format($koker,0,",","."); echo $broker;?>,-
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
<a href="owner/saldohabis.php#saldo">
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
$input = "SELECT count(*) as total FROM trans_sopir WHERE idsopir='".$_SESSION['user']."' and statussaldo='minta'";
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
<?php }else{}?><br><br><center>History Finance</center><br>
<?php 
$pisti=mysqli_query($mysqli, "SELECT * FROM trans_user where id_users='".$_SESSION['user']."'");
while($liki=mysqli_fetch_array($pisti)){
?>
<table style="padding:10px;color:#444;border-bottom:1px solid grey;"id="iseqchart">
<tr style="font-size:10px;">
<td width="25%"style="">
<?php echo $liki['tgl_request'];?> 
</td>
<td width="25%"style="">
<?php echo $liki['tipesaldo'];?> 
</td>
<td width="25%"style="">
<?php echo $liki['nomorrek'];?> 
</td>
<td width="25%"style="">
USD <?php echo $liki['jumlahsaldo'];?> 
</td>
</tr>
</table>
<?php } ?><br><br>
</div>
<div style="font-size:11px;z-index:9999;color:#444;display:block;position:fixed;top:0;background:#fff;width:100%;height:100%;overflow:auto"class="resume" id="expe5">
<br><br><a style="margin-left:25px;margin-top:20px;font-size:22;border:1px solid grey;padding:5px;border-radius:10%" onclick="expe5.style.display='none'" class="closebtn">&times;</a>
<center><b style="font-size:11px"><small>Confirm</small></b></center>
<form id="form"action="owner/topupdriver.php" method="post">
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
<center style="color:"><div id="input">Account number:<br>
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
<script>jQuery(document).ready(function(a){a(".resume").hide();a('a[href^="#"]').on("click",function(b){a(".resume").hide();var c=a(this).attr("href");a(".resume"+c).toggle()})});</script>
<style>#loading{display:block;position:absolute;top:0;left:0;z-index:99999;width:100vw;height:100vh;background-image:url("hourglass.svg");background-repeat:no-repeat;background-position:center}</style>
<div id="loading" style="display:none">
</div>
<script type="text/javascript">function showDiv(){div=document.getElementById("loading");div.style.display="block"}</script>
<script src="dist/spin.min.js"></script>
<script src="dist/ladda.min.js"></script></section>
<script>Ladda.bind(".button-demo button");Ladda.bind(".progress-demo button",{callback:function(e){var f=0;var d=setInterval(function(){f=Math.min(f+Math.random()*0.1,1);e.setProgress(f);if(f===1){e.stop();clearInterval(d)}},200)}});</script>
<?php } ?>
</body>