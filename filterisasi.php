<?php
$session_lifetime = 3600 * 24 * 860; // 2 days
session_set_cookie_params ($session_lifetime);
session_start();
include_once 'dbconnect.php';
$res=mysqli_query($mysqli, "SELECT * FROM users WHERE id=".$_SESSION['user']);
$rows=mysqli_fetch_array($res);
		$_SESSION['user'] = $rows['id'];
	if($rows['sebagai']=='narasumber')
      {
	header("Location: mithome.php#home");
	}if($rows['sebagai']=='user')
      {
	header("Location: home.php#home");
	}
?>
<br><br><br><br><br><br>
<style>
.lds-dual-ring {
  display: inline-block;
  width: 64px;
  height: 64px;
}
.lds-dual-ring:after {
  content: " ";
  display: block;
  width: 46px;
  height: 46px;
  margin: 1px;
  border-radius: 50%;
  border: 5px solid #09C;
  border-color: #09C transparent #09C transparent;
  animation: lds-dual-ring 1.2s linear infinite;
}
@keyframes lds-dual-ring {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}

</style><center>
<div class="lds-dual-ring"></div></center>