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

$username = $_POST["username"];

$password = $_POST["password"];

$email =$_POST["email"];

$sql = "SELECT * FROM user WHERE username='$username' OR email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
 
 echo "The user already exists";
 echo "<br>";
 echo "<a href='index.php'>Return to Home Page</a>";
 echo "<br>";

  
  }
 else {
  
  $sql2 = "INSERT INTO user(username,password,email,points) VALUES('$username','$password','$email',0)";
  
  if ($conn->query($sql2) === TRUE) {
  echo "You registered successfully";
   echo "<br>";

   echo "<a href='login_user.php'>Return to Login Page</a>";

} else {
  echo "Error: " . $sql2 . "<br>" . $conn->error;
}
  
  
}


?>