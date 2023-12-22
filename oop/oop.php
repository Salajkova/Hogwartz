<?php

// 4 principy
// Zapouzdření (encapsulation)
// private -> soukromé (jen  uvnitř class), public -> přístupné z venčí. 

// Abstrakce (abstraction)
// Dědičnost (inheritance)
// Polymorfismus (polymorfism)


//logika
class Bankaccount {
    private $pin;
    public $first_name;
    public $second_name;
    public $income;
    public $expense;
    public $movements;

    function __construct($first_name, $second_name, $pin) {
        $this->first_name = $first_name;
        $this->second_name = $second_name;
        $this->pin = $pin;
        $this->income = 0;
        $this->expense = 0; //nastavení počáteční na 0
        $this->movements = [];
    }

    function pin_checker($user_pin){
    if ($user_pin !== $this->pin){
        header("Location: wrongpin.php");
        exit();
    }
    }

    function create_income($amount){
        $this->income += $amount;
        $this->add_movement($amount);
        
    }

    function create_expense ($amount){
        $this->expense += $amount; //určitě tam má být +
        $this->add_movement($amount);
        
    }

    function add_movement($money) {
        $this->movements[] = $money;

    }
}

//použití
$account1 = new Bankaccount("David", "Šetek",1234);

 echo $account1-> income;
echo "<br>";
$account1->create_income(700);
 echo "<br>";
 echo $account1-> income;
echo "<br>";
 echo $account1->expense;
 echo "<br>";
  $account1->create_expense(-400);
 echo "<br>";
 echo $account1->expense;

 $account1->create_income(350);
 echo "<br>";
 echo $account1-> income;
// echo "<br>";
// echo "<br>";
// echo $account1->pin;

$account1->pin_checker(1234);