
<?php

require_once(__DIR__."/../assets/db.php");
require_once(__DIR__."/../assets/student.php");

$connection = connectionDB();

if ($_SERVER["REQUEST_METHOD"] === "POST"){
delete_student($connection, $_GET["id"]);
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
    <title>Smazat žáka</title>
</head>
<body>
    <?php require "../assets/admin-header.php";?>
    <form action="" method="POST">
        <p>Opravdu si přejete studenta vymazat?</p>
        <Button>Smazat</Button>
        <a href="onestudent.php?id=<?= $_GET['id']?>">Zrušit</a>
    </form>
    <?php require "../assets/footer.php";?>
    
</body>
<script src="../js/header.js"></script>
</html>
