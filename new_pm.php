<?php
session_start();
include_once 'dbconnect.php';
if(!isset($_SESSION['user']))
{
	header("Location: home.php");
}
$res=mysqli_query($mysqli, "SELECT * FROM users WHERE id=".$_SESSION['user']);
$rows=mysqli_fetch_array($res);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet"type="text/css"href="demo.css"/>
<style type="text/css">ul{padding:0;list-style:none}ul li{display:inline-block;position:relative;line-height:21px;text-align:left}ul li a{display:block;padding:8px 25px;color:#444;text-decoration:none}ul li a:hover{color:#red}ul li ul.dropdown{min-width:100%;background-color:#FFF;display:none;position:absolute;z-index:999;left:-50px;top:35px;border:1px solid grey}ul li:hover ul.dropdown{display:block}ul li ul.dropdown li{display:block}#home{display:none}#loading{display:block;position:absolute;top:0;left:0;z-index:99999;width:100vw;height:100vh;background-image:url("hourglass.svg");background-repeat:no-repeat;background-position:center}</style>
<link rel="stylesheet"href="css/bemo.css">
<link rel="stylesheet"href="dist/ladda.min.css">
<link rel="stylesheet"href="themes/base/jquery.ui.all.css">
<script src="js/jquery.min.js">
</script>
<script src="js/jquery-ui.min.js">
</script>
<link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
  <style>
    body {
      font-family: 'Roboto', sans-serif;
      
    }
	#controls {
  display: flex;
  margin-top: 2rem;
}
button {
  flex-grow: 1;
  height: 2.5rem;
  min-width: 2rem;
  border: none;
  border-radius: 0.15rem;
  background: #ed341d;
  margin-left: 2px;
  box-shadow: inset 0 -0.15rem 0 rgba(0, 0, 0, 0.2);
  cursor: pointer;
  display: flex;
  justify-content: center;
  align-items: center;
  color:#ffffff;
  font-weight: bold;
  font-size: 1rem;
}
button:hover, button:focus {
  outline: none;
  background: #c72d1c;
}
button::-moz-focus-inner {
  border: 0;
}
button:active {
  box-shadow: inset 0 1px 0 rgba(0, 0, 0, 0.2);
  line-height: 3rem;
}
button:disabled {
  pointer-events: none;
  background: lightgray;
}
button:first-child {
  margin-left: 0;
}
audio {
  display: block;
  width: 100%;
  margin-top: 0.2rem;
}
li {
  list-style: none;
  margin-bottom: 1rem;
}
#formats {
  margin-top: 0.5rem;
  font-size: 80%;
}
  </style>
    </head>
  <body style="background-color:#fff;color:#444;">

<link rel="stylesheet" href="voice/speech-input.css">
    </head>
  <body style="background-color:#fff;color:#444;">
<div class="sodrops-top" style="float:none;height:60px">
<div style="float:right;color:#fff;padding-right:120px;top:10px;font-size:12px">
</div>
<span style="margin-left:15px;font-size:25px;position:fixed;color:#fff;cursor:pointer" ><a href="javascript:history.back()" onclick="javascript:showDiv();"><img src="icon/back.png"width="25px"/>
</a></span>
<span class="actions">
<center><img style="position:fixed;margin-top:3px" src="transparent.png"width="55px"/></center>
</span>
</div><br><br><br>
    
    
<?php
$id=$_GET['recip'];
$koko = "SELECT * FROM users WHERE id='$id'";
$kipi = mysqli_query($mysqli, $koko);
$jon = mysqli_fetch_array($kipi); 
if(isset($_POST['tambah'])){
if (empty($_POST['title'])) {
   ?>
<script>window.alert("Tambahkan Judul/Topik diskusi interview anda!");window.history.back(-3);</script><?php
  return false;
}if (empty($_POST['message'])) {
   ?>
<script>window.alert("Tuliskan Pesan text!");window.history.back(-3);</script><?php
  return false;
}
	$otitle = $_POST['title'];
	$orecip = $_POST['recip'];
	$omessage = $_POST['message'];
		//We protect the variables
		$title = mysqli_real_escape_string($mysqli, $otitle);
		$recip = mysqli_real_escape_string($mysqli, $orecip);
		$message = mysqli_real_escape_string($mysqli, nl2br(htmlentities($omessage, ENT_QUOTES, 'UTF-8')));
		//We check if the recipient exists
		$dn1 = mysqli_fetch_array(mysqli_query($mysqli, 'select count(id) as recip, id as recipid, (select count(*) from pm) as npm from users where id="'.$recip.'"'));

$input = "SELECT title FROM pm WHERE title='$title'";
$result = mysqli_query($mysqli, $input);
$count = mysqli_num_rows($result); // if email not found then register
if($count == 0){
		
				$id = $dn1['npm']+1;
				//We send the message
				if(mysqli_query($mysqli, "INSERT INTO `pm` (`id`, `id2`, `title`, `user1`, `user2`, `message`, `timestamp`, `user1read`, `user2read`) VALUES ('$id', '1', '$title', '".$_SESSION['user']."', '".$dn1['recipid']."', '$message', '".time()."', 'yes', 'no');"))
		{

$less=mysqli_query($mysqli, "SELECT id_trans FROM transaksi WHERE id_users='".$_SESSION['user']."' and status_trans='otw' and aktif='yes'");
$jim=mysqli_fetch_array($less);
$id_trans=$jim['id_trans'];
mysqli_query($mysqli, "INSERT INTO `counterinterivew` (`idcounterview`, `id_users`, `idpm`, `id_trans`, `statusinterview`, `id_narsum`) VALUES (NULL, '".$_SESSION['user']."', '$id', '$id_trans', 'on', '".$dn1['recipid']."');");

			?>
<script>document.location.href="list_pm.php#home";</script><?php
		}
		else
		{
			?>
<?php
		}		
	}
	else{
			?>
<?php
	}
	
}
	
