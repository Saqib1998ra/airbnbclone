<?php
include ("connect_db.php");
    $uid = $_GET['id'];
    $price = $_GET['price'];
    if(isset($_POST["submit"])){
        $chkIn = $_POST["chk-in"];
        $chkOut = $_POST["chk-out"];
        $guest = $_POST["guest"];
        $sql = "ALTER TABLE yourinfo
        MODIFY COLUMN uid INT NOT NULL UNIQUE";
        $result = mysqli_query($conn,$sql);
        $data = "INSERT INTO yourinfo(`chk-in`, `chk-out`, `guest`, `price`, `uid`) VALUES('$chkIn', '$chkOut', '$guest','$price', '$uid')";
        if(mysqli_query($conn,$data)){
            echo "data inserted.";
            header("#");
        }
        else{
            echo "Data already exist.";
        }
    }
    
?>