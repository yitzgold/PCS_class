<?php
   $deleted = false;
     try {
        $db = new PDO("mysql:host=localhost;dbname=school1", "root", "", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        
        $students = $db->query('SELECT DISTINCT name FROM students')->fetchAll(PDO::FETCH_COLUMN, 0);
        $grades = $db->query('SELECT name, grade FROM students')->fetchAll();

        if(!empty($_POST['name'])){
            
            $name = $_POST['name'];
            $delete = "DELETE FROM students WHERE name = :name";
            $statement = $db->prepare($delete);
            $statement->bindValue(':name', $name);
            $deleted = $statement->execute();
        }
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
</head>
<body>
    <div class="container">
        <header class="jumbotron text-center">
            <h1>Students</h1>
        </header>

        <table class="table table-bordered">
            <thead> 
                <tr> 
                    <th>Student</th>
                    <th>grade</th>
                    <th>grade</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                foreach ($students as $student) : ?>
                <tr>  
                    <th><?= $student?> </th>
                    <?php
                    foreach ($grades as $grade) : 
                    if($grade['name'] == $student) : ?>  
                        <td><?= $grade['grade'] ?> </td>
                    <?php endif; endforeach ?> 
                </tr>
                <?php endforeach ?> 
            </tbody> 
        </table>

        <form class="form-horizontal" method="post">

            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Name to delete</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="name" placeholder="name" required
                        <?php if(isset($_POST['name'])){echo "value=" . $_POST['name'];}?>
                    >
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-10">
                    <button type="submit" class="btn btn-primary">delete</button>
                </div>
            </div>

            <?php if($deleted) : ?>
            <div class="well text-center">
                <h2>You have successfully deleted the student</h>
            </div>
            <?php endif ?>

        </form>
    </div>
</body>
</html>