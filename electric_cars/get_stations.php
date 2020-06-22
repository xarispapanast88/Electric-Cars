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

$sql = "SELECT lat,lng FROM station";
$result = $conn->query($sql);

$final = array();
while($row = $result->fetch_assoc()){
    // temporary array to create single category

    $tmp = array();
    array_push($tmp, $row["lat"]);
    array_push($tmp, $row["lng"]);
	
	array_push($final,$tmp);
 

}


json_encode($final);

?>