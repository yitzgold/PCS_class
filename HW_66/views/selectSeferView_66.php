<?php
    include 'htmlTop_66.php';    
?>

        <header class="jumbotron text-center">
            <h1>Check up a Sefer</h1>
        </header>

        <?php
            include 'filters_66.php';    
        ?>

        <form class="form-horizontal" method="get">
            <?php if(isset($gotSefer) && $gotSefer === false) : ?>
            <div class="alert alert-danger text-center">
                <h2><em><?= $name ?></em> is not in our Database</h2>
            </div>
            <?php endif ?>

            <div class="form-group">
                <label for="id" class="col-sm-3 control-label">Choose a Sefer:</label>
                <div class="col-sm-9">
                    <select class="form-control" name="id" id="id">
                        <?= $options ?>
                    </select>
                </div>
            </div>
            <?php if(isset($categoryFilter)) : ?>
            <input type="hidden" name="category" value="<?= $categoryFilter ?>">
            <?php endif ?>

            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-10">
                    <button type="submit" class="btn btn-primary">get info</button>
                </div>
            </div>
        </form>

        <?php if(isset($gotSefer) && $gotSefer === true) : ?>
        <table class="table table-striped">
            <thead> 
                <tr> 
                    <th>Sefer</th>
                    <th>Price</th>
                    <th>Category</th>
                </tr>
            </thead>
            <tbody>
                <tr>    
                    <td><?= $seferInfo['name'] ?></td>
                    <td><?= $seferInfo['price'] ?></td>
                    <td><?= $seferInfo['category'] ?></td>
                </tr>
            </tbody> 
        </table> 
        <?php endif ?>
    </div>
</body>
</html>