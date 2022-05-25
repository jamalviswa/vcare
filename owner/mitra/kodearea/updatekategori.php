<link rel="stylesheet"type="text/css"href="../../demo.css"/>
<link rel="stylesheet"href="../../dist/ladda.min.css">
<link rel="stylesheet"href="../../css/bemo.css">
<body style="padding:25px;color:">
<form action="simpankategori.php" enctype="multipart/form-data"  method="post" name="postform">
   <body> 
    <?php
	include_once("../dbconnect.php");
$idpromo = $_GET['idpromo'];
	$query=mysqli_fetch_array(mysqli_query($mysqli, "select * from promo where idpromo='$idpromo'"));
$kodepromo= $query['kodepromo'];
$diskonpersen= $query['diskonpersen'];
	?>
<center><h3 style="color:">Ubah Kode promo</h3></center>
    <input type="hidden" name="idpromo" value="<?php echo $idpromo;?>" />
<label>Nama Promo Diskon</label>
<input type="text" placeholder="Tulis Kode Promo" name="kodepromo" required="required" value="<?php echo $kodepromo;?>"></br></br>
<input type="number" placeholder="Berapa persen" name="diskonpersen" required="required" value="<?php echo $diskonpersen;?>"></br></br>
<section class="button-demo"><button style="width:200px;height:auto"type="submit"name="kirim"class="ladda-button"data-color="green"data-style="expand-right">Simpan</button></section>
<script src="../dist/spin.min.js"></script>
<script src="../dist/ladda.min.js"></script>
<script>Ladda.bind(".button-demo button");Ladda.bind(".progress-demo button",{callback:function(e){var f=0;var d=setInterval(function(){f=Math.min(f+Math.random()*0.1,1);e.setProgress(f);if(f===1){e.stop();clearInterval(d)}},200)}});</script>
</form><br><br>
<a href="javascript:history.back()"style="color:orange">Batal Ubah data</a></center>
</center><br><br><br>
   <br /></body>