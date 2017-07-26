<?php
    include 'dbConnection_66.php';

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
        $query = "SELECT id, name FROM sefer_price";
            if(!empty($categoryFilter) && $categoryFilter != "all") {
                $query .= " WHERE category = :categoryFilter";
            }
        $statement = $db->prepare($query);
            if (!empty($categoryFilter) && $categoryFilter != "all") { 
                $statement->bindValue('categoryFilter', $categoryFilter);
            }
        $statement->execute();
        $seforim = $statement->fetchAll(PDO::FETCH_ASSOC);
        
        //$seforim = $db->query('SELECT id, name FROM sefer_price')->fetchAll(PDO::FETCH_ASSOC);

    } catch(PDOException $e) {
        die("Something is wrong with your connection " . $e->getMessage()); 
    }

?>