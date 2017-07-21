<?php
    include '../dbConnection_65.php';

    try{
        if(isset($id)){
            $delete = "DELETE FROM sefer_price WHERE id = :id";
            $statement = $db->prepare($delete);
            $statement->bindValue(':id', $id);
            $statement->execute();
                if($statement->rowCount() > 0){
                    $deleted = true;
                }else{
                    $deleted = false;
                }
        }

        $seforim = $db->query('SELECT id, name FROM sefer_price')->fetchAll(PDO::FETCH_ASSOC);

    } catch(PDOException $e) {
        die("Something is wrong with your connection " . $e->getMessage()); 
    }

?>