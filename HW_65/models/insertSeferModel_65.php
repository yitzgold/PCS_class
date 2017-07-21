<?php
    try {
        include '../dbConnection_65.php';

        $insert = "INSERT INTO sefer_price VALUES (NULL, :name, :price)";
        $statement = $db->prepare($insert);
        $statement->bindValue(':name', $name);
        $statement->bindValue(':price', $price);
        $statement->execute();
        if($statement->rowCount() > 0){
                    $inserted = true;
                }else{
                    $inserted = false;
                }
    } catch(PDOException $e) {
        die("Something is wrong with your connection " . $e->getMessage()); 
    }

?>