<?php
    include 'views/htmlTop_68.php';
?>

<form class="form-horizontal" method="post">
    <div class="form-group">
        <label for="name" class="col-sm-2 control-label">change Name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="name" name="name" placeholder="<?php echo $sefer['name'] ?>">
        </div>
    </div>

    <div class="form-group">
        <label for="price" class="col-sm-2 control-label">change Price</label>
        <div class="col-sm-10">
            <input type="number" step=".01" class="form-control" id="price" name="price" placeholder="<?= $sefer['price'] ?>" >
        </div>
    </div>

    <div class="form-group">
        <label for="category" class="col-sm-2 control-label">change Category:</label>
        <div class="col-sm-10">
            <select class="form-control" id="category" name="category">
                <?php foreach ($categorys as $category) :?>
                <option value="<?= $category ?>"
                    <?php if($category === $sefer['category']) echo "selected" ?>
                > <?= $category ?> </option>
                <?php endforeach ?>
            </select>
        </div>
    </div>
    <input type="hidden" name="hiddenID" value="<?= $sefer['id'] ?>">
     <input type="hidden" name="categoryFilter" value="<?= $categoryFilter ?>">  
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-primary">submit change</button>
        </div>
    </div>
</form>
