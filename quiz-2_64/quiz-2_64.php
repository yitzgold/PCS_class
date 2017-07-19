<?php

     try {
        $db = new PDO("mysql:host=localhost;dbname=school1", "me", "password", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        
        //if submited do this first so deleted student wont show up on table when it reloads
        if(isset($_POST['name'])){
            $name = $_POST['name'];
            $delete = "DELETE FROM students WHERE name = :name";
            $statement = $db->prepare($delete);
            $statement->bindValue(':name', $name);
            $statement->execute();
            if($statement->rowCount() > 0){
                $deleted = true;
            }else{
                $deleted = false;
            }
        }
        
        $students = $db->query('SELECT name, grade FROM students ORDER BY name')->fetchAll(PDO::FETCH_ASSOC);
        foreach($students as $student){
            $names[] = $student['name'];
        }
        $uniqueNames = array_unique($names);

    } catch(PDOException $e) {
        die("Something is wrong with your connection " . $e->getMessage()); 
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
        form{
            margin-top: 100px;
        }
        form span{
            color: red;
        }
    </style>
</head>
<body>
    <div class="container">
        <header class="jumbotron text-center">
            <h1>Students</h1>
        </header>

        <table class="table table-bordered">
            <thead> 
                <tr> 
                    <th>Student Name</th>
                    <th>Grade #1</th>
                    <th>Grade #2</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                foreach ($uniqueNames as $uniqueName) : ?>
                <tr>  
                    <th> <?= $uniqueName ?> </th>
                    <?php
                    foreach ($students as $student) : 
                    if($student['name'] == $uniqueName) : ?>  
                        <td> <?= $student['grade'] ?> </td>
                    <?php endif; endforeach ?> 
                </tr>
                <?php endforeach ?> 
            </tbody> 
        </table>

        <form class="form-horizontal" method="post">
            <h2 class="text-center">Delete a Student from our Database</h2>

            <?php if(isset($deleted) && $deleted === true) : ?>
            <div class="alert alert-success text-center">
                <h2>You have successfully deleted <span><?= $name ?></span> from our Database</h2>
            </div>
            <?php endif ?>

            <?php if(isset($deleted) && $deleted === false) : ?>
            <div class="alert alert-danger text-center">
                <h2> <span><?= $name ?></span> is not a Student in our Database</h2>
            </div>
            <?php endif ?>

            <div class="form-group">
                <label for="name" class="col-sm-3 control-label">Choose a Student to delete:</label>
                <div class="col-sm-9">
                    <select class="form-control" name="name" id="name">
                        <?php foreach($uniqueNames as $uniqueName) : ?>
                        <option value="<?= $uniqueName ?>"> <?= $uniqueName ?> </option>
                        <?php endforeach ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-10">
                    <button type="submit" class="btn btn-primary">Delete</button>
                </div>
            </div>
        </form>

    </div>
</body>
</html>