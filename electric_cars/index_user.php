<html>
<body>

<h3>Nearest Stations</h3>



<script>
var map;
function initMap() {
  map = new google.maps.Map(document.getElementById("googleMap"), {
    center: { lat: -34.397, lng: 150.644 },
    zoom: 8
  });
  
 
}

function makeRequest(url, callback) {
var request;
if (window.XMLHttpRequest) {
request = new XMLHttpRequest(); // IE7+, Firefox, Chrome, Opera, Safari
} else {
request = new ActiveXObject("Microsoft.XMLHTTP"); // IE6, IE5
}
request.onreadystatechange = function() {
if (request.readyState == 4 && request.status == 200) {
callback(request);
}
}
request.open("GET", url, true);
request.send();
}

function displayLocation(location) {


var position = new google.maps.LatLng(parseFloat(location.lat), parseFloat(location.lng));
var marker = new google.maps.Marker({
map: map,
position: position,
title: location.id
});

google.maps.event.addListener(marker, 'click', function() {
infowindow.open(map,marker);
});

}

</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBWkuD7mq1PUQLJEMixvA57GGdvB7XkOJs&callback=myMap"></script>

<div id="googleMap" style="width:100%;height:400px;"></div>


</body>
</html>