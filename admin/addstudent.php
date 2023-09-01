<?php
// XSS - Cross-site scripting


require_once(__DIR__."/../assets/db.php");
require_once(__DIR__."/../assets/student.php");

$connection = connectionDB();//protože jsme z připojení k databázi udělali funkci

//escapeline PROTI SQL INJECTION mysqli-real-escape:string -> STATEMENT
$first_name = null;
$second_name = null;
$age = null;
$life = null;
$college = null;

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // if ($_POST["first_name"] === "") {
    //     die("Křestní jméno je prázdné!");
    // } nebo prázdný pole s errory https://www.youtube.com/watch?v=lwHL8xdsUck&list=PLQ8x_VWW6AktaGgUDBMm_3to4bLDdu8HI&index=107
    $first_name = $_POST["first_name"];
    $second_name = $_POST["second_name"];
    $age = $_POST["age"];
    $life = $_POST["life"];
    $college = $_POST["college"];

    createStudent($connection, $first_name, $second_name, $age, $life, $college);
}

?>

<!DOCTYPE html>
<html lang="cs">
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
        <section class="addform">
        <?php require "assets/formstudent.php"; ?>
        </section>
    </main>


    <?php require "../assets/footer.php"; ?>
</body>
<script src="../js/header.js"></script>
</html>