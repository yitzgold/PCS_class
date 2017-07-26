<?php
    include 'categorys.php';
    
    if(!empty($_GET['id'])){ 
        $id = $_GET['id']; 
    }
    if(!empty($_GET['category'])){ 
        $categoryFilter = $_GET['category']; 
    }
   
    include 'models/selectSeferModel_66.php';

    include 'views/selectSeferView_66.php';
?>
