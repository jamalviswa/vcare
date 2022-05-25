<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <title>Google Maps JavaScript API v3 Example: Reverse Geocoding</title>
    <link href="https://code.google.com/apis/maps/documentation/javascript/examples/default.css"
        rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="https://maps.google.com/maps/api/js?key=AIzaSyAteo77fhOppaMLuJxZ1dggEd5qHuiyhSU"></script>
    <script src="/Scripts/test.js" type="text/javascript"></script>    
</head>
<body onload="ReverseGeocode.Init()">
    <div>
        <input name="Latitude" type="text" id="Latitude" size="16" maxlength="10" />
        <input name="Longitude" type="text" id="Longitude" size="16" maxlength="10" />
        <input name="Address" type="text" id="Address" size="55" />
    </div>
    <div>
        <input type="button" value="Reverse Geocode" onclick="ReverseGeocode.ReverseCode()">
    </div>
    <div id="map_canvas" style="height: 90%; top: 60px; border: 1px solid black;">
    </div>
    
    <script>
        var ReverseGeocode = function () {

    //This is declaring the Global variables

    var geocoder, map, marker;

    //This is declaring the 'Geocoder' variable
    geocoder = new google.maps.Geocoder();

    function GeoCode(latlng) {

        // This is making the Geocode request
        geocoder.geocode({ 'latLng': latlng }, function (results, status) {

            if(status !== google.maps.GeocoderStatus.OK)
            {
                alert(status);
            }
            // This is checking to see if the Geoeode Status is OK before proceeding    
            if (status == google.maps.GeocoderStatus.OK) {

                //This is placing the marker at the returned address    
                if (results[0]) {
                    // Creating a new marker and adding it to the map
                    map.setZoom(16);
                    marker = new google.maps.Marker({
                        map: map, draggable: true
                    });
                    marker.setPosition(latlng);
                    map.panTo(latlng);
                }

                var address = (results[0].formatted_address);

                //This is placing the returned address in the 'Address' field on the HTML form  
                document.getElementById('Address').value = results[0].formatted_address;
            }
        });

    }

    return {

        Init: function () {

            //This is putting the 'Latitude' and 'Longitude' variables 
                            //together to make the 'latlng' variable
            //var latlng = new google.maps.LatLng(lat, lng);
            var latlng = new google.maps.LatLng(40.730885, -73.997383);

            //This is creating the map with the desired options 
            var myOptions = {
                zoom: 8,
                center: latlng,
                mapTypeId: 'roadmap'
            }

            map = new google.maps.Map(document.getElementById('map_canvas'), myOptions);

            GeoCode(latlng);
        },

        ReverseCode: function () {

            //This is getting the 'Latitude' and 'Longtiude' co-ordinates from the associated text boxes on the HTML form
            var lat = document.getElementById('Latitude').value;
            var lng = document.getElementById('Longitude').value;

            var latlng = new google.maps.LatLng(lat, lng);

            GeoCode(latlng);

        }
    };

} ();             // the parens here cause the anonymous function to execute and return

    </script>
    
    
</body>
</html>