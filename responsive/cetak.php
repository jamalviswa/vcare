<?php
include_once("../dbconnect.php");
$report=$_GET['id_report'];
$pers=mysqli_query($mysqli, "SELECT * FROM report where id_report='$report'");
while($pos=mysqli_fetch_array($pers)){
$users=$pos['id_users'];
$nerd=mysqli_query($mysqli, "SELECT * FROM users where id='$users'");
$meik=mysqli_fetch_array($nerd);
?>
<body style="font-family:Segoe UI light;font-size:14px;background: -moz-linear-gradient(29deg, rgba(168,252,255,1) 0%, rgba(59,127,255,1) 100%); /* ff3.6+ */
background: -webkit-gradient(linear, left bottom, right top, color-stop(0%, rgba(168,252,255,1)), color-stop(100%, rgba(59,127,255,1))); /* safari4+,chrome */
background: -webkit-linear-gradient(29deg, rgba(168,252,255,1) 0%, rgba(59,127,255,1) 100%); /* safari5.1+,chrome10+ */
background: -o-linear-gradient(29deg, rgba(168,252,255,1) 0%, rgba(59,127,255,1) 100%); /* opera 11.10+ */
background: -ms-linear-gradient(29deg, rgba(168,252,255,1) 0%, rgba(59,127,255,1) 100%); /* ie10+ */
background: linear-gradient(61deg, rgba(168,252,255,1) 0%, rgba(59,127,255,1) 100%); /* w3c */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#A8FCFF', endColorstr='#3B7FFF',GradientType=1 ); /* ie6-9 */" onkeydown="javascript:if(window.event.keyCode == 13) window.event.keyCode = 9;"><!--sodrops top bar-->
<div style="background: #fff;
    -webkit-box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14), 0 3px 1px -2px rgba(0,0,0,0.12), 0 1px 5px 0 rgba(0,0,0,0.2);
    box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14), 0 3px 1px -2px rgba(0,0,0,0.12), 0 1px 5px 0 rgba(0,0,0,0.2);
    display: block;
    margin: 0 auto;
    min-height: 0;
    width: 90%;padding:15px;color:">
<p style="color:#444;padding:15px">
<table id="iseqchart" width="100%"><tr style="border-top:1px solid #999">
<td width="65%"><div style="position: sticky">
<table width="50%">
  <tr>
  <th ><img src="https://simanja-pln.com/pln.jpg" width="80px"/></th>
    <th style="text-align:left;font-weight:normal;font-size:14px"><b>PT. PLN (PERSERO)<b><br>TRANSMISI JAWA BAGIAN TENGAH<br><small><b>Pengukuran Tahanan Pertanahan Tower<br>UPT PURWOKERTO</b></small></th>
  </tr>
