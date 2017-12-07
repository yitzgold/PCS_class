<?php

try {
    $db = new PDO("mysql:host=localhost;dbname=test", "me", "password", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

}catch(PDOException $e) {
    die("Something is wrong with your connection " . $e->getMessage()); 
}

?>