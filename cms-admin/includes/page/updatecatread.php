<?php
     if(isset($_GET['id'])){
        if(!empty($_GET['id'])){
            $Id = $_GET['id'];
    $allAppData = getRowById('reading_category', 'read_cat_id', $Id, 1);
?>
<section class="editAccount text-center">
    <h4 class="text-center">Update <?= $allAppData['read_cat_name']  ?> Category</h4>
    <form method="POST" action="?page=readcat&request=update&id=<?= $allAppData['read_cat_id']  ?>&action=update">
        <div class="form-group">
            <label class="control-label">Category Name</label>
            <input type="text" class="form-control" name="name" autocomplete="off" value="<?= $allAppData['read_cat_name']  ?>" required />
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" name="Add" value="Save" />
        </div>
    </form>
</section>
<?php
require $codes.'readcat.php';
        }
         else {
             redirctErrorUrl('?page=readcat', 'Not Valid Id', 2);
         }
     }
?>