</table><br><br>
<center><b>Lokasi tower Pada kecamatan <?php echo $pos['gardu_induk'];?></b><br><br></center>
<?php
//including the database connection file
include_once("../dbconnect.php");
?>
    <style>
      #map-canvas {
        width: 100%;
        height: 500px;
      }
    </style>
  <script type="text/javascript" src="//maps.google.com/maps/api/js?sensor=true"></script>
   <script type="text/javascript"src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAO4lbxY6SKygcJxTuzu-Qi7kAAP9SdAwM&callback=initMap"></script> <script>
    var marker;
      function initialize() {
        var mapCanvas = document.getElementById('map-canvas');
        var mapOptions = {
          mapTypeId: google.maps.MapTypeId.TERRAIN
        }     
        var map = new google.maps.Map(mapCanvas, mapOptions);
        var infoWindow = new google.maps.InfoWindow;      
        var bounds = new google.maps.LatLngBounds();
 
 
        function bindInfoWindow(marker, map, infoWindow, html) {
          google.maps.event.addListener(marker, 'click', function() {
            infoWindow.setContent(html);
            infoWindow.open(map, marker);
          });
        }
 
          function addMarker(lat, lng, info) {
            var pt = new google.maps.LatLng(lat, lng);
            bounds.extend(pt);
var iconBase = 'https://simanja-pln.com/font-awesome_4-7-0_bell_35_0_289a0c_none.png';
            var marker = new google.maps.Marker({
				icon: iconBase,
                map: map,
                position: pt
            });       
            map.fitBounds(bounds);
            bindInfoWindow(marker, map, infoWindow, info);
          }
		  
		  function PaddMarker(lat, lng, info) {
            var pt = new google.maps.LatLng(lat, lng);
            bounds.extend(pt);
var iconBase = 'https://simanja-pln.com/font-awesome_4-7-0_bell_35_0_f2bf3b_none.png';
            var marker = new google.maps.Marker({
				icon: iconBase,
                map: map,
                position: pt
            });       
            map.fitBounds(bounds);
            bindInfoWindow(marker, map, infoWindow, info);
          }
		 
		 function MaddMarker(lat, lng, info) {
            var pt = new google.maps.LatLng(lat, lng);
            bounds.extend(pt);
var iconBase = 'https://simanja-pln.com/font-awesome_4-7-0_bell_35_0_cb1127_none.png';
            var marker = new google.maps.Marker({
				icon: iconBase,
                map: map,
                position: pt
            });       
            map.fitBounds(bounds);
            bindInfoWindow(marker, map, infoWindow, info);
          }
 
          <?php
			$report=$_GET['id_report'];
            $query = mysqli_query($mysqli, "SELECT UPT, KORIDOR, SID, KODE_SIRKIT, FL_TOWER, NO_TOWER, BUATAN, KECAMATAN, THN_BUAT, KOORDINAT_X, KOORDINAT_Y, ultg, nama_app, tower, penghantar, gardu_induk, tgl_ukur, id_report, kondisi FROM report inner join lokasitower on report.gardu_induk=lokasitower.KECAMATAN where report.id_report='$report' and KOORDINAT_X is not NULL and KOORDINAT_X !=''");
          while ($data = mysqli_fetch_array($query)) {
            $mat = $data['KOORDINAT_X'];
            $mit = $data['KOORDINAT_Y'];
			$lat = str_replace(',','.',$mat);
			$lng = str_replace(',','.',$mit);
			$ultg = $data['UPT'];
			$nama_app = $data['FL_TOWER'];
			$tower = $data['NO_TOWER'];
			$penghantar = $data['KORIDOR'];
			$gardu_induk = $data['KECAMATAN'];
			$sid = $data['SID'];
			$sirkit = $data['KODE_SIRKIT'];
			$buatan = $data['BUATAN'];
			$tahun = $data['THN_BUAT'];
			$tgl_ukur = $data['tgl_ukur'];
			$id_report = $data['id_report'];
			$kondisi = $data['kondisi'];
			if($data['kondisi']=='BAIK')
      {
            echo ("addMarker($lat, $lng, '<b>$tgl_ukur </b> <br>Gardu induk: $gardu_induk <br>Tower: $tower <br>Penghantar: $penghantar<br><br>ULTG:  $ultg <br> $nama_app<br>SID:  $sid <br>Kode Sirkit:  $sirkit <br><br>Buatan:  $buatan ($tahun) <br>kondisi: $kondisi<br>');\n");   
	  }
	  if($data['kondisi']=='SEDANG')
      {
            echo ("PaddMarker($lat, $lng, '<b>$tgl_ukur </b> <br>Gardu induk: $gardu_induk <br>Tower: $tower <br>Penghantar: $penghantar<br><br>ULTG:  $ultg <br> $nama_app<br>SID:  $sid <br>Kode Sirkit:  $sirkit <br><br>Buatan:  $buatan ($tahun) <br>kondisi: $kondisi<br>');\n");                        
	  }
	    if($data['kondisi']=='BURUK')
      {
            echo ("MaddMarker($lat, $lng, '<b>$tgl_ukur </b> <br>Gardu induk: $gardu_induk <br>Tower: $tower <br>Penghantar: $penghantar<br><br>ULTG:  $ultg <br> $nama_app<br>SID:  $sid <br>Kode Sirkit:  $sirkit <br><br>Buatan:  $buatan ($tahun) <br>kondisi: $kondisi<br>');\n");                         
	  }
		  
		  }
          ?>
        }
      google.maps.event.addDomListener(window, 'load', initialize);
    </script>
    <div id="map-canvas"></div> </div>
