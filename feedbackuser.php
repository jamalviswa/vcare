<?php

//$session_lifetime = 3600 * 24 * 860; // 2 days
//session_set_cookie_params ($session_lifetime);
session_start();

include_once 'dbconnect.php';



if(isset($_POST['submit']))
{
    
   $name=$_POST['name'];
   $email=$_POST['email'];
   $ok=$_POST['ok'];
   $feedback=$_POST['feedback'];
  
 


 $res=mysqli_query($mysqli, "INSERT INTO `userfb` ( `name`,`email`,`ok`, `feedback`) VALUES ('$name','$email','$ok','$feedback');");
if($res)
{
 header('Location:thankyou.php ');

}
else
{
echo $date;

}

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
  	background-color:#D0D0D0;
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

.tabledf td
    {
      
         padding:8px;
          font-family: Arial, Helvetica, sans-serif;
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
   <a href="feedbackuser.php">Feedback</a>
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
</div>

    
</div>
<center>
<form method="post">
  
 <div  class="tabledf">
     <h2 style="color:#0B0B45; "> Feedback</h2>
 <h4><i>Please help us to serve you better by taking couple of minutes.</i></h4>   
 <h4 style="color:#0BA8E6 ;">how satisfied were you with our service</h4>
 <table>
 <tr>
     <td>
         <input type="radio" value="excelent" name="ok">Excellent
     </td>
 </tr>
 <tr>
     <td>
         <input type="radio" value="good"  name="ok">Good
     </td>
 </tr>
 <tr>
     <td>
         <input type="radio" value="neutral" name="ok">Neutral
     </td>
 </tr>
 <tr>
     <td>
         <input type="radio" value="poor" name="ok">Poor
     </td>
 </tr><br>

 <tr>
     <td>
         <h5>if you have specific feedback,please write to us.</h5>
     </td>
 </tr>
 <tr>
     <td>
         <textarea rows="5" cols="45" name="feedback"></textarea>
     </td>
 </tr>
 <tr>
     <td>
        Name  <input type="text" name="name">
     </td>
 </tr>

<tr>
     <td>
        Email  <input type="email" name="email">
     </td>
 </tr>
 
<tr>
    <td><center><button type="submit" style="font-size: 20;width:50%;padding:10px;border-radius:20px;text-align:center;font-weight:bold;color:#ffa800;background:#101D25;" name="submit">Submit Feedback</button></center></td> 
    </td>
</tr>
 
 </table>
 </div>
</form> </center>



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
