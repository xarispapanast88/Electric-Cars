<?php

session_start();

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


function distance($lat1, $lon1, $lat2, $lon2) {
  if (($lat1 == $lat2) && ($lon1 == $lon2)) {
    return 0;
  }
  else {
    $theta = $lon1 - $lon2;
    $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
    $dist = acos($dist);
    $dist = rad2deg($dist);
    $miles = $dist * 60 * 1.1515;
    $unit = strtoupper($unit);

    
      return ($miles * 1.609344);
    
  }
}


$mylat = $_POST["latitude"];

$mylng = $_POST["longitude"];

$id = $_SESSION["id"];

echo $id;

$sql = "DELETE FROM distance WHERE user_id=$id";

if ($conn->query($sql) === TRUE) {
  
} else {
  echo "Error deleting record: " . $conn->error;
}
















?>