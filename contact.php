
<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/PHPMailer/src/Exception.php';
require 'vendor/PHPMailer/src/PHPMailer.php';
require 'vendor/PHPMailer/src/SMTP.php';

$first_name = "";
$second_name = "";
$email = "";
$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $first_name = $_POST["first_name"];
    $second_name = $_POST["second_name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    $errors = [];

    if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
        $errors[] = "Prosím vyplňte platný email.";
    }

if(empty($erros)){
    $mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;

    $mail->CharSet = "UTF-8";
    $mail->Encoding = "base64";
    $mail->Username = "mail0@gmail.com";
    $mail->Password = "vkuqpjupojogs";//Přístup přes další aplikace video 310
    $mail->SMTPSecure = "ssl";
    $mail->Port = 465;

    $mail->setFrom("mail@gmail.com"); //Od koho je
    $mail->addAddress("mail@gmail.com"); //Kam to jde
    $mail->Subject = "Zažádací dopis o...";
    $mail->Body = "Jméno: {$first_name} {$second_name} \n Email:{$email} \n Zpráva: {$message}";

    $mail->send();

    echo "zpráva odeslána";

} catch (Exception $e) {
      echo "Zpráva nebyla odeslána: ", $mail->ErrorInfo;
}

}
}

?>

<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/header.css">
            <link rel="stylesheet" href="./css/general.css">
            <script src="https://kit.fontawesome.com/f3c1d6cf9d.js" crossorigin="anonymous"></script>
            <link rel="stylesheet" href="./query/header-query.css">
            <link rel="stylesheet" href="./css/footer.css">
            <link rel="stylesheet" href="css/contact.css">
            
    <title>Document</title>
</head>
<body>
<?php require "assets/header.php"; ?>

<main>
 
   
    <section class="form">
        <form action="contact.php" method="POST">
            
            <input type="text" name="first_name" required placeholder="Křestní jméno" value=<?= $first_name; ?> > <br>
            <input type="text" name="second_name" required placeholder="Příjmení" value=<?= $second_name; ?> > <br>
            <input type="email" name="email" required placeholder="Email" value=<?= $email; ?> > <br>
            
            <textarea name="message" placeholder="Vaše zpráva"  required><?= $message; ?></textarea> <br>
            
            <button>Odeslat dotaz</button>

        </form>
    </section>
</main>
<?php require "assets/footer.php"?>
</body>
<script src="./js/header.js"></script>
</html>