<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/general.css">
    <link rel="stylesheet" href="./query/header-query.css">
    <link rel="stylesheet" href="./css/footer.css">
    <script src="https://kit.fontawesome.com/f3c1d6cf9d.js" crossorigin="anonymous"></script>
    
    <title>Document</title>
</head>
<body>
<?php require "assets/header.php"; ?>
    
<main>
    <section class="form">
        <h1>Přihlášení</h1>
        <form action="admin/login.php" method="POST">
        <input type="email" name="email"> <br>
        <input type="password" name="password"> <br>
        <input type="submit" value="Přihlásit se">
        </form> 
    </section>

</main>


<?php require "assets/footer.php"?>
</body>
<script src="./js/header.js"></script>
</html>