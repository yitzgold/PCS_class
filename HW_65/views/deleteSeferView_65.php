<?php
    include '../htmlTop_65.html';
?>

        <header class="jumbotron text-center">
            <h1>Delete a Sefer</h1>
        </header>  

        <form class="form-horizontal" method="post">
            <?php if(isset($deleted) && $deleted === true) : ?>
            <div class="alert alert-success text-center">
                <h2>You have successfully deleted <em><?= $seferName ?></em></h2> 
            </div>
            <?php endif ?>

            <?php if(isset($deleted) && $deleted === false) : ?>
            <div class="alert alert-danger text-center">
                <h2>The Sefer you selected - Id: <em><?= $id ?></em> Name: <em><?= $seferName ?></em> is not in the Database</h2>
            </div>
            <?php endif ?>

            <div class="form-group">
                <label for="sefer" class="col-sm-2 control-label">Choose a Sefer:</label>
                <div class="col-sm-10">
                    <select class="form-control" name="sefer" id="sefer">
                        <?php foreach($seforim as $sefer) : ?>
                        <option value="<?= $sefer['id'].  ':' .$sefer['name'] ?>"> <?= $sefer['name'] ?> </option>
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