<?php
    include 'controllers/categorys.php';
    if(!empty($_GET['category']) && in_array($_GET['category'], $categorys)){ 
        $categoryFilter = $_GET['category']; 
    }else{
        $categoryFilter = "all"; 
    }
    if(!empty($_POST['deleteID'])){
        echo "here";
        $deleteID = $_POST['deleteID'];
        include 'models/deleteSeferModel_68.php';
    }
    include 'models/homeSeforimModel_68.php';
    include 'views/homeSeforimView_68.php';
?>