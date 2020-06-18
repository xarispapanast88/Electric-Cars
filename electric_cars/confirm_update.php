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


$id = $_POST["id"];

$name = $_POST["name"];

$places = $_POST["places"];

$services = $_POST["services"];


$sql = "UPDATE station SET name='$name', places= '$places',services='$services' WHERE id=$id";

if ($conn->query($sql) === TRUE) {
  echo "Station info updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}






 

?>