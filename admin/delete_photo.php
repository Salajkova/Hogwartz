<?php

require "../classes/Db.php";
require "../classes/Auth.php";
require "../classes/Image.php";
require "../classes/Url.php";

session_start();

//Ověření zda je uživatel přihlášený
if (!Auth::isLoggedIn()) {
    die("Nepovolený přístup");
}

$db = new Database();
$connection = $db->connectionDB();

$user_id = $_GET["id"]; // získání z Url adresy
$img_name = $_GET["img_name"]; // získání z Url adresy

$path = "../uploads/" . $user_id . "/" . $img_name;

if (Image::deletePhoto($path)) {
    //Smazat obrázek z databáze tam jsme je smazaly jen ze stránky
    Image::deletePhotoDb($connection, $img_name); //zde se musí hodnoty shodovat s tím výše

    Url::redirectUrl("/web/Hogwartz/admin/photos.php");
}