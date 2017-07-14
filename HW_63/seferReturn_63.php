<?php

    if(!empty($_GET['name'])){

        $name = $_GET['name'];
        try {
        $db = new PDO("mysql:host=localhost;dbname=seforim", "root", "", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

        $query = "SELECT price FROM sefer_price WHERE name= :name";
        $statement = $db->prepare($query);
        $statement->bindValue(':name', $name);
        $statement->execute();
        $selectedSefer = $statement->fetch();

        if(!$selectedSefer){
            die("you selected an invalid Sefer <!DOCTYPE html><br/><a href='seforim_63.php'>Try again</a>");
        }
        } catch(PDOException $e) {
            die("Something is wrong with your connection " . $e->getMessage());
        }

    }else{
        die("Please enter the name of the Sefer you want to ckeck up <!DOCTYPE html><br/><a href='seforim_63.php'>Try again</a>");
    }
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--<link rel="stylesheet" href="/bootstrap-3.3.7-dist/css/bootstrap.min.css">-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" 
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <title>Document</title>
    <style>
        header em{
            color: red;
        }
    </style>
</head>
<body>
    <div class="container">
        <header class="jumbotron text-center">
            <h1>The price of a  <em><?= $name ?></em> is <em> $<?= $selectedSefer['price'] ?></em></h1>
        </header>
    </div>
</body>
</html>