<link rel="stylesheet"type="text/css"href="../../demo.css"/>
<link rel="stylesheet"href="../../dist/ladda.min.css">
<link rel="stylesheet"href="../../css/bemo.css">
<body style="padding:25px;color:">
<form action="simpankategori.php" enctype="multipart/form-data"  method="post" name="postform">
   <body> 
    <?php
	include_once("../dbconnect.php");
$id_ads = $_GET['id_ads'];
	$query=mysqli_fetch_array(mysqli_query($mysqli, "select * from ads where id_ads='$id_ads'"));
$id_ads= $query['id_ads'];
$menu_ads= $query['menu_ads'];
$harga_ads= $query['harga_ads'];
	?>
<center><h3 style="color:">Ubah Tarif Iklan</h3></center>
    <input type="hidden" name="id_ads" value="<?php echo $id_ads;?>" />
<label>Ubah Tarif iklan <?php echo $menu_ads;?></label>
<input type="number" name="harga_ads" required="required" value="<?php echo $harga_ads;?>"></br></br>
<section class="button-demo"><button style="width:200px;height:auto"type="submit"name="kirim"class="ladda-button"data-color="green"data-style="expand-right">Simpan</button></section>
<script src="../dist/spin.min.js"></script>
<script src="../dist/ladda.min.js"></script>
<script>Ladda.bind(".button-demo button");Ladda.bind(".progress-demo button",{callback:function(e){var f=0;var d=setInterval(function(){f=Math.min(f+Math.random()*0.1,1);e.setProgress(f);if(f===1){e.stop();clearInterval(d)}},200)}});</script>
</form><br><br>
<a href="javascript:history.back()"style="color:orange">Batal Ubah data</a></center>
</center><br><br><br>
   <br /></body>