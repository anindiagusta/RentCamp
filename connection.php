<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rentcamps";

// Create connection
$con = new mysqli($servername, $username, $password, $dbname);
$conn = mysqli_connect("localhost", "root", "", "rentcamps");
// Check connection
if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}
// echo "Connected successfully";