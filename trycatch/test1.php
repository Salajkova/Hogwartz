<?php 
//Chyba a vyjímka


//Synztaktická chyba -> chybí středník. nebo závorka atd..

//Výjimka = Exception (superchyba). Neočekávanaá výjimečná situace. Např. neexistující soubor. ale kód je správný

function string_length($str, $min_length) {
if(strlen($str) <$min_length){

}
return true;
}



try {
string_length("sup", 5);
echo "Délka vašeho textu je v pořádku";
} catch (Exception $e) {
    echo $e->getMessage();
}