<?php

//require_once(__DIR__."/../assets/db.php");
require_once(__DIR__."/../classes/Student.php");
require_once(__DIR__."/../classes/Auth.php");
require_once(__DIR__."/../classes/Url.php");
require_once(__DIR__."/../classes/Db.php");

session_start();

if(!Auth::isLoggedIn() ){
    die("nepovolený přístup!!!"); //video 178 PHP 2023
}

//$connection = connectionDB();
$database = new Database(); //nemá constructor = prázdné závorky)
$connection = $database->connectionDB();

//Získání dat z databáze
if(isset($_GET["id"]) ) {
    $one_student = Student::get_student($connection, $_GET["id"]);

    if($one_student){

        $first_name = $one_student["first_name"];
        $second_name = $one_student["second_name"];
        $age = $one_student["age"];
        $life = $one_student["life"];
        $college = $one_student["college"];
        $id = $one_student["id"];

    } else {
        die("Žák nenalezen!");}

    } else {
        die("id není zadáno, student nebyl nalezen!");
    }


    //odeslání dat z formuláře
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $first_name = $_POST["first_name"];
        $second_name = $_POST["second_name"];
        $age = $_POST["age"];
        $life = $_POST["life"];
        $college = $_POST["college"];

    if(Student::update_student($connection, $first_name, $second_name,
                    $age, $life, $college, $id)) {
                        Url::redirectUrl("/web/Hogwartz/admin/onestudent.php?id=$id");
                    };
    
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/header.css">
    <script src="https://kit.fontawesome.com/f3c1d6cf9d.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../query/header-query.css">
    <link rel="stylesheet" href="../css/footer.css">
    <title>Document</title>
</head>
<body>
<?php require "../assets/admin-header.php";?>
    <main>
        
   <?php require "../assets/formstudent.php"; ?>

    </main>
    <?php require "../assets/footer.php"; ?>
</body>
<script src="../js/header.js"></script>
</html>