<?php// echo "<br>";
// echo $person ["age"];

//2.lekce

// //logika
// class Book {
//     function __construct($title, $author, $year){
//         $this->title = $title;
//         $this->author = $author;
//         $this->year = $year;
//     }
// }//s velkým písmenem ta class class = DNA; Objekt = RNA

// //použití
// $book_1 = new Book("Harry Potter a Kámen mudrců", "J. K. Rowling", 1997);
// $book_2 = new Book("Harry Potter a Tajemná komnata", "J. K. Rowling", 1998);
// // $book_1 = new Book ();
// $book_2 = new Book ();
// $book_3 = new Book ();

// $book_1->title = "Harry Potter a Kámen mudrců";
// $book_2->author = "J. K. Rowling";
// $book_2->year = 1997;

// $book1 = [
//     "title" => "Harry Potter a Kámen mudrců",
//     "author" => "J.K. Rowling",
//     "year" => "1997"
// ];
// $book2 = [
//     "title" => "Harry Potter a Tajemná komnata",
//     "author" => "J. K. Rowling",
//     "year" => "1998"
// ];
 
// echo $book_2->title;
// echo "<br>";
// echo $book_2->author;
// echo "<br>";
// echo $book_1->year;

// //Úkol
// class Car {
//     function __construct($color, $seats, $brand) {
//         $this->color = $color;
//         $this->brand = $brand;
//         $this->seats = 4;
        
//     }
// }
// $car_1 = new Car ("black", 5, "Toyota");
// $car_2 = new Car ("brown", 4, "Chevrolet");
// $car_3 = new Car ("white", 2, "Porsche");
// $car_4 = new Car ("silver", 5, "škoda");

// echo $car_1->brand;
// echo "<br>";
// echo $car_2->color;
// echo "<br>";
// echo $car_4->brand;
// echo "<br>";
// echo $car_3->seats;


//Cvičení 
class Book {
    function __construct($title, $author, $year, $price) {
        $this->title = $title;
        $this-> author = $author;
        $this->year = $year;
        $this->price = $price;
    }

    function bookDescription(){
        return "Název knihy: " . $this->title . "<br>Auorka: " . $this->author . "<br> Rok vydání: " . $this->year . "<br> Cena: " . $this->price;
    }

    function changePriceAmount($amount) {
       $this->price = $this->price + $amount;
    }

    function changePrice($percent) {
        $this->price = $this->price + ($this->price * $percent/100);
    }
}
$book_1 = new Book("Harry Potter a Kámen mudrců", "J. K. Rowling", 1997, 350);
$book_2 = new Book("Harry Potter a Tajemná komnata", "J. K. Rowling", 1998, 450);
$book_3 = new Book("Harry Potter a Vězeň z Azkabanu", "J. K. Rowling",1999, 550);

// echo $book_3->price;
// echo "<br>";
echo $book_1->price;
echo $book_1->changePrice(-20);
echo $book_1->price;
 echo "<br>";
 echo "<br>";
echo $book_2->bookDescription();
echo "<br>";
echo "<br>";
echo $book_3->bookDescription();
