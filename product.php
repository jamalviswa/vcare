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
  background-color: #111;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
  font-family:Arial rounded;
}

.sidenav a {
  padding: 35px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
  font-family:Arial rounded;
}

.sidenav a:hover {
  color: #f1f1f1;
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



.flex-container {
  display: flex;
  flex-wrap: wrap;
 padding: 50px;
  
}

.flex-container > div {
  width: 100px;
  margin: 10px;
  text-align: center;
  line-height: 75px;
}
.image{
    
    max-width: 95%;
    /*height: 85px;*/
    border-radius: 20px;
    display: flex;
}
.card {
    position: relative;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 1px solid rgba(0,0,0,.125);
    padding: 50px;
    border-radius: 20%;
}
center{
    
   padding: 2px 16px 15px 25px;
    
}

.card-body {
    -ms-flex: 1 1 auto;
    flex: 1 1 auto;
    position: relative;
    margin-top:10px;
    margin-left:0px;
    width:100%;
    height:100%;
    text-align:center;
    border-radius:25px;
    background-color:white;
}
.mb-1, .my-1 {
    margin-bottom: 0.25rem !important;
    transform: translate(25%, 25%) !important;
    font-family:Arial rounded;;
}
p{
    font-family:Arial rounded;
    text-align:center;
    
}
.center1 {
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

<!--<div id="mySidenav" class="sidenav">
 <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="home.php">Home</a>
  <a href="product3.php">Product</a>
  <a href="history1.php">Account</a>
  <a href="notification.php">Notification</a>
  <a href="contact.php">Contact us</a>
   <a href="logout.php?logout">Logout</a>
</div>-->

<div class=container id="home">
    <div class="row">
        <div class="col-md-6">
            <i style="font-size:24px;margin-top:5%" class="fa" onclick="goBack()">&#xf060;</i>
        </div>
        <div class="col-md-6">
            <!--<img src="https://img.freepik.com/free-psd/logo-mockup_35913-2089.jpg?size=626&ext=jpg" alt="logo" width=100>-->
        </div>
    </div>
</div>

<!---------------------------------------------------------------------------------------->
<div class="col-12">
    <!--<h1 class="text-center">Products</h1>-->
</div>
    
    <?php
$query = "SELECT * FROM jw_product WHERE status = 1 ";
if(!empty($_REQUEST['id'])){
    $query .=" AND menu_id = ".$_REQUEST['id'];
}
if(!empty($_REQUEST['pid'])){
    $query .= " AND product_id = ".$_REQUEST['pid'];
}
$jiew=mysqli_query($mysqli, $query);
$count=mysqli_num_rows($jiew);
$i = 0;
while($jows=mysqli_fetch_array($jiew)){
$product_tag=$jows['product_tag'];
$image=$jows['product_image_ori'];
$price=$jows['hargaeceran'];
$product_name=$jows['spesifikasi'];
$product_desc=$jows['deskripsi'];
$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

?>
<?php 
if ( $i % 3 == 0 && $i != 0 && $i != $count ) echo "<tr></tr>"; ?>
<td style="width:100%;height:100px;">
    
<div class="col-md-4">
        <div class="card-body"> 
            <a href="product.php?pid=<?php echo $jows['product_id']; ?>"><img src="https://vcare.viswatechnologysolutions.com/taxi/owner/fotobarang/<?php echo $image;?>" class="center1"></a>  
        
        <div>
            <div style="color:#000;font-family:auto;">
                <h3><?php echo $jows['product_tag'] ?></h3><br>
                <?php
                if(!empty($_REQUEST['pid'])){
                    ?>
                    
                    <p style="background-color:#101D25;border-radius:20px;margin:auto;margin-top:10px;margin-bottom:10px;color:#FFA500;padding:10px;font-size:20px;width:100px;"><b>₹ <?php echo $jows['hargaeceran']; ?></b></p><br>
                    <p style="font-size:20px"><b>Description : </b><br></p>
                        <ul style="list-style-type:disc">
                            <li><?php echo $jows['deskripsi']; ?><br></li>
                        </ul>
                    <?php
                }
                ?>
                
            </div>
       
      </div>
      </div>
  </div>

<?php $i++;} ?>
<!--<div class="card1">
  <div class="card-body">
      <div class="row">
        <div class="col-4">
            <a href="#"><img src="https://www.hp.com/us-en/shop/app/assets/images/uploads/prod/best-10-hp-desktops-for-everyday-use-21552526779305.png?impolicy=prdimg&imdensity=1&imwidth=600" style="width:100%"></a>  
        </div>
        <div class="col-8">
            <ul style="color:#000;font-family:auto;">
                <li>HP Slimline desktop PC</li>
                <li>8 GB RAM 1 TB Hard-Disk</li>
                <li>Price:35,000</li>
            </ul>
        </div>
      </div>
  </div>
</div>
<div class="card1">
  <div class="card-body">
      <div class="row">
        <div class="col-4">
            <a href="#"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRBqmakTl4JvyoxfwnykfH0EmkQqQGhog3LPw&usqp=CAU" style="width:100%"></a>  
        </div>
        <div class="col-8">
            <ul style="color:#000;font-family:auto;">
                <li>HP Smart Tank 530 Printer</li>
                <li>High-quality ink tank printing with faster connections</li>
                <li>Price:18,995.00 </li>
            </ul>
        </div>
      </div>
  </div>
</div>
<div class="card1">
  <div class="card-body">
      <div class="row">
        <div class="col-4">
            <a href="#"><img src="https://img2.exportersindia.com/product_images/bc-full/dir_87/2597606/cctv-camera-1523621140-3779532.jpeg" style="width:100%"></a>  
        </div>
        <div class="col-8">
            <ul style="color:#000;font-family:auto;">
                <li>CCTV Camera, Type : Analog Etc</li>
                <li>Available In Various Colors</li>
                <li>Price:1,000/Piece </li>
            </ul>
        </div>
      </div>
  </div>
</div>-->

                          
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
   
   <script>
function goBack() {
  window.history.back();
}
</script>

   
</body>
</html> 
