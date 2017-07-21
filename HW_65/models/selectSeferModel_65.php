<?php
    include '../dbConnection_65.php';

    try{
        $seforim = $db->query('SELECT name FROM sefer_price')->fetchAll(PDO::FETCH_COLUMN, 0);
        $options = "";
        foreach ($seforim as $sefer) {
            $options .= '<option value="'. strtolower($sefer).'">'.  $sefer . '</option>';
        }

        if(isset($name)){
            $query = "SELECT price FROM sefer_price WHERE name= :name";
            $statement = $db->prepare($query);
            $statement->bindValue(':name', $name);
            $statement->execute();
            $price = $statement->fetch();
            if($statement->rowCount() > 0){
                    $gotSefer = true;
                }else{
                    $gotSefer = false;
                }
        }
    } catch(PDOException $e) {
        die("Something is wrong" . $e->getMessage()); 
    }

    
?>
