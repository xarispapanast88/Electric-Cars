<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ecars";
session_start();

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$username = $_POST["username"];

$password = $_POST["password"];

$sql = "SELECT * FROM user WHERE username='$username' AND password = '$password'";
$result = $conn->query($sql);
$row =$result->fetch_assoc();

if ($result->num_rows > 0) {
	
	$_SESSION["id"] = $row["id"];
 
 header("Location: index_user.php");
  
  }
 else {
  header("Location: login_user.php");
}














?>