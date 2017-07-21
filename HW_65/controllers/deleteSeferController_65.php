<?php
    if(isset($_POST['sefer'])){
        $values = explode(':', $_POST['sefer']);
        $id = isset($values[0]) ? $values[0] : null;
        $seferName = isset($values[1]) ? $values[1] : null;
    }

    include '../models/deleteSeferModel_65.php';
    include '../views/deleteSeferView_65.php';
?>