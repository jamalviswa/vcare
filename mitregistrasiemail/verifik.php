<?php 
include("../dbconnect.php");
$email=$_POST['email'];
$kode=$_POST['kode'];
$link=$_POST['link'];
if ($kode==$link) {	 
$query=mysqli_query($mysqli, "UPDATE `users` SET `kunci` = '0' WHERE `users`.`email` = '$email';");
		?>
<div style="position:relative;z-index:99999;top:0px;padding:20px;color:#09C"><center><br><br>
<img width="150px" src="../icon/perawa.png"/><br><br>Yeayy your account active, Please login
<br>
<br>
<center><a href="../jimli.php"><div style="border-radius:20%;font-decoration:none;font-style:normal;font-size:15px;color:#fff;background-color:#09C;padding:10px;">Login Back</div></a></center><br>

</div>	
		<?php
}else{?>
 <script>window.alert("wrong code");window.history.back(-2);</script><?php
  return false;?>
<style>
#hideme {
    -webkit-animation: cssAnimation 15s forwards; 
    animation: cssAnimation 15s forwards;
}
@keyframes cssAnimation {
    0%   {opacity: 1;}
    90%  {opacity: 1;}
    100% {opacity: 0;}
}
@-webkit-keyframes cssAnimation {
    0%   {opacity: 1;}
    90%  {opacity: 1;}
    100% {opacity: 0;}
}
</style>
<div id="hideme"style="width:100%;position:relative;color:#ef2525;z-index:99999;top:0px;padding:20px;box-shadow:5px 2px 8px 1px rgba(0,0,0,0.15);background-color:rgba(255, 255, 82, 0.95)"><center>Wrong code
<br>
<br>
</div>	 
<?php }
?>
