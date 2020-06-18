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

$sql2 = "SELECT COUNT(*) AS plithos FROM reserved WHERE station_id='$id'";
$result2 = $conn->query($sql2); 
$row2 = $result2->fetch_assoc();
$reserved = $row2["plithos"];

$sql3 = "SELECT user.username as name from user INNER JOIN reserved ON user.id = reserved.user_id WHERE station_id='$id'";
$result3 = $conn->query($sql3); 


if ($result->num_rows > 0) {
 
$row = $result->fetch_assoc();

$name = $row["name"];


$services = $row["services"];

$places = $row["places"];


echo "<form action='confirm_update.php' method='post'>";

echo " Station id: ";
echo "<input type ='text' name ='id' value=$id readonly>";

echo " Name: ";

echo "<input type ='text' name ='name' value='$name' readonly>";





echo " Total Places: ";
echo "<input type ='number' name ='places' value=$places readonly>";

echo " Reserved Places: ";
echo "<input type ='number' name ='places' value=$reserved readonly>";

echo "<input type ='hidden' name ='id' value=$id readonly>";

echo "</form>"; 
  }

echo "<br>";

echo "List of users in station now:<br>";

if ($result3->num_rows > 0) {

echo "<table border = '1'>";

echo "<tr>";

echo "<th>";

echo "username";

echo "</th>";

echo "</tr>";


  while($row3= $result3->fetch_assoc()) {
	  
	echo "<tr>";
	
	echo "<td>";
	
	echo $row3['name'];
	
   echo "</td>";
	
   echo "</tr>";
  }
  
  
  echo "</table>"; 

} else {
  echo "0 users in station now";
}




  
 

?>

</html>