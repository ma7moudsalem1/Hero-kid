<?php 
    $fetchAllCatVieos = getData('video_category', 'video_cat_id', 'ASC');
?>
<!-- add -->
<section class="ad-vid">
    <h4 class="text-center">Add New Video</h4>
    <form method="POST" action="?page=videos&request=addvid&action=add" enctype="multipart/form-data">
        <div class="form-group">
            <label class="control-label">Video Title</label>
            <input type="text" class="form-control" name="title" autocomplete="off" required />
        </div>
        <div class="form-group">
            <label class="control-label">Video URL</label>
            <input type="text" class="form-control" name="url" autocomplete="off" required />
        </div>
        <div class="form-group">
            <label class="control-label">Video Image</label>
            <input type="file" class="form-control" name="img"  autocomplete="off" required />
        </div>
         <div class="form-group">
            <label class="control-label">Video Category</label>
            <select class="form-control" name="vid_cat" >
                <?php
                if(!empty($fetchAllCatVieos)){
                foreach($fetchAllCatVieos as $cats) { ?>
                <option value="<?= $cats['video_cat_id'] ?>"><?= $cats['video_cat_name']  ?></option>
                <?php } } ?>
            </select>
        </div>
        <div class="form-group">
            <label for="comment">Video Description</label>
            <textarea class="form-control" name="discv" rows="5" id="comment"></textarea>
        </div>
        <div class="form-group text-center">
            <input type="submit" class="btn btn-primary" name="Add" value="Add New Video" />
        </div>
    </form> 
</section>
<?php require $codes.'videos.php'; ?>