</td>
<td><center><div style="font-size:10px"><b><small> <?php echo $meik['first_name']; ?> <?php echo $meik["last_name"]; ?></small></b></div><br>
<?php 
if (empty($meik['oauth_provider'])) { ?>
<img src="foto_mitra/<?php echo $meik['picture'] ?>"style="width:80px;border-radius:50%;border:2px solid grey;"/>
<?php } else{ ?>
<img src="<?php echo $meik['picture'] ?>"style="width:80px;border-radius:50%;border:2px solid grey;"/>
<?php } ?><br><br><b>Laporan yang diajukan:</b>
<br><br>
<table style="width:100%">
<tr style="font-size:12px;color:#565656"><td>Kode Laporan</td><td>:</td><td width="50%"> <?php echo $pos["beritaacara"]; ?></td></tr>
<tr style="font-size:12px;color:#565656"><td>Nama App</td><td>:</td><td width="50%"> <?php echo $pos["nama_app"]; ?></td></tr>
<tr style="font-size:12px;color:#565656"><td>ULTG</td><td>:</td><td width="50%"> <?php echo $pos["ultg"]; ?></td></tr>
<tr style="font-size:12px;color:#565656"><td>Gardu Induk</td><td>:</td><td width="50%"> <?php echo $pos["gardu_induk"]; ?></td></tr>
<tr style="font-size:12px;color:#565656"><td>Penghantar</td><td>:</td><td width="50%"> <?php echo $pos["penghantar"]; ?></td></tr>
<tr style="font-size:12px;color:#565656"><td>Nomor Tower</td><td>:</td><td width="50%"> <?php echo $pos["tower"]; ?></td></tr>
<tr style="font-size:12px;color:#565656"><td>Jenis Tanah</td><td>:</td><td width="50%"> <?php echo $pos["jenis_tanah"]; ?></td></tr>
<tr style="font-size:12px;color:#565656"><td>Jenis Grounding</td><td>:</td><td width="50%"> <?php echo $pos["jenis_groundling"]; ?></td></tr>
<tr style="font-size:12px;color:#565656"><td>Tgl Pengukuran</td><td>:</td><td width="50%"> <?php echo $pos["tgl_ukur"]; ?></td></tr>
<tr style="font-size:12px;color:#565656"><td>Kaki Tiang A</td><td>:</td><td width="50%"> <?php echo $pos["kakitiang_a"]; ?> ohm</td></tr>
<tr style="font-size:12px;color:#565656"><td>Kaki Tiang B</td><td>:</td><td width="50%"> <?php echo $pos["kakitiang_b"]; ?> ohm</td></tr>
<tr style="font-size:12px;color:#565656"><td>Kaki Tiang C</td><td>:</td><td width="50%"> <?php echo $pos["kakitiang_c"]; ?> ohm</td></tr>
<tr style="font-size:12px;color:#565656"><td>Kaki Tiang D</td><td>:</td><td width="50%"> <?php echo $pos["kakitiang_d"]; ?> ohm</td></tr>
<tr style="font-size:12px;color:#565656"><td>Pertanahan A</td><td>:</td><td width="50%"> <?php echo $pos["pertanahan_a"]; ?> ohm</td></tr>
<tr style="font-size:12px;color:#565656"><td>Pertanahan B</td><td>:</td><td width="50%"> <?php echo $pos["pertanahan_b"]; ?> ohm</td></tr>
<tr style="font-size:12px;color:#565656"><td>Pertanahan C</td><td>:</td><td width="50%"> <?php echo $pos["pertanahan_c"]; ?> ohm</td></tr>
<tr style="font-size:12px;color:#565656"><td>Pertanahan D</td><td>:</td><td width="50%"> <?php echo $pos["pertanahan_d"]; ?> ohm</td></tr>
<tr style="font-size:12px;color:#565656"><td>Paralel A</td><td>:</td><td width="50%"> <?php echo $pos["paralelsebelum_a"]; ?> ohm</td></tr>
<tr style="font-size:12px;color:#565656"><td>Paralel B</td><td>:</td><td width="50%"> <?php echo $pos["paralelsebelum_b"]; ?> ohm</td></tr>
<tr style="font-size:12px;color:#565656"><td>Paralel C</td><td>:</td><td width="50%"> <?php echo $pos["paralelsebelum_c"]; ?> ohm</td></tr>
<tr style="font-size:12px;color:#565656"><td>Paralel D</td><td>:</td><td width="50%"> <?php echo $pos["paralelsebelum_d"]; ?> ohm</td></tr>
<tr style="font-size:12px;color:#565656"><td>Paralel A (Sesudah)</td><td>:</td><td width="50%"> <?php echo $pos["paralelsesudah_a"]; ?> ohm</td></tr>
<tr style="font-size:12px;color:#565656"><td>Paralel B (Sesudah)</td><td>:</td><td width="50%"> <?php echo $pos["paralelsesudah_b"]; ?> ohm</td></tr>
<tr style="font-size:12px;color:#565656"><td>Paralel C (Sesudah)</td><td>:</td><td width="50%"> <?php echo $pos["paralelsesudah_c"]; ?> ohm</td></tr>
<tr style="font-size:12px;color:#565656"><td>Paralel D (Sesudah)</td><td>:</td><td width="50%"> <?php echo $pos["paralelsesudah_d"]; ?> ohm</td></tr>
<tr style="font-size:12px;color:#565656"><td>Nilai Tahanan Tertinggi</td><td>:</td><td width="50%"> <?php echo $pos["nilai_tahanan_tertinggi"]; ?> ohm</td></tr>
<tr style="font-size:12px;color:#565656"><td>Arah Tower</td><td>:</td><td width="50%"> <?php echo $pos["arah_tower"]; ?></td></tr>
<tr style="font-size:12px;color:#565656"><td>Keterangan</td><td>:</td><td width="50%"> <?php echo $pos["keterangan"]; ?></td></tr>
<tr style="font-size:12px;color:#565656"><td>Status Report</td><td>:</td><td width="50%"> <?php echo $pos["status_report"]; ?></td></tr>
<tr><td colspan="4">
<?php 
if ($pos['kondisi']=='BAIK') { ?>
<div style="font-size: 20;width:100%;padding:10px;border:none;border-radius:10px;text-align:center;font-weight:bold;color:#fff;background:green;" ><small>BAIK</small></div>
<?php } ?>
<?php 
if ($pos['kondisi']=='SEDANG') { ?>
<div style="font-size: 20;width:100%;padding:10px;border:none;border-radius:10px;text-align:center;font-weight:bold;color:#fff;background:yellow;" ><small>SEDANG</small></div>
<?php } ?>
<?php 
if ($pos['kondisi']=='BURUK') { ?>
<div style="font-size: 20;width:100%;padding:10px;border:none;border-radius:10px;text-align:center;font-weight:bold;color:#fff;background:red;" ><small>BURUK</small></div>
<?php } ?>
</td></tr>
</center>
</td></tr></table></table>
</p>
<?php }?>
<div id="loading" style="display:none">
</div>
<script type="text/javascript">function showDiv(){div=document.getElementById("loading");div.style.display="block"};</script></div>
</body>