<section class="editAccount text-center">
    <h4 class="text-center">Add New Reading Category</h4>
    <form method="POST" action="?page=readcat&request=addcat&action=addcat">
        <div class="form-group">
            <label class="control-label">Category Name</label>
            <input type="text" class="form-control" name="name" autocomplete="off" required />
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" name="Add" value="Add New Category" />
        </div>
    </form>
</section>
<?php require $codes.'readcat.php' ?>