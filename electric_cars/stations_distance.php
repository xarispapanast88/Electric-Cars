<html>

<script>

  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else {
    document.getElementById("x").innerHTML = "Geolocation is not supported by this browser.";
  }


function showPosition(position) {
  document.getElementById("x").innerHTML = "Your Current Position is:<br>"+"Latitude: " + position.coords.latitude +
  "<br>Longitude: " + position.coords.longitude;
}
</script>

<div id="x"> </div>

</html>