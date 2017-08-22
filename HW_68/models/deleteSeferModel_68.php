<?php
    if(isset($deleteID)){
        include_once 'dbConnection_68.php';
        $db = new DbConnection();
        try{
            $delete = "DELETE FROM sefer_price WHERE id = :id";
            $statement = $db->getDB()->prepare($delete);
            $statement->bindValue(':id', $deleteID);
            $statement->execute();
                // if($statement->rowCount() > 0){
                //     $deleted = true;
                // }else{
                //     $deleted = false;
                // }
        } catch(PDOException $e) {
            die("Something is wrong" . $e->getMessage()); 
        }
    }
?>