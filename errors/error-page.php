<?php

$error_text = $_GET["error_text"];



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/header.css">
  

    <link rel="stylesheet" href="../css/footer.css">
    <title>Document</title>
</head>
<body>
    <section class="link">
        <a href="../admin/students.php">Zpět na úvodní stranu administrace</a>
    </section>


<main>
    <section class="error">
        <p><?=$error_text?></p>
    </section>
</main>




</body>
<script src="../js/header.js"></script>
</html>