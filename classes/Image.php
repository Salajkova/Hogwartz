<?php

class Image {

    public static function insertImage($connection, $user_id, $img_name) {
        $sql = "INSERT INTO img (user_id, img_name)
            VALUES (:user_id, :img_name)";

        $stmt = $connection->prepare($sql);

        $stmt->bindValue(":user_id", $user_id, PDO::PARAM_INT);
        $stmt->bindValue(":img_name", $img_name, PDO::PARAM_STR);

        if($stmt->execute()) {
            return true;
        }
    }


    public static function getImagesByUserId($connection, $user_id) {

        $sql = "SELECT img_name 
                FROM img
                WHERE user_id = :user_id";

        $stmt = $connection->prepare($sql);

        $stmt->bindValue(":user_id", $user_id, PDO::PARAM_INT);
        
        $stmt->execute();
        

        $images = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $images;
    }

    public static function deletePhoto($path) {
        try {
            //Kontrola existence souboru
            if(!file_exists($path)){
                throw new Exception("Soubor neexistuje, nemůže být smazán");
            }
            //Smazání souboru
            if(unlink($path)){
                return true;
            } else {
                throw new Exception("Při mazání souboru došlo k chybě");
            }
        } catch (Exception $e) {
            echo "Chyba: " . $e->getMessage();

        }
    }

    public static function deletePhotoDb($connection, $img_name) {
        $sql = "DELETE FROM img
            WHERE img_name = :img_name";

            $stmt = $connection->prepare($sql);

            try {
                $stmt->bindValue(":img_name", $img_name, PDO::PARAM_STR);

                if(!$stmt->execute()) {
                    throw new Exception("Nepovedlo se smazání");
                }
            } catch(Exception $e){
                echo "Chyba" . $e->getMessage();
            }
            
        
    }


}