<?php

if(isset($_POST['submit']))
{
   
  
    $type=$_POST['type'];
    $id=$_POST['id'];
  
  
}
?>
<?php

//$session_lifetime = 3600 * 24 * 860; // 2 days
//session_set_cookie_params ($session_lifetime);
session_start();

include_once 'dbconnect.php';
if(!isset($_SESSION['user']))
{
	header("Location: fdex.php#reg");
}
$res=mysqli_query($mysqli, "SELECT * FROM users WHERE id=".$_SESSION['user']);
$rows=mysqli_fetch_array($res);
		$_SESSION['user'] = $rows['id'];
	if($rows['sebagai']=='driver')
      {
	header("Location: maaf.php");
	  }
?>

<!DOCTYPE html>
<html>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,300italic,400italic,500,500italic,700,700italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:700,400,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=PT+Serif' rel='stylesheet' type='text/css'>
    <script src="https://maps.google.com/maps/api/js?key=AIzaSyAteo77fhOppaMLuJxZ1dggEd5qHuiyhSU"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<style>
body {
  font-family: "Lato", sans-serif;
  color:#101D25;
}
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 400px;
 
  margin: auto;
  text-align: center;
  font-family: arial;
}

.price {
  color: grey;
  font-size: 22px;
}

.card button {
  border: none;
  outline: 0;
  padding: 12px;
  color: white;
  background-color:#101d25;
  text-align: center;
  cursor: pointer;
  width: 100%;
 
 
}

h1
{
  font-size: 20px;  
  font-weight:bold;
}
.card button:hover {
  opacity: 0.7;
}
.sidenav {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #101D25;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
  font-family:Arial rounded;
}

.sidenav a {
  padding: 35px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #ffffff;
  display: block;
  transition: 0.3s;
  font-family:Arial rounded;
}

.sidenav a:hover {
  color: #101D25;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
.form-control {
    display: block;
    width: 100%;
    height: 34px;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.42857143;
    color: #555;
    background-color: #fff;
    background-image: none;
     border: 2px solid; 
    border-radius: 4px;
    -webkit-box-shadow: inset 0 1px 1px rgb(0 0 0 / 8%);
    box-shadow: inset 0 1px 1px rgb(0 0 0 / 8%);
    -webkit-transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
    -o-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
    transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
}

.addi
{
   
   box-shadow: 0 4px 8px 0 rgba(16,29,37);
    width: 350px;
    height: 200px;
    margin-left:11px;
    border-radius:20px;
  background-color: #fff;
}


.flex-container {
  display: flex;
  flex-wrap: wrap;
  padding: 20px;
}

.flex-container > div {
  width: 100px;
  margin: 10px;
  text-align: center;
  line-height: 75px;
}
.image{
    width:100%;
}
</style>
</head>

<body>

<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="home.php">Home</a>
  <a href="aboutsus.php">About Us</a>
  <a href="product1.php">Product</a>
  <a href="history1.php">My Profile</a>
  <a href="quotation.php">Quotation</a>
  <!--<a href="notification.php">Billing</a>-->
  <a href="contact.php">Contact us</a>
   <a href="logout.php?logout">Logout</a>
</div>

<div class=container id="home">
    <div class="row" style="background-color: #101D25">
        <div class="col-md-6" style="margin-top: 25px">
            <span style="font-size:24px;cursor:pointer;color:#FFA800;" onclick="openNav()">&#9776; <img src="./assets/img/Logo 1.png" alt="logo" style="width:20%;height:80%;float:right; margin-left:%"><b>Vcare Systems</b></span>
            
        </div>
        <div class="col-md-6">
            <!--<img src="https://img.freepik.com/free-psd/logo-mockup_35913-2089.jpg?size=626&ext=jpg" alt="logo" style="width:100%;">-->
        
        </div>
    </div>
    <div class="container" style="height:50px; margin-top: 10px; display:none; margin-right:5px;">
    <div class="row">
      
        </i>
        
        <p id="demo"></p>

<!--<button onclick="getLocation()">Try It</button>-->

    <div style="display:none" id="mapholder"></div>
    </div>
</div>

    
</div>

<form method="post" action="checkuserdata.php">

<h1 style="text-align:center; font-size: 35px;padding:10px;">Service Detail</h1>
<form id="article_form" method="post" action="checkuserdata.php">
<div class="card">
  <img src="asd.png" style="width:100%;padding:20px;">
 <p style="margin-top:15%;"></p>
 
 <div class="addi">
  <h1>  Location: </h1><input type="text" style="border: none; padding: 8px;"class="form-control"  alt="location-icon"  value="" id="map_address"> 
   <h1>Type of service :<input style="width:35%;outline:0;border: none;" type="text" value="<?php echo $type; ?>" name="type" ></h1>
<h1>Basic Fare :</h1>
</div>
 <p style="margin-top:7%;"></p>
  <input type="hidden" name="location" id="location" />
 <p><button style="color:#FFA800;border-radius:20px;width:50%"><b>Submit</b></button></p></a>
  
</div>
<div>

<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {box-sizing: border-box;
    margin-top:-1%;
}
body {font-family: Verdana, sans-serif; }
.mySlides {display: none;
    position:relative
}
img {vertical-align: middle;}

/* Slideshow container */
.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
}

