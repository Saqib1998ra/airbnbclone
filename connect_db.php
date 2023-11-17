<?php
// $servername = "localhost";
// $username = "root";
// $password = "";

// // Create connection
// $conn = new mysqli($servername, $username, $password);

// // Check connection
// if (!$conn) {
//   die("Connection failed: " . mysqli_error($conn));
// }
// echo "Connected successfully";
// $sql = "CREATE DATABASE airDB";
// if (mysqli_query($conn,$sql)) {
//   echo "Database created successfully";
// } else {
//   echo "Error creating database: " . mysqli_error($conn);
// }


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
echo "";
?>