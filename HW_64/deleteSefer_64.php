<?php

    include 'dbConnection.php';

    try{
        if(isset($_POST['name'])){
            $name = $_POST['name'];
            $delete = "DELETE FROM sefer_price WHERE name = :name";
            $statement = $db->prepare($delete);
            $statement->bindValue(':name', $name);
            $statement->execute();
                if($statement->rowCount() > 0){
                    $deleted = true;
                }else{
                    $deleted = false;
                }
        }

        $seforim = $db->query('SELECT name FROM sefer_price')->fetchAll(PDO::FETCH_COLUMN, 0);

    } catch(PDOException $e) {
        die("Something is wrong with your connection " . $e->getMessage()); 
    }
    include 'htmlTop.html';
?>

        <header class="jumbotron text-center">
            <h1>Delete a Sefer</h1>
        </header>  

        <form class="form-horizontal" method="post">
            <?php if(isset($deleted) && $deleted === true) : ?>
            <div class="alert alert-success text-center">
                <h2>You have successfully deleted <em><?= $name ?></em></h2>
            </div>
            <?php endif ?>

            <?php if(isset($deleted) && $deleted === false) : ?>
            <div class="alert alert-danger text-center">
                <h2> <em><?= $name ?></em> is not in the Database</h2>
            </div>
            <?php endif ?>

            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Choose a Sefer:</label>
                <div class="col-sm-10">
                    <select class="form-control" name="name" id="name">
                        <?php foreach($seforim as $sefer) : ?>
                        <option value="<?= $sefer ?>"> <?= $sefer ?> </option>
                        <?php endforeach ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">Delete</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>