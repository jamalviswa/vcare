<link rel="stylesheet"type="text/css"href="../../demo.css"/>
<link rel="stylesheet"href="../../dist/ladda.min.css">
<link rel="stylesheet"href="../../css/bemo.css">
<body style="padding:25px;color:#000">
<form action="simpankategori.php" enctype="multipart/form-data"  method="post" name="postform">
   <body> 
    <?php
	include_once("../dbconnect.php");
$idinfo = $_GET['idinfo'];
	$query=mysqli_fetch_array(mysqli_query($mysqli, "select * from infobank where idinfo='$idinfo'"));
$namabank= $query['namabank'];
$jambuka= $query['jambuka'];
$namaorang= $query['namaorang'];
$norek= $query['norek'];
	?>
<center><h3 style="color:#000">Ubah Informasi Rekening</h3></center>
    <input type="hidden" name="idinfo" value="<?php echo $idinfo;?>" />
<label>Nama Rekening Bank</label>
<input type="text" placeholder="Nama Bank" name="namabank" required="required" value="<?php echo $namabank;?>"></br></br>
<input type="number" placeholder="Cabang Bank" name="jambuka" required="required" value="<?php echo $jambuka;?>"></br></br>
<input type="number" placeholder="Nomor Rekening" name="norek" required="required" value="<?php echo $norek;?>"></br></br>
<input type="number" placeholder="Atas Nama" name="namaorang" required="required" value="<?php echo $namaorang;?>"></br></br>
<section class="button-demo"><button style="width:200px;height:auto"type="submit"name="kirim"class="ladda-button"data-color="green"data-style="expand-right">Simpan</button></section>
<script src="../dist/spin.min.js"></script>
<script src="../dist/ladda.min.js"></script>
<script>Ladda.bind(".button-demo button");Ladda.bind(".progress-demo button",{callback:function(e){var f=0;var d=setInterval(function(){f=Math.min(f+Math.random()*0.1,1);e.setProgress(f);if(f===1){e.stop();clearInterval(d)}},200)}});</script>
</form><br><br>
<a href="javascript:history.back()"style="color:orange">Batal Ubah data</a></center>
</center><br><br><br>
   <br /></body>