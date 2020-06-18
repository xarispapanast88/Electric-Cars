<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
</style>

Please add info of station!
<br>
<br>
<form action="insert_station.php" method = "post">

Name:
<input type = "text" name = "name">
<br>
<br>

Latitude:
<input type = "text" name = "latitude">
<br>
<br>

Longitude:
<input type = "text" name = "longitude">
<br>
<br>

Services:
<br>
<textarea name="services">

</textarea>
<br>
<br>

Places:
<input type = "number" name = "places" min = "1">
<br>
<br>

<input type = "submit" value = "Add Station">


</form>

</html>