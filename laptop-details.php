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
  background-color:#000;
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

.glyphicon-search{
  color:#2874f0;
}

}
form{
  position:relative;
  top:10px;
}

.menu{
  border-bottom:1px solid rgba(0,0,0,0.1);
}
section{
  position:relative;
  top:4.5em;
}
section .container-fluid .thumbnail .caption .buttons{
  margin:1px;
}

section .desc h5 .glyphicon{
  color:#5cb85c;
}
section .desc .breadcrumb{
  padding-left:0;
}

section .desc button:hover{
  background-color:#fff;
  border:1px solid #2874f0;
  color:#2874f0;
}

 
}

</style>
</head>
<body>

<!--<div id="mySidenav" class="sidenav">
 <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="home.php">Home</a>
  <a href="product1.php">Product</a>
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
            <!--<img src="https://img.freepik.com/free-psd/logo-mockup_35913-2089.jpg?size=626&ext=jpg" alt="logo" style="width:100%;">-->
        </div>
    </div>
</div>

<!---------------------------------------------------------------------------------------->
<div class="col-12">
    <h1 class="text-center">Laptop</h1>
</div>
<div class="menu container-fluid text-center hidden-xs" style="position:relative;top:4em; padding-bottom:5px;">
    <div class="container-fluid">
      <div class="row">
        
        
        
      </div>
    </div>
  </div>
  
 <section>
   <div class="container-fluid">
     <div class="row">
       <!-- Product picture -->
       <div class="col-sm-5">
         <div class="thumbnail">
           <img src="https://images.unsplash.com/photo-1603302576837-37561b2e2302?ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTV8fGxhcHRvcHxlbnwwfHwwfHw%3D&ixlib=rb-1.2.1&w=1000&q=80" class="img-responsive" alt="">
         </div>
      </div>
       
       <!-- Product Description -->
       <div class="col-sm-7 desc">
        
         <div>
           
           
           
           <h4>Apple iPhone X (Silver 64GB)</h4>
           
           <div class="row">
              <div class="col-sm-2">
                <span class="label label-success">4.6 <span class="glyphicon glyphicon-star"></span></span>
              </div>
           
              <div class="col-sm-5">
                <strong>2,421 Ratings & Reviews</strong>
              </div>
           
          </div>
           
         <div>
          <h3>Rs 92,400</h3> 
         </div>
           
         <div>
                  
          
         
         </div>    
          
           <br> 
         <div class="row">
           <div class="col-sm-3">
             <a class="btn btn-default btn-block"><i class="fa fa-apple" style="font-size:25px;"></i></a>
           </div>
           <div class="col-sm-9">
             
             <h5>Brand Warranty of 1 Year <a href="">Know More</a></h5>
           </div>
         </div>
         <br>
           
           <div class="row">
             
             <div class="col-sm-6">
               <strong>Color</strong>
                <br><br>
                <button class="btn btn-default" style="width:50px;border:1px dashed #337ab7;"><img src="https://cdn.mobilephonesdirect.co.uk/images/handsets/480/apple/apple-iphone-x-silver.png" class="img-responsive" alt=""></button>
               <button class="btn btn-default" style="width:50px;"><img src="https://cdn.mobilephonesdirect.co.uk/images/handsets/apple/apple-iphone-x-space-grey.png" class="img-responsive" alt=""></button>
              </div>
             
             <div class="col-sm-6">
               <strong>Storage</strong>
               <br>
               <br>
               <button class="btn btn-default" style="color:#337ab7;border:1px dashed #337ab7;">64GB</button>
               <button class="btn btn-default">256GB</button>
             </div>
             
         </div>
         
           <br><br>
           
                      <br><br>
           
           <div id="highlights">
            <strong class="col-xs-3">Highlights</strong> 
             <ul class="col-xs-6">
               <li> 64GB ROM</li>
               <li> 5.8 inch Super Retina HD Display</li>
               <li> 12MP + 12MP Dual Rear Camera | 7MP Front Camera</li>
               <li> lithium-ion Battery</li>
               <li> A11 Bionic Chip with 64-bit Architecture, Neural Engine, Embedded M11 Motion Co-processor</li>
             </ul>
           </div>
         
         </div>
         <br><br>
         
         <div class="container col-xs-12" style="margin-top:50px;">
           <div class="panel panel-default">
             <div class="panel-body">
               <div class="col-sm-12">
                 <h3 style="color:#000">PRODUCT DESCRIPTION</h3>
               <p style="color:#000">Meet the iPhone X - the device that’s so smart that it responds to a tap, your voice, and even a glance. Elegantly designed with a large 14.73 cm (5.8) Super Retina screen and a durable front-and-back glass, this smartphone is designed to impress. What’s more, you can charge this iPhone wirelessly.</p>
                 
               </div>
               
             </div>
             <hr>
             <div class="panel-body">
              <div class="col-sm-12">
                 
                 <div class="col-sm-8">
                 <h3 style="color:#000">14.73 cm Super Retina Screen</h3>
                 <p style="color:#000">Movies or games - with its Super Retina screen, you can enjoy an immersive-viewing experience that dazzles the eyes.</p>
               </div>
                 
               <div class="col-sm-4">
                 <img src="https://images.unsplash.com/photo-1603302576837-37561b2e2302?ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTV8fGxhcHRvcHxlbnwwfHwwfHw%3D&ixlib=rb-1.2.1&w=1000&q=80" class="img-responsive" alt="">
               </div>
                 
               </div>
               </div>
               <hr>
               <div class="panel-body">
                 <div class="col-sm-12">
                 
               </div>
                 
               </div>
               
             <div class="panel-footer">
        
               
                 
                 <h4><a href="" style="text-decoration:none;">View all features</a></h4>
             
               
               </div>
             
           </div>
           
           
           <!-- Specifications -->
           
           <div class="panel panel-default" id="specifications">
             <div class="panel-heading" style="background-color:#fff;">
               <h3>Specifications</h3>
             </div>
       
             <div class="panel-body">
               
               <h4>General</h4>
               
               <table class="table table-default">
                 <tbody>
                   <tr><td class="col-sm-4">In The Box</td> <td class="col-sm-8">
Handset, EarPods with Lightning Connector, Lightning to 3.5 mm Headphone Jack Adapter, Lightning to USB Cable, USB Power Adapter, Documentation</td></tr>
                   
                   <tr><td class="col-sm-4">Model Number</td>  <td class="col-sm-8">
MQA62HN/A</td></tr>
                   
                    <tr><td class="col-sm-4">Model Name</td>  <td class="col-sm-8">iPhone X</td></tr>
                   
                   <tr><td class="col-sm-4">Color</td>  <td class="col-sm-8">Silver</td></tr>
                   
                   <tr><td class="col-sm-4">Browse Type</td>  <td class="col-sm-8">Smartphones</td></tr>
                   
                 </tbody>
                 
               </table>
             
             </div>
             
             <div class="panel-footer">
               <h4><a href="">Read More</a></h4>
               </div>
           </div>
           
         </div>
         
     </div>
   </div>
  </section> 
   
   <br><br>

                          
<!----------------------------------------------------------->
<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
</script>


   
 <script>
function goBack() {
  window.history.back();
}
</script>
   
</body>
</html> 
