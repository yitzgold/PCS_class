<?php
    $inserted = false;
    if(isset($_POST["name"])){  //so the code only runs if submited 

        if(empty($_POST["name"])){
            $errors[] = "Sefer Name is required";
        }else{
            $name = $_POST["name"];
        }
        if(empty($_POST["price"]) || !is_numeric($_POST["price"])){
            $errors[] = "A valid Price is required";
        }else{
            $price = $_POST["price"];
        }

        if(isset($name) && isset($price)){
            try {
                $db = new PDO("mysql:host=localhost;dbname=seforim", "me", "password", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
                
                $insert = "INSERT INTO sefer_price VALUES (NULL, :name, :price)";
                $statement = $db->prepare($insert);
                $statement->bindValue(':name', $name);
                $statement->bindValue(':price', $price);
                $inserted = $statement->execute();

            } catch(PDOException $e) {
                die("Something is wrong with your connection " . $e->getMessage()); 
            }
        }
    }
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" 
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> -->
    <title>Document</title>
</head>
<body>
    <div class="container">
        <header class="jumbotron text-center">
            <h1>Add a sefer</h1>
        </header>

        <?php if(isset($errors)) : ?>
            <div class="alert alert-danger text-center">
            <?php foreach($errors as $error) : ?>
                <h3><?= $error ?></h3> 
            <?php endforeach ?>
            </div>
        <?php endif ?>

        <form class="form-horizontal" method="post">

             <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Sefer Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Sefer" xrequired
                        <?php if(isset($_POST['name'])){echo "value=" . $_POST['name'];}?>
                    >
                </div>
            </div>

            <div class="form-group">
                <label for="price" class="col-sm-2 control-label">price</label>
                <div class="col-sm-10">
                    <input type="xnumber" class="form-control" id="price" name="price" placeholder="Price" xrequired
                        <?php if(isset($_POST['price'])){echo "value=" . $_POST['price'];}?>
                    >
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">insert</button>
                </div>
            </div>

        </form>

        <?php if($inserted) : ?>
            <div class="well text-center">
                <h2>You have successfully Inserted your Sefer</h>
            </div>
        <?php endif ?>
        
    </div>
</body>
</html>