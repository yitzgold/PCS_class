<?php
    include 'views/htmlTop_68.php'; 
?>
        <div class="alert alert-danger">
        <h1 class="text-center"> are you sure you want to delete <?=$nameDelete ?></h1>
        <div class="row">
            <form method="post" class="col-sm-offset-4 col-sm-1"> 
                <input type="hidden" name="deleteID" value="<?= $IdDelete ?>">
                <input type="submit" class="btn btn-danger" value="delete"/> 
            </form>

            <form class="col-sm-offset-1 col-sm-1">
                <input type="submit" class="btn btn-info" value="cancel"/>
            </form>
        </div>
    </div>
</body>
</html>

