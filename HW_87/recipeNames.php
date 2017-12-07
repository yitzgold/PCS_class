<?php
require_once "db.php";

$recipeNames = $db->query('SELECT id, name FROM recipes')->fetchAll(PDO::FETCH_ASSOC);
?>