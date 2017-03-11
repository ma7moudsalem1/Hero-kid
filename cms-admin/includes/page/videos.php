<?php
if(isset($_GET['request'])){
    if(!empty($_GET['request'])){
        if($_GET['request']=='delete'){
            require $codes . 'videos.php';
        }else if($_GET['request']== 'addvid'){
            require $page . 'addvid.php';
        }else if($_GET['request'] == 'updatevid'){
            require $page . 'updatevid.php';
        }else if($_GET['request'] == 'app'){
            require $codes . 'videos.php';
        }else if($_GET['request'] == 'addcat'){
            require $page . 'vidcat.php';
        }
    }
}else{
    $fetchAllVieos = getData('videos', 'video_id', 'DESC');
    $allAppData = getRowById('app_settings', 'app_id', 1, 1);
    
?>
<section class="manage-videos">
        <h3 class="text-center">Manage Videos</h3>
            <div class="table-responsive ">
                <table class="table table-responsive table-bordered text-center" id="MyTable">
                    <thead>
                        <tr>
                            <td>Video Title</td>
                            <td>Video Image</td>
                            <td>Video URL</td>
                            <td>Video Category</td>
                            <td>Last Update</td>
                            <td>Actions</td>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        if(!empty($fetchAllVieos)){
                        foreach($fetchAllVieos as $AllVidData){
                            $cat = getRowById('video_category', 'video_cat_id', $AllVidData['vid_cat'] , 1);
                    ?>
                    <tr>
                        <td><?= $AllVidData['video_title'] ?></td>
                        <td><img src="<?= $uploadVideo.$AllVidData['videos_img'] ?>" class="img-resposive" alt="apple" /></td>
                        <td><?= $AllVidData['video_url'] ?></td>
                        <td><?= $cat['video_cat_name'] ?></td>
                        <td><?= $AllVidData['create_time'] ?></td>
                        <td>
                            <a href="?page=videos&request=delete&id=<?= $AllVidData['video_id'] ?>" class="btn btn-danger confirm"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                            <a href="?page=videos&request=updatevid&id=<?= $AllVidData['video_id'] ?>" class="btn btn-success"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                    <?php } } ?>
                    </tbody>
                </table>
                <div class="paging"></div>
            </div>
        
    </section>
<button class="btn btn-defualt button-toggel"><i class="fa fa-cog" aria-hidden="true"></i> More Settings</button> 
<div class="vid-contents">
    <h4 class="text-center">Edit Section Description</h4>
    <form method="POST" action="?page=videos&request=app&action=updatedesc">
    <div class="form-group">
            <label for="comment">Section Video</label>
            <textarea class="form-control" name="description_vid" rows="5" id="comment"><?= $allAppData['description_vid'] ?></textarea>
        </div>
        <div class="form-group text-center">
            <input type="submit" class="btn btn-primary" name="Add" value="Save" />
        </div>
    </form>
    <a href="?page=videos&request=addvid" class="btn btn-info"><i class="fa fa-plus" aria-hidden="true"></i> Add Videos</a>
    <a href="?page=vidcat" class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Manage Categories</a>
</div>


<?php } ?>