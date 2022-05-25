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
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible"content="IE=edge,chrome=1">
<meta name="viewport"content="width=device-width, initial-scale=1.0">
<link rel="stylesheet"type="text/css"href="demo.css"/>
<style type="text/css">ul{padding:0;list-style:none}ul li{display:inline-block;position:relative;line-height:21px;text-align:left}ul li a{display:block;padding:8px 25px;color:#444;text-decoration:none}ul li a:hover{color:#red}ul li ul.dropdown{min-width:100%;background-color:#FFF;display:none;position:absolute;z-index:999;left:-50px;top:35px;border:1px solid grey}ul li:hover ul.dropdown{display:block}ul li ul.dropdown li{display:block}#home{display:none}#loading{display:block;position:absolute;top:0;left:0;z-index:99999;width:100vw;height:100vh;background-image:url("hourglass.svg");background-repeat:no-repeat;background-position:center}</style>
<link rel="stylesheet"href="css/bemo.css">
<link rel="stylesheet"href="dist/ladda.min.css">
<link rel="stylesheet"href="themes/base/jquery.ui.all.css">
<script src="js/jquery.min.js"></script>
<script src="js/jquery-ui.min.js"></script>
<style>
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
.chat{width:100%}.jubble{background-color:#f5ffa3;border-radius:5px;display:inline-block;padding:10px 18px;position:relative;vertical-align:top;color:#444}.jubble::before{background-color:#f5ffa3;content:"\00a0";display:block;height:16px;position:absolute;top:11px;transform:rotate(29deg) skew(-35deg);-moz-transform:rotate(29deg) skew(-35deg);-ms-transform:rotate(29deg) skew(-35deg);-o-transform:rotate(29deg) skew(-35deg);-webkit-transform:rotate(29deg) skew(-35deg);width:20px}.bubble{background-color:#c9f9d9;border-radius:5px;display:inline-block;padding:10px 18px;position:relative;vertical-align:top}.bubble::before{background-color:#c9f9d9;content:"\00a0";display:block;height:16px;position:absolute;top:11px;transform:rotate(29deg) skew(-35deg);-moz-transform:rotate(29deg) skew(-35deg);-ms-transform:rotate(29deg) skew(-35deg);-o-transform:rotate(29deg) skew(-35deg);-webkit-transform:rotate(29deg) skew(-35deg);width:20px}.me{float:left;margin:2px 4px 2px 10px;font-size:10px;width:100%}.me::before{left:-9px}.you{font-size:11px;float:right;margin:2px 10px 2px 4px}.you::before{right:-9px}</style>
</head>
<body style="width:100%;background-color:#fff;color:">
<div class="sodrops-top" style="height:60px">
<span class="actions" style="float:left">
<ul>
<li><a href="list_pm.php" onclick="javascript:showDiv()"><img src="icon/back.png"width="25px"/></i></a></li>
</ul>
</span>
<div style="margin-top:20px;font-size:18px;font-family:Segoe UI;color:#fff"><center>Interview</center>
</div>
</div><br><br><br>
<?php
include('../dbconnect.php');
$id = intval($_GET['id']);
//We get the title and the narators of the discussion
$req1 = mysqli_query($mysqli, 'select title, user1, user2 from pm where id="'.$id.'" and id2="1"');
$dn1 = mysqli_fetch_array($req1);
//We check if the discussion exists
if(mysqli_num_rows($req1)==1)
{
//We check if the user have the right to read this discussion
$user1=$dn1['user1'];
$user2=$dn1['user2'];
$sessi=$_SESSION['user'];
if($user1==$sessi or $user2==$sessi)
{
if($user1==$_SESSION['user'])
{
	mysqli_query($mysqli, 'update pm set user1read="yes" where id="'.$id.'" and id2="1"');
}
else
{
	mysqli_query($mysqli, 'update pm set user2read="yes" where id="'.$id.'" and id2="1"');
}

}
}
//We get the list of the messages
$req2 = mysqli_query($mysqli, 'select pm.timestamp, pm.message, pm.title, pm.user1, pm.user2, users.id as userid, users.first_name, users.picture from pm, users where pm.id="'.$id.'" and users.id=pm.user1 order by pm.id2');

//We check if the form has been sent
if(isset($_POST['tambah'])){
	$message = $_POST['message'];
	//We remove slashes depending on the configuration
	if(get_magic_quotes_gpc())
	{
		$message = stripslashes($message);
	}
	//We protect the variables
	$message = mysqli_real_escape_string($mysqli, nl2br(htmlentities($message, ENT_QUOTES, 'UTF-8')));
	//We send the message and we change the status of the discussion to unread for the recipient

$input = "SELECT id FROM pm WHERE id='$id' and id2='".(intval(mysqli_num_rows($req2))+1)."'";
$result = mysqli_query($mysqli, $input);
$count = mysqli_num_rows($result); // if email not found then register
if($count == 0){

	$user2=$_POST['user2'];
	if(mysqli_query($mysqli, "INSERT INTO `pm` (`id`, `id2`, `title`, `user1`, `user2`, `message`, `timestamp`, `user1read`, `user2read`) VALUES ('$id', '".(intval(mysqli_num_rows($req2))+1)."', '$title', '".$_SESSION['user']."', '$user2', '$message', '".time()."', '', '');"))

	{
$user1=$dn1['user1'];
$sessi=$_SESSION['user'];
if($user1==$sessi)
{
	mysqli_query($mysqli, "UPDATE pm set user2read='yes' WHERE id='$id'");
}
else
{
	mysqli_query($mysqli, "UPDATE pm set user1read='yes' WHERE id='$id'");
}?>
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
</center>
<style>@import url(https://fonts.googleapis.com/css?family=Roboto);html{font-family:'Roboto',sans-serif}.form__group{position:relative;padding:15px 0 0;margin-top:10px}.form__field{font-family:inherit;width:100%;border:0;border-bottom:1px solid #d2d2d2;outline:0;font-size:16px;color:#212121;padding:7px 0;background:transparent;transition:border-color .2s}.form__field::placeholder{color:transparent}.form__field:placeholder-shown ~ .form__label{font-size:16px;cursor:text;top:20px}label,.form__field:focus ~ .form__label{position:absolute;top:0;display:block;transition:.2s;font-size:12px;color:#9b9b9b}.form__field:focus ~ .form__label{color:#009788}.form__field:focus{padding-bottom:6px;border-bottom:2px solid #009788}</style>
<div class="content" style="padding-left:25px;padding-right:25px"><br><br>
<center><h4><?php echo $dn1['title']; ?></h4></center>
<table width="100%" class="messages_table">
<?php
while($dn2 = mysqli_fetch_array($req2))
{
	
?>
<tr>
<td width="30%"class="author center"><center>
<?php
$iduser=$dn2['userid'];
$judul=$dn2['title'];
$bek = mysqli_query($mysqli, "select * from users where id='$iduser'");
$kok = mysqli_fetch_array($bek);
$sebagai=$kok['sebagai'];

 if ($sebagai=='user') {?>
<img src="<?php echo $dn2['picture']; ?>" style="width:60px;height:60px;height:auto;border-radius:50%;top:0"/>
<?php }
 if ($sebagai=='narasumber') {?>
<img src="foto_mitra/<?php echo $dn2['picture']; ?>" style="width:60px;height:60px;height:auto;border-radius:50%;top:0"/>
<?php }?>
<br /></center></td>
<td width="70%"class="left"><div class="chat">
<?php
$dimana=$dn2['user1'];
$sessi=$_SESSION['user'];
 if ($dimana==$sessi) {?><div class="bubble me"> <?php }else {?>
<div class="jubble me"> <?php } ?>
<small><?php echo $dn2['first_name']; ?></small><br>
 <?php if ($judul=='voice') {?>
File audio : <a href="https://profitgm.com/voice/<?php echo $dn2['message'];?>" target="_blank"><br><?php echo $dn2['message'];?></a>
<?php }else { ?>
<?php echo $dn2['message']; ?>
<small><div class="date">terkirim: <?php echo date('m/d/Y H:i:s' ,$dn2['timestamp']); ?></div></small>
<?php } ?>
</div></div></td>
</tr>
<?php
}
//We display the reply form
?>
</table><br />
<div class="center" style="padding-left:25px;padding-right:25px">

<?php
$kip=mysqli_query($mysqli, "SELECT id_trans, kode_trans, id_users, online, nama_voucher, pointvoucher FROM transaksi INNER JOIN voucher on transaksi.nama_voucher=voucher.idvoucher where transaksi.id_users='".$_SESSION['user']."' and transaksi.status_trans='otw'");
$kor=mysqli_fetch_array($kip); 
$huua = $kor['pointvoucher']; 
$jumlahonline = $kor['online']; 
$id_trans = $kor['id_trans']; 
$posli = "SELECT count(*) FROM counterinterview WHERE id_users='".$_SESSION['user']."' and id_trans='$id_trans' and statusinterview='on'";
$nenek = mysqli_query($mysqli, $posli);
$interview = mysqli_fetch_array($nenek);
$interview = $kor['online']; 
 if($huua=='wawancara')
      { 
 if($interview<$jumlahonline)
      { ?><div style="color:grey">-- Percakapan sudah ditutup --</div>
 <?php }  else
      { ?>
<form style="border-top:1px solid #09c"action="read_pm.php?id=<?php echo $id; ?>" method="post">
<div class="form__group">
<textarea id="message" class="form__field" placeholder="Tuliskan pesan" rows="6" name="message"></textarea>
<label for="message" class="form__label">Balas Pesan</label>
</div>
<input type="hidden" name="user2"value="<?php echo $dn1['user1']; ?>"/>
<input type="hidden" name="title"value="<?php echo $dn1['title']; ?>"/><br>

<input name="tambah" type="submit" onclick="javascript:showDiv()" class="ladda-button" style="background-color:#2fec70;color:#fff" value="Kirim" />
</form>
<style>
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 60px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 0px;
  border: 1px solid #888;
  width: 100%;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: ;
  text-decoration: none;
  cursor: pointer;
}
</style><br><br>
<button id="myBtn" class="ladda-button" data-color="blue" style="font-style:normal;padding:5px;"><center><small>Gunakan Transcript</small></center></button>
<br><br><br>
<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span style="margin-right:20px;" class="close">&times;</span>
    <p><small>Audio Transcript</small></p>
	<center style="color:#444;padding:20px;font-size:10px;">
	<img src="micro.png" width="100px"/><br><br>
	Anda akan menggunakan fitur rekaman suara kemudian file tersebut tersimpan dalam database server Trol, File tersebut tidak dapat dihapus ketika sudah diupload.<br> Pemberitahuan ini merupakan standar aplikasi di indonesia untuk memastikan bahwa anda setuju dengan kebijakan undang undang ITE.<br>Kami ingin memastikan anda perlu menggunakan layanan ini dengan bijak. fitur ini akan menggunakan browser android engine google chrome rekaman untuk rekaman suara yang menggunakan microphone
<br><br>
<center><br><a style="width:100%;border-radius:10px;padding:10px;background:green;color:#fff" target="_blank" href="voice/upload.php?recip=<?php echo $_GET['id']; ?>&&aidi2=<?php $interval=intval(mysqli_num_rows($req2))+1; echo $interval; ?>&&user1=<?php echo $_SESSION['user']; ?>&&user2=<?php echo $dn1['user1'];?>">Setuju dan next</a></center>
<center><br><br><br><a style="width:100%;border-radius:10px;padding:10px;background:#09c;color:#fff" onclick="location.reload();" >Selesai</a></center>

<br><br>
	</center>
  </div>

</div>

<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>

 <center style="color:grey">Kamu bisa mengakhiri interview jika sudah mendapat layanan yang terbaik<br>
 <a onclick="javascript:showDiv()" href="close.php?id_trans=<?php echo $kor['id_trans']; ?>">
<button class="ladda-button" data-color="red" ><small>Akhiri Interview</small></button>
</a></center><br>
	  <?php }} else{ ?>
	  <div style="color:grey">-- Percakapan sudah ditutup --</div>
    <?php }?>
</div>
</div>
</div>
</body>
</html>
<style>#loading{display:block;position:absolute;top:0;left:0;z-index:99999;width:100vw;height:100vh;background-image:url("hourglass.svg");background-repeat:no-repeat;background-position:center}</style>
<div id="loading" style="display:none">
</div>
<script type="text/javascript">function showDiv(){div=document.getElementById("loading");div.style.display="block"};</script>