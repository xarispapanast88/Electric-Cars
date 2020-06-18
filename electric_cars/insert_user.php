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

</html>