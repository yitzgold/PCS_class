<?php
    include '../htmlTop_65.html';    
?>

        <header class="jumbotron text-center">
            <h1>Check the price of a Sefer</h1>
        </header>

        <form class="form-horizontal" method="get">

            <?php if(isset($gotSefer) && $gotSefer === true) : ?>
            <div class="alert alert-success text-center">
                <h2>The price of <em><?= $name ?></em> is $<em><?= $price['price'] ?></em></h2>
            </div>
            <?php endif ?>

            <?php if(isset($gotSefer) && $gotSefer === false) : ?>
            <div class="alert alert-danger text-center">
                <h2><em><?= $name ?></em> is not in our Database</h2>
            </div>
            <?php endif ?>

            <div class="form-group">
                <label for="name" class="col-sm-3 control-label">Choose a Sefer:</label>
                <div class="col-sm-9">
                    <select class="form-control" name="name" id="name">
                        <?= $options ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-10">
                    <button type="submit" class="btn btn-primary">Get Price</button>
                </div>
            </div>

        </form>
    </div>
</body>
</html>