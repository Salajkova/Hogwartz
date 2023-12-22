<?php

class Database {


 public function connectionDB() {
    $db_host = "localhost"; //nebo "127.0.0.1" 
    $db_user = "zde";
    $db_password = "salome535"; 
    $db_name = "skola";
   
    
    $connection = "mysql:host=" . $db_host . ";dbname=" . $db_name .";charset=utf8"; 

    try {
        $db = new PDO($connection, $db_user, $db_password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    } catch (PDOException $e) {
        echo $e->getMessage();
        exit(); 

    }
    
     }
}
    
    ?>
