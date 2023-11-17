<?php
include("connect_db.php");
$sptab = "CREATE TABLE sign_up (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50),
    email VARCHAR(30),
    pass VARCHAR(30),
    phone VARCHAR(30)   
)";
if(mysqli_query($conn,$sptab)){
    echo "sign up table created successfully";
}
else{
    echo "Error is creating table" . mysqli_error($conn);
}
?>