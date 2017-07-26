<?php
    include 'dbConnection_66.php';

    try{
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
        $options = "";
        foreach ($seforim as $sefer) {
            $options .= '<option value="'. strtolower($sefer['id']).'">'.  $sefer['name'] . '</option>';
        }

        if(isset($id)){
            $query = "SELECT name, price, category FROM sefer_price WHERE id= :id";
            $statement = $db->prepare($query);
            $statement->bindValue(':id', $id);
            $statement->execute();
            $seferInfo = $statement->fetch(PDO::FETCH_ASSOC);
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
