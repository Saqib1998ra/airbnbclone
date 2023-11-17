<?php
session_start();
if(!isset($_SESSION["email"])){
    header("location:index_a.html");
}

?>