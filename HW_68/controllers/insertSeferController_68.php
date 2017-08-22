<?php
    include 'controllers/categorys.php';
    
    $inserted = false;
    if(isset($_POST["name"])){
        if(empty($_POST["name"])){
            $errors[] = "Sefer Name is required";
        }else{
            $name = strtolower($_POST["name"]);
        }
        if(empty($_POST["price"]) || !is_numeric($_POST["price"]) || $_POST["price"] < .1){
            $errors[] = "A valid Price is required";
        }else{
            $price = $_POST["price"];
        }
        if(empty($_POST["category"]) || !in_array(strtolower($_POST["category"]), $categorys)){
            $errors[] = "A valid Category is required";
        }else{
            $categoryChoice = strtolower($_POST["category"]);
        }

        if(isset($name) && isset($price) && isset($categoryChoice)){
            include 'models/insertSeferModel_68.php';
        }
    }
    include 'views/insertSeferView_68.php';
?> 