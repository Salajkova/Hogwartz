<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/header.css">
            <link rel="stylesheet" href="./css/general.css">
            <link rel="stylesheet" href="./query/header-query.css">
            <link rel="stylesheet" href="./css/footer.css">
</head>
<body>
<?php require "assets/header.php"; ?>

<main>
    <section class="regsitration">

        <form action="admin/registr.php" method="POST">
            <input type="text" name="first_name" placeholder="Křestní jméno">
            <br>
            <input type="text" name="second_name" placeholder="Příjmení">
            <br>
            <input type="email" name="email" placeholder="Email">
            <br>
            <input type="password" name="password" placeholder="Heslo">
            <br>
            <input type="password" name="password_again" placeholder="Heslo znovu">
            <br>
            <input type="submit" value="Zaregistrovat se">
            <br>
        </form>

    <section>


</main>
<?php require "assets/footer.php"?>
</body>
<script src="./js/header.js"></script>
</html>