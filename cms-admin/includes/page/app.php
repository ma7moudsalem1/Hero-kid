<?php if($_GET['action']){
        require $codes . 'app.php';
}
else {
    if(!$allAppData = getRowById('app_settings', 'app_id', 1, 1)){
    echo 'Ops Something went wrong';
}
?>
<section class="app">
    <h4 class="text-center">Website Main Settings</h4>
    <form method="POST" action="?page=app&action=update">
        <div class="form-group">
            <label class="control-label">Site Name</label>
            <input type="text" class="form-control" name="name" value="<?= $allAppData['app_name'] ?>" autocomplete="off" required />
        </div>
        <div class="form-group">
            <label class="control-label">Site Statement</label>
            <input type="text" class="form-control" name="stmt" value="<?= $allAppData['app_stm'] ?>" autocomplete="off" required />
        </div>
        <div class="form-group">
            <label class="control-label">Header Statement</label>
            <input type="text" class="form-control" name="hstmt" value="<?= $allAppData['app_head_stm'] ?>" autocomplete="off" required />
        </div>
        <div class="form-group">
            <label class="control-label">Welcome Message</label>
            <input type="text" class="form-control" name="wmsg" value="<?= $allAppData['app_welcoming_stm'] ?>" autocomplete="off" required />
        </div>
        <div class="form-group">
            <label class="control-label">Options Message</label>
            <input type="text" class="form-control" name="opmsg" value="<?= $allAppData['app_options_stm'] ?>" autocomplete="off" required />
        </div>
        <div class="form-group">
            <label for="comment">About The site</label>
            <textarea class="form-control" name="about" rows="5" id="comment"><?= $allAppData['app_description'] ?></textarea>
        </div>
        <div class="form-group text-center">
            <input type="submit" class="btn btn-primary" name="save" value="Save" />
        </div>
    </form>
</section>
<?php } ?>