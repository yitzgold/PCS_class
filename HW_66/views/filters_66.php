
<form class="form-inline text-center">

    <div class="form-group">
        <label for="category">Search by Category:</label>
        <select class="form-control" id="category" name="category">
            <option value="all">All</option>
            <?php foreach ($categorys as $category) : ?>
            <option value="<?= $category ?>"
                <?php if(isset($categoryFilter) && $category === $categoryFilter) echo "selected" ?>
            > <?= $category ?> </option>
            <?php endforeach ?>
        </select>
    </div>

    <input type="hidden" name="action" value="<?= $action ?>">

    <button type="submit" class="btn btn-default">filter</button>
</form>

