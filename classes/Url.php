<?php


class Url {


/**
 * Přesměrovává za zadanou URL adresu
 * Nefunguje mi to 
 * 
 * @param string $path - cesta kam se přesměrovává
 * @return void
 */
public static function redirectUrl($path) {
    if(isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] != "off") {
        $url_protocol = "https";
       } else {
        $url_protocol = "http";
       } 

        header("Location: $url_protocol://" . $_SERVER["HTTP_HOST"] . $path);
}

}