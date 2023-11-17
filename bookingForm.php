<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "airdb";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $city = $_POST['city'];
    $address = $_POST['address'];
    $date = $_POST['date'];
    $rooms = $_POST['rooms'];
    $price = $_POST['price'];

    $target_directory = "assets/"; // Define your directory to store the images
    $target_file = $target_directory . basename($_FILES["image"]["name"]);

    // You might want to add more checks and validation for the uploaded file
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

    $sql = "INSERT INTO listing (city, address, date, rooms, price, image) 
            VALUES ('$city', '$address', '$date', '$rooms', '$price', '$target_file')";

    if ($conn->query($sql) === TRUE) {
        header("location:airbnb.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
