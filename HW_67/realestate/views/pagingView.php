<div class="row">
    <form class="col-sm-offset-2 col-sm-1">
        <input type="hidden" name="prevPg" value="<?php echo ($pageNum > 1? $pageNum-1 : 1) ?>">
        <input type="hidden" name="action" value="<?= $action ?>">
        <input type="submit" class="btn btn-info" value="<< prev"/> 
    </form>

    <form class="col-sm-offset-6 col-sm-1">
        <input type="hidden" name="nextPg" value="<?php echo ($pageNum < $numOfPages? $pageNum+1 : 1) ?>">
        <input type="hidden" name="action" value="<?= $action ?>">
        <input type="submit" class="btn btn-info" value="next >>"/>
    </form>
</div>
