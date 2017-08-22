<?php

class DbConnection{
    private $db;

    public function __construct() {
        try {
            $this->db = new PDO("mysql:host=localhost;dbname=seforim", "me", "password", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        }catch(PDOException $e) {
            die("Something is wrong with your connection " . $e->getMessage()); 
        }
    }

    public function getDB() {
      return $this->db;
    }
 }


    

//     try {
//         $db = new PDO("mysql:host=localhost;dbname=seforim", "me", "password", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
//     }catch(PDOException $e) {
//         die("Something is wrong with your connection " . $e->getMessage()); 
//     }
    
?>