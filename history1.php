<?php include_once 'dbconnect.php';?>
<html>
    <head>
        <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <platform name="android"> <access origin="*" /> <preferance name="android-usesCleartextTraffic" value="true" /> <allow-navigation href="*" /> </platform>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {
  font-family: "Lato", sans-serif;
  color:#101D25;
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
    color: #101D25;
    background-color: #101D25;
    background-image: none;
     border: 2px solid; 
    border-radius: 4px;
    -webkit-box-shadow: inset 0 1px 1px rgb(0 0 0 / 8%);
    box-shadow: inset 0 1px 1px rgb(0 0 0 / 8%);
    -webkit-transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
    -o-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
    transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
}

.small{
        font-family: ui-sans-serif;
    font-weight: 300 !important;
    font-size: 20px !important;
    color: green;
    }
    p{
     font-family: ui-sans-serif;
    font-size: 25px;
    font-weight: 300;
    text-align: center;
    }

</style>
</head>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

<body>
   
    <!-------------nav Bar------------------->
    
    
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
            <span style="font-size:30px;cursor:pointer;color:#FFA800;" onclick="openNav()">&#9776; <img src="./assets/img/Logo 1.png" alt="logo" style="width:20%;height:80%;float: right;"><b>Profile</b></span>
        </div>
        <div class="col-md-6">
            <!--<img src="https://img.freepik.com/free-psd/logo-mockup_35913-2089.jpg?size=626&ext=jpg" alt="logo" style="width:100%;">-->
        </div>
    </div>
</div>

    
    <!-------------nav Bar end--------------->
    
  <div class="swipe-tab-content">
  <br>
<div style="color:#fff;height:100%;overflow:auto">
<center>
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet" />

<link rel="stylesheet"href="dist/ladda.min.css">
<form method="post"action="save.php">

<label style="padding:5px;color: #101D25;" class="btn btn-default btn-sm center-block btn-file">
   <?php
    $res = mysqli_query($mysqli, "SELECT * FROM users");
    $rows = mysqli_fetch_array($res);
    
    ?>
        
            <div class="row">
               <?php
if($rows['oauth_uid']==''){
	?>
<img src="foto_mitra/<?php echo $rows['picture'];?>" style="width:140px;height:140px;border-radius:20px;margin: auto;"/>
	  <?php } else {?>
<img src="<?php echo $rows['picture'];?>" style="width:140px;height:140px;border-radius:20px;margin: auto;"/>
	<?php }
	?><br> 
           
        </div>

	
  <input type="file" id="fileInput"  class="upload-file" name="picture" onchange="readURL(this);" style="display: none;" required='required' accept="image/*;capture=camera" >
</label>
<img id="blah" style="width:100%;height:auto" />
<input type="hidden" name="id" value="<?php echo $rows['id']; ?>"/>

<section class="button-demo">
    <button type="submit"name="firim"style="font-size:13px;padding:10px;background:#101d25;color:#ffa800;border-radius:20px;width:80%;margin-top: 25px">Update Profile Picture</button>
    </section>
<script>
     function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
</script>
</form><br>
<?php echo $rows['first_name'];?> <?php echo $rows['last_name'];?><br>
<?php 
$id=$rows['id'];
if (empty($rows['oauth_provider'])) { ?>
<small>Verified by phone</small>
<?php }else{ ?>
<small class="small">Verified by google account</small>
<?php } ?><br><br>

<table width="100%" style="border-collapse: inherit;">
<tr style="font-weight:normal;border:1px solid grey;color:#444">

</tr>
</table>
</center><br>

<form id="form"action="save.php" enctype="multipart/form-data" method="post" name="postform" style="margin: 20px 20px 20px 25px;">
    
<input type="hidden" name="id" value="<?php echo $rows['id'];?>"/>
<input type="hidden" name="oauth_provider" value="<?php echo $rows['oauth_provider'];?>"/>

<label for="noktp" style = "color:#101D25;">Your Profile Secure</label>
<br><input class="form-control" type="number" name="noktp"required="required" value="<?php echo $rows['noktp'];?>"><br>
<label style = "color:#101D25;">Name:</label>
<br><input class="form-control" type="text" name="first_name"required="required" value="<?php echo $rows['first_name'];?>"><br>
<label style = "color:#101D25;">Born City:</label>
<br><input class="form-control" type="text" name="tempatlahir"required="required" value="<?php echo $rows['tempatlahir'];?>"><br>
<label style = "color:#101D25;">D.o.b:</label>
<br><input class="form-control" type="date" name="tgllahir"required="required" value="<?php echo $rows['tgllahir'];?>"><br>
<label style = "color:#101D25;">Gender:</label><br>
<select class="form-control" name="kelamin"required=required>
<option name="kelamin"value="Male">Male</option>
<option name="kelamin"value="Female">Female</option>
</select><br><br>

<label style = "color:#101D25;">Address:</label>
<br><input class="form-control" type="text" name="alamat1"required="required" value="<?php echo $rows['alamat1'];?>"><br>
<small></small>
<!--<br><input type="text" name=""required="required" value="<?php echo $rows[''];?>"><br>-->
<label style = "color:#101D25;">Landmark:</label>
<br><input class="form-control" type="text" name="provinsi"required="required" value="<?php echo $rows['provinsi'];?>"><br>

<label style = "color:#101D25;">Email:</label>
<br><input class="form-control" type="email" name="email"required="required" value="<?php echo $rows['email'];?>"><br>
<label style = "color:#101D25;">Password:</label>
<br><input class="form-control" type="password" name="password"required="required"><br>
<!--<input style="border:0px;padding:10px;width:100%;background:#f60;color:#fff" type="submit" onclick="javascript:showDiv()" value="Save changes" name="kirim" />-->
<button style="font-size:13px;padding:10px;background:#101d25;color:#ffa800;border-radius:20px;width:75%;margin: 0 0 0 40px;" type="submit" onclick="javascript:showDiv()" value="Save changes" name="kirim" ><b>Save Changes</b></button>
</form>
<br><br>
<link rel="stylesheet" href="css/bemo.css">
<link rel="stylesheet" href="dist/ladda.min.css">
</div>
</div>
</div>
</div>
</div>

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