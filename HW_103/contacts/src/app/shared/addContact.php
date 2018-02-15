<?php
header("Access-Control-Allow-Origin: *");
Header("Access-Control-Allow-Methods", "GET,HEAD,OPTIONS,POST,PUT");

$contact = json_decode($_POST['contact']);

$firstName = $contact->firstName;
$lastName = $contact->lastName;
$email = $contact->email;
$phone = $contact->phone;

try {
    $db = new PDO("mysql:host=localhost;dbname=test", "me", "password", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    
    $query = "INSERT INTO contacts (firstName, lastName, email, phone) 
                VALUES (:firstName, :lastName, :email, :phone)";
    $statement = $db->prepare($query);
    $statement->bindParam("firstName", $firstName);
    $statement->bindParam("lastName", $lastName);
    $statement->bindParam("email", $email);
    $statement->bindParam("phone", $phone);
    $rowsInserted = $statement->execute();
    if(!$rowsInserted) {
        http_response_code(500);
        exit("Unable to add contact");
    }
    http_response_code(201);
    echo json_encode($db->lastInsertId());
}catch(PDOException $e) {
    die("Something is wrong with your connection " . $e->getMessage()); 
}
?>

