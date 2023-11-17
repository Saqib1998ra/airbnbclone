<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "airDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_error($conn));
}
echo "Connected successfully";