
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
    background: #1f1f1f;
    z-index: 9999;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 90px;
    /* -webkit-animation: slideOut .1s ease-in-out .1s backwards; */
    -moz-animation: slideOut .1s ease-in-out .1s backwards;
    -o-animation: slideOut .1s ease-in-out .1s backwards;
    -ms-animation: slideOut .1s ease-in-out .1s backwards;
    animation: slideOut .1s ease-in-out .1s backwards;
    border-bottom: 5px solid #c81b22"><img src="../../icon/logo.png" width="50px" style="margin-left: 25px;padding: 10px;vertical-align:middle"><i style="margin-top:20px;color:#fff;font-weight:bold;font-size:20px">Confirm Selesai</i></div>
	<body>
	<?php
include_once("../dbconnect.php");
$invoice= $_GET['invoice'];
$query=mysqli_fetch_array(mysqli_query($mysqli, "select * from transaksi where invoice='$invoice'"));
?><br><br>
<table style="margin-top:5px;"id="iseqchart">
<tr style="font-size:14px;color:#565656"><td>Kode Invoice</td><td>:</td><td width="50%"> <?php echo $query['invoice']; ?></td></tr>
<tr style="font-size:14px;color:#565656"><td>Tipe Layanan</td><td>:</td><td width="50%"> <?php echo $query['layanan']; ?></td></tr>
<tr style="font-size:14px;color:#565656"><td>Request date</td><td>:</td><td width="50%"> <?php echo $query['tanggal']; ?></td></tr>
<tr style="font-size:14px;color:#565656"><td>Tanggal Kunjungan</td><td>:</td><td width="50%"> <?php echo $query['booking']; ?></td></tr>
<tr style="font-size:14px;color:#565656"><td>Waktu Kunjungan</td><td>:</td><td width="50%"> <?php echo $query['timepicker1']; ?></td></tr>
<tr style="font-size:14px;color:#565656"><td>Harga Layanan</td><td>:</td><td width="50%"> USD <?php echo $query['harga']; ?></td></tr>
<tr style="font-size:14px;color:#565656"><td>Owner Name</td><td>:</td><td width="50%"> <?php echo $query["nama_rumah"]; ?></td></tr>
<tr style="font-size:14px;color:#565656"><td>Alamat</td><td>:</td><td width="50%"> <?php echo $query["alamat"]; ?></td></tr>
<tr style="font-size:14px;color:#565656"><td>Status</td><td>:</td><td width="50%"> Selesai</td></tr>
</table><br>
<form action="signatureupload.php" enctype="multipart/form-data"  method="post" name="postform">
<label>Tuliskan Testimonial anda untuk terapis</label><br>
<textarea width="100%" name="testimoni" style="width:100%;height:200px;"></textarea><br><br>
<center>
<input type="hidden" name="invoice" value="<?php echo $query['invoice']; ?>"/>
<input type="hidden" name="tipebayar" value="<?php echo $query['tipebayar']; ?>"/>
<input type="hidden" name="id_mitra" value="<?php echo $query['id_mitra']; ?>"/>
<input type="hidden" name="harga" value="<?php echo $query['harga']; ?>"/>
<input type="hidden" name="id_users" value="<?php echo $query['id_users']; ?>"/>
	<a href="#" id="show-message" style="color:orange">Buat Tandatangan</a>
	<br><br>
	<div id="my-welcome-message"><center>
          <h4>Buat Tanda tangan digital</h2>
          <p style="font-size:10px">Silahkan anda membuat tanda tangan di kolom tandatangan digital, kemudian klik save to jpg<br>Kemudian Klik tombol (x) Close dan Upload file My-signature.jpg di formulir perjanjian</p>
		  <iframe src="http://perawat.id/SecureURL-kKHGAvk_WkkvKAKBkAkbAA/example/index.html" width="100%" height="500" scrolling="yes" frameborder="0" >Loading...</iframe>
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
					<input type="file" style="width:0;height:0"name="foto_ktp" id="file-4" class="inputfile inputfile-4" data-multiple-caption="{count} files selected" multiple />
					<label for="file-4" ><figure style="width:50px;height:50px"><center><img src="icon/cameral.png" style="padding:0"/></figure> <span><small style="font-size:12px">Upload signature&hellip;</small></span></center></label>
			</div><br><center>(<?php echo $query['nama_rumah'];?>)</center>
</center>
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
