<?php
session_start();
include_once '../dbconnect.php';
if(!isset($_SESSION['user']))
{
	header("Location: home.php");
}
$res=mysqli_query($mysqli, "SELECT * FROM users WHERE id=".$_SESSION['user']);
$rows=mysqli_fetch_array($res);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html style="background-color:#fff"xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible"content="IE=edge,chrome=1">
<meta name="viewport"content="width=device-width, initial-scale=1.0">
<link rel="stylesheet"type="text/css"href="demo.css"/>
<style type="text/css">ul{padding:0;list-style:none}ul li{display:inline-block;position:relative;line-height:21px;text-align:left}ul li a{display:block;padding:8px 25px;color:#444;text-decoration:none}ul li a:hover{color:#red}ul li ul.dropdown{min-width:100%;background-color:#FFF;display:none;position:absolute;z-index:999;left:-50px;top:35px;border:1px solid grey}ul li:hover ul.dropdown{display:block}ul li ul.dropdown li{display:block}#home{display:none}#loading{display:block;position:absolute;top:0;left:0;z-index:99999;width:100vw;height:100vh;background-image:url("hourglass.svg");background-repeat:no-repeat;background-position:center}</style>
<link rel="stylesheet"href="css/bemo.css">
<link rel="stylesheet"href="dist/ladda.min.css">
<link rel="stylesheet"href="themes/base/jquery.ui.all.css">
<script src="js/jquery.min.js">
</script>
<script src="js/jquery-ui.min.js">
</script>
    </head>
    <body style="background-color:#fff;color:#444;padding-left:25px;padding-right:25px">
<?php
//We check if the user is logged
if(isset($_SESSION['user']))
{
//We list his messages in a table
//Two queries are executes, one for the unread messages and another for read messages
$req1 = mysqli_query($mysqli, 'select m1.id, m1.title, m1.timestamp, count(m2.id) as reps, users.id as userid, users.first_name from pm as m1, pm as m2,users where ((m1.user1="'.$_SESSION['user'].'" and m1.user1read="no" and users.id=m1.user2) or (m1.user2="'.$_SESSION['user'].'" and m1.user2read="no" and users.id=m1.user1)) and m1.id2="1" and m2.id=m1.id group by m1.id order by m1.id desc');
$req2 = mysqli_query($mysqli, 'select m1.id, m1.title, m1.timestamp, count(m2.id) as reps, users.id as userid, users.first_name from pm as m1, pm as m2,users where ((m1.user1="'.$_SESSION['user'].'" and m1.user1read="yes" and users.id=m1.user2) or (m1.user2="'.$_SESSION['user'].'" and m1.user2read="yes" and users.id=m1.user1)) and m1.id2="1" and m2.id=m1.id group by m1.id order by m1.id desc');
?>
<div class="sodrops-top" style="height:60px;">
<span class="actions" style="float:left">
<ul>
<li><a href="history.php#home" onclick="javascript:showDiv();"><img src="icon/back.png"width="25px"/></i></a></li>
</ul>
</span>
<div style="margin-top:20px;font-size:18px;font-family:Segoe UI;color:#fff"><center>Semua Wawancara</center>
</div>
</div><br><br><br><br>

<div style="color:#444;font-family:Segoe UI light;font-size:13px">
<h5>Pesan baru belum di baca(<?php echo intval(mysqli_num_rows($req1)); ?>):</h5>
<table width="100%">
	<tr><td style="border-bottom:1px solid #444;">

<?php
//We display the list of unread messages
while($dn1 = mysqli_fetch_array($req1))
{
?>

<a style="color:#444" href="read_pm.php?id=<?php echo $dn1['id']; ?>">
<?php echo htmlentities($dn1['first_name'], ENT_QUOTES, 'UTF-8'); ?><br>
<small><?php echo htmlentities($dn1['title'], ENT_QUOTES, 'UTF-8'); ?></small><br>
<small style="font-weight:normal">Reply (<?php echo $dn1['reps']-1; ?>) - 
Tgl: <?php echo date('Y/m/d H:i:s' ,$dn1['timestamp']); ?></small>
   </a> <br><br></td></tr>
	
<?php
}
//If there is no unread message we notice it
if(intval(mysqli_num_rows($req1))==0)
{
?>
	<tr>
    	<td colspan="4" class="center" style="color:red">You have no unread message.</td>
    </tr>
<?php
}
?>
</table>
<br />
<h5 style="border-top:1px solid grey;padding-top:10px;">Interview Aktif(<?php echo intval(mysqli_num_rows($req2)); ?>):</h5>
<table width="100%">
	<tr><td>
<?php
//We display the list of read messages
while($dn2 = mysqli_fetch_array($req2))
{
?>
<div style="border-bottom:1px solid #444;width:100%">
<a style="color:#444" href="read_pm.php?id=<?php echo $dn2['id']; ?>">
<?php echo htmlentities($dn2['first_name'], ENT_QUOTES, 'UTF-8'); ?><br>
<small><?php echo htmlentities($dn2['title'], ENT_QUOTES, 'UTF-8'); ?></small><br>
<small style="font-weight:normal">Reply (<?php echo $dn2['reps']-1; ?>) - 
Tgl: <?php echo date('Y/m/d H:i:s' ,$dn2['timestamp']); ?></small>
   </a> <br><br></div></td></tr>
	
<?php
}
//If there is no read message we notice it
if(intval(mysqli_num_rows($req2))==0)
{
?>
	<tr>
    	<td colspan="4" class="center" style="color:red">You have no read message.</td>
    </tr>
<?php
}
?>
</table>
<?php
}
else
{
	echo 'You must be logged to access this page.';
}
?></div>
	</body>
</html>