<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
</style>

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

</html>