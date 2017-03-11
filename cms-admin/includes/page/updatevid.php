<?php 
    if(isset($_GET['id'])){
        if(!empty($_GET['id'])){
            $Id = $_GET['id'];
            if($getVideoData = getRowById('videos', 'video_id', $Id, 1)){
                $getVideoData = getRowById('videos', 'video_id', $Id, 1);
                $getVideoCat = getRowById('video_category', 'video_cat_id', $getVideoData['vid_cat'], 1);
                $fetchAllCatVieos = getData('video_category', 'video_cat_id', 'ASC');
                
   
?>
<!-- add -->
<section class="ad-vid">
    <h4 class="text-center">Update <?= $getVideoData['video_title'] ?> Video</h4>
    <img class="img-responsive text-center" src="<?= $uploadVideo.$getVideoData['videos_img'] ?>" alt="<?= $getVideoData['video_img'] ?>">
    <form method="POST" action="?page=videos&request=updatevid&id=<?= $getVideoData['video_id'] ?>&action=update" enctype="multipart/form-data">
        <div class="form-group">
            <label class="control-label">Video Title</label>
            <input type="text" class="form-control" name="title" value="<?= $getVideoData['video_title'] ?>" autocomplete="off" required />
        </div>
        <div class="form-group">
            <label class="control-label">Video URL</label>
            <input type="text" class="form-control" name="url" value="<?= $getVideoData['video_url'] ?>" autocomplete="off" required />
        </div>
        <div class="form-group">
            <label class="control-label">Video Image</label>
            <input type="hidden" class="form-control" name="oldImg" value="<?= $getVideoData['videos_img'] ?>" autocomplete="off"  />
            <input type="file" class="form-control" name="new"  />
        </div>
         <div class="form-group">
            <label class="control-label">Video Category</label>
            <select class="form-control" name="vid_cat" >   
                <option value="<?= $getVideoCat['video_cat_id'] ?>"><?= $getVideoCat['video_cat_name']  ?></option>
                <?php
                if(!empty($fetchAllCatVieos)){
                foreach($fetchAllCatVieos as $cats) {
                    if($cats['video_cat_id'] == $getVideoCat['video_cat_id']){
                        continue;
                    }
                ?>
                <option value="<?= $cats['video_cat_id'] ?>"><?= $cats['video_cat_name']  ?></option>
                <?php } } ?>
            </select>
        </div>
        <div class="form-group">
            <label for="comment">Video Description</label>
            <textarea class="form-control" name="discv" rows="5" id="comment"><?= $getVideoData['video_description'] ?></textarea>
        </div>
        <div class="form-group text-center">
            <input type="submit" class="btn btn-primary" name="Add" value="Save" />
        </div>
    </form> 
</section>
<?php 
       require $codes.'videos.php';
            } 
        } else {
           redirctErrorUrl('?page=index', 'Not Valid ID.', 2);
       }
    } else {
           redirctErrorUrl('?page=index', 'Something Wrong.', 2);
       }
 ?>