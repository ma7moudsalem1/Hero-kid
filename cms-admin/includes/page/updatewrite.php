<?php 
    if(isset($_GET['id'])){
        if(!empty($_GET['id'])){
            $Id = $_GET['id'];
            if($getWriteData = getRowById('writing', 'writing_id', $Id, 1)){
                $getWriteData = getRowById('writing', 'writing_id', $Id, 1);
                            
?>
<!-- add -->
<section class="ad-vid">
    <h4 class="text-center">Update <?= $getWriteData['name_of_img'] ?> Question</h4>
    <img class="img-responsive text-center" src="<?= $uploadQuestion.$getWriteData['writing_img'] ?>" alt="<?= $getWriteData['writing_img'] ?>">
    <form method="POST" action="?page=writing&request=updatewrite&id=<?= $getWriteData['writing_id'] ?>&action=update" enctype="multipart/form-data">
        <div class="form-group">
            <label class="control-label">Image</label>
            <input type="hidden" class="form-control" name="oldImg" value="<?= $getWriteData['writing_img'] ?>" autocomplete="off"  />
            <input type="file" class="form-control" name="new"  />
        </div>
        <div class="form-group">
            <label class="control-label">Answer</label>
            <input type="text" class="form-control" name="answer" value="<?= $getWriteData['name_of_img'] ?>" autocomplete="off" required />
        </div>
        <div class="form-group text-center">
            <input type="submit" class="btn btn-primary" name="Add" value="Save" />
        </div>
    </form> 
</section>
<?php 
       require $codes.'writing.php';
            } 
        } else {
           redirctErrorUrl('?page=index', 'Not Valid ID.', 2);
       }
    } else {
           redirctErrorUrl('?page=index', 'Something Wrong.', 2);
       }
 ?>