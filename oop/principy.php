<?php
// Abstrakce
// není to moc konkrétní. Vytváří a definuje objekty. Vynechání nepodstatných detailů. Nadřazená jednotka, z které dědí funkce children. 

// Dědičnost extends

// Polymorfismus -> změna obsahu nebo přidání obsahu k původnímu parentovi v children. 

// Zapouzdření 

//Protected -> přístupné v hlavní kláse i v children. /Private /Public


class Account {
    private $pin;

    function __construct($first_name, $second_name, $pin) {
        $this->first_name = $first_name;
        $this->second_name = $second_name;
        $this->pin = $pin;
    }

    function create_account() {
    }

    function create_expense() {
    }

    static function description() {
        echo "Na vašem účtu je XY ,-Kč";
    }
}

class Bankaccount extends Account{
}

class Saveaccount extends Account{
}

class Businessaccount extends Account{
//  function description(){
//     echo parent:: description(). " Podnikatelé vítání";
//  }
 }

$account1 = new Bankaccount("David", "Šetek", 1234);
$account1->description();
echo"<br>";
$account2 = new Businessaccount("Harry", "Potter", 4567);
$account2->description();

Account::description();