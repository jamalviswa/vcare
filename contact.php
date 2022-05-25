
<?php
if(isset($_POST['submit'])) {
         $to ="viswa.technologysolution@gmail.com";
         $subject = "From vcare systems";
         $firstname=$_POST['firstname'];
         $message = 'Name: '.$firstname."\r\n".$_POST['message'];
         $message1 = "Thanks for Your Valuable comments.Our representative will contact soon!";
         $email_from = $_POST['email'];
         $headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($to, $subject, $message, $headers);
@mail($email_from, $subject, $message1, $headers);
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
  font-family: Arial rounded;

}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #ffffff;
  display: block;
  transition: 0.3s;
  font-family: Arial rounded;

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
    
    transform: translate(20px, 0px);
    max-width:95%;
    height: 85px;
    border-radius:20px;
}
.jumbotron {
    padding-top: 30px;
    padding-bottom: 30px;
    margin-bottom: 30px;
    color: inherit;
    background-color: #eee;
    border-radius: 20%;
}
a{
    margin: 30px;
    color: #000;
}
a:hover{
    color:blue;
}
.card {
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0);
  transition: 0.3s;
  width: 100%;;
}

.card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0);
}
.icon{
    padding: 20px;
}
.form-item {
    font-family: 'Montserrat', sans-serif;
    background-color: transparent;
    border: none;
    outline: none;
    width: 100%;
    font-size: 1em;
    box-sizing: border-box;
    padding-bottom: 5px;
    border-bottom: 2px solid #797979;

    &:focus + .underline {
      width: 100%;
    }
  }

  .underline {
    position: absolute;
    bottom: 0;
    
    // to center the animation
    left: 50%;
    transform: translateX(-50%);
        
    height: 2px;
    width: 0;
    background-color: #ff8203;
    transition: .5s;
  }
.form-group {
    margin-bottom: 30px;
    margin-top:20px;
}
.btn-info{
    width: 50%;
    height: 50%;
    border-radius: 30px;
    background-color: #000;
    margin: 25px;
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
            <span style="font-size:30px;cursor:pointer;color:#FFA500" onclick="openNav()">&#9776; <img src="./assets/img/Logo 1.png" alt="logo" style="width:20%;height:80%;float: right;"><b>Contact Us</b></span>
        </div>
        <div class="col-md-6">
            <!--<img src="https://img.freepik.com/free-psd/logo-mockup_35913-2089.jpg?size=626&ext=jpg" alt="logo" style="width:100%;">-->
        </div>
    </div>
</div>

<!---------------------------------------------------------------------------------------->


<div class="card">
  <div class="container">
    <h1>Contact Us</h1>
              <div class="icon">
                 
                      <i class="fa fa-phone" aria-hidden="true" style="font-size:20px;"><a href="tel:9566843109">95668-43109</a></i>
                  </div class="icon">
                  <div class="icon">
                      <i class="fa fa-envelope" aria-hidden="true" style="font-size:20px;"><a href="mailto:vcaresystemscbe@gmail.com">vcaresystemscbe@gmail.com</a></i>
                  </div>
                  <div class="icon">
                      <i class="fa fa-map-marker" aria-hidden="true" style="font-size:20px;"><a href = "#">105, 9th Street,Cross Cut Road, coimbatore.</i>
                  </div>
             <h1>Get in Touch</h1>
             
             <div class="row">
                 <form action="" method="post">
                 <div class="form-group">
                      <input type="text" placeholder="Name" name="firstname" class="form-item" required="">
                        <span class="underline"></span>
                 </div>
                  <div class="form-group">
                      <input type="email" placeholder="Email" name="email" class="form-item" required="">
                        <span class="underline"></span>
                 </div>
                  <div style="margin-top:80px">
                        <input type="text" placeholder="Message" name="message"class="form-item" required="">
                        <span class="underline"></span>
                 </div>
                 <div class="text-center" >
                    <button type="submit" name="submit" class="btn btn-info" style="color:#FFA500; padding:10px;"><b>Submit</b></button>    
                 </div>
                 </form>
             </div>
                
  </div>
</div>





<!----------------------------------------------------------->
<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
</script>

  
   

   
</body>
</html> 
