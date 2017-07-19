<?php

    if(!empty($_GET['name'])){

        $name = $_GET['name'];
        try {
        include 'dbConnection.php';
        $query = "SELECT price FROM sefer_price WHERE name= :name";
        $statement = $db->prepare($query);
        $statement->bindValue(':name', $name);
        $statement->execute();
        $selectedSefer = $statement->fetch();

        if(!$selectedSefer){
            die("you selected an invalid Sefer <!DOCTYPE html><br/><a href='seforim_64.php'>Try again</a>");
        }
        } catch(PDOException $e) {
            die("Something is wrong with your connection " . $e->getMessage());
        }

    }else{
        die("Please enter the name of the Sefer you want to ckeck up <!DOCTYPE html><br/><a href='seforim_64.php'>Try again</a>");
    }
    include 'htmlTop.html';
?>

        <header class="jumbotron text-center">
            <h1>The price of a  <em><?= $name ?></em> is <em> $<?= $selectedSefer['price'] ?></em></h1>
        </header>
    </div>
</body>
</html>