<?php
    include 'views/htmlTop_68.php';
    include 'views/filters_68.php';    
?>

        <table class="table table-striped">
            <thead> 
                <tr> 
                    <th>Sefer</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th>Delete</th>
                    <th>Update</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($seforim as $sefer): ?>
                <tr>    
                    <td><?= $sefer['name'] ?></td>
                    <td><?= $sefer['price'] ?></td>
                    <td><?= $sefer['category'] ?></td>
                    <td>
                        <form method="post">
                            <input type="hidden" name="IdDelete" value="<?= $sefer['id'] ?>">
                            <input type="hidden" name="nameDelete" value="<?= $sefer['name'] ?>">
                            <button type="submit" class="btn btn-primary">Delete</button>
                        </form>
                    </td>
                    <td>
                        <form method="post">
                            <input type="hidden" name="category" value="<?= $categoryFilter ?>">
                            <input type="hidden" name="updateID" value="<?= $sefer['id'] ?>">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody> 
        </table> 
        <?php include 'views/pagingView_68.php'; ?> 
    </div>
</body>
</html>
