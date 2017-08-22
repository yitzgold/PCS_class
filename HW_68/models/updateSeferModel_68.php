<?php
include 'dbConnection_68.php';
$db = new DbConnection();
try{
    if(!empty($_POST['hiddenID'])){
        $query = "SELECT id, name, price, category FROM sefer_price WHERE id= :id";   
        $statement = $db->getDB()->prepare($query);
        $statement->bindValue("id", $id);
        $statement->execute();
        $oldSefer = $statement->fetch(PDO::FETCH_ASSOC);
        if(!empty($_POST['name'])){
            $name = $_POST['name'];
        }else{
            $name = $oldSefer['name'];
        }
        if(!empty($_POST['price']) && $_POST['price'] > 0 && is_numeric($_POST['price'])){
            $price = $_POST['price'];    
        }else{
            $price = $oldSefer['price'];
        }
        if(!empty($_POST['category']) && in_array(strtolower($_POST["category"]), $categorys)){
            $category = strtolower($_POST['category']);
        }else{
            $category = $oldSefer['category'];
        }
        $update = "UPDATE sefer_price SET name= :name, price= :price, category= :category WHERE id = :id";
        $statement = $db->getDB()->prepare($update);
        $statement->bindValue(':name', $name);
        $statement->bindValue(':price', $price);
        $statement->bindValue(':category', $category);
        $statement->bindValue(':id', $id);
        $statement->execute();
            if($statement->rowCount() > 0){
                $updated = true;
            }else{
                $updated = false;
            }
    }
    if(isset($id)){
        $query = "SELECT id, name, price, category FROM sefer_price WHERE id= :id";   
        $statement = $db->getDB()->prepare($query);
        $statement->bindValue("id", $id);
        $statement->execute();
        $sefer = $statement->fetch(PDO::FETCH_ASSOC);
    }  
} catch(PDOException $e) {
    die("Something is wrong with your connection " . $e->getMessage()); 
}
?>