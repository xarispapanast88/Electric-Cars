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


$id = $_POST["st_id"];

$sql = "DELETE FROM station WHERE id=$id";

if ($conn->query($sql) === TRUE) {
  echo "Station deleted successfully";
} else {
  echo "Error deleting record: " . $conn->error;
}



 

?>