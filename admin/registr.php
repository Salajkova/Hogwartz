<?php

require "../assets/url.php";
require "../assets/db.php";

session_start();

if($_SERVER["REQUEST_METHOD"] === "POST") {

    $connection = connectionDB();

    $first_name = $_POST["first_name"];
    $second_name = $_POST["second_name"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);



   
}





?>