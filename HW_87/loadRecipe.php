<?php

if(! empty($_GET["id"])) {
    $id = $_GET["id"];
}else {
    http_response_code(400);
    exit("Id is required");
}

require_once "db.php";

$query = ('SELECT * FROM recipes WHERE id = :id');
$statement = $db->prepare($query);
$statement->bindParam("id", $id);
$statement->execute();
$recipe = $statement->fetchAll(PDO::FETCH_ASSOC);
if(!$recipe) {
    http_response_code(500);
    exit("Unable to get recipe");
}

echo json_encode($recipe);  
?>