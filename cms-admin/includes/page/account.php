<?php
$adminId = $_SESSION['adminId'];

if(!$getAdminData = getRowById('admin', 'admin_id', $adminId, 1)){
    echo 'Ops Something went wrong';
}
?>
<!-- Edit -->
<section class="editAccount text-center">
    <h4 class="text-center">Edit Account</h4>
    <h6>Last Update: <?= $getAdminData['create_time'] ?></h6>
    <form method="POST" action="?page=account&action=update">
        <div class="form-group">
            <label class="control-label">Username</label>
            <input type="text" class="form-control" name="username" value="<?= $getAdminData['username'] ?>" autocomplete="off" required />
        </div>
        <div class="form-group">
            <label class="control-label">First Name</label>
            <input type="text" class="form-control" name="first_name" value="<?= $getAdminData['admin_first_name'] ?>" autocomplete="off" required />
        </div>
        <div class="form-group">
            <label class="control-label">Last Name</label>
            <input type="text" class="form-control" name="last_name" value="<?= $getAdminData['admin_last_name'] ?>" autocomplete="off" required />
        </div>
        <div class="form-group">
            <label class="control-label">Password</label>
            <input type="hidden" class="form-control" name="old_pass" value="<?= $getAdminData['pass'] ?>" />
            <input type="password" class="form-control" name="new_pass" placeholder="If you left the password black it will still the past one" autocomplete="new-password" />
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" name="save" value="Save" />
        </div>
    </form>
</section>
<?php require $codes.'account.php' ?>