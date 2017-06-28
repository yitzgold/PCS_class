<?php
    if(empty($_POST['name'])){
        $errors[] = "Please type your Name";
    }else{
        $name = $_POST['name'];
    }
    if(empty($_POST['email'])){
        $errors[] = "Please give your Email";
    }else{
        $email = $_POST['email'];
    }
    if(empty($_POST['age']) || ($_POST['age']) <0 || ($_POST['age']) >120 || !is_numeric($_POST['age']) ){
        $errors[] = "Please give a proper Age from 0 - 120";
    }else{
        $age = $_POST['age'];
    }
    if(!empty($_POST['rating']) && is_numeric($_POST['rating']) && ($_POST['rating'])>0 && ($_POST['rating'])<11){
        $rating = $_POST['rating'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" 
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <?php if (isset($errors)) : ?>
            <div class="well text-danger">
                <ul>
                    <?php foreach($errors as $error) : ?>
                        <li><?= $error ?></li>
                    <?php endforeach ?>
        <?php endif ?>
                </ul>
            </div>

            <div>
                <div class="col-sm-2 text-right">Name</div>
                <div class="col-sm-10 well"><?php if(isset($name)){echo $name;}?></div>
            </div>

            <div>
                <div class="col-sm-2 text-right">Email</div>
                <div class="col-sm-10 well"><?php if(isset($email)){echo $email;}?></div>
            </div>

            <div>
                <div class="col-sm-2 text-right">Age</div>
                <div class="col-sm-10 well"><?php if(isset($age)){echo $age;}?></div>
            </div>

            <div>
                <div class="col-sm-2 text-right">Rating</div>
                <div class="col-sm-10 well"><?php if(isset($rating)){echo $rating;}?></div>
            </div>
    </div>    
</body>
</html>


