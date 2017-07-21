<?php
    
    $inserted = false;
    if(isset($_POST["name"])){  //so the code only runs if submited 

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

        if(isset($name) && isset($price)){
            include '../models/insertSeferModel_65.php';
        }
    }
    include '../views/insertSeferView_65.php';
?> 