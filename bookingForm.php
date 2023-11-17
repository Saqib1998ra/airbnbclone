<!DOCTYPE html>
<html>
<head>
  <title>Accommodation Form</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      padding: 20px;
    }
    h1 {
      text-align: center;
      color: crimson;
    }
    form {
      background-color: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      max-width: 400px;
      margin: 0 auto;
    }
    label {
      display: block;
      margin-bottom: 6px;
      color: #333;
    }
    input[type="text"],
    input[type="date"],
    input[type="number"],
    input[type="file"],
    input[type="submit"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }
    input[type="submit"] {
      background-color:crimson;
      color: white;
      cursor: pointer;
    }
    input[type="submit"]:hover {
      background-color:darkred ;
    }
  </style>
</head>
<body>
  <h1>Accommodation Booking Form</h1>
  <form action="bookingForm.php" method="post" enctype="multipart/form-data">
    <label for="city">City Name:</label>
    <input type="text" id="city" name="city">

    <label for="address">Address:</label>
    <input type="text" id="address" name="address">

    <label for="date">Date:</label>
    <input type="date" id="date" name="date">

    <label for="rooms">Rooms:</label>
    <input type="number" id="rooms" name="rooms" min="1">

    <label for="price">Price:</label>
    <input type="number" id="price" name="price" min="0" step="0.01">

    <label for="image">Upload Image:</label>
    <input type="file" id="image" name="uploadimage[]" value="" multiple="true">

    <input type="submit" name="submit">
  </form>
</body>
</html>
<?php
include("connect_db.php");
include("addsession.php");
if(isset($_POST["submit"])){
  
  $city = $_POST["city"];
  $address = $_POST["address"];
  $date = $_POST["date"];
  $rooms = $_POST["rooms"];
  $price = $_POST["price"];
  
  foreach ($_FILES['uploadimage']['tmp_name'] as $file => $tempname){
    $filepaths = [];
    $filename = $_FILES['uploadimage']['name'][$file];
    $tempname = $_FILES['uploadimage']['tmp_name'][$file];
    $folder = "./assets/" . $filename;

    if (move_uploaded_file($tempname,$folder)) {
      $filePaths[] = $folder;
    }
  }
  //use the move_uploaded_file() to move your file on your server directory.
  if (!empty($filePaths)) {
    
    $filePathsStr = implode(',',$filePaths);
    $sql = "INSERT INTO listing (image, city, address, date, rooms, price ) VALUES ('$filePathsStr','$city','$address','$date','$rooms','$price')";
  //fire an insert query that inserts all the file names with comma separated value

  // Run the SQL query and check for errors
  if (mysqli_query($conn, $sql)) {
    echo "<h3>Image uploaded and path inserted into the database successfully!</h3>";
  } else {
    echo "<h3>Error inserting image path into the database: " . mysqli_error($conn) . "</h3>";
  }
  } else {
  echo "<h3>Failed to upload image!</h3>";
  }
  }
?>