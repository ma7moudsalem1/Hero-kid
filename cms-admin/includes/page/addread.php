<?php 
    $fetchAllCatRead = getData('reading_category', 'read_cat_id', 'ASC');
?>
<!-- add -->
<section class="ad-vid">
    <h4 class="text-center">Add New Stories</h4>
    <form method="POST" action="?page=reading&request=addread&action=add" enctype="multipart/form-data">
        <div class="form-group">
            <label class="control-label">Story Title</label>
            <input type="text" class="form-control" name="title" autocomplete="off" required />
        </div>
        <div class="form-group">
            <label class="control-label">Video Image</label>
            <input type="file" class="form-control" name="img"  autocomplete="off" required />
        </div>
         <div class="form-group">
            <label class="control-label">story Category</label>
            <select class="form-control" name="read_cat" >
                <?php
                if(!empty($fetchAllCatRead)){
                foreach($fetchAllCatRead as $cats) { ?>
                <option value="<?= $cats['read_cat_id'] ?>"><?= $cats['read_cat_name']  ?></option>
                <?php } } ?>
            </select>
        </div>
        <div class="form-group">
            <label for="comment">Story</label>
            <textarea class="form-control" name="discv" rows="5" id="comment"></textarea>
        </div>
        <div class="form-group text-center">
            <input type="submit" class="btn btn-primary" name="Add" value="Add New Story" />
        </div>
    </form> 
</section>
<?php require $codes.'reading.php'; ?>