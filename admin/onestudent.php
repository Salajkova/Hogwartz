<?php

//Vypsání informací do stránky
require_once(__DIR__."/../assets/db.php"); 
require_once(__DIR__."/../assets/student.php");

$connection = connectionDB();

if ( isset($_GET["id"]) && is_numeric($_GET["id"]) ) {
   $students = get_student($connection, $_GET["id"]);
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
    <h1></h1>
    <section class="main-heading">
                <h1>Jeden žák</h1>
                </section>
    <section>
        <h1>Informace o žákovi</h1>
        <?php if ($students === null): ?>
            <p>Žák nenalezen</p>

        <?php else: ?>
            <h2><?php echo htmlspecialchars($students["first_name"])." ".htmlspecialchars($students["second_name"])?></h2>
            <p>Věk: <?= htmlspecialchars($students["age"]) ?></p>
            <p>Dodatečné informace: <?= htmlspecialchars($students["life"]) ?></p>
            <p>Kolej: <?= htmlspecialchars($students["college"]) ?></p>

        <?php endif ?>
    </section>
    <section class="buttons">
        <a href="editstudent.php?id=<?= $students['id']?>"> Upravit záznam žáka </a>
        <br>
        <a href="deletestudent.php?id=<?= $students['id']?>">Smazat žáka</a>
    </section>
    <a href="students.php">Zpět</a>
    </main>
    
    <?php require "../assets/footer.php"?>
    
</body>
<script src="../js/header.js"></script>
</html>