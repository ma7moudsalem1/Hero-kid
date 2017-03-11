<!-- add -->
<section class="editAccount text-center">
    <h4 class="text-center">Add New Admin Account</h4>
    <form method="POST" action="?page=admin&request=add&action=add">
        <div class="form-group">
            <label class="control-label">Username</label>
            <input type="text" class="form-control" name="username" autocomplete="off" required />
        </div>
        <div class="form-group">
            <label class="control-label">First Name</label>
            <input type="text" class="form-control" name="first_name" autocomplete="off" required />
        </div>
        <div class="form-group">
            <label class="control-label">Last Name</label>
            <input type="text" class="form-control" name="last_name" autocomplete="off" required />
        </div>
        <div class="form-group">
            <label class="control-label">Password</label>
            <input type="password" class="form-control" name="new_pass" placeholder="If you left the password black it will still the past one" autocomplete="new-password" required />
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" name="Add" value="Add New Admin" />
        </div>
    </form>
    
</section>
<?php require $codes.'addAdmin.php' ?>