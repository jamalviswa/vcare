
<meta name="viewport" content="width=device-width,height=100%,  user-scalable = yes"> 
<!DOCTYPE html>
		<style>
body { margin-top: 0; }

#container {
  max-width: px;
  margin: 0 auto;
  background: #EEE;
}

h1,
p { padding: 1em 1em; }

#fvpp-blackout {
  display: none;
  z-index: 499;
  position: fixed;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  background: ;
  opacity: 0.5;
}

#my-welcome-message {
  display: none;
  z-index: 9999;
  position: fixed;height: 100%;
  left: 10px;
  right: 10px;
  top: 0;
  padding: 20px 2%;
  font-family: Calibri, Arial, sans-serif;
  background: #FFF;
}

#fvpp-close {
  position: absolute;
  top: 10px;
  right: 20px;
  cursor: pointer;
}

#fvpp-dialog h2 {
  font-size: 2em;
  margin: 0;
}

#fvpp-dialog p { margin: 0; }
</style>
<html lang="en" class="no-js" style="display: block;
    margin: 0 auto;
    min-height: 0;
    width: 75%;background:#fff;font-family:Segoe UI">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="style.css" />
		<link rel="stylesheet" type="text/css" href="css/component.css" />
<link rel="stylesheet"href="../css/bemo.css">
<link rel="stylesheet"href="../dist/ladda.min.css">
</head><body>

		<script>(function(e,t,n){var r=e.querySelectorAll("html")[0];r.className=r.className.replace(/(^|\s)no-js(\s|$)/,"$1js$2")})(document,window,0);</script>
	</head><br><br><br><br>
<div style="    box-shadow: 0 2px 2px 0px rgba(0,0,0,0.26);
    line-height: 24px;
    font-size: 11px;
    background: #85dbfb;
    z-index: 9999;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 60px;
    /* -webkit-animation: slideOut .1s ease-in-out .1s backwards; */
    -moz-animation: slideOut .1s ease-in-out .1s backwards;
    -o-animation: slideOut .1s ease-in-out .1s backwards;
    -ms-animation: slideOut .1s ease-in-out .1s backwards;
    animation: slideOut .1s ease-in-out .1s backwards;
    border-bottom: 3px solid #48b1d8;"><img src="../../android1.png" width="40px" style="margin-left: 25px;padding: 10px;vertical-align:middle"><i style="margin-top:20px;color:#fff;font-weight:bold;font-size:20px">Tandatangani perjanjian</i></div>
	<body>
	<?php
include_once("../dbconnect.php");
$signaturecode= $_GET['signaturecode'];
$query=mysqli_fetch_array(mysqli_query($mysqli, "select * from mitra where signaturecode='$signaturecode'"));
$user_attach= $query['user_attach'];
?>
<form action="signatureupload.php" enctype="multipart/form-data"  method="post" name="postform">

