<?php

//Vypsání informací do stránky
require_once(__DIR__."/../classes/Db.php"); 
require_once(__DIR__."/../classes/Student.php");
require_once(__DIR__."/../classes/Auth.php");

session_start();

if (!Auth::isLoggedIn()) {
    die("Nepovolený přístup");
}
//$connection = connectionDB();
$database = new Database(); //nemá constructor = prázdné závorky)
$connection = $database->connectionDB();

if ( isset($_GET["id"]) && is_numeric($_GET["id"]) ) {
   $students = Student::get_student($connection, $_GET["id"]);
} else {
    $students = null;
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
    <link rel="stylesheet" href="../css/onestudent.css">
    <title>Document</title>
</head>
<body>
<?php require "../assets/admin-header.php";?>
    <main>
    <h1></h1>
    <section class="main-heading">
                <h1>Jeden žák</h1>
                </section>
    <section class="one-student">
        <?php if ($students === null): ?>
            <p>Žák nenalezen</p>

        <?php else: ?>
            
            <div class="one-student-box">
            <h2><?php echo htmlspecialchars($students["first_name"])." ".htmlspecialchars($students["second_name"])?></h2>
            <p>Věk: <?= htmlspecialchars($students["age"]) ?></p>
            <p>Dodatečné informace: <?= htmlspecialchars($students["life"]) ?></p>
            <p>Kolej: <?= htmlspecialchars($students["college"]) ?></p>
            </div>

        <?php endif ?>
    
    <div class="buttons">
        <a href="editstudent.php?id=<?= $students['id']?>"> Upravit záznam žáka </a>
        <br>
        <a href="deletestudent.php?id=<?= $students['id']?>">Smazat žáka</a>
        
        <a href="students.php">Zpět</a>
    </div>
    </section>
    </main>
    
    <?php require "../assets/footer.php"?>
    
</body>
<script src="../js/header.js"></script>
</html>