<?php
    if(isset($name) && isset($price) && isset($categoryChoice)){
        try {
            include_once 'dbConnection_68.php';
            $db = new DbConnection();

            $insert = "INSERT INTO sefer_price VALUES (NULL, :name, :price, :category)";
            $statement = $db->getDB()->prepare($insert);
            $statement->bindValue(':name', $name);
            $statement->bindValue(':price', $price);
            $statement->bindValue(':category', $categoryChoice);
            $statement->execute();
            if($statement->rowCount() > 0){
                        $inserted = true;
                    }else{
                        $inserted = false;
                    }
        } catch(PDOException $e) {
            die("Something is wrong with your connection " . $e->getMessage()); 
        }
    }
?>