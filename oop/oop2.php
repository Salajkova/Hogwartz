<?php

class Bankaccount {
    private $pin;
    private $balance; //zůstatek na účtu, nechceme aby ho někdo měnil, ale chceme ho ukázat tomu uživateli. -> Getter
    function __construct($first_name, $second_name, $pin) {
        $this->first_name = $first_name;
        $this->second_name = $second_name;
        $this->pin = $pin;
        $this->balance = 500;
    }
    
    //Setter
    public function setPin($user_pin){
        if(strlen(strval($user_pin)) === 4 ) {
        $this->pin = $user_pin;
        }else {
            throw new Exception("Neplatný pin");
        }
    }

    // Getter
    public function getBalance(){
        return $this->balance;
    }
}

//Použití
$account = new Bankaccount("David", "Šetek", 794);
//echo $account->pin;
echo $account->getBalance();
