<?php

require_once(__DIR__."/../assets/db.php"); // proč nám to ase nefunguje? require "../ sfgfgsfgsf.php" by mělo fungovat
require_once(__DIR__."/../assets/student.php");
require_once(__DIR__."/../assets/auth.php");

session_start();

if(!isLoggedIn() ){
    die("nepovolený přístup!!!"); //video 178 PHP 2023
}

$connection = connectionDB();
$students = getAllStudents($connection, "id, first_name, second_name");//kvůli columns -> zrychlení

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
     <section class="main-heading">
                <h1>Žáci</h1>
                <a href="addstudent.php">Přidat žáka</a>
                </section>
        <section class="students-list">
        <h1>Seznam žáků školy</h1>
        <?php if(empty($students)): ?>
        <p>Students are missing</p>
        <?php else: ?>
            <ul>
                <?php foreach($students as $one_student): ?>
                    <li>
                        <?php echo htmlspecialchars($one_student["first_name"]). " " .htmlspecialchars($one_student["second_name"]) ?>
                    </li>

                    <a href='onestudent.php?id=<?= $one_student["id"] ?>'>Více informací</a>
                <?php endforeach ?>
            </ul>

        <?php endif ?>
        </section>

    </main>
    <?php require "../assets/footer.php"?>
</body>
<script src="../js/header.js"></script>
</html>