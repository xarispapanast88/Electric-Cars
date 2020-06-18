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


$sql = "SELECT * FROM station";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
	
echo "<table border = '1'>";

echo "<tr>";

echo "<th>";

echo "Id";

echo "</th>";

echo "<th>";

echo "Name";

echo "</th>";

echo "<th>";

echo "Latitude";

echo "</th>";

echo "<th>";

echo "Longitude";

echo "</th>";

echo "<th>";

echo "Services";

echo "</th>";

echo "<th>";

echo "Places";

echo "</th>";

echo "<th>";

echo "Rating";

echo "</th>";

echo "<th>";

echo "Reserved";

echo "</th>";

echo "</tr>";

  // output data of each row
  while($row = $result->fetch_assoc()) {
	  
	  
    echo "<tr>";
	
	echo "<td>";
	
	echo $row['id'];
	
   echo "</td>";
	
   echo "<td>";
	
	echo $row['name'];
	
   echo "</td>";
   
   echo "<td>";
	
	echo $row['lat'];
	
   echo "</td>";
   
   echo "<td>";
	
	echo $row['lng'];
	
   echo "</td>";
   
   echo "<td>";
	
	echo $row['services'];
	
   echo "</td>";
   
   echo "<td>";
	
	echo $row['places'];
	
   echo "</td>";
	
   
   echo "<td>";
	
	echo $row['rating'];
	
   echo "</td>";
   
   echo "</td>";
	
   
   echo "<td>";
	
	if ($row['reserved']=='1') echo "Yes";
	
	else echo "No";
	
   echo "</td>";
   
   echo "<td>";
   
     $station = $row["id"];

   echo "<form action = 'view_station_info.php' method = 'post'>";
   
   echo "<input type='hidden' name='st_id'  value='$station'>";
   echo "<input type='submit'  value='View More'>";
   echo "</form>";
   echo "</td>";


      echo "</tr>";

  }
  
echo "</table>"; 
  
} else {
  echo "0 results";
}
  
  



?>

</html>