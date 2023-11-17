<?php
include("connect_db.php");
if(isset($_POST['submit'])) {
    $sql = mysqli_query($conn,
    "SELECT * FROM sign_up WHERE email='"
    . $_POST["email"] . "' AND
    pass='" . $_POST["password"] . "'    ");
    if($num = mysqli_num_rows($sql) > 0){

    

    while($row= mysqli_fetch_assoc($sql)){
                session_start();
                $_SESSION["email"] = $row['email'];
                $_SESSION["password"] = $row['pass'];
                header("location:airbnb.php");
            }
        }
        else{
            echo "Incorrect info";
        }
    }
?>