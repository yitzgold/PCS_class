<?php
    include 'controllers/categorys.php';
    if(!empty($_POST['updateID'])){
        $id = $_POST['updateID'];   
    }
    if(!empty($_POST['hiddenID'])){
        $id = $_POST['hiddenID'];   
    }
    if(!empty($_POST['categoryFilter'])){
        $categoryFilter = $_POST['categoryFilter'];   
    }
    include 'models/updateSeferModel_68.php';
    include 'views/updateSeferView_68.php';
?>