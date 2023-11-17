
<?php
include("connect_db.php");


if(isset($_POST["submit"])){
    $name = $_POST["uname"];
    $email = $_POST["email"];
    $pass = $_POST["password"];
    $phone = $_POST["phone"];
    $sql = "ALTER TABLE sign_up ADD UNIQUE (email)";
    $result=mysqli_query($conn, $sql);

    $data = "INSERT INTO sign_up(name, email, pass, phone) values('$name', '$email', '$pass', '$phone')";
    if(mysqli_query($conn,$data)){
        echo "data inserted.";
        header("location:index_a.html");
    }
    else{
        echo "Data already exist.";
    }
}
?>