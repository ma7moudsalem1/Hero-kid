<?php 
    if(isset($_GET['id'])){
        if(!empty($_GET['id'])){
            $Id = $_GET['id'];
            if($getReadData = getRowById('reading', 'read_id', $Id, 1)){
                $getReadData = getRowById('reading', 'read_id', $Id, 1);
                $getReadCat = getRowById('reading_category', 'read_cat_id', $getReadData['read_cat'], 1);
                $fetchAllCatRead = getData('reading_category', 'read_cat_id', 'ASC');
                
   
?>
<!-- add -->
<section class="ad-vid">
    <h4 class="text-center">Update <?= $getReadData['read_title'] ?> Video</h4>
    <img class="img-responsive text-center" src="<?= $uploadStory.$getReadData['read_img'] ?>" alt="<?= $getReadData['read_img'] ?>">
    <form method="POST" action="?page=reading&request=updateread&id=<?= $getReadData['read_id'] ?>&action=update" enctype="multipart/form-data">
        <div class="form-group">
            <label class="control-label">Video Title</label>
            <input type="text" class="form-control" name="title" value="<?= $getReadData['read_title'] ?>" autocomplete="off" required />
        </div>
        <div class="form-group">
            <label class="control-label">Video Image</label>
            <input type="hidden" class="form-control" name="oldImg" value="<?= $getReadData['read_img'] ?>" autocomplete="off"  />
            <input type="file" class="form-control" name="new"  />
        </div>
         <div class="form-group">
            <label class="control-label">Video Category</label>
            <select class="form-control" name="read_cat" >   
                <option value="<?= $getReadCat['read_cat_id'] ?>"><?= $getReadCat['read_cat_name']  ?></option>
                <?php
                if(!empty($fetchAllCatRead)){
                foreach($fetchAllCatRead as $cats) {
                    if($cats['read_cat_id'] == $getReadCat['read_cat_id']){
                        continue;
                    }
                ?>
                <option value="<?= $cats['read_cat_id'] ?>"><?= $cats['read_cat_name']  ?></option>
                <?php } } ?>
            </select>
        </div>
        <div class="form-group">
            <label for="comment">Video Description</label>
            <textarea class="form-control" name="discv" rows="5" id="comment"><?= $getReadData['story'] ?></textarea>
        </div>
        <div class="form-group text-center">
            <input type="submit" class="btn btn-primary" name="Add" value="Save" />
        </div>
    </form> 
</section>
<?php 
       require $codes.'reading.php';
            } 
        } else {
           redirctErrorUrl('?page=index', 'Not Valid ID.', 2);
       }
    } else {
           redirctErrorUrl('?page=index', 'Something Wrong.', 2);
       }
 ?>