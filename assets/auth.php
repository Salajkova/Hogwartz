<?php

/*
Ověřuje zda je uživatel přihlášený nebo ne
*
* @return boolean true -> pokud je uživatel přihlášený
*/


function isLoggedIn(){
    return isset($_SESSION["is_logged_in"]) && $_SESSION["is_logged_in"];
}