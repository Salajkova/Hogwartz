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

            /*
               * Ověření uživatele pomocí emailu a hesla.       
               * @param object $connection - připojení do databáze
               * @param string $log_email - email z formuláře pro přihlášení
               * @param string $log_password - heslů z formuláře pro přihlášení
               * 
               * @return boolean true - pokud je přihlášení úspěšné
               * 
            **/
            function authentication($connection, $log_email, $log_password) {
                $sql = "SELECT password 
                    FROM user
                    WHERE email = ?";
                
                $stmt = mysqli_prepare($connection, $sql);
                
                if($stmt) {
                    mysqli_stmt_bind_param($stmt, "s", $log_email);
                
                    if(mysqli_stmt_execute($stmt)){
                          $result = mysqli_stmt_get_result($stmt);
                          //var_dump($result);

                          if($result->num_rows != 0){
                          $password_db = mysqli_fetch_row($result);//zde je v proměnné pole
                          $user_password_db = $password_db[0]; //zde je v přoměnné string
                
                          if($user_password_db) {
                           return password_verify($log_password, $user_password_db);
                          }
                        } else {
                            echo "Chyba při zadávání emailu";
                        }
                        }
                    } else {
                        echo mysqli_error($connection);
                    }
                }

/*
*Získání ID uživatele
*
*@param object $connection - připojení do databáze
*@param string $email
*@return int ID uživatele
*/
function getUserId ($connection, $email){
    $sql = "SELECT id FROM user
    WHERE email = ?";

    $stmt = mysqli_prepare($connection, $sql);

    if($stmt){
        mysqli_stmt_bind_param($stmt, "s", $email);
        
        if(mysqli_stmt_execute($stmt)) {
            $result = mysqli_stmt_get_result($stmt);
            $id_db = mysqli_fetch_row($result); //pole
            $user_id = $id_db[0];

            return $user_id;
        }

    } else {
        echo mysqli_error($connection);

    }
}