/* Next & previous buttons */
.prev, .next {
  cursor: pointer;
  position: fixed;
  width: auto;
  padding: 16px;
  margin-top: 20%;
  color: black;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
 
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  cursor: pointer;
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active, .dot:hover {
  background-color: #717171;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .prev, .next,.text {font-size: 11px}
}
</style>
</head>
<body>


<br>


<script>
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}
</script>

</body>
 

</div>


<input type="hidden" id="id" name="id" value="<?php echo $rows['id'];?>" />
<input type="hidden" id="lat" type="float" name="lat" value=""/>
<input type="hidden" id="lng" type="float" name="lng" value=""/>
<input type="hidden" id="products" type="text" name="products" value="Laptop"/>

</form>
<!---------------------------------------------------------------------------------------->






<!----------------------------------------------------------->
<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
</script>

<!--Map Script start--->
<script>
$('#cars').change(function(){
    var p = $('#products').val();
    //alert("hai");
    $('#products').val(p);
});
$(document).ready(function(){
   getLocation(); 
});
var x = document.getElementById("demo");
function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition, showError);
  } else { 
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
}

function showPosition(position) {
  var lat = position.coords.latitude;
  var lon = position.coords.longitude;
  $('#lat').val(lat);
  $('#lng').val(lon);
  var latlon = new google.maps.LatLng(lat, lon)
  var mapholder = document.getElementById('mapholder')
  mapholder.style.height = '240px';
  mapholder.style.width = '450px';

  var myOptions = {
    center:latlon,zoom:14,
    mapTypeId:google.maps.MapTypeId.ROADMAP,
    mapTypeControl:false,
    navigationControlOptions:{style:google.maps.NavigationControlStyle.SMALL}
  }
    
  var map = new google.maps.Map(document.getElementById("mapholder"), myOptions);
  var marker = new google.maps.Marker({position:latlon,map:map,title:"You are here!"});
  
  var geocoder = new google.maps.Geocoder();
var latlong = new google.maps.LatLng(lat,lon);

geocoder.geocode({
    'latLng': latlon
}, function(results, status) {

    if (status == google.maps.GeocoderStatus.OK) {
    //    alert(results[0].formatted_address);
        $('#map_address').val(results[0].formatted_address);
        $("#location").val(results[0].formatted_address);
    }
});
}

function showError(error) {
  switch(error.code) {
    case error.PERMISSION_DENIED:
      x.innerHTML = "User denied the request for Geolocation."
      break;
    case error.POSITION_UNAVAILABLE:
      x.innerHTML = "Location information is unavailable."
      break;
    case error.TIMEOUT:
      x.innerHTML = "The request to get user location timed out."
      break;
    case error.UNKNOWN_ERROR:
      x.innerHTML = "An unknown error occurred."
      break;
  }
}
</script>
<!--Map Script End--->
   
   

   
</body>
</html> 
