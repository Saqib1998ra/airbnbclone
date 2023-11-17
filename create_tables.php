<?php
include("connect_db.php");
// $sptab = "CREATE TABLE sign_up (
//     id INT AUTO_INCREMENT PRIMARY KEY,
//     name VARCHAR(50),
//     email VARCHAR(30),
//     pass VARCHAR(30),
//     phone VARCHAR(30)   
// )";
// if(mysqli_query($conn,$sptab)){
//     echo "sign up table created successfully";
// }
// else{
//     echo "Error is creating table" . mysqli_error($conn);
// }

//create listing table 

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
    // $ltb = "ALTER TABLE `listing` ADD COLUMN
    //     `address` VARCHAR(30)
    // AFTER `city`";
    // if(mysqli_query($conn,$ltb)){
    //     echo "New column added to the listing table";
    // }
    // else{
    //     echo "Error in alter table" . mysqli_error($conn);
    // }

// create yourinfo table
// $revTable = "CREATE TABLE yourinfo (
//     id INT AUTO_INCREMENT PRIMARY KEY,
//     `chk-in` DATETIME,
//     `chk-out` DATETIME,
//     guest INT(10),
//     price INT(10),
//     uid INT,
//     CONSTRAINT FK_UserReserve FOREIGN KEY (uid)
//     REFERENCES sign_up(id)
// )";
// if(mysqli_query($conn, $revTable)){
//     echo "Reserve table created!";
// }
// else{
//     echo "connection failed" . mysqli_error($conn);
// }
?>