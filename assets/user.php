<?php /**
 * Přidání uživatele do databáze 
 * 
 * @param object $connection -připojení do databáze
 * @param string $first_name - křestní jméno
 * @param string $second_name - příjmení
 * @param string $email - email 
 * @param string $password - heslo 
 * 
 * 
 * @return integer $id - id 
 */
function createUser($connection, $first_name, $second_name, $email, $password) {
    $sql = "INSERT INTO user (first_name, second_name, email, password)
    VALUES (?, ?, ?, ?)";


    $statement = mysqli_prepare($connection, $sql);

    if($statement === false) {
        echo mysqli_error($connection);
    } else {

        mysqli_stmt_bind_param($statement, "ssss", //s=string, i=integer
        $first_name, $second_name, 
        $email, $password);}
    

       mysqli_stmt_execute($statement);
            $id = mysqli_insert_id($connection);
            if(!empty($id)){
            return $id;}
           // echo "Úspěšně vložen žák s id: $id";

            }

