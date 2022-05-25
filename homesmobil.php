
<?php
session_start();
include_once 'dbconnect.php';
if(!isset($_SESSION['user']))
{
	header("Location: home.php");
}
$res=mysqli_query($mysqli, "SELECT * FROM users WHERE id=".$_SESSION['user']);
$rows=mysqli_fetch_array($res);

?>
<?php
$jiew=mysqli_query($mysqli, "SELECT * FROM transaksi where id_users='".$_SESSION['user']."' and aktif='yes'");
$jow=mysqli_fetch_array($jiew);
	?>
<?php 
 if($jow['status_trans']=='minta')
      { ?>
<script>document.location.href="about.php#about";</script><?php }
?>
<?php
if($jow['status_trans']=='otw')
      {?>
<script>document.location.href="otw.php";</script><?php }?>
<?php
if($jow['status_trans']=='dijemput')
      {?>
<script>document.location.href="dijemput.php";</script><?php }?>
<head>
<meta charset="UTF-8"/>
<meta http-equiv="X-UA-Compatible"content="IE=edge,chrome=1">
<meta name="viewport"content="width=device-width, initial-scale=1.0">
<link rel="stylesheet"href="themes/base/jquery.ui.all.css"><script src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script src="jquery.ui.addresspicker.js"></script>
<link rel="stylesheet"type="text/css"href="demo.css"/>
<style type="text/css">ul{padding:0;list-style:none}ul li{display:inline-block;position:relative;line-height:21px;text-align:left}ul li a{display:block;padding:8px 25px;color:#444;text-decoration:none}ul li a:hover{color:#red}ul li ul.dropdown{min-width:100%;background-color:#FFF;display:none;position:absolute;z-index:999;left:-50px;top:35px;border:1px solid grey}ul li:hover ul.dropdown{display:block}ul li ul.dropdown li{display:block}#home{display:none}#loading{display:block;position:absolute;top:0;left:0;z-index:99999;width:100vw;height:100vh;background-image:url("hourglass.svg");background-repeat:no-repeat;background-position:center}</style>
<link rel="stylesheet"href="css/bemo.css">
<link rel="stylesheet"href="dist/ladda.min.css">
<link rel="stylesheet" href="w3.css">
</head>
<script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=true"></script>
<script>if(!navigator.geolocation){alert("Your phone does not support maps Location.")}navigator.geolocation.getCurrentPosition(success,error);function success(f){var g=f.coords.latitude;var e=f.coords.longitude;var h=f.coords.accuracy;document.getElementById("lat").value=g;document.getElementById("lng").value=e}function error(b){document.location.href="homesamobil.php#home"};
</script>
<body onload="getLocation()" onkeydown="javascript:if(window.event.keyCode==13)window.event.keyCode=9">
<div class="w3-container w3-center w3-animate-top">
<div class="sodrops-top" style="height:60px;">
<span class="actions" style="float:left">
<ul>
<li><a href="home.php" onclick="javascript:showDiv();"><img src="icon/back.png"width="25px"/></i></a></li>
</ul>
</span>
<style>::-webkit-input-placeholder{color:#ada7a7}:-moz-placeholder{color:#ada7a7;opacity:1}::-moz-placeholder{color:#ada7a7;opacity:1}:-ms-input-placeholder{color:#ada7a7}::-ms-input-placeholder{color:#ada7a7}#input{color:#fff;position:relative;display:inline-block;width:100%}nav{position:absolute;content:'';height:40px;height:2px;background:#e87817;transition:all .2s linear;width:0;bottom:1px}input:hover ~ nav{width:100%}</style>

<div style="color:#fff;margin-top:20px;font-size:15px;font-weight:bold;font-family:Segoe UI light;float:right;padding-right:20px;">Passengers Adress (Pickup)
</div></div></div>

<style>::-webkit-input-placeholder{color:#ada7a7}:-moz-placeholder{color:#ada7a7;opacity:1}::-moz-placeholder{color:#ada7a7;opacity:1}:-ms-input-placeholder{color:#ada7a7}::-ms-input-placeholder{color:#ada7a7}#input{color:#fff;position:relative;display:inline-block;width:100%}nav{position:absolute;content:'';height:40px;height:2px;background:#e87817;transition:all .2s linear;width:0;bottom:1px}input:hover ~ nav{width:100%}</style>
<div class="w3-container w3-center w3-animate-bottom">
<br><br><br><style>#map{height:400px;width:100%;border-radius:25px}.controls{margin-top:10px;border:1px solid transparent;border-radius:2px 0 0 2px;box-sizing:border-box;-moz-box-sizing:border-box;height:32px;outline:0;box-shadow:0 2px 6px rgba(0,0,0,0.3);left:0}#type-selector{color:#fff;background-color:#4d90fe;padding:5px 11px 0 11px}#type-selector label{font-family:Roboto;font-size:13px;font-weight:300}#target{width:345px}.cc-selector input{margin:0;padding:0;-webkit-appearance:none;-moz-appearance:none;appearance:none}.cc-selector-2 input{position:absolute;z-index:999}.visa{background-image:url(img/motor.png)}.mastercard{background-image:url(img/car.png)}.cc-selector-2 input:active+.drinkcard-cc,.cc-selector input:active+.drinkcard-cc{opacity:.9}.cc-selector-2 input:checked+.drinkcard-cc,.cc-selector input:checked+.drinkcard-cc{-webkit-filter:none;-moz-filter:none;filter:none}.drinkcard-cc{cursor:pointer;background-size:contain;background-repeat:no-repeat;display:inline-block;width:40;height:40px;-webkit-transition:all 100ms ease-in;-moz-transition:all 100ms ease-in;transition:all 100ms ease-in;-webkit-filter:brightness(1.8) grayscale(1) opacity(.7);-moz-filter:brightness(1.8) grayscale(1) opacity(.7);filter:brightness(1.8) grayscale(1) opacity(.7)}.drinkcard-cc:hover{-webkit-filter:brightness(1.2) grayscale(.5) opacity(.9);-moz-filter:brightness(1.2) grayscale(.5) opacity(.9);filter:brightness(1.2) grayscale(.5) opacity(.9)}a:visited{color:#888}a{color:#444;text-decoration:none}p{margin-bottom:.3em}</style>
<form id="form"action="homer.php" method="post">
<script src="jquery.ui.addresspicker.js"></script>
<script src="https://maps.google.com/maps/api/js?sensor=true"></script>
<script type="text/javascript"src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAO4lbxY6SKygcJxTuzu-Qi7kAAP9SdAwM&callback=initMap"></script>
<script>var x=document.getElementById("demo");function getLocation(){if(navigator.geolocation){navigator.geolocation.getCurrentPosition(showPosition,showError)}else{x.innerHTML="Geolocation is not supported by this browser."}}function showPosition(a){lat=a.coords.latitude;lon=a.coords.longitude;document.getElementById("lat").value=lat;document.getElementById("lng").value=lon;latlon=new google.maps.LatLng(lat,lon);mapholder=document.getElementById("mapholder");mapholder.style.height="400px";mapholder.style.width="100%";var c={center:latlon,zoom:14,mapTypeId:google.maps.MapTypeId.ROADMAP,mapTypeControl:false,navigationControlOptions:{style:google.maps.NavigationControlStyle.SMALL}};var d=new google.maps.Map(document.getElementById("mapholder"),c);var b=new google.maps.Marker({position:latlon,map:d,title:"You are here!",draggable:true});google.maps.event.addListener(b,"dragend",setCoordinates)}function setCoordinates(a){document.getElementById("lat").value=a.latLng.lat();document.getElementById("lng").value=a.latLng.lng()}function showError(a){switch(a.code){case a.PERMISSION_DENIED:x.innerHTML="User denied the request for Geolocation.";break;case a.POSITION_UNAVAILABLE:x.innerHTML="Location information is unavailable.";break;case a.TIMEOUT:x.innerHTML="The request to get user location timed out.";break;case a.UNKNOWN_ERROR:x.innerHTML="An unknown error occurred.";break}}</script>
<div id="mapholder" style="border-radius:25px"></div>
<input type="hidden"name="lat"id="lat"/>
<input type="hidden"name="lng"id="lng"/>
<br><br><br><br><br>
<input type="hidden" name="layanan"value="passengers"/>
<script>function showlocation(){if("geolocation" in navigator){navigator.geolocation.getCurrentPosition(callback,error)}else{console.warn("geolocation IS NOT available")}}function error(a){}function initialize(){var c=[];var a=new google.maps.Map(document.getElementById("map"),{mapTypeId:google.maps.MapTypeId.ROADMAP});function h(j){var l=j.coords.latitude;var k=j.coords.longitude;document.getElementById("lat").value=l;document.getElementById("lng").value=k}var d=new google.maps.LatLng(-7.0274846,108.2405507);var e=new google.maps.Marker({position:d,draggable:true,map:a,zoom:18,animation:google.maps.Animation.DROP});c.push(e);var b=new google.maps.LatLngBounds(new google.maps.LatLng(-7.0274846,108.2405507));a.fitBounds(b);var g=document.getElementById("pac-input");a.controls[google.maps.ControlPosition.TOP_CENTER].push(g);var i=new google.maps.places.SearchBox(g);google.maps.event.addListener(i,"places_changed",function(){var l=i.getPlaces();if(l.length==0){return}for(var m=0,k;k=c[m];m++){k.setMap(null)}c=[];var n=new google.maps.LatLngBounds();for(var m=0,j;j=l[m];m++){var o={url:j.icon,size:new google.maps.Size(90,90),origin:new google.maps.Point(0,0),anchor:new google.maps.Point(17,34),scaledSize:new google.maps.Size(25,25)};var k=new google.maps.Marker({draggable:true,map:a,icon:o,title:j.name,zoom:14,animation:google.maps.Animation.DROP,position:j.geometry.location});google.maps.event.addListener(k,"dragend",function(p){f(this.getPosition())});google.maps.event.addListener(k,"click",function(p){f(this.getPosition())});c.push(k);n.extend(j.geometry.location)}a.fitBounds(n)});google.maps.event.addListener(a,"bounds_changed",function(){var j=a.getBounds();i.setBounds(j)});function f(j){document.getElementById("lat").value=j.lat();document.getElementById("lng").value=j.lng()}}initialize();</script>
<br><br><br><br><br></div>
<table width="100%" style="width:100%;z-index:9999;bottom:0;position:fixed;background-color:#fff">
<tr>
<td colspan="2" style="color:#09c"><label ><small><center><br>address details</center></small></label>
<div id="input"><input style="background:url(icon/user.png) no-repeat 12px;width:100%;padding-left:40px;vertical-align:middle;border-bottom:1px solid #fff;background-size:20px" type='text'name="alamat"class='holo'placeholder="input street name, number house, etc" aria-required="true" required="required"/>
<nav></nav></div>
<br></td>
</tr>
<tr>
<td style="font-size:11px;padding:20px;color:#09c"width="50%">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.8.3/jquery.js"></script>
<table><tr>
<td><div class="cc-selector">
<input class="radioBtn" id="visa" type="radio" name="tipe" value="motorcycle"/>
<label class="drinkcard-cc visa" for="visa"></label>
</div>
</td>
<td><div class="cc-selector">
<input class="radioBtn" id="mastercard" type="radio" name="tipe" value="car" checked=checked/>
<label class="drinkcard-cc mastercard"for="mastercard"></label>
</div>
</td></tr></table></td>
<td style="font-size:17px;padding:20px;color:#09c"width="50%"> <div class="Box" style="display:none">
<center>
<button type="submit"name="submit" style="padding:10px;border:2px solid #09c;border-radius:10px;text-align:center;tfont-weight:bold;color:#09c;background:0" onclick="javascript:showDiv()"><small>NEXT</small></button>
</center></div>
<script>

$('input[type="radio"]').click(function(){
        if($(this).attr("value")=="motorcycle"){
            $(".Box").show('slow');
        }
        if($(this).attr("value")=="car"){
            $(".Box").show('slow');

        }        
    });
$('input[type="radio"]').trigger('click');
</script>
</form>
</td>
</tr>
</table>
</div><br><br>
</body>
<div id="loading" style="display:none">
</div>
<script type="text/javascript">function showDiv(){div=document.getElementById("loading");div.style.display="block"};</script>
<script src="dist/spin.min.js">
</script>
<script src="dist/ladda.min.js">
</script></section>
<script>Ladda.bind(".button-demo button");Ladda.bind(".progress-demo button",{callback:function(a){var c=0;var b=setInterval(function(){c=Math.min(c+Math.random()*0.1,1);a.setProgress(c);if(c===1){a.stop();clearInterval(b)}},200)}});
</script>