<input type="hidden" name="id_mitra" value="<?php echo $query['id_mitra']; ?>"/>
<?php if($query['sebagai']=='biro jasa')
      {
	  ?> 
	<?php
include_once("../dbconnect.php");
$tipepks= $query['sebagai'];
$jumery=mysqli_fetch_array(mysqli_query($mysqli, "select * from pihakpertama where tipepks='$tipepks'"));
?>
<table>
  <tr>
    <th colspan="4"><center>
Surat Perjanjian Kerja Sama MyPass - Biro Jasa<br>
Nomor : ....... /MYPASS-BIRO/....... /......<br>
Tanggal : <div id="parel"></div>
<script>
document.getElementById("parel").innerHTML = formatAMPM();

function formatAMPM() {
var d = new Date(),
    minutes = d.getMinutes().toString().length == 1 ? '0'+d.getMinutes() : d.getMinutes(),
    hours = d.getHours().toString().length == 1 ? '0'+d.getHours() : d.getHours(),
    ampm = d.getHours() >= 12 ? 'pm' : 'am',
    months = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','Nopember','Desember'],
    days = ['Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'];
return +d.getDate()+' '+months[d.getMonth()]+' '+d.getFullYear()+' ';
}
</script>
</center>
	</th>
  </tr>
  <tr>
    <td colspan="4">
Pada hari ini, sesuai dengan tanggal yang tertera diatas, telah disepakati perjanjian kerjasama untuk Layanan Survey Mobil dari Aplikasi MyPass (Android & iOS) dengan perincian sebagai berikut :

<br><br>Perjanjian ini mengikat kedua belah pihak, antara :
	</td>
  </tr>
  <tr>
    <td>Nama</td>
    <td colspan="3">: <?php echo $jumery['namapihak'];?></td>
  </tr>
  <tr>  
  <tr>
    <td>Jabatan</td>
    <td colspan="3">: <?php echo $jumery['jabatan'];?></td>
  </tr>
    <tr>
    <td>Alamat </td>
    <td colspan="3">: <?php echo $jumery['alamatpihak'];?></td>
  </tr>
   <tr>
    <td>NIK</td>
    <td colspan="3">: <?php echo $jumery['nikpihak'];?></td>
  </tr>
  <tr>
    <td colspan="4">
Dalam hal ini bertindak untuk dan Owner Name MyPass yang selanjutnya disebut sebagai <b>PIHAK PERTAMA.<br><br></b>
	</td>
  </tr>
   <tr>
    <td>Nama</td>
    <td colspan="3">: <?php echo $query['nama_mitra']; ?></td>
  </tr>
  <tr>  
  <tr>
    <td>Alamat</td>
    <td colspan="3">: <?php echo $query['alamat']; ?></td>
  </tr>
    <tr>
    <td>NIK </td>
    <td colspan="3">: <?php echo $query['nik']; ?></td>
  </tr>
   <tr>
    <td>No. Rek BCA</td>
    <td colspan="3">: <?php echo $query['bca']; ?></td>
  </tr>
  <tr>
    <td colspan="4">Dalam hal ini bertindak sebagai penyedia jasa layanan biro jasa yang selanjutnya disebut sebagai <b>PIHAK KEDUA.</b><br><br></td>
  </tr>
    <tr>
    <td colspan="4">
MyPass (PIHAK PERTAMA) merupakan perusahaan berbasis Aplikasi yang berada dibawah naungan PT Lautan Cipta Kreasi yang beralamat di Jl. Peta Selatan Rukan City Square Blok B no. 53, Kalideres, Jakarta Barat 11840.

<br>MyPass (PIHAK PERTAMA) menyediakan Aplikasi yang bergerak di platform Android dan iOS. User / pengguna dapat menggunakan aplikasi tersebut untuk order / memesan jasa layanan peUSD njang STNK, dimana jasa tersebut sepenuh nya merupakan jasa dari luar (PIHAK KEDUA).

<br>PIHAK PERTAMA mengajak PIHAK KEDUA untuk bekerja sama dengan syarat-syarat dan ketentuan-ketentuan sebagai berikut :<br><br>

	</td>
  </tr>
  
    <tr>
    <td colspan="4">
<?php echo $jumery['pasal1'];?></td>
  </tr>
  <tr>
    <td>Jakarta, <div id="pajel"></div>
<script>
document.getElementById("pajel").innerHTML = formatAMPM();

function formatAMPM() {
var d = new Date(),
    minutes = d.getMinutes().toString().length == 1 ? '0'+d.getMinutes() : d.getMinutes(),
    hours = d.getHours().toString().length == 1 ? '0'+d.getHours() : d.getHours(),
    ampm = d.getHours() >= 12 ? 'pm' : 'am',
    months = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','Nopember','Desember'],
    days = ['Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'];
return +d.getDate()+' '+months[d.getMonth()]+' '+d.getFullYear()+' ';
}
</script>
Tertanda,<br>PIHAK PERTAMA<br><br>
<img src="../attach/<?php echo $jumery['ttd'];?>" style="width:200px"/>
<br><br>(<?php echo $jumery['namapihak'];?>)</td>
    <td colspan="2"></td>
    <td style="float:right">
	<br>PIHAK KEDUA<br>
	<a href="#" id="show-message" style="color:orange">Buat Tandatangan</a>
	<br><br>
	<div id="my-welcome-message"><center>
          <h4>Buat Tanda tangan digital</h2>
          <p style="font-size:10px">Silahkan anda membuat tanda tangan di kolom tandatangan digital, kemudian klik save to jpg<br>Kemudian Klik tombol (x) Close dan Upload file My-signature.jpg di formulir perjanjian</p>
		  <iframe src="http://mypass.co.id/SecureURL-kKHGAvk_WkkvKAKBkAkbAA/example/index.html" width="100%" height="500" scrolling="yes" frameborder="0" >Loading...</iframe>
</iframe></center>
        </div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> 
<script src="jquery.firstVisitPopup.js"></script> 
<script>
			$(function () {
				$('#my-welcome-message').firstVisitPopup({
					cookieName : 'homepage',
					showAgainSelector: '#show-message'
				});
			});
		</script>
	<div class="box">
					<input type="file" style="width:0;height:0"name="gbrsignature" id="file-4" class="inputfile inputfile-4" data-multiple-caption="{count} files selected" multiple />
					<label for="file-4" ><figure style="width:50px;height:50px"><center><img src="icon/cameral.png" style="padding:0"/></figure> <span><small style="font-size:12px">Upload signature&hellip;</small></span></center></label>
			</div><br><center>(<?php echo $query['nama_mitra'];?>)</center>
	</td>
  </tr>
</table>
<?php } else {?>
	<?php
include_once("../dbconnect.php");
$tipepks= $query['sebagai'];
$jumery=mysqli_fetch_array(mysqli_query($mysqli, "select * from pihakpertama where tipepks='$tipepks'"));
?>
<table>
  <tr>
    <th colspan="4"><center>
Surat Perjanjian Kerja Sama MyPass - Surveyor<br>
Nomor : ....... /MYPASS-SURVEY/....... /......<br>
Tanggal : <div id="parel"></div>
<script>
document.getElementById("parel").innerHTML = formatAMPM();

function formatAMPM() {
var d = new Date(),
    minutes = d.getMinutes().toString().length == 1 ? '0'+d.getMinutes() : d.getMinutes(),
    hours = d.getHours().toString().length == 1 ? '0'+d.getHours() : d.getHours(),
    ampm = d.getHours() >= 12 ? 'pm' : 'am',
    months = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','Nopember','Desember'],
    days = ['Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'];
return +d.getDate()+' '+months[d.getMonth()]+' '+d.getFullYear()+' ';
}
</script>
</center>
	</th>
  </tr>
  <tr>
    <td colspan="4">
Pada hari ini, sesuai dengan tanggal yang tertera diatas, telah disepakati perjanjian kerjasama untuk Layanan Survey Mobil dari Aplikasi MyPass (Android & iOS) dengan perincian sebagai berikut :

<br><br>Perjanjian ini mengikat kedua belah pihak, antara :
	</td>
  </tr>
  <tr>
    <td>Nama</td>
    <td colspan="3">: <?php echo $jumery['namapihak'];?></td>
  </tr>
  <tr>  
  <tr>
    <td>Jabatan</td>
    <td colspan="3">: <?php echo $jumery['jabatan'];?></td>
  </tr>
    <tr>
    <td>Alamat </td>
    <td colspan="3">: <?php echo $jumery['alamatpihak'];?></td>
  </tr>
   <tr>
    <td>NIK</td>
    <td colspan="3">: <?php echo $jumery['nikpihak'];?></td>
  </tr>
  <tr>
    <td colspan="4">
Dalam hal ini bertindak untuk dan Owner Name MyPass yang selanjutnya disebut sebagai <b>PIHAK PERTAMA.<br><br></b>
	</td>
  </tr>
   <tr>
    <td>Nama</td>
    <td colspan="3">: <?php echo $query['nama_mitra']; ?></td>
  </tr>
  <tr>  
  <tr>
    <td>Alamat</td>
    <td colspan="3">: <?php echo $query['alamat']; ?></td>
  </tr>
    <tr>
    <td>NIK </td>
    <td colspan="3">: <?php echo $query['nik']; ?></td>
  </tr>
   <tr>
    <td>No. Rek BCA</td>
    <td colspan="3">: <?php echo $query['bca']; ?></td>
  </tr>
  <tr>
    <td colspan="4">Dalam hal ini bertindak sebagai penyedia jasa layanan surveyyang selanjutnya disebut sebagai <b>PIHAK KEDUA.</b><br><br></td>
  </tr>
  <tr>
    <td colspan="4">
MyPass (PIHAK PERTAMA) merupakan perusahaan berbasis Aplikasi yang berada dibawah naungan PT Lautan Cipta Kreasi yang beralamat di Jl. Peta Selatan Rukan City Square Blok B no. 53, Kalideres, Jakarta Barat 11840.

<br>MyPass (PIHAK PERTAMA) menyediakan Aplikasi yang bergerak di platform Android dan iOS. User / pengguna dapat menggunakan aplikasi tersebut untuk order / memesan jasa layanan peUSD njang STNK, dimana jasa tersebut sepenuh nya merupakan jasa dari luar (PIHAK KEDUA).

<br>PIHAK PERTAMA mengajak PIHAK KEDUA untuk bekerja sama dengan syarat-syarat dan ketentuan-ketentuan sebagai berikut :<br><br>

	</td>
  </tr>
    <tr>
    <td colspan="4">
<?php echo $jumery['pasal1'];?>
</td></tr>
  <tr>
    <td>Jakarta, <div id="pajel"></div>
<script>
document.getElementById("pajel").innerHTML = formatAMPM();

function formatAMPM() {
var d = new Date(),
    minutes = d.getMinutes().toString().length == 1 ? '0'+d.getMinutes() : d.getMinutes(),
    hours = d.getHours().toString().length == 1 ? '0'+d.getHours() : d.getHours(),
    ampm = d.getHours() >= 12 ? 'pm' : 'am',
    months = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','Nopember','Desember'],
    days = ['Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'];
return +d.getDate()+' '+months[d.getMonth()]+' '+d.getFullYear()+' ';
}
</script>
Tertanda,<br>PIHAK PERTAMA<br><br>
<img src="../attach/<?php echo $jumery['ttd'];?>" style="width:200px"/><br><br>
<br>(<?php echo $jumery['namapihak'];?>)</td>
    <td colspan="2"></td>
    <td style="float:right">
	<br>PIHAK KEDUA<br>
	<a href="#" id="show-message" style="color:orange">Buat Tandatangan</a>
	<br><br>
	<div id="my-welcome-message"><center>
          <h4>Buat Tanda tangan digital</h2>
          <p style="font-size:10px">Silahkan anda membuat tanda tangan di kolom tandatangan digital, kemudian klik save to jpg<br>Kemudian Klik tombol (x) Close dan Upload file My-signature.jpg di formulir perjanjian</p>
		  <iframe src="http://mypass.co.id/SecureURL-kKHGAvk_WkkvKAKBkAkbAA/example/index.html" width="100%" height="500" scrolling="yes" frameborder="0" >Loading...</iframe>
</iframe></center>
        </div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> 
<script src="jquery.firstVisitPopup.js"></script> 
<script>
			$(function () {
				$('#my-welcome-message').firstVisitPopup({
					cookieName : 'homepage',
					showAgainSelector: '#show-message'
				});
			});
		</script><div class="box">
					<input type="file" style="width:0;height:0"name="gbrsignature" id="file-4" class="inputfile inputfile-4" data-multiple-caption="{count} files selected" multiple />
					<label for="file-4" ><figure style="width:50px;height:50px"><center><img src="icon/cameral.png" style="padding:0"/></figure> <span><small style="font-size:12px">Upload signature&hellip;</small></span></center></label>
			</div><br><center>(<?php echo $query['nama_mitra'];?>)</center>
	</td>
  </tr>
</table>
<?php } ?>
<center>
				
</center>
		<br><br>
<center>
<section class="button-demo" style="padding:0px">
<button style="width:150px;font-size:16px;height:auto"type="submit"name="kirim"class="ladda-button"data-color="green"data-style="expand-right">Setujui</button>
</section>

<script src="../dist/spin.min.js"></script>
<script src="../dist/ladda.min.js"></script>
<script>Ladda.bind(".button-demo button");Ladda.bind(".progress-demo button",{callback:function(b){var a=0;var c=setInterval(function(){a=Math.min(a+Math.random()*0.1,1);b.setProgress(a);if(a===1){b.stop();clearInterval(c)}},200)}});</script>
</form>
</div>
</center>		
		
		

		</div><!-- /container -->

		<script src="js/custom-file-input.js"></script>
</body>
</html>
