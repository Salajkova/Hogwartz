<?php

require_once(__DIR__."/../classes/Db.php");
require_once(__DIR__."/../classes/Url.php");
require_once(__DIR__."/../classes/User.php");

session_start();

if($_SERVER["REQUEST_METHOD"] === "POST") {

    //$connection = connectionDB();
    $database = new Database(); 
    $connection = $database->connectionDB();


    $log_email = $_POST["email"];
    $log_password = $_POST["password"];
    
 if(User::authentication($connection, $log_email, $log_password)) {
    //získání ID uživatele
    $id = User::getUserId($connection, $log_email);

    session_regenerate_id(true); //zabraňuje fixation attack
    //echo $id; mělo by fungovat, ale  nejde, nejspíš kvůli autentifikaci, video 185

       //Nastavení, že je uživatel přihlášený
       $_SESSION["is_logged_in"] = true;
       //Nastavení ID uživatele
       $_SESSION["logged_in_user_id"] = $id;

       Url::redirectUrl("/web/Hogwartz/admin/students.php");

 } else {
//Neúspěšné přihlášení
$error = "Chyba při přihlášení";
 }
}

/**
 * 
 * 
 * 
 * 
 * 
 */

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php if(!empty($error)): ?>
        <p><?= $error ?> </p>
        <a href="../signin.php">Zpět na přihlášení</a>

        <?php endif; ?>
</body>
</html>