<?php
    include 'categorys.php';

    if(!empty($_GET['category'])){ 
        $categoryFilter = $_GET['category']; 
    }
    if(isset($_POST['sefer'])){
        $values = explode(':', $_POST['sefer']);
        $id = isset($values[0]) ? $values[0] : null;
        $seferName = isset($values[1]) ? $values[1] : null;
    }

    include 'models/deleteSeferModel_66.php';
    include 'views/deleteSeferView_66.php';
?>