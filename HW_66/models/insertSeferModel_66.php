<?php
    if(isset($name) && isset($price) && isset($categoryChoice)){
        try {
            include 'dbConnection_66.php';

            $insert = "INSERT INTO sefer_price VALUES (NULL, :name, :price, :category)";
            $statement = $db->prepare($insert);
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