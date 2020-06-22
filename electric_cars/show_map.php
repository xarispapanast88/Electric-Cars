<!DOCTYPE html>
<html>
  <head>
    <title>Simple Map</title>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBWkuD7mq1PUQLJEMixvA57GGdvB7XkOJs&callback=initMap"
      defer
    ></script>
	
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
	
    <style type="text/css">
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }

      /* Optional: Makes the sample page fill the window. */
      html,
      body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
	
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ecars";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
    /* lat/lng data will be added to this array */
    $locations=array();
    $query =  $conn->query("SELECT * FROM station");
        while( $row = $query->fetch_assoc() ){

            $name = $row['name'];
            $longitude = $row['lng'];                              
            $latitude = $row['lat'];

            /* Each row is added as a new array */
            $locations[]=array( 'name'=>$name, 'lat'=>$latitude, 'lng'=>$longitude );
        }
        /* Convert data to json */
		

        $markers = json_encode($locations);
		
		
?>
<script type='text/javascript'>
    <?php
        echo "var markers=$markers;\n";

    ?>

    function initMap() {
		

        var latlng = new google.maps.LatLng(38.244438, 21.734440);
        var myOptions = {
            zoom: 10,
            center: latlng,
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            mapTypeControl: false
        };

        var map = new google.maps.Map(document.getElementById("map"),myOptions);
        var infowindow = new google.maps.InfoWindow(), marker, lat, lng;
        var json=JSON.parse( JSON.stringify(markers) );
		

        for( var o in json ){

            lat = json[ o ].lat;
            lng=json[ o ].lng;
            name=json[ o ].name;

            marker = new google.maps.Marker({
                position: new google.maps.LatLng(lat,lng),
                name:name,
                map: map
            }); 
            google.maps.event.addListener( marker, 'click', function(e){
                infowindow.setContent( this.name );
                infowindow.open( map, this );
            }.bind( marker ) );
        }
    }
    </script>
	
	<div id="map"> </div>
</html>