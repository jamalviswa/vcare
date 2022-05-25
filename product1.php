<?php include_once 'dbconnect.php';?>

<!DOCTYPE html>
<html style="overflow-x: hidden;">
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <platform name="android"> <access origin="*" /> <preferance name="android-usesCleartextTraffic" value="true" /> <allow-navigation href="*" /> </platform>

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
  background-color:#101D25;
  color:#fff;
    overflow-x: hidden;
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
.filter-buttons {
  display: flex;
  margin-bottom: 20px;
}


p{
	color:#101D25;
	font-size: 20px;
	text-align: center;
}
.card-body {
    -ms-flex: 1 1 auto;
    flex: 1 1 auto;
    position: relative;
    margin-top:10px;
    margin-left:-10px;
    width:100%;
    height:100%;
    text-align:center;
    border-radius:25px;
    background-color:white;
}

.center {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 250px;
  height: 250px;
}

.card1 {
    position: relative;
    /*display: -ms-flexbox;
    display: flow-root;
    -ms-flex-direction: column;
    flex-direction: column;
    min-width: 0;*/
    word-wrap: break-word;
    background-color: white;
    /*background-clip: border-box;*/
    position: relative;
    margin-bottom: 1.5rem;
    text-align:center;
    width: 100%;
    border-radius:20px;
    /*box-shadow: 0px 10px 10px 20px rgb(176 184 214 / 9%), 10px 10px 15px 5px #b0b8d6;*/
    
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
            <span style="font-size:30px;cursor:pointer;color:#FFA800;" onclick="openNav()">&#9776; <img src="./assets/img/Logo 1.png" alt="logo" style="width:20%;height:80%;float: right;"><b>Product</b></span>
        </div>
        <div class="col-md-6">
            <!--<img src="https://img.freepik.com/free-psd/logo-mockup_35913-2089.jpg?size=626&ext=jpg" alt="logo" style="width:100%;">-->
        </div>
    </div>
</div>

<!---------------------------------------------------------------------------------------->
<div class="col-12">
	<!--<h1 class="text-center">Product</h1>-->
</div>




<div class="col-md-4">
    
      
        <ul>
            <?php
    $query = "SELECT * FROM jw_menu_detail WHERE status = 1";
    $exec = mysqli_query($mysqli, $query);
    while($res = mysqli_fetch_array($exec)){
        ?>
        <div class="card-body">
        <h4><a href = "product.php?id=<?php echo $res['id']; ?>"><img src="<?php echo $res['image']?>" class="center"><br><b><?php echo $res['namalapangan']?></b></a></h4>
        </div>
        <br>
        <?php
    }
    ?>
    </ul>
                
</div>
<br>

                         
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
  var latlon = new google.maps.LatLng(lat, lon)
  var mapholder = document.getElementById('mapholder')
  mapholder.style.height = '350px';
  mapholder.style.width = '500px';

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
        alert(results[0].formatted_address);
        $('#map_address').val(results[0].formatted_address);
        
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
