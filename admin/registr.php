<?php

require "../assets/url.php";
require "../assets/db.php";
require "../assets/user.php";

session_start();

if($_SERVER["REQUEST_METHOD"] === "POST") {

    $connection = connectionDB();

    $first_name = $_POST["first_name"];
    $second_name = $_POST["second_name"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    $id = createUser($connection, $first_name, $second_name, $email, $password);
    
    if(!empty($id)) {
        session_regenerate_id(true); //zabraňuje fixation attack
        
       //Nastavení, ýže je uživatel přihlášený
        $_SESSION["is_logged_in"] = true;
        //Nastavení ID uživatele
        $_SESSION["logged_in_user_id"] = $id;

        redirectUrl("/web/Hogwartz/admin/students.php"); //nefunguje, jak to má vypadat?
    } else {
        echo "Uživatele se nepodařilo přidat";
    }
   
}





?>