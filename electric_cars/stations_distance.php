<html>

<?php

session_start();
?>

<script>

  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else {
    document.getElementById("x").innerHTML = "Geolocation is not supported by this browser.";
  }


function showPosition(position) {
  document.getElementById("latitude").value = position.coords.latitude;
    document.getElementById("longitude").value = position.coords.longitude;
}
</script>
Your current location is:
<br>
<br>
<form action="view_nearest.php" method="post">
Latitude:
<input type="text" name="latitude"  id="latitude" >
<br>
<br>
Longitude:
<input type="text" name="longitude" id="longitude" >

<br>
<br>
<button type="submit">View Nearest Stations</button>
</form>



</html>