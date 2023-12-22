<?php

require "../classes/Db.php";
require "../classes/Auth.php";
require "../classes/Url.php";
require "../classes/User.php";
require "../classes/Image.php";

session_start();

error_reporting(E_ALL);
ini_set('display_errors', '1');

//Ověřená zda je uživatel přihlášený
if( !Auth::isLoggedIn()) {
    die("Nepovolený přístup!");
}

$user_id = $_SESSION["logged_in_user_id"]; 

if(isset($_POST["submit"]) && isset($_FILES["image"])) {
    
    $db = new Database();
    $connection = $db->connectionDB();

    var_dump($_FILES["image"]);

    $img_name = $_FILES["image"]["name"];
    $image_size = $_FILES["image"]["size"];
    $image_tmp_name = $_FILES["image"]["tmp_name"];
    $error = $_FILES["image"]["error"];


    if ($error === 0){
        if($image_size > 9000000){
           Url::redirectUrl("/web/Hogwartz/errors/error-page.php?error_text=Váš soubor je příliš velký");
        } else {
            $image_extension = pathinfo($img_name, PATHINFO_EXTENSION);
            $image_extension_lower_case = strtolower($image_extension);

            $allowed_extensions = ["jpg", "jpeg", "png", "bmp", "webp"];
            
            if(in_array($image_extension_lower_case, $allowed_extensions)) {
                    //sestavujeme unikátní název obrázku
                    $new_img_name = uniqid("IMG-", true) . "." . $image_extension;

                    if(!file_exists("../uploads/" . $user_id)){
                     mkdir("../uploads/" . $user_id, 0777, true);
                    }

                    $img_upload_path = "../uploads/" . $user_id . "/" . $new_img_name;
                    move_uploaded_file($image_tmp_name, $img_upload_path);


                    //vložení obrázku do databáze
                    if(Image::insertImage($connection, $user_id, $new_img_name)){
                        Url::redirectUrl("/web/Hogwartz/admin/photos.php");
                    }

                    

            }else {
                Url::redirectUrl("/web/Hogwartz/errors/error-page.php?error_text=koncovka vašeho souboru není povolená!");
            }
        }

    }else{
        Url::redirectUrl("/web/Hogwartz/errors/error-page.php?error_text=Vložit obrázek se nepovedlo!");
    }
} // Nefunugje mi to vytvoření nové složky pro týpka. Musím se na to ještě podívat..A kde je ta fotka?
//Vytvoření tabulky v databázi 262
?>