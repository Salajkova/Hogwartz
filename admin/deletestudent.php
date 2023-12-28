
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

$role = $_SESSION["role"];

//$connection = connectionDB();
$database = new Database(); //nemá constructor = prázdné závorky)
$connection = $database->connectionDB();

if ($_SERVER["REQUEST_METHOD"] === "POST"){
if (Student::delete_student($connection, $_GET["id"])){
    Url::redirectUrl("/web/Hogwartz/admin/students.php");
}
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
    <link rel="stylesheet" href="../css/deletestudent.css">
    <link rel="stylesheet" href="../css/footer.css">
    <title>Smazat žáka</title>
</head>
<body>
    <?php require "../assets/admin-header.php";?>


    <main>
        <?php if($role === "admin"): ?>
            <section class="delete-form">
            <form action="" method="POST">
                <p>Opravdu si přejete studenta vymazat?</p>
                
                <div class="btns">
                <Button>Smazat</Button>
                <a href="onestudent.php?id=<?= $_GET['id']?>">Zrušit</a>
                 </div>
            </form>
            </section>
        <?php else: ?>
            <section class="no-delete-form">
                <h1>Obsah této stránky je k&nbsp;dispozici pouze administrátorům.</h1>
            </section>

        <?php endif; ?>

        
    </main>
    <?php require "../assets/footer.php";?>
    
</body>
<script src="../js/header.js"></script>
</html>
