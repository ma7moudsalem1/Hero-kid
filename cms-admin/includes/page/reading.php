<?php
if(isset($_GET['request'])){
    if(!empty($_GET['request'])){
        if($_GET['request']=='delete'){
            require $codes . 'reading.php';
            
        }else if($_GET['request']== 'addread'){
            require $page . 'addread.php';
            
        }else if($_GET['request'] == 'updateread'){
            require $page . 'updateread.php';
            
        }else if($_GET['request'] == 'app'){
            require $codes . 'reading.php';
            
        }else if($_GET['request'] == 'addcat'){
            require $page . 'vidcat.php';
        }
    }
}else{
    $fetchAllRead = getData('reading', 'read_id', 'DESC');
    $allAppData = getRowById('app_settings', 'app_id', 1, 1);
    
?>
<section class="manage-videos">
        <h3 class="text-center">Manage Sories</h3>
            <div class="table-responsive ">
                <table class="table table-responsive table-bordered text-center" id="MyTable">
                    <thead>
                        <tr>
                            <td>Story Title</td>
                            <td>Story Image</td>
                            <td>Story Category</td>
                            <td>Last Update</td>
                            <td>Actions</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if(!empty($fetchAllRead)){
                            foreach($fetchAllRead as $AllReadData){
                                $cat = getRowById('reading_category', 'read_cat_id', $AllReadData['read_cat'] , 1);
                        ?>
                        <tr>
                            <td><?= $AllReadData['read_title'] ?></td>
                            <td><img src="<?= $uploadStory.$AllReadData['read_img'] ?>" class="img-resposive" alt="<?= $AllReadData['read_img'] ?>" /></td>
                            <td><?= $cat['read_cat_name'] ?></td>
                            <td><?= $AllReadData['create_time'] ?></td>
                            <td>
                                <a href="?page=reading&request=delete&id=<?= $AllReadData['read_id'] ?>" class="btn btn-danger confirm"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                <a href="?page=reading&request=updateread&id=<?= $AllReadData['read_id'] ?>" class="btn btn-success"><i class="fa fa-pencil" aria-hidden="true"></i></a>
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
    <form method="POST" action="?page=reading&request=app&action=updatedesc">
    <div class="form-group">
            <label for="comment">Reading Section</label>
            <textarea class="form-control" name="description_read" rows="5" id="comment"><?= $allAppData['description_read'] ?></textarea>
        </div>
        <div class="form-group text-center">
            <input type="submit" class="btn btn-primary" name="Add" value="Save" />
        </div>
    </form>
    <a href="?page=reading&request=addread" class="btn btn-info"><i class="fa fa-plus" aria-hidden="true"></i> Add Story</a>
    <a href="?page=readcat" class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Manage Categories</a>
</div>


<?php } ?>