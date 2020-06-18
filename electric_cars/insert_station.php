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

$name = $_POST["name"];

$latitude =$_POST["latitude"];

$longitude =$_POST["longitude"];

$services =$_POST["services"];

$places =$_POST["places"];




$sql = "SELECT * FROM station WHERE name='$name' OR (lat = '$latitude' AND lng = '$longitude')";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
 
 echo "The station already exists";
 echo "<br>";
 echo "<a href='index_admin.php'>Return to Home Page</a>";
 echo "<br>";

  
  }
 else {
  
  $sql2 = "INSERT INTO station(name,lat,lng,services,places,reserved,rating) VALUES('$name',$latitude,$longitude,'$services','$places',0,0)";
  
  if ($conn->query($sql2) === TRUE) {
  echo "The station added successfully";
   echo "<br>";

   echo "<a href='index_admin.php'>Return to HomePage</a>";

} else {
  echo "Error: " . $sql2 . "<br>" . $conn->error;
}
  
  
}


?>