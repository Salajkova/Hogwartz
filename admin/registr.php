<?php

require "../classes/Url.php";
require "../classes/User.php";
require "../classes/Db.php";

session_start();

if($_SERVER["REQUEST_METHOD"] === "POST") {

    //$connection = connectionDB();
    $database = new Database(); //nemá constructor = prázdné závorky)
    $connection = $database->connectionDB();

    $first_name = $_POST["first_name"];
    $second_name = $_POST["second_name"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $role = "user";

    $id = User::createUser($connection, $first_name, $second_name, $email, $password, $role);
    
    if(!empty($id)) {
        session_regenerate_id(true); //zabraňuje fixation attack
        
       //Nastavení, že je uživatel přihlášený
        $_SESSION["is_logged_in"] = true;
        //Nastavení ID uživatele
        $_SESSION["logged_in_user_id"] = $id;
        //Nastavení role uživatele
        $_SESSION["role"] = $role;

        Url::redirectUrl("/web/Hogwartz/admin/students.php"); //funguje to?
    } else {
        echo "Uživatele se nepodařilo přidat";
    }
   
}





?>