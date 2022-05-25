<?php
session_start();
$oauth=$_SESSION['id'];
include_once '../dbconnect.php';
$res=mysqli_query($mysqli, "SELECT * FROM users WHERE oauth_uid='$oauth'");
$rows=mysqli_fetch_array($res);
$oarr=$rows['oauth_uid'];
if(($_SESSION['id']==$oarr))
{
		$_SESSION['user'] = $rows['id'];
	
	?>
<script>document.location.href="../home.php";</script><?php
}
?>
<h1>Home App</h1>
<img src="<?php echo $rows['picture'];  ?>"/ width="200px">
<p><strong>Id: </strong><?php echo $_SESSION['id'];  ?></p>
<p><strong>Name: </strong><?php echo $_SESSION['name'];  ?></p>
<p><strong>Email: </strong><?php echo $rows['email'];  ?></p>
<p><strong>Phone: </strong><?php echo $rows['phone'];  ?></p>
