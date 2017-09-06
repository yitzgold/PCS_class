<?php
include_once "https.php";
include_once 'session.php';

if(empty($_POST['userName'])){
    $errors[] = "A valid User Name is required";
}else{
    $userName = $_POST['userName'];
}

if(empty($_POST['password'])){
    $errors[] = "A valid password is required";
}else{
    $password = $_POST['password'];
}

if(isset($userName) && isset($password)){
    try {
        include_once "dbConnection_72.php";

        $select = "SELECT * FROM users WHERE userName = :userName";
        $statement = $db->prepare($select);
        $statement->bindValue(':userName', $userName);
        $statement->execute();
        $user = $statement->fetch(PDO::FETCH_ASSOC);
        if($statement->rowCount() < 1){
            $errors[] = "Wrong User Name";
            include 'loginView.php';
            exit;
        }
       
        if(password_verify($password, $user['password'])){
            $_SESSION['loggedIn'] = true;
            include "home.php";
        }else{
            $errors[] = "Wrong password";
        }
        
    } catch(PDOException $e) {
        die("Something is wrong with your connection " . $e->getMessage()); 
    }
}
if(isset($errors)){
    include 'loginView.php';
}
?>
      