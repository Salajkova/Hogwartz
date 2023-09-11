<?php

require "url.php";

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
function get_student($connection, $id, $columns = "*")  {
    $sql = "SELECT $columns 
    FROM student 
    WHERE id = ?";

    $stmt = mysqli_prepare($connection, $sql);

    if($stmt === false) {
        echo mysqli_error($connection);
    } else {
        mysqli_stmt_bind_param($stmt, "i", $id);

        if(mysqli_stmt_execute($stmt)) {
          $result = mysqli_stmt_get_result($stmt);
          return mysqli_fetch_array($result, MYSQLI_ASSOC);      
        } 
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
 * @return void 
 */
function update_student($connection, 
$first_name, $second_name, $age, $life, $college, $id) {

    $sql = "UPDATE student
    SET first_name = ?, 
        second_name = ?, 
        age = ?, 
        life = ?, 
        college = ?
    WHERE id = ?";

    $stmt = mysqli_prepare($connection, $sql);

    if (!$stmt) {
        echo mysqli_error($connection);
    } else {
        mysqli_stmt_bind_param($stmt, "ssissi", 
        $first_name, $second_name, $age, $life, $college, $id);

        if(mysqli_stmt_execute($stmt)) {

            // redirectUrl("/HPHP/ww2dat/onestudent.php?id=$id"); nevím, proč mi to nemůže najít tu stránku s url.php 125...
            redirectUrl("/web/Hogwartz/admin/onestudent.php?id=$id");
         }
    }
}

/**
 * Vymaže studenta z databáze podle daného id
 * 
 * @param object $connection - propojení s databází
 * @param integer id -> id daného žáka. 
 * 
 * @return void
 */
function delete_student($connection, $id) {
    $sql = "DELETE from student
        WHERE id = ?";

    $stmt = mysqli_prepare($connection, $sql);

    if (!$stmt) {
        echo mysqli_error($connection);
    } else {
        mysqli_stmt_bind_param($stmt, "i", $id);

        if (mysqli_stmt_execute($stmt)) {
            redirectUrl("/web/Hogwartz/admin/students.php");//bude tohle fungovat? Fungoje to!!!!
        }
    }
}

/**
 * Funkce na získání všech žáků z databáze
 * 
 * @param object $connection -> připojení do databáze
 * 
 * @return mixed pole objektů, kde každý objekt je jeden žák
 */
function getAllStudents ($connection, $columns ="*") {
    $sql = "SELECT $columns FROM student ORDER BY id ASC";


$result = mysqli_query($connection, $sql);

$students = mysqli_fetch_all($result, MYSQLI_ASSOC);
return $students;
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
 * @return 
 */
function createStudent($connection, $first_name, $second_name, $age, $life, $college) {
    $sql = "INSERT INTO student (first_name, second_name, age, life, college)
    VALUES (?, ?, ?, ?, ?)";

    $statement = mysqli_prepare($connection, $sql);

    if($statement === false) {
        echo mysqli_error($connection);
    } else {

        mysqli_stmt_bind_param($statement, "ssiss", //s=string, i=integer
        $first_name, $second_name, 
        $age, $life, $college);
    

        if(mysqli_stmt_execute($statement)) {
            $id = mysqli_insert_id($connection);
            redirectUrl("/web/Hogwartz/admin/onestudent.php?id=$id");
           // echo "Úspěšně vložen žák s id: $id";

        } else {
                echo mysqli_stmt_error($statement);
        }
    }

}

?>