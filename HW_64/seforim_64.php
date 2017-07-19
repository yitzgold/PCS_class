<?php
    include 'dbConnection.php';

    try{
        $seforim = $db->query('SELECT name FROM sefer_price')->fetchAll(PDO::FETCH_COLUMN, 0);
        $options = "";
        foreach ($seforim as $sefer) {
            $options .= '<option value="'. strtolower($sefer).'">'.  $sefer . '</option>';
        }
    } catch(PDOException $e) {
        die("Something is wrong with your connection " . $e->getMessage()); 
    }
include 'htmlTop.html';    
?>


        <header class="jumbotron text-center">
            <h1>Check the price of a Sefer</h1>
        </header>

        <form class="form-horizontal" action="seferReturn_64.php" method="get">

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