<?php
include("connect_db.php");
// $ltb = "CREATE TABLE listing (
//     id INT AUTO_INCREMENT PRIMARY KEY,
//     image VARCHAR(50),
//     city VARCHAR(30),
//     date DATE,
//     rooms INT(30),
//     price INT(30)
// )";
// if(mysqli_query($conn,$ltb)){
//     echo "Listing table created successfully";
// }
// else{
//     echo "Error in creating table" . mysqli_error($conn);
// }
$ltb = "ALTER TABLE `listing` ADD COLUMN
    `address` VARCHAR(30)
AFTER `city`";
if(mysqli_query($conn,$ltb)){
    echo "New column added to the listing table";
}
else{
    echo "Error in alter table" . mysqli_error($conn);
}
mysqli_close($conn);
?>