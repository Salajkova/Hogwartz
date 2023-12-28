<?php

require_once(__DIR__."/../classes/Db.php"); 
require_once(__DIR__."/../classes/Student.php");
require_once(__DIR__."/../classes/Auth.php");

session_start();

if(!Auth::isLoggedIn() ){
    die("nepovolený přístup!!!"); //video 178 PHP 2023
}

//$connection = connectionDB();
$database = new Database(); 
$connection = $database->connectionDB();

$students = Student::getAllStudents($connection, "id, first_name, second_name");//kvůli columns -> zrychlení

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
    <link rel="stylesheet" href="../css/students.css">
    <title>Document</title>
</head>
<body>
<?php require "../assets/admin-header.php";?>
     <main>
     <section class="main-heading">
                <h1>Seznam žáků školy</h1>
                
    </section>

    <section class="filter-input">
        <a href="addstudent.php">Přidat žáka</a>
        <input type="text" class="filter" placeholder="Vyhledat">
    </section>

    <section class="students-list">
        
        <?php if(empty($students)): ?>
        <p>Students are missing</p>
        <?php else: ?>
            <div class="all-students">
                <?php foreach($students as $one_student): ?>
                    <div class="one-student">
                   <h2> <?php echo htmlspecialchars($one_student["first_name"]). " " .htmlspecialchars($one_student["second_name"]) ?></h2>

                    <a href='onestudent.php?id=<?= $one_student["id"] ?>'>Více informací</a>
                    </div>
                <?php endforeach ?>
            </div>

        <?php endif ?>
        </section>

    </main>
    <?php require "../assets/footer.php"?>
</body>
<script src="../js/header.js"></script>
<script src="../js/filter.js"></script>
</html>