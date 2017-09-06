<form class="form-horizontal" action="<?=$action?>" method="post">
    <h2 class="text-center"><?=$formName?></h2>
    <div class="form-group">
        <label for="userName" class="col-sm-2 control-label">User Name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="userName" name="userName" placeholder="User Name" xrequired
                <?php if(isset($_POST['userName'])){echo "value=" . $_POST['userName'];}?>
            >
        </div>
    </div>

    <div class="form-group">
        <label for="password" class="col-sm-2 control-label">Password</label>
        <div class="col-sm-10">
            <input type="password" class="form-control" id="password" name="password" placeholder="Password" xrequired
                <?php if(isset($_POST['password'])){echo "value=" . $_POST['password'];}?>
            >
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-primary"><?=$submitName?></button>
        </div>
    </div>
</form>