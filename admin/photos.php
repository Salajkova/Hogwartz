<?php

require "../classes/Auth.php";
require "../classes/Image.php";
require "../classes/Db.php";

session_start();

//Ověřená zda je uživatel přihlášený
if( !Auth::isLoggedIn()) {
    die("Nepovolený prístup!");
}



$db = new Database();
$connection = $db->connectionDB();

$user_id = $_SESSION["logged_in_user_id"]; 

$allImages = Image::getImagesByUserId($connection, $user_id);

//Práce s chybou přímo na stránce
 if($_SERVER["REQUEST_METHOD"] ==="POST"){

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
    <link rel="stylesheet" href="../css/photos.css">

    <title>Document</title>
</head>
<body>
    <?php require "../assets/admin-header.php";?>
<main>
    <section class="upload-photos">
        <h1>Fotky</h1>
        <form action="uploadphotos.php" method="POST" enctype="multipart/form-data">
            <label for="choose-file" id="choose-file-text">Vybrat obrázek</label>
            <input type="file" name="image" id="choose-file" class="choose-file">

            <label for="upload-file"></label>
            <input type="submit" class="upload-file" name="submit" value="Nahrát obrázek" id="upload-file">
        </form>
    </section>
    <section class="images">
        <article>

        <?php  foreach($allImages as $one_img): ?>

            
            <div>
                <div>
                    <img src=<?= "../uploads/" . $user_id . "/" . $one_img["img_name"]?>>
                </div>
                <div class="images-btn">
                    <a class="images-up" href=<?= "../uploads/" . $user_id . "/" . $one_img["img_name"]?> download="stazeny_soubor">Stáhnout</a> 
                    <a class="images-de" href="delete_photo.php?id=<?= $user_id ?>&img_name=<?=$one_img["img_name"] ?>">Smazat</a>
                </div>
            </div>
            <?php endforeach; ?>
        </article>
    </section>
</main>

<?php require "../assets/footer.php";?>
</body>
<script src="../js/header.js"></script>
</html>

