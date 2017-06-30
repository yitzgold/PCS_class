<?php
    $languages = [
            "java", "python", "php", "javascript", "sql", "csharp"
        ]; 

    if($_SERVER['REQUEST_METHOD'] === "POST") {

        if(empty($_POST['name'])){
            $errors[] = "Please type your Name";
        }else{
            $name = $_POST['name'];
        }

        if(empty($_POST['years'])){
            $errors[] = "Please type the number of years you have been coding";
        }elseif(($_POST['years']) < 0 || ($_POST['years']) > 50 || !is_numeric($_POST['years'])){
            $errors[] = "Please give a proper number of years from 0 - 50";
        }else{
            $years = $_POST['years'];
        }

        if(empty($_POST['language'])){
            $errors[] = "Please type the language(s) you code in";
        }else{
            $arrayPieces = explode(",",strtolower(str_replace(' ', '', $_POST['language'])));
            if(!empty(array_diff($arrayPieces, $languages))){
                $errors[] = "Please type valid language(s)";
            }else{
                $language = $_POST['language'];
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
    <!--<link rel="stylesheet" href="/bootstrap-3.3.7-dist/css/bootstrap.min.css">-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" 
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <title>form_59.php</title>
</head>
<body>
    <div class="container">
        <form class="form-horizontal" method="post">

            <?php if (isset($errors)) : ?>
            <div class="well text-danger">
                <ul>
                    <?php foreach($errors as $error) : ?>
                        <li><?= $error ?></li>
                    <?php endforeach ?>
                </ul>
            </div>
            <?php endif ?>

            <?php if (isset($name, $years, $language)) : ?>
            <div class="well text-success">
                <h1 class="text-center"><?="Thanks for submitting your data!"?></h1>
            </div>
            <?php endif ?>

            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="name" placeholder="name" required
                        <?php if(isset($name)){echo "value=$name";}?>
                    >
                </div>
            </div>

            <div class="form-group">
                <label for="years" class="col-sm-2 control-label">Years Coding</label>
                <div class="col-sm-10">
                    <input type="number" min="0" max="50" class="form-control" id="years" name="years" placeholder="years" required
                        <?php if(isset($years)){echo "value=$years";}?>
                    >
                </div>
            </div>

            <div class="form-group">
                <label for="language" class="col-sm-2 control-label">Favorite Programming Language(s)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="language" name="language" placeholder="language" required
                        <?php if(isset($language)){echo "value=" . str_replace(' ', '', $language);}?>
                    >
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">Register</button>
                </div>
            </div>
            
        </form>
    </div> 
</body>
</html>

