<?php
// Assuming you have a database connection established
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "airdb";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle the form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the POST variables are set
    if (
        isset($_POST["cardName"]) &&
        isset($_POST["cardNum"]) &&
        isset($_POST["exp"]) &&
        isset($_POST["cvv"]) &&
        isset($_POST["address"]) &&
        isset($_POST["aptNum"]) &&
        isset($_POST["city"]) &&
        isset($_POST["state"]) &&
        isset($_POST["zip"]) &&
        isset($_POST["country"])
    ) {
        // Sanitize user input
        $cardName = mysqli_real_escape_string($conn, $_POST["cardName"]);
        $cardNum = mysqli_real_escape_string($conn, $_POST["cardNum"]);
        $exp = mysqli_real_escape_string($conn, $_POST["exp"]);
        $cvv = mysqli_real_escape_string($conn, $_POST["cvv"]);
        $address = mysqli_real_escape_string($conn, $_POST["address"]);
        $aptNum = mysqli_real_escape_string($conn, $_POST["aptNum"]);
        $city = mysqli_real_escape_string($conn, $_POST["city"]);
        $state = mysqli_real_escape_string($conn, $_POST["state"]);
        $zip = mysqli_real_escape_string($conn, $_POST["zip"]);
        $country = mysqli_real_escape_string($conn, $_POST["country"]);

        // Insert data into the payment table using prepared statements
        $stmt = $conn->prepare("INSERT INTO payment (cardName, cardNum, exp, cvv, address, aptNum, city, state, zip, country)
                                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        // Bind parameters
        $stmt->bind_param("ssssssssss", $cardName, $cardNum, $exp, $cvv, $address, $aptNum, $city, $state, $zip, $country);

        // Execute the statement
        if ($stmt->execute()) {
            echo "Data inserted successfully";
        } else {
            echo "Error: Data not inserted. Please try again later.";
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "Error: Invalid form data.";
    }
}

// Close the database connection
$conn->close();
?>
