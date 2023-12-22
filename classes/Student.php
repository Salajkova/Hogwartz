<?php

class Student {

// C - create - vytvořit záznam
// R - read - přečíst záznam
// U - update - změnit existující záznam
// D - delete - vymazat záznam

/** Získá jedn  oho žáka z databáze podle id
 * @param object $connection - napojení na databázi
 * @param integer $id - id jednoho konkrétného žáka
 * 
 * @return mixed asociativní pole, které obsahuje informace o jenom konkrétním žákovi nebo null, pokud řák nebyl nalezen. 
 */
//Pokud columns nejsou zadaný doplní se hvězdička
public static function get_student($connection, $id, $columns = "*")  {
    $sql = "SELECT $columns 
    FROM student 
    WHERE id = :id";

    $stmt = $connection->prepare($sql);
    $stmt->bindValue(":id", $id, PDO::PARAM_INT);

    try {
         if($stmt->execute()) {
          return $stmt->fetch();   
        } else {
            throw new Exception("Získání dat o jednom studentovi selhalo!");
        }
    } catch (Exception $e) {
        error_log("Chyba u funkce get student!\n", 3, "../errors/error.log");
        echo "Typů chyby: " . $e->getMessage();
    }

       
    

}


/** Updatuje inforamce o žákovi v databázi
 * 
 * @param object $connection - napojení do databáze
 * @param string $first_name
 * @param string $second_name
 * @param integer $age
 * @param string $life
 * @param string $college
 * @param integer $id
 * 
 * @return boolean true - pokud je updatování žáka úspěšné
 */
public static function update_student($connection, 
$first_name, $second_name, $age, $life, $college, $id) {

    $sql = "UPDATE student
    SET first_name = :first_name, 
        second_name = :second_name, 
        age = :age, 
        life = :life, 
        college = :college
    WHERE id = :id";

    $stmt = $connection->prepare($sql);

   

        $stmt->bindValue(":first_name", $first_name, PDO::PARAM_STR);
        $stmt->bindValue(":second_name", $second_name, PDO::PARAM_STR);
        $stmt->bindValue(":age", $age, PDO::PARAM_INT);
        $stmt->bindValue(":life", $life, PDO::PARAM_STR);
        $stmt->bindValue(":college", $college, PDO::PARAM_STR);
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);

        try{
            
            if($stmt->execute()) {
            return true;
         } else {
            throw new Exception("Update studenta se nepovedl.");
        } 
    } catch (Exception $e) {
            error_log("Chyba při úpravě studenta\n", 3 , "../errors/error.log");
            echo "Typ chyby: " . $e->getMessage();
         }
    
}

/**
 * Vymaže studenta z databáze podle daného id
 * 
 * @param object $connection - propojení s databází
 * @param integer id -> id daného žáka. 
 * 
 * @return bolean true - pokud dojhde k úspěšnému smazání žáka. 
 */
public static function delete_student($connection, $id) {
    $sql = "DELETE FROM student
        WHERE id = :id";

    $stmt = $connection->prepare($sql);
    $stmt->bindValue(":id", $id, PDO::PARAM_INT);

    try {if ($stmt->execute()) {
           return true;
        } else {
            throw new Exception("Vymazání studenta selhalo!");
        }
    } catch (Exception $e) {
            error_log("Chyba při mazání studenta\n", 3 , "../errors/error.log");
            echo "Typ chyby: " . $e->getMessage();

    }
}

/**
 * Funkce na získání všech žáků z databáze
 * 
 * @param object $connection -> připojení do databáze
 * 
 * @return mixed pole objektů, kde každý objekt je jeden žák
 */
public static function getAllStudents ($connection, $columns ="*") {
    $sql = "SELECT $columns FROM student ORDER BY id ASC";

$stmt = $connection->prepare($sql);

try{
    if($stmt->execute()) {
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}else {
    throw new Exception("Chyba při sbírání všech studentů!");
} 
}catch (Exception $e) {
    error_log("Chyba při get all students\n", 3 , "../errors/error.log");
    echo "Typ chyby: " . $e->getMessage();


}
}
/**
 * Přidání žáka do databáze a přesměruje na profil žáka
 * 
 * @param object $connection -připojení do databáze
 * @param string $first_name - křestní jméno
 * @param string $second_name - příjmení
 * @param integer $age - věk žáka
 * @param string $life - podrobnosti o životě
 * @param string $college - kolej žáka
 * 
 * @return int $id - id přidaného žáka
 */
public static function createStudent($connection, $first_name, $second_name, $age, $life, $college) {
    $sql = "INSERT INTO student (first_name, second_name, age, life, college)
    VALUES (:first_name, :second_name, :age, :life, :college)";

    
    $stmt = $connection->prepare($sql);

        $stmt->bindValue(":first_name", $first_name, PDO::PARAM_STR);
        $stmt->bindValue(":second_name", $second_name, PDO::PARAM_STR);
        $stmt->bindValue(":age", $age, PDO::PARAM_INT);
        $stmt->bindValue(":life", $life, PDO::PARAM_STR);
        $stmt->bindValue(":college", $college, PDO::PARAM_STR);
        
  
try {
        if($stmt->execute()) {
            $id = $connection->lastInsertId();
           return $id;

        } else {
            throw new Exception("CHyba při tvoření stuednta!");
        }}
        catch (Exception $e) {
                error_log("Chyba při tvoření studenta\n", 3 , "../errors/error.log");
                echo "Typ chyby: " . $e->getMessage();
        }
        
    }

}

?>


