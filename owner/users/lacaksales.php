<body onkeydown="javascript:if(window.event.keyCode==13)window.event.keyCode=9">
<br>
<a href="index.php" style="background:orange;padding:5px;color:#fff;text-decoration:none">< Back</a><br><br>
<div style="border-bottom:1px solid #8c8c8c;color:#616161;font-size:14px;font-weight:bold">Lihat Lokasi Retailer Shop Seluruhnya
</div>
<center>
<div style="z-index:1;color:grey;font-size:18px;font-weight:bold">
</div>
</center>

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
  <script type="text/javascript" src="//maps.google.com/maps/api/js?sensor=true"></script><script type="text/javascript"src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAO4lbxY6SKygcJxTuzu-Qi7kAAP9SdAwM&callback=initMap"></script> <script>
    var marker;
      function initialize() {
        var mapCanvas = document.getElementById('map-canvas');
        var mapOptions = {
          mapTypeId: google.maps.MapTypeId.ROADMAP
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
var iconBase = 'https://profitgm.com/beko/owner/marker.png';
            var marker = new google.maps.Marker({
				icon: iconBase,
                map: map,
                position: pt
            });       
            map.fitBounds(bounds);
            bindInfoWindow(marker, map, infoWindow, info);
          }
          <?php		  
            $query = mysqli_query($mysqli, "SELECT * FROM users WHERE lat!='' AND lat IS NOT NULL");
          while ($data = mysqli_fetch_array($query)) {
            $lat = $data['lat'];
            $lng = $data['lng'];
            $email = $data['email'];
            $phone = $data['phone'];
            $noktp = $data['noktp'];
            $pembelian = $data['pembelian'];
			$first_name = $data['first_name'];
            echo ("addMarker($lat, $lng, '<a style=font-size:12px;color:>$first_name<br><br>No. KTP: $noktp <br>Email: $email<br>Nomor Handphone: $phone<br>Total Pembelian: $pembelian unit</a>');\n");                        
          }
          ?>
        }
      google.maps.event.addDomListener(window, 'load', initialize);
    </script>
    <div id="map-canvas"></div> 
</body>