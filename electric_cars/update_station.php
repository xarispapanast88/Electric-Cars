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




$sql = "SELECT * FROM station WHERE id='$id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
 
$row = $result->fetch_assoc();

$name = $row["name"];


$services = $row["services"];

$places = $row["places"];


echo "<form action='confirm_update.php' method='post'>";

echo "Name: ";

echo "<input type ='text' name ='name' value='$name'>";
echo "<br>";
echo "<br>";

echo "Services:";

echo "<br>";


echo "<textarea name='services'>$services</textarea>";  
echo "<br>";
echo "<br>";

echo "Places:";
echo "<input type ='number' name ='places' value=$places>";
echo "<br>";
echo "<br>";

echo "<input type ='hidden' name ='id' value=$id>";



echo "<input type ='submit'  value='Update'>";

echo "</form>"; 
  }
 

?>