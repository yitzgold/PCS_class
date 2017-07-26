<?php
    include 'htmlTop_66.php';
?>

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
                <label for="name" class="col-sm-2 control-label">Sefer Name:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Sefer" xrequired
                        <?php if(isset($_POST['name'])){echo "value=" . $_POST['name'];}?>
                    >
                </div>
            </div>

            <div class="form-group">
                <label for="price" class="col-sm-2 control-label">Price:</label>
                <div class="col-sm-10">
                    <input type="xnumber" step=".01" class="form-control" id="price" name="price" placeholder="Price" xrequired
                        <?php if(isset($_POST['price'])){echo "value=" . $_POST['price'];}?>
                    >
                </div>
            </div>

            <div class="form-group">
                <label for="category" class="col-sm-2 control-label">Category:</label>
                <div class="col-sm-10">
                    <select class="form-control" id="category" name="category">
                        <?php foreach ($categorys as $category) :?>
                        <option value="<?= $category ?>"
                            <?php if(isset($categoryChoice) && $category === $categoryChoice) echo "selected" ?>
                        > <?= $category ?> </option>
                        <?php endforeach ?>
                    </select>
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