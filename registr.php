<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrace</title>
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/general.css">
    <link rel="stylesheet" href="./query/header-query.css">
    <link rel="stylesheet" href="./css/footer.css">
    <link rel="stylesheet" href="./css/registr.css">

    <script src="https://kit.fontawesome.com/f3c1d6cf9d.js" crossorigin="anonymous"></script>

</head>
<body>
<?php require "assets/header.php"; ?>

<main>
    <section class="regsitration">
        <form class="form" action="admin/registr.php" method="POST">
            <h1>Registrace</h1>
            <input class="name" type="text" name="first_name" placeholder="Křestní jméno">
            <br>
            <input class="name" type="text" name="second_name" placeholder="Příjmení">
            <br>
            <input class="email" type="email" name="email" placeholder="Email">
            <br>
            <input class="password first" type="password" name="password" placeholder="Heslo">
            <br>
            <input class="password second" type="password" name="password_again" placeholder="Heslo znovu">
            <br>
            <p class="result-text"></p>
            <input class="button" type="submit" value="Zaregistrovat se">
            <br>
        </form>

    <section>


</main>
<?php require "assets/footer.php"?>
</body>
<script src="./js/header.js"></script>
<script src="./js/passwordcheck.js"></script>
</html>