<link rel="stylesheet"type="text/css"href="../../demo.css"/>
<link rel="stylesheet"href="../../dist/ladda.min.css">
<link rel="stylesheet"href="../../css/bemo.css">
<body style="padding:25px;color:">
<form action="simpankategori.php" enctype="multipart/form-data"  method="post" name="postform">
   <body> 
    <?php
	include_once("../dbconnect.php");
$menu_detail_id = $_GET['menu_detail_id'];
	$query=mysqli_fetch_array(mysqli_query($mysqli, "select * from jw_menu_detail where menu_detail_id='$menu_detail_id'"));
$menu_name= $query['menu_name'];
$menu_detail_id= $query['menu_detail_id'];
	?>
<center><h3 style="color:">Ubah Kategori</h3></center>
    <input type="hidden" name="menu_detail_id" value="<?php echo $menu_detail_id;?>" />
<label>Nama Ketegori</label>
<input type="text" placeholder="Tulis nama Kategori" name="menu_name" required="required" value="<?php echo $menu_name;?>"></br></br>
<section class="button-demo"><button style="width:200px;height:auto"type="submit"name="kirim"class="ladda-button"data-color="green"data-style="expand-right">Simpan</button></section>
<script src="../dist/spin.min.js"></script>
<script src="../dist/ladda.min.js"></script>
<script>Ladda.bind(".button-demo button");Ladda.bind(".progress-demo button",{callback:function(e){var f=0;var d=setInterval(function(){f=Math.min(f+Math.random()*0.1,1);e.setProgress(f);if(f===1){e.stop();clearInterval(d)}},200)}});</script>
</form><br><br>
<a href="javascript:history.back()"style="color:orange">Batal Ubah data</a></center>
</center><br><br><br>
   <br /></body>