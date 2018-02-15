<?php
    header("Access-Control-Allow-Origin: *");
    try {
        $db = new PDO("mysql:host=localhost;dbname=test", "me", "password", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        $contacts = $db->query('SELECT firstName, lastName, email, phone FROM contacts')->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($contacts);  
    }catch(PDOException $e) {
        die("Something is wrong with your connection " . $e->getMessage()); 
    }
?>