?>
<style>
@import url(https://fonts.googleapis.com/css?family=Roboto);

html {
  font-family: 'Roboto', sans-serif;
}

.form__group {
  position: relative;
  padding: 15px 0 0;
  margin-top: 10px;
}

.form__field {
  font-family: inherit;
  width: 100%;
  border: 0;
  border-bottom: 1px solid #d2d2d2;
  outline: 0;
  font-size: 16px;
  color: #212121;
  padding: 7px 0;
  background: transparent;
  transition: border-color 0.2s;
}

.form__field::placeholder {
  color: transparent;
}

.form__field:placeholder-shown ~ .form__label {
  font-size: 16px;
  cursor: text;
  top: 20px;
}

label,
.form__field:focus ~ .form__label {
  position: absolute;
  top: 0;
  display: block;
  transition: 0.2s;
  font-size: 12px;
  color: #9b9b9b;
}

.form__field:focus ~ .form__label {
  color: #009788;
}

.form__field:focus {
  padding-bottom: 6px;
  border-bottom: 2px solid #009788;
}
</style>
<div class="content" style="padding-left:25px;padding-right:25px"><br><br>
	<h4>Buat pesan dengan topik baru</h4>
    <form action="<?php echo $_SERVER['PHP_SELF']?>"  method="post">
		Isi lengkap kolom inputan.<br />Pesan untuk <?php echo $jon['first_name']; ?>
		<br>
		<div class="form__group">
		<input id="topic" type="text" class="form__field" placeholder="Tulis judul pesan, atau pertanyaan" id="title" name="title" /><br />
  <label for="topic" class="form__label">Judul Pesan</label>
</div>
       
       <input type="hidden" value="<?php echo $jon['id']; ?>" id="recip" name="recip" />
	   
	   <br /><br>
       <div class="form__group">
  <textarea id="message" class="form__field" placeholder="Tuliskan pesan" rows="6" name="message"><?php echo htmlentities($omessage, ENT_QUOTES, 'UTF-8'); ?></textarea>
  <label for="message" class="form__label">Tuliskan Chat anda</label><br><small>Anda bisa menggunakan mikrofon untuk konversi suara ke text</small>
</div>
		<br />
        <br>
        <input type="submit" name="tambah" class="ladda-button" style="background-color:#2fec70;color:#fff" onclick="javascript:showDiv();" value="Send" />
    </form>
</div>

<script src="voice/speech-input.js"></script>
	</body>
</html>
<style>#loading{display:block;position:absolute;top:0;left:0;z-index:99999;width:100vw;height:100vh;background-image:url("hourglass.svg");background-repeat:no-repeat;background-position:center}</style>
<div id="loading" style="display:none">
</div>
<script type="text/javascript">function showDiv(){div=document.getElementById("loading");div.style.display="block"};</script>
