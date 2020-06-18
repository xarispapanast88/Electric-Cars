<?php


$username = $_POST["username"];

$password = $_POST["password"];



if ($username=="admin" && $password=="admin") {
 
 header("Location: index_admin.php");
  
  }
 else {
  header("Location: login_admin.php");
}














?>