<?php

/**
 * Připojení k databázi
 * 
 * @return object - pro připojení do databáze 
 */

function connectionDB() {
$db_host = "localhost"; //nebo "127.0.0.1"
$db_user = "root";
$db_password = "salome535";
$db_name = "skola";

$connection = mysqli_connect($db_host, $db_user, $db_password, $db_name);

if (mysqli_connect_error()) {
    echo mysqli_connect_error();
    exit;
}

return $connection;

}

?>