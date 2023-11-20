<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $price = $_POST['price'];
    $guest = $_POST['guest'];
    $check_in = $_POST['check_in'];
    $check_out = $_POST['check_out'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "airdb";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO yourinfo (price, guest, check_in, check_out) VALUES ('$price', '$guest', '$check_in', '$check_out')";

    if ($conn->query($sql) === TRUE) {
        header("location:payment.html");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
    

?>
