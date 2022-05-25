<?php
session_start();
include_once 'dbconnect.php';
if(!isset($_SESSION['user']))
{
	header("Location: firli.php#login");
}
$res=mysqli_query($mysqli, "SELECT * FROM users WHERE id=".$_SESSION['user']);
$rows=mysqli_fetch_array($res);
?>

<head>
<meta charset="UTF-8"/>
<meta http-equiv="X-UA-Compatible"content="IE=edge,chrome=1">
<meta name="viewport"content="width=device-width, initial-scale=1.0">
<link rel="stylesheet"href="themes/base/jquery.ui.all.css">
<link href="css/timepicki.css"rel="stylesheet">
<script src="jquery.ui.addresspicker.js"></script>
<script src="js/jquery.min.js"></script>
<script src="js/jquery-ui.min.js"></script>
<link rel="stylesheet"type="text/css"href="demo.css"/>
<style type="text/css">ul{padding:0;list-style:none}ul li{display:inline-block;position:relative;line-height:21px;text-align:left}ul li a{display:block;padding:8px 25px;color:#444;text-decoration:none}ul li a:hover{color:#red}ul li ul.dropdown{min-width:100%;background-color:#FFF;display:none;position:absolute;z-index:999;left:-50px;top:35px;border:1px solid grey}ul li:hover ul.dropdown{display:block}ul li ul.dropdown li{display:block}#loading{display:block;position:absolute;top:0;left:0;z-index:99999;width:100vw;height:100vh;background-image:url("hourglass.svg");background-repeat:no-repeat;background-position:center}</style>
<link rel="stylesheet"href="css/bemo.css">
<link rel="stylesheet"href="dist/ladda.min.css">
</head>
<body onload="getLocation()" onkeydown="javascript:if(window.event.keyCode==13)window.event.keyCode=9">
<div class="sodrops-top" style="height:60px;">
<span class="actions" style="float:left">
<ul>
<li><a onclick="javascript:showDiv();" href="home.php#home"><img src="icon/back.png"width="25px"/></i></a></li>
</ul>
</span>
<div style="color:#fff;margin-top:20px;font-size:18px;font-family:Segoe UI light;float:right;padding-right:20px;">List of Orders
</div>
</div>
<div id="payed"class="panel" style="background:#fff">
<div class="content" ><br><br>
<iframe src="payed.php" style="width:100%;height:625px" align="center" scrolling="yes" frameborder="0"></iframe>
</div></div>
<div id="cart"class="panel"style="background:#fff;z-index:99;padding:0">
<div class="content"style="width:100%;padding-right:0;padding-left:0;">
<br><br>
<div style="padding-right:25px;padding-left:25px;">
<?php 
$id_users=$_SESSION['user'];
$lem=mysqli_query($mysqli, "SELECT * FROM keranjang INNER JOIN mitra ON keranjang.id_sopir=mitra.id_mitra WHERE id_users='$id_users' and aktif='yes' and idtrans='0' and checkout='no'");
$kep = mysqli_fetch_array($lem);
$pes=mysqli_query($mysqli, "SELECT * FROM keranjang INNER JOIN jw_product ON keranjang.idbarang=jw_product.product_id WHERE id_users='$id_users' and aktif='yes' and idtrans='0' and checkout='no'");
while($bes = mysqli_fetch_array($pes)) { 
$price=$bes['hrg'];
$total=$bes['tot'];
$kuantitas=$bes['quantity'];
$harga=$price*$kuantitas;?>
     <link href='smile.css' rel='stylesheet' type='text/css'>
        <script src='jquery-3.0.0.js' type='text/javascript'></script>
        <script src='script.js' type='text/javascript'></script>
		<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<table style="padding:25px;margin-top:5px;background-color: #ffff;color:#444" >
<tr style="font-size:10px;border-bottom:1px solid #dcdcdc;" id=delete<?php echo $bes['idcatalog'] ?>>
<td width="30%">
	<?php
 if($bes['product_image_ori']=='0')
      { ?>
<img src="icon/nopic.png" style="float:right;width:80px;top:0;"/>
<?php }
else{?>
<img src="owner/fotobarang/<?php echo $bes['product_image_ori'];?>" style="width:100px;border: 1px solid #ffff;"/>
<?php } ?>
</td>
<td width="70%"style="font-size:12px;padding:10px">
<?php echo $bes['product_tag'];?><br>
USD  <?php $saga = $price;
$mike = number_format($price,0,",",".");
echo $mike;?>
<b><small><br>Qty: <?php echo $bes['quantity'];?> <br> Total: USD  <?php 
$barga = $harga;
$hargae = number_format($barga,0,",",".");
echo $hargae;?></small></b><br><br>
<a href="returedit.php?idcatalog=<?php echo $bes['idcatalog'];?>" onclick="javascript:showDiv();" style="background:orange;padding:5px;font-weight:bold;color:#fff">Edit Qty</a>
<button onclick=deleteAjax(<?php echo $bes['idcatalog'];  ?>) class="btn btn-danger" style=width:20px;float:right;background:none;border:none><img style="vertical-align:middle;margin-top:5px;margin-right:15px;" src="icon/delete.png" width="20px"/></button>
</td>
</tr>
</table>
<script>
$('table').on('click','tr span',function(e){
         e.preventDefault();
        $(this).parents('tr').remove();
      });
</script>
<?php
}
?></div>
<br><br><br><br><br>
<?php
$tim=mysqli_query($mysqli, "SELECT COUNT(*) AS total FROM keranjang WHERE id_users='".$_SESSION['user']."' and aktif='yes' and idtrans='0' and checkout='no'");
while($pin = mysqli_fetch_assoc($tim)) { 
$jim = $pin['total'];
?>
<?php
 if($jim=='0')
      { ?>
<center>Empty orders<br>(Not found Active Orders)</center>
  <?php }
else{?>

    <script src="js/twitnotif2.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript" charset="utf-8">
        function addmsg(type, msg) {

            $('#notification_count').html(msg);
        }

        function waitForMsg() {

            $.ajax({
                type: "GET",
                url: "total.php",

                async: true,
                cache: false,
                timeout: 1500,

                success: function(data) {
                    addmsg("new", data);
                    setTimeout(
                        waitForMsg,
                        
                    );
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    addmsg("error", textStatus + " (" + errorThrown + ")");
                    setTimeout(
                        waitForMsg,
                        );
                }
            });
        };

        $(document).ready(function() {

            waitForMsg();

        });
    </script>
<table width="100%" style="color:#444;width:100%;z-index:9999;bottom:0;position:fixed;background-color: #eaeaea;border-top:2px solid rgba(0,0,0,.26);"><tr>
<td width="50%" style="padding-left: 10px;">
Total :<b><br><small>
<img style="vertical-align:middle;margin-top:5px;margin-right:5px;" src="icon/ok.png" width="15px"/><div id="HTMLnoti" style="padding-left: 20px;margin-top: -17px;color:#444;textalign:center"><span id="notification_count"></span></div></small></b>
</td>
<td style="padding-right: 25px;font-size:15px;padding:25px;color:#fff;"width="50%">
<center>
<a href="#checkout"><button style="color:#fff;background:#257d25;border:none;padding:10px;border-radius:20px;">Confirm</button></a>
</div>
</form>
</div>
</td>
</tr>
</table>
<?php } ?>
</center>
 <?php } ?>
<script type=text/javascript src=https://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js></script>
<script type=text/javascript>function deleteAjax(a){$.ajax({type:"post",url:"deletecart.php",data:{delete_id:a},success:function(b){$("#delete"+a).hide("fast")}})}</script>
<script src=https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js></script>

</div>
</div>
<div id="checkout"class="panel"style="z-index:99;background:#fff;">
<div class="content"style="padding:20px;width:100%;right:0;left:0;">
<br><br>
<script src="jquery.ui.addresspicker.js"></script>
<script>$(function(){var b=$("#addresspicker").addresspicker({componentsFilter:"country:ID"})});</script>
<script type="text/javascript"src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAO4lbxY6SKygcJxTuzu-Qi7kAAP9SdAwM&callback=initMap"></script>
<script type="text/javascript"src="https://maps.google.com/maps/api/js?sensor=false"></script>
<script>if(!navigator.geolocation){alert("Your phone does not support maps Location.")}navigator.geolocation.getCurrentPosition(success,error);function success(f){var g=f.coords.latitude;var e=f.coords.longitude;var h=f.coords.accuracy;document.getElementById("lat").value=g;document.getElementById("lng").value=e}function error(b){};
</script>
<form id="form"action="jarak.php#jarak"method="post">
<?php
$jupir=$kep['id_sopir'];
$hyu=mysqli_query($mysqli, "SELECT * FROM mitra WHERE id_mitra='$jupir'");
$gtr = mysqli_fetch_array($hyu);
$him=mysqli_query($mysqli, "SELECT sum(tot) FROM keranjang WHERE id_users='".$_SESSION['user']."' and aktif='yes' and idtrans='0'");
$gims = mysqli_fetch_array($him);
?>
<input type="hidden"name="id_sopir" value="<?php echo $gtr['id_mitra'];?>"/>
<input type="hidden"name="asal" value="<?php echo $gtr['latsopir'];?>,<?php echo $gtr['lngsopir'];?>"/>
<input type="hidden"name="harga" value="<?php echo $gims['sum(tot)'];?>"/>
<p>
<center><a href="#cart"><div style="color:#fff;background:#de1079;border:none;padding:10px;border-radius:20px;">Edit List of Orders</div></a></center>
<!----
<input type="hidden"name="rujukan" value='-2.672157,111.636989'/>
--->
</p>
<b style="float:left"><small>Deliver to: </small></b>
<p><label>Your Location:</label>
<style type="text/css">.input-controls{margin-top:5px;border:1px solid transparent;border-radius:2px 0 0 2px;box-sizing:border-box;-moz-box-sizing:border-box;background:#fff;height:32px;outline:0;box-shadow:0 2px 6px rgba(0,0,0,0.3)}#searchInput{background:#fff;font-family:Roboto;font-size:15px;font-weight:300;margin-left:12px;padding:0 11px 0 13px;text-overflow:ellipsis}#searchInput:focus{border-color:#4d90fe}</style>
<script type="text/javascript"src="https://maps.googleapis.com/maps/api/js?sensor=true&key=AIzaSyAO4lbxY6SKygcJxTuzu-Qi7kAAP9SdAwM&v=3.exp&libraries=places&callback=initMap"></script>
<input style="background:#fff;z-index:9;position:absolute;margin-left:-197px;top:0;width:100%;border-bottom:3px solid #09c;height:60px" id="searchInput" class="input-controls" type="text" placeholder="Input adress street name, city">
<div class="map" id="map" style="width:100%;height:400px"></div>
<script>function initialize(){var f=new google.maps.LatLng(-37.830365, 144.979999);var e=new google.maps.Map(document.getElementById("map"),{center:f,zoom:13});var a=new google.maps.Marker({map:e,position:f,draggable:true,anchorPoint:new google.maps.Point(0,-29)});var b=document.getElementById("searchInput");e.controls[google.maps.ControlPosition.TOP_LEFT].push(b);var d=new google.maps.Geocoder();var c=new google.maps.places.Autocomplete(b);c.bindTo("bounds",e);c.addListener("place_changed",function(){a.setVisible(false);var g=c.getPlace();if(!g.geometry){window.alert("Autocomplete's returned place contains no geometry");return}if(g.geometry.viewport){e.fitBounds(g.geometry.viewport)}else{e.setCenter(g.geometry.location);e.setZoom(17)}a.setPosition(g.geometry.location);a.setVisible(true);bindDataToForm(g.formatted_address,g.geometry.location.lat(),g.geometry.location.lng());infowindow.setContent(g.formatted_address);infowindow.open(e,a)});google.maps.event.addListener(a,"dragend",function(){d.geocode({latLng:a.getPosition()},function(h,g){if(g==google.maps.GeocoderStatus.OK){if(h[0]){bindDataToForm(h[0].formatted_address,a.getPosition().lat(),a.getPosition().lng());infowindow.setContent(h[0].formatted_address);infowindow.open(e,a)}}})})}function bindDataToForm(a,c,b){document.getElementById("location").value=a;document.getElementById("lat").value=c;document.getElementById("lng").value=b}google.maps.event.addDomListener(window,"load",initialize);</script>

<input type="hidden" name="tujuan" id="location">
<input type="hidden" name="lat" id="lat">
<input type="hidden" name="lng" id="lng">
<div id="map" style="border-top:5px solid #444"></div>

<!----
<input type="hidden"name="rujukan" value='-2.672157,111.636989'/>
--->
</p>
<p>
<?php
$id_users=$rows['id'];
$laurent=mysqli_query($mysqli, "SELECT * FROM alamat WHERE id_users='$id_users' order by id_alamat DESC LIMIT 1");
$tes = mysqli_fetch_array($laurent);
?>
<label>Address details <br>(number house, appartement etc)
</label>
<input style="color:green" name="rincianalamat"type="text" value="" placeholder="Province"required="required"/><br>
<input style="color:green" name="kodepos"type="number" value="<?php echo $tes['kodepos'];?>" placeholder="Post Code"required="required"/></p>

<p><label>Your Contact:</label>
<input style="color:green" name="nama_rumah"type="text"placeholder="Nama Anda" value="<?php echo $rows['first_name'];?>" required="required"/></p>
<p><input style="color:green" name="nomor"type="number"placeholder="Masukkan Nomor Hp anda, agar dihubungi" value="<?php echo $rows['phone'];?>" required="required"/></p>
<p style="color:#444"><label>Additional details:</label>
<br>
<input name="kodepromo"type="text"placeholder="Promo code (Optionals)" /></p>

<p>
<section class="button-demo">
<button style="float:right;width:200px;height:auto"type="submit"name="submit"class="ladda-button" data-color="green" data-style="expand-right">Next</button>
</section>
<br><br>
</form>
</center>
</div>
</div><br>
<br><br>
<div id="loading" style="display:none">
</div>

<script type="text/javascript">
        function showDiv() {
            div = document.getElementById('loading');
            div.style.display = "block";
        }
</script>
</body>
<script type = "text/javascript" >
history.pushState(null, null, 'mobil.php#cart');
window.addEventListener('popstate', function(event) {
history.pushState(null, null, 'mobil.php#cart');
});
if (window.history) {
window.history.forward(1);
}
</script>