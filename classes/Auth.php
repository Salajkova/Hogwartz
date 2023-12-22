<?php 
class Auth {
/*
Ověřuje zda je uživatel přihlášený nebo ne
*
* @return boolean true -> pokud je uživatel přihlášený
*/

public static function isLoggedIn(){
    return isset($_SESSION["is_logged_in"]) && $_SESSION["is_logged_in"];
}


}