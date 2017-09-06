<?php
include_once "https.php";
if(empty($_POST['userName'])){
    $errors[] = "A valid User Name is required";
}else{
    $userName = $_POST['userName'];
}

if(empty($_POST['password'])){
    $errors[] = "A valid password is required";
}else{
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
}

if(isset($errors)){
    include 'addUserView.php';
}

if(isset($userName) && isset($password)){
    try {
        include_once "dbConnection_72.php";
        $select = "SELECT userName FROM users WHERE userName = :userName";
        $statement = $db->prepare($select);
        $statement->bindValue(':userName', $userName);
        $statement->execute();
        if($statement->rowCount() > 0){
            $errors[] = "the user name you entered has been taken please pick a different one";
            include 'addUserView.php';
            exit;
        }else{
            $insert = "INSERT INTO users VALUES (NULL, :userName, :password)";
            $statement = $db->prepare($insert);
            $statement->bindValue(':userName', $userName);
            $statement->bindValue(':password', $password);
            $statement->execute();
        } 
    } catch(PDOException $e) {
        die("Something is wrong with your connection " . $e->getMessage()); 
    }
    include 'loginView.php';
}
?>        